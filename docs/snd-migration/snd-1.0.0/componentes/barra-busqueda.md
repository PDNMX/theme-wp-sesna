# Sistema Nacional de Diseño (SND) – Componente: Barra de búsqueda (`search bar`)

- **Fuente:** https://www.snd.gob.mx/componentes/barra-busqueda
- **Título de la página:** Barra de búsqueda (search bar) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Permite introducir texto para localizar información o contenidos específicos.

---

## 1. Descripción

### Variaciones
- **Barra de búsqueda para landings:** Se utiliza específicamente en las ventanillas de trámites.
  - Versión desktop *(imagen: `barra de búsqueda principal`)*
  - Versión móvil *(imagen: `barra de búsqueda principal versión móvil`)*
- **Barra de búsqueda input:** El campo de búsqueda se utiliza en cualquier pantalla donde el usuario necesite localizar información, contenidos o funciones específicas.
  - Versión desktop *(imagen: `barra de búsqueda secundaria`)*
  - Versión móvil *(imagen: `barra de búsqueda secundaria versión móvil`)*

### Estados
Definen cómo se comporta y se muestra un componente en diferentes situaciones de uso.
- Default *(imagen: `barra de búsqueda en estado default`)*
- Focus *(imagen: `barras de búsqueda en estado focus`)*
- Active *(imagen: `barras de búsqueda estado active`)*
- Filled *(imagen: `barras de búsqueda estado filled`)*

### Ejemplos de uso
Localizar un servicio en el buscador de trámites federales y programas sociales. *(imágenes: `ejemplo de barra de búsqueda versión desktop`, `ejemplo de barra de búsqueda versión móvil`)*

### Usos no permitidos
- Ejecutar funciones ajenas a la búsqueda, como comandos o acciones no relacionadas.
- Mostrar mensajes poco claros o sin relación con la búsqueda.
- Romper la coherencia visual del UI Kit, usando colores, tipografía o iconos distintos.
*(Imagen: `ejemplo de barra de búsqueda en la que se aplica un uso no permitido`)*

### Reglas de implementación
Es una herramienta clave que facilita la navegación, permitiendo que los usuarios encuentren lo que buscan de forma directa, sin tener que recorrer todo el contenido.
- **Rapidez y eficiencia:** Los usuarios pueden obtener lo que necesitan en segundos, sin perder tiempo buscando manualmente.
- **Mejora la experiencia:** Al ofrecer un acceso fácil y directo a la información, se reduce la frustración y se mejora la satisfacción del usuario.
- **Accesibilidad:** Facilita la navegación para todo tipo de usuarios, incluyendo aquellos con limitaciones o menos familiarizados con el sitio.
*(Imagen: `ejemplo de reglas de implementación en Apps Estatales`)*

---

## 2. Diseño

### Barra de búsqueda input — Anatomía
*(Imágenes: `descripción puntual de los elementos de la barra de búsqueda`, `descripción puntual de los elementos de la barra de búsqueda secundaria`)*
- **Primer variante (landing):**
  - **Envolvente:** Color de fondo: `neutro - 100` | Sombra: `Drop LV 3 (0px 6px 12px 0px #000000)` | Radio de borde: `100`
  - **Texto:** Color de texto: `neutro - 500` | Estilo del texto escritorio: `Base/Subheading/SH0R` | Estilo del texto móvil: `Base/Body/B1R`
  - **Envolvente Icono:** Color de fondo: `presidencia guinda - 900`, `presidencia verde - 900`
  - **Icono:** Nombre de icono: `IC/Search`
- **Segunda variante (input):**
  - **Envolvente:** Ancho: `Variable` | Color de fondo: `neutro - 200` | Color de borde: `neutro - 400` | Radio de borde: `100` | Radio de borde: `1` | Orientación de borde: `Por dentro`
  - **IC/Search:** Depende de: `IC/Search`
  - **Texto:** Color de texto: `neutro - 500` | Estilo del texto escritorio: `Base/Subheading/SH1R` | Estilo del texto móvil: `Base/Body/B1R`

### Estados
Definen cómo se comporta y se muestra un componente en diferentes situaciones de uso.

*(Nota: la página muestra cuatro grupos de estados correspondientes a las variantes desktop/móvil de landing e input)*:
1. **Landing desktop** *(imágenes: `Barra de landing en estado focus`, `Barra de landing en estado filled`)*:
   - **Focus:** `BarradeBusqueda` Ancho de borde: `2` | Alineación de borde: `Hacia dentro` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900`
   - **Active:** `BarradeBusqueda` Ancho de borde: `2` | Alineación de borde: `Hacia dentro` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900` | `Close-circle` Depende de: `Close-circle` | Color: `presidencia guinda - 900`, `presidencia verde - 900` | Alto: `32` | Ancho: `32` | `ComboBox` Depende de: `ComboBox`
   - **Filled:** `BarradeBusqueda` Ancho de borde: `2` | Alineación de borde: `Hacia dentro` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900` | `Close-circle` Depende de: `Close-circle` | Color: `presidencia guinda - 900`, `presidencia verde - 900` | Alto: `32` | Ancho: `32` | `Texto` Color de texto: `Neutro - 800` | Estilo del texto escritorio: `Base/Subheading/SH0R`
2. **Input desktop** *(imágenes: `Barra de landing en estado focus`, `Barra de landing en estado active`, `Barra de landing en estado filled`)*:
   - **Focus:** `BarradeBusqueda` Ancho de borde: `2` | Alineación de borde: `Hacia dentro` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900`
   - **Active:** `BarradeBusqueda` Ancho de borde: `1` | Alineación de borde: `Hacia dentro` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900` | `Texto` Color de texto: `Neutro - 800` | Estilo del texto escritorio: `Base/Subheading/SH1R` | `Close-circle` Depende de: `Close-circle` | Color: `presidencia guinda - 900`, `presidencia verde - 900` | Alto: `24` | Ancho: `24`
   - **Filled:** `BarradeBusqueda` Ancho de borde: `1` | Alineación de borde: `Hacia dentro` | Color de borde: `neutro - 400` | `Texto` Color de texto: `Neutro - 800` | Estilo del texto escritorio: `Base/Subheading/SH1R` | `Close-circle` Depende de: `Close-circle` | Color: `presidencia guinda - 900`, `presidencia verde - 900` | Alto: `24` | Ancho: `24`
3. **Input móvil / responsiva** *(imágenes: `Barra de landing en estado focus`, `Barra de busqueda responsiva en estado active`, `Barra de busqueda responsiva en estado filled`)*:
   - **Focus:** `BarradeBusqueda` Ancho de borde: `2` | Alineación de borde: `Hacia dentro` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900`
   - **Active:** `BarradeBusqueda` Ancho de borde: `1` | Alineación de borde: `Hacia dentro` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900` | `Texto` Color de texto: `neutro - 800` | Estilo del texto: `Base/Body/B1R` | `Close-circle` Depende de: `Close-circle` | Color: `presidencia guinda - 900`, `presidencia verde - 900` | Alto: `24` | Ancho: `24`
   - **Filled:** `BarradeBusqueda` Ancho de borde: `1` | Alineación de borde: `Hacia dentro` | Color de borde: `neutro - 400` | `Texto` Color de texto: `neutro - 800` | Estilo del texto: `Base/Body/B1R` | `Close-circle` Depende de: `Close-circle` | Color: `presidencia guinda - 900`, `presidencia verde - 900` | Alto: `24` | Ancho: `24`
4. **Landing móvil / responsiva** *(imágenes: `Barra de busqueda landing responsiva en estado focus`, `Barra de busqueda landing responsiva en estado active`, `Barra de busqueda landing responsiva en estado filled`)*:
   - **Focus:** `BarradeBusqueda` Ancho de borde: `2` | Alineación de borde: `Hacia dentro` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900`
   - **Active:** `BarradeBusqueda` Ancho de borde: `1` | Alineación de borde: `Hacia dentro` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900` | `Close-circle` Depende de: `Close-circle` | Color: `presidencia guinda - 900`, `presidencia verde - 900` | Alto: `24` | Ancho: `24` | `ComboBox` Depende de: `ComboBox` | `Texto` Color de texto: `neutro - 800` | Estilo del texto: `Base/Body/B1R`
   - **Filled:** `BarradeBusqueda` Ancho de borde: `1` | Alineación de borde: `Hacia dentro` | Color de borde: `presidencia guinda - 900`, `presidencia verde - 900` | `Close-circle` Depende de: `Close-circle` | Color: `presidencia guinda - 900`, `presidencia verde - 900` | Alto: `24` | Ancho: `24` | `Texto` Color de texto: `neutro - 800` | Estilo del texto: `Base/Body/B1R`

### Construcción de UI desktop
- `BarradeBusqueda`: Dirección: `Horizontal` | Alineación: `Automática` | Padding left: `32`
- `Envolvente icono`: Dirección: `Vertical` | Alineación: `Centro` | Altura: `72` | Horizontal resizing: `Hug` | Item spacing: `10` | Padding top: `16` | Padding bottom: `16` | Padding left: `24` | Padding right: `24`
*(Imágenes: `Esquema de la construcción de la barra de búsqueda`, `Esquema de la construcción del icono de búsqueda`)*

### Construcción de UI mobile
- `BarradeBusqueda`: Dirección: `Horizontal` | Alineación: `Middle left` | Vertical resizing: `Hug` | Horizontal resizing: `Fixed` | Item spacing: `8` | Padding left: `16`
- `Envolvente icono`: Dirección: `Vertical` | Alineación: `Top left` | Vertical resizing: `Hug` | Horizontal resizing: `Hug` | Item spacing: `10` | Padding top: `8` | Padding bottom: `8` | Padding left: `16` | Padding right: `16`
*(Imágenes: `Esquema de la construcción de la barra de búsqueda`, `Esquema de las proporciones del icono de búsqueda`)*

---

## 3. Desarrollo

### Utiliza la barra de búsqueda dependiendo del contexto

#### Barra de búsqueda en páginas de inicio
La barra de búsqueda para páginas de inicio utiliza un botón con fondo de color `--principal` integrado dentro del diseño. Siempre debe llevar un texto `placeholder` como ejemplo del texto que se espera en este campo.

El mecanismo de texto predictivo utiliza una lista con posición absoluta (`position:absolute`) con respecto al contenedor principal, de otra manera al aparecer las sugerencias empujarían el contenido de la página hacia abajo.

##### Accesibilidad
Aunque `<label>` no es visible, se necesita para preservar la accesibilidad. Utiliza la clase `.oculto` para ocultarlo visualmente, pero mantenerlo disponible para lectores de pantalla.

La etiqueta `<input>` tiene el atributo `aria-haspopup="listbox"` para indicar a los dispositivos de asistencia que el `<input>` despliega una lista de opciones.

##### Versión móvil
En versión móvil, la barra de búsqueda deberá adaptarse al tamaño de la ventana del navegador, resolviendo todo el redimensionamiento del componente por medio de las hojas de estilo con los siguientes puntos de interrupción (breakpoints):
- `@media (min-width: < 640px)` para dispositivos móviles
- `@media (min-width: 640px)` para tabletas
- `@media (min-width: 1024px)` para computadoras portátiles, de escritorio y pantallas mayores

```html
<form class="search-container" style="width: 100%">
  <label for="search-main" class="oculto">
    Busca actividades o servicios
  </label>
  <div class="form__inset main-search">
    <input type="search" id="search-main" placeholder="Ejemplo: actividades turístico recreativas" class="sh0r js-input" autocomplete="off" aria-expanded="false" aria-haspopup="listbox" />
    <button class="search-button" type="submit">
      <span class="oculto">
        Buscar
      </span>
      <i class="snd__icono snd-search icono--32 color--blanco" aria-hidden="true"></i>
    </button>
  </div>
  <ul id="search-suggestions" class="suggestions-list js-list is-hidden" role="listbox">
    <li role="option">
      Senderismo en la montaña
    </li>
    <li role="option">
      Rutas gastronómicas
    </li>
    <li role="option">
      Tours en bicicleta
    </li>
    <li role="option">
      Avistamiento de aves
    </li>
  </ul>
</form>
```

#### Barra de búsqueda para secciones internas
En secciones internas, la barra de búsqueda no lleva el botón de búsqueda, así que la búsqueda se ejecuta por medio de la tecla ENTER, para que esto funcione el componente se debe envolver dentro de un `<form>` de esta manera el navegador entiende que la tecla ENTER dispara el evento `submit`.

Al carecer de botón debemos ofrecer al usuario pistas visuales, por lo tanto es muy importante que el borde del input resalte claramente al tener el foco (`:focus`) de esta manera se le indica al usuario que puede escribir.

##### Versión móvil
En versión móvil, la barra de búsqueda deberá adaptarse al tamaño de la ventana del navegador, resolviendo todo el redimensionamiento del componente por medio de las hojas de estilo con los puntos de interrupción (breakpoints) listados anteriormante.

El atributo `type="search"` despliega un teclado virtual con una lupa, que al ser pulsada realiza la búsqueda.

```html
<form class="search-container" style="width: 90%" action="/buscar" method="GET">
  <label for="search-general" class="oculto">
    Buscar actividades
  </label>
  <div class="form__inset general-search">
    <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
    <input type="search" id="search-general" name="q" placeholder="Ejemplo: actividades turístico recreativas" class="sh0r js-input" autocomplete="off" />
    <ul class="search-results js-list is-hidden" id="results-list">
      <li>
        Opción predictiva 1
      </li>
      <li>
        Opción predictiva 2
      </li>
      <li>
        Opción predictiva 3
      </li>
    </ul>
  </div>
</form>
```
