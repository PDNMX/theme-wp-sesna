# Sistema Nacional de Diseño (SND) – Componente: Texturas (`textures`)

- **Fuente:** https://www.snd.gob.mx/componentes/texturas
- **Título de la página:** Texturas (textures) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Incorpora detalles visuales en superficies y componentes para generar diferenciación y enriquecer la composición de la interfaz.

---

## 1. Descripción

Es la textura oficial del Gobierno de México 2024-2030. Las texturas son recursos visuales que permiten aportar detalle, profundidad y diferenciación a las superficies o componentes de una interfaz. Su función principal es complementar la composición visual sin interferir con la legibilidad ni con la interacción de la persona usuaria.

Para obtener más información sobre el uso y las especificaciones de las texturas, consulta la Guía de Identidad Gráfica 2024-2030 del Gobierno de México.

*(Imagen: `Ejemplo de texturas`)*

- **Uso como elemento complementario:** Las texturas deben utilizarse para enriquecer la composición visual y aportar diferenciación, sin convertirse en el elemento principal de la interfaz.
- **No interferir con el contenido:** Evita utilizar texturas detrás de textos, controles o elementos interactivos cuando puedan afectar su legibilidad, identificación o comprensión.
- **Uso moderado:** Evita combinar múltiples texturas o aplicarlas de manera excesiva. Su uso debe responder a una necesidad visual específica y mantener una composición limpia y equilibrada.

Utiliza las texturas de manera consistente con el lenguaje visual del sistema, especialmente sobre fondos neutros o composiciones con poco contenido.

### Colores
*(Imágenes: `Imagén de textura con color guinda`, `Imagén de textura con color verde`, `Imagén de textura con color dorada`, `Imagén de textura con color blanca`)*

### Ejemplos de uso
*(Imagen: `Ejemplos de uso`)*

### Usos no permitidos
Para garantizar coherencia visual y claridad en la comunicación, se deben evitar las siguientes situaciones:
- Usar múltiples texturas en una misma composición.
- Que la textura invada elementos, sature el espacio o interfiera con el contenido.
- Romper la coherencia visual del UI Kit, usando colores o formas distintas.
*(2 imágenes con alt `Usos no permitidos`)*

---

## 2. Diseño

### Anatomía
*(Imagen: `Anatomía de una textura blanca`)*
- **Color de fondo:** Alto: `ajustable al contenido` | Ancho: `ajustable al contenido` | Color de fondo: `neutro - 100`, `presidencia verde - 900`, `presidencia guinda - 900`, `presidencia dorado - 600`

### Construcción UI
*(Imagen: `Construcción UI de la textura con sus propiedades de degradado`)*
- **Textura:**
  - Tipo de degradado: `Lineal`
  - Ángulo de degradado: `45º`
  - Opacidad: `50%`
  - Modo de fusión: `Luminosidad`
  - Color de fondo: `neutro - 600`
  - Color posición 0%: `neutro - 600 - opacidad 0%`
  - Color posición 50%: `neutro - 600 - opacidad 5%`
  - Color posición 100%: `neutro - 600 - opacidad 50%`

### Accesibilidad
Las personas usuarias deberán poder utilizar la tecnología de asistencia para:
- **Contraste:** la textura no debe reducir el contraste del texto que esté sobre ella.
- **Componentes y estados de interacción:** la textura tampoco debe dificultar distinguir componentes como botones y sus estados de interacción.
- **Enfoque visible:** cuando una persona usuaria navega por la interfaz con el teclado, las texturas no deben dificultar la identificación de los elementos seleccionados.
- **Relación de contraste:** los textos de tamaño regular deben mantener un contraste de 4.5:1 con respecto a la textura de fondo, mientras que para los títulos se debe mantener de 3:1.

---

## 3. Desarrollo

### Utiliza una textura en tu proyecto
La textura solo necesita la hoja de estilos del SND; no requiere JavaScript ni imágenes en el HTML. Se aplica como clase a cualquier contenedor (por ejemplo, una sección, un encabezado o el fondo de una página de inicio de sesión), de la siguiente forma:
- `.textura` contenedor con textura. Dibuja el patrón en un `::before` decorativo detrás del contenido, con un degradado lineal a 45° de `neutro - 600`, opacidad de 50% y modo de fusión luminosidad. Sin modificador de color, usa el fondo blanco.
- `.textura--blanca`, `.textura--guinda`, `.textura--verde` y `.textura--dorada` definen el color de fondo y el color de texto que mantiene el contraste.
- `.textura--normal`, `.textura--mediano` y `.textura--grande` definen el tamaño del mosaico del patrón. Si no se indica, se usa el tamaño normal.

El contenedor no define espaciado ni tamaño: agrégalos con las clases de caja o de layout del SND, por ejemplo `.cajaBasica--24`.

### Para una buena accesibilidad
- **Elemento decorativo:** la textura se dibuja con CSS, por lo que las tecnologías de asistencia no la anuncian. No agregues imágenes de textura con `img` ni textos alternativos para ella.
- **Contraste:** los textos de tamaño regular deben mantener un contraste de 4.5:1 con respecto a la textura de fondo, y los títulos de 3:1. Cada modificador de color ya asigna un color de texto que cumple con estos valores; no lo cambies sin verificar el contraste.
- **Componentes y estados:** no coloques la textura directamente detrás de controles o elementos interactivos. Colócalos dentro de una caja con fondo sólido para que sus estados de interacción se distingan.
- **Enfoque visible:** la textura no debe dificultar la identificación del elemento enfocado al navegar con el teclado.
- **Preferencias de la persona usuaria:** la textura se oculta automáticamente cuando el sistema solicita mayor contraste (`prefers-contrast: more`) o usa colores forzados (`forced-colors: active`).

### Colores

#### Textura blanca
Fondo `neutro - 100` con texto `neutro - 800`. Es la textura por defecto.
```html
<section class="textura textura--blanca cajaBasica--24">
  <h3 class="sh1b">
    Título de la sección
  </h3>
  <p class="m--0">
    Texto de apoyo sobre la textura blanca.
  </p>
</section>
```

#### Textura guinda
Fondo `presidencia guinda - 900` con texto `neutro - 100`.
```html
<section class="textura textura--guinda cajaBasica--24">
  <h3 class="sh1b">
    Título de la sección
  </h3>
  <p class="m--0">
    Texto de apoyo sobre la textura guinda.
  </p>
</section>
```

#### Textura verde
Fondo `presidencia verde - 900` con texto `neutro - 100`.
```html
<section class="textura textura--verde cajaBasica--24">
  <h3 class="sh1b">
    Título de la sección
  </h3>
  <p class="m--0">
    Texto de apoyo sobre la textura verde.
  </p>
</section>
```

#### Textura dorada
Fondo `presidencia dorado - 600` con texto `neutro - 800`. El texto blanco no alcanza el contraste mínimo de 4.5:1 sobre este color.
```html
<section class="textura textura--dorada cajaBasica--24">
  <h3 class="sh1b">
    Título de la sección
  </h3>
  <p class="m--0">
    Texto de apoyo sobre la textura dorada.
  </p>
</section>
```

### Tamaño del patrón
El tamaño del mosaico se define con una clase, que se agrega junto a `.textura` y al color. Cada tamaño es 25% más grande que el anterior:
- `.textura--normal`: mosaico de 286 px. Es el tamaño por defecto, por lo que la clase es opcional.
- `.textura--mediano`: mosaico de 358 px.
- `.textura--grande`: mosaico de 448 px.

Elige el tamaño según la superficie: el normal para secciones y tarjetas, y los tamaños mediano y grande para superficies amplias, como encabezados o fondos de página completa, donde un patrón pequeño se repetiría demasiadas veces.

#### Normal
Tamaño por defecto. Puedes omitir la clase `.textura--normal`.
```html
<section class="textura textura--verde textura--normal cajaBasica--24">
  <h3 class="sh1b">
    Título de la sección
  </h3>
  <p class="m--0">
    Mosaico normal (286 px).
  </p>
</section>
```

#### Mediano
Agrega la clase `.textura--mediano`.
```html
<section class="textura textura--verde textura--mediano cajaBasica--24">
  <h3 class="sh1b">
    Título de la sección
  </h3>
  <p class="m--0">
    Mosaico mediano (358 px).
  </p>
</section>
```

#### Grande
Agrega la clase `.textura--grande`.
```html
<section class="textura textura--verde textura--grande cajaBasica--24">
  <h3 class="sh1b">
    Título de la sección
  </h3>
  <p class="m--0">
    Mosaico grande (448 px).
  </p>
</section>
```
