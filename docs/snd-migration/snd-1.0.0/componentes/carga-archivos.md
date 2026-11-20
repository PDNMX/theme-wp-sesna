# Sistema Nacional de Diseño (SND) – Componente: Carga de archivos (`file uploader`)

- **Fuente:** https://www.snd.gob.mx/componentes/carga-archivos
- **Título de la página:** Carga de archivos (file uploader) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Permite al usuario cargar archivos desde su dispositivo y mostrar el estado de dicha carga.

---

## 1. Descripción

El componente de carga de archivos (upload button) permite seleccionar y cargar documentos. Se muestra información como los formatos permitidos o el tamaño máximo del archivo.

El componente debe incluir los formatos permitidos y el peso máximo del archivo. *(imagen: `Ejemplo cargador de archivos`)*

### Estados
- **Por defecto (default):** Es el estado inicial, cuando el componente está vacío y la persona usuaria no ha cargado nada aún. Se muestra con un borde tenue e incluye un botón para seleccionar archivos.
- **Arrastrar:** Es el estado que se muestra cuando la persona usuaria arrastra un documento desde el explorador de archivos hacia el área de carga. El componente cambia visualmente para indicar que el archivo puede soltarse en ese espacio.
- **Cargando:** Es el estado que se muestra mientras el documento se está subiendo. Incluye una barra de progreso que permite visualizar el avance de la carga hasta que el archivo se haya cargado correctamente.
- **Completado (filled):** Aparece cuando la persona usuaria ha ingresado un archivo en el campo. Cambia el estilo del borde, se agregan botones de interacción y se destaca la información ingresada.
- **Error:** Se activa cuando la persona usuaria no sube un archivo válido o la carga se ve interrumpida. El borde cambia de color y se muestra un mensaje de error para orientar sobre cómo corregir la situación.
- **Aprobado:** Este estado ocurre cuando la persona usuaria ingresa un archivo correcto y cumple con los criterios de validación. El componente muestra un indicador visual de aprobación.
- **Pendiente:** Este estado ocurre cuando la persona usuaria ingresa un archivo pero aún no se confirma si cumple con los criterios de validación. El componente muestra un indicador visual de pendiente.
- **Rechazado:** Este estado ocurre cuando la persona usuaria ingresa un archivo incorrecto o que no cumple con los criterios de validación. El componente muestra un indicador visual para comunicar que el rechazo y un mensaje de error para orientar sobre cómo corregir la situación.
- **Consulta:** Esta estado indico que el contenido se muestra sólo disponible para lectura.
- **Al pasar el cursor (hover):** Estado visual interactivo que ocurre cuando la persona usuaria coloca el puntero del mouse sobre el botón para seleccionar archivos, sin llegar a hacer clic.
- **Enfocado:** Este estado se muestra cuando la persona usuaria navega hasta el componente utilizando la tecla Tab. El borde del botón para seleccionar archivos cambia de color para indicar que el campo está seleccionado.

### Variaciones
- **Versión de escritorio:** Por defecto (default), Arrastrar, Cargando, Completado (filled), Error, Aprobado, Pendiente, Rechazado, Consulta, Al pasar el cursor (hover), Enfocado
- **Versión móvil:** Al adaptar el componente a la versión móvil, se debe utilizarse la variante correspondiente ya que contempla dimensiones y espaciados específicos para garantizar una experiencia accesible.

### Ejemplos de uso
*(20 imágenes con alt `Ejemplos de uso`)*

### Usos no permitidos
- Mostrar mensajes poco claros o sin relación.
- Romper la coherencia visual del UI Kit, usando colores, tipografía o iconos distintos.
*(2 imágenes con alt `Usos no permitidos`)*

---

## 2. Diseño

### Anatomía

#### Versión de escritorio
*(Imagen: `Anatomía de cargador de archivos`)*
- **`*`:** Color de texto: `rojo - 500` | Estilo de texto: `Base/Body/B1R`
- **Etiqueta del campo:** Color de texto: `neutro - 800` | Estilo de texto: `Base/Body/B1SB`
- **Opcional:** Color de texto: `neutro - 600` | Alineación: `Centro` | Estilo de texto: `Base/Body/B1R`
- **IC/help:** Depends on: `IC/help`
- **Contenedor:** Color de fondo: `neutro - 100` | Ancho de borde: `1` | Radio de borde: `16` | Color de trazo: `rojo - 500`, `azul - 500`, `verde - 500`, `neutro - 600`
- **Cargar o arrastrar archivo:** Color de texto: `neutro - 800` | Estilo de texto: `Base/Small details/SDR`
- **Formato, peso máximo:** Color de texto: `neutro - 700` | Estilo de texto: `Base/Extra Small Details/XSDR`
- **Botón:** Depende de: `Button` | Icono derecho: `Activo` | Icono izquierdo: `Inactivo` | Color de texto: `presidencia guinda - 900`, `presidencia verde - 900` | Jerarquia: `Secundario` | Estado: `Activo` | Tamaño: `Básico` | Modo: `Por defecto` | Estilo: `Por defecto`

#### Versión móvil
*(Imagen: `Anatomía de cargador de archivos`)*
- **Carga de archivos:** Color de fondo: `neutro - 100` | Ancho de borde: `1` | Radio de borde: `16` | Color de trazo: `rojo - 500`, `verde - 500`, `azul - 500`, `neutro - 600`
- **`*`:** Color de texto: `rojo - 500` | Estilo de texto: `Base/Body/B1R`
- **Etiqueta del campo formulario:** Color de texto: `neutro - 800` | Estilo de texto: `Base/Body/B1R`
- **Etiqueta del campo ayuda:** Depends on: `IC/help`
- **Botón:** Depende de: `Button` | Icono derecho: `Activo` | Icono izquierdo: `Inactivo` | Color de texto: `presidencia guinda - 900`, `presidencia verde - 900` | Jerarquia: `Secundario` | Estado: `Activo` | Tamaño: `Básico` | Modo: `Por defecto` | Estilo: `Por defecto`
- **Formato, peso máximo:** Color de texto: `neutro - 700` | Estilo de texto: `Base/Extra Small Details/XSDR`

### Construcción UI
- **Versión de escritorio** *(imágenes: 2 con alt `Construcción de cargador de archivos`)*:
  - `Cargar archivo` (bloque 1): Dirección: `Vertical` | Alineación: `Centro izquierda` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Comprimir` | Espaciado interno: `8`
  - `Cargar archivo` (bloque 2): Dirección: `Horizontal` | Alineación: `Centro izquierda` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Llenar` | Espaciado interno: `8` | Espaciado superior e inferior: `12` | Espaciado lateral: `16` | Espaciado intermedio: `16`
- **Versión móvil** *(imágenes: 2 con alt `Construcción Ui cargador de archivos`)*:
  - `Cargar archivo` (bloque 1): Dirección: `Vertical` | Alineación: `Centro` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Llenar` | Espaciado interno: `8`
  - `Cargar archivo` (bloque 2): Dirección: `Vertical` | Alineación: `Centro superior` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Llenar` | Espaciado interno: `8` | Espaciado superior e inferior: `16` | Espaciado lateral: `16`

### Accesibilidad
Las personas usuarias deberán poder utilizar la tecnología de asistencia para:
- Identificar instrucciones, indicaciones de error e iconos.
- Reconocer un error. Este no debe comunicarse únicamente con el uso del color rojo; debe incluir texto indicando el error.

---

## 3. Desarrollo

### Estados

#### Por defecto
Agrega la siguiente estructura HTML para mostrar un cargador por defecto en tu proyecto. Solo necesitas un contenedor `div.cargarArchivo` con un `label` y un `input type="file"`; el JavaScript del Sistema Nacional de Diseño construye el resto del componente.

Los formatos permitidos se definen con el atributo `accept` y el peso máximo en megabytes con `data-peso-maximo`. Con ellos se genera automáticamente la descripción, por ejemplo `"Formato PDF, peso máximo 5 MB"`.

```html
<div class="cargarArchivo" data-peso-maximo="5">
  <label for="archivoDefecto">
    Archivo de ejemplo 1
  </label>
  <input type="file" id="archivoDefecto" name="archivoDefecto" accept=".pdf" />
</div>
```

- **Selección y arrastre:** La persona usuaria puede elegir el archivo con el botón `"Seleccionar archivo"` o arrastrarlo y soltarlo sobre el área.
- **Validación:** Si el archivo no tiene un formato permitido o supera el peso máximo, el componente cambia al estado de error con el mensaje correspondiente.
- **Animación de carga:** Al recibir un archivo válido, el componente muestra el estado de carga con una animación de 1 segundo y después cambia al estado completado.

#### Arrastrar
Este estado se activa automáticamente mientras la persona usuaria arrastra un archivo sobre el área: el borde cambia a una línea punteada azul y el mensaje indica `"Suelta aquí el archivo"`. No requiere estructura adicional.

El área acepta archivos arrastrados en los estados por defecto, completado, error y rechazado. El botón `"Seleccionar archivo"` se mantiene como método alternativo accesible.

#### Obligatorio
Agrega el atributo `required` al input (o `data-requerido` al contenedor) para marcar el campo como obligatorio. Se muestra un asterisco rojo antes de la etiqueta.

Al enviar el formulario sin archivo, se cancela el envío, el campo se marca en rojo con el mensaje `"Selecciona un archivo"` y el foco se mueve al botón `"Seleccionar archivo"`.

```html
<div class="cargarArchivo" data-peso-maximo="5">
  <label for="archivoObligatorio">
    Archivo de ejemplo 2
  </label>
  <input type="file" id="archivoObligatorio" name="archivoObligatorio" accept=".pdf" required />
</div>
```

#### Deshabilitado
Agrega el atributo `disabled` al input (o `data-deshabilitado` al contenedor) para deshabilitar el campo. El área se muestra con opacidad, la etiqueta en gris y el cursor de no permitido sobre todo el componente.

```html
<div class="cargarArchivo" data-peso-maximo="5">
  <label for="archivoDeshabilitado">
    Archivo de ejemplo 3
  </label>
  <input type="file" id="archivoDeshabilitado" name="archivoDeshabilitado" accept=".pdf" disabled />
</div>
```

- **Sin interacción:** Los botones se deshabilitan y el área no acepta archivos arrastrados.
- **Formulario:** Como en cualquier campo nativo deshabilitado, el archivo no se envía con el formulario y no se valida como obligatorio.
- **Cambio dinámico:** Puedes habilitar o deshabilitar el campo en cualquier momento agregando o quitando el atributo.

#### Transiciones de carga
Los estados cargando, completado y error son transiciones: el componente los muestra automáticamente a partir del marcado por defecto, por lo que no necesitas escribirlos en tu HTML. Los siguientes ejemplos son de referencia y sus botones funcionan; usa `"Restablecer ejemplos"` para regresarlos a su estado inicial.

*(Ejemplos interactivos en pantalla: `Archivo de ejemplo 4` - `Cargando 50%`; `Archivo de ejemplo 5` - `Carga exitosa` (`Reemplazar`, `Ver archivo`, `Eliminar`); `Archivo de ejemplo 6` - `Carga fallida, inténtalo de nuevo` (`Reintentar`, `Eliminar`).)*

El componente cambia de estado con las siguientes acciones:

| Estado | Acción | Estado siguiente |
| --- | --- | --- |
| Por defecto | Seleccionar o arrastrar un archivo válido | Cargando |
| Por defecto | Seleccionar o arrastrar un archivo con formato no permitido o mayor al peso máximo | Error |
| Cargando | Termina la animación de carga (1 segundo) | Completado |
| Cargando | Cancelar | Por defecto |
| Completado | Reemplazar o arrastrar un archivo | Cargando |
| Completado | Eliminar | Por defecto |
| Error | Reintentar o arrastrar un archivo | Cargando |
| Error | Eliminar | Por defecto |
| Rechazado | Reemplazar o arrastrar un archivo | Cargando |

- **Mensajes:** Cargando muestra el porcentaje de avance, completado muestra `"Carga exitosa"` y error muestra `"Carga fallida, inténtalo de nuevo"` o el motivo de la validación. Puedes personalizarlos con `data-mensaje`.
- **Forzar un estado:** Si tu sistema necesita mostrar uno de estos estados, por ejemplo al recuperar un archivo guardado, usa los atributos `data-estado`, `data-archivo`, `data-progreso` y `data-url` descritos en la tabla de atributos.

#### Aprobado, pendiente, rechazado y consulta
Agrega `data-estado="aprobado"`, `data-estado="pendiente"` o `data-estado="rechazado"` para mostrar el estatus de revisión de un archivo con su etiqueta correspondiente, o `data-estado="consulta"` para un archivo que solo puede consultarse.

```html
<!-- Aprobado -->
<div class="cargarArchivo" data-peso-maximo="5" data-estado="aprobado" data-archivo="Nombre_del_archivo.pdf" data-url="#">
  <label for="archivoAprobado">
    Archivo de ejemplo 7
  </label>
  <input type="file" id="archivoAprobado" name="archivoAprobado" accept=".pdf" />
</div>

<!-- Pendiente -->
<div class="cargarArchivo" data-peso-maximo="5" data-estado="pendiente" data-archivo="Nombre_del_archivo.pdf" data-url="#">
  <label for="archivoPendiente">
    Archivo de ejemplo 8
  </label>
  <input type="file" id="archivoPendiente" name="archivoPendiente" accept=".pdf" />
</div>

<!-- Rechazado -->
<div class="cargarArchivo" data-peso-maximo="5" data-estado="rechazado" data-archivo="Nombre_del_archivo.pdf">
  <label for="archivoRechazado">
    Archivo de ejemplo 9
  </label>
  <input type="file" id="archivoRechazado" name="archivoRechazado" accept=".pdf" />
</div>

<!-- Consulta -->
<div class="cargarArchivo" data-peso-maximo="5" data-estado="consulta" data-archivo="Nombre_del_archivo.pdf" data-url="#">
  <label for="archivoConsulta">
    Archivo de ejemplo 10
  </label>
  <input type="file" id="archivoConsulta" name="archivoConsulta" accept=".pdf" />
</div>
```

- **Aprobado y pendiente:** Muestran la etiqueta de estatus y el botón `"Ver archivo"`.
- **Rechazado:** Muestra la etiqueta de estatus, el mensaje `"Debes corregir el archivo"` dentro del área y el botón `"Reemplazar"`.
- **Consulta:** Muestra únicamente el botón `"Ver archivo"`.

### Accesibilidad
El componente aplica automáticamente los siguientes criterios de accesibilidad en todos sus estados:
- **Grupo con nombre:** El área del componente tiene `role="group"` y toma su nombre de la etiqueta del campo. Su descripción incluye los formatos, el peso máximo, el estatus y el mensaje.
- **Botón de selección:** El `input type="file"` nativo se oculta visualmente y para los lectores de pantalla; en su lugar se usa el botón `"Seleccionar archivo"`, que anuncia la etiqueta del campo, los formatos y el peso máximo.
- **Campo deshabilitado:** El área tiene `aria-disabled="true"` y los botones el atributo `disabled`, por lo que el lector de pantalla los anuncia como no disponibles.
- **Campo obligatorio:** El asterisco es decorativo (`aria-hidden="true"`) y se agrega el texto oculto `"(obligatorio)"` después de la etiqueta, para que el lector de pantalla diga, por ejemplo, `"Comprobante de domicilio (obligatorio)"`.
- **Anuncios de estado:** Una región oculta con `aria-live="polite"` anuncia una sola vez cada cambio: `"Cargando el archivo…"`, `"Carga exitosa"`, `"Error…"`, `"Archivo eliminado"` o `"Carga cancelada"`. El porcentaje de avance no se anuncia en cada cambio para no saturar a la persona usuaria.
- **Barra de progreso:** Usa `role="progressbar"` con `aria-valuenow` y `aria-valuetext`, y toma su nombre del archivo que se está cargando.
- **Botones con contexto:** Cada acción indica el archivo con el que trabaja (por ejemplo, `"Reemplazar el archivo Documento.pdf"`) y describe el estatus y el mensaje vigentes. `"Ver archivo"` avisa que se abre en una pestaña nueva.
- **Manejo del foco:** Cuando un cambio de estado oculta el botón que tenía el foco, este se mueve al siguiente botón disponible; por ejemplo, de `"Seleccionar archivo"` a `"Cancelar"` al iniciar la carga.
- **Nombres largos:** Si el nombre del archivo no cabe, se corta con puntos suspensivos y se agrega un atributo `title` con el nombre completo. El lector de pantalla siempre lee el nombre completo.
- **Alto contraste y movimiento reducido:** El componente se adapta a `forced-colors` y elimina las transiciones con `prefers-reduced-motion`.

### Estilos CSS
Los estilos del componente están incluidos en la hoja de estilos del Sistema Nacional de Diseño. El componente ocupa el 100% del ancho de su contenedor y se adapta en un punto de cambio:
- **768 px o más:** El icono, los textos y las acciones se muestran en fila; el botón `"Cancelar"` se muestra solo con su icono.
- **767 px o menos:** Las acciones ocupan todo el ancho debajo de los textos y se centran; la etiqueta de estatus se muestra antes de los botones.

### JavaScript
El comportamiento del componente está incluido en el JavaScript del Sistema Nacional de Diseño, por lo que no necesitas agregar ningún archivo adicional. Inicializa automáticamente todos los elementos `.cargarArchivo` de la página, incluidos los que se agreguen después. Cualquier cambio en sus atributos `data-*` actualiza la vista al momento.

El componente no envía el archivo a ningún servidor: el archivo queda dentro del input (también cuando se arrastra) y se envía con el formulario de forma nativa. Las validaciones del componente mejoran la experiencia, pero no sustituyen la validación en el servidor.

#### Eventos

| Evento | Descripción |
| --- | --- |
| `cargarArchivo:seleccion` | Se emite al recibir un archivo válido. `event.detail.archivo` contiene el archivo. |
| `cargarArchivo:completado` | Se emite al terminar la animación de carga. |
| `cargarArchivo:cancelar` | Se emite al cancelar una carga en proceso. |
| `cargarArchivo:eliminar` | Se emite al eliminar el archivo cargado. |
| `cargarArchivo:ver` | Se emite al pulsar `"Ver archivo"` cuando no hay `data-url`. |

#### Funciones

| Función | Descripción |
| --- | --- |
| `cargarArchivo.estado(componente, estado, datos)` | Cambia el estado de un componente. `datos` acepta `progreso`, `archivo`, `mensaje` y `url`. |
| `cargarArchivo.validar(contenedor)` | Valida los campos obligatorios dentro del contenedor y devuelve `true` si todos tienen archivo. |
| `cargarArchivo.iniciar(contenedor)` | Inicializa manualmente los componentes dentro del contenedor. |

### Explicación de los atributos

| Atributo | Descripción |
| --- | --- |
| `cargarArchivo` | Contenedor del componente. Ocupa el 100% del ancho de su contenedor. |
| `data-estado` | Estado del componente: `vacio` (por defecto), `cargando`, `exito`, `error`, `aprobado`, `pendiente`, `rechazado` o `consulta`. |
| `data-archivo` | Nombre del archivo que se muestra. |
| `data-url` | Dirección del documento que abre `"Ver archivo"`. |
| `data-progreso` | Avance de la carga, de 0 a 100, en el estado `cargando`. |
| `data-mensaje` | Mensaje personalizado; reemplaza el mensaje por defecto del estado. |
| `data-peso-maximo` | Peso máximo permitido en megabytes. Los archivos más pesados se rechazan. |
| `data-descripcion` | Descripción personalizada; reemplaza la que se genera con `accept` y `data-peso-maximo`. |
| `data-deshabilitado`, `disabled` | Deshabilita el campo. Puede colocarse en el contenedor o en el input. |
| `data-requerido`, `required` | Marca el campo como obligatorio. Puede colocarse en el contenedor o en el input. |
| `data-titulo` | Texto principal del estado por defecto. Valor por defecto: `"Carga el archivo"`. |
| `data-texto-boton` | Texto del botón de selección. Valor por defecto: `"Seleccionar archivo"`. |
| `accept` | Atributo nativo del input. Define los formatos permitidos, por ejemplo `.pdf,.jpg`. |
| `data-invalido` | Lo agrega el componente cuando un campo obligatorio se envía sin archivo. |
