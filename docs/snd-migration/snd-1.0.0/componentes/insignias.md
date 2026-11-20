# Sistema Nacional de Diseño (SND) – Componente: Insignias (`badges`)

- **Fuente:** https://www.snd.gob.mx/componentes/insignias
- **Título de la página:** Insignias (badges) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Su función es facilitar el reconocimiento de información sin interrumpir la lectura o interacción con el contenido principal.

---

## 1. Descripción

Una insignia es un elemento visual compacto que permite identificar o destacar información breve asociada a un contenido, como estados, categorías, características o indicadores.

*(Imagen: `Ejemplo de uso de insignias`)*

- **Información breve y reconocible:** Están diseñadas para ser mínimas y no invasivas. Suelen contener un texto breve.
- **Indicador contextual:** Utiliza las insignias para comunicar información asociada a un elemento, como su estado, categoría o característica. No deben utilizarse como elemento principal de interacción.
- **Énfasis controlado:** La insignia debe destacar la información sin competir con el contenido principal. Utiliza sus variantes visuales de manera consistente con el significado que representan.

El componente debe utilizarse para comunicar información breve y contextual asociada a un contenido. Para mensajes que requieran atención inmediata o una acción de la persona usuaria, utiliza un componente más adecuado al contexto como los mensajes informativos.

### Variaciones
- Trazo *(imagen: `Insignias variaciones trazo`)*
- Relleno *(imágenes: 2 con alt `Insignias variaciones trazo`)*

### Ejemplo de uso
Indicar que el trámite se encuentra en determinado estado del proceso.

### Usos no permitidos
Para garantizar coherencia visual, accesibilidad y claridad en la comunicación, se deben evitar:
- Utilizar colores, tipografía o iconos distintos a los establecidos.
- Utilizar el componente para sustituir botones.
- Usarlo para contenido extenso y/o complejo.
*(Imagen: `Usos no permitidos`)*

---

## 2. Diseño

### Anatomía
*(Imagen: `Anatomía de un botón`)*
- **Insignia:** Ancho mínimo: `11` | Radio de borde: `100` | Color de texto: `azul - 100 / 500`, `verde - 100 / 500`, `naranja - 100 / 500`, `neutro - 100 / 500`, `rojo - 100 / 500`, `amarillo - 100 / 500`, `morado - 100 / 500`, `Guinda - 100 / 500`
- **IC/Dot-mark:** Depende de: `IC/Dot-mark` | Color de texto: `azul - 100 / 500`, `verde - 100 / 500`, `naranja - 100 / 500`, `neutro - 100 / 500`, `rojo - 100 / 500`, `amarillo - 100 / 500`, `morado - 100 / 500`, `Guinda - 100 / 500`
- **Texto:** Estilo de texto: `Base/Small details/SDR`

### Layout y espaciado
*(Imagen: `Layout y espaciado`)*
- **ChipAccion:** Direction: `Horizontal` | Alineación: `Centro` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Comprimir` | Espaciado superior e inferior: `4` | Espaciado lateral: `8 y 12` | Espaciado interno: `4`

### Accesibilidad
Para garantizar una comunicación accesible, considera los siguientes criterios:
- No utilices la insignia como único medio para comunicar información importante.
- Uso del color: el significado de la insignia debe poder comprenderse a partir de sus colores, sin embargo, el contenido debe complementar el estado, categoría o característica que representa.
- Mantén una jerarquía visual clara: la insignia debe complementar el contenido principal sin competir con él.

---

## 3. Desarrollo

### Uso de insignias en tu proyecto
Las insignias son elementos visuales que permiten identificar estados, categorías o información relevante mediante colores, textos e iconos.

Para utilizarlas, agrega una clase de variante junto con una clase de color. El texto va directamente dentro de la insignia.

Están disponibles en cuatro variantes:
- `.insignia-borde` y `.insignia-borde-punto` — insignia con fondo claro, borde y texto de color, sin o con punto decorativo.
- `.insignia-solido` y `.insignia-solido-punto` — insignia con fondo sólido y texto contrastante, sin o con punto decorativo.

Todas las variantes están disponibles en ocho colores: `.insignia-informativo` (azul), `.insignia-exito` (verde), `.insignia-advertencia` (amarillo), `.insignia-error` (rojo), `.insignia-neutro` (gris), `.insignia-morado`, `.insignia-naranja` y `.insignia-guinda` (rosa). Las insignias tienen un ancho mínimo de 80 px y crecen según su texto.

El contenido de la insignia puede adaptarse al estado o información que se necesite representar.

### Insignias con borde y punto decorativo
Las insignias con borde utilizan un fondo claro, un punto y un borde del color seleccionado.

Para utilizarlas, agrega la clase `.insignia-borde-punto` junto con la clase de color correspondiente, por ejemplo `.insignia-exito`. El punto se genera con CSS, por lo que no necesitas agregar ningún elemento.

```html
<span class="insignia-borde-punto insignia-informativo" role="status">
  Recibido
</span>
<span class="insignia-borde-punto insignia-exito" role="status">
  Finalizado
</span>
<span class="insignia-borde-punto insignia-advertencia" role="status">
  Pendiente
</span>
<span class="insignia-borde-punto insignia-error" role="status">
  Error
</span>
<span class="insignia-borde-punto insignia-neutro" role="status">
  Inactivo
</span>
<span class="insignia-borde-punto insignia-morado" role="status">
  Turnado
</span>
<span class="insignia-borde-punto insignia-naranja" role="status">
  En revisión
</span>
<span class="insignia-borde-punto insignia-guinda" role="status">
  Observación
</span>
```

### Insignias con borde sin punto decorativo
Funcionan igual que la versión anterior; utiliza la clase `.insignia-borde` en lugar de `.insignia-borde-punto`.

```html
<span class="insignia-borde insignia-informativo" role="status">
  Recibido
</span>
<span class="insignia-borde insignia-exito" role="status">
  Finalizado
</span>
<span class="insignia-borde insignia-advertencia" role="status">
  Pendiente
</span>
<span class="insignia-borde insignia-error" role="status">
  Error
</span>
<span class="insignia-borde insignia-neutro" role="status">
  Inactivo
</span>
<span class="insignia-borde insignia-morado" role="status">
  Turnado
</span>
<span class="insignia-borde insignia-naranja" role="status">
  En revisión
</span>
<span class="insignia-borde insignia-guinda" role="status">
  Observación
</span>
```

### Insignias sólidas con punto decorativo
Utilizan un fondo sólido, un punto y un color de texto con contraste adecuado respecto al fondo.

Para utilizarlas, agrega la clase `.insignia-solido-punto` junto con la clase de color correspondiente, por ejemplo `.insignia-error`.

```html
<span class="insignia-solido-punto insignia-informativo" role="status">
  Recibido
</span>
<span class="insignia-solido-punto insignia-exito" role="status">
  Finalizado
</span>
<span class="insignia-solido-punto insignia-advertencia" role="status">
  Pendiente
</span>
<span class="insignia-solido-punto insignia-error" role="status">
  Error
</span>
<span class="insignia-solido-punto insignia-neutro" role="status">
  Inactivo
</span>
<span class="insignia-solido-punto insignia-morado" role="status">
  Turnado
</span>
<span class="insignia-solido-punto insignia-naranja" role="status">
  En revisión
</span>
<span class="insignia-solido-punto insignia-guinda" role="status">
  Observación
</span>
```

### Insignias sólidas sin punto decorativo
Funcionan igual que la versión anterior; utiliza la clase `.insignia-solido` en lugar de `.insignia-solido-punto`.

```html
<span class="insignia-solido insignia-informativo" role="status">
  Recibido
</span>
<span class="insignia-solido insignia-exito" role="status">
  Finalizado
</span>
<span class="insignia-solido insignia-advertencia" role="status">
  Pendiente
</span>
<span class="insignia-solido insignia-error" role="status">
  Error
</span>
<span class="insignia-solido insignia-neutro" role="status">
  Inactivo
</span>
<span class="insignia-solido insignia-morado" role="status">
  Turnado
</span>
<span class="insignia-solido insignia-naranja" role="status">
  En revisión
</span>
<span class="insignia-solido insignia-guinda" role="status">
  Observación
</span>
```

### Insignias con iconos
Permiten incorporar iconos en lugar del punto decorativo para complementar la información mostrada.

Para utilizar un icono de la biblioteca SND, colócalo dentro de una insignia sin punto (`.insignia-borde` o `.insignia-solido`), antes del texto.

Los iconos pueden utilizarse tanto en las insignias con borde como en las insignias sólidas.

```html
<span class="insignia-borde insignia-informativo" role="status">
  <i class="snd__icono snd-box" aria-hidden="true"></i>
  Recibido
</span>
<span class="insignia-solido insignia-exito" role="status">
  <i class="snd__icono snd-list" aria-hidden="true"></i>
  Finalizado
</span>
```

### Consideraciones de accesibilidad
Las insignias deben comunicar su significado mediante texto, sin depender únicamente del color o del icono utilizado.
- Utiliza textos descriptivos como `"Recibido"`, `"Finalizado"`, `"Pendiente"` o `"Error"`.
- El punto se genera con CSS y los lectores de pantalla no lo anuncian. Agrega `aria-hidden="true"` a los iconos cuando sean decorativos.
- Agrega `role="status"`, permite que los lectores de pantalla anuncien sutilmente la insignia o sus cambios de estado si el componente se actualiza dinámicamente en la interfaz.
- Verifica que el texto mantenga suficiente contraste con el fondo de la insignia.
- Utiliza las insignias para mostrar información. Si el elemento debe ejecutar una acción, utiliza un botón o enlace según corresponda.
- Cuando el estado cambie dinámicamente, asegúrate de que la actualización pueda ser comunicada a las tecnologías de asistencia cuando sea necesario.

### Uso de elementos decorativos
El punto o icono de una insignia se considera decorativo cuando el texto ya comunica toda la información necesaria. El punto no requiere atributos porque se genera con CSS; a los iconos agrégales `aria-hidden="true"`.

```html
<span class="insignia-borde-punto insignia-exito" role="status">
  Finalizado
</span>
<span class="insignia-solido-punto insignia-error" role="status">
  Error
</span>
```
