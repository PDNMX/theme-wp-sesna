# Sistema Nacional de Diseño (SND) – Componente: Divisor (`divider`)

- **Fuente:** https://www.snd.gob.mx/componentes/divisor
- **Título de la página:** Divisor (divider) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Elemento gráfico que divide secciones de contenido.

---

## 1. Descripción

Un divisor es un componente visual que se utiliza para separar bloques de información dentro de una interfaz. Su función principal es facilitar la organización y lectura del contenido, estableciendo una separación visual entre elementos relacionados sin interrumpir la continuidad de la experiencia.

- **Uso moderado:** Emplea divisores únicamente cuando aporten claridad a la estructura. Evita utilizarlos en exceso, ya que pueden fragmentar innecesariamente el contenido y no aportar claridad a la estructura de la interfaz.
- **Separación visual clara:** Utiliza el divisor para delimitar bloques de contenido y facilitar la identificación de las distintas secciones de una interfaz.

### Variaciones
Su elección depende del nivel de énfasis que se requiera en la interfaz.
- El divisor de bajo contraste separa contenidos que forman parte de la misma información. La separación es sutil y permite mantener una relación visual cercana entre los elementos.
- El divisor de alto contraste marca una separación más evidente entre contenidos que pertenecen a bloques de información diferenciados.

- **Bajo contraste** *(imagen: `Divisor de bajo contraste horizontal y vertical`)*
- **Alto contraste** *(imagen: `Divisor de alto contraste horizontal y vertical`)*

### Ejemplos de uso
*(Imágenes: `Ejemplo de uso del divisor en versión móvil`, `Ejemplo de uso del divisor en versión escritorio`)*

### Usos no permitidos
Para garantizar coherencia visual, accesibilidad y claridad en la comunicación, se deben evitar los siguientes usos:
- Romper la coherencia visual del UI Kit, usando colores o iconos distintos.
*(Imagen: `Divisores con colores distintos a los establecidos`)*

---

## 2. Diseño

### Anatomía
*(Imagen: `Anatomía del divisor`)*
- **Divisor:** Ancho: `Llenar`
- **Línea horizontal:** Color de borde: `neutro - 600`, `neutro - 400` | Alineación de trazo: `Centro` | Ancho de borde: `1`

### Construcción UI
*(Imagen: `Construcción UI del divisor con espaciado lateral de 24`)*
- **Divisor:** Dirección: `Horizontal` | Alineación: `Centro` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Llenar` | Espaciado externo lateral: `24`

### Accesibilidad
Para garantizar que el divisor pueda ser entendido por todas las personas usuarias:
- Utilizarlo para separar o agrupar contenido relacionado, no como elemento decorativo.
- Evitar el uso excesivo de divisores, ya que pueden dificultar la identificación de la estructura del contenido.
- No utilizar cambios de grosor, color o estilo del divisor.

---

## 3. Desarrollo

### Uso del divisor en tu proyecto
El divisor se implementa mediante la etiqueta semántica `<hr>` con la clase `.divisor`. Las tecnologías de asistencia lo interpretan como un separador entre bloques de contenido.

### Estructura HTML
Clases disponibles:
- `.divisor`: divisor horizontal de bajo contraste (predeterminado).
- `.divisor--altoContraste`: cambia el color de la línea a `neutro - 600` (`var(--neutro600)`).
- `.divisor--vertical`: cambia la orientación a vertical. Requiere el atributo `aria-orientation="vertical"`.
- `.divisor--decorativo`: divisor solo visual, sin rol semántico. Se aplica sobre un `<div>` con `aria-hidden="true"`. Solo para casos excepcionales.

#### Horizontal de bajo contraste
Separa contenidos que forman parte de la misma información.
```html
<hr class="divisor" />
```

#### Horizontal de alto contraste
Marca una separación más evidente entre bloques de información diferenciados.
```html
<hr class="divisor divisor--altoContraste" />
```

#### Vertical de bajo contraste
Separa elementos colocados uno junto a otro. Dentro de un contenedor flexible ocupa toda la altura disponible.
```html
<hr class="divisor divisor--vertical" aria-orientation="vertical" />
```

#### Vertical de alto contraste
Marca una separación más evidente entre elementos colocados uno junto a otro.
```html
<hr class="divisor divisor--vertical divisor--altoContraste" aria-orientation="vertical" />
```

#### Decorativo (solo visual)
Los divisores tienen una función semántica: comunican a las tecnologías de asistencia que hay una separación entre bloques de contenido. Por eso, la opción predeterminada siempre es `<hr class="divisor">`.

El divisor decorativo es una excepción y debe usarse solo en casos poco frecuentes: cuando la separación ya la comunica la estructura del contenido (encabezados, listas, filas de una tabla o los límites de una tarjeta) y un separador adicional sería anunciado sin aportar información. No se anuncia en las tecnologías de asistencia y admite los modificadores `.divisor--altoContraste` y `.divisor--vertical` (sin `aria-orientation`).
```html
<div class="divisor divisor--decorativo" aria-hidden="true"></div>
```

### Estilos CSS
Los estilos del componente están incluidos en la hoja de estilos del Sistema Nacional de Diseño y sobrescriben los estilos globales de `<hr>`.
- **Línea:** borde superior de 1px; en la versión vertical, borde izquierdo de 1px.
- **Color:** `neutro - 400` (`var(--neutro400)`) en bajo contraste y `neutro - 600` (`var(--neutro600)`) en alto contraste.
- **Ancho:** el divisor horizontal ocupa el 100% del ancho de su contenedor, sin márgenes.
- **Altura:** el divisor vertical ocupa la altura del contenedor flexible, con una altura mínima de 48px.

### Accesibilidad
Para garantizar que el divisor pueda ser entendido por todas las personas usuarias:
- Asegurar que el divisor pueda ser interpretado y comunicado por tecnologías de asistencia.
- Utilizar la etiqueta `<hr>`, que tiene de forma nativa el rol `separator`.
- En el divisor vertical, agregar `aria-orientation="vertical"`, ya que la orientación predeterminada del separador es horizontal.
