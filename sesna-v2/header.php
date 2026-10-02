<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.png">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- Loader / Transición Inicial -->
  <div id="sesna-page-loader" class="sesna-loader">
    <div class="sesna-spinner"></div>
  </div>

  <!-- P00-COMP-002: Header Institucional SND -->
  <header class="header">
    <a class="irContent" href="#mainContent">Ir al contenido principal</a>
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

  <!-- Subheader (Navbar principal) -->
  <section class="subheader">
    <div class="subheader__contenedor">
      <details class="mexico__details navHeader__details">
        <summary class="mexico__summary"><span class="mexico__span">Menú</span></summary>
        <nav class="navHeader">
          <?php
          wp_nav_menu(array(
            'container'      => false,
            'theme_location' => 'menu-1',
            'menu_class'     => 'navHeader__ul mexico__detailsCont',
            'depth'          => 2,
            'fallback_cb'    => '__return_false',
            'walker'         => new SND_Subheader_Menu_Walker(),
          ));
          ?>
        </nav>
      </details>
    </div>
  </section>


  <main id="mainContent" class="page">