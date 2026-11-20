# Sistema Nacional de Diseño (SND) – Componente: Casilla de verificación (`checkbox`)

- **Fuente:** https://www.snd.gob.mx/componentes/casilla-verificacion
- **Título de la página:** Casilla de verificación (checkbox) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Permite seleccionar o deseleccionar una opción, indicando visualmente el estado actual de la selección y facilitando la interacción de la persona usuaria.

---

## 1. Descripción

Una casilla de verificación (checkbox) es un control de selección que permite a la persona usuaria activar o desactivar una opción de forma independiente. Se utiliza principalmente para seleccionar una o varias opciones dentro de un conjunto de alternativas, y su estado visual permite identificar fácilmente si una opción está seleccionada o no seleccionada.

*(Imagen: `Ejemplo de uso de checkbox no seleccionado`)*

- **Compactas y discretas:** Están diseñadas para ser mínimas y no invasoras. Suelen ser pequeños rectángulos con un número o un texto breve.
- **Contextuales:** Suelen aparecer junto a un elemento con el que se relacionan, proporcionando información rápida y relevante sin ocupar demasiado espacio.

La casilla de verificación debe incluir siempre una etiqueta que identifique claramente la opción que representa.

### Estados
- **Por defecto (default):** Es el estado inicial, cuando el campo está vacío y la persona usuaria no ha interactuado aún. Se muestra con un borde simple y puede incluir texto de ejemplo.
- **Enfocado:** Este estado se muestra cuando la persona usuaria navega hasta un elemento utilizando la tecla Tab. El borde suele cambiar de color para indicar que el campo está seleccionado. Esté estado sólo es usable como forma de accesibilidad
- **Al pasar el cursor (hover):** Es un estado visual interactivo que ocurre cuando el la persona usuaria coloca el puntero del mouse sobre un elemento (como un botón, enlace o imagen) sin llegar a hacer clic.
- **Seleccionado (selected):** Este estado ocurre cuando la persona usuaria hace clic o toca la casilla de verificación. Suele aparecer un distintivo de color para indicar que el campo está seleccionado.
- **Inactivo (disabled):** La casilla de verificación no puede ser seleccionada. Tiene un aspecto más apagado o gris para indicar que no está disponible para interactuar. Este estado aparece generalmente cuando el componente depende de una acción previa e independiente, que al ejecutarse, lo active.
- **Error:** Se activa cuando la persona usuaria no selecciona una casilla obligatoria. El indicador visual de la casilla de verificación suele cambiar de color y se muestra un mensaje de error para orientar sobre cómo corregir la situación.

### Variaciones
Al adaptar el componente a la versión móvil, debe utilizarse la variante correspondiente ya que contempla dimensiones y espaciados específicos para garantizar una experiencia accesible. *(imagen: `Variaciones de checkbox en versiones escritorio o móvil`)*

### Ejemplos de uso
*(Imagen: `Ejemplos de uso`)*

### Usos no permitidos
Para garantizar coherencia visual y claridad en la comunicación, se deben evitar los siguientes usos:
- Ejecutar funciones ajenas, como comandos o acciones no relacionadas.
- Mostrar mensajes poco claros o sin relación.
- Romper la coherencia visual del UI Kit, usando colores, tipografía o iconos distintos.
*(Imagen: `Usos no permitidos`)*

---

## 2. Diseño

### Anatomía

#### Versión de escritorio
*(Imagen: `Anatomía de la casilla de verificación en versión de escritorio`)*
- **Casilla de verificación:** Color de fondo: `neutro - 100` | Color de trazo: `presidencia verde - 900`, `presidencia guinda - 900`, `rojo - 500`
- **Etiqueta del campo:** Color de texto: `neutro - 800` | Estilo de texto: `Base/Body/B1R`
- **Icono (checkbox):** Depende de: `IC/checkbox` | Color de icono: `presidencia verde - 900`, `presidencia guinda - 900`

#### Versión móvil
*(Imágenes: `Anatomía de la casilla de verificación en versión móvil`, `Anatomía de la casilla de verificación en versión móvil`)*
- **Casilla de verificación:** Color de fondo: `neutro - 100` | Color de trazo: `neutro - 600`, `rojo - 500`
- **Icono (checkbox):** Depende de: `IC/checkbox` | Color de icono: `presidencia verde - 900`, `presidencia guinda - 900` | Color de trazo: `neutro - 800`, `rojo - 500`
- **Etiqueta del campo:** Color de texto: `neutro - 800`, `rojo - 500` | Estilo de texto: `Base/Body/B1R`

### Construcción UI
- **Versión de escritorio — Casilla de verificación:** Dirección: `Horizontal` | Alineación: `Superior izquierda` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Comprimir` | Espaciado interno: `8` *(imágenes: 2 con alt `Construcción UI de la casilla de verificación en versión de escritorio`)*
- **Versión móvil — Casilla de verificación:** Dirección: `Horizontal` | Alineación: `Central` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Comprimir` | Espaciado superior e inferior: `16` | Espaciado lateral: `16` | Espaciado interno: `8` *(imagen: `Construcción UI de la casilla de verificación en versión móvil`)*

### Accesibilidad
Las personas usuarias deberán poder utilizar la tecnología de asistencia para:
- **Área de interacción:** la casilla de verificación debe contar con un área de interacción mínima de `24 x 24 px`.
- **Uso del color:** el estado seleccionado no debe comunicarse únicamente mediante el color. Se debe utilizar un indicador visual adicional, como una marca de verificación.

---

## 3. Desarrollo

### Utiliza una casilla de verificación en tu proyecto
La casilla de verificación se invoca con `input type="checkbox" class="form__checkbox"`. La casilla puede utilizarse sola o en grupo dentro de un `<fieldset>`

### Casilla sola
La casilla se integra en una estructura básica:
- `.form__item`: Contiene todos los elementos del campo.
- `.form__header`: Contiene al `<label>`, y cuando aplique, los elementos que indican que el campo es requerido, así como información adicional al campo, como un tooltip o la leyenda `"opcional"`.
- `.form__body`: Contiene el `input type="checkbox" class="form__checkbox"`
- `.form__footer`: Aquí se inyecta el mensaje de asistencia

#### Estados
Los estados se controlan con atributos del `input`:
- `checked`: la casilla aparece seleccionada.
- `required`: la casilla es obligatoria para enviar el formulario.
- `disabled`: la casilla no se puede seleccionar ni recibe el foco. No se envía.
- `aria-invalid="false"`: estado predeterminado o cuando la casilla cumple la validación.
- `aria-invalid="true"`: la casilla no cumple la validación (estado de error).
- `aria-readonly="true"`: la casilla solo es de lectura y no interactúa con el puntero. Sí se envía. Se apoya de un script para evitar la interacción con el teclado. Como no es editable, no lleva indicadores de requerido ni elementos de ayuda. Es la alternativa a la propiedad `readonly`, la cual no se puede aplicar al `input type="checkbox"`.

#### Accesibilidad
- Asegurar la relación del `label for="valor-1"` y el `input id="valor-1"`.
- Asegurar la relación del `input aria-describedby="valor-2"` y el `div class="form__footer" id="valor-2"`.
- El `aria-live="polite"` anuncia cuando se inyecta el mensaje de asistencia en el contenedor correspondiente.
- `.form__requerido` se oculta a los lectores de pantalla con `aria-hidden="true"` para que no lean `"asterisco"`.
- El texto “Campo obligatorio” con la clase `.oculto` se oculta a la vista, pero lo leen los lectores de pantalla.

#### Casilla con cuatro estados
```html
<div class="form__item">
  <div class="form__header">
    <label for="item-001" class="form__label">
      <span class="form__requerido" aria-hidden="true">
        *
      </span>
      Casilla 1 (con tooltip)
      <span class="oculto">
        Campo obligatorio
      </span>
    </label>
    <div class="form__meta">
      <div class="tooltip">
        <button type="button" class="tooltip__boton" aria-label="Ayuda sobre Casilla 1 (tooltip)" aria-describedby="tooltip-1">
          <i class="tooltip__imgBoton snd__icono snd-help color--azul500" aria-hidden="true"></i>
        </button>
        <div id="tooltip-1" class="tooltip__burbuja tooltip__burbuja--arriba-izquierda tooltip__ajuste" role="tooltip" aria-hidden="true">
          Texto muy breve
        </div>
      </div>
    </div>
  </div>
  <div class="form__body">
    <input type="checkbox" id="item-001" class="form__checkbox" required aria-invalid="false" aria-describedby="footer-001" />
  </div>
  <div id="footer-001" class="form__footer" aria-live="polite">
  </div>
</div>
<div class="divisor my--16"></div>
<div class="form__item">
  <div class="form__header">
    <label for="item-002" class="form__label">
      <span class="form__requerido" aria-hidden="true">
        *
      </span>
      Casilla 2 (aria-invalid="true")
      <span class="oculto">
        Campo obligatorio
      </span>
    </label>
    <div class="form__meta">
    </div>
  </div>
  <div class="form__body">
    <input type="checkbox" id="item-002" class="form__checkbox" required aria-invalid="true" aria-describedby="footer-002" />
  </div>
  <div id="footer-002" class="form__footer" aria-live="polite">
    <span class="color--error">
      Mensaje de asistencia. Se inyecta al salir del campo o al enviar el formulario
    </span>
  </div>
</div>
<div class="divisor my--16"></div>
<div class="form__item">
  <div class="form__header">
    <label for="item-003" class="form__label">
      Casilla 3  (aria-readonly="true")
    </label>
  </div>
  <div class="form__body">
    <input type="checkbox" id="item-003" class="form__checkbox" checked aria-readonly="true" />
  </div>
</div>
<div class="divisor my--16"></div>
<div class="form__item">
  <div class="form__header">
    <label for="item-004" class="form__label">
      <span class="form__requerido" aria-hidden="true">
        *
      </span>
      Etiqueta 4 (disabled)
      <span class="oculto">
        Campo obligatorio
      </span>
    </label>
    <div class="form__meta">
    </div>
  </div>
  <div class="form__body">
    <input type="checkbox" id="item-004" class="form__checkbox" required aria-invalid="false" aria-describedby="footer-004" disabled />
  </div>
  <div id="footer-004" class="form__footer" aria-live="polite">
  </div>
</div>
```

#### Ejempo de uso
El enlace a los términos se coloca fuera del campo para evitar interferencia, y se asocia al input mediante `aria-describedby`.

```html
<div class="form__item">
  <div class="form__header">
    <label for="item-005" class="form__label">
      <span class="form__requerido" aria-hidden="true">
        *
      </span>
      Acepto los términos y condiciones
      <span class="oculto">
        Campo obligatorio
      </span>
    </label>
    <div class="form__meta">
    </div>
  </div>
  <div class="form__body">
    <input type="checkbox" id="item-005" class="form__checkbox" required aria-invalid="false" aria-describedby="terminos footer-005" />
  </div>
  <div id="footer-005" class="form__footer" aria-live="polite">
  </div>
</div>
<p id="terminos" class="b1r">
  Consulta los
  <a href="https://www.gob.mx/terminos">
    términos y condiciones
  </a>
  .
</p>
```

### Grupo de casillas
Las casillas se agrupan dentro de un `<fieldset>`:
- `.form__fieldset`: Agrupa todos los elementos.
- `.form__legend`: Contiene el título del `<fieldset>`, y cuando aplique, los elementos que indican que el campo es requerido, así como información adicional al campo, como un tooltip o la leyenda `"opcional"`.
- `.form__body`: Contiene el grupo de casillas. Y aquí se puede agregar la clase `.reticulaGrid__` para ordenar las casillas.
- `.form__item`: contine directamente el `<input>` y el `<label>`
- `.form__footer`: Aquí se inyecta el mensaje de asistencia

#### Estados
Los mismos que en la casilla sola, con este cambio:
- `disabled` se coloca en el `fieldset` para deshabilitar todas las casillas.

#### Accesibilidad
Los mismos que en la casilla sola, con este cambio:
- Asegurar la relación del `fieldset aria-describedby="valor-2"` y el `div class="form__footer" id="valor-2"`.

### Grupo de casilla con cuatro estados
Cuando un grupo de casillas es requerido, no se le coloca `required` a cada casilla, ya que eso indicaría que todas deben seleccionarse.

El cambio entre `aria-invalid="false"` - `aria-invalid="true"` se controla desde JS.

```html
<fieldset class="form__fieldset" aria-describedby="footer-007">
  <legend class="form__legend">
    <span class="form__requerido" aria-hidden="true">
      *
    </span>
    Grupo de casillas 1 (con tooltip)
    <span class="oculto">
      Campo obligatorio
    </span>
    <span class="form__meta">
      <span class="tooltip">
        <button type="button" class="tooltip__boton" aria-label="Ayuda sobre Grupo de casillas 1" aria-describedby="tooltip-2">
          <i class="tooltip__imgBoton snd__icono snd-help color--azul500" aria-hidden="true"></i>
        </button>
        <span id="tooltip-2" class="tooltip__burbuja tooltip__burbuja--arriba-izquierda tooltip__ajuste" role="tooltip" aria-hidden="true">
          Texto muy breve
        </span>
      </span>
    </span>
  </legend>
  <div class="form__body reticulaGrid__1 gapy--8">
    <div class="form__item">
      <input type="checkbox" id="item-007-a" name="opciones1" value="a" class="form__checkbox" aria-invalid="false" />
      <label for="item-007-a" class="form__label">
        Opción A
      </label>
    </div>
    <div class="form__item">
      <input type="checkbox" id="item-007-b" name="opciones1" value="b" class="form__checkbox" aria-invalid="false" />
      <label for="item-007-b" class="form__label">
        Opción B
      </label>
    </div>
    <div class="form__item">
      <input type="checkbox" id="item-007-c" name="opciones1" value="c" class="form__checkbox" aria-invalid="false" />
      <label for="item-007-c" class="form__label">
        Opción C
      </label>
    </div>
  </div>
  <div id="footer-007" class="form__footer" aria-live="polite">
  </div>
</fieldset>
<div class="divisor my--16"></div>
<fieldset class="form__fieldset" aria-describedby="footer-008">
  <legend class="form__legend">
    <span class="form__requerido" aria-hidden="true">
      *
    </span>
    Grupo de casillas 2  (aria-invalid="true")
    <span class="oculto">
      Campo obligatorio
    </span>
    <span class="form__meta">
    </span>
  </legend>
  <div class="form__body reticulaGrid__1 gapy--8">
    <div class="form__item">
      <input type="checkbox" id="item-008-a" name="opciones2" value="a" class="form__checkbox" aria-invalid="true" />
      <label for="item-008-a" class="form__label">
        Opción A
      </label>
    </div>
    <div class="form__item">
      <input type="checkbox" id="item-008-b" name="opciones2" value="b" class="form__checkbox" aria-invalid="true" />
      <label for="item-008-b" class="form__label">
        Opción B
      </label>
    </div>
    <div class="form__item">
      <input type="checkbox" id="item-008-c" name="opciones2" value="c" class="form__checkbox" aria-invalid="true" />
      <label for="item-008-c" class="form__label">
        Opción C
      </label>
    </div>
  </div>
  <div id="footer-008" class="form__footer" aria-live="polite">
    <span class="color--error">
      Mensaje de asistencia. Se inyecta al salir del campo o al enviar el formulario
    </span>
  </div>
</fieldset>
<div class="divisor my--16"></div>
<fieldset class="form__fieldset">
  <legend class="form__legend">
    Grupo de casillas  3 (aria-readonly="true")
  </legend>
  <div class="form__body reticulaGrid__1 gapy--8">
    <div class="form__item">
      <input type="checkbox" id="item-009-a" name="opciones4" value="a" class="form__checkbox" checked aria-readonly="true" />
      <label for="item-009-a" class="form__label">
        Opción A
      </label>
    </div>
    <div class="form__item">
      <input type="checkbox" id="item-009-b" name="opciones4" value="b" class="form__checkbox" aria-readonly="true" />
      <label for="item-009-b" class="form__label">
        Opción B
      </label>
    </div>
    <div class="form__item">
      <input type="checkbox" id="item-009-c" name="opciones4" value="c" class="form__checkbox" checked aria-readonly="true" />
      <label for="item-009-c" class="form__label">
        Opción C
      </label>
    </div>
  </div>
</fieldset>
<div class="divisor my--16"></div>
<fieldset class="form__fieldset" aria-describedby="footer-010" disabled>
  <legend class="form__legend">
    <span class="form__requerido" aria-hidden="true">
      *
    </span>
    Grupo de casillas 4 (disabled)
    <span class="oculto">
      Campo obligatorio
    </span>
    <span class="form__meta">
    </span>
  </legend>
  <div class="form__body reticulaGrid__1 gapy--8">
    <div class="form__item">
      <input type="checkbox" id="item-010-a" name="opciones5" value="a" class="form__checkbox" aria-invalid="false" />
      <label for="item-010-a" class="form__label">
        Opción A
      </label>
    </div>
    <div class="form__item">
      <input type="checkbox" id="item-010-b" name="opciones5" value="b" class="form__checkbox" aria-invalid="false" />
      <label for="item-010-b" class="form__label">
        Opción B
      </label>
    </div>
    <div class="form__item">
      <input type="checkbox" id="item-010-c" name="opciones5" value="c" class="form__checkbox" aria-invalid="false" />
      <label for="item-010-c" class="form__label">
        Opción C
      </label>
    </div>
  </div>
  <div id="footer-010" class="form__footer" aria-live="polite">
  </div>
</fieldset>
```
