# P02 - Páginas Institucionales

## Identificación
* **ID:** `P02`
* **Sección:** Páginas Institucionales estáticas
* **Ruta:** Varias
* **Archivos relacionados:** `page-*.php` (ej. `page-directorio.php`).

## Estado actual
**IMPLEMENTADA**
* Páginas clásicas de WordPress que mezclan loops de contenido con contenedores Bootstrap.

## Elementos UI e Inventario

### `P02-COMP-001` - Contenedores Estructurales
* **SND:** Retícula Grid
* **Clases SND:** `.contenedor`
* **Correspondencia:** PARCIAL (Reemplazar Bootstrap `.container`).
* **Evidencia:** OFICIAL

### `P02-COMP-002` - Tablas de Datos (Directorio)
* **SND:** Tablas SND
* **Correspondencia:** NO DETERMINABLE (El HTML actual no ha sido inspeccionado, pero el SND documenta tablas en la Bandeja de Entrada).
* **Evidencia:** PDF/DOCUMENTACIÓN

### `P02-COMP-003` - Iconografía Estática
* **SND:** IBM Carbon SVGs
* **Clases SND:** N/A (Migrado a `<svg>` inline estandarizados).
* **Correspondencia:** EXACTA
* **Evidencia:** Script de migración en lote aplicado a `page-*.php` para erradicar las clases `bi-*`.

---

## Plan de implementación
*(Pendiente)*

## Historial
| Fecha | Acción | Responsable/IA | Resultado |
| ----- | ------ | -------------- | --------- |
| 2026-09-30 | Auditoría estricta de migración | Antigravity | ANALIZADA |
| 2026-10-01 | Reemplazo de clases Bootstrap por Grid SND | Antigravity | IMPLEMENTADA |
| 2026-10-01 | Reemplazo masivo de iconos Bootstrap (bi-*) por SVG en línea | Antigravity | IMPLEMENTADA |
