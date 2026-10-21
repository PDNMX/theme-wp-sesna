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

### 🔘 Regla Normativa para Botones con Íconos (`4.2 Botones`)
En concordancia estricta con la pestaña **DESARROLLO** de la documentación oficial del SND (`4.2 Botones` en [`snd-v1.1.0-extraccion.md`](./snd-v1.1.0-extraccion.md#L516-L538)):
1. **Radio de borde:** Siempre el radio canónico estándar de **`8px`** (`border-radius: 8px`).
2. **Prohibición de `.boton--redondeado`:** En botones con íconos para acciones de contenido, tablas, tarjetas, barras de acción o modales (como *"Copiar enlace"*, *"Descargar PDF"*, *"Consultar"*, etc.), **está estrictamente prohibido usar la clase `.boton--redondeado`**. El modificador `.boton--redondeado` (`border-radius: 5rem`) queda reservado exclusivamente para botones destacados tipo píldora de solo texto en banners/heros principales (ej. *"Conoce el SNA"*).
3. **Estructura oficial HTML:**
   - **Horizontal con ícono (Primario, Secundario o Fantasma):**
     ```html
     <button type="button" class="boton__primario">
         <i class="snd__icono snd-<nombre> icono--16" aria-hidden="true"></i>
         Texto de la acción
     </button>
     <button type="button" class="boton__secundario">
         <i class="snd__icono snd-<nombre> icono--16" aria-hidden="true"></i>
         Texto de la acción
     </button>
     <button type="button" class="boton__fantasma">
         <i class="snd__icono snd-<nombre> icono--16" aria-hidden="true"></i>
         Texto de la acción
     </button>
     ```
   - **Vertical con ícono centrado sobre el texto:**
     ```html
     <button type="button" class="boton__primario boton--vertical">
         <i class="snd__icono snd-<nombre> icono--24" aria-hidden="true"></i>
         Texto de la acción
     </button>
     ```
4. **Espaciado nativo:** La separación entre el ícono y el texto se realiza automáticamente mediante `column-gap: 8px` nativo de `[class*="boton__"]` en `snd-guinda.css`; **nunca** añadir clases espaciadoras residuales de Bootstrap (`me-2`, `ms-2`, etc.).

### 🔣 Regla Obligatoria de Dimensionamiento de Íconos SND v1.1.0 (`width / height`)
Los íconos en el SND v1.1.0 son procesados en vivo por `snd.js` a partir de etiquetas `i.snd__icono` y renderizados como elementos **SVG** descargados desde el CDN (o `<img>`).
1. **Dimensionamiento por Caja (`width` y `height`):**
   - Los elementos SVG y gráficos vectoriales **NO escalan con `font-size`**. Por tanto, queda estrictamente prohibido usar únicamente `font-size: Npx;` para controlar el tamaño de un ícono `.snd__icono` en CSS.
   - Todo selector que defina dimensiones de un ícono en CSS debe declarar **`width: Npx; height: Npx;`** (pudiendo mantener `font-size: Npx` únicamente como fallback de compatibilidad).
2. **Escala Oficial de Clases `.icono--*` (`snd-guinda.css` L6061–6128):**
   - Siempre que sea posible en el marcado HTML, se deben utilizar las clases utilitarias canónicas del SND:
     - `.icono--16` (`16x16px` — Botones horizontales estándar, breadcrumbs, enlaces inline).
     - `.icono--20` (`20x20px` — Indicadores de selectores dropdown, chevrons de navegación).
     - `.icono--24` (`24x24px` — Botones verticales, cabeceras modales, acciones destacadas).
     - `.icono--32` (`32x32px` — Tarjetas de consulta, buscadores hero, spinners de carga).
     - `.icono--40` / `.icono--48` / `.icono--64` (Banners destacados e ilustraciones).

### 📐 Regla Obligatoria de Retícula SND v1.1.0 (`3.5 Retícula`) y Alineación en Fila (De Hoy en Adelante)
Toda IA que intervenga cualquier componente en cualquier plantilla **debe verificar y garantizar obligatoriamente que el componente respete la Retícula oficial de 12 columnas del SND (`3.5 Retícula` en [`snd-v1.1.0-extraccion.md`](./snd-v1.1.0-extraccion.md#L287-L365))**:

| Breakpoint SND | Sufijo CSS | Rango de Pantalla | Margen del `.contenedor` | Medianil (`gap`) | Uso de Columnas |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Móvil XS** (Extra pequeño) | *(sin sufijo)* / `--xs` | `< 576px` | `16px` | `16px` | `columna__12` (100% ancho, apilado) |
| **Móvil SM** (Pequeño) | `--sm` | `576px – 639px` (`< 640px`) | `16px` | `16px` | Sigue siendo **Móvil** (`columna__12`) |
| **Tableta MD** (Mediano) | `--md` | `≥ 640px` (`< 1024px`) | `24px` | `16px` | `columna__6--md` / `columna__12--md` |
| **Escritorio LG** (Grande) | `--lg` | `≥ 1024px` (`< 1536px`) | `56px` | `24px` | `columna__3--lg`, `columna__4--lg`, `columna__6--lg`, etc. |
| **Escritorio XL** (Extra grande) | `--xl` | `≥ 1536px` | `56px` (`max-width: 1416px`) | `24px` | 12 columnas |

1. **Estructuras de Contenedor y Fila Autorizadas (SND Nativo):**
   - **`.contenedor`:** Centra el contenido en pantalla (`max-width: 1416px` en XL) con márgenes responsivos normativos (`16px` móvil → `24px` tableta → `56px` escritorio).
   - **`.reticulaGrid__12`:** CSS Grid estricto de 12 columnas para layouts estructurales, formularios y filtros con medianil responsivo automático (`16px` móvil/tablet, `24px` desktop). Hijos obligatorios: `.columna__*`.
   - **`.fila`:** Contenedor Flex con `flex-wrap: wrap` y gap nativo para rejillas de tarjetas, listados o bloques fluidos. Hijos obligatorios: `.columna__*`.
   - **`.reticulaFlex`:** Contenedor Flex sin salto de línea (`flex-wrap: nowrap`) para barras de acción, grupos de botones, cabeceras o migas de pan en una sola línea continua. Soporta `.justify-content-space-between`, `.align-items-center`, etc.
2. **Prohibición Total de Grid Residual de Bootstrap:**
   - Queda estrictamente prohibido usar `.container`, `.container-fluid`, `.row`, `.col`, `.col-*`, `.d-flex`, `.d-none` o clases utilitarias de flex/grid de Bootstrap. Deben reemplazarse invariablemente por `.contenedor`, `.reticulaGrid__12` / `.fila`, `.columna__*` y clases utilitarias SND (`.muestra--flex`, `.muestra--ninguno`, etc.).
3. **Encapsulamiento en `.reticulaGrid__12 > .columna__*`:**
   - Todo bloque dentro de `.contenedor` (migas de pan, títulos, pestañas, filtros, tablas, tarjetas) debe insertarse dentro de un nivel de retícula oficial para asegurar alineación milimétrica con los bordes de la página.
4. **Alineación Vertical y Espaciado en Misma Fila:**
   - Cuando varios elementos comparten fila (ej. `Select` + `Búsqueda`, o `Botón` + `Texto`):
     - Etiquetas (`<label>`): misma clase (`.b1sb.dblock.color--neutro800.mb--8`).
     - Elementos interactivos: misma altura base normalizada de **48px** (`height: 48px; min-height: 48px; box-sizing: border-box;`).
     - Fila contenedora: utilizar `.align-items-end` para que las bases de los controles queden perfectamente enrasadas horizontalmente.

### 🏷️ Regla Obligatoria de Título Principal H1 y Hero de Página (Basada en Política Nacional)
Toda página interna intervenida **debe homologar su título principal H1 y la sección Hero tomando como referencia canónica la página de Política Nacional Anticorrupción** ([`page-politica-nacional-anticorrupcion.php`](../../sesna-v2/page-politica-nacional-anticorrupcion.php#L31-L39)):
1. **Estructura HTML:**
   ```html
   <!-- Hero -->
   <section class="sesna-page-hero">
       <div class="contenedor">
           <div class="reticulaGrid__12 align-items-center">
               <div class="columna__12 posicion--relativa z--1">
                   <h1 class="h1b patria color--pguinda600">Título de la Página</h1>
               </div>
           </div>
       </div>
   </section>
   ```
2. **Tipografía y Color:**
   - **Clase obligatoria:** `<h1 class="h1b patria color--pguinda600">`.
   - **Color:** Invariablemente `color--pguinda600` (`#9B2247`, guinda oficial del SND). Queda prohibido usar color negro (`#000`), gris o tamaños forzados ad-hoc (`.tx-section-title`, `.tx-comite-title`).
3. **Espaciado hacia el Siguiente Componente:**
   - En CSS se estandariza con `.sesna-page-hero`: `padding-top: 40px` (desktop) / `28px` (móvil), `padding-bottom: 20px` y `margin-bottom: 0`.
   - Esto fija un **espaciado vertical exacto y limpio de 20px** entre la base del título y el borde superior del siguiente componente (Tabs, tarjetas o filtros).

### Dinámica de trabajo con el usuario (Paso a Paso)
1. **Instrucción por componente:** El usuario indica qué plantilla y qué componente específico dentro del `body` desea ajustar (ej. *Tabs*, *Dropdown/Select*, *Barra de búsqueda*, *Cards*, *Breadcrumbs*, etc.).
2. **Verificación obligatoria en fuentes locales (sin inventar clases):**
   - Primero se verifica si el componente y sus clases existen en la copia local de la hoja oficial: [`docs/snd-guinda.css`](../../snd-guinda.css) (extraída íntegra de `https://framework-gb.cdn.gob.mx/snd/v1.1.0/snd-guinda.css`).
   - Segundo, se revisan las **3 pestañas (`Descripción`, `Diseño` Desktop/Móvil y `Desarrollo`)** en [`snd-v1.1.0-extraccion.md`](./snd-v1.1.0-extraccion.md) y [`REFERENCIA-TECNICA-SND.md`](../REFERENCIA-TECNICA-SND.md).
   - Tercero, se consulta el catálogo de componentes ya extraídos en [`catalogo-componentes-figma-extraidos.md`](./catalogo-componentes-figma-extraidos.md).
3. **Reporte y Propuesta antes de editar:**
   - Se informa al usuario si el componente existe en `snd-guinda.css` (y si su CSS está completo o incompleto respecto a las pestañas `Diseño` y `Desarrollo`) o si solo está diseñado en Figma (`SND | UI Kit`).
   - Se presenta la propuesta técnica (HTML + CSS Desktop/Móvil alimentado 100% con variables de `:root` de `snd-guinda.css`) y se aplica tras la confirmación del usuario.
4. **Verificación técnica:**
   - Validar sintaxis PHP con `php -l <archivo.php>`.
   - Cero clases inventadas fuera del estándar y cero regresiones de accesibilidad (WCAG 2.1 AA) o de lógica de negocio (queries de WordPress, filtros JS, modales).

### 📡 Regla Obligatoria de Extracción vía Figma API (cuando el componente NO exista en `snd-guinda.css`)

Si al completar el **Paso 2** (verificación en fuentes locales) el componente o alguna de sus clases **no aparece en `snd-guinda.css`** (ni la hoja CDN trae sus propiedades completas de la pestaña `Diseño`) **y tampoco está ya documentado** en [`catalogo-componentes-figma-extraidos.md`](./catalogo-componentes-figma-extraidos.md), la IA **debe conectarse a la API REST de Figma** para extraer la anatomía oficial del componente desde el archivo `SND | UI Kit` (`kW8LFCzYEiBxCgHu6gBD66`), en vez de inventar medidas o inferirlas únicamente de otras páginas del sitio. Pasos:

1. **Solicitar el token en ese momento:** Pedir al usuario su Personal Access Token de Figma (`figd_...`) **únicamente cuando se detecte esta carencia** — nunca se asume, se guarda en el repositorio, ni se reutiliza de una sesión anterior (los tokens suelen expirar en ~1 día). Si el usuario no lo tiene a la mano, indicarle los pasos de generación de la Sección 2 de [`metodo-extraccion-figma-api-snd.md`](./metodo-extraccion-figma-api-snd.md) (5 scopes de solo lectura).
2. **Ubicar el `node_id`:** Buscar primero en el índice de la Sección 5 de [`metodo-extraccion-figma-api-snd.md`](./metodo-extraccion-figma-api-snd.md) (páginas de Átomos/Moléculas/Organismos ya mapeadas). Si el componente no está indexado ahí, pedir al usuario el enlace de Figma con `node-id=`.
3. **Consultar la API una sola vez por lote:** Seguir el Paso 4 de ese mismo documento (`GET /v1/files/.../nodes?ids=...`), guardando la respuesta en un archivo local y evitando repetir llamadas (cuidado con el rate limit `HTTP 429`: reintentar con espera progresiva, nunca en bucles cortos consecutivos).
4. **Procesar con los scripts Python del método** (Secciones 4.3 y 4.4) para obtener medidas, colores HEX, radios, tipografía y estados (`Default`, `Hover`, `Focus`, `Active`, `Disabled`, etc.) de todas las variantes del `componentSetId`.
5. **Anexar el hallazgo a `catalogo-componentes-figma-extraidos.md`:** Una vez construida y confirmada con el usuario la propuesta HTML/CSS (alimentada 100% con variables `:root` de `snd-guinda.css`), se agrega como una nueva sección numerada en ese catálogo (anatomía, tabla de estados/tokens, HTML reutilizable, CSS reutilizable y, si aplica, JS controlador), siguiendo el mismo formato ya usado para `Tabs`, `Select/Dropatom`, `Barra de búsqueda` y `Card + Botón fantasma`. Esto evita volver a consultar Figma para ese componente en futuras homologaciones de otras páginas del proyecto.

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
6. **Tarjetas de Sesiones y Resoluciones (`.tx-sesion-card` / `.tx-resolucion-card`) + Botón Fantasma ("Acta" / "Resolución"):**
   - Estandarizadas conforme al componente **Card** de Figma (`37597:51336`) y **Botón Fantasma Horizontal** (`4.2 Botones`).
   - Superficie con fondo `var(--neutro100)`, borde `1px solid var(--neutro400)`, radio `16px` y sombra `.sombraLV1`. Layout responsivo en flexbox con divisor vertical para el año en escritorio y divisor inferior en móvil.
   - Tipografía estandarizada: año en `.sh0b`, títulos en `.sh1b` y subtítulos en `.b1r` + `.b1sb`.
   - Botón fantasma `.boton__fantasma` con `<i class="snd__icono snd-document--pdf icono--24"></i>`, texto e `<i class="snd__icono snd-chevron--right icono--20"></i>`.
7. **Modal Visor de PDF (`template-parts/visor-pdf.php`):**
   - Estandarizado al 100% bajo el SND v1.1.0 (Organismo Figma `Modales *`, nodo `1749:13690`).
   - Cero clases residuales de Bootstrap: estructura BEM (`.tx-pdf-modal__dialog`, `.tx-pdf-modal__content`, `.tx-pdf-modal__header`, `.tx-pdf-modal__body`, `.tx-pdf-modal__footer`).
   - Backdrop institucional `rgba(22, 26, 29, 0.56)` (`neutro-800` al 56%), superficie con radio `16px`, borde `1px solid var(--neutro400)` y sombra Drop LV 3 (`0 6px 12px rgba(0,0,0,0.20)`).
   - Título `.sh1b.patria.color--principal`, botón de cierre circular `.boton__fantasma.tx-pdf-modal__close-btn` (`44x44px`) con `snd-close icono--24`.
   - Cuerpo de alto contraste con `var(--neutro800)`, loader accesible con `snd-snd-loading2` y footer con `.boton__secundario.boton--redondeado` ("Copiar enlace" con feedback `.is-copied`) y `.boton__primario.boton--redondeado` ("Descargar PDF").

### ⏳ Pendiente por Hacer en `template-transparencia-comite.php`

#### 1. Migas de pan / Breadcrumb (líneas 48–62)
- Actualmente usa `<nav class="cp-breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item">`. En `snd-guinda.css` (líneas 4781–4841) existen las clases nativas `.ruta__cont`, `.ruta__lista`, `.ruta__li`, `.ruta__a`, `.ruta__home`.

