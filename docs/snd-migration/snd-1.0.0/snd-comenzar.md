# Sistema Nacional de Diseño (SND) – Comenzar a desarrollar

- **Fuente:** https://www.snd.gob.mx/comenzar
- **Título de la página:** Comenzar a desarrollar | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0
- **Idioma:** es (México)

## Resumen

Esta guía explica cómo integrar el Sistema Nacional de Diseño en un sitio o plataforma del Gobierno de México. Para comenzar, agrega en cada página el **cargador del SND**: un solo archivo que trae y verifica la hoja de estilos, el JavaScript y los componentes institucionales (encabezado y pie de página).

## Instalación

### Paso 1. Elegir el tema de color

El tema define el color principal de botones, encabezados, pie de página y enlaces. **Usa un solo tema en todo el sitio**: combinar guinda y verde rompe la identidad visual.

| Tema | Atributo | Uso |
|---|---|---|
| Guinda | `data-tema="guinda"` | Proyectos de carácter federal |
| Verde | `data-tema="verde"` | Reservado para solicitudes expresas de Presidencia |

- El tema se indica en el cargador con el atributo `data-tema` (paso 2).
- Escríbelo siempre de forma explícita: **si se omite, se aplica el tema verde**.

### Paso 2. Agregar el cargador del SND

Coloca dentro de la sección `<head>` el código HTML correspondiente al tema que elegiste en todas las páginas de tu sitio. Es la única línea que necesitas: el cargador trae la hoja de estilos del tema, el JavaScript del SND y los componentes de encabezado y pie de página.

**Código HTML · tema guinda**

```html
<script src="https://framework-gb.cdn.gob.mx/snd/v1/carga.js"
  integrity="sha384-co1XtMH+rcHM2juJRJdlpTdJfL9wAc1/EJ+71hoqFAIK4C7KEdcwhrtt8BPuwEWV"
  crossorigin="anonymous"
  data-tema="guinda"
  defer></script>
```

**Código HTML · tema verde**

```html
<script src="https://framework-gb.cdn.gob.mx/snd/v1/carga.js"
  integrity="sha384-co1XtMH+rcHM2juJRJdlpTdJfL9wAc1/EJ+71hoqFAIK4C7KEdcwhrtt8BPuwEWV"
  crossorigin="anonymous"
  data-tema="verde"
  defer></script>
```

### ¿Qué hace cada atributo?

| Atributo | Para qué sirve |
|---|---|
| `src` | Dirección del cargador del SND. |
| `integrity` | Huella digital (SRI) del cargador. El navegador la compara con el archivo que descarga y, si no coinciden, no lo ejecuta. **Este valor no cambia con las actualizaciones**: cópialo tal cual y no lo modifiques ni lo quites. |
| `crossorigin` | Obligatorio con el valor `anonymous`. Sin él, el navegador no puede verificar la huella y bloquea el archivo. |
| `data-tema` | Tema de color: `guinda` o `verde`. |
| `defer` | Ejecuta el cargador cuando el navegador termina de leer la página, sin retrasar que el contenido se muestre. |

## Plantilla base

Usa esta plantilla como punto de partida para cualquier página nueva o migrada. Incluye lo mínimo que toda página debe tener:
- El idioma de la página (`lang="es"`) para que los lectores de pantalla pronuncien correctamente.
- La etiqueta `viewport` para que se adapte a móviles.
- Un título único.
- El cargador del SND con el encabezado y el pie de página.
- El encabezado ya incluye el enlace para saltar directo al contenido principal (`id="mainContent"`).

```html
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nombre de la página | Gobierno de México</title>
    <script src="https://framework-gb.cdn.gob.mx/snd/v1/carga.js"
      integrity="sha384-co1XtMH+rcHM2juJRJdlpTdJfL9wAc1/EJ+71hoqFAIK4C7KEdcwhrtt8BPuwEWV"
      crossorigin="anonymous"
      data-tema="guinda"
      defer></script>
  </head>
  <body>
    <snd-header></snd-header>
    <!-- Opción 2 (Angular o plataformas que no admiten etiquetas personalizadas):
    usa este div en lugar de la etiqueta anterior.
    <div data-snd-componente="header"></div>
    -->

    <main id="mainContent">
      <!-- Contenido de la página -->
    </main>

    <snd-footer></snd-footer>
    <!-- Opción 2 (Angular o plataformas que no admiten etiquetas personalizadas):
    usa este div en lugar de la etiqueta anterior.
    <div data-snd-componente="footer"></div>
    -->
  </body>
</html>
```

### Si tu sitio está hecho con Angular

Angular solo acepta en sus plantillas las etiquetas que conoce. Para que `<snd-header>` y `<snd-footer>` no generen errores al compilar, regístralas agregando `CUSTOM_ELEMENTS_SCHEMA` en los componentes que las usan:

```ts
import { Component, CUSTOM_ELEMENTS_SCHEMA } from "@angular/core";

@Component({
  selector: "app-root",
  schemas: [CUSTOM_ELEMENTS_SCHEMA],
  templateUrl: "./app.html",
})
export class App {}
```

Si no puedes registrarlas, usa la opción 2 que incluye cada plantilla: un `<div>` con el atributo `data-snd-componente`, que Angular acepta sin configuración adicional y se ve igual.

### Variantes del pie de página

#### 1. Con enlaces personalizados

El pie de página completo admite hasta 20 enlaces personalizados. Escríbelos como etiquetas `<a>` dentro de `<snd-footer>`: aparecen en la sección «Enlaces internos».

```html
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nombre de la página | Gobierno de México</title>
    <script src="https://framework-gb.cdn.gob.mx/snd/v1/carga.js"
      integrity="sha384-co1XtMH+rcHM2juJRJdlpTdJfL9wAc1/EJ+71hoqFAIK4C7KEdcwhrtt8BPuwEWV"
      crossorigin="anonymous"
      data-tema="guinda"
      defer></script>
  </head>
  <body>
    <snd-header></snd-header>
    <!-- Opción 2 (Angular o plataformas que no admiten etiquetas personalizadas):
    usa este div en lugar de la etiqueta anterior.
    <div data-snd-componente="header"></div>
    -->

    <main id="mainContent">
      <!-- Contenido de la página -->
    </main>

    <snd-footer>
      <a href="https://www.gob.mx/">Enlace personalizado 1</a>
      <a href="https://www.gob.mx/">Enlace personalizado 2</a>
    </snd-footer>
    <!-- Opción 2 (Angular o plataformas que no admiten etiquetas personalizadas):
    usa este div en lugar de la etiqueta anterior.
    <div data-snd-componente="footer">
      <a href="https://www.gob.mx/">Enlace personalizado 1</a>
      <a href="https://www.gob.mx/">Enlace personalizado 2</a>
    </div>
    -->
  </body>
</html>
```

#### 2. Con pie de página lite

Muestra solo el escudo y la línea 079. Úsalo en páginas que no requieren el pie de página completo.

```html
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nombre de la página | Gobierno de México</title>
    <script src="https://framework-gb.cdn.gob.mx/snd/v1/carga.js"
      integrity="sha384-co1XtMH+rcHM2juJRJdlpTdJfL9wAc1/EJ+71hoqFAIK4C7KEdcwhrtt8BPuwEWV"
      crossorigin="anonymous"
      data-tema="guinda"
      defer></script>
  </head>
  <body>
    <snd-header></snd-header>
    <!-- Opción 2 (Angular o plataformas que no admiten etiquetas personalizadas):
    usa este div en lugar de la etiqueta anterior.
    <div data-snd-componente="header"></div>
    -->

    <main id="mainContent">
      <!-- Contenido de la página -->
    </main>

    <snd-footer-lite></snd-footer-lite>
    <!-- Opción 2 (Angular o plataformas que no admiten etiquetas personalizadas):
    usa este div en lugar de la etiqueta anterior.
    <div data-snd-componente="footer-lite"></div>
    -->
  </body>
</html>
```

#### 3. Con pie de página interno

Para sistemas internos: muestra el escudo, la versión de tu sistema y los enlaces legales. Indica la versión en el atributo `version`.

```html
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nombre de la página | Gobierno de México</title>
    <script src="https://framework-gb.cdn.gob.mx/snd/v1/carga.js"
      integrity="sha384-co1XtMH+rcHM2juJRJdlpTdJfL9wAc1/EJ+71hoqFAIK4C7KEdcwhrtt8BPuwEWV"
      crossorigin="anonymous"
      data-tema="guinda"
      defer></script>
  </head>
  <body>
    <snd-header></snd-header>
    <!-- Opción 2 (Angular o plataformas que no admiten etiquetas personalizadas):
    usa este div en lugar de la etiqueta anterior.
    <div data-snd-componente="header"></div>
    -->

    <main id="mainContent">
      <!-- Contenido de la página -->
    </main>

    <snd-footer-interno version="1.0.0"></snd-footer-interno>
    <!-- Opción 2 (Angular o plataformas que no admiten etiquetas personalizadas):
    usa este div en lugar de la etiqueta anterior.
    <div data-snd-componente="footer-interno" data-version="1.0.0"></div>
    -->
  </body>
</html>
```

## Versiones y cambios

Cada publicación indica qué se agregó y si cambió algo existente, para que sepas si tu sitio necesita ajustes.

| Versión | Fecha de actualización | Cambios |
|---|---|---|
| `v1.0.0` | `01/11/2026` | Nuevo: 27 elementos (5 Estilos y 22 Componentes) |

### Detalle de `v1.0.0` (`01/11/2026`)
- **Estilos (5):** Se agrega estilo Colores, Iconos, Pictogramas, Tipografía, Retícula.
- **Componentes (22):** Se agrega componente Barra de búsqueda, Barra de navegación, Barra de navegación lateral, Barra de progreso, Botón de opción, Botones, Carga de archivos, Casilla de verificación, Divisor, Encabezado, Indicador de carga, Insignias, Interruptor, Listas, Mensajes emergentes, Mensajes informativos, Notificación flotante, Pie de página, Píldoras, Selector de fechas, Tabla, Texturas.
