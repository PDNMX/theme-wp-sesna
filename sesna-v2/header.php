<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.png">
  <?php wp_head(); ?>
  <script>
  /* SND icon fetch interceptor: redirige ./assets/iconos/*.svg al CDN oficial */
  (function(){
    var SND_ICON_CDN = 'https://framework-gb.cdn.gob.mx/snd/v1/assets/iconos/';
    var _orig = window.fetch.bind(window);
    window.fetch = function(url, opts) {
      if (typeof url === 'string' && url.indexOf('/assets/iconos/') !== -1 && url.indexOf('framework-gb.cdn') === -1) {
        var file = url.split('/assets/iconos/').pop();
        return _orig(SND_ICON_CDN + file, opts);
      }
      return _orig(url, opts);
    };
  })();
  </script>
</head>

<body <?php body_class(); ?>>

  <!-- Loader / Transición Inicial -->
  <div id="sesna-page-loader" class="sesna-loader">
    <div class="sesna-spinner"></div>
  </div>

  <!--
    Header institucional SND — estructura oficial (Componentes > Encabezado del PDF).
    gobmx.js sigue cargado por sus efectos secundarios (jQuery, Bootstrap JS que
    aún usan scripts de página sueltos) pero el navbar que inyecta (.navbar-fixed-top,
    legado GOB.mx v3, NO es .mexico del SND) se oculta en main.css — este bloque
    estático es el header real que se muestra.
  -->
  <header class="header">
    <!-- Skip link — SND: clase irContent, apunta a #mainContent (WCAG 2.4.1) -->
    <a href="#mainContent" class="irContent">Ir al contenido principal</a>

    <section class="mexico">
      <div class="mexico__contenedor">
        <div class="mexico__escudo">
          <a href="https://www.gob.mx/" class="mexico__aescudo">
            <img src="https://framework-gb.cdn.gob.mx/gobmx/img/logo_blanco.svg" class="mexico__img" alt="Ir a la pagina de inicio del Gobierno de Mexico" />
          </a>
        </div>
        <div class="mexico__menu">
          <details class="mexico__details">
            <summary class="mexico__summary"><span class="mexico__span">Menu</span></summary>
            <div class="mexico__detailsCont">
              <a href="https://www.gob.mx/tramites" class="mexico__a">Trámites</a>
              <a href="https://www.gob.mx/gobierno" class="mexico__a">Gobierno</a>
            </div>
          </details>
        </div>
      </div>
    </section>
  </header>

  <!--
    Barra institucional SESNA — SND v1
    Estructura: section.subheader > subheader__contenedor
                > details.mexico__details.navHeader__details (hamburguesa móvil)
                  > summary.mexico__summary
                  > nav.navHeader > ul.navHeader__ul.mexico__detailsCont
  -->
  <section class="subheader sesna-subheader" aria-label="Navegación institucional">
    <div class="subheader__contenedor sesna-subheader__inner">

      <!-- Hamburguesa SND: details/summary (patrón nativo móvil)
           Solo tiene mexico__details — navHeader__details es para los dropdown items del walker. -->
      <details class="mexico__details" id="sesna-nav-details">
        <summary class="mexico__summary">
          <span class="mexico__span">Menú</span>
        </summary>

        <!-- Menú principal — SND: nav.navHeader / ul.navHeader__ul.mexico__detailsCont -->
        <nav class="navHeader sesna-nav" id="sesna-nav-main" aria-label="Menú principal">
          <?php
          wp_nav_menu(array(
            'container'      => false,
            'theme_location' => 'menu-1',
            'menu_class'     => 'navHeader__ul mexico__detailsCont sesna-nav__list',
            'depth'          => 2,
            'fallback_cb'    => '__return_false',
            'walker'         => new Sesna_Bootstrap_Nav_Walker(),
          ));
          ?>
        </nav>

      </details>

      <script>
      /* P00 Fix: Forzar despliegue de <details> geométrico para evadir falsos "mouseout" del carrusel */
      document.addEventListener('DOMContentLoaded', function() {
          let mouseX = 0, mouseY = 0;
          document.addEventListener('mousemove', function(e) {
              mouseX = e.clientX; mouseY = e.clientY;
          });

          document.querySelectorAll('.sesna-subheader .navHeader__details').forEach(function(d) {
              // Abrir en cuanto el mouse pase por encima (el browser sí dispara mouseover correctamente)
              d.addEventListener('mouseover', function() {
                  if (window.innerWidth >= 992) d.setAttribute('open', '');
              });

              // Verificar matemáticamente si el ratón sigue dentro del área
              setInterval(function() {
                  if (window.innerWidth >= 992 && d.hasAttribute('open')) {
                      let rect = d.getBoundingClientRect();
                      let ul = d.querySelector('.navHeader__submenu');
                      let ulRect = ul ? ul.getBoundingClientRect() : {left:0, right:0, top:0, bottom:0};
                      
                      let inSummary = (mouseX >= rect.left && mouseX <= rect.right && mouseY >= rect.top && mouseY <= rect.bottom);
                      let inUl = (mouseX >= ulRect.left && mouseX <= ulRect.right && mouseY >= ulRect.top && mouseY <= ulRect.bottom);
                      
                      if (!inSummary && !inUl) {
                          d.removeAttribute('open');
                      }
                  }
              }, 300);
          });
      });
      </script>

    </div>
  </section>

  <main class="page" id="mainContent">

