# Sistema Nacional de Diseño (SND) – Componente: Barra de navegación (`navbar`)

- **Fuente:** https://www.snd.gob.mx/componentes/barra-navegacion
- **Título de la página:** Barra de navegación (navbar) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Componente de navegación principal que proporciona acceso a las diferentes secciones de la aplicación.

---

## 1. Descripción

### Variantes
- Barra de navegación
- Escritorio. *(imagen: `barra de navegación en versión escritorio`)*
- Móvil y tablet: configuraciones. *(imagen: `barra de navegación en versión móvil y tablet`)*
- Móvil y tablet: navegación inferior *(imagen: `barra de navegación en versión móvil y tablet`)*

### Estados
La versión móvil del componente se divide en la navegación superior para configuraciones del sitio y en la parte inferior para navegar en el contenido del sitio.
- Configuraciones - visitante *(imagen: `barra de navegación para visitante en versión móvil`)*
- Configuraciones - sesión iniciada *(imagen: `barra de navegación con sesión iniciada`)*
- Configuraciones - sesión iniciada (Menú abierto) *(imagen: `barra de navegación con sesión iniciada y menú abierto`)*
- Navegación inferior *(imagen: `barra de navegación inferior en versión móvil`)*
- Navegación inferior - Menú Más *(imagen: `barra de navegación inferior con menú más activo`)*

### Temas y estilos
Tanto el encabezado como la barra de navegación responden a la configuraciones de estilo del sitio.
*(Imágenes: `ejemplo de barra de navegación versión escritorio`, `ejemplo de barra de navegación versión móvil`)*

### Ejemplos de uso
La navegación principal permite a los usuarios acceder a las secciones más importantes del sitio, tanto en sitios públicos como autenticados.
*(Imágenes: `ejemplo de uso de barra de navegación en escritorio`, `ejemplo de uso de barra de navegación en móvil`)*

### Usos no permitidos
- No añadir logos adicionales, mostrar únicamente el logotipo institucional definido.
- No cambiar la posición o estructura de los elementos.
- No mezclar temas o colores fuera de los establecidos.
*(Imágenes: `ejemplo de barra de navegación no permitido versión escritorio`, `ejemplo de barra de navegación no permitido versión móvil`)*

---

## 2. Diseño

### Anatomía
- **Navbar (escritorio)**
  - Color de fondo: `presidencia guinda - 950`
  - Sombra paralela: `0px 4px 4px 0px #000000`
  - `Contenedor`: Ancho máximo: `1920`
  - `Dependencia`: Altura: `24px`
  - `Tabs`: Depende de: `Tabs comp` | Estado: `Activo | Default` | Tipo: `Dark`
  - `Accesibilidad`: Altura: `32` | Ancho: `32` | Color de fondo: `CD353C` | Radio de borde: `200` | Relación de aspecto: `1:1`
  - `Atom/Idioma`: Depende de: `Atom/Idioma` | Dispositivo: `Escritorio`
  - `Llave MX`: Depende de: `LlaveNav` | Estado: `Llave` | Pantalla: `Escritorio`
- **Navbar (móvil)**
  - Color de fondo: `presidencia guinda - 950`
  - Sombra paralela: `0px 4px 4px 0px #000000`
  - `Dependencia`: Altura: `24px`
  - `Accesibilidad`: Altura: `32` | Ancho: `32` | Color de fondo: `CD353C` | Radio de borde: `200` | Relación de aspecto: `1:1`
  - `Atom/Idioma`: Depende de: `Atom/Idioma` | Dispositivo: `Móvil`
  - `Llave MX`: Depende de: `LlaveNav` | Estado: `Llave` | Pantalla: `Movil`
- **menu expandido**
  - Color de fondo: `Degradado/Presi 900-600 ↓ (None)` | Radio superior izquierdo: `16`
  - `Atom/Icon Navbar`: Depende de: `Atom/Icon Navbar` | icon: `<Nombre de instancia>` | Mostrar indicador: `false` | Estado: `Activo`
  - `Atom/Icon Navbar`: Depende de: `Atom/Icon Navbar` | icon: `<Nombre de instancia>` | Mostrar indicador: `false` | Estado: `Default`
  - `Opción: Más`: Depende de: `Atom/Icon Navbar` | icon: `<Nombre de instancia>` | Mostrar indicador: `false` | Estado: `Default`
- **Menú expandido**
  - `NavbarMovil`: Sombra paralela: `Drop LV 2 (0px 4px 8px 0px #000000)` | Altura: `812` | Ancho: `285` | Ancho máximo: `512` | Ancho mínimo: `285` | Radio inferior izquierdo: `16`

*(Imágenes: `Anatomía de barra de navegación`, `Anatomía de barra de navegación superior versión móvil`, `Anatomía de barra de navegación inferior movil`, `Anatomía de barra de navegación lateral versión móvil expandido`)*

### Construcción de UI
- `Contenedor`: Direction: `Horizontal` | Alignment: `Middle center` | Vertical resizing: `Fill` | Horizontal resizing: `Fill` | Item spacing: `24`
- `Navbar`: Dirección: `Horizontal` | Alineación: `Centro medio` | Redimensionamiento vertical: `Fijo` | Redimensionamiento horizontal: `Fijo` | Espaciado de elementos: `24` | Relleno izquierdo: `56` | Relleno derecho: `56`
- `Navbar` (móvil superior): Dirección: `Horizontal` | Alineación: `Centro medio izquierdo` | Redimensionamiento vertical: `Fijo` | Redimensionamiento horizontal: `Fijo` | Espaciado de elementos: `8` | Relleno superior: `8` | Relleno inferior: `8` | Relleno izquierdo: `16` | Relleno derecho: `16`
- `NavbarMovil`: Dirección: `Horizontal` | Alineación: `Centro medio izquierdo` | Redimensionamiento vertical: `Fijo` | Redimensionamiento horizontal: `Fijo` | Espaciado de elementos: `8` | Relleno superior: `8` | Relleno inferior: `8` | Relleno izquierdo: `16` | Relleno derecho: `16`

*(Imágenes: `Construcción de UI`, `Construcción de UI móvil superior`, `Construcción de UI móvil inferior`)*

---

## 3. Desarrollo

### Versión desktop y mobile (visitante)
La barra de navegación (navbar) se implementa como un componente complementario al `<header>` principal.

Se posiciona de forma fija debajo del header y mantiene compatibilidad con dispositivos de escritorio y móviles.

#### Estructura HTML
El componente está conformado por dos secciones principales dentro del header:
- Contenedor institucional (`.mexico`)
- Barra de navegación (`.subheader`)

#### Elementos de la barra de navegación
1. **Navegación principal**
   Contiene una lista de enlaces de primer nivel como:
   - Inicio
   - Qué hacemos
   - Prensa
   - Blog
2. **Botón de accesibilidad**
   Se incluye un componente externo con opciones orientadas a mejorar la experiencia de navegación para personas usuarias con distintas necesidades.
   Funciones disponibles:
   - Restablecer configuración
   - Escala de grises
   - Lector de pantalla
   - Cursor ampliado
   - Alto contraste
   - Máscara de lectura
   - Guía de lectura
   - Tipografía para dislexia
   - Espaciado vertical
   - Espaciado horizontal
   - Ajuste de tamaño de fuente
   - Resaltar enlaces
3. **Menú de idioma**
   Muestra los diferentes idiomas en caso de ser necesaria la internacionalización de la página web.
4. **Botón iniciar sesión**
   Cuando el usuario no ha iniciado sesión, se muestra botón con identidad visual de Llave MX.

```html
<section class="subheader">
  <div class="subheader__contenedor">
    <details class="mexico__details navHeader__details">
      <summary class="mexico__summary">
        <span class="mexico__span">
          Menú
        </span>
      </summary>
      <nav class="navHeader">
        <ul class="navHeader__ul mexico__detailsCont">
          <li class="navHeader__li">
            <a href="#" aria-current="page" class="navHeader__a">
              Inicio
            </a>
          </li>
          <li class="navHeader__li">
            <a href="#" class="navHeader__a">
              Qué hacemos
            </a>
          </li>
          <li class="navHeader__li">
            <a href="#" class="navHeader__a">
              Prensa
            </a>
          </li>
          <li class="navHeader__li">
            <a href="#" class="navHeader__a">
              Blog
            </a>
          </li>
        </ul>
      </nav>
    </details>
    <button type="button" class="boton__limpio">
      <i class="snd__icono snd-accessibility--alt icono--32 icono--circuloRojo" aria-hidden="true"></i>
      <span class="oculto">
        Opciones de accesibilidad
      </span>
    </button>
    <div class="idioma">
      <div class="idioma__cont idioma--sm">
        <label for="idioma--select" class="oculto">
          Selecciona idioma
        </label>
        <select class="idioma__select" id="idioma-select">
          <option lang="es">
            Es
          </option>
          <option lang="en">
            En
          </option>
          <option lang="de">
            De
          </option>
          <option lang="it">
            It
          </option>
          <option lang="fr">
            Fr
          </option>
          <option lang="pt">
            Pt
          </option>
        </select>
        <div class="idioma__marker" aria-hidden="true">
          <i class="snd__icono snd-chevron--down color--blanco" aria-hidden="true"></i>
        </div>
      </div>
      <div class="idioma__cont idioma--lg">
        <label for="idioma--select" class="oculto">
          Selecciona idioma
        </label>
        <select class="idioma__select" id="idioma-select">
          <option lang="es">
            Español
          </option>
          <option lang="en">
            English
          </option>
          <option lang="de">
            Deutsch
          </option>
          <option lang="it">
            Italiano
          </option>
          <option lang="fr">
            Français
          </option>
          <option lang="pt">
            Português
          </option>
        </select>
        <div class="idioma__marker" aria-hidden="true">
          <i class="snd__icono snd-chevron--down color--blanco" aria-hidden="true"></i>
        </div>
      </div>
    </div>
    <div class="iniciarSesion">
      <a href="#" class="iniciarSesion__a cta">
        <span class="iniciarSesion__txt">
          Iniciar sesión
        </span>
        <i class="snd__icono snd-snd-llaveMX iniciarSesion__logollave" aria-hidden="true"></i>
      </a>
    </div>
  </div>
</section>
```

#### Comportamiento responsivo
En resoluciones menores a 767px, la estructura cambia automáticamente a disposición vertical y la navegación cambia a formato colapsable, mediante un botón de hamburguesa.

Características móviles:
- Menú alineado a la derecha.
- Elementos apilados verticalmente.
- Opción activa resaltada con color institucional.

### Versión desktop y mobile (sesión iniciada)
A diferencia de la versión para visitantes ésta muestra el menú para el perfil del usuario.

#### Perfil de usuario
Implementado mediante `<details>` y `<summary>`, despliega un menú contextual con acciones como:
- Mi perfil
- Cambiar perfil
- Ir a Llave MX
- Cerrar sesión

También contempla múltiples perfiles:
- Ciudadano
- Funcionario
- Persona moral
- Campo de búsqueda

```html
<section class="subheader">
  <div class="subheader__contenedor">
    <details class="mexico__details navHeader__details">
      <summary class="mexico__summary">
        <span class="mexico__span">
          Menú
        </span>
      </summary>
      <nav class="navHeader">
        <ul class="navHeader__ul mexico__detailsCont">
          <li class="navHeader__li">
            <a href="#" aria-current="page" class="navHeader__a">
              Inicio
            </a>
          </li>
          <li class="navHeader__li">
            <a href="#" class="navHeader__a">
              Qué hacemos
            </a>
          </li>
          <li class="navHeader__li">
            <a href="#" class="navHeader__a">
              Prensa
            </a>
          </li>
          <li class="navHeader__li">
            <a href="#" class="navHeader__a">
              Blog
            </a>
          </li>
        </ul>
      </nav>
    </details>
    <button type="button" class="boton__limpio">
      <i class="snd__icono snd-accessibility--alt icono--32 icono--circuloRojo" aria-hidden="true"></i>
      <span class="oculto">
        Opciones de accesibilidad
      </span>
    </button>
    <div class="idioma">
      <div class="idioma__cont idioma--sm">
        <label for="idioma--select" class="oculto">
          Selecciona idioma
        </label>
        <select class="idioma__select" id="idioma-select">
          <option lang="es">
            Es
          </option>
          <option lang="en">
            En
          </option>
          <option lang="de">
            De
          </option>
          <option lang="it">
            It
          </option>
          <option lang="fr">
            Fr
          </option>
          <option lang="pt">
            Pt
          </option>
        </select>
        <div class="idioma__marker" aria-hidden="true">
          <i class="snd__icono snd-chevron--down color--blanco" aria-hidden="true"></i>
        </div>
      </div>
      <div class="idioma__cont idioma--lg">
        <label for="idioma--select" class="oculto">
          Selecciona idioma
        </label>
        <select class="idioma__select" id="idioma-select">
          <option lang="es">
            Español
          </option>
          <option lang="en">
            English
          </option>
          <option lang="de">
            Deutsch
          </option>
          <option lang="it">
            Italiano
          </option>
          <option lang="fr">
            Français
          </option>
          <option lang="pt">
            Português
          </option>
        </select>
        <div class="idioma__marker" aria-hidden="true">
          <i class="snd__icono snd-chevron--down color--blanco" aria-hidden="true"></i>
        </div>
      </div>
    </div>
    <details class="usrperfil__details detailsClickOut">
      <summary class="usrperfil__summary" aria-label="Menú de perfil">
        <span class="usrperfil__summaryCol1">
          <span class="usrperfil__iniciales">
            MA
          </span>
          <span class="usrperfil__nombre">
            María Concepción
          </span>
        </span>
        <i class="usrperfil__summaryIcon details__flecha snd__icono snd-chevron--down icono--24" aria-hidden="true"></i>
      </summary>
      <div class="usrperfil__cont">
        <ul class="usrperfil__ul">
          <li class="usrperfil__li usrperfil__li--perfil">
            <span class="usrperfil__iniciales">
              MA
            </span>
            <div class="dflex--col">
              <span class="usrperfil__nombre2">
                María Concepción
              </span>
              <span class="usrperfil__rol">
                Perfil Ciudadano
              </span>
            </div>
          </li>
          <li class="usrperfil__li">
            <a href="#" class="usrperfil__opcion">
              <svg class="usrperfil__icono" focusable="false" preserveAspectRatio="xMidYMid meet" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M16,8a5,5,0,1,0,5,5A5,5,0,0,0,16,8Zm0,8a3,3,0,1,1,3-3A3.0034,3.0034,0,0,1,16,16Z">
                </path>
                <path d="M16,2A14,14,0,1,0,30,16,14.0158,14.0158,0,0,0,16,2ZM10,26.3765V25a3.0033,3.0033,0,0,1,3-3h6a3.0033,3.0033,0,0,1,3,3v1.3765a11.8989,11.8989,0,0,1-12,0Zm13.9925-1.4507A5.0016,5.0016,0,0,0,19,20H13a5.0016,5.0016,0,0,0-4.9925,4.9258,12,12,0,1,1,15.985,0Z">
                </path>
              </svg>
              <div class="usrperfil__opcionCol">
                Mi perfil
              </div>
            </a>
          </li>
          <li class="usrperfil__li">
            <a href="#" class="usrperfil__opcion">
              <svg class="usrperfil__icono" focusable="false" preserveAspectRatio="xMidYMid meet" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 21V20H4v1a7 7 0 007 7h3V26H11A5 5 0 016 21zM24 11v1h2V11a7 7 0 00-7-7H16V6h3A5 5 0 0124 11zM11 11H5a3 3 0 00-3 3v2H4V14a1 1 0 011-1h6a1 1 0 011 1v2h2V14A3 3 0 0011 11zM8 10A4 4 0 104 6 4 4 0 008 10zM8 4A2 2 0 116 6 2 2 0 018 4zM27 25H21a3 3 0 00-3 3v2h2V28a1 1 0 011-1h6a1 1 0 011 1v2h2V28A3 3 0 0027 25zM20 20a4 4 0 104-4A4 4 0 0020 20zm6 0a2 2 0 11-2-2A2 2 0 0126 20z">
                </path>
              </svg>
              <div class="usrperfil__opcionCol">
                Cambiar perfil
              </div>
            </a>
          </li>
          <li class="usrperfil__li">
            <a href="#" class="usrperfil__opcion usrperfil__opcion--between usrperfil__opcion--noborde">
              <div class="usrperfil__opcionCol">
                Ir a Llave MX
              </div>
              <svg class="usrperfil__icono" focusable="false" preserveAspectRatio="xMidYMid meet" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 6L16.57 7.393 24.15 15 4 15 4 17 24.15 17 16.57 24.573 18 26 28 16 18 6z">
                </path>
              </svg>
            </a>
          </li>
          <li class="usrperfil__li">
            <a href="#" class="usrperfil__opcion usrperfil__opcion--noborde">
              Cerrar sesión
              <svg class="usrperfil__icono" focusable="false" preserveAspectRatio="xMidYMid meet" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M6,30H18a2.0023,2.0023,0,0,0,2-2V25H18v3H6V4H18V7h2V4a2.0023,2.0023,0,0,0-2-2H6A2.0023,2.0023,0,0,0,4,4V28A2.0023,2.0023,0,0,0,6,30Z">
                </path>
                <path d="M20.586 20.586L24.172 17 10 17 10 15 24.172 15 20.586 11.414 22 10 28 16 22 22 20.586 20.586z">
                </path>
              </svg>
            </a>
          </li>
          <li class="usrperfil__li">
            <a href="#" class="usrperfil__opcion usrperfil__opcion--header usrperfil__opcion--noborde">
              <svg class="usrperfil__icono" focusable="false" preserveAspectRatio="xMidYMid meet" fill="currentColor" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 26L15.41 24.59 7.83 17 28 17 28 15 7.83 15 15.41 7.41 14 6 4 16 14 26z">
                </path>
              </svg>
              <div class="usrperfil__opcionCol">
                Cambiar perfil
              </div>
            </a>
          </li>
          <li class="usrperfil__li">
            <a href="#" class="usrperfil__opcion usrperfil__opcion--between">
              <div class="usrperfil__opcionCol">
                Ciudadano
                <span class="usrperfil__opcionSm">
                  María Concepción
                </span>
              </div>
              <svg class="usrperfil__icono" focusable="false" preserveAspectRatio="xMidYMid meet" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 21V20H4v1a7 7 0 007 7h3V26H11A5 5 0 016 21zM24 11v1h2V11a7 7 0 00-7-7H16V6h3A5 5 0 0124 11zM11 11H5a3 3 0 00-3 3v2H4V14a1 1 0 011-1h6a1 1 0 011 1v2h2V14A3 3 0 0011 11zM8 10A4 4 0 104 6 4 4 0 008 10zM8 4A2 2 0 116 6 2 2 0 018 4zM27 25H21a3 3 0 00-3 3v2h2V28a1 1 0 011-1h6a1 1 0 011 1v2h2V28A3 3 0 0027 25zM20 20a4 4 0 104-4A4 4 0 0020 20zm6 0a2 2 0 11-2-2A2 2 0 0126 20z">
                </path>
              </svg>
            </a>
          </li>
          <li class="usrperfil__li">
            <a href="#" class="usrperfil__opcion usrperfil__opcion--between">
              <div class="usrperfil__opcionCol">
                Funcionario
                <span class="usrperfil__opcionSm">
                  María Concepción
                </span>
              </div>
              <svg class="usrperfil__icono" focusable="false" preserveAspectRatio="xMidYMid meet" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 21V20H4v1a7 7 0 007 7h3V26H11A5 5 0 016 21zM24 11v1h2V11a7 7 0 00-7-7H16V6h3A5 5 0 0124 11zM11 11H5a3 3 0 00-3 3v2H4V14a1 1 0 011-1h6a1 1 0 011 1v2h2V14A3 3 0 0011 11zM8 10A4 4 0 104 6 4 4 0 008 10zM8 4A2 2 0 116 6 2 2 0 018 4zM27 25H21a3 3 0 00-3 3v2h2V28a1 1 0 011-1h6a1 1 0 011 1v2h2V28A3 3 0 0027 25zM20 20a4 4 0 104-4A4 4 0 0020 20zm6 0a2 2 0 11-2-2A2 2 0 0126 20z">
                </path>
              </svg>
            </a>
          </li>
          <li class="usrperfil__li">
            <a href="#" class="usrperfil__opcion usrperfil__opcion--between usrperfil__opcion--noborde">
              <div class="usrperfil__opcionCol">
                Persona moral
              </div>
              <svg class="usrperfil__icono" focusable="false" preserveAspectRatio="xMidYMid meet" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 6L16.57 7.393 24.15 15 4 15 4 17 24.15 17 16.57 24.573 18 26 28 16 18 6z">
                </path>
              </svg>
            </a>
          </li>
          <li class="usrperfil__li">
            <a href="#" class="usrperfil__opcion usrperfil__opcion--header usrperfil__opcion--noborde">
              <svg class="usrperfil__icono" focusable="false" preserveAspectRatio="xMidYMid meet" fill="currentColor" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 26L15.41 24.59 7.83 17 28 17 28 15 7.83 15 15.41 7.41 14 6 4 16 14 26z">
                </path>
              </svg>
              <div class="usrperfil__opcionCol">
                Persona moral
              </div>
            </a>
          </li>
          <li class="usrperfil__li">
            <div class="form__grupo usrperfil__buscar">
              <label for="mi_busca-inset" class="oculto">
                Buscar persona moral
              </label>
              <div class="form__inset">
                <svg class="usrperfil__buscarIcon" focusable="false" preserveAspectRatio="xMidYMid meet" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                  <path d="M29,27.5859l-7.5521-7.5521a11.0177,11.0177,0,1,0-1.4141,1.4141L27.5859,29ZM4,13a9,9,0,1,1,9,9A9.01,9.01,0,0,1,4,13Z">
                  </path>
                </svg>
                <input type="search" name="" id="mi_busca-inset" placeholder="Busca la persona moral" class="" />
              </div>
            </div>
          </li>
          <li class="usrperfil__li">
            <a href="#" class="usrperfil__opcion usrperfil__opcion--between">
              <div class="usrperfil__opcionCol">
                Persona moral
                <span class="usrperfil__opcionSm">
                  Patitos Feos SA. de CV
                </span>
              </div>
              <svg class="usrperfil__icono" focusable="false" preserveAspectRatio="xMidYMid meet" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 21V20H4v1a7 7 0 007 7h3V26H11A5 5 0 016 21zM24 11v1h2V11a7 7 0 00-7-7H16V6h3A5 5 0 0124 11zM11 11H5a3 3 0 00-3 3v2H4V14a1 1 0 011-1h6a1 1 0 011 1v2h2V14A3 3 0 0011 11zM8 10A4 4 0 104 6 4 4 0 008 10zM8 4A2 2 0 116 6 2 2 0 018 4zM27 25H21a3 3 0 00-3 3v2h2V28a1 1 0 011-1h6a1 1 0 011 1v2h2V28A3 3 0 0027 25zM20 20a4 4 0 104-4A4 4 0 0020 20zm6 0a2 2 0 11-2-2A2 2 0 0126 20z">
                </path>
              </svg>
            </a>
          </li>
          <li class="usrperfil__li">
            <a href="#" class="usrperfil__opcion usrperfil__opcion--between">
              <div class="usrperfil__opcionCol">
                Persona moral
                <span class="usrperfil__opcionSm">
                  Patitos Feos SA. de CV
                </span>
              </div>
              <svg class="usrperfil__icono" focusable="false" preserveAspectRatio="xMidYMid meet" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 21V20H4v1a7 7 0 007 7h3V26H11A5 5 0 016 21zM24 11v1h2V11a7 7 0 00-7-7H16V6h3A5 5 0 0124 11zM11 11H5a3 3 0 00-3 3v2H4V14a1 1 0 011-1h6a1 1 0 011 1v2h2V14A3 3 0 0011 11zM8 10A4 4 0 104 6 4 4 0 008 10zM8 4A2 2 0 116 6 2 2 0 018 4zM27 25H21a3 3 0 00-3 3v2h2V28a1 1 0 011-1h6a1 1 0 011 1v2h2V28A3 3 0 0027 25zM20 20a4 4 0 104-4A4 4 0 0020 20zm6 0a2 2 0 11-2-2A2 2 0 0126 20z">
                </path>
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </details>
  </div>
</section>
```

### Versiones
- **Verde:** Para utilizar esta variante se debe importar el CDN correspondiente al tema Verde *(imágenes: `barra de navegación`, `barra de navegación superior versión móvil`, `barra de navegación superior versión móvil desplegado`)*
- **Guinda:** Para utilizar esta variante se debe importar el CDN correspondiente al tema Guinda *(imágenes: `barra de navegación`, `barra de navegación superior versión móvil`, `barra de navegación superior versión móvil desplegado`)*

Para conocer más revisa la documentación
