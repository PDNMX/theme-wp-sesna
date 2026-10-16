<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.png">
  <?php wp_head(); ?>
  <script>window.$ = window.$ || window.jQuery;</script>
</head>

<body <?php body_class(); ?>>

  <!-- Loader / Transición Inicial -->
  <div id="sesna-page-loader" class="sesna-loader">
    <div class="sesna-spinner"></div>
  </div>

  <!--
    Header institucional SND v1.1.0 — Estructura oficial del Sistema Nacional de Diseño
    Conforme a la Sección 4.7 del SND: .header > .irContent + .mexico > .mexico__contenedor
  -->
  <header class="header">
    <!-- Skip link — SND: clase irContent, apunta a #mainContent (WCAG 2.4.1) -->
    <a href="#mainContent" class="irContent">Ir al contenido principal</a>

    <section class="mexico">
      <div class="mexico__contenedor">
        <div class="mexico__escudo">
          <a href="https://www.gob.mx/" class="mexico__aescudo" aria-label="Ir a la página de inicio del Gobierno de México">
            <i class="snd__icono snd-gobierno-mexico mexico__img color--origen" aria-hidden="true"></i>
          </a>
        </div>
        <div class="mexico__menu">
          <details class="mexico__details" open>
            <summary class="mexico__summary"><span class="mexico__span">Menú</span></summary>
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

      <!-- Hamburguesa SND: details/summary (patrón nativo móvil, Sección 4.4 SND) -->
      <details class="mexico__details navHeader__details" id="sesna-nav-details" open>
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

      <!-- Botón de accesibilidad oficial SND v1.1.0 (Sección 4.4, líneas 610 y 633-636) -->
      <button type="button" class="boton__limpio btn-accesibilidad" id="sesna-btn-accesibilidad" aria-label="Opciones de accesibilidad" title="Opciones de accesibilidad">
        <i class="snd__icono snd-accessibility--alt icono--32 icono--circuloRojo" aria-hidden="true">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="icono--32" width="32" height="32" aria-hidden="true" fill="currentColor">
            <path d="M23 14 23 12 9 12 9 14 14 14 14 16.734 10.132 23.504 11.868 24.496 15.58 18 16.42 18 20.132 24.496 21.868 23.504 18 16.734 18 14 23 14z"/>
            <circle cx="16" cy="9" r="2"/>
            <path d="M16,30A14,14,0,1,1,30,16,14.0158,14.0158,0,0,1,16,30ZM16,4A12,12,0,1,0,28,16,12.0137,12.0137,0,0,0,16,4Z"/>
          </svg>
        </i>
        <span class="oculto">Opciones de accesibilidad</span>
      </button>

      <script>
      /* Soporte para submenús desplegables institucionales SESNA (SND v1.1.0) */
      document.addEventListener('DOMContentLoaded', function() {
          // Asegurar que el menú principal esté siempre visible en escritorio (>= 768px)
          const mainNav = document.getElementById('sesna-nav-details');
          function syncMainNav() {
              if (mainNav && window.innerWidth >= 768) {
                  mainNav.setAttribute('open', '');
              }
          }
          syncMainNav();
          window.addEventListener('resize', syncMainNav);

          // Control de dropdowns de segundo nivel (<details class="navHeader__details">)
          const dropdowns = document.querySelectorAll('.sesna-subheader .navHeader__li details.navHeader__details');
          dropdowns.forEach(function(d) {
              let closeTimer = null;

              // Apertura y cierre en hover para escritorio (>= 768px)
              d.addEventListener('mouseenter', function() {
                  if (window.innerWidth >= 768) {
                      clearTimeout(closeTimer);
                      d.setAttribute('open', '');
                  }
              });

              d.addEventListener('mouseleave', function() {
                  if (window.innerWidth >= 768) {
                      closeTimer = setTimeout(function() {
                          d.removeAttribute('open');
                      }, 180);
                  }
              });

              // Soporte de accesibilidad: tecla Escape cierra el menú y regresa foco al toggle
              d.addEventListener('keydown', function(e) {
                  if (e.key === 'Escape' && d.hasAttribute('open')) {
                      d.removeAttribute('open');
                      const summary = d.querySelector('summary');
                      if (summary) summary.focus();
                  }
              });
          });

          // Cerrar dropdowns si el usuario hace clic fuera de ellos en escritorio (NUNCA el navbar principal)
          document.addEventListener('click', function(e) {
              if (window.innerWidth >= 768) {
                  dropdowns.forEach(function(d) {
                      if (d !== mainNav && d.id !== 'sesna-nav-details' && d.hasAttribute('open') && !d.contains(e.target)) {
                          d.removeAttribute('open');
                      }
                  });
                  // Salvaguarda: el navbar institucional siempre permanece abierto en escritorio
                  syncMainNav();
              }
          });

          // Control del botón y panel de accesibilidad oficial SND v1.1.0 (Hover automático y Clic)
          const btnAcc = document.getElementById('sesna-btn-accesibilidad');
          let accCloseTimer = null;

          function abrirAccesibilidad() {
              clearTimeout(accCloseTimer);
              const accWidget = document.getElementById('accessibility');
              if (accWidget) {
                  accWidget.classList.add('is-open');
                  const menuSlide = accWidget.querySelector('.menu-slide');
                  if (menuSlide) menuSlide.classList.add('is-open');
              } else {
                  // Reintentar brevemente si el widget del CDN aún está en su inyección diferida
                  let retries = 0;
                  const retryTimer = setInterval(function() {
                      retries++;
                      const w = document.getElementById('accessibility');
                      if (w) {
                          clearInterval(retryTimer);
                          w.classList.add('is-open');
                          const s = w.querySelector('.menu-slide');
                          if (s) s.classList.add('is-open');
                      } else if (retries > 25) {
                          clearInterval(retryTimer);
                      }
                  }, 40);
              }
          }

          function cerrarAccesibilidadConDelay() {
              accCloseTimer = setTimeout(function() {
                  const accWidget = document.getElementById('accessibility');
                  if (accWidget) {
                      accWidget.classList.remove('is-open');
                      const menuSlide = accWidget.querySelector('.menu-slide');
                      if (menuSlide) menuSlide.classList.remove('is-open');
                  }
              }, 400);
          }

          if (btnAcc) {
              // 1. Al pasar el cursor sobre el botón -> Desplegar acciones en automático
              btnAcc.addEventListener('mouseenter', abrirAccesibilidad);

              // 2. Al salir del botón -> Iniciar temporizador de cierre de cortesía
              btnAcc.addEventListener('mouseleave', cerrarAccesibilidadConDelay);

              // 3. Al hacer clic o tap -> Alternar apertura y cierre
              btnAcc.addEventListener('click', function(e) {
                  e.preventDefault();
                  e.stopPropagation();
                  const accWidget = document.getElementById('accessibility');
                  const isOpen = accWidget && accWidget.classList.contains('is-open');
                  if (isOpen) {
                      accWidget.classList.remove('is-open');
                      const menuSlide = accWidget.querySelector('.menu-slide');
                      if (menuSlide) menuSlide.classList.remove('is-open');
                  } else {
                      abrirAccesibilidad();
                  }
              });
          }

          // 4. Mantener el panel abierto mientras el mouse interactúe dentro de él
          document.addEventListener('mouseover', function(e) {
              if (e.target.closest('#accessibility, .menu-slide, .menu-container')) {
                  clearTimeout(accCloseTimer);
                  const accWidget = document.getElementById('accessibility');
                  if (accWidget && !accWidget.classList.contains('is-open')) {
                      abrirAccesibilidad();
                  }
              }
          });

          // 5. Al salir del panel de accesibilidad -> Iniciar temporizador de cierre
          document.addEventListener('mouseout', function(e) {
              const fromPanel = e.target.closest('#accessibility, .menu-slide, .menu-container');
              const toTarget = e.relatedTarget;
              if (fromPanel && (!toTarget || !toTarget.closest('#accessibility, .menu-slide, .menu-container, #sesna-btn-accesibilidad'))) {
                  cerrarAccesibilidadConDelay();
              }
          });

          // 6. Cerrar panel si se presiona la tecla Escape
          document.addEventListener('keydown', function(e) {
              if (e.key === 'Escape') {
                  const accWidget = document.getElementById('accessibility');
                  if (accWidget && accWidget.classList.contains('is-open')) {
                      accWidget.classList.remove('is-open');
                      const menuSlide = accWidget.querySelector('.menu-slide');
                      if (menuSlide) menuSlide.classList.remove('is-open');
                      if (btnAcc) btnAcc.focus();
                  }
              }
          });

          // 7. Cerrar panel de accesibilidad al hacer clic fuera
          document.addEventListener('click', function(e) {
              const accWidget = document.getElementById('accessibility');
              if (accWidget && accWidget.classList.contains('is-open')) {
                  if (!accWidget.contains(e.target) && !e.target.closest('#sesna-btn-accesibilidad')) {
                      accWidget.classList.remove('is-open');
                      const menuSlide = accWidget.querySelector('.menu-slide');
                      if (menuSlide) menuSlide.classList.remove('is-open');
                  }
              }
          });
      });
      </script>

    </div>
  </section>

  <main class="page" id="mainContent">

