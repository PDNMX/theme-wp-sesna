# Sistema Nacional de Diseño (SND) – Estilo: Retícula

- **Fuente:** https://www.snd.gob.mx/estilos/reticula
- **Título de la página:** Retícula | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Estructura base que organiza la disposición de filas y columnas para ayudar a la adaptación resposiva en distintos dispositivos.

---

## 1. Descripción

### Sistema de retícula
La retícula se basa en un sistema de 12 columnas que pueden responder a diferentes puntos de quiebre (*breakpoints*).
- **Filas:** Dividen y organizan el espacio vertical.
- **Columnas:** Dividen y organizan el espacio horizontal.
- **Puntos de quiebre (*breakpoints*):** Definen cómo el diseño se adapta y reorganiza según el tamaño de pantalla (*viewport*).
- **Separadores:** Definen los espacios que controlan la separación entre contenedores, filas, columnas y celdas.
  - **Márgenes (*margin*):** Espacio externo que separa un elemento de otros elementos o del borde del contenedor. Ejemplo de uso: márgenes para contenedor.
  - **Medianiles (*gap*):** Mantiene la separación entre columnas y filas.

---

## 2. Diseño

### Configuración por puntos de quiebre
- **Móvil - (XS) Extra pequeño:** Ancho de pantalla `< 576px` | Margen del contenedor: `16px` | Medianil (gap): `16px` | Ejemplo de uso: Extra pequeño con 1 y 4 columnas
- **Móvil - (SM) Pequeño:** Ancho de pantalla `< 640px` | Margen del contenedor: `16px` | Medianil (gap): `16px` | Ejemplo de uso: Pequeño con 1 y 4 columnas
- **Tableta - (MD) Mediano:** Ancho de pantalla `< 1024px` | Margen del contenedor: `24px` | Medianil (gap): `16px` | Ejemplo de uso: Mediano con 8 y 12 columnas
- **Escritorio - (LG) Largo:** Ancho de pantalla `< 1536px` | Margen del contenedor: `56px` | Medianil (gap): `24px` | Ejemplo de uso: Largo con 12 columnas
- **Escritorio - (XL) Extra largo:** Ancho de pantalla `≥ 1536px` | Margen del contenedor: `56px` | Medianil (gap): `24px` | Ejemplo de uso: Extra largo con 12 columnas

### Espaciadores
Valores asignados por puntos de quiebre.
- **Margen de contenedor (*margin*):** Espacio externo del contenedor.
- **Medianiles (*gap*):** Mantiene la separación vertical (`column-gap`) y horizontal (`row-gap`) entre columnas.

---

## 3. Desarrollo

### Puntos de quiebre (breakpoints)
El sistema define cinco puntos de quiebre. Las clases responsivas usan estos prefijos para activarse a partir del ancho indicado.

| Prefijo | Mínimo | Nivel | Descripción |
| :--- | :--- | :--- | :--- |
| `(ninguno)` | `0` | Mobile | Base. Sin prefijo. Aplica en todos los tamaños. |
| `xs` | `0` | Mobile | Explícito desde 0px. Útil para sobreescribir el collapse mobile en `columna__*` y establecer layouts desde la base. |
| `sm` | `576px` | Mobile (landscape) | Móvil horizontal y pantallas pequeñas. |
| `md` | `640px` | Tablet | Tabletas y pantallas medianas. |
| `lg` | `1024px` | Desktop | Escritorios y laptops. |
| `xl` | `1536px` | Wide | Pantallas de gran resolución. |

### Contenedor (`.contenedor`)
Centra el contenido y aplica márgenes laterales responsivos. Siempre envuelve a la retícula.

**Ejemplo:**
```html
<div class="contenedor">
  <div class="cajaFont--24">
    Contenido dentro de .contenedor
  </div>
</div>
```

**Referencia de clases:**

| Clase | Descripción |
| :--- | :--- |
| `.contenedor` | Centra el contenido. `max-width: 1416px` en XL. Márgenes: 16px (mobile) → 24px (md) → 56px (lg) → automático (xl). |
| `.contenedor--fluido` | Ancho 100%. Aplica los mismos márgenes responsivos que `.contenedor` pero sin límite de ancho máximo. |

### Grid
Contenedores CSS Grid de N columnas iguales. El gap por defecto es responsivo: 16px en mobile/tablet y 24px en desktop/wide. Los hijos directos deben llevar clase `columna__*`.

#### Grid de 12 columnas
Un grid de 12 columnas permite dividir el espacio en combinaciones de 1, 2, 3, 4, 6 y 12 partes iguales usando `columna__*`.

```html
<div class="reticulaGrid__12 gapy--16">
  <div class="columna__12">
    <div class="cajaFont--0 p--8 --center">
      columna__12
    </div>
  </div>
  <div class="columna__6">
    <div class="cajaFont--0 p--8 --center">
      columna__6
    </div>
  </div>
  <div class="columna__6">
    <div class="cajaFont--0 p--8 --center">
      columna__6
    </div>
  </div>
  <div class="columna__4">
    <div class="cajaFont--0 p--8 --center">
      columna__4
    </div>
  </div>
  <div class="columna__4">
    <div class="cajaFont--0 p--8 --center">
      columna__4
    </div>
  </div>
  <div class="columna__4">
    <div class="cajaFont--0 p--8 --center">
      columna__4
    </div>
  </div>
  <div class="columna__3">
    <div class="cajaFont--0 p--8 --center">
      columna__3
    </div>
  </div>
  <div class="columna__3">
    <div class="cajaFont--0 p--8 --center">
      columna__3
    </div>
  </div>
  <div class="columna__3">
    <div class="cajaFont--0 p--8 --center">
      columna__3
    </div>
  </div>
  <div class="columna__3">
    <div class="cajaFont--0 p--8 --center">
      columna__3
    </div>
  </div>
  <div class="columna__2">
    <div class="cajaFont--0 p--8 --center">
      columna__2
    </div>
  </div>
  <div class="columna__2">
    <div class="cajaFont--0 p--8 --center">
      columna__2
    </div>
  </div>
  <div class="columna__2">
    <div class="cajaFont--0 p--8 --center">
      columna__2
    </div>
  </div>
  <div class="columna__2">
    <div class="cajaFont--0 p--8 --center">
      columna__2
    </div>
  </div>
  <div class="columna__2">
    <div class="cajaFont--0 p--8 --center">
      columna__2
    </div>
  </div>
  <div class="columna__2">
    <div class="cajaFont--0 p--8 --center">
      columna__2
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      1
    </div>
  </div>
</div>
```

#### Grid responsivo
El grid siempre tiene 12 columnas. Los `columna__*` responsivos controlan cuántas de esas columnas ocupa cada elemento según el breakpoint. Mobile: span 12 → MD: span 6 → LG: span 3.

```html
<div class="reticulaGrid__12">
  <div class="columna__12 columna__6--md columna__3--lg">
    <div class="cajaFont--0 p--8 --center">
      A
    </div>
  </div>
  <div class="columna__12 columna__6--md columna__3--lg">
    <div class="cajaFont--0 p--8 --center">
      B
    </div>
  </div>
  <div class="columna__12 columna__6--md columna__3--lg">
    <div class="cajaFont--0 p--8 --center">
      C
    </div>
  </div>
  <div class="columna__12 columna__6--md columna__3--lg">
    <div class="cajaFont--0 p--8 --center">
      D
    </div>
  </div>
</div>
```

#### Grids de columnas fijas
Para layouts simples donde no se necesitan 12 columnas (como galerías de tarjetas o grupos de íconos) se pueden usar grids de menor cantidad de columnas directamente. Estos aplican el mismo número de columnas en todos los breakpoints; el control responsivo queda en los `columna__*`.

```html
<div class="reticulaGrid__3">
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      reticulaGrid__3 / columna__1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      reticulaGrid__3 / columna__1
    </div>
  </div>
  <div class="columna__1">
    <div class="cajaFont--0 p--8 --center">
      reticulaGrid__3 / columna__1
    </div>
  </div>
</div>
```

**Referencia de clases: contenedor**

| Clase | Descripción |
| :--- | :--- |
| `.reticulaGrid__1 … .reticulaGrid__12` | Grid de N columnas iguales en todos los breakpoints. |
| `.reticulaGrid__1--xs … .reticulaGrid__12--xs` | Establece N columnas desde 0px (sin media query). |
| `.reticulaGrid__1--sm … .reticulaGrid__12--sm` | Establece N columnas a partir de 576px. |
| `.reticulaGrid__1--md … .reticulaGrid__12--md` | Establece N columnas a partir de 640px. |
| `.reticulaGrid__1--lg … .reticulaGrid__12--lg` | Establece N columnas a partir de 1024px. |
| `.reticulaGrid__1--xl … .reticulaGrid__12--xl` | Establece N columnas a partir de 1536px. |

**Referencia de clases: gap**

| Clase | Propiedad | Valores disponibles |
| :--- | :--- | :--- |
| `.gap--*` | `gap` | `0, 2, 4, 8, 12, 16, 24, 32, 40` |
| `.gapx--*` | `column-gap` | `0, 2, 4, 8, 12, 16, 24, 32, 40` |
| `.gapy--*` | `row-gap` | `0, 2, 4, 8, 12, 16, 24, 32, 40, 48, 56, 64, 80, 96` |

**Referencia de clases: alineación**

| Clase | Propiedad | Valor |
| :--- | :--- | :--- |
| `.align-items-start` | `align-items` | `start` |
| `.align-items-end` | `align-items` | `end` |
| `.align-items-center` | `align-items` | `center` |
| `.align-items-stretch` | `align-items` | `stretch` |
| `.align-items-baseline` | `align-items` | `baseline` |
| `.place-items-center` | `place-items` | `center` |
| `.place-items-start` | `place-items` | `start` |
| `.place-items-end` | `place-items` | `end` |
| `.reticulaGrid__divider` | N/A | Agrega línea divisoria vertical entre columnas. |

### Fila
Contenedor flex con `flex-wrap: wrap`. Úsalo para distribuir elementos en una sola dirección. Funciona junto con `columna__*` para crear layouts responsivos.

**Ejemplo básico:**
```html
<div class="fila">
  <div class="columna__6">
    <div class="cajaFont--24">
      columna__6
    </div>
  </div>
  <div class="columna__3">
    <div class="cajaFont--24">
      columna__3
    </div>
  </div>
  <div class="columna__3">
    <div class="cajaFont--24">
      columna__3
    </div>
  </div>
</div>
```

**Dirección:**
```html
<div class="fila fila--columna">
  <div class="cajaFont--24">
    Elemento 1
  </div>
  <div class="cajaFont--24">
    Elemento 2
  </div>
  <div class="cajaFont--24">
    Elemento 3
  </div>
</div>
```

**Referencia de clases:**

| Clase | Propiedad | Valor / Descripción |
| :--- | :--- | :--- |
| `.fila` | `display: flex; flex-wrap: wrap` | Contenedor principal. Gap responsivo por defecto. |
| `.fila--columna` | `flex-direction` | `column` |
| `.fila--reversa` | `flex-direction` | `row-reverse` |
| `.fila--columna--reversa` | `flex-direction` | `column-reverse` |
| `.gap--*` | `gap` | `0, 2, 4, 8, 12, 16, 24, 32, 40` |
| `.gapx--*` | `column-gap` | `0, 2, 4, 8, 12, 16, 24, 32, 40` |
| `.gapy--*` | `row-gap` | `0, 2, 4, 8, 12, 16, 24, 32, 40, 48, 56, 64, 80, 96` |
| `.flex-direction-row--xs` | N/A | Restaura dirección horizontal desde 0px. Útil para deshacer un apilado definido en breakpoints menores. |
| `.flex-direction-row--sm .flex-direction-column--md .flex-direction-row--lg etc.` | N/A | Modificadores de dirección responsivos. Ejemplo: `.flex-direction-column--md` apila en columna a partir de 640px. |

### reticulaFlex
Contenedor flex sin `flex-wrap`. Úsalo para alinear elementos en una línea, como barras de acción o grupos de botones.

**Ejemplo:**
```html
<div class="reticulaFlex justify-content-space-between align-items-center">
  <div class="cajaFont--24">
    Izquierda
  </div>
  <div class="cajaFont--24">
    Derecha
  </div>
</div>
```

**Referencia de clases:**

| Clase | Propiedad | Valor |
| :--- | :--- | :--- |
| `.reticulaFlex` | `display: flex` | Contenedor flex sin wrap. Gap responsivo por defecto. |
| `.flex-direction-row` | `flex-direction` | `row` |
| `.flex-direction-column` | `flex-direction` | `column` |
| `.flex-direction-row-reverse` | `flex-direction` | `row-reverse` |
| `.flex-direction-column-reverse` | `flex-direction` | `column-reverse` |
| `.justify-content-flex-start` | `justify-content` | `flex-start` |
| `.justify-content-flex-end` | `justify-content` | `flex-end` |
| `.justify-content-center` | `justify-content` | `center` |
| `.justify-content-space-between` | `justify-content` | `space-between` |
| `.justify-content-space-around` | `justify-content` | `space-around` |
| `.justify-content-space-evenly` | `justify-content` | `space-evenly` |
| `.align-items-flex-start` | `align-items` | `flex-start` |
| `.align-items-center` | `align-items` | `center` |
| `.align-items-flex-end` | `align-items` | `flex-end` |
| `.align-items-stretch` | `align-items` | `stretch` |
| `.flex-wrap-wrap` | `flex-wrap` | `wrap` |
| `.flex-wrap-nowrap` | `flex-wrap` | `nowrap` |
| `.flex-direction-row--sm .justify-content-center--md .align-items-center--lg etc.` | N/A | Variantes responsivas de todas las clases anteriores. Patrón: `propiedad-valor--viewport`. |

### Columna
Las clases `columna__*` son hijos compartidos entre `reticulaGrid` y `fila`. Cada clase define simultáneamente dos propiedades:
- `grid-column: span N`, que activa cuando el padre es un grid CSS
- `flex: 0 0 calc(X%)`, que activa cuando el padre es un contenedor flex

El navegador aplica silenciosamente la propiedad que corresponde al contexto del padre e ignora la otra. Esto permite usar la misma clase `columna__6` en un grid o en una fila sin cambiar el HTML.

#### La misma columna en grid y en fila
`columna__6` en un `reticulaGrid__12` ocupa 6 de las 12 columnas del grid. La misma `columna__6` en una fila ocupa el 50% del ancho flex disponible. El resultado visual es el mismo; el mecanismo CSS es diferente.

```html
<p class="b2r mb--8">
  Padre:
  <code class="code">
    reticulaGrid__12
  </code>
</p>
<div class="reticulaGrid__12 mb--24">
  <div class="columna__6">
    <div class="cajaFont--0 p--8 --center">
      columna__6
    </div>
  </div>
  <div class="columna__6">
    <div class="cajaFont--0 p--8 --center">
      columna__6
    </div>
  </div>
</div>
<p class="b2r mb--8">
  Padre:
  <code class="code">
    fila
  </code>
</p>
<div class="fila">
  <div class="columna__6">
    <div class="cajaFont--0 p--8 --center">
      columna__6
    </div>
  </div>
  <div class="columna__6">
    <div class="cajaFont--0 p--8 --center">
      columna__6
    </div>
  </div>
</div>
```

#### Spans sobre 12 columnas
En un `reticulaGrid__12`, `columna__N` ocupa N de las 12 columnas disponibles.

```html
<div class="reticulaGrid__12 gapy--16">
  <div class="columna__6">
    <div class="cajaFont--0 p--8 --center">
      columna__6
    </div>
  </div>
  <div class="columna__4">
    <div class="cajaFont--0 p--8 --center">
      columna__4
    </div>
  </div>
  <div class="columna__2">
    <div class="cajaFont--0 p--8 --center">
      columna__2
    </div>
  </div>
  <div class="columna__12">
    <div class="cajaFont--0 p--8 --center">
      columna__12
    </div>
  </div>
</div>
```

#### Sangría (`columna__sangria--*`)
Fuerza el inicio en una línea específica del grid. Solo aplica en contexto grid; en una fila no tiene efecto.

```html
<div class="reticulaGrid__12">
  <div class="columna__4 columna__sangria--3">
    <div class="cajaFont--0 p--8 --center">
      columna__4 columna__sangria--3
    </div>
  </div>
  <div class="columna__4 columna__sangria--8">
    <div class="cajaFont--0 p--8 --center">
      columna__4 columna__sangria--8
    </div>
  </div>
</div>
```

#### Columnas responsivas
Aplica un span diferente según el breakpoint activo. El span de mobile aplica hasta que un modificador lo sobreescriba en un breakpoint mayor. Los modificadores responsivos funcionan igual en contexto grid y en contexto fila.

```html
<div class="reticulaGrid__12">
  <div class="columna__12 columna__6--md columna__4--lg">
    <div class="cajaFont--0 p--8 --center">
      12 → md:6 → lg:4
    </div>
  </div>
  <div class="columna__12 columna__6--md columna__4--lg">
    <div class="cajaFont--0 p--8 --center">
      12 → md:6 → lg:4
    </div>
  </div>
  <div class="columna__12 columna__12--md columna__4--lg">
    <div class="cajaFont--0 p--8 --center">
      12 → md:12 → lg:4
    </div>
  </div>
</div>
```

**Referencia de clases: tamaño**

| Clase | Descripción |
| :--- | :--- |
| `.columna__1 … .columna__12` | Span de N columnas sobre 12. En grid: `grid-column: span N`. En fila: `flex-basis` proporcional. |
| `.col-100` | Ocupa el ancho completo del contenedor en grid y flex. |
| `.flex-grow` | Crece para ocupar el espacio disponible. Solo flex. |
| `.flex-shrink` | Se encoge según el espacio disponible. Solo flex. |
| `.flex-none` | No crece ni se encoge. Tamaño fijado por su contenido. Solo flex. |
| `.columna__sangria--1 … .columna__sangria--12` | Fuerza el inicio en la línea N del grid. Solo grid. |
| `.col--divider` | Línea divisoria horizontal que ocupa el ancho completo. |
| `.order--primero` | Reordena el elemento al inicio (`order: -1`). |
| `.order--ultimo` | Reordena el elemento al final (`order: 99`). |
| `.columna__1--xs … .columna__12--xs, .flex-grow--xs, .flex-shrink--xs, .flex-none--xs` | Sobreescribe el collapse mobile desde 0px. El collapse aplica primero; estas clases lo revierten. |
| `.columna__*--sm .columna__*--md .columna__*--lg .columna__*--xl` | Variantes responsivas de todas las clases de tamaño anteriores. |

**Referencia de clases: alineación individual**

| Clase | Propiedad | Valor |
| :--- | :--- | :--- |
| `.align-self-start` | `align-self` | `flex-start` |
| `.align-self-center` | `align-self` | `center` |
| `.align-self-end` | `align-self` | `flex-end` |
| `.align-self-stretch` | `align-self` | `stretch` |
| `.justify-self-start` | `justify-self` | `start (solo grid)` |
| `.justify-self-center` | `justify-self` | `center (solo grid)` |
| `.justify-self-end` | `justify-self` | `end (solo grid)` |
| `.justify-self-stretch` | `justify-self` | `stretch (solo grid)` |
| `.place-self-center` | `place-self` | `center (solo grid)` |
