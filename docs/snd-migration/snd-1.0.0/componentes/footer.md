# Sistema Nacional de Diseño (SND) – Componente: Pie de página (`footer`)

- **Fuente:** https://www.snd.gob.mx/componentes/footer
- **Título de la página:** Pie de página (footer) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

El pie de página o footer es la sección ubicada al final de una página. Generalmente contiene información institucional, enlaces de interés y avisos legales.

---

## 1. Descripción

El pie de página (footer) es la sección que ocupa la parte inferior de una página o interfaz digital. Reúne información complementaria que no forma parte del contenido principal, pero que resulta esencial para la navegación y la confianza en el sitio.

Sus funciones principales son:
- **Informativa:** concentra recursos y datos relevantes que las personas usuarias necesitan consultar o esperan encontrar fácilmente.
- **Estructural:** delimita el final del contenido de la página, además de contribuir a la coherencia visual y organización de la interfaz.

### Enlaces
- **Sobre gob.mx**
  - ¿Qué es gob.mx? `https://www.gob.mx/que-es-gobmx`
- **Avisos y políticas**
  - Declaración de accesibilidad: `https://www.gob.mx/accesibilidad`
  - Términos y condiciones: `https://www.gob.mx/terminos`
  - Política de seguridad: `https://www.gob.mx/terminos#medidas-seguridad-informacion`
  - Aviso de privacidad: `https://www.gob.mx/aviso_de_privacidad`
- **Datos y transparencia**
  - Plataforma Nacional de Transparencia: `https://www.plataformadetransparencia.org.mx/Inicio`
  - Transparencia para el pueblo: `https://transparencia.gob.mx/home.html`
  - Plataforma Nacional de Datos Abiertos: `https://www.datos.gob.mx/`
  - Gobierno Abierto: `https://www.gobiernoabierto.gob.mx`
  - Denuncia ciudadana: `https://denuncias.gob.mx/#!/`
  - Gobierno 2018-2024: `https://www.gob.mx/amlo`

El componente puede contener hasta 20 enlaces personalizados, los cuales se mostrarán al final de la tercera columna.

- Escritorio *(imagen: `Footer versión escritorio`)*
- Móvil *(imagen: `Footer versión móvil`)*

### Estados
En la versión móvil, las secciones se muestran colapsadas en un acordeón para reducir el tamaño del componente.

- Móvil versión desplegado *(imagen: `Footer versión móvil abierto`)*

### Versiones
El footer cuenta con una variante condensada que únicamente muestra el logo del Gobierno de México y el número de versión del sistema. Adicional cuenta con dos hipervínculos uno para términos y condiciones y otro para aviso de privacidad.

Esta modalidad se utiliza exclusivamente en sistemas internos de backoffice y no son visibles para las personas ciudadanas.

*(Imágenes: `Footer versión escritorio lite`, `Footer versión móvil lite`)*

### Ejemplos de uso
*(Imágenes: `ejemplo de footer versión escritorio en color guinda`, `ejemplo de footer versión móvil en color guinda`, `ejemplo de footer versión escritorio en color verde`, `ejemplo de footer versión móvil en color verde`)*

### Reglas de implementación
El pie de página o footer se adapta a distintos tamaños de pantalla mediante una retícula que organiza y distribuye sus elementos.
- Escritorio: retícula de 12 columnas, con un ancho base de 1440 px.
- Dispositivos móviles: retícula de 4 columnas, con un ancho base de 375 px.

Comportamiento según la resolución:
- Superior a 1440 px: el fondo se extiende a todo el ancho de la pantalla, mientras que el contenido permanece centrado y limitado al área definida por la retícula
- De 700 a 1440 px: el contenido se adapta al ancho disponible, conservando los márgenes y la distribución de los elementos.
- Inferior a 699 px: se activa la versión móvil, que reorganiza el contenido según la retícula de 4 columnas.

*(Imágenes: `ejemplo de implementación versión escritorio`, `ejemplo de implementación versión móvil`)*

---

## 2. Diseño

### Anatomía
- **Footer (escritorio)**
  - Color de fondo: `presidencia guinda - 900`, `presidencia verde - 900`
  - Ancho mínimo: `700 px`
  - `Logo/Gobierno de México`: Depende de: `Logo/Gobierno de México` | Estilo: `Blanco` | Modo: `Horizontal` | Ancho: `206 px`
  - `Etiqueta`: Color de texto: `neutro - 100` | Estilo de texto: `Base/Subheading/SH1B`
  - `Cuerpo de texto`: Color de texto: `neutro - 100` | Estilo de texto: `Ag Base/Small details/SDR`, `Ag Base/Small details/SDSB`
  - `Enlaces`: Color de texto: `neutro - 100` | Estilo de texto: `Base/Small details/SDSB`
  - `Logo/079`: Depende de: `Logo/079` | Color: `Blanco` | Estilo: `Vertical`
  - `Icono RRSS`: Alto: `24 px` | Ancho: `24 px` | Color de texto: `neutro - 100` | Depende de: `Redes Sociales/facebook`, `Redes Sociales/X twitter`, `Redes Sociales/instagram`, `Redes Sociales/youtube`
- **Footer (móvil)**
  - Color de fondo: `presidencia guinda - 900`, `presidencia verde - 900`
  - Ancho: `375 px` | Ancho máximo: `699 px`
  - `Logo/Gobierno de México`: Depende de: `Logo/Gobierno de México` | Estilo: `Blanco` | Modo: `Horizontal` | Ancho: `206px`
  - `Etiqueta`: Color de texto: `neutro - 100` | Estilo de texto: `Base/Body/B1SB`
  - `Direccion/Chevron-down`: Depende de: `Direccion/Chevron-down` | Color de texto: `neutro - 100`
  - `Cuerpo de texto`: Color de texto: `neutro - 100` | Estilo de texto: `Base/Body/CTA`
  - `Icono RRSS`: Alto: `24 px` | Ancho: `24 px` | Color de texto: `neutro - 100` | Depende de: `Redes Sociales/facebook`, `Redes Sociales/X twitter`, `Redes Sociales/instagram`, `Redes Sociales/youtube`
  - `Logo/079`: Depende de: `Logo/079` | Color: `Blanco` | Estilo: `Vertical`
  - `Cuerpo de texto`: Color de texto: `neutro - 100` | Estilo de texto: `Base/Body/CTA`

*(Imágenes: `Anatomía de footer`, `Anatomía de footer versión móvil`)*

### Versiones
- **Footer (Versión 1.1 escritorio / lite / interno)**
  - Color de fondo: `presidencia guinda - 900`, `presidencia verde - 900`
  - Ancho: `1440 px` | Ancho mínimo: `700 px`
  - `Logo/Gobierno de México`: Depende de: `Logo/Gobierno de México` | Estilo: `Blanco` | Modo: `Horizontal` | Ancho: `206 px`
  - `Etiqueta`: Color de texto: `neutro - 100` | Estilo de texto: `Base/Body/B1SB`
- *(Segundo bloque)*
  - Color de fondo: `presidencia guinda - 900`, `presidencia verde - 900`
  - Ancho: `1440 px` | Ancho mínimo: `700 px`
  - `Logo/Gobierno de México`: Depende de: `Logo/Gobierno de México` | Estilo: `Blanco` | Modo: `Horizontal` | Ancho: `206 px`
  - `Etiqueta`: Color de texto: `neutro - 100` | Estilo de texto: `Base/Body/B1SB`

*(Imágenes: `Anatomía de footer Versión 1.1 escritorio`, `Anatomía de footer Versión 1.1 móvil`)*

### Estados
Definen cómo se comporta y se muestra un componente en diferentes situaciones de uso.
- **Footer**
  - Color de fondo: `presidencia guinda - 900`, `presidencia verde - 900`
  - Ancho: `375 px` | Ancho máximo: `699 px`
  - `Logo/Gobierno de México`: Depende de: `Logo/Gobierno de México` | Estilo: `Blanco` | Modo: `Horizontal` | Ancho: `206px`
  - `Etiqueta`: Color de texto: `neutro - 100` | Estilo de texto: `Base/Body/B1SB`
  - `Direccion/Chevron-down`: Depende de: `Direccion/Chevron-down` | Color de texto: `neutro - 100`
  - `Cuerpo de texto`: Color de texto: `neutro - 100` | Estilo de texto: `Ag Base/Small details/SDR`, `Ag Base/Small details/SDSB`
  - `Enlaces`: Color de texto: `neutro - 100` | Estilo de texto: `Base/Small details/SDSB`
  - `Cuerpo de texto`: Color de texto: `neutro - 100` | Estilo de texto: `Base/Body/BR2`
  - `Logo/079`: Depende de: `Logo/079` | Color: `Blanco` | Estilo: `Vertical`
  - `Icono RRSS`: Alto: `24 px` | Ancho: `24 px` | Color de texto: `neutro - 100` | Depende de: `Redes Sociales/facebook`, `Redes Sociales/X twitter`, `Redes Sociales/instagram`, `Redes Sociales/youtube`

*(Imagen: `Estados de los componentes que forman parte del footer`)*

### Construcción de UI
- **Footer (escritorio):** Dirección: `Horizontal` | Alineación: `Arriba, espaciado equitativamente` | Cambio de tamaño vertical: `Hug` | Cambio de tamaño horizontal: `Fixed` | Espacio arriba: `32 px` | Espacio abajo: `32 px` | Espacio izquierda: `56 px` | Espacio derecha: `56 px`
- **Logo:** Dirección: `Vertical` | Alineación: `Top left` | Cambio de tamaño vertical: `Hug` | Cambio de tamaño horizontal: `Fill` | Espacio derecha: `12 px`
- **Enlaces:** Dirección: `Vertical` | Alineación: `Top left` | Cambio de tamaño vertical: `Hug` | Cambio de tamaño horizontal: `Fill` | Espaciado de elementos: `24 / 8 px` | Espacio izquierda: `12 px` | Espacio derecha: `12 px` | Item spacing: `8 px`
- **Footer (móvil):** Dirección: `Vertical` | Alineación: `Top left` | Cambio de tamaño vertical: `Hug` | Cambio de tamaño horizontal: `Fixed` | Espaciado de elementos: `32 / 16 / 8 px` | Espacio arriba: `24 / 16 px` | Espacio abajo: `24 / 16 px` | Espacio izquierda: `24 / 16 px` | Espacio derecha: `24 / 16 px`

*(Imágenes: `Construcción de UI footer (logo)`, `Construcción de UI footer versión móvil`)*

### Accesibilidad
Para garantizar una comunicación accesible, considera los siguientes criterios:
- Organizar los enlaces por categorías, con títulos que permitan identificar cada sección.
- Asegurar que el contenido sea legible y funcional en diferentes tamaños de pantalla, sin desplazamiento horizontal innecesario.
- Verificar que las áreas de interacción estén lo suficientemente amplias y separadas para facilitar el uso en dispositivos táctiles.

---

## 3. Desarrollo

### Integración
El pie de página institucional es un componente del SND que se inserta con una sola etiqueta. Su diseño, enlaces institucionales y comportamiento responsivo se publican de forma centralizada: cuando el SND lo actualiza, el cambio llega a tu sitio sin modificar tu código.

**Requisito:** la página debe tener el cargador del SND dentro de `<head>`. Consulta cómo agregarlo en [Comenzar](../snd-comenzar.md). El tema de color (guinda o verde) se define en el cargador con `data-tema`, no en el pie de página.

Coloca el pie de página al final de `<body>` y elige una de sus tres variantes. Cada una puede escribirse como etiqueta personalizada (opción 1, recomendada) o como `div` (opción 2), para plataformas que no admiten etiquetas personalizadas. Ambas opciones se ven y funcionan igual.

### Sin autocarga
Por defecto, el cargador del SND agrega el encabezado y el pie de página de forma automática cuando la página no los incluye. Si tu institución cuenta con autorización para no usar la autocarga, agrega `data-autocarga="false"` a la etiqueta del cargador. En ese caso, el cargador no agrega nada y debes colocar el pie de página con el código de inserción de esta sección.

```html
<script src="https://framework-gb.cdn.gob.mx/snd/v1/carga.js"
  integrity="sha384-co1XtMH+rcHM2juJRJdlpTdJfL9wAc1/EJ+71hoqFAIK4C7KEdcwhrtt8BPuwEWV"
  crossorigin="anonymous"
  data-tema="guinda"
  data-autocarga="false"
  defer></script>
```

### Variante extendida
Pie de página completo para sitios dirigidos a la ciudadanía: escudo, descripción de gob.mx, avisos y políticas, datos y transparencia, redes sociales y línea 079.

#### Opción 1: etiqueta personalizada
```html
<snd-footer></snd-footer>
```

#### Opción 2: div
```html
<div data-snd-componente="footer"></div>
```

### Enlaces personalizados
La variante extendida admite hasta 20 enlaces personalizados. Escríbelos como etiquetas `<a>` directamente dentro del pie de página; aparecen en la sección "Enlaces internos". Si no agregas ninguno, esa sección no se muestra.
- `href`: solo se aceptan direcciones `https`, `http` o relativas a tu sitio. Cualquier otra se descarta.
- `target="_blank"` (opcional): abre el enlace en una ventana nueva.
- El texto del enlace se muestra tal cual; no admite HTML.
- Si escribes más de 20 enlaces, solo se muestran los primeros 20.

#### Opción 1: etiqueta personalizada
```html
<snd-footer>
  <a href="/inicio">
    Enlace personalizado 1
  </a>
  <a href="https://www.gob.mx/" target="_blank">
    Enlace personalizado 2
  </a>
</snd-footer>
```

#### Opción 2: div
```html
<div data-snd-componente="footer">
  <a href="/inicio">
    Enlace personalizado 1
  </a>
  <a href="https://www.gob.mx/" target="_blank">
    Enlace personalizado 2
  </a>
</div>
```

### Variante lite
Muestra solo el escudo y la línea 079. Úsala en páginas que no requieren el pie de página completo. No tiene parámetros.

#### Opción 1: etiqueta personalizada
```html
<snd-footer-lite></snd-footer-lite>
```

#### Opción 2: div
```html
<div data-snd-componente="footer-lite"></div>
```

### Variante interna
Para sistemas internos o de back office: muestra el escudo, la versión de tu sistema y los enlaces a Términos y condiciones y Aviso de privacidad.
- `version` (opcional): versión de tu sistema; se muestra como "Versión 1.0.0". Si no se indica, no aparece. En la opción 2 se escribe `data-version`.

#### Opción 1: etiqueta personalizada
```html
<snd-footer-interno version="1.0.0"></snd-footer-interno>
```

#### Opción 2: div
```html
<div data-snd-componente="footer-interno" data-version="1.0.0"></div>
```

### Contenido de respaldo
En cualquier variante puedes escribir contenido dentro de la etiqueta que solo se muestra si el componente no puede cargarse. Usa un párrafo, para que no se confunda con los enlaces personalizados.

```html
<snd-footer-lite>
  <p>
    Gobierno de México —
    <a href="https://www.gob.mx/">
      gob.mx
    </a>
  </p>
</snd-footer-lite>
```

### Reglas de uso
- Coloca un solo pie de página por página, de cualquiera de las tres variantes.
- Si la página tiene una etiqueta `<snd-footer…>` y también un `div`, se usa la etiqueta y el `div` se ignora.
- No agregues estilos ni scripts propios al pie de página: su diseño está aislado y se actualiza desde el SND.

### Angular
Angular solo acepta en sus plantillas las etiquetas que conoce. Para usar las etiquetas del pie de página, agrega `CUSTOM_ELEMENTS_SCHEMA` en el componente que las contiene, o usa la opción 2. También puedes colocarlas en `src/index.html`, fuera de la aplicación.

```typescript
import { Component, CUSTOM_ELEMENTS_SCHEMA } from "@angular/core";

@Component({
  selector: "app-root",
  schemas: [CUSTOM_ELEMENTS_SCHEMA],
  templateUrl: "./app.html",
})
export class App {}
```
