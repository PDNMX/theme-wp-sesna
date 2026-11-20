# Sistema Nacional de Diseño (SND) – Componente: Tabla (`table`)

- **Fuente:** https://www.snd.gob.mx/componentes/tabla
- **Título de la página:** Tablas (tables) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Organiza datos en filas y columnas para mostrarlos de forma eficiente. También permite la personalización con funciones adicionales.

*(Nota del sitio oficial: esta página solo cuenta con las pestañas **Descripción** y **Diseño**; no tiene pestaña **Desarrollo** publicada.)*

---

## 1. Descripción

### Tabla estática - simple
Muestran un conjunto fijo de datos sin interacción por parte de la persona usuaria. Son adecuadas para contenidos breves o datos que no requieren filtrado, ordenamiento ni paginación.
- Versión escritorio *(imágenes: `Tabla estática simple versión escritorio`, `Tabla estática simple versión escritorio sin resultados`, `Tabla estática simple versión escritorio inicio de trámite`)*
- Versión móvil *(imágenes: `Tabla estática simple versión móvil`, `Tabla estática simple versión móvil sin resultados`, `Tabla estática simple versión móvil inicio de trámite`)*

### Tabla con filtros
Muestran un conjunto de datos para seleccionar y ejecutar diversas acciones.. Son adecuadas para contenidos breves o datos que requieren filtrado, ordenamiento o paginación.
- Versión escritorio *(imagen: `Tabla con filtros versión escritorio`)*
- Versión móvil *(imagen: `Tabla con filtros versión móvil`)*

### Filtros
Permiten cambiar los datos visibles dentro de una tabla. Existen varios tipos: selección de rango de fechas para elegir periodos; casillas de verificación para seleccionar categorías o botones para ejecutar diversas acciones.
- Versión escritorio *(imágenes: `Filtros para selección de rango de fechas`, `Filtros de casillas de verificación para seleccionar categorías`, `Filtros botones para ejecutar diversas acciones`)*
- Versión móvil *(imagen: `Filtros versión móvil`)*

### Acciones
- **Ver:** el paso en cursor.
- **Más:** pasos que no pudieron completarse correctamente.
- **Vista Previa:** pasos aún no iniciados.
- **Editar:** pasos que requieren atención o corrección.
- **Eliminar:** pasos ya finalizados.
- **Revisar:** pasos que se están ejecutando pero aún no han finalizado.
- **Descargar:** pasos que se están ejecutando pero aún no han finalizado.
- **Sin acciones:** pasos que se están ejecutando pero aún no han finalizado.

### Ejemplos de uso
Localizar un servicio en el buscador de trámites federales y programas sociales. *(imágenes: `ejemplo de tabla de datos versión escritorio`, `ejemplo de tabla de datos versión móvil`)*

### Usos no permitidos
- Ejecutar funciones ajenas, como comandos o acciones no relacionadas.
- Mostrar mensajes poco claros o sin relación.
- Romper la coherencia visual del UI Kit, usando colores, tipografía o iconos distintos.
*(Imágenes: `Usos no permitidos ejemplo número uno`, `Usos no permitidos ejemplo número dos`, `Usos no permitidos ejemplo número tres`)*

### Reglas de implementación
Las tablas deben de utilizarse en una posición que puedan visualizarse adecuadamente en cualquier tipo de dispositivo. Las interacciones deben permitir al usuario poder visualizar la información de forma rápida y ejecutar diversas acciones.
- **Rapidez y eficiencia:** Los usuarios pueden ver lo que necesitan en segundos, sin perder tiempo buscando manualmente.
- **Mejora la experiencia:** Al ofrecer un acceso fácil y directo a la información, se reduce la frustración y se mejora la satisfacción dla persona usuaria.
- **Accesibilidad:** Facilita la navegación para todo tipo de usuarios, incluyendo aquellos con limitaciones o menos familiarizados con el sitio.\n*(Imagen: `Ejemplo de reglas de implementación en tabla de datos`)*

---

## 2. Diseño

### Tabla estática - simple — Anatomía
*(Imagen: `Anatomía de tabla estática simple versión escritorio`)*
- `Tabla Base` Depende de: `AtomosTabla`
- `Casilla de verificación`: Ancho: `40` | Ancho máximo: `110`
- `Texto`: Color de texto: `neutro - 800` | Estilo de texto: `Body/Regular`
- `Fila 1` Depende de `AtomosTabla`: Flechas: `Activo` | Texto: `Activo`
- `Columna 1`: Ancho mínimo: `110`
- `Insignia/estatus`: Ancho máximo: `180` | Ancho mínimo: `110`
- `Fila 6` Depende de: `AtomosTabla`: Texto: `Activo` | Flechas: `Inactivo` | Tipo: `Icono`
- `Acciones`: Ancho máximo: `110`

### Filtros — Anatomía
*(Imágenes: `Anatomía de los filtros de la tabla de datos`, `Desplegable de opciones de la tabla de datos`, `Selección de filtros de la tabla de datos`)*
- `Contenedor`: Ancho: `813` | Color de fondo: `neutro - 100` | Color de borde: `neutro - 400` | Ancho de borde: `1` | Radio de borde: `16` | Sombra paralela: `Drop LV 1(0px 2px 4px 0px #000000)`
- `Título`: Color de texto: `neutro - 800` | Estilo de texto: `Heading/H3 Semibold`
- `Descripción`: Color de texto: `neutro - 800` | Estilo de texto: `Body/Regular`
- `Botón`: Depende de: `Button` | Icono Izquierdo: `false` | Icono derecho: `false` | Jerarquia: `Primario` | Estado: `Por defecto (Default)` | Tamaño: `Normal`
- `Divisor`: Depende de: `Divider` | Contraste: `Bajo` | Orientación: `Horizontal`
- `Campo de entrada base`: Depende de: `Input base` | Icono de dictaminación: `Inactivo` | Mostrar “Obligatorio”: `Inactivo` | Texto de ayuda: `Inactivo` | Icono Ayuda: `Inactivo` | Icono derecho: `Inactivo` | Mostrar “Optional”: `Inactivo` | Estado: `Por defecto (Default)`
- `Barra de busqueda`: Depende de: `Barra de Busqueda` | Tipo: `Campo de entrada` | Pantalla: `Móvil` | Estado: `Por defecto (Default)`
- `Botón`: Depende de: `Button` | Icono Izquierdo: `Inactivo` | Icono derecho: `Inactivo` | Jerarquia: `Secundario` | Estado: `Por defecto (Default)` | Tamaño: `Normal`
- `ChipAccion 01`: Depende de: `ChipAccion` | Icono Izquierdo: `Inactivo` | Icono derecho: `Activo` | Estado: `Activo`
- `ChipAccion 02`: Depende de: `ChipAccion` | Icono Izquierdo: `Inactivo` | Icono derecho: `Activo` | Estado: `Por defecto (Default)`
- `Botón`: Depende de: `Button` | Icono Izquierdo: `Inactivo` | Icono derecho: `Activo` | Jerarquia: `Fantasma (Ghost)` | Estado: `Por defecto (Default)` | Tamaño: `Normal`
- `Contenedor` (desplegable): Color de fondo: `neutro - 100`
- `Desplegable`: Depende de: `Dropatom` | Icono derecho: `Inactivo` | Icono Izquierdo: `Activo` | Estado: `Por defecto (Default)`
- `Filtros` (panel): Color de fondo: `neutro - 100` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900` | Ancho de borde: `1` | Radio de borde: `16` | Sombra paralela: `Drop LV 1(0px 2px 4px 0px #000000)`
- `Casilla de verificación`: Depende de: `Check box` | Estado: `Apagado`
- `Divisor`: Depende de: `Divider`
- `Botón` (Primario): Depende de: `Button` | Icono Izquierdo: `Inactivo` | Icono derecho: `Inactivo` | Jerarquia: `Primario` | Estado: `Inactivo` | Tamaño: `Básico` | Modo: `Por defecto (Default)` | Estilo: `Por defecto (Default)`
- `Botón` (Secundario): Depende de: `Button` | Icono Izquierdo: `Inactivo` | Icono derecho: `Inactivo` | Jerarquia: `Secundario` | Estado: `Inactivo` | Tamaño: `Básico` | Modo: `Por defecto (Default)` | Estilo: `Por defecto (Default)`

### Construcción de UI

#### Tabla base
*(Imágenes: `Construcción de UI tabla base`, `Construcción de UI tabla base con opción de checkbox`, `Construcción de UI tabla base construción de columna`, `Construcción de UI título con ordenamiento`, `Construcción de UI título`, `Construcción de UI tabla columna con insignias`, `Construcción de UI título tabla con insignia`, `Construcción de UI pildora`, `Construcción de UI tabla columna acciones`, `Construcción de UI título tabla con acciones`, `Construcción de UI icono acción`)*
- `TablaBase`: Dirección: `Vertical` | Alineación: `Centro superior` | Re-dimensión vertical: `Comprimir` | Re-dimensión Horizontal: `Ajustado` | Espaciado: `8`
- `Atomos/Tabla` (checkbox): Dirección: `Horizontal` | Alineación: `Medio izquierdo` | Re-dimensión vertical: `Ajustado` | Re-dimensión Horizontal: `Ajustado` | Espaciado: `4` | Espaciado interno: `12`
- `Columna1`: Dirección: `Vertical` | Alineación: `Centro superior` | Re-dimensión vertical: `Comprimir` | Re-dimensión Horizontal: `Ajustado`
- `Atomos/Tabla` (ordenamiento): Dirección: `Horizontal` | Alineación: `Medio izquierdo` | Re-dimensión vertical: `Ajustado` | Re-dimensión horizontal: `Ajustado` | Espaciado interno: `12`
- `Atomos/Tabla` (título): Dirección: `Horizontal` | Alineación: `Medio izquierdo` | Re-dimensión vertical: `Ajustado` | Re-dimensión horizontal: `Ajustado` | Espaciado: `8` | Espaciado interno: `12`
- `Insignias`: Dirección: `Vertical` | Alineación: `Superior izquierdo` | Re-dimensión vertical: `Comprimir` | Re-dimensión Horizontal: `Llenar`
- `Atomos/Tabla` (título insignia): Dirección: `Horizontal` | Alineación: `Middle, spaced equally` | Vertical resizing: `Fixed` | Horizontal resizing: `Fill` | Padding: `12`
- `Atomos/Tabla` (píldora): Dirección: `Horizontal` | Alineación: `Medio izquierdo` | Re-dimensión vertical: `Llenar` | Re-dimensión horizontal: `Llenar` | Espaciado interno: `12`
- `Acciones`: Dirección: `Vertical` | Alineación: `Medio izquierdo` | Re-dimensión vertical: `Ajustado` | Re-dimensión horizontal: `Ajustado`
- `Atomos/Tabla` (título acciones): Dirección: `Horizontal` | Alineación: `Medio izquierdo` | Re-dimensión vertical: `Llenar` | Re-dimensión horizontal: `Llenar` | Espaciado interno: `12`
- `Atomos/Tabla` (icono acción): Dirección: `Horizontal` | Alineación: `Centro` | Re-dimensión vertical: `Ajustado` | Re-dimensión horizontal: `Llenar` | Espaciado: `8` | Espaciado interno: `4`

#### Filtros
*(Imágenes: `Construcción de UI tabla filtros`, `Construcción de UI filtros`)*
- `TablaFiltros`: Dirección: `Vertical` | Alineación: `Superior izquierdo` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Llenar` | Espaciado: `24` | Espaciado interno: `24`
- `Filtros`: Dirección: `Horizontal` | Alineación: `Centro derecho` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Llenar` | Espaciado: `16`
