# Referencia Técnica SND - Sistema de Diseño (Tema Guinda)

> Nota de origen: este documento se escribió originalmente en la rama `snd-migracion`
> como `SND-GUINDA-CONTEXTO.md`. Se consolidó aquí, en `docs/snd-migration/`, como
> referencia técnica del framework (qué es y cómo funciona el SND) — complementa, sin
> reemplazar, a `ESTADO-MIGRACION-SND.md`, que es el tracker de avance del proyecto.
> Ver la nota de reconciliación en la sección 0 de ese documento.

Este documento contiene la especificación técnica exhaustiva derivada del análisis del framework SND del Gobierno de México (CSS y JS), complementada con la extracción documental oficial, centrada estrictamente en el **TEMA GUINDA**. 

Sirve como fuente de verdad técnica oficial e infalible para la migración de aplicaciones web existentes hacia este estándar. La información se clasifica claramente entre datos explícitos del framework, deducciones técnicas e información no disponible.

---

## 1. Reglas Globales de Migración y Uso

*(Información explícita oficial proveniente del PDF y CSS)*

**Debe utilizarse obligatoriamente:**
* El **Tema GUINDA** en su totalidad (orientado a proyectos de carácter federal).
* La hoja de estilos oficial: `snd-guinda.css`.
* El script oficial: `snd-js.js`.
* Componentes y clases oficiales del SND documentadas en este archivo.
* Patrones de comportamiento responsive definidos por el sistema.
* Atributos ARIA y consideraciones de accesibilidad global (`focus-visible`, clases ocultas).

**No debe utilizarse (Restricciones explícitas):**
* **Mezcla de temas**: No se combinan guinda y verde, ni dorado en un mismo proyecto o componente. La hoja de estilos del tema verde (`snd-verde.css`) está terminantemente prohibida en esta implementación.
* **Colores y Tipografías ajenas**: Prohibido usar colores fuera de la paleta, combinaciones de bajo contraste o tipografías externas. Todo color debe provenir de las clases utilitarias (`.color--`, `.fondo--`) o variables CSS oficiales.
* **Inventar componentes**: Prohibido crear componentes o clases cuando exista un componente oficial del framework que cubra la necesidad.
* **Asignación errónea de semántica**: No asignar significados erróneos (ej. rojo para éxito, amarillo para error crítico).

---

## 2. Arquitectura del CSS

*(Información inferida del análisis del CSS original)*

El CSS proporcionado (Tema Guinda) utiliza un enfoque híbrido:
1. **Resets globales**: Incluye `normalize.css` y define `box-sizing: border-box` en todos los elementos. Fija un `html { font-size: 16px; }`.
2. **Variables CSS (Custom Properties)**: Define la paleta de colores, sombras y espaciados principales en la pseudo-clase `:root`.
3. **Clases Utilitarias (Utility-first)**: Extenso sistema de clases para margen (`.m--`), padding (`.p--`), color, flexbox, grid, texto.
4. **BEM Modificado para Componentes**: Utiliza una sintaxis similar a BEM (`.componente__elemento--modificador`) para encapsular estilos de componentes.

---

## 3. Sistema Visual Guinda

*(Información explícita oficial proveniente del PDF y CSS)*

### 3.1. Paleta de Colores Institucionales

| Referencia | Valor Hex | Uso Principal |
| ---------- | --------- | ------------- |
| `--principal` | `#611232` | Color base del tema (igual a `--pguinda900`). Elementos UI, fondos activos. |
| `--pguinda100` a `--pguinda800` | (Variados) | Variaciones de Guinda para hovers, fondos, degradados. |
| `--pguinda900` | `#611232` | Fondo de cabecera (`.mexico`), menú lateral activo, botones primarios. |
| `--pguinda950` | `#4A0C26` | Fondo del subheader, estados oscuros (`hover`, `active`). |
| `--dorado100` a `--dorado950` | (Variados) | Detalles, elementos de contraste (el nivel 600 `#A57F2C` es el principal de la gama). |
| `--neutro100` | `#FFFFFF` | Fondos blancos puros, tarjetas. |
| `--neutro200` | `#F9F9F9` | Fondo general del `body` e inputs. |
| `--neutro300` | `#F3F3F3` | Bordes ligeros, fondos de píldoras. |
| `--neutro400` | `#DDDDDD` | Divisores, líneas (`hr`), estados deshabilitados. |
| `--neutro500` | `#AAAAAA` | Texto deshabilitado. |
| `--neutro600` | `#767676` | Texto secundario. |
| `--neutro700` | `#434343` | Texto terciario o complementario. |
| `--neutro800` | `#161A1D` | Texto principal, iconos y color default tipográfico. |

### 3.2. Colores de Validación (Semánticos)

| Color | Tono 100 (Fondo) | Tono 500 (Texto/Borde) | Equivalente Semántico |
| --- | --- | --- | --- |
| **Rojo** | `#FAE5E5` | `#9B0F15` | **error** |
| **Verde** | `#F0FAF5` | `#086308` | **exito** |
| **Azul** | `#EDF2FE` | `#224497` | **info** |
| **Amarillo**| `#FFEB99` | `#684700` | **alerta** |
| **Morado** | `#ECE2F5` | `#6708C1` | (Sin equivalente semántico) |
| **Naranja** | `#F9D9A9` | `#6E3700` | (Sin equivalente semántico) |

### 3.3. Sombras

| Clase/Variable | Valor (Box-shadow) | Uso | Origen |
| --- | --- | --- | --- |
| `--dropLV1` / `.sombraLV1` | `0 2px 4px rgba(0,0,0,0.15)` | Elevación baja de componentes. | Explícito (CSS) |
| `--dropLV2` / `.sombraLV2` | `0 4px 8px rgba(0,0,0,0.15)` | Elevación media, modales o tooltips. | Explícito (CSS) |
| *(Inferido)* LV3 | `0px 6px 12px 0px #000000` | Usado en envolvente de barra de búsqueda. | Deducido del PDF |

---

## 4. Tipografía

*(Información explícita oficial proveniente del PDF y CSS)*

El framework define dos familias tipográficas base, con `letter-spacing: 0%` en todos los estilos.

| Familia | Uso | Archivos Requeridos |
| --- | --- | --- |
| **Noto Sans** | Fuente predeterminada (default). Todo el cuerpo del sitio, doc oficial. | `NotoSans-VariableFont...` |
| **Patria** | Títulos especiales, branding institucional. **Solo para H1-H6**. | `Patria_Light/Regular/Bold.otf` |

### 4.1 Escala Jerárquica y Tamaños (Noto Sans)

| Nivel / Clase Base | Tamaño (pt) | Line Height | Pesos Disponibles (Sufijos) |
| --- | --- | --- | --- |
| `.h0*` | `56` | `60` | `bl` (Black), `b` (Bold), `m` (Medium) |
| `.h1*` | `40` | `54` | `b` (Bold), `m` (Medium) |
| `.h2*` | `32` (Límite móvil)| `44` | `b` (Bold), `m` (Medium) |
| `.sh0*` | `24` | `33` | `b`, `m`, `r` (Regular) |
| `.sh1*` | `20` | `27` | `b`, `m`, `r` (Regular) |
| `.b1*` (Body)| `16` | `22` | `sb` (Semibold), `m`, `r`, `it` (Itálica) |
| (Botones CTA) | `16` | `22` | `sb` (Semibold) |
| `.sd*` (Detalles)| `14` (Límite móvil)| `19` | `sb`, `r` |
| `.xsd*` (Extra)| `12` | `16` | `sb`, `r` (Solo escritorio) |

*Nota sobre Patria:* Se añade la clase `.patria` junto a la clase de encabezado (ej. `<h1 class="h1b patria">`).
*Color de texto:* Por defecto `neutro800`.

---

## 5. Layout, Retícula y Responsive

*(Información explícita oficial proveniente del PDF y CSS)*

El SND utiliza un sistema de **12 columnas** con breakpoints responsivos basados en Grid y Flexbox.

> **Nota de Trazabilidad (Discrepancia Oficial):** El framework SND presenta una inconsistencia nativa en la especificación de los anchos máximos. Para el layout general, define el `.contenedor` con un límite de `1416px`. Sin embargo, para el componente Header, documenta específicamente un `--MaxWidth: 1440px`. Ambas medidas provienen directamente de la fuente oficial (PDF) y no constituyen un error de documentación, sino una discrepancia del diseño original que debe respetarse según el contexto.

### 5.1 Breakpoints Estructurales

| Breakpoint | Medida Mínima | Márgenes contenedor | Gap (Grid) |
| --- | --- | --- | --- |
| **xs** / (default)| `0px` | `16px` | `16px` |
| **sm** | `576px` | `16px` | `16px` |
| **md** | `640px` | `24px` | `16px` |
| **lg** | `1024px` | `56px` | `24px` |
| **xl** | `1536px` | `56px` (Max-width 1416px)| `24px` |

### 5.2 Sistema de Rejilla (Grid / Flex)

* **Contenedores**: 
  * `.contenedor` (Centra contenido, max-width 1416px en XL).
  * `.contenedor--fluido` (Ancho 100%, mismos márgenes, sin max-width).
* **Grid (`.reticulaGrid__*`)**:
  * Clases `.reticulaGrid__1` a `__12`.
  * Variantes responsivas: `--xs`, `--sm`, `--md`, `--lg`, `--xl`.
  * Hijos: `.columna__1` a `__12` (activa `grid-column: span N`).
* **Flexbox (`.fila` y `.reticulaFlex`)**:
  * `.fila`: `flex-wrap: wrap`, gap responsivo.
  * `.reticulaFlex`: Flexbox sin wrap (barras de acción).
  * Modificadores flex generales: `.flex-direction-*`, `.justify-content-*`, `.align-items-*`, `.order-*`.
  * Modificadores flex específicos: `.flex-grow`, `.flex-shrink`, `.flex-none` (Solo flex).
* **Híbridos (Ancho completo)**:
  * `.col-100`: Aplica ancho completo tanto para contextos de Grid como de Flex.
* **Espaciadores Utilitarios**:
  * `.gap--*`, `.gapx--*`, `.gapy--*` (Valores: 0, 2, 4, 8, 12, 16, 24, 32, 40, 48, 56, 64, 80, 96 px).

---

## 6. Íconos y Pictogramas

*(Información explícita oficial proveniente del PDF)*

Basados en el **IBM Carbon Design System**. Funcionan mediante inyección asíncrona de `snd-js.js`.

* **Íconos**:
  * Archivo fuente: SVG (preferido) o PNG, estrictamente en color negro (`#000000`). El CSS se encarga de teñir el ícono resultante.
  * Clases de tamaño: `.icono--N` (Variantes soportadas: 12, 16, 20, 24, 32, 48, 64, 80, 96).
  * Clases de color: `.icono--<color>` (ej. `.icono--principal`, `.icono--exito`, `.icono--blanco`).
  * Layout: Si acompañan texto, separación de 8px.
  * Accesibilidad: Touch target mínimo 40x40px. Íconos decorativos deben llevar `aria-hidden="true"` y `alt=""`.
* **Pictogramas**:
  * Tamaños: 48px a 128px.
  * Mismas clases de tamaño y color que los íconos. Siempre son decorativos (`aria-hidden="true"`).

---

## 7. Catálogo de Clases Utilitarias (Resumen)

*(Información explícita oficial proveniente del CSS)*

| Categoría | Clases Principales | Propósito |
| --- | --- | --- |
| **Fondos** | `.fondo--principal`, `.fondo--pguinda500`, `.fondo--neutro200` | Asignar colores de fondo. |
| **Textos (Color)**| `.color--principal`, `.color--neutro800`, `.color--error` | Color tipográfico. |
| **Bordes (Color)**| `.borde--principal`, `.borde--neutro400`, `.borde--no` | Color de bordes. |
| **Márgenes** | `.m--X`, `.mt--X`, `.mb--X`, `.mx--X`, `.my--X` | Utilidades de `margin`. |
| **Padding** | `.p--X`, `.pt--X`, `.pb--X`, `.px--X`, `.py--X` | Utilidades de `padding`. |
| **Accesibilidad**| `.accesibilidadLector`, `.oculto`, `.irContent` | Clases para lectores de pantalla. |

---

## 8. Componentes Oficiales (Diccionario de Implementación)

*(Información oficial documentada. El HTML proviene como copia exacta y fidedigna del PDF)*

### 8.1. Encabezado (Header Institucional)
* **HTML oficial**:
```html
<header class="header">
  <a class="irContent" href="#mainContent">Ir al contenido principal</a>
  <section class="mexico">
    <div class="mexico__contenedor">
      <div class="mexico__escudo">
        <a href="https://www.gob.mx/" class="mexico__aescudo">
          <img src="assets/img/gobierno-mexico.svg" class="mexico__img" alt="Ir a la pagina de inicio del Gobierno de Mexico" />
        </a>
      </div>
      <div class="mexico__menu">
        <details class="mexico__details" open>
          <summary class="mexico__summary"><span class="mexico__span">Menu</span></summary>
          <div class="mexico__detailsCont">
            <a href="https://www.gob.mx/tramites" class="mexico__a">Tramites</a>
            <a href="https://www.gob.mx/gobierno" class="mexico__a">Gobierno</a>
          </div>
        </details>
      </div>
    </div>
  </section>
</header>
```
* **Clases GUINDA**: `.header`, `.irContent`, `.mexico`, `.mexico__contenedor`, `.mexico__details`.
* **CSS asociado**: Grid 12 columnas, contenedor centrado con max-width 1440px. En móvil colapsa a 4 columnas.
* **JavaScript asociado**: `snd-js.js` interviene para manejar los estados `[open]` del `<details>` al cruzar 768px.
* **Responsive**: Por debajo de 767px el menú pasa a disposición vertical con icono hamburguesa.
* **Accesibilidad**: Obligatorio el botón `skip link` (`.irContent`) apuntando a `#mainContent`.
* **Regla estricta**: No usar como contenedor de mensajes temporales. No añadir logos adicionales.

### 8.2. Barra de Navegación (Navbar Subheader)
* **HTML oficial**:
```html
<section class="subheader">
  <div class="subheader__contenedor">
    <details class="mexico__details navHeader__details">
      <summary class="mexico__summary"><span class="mexico__span">Menú</span></summary>
      <nav class="navHeader">
        <ul class="navHeader__ul mexico__detailsCont">
          <li class="navHeader__li"><a href="#" aria-current="page" class="navHeader__a">Inicio</a></li>
        </ul>
      </nav>
    </details>
    <div class="iniciarSesion">
      <a href="#" class="iniciarSesion__a cta">
        <span class="iniciarSesion__txt">Iniciar sesión</span>
        <img src="assets/icons-base/llaveMX.svg" alt="" aria-hidden="true" class="iniciarSesion__logollave" />
      </a>
    </div>
  </div>
</section>
```
* **Clases GUINDA**: `.subheader`, `.navHeader`, `.iniciarSesion`.
* **CSS asociado**: Fondo Guinda 950. Sombra base.
* **Accesibilidad**: Uso de `aria-current="page"` para el enlace activo.

### 8.3. Botonería (`.boton__*`)
* **HTML oficial (Estándar)**:
```html
<button type="button" class="boton__primario">Botón primario</button>
```
* **HTML oficial (Estado Cargando / Loader)**:
```html
<button type="button" class="boton__primario boton--cargando" disabled aria-busy="true">
  <span class="oculto">Acción del botón</span>
  <img src="assets/icons-base/cargando.svg" alt="" aria-hidden="true" class="icono__spin" />
</button>
```
* **Clases GUINDA**: `.boton__primario`, `.boton__secundario`, `.boton__fantasma`. Modificadores: `.boton--grande`, `.boton--100`, `.boton--redondeado`.
* **CSS asociado**: 
  * Primario: Fondo guinda-900.
  * Secundario: Borde guinda-900, fondo transparente/blanco.
  * Fantasma: Sin fondo.
  * Alturas: 48px (normal), 64px (grande). Radio estándar 8px.
* **Accesibilidad**: Estado cargando obligatorio para interacciones asíncronas (`disabled`, `aria-busy="true"`, `.oculto`, `.icono__spin`). Focos visibles bien definidos.
* **Regla estricta**: Solo un botón primario por sección.

### 8.4. Barra de Búsqueda
* **HTML oficial (Landing, con botón)**:
```html
<form class="search-container" style="width: 100%">
  <label for="search-main" class="oculto">Busca actividades o servicios</label>
  <div class="form__inset main-search">
    <input type="search" id="search-main" placeholder="Ejemplo: actividades turístico recreativas" class="sh0r js-input" autocomplete="off" aria-expanded="false" aria-haspopup="listbox" />
    <button class="search-button" type="submit">
      <span class="oculto">Buscar</span>
      <img src="./assets/icons-base/search.svg" alt="" aria-hidden="true" class="icono--blanco" />
    </button>
  </div>
  <ul id="search-suggestions" class="suggestions-list js-list is-hidden" role="listbox">
    <li role="option">Senderismo en la montaña</li>
  </ul>
</form>
```
* **HTML oficial (Sección interna, sin botón)**:
```html
<form class="search-container" style="width: 90%" action="/buscar" method="GET">
  <label for="search-general" class="oculto">Buscar actividades</label>
  <div class="form__inset general-search">
    <img src="assets/icons-base/search.svg" class="search-icon" aria-hidden="true" />
    <input type="search" id="search-general" name="q" placeholder="Ejemplo: actividades turístico recreativas" class="sh0r js-input" autocomplete="off" />
    <ul class="search-results js-list is-hidden" id="results-list" role="listbox">
      <li role="option">Opción predictiva 1</li>
    </ul>
  </div>
</form>
```
* **CSS asociado**: Envolvente blanca, input neutro-200. Focus borde interior guinda 2px.
* **Accesibilidad**: `<label>` siempre presente (puede usar `.oculto`). Atributos `aria-haspopup="listbox"`, `role="listbox"`, `role="option"` y `aria-expanded` son obligatorios. 
* **Regla estricta**: El input debe ir en un `<form>` para disparar `submit` con Enter.

### 8.5. Barra de Navegación Lateral (Sidebar)
* **HTML oficial**:
```html
<nav class="menuMain" aria-label="Navegacion principal" id="menuMain">
  <button type="button" aria-controls="menuMain" aria-expanded="true" aria-haspopup="menu" class="menuMain__gatillo">
    <span class="oculto">Mostrar menu</span>
  </button>
  <ul class="menuMain__lista">
    <li class="menuMain__item">
      <a href="#" class="menuMain__link" aria-current="page">
        <img src="./assets/icons/folder.svg" alt="" aria-hidden="true" class="menuMain__icono" />
        <span class="menuMain__txt">Mis documentos</span>
      </a>
    </li>
  </ul>
</nav>
```
* **JavaScript asociado**: `snd-js.js` maneja el toggle usando el ID `#menuMain__gatillo` y altera los estados `aria-expanded` y `--colapsado`.
* **Responsive**: Desktop fijo (256px), Móvil inferior.

### 8.6. Listas
* **HTML oficial**:
```html
<ul class="listaBasica listaBasica--secundaria">
  <li>Lorem ipsum dolor sit amet</li>
</ul>
<ol class="listaHorizontal--fila deslizable">
  <li>Elemento 1</li>
</ol>
```
* **Clases GUINDA**: 
  * `.listaSinEstilos`: Resetea viñetas.
  * `.listaBasica`: Viñetas color primario.
  * `.listaBasica--secundaria/terciaria`: Viñetas dorado/gris.
  * `.listaHorizontal--fila` / `.deslizable`: Para scroll lateral.
* **Regla estricta**: No usar emojis como viñetas.

### 8.7. Tooltips (Mensajes Emergentes)
* **HTML oficial**:
```html
<div class="tooltip">
  <button type="button" class="tooltip__boton" aria-label="Ayuda" aria-expanded="false" aria-controls="tt-1" aria-describedby="ayuda-tooltip-1" data-tooltip-trigger>
    <img src="assets/icons/help.svg" alt="" aria-hidden="true" class="tooltip__imgBoton" />
  </button>
  <div id="tt-1" class="tooltip__burbuja tooltip__burbuja--arriba-izquierda tooltip__ajuste" role="tooltip" aria-hidden="true">
    ¡Hola! Soy un tooltip :)
  </div>
  <span id="ayuda-tooltip-1" class="accesibilidadLector">¡Hola! Soy un tooltip :)</span>
</div>
<!-- FUERA DEL TOOLTIP, UNICO POR PAGINA -->
<div id="tooltip-announcer" class="accesibilidadLector" aria-live="polite"></div>
```
* **Accesibilidad (CRÍTICA)**: 
  * La burbuja visual lleva `aria-hidden="true"` (invisible para lectores).
  * El texto accesible se aloja en un `<span class="accesibilidadLector">` vinculado por `aria-describedby`.
  * Requiere el contenedor `<div id="tooltip-announcer">` global para inyección dinámica de lectura.
* **Regla estricta**: Máximo 500 caracteres, no colocar información esencial, no apilar varios.

### 8.8. Pie de Página (Footer)
* **HTML oficial (Estándar 3 columnas)**:
```html
<footer class="footer">
  <div class="footer__contenedor">
    <div class="footer__mexico">
      <img src="https://framework-gb.cdn.gob.mx/gobmx/img/logo_blanco.svg" alt="Gobierno de México" class="footer__escudo" />
    </div>
    <!-- footer__colCentral con details "¿Qué es gob.mx?" y "Enlaces", footer__redes -->
  </div>
</footer>
```
* **HTML oficial (Versión Lite - solo backoffice)**:
```html
<footer class="footer">
  <div class="footer__contenedor footer--lite">
    <div class="footer__mexico"><img src="...logo_blanco.svg" alt="Gobierno de México" class="footer__escudo" /></div>
    <div class="footer__version">Versión 1.1</div>
  </div>
</footer>
```
* **Clases GUINDA**: `.footer`, `.footer__contenedor`, `.footer__mexico`, `.footer--lite`.
* **Regla estricta**: Enlaces externos deben usar `target="_blank" rel="noopener" title="El enlace abre en ventana nueva"`.

### 8.9. Acordeón (`.acordeon__*`) 
*(Información inferida del análisis del JS y CSS originales)*
* **Estructura**: Usa botones gatillo `.acordeon__gatillo` controlando `aria-expanded="true/false"` que activa el CSS.

### 8.10. Píldoras / Badges (`.pildora`) 
*(Información inferida del análisis del CSS original)*
* **Estáticas**: `.pildora`, `.pildora--exito`, `.pildora--info`.
* **Interactivas (Filtro)**: `.pildoraFiltro`. Usan `aria-pressed="true"`.

---

## 9. Plantillas (Templates) Estructurales

*(Información explícita oficial proveniente del PDF)*

El framework contempla 8 plantillas complejas a nivel arquitectónico. 
**Importante:** El código HTML y las medidas exactas de diseño para estas plantillas NO están disponibles en la documentación técnica oficial extraída (PDF/HTML); dichos elementos residen únicamente en el UI Kit de Figma. 

1. **Página principal (Landing)**: Navbars, Header, Tarjetas (Cards), Banner, Footer.
2. **Detalles del trámite**: Breadcrumbs, Título, Chips, Cuerpo de texto, Tabs, Banner, FAQs.
3. **Bandeja de entrada del trámite**: Nav lateral, Buscador, Filtros, Tablas de datos, Paginación.
4. **Mi perfil**: Nav lateral, Mensajes de estado, Tarjetas de info.
5. **Formulario para trámites (Front office)**: Stepper (progreso), Tarjetas, Botones de flujo.
6. **Formularios para trámite (Back office)**: Breadcrumbs, inputs de revisión.
7. **Página de error**: Tarjeta descriptiva del error amigable.
8. **Integración Llave MX**: Radio botones, autenticación.

---

## 10. JavaScript Oficial (`snd-js.js`)

*(Información inferida del análisis del JS oficial)*

Maneja los siguientes comportamientos obligatorios:
1. **Motor de Iconos**: Detecta `<i class="snd">` y hace fetch a `./assets/iconos/`.
2. **Interactividad de Menús**: Alterna clases `--colapsado` y estados ARIA (`#menuMain__gatillo`).
3. **Control Automático de `<details>`**: Responde automáticamente al breakpoint de 768px.

---

## 11. Riesgos de Migración

*(Inferencias técnicas para el proceso de migración)*

| Riesgo | Nivel | Descripción |
| --- | --- | --- |
| **Conflicto de Rutas (Assets)** | **Alto** | `snd-js.js` realiza peticiones estáticas a `./assets/iconos/`. Si no existe, genera errores 404 y un fallback parpadeante en pantalla. |
| **Resets Globales** | **Alto** | SND aplica estilos globales genéricos (`html`, `body`). Modificará drásticamente la aplicación preexistente. |
| **Colisión de Clases** | **Alto** | Clases como `.fila`, `.contenedor` colisionarán con frameworks previos (ej. Bootstrap). |

---

## 12. Información que no puede determinarse o está pendiente

1. **HTML Exacto de Plantillas Complejas**: Como se documenta en la sección 9, la documentación oficial reserva la estructura fina de vistas complejas (Tablas, Paginación, Steppers) al UI Kit de Figma. Su HTML debe ser inferido o construido manualmente utilizando los componentes atómicos provistos.
2. **Lógica de ciertos componentes interactivos**: Componentes como Tabs o el Acordeón parecen requerir JS adicional que no está presente en el archivo `snd-js.js` base (o al menos no detectado en los fragmentos analizados), implicando que el desarrollador debe proveer el toggle lógico de sus atributos ARIA asociados.

---

## 13. Guía de Implementación Recomendada (Próximos Pasos)

Esta guía define el orden estricto de ejecución para futuras migraciones:

1. **Directorio Base**: Asegurar estructura `./assets/iconos/`.
2. **Inyección Estricta**: Importar `snd-guinda.css` y `snd-js.js`. **Asegurar que no exista `snd-verde.css`**.
3. **Layout Base**: Envolver la app en `.contenedor` / grid de 12 columnas.
4. **Macro-Componentes**: Reemplazar Header (`.mexico`) y Footer (`.footer`).
5. **Micro-Componentes**: Refactorizar tipografías (Noto Sans), inputs, botones y migrar iconografía vieja al estándar `IBM Carbon` (SVG).
6. **Accesibilidad Integral**: Validación final de focus, tooltips y lectores de pantalla.
