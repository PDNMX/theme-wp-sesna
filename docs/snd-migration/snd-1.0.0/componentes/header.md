# Sistema Nacional de Diseño (SND) – Componente: Encabezado (`header`)

- **Fuente:** https://www.snd.gob.mx/componentes/header
- **Título de la página:** Encabezado (header) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Elemento superior que guía la navegación y da identidad visual.

---

## 1. Descripción

El encabezado concentra la identidad gráfica institucional (Gobierno de México) y los menús de navegación principales. Al mantenerse fijo en la parte superior, garantiza accesos rápidos y disponibilidad constante.

En aplicaciones móviles, el encabezado suele permanecer oculto para optimizar el espacio en pantalla, mientras que en las versiones web se muestra de manera visible, ofreciendo orientación y accesos inmediatos al usuario.

### Versiones
- Versión desktop *(imagen: `Encabezado versión escritorio`)*
- Versión mobile *(imagen: `Encabezado versión móvil`)*

### Estados
En la versión móvil, se incorpora un ícono de menú (hamburguesa) que al desplegarse, se transforma en un ícono de cierre. Este comportamiento permite al usuario alternar entre abrir y cerrar el menú, facilitando la navegación entre los accesos del encabezado.

- Mobile abierto *(imagen: `Encabezado versión móvil abierto`)*

### Versiones de color
Solo se contempla el uso del header con los colores oficiales establecidos.

- Guinda *(imagen: `Encabezado versión escritorio guinda`)*
- Verde *(imagen: `Encabezado versión escritorio verde`)*

### Ejemplos de uso
*(Imágenes: `ejemplo de encabezado versión escritorio en color guinda`, `ejemplo de encabezado versión móvil en color guinda`, `ejemplo de encabezado versión escritorio en color verde`, `ejemplo de encabezado versión móvil en color verde`)*

### Reglas de implementación
El encabezado se construye sobre una retícula de 12 columnas con un ancho base de 1440px en escritorio y de 4 columnas con ancho base de 375px en dispositivos móviles. En resoluciones superiores a 1440px, el fondo se extiende para cubrir todo el ancho disponible, mientras el contenido permanece centrado y limitado al área definida, asegurando coherencia visual. En resoluciones menores, el contenido se adapta al espacio manteniendo márgenes y distribución. Para pantallas inferiores a 699px, se activa la versión móvil.

*(Imágenes: `ejemplo de implementación versión escritorio`, `ejemplo de implementación versión móvil`)*

---

## 2. Diseño

### Anatomía
- **Navbar**
  - Color de fondo: `presidencia guinda - 950`, `presidencia verde - 900`
  - Ancho: `1440 px` | Ancho mínimo: `700 px` | Alto: `80 px`
- **Logo/Logo Gobierno 2025**
  - Depende de: `Logo/Gobierno de mexico`
  - Estilo: `Blanco` | Orientación: `Horizontal`
- **Button**
  - Depende de: `Button`
  - Jerarquía: `Ghost` | Estado: `Default` | Tamaño: `Normal`
- **Envolvente**
  - Color de fondo: `presidencia guinda - 950`, `presidencia verde - 900`
  - Ancho: `375 px` | Ancho máximo: `699 px` | Alto: `56 px`
  - `Logo/Logo Gobierno 2025` Depende de: `Logo/Gobierno de mexico` | Estilo: `Blanco` | Orientación: `Horizontal`
  - `Icon` Depende de: `General/Menu`

*(Imágenes: `Anatomía de encabezado`, `Construcción de UI encabezado móvil envolvente`, `Anatomía de barra de navegación superior versión móvil`)*

### Estados
- **Envolvente**
  - Color de fondo: `presidencia guinda - 950`, `presidencia verde - 900`
  - Ancho: `375 px` | Alto: `56 px`
  - Drop shadow: `Drop LV 2`, `Drop LV 3 (0px 6px 12px 0px #000000)`
  - `Logo/Logo Gobierno 2025` Depende de: `Logo/Gobierno de mexico` | Estilo: `Blanco` | Orientación: `Horizontal`
  - `Icon` Depende de: `Estatus/Close`
- **Fila**
  - Color de Borde: `neutro - 400` | Tamaño del borde: `1 px`
  - `Button` Depende de: `Button` | Jerarquía: `Ghost` | Estado: `Default` | Tamaño: `Normal`
- **Menú expandido**
  - `NavbarMovil` Dirección: `Horizontal` | Alineación: `Medio, espaciado equitativamente` | Cambio de tamaño vertical: `Fijo` | Cambio de tamaño horizontal: `Fijo` | Espacio arriba: `12 px` | Espacio del botón: `12 px` | Espacio izquierda: `16 px` | Espacio derecha: `16 px`

### Construcción de UI
- **Envolvente:** Dirección: `Horizontal` | Alineación: `Centro medio` | Cambio de tamaño vertical: `Fijo` | Cambio de tamaño horizontal: `Fijo` | Espaciado de elementos: `24 px` | Espacio arriba: `8 px` | Espacio del botón: `8 px` | Espacio izquierda: `56 px` | Espacio derecha: `56 px`
- **Logotipo:** Dirección: `Horizontal` | Alineación: `Medio, espaciado equitativamente` | Cambio de tamaño vertical: `Hug` | Cambio de tamaño horizontal: `Fill`
- **Botones:** Dirección: `Horizontal` | Alineación: `Centro derecha` | Cambio de tamaño vertical: `Hug` | Cambio de tamaño horizontal: `Fill` | Espaciado de elementos: `16 px`

### Estados (Construcción UI móvil)
- **Envolvente:** Dirección: `Horizontal` | Alineación: `Medio, espaciado equitativamente` | Cambio de tamaño vertical: `Fijo` | Cambio de tamaño horizontal: `Fijo` | Espacio arriba: `12 px` | Espacio del botón: `12 px` | Espacio izquierda: `16 px` | Espacio derecha: `16 px`
- **Envolvente:** Dirección: `Vertical` | Alineación: `Arriba a la izquierda` | Cambio de tamaño vertical: `Hug` | Cambio de tamaño horizontal: `Fijo`
- **Menu:** Dirección: `Horizontal` | Alineación: `Medio, espaciado equitativamente` | Cambio de tamaño vertical: `Hug` | Cambio de tamaño horizontal: `Fijo` | Espaciado: `16 px`
- **Fila:** Dirección: `Horizontal` | Alineación: `Medio, espaciado equitativamente` | Cambio de tamaño vertical: `Hug` | Cambio de tamaño horizontal: `Fijo` | Espaciado: `16 px`

*(Imágenes: `Anatomía de encabezado`, `Construcción menu envolvente`, `Construcción de UI encabezado móvil envolvente solo fila`)*

---

## 3. Desarrollo

### Integración
El encabezado institucional es un componente del SND que se inserta con una sola etiqueta. Su diseño, enlaces y comportamiento responsivo se publican de forma centralizada: cuando el SND lo actualiza, el cambio llega a tu sitio sin modificar tu código.

**Requisito:** la página debe tener el cargador del SND dentro de `<head>`. Consulta cómo agregarlo en [Comenzar](../snd-comenzar.md). El tema de color (guinda o verde) se define en el cargador con `data-tema`, no en el encabezado.

### Sin autocarga
Por defecto, el cargador del SND agrega el encabezado y el pie de página de forma automática cuando la página no los incluye. Si tu institución cuenta con autorización para no usar la autocarga, agrega `data-autocarga="false"` a la etiqueta del cargador. En ese caso, el cargador no agrega nada y debes colocar el encabezado con el código de inserción de esta sección.

```html
<script src="https://framework-gb.cdn.gob.mx/snd/v1/carga.js"
  integrity="sha384-co1XtMH+rcHM2juJRJdlpTdJfL9wAc1/EJ+71hoqFAIK4C7KEdcwhrtt8BPuwEWV"
  crossorigin="anonymous"
  data-tema="guinda"
  data-autocarga="false"
  defer></script>
```

### Código de inserción
Coloca el encabezado al inicio de `<body>` e identifica tu contenido principal con `id="mainContent"`. Usa una de las dos opciones; ambas se ven y funcionan igual.

#### Opción 1: etiqueta personalizada (recomendada)
```html
<snd-header></snd-header>
<main id="mainContent">
  ...
</main>
```

#### Opción 2: div
Para plataformas que no admiten etiquetas personalizadas, como Angular sin configuración adicional o el editor de algunos gestores de contenido.
```html
<div data-snd-componente="header"></div>
<main id="mainContent">
  ...
</main>
```

### Parámetros
- `contenido-principal` (opcional): id del elemento al que lleva el enlace "Ir al contenido principal". Si no se indica, se usa `mainContent`. En la opción 2 se escribe `data-contenido-principal`.
- **Contenido de respaldo** (opcional): lo que escribas dentro de la etiqueta solo se muestra si el componente no puede cargarse, por ejemplo un enlace a `https://www.gob.mx/`.

#### Ejemplo con parámetros
```html
<snd-header contenido-principal="contenido">
  <a href="https://www.gob.mx/">
    Gobierno de México
  </a>
</snd-header>
<div data-snd-componente="header" data-contenido-principal="contenido">
  <a href="https://www.gob.mx/">
    Gobierno de México
  </a>
</div>
```

### ¿Qué incluye?
- Enlace "Ir al contenido principal", visible al navegar con teclado.
- Logotipo del Gobierno de México con enlace al portal oficial.
- Enlace "Gobierno", que abre en ventana nueva.
- Barra fija de 58 px de alto que reserva su espacio para no cubrir el contenido.
- Diseño responsivo para escritorio y móvil.

### Reglas de uso
- Coloca un solo encabezado por página.
- Si la página tiene la etiqueta `<snd-header>` y también el `div`, se usa la etiqueta y el `div` se ignora.
- No agregues estilos ni scripts propios al encabezado: su diseño está aislado y se actualiza desde el SND.

### Angular
Angular solo acepta en sus plantillas las etiquetas que conoce. Para usar `<snd-header>`, agrega `CUSTOM_ELEMENTS_SCHEMA` en el componente que la contiene, o usa la opción 2. También puedes colocarla en `src/index.html`, fuera de la aplicación.

```typescript
import { Component, CUSTOM_ELEMENTS_SCHEMA } from "@angular/core";

@Component({
  selector: "app-root",
  schemas: [CUSTOM_ELEMENTS_SCHEMA],
  templateUrl: "./app.html",
})
export class App {}
```
