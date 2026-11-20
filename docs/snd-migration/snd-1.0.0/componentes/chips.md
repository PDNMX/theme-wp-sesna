# Sistema Nacional de Diseño (SND) – Componente: Píldoras (`chips`)

- **Fuente:** https://www.snd.gob.mx/componentes/chips
- **Título de la página:** Píldoras (chips) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Una píldora es un elemento que permite representar, seleccionar, gestionar información, opciones o filtros dentro de una interfaz.

---

## 1. Descripción

Puede utilizarse para facilitar la selección de categorías, mostrar criterios aplicados o presentar acciones relacionadas con un contenido.

*(Imagen: `Ejemplo de uso de chips`)*

- **Información breve y reconocible:** El contenido de la chip debe ser corto y fácil de identificar. Utiliza etiquetas que permitan comprender rápidamente la opción, categoría o información que representa.
- **Cantidad y organización:** Evita utilizar una cantidad excesiva de chips en un mismo espacio. Cuando existan varias opciones, procura mantener una organización que facilite su lectura y selección sin saturar la interfaz.

### Estados
- **Por defecto (default):** Es el estado inicial, cuando la persona usuaria no ha interactuado aún. Se muestra con un borde simple.
- **Abierto:** Indica que la chip está mostrando un contenido desplegable, como un menú de opciones o un filtro. Este estado señala que el contenido está abierto con una jerarquía visual menor que el estado activo.
- **Activo (active):** Indica que el chip se encuentra seleccionado. Se utiliza cuando la persona usuaria ha elegido una opción.
- **Enfocado (focus):** El borde cambia de color y de ancho para indicar que el campo está seleccionado. Este estado se muestra cuando la persona usuaria navega hasta un elemento utilizando la tecla Tab.
- **Inactivo (disabled):** Tiene un aspecto visual de apagado o gris para indicar que no está disponible para interactuar.
- **Al pasar cursor (hover):** Estado visual interactivo que ocurre cuando la persona usuaria coloca el puntero del mouse sobre el componente para interactuar, sin llegar a hacer clic.

### Variaciones
*(3 imágenes con alt `variaciones`)*

### Ejemplos de uso
*(Sección sin texto adicional en el DOM)*

### Usos no permitidos
Para garantizar coherencia visual, accesibilidad y claridad en la comunicación, se deben evitar los siguientes usos:
- Romper la coherencia visual del UI Kit, usando colores, tipografía o iconos distintos.
- Utilizar para sustituir botones.
- Usarlo para contenido extenso y/o complejo.
*(Imagen: `Usos no permitidos`)*

---

## 2. Diseño

### Anatomía
*(Imagen: `Anatomía de un chip`)*
- **ChipAccion:** Altura: `40` | Radio de borde: `24`
- **Contenido:** Estilo de texto: `Base/Small details/SDSB` | Color de texto: `presidencia verde - 900`, `presidencia guinda - 900`
- **IC/ Chevron-down:** Depende de: `IC/ Chevron-down`

### Construcción UI
*(Imagen: `Construcción UI`)*
- **ChipAccion:** Dirección: `Horizontal` | Alineación: `Centro` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Comprimir` | Item spacing: `8` | Espaciado superior e inferior: `4` | Espaciado lateral: `16` | Espaciado interno: `8`
- **Content:** Text color: `#611232`

### Accesibilidad
Para garantizar que la barra lateral pueda ser entendida por todas las personas usuarias:
- Utilizar textos breves y descriptivos que permitan comprender la función de la chip.
- Usar únicamente las variaciones de color para diferenciar los estados de la chip.
- Si la chip incluye un icono, asegurar que este no sea el único recurso para comunicar la acción.
- Mantener una jerarquía clara cuando varias etiquetas aparezcan juntas.

---

## 3. Desarrollo

### Utiliza píldoras en tu proyecto
Este componente se construye de la siguiente forma:
- `.pildora__grupo`: contenedor que agrupa las píldoras y las distribuye en una fila con una separación de 8 px. Si no caben en el ancho disponible, pasan a la siguiente línea.
- `.pildora`: clase principal de la píldora. Se aplica a un elemento `button` y define su forma, borde, color y estados.
- `.pildora__icono`: icono de flecha que acompaña al texto cuando la píldora despliega un menú de opciones o un filtro.

### Para una buena accesibilidad
La píldora debe comunicar su estado no solamente mediante color, sino también mediante atributos que puedan ser interpretados por tecnologías de asistencia.

En la implementación, su función concreta es la siguiente:
- `button type="button"` permite que la píldora reciba el foco con la tecla Tab y se active con Enter o Espacio.
- `role="group"` y `aria-label` en `.pildora__grupo` indican que las píldoras forman un conjunto relacionado y le dan un nombre.
- `aria-pressed` comunica si la píldora está seleccionada (`true`) o no (`false`).
- `aria-expanded` comunica si el contenido desplegable asociado a la píldora está abierto (`true`) o cerrado (`false`).
- `aria-controls` relaciona la píldora con el identificador del menú o filtro que despliega.
- `disabled` impide la interacción y comunica que la opción no está disponible.
- `aria-hidden="true"` se utiliza en el icono de flecha, ya que es únicamente decorativo.

**Importante:** el texto de la píldora debe ser breve y describir la opción por sí mismo. El icono no debe ser el único recurso para comunicar la acción.

### Estados
Los estados de la píldora se aplican mediante pseudoclases y atributos, sin necesidad de clases adicionales:
- **Por defecto:** `.pildora` sin atributos de estado. Se muestra con borde simple y fondo blanco.
- **Abierto:** `aria-expanded="true"` aplica un fondo claro y gira la flecha hacia arriba.
- **Activo:** `aria-pressed="true"` aplica el color principal como fondo y el texto en blanco.
- **Enfocado:** `:focus-visible` muestra un borde de 2 px cuando la persona usuaria navega con la tecla Tab.
- **Inactivo:** `disabled` muestra la píldora en gris y desactiva la interacción.
- **Al pasar cursor:** `:hover` aplica un fondo claro.

El cambio de los atributos `aria-pressed` y `aria-expanded` al hacer clic se gestiona con el script `.js` del componente.

### Píldoras de selección múltiple
Utiliza la clase `pildora__grupo` para agrupar píldoras de selección múltiple y agrega `aria-pressed` a cada píldora; el script alterna su valor al hacer clic. Agrega el atributo `disabled` al elemento `button` cuando la opción no está disponible.

```html
<div class="pildora__grupo" role="group" aria-label="Filtrar por categoría">
  <!-- Selección múltiple -->
  <button type="button" class="pildora" aria-pressed="true">
    Educación
  </button>
  <button type="button" class="pildora" aria-pressed="false">
    Salud
  </button>
  <button type="button" class="pildora" aria-pressed="false">
    Vivienda
  </button>
  <button type="button" class="pildora" aria-pressed="false">
    Trabajo
  </button>

  <!-- Inactiva -->
  <button type="button" class="pildora" aria-pressed="false" disabled>
    Norte
  </button>
  <button type="button" class="pildora" aria-pressed="false" disabled>
    Centro
    <i class="pildora__icono snd__icono snd-chevron--down" aria-hidden="true"></i>
  </button>
</div>
```

### Píldoras con menú desplegable
Agrega un icono con la clase `pildora__icono` y los atributos `aria-expanded` y `aria-controls` con el identificador del panel. El texto de la píldora va dentro de un elemento con `data-pildora-texto`, donde el script agrega la opción elegida o el número de opciones seleccionadas, y el botón con `data-pildora-cerrar` cierra el panel.

```html
<div class="pildora__grupo">
  <!-- Opción única (radio) -->
  <div class="pildora__desplegable">
    <button type="button" class="pildora" aria-expanded="false" aria-controls="pildora-panel-entrega">
      <span data-pildora-texto="">
        Entrega
      </span>
      <i class="pildora__icono snd__icono snd-chevron--down" aria-hidden="true"></i>
    </button>
    <div class="pildora__panel" id="pildora-panel-entrega" hidden>
      <fieldset class="pildora__fieldset">
        <legend class="pildora__legend">
          ¿Cómo deseas recibir tu documento?
        </legend>
        <div class="pildora__opciones">
          <label class="pildora__opcion">
            <input type="radio" class="pildora__radio" name="pildoraEntrega" value="correo" checked />
            Correo electrónico
          </label>
          <label class="pildora__opcion">
            <input type="radio" class="pildora__radio" name="pildoraEntrega" value="oficina" />
            Recoger en oficina
          </label>
          <label class="pildora__opcion">
            <input type="radio" class="pildora__radio" name="pildoraEntrega" value="domicilio" />
            Envío a domicilio
          </label>
        </div>
      </fieldset>
      <button type="button" class="boton__primario" data-pildora-cerrar="">
        Listo
      </button>
    </div>
  </div>

  <!-- Varias opciones (checkbox) -->
  <div class="pildora__desplegable">
    <button type="button" class="pildora" aria-expanded="false" aria-controls="pildora-panel-preferencias">
      <span data-pildora-texto="">
        Preferencias
      </span>
      <i class="pildora__icono snd__icono snd-chevron--down" aria-hidden="true"></i>
    </button>
    <div class="pildora__panel" id="pildora-panel-preferencias" hidden>
      <fieldset class="pildora__fieldset">
        <legend class="pildora__legend">
          Notificaciones
        </legend>
        <div class="pildora__opciones">
          <label class="pildora__opcion">
            <input type="checkbox" class="pildora__checkbox" name="pildoraNotificaciones" value="correo" />
            Recibir notificaciones por correo
          </label>
          <label class="pildora__opcion">
            <input type="checkbox" class="pildora__checkbox" name="pildoraNotificaciones" value="sms" checked />
            Recibir notificaciones por mensaje de texto
          </label>
        </div>
      </fieldset>
      <button type="button" class="boton__primario" data-pildora-cerrar="">
        Listo
      </button>
    </div>
  </div>
</div>
```
