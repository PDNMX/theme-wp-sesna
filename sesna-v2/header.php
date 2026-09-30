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

  <!--
    Navbar institucional SESNA — SND v1
    Estructura: .subheader > .subheader__contenedor > logo + nav(.navHeader__ul)
    El .mexico del Gobierno de México es inyectado por gobmx.js automáticamente.
  -->
  <header class="subheader sesna-subheader" role="banner" aria-label="Navegación principal">
    <div class="subheader__contenedor sesna-subheader__inner">

      <!-- Logo SESNA -->
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="sesna-brand" aria-label="Inicio — Secretaría Ejecutiva del SNA">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo_blanco.svg"
             alt="Secretaría Ejecutiva del Sistema Nacional Anticorrupción"
             class="sesna-brand__img"
             width="160" height="auto"
             onerror="this.style.display='none'">
      </a>

      <!-- Botón hamburguesa móvil -->
      <button class="sesna-nav-toggle" id="sesna-nav-toggle"
              aria-controls="sesna-nav-main" aria-expanded="false"
              aria-label="Abrir menú de navegación">
        <span class="sesna-nav-toggle__bar"></span>
        <span class="sesna-nav-toggle__bar"></span>
        <span class="sesna-nav-toggle__bar"></span>
      </button>

      <!-- Menú principal — SND: .navHeader__ul / .navHeader__a -->
      <nav id="sesna-nav-main" class="sesna-nav" aria-label="Menú principal">
        <?php
        wp_nav_menu(array(
          'container'      => false,
          'theme_location' => 'menu-1',
          'menu_class'     => 'navHeader__ul sesna-nav__list',
          'depth'          => 2,
          'fallback_cb'    => '__return_false',
          'walker'         => new Sesna_Bootstrap_Nav_Walker(),
        ));
        ?>
      </nav>

    </div>
  </header>

  <main class="page">

