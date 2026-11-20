# Sistema Nacional de Diseño (SND) – Componente: Notificación flotante (`toast`)

- **Fuente:** https://www.snd.gob.mx/componentes/toast
- **Título de la página:** Notificación flotante (toast) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Permite mostrar mensajes breves de confirmación, información, advertencia o error de forma temporal y no intrusiva.

---

## 1. Descripción

Elemento visual y textual que informa sobre el estado, resultado o progreso de una acción, proceso o sistema. Puede ser informativo, de advertencia, de éxito o de error.

*(Imagen: `Imagen de ejemplo`)*

- **No interrumpir la tarea:** La notificación flotante (toast) debe complementar la interacción sin bloquear el contenido ni requerir una acción para continuar. Evita utilizarlo para información crítica que necesite atención inmediata o una decisión de la persona usuaria.
- **Icono:** El icono debe ser de acuerdo al tipo de mensaje flotante, para interpretar confirmaciones, advertencias o errores.
- **Posición:** La notificación flotante debe aparecer centrada y a 32 px en el formato de escritorio o 16 px en el formato móvil.
- **Usar el enlace de texto dentro del mensaje:** Los enlaces de texto pueden incorporarse dentro de mensajes informativos. Como regla general, cuando el contexto lo requiera, pueden integrarse donde resulten útiles de acuerdo con la información.
- **Duración y extensión del mensaje:** El tiempo de visualización debe permitir leer y comprender el mensaje sin permanecer en pantalla más de lo necesario. La notificación flotante debe mostrarse durante un máximo de 10 segundos y su mensaje no debe superar los 80 caracteres.

El componente debe utilizarse para comunicar información breve y temporal. Para mensajes que requieran atención persistente o una acción de la persona usuaria, utiliza un componente más adecuado al contexto.

### Tipos
- **Éxito:** Indica que una acción se realizó correctamente o que un proceso llegó a un resultado esperado. Se utiliza para brindar una confirmación breve a la persona usuaria. La notificación flotante de éxito deberá usar siempre el ícono “Estatus/Check-circle”.
- **Informativo:** Comunica información relevante sobre una acción, proceso o cambio que la persona usuaria debe conocer. No implica que exista un error o que sea necesario realizar una acción adicional. La notificación flotante informativa deberá usar siempre el ícono “Estatus/information”.
- **Error:** Informa que una acción no pudo completarse o que ocurrió un problema durante un proceso. Debe utilizarse cuando el resultado requiere ser comunicado para que la persona usuaria pueda identificar lo sucedido. La notificación flotante de error deberá usar siempre el ícono “Estatus/Error”.
- **Advertencia:** Se utiliza para comunicar una situación que requiere atención, especialmente cuando una acción puede tener consecuencias o cuando existe una condición que la persona usuaria debe considerar. La notificación flotante de advertencia deberá usar siempre el ícono “Estatus/Warning”.

### Estados
- **Por defecto (default):** Estado sin interacción de la persona usuaria.
- **Enfocado (focus):** Estado que indica que la notificación flotante se ha enfocado mediante navegación con teclado.

### Variaciones
*(5 imágenes con alt `Variaciones`)*

### Ejemplos de uso
Las notificaciones flotantes deben colocarse centradas respecto al ancho total de la pantalla y mantener una separación de 32 px (Escritorio) y 16px (móvil) a partir del margen inferior del encabezado (Navbar). *(imagen: `Ejemplos de uso`)*

### Usos no permitidos
- No usar dos o más notificaciones emergentes juntas.
- No usar dos o más mensajes informativos juntos.
- No muestres información importante en notificaciones emergentes ya que será fácil de perder.
- Romper la coherencia visual del UI Kit, usando colores o formas distintas.
*(Imagen: `Usos no permitidos`)*

---

## 2. Diseño

### Anatomía
*(Imagen: `Anatomía`)*
- **Notificación flotante:** Ancho: `408` | Ancho mínimo: `327` | Ancho de borde: `1` | Radio de borde: `4` | Estilo de texto: `Drop LV 2`
- **Icono:** Estilo de texto: `Estatus/Check-circle`
- **Texto principal:** Estilo de texto: `Drop LV 2`
- **Botón de acción:** Color de texto: `rojo - 500`, `verde - 500`, `azul - 500`, `amarillo - 500` | Estilo de texto: `Noto Sans/Body/B1SUB`
- **Cerrar:** Depende de: `EEstatus/Close` | Color de texto: `neutro - 800`

### Construcción UI
*(Imágenes: `Construcción UI movil`, `Construcción UI`)*
- **Mensajes:** Dirección: `Horizontal` | Alineación: `Centro` | Re-dimensión vertical: `Ajustada` | Re-dimensión horizontal: `Ajustada` | Espaciado: `8` | Espaciado superior: `12` | Espaciado inferior: `12` | Espaciado lateral: `16` | Espaciado interno: `16`
- **Notificación flotante:** Dirección: `Vertical` | Alineación: `Superior izquierda` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Llenar` | Espaciado inferior: `4` | Espaciado: `8`

### Accesibilidad
Para garantizar que las notificaciones flotantes puedan ser entendidas por todas las personas usuarias:
- El estado no debe comunicarse únicamente mediante el color. Se deben utilizar iconos y texto para identificar claramente cada tipo.
- Los enlaces de texto deben ser accesibles mediante el teclado y contar con un estado de enfoque para cuando estén seleccionados.
- El contenido debe aumentar de tamaño cuando la persona amplíe la pantalla mediante el zoom o las opciones de accesibilidad del dispositivo.

---

## 3. Desarrollo

*(Nota del sitio oficial: al seleccionar la pestaña **Desarrollo** en `/componentes/toast`, la pestaña queda activa (`titularTabs__link active`) pero renderiza exactamente el mismo contenido de **Diseño** —Anatomía, Construcción UI y Accesibilidad—, sin código HTML/JS publicado todavía.)*
