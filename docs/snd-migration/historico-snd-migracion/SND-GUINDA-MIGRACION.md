> **Documento histórico — superado.** Este era el tracker de progreso de la rama
> `snd-migracion`. `snd-dev` usa `docs/snd-migration/ESTADO-MIGRACION-SND.md` como
> fuente de verdad única. Se conserva aquí como referencia del trabajo original.

# Plan de Migración a SND GUINDA - Proyecto SESNA V2

Este archivo es la **fuente de verdad del estado de la migración del proyecto** hacia el estándar definido en `SND-GUINDA-CONTEXTO.md`.

## Estado general

* **Fecha de inicio:** 2026-09-30
* **Estado actual:** PLANIFICACIÓN E INVENTARIO (Fase 1)
* **Porcentaje aproximado:** NO DETERMINABLE
* **Páginas totales:** DESCONOCIDO (Múltiples plantillas dinámicas)
* **Páginas analizadas:** 100% (estructural)
* **Páginas migradas:** 0
* **Páginas pendientes:** Todas

---

## Arquitectura del proyecto actual

* **Framework:** WordPress.
* **Estructura:** Tema custom (`sesna-v2`) basado en plantillas PHP clásicas (`front-page.php`, `page-*.php`, `template-*.php`).
* **Layouts:** `header.php` y `footer.php` encapsulan la estructura global.
* **Componentes:** Separados en `template-parts/`.
* **CSS:** Mezcla de Bootstrap 5, framework institucional `gm/v3`, y CSS propio (`main.css`).
* **JavaScript:** Usa `gobmx.js` (incluye jQuery/Bootstrap) y scripts propios (`script/*.js`).

---

## Inventario de páginas

| ID | Página | Ruta/Archivo | Estado | Documento |
| -- | ------ | ------------ | ------ | --------- |
| `P00` | Layout Global | `header.php`, `footer.php`, `functions.php` | IMPLEMENTADA | `docs/migracion/00-layout-global.md` |
| `P01` | Inicio (Home) | `front-page.php`, `template-parts/home/*` | IMPLEMENTADA | `docs/migracion/01-home.md` |
| `P02` | Institucionales | `page-*.php` | IMPLEMENTADA | `docs/migracion/02-institucionales.md` |
| `P03` | Transparencia | `template-transparencia-*.php`| IMPLEMENTADA | `docs/migracion/03-transparencia.md` |
| `P04` | Blog / Noticias | `archive.php`, `single.php` | IMPLEMENTADA | `docs/migracion/04-blog.md` |

---

## Inventario de componentes y mapeo contra SND

| ID | Componente Actual | Archivo | Equivalente SND GUINDA | Estado Correspondencia |
| -- | ----------------- | ------- | ---------------------- | ---------------------- |
| `C01` | Navbar Superior | `header.php` | `Header Institucional (.mexico)` | IMPLEMENTADA |
| `C02` | Menú Navegación | `header.php` | `Subheader (Navbar)` | IMPLEMENTADA |
| `C03` | Buscador Integrado | `header.php` | `Barra de Búsqueda` | ELIMINADO |
| `C04` | Footer global | `footer.php` | `Pie de Página (Footer)` | IMPLEMENTADA |
| `C05` | Iconos Bootstrap | Varios | `Íconos IBM Carbon` | IMPLEMENTADA |

---

## Dependencias Globales

* **SND GUINDA Requeridas:**
  * `snd-guinda.css` (OFICIAL)
  * `snd-js.js` (OFICIAL)
* **Relación con Bootstrap:** Se preservó temporalmente Bootstrap 5 JS vía CDN para mantener operativos los modales (`data-bs-toggle`), sin embargo, su CSS ya no interviene.
* **Relación con gm/v3:** Eliminado por completo (tanto CSS como JS).
* **Relación con gobmx.js:** Eliminado por completo. Los scripts locales fueron enrutados para depender de `jquery` nativo de WordPress.

---

## Auditoría de `functions.php`

El archivo `functions.php` encola los siguientes recursos. Decisiones justificadas:

| Recurso Encolado | Propósito / Dependencias | Decisión | Justificación |
| ---------------- | ------------------------ | -------- | ------------- |
| `assets/css/main.css` | CSS principal del tema. | **INVESTIGAR** | Podría tener estilos que no choquen, pero requiere limpieza profunda. |
| `gm/v3/assets/styles/main.css` | Framework GOB.mx obsoleto. | **ELIMINADO** | Sustituido por SND Guinda. |
| `bootstrap-icons.min.css` | Iconografía de UI. | **ELIMINADO** | Limpieza requerida. |
| `gobmx-accesibilidad.min.css` | Barra lateral derecha A11y. | **CONSERVAR** | Es un componente externo oficial que suele mantenerse. |
| `gm/v3/assets/js/gobmx.js` | Core JS antiguo. | **ELIMINADO** | Dependencias re-enrutadas a `jquery` nativo de WP y Bootstrap 5 CDN JS. |
| `gobmx-accesibilidad.min.js` | Script de accesibilidad. | **CONSERVAR** | |
| `assets/js/main.js` | Script global del tema. | **INVESTIGAR** | Depende de `gobmx.js`. |
| `script/accesibilidad-patch.js` | Parche custom. | **INVESTIGAR** | |
| `script/*.js` (Varios) | Scripts por página. | **INVESTIGAR** | Podrían depender de jQuery o Bootstrap JS (ej. modales, carrusel). |

---

## Auditoría de `main.css`

* **Tamaño:** 153KB.
* **Propósito:** Estilos customizados para el tema `sesna-v2`.
* **Áreas afectadas:** Todo el sitio. Sobrescribe comportamientos de Bootstrap y `gm/v3`.
* **Posibles conflictos:** Si contiene reglas como `html { ... }`, `body { ... }` o `a { ... }`, chocará destructivamente con `snd-guinda.css`.

---

## Auditoría de JavaScript Local (`script/`)

| Archivo | Función probable | Dependencia esperada | Comportamiento post-migración |
| ------- | ---------------- | -------------------- | ----------------------------- |
| `home.js` / `home-entries.js` | Lógica de la portada (carruseles, tabs). | jQuery / Bootstrap | **INVESTIGAR:** SND no provee carrusel nativo. |
| `directorio.js` | Filtros de tabla/directorio. | jQuery | Conservar lógica de filtrado. |
| `transparencia.js` | Filtros/Tabs de archivos. | jQuery | Conservar lógica. |
| `header.js` | Animaciones de scroll o modal. | Bootstrap Modal | **REEMPLAZAR:** SND maneja el header sin JS custom para layouts básicos. |

---

## Decisiones arquitectónicas y Reglas de Migración

1. **Orden de implementación:** `P00` -> `P01` -> `P02` -> `P04` -> `P03`.
2. **Activación del SND:** `snd-guinda.css` y `snd-js.js` NO se activarán hasta que `P00` (Layout Global) esté en fase de implementación.
3. **Mapeo de Grid (OFICIAL):** 
   * Bootstrap `.container` → SND `.contenedor` (o variantes).
   * Bootstrap `.row` → SND `.fila`.
   * Bootstrap `.col-*` → SND `.columna__*`.
4. **Protección:** No eliminar `gobmx.js` hasta que todos los scripts de `/script/` hayan sido refactorizados para usar JS Vanilla o dependencias aisladas.

---

## Riesgos

1. **Destrucción visual masiva:** Introducir el SND TEMA GUINDA romperá todas las páginas que aún dependan de Bootstrap si se hace de golpe.
2. **Dependencias JS ocultas:** Muchos plugins de WordPress asumen que jQuery existe.

## Archivos que podrán modificarse

* `header.php`, `footer.php`, `functions.php` (en P00).
* `front-page.php` y `template-parts/home/*` (en P01).

## Archivos que NO deberán modificarse sin justificación

* Core de WordPress.
* Archivos fuera de la carpeta del tema `sesna-v2`.
* Plugins de terceros.

---

## Historial de cambios

| Fecha | Acción | Responsable/IA | Resultado |
| ----- | ------ | -------------- | --------- |
| 2026-09-30 | Creación de plan maestro (Fase 1) | Antigravity | COMPLETADO |
| 2026-09-30 | Implementación de Fase P00 | Antigravity | IMPLEMENTADA |
| 2026-09-30 | Implementación de Fase P01 | Antigravity | IMPLEMENTADA |
| 2026-10-01 | Implementación de Fase P02 | Antigravity | IMPLEMENTADA |
| 2026-10-01 | Desacoplamiento de dependencias GOBMX v3 | Antigravity | COMPLETADO |
| 2026-10-01 | Implementación de Fase P03 | Antigravity | IMPLEMENTADA |
