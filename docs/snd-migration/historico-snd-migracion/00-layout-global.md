# P00 - Layout Global (Header, Footer, Funciones)

## Identificación
* **ID:** `P00`
* **Sección:** Layout Global
* **Ruta:** Todo el sitio
* **Archivos relacionados:** `header.php`, `footer.php`, `functions.php`
* **Componentes involucrados:** Header Institucional, Menú de Navegación, Buscador Modal, Footer.

## Estado actual
**IMPLEMENTADA**
* El `header.php` ha sido migrado al 100% a la estructura semántica de Gobierno (`<header class="header">`, `<section class="mexico">`, `<section class="subheader">`, `<details class="mexico__details">`). El menú se inyecta vía `wp_nav_menu` con un Walker personalizado (`SND_Subheader_Menu_Walker`). Se eliminó toda dependencia y clases de Bootstrap (`navbar`, `container`, etc).
* El buscador ha sido eliminado según indicaciones.
* El `footer.php` cuenta con la estructura SND original de 3 columnas (Escudo, Enlaces, Redes/079) en su totalidad.

## Elementos UI e Inventario

### `P00-COMP-001` - Contenedores principales (Grid)
* **SND:** Grid System
* **Clase SND:** `.contenedor`, `.fila`, `.columna__*`
* **Correspondencia:** EXACTA
* **Evidencia:** OFICIAL (`SND-GUINDA-CONTEXTO.md` - Sección 5)
* **Nota de resolución:** El CSS oficial del CDN definía `--MaxWidth` en 1416px. Se aplicó un override en `main.css` (`:root { --MaxWidth: 1440px !important; }`) para forzar la retícula estrictamente a 1440px tal cual lo dicta la documentación oficial PDF en su sección de *Componentes > Encabezado*.

### `P00-COMP-002` - Header Institucional
* **SND:** Header Institucional
* **Estructura HTML SND Prevista:** `<header class="header"><section class="mexico">...` y `<section class="subheader">`
* **Clases SND:** `.header`, `.mexico`, `.mexico__contenedor`, `.mexico__details`, `.subheader`, `.subheader__contenedor`.
* **Correspondencia:** EXACTA (Reemplazó al `<nav class="navbar...">` heredado).
* **Evidencia:** OFICIAL (PDF/DOCUMENTACIÓN)
* **Accesibilidad:** Requiere botón `.irContent` (Skip link) incluido correctamente.
* **Comportamiento JS:** Menú hamburguesa administrado por `snd-js.js` nativo del SND con atributo open manejado automáticamente.

### `P00-COMP-003` - Buscador (Reubicado)
* **SND:** Barra de Búsqueda
* **Estructura HTML SND Prevista:** Formulario `<form class="search-container">` integrado en layout.
* **Correspondencia:** ELIMINADA
* **Evidencia:** OFICIAL (PDF/DOCUMENTACIÓN)
* **Notas:** Por petición expresa del usuario para alinearse estrictamente al diseño, el componente de buscador global fue eliminado por completo tanto del Header como del Landing Page.

### `P00-COMP-004` - Footer
* **SND:** Pie de Página (Footer)
* **Estructura HTML SND Prevista:** `<footer class="footer">` con 3 columnas estandarizadas, incluyendo bloque `footer__colCentral`.
* **Correspondencia:** EXACTA (Migración completa con `footer__mexico`, `footer__enlaces` y `footer__redes`).
* **Evidencia:** OFICIAL (PDF/DOCUMENTACIÓN)

---

## Plan de implementación
**Completado (2026-09-30)**
* `header.php` reestructurado completamente con la clase `.mexico`, `.subheader` y `<form>` de búsqueda.
* `footer.php` reestructurado con las tres columnas estandarizadas y `.footer__colCentral`. Se eliminó el observer JS redundante.
* `functions.php` modificado para incluir `snd-guinda.css` y `snd-js.js`. Se conservó `gm/v3` y `gobmx.js` por dependencias pendientes.

## Decisiones arquitectónicas (P00)
* **jQuery:** Se conserva temporalmente `gobmx.js` (que provee jQuery) porque retirar este script rompería la interactividad en páginas no migradas (ej. Directorio, Home). (DECISIÓN PENDIENTE: Migrar o separar jQuery en fase final).
* **Walker de Menú:** Se inyectó `wp_nav_menu` directamente sin el Walker de Bootstrap. Esto causará que temporalmente el menú renderice la estructura estándar de WordPress (`<ul><li>`) en lugar de la esperada por el subheader.

## Problemas descubiertos (Resueltos)
* **P00 (Walker):** Se implementó un nuevo Walker PHP `SND_Guinda_Menu_Walker` para la navegación principal SND, junto con el filtro `items_wrap` para asegurar el cumplimiento HTML.
* **Global (Layout roto):** La inyección de `snd-guinda.css` resetea globalmente `html` y `body`, quebrando temporalmente el diseño de las páginas no migradas (P01-P04) dependientes de Bootstrap. Este es un comportamiento esperado en una migración incremental, resuelto conforme avanzaron las fases.

## Archivos que serán modificados
* `header.php`: Para inyectar el HTML oficial del Header SND y remover Bootstrap nav.
* `footer.php`: Para inyectar el HTML oficial del Footer SND de 3 columnas y remover JS obsoleto.
* `functions.php`: Para manipular los *enqueues* de CSS/JS (Sustituir gm/v3 por snd-guinda).

## Archivos que NO deben modificarse
* Cualquier archivo fuera del alcance de este layout (ej. `front-page.php`) hasta que se analicen sus impactos por la remoción del CSS antiguo.

## Riesgos
* **Ruptura de Menús:** Al remover el Walker de Bootstrap, el `wp_nav_menu` generará un HTML que no coincide con `.mexico__detailsCont`. Se requerirá un nuevo Walker PHP.
* **Remoción prematura de JS:** Remover `gobmx.js` del `functions.php` en esta etapa puede quebrar otras páginas. Se recomienda cargar ambos JS temporalmente o condicionar la carga de SND.

## Validación
* [ ] HTML
* [ ] CSS
* [ ] JavaScript
* [ ] responsive
* [ ] accesibilidad
* [ ] funcionalidad
* [ ] integración SND

## Historial
| Fecha | Acción | Responsable/IA | Resultado |
| ----- | ------ | -------------- | --------- |
| 2026-09-30 | Auditoría estricta de migración | Antigravity | ANALIZADA |
| 2026-10-01 | Implementación de Walker PHP y fix wp_nav_menu | Antigravity | IMPLEMENTADA |
