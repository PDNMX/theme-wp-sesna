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

### 🧭 Regla Obligatoria de Migas de Pan / Breadcrumb (SND v1.1.0)
Toda página interna que incluya ruta de navegación (`Breadcrumb`) debe usar **exclusivamente** las clases nativas del SND v1.1.0 definidas en [`docs/snd-guinda.css`](../../snd-guinda.css#L4781-L4841) (`.ruta__cont`, `.ruta__lista`, `.ruta__li`, `.ruta__a`), tomando como referencia canónica [`template-transparencia-comite.php`](../../../sesna-v2/template-transparencia-comite.php#L48-L62):
```html
<!-- Breadcrumb -->
<nav class="ruta__cont" aria-label="Ruta de navegación">
    <div class="contenedor">
        <ul class="ruta__lista">
            <li class="ruta__li">
                <a href="<?= esc_url( home_url('/') ) ?>" class="ruta__a"><i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio</a>
            </li>
            <li class="ruta__li">
                <a href="<?= esc_url( home_url('/seccion-padre/') ) ?>" class="ruta__a">Sección Padre</a>
            </li>
            <li class="ruta__li">
                <span class="ruta__a" aria-current="page">Página Actual</span>
            </li>
        </ul>
    </div>
</nav>
```
- **Reglas clave:**
  - Prohibido usar `.cp-breadcrumb`, `.breadcrumb`, `.breadcrumb-item` o separadores manuales (`/` o `>`). El pseudo-elemento `.ruta__li:after` de `snd-guinda.css` inyecta automáticamente el separador oficial `chevron--right.svg` (`24×24px`, `opacity: 0.55`, `margin: 0 8px 0 16px`) y lo omite en `:last-of-type`.
  - El primer enlace ("Inicio") lleva `<i class="snd__icono snd-home icono--20" aria-hidden="true"></i>` (con `margin-right: 6px` complementado en `main.css` L2042–2045).
  - El último nivel (página actual) usa `<span class="ruta__a" aria-current="page">` (no un enlace `<a>`).

### 🃏 Regla Obligatoria de Superficie Base para Todas las Cards (SND v1.1.0)
Toda tarjeta (`Card`) en cualquier página del sitio debe homologar obligatoriamente sus 4 propiedades base de superficie con las cards de la página principal (`Home`: `.sna-integrantes-card`, `.sna-noticias-card`) y las especificaciones extraídas de Figma (`Cards *`: `12022:57247` / `37597:51336`):
```css
background-color: var(--neutro100);
border: 1px solid var(--neutro400);
border-radius: 16px;
box-shadow: var(--dropLV1);
```
- Cuando la tarjeta sea interactiva o clicable, su estado `:hover` debe elevar la sombra a `box-shadow: var(--dropLV2);`.
- Nunca omitir `border: 1px solid var(--neutro400);`, ya que garantiza el contraste y delimitación visual sobre cualquier fondo institucional.

### 🔽 Regla Obligatoria de Botones "Ver más" / Carga Progresiva (SND v1.1.0)
Todo botón de carga progresiva ("Ver más sesiones", "Ver más resoluciones", "Ver más documentos") debe homologarse con el componente **`4.2 Botones` (`.boton__fantasma`)** dentro de la retícula SND:
```html
<div class="reticulaGrid__12">
    <div class="columna__12">
        <div class="texto--centro mt--32" id="sesiones-load-more-container">
            <button type="button" id="sesiones-btn-more" class="boton__fantasma">
                Ver más sesiones <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>
```
- Usar siempre `<button type="button" class="boton__fantasma">` (nunca `<a href="javascript:void(0)">`) e ícono `<i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>` sin clases de margen de Bootstrap (`ms-2`, `text-center`, `mt-5`).

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

## 3. Estado de Páginas ya Estandarizadas (100% Completadas)

### A. `template-transparencia-comite.php` (100% Completada)
**Archivo:** [`sesna-v2/template-transparencia-comite.php`](../../../sesna-v2/template-transparencia-comite.php)  
**Hoja de estilos del tema:** [`sesna-v2/assets/css/main.css`](../../../sesna-v2/assets/css/main.css)

1. **Migas de pan / Breadcrumb (líneas 48–62):**
   - Estandarizadas al 100% con `<nav class="ruta__cont" aria-label="Ruta de navegación">`, `<div class="contenedor">`, `<ul class="ruta__lista">`, `<li class="ruta__li">`, `<a class="ruta__a">` (`<i class="snd__icono snd-home icono--20">`) y `<span class="ruta__a" aria-current="page">`.
2. **Título Principal H1 y Hero (`.sesna-page-hero`, líneas 65–73):**
   - `<section class="sesna-page-hero"><div class="contenedor"><div class="reticulaGrid__12 align-items-center"><div class="columna__12 posicion--relativa z--1"><h1 class="h1b patria color--pguinda600">Comité de Transparencia</h1>...`.
3. **Pestañas / Tabs (`#comiteTabs` y `#comiteTabsContent`, líneas 79–96):**
   - Estandarizadas con **`Tabs 2`** de Figma (`1562:4021` / `16460:3792`), encapsuladas en `.reticulaGrid__12.mb--32 > .columna__12`.
4. **Filtros Desplegables `<select>` (`#filter-anio`, `#filter-tipo`, `#filter-anio-res`):**
   - Estandarizados con **`Select / Dropatom`** (`height: 48px`, `border-radius: 8px`, `1px solid var(--neutro400)`), etiquetas `.b1sb.dblock.color--neutro800.mb--8` y chevron `snd-chevron--down icono--20`.
5. **Barra de Búsqueda Interna `#search-res` (en `#resoluciones-pane`):**
   - Estandarizada conforme a **`4.1 Barra de búsqueda` (variante sección interna sin botón)** con `<form class="search-container" role="search" id="form-search-res">` + `<div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">`.
6. **Tarjetas de Sesiones y Resoluciones (`.tx-comite-card`) + Botón Fantasma ("Acta" / "Resolución"):**
   - Superficie base `var(--neutro100)`, `1px solid var(--neutro400)`, `border-radius: 16px`, `box-shadow: var(--dropLV1)` (`:hover` `var(--dropLV2)`).
   - Botón `.boton__fantasma` horizontal con `:focus-visible` oficial (`2px solid var(--principal)`).
7. **Botones de Carga Progresiva ("Ver más sesiones" / "Ver más resoluciones", líneas 166–175 y 244–253):**
   - `<button type="button" id="sesiones-btn-more" class="boton__fantasma">Ver más sesiones <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i></button>` dentro de `.reticulaGrid__12 > .columna__12 > .texto--centro.mt--32`.
8. **Modal Visor de PDF (`template-parts/visor-pdf.php`):**
   - Estandarizado bajo el Organismo Figma `Modales *` (`1749:13690`), con botones `.boton__secundario` y `.boton__primario` de radio `8px`.

---

### B. `page-transparencia.php` (100% Completada)
**Archivo:** [`sesna-v2/page-transparencia.php`](../../../sesna-v2/page-transparencia.php)

1. **Hero Banner (`.tx-banner`):** Botón CTA homologado a `<a class="boton__primario">` con `<i class="snd__icono snd-launch icono--16" aria-hidden="true"></i>` en línea.
2. **Tarjetas de Secciones de Transparencia (`.tx-card`):** Superficie base homologada (`background-color: var(--neutro100)`, `border: 1px solid var(--neutro400)`, `border-radius: 16px`, `box-shadow: var(--dropLV1)` y `var(--dropLV2)` en `:hover`).
3. **Sección "Consulta información pública" (`.tx-consulta-card`):** Superficie base de card homologada (`var(--neutro100)`, `1px solid var(--neutro400)`, `border-radius: 16px`, `var(--dropLV1)`) y botones homologados a `.boton__primario` con `snd-launch icono--16`.
4. **Banda de Contacto (`.tx-contacto`):** Homologada con `.reticulaFlex.align-items-center.justify-content-flex-start.justify-content-center--md.gap--16`, etiquetas `.sdr.dblock.color--neutro600.mb--4`, enlaces `.b1b.color--pguinda600.mb--0`, íconos `24×24px` (`snd-email`, `snd-phone`, `snd-location`) y fondo `var(--neutro200)` con borde superior `1px solid var(--neutro400)`.

---

### C. `template-transparencia-datospersonales.php` (100% Completada)
**Archivo:** [`sesna-v2/template-transparencia-datospersonales.php`](../../../sesna-v2/template-transparencia-datospersonales.php)

1. **Migas de pan / Breadcrumb (líneas 15–29):** Homologadas a `<nav class="ruta__cont"> > .contenedor > .ruta__lista > .ruta__li > .ruta__a` con `snd-home icono--20`.
2. **Hero / Título Principal H1 y Descripción (`.sesna-page-hero`, líneas 32–44):** Homologados con `<h1 class="h1b patria color--pguinda600">Datos Personales</h1>` y `<p class="sh1r color--neutro600 mb--0">` con espaciado inferior de `20px` (`.page-transparencia-datos .sesna-page-hero` en `main.css` L5552–5556).
3. **Filtros Desplegables (`#filter-anio` y `#filter-tipo`, líneas 50–81):** Homologados con **`Select / Dropatom`** (`.tx-select-wrap`, `.tx-comite-select.tx-comite-filter-control`, `snd-chevron--down icono--20 tx-select-chevron`) dentro de `.reticulaGrid__12.mb--32.align-items-end` (`columna__12 columna__6--md columna__3--lg` / `columna__4--lg`).
4. **Tarjetas de Documentos (`.tx-comite-card`, líneas 84–116):** Homologadas al 100% con `template-transparencia-comite.php` (superficie base `var(--neutro100)`, `1px solid var(--neutro400)`, `border-radius: 16px`, `box-shadow: var(--dropLV1)` / `var(--dropLV2)` en `:hover`, tipografía `.sh0b`, `.sh1b`, `.b1r` + `.b1sb` y botón `.boton__fantasma` horizontal con `snd-document--pdf icono--24`, "Consultar" y `snd-chevron--right icono--20`). Se corrigió también en JS `card.style.display = ''` para preservar `display: flex`.
5. **Botón de Carga Progresiva ("Ver más documentos", líneas 119–127):** Homologado a `<button type="button" id="documentos-btn-more" class="boton__fantasma">` con `snd-chevron--down icono--20` dentro de `.reticulaGrid__12 > .columna__12 > .texto--centro.mt--32`.

---

### D. `template-transparencia-normatividad.php` (100% Completada)
**Archivo:** [`sesna-v2/template-transparencia-normatividad.php`](../../../sesna-v2/template-transparencia-normatividad.php)

1. **Migas de pan / Breadcrumb (líneas 32–46):** Homologadas a `<nav class="ruta__cont"> > .contenedor > .ruta__lista > .ruta__li > .ruta__a` con `snd-home icono--20`.
2. **Hero / Título Principal H1 y Descripción (`.sesna-page-hero`, líneas 49–60):** Homologados con `<h1 class="h1b patria color--pguinda600">Normativa</h1>` y `<p class="sh1r color--neutro600 mb--0">` con espaciado inferior de `20px` (`.page-transparencia-normatividad .sesna-page-hero` en `main.css` L5553–5557).
3. **Card Principal y Tabla de Normativa (`4.11 Tabla` Figma `12022:54768` / `9083:41328`, líneas 66–113):**
   - Contenedor `.tx-normativa-card` con las 4 propiedades base obligatorias (`background-color: var(--neutro100)`, `border: 1px solid var(--neutro400)`, `border-radius: 16px`, `box-shadow: var(--dropLV1)`), sin líneas decorativas inline ni clases de Bootstrap.
   - Tabla `.tx-table-normatividad` dentro de `.tx-table-responsive` (`border: 1px solid var(--neutro400)`, `border-radius: 8px`, `overflow-x: auto`), con cabecera `<thead> th` en `background-color: var(--principal)` (`#611232`) y texto `var(--neutro100)` (`#FFFFFF`), `padding: 12px 16px`, filas `<tbody> tr` con `border-bottom: 1px solid var(--neutro300)` y `:hover` `var(--neutro200)`, y acción con `.boton__fantasma` (`Consultar` + `snd-launch icono--20`).
4. **Card de Redirección "¿Deseas consultar más normativa?" (`.tx-normativa-card--cta`, líneas 116–133):**
   - Homologada con las 4 propiedades base de Card (`var(--neutro100)`, `1px solid var(--neutro400)`, `border-radius: 16px`, `var(--dropLV1)`), ícono `.tx-normativa-card__icon` (`snd-building icono--32 color--pguinda600`), tipografía `.sh1b` + `.b1r` y botón `.boton__secundario` con `snd-arrow--right icono--20`.

---

### E. `template-transparencia-unidad.php` (100% Completada)
**Archivo:** [`sesna-v2/template-transparencia-unidad.php`](../../../sesna-v2/template-transparencia-unidad.php)

1. **Migas de pan / Breadcrumb (líneas 13–27):** Homologadas a `<nav class="ruta__cont"> > .contenedor > .ruta__lista > .ruta__li > .ruta__a` con `snd-home icono--20`.
2. **Hero / Título Principal H1 (`.sesna-page-hero`, líneas 30–38):** Homologado con `<h1 class="h1b patria color--pguinda600">Unidad de Transparencia</h1>` con espaciado inferior de `20px` (`.page-transparencia-unidad .sesna-page-hero` en `main.css` L5553–5558).
3. **Card Principal de Unidad de Transparencia (`.tx-unidad-card`, líneas 41–143 y `main.css` L6098–6278):**
   - Encapsulada en `.reticulaGrid__12 > .columna__12` con las 4 propiedades base obligatorias (`background-color: var(--neutro100)`, `border: 1px solid var(--neutro400)`, `border-radius: 16px`, `box-shadow: var(--dropLV1)`, `overflow: hidden`), eliminando todas las clases y estilos inline legacy de Bootstrap.
   - **Columna Izquierda (`columna__12 columna__6--lg tx-unidad-card__body`):** Párrafo `.b1r.color--neutro700.mb--24`, divisor `.tx-unidad-divider.mb--24` (`1px solid var(--neutro400)`), lista de datos `.tx-unidad-info-list` con círculos de ícono `.tx-unidad-icon-circle` (`48×48px`, `background-color: var(--pguinda100)`, `color: var(--pguinda600)` e íconos `snd-location`, `snd-phone`, `snd-timer`, `snd-email` con `icono--24 color--pguinda600`), subtítulos `.b1sb.color--pguinda600.mb--4` y valores `.b1r.color--neutro700` / enlaces `.tx-unidad-link`.
   - **Columna Derecha — Mapa (`columna__12 columna__6--lg tx-unidad-card__map-col`):** Contenedor `.tx-unidad-map-container` con `border: 1px solid var(--neutro400)`, `border-radius: 12px` y `title` accesible en el `<iframe>`.
   - **Pie de Card (`.tx-unidad-card__footer`):** Fondo `var(--pguinda100)`, borde superior `1px solid var(--neutro400)`, ícono `.tx-unidad-icon-circle--white` con `snd-security icono--24 color--pguinda600`, texto `.b1sb.color--neutro800.mb--0` y franjas decorativas con tokens oficiales (`var(--principal)`, `var(--pguinda600)`, `var(--pguinda300)`).

---

### F. `page-organos-colegiados.php` (100% Completada)
**Archivos:** [`sesna-v2/page-organos-colegiados.php`](../../../sesna-v2/page-organos-colegiados.php), [`sesna-v2/functions.php`](../../../sesna-v2/functions.php) (L2160–2444), [`sesna-v2/script/organos-colegiados.js`](../../../sesna-v2/script/organos-colegiados.js) y [`sesna-v2/assets/css/main.css`](../../../sesna-v2/assets/css/main.css)

1. **Migas de pan / Breadcrumb (líneas 29–46):** Homologadas a `<nav class="ruta__cont"> > .contenedor > .ruta__lista > .ruta__li > .ruta__a` con `snd-home icono--20`.
2. **Hero / Título Principal H1 y Descripción (`.sesna-page-hero`, líneas 49–67):** Homologados con `<h1 class="h1b patria color--pguinda600">Órganos Colegiados</h1>` y `<p class="sh1r color--neutro600 mb--0">` con espaciado inferior de `20px` (`.page-organos-colegiados .sesna-page-hero` en `main.css` L5553–5561).
3. **Pestañas / Tabs Horizontales (`Tabs 2` Figma `1562:4021`, líneas 72–103):** Homologadas con `.reticulaGrid__12.mb--32 > .columna__12 > .tx-comite-tabs-container.ocn-tabs-nav > ul.ul--limpio.tx-comite-tabs[role="tablist"] > li[role="presentation"] > button.tx-comite-tab.js-tab-link[role="tab"][aria-selected="true|false"]` y navegación accesible por teclado (`ArrowLeft`, `ArrowRight`, `Home`, `End`) en `organos-colegiados.js`.
4. **Tarjetas de Estadísticas (`sesna_render_oc_stats_cards()` en `functions.php` L2160–2192):** Homologadas con `.ocn-stat-card` con las 4 propiedades base obligatorias (`background-color: var(--neutro100)`, `border: 1px solid var(--neutro400)`, `border-radius: 16px`, `box-shadow: var(--dropLV1)`), número `.h2b.patria.color--neutro800.mb--4` y etiqueta `.sdr.peso--negrita.texto--mayusculas.color--pguinda600.texto--centro` dentro de `.reticulaGrid__12.mb--32`.
5. **Filtros Desplegables (`#filter-anio-*` y `#filter-tipo-*` en las 3 secciones):** Homologados con **`Select / Dropatom`** (`<label class="b1sb dblock color--neutro800 mb--8">`, `.tx-select-wrap`, `.tx-comite-select.tx-comite-filter-control`, `snd-chevron--down icono--20 tx-select-chevron`) dentro de `.reticulaGrid__12.mb--32.align-items-end` (`columna__12 columna__6--md columna__3--lg` / `columna__4--lg`).
6. **Tarjetas de Sesiones con 5 Slots de Acción y Panel Desplegable de Anexos (`sesna_render_oc_sesion_card()`, `sesna_render_oc_anexos_toggle()`, `sesna_render_oc_anexos_panel()` en `functions.php` L2330–2423):**
   - Contenedor `.tx-oc-card.tx-sesion-card` con las 4 propiedades base obligatorias (`var(--neutro100)`, `1px solid var(--neutro400)`, `border-radius: 16px`, `box-shadow: var(--dropLV1)` y `:hover` `var(--dropLV2)`).
   - Fecha `.tx-oc-card__date` (`.h3b.color--neutro800`, `.sdr.peso--negrita.texto--mayusculas.color--pguinda600`, `.b2sb.color--neutro600`), información `.tx-oc-card__info` (`.sh1b.color--neutro800.mb--8`, `.b1r.color--neutro700` + `.b1sb.color--neutro800`) y grilla de slots `.tx-oc-slots` con `.tx-oc-slot-btn` (`icono--24`, `:hover` `var(--pguinda100)` + `var(--principal)`, estado deshabilitado `.tx-oc-slot-btn--disabled` con `var(--neutro500)`).
   - Panel desplegable `.tx-oc-anexos-panel` (`background-color: var(--neutro200)`, `border-top: 1px solid var(--neutro400)`), buscador interno homologado a **`4.1 Barra de búsqueda`** (`.form__inset.general-search.tx-comite-search-box.tx-comite-filter-control.tx-oc-anexos-search-box` con estado `.is-filled`) y filas `.tx-oc-anexo-row` (`var(--neutro100)`, `1px solid var(--neutro400)`, `border-radius: 8px`, `:hover` `var(--pguinda100)` e íconos `color--pguinda600`).
7. **Tarjetas de Recomendaciones y Exhortos (`sesna_render_oc_lista_directa_item()` en `functions.php` L2425–2444):** Homologadas al 100% con `.tx-comite-card.tx-sesion-card`, título `.sh1b.color--neutro800.mb--0.tx-comite-card-title` y botón `<button type="button" class="boton__fantasma">` con `icono--24`, `"Descargar"` y `snd-chevron--right icono--20`.
8. **Botones de Carga Progresiva ("Ver más sesiones"):** Homologados a `<button type="button" class="boton__fantasma" id="sesiones-vermas-btn-...">Ver más sesiones <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i></button>` dentro de `.reticulaGrid__12 > .columna__12 > .texto--centro.mt--32`.
9. **Modal Visor de Video (`#oc-video-modal`, líneas 326–340):** Homologado con la estructura BEM de `template-parts/visor-pdf.php` (`.tx-pdf-modal__dialog`, `.tx-pdf-modal__content`, `.tx-pdf-modal__header`, `.tx-pdf-modal__title`, `.boton__fantasma.tx-pdf-modal__close-btn`, `.tx-pdf-modal__body`, `.tx-pdf-modal__iframe`).

