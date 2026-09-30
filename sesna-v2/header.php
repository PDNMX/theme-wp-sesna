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

  <!-- Skip link — SND: clase irContent, apunta a #mainContent (WCAG 2.4.1) -->
  <a href="#mainContent" class="irContent">Ir al contenido principal</a>

  <!-- Loader / Transición Inicial -->
  <div id="sesna-page-loader" class="sesna-loader">
    <div class="sesna-spinner"></div>
  </div>

  <!--
    Barra institucional SESNA — SND v1
    Estructura: section.subheader > subheader__contenedor
                > details.mexico__details.navHeader__details (hamburguesa móvil)
                  > summary.mexico__summary
                  > nav.navHeader > ul.navHeader__ul.mexico__detailsCont
    El encabezado .mexico (Gobierno de México) es inyectado por gobmx.js automáticamente.
  -->
  <section class="subheader sesna-subheader" aria-label="Navegación institucional">
    <div class="subheader__contenedor sesna-subheader__inner">

      <!-- Hamburguesa SND: details/summary (patrón nativo móvil) -->
      <details class="mexico__details navHeader__details" id="sesna-nav-details">
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

    </div>
  </section>

  <main class="page" id="mainContent">

