# Sistema Nacional de Diseño (SND) – Componente: Barra de progreso (`progress bar`)

- **Fuente:** https://www.snd.gob.mx/componentes/barra-progreso
- **Título de la página:** Barra de progreso (progress bar) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Componente visual que muestra el avance o estado de un proceso o tarea en desarrollo.

---

## 1. Descripción

### Barra de progreso (Progress bar)
La barra de progreso es un recurso visual que comunica de manera sencilla el avance de una tarea. Se usa para acompañar procesos con varias etapas, como subir archivos o completar formularios. Se presenta en dos formas:
- **Informativa:** que indica en qué paso se encuentra la persona usuaria y cuántos faltan.
- **Interactiva:** que además permite regresar o avanzar entre pasos según sea necesario.

### Informativa
La barra de progreso informativa cambia su presentación según el número de pasos y el dispositivo:
- Con menos de 4 pasos, cada uno se muestra por separado, indicando si está activo o inactivo.
- Con más de 4 pasos, o cuando la persona usuaria navega desde un dispositivo móvil, se simplifica en una barra porcentual con la indicación “1 de X” para señalar el avance dentro del total.

- Por pasos: *(imagen: `Barra de progreso por pasos`)*
- Barra porcentual: *(imagen: `Barra de progreso lineal`)*

### Estados
Los estados determinan la forma en que un componente se presenta y responde en distintas condiciones de uso.
*(Imágenes: `Barra de progreso estado pasos`, `Barra de progreso estado lineal`)*

### Interactiva
La barra de progreso interactiva se muestra de manera vertical y permite identificar el estado de cada paso.

Para su construcción, cada círculo con número o ícono refleja un estatus. Estos círculos se conectan mediante una línea vertical que hereda el color del paso anterior, lo que facilita seguir la secuencia. En el último paso la línea no se dibuja, indicando el final del recorrido.

Cada paso debe ir acompañado de un breve texto que indique su nombre y, de manera opcional, una indicación más breve.

Existen tres versiones de la barra interactiva:
- **Estándar:** tamaño regular, adecuada para la mayoría de procesos.
- **Grande:** con mayor dimensión, pensada para procesos destacados o que requieren mayor visibilidad.
- **Con subpasos:** permite detallar etapas intermedias dentro de un mismo paso, ofreciendo mayor granularidad en el seguimiento.
*(Imagen: `Barra de progreso vertical`)*

### Estados (interactiva)
Los estatus posibles son:
- **Activo:** el paso en curso.
- **Inactivo:** pasos aún no iniciados.
- **Alertamiento:** pasos que requieren atención o corrección.
- **Completado:** pasos ya finalizados.
- **Error:** pasos que no pudieron completarse correctamente.
- **En progreso:** pasos que se están ejecutando pero aún no han finalizado.
*(Imagen: `Barra de progreso estado activo`)*

### Ejemplos de uso
*(Imágenes: `Ejemplos de uso`, `Ejemplos de uso`)*

### Usos no permitidos
Para mantener la coherencia y la claridad en la experiencia de usuario, evita:
- **Uso decorativo:** no emplear la barra como elemento meramente estético o de relleno visual.
- **Acciones interactivas:** no debe funcionar como botón, enlace ni deslizador (slider).
- **Información ambigua o ficticia:** no mostrar un avance que no corresponda al proceso real.
- **Estados o estilos incorrectos:** no inventar estados fuera de los definidos ni alterar colores o tipografía establecidos.
- **Construcción inconsistente:** no modificar la lógica de conexión entre pasos ni omitir el texto que acompaña cada etapa.
*(Imagen: `Ejemplos de uso no permitidos`)*

---

## 2. Diseño

### Barra de progreso — Anatomía
*(Imágenes: `Anatomía de una barra de progreso`, `Anatomía de una barra de progreso lineal`, `Anatomía de una barra de progreso lineal vertical`)*
- **Fase:** Ancho: `132.33 px`
- **Paso:** Alto: `8 px` | Ancho: `132.33 px` | Color de fondo: `presidencia dorado - 500` | Radio del borde: `100 px`
- **Texto:** Alineación de texto: `Centro` | Estilo de texto: `Base/Small details/SDR`
- **Stepper (porcentual):** Radio del borde: `100` | `Stepper` Color de fondo: `neutro - 400` | Radio del borde: `100` | `StepperAtom 01` Dependencia: `StepperAtom` | Estado: `Activo` | `Texto` Color de fondo: `neutro - 800` | Estilo de texto: `Base/Small details/SDR`
- **StepperVertical:** Alto: `256` | Ancho: `64` | `Atom/LineStepperVertical` Dependencia: `Atom/LineStepperVertical` | Estado: `Activo`

### Estados
Muestra los diferentes estados de un componente.
- **Activo (lineal):** `Text` Color de texto: `neutro - 800` *(imagen: `Estado activo`)*
- **Inactivo (lineal):** `Text` Color de texto: `neutro - 400` *(imagen: `Estado inactivo`)*
- **Activo (stepper vertical):** `Atom/StepperVertical` Color de borde: `presidencia dorado - 500` | Border weight: `2` *(imagen: `Estado activo stepper`)*
- **Inactivo (stepper vertical):** `Atom/StepperVertical` Color de borde: `neutro - 500` | Ancho borde: `1` *(imagen: `Estado inactivo stepper`)*
- **Éxito:** `Atom/StepperVertical` Color de borde: `verde - 500` *(imagen: `Estado éxito`)*
- **En progreso:** `Atom/StepperVertical` Color de fondo: `presidencia dorado - 200` *(imagen: `Estado en progreso`)*

### Variaciones
Definen cómo se comporta y se muestra un componente en diferentes situaciones de uso.
- **Multi fase:** `Stepper` Ancho: `628` *(imagen: `Multi fase`)*
- **Porcentaje:** `Stepper` Ancho: `1103` | `Stepper` Ancho: `1103` | `Contenedor` Ancho: `1103` *(imagen: `Porcentaje`)*
- **Mobile:** `Stepper` Ancho: `343` | `Stepper` Ancho: `343` *(imagen: `Mobile`)*

### Construcción de UI
- **Step web:** Dirección: `Vertical` | Alineación: `Top left` | Re-dimensión vertical: `Comprimir` | Re-dimensión hotizontal: `Ajustada` | Espacios: `8` *(imagen: `Construcción de UI Step web`)*
- **Stepper (horizontal):** Dirección: `Horizontal` | Alineación: `Top left` | Re-dimensión vertical: `Comprimir` | Re-dimensión hotizontal: `Ajustada` | Espacios: `8` *(imagen: `Construcción de UI Stepper`)*
- **Stepper (vertical):** Dirección: `Vertical` | Alineación: `Superior izquierda` | Re-dimensión vertical: `Comprimir` | Re-dimensión hotizontal: `Compirmir` *(imagen: `Construcción de UI Stepper`)*
- **Stepper (horizontal con espacios):** Dirección: `Horizontal` | Alineación: `Superior izquierda` | Re-dimensión vertical: `Ajustada` | Re-dimensión hotizontal: `Comprimir` | Espacios: `16` *(imagen: `Construcción de UI Stepper`)*

---

## 3. Desarrollo

### Utiliza una barra de progreso en tu proyecto
La barra de progreso muestra el avance de una persona usuaria dentro de un proceso. Está disponible en tres variantes; ninguna requiere JavaScript:
- **Por pasos (`progresoPasos`):** muestra cada paso como un segmento. Con más de 4 pasos, o en pantallas de 767 px o menos, se convierte automáticamente en una barra porcentual con la indicación `"1 de X"`.
- **Lineal (`progresoLineal`):** una barra continua para representar un avance numérico, por ejemplo `2 de 4` o un porcentaje.
- **Vertical (`progresoVertical`):** cada paso se representa con un círculo con número o ícono según su estatus, conectado por una línea. Tiene tamaño estándar, tamaño grande y la opción de agregar subpasos.

### Por pasos
Agrega una lista ordenada con la clase `progresoPasos` y un `li` por paso con su nombre como texto. Marca el paso actual con `aria-current="step"`; los pasos anteriores se muestran como completados automáticamente. Agrega `aria-label` a la lista para nombrar el proceso.

El indicador `"3 de 6"` se calcula automáticamente. Admite hasta 12 pasos.

```html
<!-- Hasta 4 pasos: cada paso se muestra por separado -->
<ol class="progresoPasos" aria-label="Registro de usuario">
  <li>
    Datos personales
  </li>
  <li>
    Dirección
  </li>
  <li aria-current="step">
    Confirmación
  </li>
  <li>
    Finalizar
  </li>
</ol>

<!-- Más de 4 pasos: barra porcentual -->
<ol class="progresoPasos" aria-label="Registro de usuario">
  <li>
    Datos personales
  </li>
  <li>
    Dirección
  </li>
  <li aria-current="step">
    Documentos
  </li>
  <li>
    Pago
  </li>
  <li>
    Confirmación
  </li>
  <li>
    Finalizar
  </li>
</ol>
```

### Lineal
Usa un `label` con la clase `progresoLineal` que contenga el título, el contador y un elemento `progress`. El `label` le da el nombre accesible a la barra. Indica el avance con `value` y `max`, y describe el valor con `aria-valuetext`. El contador visible lleva `aria-hidden="true"` porque el lector de pantalla ya anuncia el valor de la barra.

```html
<label class="progresoLineal">
  Datos del establecimiento
  <span aria-hidden="true">
    2 de 4
  </span>
  <progress value="2" max="4" aria-valuetext="Paso 2 de 4"></progress>
</label>
```

### Estatus de los pasos verticales
El estatus de cada paso se indica con el atributo `data-estado`; el paso actual se indica con `aria-current="step"` y los pasos sin atributos se muestran como inactivos. El número de cada paso se genera automáticamente y la línea que conecta con el siguiente paso toma el color del estatus.

| Estatus | Atributo | Se muestra |
| --- | --- | --- |
| Activo | `aria-current="step"` | Borde dorado con el número. Es el paso en curso; solo un paso debe tenerlo. |
| Inactivo | Sin atributo | Borde gris con el número. Pasos aún no iniciados. |
| En progreso | `data-estado="progreso"` | Relleno dorado con el número. Pasos que se están ejecutando pero aún no han finalizado. |
| Completado | `data-estado="completado"` | Relleno verde con ícono de palomita. |
| Alertamiento | `data-estado="alerta"` | Relleno amarillo con ícono de advertencia. Pasos que requieren atención o corrección. |
| Error | `data-estado="error"` | Relleno rojo con ícono de cerrar. Pasos que no pudieron completarse. |

### Cambiar el estatus
El componente no necesita JavaScript propio: los estilos, el ícono, el color de la línea y el texto para el lector de pantalla cambian en cuanto se modifican los atributos del paso. Por eso puedes actualizar el estatus desde el servidor al generar el HTML o desde el código de tu sistema (JavaScript, Angular, WordPress, etc.).
- Para asignar o cambiar un estatus, establece `data-estado` con `completado`, `progreso`, `alerta` o `error`.
- Para regresar un paso a inactivo, elimina el atributo `data-estado`.
- Para avanzar, quita `aria-current="step"` del paso actual y agrégalo al siguiente. Mantén un solo paso con este atributo.
- La numeración se recalcula sola si agregas o quitas pasos.

```javascript
const pasos = document.querySelectorAll(".progresoVertical > li");
// Marcar el paso 4 como completado
pasos[3].dataset.estado = "completado";
// Cambiar su estatus a alertamiento, error o en progreso
pasos[3].dataset.estado = "alerta";
// Regresarlo a inactivo
delete pasos[3].dataset.estado;
// Mover el paso actual del paso 5 al paso 6
pasos[4].removeAttribute("aria-current");
pasos[5].setAttribute("aria-current", "step");
```

En la barra por pasos el avance se controla igual: mueve `aria-current="step"` al paso en curso y los anteriores se muestran como completados.

### Vertical
Agrega una lista ordenada con la clase `progresoVertical`. Cada paso lleva su nombre como texto y, de manera opcional, una descripción breve dentro de un elemento `small`.

```html
<ol class="progresoVertical" aria-label="Avance del trámite">
  <li data-estado="completado">
    Datos personales
    <small>
      Información capturada
    </small>
  </li>
  <li data-estado="alerta">
    Documentos
    <small>
      Revisa el comprobante de domicilio
    </small>
  </li>
  <li data-estado="error">
    Pago
    <small>
      No se pudo procesar el pago
    </small>
  </li>
  <li data-estado="progreso">
    Revisión
    <small>
      Tu solicitud está en revisión
    </small>
  </li>
  <li aria-current="step">
    Firma
    <small>
      Firma tu solicitud
    </small>
  </li>
  <li>
    Entrega
    <small>
      Recibe tu documento
    </small>
  </li>
</ol>
```

### Vertical grande
Agrega la clase `progresoVertical--grande` para procesos destacados. Los círculos miden 64 px en escritorio y 48 px en pantallas de 767 px o menos.

```html
<ol class="progresoVertical progresoVertical--grande" aria-label="Avance del trámite">
  <li data-estado="completado">
    Datos personales
    <small>
      Información capturada
    </small>
  </li>
  <li data-estado="alerta">
    Documentos
    <small>
      Revisa el comprobante de domicilio
    </small>
  </li>
  <li data-estado="error">
    Pago
    <small>
      No se pudo procesar el pago
    </small>
  </li>
  <li data-estado="progreso">
    Revisión
    <small>
      Tu solicitud está en revisión
    </small>
  </li>
  <li aria-current="step">
    Firma
    <small>
      Firma tu solicitud
    </small>
  </li>
  <li>
    Entrega
    <small>
      Recibe tu documento
    </small>
  </li>
</ol>
```

### Vertical con subpasos
Para detallar etapas intermedias, agrega una lista ordenada dentro del paso. Los subpasos usan los mismos atributos de estatus y se numeran automáticamente (2.1, 2.2…).

```html
<ol class="progresoVertical" aria-label="Avance del trámite">
  <li data-estado="completado">
    Datos personales
    <small>
      Información capturada
    </small>
  </li>
  <li data-estado="progreso">
    Documentos
    <small>
      Revisión de documentos
    </small>
    <ol>
      <li data-estado="completado">
        Identificación
        <small>
          Documento válido
        </small>
      </li>
      <li data-estado="alerta">
        Comprobante de domicilio
        <small>
          Revisa la fecha del documento
        </small>
      </li>
      <li data-estado="error">
        Acta de nacimiento
        <small>
          El archivo no se puede leer
        </small>
      </li>
      <li>
        CURP
        <small>
          Pendiente de cargar
        </small>
      </li>
    </ol>
  </li>
  <li aria-current="step">
    Firma
    <small>
      Firma tu solicitud
    </small>
  </li>
  <li>
    Entrega
    <small>
      Recibe tu documento
    </small>
  </li>
</ol>
```

### Para una buena accesibilidad
- Las listas ordenadas permiten que los lectores de pantalla anuncien la cantidad de pasos y la posición de cada uno.
- `aria-current="step"` hace que el lector de pantalla anuncie `"paso actual"`. Úsalo solo en un paso.
- En la variante vertical, el lector de pantalla anuncia el estatus antes del nombre del paso (`"Completado:"`, `"Requiere atención:"`, `"Error:"`, `"En progreso:"`, `"Activo:"`, `"Inactivo:"`). Este texto se genera con CSS, por lo que no necesitas agregarlo.
- En la variante por pasos, cuando se muestra como barra porcentual, los nombres de los pasos que no están en curso se ocultan visualmente pero siguen disponibles para el lector de pantalla.
- En la variante lineal, el `label` da nombre a la barra y `aria-valuetext` describe el avance.
- El estatus no se comunica solo con color: cada estatus tiene su propio ícono o número y un texto para el lector de pantalla.

### Explicación de clases y atributos

| Clase o atributo | Descripción |
| --- | --- |
| `progresoPasos` | Lista ordenada de la barra por pasos. Cambia a barra porcentual con más de 4 pasos o en pantallas de 767 px o menos. |
| `progresoLineal` | Etiqueta que agrupa el título, el contador y la barra lineal. |
| `progresoVertical` | Lista ordenada de la barra vertical. Genera los círculos, números, íconos y líneas de conexión. |
| `progresoVertical--grande` | Aplica el tamaño grande a la barra vertical. |
| `aria-current="step"` | Indica el paso actual. En la barra vertical aplica el estatus Activo. |
| `data-estado` | Estatus de un paso vertical: `completado`, `progreso`, `alerta`, `error`. |
| `aria-label` | Nombra el proceso representado por la lista. |
| `aria-valuetext` | Describe el avance de la barra lineal, por ejemplo `"Paso 2 de 4"`. |
