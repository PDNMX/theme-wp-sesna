# Catálogo de Componentes Extraídos de Figma — SND | UI Kit (v1.1.0 Tema Guinda)

> **Propósito de este documento:** Almacenar las especificaciones técnicas completas (anatomía, dimensiones, estados, tokens de color mapeados a variables `:root` de [`docs/snd-guinda.css`](../../snd-guinda.css), estructura HTML accesible WAI-ARIA, CSS y JS) de los componentes extraídos directamente de Figma (`SND | UI Kit`, `kW8LFCzYEiBxCgHu6gBD66`) para reutilizarlos en cualquier página del tema sin volver a consultarlos en Figma.

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
| **Hover** (`37481:15993`) | `var(--gama100)` (`#F3E4E9`) | `1px solid var(--neutro400)` (`#DDDDDD`) | `var(--neutro800)` (`#161A1D`) | `500` (Medium) |
| **Seleccionado** (`7628:524`) | `var(--principal)` (`#611232`) | `1px solid var(--neutro400)` (`#DDDDDD`) | `var(--neutro100)` (`#FFFFFF`) | `600` (SemiBold) |
| **Focus** (`37481:15996`) | `var(--neutro200)` (`#F9F9F9`) | `2px solid var(--azul500)` (`#224497`) | `var(--neutro800)` (`#161A1D`) | `500` (Medium) |
| **Inhabilitado** (`1562:4019`) | `var(--neutro200)` (`#F9F9F9`) | `1px solid var(--neutro400)` (`#DDDDDD`) | `var(--neutro600)` (`#767676`) | `500` (Medium) |

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
    background-color: var(--gama100);
    color: var(--neutro800);
}
.tx-comite-tab[aria-selected="true"] {
    background-color: var(--principal);
    border-color: var(--neutro400);
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
