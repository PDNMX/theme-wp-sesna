<?php get_header(); ?>

<div class="page-directorio">

  <!-- Breadcrumb -->
  <div class="contenedor">
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="<?php echo esc_url(home_url('/')); ?>"><svg  aria-hidden="true" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Inicio</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Directorio</li>
      </ol>
    </nav>
  </div>

  <!-- Hero -->
  <section class="sesna-page-hero">
    <div class="contenedor">
      <div class="fila align-items-center">
        <div class="columna__7--lg columna__9--md position-relative z-1 mb--24 mb-lg-0">
          <h1 class="sesna-hero__title">Directorio</h1>
          <div class="hero-separator"></div>
          <p class="sesna-hero__subtitle">
            Conoce a las personas titulares de las áreas que integran
            la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.
          </p>
          <?php
          $dir_args = array(
            'post_type'      => 'directorio',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
          );
          $dir_query = new WP_Query($dir_args);

          $areas = array();
          $oficinas = array();
          if ($dir_query->have_posts()) :
            while ($dir_query->have_posts()) : $dir_query->the_post();
              $foto_url       = get_the_post_thumbnail_url(get_the_ID(), 'large');
              $estructura     = get_post_meta(get_the_ID(), '_dir_estructura', true);
              $nombre_area    = get_post_meta(get_the_ID(), '_dir_nombre_area', true);
              $show_enc       = get_post_meta(get_the_ID(), '_dir_show_encargado', true);
              $cargo          = get_post_meta(get_the_ID(), '_dir_cargo', true);
              
              $item = array(
                'estructura'      => $estructura ? $estructura : $nombre_area,
                'nombre_area'     => $nombre_area,
                'encargado'       => ($show_enc === '1') ? $nombre_area : '',
                'foto_titular'    => $foto_url ? $foto_url : '',
                'nombre_titular'  => get_the_title(),
                'cargo_titular'   => $cargo,
                'email_titular'   => get_post_meta(get_the_ID(), '_dir_email', true),
              );

              if (stripos($cargo, 'Oficina de Representaci') !== false || stripos($item['nombre_titular'], 'Mónica Vargas') !== false) {
                  if (empty($item['estructura'])) {
                      $item['estructura'] = 'Oficina de Representación en la SESNA';
                  }
                  $oficinas[] = $item;
              } else {
                  $areas[] = $item;
              }
            endwhile;
            wp_reset_postdata();
          endif;

          $all_areas = array_merge($areas, $oficinas);
          $first = !empty($all_areas) ? $all_areas[0] : null;
          ?>
          <?php if (!empty($areas)) : ?>
          <div class="dir-hero__meta d-flex gap-3 mt-3">
            <span class="dir-hero__meta-badge">
              <svg  aria-hidden="true" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/></svg>
              <?php echo count($areas); ?> unidades administrativas
            </span>
            <span class="dir-hero__meta-badge">
              <svg  aria-hidden="true" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z"/></svg>
              Actualizado <?php echo date('Y'); ?>
            </span>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Contenido principal -->
  <section class="dir-content">
    <div class="contenedor">
      <div class="fila gap--24">

        <!-- Col izquierda: Estructura Orgánica -->
        <div class="columna__6--lg">
          <div class="dir-card">
            <div class="dir-org__header">
              <h2 class="dir-org__title">Estructura Orgánica</h2>
              <?php if (!empty($areas)) : ?>
              <span class="dir-org__count" aria-label="<?php echo count($areas); ?> áreas">
                <?php echo count($areas); ?>
              </span>
              <?php endif; ?>
            </div>
            <div class="dir-org__list" role="listbox" aria-label="Áreas de la SESNA">
              <div class="dir-org__inner">
              <?php if (!empty($areas)) : ?>
                <?php foreach ($areas as $i => $area) : ?>
                  <div class="dir-org__item<?php echo $i === 0 ? ' dir-org__item--active' : ''; ?>"
                       data-index="<?php echo $i; ?>"
                       role="option"
                       aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                       tabindex="0">
                    <span class="dir-org__dot" aria-hidden="true"></span>
                    <span class="dir-org__item-icon" aria-hidden="true"><svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/></svg></span>
                    <span class="dir-org__item-text"><?php echo esc_html($area['estructura']); ?></span>
                  </div>
                <?php endforeach; ?>
              <?php else : ?>
                <p>No hay áreas configuradas. Crea entradas en el menú <strong>Directorio</strong> del panel de administración.</p>
              <?php endif; ?>
              </div>
            </div>
          </div>

          <?php if (!empty($oficinas)) : ?>
          <div class="dir-card mt-4">
            <div class="dir-org__header">
              <h2 class="dir-org__title">Oficina de Representación en la SESNA</h2>
            </div>
            <div class="dir-org__list" role="listbox" aria-label="Oficina de Representación en la SESNA">
              <div class="dir-org__inner">
              <?php foreach ($oficinas as $k => $oficina) : 
                $index = count($areas) + $k;
              ?>
                <div class="dir-org__item"
                     data-index="<?php echo $index; ?>"
                     role="option"
                     aria-selected="false"
                     tabindex="0">
                  <span class="dir-org__dot" aria-hidden="true"></span>
                  <span class="dir-org__item-icon" aria-hidden="true"><svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/></svg></span>
                  <span class="dir-org__item-text"><?php echo esc_html($oficina['estructura']); ?></span>
                </div>
              <?php endforeach; ?>
              </div>
            </div>
          </div>
          <?php endif; ?>

        </div>

        <!-- Col derecha: Ficha del titular -->
        <div class="columna__6--lg">
          <div class="dir-card">
            <div class="dir-ficha" id="dir-ficha">
              <div class="dir-ficha__foto-wrap">
                <?php if ($first && $first['foto_titular']) : ?>
                  <img class="dir-ficha__foto" id="dir-foto"
                       src="<?php echo esc_url($first['foto_titular']); ?>"
                       alt="<?php echo esc_attr($first['nombre_titular']); ?>">
                  <div class="dir-ficha__foto dir-ficha__foto--placeholder d-none" id="dir-foto-placeholder">
                    <svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                  </div>
                <?php else : ?>
                  <div class="dir-ficha__foto dir-ficha__foto--placeholder" id="dir-foto-placeholder">
                    <svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                  </div>
                  <img class="dir-ficha__foto d-none" id="dir-foto" src="" alt="">
                <?php endif; ?>
              </div>
              <div class="dir-ficha__info">
                <div class="dir-ficha__area-badge" id="dir-area-badge">
                  <?php echo $first ? esc_html($first['estructura']) : ''; ?>
                </div>
                <h3 class="dir-ficha__nombre" id="dir-nombre">
                  <?php echo $first ? esc_html($first['nombre_titular']) : '—'; ?>
                </h3>
                <div class="dir-ficha__cargo-row <?php echo ($first && $first['encargado']) ? '' : 'd-none'; ?>" id="dir-encargado-row">
                  <span class="dir-ficha__icon-circle" aria-hidden="true">
                    <svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                  </span>
                  <span class="dir-ficha__cargo" id="dir-encargado">
                    <?php echo ($first && $first['encargado']) ? esc_html($first['encargado']) : ''; ?>
                  </span>
                </div>
                <hr class="dir-ficha__separator <?php echo ($first && $first['encargado']) ? '' : 'd-none'; ?>" id="dir-encargado-sep">
                <div class="dir-ficha__cargo-row">
                  <span class="dir-ficha__icon-circle" aria-hidden="true">
                    <svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                  </span>
                  <span class="dir-ficha__cargo" id="dir-cargo">
                    <?php echo $first ? esc_html($first['cargo_titular']) : '—'; ?>
                  </span>
                </div>
                <hr class="dir-ficha__separator">
                <div class="dir-ficha__cargo-row">
                  <span class="dir-ficha__icon-circle" aria-hidden="true">
                    <svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/></svg>
                  </span>
                  <a class="dir-ficha__email" id="dir-email"
                     href="<?php echo $first ? 'mailto:' . esc_attr($first['email_titular']) : '#'; ?>">
                    <?php echo $first ? esc_html($first['email_titular']) : '—'; ?>
                  </a>
                </div>
                <a class="dir-ficha__email-btn" id="dir-email-btn"
                   href="<?php echo $first ? 'mailto:' . esc_attr($first['email_titular']) : '#'; ?>">
                  <svg  aria-hidden="true" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/></svg> Enviar correo
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- CTA Contacto institucional -->
  <section class="dir-contact-cta">
    <div class="contenedor">
      <div class="dir-contact-cta__card">
        <div class="dir-contact-cta__icon" aria-hidden="true">
          <svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5"/></svg>
        </div>
        <div class="dir-contact-cta__body">
          <h4 class="dir-contact-cta__title">¿Necesitas más información?</h4>
          <p class="dir-contact-cta__text">Para consultas generales o información adicional sobre la Secretaría Ejecutiva, comunícate con nosotros.</p>
        </div>
        <a href="<?php echo esc_url(home_url('/contacto/')); ?>" class="dir-contact-cta__btn">
          <svg  aria-hidden="true" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg> Ir a Contacto
        </a>
      </div>
    </div>
  </section>

  <!-- Modal móvil: ficha del titular -->
  <div class="dir-modal" id="dir-modal" aria-hidden="true" role="dialog" aria-label="Ficha del titular">
    <div class="dir-modal__backdrop" id="dir-modal-backdrop"></div>
    <div class="dir-modal__content">
      <button class="dir-modal__close" id="dir-modal-close" aria-label="Cerrar">
        <svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/></svg>
      </button>
      <div class="dir-modal__foto-wrap">
        <img class="dir-modal__foto" id="dir-modal-foto" src="" alt="">
        <div class="dir-modal__foto dir-modal__foto--placeholder d-none" id="dir-modal-placeholder">
          <svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
        </div>
      </div>
      <div class="dir-modal__info">
        <h3 class="dir-modal__nombre" id="dir-modal-nombre"></h3>
        <div class="dir-modal__cargo-row d-none" id="dir-modal-encargado-row">
          <span class="dir-ficha__icon-circle" aria-hidden="true"><svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg></span>
          <span class="dir-modal__cargo" id="dir-modal-encargado"></span>
        </div>
        <hr class="dir-ficha__separator d-none" id="dir-modal-encargado-sep">
        <div class="dir-modal__cargo-row">
          <span class="dir-ficha__icon-circle" aria-hidden="true"><svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg></span>
          <span class="dir-modal__cargo" id="dir-modal-cargo"></span>
        </div>
        <hr class="dir-ficha__separator">
        <div class="dir-modal__cargo-row">
          <span class="dir-ficha__icon-circle" aria-hidden="true"><svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/></svg></span>
          <a class="dir-ficha__email" id="dir-modal-email" href="#"></a>
        </div>
      </div>
    </div>
  </div>

</div>

<?php if (!empty($all_areas)) : ?>
<script>
  window.directorioData = <?php echo wp_json_encode($all_areas); ?>;
</script>
<?php endif; ?>

<?php get_footer(); ?>
