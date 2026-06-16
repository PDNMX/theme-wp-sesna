<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.png">
  <?php wp_head(); ?>
  <!--<link rel="stylesheet" href="https://framework-gb.cdn.gob.mx/gm/v3/qa/assets/styles/main.css"> -->
</head>

<body <?php body_class(); ?>>

  <!-- Loader / Transición Inicial -->
  <div id="sesna-page-loader" class="sesna-loader">
    <div class="sesna-spinner"></div>
  </div>

  <!-- Navbar institucional SESNA -->
  <header class="site-header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark sesna-navbar" aria-label="Navegación principal">
      <div class="container">

        <button class="navbar-toggler ms-auto border-0" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSESNA" aria-controls="navbarSESNA" aria-expanded="false" aria-label="Abrir menú">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSESNA">
          <?php
          wp_nav_menu(array(
            'container'   => false,
            'theme_location' => 'menu-1',
            'menu_class'  => 'navbar-nav sesna-nav',
            'depth'       => 2,
            'fallback_cb' => '__return_false',
            'walker'      => new Sesna_Bootstrap_Nav_Walker(),
          ));
          ?>
        </div>

      </div>
    </nav>
  </header>

  <main class="page">

    <!-- Modal: Buscador -->
    <div class="modal fade" id="modalBuscador" tabindex="-1" aria-labelledby="modalBuscadorLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title" id="modalBuscadorLabel">Buscador</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body pt-2">
            <form class="d-flex gap-2" action="/">
              <input class="form-control" type="search" name="s" value="<?= esc_attr(get_search_query()) ?>"
                placeholder="¿Qué estás buscando?" aria-label="Término de búsqueda">
              <button class="btn sesna-btn-outline" type="submit" aria-label="Buscar">
                <i class="bi bi-search"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>