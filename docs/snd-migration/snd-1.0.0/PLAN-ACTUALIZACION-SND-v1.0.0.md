# Plan y Análisis Cruzado de Actualización a SND v1.0.0 — Proyecto SESNA (`sesna-v2`)

- **Rama de trabajo:** `snd-v1-0-0-dev` (creada a partir de `snd-dev`)
- **Versión objetivo del SND:** `v1.0.0` (publicada el `01/11/2026` en https://www.snd.gob.mx/)
- **Versión previa en el tema:** `v1.1.0` (implementación manual con `snd-guinda.css` + `snd.js` y HTML estático para header/footer)
- **Ubicación del catálogo oficial completo (31 archivos `.md`):** `docs/snd-migration/snd-1.0.0/` (ver índice en [README.md](./README.md))

---

## 0. Instrucciones de Contexto para Agentes de IA y Desarrolladores

> **¡IMPORTANTE PARA CUALQUIER MODELO DE IA O DESARROLLADOR QUE RETOMA ESTE PROYECTO!**
>
> 1. **Todos los 31 documentos oficiales del SND v1.0.0 están respaldados localmente en `docs/snd-migration/snd-1.0.0/`.**
>    - **NUNCA elimines ningún archivo `.md` de `docs/snd-migration/snd-1.0.0/`**, incluso si un componente está marcado en este documento como *"No requerido actualmente"*.
>    - Esos archivos constituyen la biblioteca de referencia local completa del Sistema Nacional de Diseño (5 Estilos, 22 Componentes, Plantilla Llave MX, Guía de Comenzar y Guía de Migración) y deben permanecer siempre disponibles por si en el futuro el portal de SESNA incorpora nuevos módulos, formularios o integraciones.
> 2. **Antes de modificar o crear cualquier componente UI en `sesna-v2/`**, lee siempre el archivo `.md` correspondiente dentro de `docs/snd-migration/snd-1.0.0/componentes/` o `docs/snd-migration/snd-1.0.0/estilos/` para usar las clases, atributos ARIA y estructura HTML exactos del estándar oficial.
> 3. **Naturaleza del proyecto:** `sesna-v2` es el tema WordPress del portal institucional público de la **Secretaría Ejecutiva del Sistema Nacional Anticorrupción (SESNA)**. Es un sitio informativo, documental y de transparencia ciudadana (no una ventanilla transaccional con inicio de sesión).
> 4. **Regla de commits en Git:** Los commits en esta rama deben registrarse exclusivamente con el autor configurado en Git local del propietario del repositorio, sin agregar firmas `Co-authored-by` ni menciones a asistentes de IA.
>
> 5. **Clases del SND:** usa siempre las clases oficiales del SND v1.0.0 (`.boton__*`, `.sh1b`, `.b1r`, `.h2b`, `.mensajeInformativo`, `.insignia-*`, `.pildora`, `.divisor`, `.columna__*`, `.reticulaGrid__12`, utilidades `mb--`/`p--`/`muestra--`…). Verifica que existan en `https://framework-gb.cdn.gob.mx/snd/v1/snd-guinda.css` antes de inventar una. **No redefinas ni sobrescribas clases del SND**; si falta algo, crea una clase propia con prefijo `sesna-` o ajusta con variables CSS.
> 6. **Estilos y scripts:** no agregues `!important` nuevos, estilos en línea (`style="…"`), `<script>` inline ni utilidades de Bootstrap (`rounded-4`, `p-4`, `shadow-sm`…).
> 7. **Intocables:** los `<svg data-snd-procesado="true">` (`sesna_render_snd_svg_icon()`), las imágenes de `/img`, y todo `href`, `data-pdf-url`, `data-modal-target` y ruta de PDF/XLSX/DOCX.
> 8. **Orden de lectura sugerido:** esta sección 0 → sección 6 (cómo está construido el tema y cómo trabajar) → sección 7 (qué sigue) → y solo entonces `componentes/` y `estilos/`.

---

## 1. Resumen Ejecutivo y Matriz de Clasificación

El cambio de la implementación previa (`v1.1.0`) a la versión oficial actual **`v1.0.0` (`01/11/2026`)** del SND introduce dos transformaciones principales:
1. **Arquitectura centralizada mediante `carga.js` y Web Components (`<snd-header>` y `<snd-footer>`):** Ya no se enlazan archivos `.css` y `.js` sueltos ni se escribe a mano el HTML del encabezado y pie de página de `gob.mx`.
2. **Publicación del código oficial (pestaña *Desarrollo*) de componentes que antes solo tenían diseño en Figma:** Componentes como *Mensajes informativos*, *Mensajes emergentes (v2)*, *Divisor*, *Insignias*, *Píldoras (Chips)*, *Texturas*, *Barra de progreso*, *Carga de archivos*, *Interruptor*, *Radio botones* y *Casillas de verificación* ahora cuentan con clases CSS/JS oficiales en el bundle del SND.

### Matriz General de los 31 Documentos de `docs/snd-migration/snd-1.0.0/`

| Archivo de Documentación Local | Elemento SND v1.0.0 | Clasificación en `sesna-v2` | Estado / Acción |
| :--- | :--- | :--- | :--- |
| [README.md](./README.md) | Índice y Portada (`/`) | Referencia general | Conservar como mapa maestro |
| [snd-comenzar.md](./snd-comenzar.md) | Cargador `carga.js` y Plantilla Base | **Nivel 1: Arquitectónico** | **Implementar en Etapa 1** |
| [snd-migracion.md](./snd-migracion.md) | Guía de Migración (`/migracion`) | Referencia normativa | Conservar y seguir lineamientos |
| [componentes/header.md](./componentes/header.md) | Encabezado (`<snd-header>`) | **Nivel 1: Arquitectónico** | **Implementar en Etapa 1** |
| [componentes/footer.md](./componentes/footer.md) | Pie de página (`<snd-footer>`) | **Nivel 1: Arquitectónico** | **Implementar en Etapa 1** |
| [componentes/barra-navegacion.md](./componentes/barra-navegacion.md) | Barra de navegación (`.subheader`) | **Nivel 1: Arquitectónico** | **Ajustar convivencia en Etapa 1** |
| [componentes/mensajes-informativos.md](./componentes/mensajes-informativos.md) | Mensajes informativos (`.mensajeInformativo`) | **Nivel 2: Homologación UI** | **Migrar en Etapa 2.1** (reemplaza `.aviso`) |
| [componentes/mensajes-emergentes.md](./componentes/mensajes-emergentes.md) | Mensajes emergentes v2 (`data-mensaje-emergente`) | **Nivel 2: Homologación UI** | **Migrar en Etapa 2.2** (reemplaza `.tooltip__*` v1) |
| [componentes/divisor.md](./componentes/divisor.md) | Divisor (`<hr class="divisor">`) | **Nivel 2: Homologación UI** | **Migrar en Etapa 2.3** (reemplaza `<hr>` custom) |
| [componentes/insignias.md](./componentes/insignias.md) | Insignias (`.insignia-borde*`, `.insignia-solido*`) | **Nivel 2: Homologación UI** | **Migrar en Etapa 2.4** (reemplaza badges custom) |
| [componentes/chips.md](./componentes/chips.md) | Píldoras (`.pildora`, `.pildora__grupo`) | **Nivel 2: Homologación UI** | **Migrar en Etapa 2.5** (reemplaza chips custom) |
| [componentes/texturas.md](./componentes/texturas.md) | Texturas (`.textura`, `.textura--guinda`, etc.) | **Nivel 2: Opcional / Estético** | Disponible para secciones/heroes |
| [estilos/colores.md](./estilos/colores.md) | Paletas, tokens y degradados | **Nivel 3: Ya compatible (100%)** | Sin cambios requeridos |
| [estilos/tipografia.md](./estilos/tipografia.md) | Noto Sans y Patria (`.patria`, `h0b..xsdr`) | **Nivel 3: Ya compatible (100%)** | Sin cambios requeridos |
| [estilos/reticula.md](./estilos/reticula.md) | Grid (`.reticulaGrid__12`, `.fila`, `.columna__*`) | **Nivel 3: Ya compatible (100%)** | Sin cambios requeridos |
| [estilos/iconos.md](./estilos/iconos.md) | 245 Iconos Carbon/SND (`.snd__icono`) | **Nivel 3: Ya compatible (100%)** | Sin cambios requeridos |
| [estilos/pictogramas.md](./estilos/pictogramas.md) | 76 Pictogramas (`.snd__pictograma`) | **Nivel 3: Ya compatible (100%)** | Sin cambios requeridos |
| [componentes/botones.md](./componentes/botones.md) | Botones (`.boton__primario/secundario/fantasma`) | **Nivel 3: Ya compatible (100%)** | Sin cambios requeridos |
| [componentes/barra-busqueda.md](./componentes/barra-busqueda.md) | Buscador (`.search-container`, `.form__inset`) | **Nivel 3: Ya compatible (100%)** | Sin cambios requeridos |
| [componentes/listas.md](./componentes/listas.md) | Listas (`.listaSinEstilos`, `.listaBasica`) | **Nivel 3: Ya compatible (100%)** | Disponible / Sin cambios |
| [componentes/barra-lateral.md](./componentes/barra-lateral.md) | Sidebar de sistema (`.menuMain`) | **Nivel 4: Reserva disponible** | No requerido hoy (documentación lista para uso futuro) |
| [componentes/barra-progreso.md](./componentes/barra-progreso.md) | Stepper / Progreso (`.progresoPasos/Lineal/Vertical`) | **Nivel 4: Reserva disponible** | No requerido hoy (documentación lista para uso futuro) |
| [componentes/radio-botones.md](./componentes/radio-botones.md) | Radio button (`.form__radio`) | **Nivel 4: Reserva disponible** | No requerido hoy (documentación lista para uso futuro) |
| [componentes/casilla-verificacion.md](./componentes/casilla-verificacion.md) | Checkbox (`.form__checkbox`) | **Nivel 4: Reserva disponible** | No requerido hoy (documentación lista para uso futuro) |
| [componentes/interruptor.md](./componentes/interruptor.md) | Switch (`.form__switch`) | **Nivel 4: Reserva disponible** | No requerido hoy (documentación lista para uso futuro) |
| [componentes/carga-archivos.md](./componentes/carga-archivos.md) | File uploader (`.cargarArchivo`) | **Nivel 4: Reserva disponible** | No requerido hoy (documentación lista para uso futuro) |
| [componentes/toast.md](./componentes/toast.md) | Notificación flotante (Toast) | **Nivel 4: Reserva disponible** | Sin pestaña Desarrollo aún en SND; documentado en local |
| [componentes/selector-fecha.md](./componentes/selector-fecha.md) | Datepicker / Horario | **Nivel 4: Reserva disponible** | Sin pestaña Desarrollo aún en SND; documentado en local |
| [componentes/tabla.md](./componentes/tabla.md) | Tabla de datos y filtros | **Nivel 4: Reserva disponible** | Sin pestaña Desarrollo aún en SND; documentado en local |
| [componentes/indicador-carga.md](./componentes/indicador-carga.md) | Indicador de carga (Loader) | **Nivel 4: Reserva disponible** | Sin pestaña Desarrollo aún en SND; documentado en local |
| [plantillas/integracion-llave-mx.md](./plantillas/integracion-llave-mx.md) | Plantilla Medios de Autenticación (Llave MX) | **Nivel 4: Reserva disponible** | Exclusivo para login; documentado en local |

---

## 2. Nivel 1: Cambios Arquitectónicos (Etapa 1 — Núcleo v1.0.0)

### 2.1 Reemplazo de `snd-guinda.css` y `snd.js` por el cargador único `carga.js`
- **Referencia:** [snd-comenzar.md](./snd-comenzar.md#L26-L59) y [snd-migracion.md](./snd-migracion.md#L16).
- **Estado actual en `sesna-v2/functions.php` (líneas 69–80):**
  ```php
  wp_enqueue_style('snd-v1', 'https://framework-gb.cdn.gob.mx/snd/v1.1.0/snd-guinda.css', array(), null);
  wp_enqueue_style('gobmx-accesibilidad', 'https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css', array(), null);
  wp_enqueue_style('sesna-main-style', get_template_directory_uri() . '/assets/css/main.css', array('snd-v1'), filemtime( get_template_directory() . '/assets/css/main.css' ));
  wp_enqueue_style('sesna-utilidades', get_template_directory_uri() . '/assets/css/utilidades-tema.css', array('sesna-main-style'), filemtime( get_template_directory() . '/assets/css/utilidades-tema.css' ));
  wp_enqueue_script('snd-js', 'https://framework-gb.cdn.gob.mx/snd/v1.1.0/snd.js', array(), null, true);
  ```
- **Especificación oficial v1.0.0:**
  Colocar en `<head>` de todas las páginas:
  ```html
  <script src="https://framework-gb.cdn.gob.mx/snd/v1/carga.js"
    integrity="sha384-co1XtMH+rcHM2juJRJdlpTdJfL9wAc1/EJ+71hoqFAIK4C7KEdcwhrtt8BPuwEWV"
    crossorigin="anonymous"
    data-tema="guinda"
    defer></script>
  ```
- **Qué hace `carga.js`:**
  - Descarga y verifica la hoja de estilos del tema (`data-tema="guinda"`), el JavaScript del SND (procesador de íconos, tooltips v2, píldoras, cargador de archivos, etc.) y define los Web Components `<snd-header>` y `<snd-footer>`.
- **Acciones técnicas a realizar en Etapa 1:**
  1. En `sesna-v2/header.php` (o vía `wp_head` con prioridad alta en `functions.php`), insertar la etiqueta `<script src="https://framework-gb.cdn.gob.mx/snd/v1/carga.js" ...></script>` con sus 5 atributos exactos (`src`, `integrity`, `crossorigin="anonymous"`, `data-tema="guinda"`, `defer`).
  2. En `sesna-v2/functions.php`, eliminar `wp_enqueue_style('snd-v1', ...)` y `wp_enqueue_script('snd-js', ...)`.
  3. Actualizar las dependencias de `sesna-main-style` en `functions.php`: cambiar `array('snd-v1')` por `array()` para que WordPress siga encolando `main.css` y `utilidades-tema.css`.
  4. Verificar en vivo cómo inyecta `carga.js` su `<link rel="stylesheet">` en `<head>` (si al inicio o al final de `<head>`) para asegurar que `main.css` y `utilidades-tema.css` mantengan la prioridad esperada en la cascada CSS.

---

### 2.2 Reemplazo del Header estático por `<snd-header></snd-header>`
- **Referencia:** [componentes/header.md](./componentes/header.md#L84-L162).
- **Estado actual en `sesna-v2/header.php` (líneas 24–46):**
  ```html
  <header class="header">
    <a href="#mainContent" class="irContent">Ir al contenido principal</a>
    <section class="mexico">
      <div class="mexico__contenedor">
        ...
      </div>
    </section>
  </header>
  ```
- **Especificación oficial v1.0.0:**
  ```html
  <snd-header></snd-header>
  ```
  - **Qué incluye automáticamente `<snd-header>` ([header.md#L137-L143](./componentes/header.md#L137-L143)):**
    - Enlace *"Ir al contenido principal"* apuntando a `#mainContent` (coincide con `<main class="page" id="mainContent">` en la línea 262 de `header.php`).
    - Logotipo del Gobierno de México con enlace a `https://www.gob.mx/`.
    - Enlace *"Gobierno"* (`https://www.gob.mx/gobierno`), que abre en ventana nueva.
    - **Barra fija de 58 px de alto que reserva su propio espacio en el flujo para no cubrir el contenido.**
    - Regla normativa: *"No agregues estilos ni scripts propios al encabezado: su diseño está aislado y se actualiza desde el SND."*
- **Impacto crítico en CSS (`sesna-v2/assets/css/main.css`) y JS (`sesna-v2/assets/js/main.js`):**
  1. **Ajuste de alturas y offsets (`main.css` líneas 579–599 y 402–406):**
     - Actualmente `main.css` declara `--mexico-h: 80px` (escritorio) y `56px` (`<= 699.98px`), posiciona `.sesna-subheader` en `top: var(--mexico-h)` y aplica a `#mainContent` un `padding-top: calc(var(--mexico-h) + var(--sesna-subheader-h))`.
     - Dado que `<snd-header>` mide **58 px** de alto y **ya reserva su propio espacio de 58 px** en el documento:
       - `--mexico-h` debe actualizarse a `58px` para que `.sesna-subheader` (`position: fixed; top: var(--mexico-h)`) y el panel de accesibilidad (`#accessibility .menu-slide`) queden exactamente debajo de `<snd-header>`.
       - En `main, main.page, #mainContent`, el `padding-top` ya no debe sumar `--mexico-h` si `<snd-header>` ya empuja el flujo 58px; solo deberá compensar `var(--sesna-subheader-h)` (`52px`) — **esto se debe verificar visualmente en el navegador al activar `carga.js`**.
  2. **Limpieza de overrides CSS sobre `.header` y `.mexico*` (`main.css` líneas 70–88 y 646–775):**
     - Retirar o aislar las reglas con `!important` sobre `header.header`, `.mexico`, `.mexico__contenedor`, `.mexico__escudo`, `.mexico__img`, `.mexico__a` para respetar la regla oficial de no alterar el diseño interno de `<snd-header>`.
     - **Cuidado:** Conservar las reglas de `.sesna-subheader .mexico__details` y `.sesna-subheader .mexico__summary` (que pertenecen a la barra de navegación secundaria de SESNA).
  3. **Ajuste en `sesna-v2/assets/js/main.js` (líneas 16–27):**
     - Actualmente `sincronizarDetailsAbiertos()` selecciona globalmente `document.querySelectorAll('details.mexico__details')`.
     - Cambiar el selector a `#sesna-nav-details` (exclusivamente el menú del subheader de SESNA) para no interferir con el encabezado ni el pie de página del SND.

---

### 2.3 Reemplazo del Footer estático por `<snd-footer></snd-footer>`
- **Referencia:** [componentes/footer.md](./componentes/footer.md#L136-L263).
- **Estado actual en `sesna-v2/footer.php` (líneas 9–165):**
  - 156 líneas de HTML estático (`<footer class="footer sesna-footer">...</footer>`) con escudo, "¿Qué es gob.mx?", columna de enlaces, redes de Presidencia y teléfono 079.
- **Especificación oficial v1.0.0:**
  ```html
  <snd-footer></snd-footer>
  ```
  - *(Opcional)* Si SESNA requiere enlaces propios en el footer (hasta 20 enlaces), se colocan como hijos directos `<a>` dentro de `<snd-footer>...</snd-footer>` y aparecen automáticamente bajo la columna *"Enlaces internos"*. Si no se requieren, se deja `<snd-footer></snd-footer>` vacío.
- **Acciones técnicas a realizar en Etapa 1:**
  1. En `sesna-v2/footer.php`, reemplazar las líneas 9–165 por `<snd-footer></snd-footer>`.
  2. En `sesna-v2/assets/css/main.css` (líneas 90–118), limpiar los overrides `.footer__mexico` y `.footer__escudo` con `!important`.

---

### 2.4 Convivencia con la Barra de navegación de SESNA (`.sesna-subheader`)
- **Referencia:** [componentes/barra-navegacion.md](./componentes/barra-navegacion.md#L76-L239).
- **Análisis:**
  - La estructura que tiene `sesna-v2/header.php` (líneas 55–91) con `<section class="subheader sesna-subheader">`, `<details class="mexico__details navHeader__details" id="sesna-nav-details">`, `<nav class="navHeader">` y el botón de accesibilidad `<button type="button" class="boton__limpio" id="sesna-btn-accesibilidad"><i class="snd__icono snd-accessibility--alt icono--32 icono--circuloRojo" aria-hidden="true"></i>` **cumple exactamente con la especificación de `barra-navegacion.md`**.
  - Los bloques opcionales `.idioma` (selector multilingüe) e `.iniciarSesion` / `.usrperfil__details` (login con Llave MX) documentados en `barra-navegacion.md` **no se agregan** porque el portal SESNA es monolingüe y sin autenticación ciudadana.

---

## 3. Nivel 2: Homologación de Componentes con Código Nuevo en v1.0.0 (Etapa 2)

En la versión anterior del sitio del SND, estos componentes no tenían pestaña *Desarrollo* (o tenían una versión v1), por lo que en `sesna-v2` se implementaron con clases provisionales o CSS propio. En **SND v1.0.0** ya tienen código oficial publicado y deben homologarse.

---

### 3.1 Etapa 2.1 — Mensajes informativos (`.aviso` → `.mensajeInformativo`)
- **Referencia oficial:** [componentes/mensajes-informativos.md](./componentes/mensajes-informativos.md#L72-L164).
- **Cambio normativo:**
  - **Estructura antigua en `sesna-v2` (no oficial):**
    ```html
    <div class="aviso aviso--info mt--16" role="status" aria-live="polite">
      <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
      <div class="aviso__cont">
        <div class="aviso__txt">
          <p class="b1r color--azul500 mb--0">Texto del mensaje...</p>
        </div>
      </div>
    </div>
    ```
  - **Estructura oficial SND v1.0.0:**
    - Solo requiere **un `div`** con `.mensajeInformativo` y la clase de tipo (`.mensajeInformativo--informativo`, `--exito`, `--error`, `--advertencia`).
    - **No se incluye etiqueta `<i>` de icono** en el HTML (el CSS oficial ya incluye el icono y color por defecto).
    - **Atributos obligatorios de accesibilidad:** `tabindex="0"`, `role="note"`, `aria-roledescription="alerta"`, `id="id-unico"` y `aria-labelledby="id-unico"`.
    - **Para mensajes estáticos (visibles al cargar la página):**
      ```html
      <div id="mensaje-info-1" class="mensajeInformativo mensajeInformativo--informativo mt--16" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="mensaje-info-1">
        Texto del mensaje (máximo 250 caracteres).
      </div>
      ```
    - **Para mensajes dinámicos (estados vacíos de filtros/buscadores o respuestas AJAX):**
      Seguir la regla de [mensajes-informativos.md#L127-L143](./componentes/mensajes-informativos.md#L127-L143): envolver en un contenedor `<div role="status">` presente desde la carga:
      ```html
      <div role="status">
        <div id="sesiones-empty-comite" class="mensajeInformativo mensajeInformativo--informativo mt--16" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="sesiones-empty-comite">
          No se encontraron sesiones que coincidan con los filtros seleccionados.
        </div>
      </div>
      ```
- **Inventario exacto de archivos a actualizar (24 ocurrencias en 12 archivos):**
  1. [sesna-v2/functions.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/functions.php#L723) — Líneas 723 y 751 (respuesta AJAX de `sna_get_home_entries_by_family`).
  2. [sesna-v2/page-organos-colegiados.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-organos-colegiados.php#L170) — Líneas 170, 247, 323, 353 y 378 (5 avisos).
  3. [sesna-v2/page-seguimiento-evaluacion.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-seguimiento-evaluacion.php#L475) — Línea 475 (1 aviso).
  4. [sesna-v2/page-directorio.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-directorio.php#L118) — Línea 118 (1 aviso).
  5. [sesna-v2/template-transparencia-datospersonales.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-transparencia-datospersonales.php#L139) — Línea 139 (1 aviso).
  6. [sesna-v2/page-marco-normativo.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-marco-normativo.php#L467) — Líneas 467 y 561 (2 avisos).
  7. [sesna-v2/template-transparencia-comite.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-transparencia-comite.php#L207) — Líneas 207 y 325 (2 avisos).
  8. [sesna-v2/page-programa-implemetancion-pna.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-programa-implemetancion-pna.php#L573) — Línea 573 (1 aviso).
  9. [sesna-v2/template-parts/administracion-finanzas/planeacion-institucional-contenido.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/administracion-finanzas/planeacion-institucional-contenido.php#L106) — Línea 106 (1 aviso).
  10. [sesna-v2/template-parts/administracion-finanzas/informacion-financiera-contenido.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/administracion-finanzas/informacion-financiera-contenido.php#L308) — Líneas 308, 348, 357 y 375 (4 avisos).
  11. [sesna-v2/template-parts/administracion-finanzas/contrataciones-contenido.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/administracion-finanzas/contrataciones-contenido.php#L201) — Líneas 201, 271 y 288 (3 avisos).
  12. [sesna-v2/template-parts/administracion-finanzas/archivo-documental-contenido.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/administracion-finanzas/archivo-documental-contenido.php#L190) — Línea 190 (1 aviso).
  - *Nota adicional:* Revisar los scripts JS que muestran/ocultan por `id` o por clase `.fin-doc-empty` para que sigan funcionando igual sobre el nuevo elemento, y limpiar las reglas CSS huérfanas de `.aviso*` en `main.css`.

---

### 3.2 Etapa 2.2 — Mensajes emergentes / Tooltips v2 (`data-mensaje-emergente`)
- **Referencia oficial:** [componentes/mensajes-emergentes.md](./componentes/mensajes-emergentes.md#L58-L253).
- **Cambio normativo:**
  - En SND v1.0.0 se introdujo la **versión 2** de Mensajes emergentes: ya no se construye el contenedor `.tooltip > .tooltip__boton + .tooltip__burbuja + .accesibilidadLector`, sino que basta con agregar `data-mensaje-emergente="..."` al botón disparador `.mensajeEmergente__boton` y el JS oficial del SND construye, posiciona y hace accesible la burbuja automáticamente.
- **Inventario exacto de archivos a actualizar (2 archivos):**
  1. [sesna-v2/template-parts/indicadores-nacionales/indicador-detalle.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/indicadores-nacionales/indicador-detalle.php#L121-L129):
     - Reemplazar:
       ```html
       <div class="tooltip in-kpi__tooltip">
         <button type="button" class="tooltip__boton in-kpi__info-btn" ...>
           <i class="snd__icono snd-information icono--16" aria-hidden="true"></i>
         </button>
         <div id="..." class="tooltip__burbuja tooltip__burbuja--abajo-izquierda tooltip__burbuja--mediano" role="tooltip" aria-hidden="true">...</div>
         <span id="..." class="accesibilidadLector">...</span>
       </div>
       ```
     - Por la versión 2 oficial:
       ```html
       <button type="button"
               class="mensajeEmergente__boton in-kpi__info-btn"
               aria-label="Definición de <?php echo esc_attr( $kpi['label'] ); ?>"
               data-mensaje-emergente="<?php echo esc_attr( $ind['resultados'][ $key ]['desc'] ); ?>"
               data-mensaje-emergente-posicion="abajo-izquierda"
               data-mensaje-emergente-ancho="mediano">
         <i class="snd__icono snd-information icono--16" aria-hidden="true"></i>
       </button>
       ```
  2. [sesna-v2/page-indicadores-nacionales.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-indicadores-nacionales.php#L692-L729):
     - Eliminar los listeners manuales de `click` y `keydown` (Escape) para `[data-tooltip-trigger], .tooltip__boton` (líneas 692–729), ya que el script oficial del SND gestiona hover, focus, tap y tecla Escape de forma nativa.
  - *(Nota: Los tooltips flotantes de mapas SVG en `page-indicadores-nacionales.php` (`.in-map-tooltip`) y `page-diseno-pna.php` (`#mapTooltip`) siguen coordenadas del cursor sobre `<path>` geográficos; esos se mantienen como overlays propios del mapa).*

---

### 3.3 Etapa 2.3 — Divisor (`<hr class="divisor">`)
- **Referencia oficial:** [componentes/divisor.md](./componentes/divisor.md#L54-L110).
- **Cambio normativo:**
  - El SND v1.0.0 estandariza los separadores con `<hr class="divisor" />` (bajo contraste, `--neutro400`), `<hr class="divisor divisor--altoContraste" />` (`--neutro600`), `<hr class="divisor divisor--vertical" aria-orientation="vertical" />` y `<div class="divisor divisor--decorativo" aria-hidden="true"></div>`.
- **Inventario exacto de archivos a actualizar (13 ocurrencias en 9 archivos de front-end):**
  *(Nota: [template-parts/header-blog.php#L97](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/header-blog.php#L97) ya usa `<hr class="divisor">`, y [functions.php#L890](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/functions.php#L890) es un metabox del wp-admin).*
  1. [sesna-v2/template-parts/home/section-entradas.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/home/section-entradas.php#L111) — Línea 111: `<hr class="sna-entradas-panel-divider" />` → `<hr class="divisor my--20" />`.
  2. [sesna-v2/template-parts/content/single.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/content/single.php#L72) — Línea 72: `<hr class="sesna-single-divider my--32">` → `<hr class="divisor my--32" />`.
  3. [sesna-v2/template-transparencia-unidad.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-transparencia-unidad.php#L55) — Línea 55: `<hr class="tx-unidad-divider mb--24">` → `<hr class="divisor mb--24" />`.
  4. [sesna-v2/template-contacto.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-contacto.php#L52) — Línea 52: `<hr class="tx-unidad-divider mb--24">` → `<hr class="divisor mb--24" />`.
  5. [sesna-v2/page-directorio.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-directorio.php#L193) — Líneas 193, 202, 255 y 260: agregar la clase `divisor` a los 4 `<hr class="divisor dir-ficha__separator ...">`.
  6. [sesna-v2/page-politica-nacional-anticorrupcion.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-politica-nacional-anticorrupcion.php#L66) — Línea 66: `<hr class="mt--16 mb--16">` → `<hr class="divisor my--16" />`.
  7. [sesna-v2/page-programa-implemetancion-pna.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-programa-implemetancion-pna.php#L238) — Línea 238: `<hr class="my-4" style="border-color:#f0e8ec;">` → `<hr class="divisor my--24" />`.
  8. [sesna-v2/template-parts/administracion-finanzas/informacion-financiera-contenido.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/administracion-finanzas/informacion-financiera-contenido.php#L224) — Líneas 224 y 456: `<hr class="fin-sidebar-divider my--20">` → `<hr class="divisor my--20" />` y `<hr class="divisor my--16" />`.

---

### 3.4 Etapa 2.4 — Insignias (`.insignia-*`)
- **Referencia oficial:** [componentes/insignias.md](./componentes/insignias.md#L64-L235).
- **Cambio normativo:**
  - El SND v1.0.0 introduce las clases oficiales `.insignia-borde`, `.insignia-borde-punto`, `.insignia-solido` e `.insignia-solido-punto` combinadas con 8 colores (`.insignia-informativo`, `.insignia-exito`, `.insignia-advertencia`, `.insignia-error`, `.insignia-neutro`, `.insignia-morado`, `.insignia-naranja`, `.insignia-guinda`) y `role="status"` cuando comunican estatus.
- **Inventario exacto de archivos candidatos a homologar:**
  1. **Estatus `"Próximamente"` (documentos no disponibles aún):**
     - [sesna-v2/template-parts/administracion-finanzas/planeacion-institucional-contenido.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/administracion-finanzas/planeacion-institucional-contenido.php#L99) (línea 99):
       `<span class="xsdr color--neutro600 radio--pildora fondo--neutro200 px--8 py--4 borde mb--0">Próximamente</span>` → `<span class="insignia-borde insignia-neutro" role="status">Próximamente</span>`.
     - [sesna-v2/template-parts/administracion-finanzas/contrataciones-contenido.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/administracion-finanzas/contrataciones-contenido.php#L189) (líneas 189 y 261):
       `<span class="cf-status-badge">Próximamente</span>` → `<span class="insignia-borde insignia-neutro" role="status">Próximamente</span>`.
  2. **Categoría de documento (`"Documento técnico"` / `"Enlace externo"`):**
     - [sesna-v2/page-contrataciones-publicas.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-contrataciones-publicas.php#L134) (línea 134), [sesna-v2/page-verificacion-patrimonial.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-verificacion-patrimonial.php#L185) (línea 185) y [sesna-v2/functions.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/functions.php#L3741) (línea 3741):
       `<span class="cp-doc-badge">...</span>` → `<span class="insignia-borde insignia-guinda">...</span>`.
     - [sesna-v2/page-riesgos-inteligencia.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-riesgos-inteligencia.php#L225) (línea 225):
       `<span class="cp-subsec-enlace__badge xsdsb color--pguinda600">Enlace externo</span>` → `<span class="insignia-borde insignia-guinda">Enlace externo</span>`.
  3. **Etiqueta `"Indicador N"` en detalle de indicadores:**
     - [sesna-v2/template-parts/indicadores-nacionales/indicador-detalle.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/indicadores-nacionales/indicador-detalle.php#L84) (línea 84):
       `<span class="in-detalle-badge sdsb">Indicador N</span>` → `<span class="insignia-solido insignia-guinda">Indicador N</span>` (o `.insignia-borde.insignia-guinda`).

---

### 3.5 Etapa 2.5 — Píldoras / Chips de filtrado (`.pildora__grupo` y `.pildora`)
- **Referencia oficial:** [componentes/chips.md](./componentes/chips.md#L64-L197).
- **Cambio normativo:**
  - El SND v1.0.0 publica el componente oficial de **Píldoras**:
    ```html
    <div class="pildora__grupo" role="group" aria-label="Filtrar por categoría">
      <button type="button" class="pildora" aria-pressed="true">Categoría 1</button>
      <button type="button" class="pildora" aria-pressed="false">Categoría 2</button>
    </div>
    ```
  - Los estados visualmente activos se aplican de forma automática en el CSS del SND cuando el botón `.pildora` tiene `aria-pressed="true"`.
- **Inventario exacto de archivos a actualizar (2 archivos):**
  1. [sesna-v2/page-riesgos-inteligencia.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-riesgos-inteligencia.php#L210-L214) (líneas 210–214 y JS en líneas 332–371):
     - Actualmente usa `.cp-subsec-chip.boton--redondeado.boton__primario` / `.boton__secundario`.
     - Cambiar el contenedor `#vp-metodologicos-filtros` a `class="pildora__grupo cp-subsec-filtros" role="group" aria-label="Filtrar por subsección"` y cada botón a `class="pildora cp-subsec-chip" aria-pressed="<?php echo $indice === 0 ? 'true' : 'false'; ?>"`.
     - Ajustar el script inline (líneas 346–369) para alternar `aria-pressed="true"` / `"false"` en lugar de intercambiar `boton__primario` y `boton__secundario` (Nota: como el JS del SND también escucha clicks en `.pildora[aria-pressed]`, verificar en vivo para evitar doble toggle).
  2. [sesna-v2/template-parts/home/section-entradas.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/template-parts/home/section-entradas.php#L136-L155) (líneas 136–155):
     - Actualmente `#sna-entradas-tabs` usa `button.sna-entradas-tab[aria-pressed="true|false"]`.
     - Agregar las clases oficiales `pildora__grupo` al contenedor `#sna-entradas-tabs` (con `role="group" aria-label="Filtrar por categoría"`) y `pildora` a cada `button.sna-entradas-tab`, verificando la convivencia con `script/home-entries.js`.

---

## 4. Nivel 3: Estilos y Componentes Ya Compatibles al 100%

Los siguientes elementos de `sesna-v2` ya fueron verificados contra los archivos de `docs/snd-migration/snd-1.0.0/` y **no presentan diferencias**:

- **Retícula ([estilos/reticula.md](./estilos/reticula.md)):** `.contenedor`, `.contenedor--fluido`, `.reticulaGrid__1..12`, `.fila`, `.reticulaFlex`, `.columna__1..12`, `.columna__sangria--*`, `.gap--*`, `.gapx--*`, `.gapy--*`.
- **Tipografía ([estilos/tipografia.md](./estilos/tipografia.md)):** Familias Noto Sans y Patria (`.patria`), clases `h0bl/b/m`, `h1b/m`, `h2b/m`, `sh0b/m/r`, `sh1b/m/r`, `b1sb/m/r/it`, `sdsb/r`, `xsdsb/r`.
- **Colores ([estilos/colores.md](./estilos/colores.md)):** Clases `.color--*`, `.fondo--*`, `.borde--*`, `.degradado--*` y variables CSS `--pguinda100..950`, `--dorado100..950`, `--neutro100..800`.
- **Iconos y Pictogramas ([estilos/iconos.md](./estilos/iconos.md), [estilos/pictogramas.md](./estilos/pictogramas.md)):** `<i class="snd__icono snd-<nombre> icono--<tamaño>">` y `<i class="snd__pictograma snd-<nombre> icono--<tamaño> color--origen">`.
- **Botones ([componentes/botones.md](./componentes/botones.md)):** `.boton__primario`, `.boton__secundario`, `.boton__fantasma` y modificadores `boton--grande`, `boton--100`, `boton--100sm`, `boton--wrap`, `boton--redondeado`, `fantasma--blanco`, `boton--cargando`.
- **Barra de búsqueda ([componentes/barra-busqueda.md](./componentes/barra-busqueda.md)):** Los 13 buscadores internos en 8 archivos del tema ya implementan `<form class="search-container"><div class="form__inset general-search"><i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i><input type="search" class="sh0r js-input" ...></div></form>`.

---

## 5. Nivel 4: Catálogo de Componentes en Reserva (Disponibles en `docs/snd-migration/snd-1.0.0/` para Uso Futuro)

Estos archivos **permanecen íntegros en el repositorio** dentro de `docs/snd-migration/snd-1.0.0/` para que cualquier desarrollador o agente de IA pueda consultarlos e implementarlos de inmediato si el alcance funcional del sitio crece:

1. **[componentes/barra-lateral.md](./componentes/barra-lateral.md) (`.menuMain`):**
   - *Cuándo usarlo:* Si se crea un micrositio o sistema con navegación lateral colapsable en escritorio y barra inferior en móvil.
2. **[componentes/barra-progreso.md](./componentes/barra-progreso.md) (`.progresoPasos`, `.progresoLineal`, `.progresoVertical`):**
   - *Cuándo usarlo:* Si se agrega un asistente multipaso, línea de tiempo de procesos con estatus (`completado`, `progreso`, `alerta`, `error`) o barra porcentual.
3. **[componentes/radio-botones.md](./componentes/radio-botones.md) (`.form__radio`, `.form__fieldset`):**
   - *Cuándo usarlo:* Si se construye un formulario público o encuesta con selección única.
4. **[componentes/casilla-verificacion.md](./componentes/casilla-verificacion.md) (`.form__checkbox`):**
   - *Cuándo usarlo:* Si se construye un formulario con selección múltiple o aceptación de aviso de privacidad/términos.
5. **[componentes/interruptor.md](./componentes/interruptor.md) (`.form__switch` con `role="switch"`):**
   - *Cuándo usarlo:* Si se agregan controles binarios interactivos de activación/desactivación inmediata.
6. **[componentes/carga-archivos.md](./componentes/carga-archivos.md) (`.cargarArchivo`):**
   - *Cuándo usarlo:* Si se habilita un buzón o formulario ciudadano que requiera adjuntar documentos (PDF, imágenes) con validación de formato y peso máximo (`data-peso-maximo`).
7. **[componentes/texturas.md](./componentes/texturas.md) (`.textura`, `.textura--blanca|guinda|verde|dorada`):**
   - *Cuándo usarlo:* Cuando se requiera aplicar la textura oficial del Gobierno de México 2024-2030 sobre fondos de secciones, tarjetas o encabezados mediante CSS puro.
8. **[componentes/listas.md](./componentes/listas.md) (`.listaSinEstilos`, `.listaBasica`, `.listaHorizontal--*`):**
   - *Cuándo usarlo:* Para listas semánticas con viñetas guindas (`.listaBasica`), doradas (`--secundaria`), grises (`--terciaria`) o listas horizontales deslizables.
9. **[plantillas/integracion-llave-mx.md](./plantillas/integracion-llave-mx.md):**
   - *Cuándo usarlo:* Si en el futuro se integra inicio de sesión con Llave MX, e.firma o correo.
10. **Componentes aún sin pestaña *Desarrollo* en el sitio oficial del SND (documentados con su *Descripción* y *Diseño*):**
    - [componentes/toast.md](./componentes/toast.md) (Notificación flotante)
    - [componentes/selector-fecha.md](./componentes/selector-fecha.md) (Selector de fechas y horarios)
    - [componentes/tabla.md](./componentes/tabla.md) (Tablas estáticas y con filtros)
    - [componentes/indicador-carga.md](./componentes/indicador-carga.md) (Loader de página/sección)

---

## 6. Etapa 3: Refactorización Arquitectónica, Optimización y Escalabilidad

Una vez completadas y validadas las Etapas 1 y 2 del SND `v1.0.0`, esta Etapa 3 aborda la deuda técnica estructural del tema `sesna-v2` para maximizar su rendimiento, mantenibilidad y escalabilidad sin alterar la funcionalidad ni el diseño visual:

### 6.1 Etapa 3.1 — Modularización de `sesna-v2/functions.php` (~4,346 líneas → arquitectura `inc/`)
- **Diagnóstico:** [sesna-v2/functions.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/functions.php) concentra en un solo archivo la configuración del tema, encolado de assets, Custom Post Types (CPTs), decenas de metaboxes del panel de administración (`add_meta_box` y `save_post`), endpoints AJAX y helpers de plantillas. WordPress parsea y carga en memoria todo el código de administración incluso en las visitas públicas del front-end.
- **Acción:** Convertir `functions.php` en un orquestador ligero (~100 líneas) que delegue mediante `require_once` hacia módulos especializados en `sesna-v2/inc/`, cargando los metaboxes exclusivamente cuando `is_admin()` sea `true`:
  - `inc/setup.php` — Soporte del tema (`after_setup_theme`), menús, widgets y walkers.
  - `inc/enqueue.php` — Registro y encolado de hojas de estilo y scripts (`sesna_theme_scripts`).
  - `inc/post-types.php` — Registro de Custom Post Types y taxonomías.
  - `inc/ajax-handlers.php` — Endpoints `wp_ajax_` y `wp_ajax_nopriv_`.
  - `inc/template-helpers.php` — Funciones auxiliares reutilizables de renderizado.
  - `inc/admin/` (cargado solo dentro de `if ( is_admin() )`):
    - `inc/admin/metaboxes-home.php`
    - `inc/admin/metaboxes-transparencia.php`
    - `inc/admin/metaboxes-finanzas.php`
    - `inc/admin/metaboxes-paginas.php`

### 6.2 Etapa 3.2 — Segmentación de `sesna-v2/assets/css/main.css` (~10,450 líneas) y reducción de `!important`
- **Diagnóstico:** [sesna-v2/assets/css/main.css](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/assets/css/main.css) se descarga completo en todas las vistas aunque el visitante solo consulte una página, y acumula reglas con `!important` heredadas de la transición entre Bootstrap v3 y SND.
- **Acción:**
  1. Mantener en `assets/css/main.css` únicamente el layout global, variables `:root`, subheader institucional, componentes transversales y accesibilidad.
  2. Extraer los bloques exclusivos por página a hojas modulares bajo `assets/css/pages/` (por ejemplo: `home.css`, `indicadores-nacionales.css`, `administracion-finanzas.css`, `directorio.css`, `pna.css`) y encolarlas condicionalmente en `inc/enqueue.php` según `is_front_page()` o `is_page_template()`.
  3. Adoptar capas de cascada CSS (`@layer`) o selectores de alcance limpio para eliminar progresivamente el uso de `!important`.

### 6.3 Etapa 3.3 — Separación de Datos, Vista y JavaScript inline en plantillas grandes
- **Diagnóstico:** Plantillas como [sesna-v2/header.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/header.php), [sesna-v2/page-indicadores-nacionales.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-indicadores-nacionales.php), [sesna-v2/page-diseno-pna.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-diseno-pna.php) y [sesna-v2/page-riesgos-inteligencia.php](file:///home/alopez_legion/proyectos/theme-sesna/sesna-v2/page-riesgos-inteligencia.php) combinan catálogos extensos de datos en arreglos PHP, marcado HTML/SVG y bloques `<script>` inline de hasta 200 líneas.
- **Acción:**
  1. Extraer los bloques `<script>` inline de las plantillas PHP a archivos `.js` externos en `assets/js/` con `defer` (mejorando el cacheo del navegador y permitiendo políticas Content Security Policy sin `unsafe-inline`), inyectando datos dinámicos vía `wp_localize_script()` o atributos `data-*`.
  2. Extraer los arreglos estáticos de datos extensos (como definiciones de indicadores o catálogos) a `inc/data/`.
  3. Unificar las carpetas duplicadas de recursos (`sesna-v2/script/` → `sesna-v2/assets/js/` y `sesna-v2/img/` → `sesna-v2/assets/img/`).

### 6.4 Etapa 3.4 — Componentes UI parciales reutilizables (DRY con `get_template_part`)
- **Diagnóstico:** Múltiples plantillas (`page-contrataciones-publicas.php`, `page-verificacion-patrimonial.php`, `page-riesgos-inteligencia.php`, módulos de `template-parts/administracion-finanzas/`) duplican el marcado HTML de tarjetas de documentos, avisos informativos y barras de búsqueda/filtrado.
- **Acción:** Crear parciales parametrizados en `sesna-v2/template-parts/ui/` (usando el tercer parámetro `$args` de `get_template_part()`):
  - `template-parts/ui/mensaje-informativo.php`
  - `template-parts/ui/card-documento.php`
  - `template-parts/ui/barra-busqueda.php`

### 6.5 Etapa 3.5 — Optimización de consultas `WP_Query`
- **Diagnóstico:** Consultas `WP_Query` secundarias que renderizan listados fijos sin paginación ejecutan por defecto `SQL_CALC_FOUND_ROWS` y precargan cachés de términos o metadatos aun cuando no se utilizan.
- **Acción:** Auditar todas las instancias de `new WP_Query(...)` en el tema y agregar `'no_found_rows' => true` en consultas sin paginación, así como `'update_post_term_cache' => false` o `'update_post_meta_cache' => false` cuando corresponda.

### 6.6 Estado final de la Etapa 3 — Arquitectura vigente del tema

> Los diagnósticos de 6.1–6.5 se conservan como histórico. Esto es lo que existe hoy.

- **`sesna-v2/functions.php`** solo orquesta (`require_once` de `inc/`). El orden de carga conserva el orden de registro de hooks; no lo reordenes. Módulos: `setup`, `enqueue`, `nav-walker`, `helpers-media`/`helpers-acf`/`helpers-template`, `blog-familias`, `cpt-*`, `bootstrap-pages`, `ajax-handlers`, `data-ata-sheets`; datos estáticos en `inc/data/`.
- **CSS** (se encola en `inc/enqueue.php`, versión por `filemtime()`), en este orden de cascada: `layout.css` (base, header, navegación) → `components-snd.css` → `card.css` → `pages/<página>.css` → `utilidades-tema.css`. Las hojas de `pages/` cargan solo en su plantilla, según `sesna_template_styles_map()`; una hoja nueva se registra ahí.
- **JS:** scripts de página en `sesna-v2/script/*.js`, con `defer`, registrados en `sesna_template_scripts_map()`. Datos dinámicos por `wp_localize_script()`, no interpolados en el JS.
- **Parciales reutilizables** en `sesna-v2/template-parts/ui/`: `card.php`, `breadcrumb.php`, `mobile-drawer.php`. Úsalos en vez de duplicar marcado.
- **Menú principal:** `details/summary` con hover. En tableta (768–1023 px) la barra no debe usar `overflow` distinto de `visible` (recorta el submenú).

### 6.7 Componente Card (`sesna-v2/assets/css/card.css`)

El SND v1.0.0 no define una card; esta hoja es la única fuente de verdad (referencia: Figma "Cards").
- **Variables** `--sesna-card-*` en `:root`: fondo, borde, radio, sombra, padding, elevación y sombra de hover, separaciones, tamaño y color del ícono, color y alineación del texto, color de la acción.
- **Estructura:** `.sesna-card` › `.sesna-card__header` (`__icon` + `__title`) › `__text` › `__action`. La acción va siempre abajo a la derecha. Sin atributo `title` (sin tooltips) y sin subrayado.
- **Ajustes:** por página o por card, redefiniendo las mismas variables en su CSS (p. ej. `.page-transparencia .sesna-card { --sesna-card-icon-size: 48px; }`). No copies `border-radius`/`box-shadow` en otras hojas.
- **Responsivo:** la card usa `container-type: inline-size`; con poco ancho el ícono pasa arriba del título y el texto se alinea a la izquierda.
- **Pendiente de homologar:** cards selectoras (círculo centrado + número), de documento y de noticias.

### 6.8 Cómo trabajar y verificar

- Cambios pequeños, por familia de componente. Antes de crear CSS, busca si ya existe una variable o componente.
- `php -l` en cada PHP tocado. PHP corre en el contenedor `theme-wp-sesna-wordpress-1` (sitio en `http://localhost:8080`); no está instalado en el host.
- Revisa la página en escritorio y móvil (320–1440 px): sin errores de consola, sin desbordes horizontales y sin cambios en enlaces ni documentos.
- **No uses `docker compose run wpcli`**: recrea el contenedor de base de datos.
- **Trabajo compartido en `snd-dev`:** haz `git pull --rebase origin snd-dev` antes de empezar y antes de cada push; commits pequeños y frecuentes; avisa al otro colaborador cuando vayas a tocar un archivo compartido (`card.css`, `layout.css`, `inc/enqueue.php`). Nunca fuerces el push (`--force`).

---

## 7. Checklist de Ejecución Paso a Paso

Para continuar la implementación en cualquier máquina o sesión de IA, sigue este checklist en orden:

- [x] **Etapa 1: Integración de `carga.js`, `<snd-header>` y `<snd-footer>`**
  - [x] 1.1 Agregar `<script src="https://framework-gb.cdn.gob.mx/snd/v1/carga.js" integrity="sha384-co1XtMH+rcHM2juJRJdlpTdJfL9wAc1/EJ+71hoqFAIK4C7KEdcwhrtt8BPuwEWV" crossorigin="anonymous" data-tema="guinda" defer></script>` en `<head>` (`sesna-v2/header.php`).
  - [x] 1.2 Retirar `wp_enqueue_style('snd-v1', ...)` y `wp_enqueue_script('snd-js', ...)` de `sesna-v2/functions.php` y quitar `'snd-v1'` de la dependencia de `sesna-main-style`.
  - [x] 1.3 Reemplazar `<header class="header">...</header>` en `sesna-v2/header.php` por `<snd-header></snd-header>`.
  - [x] 1.4 Reemplazar `<footer class="footer sesna-footer">...</footer>` en `sesna-v2/footer.php` por `<snd-footer></snd-footer>`.
  - [x] 1.5 Ajustar en `sesna-v2/assets/css/main.css` la variable `--mexico-h` (a `58px`), el `padding-top` de `#mainContent` y limpiar las reglas `!important` sobre `.header`, `.mexico*` y `.footer__escudo`.
  - [x] 1.6 Acotar `sincronizarDetailsAbiertos()` en `sesna-v2/assets/js/main.js` para que solo afecte a `.sesna-subheader details.mexico__details`.
  - [x] 1.7 Verificar que `<snd-header>`, `.sesna-subheader`, el widget de accesibilidad y `<snd-footer>` convivan sin solapamientos.
- [x] **Etapa 2: Homologación de componentes con nuevo código en SND v1.0.0**
  - [x] 2.1 Migrar los 24 bloques `.aviso` a `.mensajeInformativo` en los 12 archivos listados en la sección 3.1.
  - [x] 2.2 Migrar los tooltips de `indicador-detalle.php` y `page-indicadores-nacionales.php` a `data-mensaje-emergente` (v2) según la sección 3.2.
  - [x] 2.3 Migrar los 13 `<hr>` personalizados a `<hr class="divisor">` en los 9 archivos listados en la sección 3.3.
  - [x] 2.4 Migrar los badges de estatus/categoría a `.insignia-borde` / `.insignia-solido` en los archivos listados en la sección 3.4.
  - [x] 2.5 Migrar los chips de filtrado de `page-riesgos-inteligencia.php` y `section-entradas.php` a `.pildora__grupo` / `.pildora` según la sección 3.5.
- [x] **Etapa 3: Refactorización Arquitectónica, Optimización y Escalabilidad**
  - [x] 3.1 `sesna-v2/functions.php` quedó como orquestador (`require_once` de módulos) y la lógica vive en `sesna-v2/inc/` (`setup`, `enqueue`, `nav-walker`, `helpers-*`, `blog-familias`, `cpt-*`, `bootstrap-pages`, `ajax-handlers`, `data-ata-sheets`). El orden de carga conserva el orden de registro de hooks del archivo monolítico (verificado comparando `$wp_filter`). No se aisló `inc/admin/` bajo `is_admin()`: los `save_post_*` deben ejecutarse también fuera del admin (REST, WP-CLI, importadores).
  - [x] 3.2 `assets/css/main.css` se segmentó en `layout.css`, `components-snd.css` y 18 hojas por plantilla en `assets/css/pages/`, encoladas en `inc/enqueue.php` según la plantilla activa (`template_include`) con `filemtime()`. Las reglas se asignaron por análisis de uso de clases y se verificó la cascada (sin cambios de orden con la misma especificidad).
  - [x] 3.3 Se extrajeron los `<script>` inline a `sesna-v2/script/` (encolados con `defer` en `inc/enqueue.php`) y los catálogos de Marco Normativo a `sesna-v2/inc/data/marco-normativo.php`.
  - [x] 3.4 Parciales `template-parts/ui/breadcrumb.php` y `template-parts/ui/mobile-drawer.php` (24 migas de pan y 5 drawers móviles).
  - [x] 3.5 Consultas `WP_Query`/`get_posts` auditadas: `no_found_rows` y `update_post_term_cache => false` donde no hay paginación SQL ni taxonomías.
- [ ] **Etapa 4: Capa de componentes compartidos (pendiente)**
  - [ ] 4.1 Mover `card.css` a `assets/css/components/` y homologar las cards selectoras (círculo centrado + número) y de documento.
  - [ ] 4.2 Componentes `documento`, `panel`/acordeón, `filtros` y `tabla` con variables, como `card.css`.
  - [ ] 4.3 Reducir `assets/css/pages/` a lo estrictamente de página (maquetación, hero, espaciados).
  - [ ] 4.4 Eliminar `!important` por familia a medida que se migra.
