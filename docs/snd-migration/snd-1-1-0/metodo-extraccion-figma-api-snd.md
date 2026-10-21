# Método de Extracción de Componentes desde Figma API — SND | UI Kit

> **Propósito de este documento:** Explicar paso a paso a otro agente de IA (en cualquier equipo o entorno) cómo consultar el archivo oficial **`SND | UI Kit`** en Figma mediante su API REST para extraer medidas, colores, bordes, radios, tipografía, variantes y hojas de especificación (`Specs`) de aquellos componentes que aún no tienen código CSS/HTML publicado en `snd-guinda.css`.

---

## 1. Por qué se usa la API REST de Figma

1. Intentar descargar una URL de diseño de Figma (`https://www.figma.com/design/...`) con `curl` falla con **HTTP 403 (CloudFront)** y además Figma renderiza el lienzo en un `<canvas>` WebGL que requiere sesión autenticada.
2. El parámetro `?t=...` en las URLs compartidas de Figma es únicamente un hash de estado de vista, **no** un token de autenticación.
3. La forma directa, exacta y reproducible desde terminal es consultar la **API REST v1 de Figma** (`https://api.figma.com/v1/...`) enviando el encabezado `X-Figma-Token: <PERSONAL_ACCESS_TOKEN>`.

---

## 2. Generación del Personal Access Token en Figma (Instrucciones para el Usuario)

Si el token anterior expiró (los tokens temporales suelen configurarse a 1 día), pedir al usuario que genere uno nuevo en Figma siguiendo estos pasos:

1. En Figma, hacer clic en el **avatar/nombre de usuario** (esquina superior izquierda) → **Settings (Configuración)**.
2. Ir a la pestaña **Security (Seguridad)** → bajar a la sección **Personal access tokens**.
3. Hacer clic en **Generate new token (Generar un nuevo token)**.
4. Asignar nombre (ej. `snd-read`), elegir vencimiento y **marcar únicamente los siguientes 5 alcances (scopes) de solo lectura**:
   - **Archivos**:
     - ✅ `file_content:read` *(Indispensable: lee el árbol de nodos, estilos y propiedades del diseño)*
     - ✅ `file_metadata:read`
   - **Sistemas de diseño**:
     - ✅ `library_assets:read`
     - ✅ `library_content:read`
   - **Desarrollo**:
     - ✅ `file_dev_resources:read`
5. Copiar el token generado (comienza con `figd_...`).

---

## 3. Identificadores del Archivo `SND | UI Kit` en Figma

De la URL oficial:
`https://www.figma.com/design/kW8LFCzYEiBxCgHu6gBD66/SND-%7C-UI-Kit?node-id=16460-3792`

- **File Key (`FILE_KEY`)**: `kW8LFCzYEiBxCgHu6gBD66`
- **Conversión de `node-id`**: En la URL de Figma los IDs usan guion medio (`16460-3792`), pero en los JSON y llamadas a la API REST se usa dos puntos (`16460:3792`).

---

## 4. Paso a Paso Técnico para Extraer un Componente

> ⚠️ **Cuidado con el Rate Limit (`HTTP 429`):** La API de Figma aplica límite de peticiones por minuto en cuentas de lectura (`{"status":429,"err":"Rate limit exceeded"}`).  
> **Regla de oro:** Siempre guardar la respuesta de `curl` en un archivo local (`/tmp/figma_*.json`) en una sola llamada agrupando múltiples IDs separados por coma (`?ids=ID1,ID2,ID3`), y hacer todo el análisis posterior localmente con Python sin repetir llamadas a la red.

### Paso 4.1: Consultar un nodo específico o un conjunto de nodos
Cuando el usuario comparte un enlace con `node-id=XXXX-YYYY` o cuando ya conoces el `node_id` del catálogo (Sección 5 de este documento):

```bash
curl -sL -H "X-Figma-Token: <TU_FIGMA_TOKEN>" \
  "https://api.figma.com/v1/files/kW8LFCzYEiBxCgHu6gBD66/nodes?ids=16460:3792" \
  -o /tmp/figma_node.json
```

### Paso 4.2: Identificar el `componentSetId` (Todas las variantes/estados del componente)
Si el nodo consultado es un `INSTANCE` (ej. un ejemplo dentro de una tabla de `Specs`), el JSON incluirá:
- `"componentId"`: ID de la variante específica (ej. `"7628:524"` = `Estado=Seleccionado`).
- `"componentSets"`: Diccionario con el ID del `COMPONENT_SET` maestro (ej. `"1562:4021"` = `Tabs 2`).

Para obtener **todos los estados** (`Default`, `Hover`, `Focus`, `Seleccionado`, `Inhabilitado`), haz una llamada al `componentSetId` o al `FRAME` de la página:

```bash
curl -sL -H "X-Figma-Token: <TU_FIGMA_TOKEN>" \
  "https://api.figma.com/v1/files/kW8LFCzYEiBxCgHu6gBD66/nodes?ids=1562:4021" \
  -o /tmp/figma_component_set.json
```

### Paso 4.3: Script Python para extraer medidas, colores HEX, bordes, radios y tipografía
Ejecuta este script Python sobre el JSON descargado para traducir los colores flotantes RGBA (`0.0–1.0`) de Figma a HEX exacto y listar todas las variantes:

```python
import json

with open("/tmp/figma_component_set.json") as f:
    data = json.load(f)

def rgb_to_hex(c):
    if not c:
        return None
    r = round(c["r"] * 255)
    g = round(c["g"] * 255)
    b = round(c["b"] * 255)
    return f"#{r:02X}{g:02X}{b:02X}"

for nid, nval in data.get("nodes", {}).items():
    doc = nval.get("document", {})
    print("ComponentSet:", doc.get("name"), "id:", doc.get("id"))
    for comp in doc.get("children", []):
        fills = [rgb_to_hex(f.get("color")) for f in comp.get("fills", []) if f.get("visible", True) is not False]
        strokes = [rgb_to_hex(s.get("color")) for s in comp.get("strokes", []) if s.get("visible", True) is not False]
        radii = comp.get("rectangleCornerRadii", comp.get("cornerRadius"))
        ind_strokes = comp.get("individualStrokeWeights", comp.get("strokeWeight"))
        pad = (comp.get("paddingTop"), comp.get("paddingRight"), comp.get("paddingBottom"), comp.get("paddingLeft"))
        bbox = comp.get("absoluteBoundingBox", {})
        print(f"\nVariant: {comp.get('name')} (id={comp.get('id')})")
        print(f"  Size: {bbox.get('width')}x{bbox.get('height')}, Padding(T,R,B,L): {pad}, Gap: {comp.get('itemSpacing')}, Layout: {comp.get('layoutMode')}")
        print(f"  Fills: {fills}, Strokes: {strokes}, StrokeWeights: {ind_strokes}, StrokeAlign: {comp.get('strokeAlign')}, Radii: {radii}")
        for ch in comp.get("children", []):
            ch_fills = [rgb_to_hex(f.get("color")) for f in ch.get("fills", [])]
            st = ch.get("style", {})
            print(f"  Child [{ch.get('type')}] {ch.get('name')} (visible={ch.get('visible', True)}): color={ch_fills}, font={st.get('fontFamily')} {st.get('fontWeight')} {st.get('fontSize')}px/{st.get('lineHeightPx')}px")
```

### Paso 4.4: Script Python para leer tablas de especificación (`FRAME Specs`)
En cada página del UI Kit existe un nodo llamado `Specs` (generado con el plugin EightShapes Specs) que documenta `Anatomy`, `Properties`, `State` y `Layout and spacing`. Para volcar todo su texto:

```python
import json

with open("/tmp/figma_specs_node.json") as f:
    data = json.load(f)

for nid, nval in data.get("nodes", {}).items():
    doc = nval.get("document", {})
    def dump_texts(n, path=""):
        nm = n.get("name", "")
        nt = n.get("type", "")
        cur = f"{path}/{nm}" if path else nm
        if nt == "TEXT":
            ch = n.get("characters", "").replace("\n", " | ")
            print(f"  [{n.get('id')}] {cur}: {ch}")
        elif nt in ("INSTANCE", "COMPONENT", "COMPONENT_SET"):
            print(f"  * [{nt}] {cur} (id={n.get('id')}, compId={n.get('componentId')})")
        for c in n.get("children", []):
            dump_texts(c, cur)
    dump_texts(doc)
```

---

## 5. Índice Completo de Páginas y Nodos Clave del `SND | UI Kit` (`kW8LFCzYEiBxCgHu6gBD66`)

Este índice fue extraído con `GET /v1/files/kW8LFCzYEiBxCgHu6gBD66?depth=2` y `GET /v1/files/kW8LFCzYEiBxCgHu6gBD66/component_sets` para ahorrar llamadas futuras:

### 5.1 Átomos (`🔴 ATOMOS`)
- **Colores** (`page id=0:1`)
- **Espaciados y cuadricula** (`page id=10:1177`)
- **Niveles de Sombras \*** (`page id=13247:57276`)
- **Texturas** (`page id=1879:9582`)
- **Tipografía** (`page id=3:434`)

### 5.2 Moléculas (`🔴🔴 MOLÉCULAS`)
| Página en Figma | `page_id` | `Component Sets` y `Frames` principales (`node_id`) |
| :--- | :--- | :--- |
| **Badges / Chips** | `1749:14986` | `ChipAccion` (`1833:559`), Frame `Badges` (`1790:7755`), Frame `Specs` (`15897:56360`), `Comportamiento chips de acción` (`20906:16889`) |
| **Barra de progreso** | `1749:22413` | `Step web` (`53:894`), `Stepper` (`8502:32935`), `StepperAtom` (`12952:7146`), `StepperVertical` (`24225:998`) |
| **Botones** | `1673:14375` | `Button` (`4376:693`), `Card button 2v` (`33187:19258`), Frame `36304:83861` |
| **Breadcrumbs \*** | `1686:18375` | `Breadcrumbs` (`24175:6800`), `Atom/Migas` (`53:22943`), Frame `Breadcrumbs` (`1686:18377`) |
| **Calendario** | `2446:1271` | `Time picker` (`17223:11492`), `Atom/Dia` (`2451:3001`), Frame `Calendarios` (`2446:1785`) |
| **Cargar archivos** | `2649:314` | `Upload button` (`4199:7400`), `Upload button EXPMX` (`6259:1866`), `Subir imagenes` (`24466:17706`), Frame `6126:11483` |
| **Divider** | `1749:14597` | Líneas divisorias |
| **Iconos** | `38:18630` | Frame `36295:68910` |
| **Inputs** | `1673:16536` | `Dropatom` (`8443:7043`), `Selector` (`33865:16171`), Frame `Inputs` (`1673:16539`), Frame `Documentación` (`1673:17372`), `Specs` (`16016:17238` y `32877:7545`), `Atomos` (`20897:32722`), Frame `36415:9403`, Frame `36415:14718` |
| **Loader / Loading** | `2651:2` | Indicadores de carga |
| **Messages** | `1749:21993` | Mensajes informativos |
| **Pagination \*** | `1749:14206` | Paginación |
| **Pictogramas** | `17771:20857` | `Pictogramas` (`20632:10588`), Frame `36301:72797` |
| **Radio button y check box** | `1695:20421` | `Radio button` (`624:1362`), Frame `1695:20422` |
| **Search bar** | `1686:19450` | Barra de búsqueda |
| **Switch/Toggle** | `1695:19927` | Interruptores |
| **Toast** | `12022:56474` | `Toast` (`9624:21540`), Frame `12022:56475` |
| **Tooltip** | `1695:20824` | `Tooltip` (`9150:873`), Frame `1695:20825` |

### 5.3 Organismos (`🔴🔴🔴 ORGANISMOS`)
| Página en Figma | `page_id` | `Component Sets` y `Frames` principales (`node_id`) |
| :--- | :--- | :--- |
| **Accordeon \*** | `37547:28374` | `Accordeon` (`11458:47355`), Frame `Drop down` (`37547:28375`) |
| **Barra accion** | `12030:38959` | Barras de acción |
| **Cards \*** | `12022:57247` | `Card` (`37597:51336`), `CardTramiteVDNI` (`9058:4960`), `CardContacto` (`9255:16694`), `CardResumen` (`9049:12264`), `Imageny texto` (`20723:2481`), `LogoTexto` (`20787:13705`), Frame `Cards` (`12022:57249`) |
| **Drawer (menú desplegable) \*\*** | `28172:9828` | `Frame 1000003930` (`28190:7134`), Frame `Correspondencia` (`28190:6706`) |
| **Footer** | `7323:1337` | Pie de página |
| **Header** | `1686:18799` | `TopBar` (`2145:2311`), `Navbar` (`8836:12107`), Frame `Header` (`2145:1885`) |
| **Hero \*** | `1749:13668` | `Hero v2` (`23984:19119`), `Billboard banner` (`399:1241`), `atom/contenido` (`23984:19053`) |
| **Lista Trámites Base** | `14001:46197` | `TrámitesLista` (`9076:27397`) |
| **Sidebar/Navbar** | `7323:1124` | `NavbarMovil` (`7332:3681`), `LlaveNav` (`7323:1962`), `LlaveMenu` (`13950:39536`), `Atom/Idioma` (`13950:37597`), Frame `Menus` (`7323:3447`) |
| **Modales \*** | `1749:13690` | Modales |
| **Tabla** | `4083:1840` | `Atomos/Tabla` (`9083:41328`), `OverlayFiltros` (`11380:33475`), `Atomo/Count & actions` (`22373:36067`), `Titulo Cards` (`23802:10074`), Section `Table` (`12022:54768`), Frame `Specs` (`16473:38995`) |
| **Tabs \*** | `1695:21269` | `Tabs 01` (`618:2598`), `Tabs 2` (`1562:4021`), `Menu lateral` (`26453:5787`), Frame `Tabs` (`1695:21270`), Frame `Specs` (`16460:867`) *(Ya extraídos al 100% en `catalogo-componentes-figma-extraidos.md`)* |
| **Título sección \*** | `12022:53841` | Encabezados de sección |
| **Formularios Base \*** | `8492:20877` | `FormularioBaseFront` (`9049:9514`) |
