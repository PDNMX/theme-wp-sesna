<?php get_header(); ?>

<div class="page-directorio">

  <!-- Breadcrumb -->
  <div class="container">
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="<?php echo esc_url(home_url('/')); ?>"><i class="bi bi-house-door" aria-hidden="true"></i> Inicio</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Directorio</li>
      </ol>
    </nav>
  </div>

  <!-- Hero -->
  <section class="sesna-page-hero">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 col-md-9 position-relative z-1 mb-4 mb-lg-0">
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
              <i class="bi bi-building" aria-hidden="true"></i>
              <?php echo count($areas); ?> unidades administrativas
            </span>
            <span class="dir-hero__meta-badge">
              <i class="bi bi-calendar3" aria-hidden="true"></i>
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
    <div class="container">
      <div class="row g-4">

        <!-- Col izquierda: Estructura Orgánica -->
        <div class="col-lg-6">
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
                    <span class="dir-org__item-icon" aria-hidden="true"><i class="bi bi-building"></i></span>
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
                  <span class="dir-org__item-icon" aria-hidden="true"><i class="bi bi-building"></i></span>
                  <span class="dir-org__item-text"><?php echo esc_html($oficina['estructura']); ?></span>
                </div>
              <?php endforeach; ?>
              </div>
            </div>
          </div>
          <?php endif; ?>

        </div>

        <!-- Col derecha: Ficha del titular -->
        <div class="col-lg-6">
          <div class="dir-card">
            <div class="dir-ficha" id="dir-ficha">
              <div class="dir-ficha__foto-wrap">
                <?php if ($first && $first['foto_titular']) : ?>
                  <img class="dir-ficha__foto" id="dir-foto"
                       src="<?php echo esc_url($first['foto_titular']); ?>"
                       alt="<?php echo esc_attr($first['nombre_titular']); ?>">
                  <div class="dir-ficha__foto dir-ficha__foto--placeholder d-none" id="dir-foto-placeholder">
                    <i class="bi bi-person-fill"></i>
                  </div>
                <?php else : ?>
                  <div class="dir-ficha__foto dir-ficha__foto--placeholder" id="dir-foto-placeholder">
                    <i class="bi bi-person-fill"></i>
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
                    <i class="bi bi-person-fill"></i>
                  </span>
                  <span class="dir-ficha__cargo" id="dir-encargado">
                    <?php echo ($first && $first['encargado']) ? esc_html($first['encargado']) : ''; ?>
                  </span>
                </div>
                <hr class="dir-ficha__separator <?php echo ($first && $first['encargado']) ? '' : 'd-none'; ?>" id="dir-encargado-sep">
                <div class="dir-ficha__cargo-row">
                  <span class="dir-ficha__icon-circle" aria-hidden="true">
                    <i class="bi bi-person-fill"></i>
                  </span>
                  <span class="dir-ficha__cargo" id="dir-cargo">
                    <?php echo $first ? esc_html($first['cargo_titular']) : '—'; ?>
                  </span>
                </div>
                <hr class="dir-ficha__separator">
                <div class="dir-ficha__cargo-row">
                  <span class="dir-ficha__icon-circle" aria-hidden="true">
                    <i class="bi bi-envelope-fill"></i>
                  </span>
                  <a class="dir-ficha__email" id="dir-email"
                     href="<?php echo $first ? 'mailto:' . esc_attr($first['email_titular']) : '#'; ?>">
                    <?php echo $first ? esc_html($first['email_titular']) : '—'; ?>
                  </a>
                </div>
                <a class="dir-ficha__email-btn" id="dir-email-btn"
                   href="<?php echo $first ? 'mailto:' . esc_attr($first['email_titular']) : '#'; ?>">
                  <i class="bi bi-envelope" aria-hidden="true"></i> Enviar correo
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
    <div class="container">
      <div class="dir-contact-cta__card">
        <div class="dir-contact-cta__icon" aria-hidden="true">
          <i class="bi bi-headset"></i>
        </div>
        <div class="dir-contact-cta__body">
          <h4 class="dir-contact-cta__title">¿Necesitas más información?</h4>
          <p class="dir-contact-cta__text">Para consultas generales o información adicional sobre la Secretaría Ejecutiva, comunícate con nosotros.</p>
        </div>
        <a href="<?php echo esc_url(home_url('/contacto/')); ?>" class="dir-contact-cta__btn">
          <i class="bi bi-arrow-right" aria-hidden="true"></i> Ir a Contacto
        </a>
      </div>
    </div>
  </section>

  <!-- Modal móvil: ficha del titular -->
  <div class="dir-modal" id="dir-modal" aria-hidden="true" role="dialog" aria-label="Ficha del titular">
    <div class="dir-modal__backdrop" id="dir-modal-backdrop"></div>
    <div class="dir-modal__content">
      <button class="dir-modal__close" id="dir-modal-close" aria-label="Cerrar">
        <i class="bi bi-x-lg"></i>
      </button>
      <div class="dir-modal__foto-wrap">
        <img class="dir-modal__foto" id="dir-modal-foto" src="" alt="">
        <div class="dir-modal__foto dir-modal__foto--placeholder d-none" id="dir-modal-placeholder">
          <i class="bi bi-person-fill"></i>
        </div>
      </div>
      <div class="dir-modal__info">
        <h3 class="dir-modal__nombre" id="dir-modal-nombre"></h3>
        <div class="dir-modal__cargo-row d-none" id="dir-modal-encargado-row">
          <span class="dir-ficha__icon-circle" aria-hidden="true"><i class="bi bi-person-fill"></i></span>
          <span class="dir-modal__cargo" id="dir-modal-encargado"></span>
        </div>
        <hr class="dir-ficha__separator d-none" id="dir-modal-encargado-sep">
        <div class="dir-modal__cargo-row">
          <span class="dir-ficha__icon-circle" aria-hidden="true"><i class="bi bi-person-fill"></i></span>
          <span class="dir-modal__cargo" id="dir-modal-cargo"></span>
        </div>
        <hr class="dir-ficha__separator">
        <div class="dir-modal__cargo-row">
          <span class="dir-ficha__icon-circle" aria-hidden="true"><i class="bi bi-envelope-fill"></i></span>
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
