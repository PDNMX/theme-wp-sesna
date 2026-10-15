# Migración SND v1 — Estado del proyecto (SESNA)

Documento único de referencia. Reemplaza a los documentos individuales anteriores
(inventario, auditoría, checklist, plan maestro, mapeo de utilidades, comparativas de
botones) con un solo lugar donde ver qué está hecho y qué falta.

Rama de trabajo: `snd-dev` (nace de `snd-alan`, reconciliada con el trabajo paralelo
de `snd-migracion` — ver nota de reconciliación abajo).

---

## 0. Nota de reconciliación (snd-alan + snd-migracion → snd-dev)

Este tema se migró en paralelo en dos ramas sin coordinación: `snd-alan` (este
documento) y `snd-migracion` (más agresiva: quitó `gm/v3` antes de tiempo, pero usó
clases tipográficas oficiales del SND de forma más literal en varios archivos).
`snd-dev` nace de `snd-alan` como base arquitectónica — ver justificación completa en
`REFERENCIA-TECNICA-SND.md` (antes `SND-GUINDA-CONTEXTO.md` de la otra rama, ahora
consolidado aquí como referencia técnica del framework) y en
`historico-snd-migracion/` (documentos de progreso de `snd-migracion`, conservados
como referencia histórica, superados por este documento).

**Hallazgo ya portado desde `snd-migracion`:** el CSS oficial del SND vincula la
tipografía Patria al selector `[class*="__patria"]` en vez de a la clase oficial
`.patria` documentada en el PDF — por eso la clase oficial no pinta la fuente tal
cual. Pendiente de aplicar el fix en `main.css` de esta rama (snd-alan evita el
problema usando su propia clase `.font-patria` en vez de la oficial `.patria`;
decidir si conviene migrar a la clase oficial en la auditoría tipográfica de la
sección 4.1).

**Pendiente de este proceso de reconciliación:** auditar archivo por archivo (lista
completa de archivos en conflicto entre ambas ramas obtenida vía `git merge-tree`)
contra el PDF oficial del SND, no solo contra la otra rama — ya se confirmó que
ninguna de las dos cumple el estándar al 100% en todos los componentes (ver ejemplo
en `section-sna.php`: snd-alan usa el botón oficial pero tipografía no oficial;
snd-migracion usa tipografía oficial pero el botón sigue sin migrar).

### Bloque P00 (header, footer, functions.php) — CERRADO

Auditoría inicial por código (comparando `snd-dev` vs `snd-migracion`) concluyó que
`snd-dev` ya cumplía el PDF en header/footer/nav y que no había nada que portar. Una
verificación en vivo posterior (entorno Docker local, trazando los scripts CDN reales
que carga `gobmx-framework-js`) **corrigió esa conclusión**: el header `.mexico`
nunca se inyectaba. `gobmx.js` carga en cadena `gm/v3/assets/js/main.js`, cuya función
`MX.secBuilder()` (auto-ejecutada en `$(function(){ MX.secBuilder(); })`) inyecta un
`<header><nav class="navbar ... navbar-fixed-top">` — el navbar Bootstrap **heredado
de GOB.mx v3**, sin ninguna clase del SND — tanto como header *y* como footer
duplicado (este último ya estaba oculto con `.main-footer { display:none }`, pero el
header nunca tuvo el equivalente). El comentario original en `header.php` ("El
encabezado .mexico es inyectado por gobmx.js automáticamente") era incorrecto.

**Cambios aplicados en `snd-dev` (commit de este bloque):**
- `header.php`: se agregó el `.mexico` estático y oficial (estructura exacta del PDF,
  escudo + menú Trámites/Gobierno), envuelto en `<header class="header">` con el
  skip link `.irContent` dentro, tal como especifica el PDF.
- `main.css`: se oculta `.navbar-fixed-top` (mismo patrón ya usado para `.main-footer`)
  y se reemplazó todo el sistema de offset basado en JS (`--sesna-offset`, calculado
  por `getBoundingClientRect()` esperando la inyección async) por aritmética CSS fija
  usando `--bodyTop`, la variable **oficial** de `snd-guinda.css` para el alto real de
  `.mexico` (75px desktop / 56px ≤767.98px, confirmado leyendo el CSS fuente del CDN)
  más el alto fijo del subheader (52px, oficial). También se neutraliza
  `document.body.style.marginTop='70px'` que el propio `gobmx.js` aplica en cuanto
  detecta cualquier `<nav>` en la página (nuestro `.navHeader` cuenta).
- `assets/js/main.js`: se eliminó `adjustNavbar()`, el `ResizeObserver` y el polling
  con `requestAnimationFrame` que esperaban a que el header inyectado tuviera altura
  real — ya no aplica, el header es estático y está disponible de inmediato. El loader
  de transición ahora se oculta directo en `DOMContentLoaded` en vez de esperar esa
  condición.
- Limpieza de reglas CSS que parchaban overflow del `.navbar-fixed-top` (ya inerte al
  estar oculto) y de la variable `--sesna-offset` huérfana.

**Lo que NO cambió (ya era correcto en `snd-dev`, no se portó nada de `snd-migracion`):**
subheader/menú (`Sesna_Bootstrap_Nav_Walker`, patrón `<details>/<summary>` oficial —
la alternativa de `snd-migracion`, `SND_Subheader_Menu_Walker`, todavía emite markup
Bootstrap `dropdown-menu`/`dropdown-toggle`) y el footer propio (ya cumplía el PDF en
ambas ramas; se mantuvieron los íconos sociales autoalojados de `snd-dev` en vez de la
ruta no documentada `www.snd.gob.mx/assets/icons-base/*` de `snd-migracion`).

**Verificado:** entorno Docker local (`docker-compose.yml` de la raíz), HTML servido
confirma el `.mexico` estático presente y bien anidado; CSS/JS/PHP syntax-checked sin
errores; CDN oficiales (`snd-guinda.css`, `snd-js.js`, `gobmx.js`) e íconos locales del
footer responden 200. **Pendiente:** confirmación visual en navegador real (hover de
submenús, breakpoint móvil, que no aparezca el navbar legado ni un salto/encimado
visual) — no se pudo renderizar JS en este entorno de verificación.

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

**Familia nueva detectada en la auditoría 1.1.0 (no estaba en la tabla de arriba, no es
Bootstrap — ver sección 7.6):** marcador de ícono viejo `class="snd ...">` (suelto) vs.
el oficial `class="snd__icono ...">` + `.icono--{tamaño}`. **35 archivos** todavía usan
la convención vieja; es bloqueante para poder actualizar las rutas del CDN (css y js) sin
romper nada. Lista completa y conteos por archivo en la sección 7.6. **Este es ahora el
punto de entrada elegido para retomar la Fase D** (ver sección 6, actualizada).

### 4.2 Componentes Bootstrap sin reemplazo documentado en el SND
Modal, dropdown, carousel, accordion y tabs/collapse no están documentados en el SND v1.
Detectados **17 archivos** que todavía usan `data-bs-toggle` de modal/dropdown/collapse,
carrusel, acordeón o tabs. Ya existe un CSS de reemplazo escrito (`assets/css/bs-components.css`
de un intento anterior) pero **no está activado** — falta decidir si se usa tal cual o se
revisa, y activarlo en el contexto correcto.

**Caso concreto, ya con el home 100% migrado en todo lo demás:** `template-parts/home/carousel.php`
("Ofertas PAA") sigue siendo 100% Bootstrap (`data-bs-ride`, `data-bs-target`, `.carousel-control-prev/next`,
`.carousel-indicators`) — ni una clase del SND. Es la única pieza del home que depende
de Bootstrap JS/CSS en este momento. Queda anotado para resolver junto con el resto de
4.2, no se tocó porque es una decisión de alcance (migrar a algo propio documentado,
pedir criterio al SND, o dejarlo para la Fase F), no un ajuste de clase suelta.

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

**Actualizado 2026-10-13, tras la auditoría SND v1.1.0 (sección 7).** Se decidió empezar
la Fase D por la familia de íconos (`class="snd ">` → `snd__icono` + `.icono--*`), no por
las utilidades de Bootstrap de la tabla 4.1, porque es lo que bloquea actualizar las
rutas del CDN (css/js) sin romper nada — ver 7.6.

Orden acordado:
1. **Piloto: `template-parts/content/single.php`.** Ya está a medias (7 íconos sueltos,
   1 ya migrado), es plantilla de alto tráfico (cada entrada de blog) y es chico — sirve
   para fijar el criterio de qué `.icono--{tamaño}` corresponde según el contexto (ícono
   inline junto a texto vs. suelto en botón vs. de cabecera), criterio que todavía no
   existía de forma consistente.
2. Con ese criterio fijado, seguir con el resto de los 35 archivos listados en 7.6,
   ordenados de menor a mayor número de ocurrencias (de 1 hasta 59), para ganar
   velocidad y detectar patrones repetidos rápido.
3. Solo cuando ese backlog llegue a cero: cambiar las dos rutas del CDN (css + js) juntas
   y hacer una sola pasada de QA visual de íconos en todo el sitio.
4. Después de eso, retomar la Fase D "grande" (tabla de utilidades Bootstrap de 4.1,
   ~4,000 ocurrencias) con el mismo criterio ya usado: lotes + lint masivo, verificación
   visual en una muestra representativa en vez de cada archivo.

Nota: esto reemplaza la sugerencia anterior de empezar por D9–D12 de botones — ese punto
sigue pendiente (sección 3) pero ya no es el primer paso.

---

## 7. Auditoría SND v1.1.0 (2026-10-13)

El usuario extrajo manualmente la documentación pública del sitio snd.gob.mx en su
versión 1.1.0 (`docs/snd-migration/snd-1-1-0/snd-v1.1.0-extraccion.md`, 1206 líneas).
Esta sección documenta la auditoría hecha **contra el CSS/JS real del CDN**, no solo
contra el texto del sitio, para separar lo que es un cambio real de lo que es solo
reorganización de la documentación pública.

### 7.1 Verificación directa del CDN (hallazgo clave: el CSS no cambió)

Se descargaron y compararon byte a byte (por selector, no por tamaño de archivo) los
dos bundles:
- Actual en `functions.php`: `https://framework-gb.cdn.gob.mx/snd/v1/snd-guinda.css`
  (sin minificar, comentario interno `v8.0.1`).
- Ruta nueva documentada en el sitio: `https://framework-gb.cdn.gob.mx/snd/v1.1.0/snd-guinda.css`
  (minificado, comentario interno `v1.3.0`).

Mismo conteo exacto de ocurrencias en ambos para cada selector probado: `reticulaGrid`,
`reticulaFlex`, `menuMain__*`, `mexico__details`, `subheader`, `navHeader`, `idioma__*`,
`boton--cargando`, `boton--vertical`, `fantasma--blanco`, `tooltip__burbuja` (32 en ambos), etc.
**Conclusión: es el mismo framework, solo servido en dos rutas/formatos distintos** (uno
minificado). No hay componentes ni clases nuevas en el CSS entre lo que ya usamos y la
"v1.1.0" del sitio — el salto de versión público no se tradujo en un cambio de código
en este momento. No es urgente cambiar la ruta del CDN en `functions.php`; se puede
hacer por prolijidad (alinear con la convención oficial) sin que cambie nada visualmente.

### 7.2 Hallazgo real y accionable: la librería de íconos de marca SÍ cambió

Esto **no está en el CSS**, está en los archivos SVG que `snd.js` descarga en vivo desde
`https://framework-gb.cdn.gob.mx/snd/v1/assets/iconos/` (ruta fija, no versionada, compartida
por ambos CSS). Se decompiló la lógica real de `snd.js`:

```js
function(t){return t.startsWith("snd-")?t.slice(4):t}  // quita UN SOLO "snd-" del nombre de clase
// luego hace fetch(`${base}/${nombreResultante}.svg`)
```

Es decir: una clase `snd-tag` pide `tag.svg` (íconos genéricos IBM Carbon, prefijo simple).
Una clase `snd-snd-facebook` (doble prefijo) pide `snd-facebook.svg` (íconos propios del SND).

Se probó cada archivo directamente contra el CDN:

| Clase correcta (doble prefijo) | Archivo real | Estado |
|---|---|---|
| `snd-snd-facebook` | `snd-facebook.svg` | ✅ 200 — existe |
| `snd-snd-instagram` | `snd-instagram.svg` | ✅ 200 — existe |
| `snd-snd-youtube` | `snd-youtube.svg` | ✅ 200 — existe |
| `snd-snd-whatsapp` | `snd-whatsapp.svg` | ✅ 200 — existe |
| `snd-snd-x` | `snd-x.svg` | ✅ 200 — existe |
| `snd-snd-linkedin` / `snd-linkedin` (cualquier variante) | `linkedin.svg` / `snd-linkedin.svg` | ❌ 404 — **no existe, confirmado en ambas formas** |

Y para los íconos que ya usamos en el proyecto (genéricos, prefijo simple) se confirmó
que la convención actual ya es correcta: `snd-tag`, `snd-calendar`, `snd-document`,
`snd-document--import`, `snd-phone`, `snd-earth`, `snd-arrow--left/right`,
`snd-chevron--left/right`, `snd-search`, `snd-help` → todos resuelven 200.

**Esto cambia la resolución pendiente de íconos sociales que traíamos arrastrando**
(ver Bloque P00 / `page-que-hacemos.php` en secciones anteriores):

- `template-parts/content/single.php` líneas 87 y 93: usan clases rotas/incorrectas
  (`snd snd-logo--facebook`, `snd snd-earth` para "Twitter") → deben pasar a
  `snd__icono snd-snd-facebook` y `snd__icono snd-snd-x`. La línea 99 usa `snd snd-phone`
  para WhatsApp — ahora existe el ícono real `snd__icono snd-snd-whatsapp`, más correcto
  semánticamente.
- `footer.php` (líneas ~123–150): usa `<img>` autoalojados (`img/icons-base/facebook.svg`,
  `twitter-x.svg`, `instagram.svg`, `youtube.svg`) como solución de respaldo porque en su
  momento se confirmó que `snd-logo--facebook` etc. no existían. Ahora sí hay equivalente
  oficial (`snd__icono snd-snd-facebook`, etc.) — candidato a reemplazar el `<img>` por el
  ícono oficial, mismo criterio de "clases literales del SND" que el resto del proyecto.
- `page-que-hacemos.php` (líneas ~145–203): mismo patrón `<img>` de respaldo para
  X/YouTube/Instagram, más el comentario `<!-- Pendiente: LinkedIn -->` con `snd-earth`
  como marcador temporal.
- **LinkedIn sigue sin ícono oficial** (confirmado de nuevo, ahora contra el CDN real,
  no solo contra el CSS) — la brecha documentada en secciones anteriores **se mantiene
  sin resolver**; seguimos necesitando un SVG propio o un placeholder permanente para ese
  único caso.

Ninguno de estos reemplazos se hizo todavía — queda pendiente de aprobación antes de tocar
código, por instrucción explícita del usuario de auditar primero.

### 7.3 Componente "nuevo" (para nosotros) ya disponible sin cambios de CDN: Tooltip

El componente **Tooltip / Mensajes emergentes** (sección 4.8 del documento de extracción)
ya tiene su CSS completo en el bundle que usamos hoy (`tooltip__burbuja`, `tooltip__boton`,
`tooltip__ajuste`, `accesibilidadLector`, 32 ocurrencias) — no lo habíamos detectado ni usado
en ningún archivo del tema. Si en algún punto el proyecto necesita un tooltip de ayuda,
ya existe soporte oficial completo, sin esperar ninguna actualización.

### 7.4 Componentes documentados en v1.1.0 que NO tienen CSS/JS publicado todavía

Confirmado contra el CSS real (búsqueda de clases, no solo lectura del sitio) que estos
componentes —aunque el sitio ya los describe con anatomía Figma— **no tienen código
implementado** en el framework que consumimos (coincide con que la propia documentación
pública los marca con "solo pestañas Descripción/Diseño, sin Desarrollo"):
Barra de progreso/stepper, Tabla con filtros, Selector de fecha, Casilla de verificación
(estilos propios más allá del navegador), Radio botones (ídem), Texturas, Mensajes
informativos (banners no descartables). No hay nada que migrar ahí todavía porque no
existe clase oficial que adoptar — quedan anotados para revisar cuando el SND publique
su código.

### 7.5 Sin impacto detectado en lo ya migrado

Grid (`reticulaGrid__*`, `fila`, `columna__*`), tipografía (`h0b…sh1b…b1…sd…` + `.patria`),
botones (`boton__primario/secundario/fantasma` + modificadores), header/footer/navbar
(`mexico__details`, `subheader`, `navHeader`, `menuMain__*`, `idioma__*`) — todas las
clases que ya adoptamos en el home, `single.php` y `page-que-hacemos.php` existen
idénticas en el bundle "v1.1.0". **No hay que deshacer ni revisar de nuevo nada de lo ya
homologado por este motivo** — el trabajo previo sigue siendo 100% válido.

### 7.6 Corrección — el `.js` del CDN NO es cosmético (bug real confirmado en vivo)

A diferencia del CSS, `snd-js.js` **sí cambió de forma funcional** entre lo que cargamos
hoy y la versión nueva, y esto ya está rompiendo íconos en producción ahora mismo:

- JS actual (`/snd/v1/snd-js.js`, archivo `iconos.js`, autor Luis Humberto Braulio
  González Romero, v1.4.0): procesa el selector **`i.snd`** (clase vieja suelta).
- JS nuevo (`/snd/v1.1.0/snd.js`): procesa **`i.snd__icono, i.snd__pictograma`**
  (la convención oficial que ya venimos aplicando en home, `single.php` y
  `page-que-hacemos.php`).

**Verificado en vivo** en `http://localhost:8080/que-hacemos/`: los 4 íconos
`snd__icono snd-arrow--right` de los botones "Visitar" siguen siendo `<i>` sin procesar
(`data-snd-procesado` es `null`, nunca se reemplazan por `<svg>`) porque el script viejo
no reconoce `snd__icono`. **Todo lo que ya migramos a la clase oficial `snd__icono` está
renderizando como ícono vacío/invisible ahora mismo**, no es un problema hipotético.

**Por qué no se puede cambiar el JS de inmediato:** `grep` del proyecto completo muestra
que **~35 archivos todavía usan `class="snd ...">` suelta** (todo el backlog de Fase D sin
tocar: `page-marco-normativo.php`, `page-directorio.php`, `page-diseno-pna.php`, los
`template-transparencia-*.php`, `template-parts/administracion-finanzas/*`, etc.). El JS
nuevo no soporta ese selector viejo en absoluto — si se cambia la ruta hoy, esos ~35
archivos se quedan sin íconos en vez de los que ya migramos.

Tampoco es un rename trivial: nuestro propio `main.css` define `svg.snd { width:1em;
height:1em; ... }` (escala con el tamaño de fuente, convención heredada de FontAwesome),
mientras que `.snd__icono` del SND usa tamaño fijo en píxeles vía `.icono--{tamaño}`
(12/16/20/24/32/48/64/80/96). Cada ocurrencia de `class="snd ...">` necesita revisión
página por página (misma clase `snd__icono` + elegir el `.icono--*` correcto), no un
find-replace masivo.

**Conclusión:** cambiar la ruta del `.css` es cosmético y sin riesgo, se puede hacer
cuando se quiera. Cambiar la ruta del `.js` es necesario para que los íconos ya
migrados funcionen, pero debe ir **junto con** terminar de migrar los ~35 archivos
pendientes de `class="snd ">` a `class="snd__icono" + .icono--*`, no antes — si no,
se cambia qué parte del sitio está rota, no se arregla nada.

### 7.7 CERRADO — Cambio a v1.1.0 ejecutado (2026-10-13)

El usuario pidió explícitamente dejar el proyecto al día con la 1.1.0 hoy mismo, en
vez de esperar a la migración fina página por página. Se hizo con un barrido
automático de bajo riesgo en lugar del plan lento original:

**Qué se hizo:**
1. Script (`fix_snd_icons.py`, en el scratchpad de la sesión) recorrió **todo el tema**
   (no solo los 35 archivos listados) y, en cada `class="..."` que es marcador de
   ícono (`snd` y/o `snd-<nombre>`), agregó la clase que faltara para que el elemento
   tenga **ambas** — `snd` (compatibilidad con JS viejo) y `snd__icono` (oficial
   v1.1.0) — sin tocar ningún otro atributo ni clase. **36 archivos** modificados.
2. Hallazgo durante la verificación en vivo: el script no detectó los casos donde el
   nombre del ícono es dinámico vía PHP (`class="snd <?= $slot['icono'] ?> ...">`,
   12 ocurrencias en `functions.php` y 7 template-parts más) porque el texto no
   empieza literalmente con `snd-`. Se corrigieron a mano (mismo criterio: agregar
   `snd__icono`). Una de ellas (`functions.php`, función de documentos de sesión) se
   renderiza cientos de veces por página — explica por qué una verificación en vivo
   temprana mostró ~550–1900 íconos "sin procesar": no era un bug, era el barrido
   incompleto por ese caso dinámico.
3. Se corrigieron además, en `template-parts/content/single.php`, los 3 íconos
   sociales con nombre incorrecto detectados en 7.2: `snd-logo--facebook` →
   `snd-snd-facebook`, `snd-earth` (usado como X) → `snd-snd-x`,
   `snd-phone` (usado como WhatsApp) → `snd-snd-whatsapp`.
4. `functions.php`: las dos rutas del CDN cambiadas de `/snd/v1/` a `/snd/v1.1.0/`
   (`snd-guinda.css` y `snd.js`).
5. Lint PHP limpio en los 37 archivos tocados (`php -l` vía Docker).
6. Verificación en vivo (no solo lint):
   - Script cargado confirmado: `https://framework-gb.cdn.gob.mx/snd/v1.1.0/snd.js`.
   - Home, `single.php` (post real `?p=6036`) y `page-que-hacemos.php`: 0 íconos sin
     procesar, tamaños idénticos a los de antes del cambio (16px donde ya eran 16px),
     el badge de categoría roto de la sección 7.6 (`snd-tag`, medía 0×0) ya mide 16×16.
   - `organos-colegiados` (la página con más volumen, ~1,900 íconos renderizados vía
     tabla de documentos): 0 sin procesar tras esperar el procesamiento async (el
     script de íconos procesa un elemento a la vez, por lo que una página con miles
     de íconos tarda unos segundos en terminar — normal, no es una regresión).
   - Captura de los botones "Compartir" de `single.php`: ya se ven los logos reales
     de Facebook (azul), X (negro) y WhatsApp (verde) en vez de los íconos
     genéricos/rotos de antes.
   - Consola sin errores nuevos atribuibles a este cambio (los `jQuery is not defined`,
     404 de medios locales y el error de Popper/`detectOverflow` ya eran preexistentes,
     documentados en la sección 4.5 y en el bloque P00).

**Hallazgo del 2026-10-13, CORREGIDO el 2026-10-14:** dos nombres de ícono inválidos,
preexistentes (`snd-clipboard`, `snd-play--outline--filled` — ninguno existe en el
CDN, confirmado por 404 directo). Antes de cambiar de versión ya estaban rotos pero
invisibles (el `<i>` nunca se procesaba); al quedar sin el bug de 7.6 empezaron a caer
al ícono de interrogación de respaldo del script — visible, pero no correcto.
Corregidos en `functions.php` (líneas 2105, 2193, 2199, función `sesna_oc_doc_icon` /
`sesna_oc_map_slots_fijos`): `snd-clipboard` → `snd-document--requirements`
("Convocatoria"), `snd-play--outline--filled` → `snd-play--outline` ("Ver sesión").
Ambos verificados contra el CDN (200) y en vivo en `/organos-colegiados/` (cero
advertencias "no encontrado" en consola tras el cambio, ~1,900 íconos de la página).

**Lo que queda pendiente de la lista original (ya no bloquea nada, es afinación):**
1. ¿Reemplazar los `<img>` autoalojados de redes sociales en `footer.php` y
   `page-que-hacemos.php` por los íconos oficiales `snd-snd-{facebook,instagram,
   youtube,whatsapp}` ahora que ya funcionan (confirmado en `single.php`)?
2. LinkedIn sigue sin ícono oficial — sigue pendiente de decisión (SVG propio o
   placeholder documentado); `page-que-hacemos.php` sigue con `snd-earth` como
   marcador temporal, comentario ya presente en el código.
3. ~~Corregir los 2 nombres de ícono inválidos encontrados arriba.~~ Hecho (ver arriba).
4. Quitar la clase puente `snd` cuando ya no haga falta (cuando se decida retirar
   definitivamente cualquier dependencia del comportamiento del script viejo) y, si se
   quiere, afinar `.icono--{tamaño}` por contexto en vez de depender de `svg.snd{
   width:1em }` — ninguna de las dos cosas es urgente, el sitio ya cumple 1.1.0 hoy.
5. Retomar la Fase D grande (tabla de utilidades Bootstrap, sección 4.1).
