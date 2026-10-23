# Catálogo de Componentes Extraídos de Figma — SND | UI Kit (v1.1.0 Tema Guinda)

> **Propósito de este documento:** Almacenar las especificaciones técnicas completas (anatomía, dimensiones, estados, tokens de color mapeados a variables `:root` de [`docs/snd-guinda.css`](../../snd-guinda.css), estructura HTML accesible WAI-ARIA, CSS y JS) de los componentes extraídos directamente de Figma (`SND | UI Kit`, `kW8LFCzYEiBxCgHu6gBD66`) para reutilizarlos en cualquier página del tema sin volver a consultarlos en Figma.
> 
> **Regla Normativa de Íconos:** Los íconos `.snd__icono` renderizan como SVG/imágenes y **no escalan con `font-size`**. Se deben dimensionar obligatoriamente mediante **`width` y `height`** (o clases `.icono--16`, `.icono--20`, `.icono--24`, `.icono--32`, `.icono--48`, `.icono--64`).

---

## 1. Componente: Pestañas / Tabs (`page=Tabs *`, `id=1695:21269`)

En el UI Kit de Figma existen **dos variantes oficiales** de pestañas:
- **Variante 1A (`Tabs 2` — Pestañas Secundarias / Tipo Ficha):** Pestañas con esquinas superiores redondeadas (`8px 8px 0 0`) y fondo guinda sólido al seleccionarse. Ideal para alternar vistas o listados dentro de una sección (ej. *Actas* vs *Resoluciones*).
- **Variante 1B (`Tabs 01` — Pestañas Principales / Underline):** Pestañas con fondo blanco e indicador de línea inferior (`3px solid #611232` en activo, `1px solid #767676` en inactivo). Ideal para etapas secuenciales a ancho completo.

---

### 1A. `Tabs 2` — Pestañas Tipo Ficha (`ComponentSet id=1562:4021` / `Spec id=16460:3792`)

#### Anatomía y Medidas de Figma
- **Alto mínimo (`min-height`):** `48px`
- **Padding interno:** `12px` arriba/abajo, `16px` izquierda/derecha (`padding: 12px 16px`)
- **Radio de esquina (`border-radius`):** `8px 8px 0 0` (`rectangleCornerRadii: [8, 8, 0, 0]`)
- **Bordes (`individualStrokeWeights`):** `top: 1px`, `right: 1px`, `left: 1px`, `bottom: 0px`
- **Disposición del contenedor (`tablist`):** Horizontal (`display: flex`), pestañas contiguas (`gap: 0`), sobre una línea divisoria inferior `1px solid var(--neutro400)` (`#DDDDDD`).
- **Tipografía:** `Noto Sans`, `16px` (`1rem`), `line-height: 24px` (`1.5rem`).
- **Propiedad opcional `Show Número`:** Booleana (`default: false`). Por defecto solo muestra el texto `Titulo` sin ícono.

#### Tabla de Estados y Tokens (`snd-guinda.css`)
| Estado (Variante Figma) | Fondo (`background-color`) | Borde (`top/left/right`) | Texto (`color`) | Peso (`font-weight`) |
| :--- | :--- | :--- | :--- | :--- |
| **Default** (`7628:527`) | `var(--neutro100)` (`#FFFFFF`) | `1px solid var(--neutro400)` (`#DDDDDD`) | `var(--neutro800)` (`#161A1D`) | `500` (Medium) |
| **Hover (Figma puro)** (`37481:15993`) | `var(--gama100)` (`#F3E4E9`) | `1px solid var(--neutro400)` (`#DDDDDD`) | `var(--neutro800)` (`#161A1D`) | `500` (Medium) |
| **Hover (en fondos con tinte / `.front-page-bg`)** | `var(--neutro100)` (`#FFFFFF`) | `1px solid var(--principal)` (`#611232`) | `var(--principal)` (`#611232`) | `500` (Medium) |
| **Seleccionado** (`7628:524`) | `var(--principal)` (`#611232`) | `1px solid var(--principal)` (`#611232`) | `var(--neutro100)` (`#FFFFFF`) | `600` (SemiBold) |
| **Focus** (`37481:15996`) | `var(--neutro200)` (`#F9F9F9`) | `2px solid var(--azul500)` (`#224497`) | `var(--neutro800)` (`#161A1D`) | `500` (Medium) |
| **Inhabilitado** (`1562:4019`) | `var(--neutro200)` (`#F9F9F9`) | `1px solid var(--neutro400)` (`#DDDDDD`) | `var(--neutro600)` (`#767676`) | `500` (Medium) |

> 💡 **Regla de Alto Contraste en Hover:** En el lienzo de Figma el componente fue diseñado sobre fondo blanco puro, por lo que el hover `var(--gama100)` (`#F3E4E9`) se distingue bien. Sin embargo, en páginas o secciones con fondo `.front-page-bg` (`background-color: var(--color-fondo-claro)` que equivale a `#F3E4E9`), dicho hover provoca que la pestaña se funda y se pierda. Por tanto, en esas vistas se mantiene `background-color: var(--neutro100)` (blanco) y se destaca la interactividad virando el borde y el texto al guinda institucional `var(--principal)` (`#611232`).

#### HTML Reutilizable (`Tabs 2`)
```html
<!-- Tabs — SND UI Kit (Tabs 2: 1562:4021 / 16460:3792) -->
<div class="tx-comite-tabs-container mb--32">
    <ul class="ul--limpio tx-comite-tabs" id="comiteTabs" role="tablist">
        <li role="presentation">
            <button class="tx-comite-tab" id="tab-1" data-tab-target="#pane-1" type="button" role="tab" aria-controls="pane-1" aria-selected="true">
                Pestaña 1
            </button>
        </li>
        <li role="presentation">
            <button class="tx-comite-tab" id="tab-2" data-tab-target="#pane-2" type="button" role="tab" aria-controls="pane-2" aria-selected="false">
                Pestaña 2
            </button>
        </li>
    </ul>
</div>

<div class="tx-comite-tab-content" id="comiteTabsContent">
    <div class="tx-comite-tab-pane" id="pane-1" role="tabpanel" aria-labelledby="tab-1" tabindex="0">
        <!-- Contenido Pestaña 1 -->
    </div>
    <div class="tx-comite-tab-pane muestra--ninguno" id="pane-2" role="tabpanel" aria-labelledby="tab-2" tabindex="0">
        <!-- Contenido Pestaña 2 -->
    </div>
</div>
```

#### CSS Reutilizable (`Tabs 2` — ya incluido en `sesna-v2/assets/css/main.css`)
```css
/* Tabs — SND UI Kit (Tabs 2: 1562:4021 / 16460:3792) */
.tx-comite-tabs-container {
    border-bottom: 1px solid var(--neutro400);
}
.tx-comite-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 0;
    margin-bottom: -1px;
}
.tx-comite-tab {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 48px;
    padding: 12px 16px;
    border-radius: 8px 8px 0 0;
    border-top: 1px solid var(--neutro400);
    border-right: 1px solid var(--neutro400);
    border-left: 1px solid var(--neutro400);
    border-bottom: 0;
    background-color: var(--neutro100);
    color: var(--neutro800);
    font-family: "Noto Sans", sans-serif;
    font-size: 1rem;
    line-height: 1.5rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.15s ease-in-out, color 0.15s ease-in-out, border-color 0.15s ease-in-out;
}
.tx-comite-tab:hover:not([aria-selected="true"]):not(:disabled) {
    background-color: var(--neutro100);
    color: var(--principal);
    border-color: var(--principal);
}
.tx-comite-tab[aria-selected="true"] {
    background-color: var(--principal);
    border-color: var(--principal);
    color: var(--neutro100);
    font-weight: 600;
}
.tx-comite-tab:focus-visible {
    outline: none;
    background-color: var(--neutro200);
    color: var(--neutro800);
    border-top: 2px solid var(--azul500);
    border-right: 2px solid var(--azul500);
    border-left: 2px solid var(--azul500);
}
.tx-comite-tab[aria-selected="true"]:focus-visible {
    background-color: var(--principal);
    color: var(--neutro100);
}
.tx-comite-tab:disabled {
    background-color: var(--neutro200);
    color: var(--neutro600);
    border-color: var(--neutro400);
    cursor: not-allowed;
}
```

#### Controlador JS Accesible Reutilizable (Vanilla JS)
```javascript
var tabs = Array.from(document.querySelectorAll('#comiteTabs [role="tab"]'));
function activateTab(tab) {
    var targetId = tab.getAttribute('data-tab-target');
    if (!targetId) return;
    tabs.forEach(function(t) { t.setAttribute('aria-selected', 'false'); });
    tab.setAttribute('aria-selected', 'true');
    document.querySelectorAll('#comiteTabsContent [role="tabpanel"]').forEach(function(pane) {
        pane.classList.add('muestra--ninguno');
    });
    var targetPane = document.querySelector(targetId);
    if (targetPane) targetPane.classList.remove('muestra--ninguno');
}
tabs.forEach(function(tab, idx) {
    tab.addEventListener('click', function() { activateTab(tab); });
    tab.addEventListener('keydown', function(e) {
        var nextIdx = null;
        if (e.key === 'ArrowRight') nextIdx = (idx + 1) % tabs.length;
        else if (e.key === 'ArrowLeft') nextIdx = (idx - 1 + tabs.length) % tabs.length;
        if (nextIdx !== null) {
            e.preventDefault();
            tabs[nextIdx].focus();
            activateTab(tabs[nextIdx]);
        }
    });
});
```

---

### 1B. `Tabs 01` — Pestañas Principales con Línea Inferior (`ComponentSet id=618:2598` / `Spec id=16460:870`)

#### Anatomía y Medidas de Figma
- **Alto (`height`):** `40px`
- **Padding interno:** `8px 16px` (`top/bottom: 8px`, `left/right: 16px`)
- **Gap interno (`itemSpacing`):** `8px` (entre el texto `Content` y el ícono opcional `Estatus/help` `24×24px` en `--azul500`).
- **Estados (`Color=Blanco`):**
  - **Default (`618:2601`):** Fondo `var(--neutro100)` (`#FFFFFF`), `border-bottom: 1px solid var(--neutro600)` (`#767676`), texto `var(--neutro700)` (`#434343`), peso `500`.
  - **Hover (`37481:15950`):** Fondo `var(--neutro300)` (`#F3F3F3`), `border-bottom: 1px solid var(--neutro600)`, texto `var(--neutro700)`.
  - **Seleccionado (`618:2599`):** Fondo `var(--neutro100)` (`#FFFFFF`), `border-bottom: 3px solid var(--principal)` (`#611232`), texto `var(--principal)` (`#611232`), peso `600`–`700`.
  - **Focus (`37481:15848` / `37481:15953`):** Marco interior `2px solid var(--azul500)` (`#224497`) con `border-radius: 4px`.
  - **Deshabilitado (`22366:14880`):** Fondo `var(--neutro200)` (`#F9F9F9`), `border-bottom: 1px solid var(--neutro600)`, texto `var(--neutro600)` (`#767676`).

---

## 2. Componente: Lista Desplegable / Select (`Dropatom` / `Selector`)

Extraído de la especificación de campos disparadores y desplegables del SND UI Kit (`Inputs` / `Dropatom` `8443:7043`, `Selector` `33865:16171`, `14842:31284` y secciones 4.11–4.12 de `snd-v1.1.0-extraccion.md`).

### Anatomía y Medidas
- **Etiqueta (`<label>`):**
  - Clases SND: `.b1sb .dblock .color--neutro800 .mb--8` (`Noto Sans` `16px` SemiBold `600`, color `#161A1D`, separación inferior `8px`).
- **Contenedor del Select (`.tx-select-wrap`):**
  - `position: relative; display: flex; align-items: center; width: 100%;`
- **Elemento `<select>` (`.tx-comite-select` / `select.tx-comite-filter-control`):**
  - **Ancho:** `100%` de su columna en la retícula (`.columna__*`).
  - **Alto mínimo (`min-height`):** `48px` (alineado al área táctil y altura de controles SND).
  - **Padding interno:** `10px 44px 10px 16px` (espacio derecho reservado para el ícono chevron).
  - **Radio de borde (`border-radius`):** `8px`.
  - **Tipografía:** `Noto Sans`, `1rem` (`16px`), `line-height: 1.375rem` (`22px`), `font-weight: 400`, `color: var(--neutro800)` (`#161A1D`).
  - **Apariencia nativa:** `appearance: none; -webkit-appearance: none;`
- **Ícono Indicador Derecha (`.tx-select-chevron`):**
  - Ícono oficial Carbon/SND: `<i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>`
  - Posicionado a `right: 14px`, centrado verticalmente (`top: 50%; transform: translateY(-50%)`), `pointer-events: none`, con rotación `-180deg` cuando el `<select>` recibe `:focus` (idéntico al comportamiento de `.idioma__marker` en `snd-guinda.css`).

### Tabla de Estados y Tokens (`snd-guinda.css`)
| Estado | Fondo (`background-color`) | Borde (`border`) | Sombra interior (`box-shadow`) | Texto (`color`) |
| :--- | :--- | :--- | :--- | :--- |
| **Default** | `var(--neutro100)` (`#FFFFFF`) | `1px solid var(--neutro400)` (`#DDDDDD`) | `none` | `var(--neutro800)` (`#161A1D`) |
| **Hover** | `var(--neutro100)` (`#FFFFFF`) | `1px solid var(--neutro600)` (`#767676`) | `none` | `var(--neutro800)` (`#161A1D`) |
| **Focus / Active** | `var(--neutro100)` (`#FFFFFF`) | `1px solid var(--principal)` (`#611232`) | `0 0 0 1px var(--principal) inset` (borde total 2px hacia dentro) | `var(--neutro800)` (`#161A1D`) |
| **Disabled** | `var(--neutro200)` (`#F9F9F9`) | `1px solid var(--neutro400)` (`#DDDDDD`) | `none` | `var(--neutro600)` (`#767676`) |

### HTML Reutilizable (`Select / Dropatom`)
```html
<div class="columna__12 columna__6--md columna__3--lg">
    <label for="filter-anio" class="b1sb dblock color--neutro800 mb--8">Año</label>
    <div class="tx-select-wrap">
        <select id="filter-anio" class="tx-comite-select tx-comite-filter-control">
            <option value="Todos">Todos</option>
            <option value="2026">2026</option>
        </select>
        <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
    </div>
</div>
```

### CSS Reutilizable (`Select / Dropatom` — ya incluido en `sesna-v2/assets/css/main.css`)
```css
/* Select / Dropatom SND v1.1.0 */
.tx-select-wrap {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
}
.tx-comite-select,
select.tx-comite-filter-control {
    width: 100%;
    min-height: 48px;
    padding: 10px 44px 10px 16px;
    border-radius: 8px;
    border: 1px solid var(--neutro400);
    background-color: var(--neutro100);
    color: var(--neutro800);
    font-family: "Noto Sans", sans-serif;
    font-size: 1rem;
    line-height: 1.375rem;
    font-weight: 400;
    appearance: none;
    -webkit-appearance: none;
    cursor: pointer;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background-color 0.15s ease-in-out;
}
.tx-comite-select:hover:not(:disabled),
select.tx-comite-filter-control:hover:not(:disabled) {
    border-color: var(--neutro600);
}
.tx-comite-select:focus,
.tx-comite-select:focus-visible,
select.tx-comite-filter-control:focus,
select.tx-comite-filter-control:focus-visible {
    outline: none;
    border-color: var(--principal);
    box-shadow: 0 0 0 1px var(--principal) inset;
}
.tx-comite-select:disabled,
select.tx-comite-filter-control:disabled {
    background-color: var(--neutro200);
    border-color: var(--neutro400);
    color: var(--neutro600);
    cursor: not-allowed;
}
.tx-select-chevron {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    color: var(--neutro800);
    transition: transform 0.2s ease;
}
.tx-comite-select:focus + .tx-select-chevron {
    transform: translateY(-50%) rotate(-180deg);
}
```

---

## 3. Componente: Barra de Búsqueda — Variante Sección Interna (`4.1 Barra de búsqueda`)

### Identificación en Documentación SND y Figma
- **Documentación SND (`snd-v1.1.0-extraccion.md`):** Sección `4.1 Barra de búsqueda` (`/componentes/barra-busqueda`), **Variante 2: Barra de búsqueda input (secciones internas, sin botón)**.
- **Component Set en Figma (`SND | UI Kit`):** `BarradeBusqueda` (`node-id=9624:21509` en página `Search bar`, `id=1686:19450`).
- **Estado en `snd-guinda.css`:** Existen `.form__inset`, `.general-search`, `.search-icon`, `.sh0r.js-input` e `input[type="search"]::-webkit-search-cancel-button`, pero en el CSS del CDN la clase `.general-search` quedó incompleta (solo declara `margin: 1rem; width: auto; border-radius: 2rem;`), por lo que se complementa en `sesna-v2/assets/css/main.css` con `.tx-comite-search-box` respetando las 3 pestañas (`Descripción`, `Diseño` Desktop/Móvil y `Desarrollo`).

### Especificaciones de las 3 Pestañas (Descripción, Diseño Desktop/Móvil y Desarrollo)
- **Contenedor (`.form__inset.general-search.tx-comite-search-box`):**
  - `width: 100%`, `min-height: 48px`, `background-color: var(--neutro200)` (`#F2F3F5`), `border-radius: 100px`.
  - **Construcción UI Móvil (`< 640px`, base):** dirección horizontal, alineación `middle-left`, `gap: 8px`, `padding: 8px 16px`, texto `B1R` (`16px` / `1rem`, `line-height: 22px`).
  - **Construcción UI Tableta (`@media (min-width: 640px)`):** `padding: 8px 20px`, `gap: 10px`.
  - **Construcción UI Desktop (`@media (min-width: 1024px)`):** `padding: 8px 24px 8px 32px`, `gap: 10px`, texto `18px` (`1.125rem`).
- **Estados obligatorios:**
  - **Default:** fondo `var(--neutro200)`, borde `1px` hacia dentro `var(--neutro400)` (`box-shadow: inset 0 0 0 1px var(--neutro400)`), placeholder `var(--neutro500)`.
  - **Focus (`:focus-within`):** borde `2px` hacia dentro `var(--principal)` (`box-shadow: inset 0 0 0 2px var(--principal)`).
  - **Active (`:active`):** borde `2px` hacia dentro `var(--principal)`, texto `var(--neutro800)`.
  - **Filled (`.is-filled`):** borde `1px` hacia dentro `var(--principal)`, texto `var(--neutro800)`.

### HTML Estandarizado Listo para Usar
```html
<label for="search-res" class="b1sb dblock color--neutro800 mb--8">Número de resolución</label>
<form class="search-container" role="search" id="form-search-res" action="javascript:void(0);">
    <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
        <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
        <input type="search" id="search-res" name="q" placeholder="Buscar resolución..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
    </div>
</form>
```

---

## 4. Componente: Tarjeta / Card (`Cards *` en Figma) + Botón Fantasma (`4.2 Botones`)

### Identificación en Documentación SND y Figma
- **Tarjeta / Card en Figma (`SND | UI Kit`):**
  - Página `Cards *` (`id=12022:57247`), nodos `37597:51336` (`Card`), `37597:51398` (`Card certificaciones y empresa-logo`), `9049:12264` (`CardResumen`), y página `Espaciados y cuadricula` (`nodos 20721:1900`, `20721:1904`).
  - **Estado en `snd-guinda.css`:** No existe clase `.card` ni `.tarjeta` compilada en `snd-guinda.css`, pero sí existen los tokens de color (`--neutro100`, `--neutro400`), tipografía (`.sh0b`, `.sh1b`, `.b1r`, `.b1sb`) y sombra (`.sombraLV1` / `var(--dropLV1)` y `.sombraLV2` / `var(--dropLV2)`).
- **Botón Fantasma en Documentación SND (`snd-v1.1.0-extraccion.md`):**
  - Sección `4.2 Botones` (`/componentes/botones`), clases oficiales `.boton__fantasma` y modificador `.boton--vertical` (compiladas en `snd-guinda.css` líneas 3807–3958 y 4067–4070).

### Especificaciones Extraídas (Diseño Desktop y Móvil)
- **Superficie de la Card:**
  - **Fondo:** `var(--neutro100)` (`#FFFFFF`, `VariableID:16:1876`).
  - **Borde:** `1px solid var(--neutro400)` (`#DDDDDD`, `VariableID:16:1873`).
  - **Radio de esquina (`cornerRadius`):** `16px` (`1rem`).
  - **Sombra (`DROP_SHADOW`):** `var(--dropLV1)` (`0 2px 4px rgba(0, 0, 0, 0.15)`) en reposo; `var(--dropLV2)` (`0 4px 8px rgba(0, 0, 0, 0.15)`) en `:hover`.
  - **Móvil (`< 640px`, base):** `display: flex; flex-direction: column; padding: 16px; gap: 16px;`, divisor horizontal `border-bottom: 1px solid var(--neutro400)` bajo el año.
  - **Tableta y Escritorio (`≥ 640px`):** `display: flex; flex-direction: row; align-items: center; padding: 24px; gap: 24px;`, columna de año con divisor vertical derecho `border-right: 1px solid var(--neutro400)`.
- **Botón Fantasma (`.boton__fantasma`):**
  - `min-height: 48px`, `border-radius: 8px`, tipografía `CTA` (`16px`, Semibold `600`).
  - **Default:** fondo transparente, texto e íconos `var(--principal)` (`#611232`).
  - **Hover:** fondo `var(--gama100)` (`#F9EBF0`), texto e ícono `var(--gama600)` (`#9B2247`).
  - **Focus (`:focus-visible`):** fondo `var(--gama100)`, `outline: 2px solid var(--principal)`.
  - **Active (`:active`):** fondo `var(--gama200)`, texto `var(--gama950)`.
  - **Disabled:** texto `var(--neutro500)`, sin fondo.

---

## 5. Componente: Modal / Diálogo Visor de Documentos (`Modales *` en Figma, nodo `1749:13690`)

### Identificación en Documentación SND y Figma
- **Componente en Figma (`SND | UI Kit`):** Organismo en página `Modales *` (`id=1749:13690`).
- **Estado en `snd-guinda.css`:** `snd-guinda.css` únicamente incluye avisos de diálogo de sistema (`dialog[class*="aviso--"]`), por lo que los contenedores modales se construyen desacoplados de Bootstrap utilizando variables `:root` oficiales (`--neutro100`, `--neutro400`, `--neutro800`, `--dropLV3`, `--principal`).
- **Archivo implementado:** [`sesna-v2/template-parts/visor-pdf.php`](../../../sesna-v2/template-parts/visor-pdf.php).

### Especificaciones de Diseño (Desktop y Móvil)
- **Overlay / Backdrop:** `rgba(22, 26, 29, 0.56)` (color institucional `neutro-800` al 56%).
- **Superficie de Diálogo:**
  - **Fondo:** `var(--neutro100)` (`#FFFFFF`).
  - **Borde:** `1px solid var(--neutro400)` (`#DDDDDD`).
  - **Radio de esquina (`border-radius`):** `16px`.
  - **Sombra:** `var(--dropLV3)` (`0 6px 12px rgba(0, 0, 0, 0.20)`).
  - **Ancho máximo:** `960px`.
- **Cabecera (`.tx-pdf-modal__header`):**
  - Fondo blanco, divisor inferior `1px solid var(--neutro400)`, separación interna `16px 24px`.
  - Título con tipografía Patria: `.sh1b.patria.color--principal` (`line-height: 1.4`).
  - Botón de cierre: `.boton__fantasma.tx-pdf-modal__close-btn` circular (`44x44px`, radio `50%`) con ícono `snd-close icono--24`.
- **Cuerpo (`.tx-pdf-modal__body`):**
  - Fondo oscuro de alto contraste `var(--neutro800)` (`#161A1D`).
  - Altura desktop: `65vh` (mínimo `480px`, máximo `75vh`).
  - Altura móvil: `55vh` (mínimo `340px`).
  - Loader accesible central con animación `icono__spin` e ícono `snd-snd-loading2 icono--32`.
- **Pie de Acciones (`.tx-pdf-modal__footer`):**
  - Divisor superior `1px solid var(--neutro400)`, separación interna `16px 24px`.
  - Acciones centradas con separación `16px`:
    - Botón secundario: `.boton__secundario` con ícono `snd-launch icono--16` para "Copiar enlace".
      - **Comportamiento interactivo post-evento (`.is-copied`) (Tema Guinda Oficial)**:
        | Estado | Fondo | Borde | Texto / Ícono | Token SND (`snd-guinda.css`) |
        |---|---|---|---|---|
        | **Post-evento Default** | `var(--principal, #611232)` | `var(--principal, #611232)` | `var(--neutro100, #FFFFFF)` (filtro blanco) | Pestaña DISEÑO (`guinda-900`) |
        | **Post-evento Hover** | `var(--pguinda600, #9B2247)` | `var(--pguinda600, #9B2247)` | `var(--neutro100, #FFFFFF)` (filtro blanco) | Pestaña DISEÑO (`guinda-600`) |
        | **Post-evento Focus** | `var(--principal, #611232)` | `outline: 3px solid var(--pguinda300, #CE92A6)` | `var(--neutro100, #FFFFFF)` | Pestaña DISEÑO (`guinda-300`) |
        | **Post-evento Active** | `var(--pguinda100, #F3E4E9)` | `var(--pguinda100, #F3E4E9)` | `var(--neutro800, #161A1D)` | Pestaña DISEÑO (`guinda-100`) |
    - Botón primario: `.boton__primario` con ícono `snd-download icono--16` para "Descargar PDF".
  - En móviles (`< 640px`): botones apilados a ancho completo (`width: 100%`).

### HTML Reutilizable
```html
<!-- Modal Visor de Documento PDF (SND v1.1.0) -->
<div class="modal tx-pdf-modal" id="pdfViewerModal" tabindex="-1" role="dialog" aria-labelledby="pdfViewerModalLabel" aria-hidden="true">
    <div class="tx-pdf-modal__dialog">
        <div class="tx-pdf-modal__content">
            <!-- Header -->
            <div class="tx-pdf-modal__header">
                <h2 class="sh1b patria color--principal tx-pdf-modal__title" id="pdfViewerModalLabel">Visor de Documento</h2>
                <button type="button" class="boton__fantasma tx-pdf-modal__close-btn" data-modal-dismiss aria-label="Cerrar modal">
                    <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
                </button>
            </div>
            
            <!-- Body con iframe y spinner SND -->
            <div class="tx-pdf-modal__body">
                <div id="pdfLoader" class="tx-pdf-modal__loader">
                    <i class="snd__icono snd-snd-loading2 icono__spin icono--32 color--blanco mb--8" aria-hidden="true"></i>
                    <div class="b2r color--blanco">Cargando documento...</div>
                </div>
                <iframe id="pdfIframe" src="" class="tx-pdf-modal__iframe" allowfullscreen title="Documento PDF"></iframe>
            </div>

            <!-- Footer con acciones oficiales SND (Botón con iconos: radio canónico 8px) -->
            <div class="tx-pdf-modal__footer">
                <button type="button" id="pdfCopyLinkBtn" class="boton__secundario">
                    <i class="snd__icono snd-launch icono--16" aria-hidden="true"></i>
                    <span id="pdfCopyLinkBtnText">Copiar enlace</span>
                </button>
                <a href="#" id="pdfDownloadBtn" class="boton__primario" download>
                    <i class="snd__icono snd-download icono--16" aria-hidden="true"></i>
                    Descargar PDF
                </a>
            </div>
        </div>
    </div>
</div>
```

---

## 6. Componente: Migas de Pan / Ruta de navegación (`.ruta__*`, `snd-guinda.css` L4781–4841)

### Anatomía y Especificación Normativa (SND v1.1.0 — Canónica del Proyecto)
- **Contenedor exterior (`<nav class="ruta__cont">`):** Etiqueta `<nav class="ruta__cont" aria-label="Ruta de navegación">` que adopta directamente la clase oficial de `snd-guinda.css` L4781.
- **Contenedor institucional:** Envuelve la lista dentro de `<div class="contenedor">` para respetar el ancho máximo y márgenes responsivos normativos (`16px/24px/56px`).
- **Lista de ruta (`.ruta__lista`):** `display: flex; list-style-type: none; padding: 0; margin: auto; width: 100%;`
- **Ítem de lista (`.ruta__li`):**
  - Tipografía `color: var(--neutro600); padding: 4px 0;`.
  - **Separador automático (`.ruta__li:after`):** Pseudo-elemento visual con el chevron oficial del CDN (`background-image: url(./iconos/chevron--right.svg); margin: 0 8px 0 16px; opacity: 0.55;`). El último ítem tiene `:last-of-type::after { content: none; }`.
- **Ícono de Inicio (`.icono--20`):**
  - `<i class="snd__icono snd-home icono--20" aria-hidden="true"></i>` dimensionado de forma nativa por `.icono--20` (`width: 20px; height: 20px;`) y separado con `margin-right: 6px`.
- **Enlaces e Ítem Actual (`.ruta__a`):**
  - Enlaces previos: `<a href="..." class="ruta__a">` con `font-weight: 600; color: var(--neutro800);`.
  - Página actual: `<span class="ruta__a" aria-current="page">` con `font-weight: 600; color: var(--neutro800);`.

### HTML Reutilizable Canónico (Validado en vivo)
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

---

## 7. Componente: Título Principal H1 y Hero de Página (`.sesna-page-hero`, SND `3.4 Tipografía`)

### Anatomía y Especificación Normativa (Canónica del Proyecto — Basada en Política Nacional)
- **Contenedor exterior (`<section class="sesna-page-hero">`):**
  - Espaciado vertical: `padding-top: 40px` (desktop) / `28px` (móvil).
  - Espaciado hacia el siguiente componente: **`padding-bottom: 20px; margin-bottom: 0;`** (garantiza una separación exacta y uniforme de **20px** hacia las Tabs, tarjetas o secciones de contenido).
- **Retícula obligatoria (`3.5 Retícula`):** Encapsulado dentro de `<div class="contenedor"><div class="reticulaGrid__12 align-items-center"><div class="columna__12 posicion--relativa z--1">`.
- **Tipografía H1 (`<h1 class="h1b patria color--pguinda600">`):**
  - **Fuente:** Patria Regular / Bold (`.patria`).
  - **Escala de título:** `.h1b` (`font-size: clamp(1.75rem, 3vw, 2.5rem); font-weight: 700; line-height: 1.2;`).
  - **Color institucional:** **`.color--pguinda600`** (`var(--pguinda600, #9B2247)`). Queda estrictamente prohibido usar color negro (`#000`), gris o tamaños ad-hoc mediante clases legacy como `.tx-section-title` o `.tx-comite-title`.

### HTML Reutilizable Canónico (Validado en vivo con Política Nacional)
```html
<!-- Hero -->
<section class="sesna-page-hero">
    <div class="contenedor">
        <div class="reticulaGrid__12 align-items-center">
            <div class="columna__12 posicion--relativa z--1">
                <h1 class="h1b patria color--pguinda600"><?= esc_html( get_the_title() ) ?></h1>
            </div>
        </div>
    </div>
</section>
```

---

## 8. Componente: Tabla (`4.11 Tabla`, Figma `page_id=4083:1840` / `Table` `12022:54768` / `Atomos/Tabla` `9083:41328`)

Extraído de la página **`Tabla` (`4083:1840`)** del archivo `SND | UI Kit` (`kW8LFCzYEiBxCgHu6gBD66`) y alineado con las pestañas **Descripción** y **Diseño** de `4.11 Tabla` en `snd-v1.1.0-extraccion.md` (L988–1011).

### Variantes de Componente en Figma
1. **Tabla completa (`Table` `12022:54768`):**
   - `Pantalla=Desktop, Estado=Default` (`9083:44184`)
   - `Pantalla=Mobile, Estado=Default` (`10926:31270`)
   - `Pantalla=Desktop, Estado=Vacio` (`23448:9981`) / `Estado=Sin resultados` (`24417:61706`)
2. **Átomos de Celdas y Cabecera (`Atomos/Tabla` `9083:41328`):**
   - `Type=Header, Estado=Default` (`9083:41323`): Fondo institucional `var(--principal)` (`#611232`, `guinda-900`), texto e ícono de ordenamiento `var(--neutro100)` (`#FFFFFF`).
   - `Type=Header, Estado=Secundario` (`9497:22044`): Fondo neutro `var(--neutro300)` (`#F3F3F3`), texto e ícono `var(--neutro800)` (`#161A1D`).
   - `Type=Texto, Estado=Default` (`9083:41334`) / `Estado=Seleccionado` (`22366:9580`): Texto `var(--neutro800)` (`#161A1D`), tipografía `Noto Sans Regular 16px/22px` (`.b1r`).
   - `Type=Acción, Estado=Default` (`9083:41317`) / `Estado=Seleccionado` (`22366:11043`): Acción en color `var(--principal)` (`#611232`), implementada en web con `.boton__fantasma` oficial.

### Anatomía y Medidas Normativas
- **Envolvente responsivo (`.tx-table-responsive` / `.table-responsive`):**
  - `width: 100%; overflow-x: auto; background-color: var(--neutro100); border: 1px solid var(--neutro400); border-radius: 8px;`
- **Elemento `<table>` (`.tx-table-normatividad`):**
  - `width: 100%; border-collapse: collapse; margin-bottom: 0; background-color: var(--neutro100);`
- **Cabecera (`<thead> th`):**
  - **Fondo:** `var(--principal)` (`#611232`).
  - **Texto:** `var(--neutro100)` (`#FFFFFF`), `Noto Sans`, `1rem` (`16px`), `line-height: 1.375rem` (`22px`), `font-weight: 600` (`.b1sb`).
  - **Padding interno:** `12px 16px` (`padding interno celdas 12px` según pestaña Diseño).
- **Filas y Celdas (`<tbody> tr`, `<td>`):**
  - **Fondo Default:** `var(--neutro100)` (`#FFFFFF`).
  - **Fondo Hover:** `var(--neutro200)` (`#F9F9F9`).
  - **Divisor horizontal:** `border-bottom: 1px solid var(--neutro300)` (`#F3F3F3`) entre filas (la última fila omite borde inferior).
  - **Padding interno:** `12px 16px`.
  - **Tipografía:** `Noto Sans`, `1rem` (`16px`), `line-height: 1.375rem` (`22px`), `color: var(--neutro800)` (`#161A1D`).
  - **Anchos mínimos de columna:** `min-width: 110px`; columna de acciones centrada/derecha con botón `.boton__fantasma`.

### HTML Reutilizable
```html
<div class="tx-table-responsive">
    <table class="tx-table-normatividad">
        <thead>
            <tr>
                <th scope="col">Documento</th>
                <th scope="col">Tipo de documento</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <span class="b1sb color--neutro800">Ley General de Transparencia y Acceso a la Información Pública.</span>
                </td>
                <td>
                    <span class="b1r color--neutro700">Ley</span>
                </td>
                <td>
                    <a href="https://..." target="_blank" rel="noopener" title="El enlace abre en ventana nueva" class="boton__fantasma">
                        Consultar <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
```

---

## 9. Componente: Chips de Acción y Badges (`Badges / Chips`, Figma `page_id=1749:14986`)

Extraído de la página **`Badges / Chips` (`1749:14986`)** del archivo `SND | UI Kit` (`kW8LFCzYEiBxCgHu6gBD66`), específicamente de los Component Sets **`ChipAccion` (`1833:559` / `36419:5937`)**, **`Badges` (`1790:7755` / `36418:40090`)** y **`Badge núm` (`1945:1830`)**.

### 9A. `ChipAccion` — Chips de Filtro / Categoría (`1833:559`)

#### Anatomía y Medidas Normativas
- **Alto mínimo (`min-height`):** `40px`
- **Padding interno:** `8px 16px`
- **Separación interna (`gap`):** `8px` (entre ícono izquierdo `20×20px`, texto `.b2sb` / `14px–15px` SemiBold y contador opcional `.sna-entradas-tab-count`)
- **Radio de esquina (`border-radius`):** `100px` (píldora completa)

#### Tabla de Estados y Tokens (`snd-guinda.css`)
| Estado (Variante Figma) | Fondo (`background-color`) | Borde (`border`) | Texto e Ícono (`color`) | Contador (`.sna-entradas-tab-count`) |
| :--- | :--- | :--- | :--- | :--- |
| **Por defecto** (`1833:558`) | `var(--neutro100)` (`#FFFFFF`) | `1px solid var(--principal)` (`#611232`) | `var(--principal)` (`#611232`) | Fondo `var(--pguinda100)` (`#F3E4E9`), texto `var(--principal)` (`#611232`) |
| **Hover** (`36543:5018`) | `var(--pguinda100)` (`#F3E4E9`) | `1px solid var(--principal)` (`#611232`) | `var(--principal)` (`#611232`) | Fondo `var(--neutro100)` (`#FFFFFF`), texto `var(--principal)` (`#611232`) |
| **Enfocado (`:focus-visible`)** (`1833:566`) | `var(--neutro100)` (`#FFFFFF`) | `2px solid var(--principal)` (`#611232`) | `var(--principal)` (`#611232`) | Fondo `var(--pguinda100)`, texto `var(--principal)` |
| **Activo / Seleccionado (`.active` / `[aria-selected="true"]`)** | `var(--principal)` (`#611232`) | `1px solid var(--principal)` (`#611232`) | `var(--neutro100)` (`#FFFFFF`) | Fondo `rgba(255, 255, 255, 0.22)`, texto `var(--neutro100)` (`#FFFFFF`) |
| **Inhabilitado (`:disabled`)** (`1833:1230`) | `var(--neutro300)` (`#F3F3F3`) | `1px solid var(--neutro600)` (`#767676`) | `var(--neutro600)` (`#767676`) | Fondo `var(--neutro400)`, texto `var(--neutro600)` |

### 9B. `Badges` — Etiquetas de Categoría (`21038:22548` / `21038:12623`) y `Badge núm` (`1945:1830`)
- **`Badge=Rosa, Tipo=Fill` (`21038:22548`):** Píldora (`border-radius: 100px`), `padding: 4px 12px`, fondo `var(--principal)` (`#611232`) o `var(--pguinda500)` (`#A84565`), texto `var(--neutro100)` (`#FFFFFF`), `font-size: 0.75rem` (`12px`), `font-weight: 700`.
- **`Badge núm` (`1945:1830`):** Contador circular (`min-width: 24px; height: 24px; border-radius: 100px; padding: 0 6px; font-size: 0.75rem; font-weight: 700; display: inline-flex; align-items: center; justify-content: center;`).

