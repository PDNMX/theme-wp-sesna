# Sistema Nacional de Diseño (SND) – Componente: Selector de fechas (`datepicker`)

- **Fuente:** https://www.snd.gob.mx/componentes/selector-fecha
- **Título de la página:** Selector de fechas (datepicker) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Componente que permite seleccionar de forma rápida el día, mes, año, hora y minutos.

*(Nota del sitio oficial: esta página solo cuenta con las pestañas **Descripción** y **Diseño**; no tiene pestaña **Desarrollo** publicada.)*

---

## 1. Descripción

### Selector de fecha
Permiten seleccionar una fecha o un rango de fechas.  
Ejemplo de uso: agendar la cita de un trámite.

- **Día** *(imágenes: `Diferentes colores de los estatus`, `Ejemplo de calendario`, `Ejemplo de espacio para día`, `clave de disponibilidad`)*

### Selector de horario
Permiten seleccionar una hora específica.  
Ejemplo de uso: agendar la hora de la cita de un trámite.

**Importante:** Este componente corresponde a las interacciones y definiciones de los botones secundarios y el seleccionado al botón primario, consultar en [botones](./botones.md). *(imagen: `muestra los componetes que integran la funcionalidad de caledario y horario`)*

### Ejemplos de uso
*(Imágenes: `Ejemplo de calendario para citas`, `Ejemplo de calendario para citas responsivo`, `elementos que componen la fecha`)*

### Usos no permitidos
- Ejecutar funciones ajenas, como comandos o acciones no relacionadas.
- Mostrar mensajes poco claros o sin relación.
- Romper la coherencia visual del UI Kit, usando colores, tipografía o iconos distintos.

---

## 2. Diseño

### Anatomía (Selector de fecha e input)
*(Imágenes: 2 con alt `descripción puntual de los elementos del input date`)*
- **Componente Calendario:** Ancho: `343 px.`
- **Label:**
  - `*`: Color de texto: `Rojo 500` | Estilo de texto: `Base/Body/B1SB`
  - `Fecha`: Color de texto: `Neutro 800` | Estilo de texto: `Base/Body/B1SB`
  - `Opcional`: Color de texto: `Neutro 600` | Estilo de texto: `Caption/C1R`
  - `IC/help`: Depende de: `IC/help`
- **Caja:** Alto: `40 px.` | Ancho: `343 px.` | Alto máximo: `700 px.` | Ancho mínimo: `70 px.` | Color de fondo: `neutro - 100` | Peso del borde: `1 px.` | Radio del borde: `8px`
- **Etiqueta:** Estilo de texto: `Base/Body/B1R`
- **view 2:** Depende de: `IC/Calendar`
- **Atom/Calendario:** Color de fondo: `Neutro 100` | Radio de borde: `16 px.`
- **Mes:** Color de texto: `Neutro 800` | Alineación de texto: `Centrado.`
- **Chevron-left:** Depende de: `Chevron-left`
- **Chevron-right:** Depende de: `Chevron-right`
- **Tipografía:** Color de texto: `Neutro 700` | Altura: `32 px.` | Ancho: `32 px.`
- **Átomo/Día:** Color de texto: `Neutro 800` | Alineación de texto: `Centrado` | Depende de: `Átomo/Día`
- **Átomo/Día seleccionado:** Color de fondo: `azul - 500` | Color de texto: `neutro - 100` | Alineación de texto: `Centrado` | Depende de: `Átomo/Día`
- **Átomo/Día entre periodo:** Color de fondo: `azul - 100` | Alineación de texto: `Centrado` | Depende de: `Átomo/Día`

### Propiedades — Tamaño
- **Chico** *(imagen: `muestra de calendario desplegado con un día seleccionado`)*:
  - `Átomo/Calendario`: Sombra: `Drop LV 3 (0px 6px 12px 0px #000000)` | Ancho: `343 px.`
  - `Septiembre 2025`: Estilo de texto: `Base/Small details/SDSB`
  - `Atom/Dia`: Estado: `Default` | Tamaño: `chico` | Color: `Neutro 800`, `Presidencia guinda - 900`, `Presidencia verde - 900`
- **Grande** *(imagen: `muestra de calendario desplegado con un día seleccionado`)*:
  - `Átomo/Calendario`: Ancho: `525 px.`
  - `Septiembre 2025`: Estilo de texto: `Base/Body/B1SB`
  - `Atom/Dia`: Estado: `Por defecto / Inhabilitado / Seleccionado Entreperiodo / Disponibilidad Alta, Media o Baja Sin disponibilidad` | Tamaño: `Grande` | Color: `azul - 500`, `rojo - 100`, `naranja - 100`, `Presidencia - 100`

### Layout y espacios
- `Átomo/Calendario` *(imagen: `muestra de medidas de márgenes del calendario global`)*: Dirección: `Vertical` | Alineación: `Superior izquierda` | Cambio de tamaño vertical: `Ajustado al contenido` | Cambio de tamaño horizontal: `Fijo` | Espaciado entre elementos: `16 px.` | Espacio interno: `16 px.`
- `Mes` (bloque 1) *(imagen: `muestra la posición y proporciones del control de mes`)*: Dirección: `Horizontal` | Dirección: `Centro medio` | Dirección: `Fijo` | Cambio de tamaño horizontal: `Variable`
- `Mes` (bloque 2) *(imagen: `muestra la retícula de días y sus proporciones`)*: Dirección: `Vertical` | Dirección: `Superior izquierdo` | Cambio de tamaño vertical: `Ajustado al contenido` | Cambio de tamaño horizontal: `Variable`
- `Mes` (bloque 3) *(imagen: `muestra la retícula de días y su espaciado`)*: Dirección: `Horizontal` | Alineación: `Superior, espaciado igual` | Cambio de tamaño vertical: `Ajustado al contenido` | Cambio de tamaño horizontal: `Variable`

### Anatomía (Selector de horas)
*(Imágenes: `descripción de los botones para elegir horario`, 2 con alt `muestra de medidas de márgenes del control de horario`)*
- `SelectorHoras`: Ancho: `578 px.`
- `Jueves 5 de septiembre`: Color de texto: `Neutro 800` | Alineación de texto: `Centrado` | Estilo de texto: `Base/Subheading/SH1B`
- `Button`: Depende de: `Button` | Color de botón: `presidencia guinda - 900`, `presidencia verde - 900` | Icono derecho: `Inactivo` | Icono izquierdo: `Inactivo` | Jerarquía: `Secundario` | Estado: `Habilitado` | Tamaño: `Básico` | Modo: `Por defecto` | Estilo: `Por defecto`
- `SelectorHoras` (layout): Dirección: `Vertical` | Alineación: `Centro superior` | Cambio de tamaño vertical: `Ajustado al contenido` | Cambio de tamaño horizontal: `Fijo` | Espaciado entre elementos: `32 px.`
- `Horas` (layout): Dirección: `Horizontal, envoltura` | Alineación: `Izquierda superior` | Cambio de tamaño vertical: `Ajustado al contenido` | Cambio de tamaño horizontal: `Llenar contenedor` | Espaciado entre elementos horizontal: `16 px.` | Espaciado entre elementos vertical: `16 px.`
