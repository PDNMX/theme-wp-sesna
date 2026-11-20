# Sistema Nacional de Diseño (SND) – Componente: Botón de opción (`radio button`)

- **Fuente:** https://www.snd.gob.mx/componentes/radio-botones
- **Título de la página:** Botón de opción (radio button) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Permite seleccionar una opción única, indicando visualmente el estado actual de la selección y facilitando la interacción de la persona usuaria.

---

## 1. Descripción

Un botón de opción (radio button) es un control de selección que permite a la persona usuaria elegir una única opción dentro de un conjunto de alternativas. Se utiliza principalmente cuando las opciones que no pueden seleccionarse al mismo tiempo, y su estado visual permite identificar fácilmente cuál de ellas está seleccionada.

*(Imagen: `Ejemplo de radio botón`)*

- **Selección única:** Permiten seleccionar una sola opción dentro de un conjunto de alternativas. Al elegir una opción, cualquier selección anterior se desactiva automáticamente.
- **Exclusivos:** Están diseñados para presentar opciones que no pueden seleccionarse al mismo tiempo, facilitando la elección entre diferentes alternativas dentro de un mismo grupo.

El botón de opción debe incluir siempre una etiqueta que identifique claramente la opción que representa.

### Estados
- **Por defecto (default):** Es el estado inicial, cuando el campo está vacío y la persona usuaria no ha interactuado aún. Se muestra con un borde simple e incluye un texto de ejemplo.
- **Enfocado:** Este estado se muestra cuando la persona usuaria navega hasta un elemento utilizando la tecla Tab. El borde suele cambiar de color para indicar que el campo está seleccionado. Esté estado sólo es usable como forma de accesibilidad.
- **Al pasar el cursor (hover):** Es un estado visual interactivo que ocurre cuando el la persona usuaria coloca el puntero del mouse sobre un elemento (como un botón, enlace o imagen) sin llegar a hacer clic.
- **Seleccionado (selected):** Este estado ocurre cuando la persona usuaria hace clic o toca el botón de acción Suele aparecer un distintivo de color para indicar que el campo está seleccionado.
- **Deshabilitado (disabled):** El botón de opción no puede ser seleccionado. Tiene un aspecto más apagado o gris para indicar que no está disponible para interactuar. Este estado aparece generalmente cuando el componente depende de una acción previa e independiente, que al ejecutarse, lo active.
- **Error:** Se activa cuando la persona usuaria no selecciona una opción obligatoria. El trazo del botón de opción suele cambiar de color y se muestra un mensaje de error para orientar sobre cómo corregir la situación.

### Variaciones
- Versión de escritorio *(imagen: `Variaciones`)*
- Versión móvil *(imagen: `Variaciones`)*

### Ejemplos de uso
Selecciona una opción
Caso de error con múltiples opciones:
- Versión de escritorio
- Versión de móvil
*(Imágenes: 3 con alt `Ejemplos de uso`)*

### Usos no permitidos
Para garantizar coherencia visual y claridad en la comunicación, se deben evitar los siguientes usos:
- Ejecutar funciones ajenas, como comandos o acciones no relacionadas.
- Mostrar mensajes poco claros o no mostrar una etiqueta en el campo
- Romper la coherencia visual del UI Kit, usando colores, tipografía o iconos distintos.
- Usarlo para elegir varias opciones en un mismo espacio.
*(Imagen: `Usos no permitidos`)*

---

## 2. Diseño

### Anatomía

#### Versión de escritorio
*(Imagen: `Anatomía del botón de opción en versión de escritorio: botón, etiqueta del campo y texto de ayuda`)*
- **Switch/radio-button:** Depende de: `IC/radio-button` | Color de caja: `presidencia verde - 900`, `presidencia guinda - 900`
- **Etiqueta del campo:** Color de texto: `neutro - 800` | Estilo de texto: `Base/Body/B1R`
- **Texto de ayuda:** Color de texto: `neutro - 800` | Estilo de texto: `Base/Body/B1R`

#### Versión móvil
*(Imagen: `Anatomía del botón de opción en versión móvil: caja contenedora, botón, etiqueta del campo, texto de ayuda y mensaje de error`)*
- **Botón de opción:** Color de caja: `neutro - 100` | Color de trazo: `presidencia verde - 900`, `presidencia guinda - 900`, `rojo - 500`
- **Switch/radio-button:** Depende de: `IC/radio-button` | Color de caja: `presidencia verde - 900`, `presidencia guinda - 900`
- **Etiqueta del campo:** Color de texto: `neutro - 800`, `rojo - 500` | Estilo de texto: `Base/Body/B1R`
- **Texto de ayuda:** Color de texto: `neutro - 800` | Estilo de texto: `Base/Body/B1R`
- **Mensaje de error:** Color de texto: `rojo - 500` | Estilo de texto: `Base/Body/B1R`

### Construcción UI
- **Versión de escritorio — Botón de opción:** Dirección: `Horizontal` | Alineación: `Superior izquierda` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Comprimir` | Espaciado inferior: `8`
- **Versión móvil — Botón de opción:** Dirección: `Horizontal` | Alineación: `Central` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Comprimir` | Espaciado superior e inferior: `16` | Espaciado lateral: `16` | Espaciado interno: `16`

### Accesibilidad
Las personas usuarias deberán poder utilizar la tecnología de asistencia para:
- **Área de interacción:** los botones de opción deben contar con un área de interacción mínima de `24 x 24 px`.
- **Uso del color:** el estado seleccionado no debe comunicarse únicamente mediante el color. Se debe utilizar un indicador visual adicional, como el círculo relleno al centro del botón.

---

## 3. Desarrollo

### Utiliza botón de opción en tu proyecto
Los botones de opción se invocan con `input type="radio" class="form__radio"`, y se agrupan dentro de un `<fieldset>` con la siguiente estructura:
- `.form__fieldset`: Agrupa todos los elementos.
- `.form__legend`: Contiene el título del `<fieldset>`, y cuando aplique, los elementos que indican que el campo es requerido, así como información adicional al campo, como un tooltip o la leyenda `"opcional"`.
- `.form__body`: Contiene el grupo de botones. Aquí se puede agregar la clase `.reticulaGrid__` para ordenar los botones.
- `.form__item`: contine directamente el `<input>` y el `<label>`
- `.form__footer`: Aquí se inyecta el mensaje de asistencia

### Estados
Los estados se controlan con atributos del `input`:
- `checked`: el botón aparece seleccionado.
- `required`: se puede aplicar al primer botón del grupo o a todos, cuando el grupo es requerido.
- `disabled`: se coloca en el `fieldset` para deshabilitar todas las casillas.
- `aria-invalid="false"`: estado predeterminado o cuando cumple la validación.
- `aria-invalid="true"`: no cumple la validación (estado de error).
- `aria-readonly="true"`: el botón solo es de lectura y no interactúa con el puntero. Sí se envía. Se apoya de un script para evitar la interacción con el teclado. Como no es editable, no lleva indicadores de requerido ni elementos de ayuda. Es la alternativa a la propiedad `readonly`, la cual no se puede aplicar al `input type="radio"`.

### Accesibilidad
- Asegurar la relación del `label for="valor-1"` y el `input id="valor-1"`.
- Asegurar la relación del `fieldset aria-describedby="valor-2"` y el `div class="form__footer" id="valor-2"`.
- El `aria-live="polite"` anuncia cuando se inyecta el mensaje de asistencia en el contenedor correspondiente.
- `.form__requerido` se oculta a los lectores de pantalla con `aria-hidden="true"` para que no lean `"asterisco"`.
- El texto “Campo obligatorio” con la clase `.oculto` se oculta a la vista, pero lo leen los lectores de pantalla.

### Grupo de botones con cuatro estados
El cambio entre `aria-invalid="false"` - `aria-invalid="true"` se controla desde JS.

```html
<fieldset class="form__fieldset" aria-describedby="footer-001">
  <legend class="form__legend">
    <span class="form__requerido" aria-hidden="true">
      *
    </span>
    Grupo de botones (con descripción y tooltip)
    <span class="oculto">
      Campo obligatorio
    </span>
    <span class="form__meta">
      <span class="tooltip">
        <button type="button" class="tooltip__boton" aria-label="Grupo de botones (con descripción y tooltip)" aria-describedby="tooltip9">
          <i class="tooltip__imgBoton snd__icono snd-help color--azul500" aria-hidden="true"></i>
        </button>
        <span id="tooltip9" class="tooltip__burbuja tooltip__burbuja--arriba-izquierda tooltip__ajuste" role="tooltip" aria-hidden="true">
          Texto muy breve
        </span>
      </span>
    </span>
  </legend>
  <div class="form__body reticulaGrid__1 gapy--8">
    <div class="form__item">
      <label for="item-001-a" class="form__label flex-direction-column">
        Opción A
        <span class="sd mb--0 color--neutro600">
          Texto de ayuda (opcional)
        </span>
      </label>
      <input type="radio" id="item-001-a" name="opciones-001" value="a" class="form__radio" aria-invalid="false" required />
    </div>
    <div class="form__item">
      <label for="item-001-b" class="form__label flex-direction-column">
        Opción B
        <span class="sd mb--0 color--neutro600">
          Texto de ayuda (opcional)
        </span>
      </label>
      <input type="radio" id="item-001-b" name="opciones-001" value="b" class="form__radio" aria-invalid="false" required />
    </div>
    <div class="form__item">
      <label for="item-001-c" class="form__label flex-direction-column">
        Opción C
        <span class="sd mb--0 color--neutro600">
          Texto de ayuda (opcional)
        </span>
      </label>
      <input type="radio" id="item-001-c" name="opciones-001" value="c" class="form__radio" aria-invalid="false" required />
    </div>
  </div>
  <div id="footer-001" class="form__footer" aria-live="polite">
  </div>
</fieldset>
<div class="divisor my--16"></div>
<fieldset class="form__fieldset" aria-describedby="footer-002">
  <legend class="form__legend">
    <span class="form__requerido" aria-hidden="true">
      *
    </span>
    Grupo de botones (aria-invalid="true")
    <span class="oculto">
      Campo obligatorio
    </span>
    <span class="form__meta">
    </span>
  </legend>
  <div class="form__body reticulaGrid__1 gapy--8">
    <div class="form__item">
      <label for="item-002-a" class="form__label">
        Opción A
      </label>
      <input type="radio" id="item-002-a" name="opciones-002" value="a" class="form__radio" aria-invalid="true" />
    </div>
    <div class="form__item">
      <label for="item-002-b" class="form__label">
        Opción B
      </label>
      <input type="radio" id="item-002-b" name="opciones-002" value="b" class="form__radio" aria-invalid="true" />
    </div>
    <div class="form__item">
      <label for="item-002-c" class="form__label">
        Opción C
      </label>
      <input type="radio" id="item-002-c" name="opciones-002" value="c" class="form__radio" aria-invalid="true" />
    </div>
  </div>
  <div id="footer-002" class="form__footer" aria-live="polite">
    <span class="color--error">
      Mensaje de asistencia. Se inyecta al salir del campo o al
            enviar el formulario
    </span>
  </div>
</fieldset>
<div class="divisor my--16"></div>
<fieldset class="form__fieldset" role="radiogroup" aria-readonly="true">
  <legend class="form__legend">
    Grupo de botones (aria-readonly="true")
  </legend>
  <div class="form__body reticulaGrid__1 gapy--8">
    <div class="form__item">
      <label for="item-003-a" class="form__label">
        Opción A
      </label>
      <input type="radio" id="item-003-a" name="opciones-003" value="a" class="form__radio" checked />
    </div>
    <div class="form__item">
      <label for="item-003-b" class="form__label">
        Opción B
      </label>
      <input type="radio" id="item-003-b" name="opciones-003" value="b" class="form__radio" />
    </div>
    <div class="form__item">
      <label for="item-003-c" class="form__label">
        Opción C
      </label>
      <input type="radio" id="item-003-c" name="opciones-003" value="c" class="form__radio" />
    </div>
  </div>
</fieldset>
<div class="divisor my--16"></div>
<fieldset class="form__fieldset" aria-describedby="footer-004" disabled>
  <legend class="form__legend">
    <span class="form__requerido" aria-hidden="true">
      *
    </span>
    Grupo de botones (disabled)
    <span class="oculto">
      Campo obligatorio
    </span>
    <span class="form__meta">
    </span>
  </legend>
  <div class="form__body reticulaGrid__1 gapy--8">
    <div class="form__item">
      <label for="item-004-a" class="form__label">
        Opción A
      </label>
      <input type="radio" id="item-004-a" name="opciones-004" value="a" class="form__radio" aria-invalid="false" />
    </div>
    <div class="form__item">
      <label for="item-004-b" class="form__label">
        Opción B
      </label>
      <input type="radio" id="item-004-b" name="opciones-004" value="b" class="form__radio" aria-invalid="false" />
    </div>
    <div class="form__item">
      <label for="item-004-c" class="form__label">
        Opción C
      </label>
      <input type="radio" id="item-004-c" name="opciones-004" value="c" class="form__radio" aria-invalid="false" />
    </div>
  </div>
  <div id="footer-004" class="form__footer" aria-live="polite">
  </div>
</fieldset>
```
