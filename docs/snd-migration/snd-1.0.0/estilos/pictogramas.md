# Sistema Nacional de Diseño (SND) – Estilo: Pictogramas

- **Fuente:** https://www.snd.gob.mx/estilos/pictogramas
- **Título de la página:** Pictogramas | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Representaciones gráficas que facilitan explicar ideas, categorizar contenido o decorar con significado.

---

## 1. Descripción

La librería de pictogramas del Sistema Nacional de Diseño está basada en el sistema de diseño de IBM “Carbon Design System” cuyo contenido puede ser revisado en el siguiente enlace: https://carbondesignsystem.com/elements/pictograms/library/

Selecciona un pictograma para copiar su etiqueta `<i>` con las clases y atributos de accesibilidad listos para pegar en tu proyecto.

### Lista completa de pictogramas (76 pictogramas)
`wifi`, `university`, `assets-management`, `archive`, `availability`, `add-document`, `document-security`, `folder`, `accelerated-computating`, `cultura`, `economia`, `educacion`, `electoral`, `energia`, `gobierno-mexico`, `infraestructura`, `medio-ambiente`, `migracion`, `movilidad`, `mujer`, `multiculturalidad`, `presupuesto`, `programas-sociales`, `seguridad`, `salud`, `sociedad`, `territorios`, `trabajo`, `turismo`, `agricultura`, `home`, `semiconductor`, `id`, `eye`, `white-paper`, `upload`, `doctor`, `salud1`, `corazon`, `curita`, `salud2`, `huella-digital`, `dinero`, `formulario`, `dinero1`, `buscar-persona`, `muerte`, `ubicacion`, `persona`, `compras`, `diagrama`, `security-management`, `key-users`, `ubicacion2`, `access`, `web-error`, `serverless`, `construccion`, `data-warehousing`, `inspect-data`, `it-infrastructure-software`, `literature`, `paper`, `user-profile`, `pills`, `microscope`, `qr-code`, `engagement-inclusion`, `help-desk`, `build-leadership-and-culture`, `focus-room`, `teammates`, `discapacidad`, `question-and-answer`, `envelope`, `presentation-deck`

### Ejemplo de uso
- Trabajo remoto

---

## 2. Diseño

- **Tamaños:** Gráfico que describe los diferentes tamaños de los pictogramas: `48 pixels`, `64 pixels`, `80 pixels`, `96 pixels` y `128 pixels`.

---

## 3. Desarrollo

### Utiliza pictogramas en tu proyecto
Puedes descargar los pictogramas desde la pestaña Descripción. Los archivos descargados vendrán en formato SVG y color dorado (`#A57F2C`).
Los pictogramas utilizados dentro de componentes se ajustarán automáticamente a los estilos definidos por el componente.

### Accesibilidad
Si el pictograma es decorativo y no aporta información esencial, agrega el atributo `aria-hidden="true"` para ocultarlo a los lectores de pantalla.

### Tamaño
Para definir el tamaño de un pictograma, agrega la clase correspondiente. Por ejemplo, la clase `.icono--12` indica que el pictograma medirá 12x12 pixeles. Revisa el siguiente ejemplo para conocer los tamaños predefinidos.

```html
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--origen" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--64 color--origen" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--80 color--origen" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--96 color--origen" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--128 color--origen" aria-hidden="true"></i>
```

### Color
Para cambiar el color de un pictograma, agrega la clase correspondiente. Por ejemplo, la clase `.color--pverde600` indica que el pictograma adoptará el color presidencia verde 600.
Los pictogramas de la librería están en color dorado (`#A57F2C`); al aplicar una clase de color se sobrescribe automáticamente, sin importar el color original del SVG. Si no agregas ninguna clase de color, agrega `.color--origen` para conservar el dorado de marca.
Revisa el siguiente ejemplo para conocer los colores predefinidos.

```html
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--pverde600" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--pguinda600" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--dorado600" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--neutro600" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--blanco" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--rojo500" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--verde500" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--azul500" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--amarillo500" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--morado500" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--naranja500" aria-hidden="true"></i>
```

Algunos colores pueden invocarse de dos formas: por el nombre del color o por su función semántica.
- `color--principal` es el color principal de la gama utilizada en el sitio, equivale a `.color--pverde600` o `.color--pguinda900`, según el tema que se esté utilizando.
- `color--rojo500` e `color--error`
- `color--verde500` e `color--exito`
- `color--azul500` e `color--info`
- `color--amarillo500` e `color--alerta`

```html
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--principal" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--pverde600" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--rojo500" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--error" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--verde500" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--exito" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--azul500" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--info" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--amarillo500" aria-hidden="true"></i>
<i class="snd__pictograma snd-gobierno-mexico icono--48 color--alerta" aria-hidden="true"></i>
```
