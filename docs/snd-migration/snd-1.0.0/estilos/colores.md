# Sistema Nacional de Diseño (SND) – Estilo: Colores

- **Fuente:** https://www.snd.gob.mx/estilos/colores
- **Título de la página:** Colores | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Definen la identidad visual y comunican la jerarquía de información en el diseño.

---

## 1. Descripción

### Estructura de color
- **Colores primitivos:** Son la paleta base del sistema de diseño. Se definen como valores puros (hex, RGB o tokens) y funcionan como bloques fundamentales sin un significado específico por sí mismos. Son la materia prima a partir de la cual se construyen los colores de identidad y los que comunican estados en la interfaz.
- **Colores semánticos:** Los colores semánticos son aquellos que transmiten un significado funcional dentro de la interfaz. Se derivan de los primitivos y se usan para guiar al usuario: verde para éxito, rojo para error, amarillo para advertencia o azul para información. Su propósito es hacer la experiencia más clara y consistente, vinculando cada color con una acción o estado reconocible.

### Uso del color institucional
- **Colores primarios:** Representan la identidad principal y guían las interacciones clave.
  - Ejemplo de uso: botones principales.
  - Recomendación de uso: en la mayoría de los casos, los guindas primarios se emplean en proyectos de carácter federal y los verdes primarios en proyectos transversales con otra categoría de información.
  - Importante: se debe elegir una sola paleta de color primario; no se combinan guinda y verde o dorado.
  - Tokens: `presidencia guinda - 900`, `presidencia verde - 900`, `presidencia dorado - 600`
- **Colores secundarios:** Resaltan información o secciones.
  - Ejemplo de uso: como acento de color
  - Tokens: `presidencia verde - 500`, `presidencia guinda - 600`, `presidencia morado - 500`
- **Colores neutros:** Sirven de base para equilibrar el diseño.
  - Tokens: `neutro - 800`, `neutro - 500`
- **Colores de validación:** Comunican estados del sistema.
  - Ejemplo de uso: mensajes de error, éxito, información, etc.
  - Tokens: `verde - 500`, `azul - 500`, `rojo - 500`
- **Colores con opacidad:** Permiten generar superposición sin perder legibilidad.
  - Ejemplo de uso: fondo de superposición para modal.
  - Token: `overlay`
- **Colores adicionales:** Se emplean únicamente en casos específicos que requieren una gama cromática más amplia. Estos colores pueden utilizarse para:
  - Identificar distintos estatus, categorías o niveles dentro de un sistema.
  - Representar elementos que no deben asociarse con significados predefinidos como error, alerta o éxito.
  - Aportar variedad visual en contextos donde la diferenciación es clave (por ejemplo, mapas, gráficas o etiquetas múltiples).
  - Su uso debe ser controlado y justificado, siempre respetando la armonía visual y la accesibilidad.

### Ejemplos de uso
- Uso de colores de validación en Toast y Chips:
  - `Se necesita una acción adicional`
  - `Ocurrió un error`
  - `Tu solicitud está por caducar`
  - `Solicitud enviada correctamente`
  - `Pendiente`, `Atendiendo`, `Finalizado`, `Sin asignar`
- Sitio web, color principal verde
- Sitio web, color principal guinda

### Usos no permitidos
Para garantizar coherencia visual, accesibilidad y claridad en la comunicación, se deben evitar los siguientes usos:
- No mezclar colores principales en un mismo componente.
- Evitar combinaciones con bajo contraste, especialmente en texto y elementos funcionales.
- No utilizar colores fuera de la paleta establecida, salvo en casos autorizados de colores adicionales.
- No asignar significados erróneos a los colores funcionales:
  - Ejemplo: no usar rojo para indicar éxito o confirmación.
  - Ejemplo: no usar amarillo para representar errores o alertas críticas.
  - (`Se necesita una acción adicional`, `Enviado exitosamente`, `Enviado exitosamente`)

---

## 2. Diseño

### Presidencia

**Presidencia verde:**
- Presidencia verde - 100: `#E0E9E8`
- Presidencia verde - 200: `#B3C8C6`
- Presidencia verde - 300: `#82A4A0`
- Presidencia verde - 400: `#51807A`
- Presidencia verde - 500: `#335955`
- Presidencia verde - 600: `#004D40`
- Presidencia verde - 700: `#004339`
- Presidencia verde - 800: `#003931`
- Presidencia verde - 900: `#002F2A`
- Presidencia verde - 950: `#001D1A`

**Presidencia guinda:**
- Presidencia guinda - 100: `#F3E4E9`
- Presidencia guinda - 200: `#E1BDC9`
- Presidencia guinda - 300: `#CE92A6`
- Presidencia guinda - 400: `#BA6783`
- Presidencia guinda - 500: `#A84565`
- Presidencia guinda - 600: `#9B2247`
- Presidencia guinda - 700: `#8E1D3F`
- Presidencia guinda - 800: `#781838`
- Presidencia guinda - 900: `#611232`
- Presidencia guinda - 950: `#4A0C26`

**Presidencia dorado:**
- Presidencia dorado - 100: `#F6F2EA`
- Presidencia dorado - 200: `#E4D9C0`
- Presidencia dorado - 300: `#DBCCAB`
- Presidencia dorado - 400: `#C9B280`
- Presidencia dorado - 500: `#B79956`
- Presidencia dorado - 600: `#A57F2C`
- Presidencia dorado - 700: `#846623`
- Presidencia dorado - 800: `#634C1A`
- Presidencia dorado - 900: `#423312`
- Presidencia dorado - 950: `#32260D`

**Color principal de la gama:**
- Presidencia - Guinda: `presidencia guinda - 900`
- Presidencia - Verde: `presidencia verde - 900`
- Presidencia - Dorado: `presidencia dorado - 600`

### Colores primitivos
- Neutro - 100: `#FFFFFF`
- Neutro - 200: `#F9F9F9`
- Neutro - 300: `#F3F3F3`
- Neutro - 400: `#DDDDDD`
- Neutro - 500: `#AAAAAA`
- Neutro - 600: `#767676`
- Neutro - 700: `#434343`
- Neutro - 800: `#161A1D`
- Rojo - 100: `#FAE5E5`
- Verde - 100: `#F0FAF5`
- Azul - 100: `#EDF2FE`
- Amarillo - 100: `#FFEB99`
- Morado - 100: `#ECE2F5`
- Naranja - 100: `#F9D9A9`
- Rojo - 500: `#9B0F15`
- Verde - 500: `#086308`
- Azul - 500: `#224497`
- Amarillo - 500: `#684700`
- Morado - 500: `#6708C1`
- Naranja - 500: `#6E3700`

### Colores semánticos
- **Colores de validación:**
  - Error - 100: `rojo - 100`
  - Error - 500: `rojo - 500`
  - Exito - 100: `verde - 100`
  - Exito - 500: `verde - 500`
  - Informative - 100: `azul - 100`
  - Informative - 500: `azul - 500`
  - Warning - 100: `amarillo - 100`
  - Warning - 500: `amarillo - 500`
- **Colores de íconos:**
  - Iconos - guinda: `presidencia guinda - 900`
  - Iconos - verde: `presidencia verde - 600`
  - Iconos - dorado: `presidencia dorado - 600`
  - Iconos - negro: `neutro - 800`
  - Iconos - blanco: `neutro - 100`
- **Colores de texto:**
  - Texto - principal: `neutro - 800`
  - Texto - deshabilitado: `neutro - 600`
  - Texto - blanco: `neutro - 100`
- **Degradados:**
  - Degradado verde: `presidencia verde - 900` / `presidencia verde - 600`
  - Degradado guinda: `presidencia guinda - 900` / `presidencia guinda - 600`
- **Colores de borde:**
  - Alto contraste: `neutro - 600`
  - Bajo contraste: `neutro - 400`
  - Seleccionado: `azul - 500`
- **Colores de fondo:**
  - Body: `neutro - 200`
  - Tarjeta: `neutro - 100`
- **Colores con opacidad:**
  - Overlay: `neutro - 800` `56%`

---

## 3. Desarrollo

### Uso de los colores en tu proyecto
El Sistema de Diseño Nacional (SND) cuenta con dos gamas de color:
- Guinda para proyectos federales
- Verde para proyectos transversales

Las gama de color se declara en el archivo `css/estilos.css` mediante una de las siguientes instrucciones:
- `@import "base/_tema-guinda.css"`
- `@import "base/_tema-verde.css"`

Cada gama incluye un **color principal**, que se utiliza para iconos, textos, bordes y fondos. Para aplicarlo, utiliza las clases con el sufijo `--principal`.
- `.color--principal` para textos.
- `.icono--principal` para iconos y pictogramas.
- `.fondo--principal` para fondos.
- `.borde--principal` para bordes.

```html
<i class="snd__icono snd-star--filled icono--24 color--pverde600" aria-hidden="true"></i>
<p class="color--principal">
  Texto color principal
</p>
<div class="fondo--principal">
  <p class="color--blanco">
    Fondo principal
  </p>
</div>
<div class="borde--principal" style="border-style:solid">
  <p class="color--principal">
    Borde principal
  </p>
</div>
```

### Gama de color
Cada paleta de color de presidencia incluye **10 tonalidades**, numeradas del **100** (más claro) al **950** (más oscuro).

#### Presidencia Verde
```html
<h3 class="color--pverde100">
  Color pverde100
</h3>
<h3 class="color--pverde200">
  Color pverde200
</h3>
<h3 class="color--pverde300">
  Color pverde300
</h3>
<h3 class="color--pverde400">
  Color pverde400
</h3>
<h3 class="color--pverde500">
  Color pverde500
</h3>
<h3 class="color--pverde600">
  Color pverde600
</h3>
<h3 class="color--pverde700">
  Color pverde700
</h3>
<h3 class="color--pverde800">
  Color pverde800
</h3>
<h3 class="color--pverde900">
  Color pverde900
</h3>
<h3 class="color--pverde950">
  Color pverde950
</h3>
```

#### Presidencia Guinda
```html
<h3 class="color--pguinda100">
  Color guinda100
</h3>
<h3 class="color--pguinda200">
  Color guinda200
</h3>
<h3 class="color--pguinda300">
  Color guinda300
</h3>
<h3 class="color--pguinda400">
  Color guinda400
</h3>
<h3 class="color--pguinda500">
  Color guinda500
</h3>
<h3 class="color--pguinda600">
  Color guinda600
</h3>
<h3 class="color--pguinda700">
  Color guinda700
</h3>
<h3 class="color--pguinda800">
  Color guinda800
</h3>
<h3 class="color--pguinda900">
  Color guinda900
</h3>
<h3 class="color--pguinda950">
  Color guinda950
</h3>
```

#### Presidencia Dorado
```html
<h3 class="color--dorado100">
  Color dorado100
</h3>
<h3 class="color--dorado200">
  Color dorado200
</h3>
<h3 class="color--dorado300">
  Color dorado300
</h3>
<h3 class="color--dorado400">
  Color dorado400
</h3>
<h3 class="color--dorado500">
  Color dorado500
</h3>
<h3 class="color--dorado600">
  Color dorado600
</h3>
<h3 class="color--dorado700">
  Color dorado700
</h3>
<h3 class="color--dorado800">
  Color dorado800
</h3>
<h3 class="color--dorado900">
  Color dorado900
</h3>
<h3 class="color--dorado950">
  Color dorado950
</h3>
```

#### Colores neutros
```html
<h3 class="color--neutro100">
  Color neutro100
</h3>
<h3 class="color--neutro200">
  Color neutro200
</h3>
<h3 class="color--neutro300">
  Color neutro300
</h3>
<h3 class="color--neutro400">
  Color neutro400
</h3>
<h3 class="color--neutro500">
  Color neutro500
</h3>
<h3 class="color--neutro600">
  Color neutro600
</h3>
<h3 class="color--neutro700">
  Color neutro700
</h3>
<h3 class="color--neutro800">
  Color neutro800
</h3>
```

#### Colores semánticos
Algunos colores semánticos pueden invocarse de dos formas: por el nombre del color o por su función semántica.
- `color--rojo500` y `color--error`
- `color--verde500` y `color--exito`
- `color--azul500` y `color--info`
- `color--amarillo500` y `color--alerta`
- `color--morado500` no tiene equivalente semántico
- `color--naranja500` no tiene equivalente semántico

```html
<h3 class="color--rojo500">
  Color rojo500
</h3>
<h3 class="color--error">
  Color error
</h3>
<h3 class="color--verde500">
  Color verde500
</h3>
<h3 class="color--exito">
  Color exito
</h3>
<h3 class="color--azul500">
  Color azul500
</h3>
<h3 class="color--info">
  Color info
</h3>
<h3 class="color--amarillo500">
  Color amarillo500
</h3>
<h3 class="color--alerta">
  Color alerta
</h3>
<h3 class="color--morado500">
  Color morado500
</h3>
<h3 class="color--naranja500">
  Color naranja500
</h3>
```

### Degradado
Los degradados para fondos utilizan dos colores de la gama correspondiente.
- En la gama `guinda` utiliza `--pguinda600` y `--pguinda900`
- En la gama `verde` utiliza `--pverde600` y `--pverde900`

Para aplicarlo, utiliza las clases con el prefijo `degradado--` seguida del sentido del degradado. El sentido lo define el color más claro.

```html
<div class="degradado--arriba">
  <p class="color--blanco p--32">
    Degradado arriba
  </p>
</div>
<div class="degradado--abajo">
  <p class="color--blanco p--32">
    Degradado abajo
  </p>
</div>
<div class="degradado--izquierda">
  <p class="color--blanco p--32">
    Degradado izquierda
  </p>
</div>
<div class="degradado--derecha">
  <p class="color--blanco p--32">
    Degradado derecha
  </p>
</div>
```

Puedes utilizar los degradados en tu hoja de estilos (CSS) con la propiedad `background-image` y la variable correspondiente:
- `background-image:var(--degradado-arriba)`
- `background-image:var(--degradado-abajo)`
- `background-image:var(--degradado-izquierda)`
- `background-image:var(--degradado-derecha)`
