# Sistema Nacional de Diseño (SND) – Componente: Botones (`buttons`)

- **Fuente:** https://www.snd.gob.mx/componentes/botones
- **Título de la página:** Botones (buttons) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Un botón es un elemento interactivo que permite al usuario ejecutar acciones dentro de la plataforma o interfaz. Su estilo visual varía según la jerarquía o nivel de importancia de la acción que representa, pudiendo ser primario, secundario o fantasma.

---

## 1. Descripción

### Categorías
- **Primario:** Resalta la acción más importante dentro de una pantalla o flujo. Solo debe haber uno por sección para guiar la atención a la acción.
  - Básico *(imagen: `Botón primario básico`)*
  - Grande *(imagen: `Botón primario grande`)*
- **Secundario:** Complementa al botón primario con una acción alternativa de menor jerarquía.
  - Básico *(imagen: `Botón secundario básico`)*
  - Grande *(imagen: `Botón secundario grande`)*
- **Fantasma:** Muestra acciones de baja prioridad, generalmente en línea con el contenido.
  - Básico *(imagen: `Botón fantasma básico`)*

### Interacciones de botones
Los botones deben mostrar de forma consistente su comportamiento y sus estados para guiar al usuario en la interacción. Estos estados incluyen:
- **Habilitado (enabled):** El botón está activo y muestra el estilo principal para indicar que la acción está habilitada. (Primario, Secundario, Fantasma)
- **Al pasar el cursor (hover):** El estado hover se activa al colocar el puntero sobre un botón en desktop. El estilo cambia sutilmente para indicar que es interactivo y puede ejecutar una acción. (Primario, Secundario, Fantasma)
- **Enfocado (focus):** El estado focus resalta el botón con un borde cuando se activa mediante teclado o lector de pantalla. Facilita la accesibilidad y la navegación sin necesidad de usar el mouse o la interacción táctil directa. (Primario, Secundario, Fantasma)
- **Al hacer clic (on tap):** El estado on tap ocurre cuando el usuario hace clic o toca el botón. El estilo cambia para confirmar que la acción ha sido ejecutada. (Primario, Secundario, Fantasma)
- **Deshabilitado (disabled):** El botón aparece deshabilitado y no responde a interacciones. Comunica que la acción aún no está disponible o requiere una condición previa. (Primario, Secundario, Fantasma)
- **Cargando (Loader):** Se muestra cuando el usuario hace clic y se inicia un proceso que requiere carga. El botón de texto no tiene variante cargando. (Primario, Secundario)

### Ejemplos de uso
- **Formulario:** Botón principal para enviar un formulario, botón secundario para cancelar o botón de texto para avisos de privacidad. *(imagen: `Ejemplo de uso de botones`)*

---

## 2. Diseño

### Anatomía
- `IC/ Chevron-left` Depende de: `IC/ Chevron-left`
- `Texto`: Alineación del texto: `Centrado` | Estilo de texto: `Base/Body/CTA`
- `IC/ Chevron-right` Depende de: `IC/ Chevron-right`
*(Imágenes: `Anatomía de un botón`, `Anatomía de un botón`)*

### Propiedades
- **Tamaño**
  - **Normal:** `Button` Alto: `48` | Ancho: `Variable` | `Texto` Estilo de texto: `Base/Body/CTA` *(imagen: `Botón normal`)*
  - **Grande:** `Button` Alto: `64` | Ancho: `Variable` | `Texto` Estilo de texto: `Base/Subheading/SH1M` *(imagen: `Botón grande`)*
- **Iconos**
  - `IC/ Chevron-left` Tipo: `Booleano`
  - `IC/ Chevron-right` Tipo: `Booleano` *(imagen: `Botón con icono`)*

### Estados botón primario
- **Default:** `Button` Color de fondo: `presidencia guinda - 900`, `presidencia verde - 900` | Alto: `48` | Ancho: `Variable` | Radio del borde: `8` | `Texto` Color de texto: `neutro - 100` | Estilo de texto: `Base/Body/CTA`
- **Cursor encima:** `Button` Color de fondo: `presidencia guinda - 600`, `presidencia verde - 600` | Alto: `48` | Ancho: `Variable` | Radio del borde: `8` | `Texto` Color de texto: `neutro - 100` | Estilo de texto: `Base/Body/CTA`
- **Enfocado:** `Button` Color de fondo: `presidencia guinda - 900`, `presidencia verde - 900` | Alto: `48` | Ancho: `Variable` | Radio del borde: `8` | Color de borde: `presidencia guinda - 300`, `presidencia verde - 300` | `Texto` Color de texto: `neutro - 100` | Estilo de texto: `Base/Body/CTA`
- **Clic sostenido:** `Button` Color de fondo: `presidencia guinda - 100`, `presidencia verde - 100` | Alto: `48` | Ancho: `Variable` | Radio del borde: `8` | `Texto` Color de texto: `neutro - 800` | Estilo de texto: `Base/Body/CTA`
- **Inhabilitado:** `Button` Color de fondo: `neutro - 400` | Alto: `48` | Ancho: `Variable` | Radio del borde: `8` | `Texto` Color de texto: `neutro - 500` | Estilo de texto: `Base/Body/CTA`
- **Cargando:** `Button` Color de fondo: `presidencia guinda - 900`, `presidencia verde - 900` | Alto: `48` | Ancho: `Variable` | Radio del borde: `8` | `IC/Search` Color del icono: `neutro - 100`

### Estados botón secundario
- **Default:** `Button` Color de fondo: `neutro - 100` | Alto: `48` | Ancho: `Variable` | Ancho de borde: `1` | Radio del borde: `8` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900` | `Texto` Color de texto: `presidencia guinda - 900`, `presidencia verde - 900` | Estilo de texto: `Base/Body/CTA`
- **Cursor encima:** `Button` Color de fondo: `presidencia guinda - 100`, `presidencia verde - 100` | Alto: `48` | Ancho: `Variable` | Ancho de borde: `1` | Radio del borde: `8` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900` | `Texto` Color de texto: `presidencia guinda - 900`, `presidencia verde - 900` | Estilo de texto: `Base/Body/CTA`
- **Enfocado:** `Button` Color de fondo: `neutro - 100` | Alto: `48` | Ancho: `Variable` | Ancho de borde: `3` | Radio del borde: `8` | Alineación de borde: `Por fuera` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900` | `Texto` Color de texto: `presidencia guinda - 900`, `presidencia verde - 900` | Estilo de texto: `Base/Body/CTA`
- **Clic sostenido:** `Button` Color de fondo: `presidencia guinda - 200`, `presidencia verde - 200` | Alto: `48` | Ancho: `Variable` | Radio del borde: `8` | `Texto` Color de texto: `presidencia guinda - 900`, `presidencia verde - 900` | Estilo de texto: `Base/Body/CTA`
- **Inhabilitado:** `Button` Color de fondo: `neutro - 100` | Alto: `48` | Ancho: `Variable` | Ancho de borde: `1` | Radio del borde: `8` | Alineación de borde: `Por fuera` | Color de borde: `neutro - 600` | `Texto` Color de texto: `neutro - 600` | Estilo de texto: `Base/Body/CTA`
- **Cargando:** `Button` Color de fondo: `neutro - 100` | Alto: `48` | Ancho: `Variable` | Ancho de borde: `1` | Radio del borde: `8` | Alineación de borde: `Por fuera` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900` | `IC/Search` Color del icono: `presidencia guinda - 900`, `presidencia verde - 900`

### Estados botón fantasma
- **Default:** `Button` Alto: `48` | Ancho: `Variable` | `Texto` Color de texto: `presidencia guinda - 900`, `presidencia verde - 900` | Estilo de texto: `Base/Body/CTA`
- **Cursor encima:** `Button` Color de fondo: `presidencia verde - 100`, `presidencia guinda - 100` | Alto: `48` | Ancho: `Variable` | `Texto` Color de texto: `presidencia guinda - 600`, `presidencia verde - 600` | Estilo de texto: `Base/Body/CTA(S)`
- **Enfocado:** `Button` Color de fondo: `presidencia verde - 100`, `presidencia guinda - 100` | Alto: `48` | Ancho: `Variable` | Ancho de borde: `2` | Radio del borde: `8` | Alineación de borde: `Por fuera` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900` | `Texto` Color de texto: `presidencia guinda - 900`, `presidencia verde - 900` | Estilo de texto: `Base/Body/CTA(S)`
- **Clic sostenido:** `Button` Color de fondo: `presidencia verde - 200`, `presidencia guinda - 200` | Alto: `48` | Ancho: `Variable` | `Texto` Color de texto: `presidencia guinda - 950`, `presidencia verde - 950` | Estilo de texto: `Base/Body/CTA(S)`
- **Inhabilitado:** `Button` Alto: `48` | Ancho: `Variable` | `Texto` Color de texto: `neutro - 500` | Estilo de texto: `Base/Body/CTA(S)`

### Layout y espaciado
- **Primario y Secundario:** Dirección: `Horizontal` | Alineación: `Central` | Altura: `48` | Ancho: `Variable` | Espacio entre elementos: `8` | Margen superior: `16` | Margen inferior: `16` | Margen mínimo izquierdo: `24` | Margen mínimo derecho: `24` *(imagen: `Layout y espaciado para primario y secundario`)*
- **Fantasma:** Dirección: `Horizontal` | Alineación: `Central` | Altura: `48` | Ancho: `Variable` | Espacio entre elementos: `4` | Margen superior: `4` | Margen inferior: `4` | Margen mínimo izquierdo: `8` | Margen mínimo derecho: `8` *(imagen: `Layout y espaciado para fantasma`)*

---

## 3. Desarrollo

### Uso de botones en tu proyecto
Las clases con el prefijo `.boton__` definen el estilo básico del botón: tipografía, márgenes, relleno y borde. Las clases para los tipos de botón son:
- `.boton__primario` — botón primario
- `.boton__secundario` — botón secundario
- `.boton__fantasma` — botón fantasma

```html
<button type="button" class="boton__primario">
  Botón primario
</button>
<button type="button" class="boton__secundario">
  Botón secundario
</button>
<button type="button" class="boton__fantasma">
  Botón fantasma
</button>
```

Estos estilos también se pueden aplicar a los siguientes elementos:
- `<input type="button">`
- `<input type="submit">`
- `<input type="reset">`
- `<a>`

```html
<input type="button" value="Button" class="boton__primario" />
<input type="submit" value="Submit" class="boton__primario" />
<input type="reset" value="Reset" class="boton__primario" />
<a href="#" class="boton__primario">
  Liga
</a>
```

### Botón deshabilitado
Cuando un `<button>` o `<input>` tengan la propiedad `disabled`, adoptarán automáticamente el estilo correspondiente a un botón deshabilitado. En el caso del elemento `<a>`, se debe agregar la clase modificadora `--disabled`.

```html
<button type="button" class="boton__primario" disabled>
  button disabled
</button>
<input type="button" value="input disabled" class="boton__primario" disabled />
<a href="#" class="boton__primario--disabled">
  boton__primario--disabled
</a>
```

### Botón con iconos
Los iconos utilizados en botones con clases con el prefijo `boton__` se ajustarán automáticamente al estilo definidos por el componente.

Si el icono es una imagen en formato `.SVG` (preferido) o `.PNG`, es importante que esté en color negro (`#000`) y que cuente con fondo transparente.

```html
<button type="button" class="boton__primario">
  <i class="snd__icono snd-chevron--left" aria-hidden="true"></i>
  Botón primario
  <i class="snd__icono snd-chevron--right" aria-hidden="true"></i>
</button>
<button type="button" class="boton__secundario">
  <i class="snd__icono snd-chevron--left" aria-hidden="true"></i>
  Botón secundario
  <i class="snd__icono snd-chevron--right" aria-hidden="true"></i>
</button>
<button type="button" class="boton__fantasma">
  <i class="snd__icono snd-chevron--left" aria-hidden="true"></i>
  Botón fantasma
  <i class="snd__icono snd-chevron--right" aria-hidden="true"></i>
</button>
```

Agrega la clase `boton--vertical` para que el icono se aparezca centrado, sobre el texto del botón.

```html
<button type="button" class="boton__primario boton--vertical">
  <i class="snd__icono snd-snd-document-upload" aria-hidden="true"></i>
  Botón primario
</button>
```

### Botón Cargando (Loader)
Cuando un botón se encuentre en un proceso de carga, deberá cumplir con lo siguiente:
- Agregar la clase `boton--cargando`.
- Incluir la propiedad `disabled` para mantener el botón deshabilitado durante el proceso.
- Añadir el atributo `aria-busy="true"` para indicar que el elemento se está actualizando.
- Envolver el texto del botón en un `<span class="oculto">` para ocultarlo visualmente, pero mantenerlo disponible para lectores de pantalla.
- Incorporar un icono con la clase `icono__spin`, que permitirá que el icono rote indefinidamente.

```html
<button type="button" class="boton__primario boton--cargando" disabled aria-busy="true">
  <span class="oculto">
    Acción del botón
  </span>
  <i class="snd__icono snd-snd-loading2 icono__spin" aria-hidden="true"></i>
</button>
```

### Variantes

#### Botón grande
Para mostrar un botón en tamaño grande, se debe agregar la clase modificadora `boton--grande` a la clase del botón.

```html
<button type="button" class="boton__primario boton--grande">
  Botón primario
</button>
<button type="button" class="boton__secundario boton--grande">
  Botón secundario
</button>
<button type="button" class="boton__fantasma boton--grande">
  Botón fantasma
</button>
```

#### Botón 100% ancho
Para que un botón abarque todo el ancho de su contenedor, se debe agregar la clase modificadora `boton--100`.

Si se requiere que el botón ocupe todo el ancho únicamente en vista móvil, se debe agregar la clase modificadora `boton--100sm`.

```html
<button type="button" class="boton__primario boton--100">
  boton--100
</button>
<button type="button" class="boton__primario boton--100sm">
  boton--100sm
</button>
```

#### Botón con salto de línea
El texto de los botones se mantiene en una sola línea. Si se requiere permitir saltos de línea (por ejemplo, cuando el texto es largo o el espacio disponible es reducido), se deberá agregar la clase `boton--wrap`.

```html
<button type="button" class="boton__primario boton--wrap" style="max-width:200px;">
  Modificar solicitud de inscripción
</button>
```

#### Botón redondeado
Para obtener un botón con bordes redondeados agrega la clase `boton--redondeado`.

```html
<button type="button" class="boton__primario boton--redondeado">
  Boton primario redondeado
</button>
<button type="button" class="boton__primario boton--grande boton--redondeado">
  Boton primario redondeado
</button>
```

#### Botón fantasma blanco
Cuando un botón fantasma se coloca sobre un fondo de color, debe llevar la clase `fantasma--blanco` para mejorar el contraste.

```html
<div class="degradado--derecha" style="width:100%; padding:32px">
  <button type="button" class="boton__fantasma fantasma--blanco">
    Boton fantasma blanco
  </button>
  <button type="button" class="boton__fantasma fantasma--blanco">
    <i class="snd__icono snd-chevron--left" aria-hidden="true"></i>
    Boton fantasma blanco
    <i class="snd__icono snd-chevron--right" aria-hidden="true"></i>
  </button>
</div>
<div class="fondo--neutro700" style="width:100%; padding:32px">
  <button type="button" class="boton__fantasma fantasma--blanco">
    Boton fantasma blanco
  </button>
  <button type="button" class="boton__fantasma fantasma--blanco">
    <i class="snd__icono snd-chevron--left" aria-hidden="true"></i>
    Boton fantasma blanco
    <i class="snd__icono snd-chevron--right" aria-hidden="true"></i>
  </button>
</div>
```
