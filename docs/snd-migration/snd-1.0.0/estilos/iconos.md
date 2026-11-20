# Sistema Nacional de Diseño (SND) – Estilo: Iconos

- **Fuente:** https://www.snd.gob.mx/estilos/iconos
- **Título de la página:** Iconos | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Representan acciones, objetos o conceptos de manera visual que facilitan la comprensión y la navegación. *(Subtítulo en Diseño/Desarrollo: Definen la identidad visual y comunican la jerarquía de información en el diseño.)*

---

## 1. Descripción

La librería de iconos del Sistema Nacional de Diseño está basada en el sistema de diseño de IBM, Carbon Design System, cuyo contenido puede ser revisado en el siguiente enlace: https://carbondesignsystem.com/elements/icons/library/.

Selecciona un icono para copiar su etiqueta `<i>` con las clases y atributos de accesibilidad listos para pegar en tu proyecto.

### Lista completa de iconos por categoría (245 iconos)

1. **Generales (120):**
   `maximize`, `reading--glasses`, `arrival`, `piggy-bank`, `thumbs-up`, `share`, `search`, `up-to-top`, `presentation-file`, `train--profile`, `login`, `favorite--filled`, `code`, `select--window`, `drink--01`, `customer-service`, `filter`, `save`, `security`, `email`, `shopping--cart`, `document--attachment`, `recently-viewed`, `scales`, `notification`, `departure`, `building`, `calendar`, `tennis-ball`, `user--identification`, `chemistry`, `image--reference`, `play`, `fingerprint-recognition`, `unlocked`, `chat`, `upload`, `cabin-care`, `play--outline`, `locked`, `settings`, `phone`, `dot-mark`, `microscope`, `menu`, `hourglass`, `screen`, `money`, `send`, `user--speaker`, `finance`, `download`, `ibm--knowledge-catalog-standard`, `timer`, `thumbs-down--filled`, `copy`, `ticket`, `currency--dollar`, `return`, `catalog`, `pills`, `chart--histogram`, `list`, `chart--bar-stacked`, `chart--bar`, `bicycle`, `reminder--medical`, `logout`, `star--filled`, `trash-can`, `home`, `brightness-contrast`, `overflow-menu--horizontal`, `alarm`, `plane`, `radio`, `wifi`, `thumbs-up--filled`, `printer`, `table-of-contents`, `star--half`, `star`, `flash`, `portfolio`, `favorite`, `renew`, `intent-request--uninstall`, `camera`, `qr-code`, `sprout`, `delivery-truck`, `delivery`, `calculator`, `launch`, `forum`, `thumbs-down`, `train`, `light`, `gas-station`, `scan`, `image--search`, `box`, `fragile`, `event--schedule`, `hospital`, `map--identify`, `notification--new`, `image`, `bookmark--add`, `bookmark--filled`, `bookmark`, `user--certification`, `tag`, `bottles--02--dash`, `color-palette`, `document--multiple-01`, `ibm--engineering-systems-design-rhapsody`, `ibm--event-endpoint-mgmt`, `ibm-cloud--app-id`, `task--tools`

2. **Navegación (10):**
   `arrow--left`, `arrow--right`, `arrow--down`, `arrow--up`, `arrow--up-left`, `arrow--up-right`, `chevron--left`, `chevron--right`, `chevron--up`, `chevron--down`

3. **Tablas y texto (18):**
   `caret--sort`, `arrows--horizontal`, `arrows--vertical`, `sort--descending`, `chevron--sort`, `sort--remove`, `sort--ascending`, `caret--down`, `caret--up`, `text-link`, `text--underline`, `text--color`, `text--align--left`, `text--align--center`, `text--align--right`, `text--bold`, `text--italic`, `text--indent--more`

4. **Alertas y mensajes (18):**
   `add`, `add--filled`, `add--alt`, `subtract`, `subtract--filled`, `subtract--alt`, `checkmark`, `checkmark--filled`, `checkmark--outline`, `information`, `warning--alt`, `warning`, `close`, `progress-bar--round`, `close--filled`, `in-progress`, `help`, `dew-point`

5. **Documentos (17):**
   `document--add`, `document--requirements`, `document--import`, `document--download`, `document--export`, `file--x`, `document--view`, `folder--details`, `folder`, `folder--parent`, `folder--add`, `request-quote`, `document--comment`, `document`, `document--pdf`, `edit`, `document--multiple-01`

6. **Mapas y localización (10):**
   `earth`, `location`, `location--filled`, `map`, `user--online`, `basketball`, `map-boundary`, `heat-map--stocks`, `plan`, `airport-location`

7. **Personas y acciones (32):**
   `dog-walker`, `user--settings`, `order-details`, `education`, `user`, `two-person-lift`, `group`, `accessibility--alt`, `events`, `array-users`, `task--edit`, `user--avatar`, `scan`, `user--follow`, `hotel`, `hospital-bed`, `user--speaker`, `pedestrian-child`, `collaborate`, `mobile`, `chart--multitype`, `fruit-bowl`, `shopping--catalog`, `shopping--bag`, `ibm--knowledge-catalog-premium`, `ruler`, `accessibility`, `user--certification`, `enterprise`, `license--maintenance`, `user--favorite--alt`, `deployment-canary`

8. **Redes sociales (4):**
   `logo--youtube`, `logo--facebook`, `logo--instagram`, `logo--x`

9. **Desarrollados para el SND (16):**
   Los siguientes iconos se diseñaron para situaciones particulares del contexto nacional y de los portales de gobierno:
   `escudo-mexico`, `snd-mujeres`, `snd-personas-jovenes`, `snd-personas-productoras`, `snd-personas-adultas-mayores`, `snd-programas-sociales`, `snd-personas-indigenas`, `snd-scan-face`, `snd-megafono`, `snd-edit`, `snd-document-edit`, `snd-whatsapp`, `snd-youtube`, `snd-facebook`, `snd-instagram`, `snd-x`

### Ejemplos de uso
- Eliminar
- Etiqueta

---

## 2. Diseño

- **Tamaños:** Gráfico que describe los diferentes tamaños de los íconos: `16 pixels`, `20 pixels`, `24 pixels` y `32 pixels`.
- **Layout y espaciados:** Gráfico que describe el espaciado (padding) entre la etiqueta y el ícono: mide `8 pixeles`.
- **Colores:** Los colores semánticos disponibles para los íconos se encuentran detallados en la sección Colores de la guía. ([Ir al componente](./colores.md))
- **Touch target:** Gráfico que describe el tamaño mínimo de un ícono para área táctil: `40 pixeles`.

---

## 3. Desarrollo

### Utiliza iconos en tu proyecto
Los iconos predefinidos en el SND se invocan mediante la etiqueta `<i>`, la cual requiere de dos clases:
- `snd__icono`
- `snd-Nombre-del-icono`

Puedes copiar el código de cada icono desde la pestaña Descripción. También puedes descargar el SVG desde el sitio de [Carbon Design System](https://carbondesignsystem.com/elements/icons/library/).
Los iconos utilizados dentro de componentes (botones, formularios, tablas, etc.) se ajustarán automáticamente a los estilos definidos por el componente.

### Accesibilidad
Si el icono es decorativo y no aporta información esencial, agrega el atributo `aria-hidden="true"` para ocultarlo a los lectores de pantalla.

### Tamaño
Para definir el tamaño de un icono, agrega la clase correspondiente. Por ejemplo, la clase `.icono--12` indica que el icono medirá 12x12 pixeles. Revisa el siguiente ejemplo para conocer los tamaños predefinidos.

```html
<i class="snd__icono snd-star--filled icono--12" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--16" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--20" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--24" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--32" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--64" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--80" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--96" aria-hidden="true"></i>
```

### Color
Para cambiar el color de un icono, agrega la clase correspondiente. Por ejemplo, la clase `.color--pverde600` indica que el icono adoptará el color **presidencia verde 600**.
Es importante que los iconos sean color negro (`#000`) y formato `.SVG` (preferido) o `.PNG` con transparencia.
Revisa el siguiente ejemplo para conocer los colores predefinidos.

```html
<i class="snd__icono snd-star--filled icono--48 color--pverde600" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--pguinda600" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--dorado600" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--neutro600" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--blanco" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--rojo500" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--verde500" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--azul500" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--amarillo500" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--morado500" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--naranja500" aria-hidden="true"></i>
```

Algunos colores pueden invocarse de dos formas: por el nombre del color o por su función semántica.
- `color--principal` es el color principal de la gama utilizada en el sitio, equivale a `.color--pverde600` o `.color--pguinda900`, según el tema que se esté utilizando.
- `color--rojo500` e `color--error`
- `color--verde500` e `color--exito`
- `color--azul500` e `color--info`
- `color--amarillo500` e `color--alerta`

```html
<i class="snd__icono snd-star--filled icono--48 color--principal" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--pverde600" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--rojo500" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--error" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--verde500" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--exito" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--azul500" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--info" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--amarillo500" aria-hidden="true"></i>
<i class="snd__icono snd-star--filled icono--48 color--alerta" aria-hidden="true"></i>
```
