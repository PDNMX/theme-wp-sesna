# Extracción normativa — Sistema Nacional de Diseño (SND) v1.1.0

Fuente: https://www.snd.gob.mx/ — extraído el 2026-10-13.
Documento de referencia para migración de proyecto "Gráfica base v3" al SND v1.1.0.

---

## Mapa de navegación (sitemap)

- **Inicio** (`/`)
- **Comenzar** (`/comenzar`)
- **Estilos** (`/estilos`): Colores, Iconos, Pictogramas, Tipografía, Retícula
- **Componentes** (`/componentes`): Barra de búsqueda, Botones, Listas, Barra de navegación, Barra de navegación lateral, Pie de página, Encabezado, Mensajes emergentes, Indicador de carga, Barra de progreso, Tabla, Selector de fechas, Casilla de verificación, Texturas, Radio botones, Mensajes informativos
- **Plantillas** (`/plantillas`): Página principal, Detalles del trámite, Bandeja de entrada del trámite, Mi perfil, Formulario para trámites (front office), Formularios para trámite (back office), Página de error, Medios de autenticación
- Enlace adicional en home: "Consulta aquí las versiones anteriores de la Gráfica base" (histórico, no es parte de la versión actual)

Cada subpágina de Estilos y Componentes organiza su contenido en 3 pestañas: **Descripción**, **Diseño**, **Desarrollo** (código HTML/CSS/JS, clases).

---

## 1. Inicio (`/`)

Sistema Nacional de Diseño: "Un marco que guía el diseño oficial de plataformas digitales del Gobierno de México con lineamientos y herramientas de ayuda, promoviendo servicios públicos accesibles y útiles para todas las personas."

- Acceso al UI Kit mediante formulario de invitación: https://forms.gle/RVasfEoRRM8moPnUA (requiere correo institucional)
- Tres pilares: Estilos, Componentes, Plantillas
- Enlace a versiones anteriores de la Gráfica base

---

## 2. Comenzar (`/comenzar`) — "Conoce la gráfica base"

Definición: "Es el conjunto de elementos gráficos que definen la identidad de las plataformas del gobierno. Incluye recursos como estilos y componentes para garantizar la uniformidad en todos los productos digitales."

### Paso 1 — Para personas diseñadoras (Figma / UI Kit)
1. Completar formulario (https://forms.gle/RVasfEoRRM8moPnUA) con correo institucional para invitación al UI Kit.
2. Ingresar a la invitación con el mismo correo (crear cuenta si no existe).
3. Abrir o crear un proyecto de diseño.
4. Ir a la sección de Activos/Assets → ícono de Librerías/Libraries.
5. Buscar la biblioteca de componentes llamada **SND | UI Kit**.
6. Seleccionar "Agregar" / "Add to file".
7. Listo: usar estilos, componentes y plantillas.

### Paso 2 — Elaborar una maqueta (desarrollo)

**Versiones disponibles en el selector:** 1.0.0 y **1.1.0** (versión actual/nueva).

1. Vincular hoja de estilos de GobMx en `<head>`:
   - **Tema verde:**
     ```html
     <link href="https://framework-gb.cdn.gob.mx/snd/v1.1.0/snd-verde.css" rel="stylesheet">
     ```
   - **Tema guinda:**
     ```html
     <link href="https://framework-gb.cdn.gob.mx/snd/v1.1.0/snd-guinda.css" rel="stylesheet">
     ```
2. Vincular el archivo JavaScript antes de cerrar `</body>`:
   ```html
   <script src="https://framework-gb.cdn.gob.mx/snd/v1.1.0/snd.js"></script>
   ```
3. Consultar la librería (componentes/plantillas) y copiar el código a tu proyecto.

**Nota de migración:** la URL del CDN cambia de versión en el path (`/snd/v1.1.0/...`); comparar contra la ruta usada actualmente en Gráfica base v3 (probablemente `/snd/v1.0.0/...` u otra convención) para actualizar el `<link>` y el `<script>`.

---

## 3. Estilos

### 3.1 Colores (`/estilos/colores`)

> "Definen la identidad visual y comunican la jerarquía de información en el diseño."

#### Descripción (reglas / lineamientos)

**Estructura de color**
- *Colores primitivos*: paleta base del sistema (hex/RGB/tokens), bloques sin significado específico; materia prima de los colores de identidad y de estado.
- *Colores semánticos*: significado funcional — verde=éxito, rojo=error, amarillo=advertencia, azul=información.

**Uso del color institucional**
- **Colores primarios**: identidad principal e interacciones clave (ej. botones principales). Guinda para proyectos federales, verde para proyectos transversales. ⚠️ **Obligatorio**: elegir una sola paleta primaria; no combinar guinda y verde o dorado. (presidencia guinda-900 / presidencia verde-900 / presidencia dorado-600)
- **Colores secundarios**: resaltan información o secciones, acento de color (pverde-500 / pguinda-600 / morado-500)
- **Colores neutros**: base para equilibrar el diseño (neutro-800 / neutro-500)
- **Colores de validación**: comunican estados del sistema — error/éxito/info (verde-500 / azul-500 / rojo-500)
- **Colores con opacidad**: superposición sin perder legibilidad (overlay — fondo de modal)
- **Colores adicionales**: uso controlado y justificado solo para casos específicos (estatus/categorías, elementos sin significado predefinido, mapas/gráficas/etiquetas múltiples). Debe respetar armonía visual y accesibilidad.

**Usos NO permitidos (obligatorio evitar)**
- No mezclar colores principales en un mismo componente.
- Evitar combinaciones de bajo contraste, especialmente en texto y elementos funcionales.
- No usar colores fuera de la paleta establecida (salvo colores adicionales autorizados).
- No asignar significados erróneos a colores funcionales (ej. no usar rojo para éxito, no usar amarillo para errores críticos).

#### Diseño (valores concretos — HEX)

**Presidencia Verde** (100→950, claro→oscuro)
100 `#E0E9E8` · 200 `#B3C8C6` · 300 `#82A4A0` · 400 `#51807A` · 500 `#335955` · 600 `#004D40` · 700 `#004339` · 800 `#003931` · 900 `#002F2A` · 950 `#001D1A`

**Presidencia Guinda**
100 `#F3E4E9` · 200 `#E1BDC9` · 300 `#CE92A6` · 400 `#BA6783` · 500 `#A84565` · 600 `#9B2247` · 700 `#8E1D3F` · 800 `#781838` · 900 `#611232` · 950 `#4A0C26`

**Presidencia Dorado**
100 `#F6F2EA` · 200 `#E4D9C0` · 300 `#DBCCAB` · 400 `#C9B280` · 500 `#B79956` · 600 `#A57F2C` · 700 `#846623` · 800 `#634C1A` · 900 `#423312` · 950 `#32260D`

**Color principal de la gama**
- Guinda → presidencia guinda-900
- Verde → presidencia verde-900
- Dorado → presidencia dorado-600

**Colores primitivos — Neutro**
100 `#FFFFFF` · 200 `#F9F9F9` · 300 `#F3F3F3` · 400 `#DDDDDD` · 500 `#AAAAAA` · 600 `#767676` · 700 `#434343` · 800 `#161A1D`

**Colores primitivos — de categoría** (100 claro / 500 oscuro)
- Rojo: `#FAE5E5` / `#9B0F15`
- Verde: `#F0FAF5` / `#086308`
- Azul: `#EDF2FE` / `#224497`
- Amarillo: `#FFEB99` / `#684700`
- Morado: `#ECE2F5` / `#6708C1`
- Naranja: `#F9D9A9` / `#6E3700`

**Colores semánticos (validación)**: Error (rojo-100/500) · Éxito (verde-100/500) · Informative (azul-100/500) · Warning (amarillo-100/500)

**Colores de íconos**: guinda→pguinda-900 · verde→pverde-600 · dorado→pdorado-600 · negro→neutro-800 · blanco→neutro-100

**Colores de texto**: principal→neutro-800 · deshabilitado→neutro-600 · blanco→neutro-100

**Degradados**: verde (pverde-900→pverde-600) · guinda (pguinda-900→pguinda-600)

**Colores de borde**: alto contraste→neutro-600 · bajo contraste→neutro-400 · seleccionado→azul-500

**Colores de fondo**: body→neutro-200 · tarjeta→neutro-100

**Color con opacidad**: overlay→neutro-800 al 56%

#### Desarrollo (implementación técnica)

- La gama se declara en `css/estilos.css`:
  ```css
  @import "base/_tema-guinda.css"
  @import "base/_tema-verde.css"
  ```
- Clases con sufijo `--principal` para el color principal de la gama activa:
  - `.color--principal` (texto) · `.icono--principal` (íconos/pictogramas) · `.fondo--principal` (fondo) · `.borde--principal` (borde)
  ```html
  <i class="snd__icono snd-star--filled icono--24 color--pverde600" aria-hidden="true"></i>
  <p class="color--principal">Texto color principal</p>
  <div class="fondo--principal"><p class="color--blanco">Fondo principal</p></div>
  <div class="borde--principal" style="border-style:solid"><p class="color--principal">Borde principal</p></div>
  ```
- **Gama completa por paleta** (10 tonos 100–950), clases `color--pverde{100..950}`, `color--pguinda{100..950}`, `color--dorado{100..950}`, y `color--neutro{100..800}` (solo 100–800).
- **Colores semánticos**: pueden invocarse por nombre de color o por función semántica:
  - `color--rojo500` ≡ `color--error`
  - `color--verde500` ≡ `color--exito`
  - `color--azul500` ≡ `color--info`
  - `color--amarillo500` ≡ `color--alerta`
  - `color--morado500` y `color--naranja500` no tienen equivalente semántico.
- **Degradados**: clases `degradado--arriba|abajo|izquierda|derecha` (sentido definido por el color más claro). Gama guinda usa pguinda600→pguinda900; gama verde usa pverde600→pverde900.
  - En CSS propio: `background-image: var(--degradado-arriba|abajo|izquierda|derecha)`

### 3.2 Iconos (`/estilos/iconos`)

> "Representan acciones, objetos o conceptos de manera visual que facilitan la comprensión y la navegación."

#### Descripción
Librería basada en **IBM Carbon Design System** (https://carbondesignsystem.com/elements/icons/library/). Cada ícono se selecciona para copiar su etiqueta `<i>` lista con clases y atributos de accesibilidad.

**Categorías e íconos disponibles** (nombres = sufijo de clase `snd-<nombre>`):
- **Generales** (~130 íconos): maximize, reading--glasses, arrival, piggy-bank, thumbs-up, share, search, up-to-top, presentation-file, train--profile, login, favorite--filled, code, select--window, drink--01, customer-service, filter, save, security, email, shopping--cart, document--attachment, recently-viewed, scales, notification, departure, building, calendar, tennis-ball, user--identification, chemistry, image--reference, play, fingerprint-recognition, unlocked, chat, upload, cabin-care, play--outline, locked, settings, phone, dot-mark, microscope, menu, hourglass, screen, money, send, user--speaker, finance, download, timer, thumbs-down--filled, copy, ticket, currency--dollar, return, catalog, pills, chart--histogram, list, chart--bar-stacked, chart--bar, bicycle, reminder--medical, logout, star--filled, trash-can, home, brightness-contrast, overflow-menu--horizontal, alarm, plane, radio, wifi, thumbs-up--filled, printer, table-of-contents, star--half, star, flash, portfolio, favorite, renew, camera, qr-code, sprout, delivery-truck, delivery, calculator, launch, forum, thumbs-down, train, light, gas-station, scan, image--search, box, fragile, event--schedule, hospital, map--identify, notification--new, image, bookmark--add, bookmark--filled, bookmark, user--certification, tag, color-palette, document--multiple-01, task--tools, entre otros (incluye íconos de la familia `ibm--*`).
- **Navegación**: arrow--left/right/down/up/up-left/up-right, chevron--left/right/up/down
- **Tablas y texto**: caret--sort, arrows--horizontal/vertical, sort--descending/ascending/remove, chevron--sort, caret--down/up, text-link, text--underline/color/align--left/center/right/bold/italic/indent--more
- **Alertas y mensajes**: add, add--filled, add--alt, subtract, subtract--filled, subtract--alt, checkmark, checkmark--filled, checkmark--outline, information, warning--alt, warning, close, close--filled, progress-bar--round, in-progress, help, dew-point
- **Documentos**: document--add/requirements/import/download/export/view/comment/pdf, file--x, folder, folder--details/parent/add, request-quote, document, edit, document--multiple-01
- **Mapas y localización**: earth, location, location--filled, map, user--online, map-boundary, heat-map--stocks, plan, airport-location
- **Personas y acciones**: dog-walker, user--settings, order-details, education, user, two-person-lift, group, accessibility--alt, accessibility, events, array-users, task--edit, user--avatar, user--follow, hotel, hospital-bed, user--speaker, pedestrian-child, collaborate, mobile, chart--multitype, fruit-bowl, shopping--catalog/bag, ruler, user--certification, enterprise, license--maintenance, user--favorite--alt, deployment-canary
- **Redes sociales**: logo--youtube, logo--facebook, logo--instagram, logo--x
- **Desarrollados para el SND** (propios, prefijo `snd-`): escudo-mexico, mujeres, personas-jovenes, personas-productoras, personas-adultas-mayores, programas-sociales, personas-indigenas, scan-face, megafono, edit, document-edit, whatsapp, youtube, facebook, instagram, x

#### Diseño (valores concretos)
- **Tamaños**: 16px, 20px, 24px, 32px (tamaños base mostrados en guía; ver clases ampliadas en Desarrollo: 12/16/20/24/32/48/64/80/96)
- **Layout y espaciados**: separación ícono–etiqueta de **8px**; combinaciones típicas: ícono 16px junto a texto, o ícono 20px junto a texto más grande
- **Touch target**: área táctil mínima de **40px**
- Colores: ver sección Colores (semánticos)

#### Desarrollo (implementación técnica)
- Etiqueta `<i>` con 2 clases obligatorias: `snd__icono` + `snd-<nombre-del-icono>`
- Accesibilidad: si el ícono es decorativo, agregar `aria-hidden="true"`
- **Tamaño** — clase `.icono--{tamaño}`, valores: `12, 16, 20, 24, 32, 48, 64, 80, 96`
  ```html
  <i class="snd__icono snd-star--filled icono--16" aria-hidden="true"></i>
  ```
- **Color** — clase `.color--{color}`; los íconos fuente deben ser negro `#000` y SVG (preferido) o PNG con transparencia
  ```html
  <i class="snd__icono snd-star--filled icono--48 color--pverde600" aria-hidden="true"></i>
  ```
  Colores disponibles: `pverde600`, `pguinda600`, `dorado600`, `neutro600`, `blanco`, `rojo500`, `verde500`, `azul500`, `amarillo500`, `morado500`, `naranja500`
  Equivalencias semánticas: `color--principal` = `pverde600` o `pguinda900` según tema · `rojo500`≡`error` · `verde500`≡`exito` · `azul500`≡`info` · `amarillo500`≡`alerta`
- Los íconos dentro de componentes (botones, formularios, tablas) heredan automáticamente los estilos del componente.

### 3.3 Pictogramas (`/estilos/pictogramas`)

> "Representaciones gráficas que facilitan explicar ideas, categorizar contenido o decorar con significado."

#### Descripción
Basados en **IBM Carbon Design System — Pictograms** (https://carbondesignsystem.com/elements/pictograms/library/). Se seleccionan para copiar la etiqueta `<i>` lista con clases y accesibilidad.

**Pictogramas disponibles**: wifi, university, assets-management, archive, availability, add-document, document-security, folder, accelerated-computating, cultura, economia, educacion, electoral, energia, gobierno-mexico, infraestructura, medio-ambiente, migracion, movilidad, mujer, multiculturalidad, presupuesto, programas-sociales, seguridad, salud, sociedad, territorios, trabajo, turismo, agricultura, home, semiconductor, id, eye, white-paper, upload, doctor, salud1, corazon, curita, salud2, huella-digital, dinero, formulario, dinero1, buscar-persona, muerte, ubicacion, persona, compras, diagrama, security-management, key-users, ubicacion2, access, web-error, serverless, construccion, data-warehousing, inspect-data, it-infrastructure-software, literature, paper, user-profile, pills, microscope, qr-code, engagement-inclusion, help-desk, build-leadership-and-culture, focus-room, teammates, discapacidad, question-and-answer, envelope, presentation-deck.
Ejemplo de uso mostrado: "Trabajo remoto".

#### Diseño (valores concretos)
- **Tamaños**: 48px, 64px, 80px, 96px, 128px

#### Desarrollo (implementación técnica)
- Etiqueta `<i>` con clases: `snd__pictograma` + `snd-<nombre>` + `icono--{tamaño}` + `color--{color}`
- Los archivos descargados vienen en **SVG, color dorado `#A57F2C`** por defecto.
- Accesibilidad: ícono decorativo → `aria-hidden="true"`.
- **Tamaño** — clase `.icono--{12,...}` igual que íconos; tamaños predefinidos del pictograma: 48/64/80/96/128.
  ```html
  <i class="snd__pictograma snd-gobierno-mexico icono--48 color--origen" aria-hidden="true"></i>
  ```
- **Color** — clase `.color--{color}` sobrescribe el dorado original; si no se agrega clase de color, usar `.color--origen` para conservar el dorado de marca.
  Colores disponibles: `pverde600`, `pguinda600`, `dorado600`, `neutro600`, `blanco`, `rojo500`, `verde500`, `azul500`, `amarillo500`, `morado500`, `naranja500`, `principal` (= pverde600 o pguinda900 según tema), equivalencias semánticas iguales a íconos (`error`, `exito`, `info`, `alerta`).
- Los pictogramas dentro de componentes heredan automáticamente los estilos del componente.

### 3.4 Tipografía (`/estilos/tipografia`)

> "Hacen que el contenido sea legible, claro y útil. Incluye tamaños, pesos y estilos tipográficos."

#### Descripción
**Familias tipográficas**: **Noto Sans** (tipografía predeterminada/variable, versátil, para cuerpo de texto y documentación oficial; también publicidad oficial) y **Patria** (tipografía original del Gobierno de México, de uso libre, exclusiva para títulos y encabezados breves de esta administración; se invoca con la clase `.patria`).

**Jerarquía tipográfica (nomenclatura)**: Encabezado (H0) · Título (H1) · Título secundario (H2) · Subtítulo (SH0) · Subtítulo (SH1) · Cuerpo de texto (B1 / B1IT itálica) · Botones (CTA) · Enlace de texto · Detalles (SD) · Detalles extra chico (XSD, solo escritorio).
Nomenclatura de clase: `<uso><número-de-tamaño><peso>` (a menor número, mayor tamaño).

**Usos NO permitidos (obligatorio evitar)**
- No mezclar tipografías institucionales con fuentes externas.
- No alterar proporciones, pesos o estilos tipográficos fuera de los definidos.
- No aplicar sombras, contornos o deformaciones que afecten la claridad.
- No usar tipografías institucionales en contextos ajenos a su propósito (ej. títulos legales con estilo de cuerpo de texto).

#### Diseño (valores concretos)

**Patria** (pesos: Regular 400, Bold 700) — usada solo para encabezados `<h1>`–`<h3>` en implementación:
| Estilo | Tamaño (pt) | Pesos | Line height | Letter spacing |
|---|---|---|---|---|
| H1 | 56 | Bold/Regular | 60 | 0% |
| H2 | 52 | Bold/Regular | 54 | 0% |
| H3 | 40 | Bold/Regular | 44 | 0% |
| H4 | 36 | Bold/Regular | 40 | 0 |
| H5 | 32 | Bold/Regular | 36 | 0 |
| H6 | 24 | Bold/Regular | 24 | 0 |

**Noto Sans** (pesos: Itálica, Regular, Medium, Semibold, Bold, Black):
| Estilo | Tamaño (pt) | Pesos | Line height | Letter spacing |
|---|---|---|---|---|
| Encabezado (H0) | 56 | Black, Bold, Medium | 60 | 0% |
| Título (H1) | 40 | Bold, Medium | 54 | 0% |
| Título secundario (H2) | 32 (límite máx. en móvil) | Bold, Medium | 44 | 0% |
| Subtítulo (SH0) | 24 | Bold, Medium, Regular | 33 | 0% |
| Subtítulo (SH1) | 20 | Bold, Medium, Regular | 27 | 0% |
| Cuerpo de texto (B1) | 16 | Semibold, Medium, Regular | — | 0% |
| Cuerpo de texto (B1IT) | 16 | Itálica | 22 | 0% |
| Botones (CTA) | 16 | Semibold | 22 | 0% |
| Enlace de texto | 16 (subrayado, color presidencia-900) | Semibold | 22 | 0% |
| Detalles (SD) | 14 (límite mín. en móvil) | Semibold, Regular | 19 | 0% |
| Detalles extra chico (XSD) | 12 | Semibold, Regular | 16 | 0% |

#### Desarrollo (implementación técnica)
- Familia predeterminada: **Noto Sans**; Patria solo para encabezados vía clase `.patria`.
- Usar etiquetas semánticas `<h1>`–`<h6>` manteniendo jerarquía secuencial (no saltar de `<h2>` a `<h4>`); un solo `<h1>` por página (accesibilidad y SEO). Texto general: `<p>`, `<div>`, `<span>`.
- **Sufijos de peso** en clase: `b` = bold (700) · `sb` = semibold (600) · `m` = medium (500) · `r` = regular (400) · (Patria agrega `bl` = black).
- **Clases de encabezado**: `h0bl/h0b/h0m` (H0) · `h1b/h1m` (H1) · `h2b/h2m` (H2) · `sh0b/sh0m/sh0r` (SH0) · `sh1b/sh1m/sh1r` (SH1)
  ```html
  <h1 class="h0b">H1: Título de la página</h1>
  <h2 class="h1b">H2:Título Sección</h2>
  <h3 class="h2b">H3:Subtítulo</h3>
  <h4 class="sh0b">H4:Subtítulo</h4>
  <p class="b1">Un texto descriptivo <span class="b1b">con negritas.</span></p>
  ```
- **Clases de cuerpo/detalle**: `b1sb/b1m/b1r/b1it` (B1) · `sdsb/sdr` (SD) · `xsdsb/xsdr` (XSD)
- **Patria** (encabezados, con clase adicional `.patria`): `h1b/h1r`, `h2b/h2r`, `h3b/h3r`, `h4b/h4r`, `h5b/h5r`, `h6b/h6r` + `.patria`
  ```html
  <h1 class="h1b patria">Patria h1 bold</h1>
  ```
- Texto para botones (CTA) y enlaces de texto: se define dentro del componente **Botón**.
- **Color**: color de texto predeterminado `neutro800`; para cambiarlo usar clase `.color--{color}` (ver sección Colores).
- **Espaciado**: todos los estilos tipográficos incluyen margen inferior de **16px** por defecto; ajustable con utilidades de espaciado (ver Retícula/utilidades).

### 3.5 Retícula (`/estilos/reticula`)

> "Estructura base que organiza la disposición de filas y columnas para ayudar a la adaptación responsiva en distintos dispositivos."

#### Descripción
Sistema de **12 columnas** adaptable a breakpoints. Elementos: Filas (espacio vertical), Columnas (espacio horizontal), Puntos de quiebre (breakpoints), Separadores (márgenes y medianiles/gap).

#### Diseño (valores concretos por breakpoint)

| Breakpoint | Ancho de pantalla | Margen del contenedor | Medianil (gap) | Ejemplo de columnas |
|---|---|---|---|---|
| Móvil XS (extra pequeño) | < 576px | 16px | 16px | 1 y 4 columnas |
| Móvil SM (pequeño) | < 640px | 16px | 16px | 1 y 4 columnas |
| Tableta MD (mediano) | < 1024px | 24px | 16px | 8 y 12 columnas |
| Escritorio LG (largo) | < 1536px | 56px | 24px | 12 columnas |
| Escritorio XL (extra largo) | ≥ 1536px | 56px | 24px | 12 columnas |

#### Desarrollo (implementación técnica — sistema de grid)

**Prefijos responsivos (breakpoints):**
| Prefijo | Mínimo | Nivel |
|---|---|---|
| (ninguno) | 0 | Mobile (base, sin prefijo) |
| `xs` | 0 | Mobile explícito (sobreescribe collapse mobile) |
| `sm` | 576px | Mobile landscape |
| `md` | 640px | Tablet |
| `lg` | 1024px | Desktop |
| `xl` | 1536px | Wide |

**Contenedor**: `.contenedor` centra el contenido, `max-width: 1416px` en XL, márgenes 16px(mobile)→24px(md)→56px(lg)→auto(xl). `.contenedor--fluido`: igual pero 100% de ancho (sin max-width).

**Grid (`reticulaGrid__N`)**: CSS Grid de N columnas iguales; gap responsivo por defecto (16px mobile/tablet, 24px desktop/wide). Hijos directos requieren clase `columna__*`.
```html
<div class="reticulaGrid__12 gapy--16">
  <div class="columna__12">...</div>
  <div class="columna__6">...</div><div class="columna__6">...</div>
  <div class="columna__4">...</div><div class="columna__4">...</div><div class="columna__4">...</div>
  ...
</div>
```
- Clases: `.reticulaGrid__1` … `.reticulaGrid__12` (fijo en todos los breakpoints); con sufijo `--xs/--sm/--md/--lg/--xl` para fijar N columnas desde ese breakpoint.
- Grid responsivo típico: `columna__12 columna__6--md columna__3--lg` (mobile:12 → md:6 → lg:3)
- `.reticulaGrid__divider`: línea divisoria vertical entre columnas.

**Gap — referencia de clases:**
| Clase | Propiedad | Valores |
|---|---|---|
| `.gap--*` | gap | 0,2,4,8,12,16,24,32,40 |
| `.gapx--*` | column-gap | 0,2,4,8,12,16,24,32,40 |
| `.gapy--*` | row-gap | 0,2,4,8,12,16,24,32,40,48,56,64,80,96 |

**Alineación (grid)**: `.align-items-start/end/center/stretch/baseline`, `.place-items-center/start/end`

**Fila (`.fila`)**: contenedor flex con `flex-wrap: wrap`, gap responsivo por defecto. Funciona con `columna__*`.
```html
<div class="fila">
  <div class="columna__6">...</div>
  <div class="columna__3">...</div><div class="columna__3">...</div>
</div>
```
- `.fila--columna` (flex-direction: column) · `.fila--reversa` (row-reverse) · `.fila--columna--reversa` (column-reverse)
- `.flex-direction-row--xs` restaura dirección horizontal desde 0px. Variantes responsivas: `.flex-direction-row--sm`, `.flex-direction-column--md`, `.flex-direction-row--lg`, etc.

**reticulaFlex**: contenedor flex SIN wrap, para alinear en una sola línea (barras de acción, grupos de botones). Gap responsivo por defecto.
```html
<div class="reticulaFlex justify-content-space-between align-items-center">
  <div>Izquierda</div><div>Derecha</div>
</div>
```
- `.flex-direction-row/column/row-reverse/column-reverse`
- `.justify-content-flex-start/flex-end/center/space-between/space-around/space-evenly`
- `.align-items-flex-start/center/flex-end/stretch`
- `.flex-wrap-wrap/nowrap`
- Variantes responsivas con patrón `propiedad-valor--viewport` (ej. `.justify-content-center--md`)

**Columna (`columna__*`)** — clase compartida entre `reticulaGrid` y `fila`; define simultáneamente `grid-column: span N` (contexto grid) y `flex: 0 0 calc(X%)` (contexto flex); el navegador aplica la que corresponde según el padre, permitiendo reutilizar la misma clase en ambos contextos.
- `.columna__1` … `.columna__12`: span de N sobre 12 (grid) o % proporcional (flex)
- `.col-100`: ancho completo (grid y flex)
- `.flex-grow` / `.flex-shrink` / `.flex-none`: solo flex
- `.columna__sangria--1` … `--12`: fuerza inicio en línea N del grid (**solo grid**, sin efecto en fila)
- `.col--divider`: línea divisoria horizontal de ancho completo
- `.order--primero` (order:-1) / `.order--ultimo` (order:99)
- `.columna__*--xs`: sobreescribe el collapse mobile desde 0px (el collapse aplica primero, esta clase lo revierte); también existen `.flex-grow--xs`, `.flex-shrink--xs`, `.flex-none--xs`
- Variantes responsivas: `.columna__*--sm/--md/--lg/--xl`
- Alineación individual: `.align-self-start/center/end/stretch`; `.justify-self-start/center/end/stretch` (solo grid); `.place-self-center` (solo grid)

**Nota de migración importante**: el sistema `columna__*` es dual (grid+flex) — al migrar layouts de Gráfica base v3, verificar si el contenedor padre usa `reticulaGrid__N` o `fila`, ya que cambia el mecanismo CSS subyacente aunque la clase hijo sea igual.

---

---

## 4. Componentes

### 4.1 Barra de búsqueda (`/componentes/barra-busqueda`)

> "Permite introducir texto para localizar información o contenidos específicos."

#### Descripción
**Variantes**: (1) *Barra de búsqueda para landings* — usada específicamente en ventanillas de trámites, versiones desktop y móvil. (2) *Barra de búsqueda input* — para cualquier pantalla donde el usuario localiza información/contenidos/funciones; versiones desktop y móvil.

**Estados**: Default, Focus, Active, Filled.

**Usos NO permitidos**
- Ejecutar funciones ajenas a la búsqueda (comandos/acciones no relacionadas).
- Mostrar mensajes poco claros o sin relación con la búsqueda.
- Romper coherencia visual del UI Kit (colores, tipografía, íconos distintos).

#### Diseño (anatomía y valores concretos — spec Figma)
**Envolvente**: fondo `neutro-100` · sombra "Drop LV 3" (`0px 6px 12px 0px #000000`) · radio de borde `100`
**Texto**: color `neutro-500` · estilo desktop `SH0R` (Subheading) · estilo móvil `B1R` (Body)
**Envolvente ícono (botón)**: fondo `presidencia guinda-900` (tema guinda) / `presidencia verde-900` (tema verde) · ícono `IC/Search`
**Input (variante sin botón)**: ancho variable · fondo `neutro-200` · borde `neutro-400` (1px, por dentro) · radio `100`

**Estados (tabla resumida)**:
| Estado | Borde | Color borde | Texto |
|---|---|---|---|
| Focus | 2px, hacia dentro | guinda-900 / verde-900 | — |
| Active | 1–2px, hacia dentro | guinda-900 / verde-900 | neutro-800, SH0R/SH1R/B1R |
| Filled | 1px, hacia dentro | guinda-900/verde-900 o neutro-400 según variante | neutro-800 |
- Ícono de limpiar (`Close-circle`): color guinda-900/verde-900, 24–32px según variante.

**Construcción UI desktop**: dirección horizontal, padding-left 32px; envolvente ícono: alto 72px, item spacing 10px, padding 16/24px (top-bottom/left-right).
**Construcción UI mobile**: dirección horizontal, alineación middle-left, item spacing 8px, padding-left 16px; envolvente ícono con padding 8/16px.

#### Desarrollo (implementación técnica)

**Breakpoints de resize**: `@media (min-width: 640px)` tabletas · `@media (min-width: 1024px)` laptops/escritorio (mobile es el caso base, <640px).

**Accesibilidad obligatoria**:
- `<label>` oculto visualmente con clase `.oculto` pero disponible para lectores de pantalla (nunca `display:none`).
- `<input>` con `aria-haspopup="listbox"` cuando despliega sugerencias.
- Lista de sugerencias con `position: absolute` respecto al contenedor, para no empujar el contenido de la página.
- Variante "secciones internas" debe envolverse en `<form>` para que ENTER dispare `submit` (no hay botón visible); el `:focus` del input debe resaltar claramente como única pista visual.
- `type="search"` activa teclado virtual con lupa en móvil.

**Variante landing (con botón):**
```html
<form class="search-container" style="width: 100%">
  <label for="search-main" class="oculto">Busca actividades o servicios</label>
  <div class="form__inset main-search">
    <input type="search" id="search-main" placeholder="Ejemplo: actividades turístico recreativas" class="sh0r js-input" autocomplete="off" aria-expanded="false" aria-haspopup="listbox" />
    <button class="search-button" type="submit">
      <span class="oculto">Buscar</span>
      <i class="snd__icono snd-search icono--32 color--blanco" aria-hidden="true"></i>
    </button>
  </div>
  <ul id="search-suggestions" class="suggestions-list js-list is-hidden" role="listbox">
    <li role="option">Senderismo en la montaña</li>
  </ul>
</form>
```

**Variante sección interna (sin botón, ENTER para enviar):**
```html
<form class="search-container" style="width: 90%" action="/buscar" method="GET">
  <label for="search-general" class="oculto">Buscar actividades</label>
  <div class="form__inset general-search">
    <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
    <input type="search" id="search-general" name="q" placeholder="Ejemplo: actividades turístico recreativas" class="sh0r js-input" autocomplete="off" />
    <ul class="search-results js-list is-hidden" id="results-list">
      <li>Opción predictiva 1</li>
    </ul>
  </div>
</form>
```

---

### 4.2 Botones (`/componentes/botones`)

> "Un botón es un elemento interactivo que permite al usuario ejecutar acciones dentro de la plataforma o interfaz. Su estilo visual varía según la jerarquía o nivel de importancia de la acción que representa, pudiendo ser primario, secundario o fantasma."

#### Descripción
**Categorías / jerarquía**:
- **Primario** (tamaños Básico y Grande): resalta la acción más importante; ⚠️ solo debe haber uno por sección.
- **Secundario** (Básico y Grande): complementa al primario con acción alternativa de menor jerarquía.
- **Fantasma** (solo Básico): acciones de baja prioridad, generalmente en línea con contenido.

**Estados** (obligatorios, deben implementarse de forma consistente): Habilitado (enabled) · Hover (cursor encima) · Focus (enfocado, accesibilidad por teclado) · On tap/clic sostenido · Deshabilitado (disabled) · Cargando (Loader) — el botón fantasma de texto no tiene variante cargando.

#### Diseño (valores concretos — spec Figma)

**Tamaños**: Normal → alto 48px, ancho variable, texto `Base/Body/CTA`. Grande → alto 64px, ancho variable, texto `Base/Subheading/SH1M`.

**Estados botón PRIMARIO** (radio de borde: 8 en todos):
| Estado | Fondo | Borde | Texto |
|---|---|---|---|
| Default | guinda-900 / verde-900 | — | neutro-100, CTA |
| Hover | guinda-600 / verde-600 | — | neutro-100, CTA |
| Focus | guinda-900 / verde-900 | guinda-300/verde-300 | neutro-100, CTA |
| Active (clic sostenido) | guinda-100 / verde-100 | — | neutro-800, CTA |
| Disabled | neutro-400 | — | neutro-500, CTA |
| Loading | guinda-900 / verde-900 | — | ícono spinner color neutro-100 |

**Estados botón SECUNDARIO** (radio de borde: 8):
| Estado | Fondo | Borde | Texto |
|---|---|---|---|
| Default | neutro-100 | 1px guinda-900/verde-900 | guinda-900/verde-900, CTA |
| Hover | guinda-100/verde-100 | 1px guinda-900/verde-900 | guinda-900/verde-900, CTA |
| Focus | neutro-100 | 3px (por fuera) guinda-900/verde-900 | guinda-900/verde-900, CTA |
| Active | guinda-200/verde-200 | — | guinda-900/verde-900, CTA |
| Disabled | neutro-100 | 1px (por fuera) neutro-600 | neutro-600, CTA |
| Loading | neutro-100 | 1px (por fuera) guinda-900/verde-900 | ícono color guinda-900/verde-900 |

**Estados botón FANTASMA** (sin fondo/borde en default):
| Estado | Fondo | Borde | Texto |
|---|---|---|---|
| Default | — | — | guinda-900/verde-900, CTA |
| Hover | verde-100/guinda-100 | — | guinda-600/verde-600, CTA(S) |
| Focus | verde-100/guinda-100 | 2px (por fuera) guinda-900/verde-900 | guinda-900/verde-900, CTA(S) |
| Active | verde-200/guinda-200 | — | guinda-950/verde-950, CTA(S) |
| Disabled | — | — | neutro-500, CTA(S) |

**Layout y espaciado**
- Primario/Secundario: horizontal, centrado, alto 48px, espacio entre elementos 8px, margen vertical 16px, margen mínimo horizontal 24px.
- Fantasma: horizontal, centrado, alto 48px, espacio entre elementos 4px, margen vertical 4px, margen mínimo horizontal 8px.

#### Desarrollo (implementación técnica)

**Clases base** (`.boton__*` controla tipografía, márgenes, relleno, borde):
- `.boton__primario` · `.boton__secundario` · `.boton__fantasma`
```html
<button type="button" class="boton__primario">Botón primario</button>
```
- Aplicable también a `<input type="button|submit|reset">` y `<a>`.

**Deshabilitado**: `<button>`/`<input>` con atributo `disabled` adoptan el estilo automáticamente. Para `<a>`, usar clase modificadora `--disabled` (ej. `boton__primario--disabled`).

**Con íconos**: los íconos dentro de `.boton__*` se ajustan automáticamente al estilo del botón; deben ser SVG (preferido) o PNG, color negro `#000`, fondo transparente.
```html
<button type="button" class="boton__primario">
  <i class="snd__icono snd-chevron--left" aria-hidden="true"></i>
  Botón primario
  <i class="snd__icono snd-chevron--right" aria-hidden="true"></i>
</button>
```
- `.boton--vertical`: ícono centrado arriba del texto.

**Botón cargando (loader)** — requisitos obligatorios combinados:
1. Clase `.boton--cargando`
2. Atributo `disabled`
3. Atributo `aria-busy="true"`
4. Texto envuelto en `<span class="oculto">` (oculto visual, visible a lectores de pantalla)
5. Ícono con clase `.icono__spin` (rotación indefinida)
```html
<button type="button" class="boton__primario boton--cargando" disabled aria-busy="true">
  <span class="oculto">Acción del botón</span>
  <i class="snd__icono snd-snd-loading2 icono__spin" aria-hidden="true"></i>
</button>
```

**Modificadores / variantes**:
| Clase | Efecto |
|---|---|
| `.boton--grande` | Tamaño grande (64px alto) |
| `.boton--100` | Ancho 100% del contenedor |
| `.boton--100sm` | Ancho 100% solo en vista móvil |
| `.boton--wrap` | Permite salto de línea (por defecto el texto es una sola línea) |
| `.boton--redondeado` | Bordes completamente redondeados |
| `.fantasma--blanco` | Variante fantasma de alto contraste para fondos de color (degradados, `fondo--neutro700`) |

---

### 4.3 Listas (`/componentes/listas`)

> "Utilizar listas ayuda a reducir la carga cognitiva al evitar párrafos extensos y al ofrecer una jerarquía visual más definida."

#### Descripción — Variantes
- **Listas ordenadas** (`<ol>`): secuencia lógica/jerárquica (pasos, procesos numerados).
- **Listas desordenadas** (`<ul>`): orden no relevante (características, tareas).
- **Listas sin estilos**: mantienen semántica pero sin estilos visuales por defecto.
- **Lista horizontal**: ítems en una misma línea (navegación, etiquetas, espacio vertical limitado).

**Usos NO permitidos**: mezclar estilos, usar símbolos improvisados (ej. emojis como viñeta ✅✨🔐), alterar jerarquías visuales, usar listas para fines distintos a organizar contenido, romper alineación/espaciado definido.

#### Diseño (valores concretos)
- Espaciado entre ítems: **8px** y **12px**; indentación de texto: **16px**
- Viñetas (`Bullet`), tamaño 6px, por jerarquía:
  - Primario: `presidencia guinda-900` (tema guinda) / `presidencia verde-900` (tema verde)
  - Secundario: `presidencia dorado-600`
  - Terciario: `neutro-600`

#### Desarrollo (implementación técnica)
| Clase | Aplica a | Efecto |
|---|---|---|
| `.listaSinEstilos` | `<ul>` | Ajusta margin/padding/tamaño de viñetas al estilo básico GobMx (lista más usada) |
| `.listaBasica` | `<ul>` | Viñetas con color primario de la gama activa |
| `.listaBasica--secundaria` | `<ul class="listaBasica">` | Viñetas color dorado (jerarquía secundaria) |
| `.listaBasica--terciaria` | `<ul class="listaBasica">` | Viñetas color gris (jerarquía terciaria) |
| `.listaBasica` | `<ol>` | Solo ajusta margin/padding (sin viñetas) |
| `.listaHorizontal--columna` | `<ol>`/`<ul>` | Cada ítem se acomoda en columna |
| `.listaHorizontal--fila` | `<ol>`/`<ul>` | Ítems en fila; al llegar al límite lateral continúa en nueva fila (wrap) |
| `.deslizable` | combinar con `.listaHorizontal--fila` | Desborde horizontal con scroll/deslizamiento |

```html
<ul class="listaSinEstilos"><li>Item</li></ul>
<ul class="listaBasica"><li>Item</li></ul>
<ul class="listaBasica listaBasica--secundaria"><li>Item</li></ul>
<ol class="listaHorizontal--fila deslizable"><li>Item</li></ol>
```

---

### 4.4 Barra de navegación / navbar (`/componentes/barra-navegacion`)

> "Componente de navegación principal que proporciona acceso a las diferentes secciones de la aplicación."

#### Descripción
**Variantes**: Barra de navegación escritorio · Móvil/tablet: configuraciones (franja superior: accesibilidad, idioma, Llave MX) · Móvil/tablet: navegación inferior (tab bar con Inicio/Blog/Prensa/Más).

**Estados**: Configuraciones — Visitante / Sesión iniciada / Sesión iniciada con menú abierto. Navegación inferior / Navegación inferior con menú "Más" abierto.

Responde a los temas (guinda/verde) igual que el Encabezado (header).

**Usos NO permitidos**
- No añadir logos adicionales; mostrar únicamente el logotipo institucional definido.
- No cambiar la posición o estructura de los elementos.
- No mezclar temas o colores fuera de los establecidos.

#### Diseño (anatomía y valores concretos — spec Figma)
- Fondo del navbar: `presidencia guinda-950` · sombra `0px 4px 4px 0px #000000`
- Contenedor: ancho máximo **1920px**
- Botón accesibilidad: círculo 32×32px, fondo `#CD353C`, radio de borde 200 (circular)
- Menú expandido móvil: fondo degradado presidencia 900→600, radio esquina superior izq. 16px; panel: alto 812 / ancho 285 (mín) – 512 (máx), radio esquina inferior izq. 16, sombra "Drop LV 2" (`0px 4px 8px 0px #000000`)
- Construcción UI: contenedor horizontal, alineación centro, `item spacing: 24`; navbar escritorio con padding lateral 56px; navbar móvil con padding 8/16px e item spacing 8.

#### Desarrollo (implementación técnica)

Se implementa como componente complementario al `<header>`, posicionado fijo debajo de este. Estructura dentro del header: contenedor institucional (`.mexico`) + barra de navegación (`.subheader`).

**Elementos**: navegación principal (lista de enlaces de primer nivel), botón de accesibilidad (abre panel externo con: restablecer configuración, escala de grises, lector de pantalla, cursor ampliado, alto contraste, máscara de lectura, guía de lectura, tipografía para dislexia, espaciado vertical/horizontal, ajuste de tamaño de fuente, resaltar enlaces), menú de idioma (es/en/de/it/fr/pt), botón "Iniciar sesión" (identidad Llave MX) — o, si hay sesión, menú de perfil de usuario.

**Estructura HTML (visitante):**
```html
<section class="subheader">
  <div class="subheader__contenedor">
    <details class="mexico__details navHeader__details">
      <summary class="mexico__summary"><span class="mexico__span">Menú</span></summary>
      <nav class="navHeader">
        <ul class="navHeader__ul mexico__detailsCont">
          <li class="navHeader__li"><a href="#" aria-current="page" class="navHeader__a">Inicio</a></li>
          <li class="navHeader__li"><a href="#" class="navHeader__a">Qué hacemos</a></li>
        </ul>
      </nav>
    </details>
    <button type="button" class="boton__limpio">
      <i class="snd__icono snd-accessibility--alt icono--32 icono--circuloRojo" aria-hidden="true"></i>
      <span class="oculto">Opciones de accesibilidad</span>
    </button>
    <div class="idioma">
      <div class="idioma__cont idioma--sm"> <!-- versión abreviada (Es/En...) -->
        <label for="idioma-select" class="oculto">Selecciona idioma</label>
        <select class="idioma__select" id="idioma-select"><option lang="es">Es</option>...</select>
        <div class="idioma__marker" aria-hidden="true"><i class="snd__icono snd-chevron--down color--blanco" aria-hidden="true"></i></div>
      </div>
      <div class="idioma__cont idioma--lg"> <!-- versión completa (Español/English...) --> ... </div>
    </div>
    <div class="iniciarSesion">
      <a href="#" class="iniciarSesion__a cta">
        <span class="iniciarSesion__txt">Iniciar sesión</span>
        <i class="snd__icono snd-snd-llaveMX iniciarSesion__logollave" aria-hidden="true"></i>
      </a>
    </div>
  </div>
</section>
```

**Con sesión iniciada**: el bloque `.iniciarSesion` se reemplaza por un menú de perfil `<details class="usrperfil__details detailsClickOut">` / `<summary class="usrperfil__summary">` que muestra iniciales + nombre y despliega (`<ul class="usrperfil__ul">`, ítems `.usrperfil__li` / `.usrperfil__opcion`): **Mi perfil**, **Cambiar perfil** (con selector de perfiles: Ciudadano / Funcionario / Persona moral, incluye buscador `<input type="search">` para persona moral), **Ir a Llave MX**, **Cerrar sesión**.

**Comportamiento responsivo**: en resoluciones < 767px cambia a disposición vertical con menú colapsable (hamburguesa); menú alineado a la derecha, elementos apilados verticalmente, opción activa resaltada con color institucional.

**Versiones de tema**: requiere importar el CDN correspondiente (`snd-verde.css` o `snd-guinda.css`, ver sección Comenzar) para activar la variante Verde o Guinda.

---

### 4.5 Barra de navegación lateral / sidebar (`/componentes/barra-lateral`)

> "Componente de navegación principal que proporciona acceso a las diferentes secciones laterales de la aplicación."

#### Descripción
**Variantes**: navegación con opciones booleanas y opción de anidar subsecciones.
**Estados**: Móvil colapsado · Móvil con opción "Más" abierta · Escritorio expandido · Escritorio colapsado · Escritorio colapsado con subsecciones anidadas.
Uso típico: accesos a documentos, trámites o cambio de perfil.

#### Diseño (anatomía y valores concretos — spec Figma)
- Fondo: degradado institucional "Presi 900-600" (vertical) · sombra `2px 0px 6px 0px #000000`
- Botón Llave MX (opcional/booleano): alto 40px, fondo `presidencia guinda-700`
- Botón colapsar: alto 64, ancho 16, fondo `presidencia guinda-600`, radios superior/inferior izquierdo 16px
- Indicador de ítem activo: alto 56, ancho 8, fondo `presidencia guinda-100`, radios 12px
- **Item (estados)**:
  | Estado | Fondo | Texto |
  |---|---|---|
  | Default | ninguno | neutro-100 |
  | Hover | guinda-700 | neutro-100 |
  | On tap | guinda-900 | neutro-100 |
  | Seleccionado | guinda-400 | neutro-100 |
- Menú móvil expandido ("Más"): sombra "Drop LV 2" (`0px 4px 8px 0px #000000`), alto 812, ancho 285–512, radio esquina inferior izquierda 16px.
- Construcción UI: sidebar vertical, alineación centro superior, item spacing 16; navbar móvil horizontal, item spacing 8, padding 8/16.

#### Desarrollo (implementación técnica)
- Semántica: `<nav class="menuMain" aria-label="Navegación principal">`. Responsive: barra lateral colapsable en escritorio (`min-width: 767.9px`, ancho fijo **256px**) / barra inferior en móvil (`max-width: 767.9px`).
- Botón colapsar: `<button aria-controls="menuMain" aria-expanded="true" aria-haspopup="menu" class="menuMain__gatillo">`
- Encabezado del módulo: `<div class="menuMain__header">` con ícono del sistema/trámite.
- Ítem de navegación: `<li class="menuMain__item"><a class="menuMain__link menuMain__linkSm" aria-current="page"><i class="snd__icono ..." aria-hidden="true"></i><span class="menuMain__txt">Texto</span></a></li>`
- Ítem activo: atributo `aria-current="page"` (se resalta visualmente con fondo distinto).
- Opción "Más" (móvil): `<button class="menuMain__link" aria-expanded="false">`, abre panel `.menuMovil` (`.menuMovil--colapsado`) desde la derecha, ancho 75% de pantalla, scroll interno, botón superior para cerrar.
- **Navegación con anidación**: usa `<details>`/`<summary>` por sección; `<summary class="menuMain__link menuMain__linkSm">` con ícono de flecha `.menuMain__summaryFlecha.details__flecha` que rota según estado expandido; subsecciones en `<ul class="menuMain__submenu"><li class="menuMain__submenuItem"><a class="menuMain__submenuLink">...</a></li></ul>`.
```html
<nav class="menuMain" aria-label="Navegación principal" id="menuMain">
  <button type="button" aria-controls="menuMain" aria-expanded="true" aria-haspopup="menu" class="menuMain__gatillo">
    <span class="oculto">Mostrar menú</span>
    <i class="menuMain__gatilloIco snd__icono snd-chevron--left" aria-hidden="true"></i>
  </button>
  <div class="menuMain__header"><div class="menuMain__headerCont"><i class="snd__icono snd-snd-expedienteMX color--origen" aria-hidden="true"></i></div></div>
  <ul class="menuMain__lista">
    <li class="menuMain__item">
      <a href="#" class="menuMain__link menuMain__linkSm" aria-current="page">
        <i class="snd__icono snd-folder menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">Mis documentos</span>
      </a>
    </li>
    <li class="menuMain__item menuMain__item--mas">
      <button class="menuMain__link" aria-expanded="false">
        <i class="snd__icono snd-overflow-menu--horizontal menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">Más</span>
      </button>
    </li>
  </ul>
</nav>
```
- **Color**: refuerza orientación del proyecto (guinda=federal / verde=transversal); definido por el paquete CSS/tema importado (ver Comenzar).

---

### 4.6 Pie de página / footer (`/componentes/footer`)

> "El pie de página o footer es la franja ubicada al final de una página. Generalmente contiene información institucional, enlaces secundarios o avisos legales, funcionando como cierre y soporte complementario dentro de la interfaz."

#### Descripción
Doble función: informativa (recursos clave) y estructural (delimita el fin del recorrido de lectura).
**Versiones**: Desktop · Mobile (con acordeón, ícono hamburguesa que se transforma en cierre) · **Lite** (variante condensada, solo logo GobMx + número de versión; ⚠️ uso exclusivo en sistemas internos/backoffice, NO visible para ciudadanía).
Disponible en color guinda y verde.

**Usos NO permitidos**
- No incluir enlaces extra (vínculos externos, accesos directos o botones fuera de la navegación oficial).
- No cambiar posición o estructura de los elementos.
- No cambiar tipografías, tamaños de texto o colores no definidos en el sistema.

**Reglas de implementación**: retícula de 12 columnas, ancho base **1440px** en escritorio / 4 columnas, ancho base **375px** en móvil. Sobre 1440px el fondo se extiende a todo el ancho mientras el contenido permanece centrado. **Breakpoint móvil: < 699px**.

#### Diseño (valores concretos — spec Figma)
**Desktop**: fondo `presidencia guinda-950` (guinda) / `presidencia verde-900` (verde) · ancho 1440px (mínimo 700px) · logo "Gobierno 2025" blanco horizontal, ancho 206px · textos `neutro-100` en estilos `SH1B` (título), `SDR`/`SDSB` (cuerpo), `CTA` (enlaces) · íconos RRSS 24×24px.
**Mobile**: fondo igual · ancho 375px (máx. 699px) · alto 56px · logo igual · textos `B1SB`.

#### Desarrollo (implementación técnica)
Etiqueta semántica `<footer class="footer">`. Tres columnas: identidad institucional (escudo), información y enlaces (`<details>/<summary>` para "¿Qué es gob.mx?" y "Enlaces"), redes y atención ciudadana (denuncia, RRSS, línea 079).

```html
<footer class="footer">
  <div class="footer__contenedor">
    <div class="footer__mexico"><i class="snd__icono snd-gobierno-mexico footer__escudo color--origen" aria-hidden="true"></i></div>
    <div class="footer__colCentral">
      <div class="footer__gobmx">
        <details class="mexico__details" open>
          <summary class="footer__summary footer__summary--gobmx"><span class="footer__tit">¿Qué es gob.mx?</span></summary>
          <p class="mexico__detailsp">Es el portal único de trámites... <a href="..." target="_blank" rel="noopener" title="El enlace abre en ventana nueva"><b>Leer más</b></a></p>
        </details>
      </div>
      <div class="footer__enlaces">
        <details class="mexico__details" open>
          <summary class="footer__summary footer__summary--enlaces"><span class="footer__tit">Enlaces</span></summary>
          <div class="footer__enlacesList">
            <div class="footer__enlacesCol1"><a class="footer__enlacesLink" href="..." target="_blank" rel="noopener">Datos</a></div>
            <div class="footer__enlacesCol2">...</div>
          </div>
        </details>
      </div>
    </div>
    <div class="footer__redes">
      <p class="footer__denuncia"><a href="https://sidec.buengobierno.gob.mx/#!/" target="_blank" rel="noopener">Denuncia contra servidores públicos</a></p>
      <div class="footer__siguenosCont">
        <p class="footer__siguenosTit">Síguenos en</p>
        <ul class="footer__redes__ul">
          <li><a target="_blank" rel="noopener" href="..." aria-label="Facebook de Presidencia"><i class="snd__icono snd-snd-facebook" aria-hidden="true"></i></a></li>
          <!-- X/twitter, instagram, youtube análogos -->
        </ul>
      </div>
      <div class="footer__079">
        <div class="footer__079col1"><i class="snd__icono snd-snd-079 footer__079img" aria-hidden="true"></i><span class="footer__079num">079</span></div>
        <div class="footer__079info"><span class="footer__079txt">Comunícate,<br/>estamos para ayudarte</span></div>
      </div>
    </div>
  </div>
</footer>
```
- Todos los enlaces externos llevan `target="_blank" rel="noopener" title="El enlace abre en ventana nueva"` (buena práctica de accesibilidad/seguridad obligatoria).
- CSS Grid para estructurar el footer; `.footer` empuja automáticamente al fondo de la página (sticky footer); `.footer__contenedor` centra y limita ancho vía variable `--MaxWidth: 1440px`.
- Responsivo < 767px: disposición vertical, `<details>` funcionan como acordeón, íconos sociales reducen tamaño, se reorganiza el orden visual.

**Variante Lite** — clase modificadora `.footer--lite`, solo escudo + versión:
```html
<footer class="footer">
  <div class="footer__contenedor footer--lite">
    <div class="footer__mexico"><i class="snd__icono snd-gobierno-mexico footer__escudo color--origen" aria-hidden="true"></i></div>
    <div class="footer__version">Versión 1.1</div>
  </div>
</footer>
```
- `.footer--lite` distribuye los bloques horizontalmente; `.footer__version` centra verticalmente el texto. Responsivo < 767px: apilado vertical.
- **Color**: definido por el tema CSS importado (guinda=federal / verde=transversal).

---

### 4.7 Encabezado / header (`/componentes/header`)

> "Elemento superior que guía la navegación y da identidad visual."

#### Descripción
Concentra identidad gráfica institucional + menús de navegación principales. Fijo en la parte superior. En apps móviles suele ocultarse para optimizar espacio; en web se muestra siempre.
**Versiones**: Desktop · Mobile (ícono hamburguesa que se transforma en ícono de cierre al desplegar) · Solo colores oficiales: Guinda / Verde.

**Usos NO permitidos**
- No añadir logos adicionales; solo el logotipo institucional definido.
- No incluir enlaces extra (externos, accesos directos, botones fuera de navegación oficial).
- No cambiar posición o estructura de elementos.
- No usar el header como contenedor de mensajes temporales.

**Reglas de implementación**: retícula 12 columnas, ancho base 1440px escritorio / 4 columnas, 375px móvil. Fondo se extiende sobre 1440px, contenido centrado. **Breakpoint móvil: < 699px**.

#### Diseño (valores concretos — spec Figma)
- Desktop: fondo `presidencia guinda-950`/`presidencia verde-900` · ancho 1440px (mín. 700px) · **alto 80px** · logo blanco horizontal · botón tipo Ghost
- Mobile: mismo fondo · ancho 375px (máx. 699px) · **alto 56px** · ícono de menú
- Mobile abierto: sombra "Drop LV 2/3" (`0px 6px 12px 0px #000000`), fila con borde `neutro-400` 1px
- Construcción UI: envolvente horizontal, alineación centro, item spacing 24px, padding vertical 8px, padding lateral 56px (desktop); menú expandido móvil con padding 12px/16px.

#### Desarrollo (implementación técnica)
Etiqueta semántica `<header class="header">`. Incluye: (1) enlace "Saltar al contenido principal" (`.irContent`, apunta a `#mainContent`, requisito de accesibilidad para navegación por teclado), (2) contenedor institucional `.mexico` (barra superior fija con logotipo enlazado a gob.mx), (3) menú desplegable `<details>/<summary>` con accesos a Trámites y Gobierno.

```html
<header class="header">
  <a class="irContent" href="#mainContent">Ir al contenido principal</a>
  <section class="mexico">
    <div class="mexico__contenedor">
      <div class="mexico__escudo">
        <a href="https://www.gob.mx/" class="mexico__aescudo" aria-label="Ir a la página de inicio del Gobierno de México">
          <i class="snd__icono snd-gobierno-mexico mexico__img color--origen" aria-hidden="true"></i>
        </a>
      </div>
      <div class="mexico__menu">
        <details class="mexico__details" open>
          <summary class="mexico__summary"><span class="mexico__span">Menú</span></summary>
          <div class="mexico__detailsCont">
            <a href="https://www.gob.mx/tramites" class="mexico__a">Trámites</a>
            <a href="https://www.gob.mx/gobierno" class="mexico__a">Gobierno</a>
          </div>
        </details>
      </div>
    </div>
  </section>
</header>
```
- CSS Grid para estructurar el header; `.mexico` define la barra fija; `.mexico__contenedor` centra y limita ancho vía `--MaxWidth: 1440px`.
- Responsivo < 767px: disposición vertical.
- Color determinado por el tema CSS importado (guinda/verde, ver Comenzar).

---

### 4.8 Mensajes emergentes / tooltip (`/componentes/mensajes-emergentes`)

> "Muestra información adicional contextual y útil, pero no esencial, al interactuar con el elemento, ya sea con el mouse o al presionar en mobile."

#### Descripción
Reglas: texto breve y claro · aparición discreta (hover en desktop, tap en móvil) · posición apropiada (no se superpone a elementos clave) · evitar sobrecargar (no usar para funciones obvias).

**Usos NO permitidos**
- No usar dos o más tooltips juntos.
- El texto de ayuda no debe superar **500 caracteres**.
- No mostrar información importante (es fácil de perder).
- No colocar sobre el campo de texto donde se ingresará información.

#### Diseño (valores concretos — spec Figma)
- Contenedor: alto variable, ancho ajustable al contenido · fondo `azul-100` · borde `azul-500` (1px, por fuera)
- Texto: color `azul-500` · estilo `SDR` (Small details)
- Espaciado: padding interno 8px, separación texto-borde 8/11px, flecha indicadora offset 17/4px

#### Desarrollo (implementación técnica)

**Clases principales**:
| Clase | Función |
|---|---|
| `.tooltip` | Contenedor del componente (botón disparador + burbuja); define contexto de posicionamiento |
| `.tooltip__boton` | Botón disparador; requiere `aria-controls` (id de la burbuja) y `aria-expanded` |
| `.tooltip__burbuja` | Burbuja visual únicamente; requiere `role="tooltip"` y `aria-hidden="true"` |
| `.tooltip__ajuste` | Ajusta el tooltip al ancho del texto, máximo **320px** |
| `.accesibilidadLector` | Oculta visualmente pero mantiene accesible a lectores de pantalla; debe repetir el mismo mensaje del tooltip y vincularse vía `aria-describedby` |

⚠️ **Regla de accesibilidad obligatoria**: `.tooltip__burbuja` es solo visual y NUNCA debe ser la única fuente de información — el contenido equivalente se debe exponer con `.accesibilidadLector` enlazado por `aria-describedby`.

**Anunciador centralizado** (una sola vez por página, antes de usar tooltips):
```html
<div id="tooltip-announcer" class="accesibilidadLector" aria-live="polite"></div>
```
- `aria-live="polite"`: anuncia cambios de texto sin interrumpir agresivamente.

**Posiciones** (clases modificadoras de `.tooltip__burbuja`): `--arriba-izquierda`, `--arriba-derecha`, `--arriba-centro`, `--abajo-izquierda`, `--abajo-derecha`, `--abajo-centro`.

**Tamaños**: `.tooltip__burbuja--chico`, `--mediano`, `--grande`.

**Patrón base**:
```html
<div class="tooltip">
  <button type="button" class="tooltip__boton" aria-label="Ayuda" aria-expanded="false" aria-controls="tt-1" aria-describedby="ayuda-tooltip-1" data-tooltip-trigger>
    <i class="snd__icono snd-help color--azul500 tooltip__imgBoton" aria-hidden="true"></i>
  </button>
  <div id="tt-1" class="tooltip__burbuja tooltip__burbuja--arriba-izquierda tooltip__ajuste" role="tooltip" aria-hidden="true">
    ¡Hola! Soy un tooltip :)
  </div>
  <span id="ayuda-tooltip-1" class="accesibilidadLector">¡Hola! Soy un tooltip :)</span>
</div>
```
**Variantes de uso**: con enlace (`<a target="_blank" rel="noopener noreferrer">` dentro de la burbuja), en formulario (asociado a un `<label>`/`<input>` vía el mismo `aria-describedby`, `<input aria-describedby="ayuda-ejemploInput_1">`).

---

### 4.9 Indicador de carga / loader (`/componentes/indicador-carga`)

> "Elemento visual que indica que un proceso está en curso."

#### Descripción
Aparece cuando el usuario espera que se despliegue información (en la misma página o antes de un salto a otra). El tamaño depende del contexto; debe posicionarse en medio de toda la pantalla.

#### Diseño (valores concretos — spec Figma)
- Color del símbolo: `presidencia guinda-900` / `presidencia verde-900`
- Puntos del spinner con opacidad decreciente: 100%, 90%, 80%, 70%, 60%, 50%, 40%, 30%, 20%, 10%, 10%, 5% (efecto de rotación)
- Texto "Cargando...": color `neutro-800`
- **Tamaños**:
  | Variante | Área | Punto |
  |---|---|---|
  | Loading LG | 88×88px | 12×12px |
  | Loading MD | 48×48px | 6×6px |
- Layout: vertical, centrado arriba, item spacing 24px, padding 24px.

#### Desarrollo (implementación técnica)
```html
<div class="spin__contenedor--lg" role="status" aria-live="polite">
  <i class="snd__icono snd-snd-loading2 spin__icono spin__verde icono--88" aria-hidden="true"></i>
  <span class="spin__titulo--lg">Cargando…</span>
</div>
```
| Atributo/clase | Función |
|---|---|
| `.spin__contenedor--lg` / `--md` | Centra horizontal/verticalmente y ajusta espacio ícono-texto |
| `role="status"` | Indica cambio de estado que debe notificarse al usuario |
| `aria-live="polite"` | El lector de pantalla anuncia el mensaje sin interrumpir |
| `spin__icono` | Clase de animación de rotación; respeta `prefers-reduced-motion` (desactiva la animación si el usuario lo prefiere) |
| `.spin__verde` / `.spin__guinda` | Color del ícono según tema |
| `.icono--88` / `.icono--48` | Tamaño del ícono (LG/MD) |
| `aria-hidden="true"` | Oculta el ícono decorativo a lectores de pantalla |
| `.spin__titulo--lg` / `--md` | Tamaño/estilo tipográfico del texto "Cargando…" |

---

### 4.10 Barra de progreso / progress bar (`/componentes/barra-progreso`)

> "Componente visual que muestra el avance o estado de un proceso o tarea en desarrollo."

⚠️ **Nota**: esta página solo expone pestañas **Descripción** y **Diseño** — no hay pestaña Desarrollo (código) publicada aún para este componente en v1.1.0.

#### Descripción
**Dos formas**:
- **Informativa**: indica en qué paso está el usuario y cuántos faltan. < 4 pasos → cada paso se muestra por separado (activo/inactivo). ≥ 4 pasos, o en móvil → se simplifica a barra porcentual con indicación "1 de X".
- **Interactiva**: además permite regresar/avanzar entre pasos. Se muestra vertical; círculos con número/ícono conectados por línea vertical que hereda el color del paso anterior (el último paso no dibuja línea). Cada paso lleva texto de nombre y, opcionalmente, una indicación breve.
  - Versiones: **Estándar**, **Grande**, **Con subpasos** (detalla etapas intermedias).

**Estados posibles**: Activo (en curso) · Inactivo (no iniciado) · Alertamiento (requiere atención/corrección) · Completado · Error · En progreso.

**Usos NO permitidos**
- Uso decorativo (no como relleno visual).
- No debe funcionar como botón, enlace ni slider (sin interacción fuera de su propósito informativo/navegación de pasos).
- No mostrar avance ficticio o ambiguo.
- No inventar estados fuera de los definidos ni alterar colores/tipografía.
- No modificar la lógica de conexión entre pasos ni omitir el texto de cada etapa.

#### Diseño (valores concretos — spec Figma)
- Paso (barra horizontal): alto 8px, color de fondo `presidencia dorado-500`, radio de borde 100 (completamente redondeado)
- Texto: centrado, estilo `SDR`
- Stepper (círculos): radio de borde 100 (circular); fondo inactivo `neutro-400`
- **Estados** (color):
  | Estado | Color |
  |---|---|
  | Activo | borde `presidencia dorado-500`, 2px; texto `neutro-800` |
  | Inactivo | borde `neutro-500`, 1px; texto `neutro-400` |
  | Éxito | borde `verde-500` |
  | En progreso | fondo `presidencia dorado-200` |
- StepperVertical: alto 256, ancho 64
- Variaciones de ancho: Multi fase 628px · Porcentual/Contenedor 1103px · Mobile 343px
- Construcción UI: dirección vertical (step), item spacing 8–16px según variante.

---

### 4.11 Tabla / table (`/componentes/tabla`)

> "Organiza datos en filas y columnas para mostrarlos de forma eficiente. También permite la personalización con funciones adicionales."

⚠️ **Nota**: solo pestañas **Descripción** y **Diseño** — sin código de Desarrollo publicado todavía en v1.1.0.

#### Descripción
**Variantes**:
- **Tabla estática — simple**: conjunto fijo de datos, sin interacción; apta para contenidos breves sin filtrado/ordenamiento/paginación. Versiones escritorio y móvil.
- **Tabla con filtros**: datos para seleccionar y ejecutar acciones; apta cuando se requiere filtrado, ordenamiento o paginación. Versiones escritorio y móvil.
- **Filtros**: rango de fechas, casillas de verificación (categorías), botones de acción. Versiones escritorio y móvil.

**Acciones por fila**: Ver, Más, Vista previa, Editar, Eliminar, Revisar, Descargar, Sin acciones.

**Usos NO permitidos**: ejecutar funciones ajenas a la tabla, mostrar mensajes poco claros/sin relación, romper coherencia visual del UI Kit (colores/tipografía/íconos distintos).

#### Diseño (anatomía y valores concretos — spec Figma)
**Tabla base**: casilla de verificación — ancho 40 (máx. 110); texto `neutro-800`, estilo Body/Regular. Columnas: ancho mínimo 110; columna de insignia/estatus: ancho 110–180; columna de acciones: ancho máximo 110.

**Panel de filtros**: contenedor ancho 813, fondo `neutro-100`, borde `neutro-400` 1px, radio 16, sombra "Drop LV 1" (`0px 2px 4px 0px #000000`). Título estilo `Heading/H3 Semibold`. Incluye: botón primario, divisor (contraste bajo), input base, barra de búsqueda, botón secundario, chips de acción (`ChipAccion`), botón fantasma, desplegable (`Dropatom`).
**Filtros activos** (chip/panel expandido): fondo `neutro-100`, borde `presidencia guinda-900`/`presidencia verde-900` 1px, radio 16, sombra "Drop LV 1"; incluye casilla de verificación, divisor, botones primario/secundario tamaño Básico.

**Construcción UI**: tabla base vertical, alineación centro superior, spacing 8, padding interno celdas 12px; columnas horizontales, alineación medio-izquierda, spacing 4–8; panel de filtros vertical, spacing 24, padding interno 24; fila de filtros horizontal, alineación centro-derecha, spacing 16.

---

### 4.12 Selector de fechas / datepicker (`/componentes/selector-fecha`)

> "Componente que permite seleccionar de forma rápida el día, mes, año, hora y minutos."

⚠️ **Nota**: solo pestañas **Descripción** y **Diseño** — sin código de Desarrollo publicado en v1.1.0.

#### Descripción
**Selector de fecha**: selecciona fecha o rango de fechas (ej. agendar cita de trámite).
**Selector de horario**: selecciona hora específica (ej. hora de cita). Los botones de hora heredan las definiciones de estado de botones secundario/primario (ver sección Botones).

**Usos NO permitidos**: funciones ajenas al propósito, mensajes poco claros, romper coherencia visual del UI Kit.

#### Diseño (anatomía y valores concretos — spec Figma)
**Campo de entrada (trigger)**: ancho 343px · caja alto 40px, fondo `neutro-100`, borde 1px, radio 8px · label obligatorio con asterisco `rojo-500`, texto `B1SB` · texto de fecha `neutro-800` `B1SB` · texto "Opcional" `neutro-600` `C1R`.

**Calendario desplegable**: fondo `neutro-100`, radio 16px, sombra "Drop LV 3" (`0px 6px 12px 0px #000000`).
- Encabezado mes: texto `neutro-800` centrado, navegación con `chevron-left`/`chevron-right`.
- Días de la semana (cabecera): texto `neutro-700`, celda 32×32px.
- Día normal: texto `neutro-800`, centrado.
- Día seleccionado: fondo `azul-500`, texto `neutro-100`.
- Día en rango/entre periodo: fondo `azul-100`.
- **Tamaños**: Chico (343px ancho, texto mes `SDSB`) · Grande (525px ancho, texto mes `B1SB`); estados adicionales en tamaño grande: default/inhabilitado/seleccionado/entre-periodo/disponibilidad alta-media-baja/sin disponibilidad, con colores `azul-500`, `rojo-100`, `naranja-100`, `presidencia-100`.
- Layout: vertical, alineación superior izquierda, item spacing 16px, padding interno 16px.

**Selector de horas**: ancho 578px · encabezado de fecha (ej. "Jueves 5 de septiembre") texto `neutro-800` centrado `SH1B` · botones de hora con jerarquía Secundario, color `presidencia guinda-900`/`presidencia verde-900`, tamaño Básico · layout vertical, item spacing 32px; grid de horas: horizontal con wrap, spacing 16px (horizontal y vertical).

---

### 4.13 Casilla de verificación / checkbox (`/componentes/casilla-verificacion`)

> "Permite seleccionar o deseleccionar una opción, indicando visualmente el estado actual de la selección y facilitando la interacción de la persona usuaria."

⚠️ **Nota**: solo pestañas **Descripción** y **Diseño** — sin código de Desarrollo publicado en v1.1.0.

#### Descripción
Control de selección independiente (una o varias opciones). Características: compacta/discreta, contextual (junto al elemento relacionado). ⚠️ Siempre debe incluir una etiqueta.

**Estados**: Por defecto (vacío, sin interacción) · Enfocado (navegación con Tab — solo accesibilidad) · Hover · Seleccionado · Inactivo/disabled (depende de acción previa) · Error (casilla obligatoria no seleccionada, con mensaje de error).

**Variaciones**: versión móvil con dimensiones y espaciados propios (obligatorio usarla en ese contexto).

**Usos NO permitidos**: funciones ajenas, mensajes poco claros, romper coherencia visual del UI Kit.

#### Diseño (anatomía y valores concretos — spec Figma)
**Escritorio**: fondo `neutro-100` · trazo `presidencia verde-900`/`presidencia guinda-900` (normal) o `rojo-500` (error) · etiqueta `neutro-800`, estilo `B1R` · ícono de check color `presidencia verde-900`/`presidencia guinda-900`.
**Móvil**: fondo `neutro-100` · trazo `neutro-500` (normal) o `rojo-500` (error) · etiqueta `neutro-800` `B1R` · ícono check mismo color que escritorio, trazo `neutro-800`/`rojo-500`.

**Construcción UI**: escritorio — horizontal, alineación superior izquierda, padding interno 8px. Móvil — horizontal, alineación central, padding vertical 16px, padding lateral 16px, padding interno 8px.

#### Accesibilidad (obligatorio)
- Área de interacción mínima: **24×24px**.
- El estado seleccionado NO debe comunicarse únicamente por color — requiere indicador visual adicional (ej. marca de verificación/check).

---

### 4.14 Texturas (`/componentes/texturas`)

> "Incorpora detalles visuales en superficies y componentes para generar diferenciación y enriquecer la composición de la interfaz."

⚠️ **Nota**: solo pestañas **Descripción** y **Diseño** — sin código de Desarrollo publicado en v1.1.0.

#### Descripción
Textura oficial del Gobierno de México 2024-2030; aporta detalle/profundidad/diferenciación sin interferir con legibilidad o interacción. Referencia externa: **Guía de Identidad Gráfica 2024-2030 del Gobierno de México**.

**Reglas**: usar como elemento complementario (nunca protagonista) · no interferir con el contenido (evitar detrás de texto/controles/elementos interactivos que afecten legibilidad) · uso moderado (no combinar múltiples texturas ni aplicar en exceso) · aplicar de forma consistente, preferentemente sobre fondos neutros o composiciones con poco contenido.

**Usos NO permitidos**: múltiples texturas en una misma composición, que invada elementos o sature el espacio, romper coherencia visual (colores/formas distintas).

#### Diseño (valores concretos — spec Figma)
- Colores de fondo disponibles: `neutro-100`, `presidencia verde-900`, `presidencia guinda-900`, `presidencia dorado-600`
- **Degradado de la textura**: tipo lineal, ángulo **45°**, opacidad **50%**, modo de fusión **Luminosidad**
  - Color base: `neutro-600`
  - Stops del degradado: 0% → `neutro-600` opacidad 0% · 50% → `neutro-600` opacidad 5% · 100% → `neutro-600` opacidad 50%

#### Accesibilidad (obligatorio)
- La textura NO debe reducir el contraste del texto que está sobre ella.
- No debe dificultar distinguir componentes (botones) y sus estados de interacción.
- No debe dificultar identificar el enfoque visible al navegar con teclado.
- **Contraste mínimo**: texto regular **4.5:1** respecto al fondo con textura · títulos **3:1**.

---

### 4.15 Radio botones / botón de opción (`/componentes/radio-botones`)

> "Permite seleccionar una opción única, indicando visualmente el estado actual de la selección y facilitando la interacción de la persona usuaria."

⚠️ **Nota**: solo pestañas **Descripción** y **Diseño** — sin código de Desarrollo publicado en v1.1.0.

#### Descripción
Control de selección única y exclusiva (al elegir una opción se desactiva la anterior). ⚠️ Siempre debe incluir etiqueta.

**Estados**: Por defecto · Enfocado (Tab, solo accesibilidad) · Hover · Seleccionado · Deshabilitado · Error (opción obligatoria no seleccionada + mensaje de error).
**Variaciones**: versión escritorio y móvil.

**Usos NO permitidos**: funciones ajenas, mensajes poco claros o sin etiqueta, romper coherencia visual, usarlo para selección múltiple (ese caso usa Casilla de verificación).

#### Diseño (anatomía y valores concretos — spec Figma)
**Escritorio**: color de caja `presidencia verde-900`/`presidencia guinda-900` · etiqueta y texto de ayuda `neutro-800`, estilo `B1R`.
**Móvil**: fondo `neutro-100` · trazo `presidencia verde-900`/`presidencia guinda-900` (normal) o `rojo-500` (error) · etiqueta `neutro-800`/`rojo-500` · texto de ayuda `neutro-800` `B1R` · mensaje de error `rojo-500` `B1R`.

**Construcción UI**: escritorio — mensajes horizontal, alineación superior izquierda, espaciado inferior 8px. Móvil — horizontal, alineación central, padding vertical 16px, padding lateral 16px, padding interno 16px.

#### Accesibilidad (obligatorio)
- Área de interacción mínima: **24×24px**.
- El estado seleccionado NO debe comunicarse únicamente por color — requiere indicador visual adicional (el propio radio relleno).

---

### 4.16 Mensajes informativos (`/componentes/mensajes-informativos`)

> "Permite comunicar de forma visible información relevante sobre el estado, resultado o progreso de una acción, proceso o sistema."

⚠️ **Nota**: solo pestañas **Descripción** y **Diseño** — sin código de Desarrollo publicado en v1.1.0.

#### Descripción
A diferencia de la notificación flotante (toast), este componente **NO puede cerrarse** y permanece visible mientras la información sea relevante.
**Tipos** (cada uno con ícono obligatorio fijo):
| Tipo | Ícono obligatorio |
|---|---|
| Éxito | `Estatus/Check-circle` |
| Informativo | `Estatus/information` |
| Error | `Estatus/Error` |
| Advertencia | `Estatus/Warning` |

Puede incluir enlaces de texto dentro del mensaje cuando el contexto lo requiera.

**Límite de caracteres**: el texto indica "no debe superar los 350 caracteres" en la descripción general y, en "usos no permitidos", especifica **no debe superar los 250 caracteres** (ambas cifras aparecen en la fuente — usar el límite más estricto, 250, como referencia segura de implementación).

**Usos NO permitidos**: no usar dos o más mensajes informativos juntos, no exceder el límite de caracteres, no romper coherencia visual (colores/formas distintas).

#### Diseño (anatomía y valores concretos — spec Figma)
- Contenedor: ancho 345px, radio de borde 8px
- Color de caja (fondo) por tipo: `rojo-100` (error) · `verde-100` (éxito) · `azul-100` (info) · `amarillo-100` (advertencia)
- Texto principal/ícono por tipo: `rojo-500` · `verde-500` · `azul-500` · `amarillo-500` · estilo `Noto Sans/Body/B1R`
- Construcción UI: horizontal, alineación superior izquierda, padding vertical 8px, padding lateral izq. 8px / der. 16px.

#### Accesibilidad (obligatorio)
- El estado NO debe comunicarse únicamente por color — usar ícono + texto para identificar cada estado.
- Enlaces de texto deben ser accesibles por teclado y tener estado de enfoque visible.
- El contenido debe escalar correctamente con zoom o accesibilidad del dispositivo.

---

## 5. Plantillas

Cada plantilla expone una sola pestaña ("Contenido": lista de bloques/componentes que la integran) y maquetas de referencia desktop/mobile; el enlace "Comenzar" de cada una remite al archivo de construcción completo (Figma/UI Kit), fuera del alcance de esta extracción basada en el sitio público. Todas incluyen, de forma constante, **Barra de navegación** y **Footer**.

### 5.1 Página principal / landing (`/plantillas/pagina-principal`)
> "Diseñada para informar y guiar al usuario hacia una acción específica, como registrarse, solicitar un trámite, servicio o programa social."

Bloques: Barra de navegación (principal + secundaria) · **Header** (título/encabezado + descripción + imagen de referencia) · **Tarjetas (cards)** (título de sección, listado/descripción de contenido, acciones) · **Banner** (mensajes destacados/urgentes) · Footer.

### 5.2 Detalles del trámite (`/plantillas/detalles-tramite`)
> "Diseñada para estructurar cualquier trámite dentro de una interfaz o plataforma."

Bloques: Barra de navegación · **Migajas de pan (breadcrumbs)** · **Título** · **Chips** (etiquetas de categorías/filtros) · **Cuerpo de texto** (instrucciones/detalles) · Tarjetas · **Tabs** (alternar secciones) · Banner · **Preguntas frecuentes** · Footer.

### 5.3 Bandeja de entrada del trámite (`/plantillas/bandeja-entrada`)
> "Diseñada para mostrar datos de los trámites, organizados en filas y columnas."

Bloques: Barra de navegación · **Barra lateral de navegación** (sidebar, páginas interiores del trámite) · Título · Descripción · **Buscador** · **Filtros** · **Botón** (acción principal) · **Tabla** (listado ordenable con acciones) · **Paginación** · Footer.

### 5.4 Mi perfil (`/plantillas/mi-perfil`)
> "Diseñada para mostrar y permitir la edición de información personal dentro de la cuenta del usuario."

Bloques: Barra de navegación · Barra lateral · Título · Descripción · **Mensajes** (informativos, no necesariamente error/alerta) · Tarjetas (información personal del usuario) · Footer.

### 5.5 Formulario para trámites — front office (`/plantillas/formulario-front-office`)
> "Diseñada para ingresar información para completar un trámite, registrarse o enviar solicitudes."

Bloques: Barra de navegación · Barra lateral · **Botón salir** (regresar al paso anterior) · Título · **Barra de progreso (stepper)** (indica el paso actual y los faltantes) · Tarjetas (captura de información personal y adjuntar documentos/archivos) · **Botones de acción** · Footer.

### 5.6 Formularios para trámite — back office (`/plantillas/formulario-back-office`)
> "Diseñada para revisar información y completar un trámite."

Bloques: Barra de navegación · Barra lateral · Migajas de pan · Tarjetas (título del trámite, captura de información, adjuntar documentos/archivos) · Botones de acción · Footer.

### 5.7 Página de error (`/plantillas/pagina-error`)
> "Diseñada para informar al usuario cuando ocurre un problema en la navegación o en un trámite."

Bloques: Barra de navegación · **Tarjeta (Card)** (título y descripción amigable del error) · Botones de acción · Footer.

### 5.8 Medios de autenticación (`/plantillas/integracion-llave-mx`)
> "Diseñada para permitir que el usuario se autentique usando un sistema externo."

Bloques: Barra de navegación · **Botón de idioma** · **Título de la integración** (nombre de la dependencia) · **Logotipo de la dependencia** · **Tarjeta (card)** de inicio de sesión — agrupa radio botones para elegir medio de autenticación, casillas de verificación para enlaces externos, y botones de acción · Footer.

**Integraciones soportadas**: **Llave MX**, **e.firma**, **correo**, o el sistema propio que la dependencia utilice.
**Variantes de maqueta**: ingreso solo con Llave MX · ingreso con múltiples accesos (Llave MX / Correo / e.firma) — cada una en versión escritorio y móvil.

---

