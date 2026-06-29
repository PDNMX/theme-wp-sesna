<?php get_header(); ?>

<div class="page-directorio">

  <!-- Breadcrumb -->
  <div class="container">
    <nav class="gobmx-breadcrumb-container" aria-label="Ruta de navegación">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="<?php echo esc_url(home_url('/')); ?>"><i class="bi bi-house-door" aria-hidden="true"></i> Inicio</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Directorio</li>
      </ol>
    </nav>
  </div>

  <!-- Hero -->
  <section class="dir-hero">
    <div class="container">
      <div class="d-flex align-items-start gap-4">
        <div class="dir-hero__icon-circle" aria-hidden="true">
          <i class="bi bi-journal-bookmark-fill"></i>
        </div>
        <div>
          <h1 class="dir-hero__title">Directorio</h1>
          <p class="dir-hero__desc">
            Conoce a las personas titulares de las áreas que integran
            la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contenido principal -->
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
  if ($dir_query->have_posts()) :
    while ($dir_query->have_posts()) : $dir_query->the_post();
      $foto_url       = get_the_post_thumbnail_url(get_the_ID(), 'large');
      $estructura     = get_post_meta(get_the_ID(), '_dir_estructura', true);
      $nombre_area    = get_post_meta(get_the_ID(), '_dir_nombre_area', true);
      $show_enc       = get_post_meta(get_the_ID(), '_dir_show_encargado', true);
      $areas[] = array(
        'estructura'      => $estructura ? $estructura : $nombre_area,
        'nombre_area'     => $nombre_area,
        'encargado'       => ($show_enc === '1') ? $nombre_area : '',
        'foto_titular'    => $foto_url ? $foto_url : '',
        'nombre_titular'  => get_the_title(),
        'cargo_titular'   => get_post_meta(get_the_ID(), '_dir_cargo', true),
        'email_titular'   => get_post_meta(get_the_ID(), '_dir_email', true),
      );
    endwhile;
    wp_reset_postdata();
  endif;

  $first = !empty($areas) ? $areas[0] : null;
  ?>

  <section class="dir-content">
    <div class="container">
      <div class="row g-4">

        <!-- Col izquierda: Estructura Orgánica -->
        <div class="col-lg-6">
          <div class="dir-card">
            <h2 class="dir-org__title">Estructura Orgánica</h2>
            <div class="dir-org__list" role="listbox" aria-label="Áreas de la SESNA">
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
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</div>

<?php if (!empty($areas)) : ?>
<script>
  window.directorioData = <?php echo wp_json_encode($areas); ?>;
</script>
<?php endif; ?>

<?php get_footer(); ?>
