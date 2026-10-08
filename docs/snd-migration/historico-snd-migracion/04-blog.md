# P04 - Blog / Noticias

## Identificación
* **ID:** `P04`
* **Sección:** Blog
* **Archivos relacionados:** `archive.php`, `single.php`.

## Estado actual
**MIGRADA**
* Se reemplazaron todas las referencias a Bootstrap (`container`, `row`, `col-lg-4`, etc.) por las equivalentes SND (`contenedor`, `fila`, `columna__*`) en `archive.php`, `single.php`, `template-parts/home/section-entradas.php` y `template-parts/home/card-entrada.php`.

## Elementos UI e Inventario

### `P04-COMP-001` - Tarjetas de Noticias
* **SND:** Tarjetas (Cards)
* **Correspondencia:** PARCIAL
* **Evidencia:** OFICIAL (PDF/DOCUMENTACIÓN)

---

## Plan de implementación
1. ~~Identificar plantillas (archive.php, single.php)~~.
2. ~~Localizar componentes y loops (`section-entradas.php`, `card-entrada.php`, `content/single.php`)~~.
3. ~~Reemplazar clases `.container` por `.contenedor`~~.
4. ~~Reemplazar clases `.row` por `.fila gap--24` (o similar según necesite)~~.
5. ~~Reemplazar clases `.col-*` por `.col-100 .columna__*`~~.
6. ~~Validar renderizado y responsividad~~.

## Historial
| Fecha | Acción | Responsable/IA | Resultado |
| ----- | ------ | -------------- | --------- |
| 2026-09-30 | Auditoría estricta de migración | Antigravity | ANALIZADA |
| 2026-10-01 | Migración completa a SND Guinda Grid | Antigravity | MIGRADA |
