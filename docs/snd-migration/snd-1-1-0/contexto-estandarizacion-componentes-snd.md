# Contexto de Estandarización por Componente — SND v1.1.0 (Guía de Continuidad para IA)

> **Propósito de este documento:** Permitir que cualquier agente de Inteligencia Artificial en otro equipo o sesión retome exactamente el flujo de trabajo de estandarización visual y técnica hacia el **Sistema Nacional de Diseño (SND) v1.1.0 (Tema Guinda)** sin perder contexto.

---

## 1. Objetivo General, Límites de Alcance y Flujo de Trabajo

El proyecto `theme-sesna` (`sesna-v2/`) ya cuenta con la hoja de estilos oficial `https://framework-gb.cdn.gob.mx/snd/v1.1.0/snd-guinda.css` y el script `snd.js` cargados en el tema, habiendo retirado previamente el CSS/JS legacy de GOB.mx v3 / Bootstrap.

Sin embargo, varias plantillas aún conservan en su HTML clases huérfanas de Bootstrap (`.nav-tabs`, `.nav-link`, `.form-select`, `.form-control`, `.card`, `.card-body`, `.d-flex`, `.fw-bold`, etc.) o componentes cuyos estilos están incompletos o no vienen publicados en los 16 componentes públicos de `snd-guinda.css`, pero **sí están diseñados en el archivo oficial de Figma `SND | UI Kit`**.

### 🚫 LÍMITE DE ALCANCE ESTRICTO (REGLA INQUEBRANTABLE)
- **El trabajo de estandarización se enfoca EXCLUSIVAMENTE en los componentes internos del `body` de cada página.**
- **PROHIBIDO TOCAR BAJO NINGÚN MOTIVO:**
  1. **Header institucional** (`header.php`, `.mexico`, etc.)
  2. **Navbar / Barra de navegación** (`.subheader`, `.navHeader`, menú móvil inferior, etc.)
  3. **Footer institucional** (`footer.php`, `.piePagina`, etc.)
  4. **Botón y panel de accesibilidad** (`.icono--circuloRojo`, widget de accesibilidad)
  5. **La Retícula (Grid)** (`.contenedor`, `.reticulaGrid__12`, `.columna__*`) — las columnas y contenedores de la retícula donde viven los componentes **no se deben alterar ni romper bajo ningún motivo**, pero sí se deben usar correctamente sus clases para que todos los componentes que compartan una misma fila queden **alineados exactamente a la misma altura vertical** (por ejemplo, cuidando que contenedores de `Select` y `Barra de búsqueda` tengan exactamente `height: 48px` en su envolvente externa y sus `<label class="b1sb dblock color--neutro800 mb--8">` queden en la misma línea horizontal).

### 📋 Regla de las 3 Pestañas Normativas del SND (`DESCRIPCIÓN`, `DISEÑO` y `DESARROLLO`)
Para cada componente que se vaya a implementar o estandarizar, **además de verificar qué clases existen en `docs/snd-guinda.css`**, es obligatorio revisar y cumplir simultáneamente las **3 secciones (pestañas del portal SND)** documentadas en [`snd-v1.1.0-extraccion.md`](./snd-v1.1.0-extraccion.md):
1. **Tab 1 — `DESCRIPCIÓN`:**
   - Identificar la variante correcta del componente según su función en la pantalla, todos sus **estados obligatorios** (`Default`, `Hover`, `Focus`, `Active`, `Filled`, `Disabled`, `Loading`) y respetar los **Usos NO permitidos**.
2. **Tab 2 — `DISEÑO` (Versiones Desktop y Móvil):**
   - Aplicar los valores concretos del spec de Figma tanto para **Desktop** como para **Móvil**: colores de tokens (`--neutro*`, `--principal`, `--gama*`), tipografía diferenciada por breakpoint (ej. estilo desktop vs estilo móvil), radios de borde, sombras, grosores de borde interior/exterior por estado (`Default`, `Focus`, `Active`, `Filled`), dimensiones, `padding` y `gap` (`item spacing`).
   - **Importante:** Si `snd-guinda.css` tiene una clase declarada pero en el CSS del CDN omitieron propiedades de la pestaña **DISEÑO** (como sucede con `.general-search`), se deben complementar dichas propiedades exactas en `sesna-v2/assets/css/main.css` respetando las versiones Desktop y Móvil.
3. **Tab 3 — `DESARROLLO` (Versiones Desktop y Móvil):**
   - Respetar la estructura semántica HTML (`<form>`, `<label>`, `<button>`, `<nav>`, listas), las clases oficiales del framework, los breakpoints de resize (`@media (min-width: 640px)` para tabletas y `@media (min-width: 1024px)` para escritorio, tomando móvil `< 640px` como base), y todas las reglas obligatorias de **accesibilidad** (atributos ARIA, foco visible por teclado, soporte de `Enter` / `Escape` / flechas).

### 📐 Regla Obligatoria de Retícula SND v1.1.0 (`3.5 Retícula`) y Alineación en Fila
Toda IA que intervenga cualquier componente en una plantilla **debe verificar y garantizar que el componente respete la Retícula oficial de 12 columnas del SND (`3.5 Retícula` en [`snd-v1.1.0-extraccion.md`](./snd-v1.1.0-extraccion.md#L287-L365))**:

| Breakpoint SND | Sufijo CSS | Rango de Pantalla | Margen del `.contenedor` | Medianil (`gap`) | Uso de Columnas |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Móvil XS** (Extra pequeño) | *(sin sufijo)* / `--xs` | `< 576px` | `16px` | `16px` | `columna__12` (100% ancho, apilado) |
| **Móvil SM** (Pequeño) | `--sm` | `576px – 639px` (`< 640px`) | `16px` | `16px` | Sigue siendo **Móvil** (`columna__12`) |
| **Tableta MD** (Mediano) | `--md` | `≥ 640px` (`< 1024px`) | `24px` | `16px` | `columna__6--md` / `columna__12--md` |
| **Escritorio LG** (Grande) | `--lg` | `≥ 1024px` (`< 1536px`) | `56px` | `24px` | `columna__3--lg`, `columna__4--lg`, `columna__6--lg`, etc. |
| **Escritorio XL** (Extra grande) | `--xl` | `≥ 1536px` | `56px` (`max-width: 1416px`) | `24px` | 12 columnas |

- **⚠️ Prohibido confundir los sufijos de Bootstrap con los del SND:** En Bootstrap `md` (`768px`) y `lg` (`992px`) tenían otros significados. En SND v1.1.0, `--sm` (`576px`) sigue siendo **Móvil**, `--md` (`≥ 640px`) es **Tableta**, y `--lg` (`≥ 1024px`) es **Escritorio**. Por ello, la progresión responsiva correcta para columnas en fila es:
  ```html
  <!-- Móvil (<640px): 12 cols | Tableta (≥640px): 6 cols | Escritorio (≥1024px): 3 o 6 cols -->
  <div class="reticulaGrid__12 mb--32 align-items-end">
      <div class="columna__12 columna__6--md columna__3--lg">...</div>
      <div class="columna__12 columna__6--md columna__6--lg">...</div>
  </div>
  ```
- **Encapsulamiento en `.reticulaGrid__12 > .columna__*`:** Todo bloque de ancho completo dentro de `.contenedor` (títulos `<h1>`, barras de pestañas `.tx-comite-tabs-container`, filas de filtros, etc.) debe vivir dentro de `<div class="reticulaGrid__12"><div class="columna__12">...</div></div>` para que sus bordes izquierdo y derecho coincidan al pixel con el resto de la retícula.
- **Alineación Vertical Exacta entre Componentes de la Misma Fila:**
  - Cuando dos o más componentes comparten una fila `.reticulaGrid__12` (ej. un `Select` a la izquierda y una `Barra de búsqueda` a la derecha):
    1. Sus etiquetas superiores deben tener exactamente las mismas clases y márgenes (`<label class="b1sb dblock color--neutro800 mb--8">`).
    2. Sus contenedores interactivos envolventes (`.tx-select-wrap` / `.tx-comite-select` y `.form__inset.general-search.tx-comite-search-box`) deben tener **exactamente la misma altura fija (`height: 48px; min-height: 48px; max-height: 48px; box-sizing: border-box;`)** y `margin: 0`.
    3. **Nunca** aplicar `min-height: 48px` a un `<input>` hijo si su contenedor padre ya tiene `padding` vertical, pues sumaría altura extra (`48px + padding = 64px`) y desfasaría hacia arriba el `<label>` de esa columna cuando la fila usa `.align-items-end`.

### Dinámica de trabajo con el usuario (Paso a Paso)
1. **Instrucción por componente:** El usuario indica qué plantilla y qué componente específico dentro del `body` desea ajustar (ej. *Tabs*, *Dropdown/Select*, *Barra de búsqueda*, *Cards*, *Breadcrumbs*, etc.).
2. **Verificación obligatoria en fuentes locales (sin inventar clases):**
   - Primero se verifica si el componente y sus clases existen en la copia local de la hoja oficial: [`docs/snd-guinda.css`](../../snd-guinda.css) (extraída íntegra de `https://framework-gb.cdn.gob.mx/snd/v1.1.0/snd-guinda.css`).
   - Segundo, se revisan las **3 pestañas (`Descripción`, `Diseño` Desktop/Móvil y `Desarrollo`)** en [`snd-v1.1.0-extraccion.md`](./snd-v1.1.0-extraccion.md) y [`REFERENCIA-TECNICA-SND.md`](../REFERENCIA-TECNICA-SND.md).
   - Tercero, se consulta el catálogo de componentes ya extraídos en [`catalogo-componentes-figma-extraidos.md`](./catalogo-componentes-figma-extraidos.md).
3. **Reporte y Propuesta antes de editar:**
   - Se informa al usuario si el componente existe en `snd-guinda.css` (y si su CSS está completo o incompleto respecto a las pestañas `Diseño` y `Desarrollo`) o si solo está diseñado en Figma (`SND | UI Kit`).
   - Si no está en `snd-guinda.css` ni en [`catalogo-componentes-figma-extraidos.md`](./catalogo-componentes-figma-extraidos.md), se extrae de Figma siguiendo [`metodo-extraccion-figma-api-snd.md`](./metodo-extraccion-figma-api-snd.md).
   - Se presenta la propuesta técnica (HTML + CSS Desktop/Móvil alimentado 100% con variables de `:root` de `snd-guinda.css`) y se aplica tras la confirmación del usuario.
4. **Verificación técnica:**
   - Validar sintaxis PHP con `php -l <archivo.php>`.
   - Cero clases inventadas fuera del estándar y cero regresiones de accesibilidad (WCAG 2.1 AA) o de lógica de negocio (queries de WordPress, filtros JS, modales).

---

## 2. Fuentes de Verdad en el Repositorio

| Archivo | Ruta | Contenido y Rol |
| :--- | :--- | :--- |
| **Hoja CSS Oficial SND v1.1.0** | [`docs/snd-guinda.css`](../../snd-guinda.css) | Copia exacta (91,126 bytes) de `https://framework-gb.cdn.gob.mx/snd/v1.1.0/snd-guinda.css`. Usar para comprobar qué selectores y variables `:root` existen realmente en el CDN. **Nota:** No se enlaza este archivo desde `docs/`; el tema ya lo carga desde el CDN oficial. |
| **Extracción Normativa Web SND** | [`docs/snd-migration/snd-1-1-0/snd-v1.1.0-extraccion.md`](./snd-v1.1.0-extraccion.md) | Reglas de diseño, anatomía y código de los Estilos y los 16 Componentes publicados en `https://www.snd.gob.mx/`. |
| **Plan de Trabajo General** | [`docs/snd-migration/snd-1-1-0/plan-trabajo-migracion-snd-v1.1.0.md`](./plan-trabajo-migracion-snd-v1.1.0.md) | Reglas de ejecución para IA, matriz de equivalencias de retícula y fases previas completadas. |
| **Método de Extracción Figma API** | [`docs/snd-migration/snd-1-1-0/metodo-extraccion-figma-api-snd.md`](./metodo-extraccion-figma-api-snd.md) | Guía paso a paso, endpoints REST de Figma, scripts de parseo Python e índice de páginas/nodos del archivo `SND \| UI Kit` (`kW8LFCzYEiBxCgHu6gBD66`). |
| **Catálogo de Componentes Figma** | [`docs/snd-migration/snd-1-1-0/catalogo-componentes-figma-extraidos.md`](./catalogo-componentes-figma-extraidos.md) | Especificaciones de diseño, anatomía, tokens, HTML y CSS de los componentes ya extraídos de Figma (`Tabs` y `Select / Dropatom`) listos para reutilizar en cualquier plantilla. |

---

## 3. Estado Actual de la Página en Trabajo: `template-transparencia-comite.php`

**Archivo:** [`sesna-v2/template-transparencia-comite.php`](../../../sesna-v2/template-transparencia-comite.php)  
**Hoja de estilos del tema:** [`sesna-v2/assets/css/main.css`](../../../sesna-v2/assets/css/main.css)

### ✅ Componentes del `body` ya estandarizados al SND v1.1.0
1. **Título Principal de la Página:**
   - `<h1 class="h1b patria tx-section-title mb-2 tx-comite-title">Comité de Transparencia</h1>`.
2. **Pestañas / Tabs (`#comiteTabs` y `#comiteTabsContent`):**
   - Estandarizadas con el componente **`Tabs 2`** de Figma (`1562:4021` / `16460:3792`).
   - HTML limpio con `.ul--limpio`, `.tx-comite-tabs`, botones `.tx-comite-tab` (`role="tab"`, `aria-selected="true|false"`), paneles `.tx-comite-tab-pane` (`role="tabpanel"`, ocultación con `.muestra--ninguno`) y soporte de teclado (`ArrowLeft` / `ArrowRight`).
3. **Filtros Desplegables `<select>` (`#filter-anio`, `#filter-tipo`, `#filter-anio-res`):**
   - Estandarizados con la anatomía **`Select / Dropatom`** del SND.
   - Etiquetas `<label class="b1sb dblock color--neutro800 mb--8">`.
   - Envolvente `.tx-select-wrap` con `<select class="tx-comite-select tx-comite-filter-control">` e ícono `<i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>`.
4. **Barra de Búsqueda Interna `#search-res` (en `#resoluciones-pane`):**
   - Estandarizada conforme a **`4.1 Barra de búsqueda` (variante sección interna sin botón)** cumpliendo las 3 pestañas (`Descripción`, `Diseño` Desktop/Móvil y `Desarrollo`).
   - Envolvente `<form class="search-container" role="search" id="form-search-res">` + `<div class="form__inset general-search tx-comite-search-box">`, ícono `<i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>` e `<input type="search" id="search-res" class="sh0r js-input tx-comite-search-input tx-comite-filter-control">`.
   - Soporta estados `Default` (fondo `--neutro200`, borde interno `1px --neutro400`, radio `100px`), `Focus` (`2px` interno `--principal`), `Active` (`2px` interno `--principal`) y `Filled` (`1px` interno `--principal` con clase `.is-filled`), además de breakpoints `@media (min-width: 640px)` y `@media (min-width: 1024px)`.
5. **Botones de Paginación Progresiva ("Ver más sesiones" / "Ver más resoluciones"):**
   - Usan `.boton__fantasma` con `<i class="snd__icono snd-chevron--down icono--16">`.
6. **Modal Visor de PDF (`template-parts/visor-pdf.php`):**
   - Usa controlador nativo `window.sndModal`, backdrop `rgba(22, 26, 29, 0.56)` (`neutro-800` al 56%), botones `.boton__fantasma`, `.boton__secundario.boton--redondeado` y `.boton__primario.boton--redondeado`.

### ⏳ Pendiente por Hacer en `template-transparencia-comite.php` (Diagnósticos Ya Identificados)

#### 1. Tarjetas de Sesiones y Resoluciones (`.tx-sesion-card` / `.tx-resolucion-card`) + Botón Fantasma Interno ("Acta" / "Resolución")
> **Ubicación actual:** Líneas 128–160 (Sesiones) y 202–234 (Resoluciones) de [`sesna-v2/template-transparencia-comite.php`](../../../sesna-v2/template-transparencia-comite.php), y líneas 5644–5780 de [`sesna-v2/assets/css/main.css`](../../../sesna-v2/assets/css/main.css).  
> **Nota de alcance:** Solo estandarizar la tarjeta y el botón fantasma que dispara el modal; **NO tocar el modal visor PDF (`template-parts/visor-pdf.php`) por ahora** (eso se dejará para después).

- **Diagnóstico ya realizado:**
  1. **Contenedor Tarjeta / Card:**
     - **En `snd-guinda.css` y portal SND:** No existe clase `.card` ni `.tarjeta` compilada en `snd-guinda.css`. Al haberse retirado Bootstrap, las clases `.card`, `.card-body`, `.flex-md-row`, `.align-items-md-stretch`, `.ps-md-4`, `.ms-md-auto` perdieron su fondo blanco (`#FFFFFF`) y su layout horizontal en escritorio, provocando que la tarjeta se vea transparente sobre el fondo de la página y con sus 3 bloques apilados verticalmente.
     - **En Figma (`SND | UI Kit`):** Extraído de las páginas `Cards *` (`id=12022:57247`, nodo `37597:51398`) y `Espaciados y cuadricula` (`nodos 20721:1900` / `20721:1904`):
       - **Fondo:** `var(--neutro100)` (`#FFFFFF`).
       - **Borde:** `1px solid var(--neutro400)` (`#DDDDDD`).
       - **Radio de esquina:** `16px` (`1rem`).
       - **Sombra:** `var(--dropLV1)` (`0 2px 4px rgba(0, 0, 0, 0.15)`, clase `.sombraLV1` en `snd-guinda.css`) y `var(--dropLV2)` (`0 4px 8px rgba(0, 0, 0, 0.15)`) en `:hover`.
       - **Layout y Padding Móvil (`< 640px`, base):** `display: flex; flex-direction: column; padding: 16px; gap: 16px;`. Columna de año con divisor inferior `border-bottom: 1px solid var(--neutro400)`.
       - **Layout y Padding Tableta/Escritorio (`≥ 640px`):** `display: flex; flex-direction: row; align-items: center; padding: 24px; gap: 24px;`. Columna de año a la izquierda (`min-width: 120px`) con divisor vertical derecho `border-right: 1px solid var(--neutro400)` (homologado con `.reticulaGrid__divider` de `snd-guinda.css`), columna de información al centro (`flex: 1 1 auto`) y columna de acción a la derecha.
  2. **Tipografías Internas de la Tarjeta (`3.4 Tipografía` en `snd-v1.1.0-extraccion.md`):**
     - **Año (`2026`):** Reemplazar `fw-bold fs-3 style="color:#666;"` por `.sh0b color--neutro600 mb--0` (`24px`, Bold `700`, `line-height: 33px`).
     - **Título de sesión/resolución (`<h3>`):** Reemplazar `.h5b mb-2` (que en `snd-guinda.css` solo aplica con `.patria`) por `.sh1b color--neutro800 mb--8` (`20px`, Bold `700`, `line-height: 27px`).
     - **Subtítulo (`Tipo:` / `Número:`):** Reemplazar `<p class="mb-0 font-noto-sans"><strong>...` por `<p class="b1r color--neutro700 mb--0"><span class="b1sb color--neutro800">Tipo:</span> ...</p>` (`16px`, Regular `400` + Semibold `600`).
  3. **Botón Fantasma ("Acta" / "Resolución") (`4.2 Botones` en `snd-v1.1.0-extraccion.md` y líneas 3807–3958, 4067 de `snd-guinda.css`):**
     - **En `snd-guinda.css` y documentación SND (3 pestañas: Descripción, Diseño Desktop/Móvil, Desarrollo):** Sí existe completo con la clase `.boton__fantasma` (y modificador `.boton--vertical`).
     - **Estados oficiales de `.boton__fantasma`:**
       - `Default`: sin fondo/borde, texto e íconos en `var(--principal)` (`guinda-900`), tipografía `CTA` (`16px`, Semibold `600`), `min-height: 48px`, `border-radius: 8px`.
       - `Hover`: fondo `var(--gama100)` (`guinda-100`), texto e ícono `var(--gama600)` (`guinda-600`).
       - `Focus` (`:focus-visible`): fondo `var(--gama100)`, `outline: 2px solid var(--principal)`.
       - `Active`: fondo `var(--gama200)`, texto `var(--gama950)`.
       - `Disabled`: texto `var(--neutro500)`, sin fondo.
     - **Decisión pendiente de confirmar con el usuario al retomar:**
       - **Opción 1 (Botón Fantasma Horizontal estándar SND):** Un solo `<button type="button" class="boton__fantasma" data-modal-target="#pdfViewerModal" data-pdf-url="..." data-pdf-title="...">` en línea con `<i class="snd__icono snd-document--pdf icono--24"></i>`, texto `Acta`/`Resolución` e `<i class="snd__icono snd-chevron--right icono--20"></i>`.
       - **Opción 2 (Botón Fantasma Vertical `.boton__fantasma.boton--vertical` + chevron):** Ícono PDF centrado arriba de la palabra `Acta`/`Resolución` usando la clase oficial `.boton__fantasma.boton--vertical` acompañado del chevron `›` a su derecha.
  4. **Alineación en Retícula (`3.5 Retícula`) y Limpieza:**
     - Envolver `#sesiones-list-container`, `#resoluciones-list-container` y los contenedores `#sesiones-load-more-container` / `#resoluciones-load-more-container` dentro de `<div class="reticulaGrid__12"><div class="columna__12">...</div></div>` con separación entre tarjetas de `16px` en móvil (`< 640px`) y `24px` en escritorio (`≥ 1024px`).
     - Eliminar el bloque `<style>` roto e inconcluso en las líneas 253–264 de `template-transparencia-comite.php` (`.tx-pdf-action-btn:hover {` sin llave de cierre).

#### 2. Migas de pan / Breadcrumb (líneas 48–62)
- Actualmente usa `<nav class="cp-breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item">`. En `snd-guinda.css` (líneas 4781–4841) existen las clases nativas `.ruta__cont`, `.ruta__lista`, `.ruta__li`, `.ruta__a`, `.ruta__home`.

#### 3. Modal Visor de PDF (`template-parts/visor-pdf.php`) — Dejar al final
- Se revisará únicamente después de haber concluido todos los componentes del `body` de la página.
