# Sistema Nacional de Diseño (SND) – Componente: Interruptor (`switch`)

- **Fuente:** https://www.snd.gob.mx/componentes/interruptor
- **Título de la página:** Interruptor (switch) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Es un componente interactivo que permite activar o desactivar una opción de manera inmediata.

---

## 1. Descripción

Se utiliza para controlar configuraciones o preferencias que pueden alternar entre dos estados claramente diferenciados.

*(Imagen: `Ejemplo de uso de un interruptor`)*

- **Acción clara y directa:** La persona usuaria debe entender a través de la etiqueta asociada al componente qué función se activa o desactiva.
- **Uso contextual:** Utiliza el interruptor para cambios de estado que puedan realizarse de manera inmediata.

### Estados
- Activado *(imagen: `Ejemplo de uso de un interruptor encendido`)*
- Desactivado *(imagen: `Ejemplo de uso de un interruptor apagado`)*

### Ejemplos de uso
Localizar un servicio en el buscador de trámites federales y programas sociales. *(imágenes: `ejemplo de tabla de datos versión escritorio`, `ejemplo de tabla de datos versión móvil`)*

### Usos no permitidos
Para garantizar coherencia visual, accesibilidad y claridad en la comunicación, se debe evitar:
- Usarlo con acciones que no puedan deshacerse, por ejemplo, eliminar un documento.
- Usarlo para selección múltiple. Cuando existan varias opciones independientes, utiliza casillas de selección (checkboxes).
- Utilizarlo sin una etiqueta clara, la persona usuaria debe poder identificar qué función activa o desactiva el interruptor.

---

## 2. Diseño

*(Nota: En la página oficial, las imágenes corresponden a `Anatomía de un interruptor` y `Construcción de interfaz de usuario del interruptor`, pero el texto publicado en los bloques de Anatomía y Construcción UI dice textualmente "Divisor / Linea horizontal".)*

### Anatomía
*(Imagen: `Anatomía de un interruptor`)*
- **Divisor:** Ancho: `Llenar`
- **Linea horizontal:** Color de borde: `neutro - 600` | Alineación de trazo: `Centro` | Ancho de borde: `1`

### Construcción UI
*(Imagen: `Construcción de interfaz de usuario del interruptor`)*
- **Divisor:** Dirección: `Horizontal` | Alineación: `Centro` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Llenar`

### Accesibilidad
Para garantizar una comunicación accesible, considera los siguientes criterios:
- La etiqueta asociada al componente debe describir qué función activa o desactiva el interruptor. Evita etiquetas ambiguas como Sí/No que no expliquen qué se está controlando.
- La medida del componente debe tener un alto de 24px, mínimo, para facilitar su interacción en dispositivos táctiles.
- Cuando activar o desactivar la opción tenga consecuencias relevantes, proporciona información adicional antes o junto al interruptor.

---

## 3. Desarrollo

### Utiliza un interruptor en tu proyecto
Agrega la siguiente estructura HTML para mostrar un interruptor en tu proyecto.

```html
<label for="switch01" class="form__label dflex--acenter dflex--colgap--8">
  <input id="switch01" type="checkbox" class="form__switch" role="switch" />
  Recibir notificaciones por correo
</label>
```

### Implementación
El componente switch permite representar y modificar un estado binario de activación o desactivación dentro de una interfaz. Se implementa mediante un elemento `input type="checkbox"` y utiliza `role="switch"` para comunicar su comportamiento como interruptor a las tecnologías de asistencia.

El control debe contar con una etiqueta asociada mediante los atributos `for` e `id`. Cuando la etiqueta no requiere mostrarse visualmente, se utiliza la clase `.oculto`, la cual permite ocultarla de manera visual sin retirarla del árbol de accesibilidad. La etiqueta debe describir la función que controla el switch, evitando utilizar únicamente valores que representen el estado, como `"Activado"` o `"Desactivado"`.

El estado del componente se determina mediante la propiedad nativa `checked` del elemento `input`. Cuando el control se encuentra desactivado, utiliza el estado visual predeterminado; al activarse, cambia su apariencia y desplaza el indicador hacia el extremo contrario. Estos cambios visuales complementan el estado semántico del control y no sustituyen la información proporcionada por las tecnologías de asistencia.

El componente contempla los estados predeterminado, hover, activo y seleccionado, así como un indicador de foco mediante `:focus-visible`. Este último permite identificar visualmente el control cuando se navega mediante teclado, manteniendo un indicador de foco diferenciado y visible.

La implementación incorpora además la consulta `prefers-reduced-motion`, mediante la cual se desactivan las transiciones y animaciones del indicador definidas en el css, cuando la persona usuaria ha solicitado reducir el movimiento en su sistema operativo. De esta manera, el comportamiento visual del componente se adapta a las preferencias de accesibilidad configuradas por la persona usuaria.

El componente utiliza pseudo-elementos exclusivamente para construir los elementos visuales del interruptor. Estos elementos son decorativos y no contienen información necesaria para comprender o utilizar el control.

### Consideraciones de accesibilidad
- Mantener siempre una etiqueta asociada al control.
- Utilizar `.oculto` únicamente para ocultamiento visual, no `display: none` ni `visibility: hidden`.
- Utilizar una descripción que indique la función del switch.
- Mantener `role="switch"` cuando el control represente un interruptor.
- No es necesario agregar `tabindex`, ya que el input es enfocable de manera nativa.
- No es necesario agregar `aria-label` cuando existe una etiqueta `label` correctamente asociada.
- No agregar manualmente `aria-checked`; el estado se obtiene del atributo `checked` del input.
- Mantener un indicador de foco visible mediante `:focus-visible`.
- Respetar la configuración `prefers-reduced-motion` para reducir animaciones.

Las personas usuarias deben poder utilizar el teclado para operar el interruptor:
- `Tab`: traslada el enfoque al siguiente interruptor o elemento interactivo.
- `Shift + Tab`: traslada el enfoque al interruptor o elemento interactivo anterior.
- `Espacio`: activa o desactiva el interruptor que tiene el enfoque.

### Variantes

#### Activado por defecto
Con el atributo `checked` el interruptor aparece activado al cargar la página.

```html
<label for="switch02" class="form__label dflex--acenter dflex--colgap--8">
  <input id="switch02" type="checkbox" class="form__switch" role="switch" checked />
  Recibir notificaciones por mensaje de texto
</label>
```

#### Inactivo (`disabled`)
Con el atributo `disabled` el interruptor y su etiqueta se muestran apagados, no se pueden cambiar y no reciben el foco. Úsalo cuando la opción dependa de una acción previa que, al realizarse, la habilite.

```html
<div class="dflex dflex--col dflex--rowgap--16">
  <label for="switch03" class="form__label dflex--acenter dflex--colgap--8">
    <input id="switch03" type="checkbox" class="form__switch" role="switch" disabled />
    Enviar copia digital
  </label>
  <label for="switch04" class="form__label dflex--acenter dflex--colgap--8">
    <input id="switch04" type="checkbox" class="form__switch" role="switch" checked disabled />
    Enviar copia impresa
  </label>
</div>
```

#### Con etiqueta oculta
Oculta la etiqueta con la clase `.oculto` solo cuando el contexto visual ya indica la función del interruptor, por ejemplo, el encabezado de una fila o de una tarjeta. La etiqueta sigue siendo necesaria para las tecnologías de asistencia.

```html
<div>
  <label for="switch05" class="form__label oculto">
    Mostrar mi información en el perfil público
  </label>
  <input id="switch05" type="checkbox" class="form__switch" role="switch" />
</div>
```
