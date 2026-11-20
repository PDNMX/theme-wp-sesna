# Sistema Nacional de Diseño (SND) – Componente: Barra de navegación lateral (`sidebar`)

- **Fuente:** https://www.snd.gob.mx/componentes/barra-lateral
- **Título de la página:** Barra de navegación lateral (sidebar) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Componente de navegación principal que proporciona acceso a las diferentes secciones laterales de la aplicación.

---

## 1. Descripción

### Variantes
La barra de navegación tiene variaciones en elementos boleanos, así como la opción para anidar opciones de navegación dentro de una sección.
*(Imágenes: `barra de navegación lateral opción 1`, `barra de navegación lateral opción 2`, `barra de navegación lateral opción 3`)*

### Estados
Accesos para documentos, trámites o cambiar de perfil.
- Móvil - colapsado *(imagen: `Barra de navegación lateral versión móvil colapsado`)*
- Móvil - Opción Más *(imagen: `Barra de navegación lateral versión móvil opción más`)*
- Escritorio - expandido *(imagen: `Barra de navegación lateral versión escritorio expandido`)*
- Escritorio - colapsado *(imagen: `Barra de navegación lateral versión escritorio colapsado`)*
- Escritorio - colapsado (subsecciones anidadas) *(imagen: `Barra de navegación lateral versión escritorio colapsado con subsecciones anidadas`)*

### Temas
Accesos para documentos, trámites o cambiar de perfil.
*(Imágenes: `Barra de navegación lateral tema guinda`, `Barra de navegación lateral tema verde`)*

### Ejemplos de uso
Accesos para documentos, trámites o cambiar de perfil.
*(Imágenes: `ejemplo de barra de navegación lateral versión escritorio`, `ejemplo de barra de navegación lateral versión móvil`)*

---

## 2. Diseño

### Anatomía
- **Sidebar**
  - Altura: `100%`
  - Color de fondo: `Degradado/Presi 900-600 ↓ (None)`
  - Sombra de caída: `2px 0px 6px 0px #000000`
  - `Botón Llave Mx`: Tipo de propiedad: `Boleano` | Predeterminado: `false` | Altura: `40` | Color de fondo: `presidencia guinda - 700`
  - `CTA`: Color de fondo: `neutro - 100` | Estilo de texto: `Base/Extra Small Details/XSDSB`
  - `Atom/ContenidoSidebar`: Depende de: `Atom/ContenidoSidebar` | Tipo: `Título ventanilla | Logo`
  - `Atom/BotonSidebar`: Depende de: `Atom/ContenidoSidebar` | Ícono principal: `< Nombre de la instancia >` | Mostrar ícono principal:: `true` | Estado: `Seleccionado` | Estilo: `Simple`
  - `Atom/NavegaciónSitioDeskr`: Tipo de propiedad: `Booleano` | Default: `False` | Depende de: `Atom/NavegaciónSitioDesk` | Estado: `Collpased`
  - `Colapsar`: Altura: `64` | Ancho: `16` | Color de fondo: `presidencia guinda - 600` | Top left radius: `16` | Bottom left radius: `16`
- **Item text**
  - `Indicator`: Altura: `56` | Ancho: `8` | Color de fondo: `presidencia guinda - 100` | Top left radius: `12` | Bottom left radius: `12`
  - `Icono`: Depende de: `Archivos/document-add`
  - `Etiqueta`: Color de fondo: `neutro - 100` | Estilo de texto: `Base/Body/CTA`
- **Item text - estados**
  - `Default`: Color de fondo: `none` | Color de texto: `neutro - 100`
  - `Hover`: Color de fondo: `presidencia guinda - 700` | Color de texto: `neutro - 100`
  - `On tap`: Color de fondo: `presidencia guinda - 900` | Color de texto: `neutro - 100`
  - `Seleccionado`: Color de fondo: `presidencia guinda - 400` | Color de texto: `neutro - 100`
- **NavbarMovil**
  - Color de fondo: `Degradado/Presi 900-600 ↓ (None)` | Radio superior izquierdo: `16`
  - `Atom/Icon Navbar`: Depende de: `Atom/Icon Navbar` | icon: `<Nombre de instancia>` | Mostrar indicador: `false` | Estado: `Activo`
  - `Atom/Icon Navbar`: Depende de: `Atom/Icon Navbar` | icon: `<Nombre de instancia>` | Mostrar indicador: `false` | Estado: `Default`
  - `Opción: Más`: Depende de: `Atom/Icon Navbar` | icon: `<Nombre de instancia>` | Mostrar indicador: `false` | Estado: `Default`
- **Menú expandido**
  - `NavbarMovil`: Sombra paralela: `Drop LV 2 (0px 4px 8px 0px #000000)` | Altura: `812` | Ancho: `285` | Ancho máximo: `512` | Ancho mínimo: `285` | Radio inferior izquierdo: `16`

### Construcción de UI
- `NavbarMovil`: Dirección: `Horizontal` | Alineación: `Centro medio` | Redimensionamiento vertical: `Ajustar` | Redimensionamiento horizontal: `Fijo` | Espaciado de elementos: `8` | Relleno superior: `8` | Relleno inferior: `8` | Relleno izquierdo: `16` | Relleno derecho: `16`
- `Sidebar`: Dirección: `Vertical` | Alineación: `Centro superior` | Redimensionamiento vertical: `Fijo` | Redimensionamiento horizontal: `Fijo` | Espaciado de elementos: `16`
- `Item list`: Dirección: `Vertical` | Alineación: `Superior izquierdo` | Redimensionamiento vertical: `Llenar` | Redimensionamiento horizontal: `Llenar`

*(Imágenes: `Anatomía de barra de navegación lateral versión móvil expandido`, `Anatomía de barra de navegación`, `Construcción de UI`)*

---

## 3. Desarrollo

### Version desktop y mobile (navegacion sin anidacion)
La barra de navegacion lateral (sidebar) se implementa mediante la etiqueta semantica `<nav>` y funciona como componente de navegacion. Su proposito es concentrar los accesos exclusivos y facilitar la navegacion tanto en escritorio como en dispositivos moviles.

El componente utiliza comportamiento adaptable (responsive), permitiendo mostrarse como barra lateral colapsable en escritorio y barra inferior movil en pantallas pequenas.

#### Estructura HTML
Elementos principales:
1. **Boton colapsable:** Permite expandir o contraer el menu lateral.
2. **Encabezado del modulo:** Muestra el nombre del sistema o tramite activo.
3. **Lista de navegacion:** Contiene accesos principales representados mediante icono + texto.
   Opciones del ejemplo:
   - Mis tramites
   - Mis documentos
   - Mi perfil
   - Mas (menu adicional movil)

```html
<nav class="menuMain" aria-label="Navegacion principal" id="menuMain">
  <button type="button" aria-controls="menuMain" aria-expanded="true" aria-haspopup="menu" class="menuMain__gatillo" id="menuMain__gatillo">
    <span class="oculto">
      Mostrar menu
    </span>
    <i class="menuMain__gatilloIco snd__icono snd-chevron--left" aria-hidden="true"></i>
  </button>
  <div class="menuMain__header">
    <div class="menuMain__headerCont">
      <i class="snd__icono snd-snd-expedienteMX icono--148" role="img" aria-label="Expediente MX"></i>
    </div>
  </div>
  <ul class="menuMain__lista">
    <li class="menuMain__item">
      <a href="#" class="menuMain__link menuMain__linkSm">
        <i class="snd__icono snd-document menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">
          Mis tramites
        </span>
      </a>
    </li>
    <li class="menuMain__item">
      <a href="#" class="menuMain__link menuMain__linkSm" aria-current="page">
        <i class="snd__icono snd-folder menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">
          Mis documentos
        </span>
      </a>
    </li>
    <li class="menuMain__item">
      <a href="#" class="menuMain__link menuMain__linkSm">
        <i class="snd__icono snd-user--avatar menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">
          Mi perfil
        </span>
      </a>
    </li>
    <li class="menuMain__item menuMain__item--mas">
      <button class="menuMain__link" id="menuMovil__gatillo" aria-expanded="false">
        <i class="snd__icono snd-overflow-menu--horizontal menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">
          Mas
        </span>
      </button>
    </li>
  </ul>
  <div class="menuMovil menuMovil--colapsado" id="menuMovil">
    <button type="button" class="menuMovil__gatilloTop" id="menuMovil__gatilloTop">
      <span class="oculto">
        Cerrar
      </span>
      <i class="snd__icono snd-close" aria-hidden="true"></i>
    </button>
  </div>
</nav>
```

#### Estilos CSS
- Contenedor principal: en escritorio, el menu funciona como barra lateral con ancho fijo (256px).
- Fondo visual: el menu utiliza una variable de degradado institucional.
- Enlaces internos: cada opcion utiliza diseno horizontal con icono y texto.
- Opcion activa: el enlace actual se identifica mediante `aria-current="page"`, visualmente se resalta con fondo distinto.

#### Comportamiento responsivo
- **Escritorio (min-width: 767.9px):** Se muestra como barra lateral vertical con: boton de colapsado, encabezado del sistema, navegacion completa.
- **Movil (max-width: 767.9px):** El menu cambia automaticamente a barra inferior horizontal: ancho completo, iconos centrados, texto reducido, bordes redondeados superiores.
- **Menu adicional movil:** La opcion Mas aparece cuando el menu tiene mas de 3 opciones: la barra inferior muestra las 3 primeras y el panel (`.menuMovil`) muestra el logotipo y todas las opciones del menu, con sus subsecciones. El contenido del panel lo genera el JavaScript del Sistema Nacional de Diseño; en el HTML solo va el boton para cerrar.
  Caracteristicas:
  - aparece desde la derecha
  - ancho del 75% de pantalla
  - desplazamiento vertical interno
  - boton superior para cerrar

### Version desktop y mobile (navegacion con anidacion)
A diferencia de la version sin anidacion esta muestra subsecciones que utilizan `<details>` y `<summary>`.
Cuando el `details` esta abierto:
- Se muestra el listado `.menuMain__submenu`
- El icono de flecha indica estado expandido

```html
<nav class="menuMain" aria-label="Navegacion principal" id="menuMain__anidado">
  <button type="button" aria-controls="menuMain__anidado" aria-expanded="true" aria-haspopup="menu" class="menuMain__gatillo" id="menuMain__gatillo">
    <span class="oculto">
      Mostrar menu
    </span>
    <i class="menuMain__gatilloIco snd__icono snd-chevron--left" aria-hidden="true"></i>
  </button>
  <div class="menuMain__header">
    <div class="menuMain__headerCont">
      <i class="snd__icono snd-snd-expedienteMX icono--148" role="img" aria-label="Expediente MX"></i>
    </div>
  </div>
  <ul class="menuMain__lista">
    <li class="menuMain__item">
      <details open>
        <summary class="menuMain__link menuMain__linkSm" aria-current="page">
          <div class="menuMain__linkInterno">
            <i class="snd__icono snd-document menuMain__icono" aria-hidden="true"></i>
            <span class="menuMain__txt">
              Mis tramites
            </span>
          </div>
          <i class="snd__icono snd-chevron--down color--blanco menuMain__summaryFlecha details__flecha" aria-hidden="true"></i>
        </summary>
        <ul class="menuMain__submenu">
          <li class="menuMain__submenuItem">
            <a href="#" class="menuMain__submenuLink">
              <i class="snd__icono snd-document--add menuMain__icono" aria-hidden="true"></i>
              <span class="menuMain__txt">
                Subseccion 1
              </span>
            </a>
          </li>
          <li class="menuMain__submenuItem">
            <a href="#" class="menuMain__submenuLink">
              <i class="snd__icono snd-document--add menuMain__icono" aria-hidden="true"></i>
              <span class="menuMain__txt">
                Subseccion 2
              </span>
            </a>
          </li>
          <li class="menuMain__submenuItem">
            <a href="#" class="menuMain__submenuLink">
              <i class="snd__icono snd-document--add menuMain__icono" aria-hidden="true"></i>
              <span class="menuMain__txt">
                Subseccion 3
              </span>
            </a>
          </li>
        </ul>
      </details>
    </li>
    <li class="menuMain__item">
      <a href="#" class="menuMain__link menuMain__linkSm">
        <i class="snd__icono snd-folder menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">
          Mis documentos
        </span>
      </a>
    </li>
    <li class="menuMain__item">
      <a href="#" class="menuMain__link menuMain__linkSm">
        <i class="snd__icono snd-user--avatar menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">
          Mi perfil
        </span>
      </a>
    </li>
    <li class="menuMain__item menuMain__item--mas">
      <button class="menuMain__link" id="menuMovil__gatillo" aria-expanded="false">
        <i class="snd__icono snd-overflow-menu--horizontal menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">
          Mas
        </span>
      </button>
    </li>
  </ul>
  <div class="menuMovil menuMovil--colapsado" id="menuMovil">
    <button type="button" class="menuMovil__gatilloTop" id="menuMovil__gatilloTop">
      <span class="oculto">
        Cerrar
      </span>
      <i class="snd__icono snd-close" aria-hidden="true"></i>
    </button>
  </div>
</nav>
```

### Version desktop y mobile (Anidacion y Navegacion de sitio)
Esta variante agrega, al fondo de la barra, el bloque `.menuMain__sitio` con la navegacion del sitio. Se implementa con `<details>` y `<summary>` y se abre hacia arriba.
- En escritorio se queda pegado al borde inferior; al abrirse, sus enlaces tienen scroll propio y la lista de opciones se acorta para dejarle espacio.
- Con la barra colapsada solo se ve su icono; al abrirlo, los enlaces se muestran en una tarjeta flotante.
- En movil no aparece en la barra inferior: se lista como seccion propia dentro del panel Mas, que se muestra aunque la barra tenga 3 opciones o menos.

```html
<nav class="menuMain" aria-label="Navegacion principal" id="menuMain__sitio">
  <button type="button" aria-controls="menuMain__sitio" aria-expanded="true" aria-haspopup="menu" class="menuMain__gatillo" id="menuMain__gatillo">
    <span class="oculto">
      Mostrar menu
    </span>
    <i class="menuMain__gatilloIco snd__icono snd-chevron--left" aria-hidden="true"></i>
  </button>
  <div class="menuMain__header">
    <div class="menuMain__headerCont">
      <i class="snd__icono snd-snd-expedienteMX icono--148" role="img" aria-label="Expediente MX"></i>
    </div>
  </div>
  <ul class="menuMain__lista">
    <li class="menuMain__item">
      <details open>
        <summary class="menuMain__link menuMain__linkSm" aria-current="page">
          <div class="menuMain__linkInterno">
            <i class="snd__icono snd-document menuMain__icono" aria-hidden="true"></i>
            <span class="menuMain__txt">
              Mis tramites
            </span>
          </div>
          <i class="snd__icono snd-chevron--down color--blanco menuMain__summaryFlecha details__flecha" aria-hidden="true"></i>
        </summary>
        <ul class="menuMain__submenu">
          <li class="menuMain__submenuItem">
            <a href="#" class="menuMain__submenuLink">
              <i class="snd__icono snd-document--add menuMain__icono" aria-hidden="true"></i>
              <span class="menuMain__txt">
                Subseccion 1
              </span>
            </a>
          </li>
          <li class="menuMain__submenuItem">
            <a href="#" class="menuMain__submenuLink">
              <i class="snd__icono snd-document--add menuMain__icono" aria-hidden="true"></i>
              <span class="menuMain__txt">
                Subseccion 2
              </span>
            </a>
          </li>
          <li class="menuMain__submenuItem">
            <a href="#" class="menuMain__submenuLink">
              <i class="snd__icono snd-document--add menuMain__icono" aria-hidden="true"></i>
              <span class="menuMain__txt">
                Subseccion 3
              </span>
            </a>
          </li>
        </ul>
      </details>
    </li>
    <li class="menuMain__item">
      <a href="#" class="menuMain__link menuMain__linkSm">
        <i class="snd__icono snd-folder menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">
          Mis documentos
        </span>
      </a>
    </li>
    <li class="menuMain__item">
      <a href="#" class="menuMain__link menuMain__linkSm">
        <i class="snd__icono snd-user--avatar menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">
          Mi perfil
        </span>
      </a>
    </li>
    <li class="menuMain__item menuMain__item--mas">
      <button class="menuMain__link" id="menuMovil__gatillo" aria-expanded="false">
        <i class="snd__icono snd-overflow-menu--horizontal menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">
          Mas
        </span>
      </button>
    </li>
  </ul>
  <details class="menuMain__sitio">
    <summary class="menuMain__link menuMain__linkSm">
      <div class="menuMain__linkInterno">
        <i class="snd__icono snd-earth menuMain__icono" aria-hidden="true"></i>
        <span class="menuMain__txt">
          Navegacion del sitio
        </span>
      </div>
      <i class="snd__icono snd-chevron--up color--blanco menuMain__summaryFlecha" aria-hidden="true"></i>
    </summary>
    <ul class="menuMain__sitioLista">
      <li>
        <a href="#" class="menuMain__sitioLink">
          <i class="snd__icono snd-document menuMain__icono" aria-hidden="true"></i>
          <span class="menuMain__txt">
            Blog
          </span>
        </a>
      </li>
      <li>
        <a href="#" class="menuMain__sitioLink">
          <i class="snd__icono snd-document menuMain__icono" aria-hidden="true"></i>
          <span class="menuMain__txt">
            Prensa
          </span>
        </a>
      </li>
      <li>
        <a href="#" class="menuMain__sitioLink">
          <i class="snd__icono snd-document menuMain__icono" aria-hidden="true"></i>
          <span class="menuMain__txt">
            Acciones y programas
          </span>
        </a>
      </li>
      <li>
        <a href="#" class="menuMain__sitioLink">
          <i class="snd__icono snd-email menuMain__icono" aria-hidden="true"></i>
          <span class="menuMain__txt">
            Contacto
          </span>
        </a>
      </li>
    </ul>
  </details>
  <div class="menuMovil menuMovil--colapsado" id="menuMovil">
    <button type="button" class="menuMovil__gatilloTop" id="menuMovil__gatilloTop">
      <span class="oculto">
        Cerrar
      </span>
      <i class="snd__icono snd-close" aria-hidden="true"></i>
    </button>
  </div>
</nav>
```

### Color
El color de la barra de navegacion refuerza la orientacion del proyecto: guinda para proyectos federales y verde para proyectos transversales. Este color se define en el paquete de CSS seleccionado.

### Versiones
- **Verde:** Para utilizar esta variante se debe importar el CDN correspondiente al tema Verde *(imagen: `barra de navegacion lateral verde`)*
- **Guinda:** Para utilizar esta variante se debe importar el CDN correspondiente al tema Guinda *(imagen: `barra de navegacion lateral guinda`)*

Para conocer más revisa la documentación
