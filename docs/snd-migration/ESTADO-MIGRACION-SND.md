# Migración SND v1 — Estado del proyecto (SESNA)

Documento único de referencia. Reemplaza a los documentos individuales anteriores
(inventario, auditoría, checklist, plan maestro, mapeo de utilidades, comparativas de
botones) con un solo lugar donde ver qué está hecho y qué falta.

Rama de trabajo: `snd-alan`. Sin commits hasta confirmar al 100% con el usuario.

---

## 1. Resumen ejecutivo

El tema `sesna-v2` se está migrando del estándar GOB.mx v3/Bootstrap al estándar
SND v1 (`snd-guinda.css`), por mandato del PM: **cumplimiento completo, no parcial**.
Esto incluye retirar Bootstrap CSS/JS por completo cuando ya no quede nada dependiendo
de él (componentes, utilidades, botones).

**Lo que ya está cerrado:** grid, tipografía, colores base, accesibilidad básica
(aria-hidden, title en enlaces externos), y la definición completa del sistema de
botones (con casi toda su implementación).

**Lo que falta, y es lo grande:** migrar las utility classes de Bootstrap
(`d-flex`, `mb-*`, `rounded`, `text-center`, etc. — miles de usos en ~45 archivos) a
sus equivalentes del SND o del tema, y solo después intentar quitar Bootstrap del todo.

---

## 2. Hecho (verificado, sin regresiones conocidas)

### 2.1 Grid y estructura
- Grid Bootstrap → `reticulaGrid__12` / `.columna__N--bp` en todo el tema.
- `container-fluid` residual eliminado.
- `<aside>` reemplazado por `<div>` donde chocaba con el `grid-area: aside` global del SND.

### 2.2 Tipografía y color
- Tipografía externa (Patria desde el CDN oficial, Noto Sans autoalojada con licencia OFL).
- H1 duplicados resueltos; jerarquía de encabezados corregida (h1→h2→h3) en home y páginas migradas.
- Alias de tokens `--color-dorado`, `--color-dorado-claro`, `--color-bronce` apuntando a los tokens oficiales del SND (`--dorado600`, `--dorado300`, `--dorado500`).
- `#9f2241` y hex sueltos migrados a tokens del SND donde se identificó el token exacto.
- 6 hex sueltos quedan **documentados como decisión de diseño pendiente** (colores de degradado sin token exacto, y el sistema deliberado de 4 colores "Eje 1-4").

### 2.3 Accesibilidad puntual
- `aria-hidden="true"` en los ~395 íconos decorativos del tema (100%).
- `title`/`aria-label` en los ~101 enlaces externos del tema (100%).
- Listas evaluadas para `.listaBasica`: ninguna se migró (3 no son listas semánticas reales, la cuarta expone que el SND no tiene equivalente a `list-unstyled`).

### 2.4 Mapeo de utilidades (Fase C)
Tabla completa de equivalencias Bootstrap → SND verificada contra la hoja oficial
(861 selectores). Resultado:
- **Sí tiene equivalente directo en el SND:** flex (dirección, wrap, grow), alineación
  (`align-items-*`, `justify-content-*`), gap, espaciado (`m*`/`p*` en la escala de
  píxeles del SND), colores de texto/fondo/borde, `.oculto` (= `visually-hidden`).
- **No tiene equivalente en el SND** (confirmado contra la hoja oficial, no asumido):
  display (`d-flex`, `d-none`, `d-md-*`), alineación/peso de texto (`text-center`,
  `fw-bold`), radio de borde (`rounded*`), posición (`position-*`, `z-*`), variantes
  responsivas fuera de flex.
- **Decisión tomada (C2):** para lo que no tiene equivalente, se creó un conjunto propio
  de utilidades del tema con la misma convención de nombres del SND, usando los tokens
  oficiales (colores, espaciados, radios) — no es Bootstrap disfrazado, es una extensión
  documentada. Implementado en `sesna-v2/assets/css/utilidades-tema.css`, encolado después
  de `snd-v1` y antes de que cargue el tema. Familias cubiertas: display (`.muestra--*`),
  texto (`.texto--*`, `.peso--*`), radio (`.radio--*`), posición (`.posicion--*`, `.z--*`),
  tamaño 100% (`.ancho--100`, `.alto--100`), bordes estructurales (`.borde--*`), algunos
  espaciados que el SND no cubre, y utilidades de layout para reemplazar `.card`/`.card-body`
  (`.ancho-minimo--0`, `.flex--1-auto`).
- **Dos diferencias de comportamiento a tener presentes:** el breakpoint `md` cambia de
  768px (Bootstrap) a 640px (SND) — es el comportamiento correcto hacia el que migramos,
  pero cambia dónde ocurre el quiebre; y el color de borde por defecto cambia de `#dee2e6`
  a `#DDDDDD` (token `--neutro400`), diferencia de tono mínima.

### 2.5 Home (`front-page.php` y sus template-parts)
Totalmente migrado a grid, tipografía y utilidades del SND. `.card`/`.card-body` de
Bootstrap sustituidos por utilidades propias con medidas idénticas verificadas en vivo.
Es la única página 100% terminada de principio a fin, y sirve de referencia para el resto.

### 2.6 Sistema de botones (definición completa en curso de implementación)

**Reglas fijadas** (basadas en la documentación oficial, https://www.snd.gob.mx/componentes/botones):
- Clases oficiales: `boton__primario|secundario|fantasma`, `boton--grande`, `boton--redondeado`,
  `boton--vertical`, `boton--100`, `boton--100sm`, `boton--wrap`, `fantasma--blanco`,
  `boton__<tipo>--disabled` (en `<a>`), `boton--cargando` + `icono__spin`.
- Un solo primario por sección (regla obligatoria del SND).
- Íconos dentro de botones con `snd__icono`, no `snd` a secas.
- Medidas oficiales: 48px alto normal / 64px grande, radio 8px (o 5rem con `boton--redondeado`), padding 8/24.
- Sin sobreescrituras de `main.css` sobre `[class*="boton__"]`.

**Migrado y verificado en vivo (D1–D8):**
- CTA "Conoce el SNA" del home → `boton__primario boton--redondeado` (antes `radio--pildora`, utilidad propia no oficial).
- Familia `btn-sesna` (7 usos) → `boton__primario`, repartiendo primario/secundario según la regla de "un solo primario" donde había varios juntos (política nacional anticorrupción).
- `btn-sesna--lg` → `boton__primario boton--grande`.
- `btn-sesna-outline` (2 usos, marco normativo) → `boton__secundario`.
- `btn-sesna-white` (0 usos) → clase eliminada.
- Enlaces con flecha ("Leer más", "Consultar", "Ver más sesiones/documentos" — `btn-sesna-link` y `tx-comite-btn-more`, 17 usos) → `boton__fantasma`.
- "Ver documento" (`cp-btn-ver`, 3 usos) → `boton__secundario`.
- "Descargar PDF" (`cp-btn-pdf`, 3 usos) → `boton__primario` (cambio deliberado de verde oscuro a guinda).
- Limpieza en `main.css`: eliminadas las definiciones muertas de `btn-sesna`, `--lg`, `-outline`, `-white`, `btn-sesna-link`, `cp-btn-ver`, `cp-btn-pdf`, `tx-comite-btn-more`.
- Eliminada la sobreescritura de color que `main.css` aplicaba a `.boton__fantasma` (parte CSS de D12) — ya se ve con el color oficial del SND.

**Pendiente de implementar (D9–D12, ver sección 3).**

---

## 3. Pendiente — Sistema de botones (lo más cercano a cerrarse)

1. **Decisión abierta: "un solo primario por sección" vs. listas de documentos.**
   Verificación patrimonial y contrataciones públicas muestran un primario por cada fila
   de documento (por el cambio de PDF → primario). Hay que decidir: mantenerlo así, poner
   el primario solo en la primera fila, o que todas las descargas sean secundarias.
2. **D9 — tamaños pequeños sin equivalente SND:** resuelto como **excepción documentada**:
   los indicadores circulares de `page-diseno-pna.php` (selector de eje 1-4) y las pestañas/
   acordeón de `page-presupuestacion.php` no son botones de acción, son controles de
   navegación — no se migran al sistema `boton__`.
3. **D10 — `btn-black`** (`template-transparencia-solicitudes.php`, "Solicita información"):
   migrar a `boton__primario`. Sin complicación, falta ejecutarlo.
4. **D11 — estado de carga (loader):** el SND exige `.boton--cargando` pero su hoja oficial
   no publica el ícono `icono__spin`/`snd-snd-loading2`. Falta implementar un spinner propio
   (CSS `@keyframes` + ícono) en `utilidades-tema.css`.
5. **D12 — `fantasma--blanco`:** la parte CSS ya está lista (se quitó el overlay de `main.css`).
   No hay ningún caso real en el sitio hoy que use fantasma sobre fondo de color, así que no
   hay markup pendiente — queda listo para cuando aparezca el caso.
6. **Auditoría "un solo primario por sección"** en el resto del sitio, página por página.
7. **Homologar `snd__icono`** en íconos dentro de botones que no se tocaron en D1–D8.

---

## 4. Pendiente — El resto del proyecto (lo grande)

### 4.1 Fase D — Migrar utility classes Bootstrap en todo el tema
**Único archivo terminado: el home.** El resto del tema (~45 archivos) todavía usa
clases de Bootstrap. Medición actual (ocurrencias aproximadas, `grep` sobre `*.php`):

| Utilidad | Archivos | Ocurrencias |
|---|---|---|
| `mb-*` | 46 | 732 |
| `card` (componente, no utilidad) | 39 | 520 |
| `d-flex` | 42 | 411 |
| `shadow*` | 26 | 309 |
| `align-items-center` | 38 | 291 |
| `fw-bold` | 22 | 239 |
| `rounded*` | 24 | 214 |
| `gap-*` | 26 | 172 |
| `justify-content-center` | 31 | 171 |
| `d-none` | 28 | 133 |
| `text-muted` | 20 | 123 |
| `flex-column` | 20 | 127 |
| `mt-*` | 33 | 120 |
| `py-*` | 27 | 113 |
| `text-center` | 20 | 91 |
| `h-100` | 20 | 71 |
| `btn ` (clase base, fuera de lo ya migrado) | 18 | 75 |
| `px-*` | 21 | 63 |
| `w-100` | 16 | 61 |
| `d-block` | 12 | 33 |
| `visually-hidden` | 8 | 11 |

**Total aproximado: ~4,000 ocurrencias.** La tabla de equivalencias (sección 2.4) ya
cubre el mapeo 1:1 para todas estas familias. El trabajo que falta es mecánico pero
grande: reemplazar clase por clase, archivo por archivo (o en lotes con script +
verificación), con especial cuidado en:
- `.card`/`.card-body` (520 usos): no es una utilidad suelta, es un componente con
  padding/borde/sombra propios de Bootstrap — requiere revisar layout por página, no
  un reemplazo de texto plano (así se hizo en el home, sirve de modelo).
- `btn` base (75 usos fuera de botones ya migrados): confirmar si son botones pendientes
  de pasar a `boton__*` o si pertenecen a componentes de Bootstrap (dropdown, modal) que
  son parte de la sección 4.2.

### 4.2 Componentes Bootstrap sin reemplazo documentado en el SND
Modal, dropdown, carousel, accordion y tabs/collapse no están documentados en el SND v1.
Detectados **17 archivos** que todavía usan `data-bs-toggle` de modal/dropdown/collapse,
carrusel, acordeón o tabs. Ya existe un CSS de reemplazo escrito (`assets/css/bs-components.css`
de un intento anterior) pero **no está activado** — falta decidir si se usa tal cual o se
revisa, y activarlo en el contexto correcto.

### 4.3 Fase F — Retirar Bootstrap CSS/JS por completo
Bloqueada hasta cerrar 4.1 y 4.2. Intento anterior: se quitó `gm/v3/assets/styles/main.css`
y el sitio se rompió (utilidades y layout dependían de él) — se revirtió de inmediato.
Esta vez el plan es intentarlo solo cuando ya no quede ninguna dependencia real.
`functions.php` hoy sigue cargando:
- `gobmx-framework` (Bootstrap CSS) — se puede quitar cuando 4.1/4.2 estén cerrados.
- `gobmx-framework-js` (`gobmx.js`) — **se mantiene siempre**, inyecta el header oficial
  .mexico y carga Bootstrap JS dinámicamente; no está bajo nuestro control.
- FontAwesome Pro (kit externo), jQuery (vía `gobmx.js`), Montserrat (`webfont.js`) — todos
  externos, fuera de nuestro control, evaluación pendiente para Fase F.

**Compromiso ya acordado con el usuario:** si al quitar Bootstrap algo se rompe, se arregla,
no se revierte por default — pero solo se intenta después de que 4.1 y 4.2 estén cerrados,
para que lo que se rompa sea acotado y fácil de diagnosticar.

### 4.4 Fase G — QA final transversal (no iniciada)
Navegación por teclado, lector de pantalla, contraste, CSP, SRI, revisión de `$_POST`
sin sanitizar.

### 4.5 Limitaciones del entorno (no bloquean el código, solo la verificación)
- ACF no está instalado en este entorno → plantillas que dependen de él (`template-conocenos`,
  `content-publish`, `content-convocatoria`, etc.) se migran pero solo se verifican por lint,
  no en vivo.
- Algunas páginas no existen en la base de datos local (ej. administración-finanzas,
  planeación institucional, información financiera, contrataciones-adquisiciones) →
  mismo caso, verificación solo por lint/diff.

---

## 5. Decisiones de diseño todavía abiertas (bloquean código puntual, no todo el proyecto)

1. 6 hex sueltos sin token exacto (degradados, sistema de 4 colores "Eje").
2. Un solo primario por sección en listas de documentos (D7/D8 de botones).
3. Confirmación del cambio de fuente de encabezados con el PM (pendiente desde antes).

---

## 6. Próximo paso sugerido

Dado el volumen de la Fase D (~4,000 ocurrencias), la forma más rápida de avanzar sin
arriesgar el sitio es: cerrar primero D9–D12 de botones (rápido), y luego migrar las
utilidades por lotes con script + lint masivo, dejando la verificación visual en vivo
para una muestra representativa de páginas en vez de cada archivo — aceptando que eso
cambia el nivel de verificación respecto al resto del proyecto hasta ahora.
