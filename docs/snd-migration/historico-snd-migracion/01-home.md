# P01 - Inicio (Home)

## Identificación
* **ID:** `P01`
* **Sección:** Página Principal
* **Ruta:** `/`
* **Archivos relacionados:** `front-page.php`, `template-parts/home/*.php`.

## Estado actual
**IMPLEMENTADA**
* Archivo modular (`front-page.php`) que llama a múltiples parciales (`banner`, `carousel`, `section-sna`, etc.).
* Utiliza una clase global `.front-page-bg` y clases de Bootstrap como `.container pb-5` para el loop principal.

## Elementos UI e Inventario

### `P01-COMP-001` - Estructura de Layout (Grid)
* **SND:** Retícula Grid
* **Clases SND:** `.contenedor`, `.fila`, `.columna__*`
* **Correspondencia:** PARCIAL (Actualmente usa `.container` y `.row` de Bootstrap).
* **Evidencia:** OFICIAL (`SND-GUINDA-CONTEXTO.md` - Sección 5).

### `P01-COMP-002` - Carrusel / Banner
* **SND:** Banner
* **Correspondencia:** PARCIAL
* **Evidencia:** PDF/DOCUMENTACIÓN
* **Nota:** El SND provee diseño estático para banners. Si el carrusel requiere interactividad, deberá construirse a medida usando JS vanilla. (INFERIDO).

### `P01-COMP-003` - Secciones Informativas (Noticias, Programas)
* **SND:** Tarjetas (Cards)
* **Correspondencia:** PARCIAL
* **Evidencia:** PDF/DOCUMENTACIÓN

---

## Plan de implementación
**Completado (2026-09-30)**
* `front-page.php`: Reemplazo de `.container pb-5` por `.contenedor pb--56`.
* `section-sna.php`: Reemplazo de clases estructurales (`.container` -> `.contenedor`, `.row` -> `.fila`, `.col-md-5` -> `.columna__5--md`, `.col-md-7` -> `.columna__7--md`). Se actualizaron clases de espaciado según escala SND (`.py--56`, `.my--32`, `.mb--24`).
* `section-integrantes.php`: Reemplazo de `.container` a `.contenedor`, `.row` a `.fila`, `.g-4` a `.gap--24`. Columnas actualizadas (`.columna__4--lg`, `.columna__6--md`).
* `section-programas.php`: Mismas sustituciones estructurales, actualización de espaciados (`.py--56`, `.mb--48`, `.pt--32`).
* `section-noticias.php`: Migración completa del Grid Bootstrap al Grid SND (`.contenedor`, `.fila`, `.columna__4--lg`, etc.). Reemplazo de `col-12` por `col-100`.
* `carousel.php`: Reemplazo de `container-fluid px-0` por `contenedor--fluido p--0`. Las clases estructurales de Bootstrap del carrusel (`carousel slide`, `carousel-inner`, etc.) **SE CONSERVARON** por dependencia del JS fallback integrado, como se previó en el análisis inicial.

## Decisiones arquitectónicas (P01)
* **Iconos Bootstrap (bi-*)**: Se han conservado temporalmente los íconos de Bootstrap. Dado que SND carga iconografía asíncrona de IBM Carbon, se requerirá una fase de saneamiento de iconografía más adelante para evitar la carga de SVGs incorrectos.
* **Carrusel**: Se conserva la lógica Bootstrap para no romper el comportamiento interactivo (SND solo ofrece Banners estáticos).

## Archivos que serán modificados
* `front-page.php` y parciales.

## Archivos que NO deben modificarse
* Cualquier script global hasta que se audite su uso.

## Riesgos
* Posible ruptura visual si `main.css` tiene reglas atadas a `.container`.

## Validación
* [ ] HTML
* [ ] CSS
* [ ] JavaScript
* [ ] responsive
* [ ] accesibilidad

## Historial
| Fecha | Acción | Responsable/IA | Resultado |
| ----- | ------ | -------------- | --------- |
| 2026-09-30 | Auditoría estricta de migración | Antigravity | ANALIZADA |
| 2026-09-30 | Implementación de P01 | Antigravity | IMPLEMENTADA |
