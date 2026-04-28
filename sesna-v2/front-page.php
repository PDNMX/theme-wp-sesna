<?php get_header(); ?>

<!-- ============================================================
     HERO — Banner institucional
     Dimensiones de referencia (GOB.mx v3): 2880 × 624 px desktop
     ============================================================ -->
<section class="sesna-hero d-flex align-items-center" aria-label="Banner institucional">
  <div class="container text-center text-white">
    <h1 class="sesna-hero__title mb-0">
      En la SESNA estamos trabajando para
      <span class="sesna-hero__slide d-block" aria-live="polite">
        <span>combatir</span>
        <span>medir</span>
        <span>prevenir</span>
        <span>disuadir</span>
      </span>
      <strong>la corrupción junto contigo.</strong>
    </h1>
  </div>
</section>

<!-- ============================================================
     BLOG — Entradas destacadas + sidebar SESNA INFORMA
     ============================================================ -->
<section class="container vertical-buffer" id="entradasBlogContainer">
  <div class="row g-4">

    <!-- Columna izquierda: posts destacados -->
    <div class="col-12 col-md-7">

      <?php
        global $post;
        $recent_posts = get_posts([
          'posts_per_page' => 3,
          'meta_query'     => [[
            'key'   => 'destacado',
            'value' => 1,
          ]],
        ]);
      ?>

      <?php if (count($recent_posts) > 0) : $post = $recent_posts[0]; setup_postdata($post); ?>

        <!-- Post principal (featured-large) -->
        <div class="sesna-card-featured mb-3 position-relative overflow-hidden rounded">
          <img src="<?php the_thumbnail_photo('featured-large'); ?>"
               class="w-100 sesna-card-featured__img object-fit-cover" alt="">
          <div class="sesna-card-featured__overlay position-absolute top-0 start-0 w-100 h-100"></div>
          <div class="sesna-card-featured__body position-absolute bottom-0 start-0 p-3 text-white">
            <p class="fw-semibold mb-1 lh-sm">
              <a href="<?php the_permalink(); ?>" class="text-white stretched-link text-decoration-none">
                <?php the_title_limit(85); ?>
              </a>
            </p>
            <p class="small mb-0"><?php the_date('d - m - Y'); ?></p>
          </div>
        </div>

        <?php if (count($recent_posts) > 1) : ?>
        <div class="row g-3">

          <?php $post = $recent_posts[1]; setup_postdata($post); ?>
          <div class="col-12 col-lg-6">
            <div class="sesna-card-featured sesna-card-featured--sm position-relative overflow-hidden rounded h-100">
              <img src="<?php the_thumbnail_photo('thumb-medium'); ?>"
                   class="w-100 h-100 sesna-card-featured__img object-fit-cover" alt="">
              <div class="sesna-card-featured__overlay position-absolute top-0 start-0 w-100 h-100"></div>
              <div class="sesna-card-featured__body position-absolute bottom-0 start-0 p-3 text-white">
                <p class="fw-semibold mb-1 lh-sm small">
                  <a href="<?php the_permalink(); ?>" class="text-white stretched-link text-decoration-none">
                    <?php the_title_limit(50); ?>
                  </a>
                </p>
                <p class="small mb-0"><?php the_date('d - m - Y'); ?></p>
              </div>
            </div>
          </div>

          <?php if (count($recent_posts) > 2) : $post = $recent_posts[2]; setup_postdata($post); ?>
          <div class="col-12 col-lg-6">
            <div class="sesna-card-featured sesna-card-featured--sm position-relative overflow-hidden rounded h-100">
              <img src="<?php the_thumbnail_photo('thumb-medium'); ?>"
                   class="w-100 h-100 sesna-card-featured__img object-fit-cover" alt="">
              <div class="sesna-card-featured__overlay position-absolute top-0 start-0 w-100 h-100"></div>
              <div class="sesna-card-featured__body position-absolute bottom-0 start-0 p-3 text-white">
                <p class="fw-semibold mb-1 lh-sm small">
                  <a href="<?php the_permalink(); ?>" class="text-white stretched-link text-decoration-none">
                    <?php the_title_limit(50); ?>
                  </a>
                </p>
                <p class="small mb-0"><?php the_date('d - m - Y'); ?></p>
              </div>
            </div>
          </div>
          <?php endif; ?>

        </div><!-- /.row -->
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
      <?php endif; ?>

      <!-- Transparencia proactiva -->
      <div class="sesna-promo-bar mt-3 p-4 text-center rounded bg-light border">
        <p class="mb-0">
          <a target="_blank"
             href="https://consultapublicamx.plataformadetransparencia.org.mx/vut-web/faces/view/consultaPublica.xhtml?param=7VGiTs3Nuog%3D%3Fqn0ghtpYvQs%3D%3FnLhfIvX0xik%3D%3FJm1gz2S7by0%3D%3FNWd+9vb4ubBccbr7wuAJAcLES2Dom1K606uejwBltzSyqgTJOT+c+WqHTlsKG4oaVhW73S2n2WBJ+FrLvzCw4i3T3kM9RG3w06uejwBltzSyqgTJOT+c+fzuF34dRpygLdPeQz1EbfAgYsvAg9aY9V8zqJAA3qO2sqoEyTk%2FnPl4eCjGCjBOgs8z5J8vWJClWn0w9ZHxJAA%3D%3FEuMdxln%2FRPU%3D%3FJDURliPEU%2Fn87hd+HUacoGqHTlsKG4oatiFAUB2bv0dNVthRQVRqxHUuwNruDqgbE7hVaY330Zhqh05bChuKGrYhQFAdm79HTVbYUUFUasTPtwEdLwZOEXUuwNruDqgbE7hVaY330Zhqh05bChuKGrYhQFAdm79HQYrgdAqHqCJJ+FrLvzCw4vzuF34dRpygaodOWwobihq2IUBQHZu%2FR0GK4HQKh6gitiFAUB2bv0dNVthRQVRqxM+3AR0vBk4RREm4P9coMqU%3D%3FigOLKmyD4frxHvfFxauAZJ1JYyCOt6Uk5FcQX7H%2FC%2FNQxNBtGUWIfcXAp0WfW2rD6ESEWx86sEld8whHfyvBk51JYyCOt6UkDEx08atj+qgKS15FOommRISQ8iZL36rg8R73xcWrgGSdSWMgjrelJKJj9foHlCHZUMTQbRlFiH3FwKdFn1tqw+hEhFsfOrBJXfMIR38rwZOdSWMgjrelJI0ThAcjJ4na%2FinYiX5h3nUYb9cQFqt5sQ%3D%3D%3Fq73eYbqqHXg%3D%3F%2FxoRfMVrMBw%3D#inicio"
             class="text-decoration-none text-guinda fw-semibold">
            Transparencia Proactiva<br>
            <span class="text-body fw-normal">Consulta la información sobre Gastos y Viáticos de la SESNA</span>
          </a>
        </p>
      </div>

    </div><!-- /.col-md-7 -->

    <!-- Columna derecha: SESNA INFORMA -->
    <div class="col-12 col-md-4 offset-md-1 d-flex align-items-start">
      <div class="sesna-informa p-4 bg-guinda text-white rounded w-100">
        <h2 class="h5 fw-bold mb-3">SESNA <span class="fw-light">INFORMA</span></h2>
        <p class="mb-4">Conoce los últimos avances, documentos y noticias relacionadas con la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.</p>
        <a class="btn sesna-btn-outline" href="<?= home_url('/informacion/') ?>" role="button">
          Busca un documento <i class="bi bi-search ms-1"></i>
        </a>
      </div>
    </div>

  </div><!-- /.row -->
</section>

<!-- ============================================================
     POLÍTICA NACIONAL ANTICORRUPCIÓN
     ============================================================ -->
<section class="sesna-section-pna vertical-buffer bg-light" aria-label="Política Nacional Anticorrupción">
  <div class="container">
    <div class="row align-items-center g-4">

      <div class="col-12 col-md-7">
        <h2 class="h4 fw-bold text-guinda mb-4">
          POLÍTICA NACIONAL <span class="text-burgundi">ANTICORRUPCIÓN</span>
        </h2>
        <a class="btn bg-guinda text-white px-4" href="/politica-nacional-anticorrupcion/">
          Conócela <i class="bi bi-arrow-right ms-1"></i>
        </a>
      </div>

      <div class="col-12 col-md-4 offset-md-1 text-center">
        <img class="img-fluid"
             src="<?php echo (function_exists('get_field') && get_field('imagen_home_pna', 'option'))
               ? get_field('imagen_home_pna', 'option')
               : get_stylesheet_directory_uri() . '/img/pna/bannerPNA1.png'; ?>"
             alt="Política Nacional Anticorrupción">
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     CONÓCENOS
     ============================================================ -->
<section class="sesna-section-conocenos vertical-buffer" aria-label="Conócenos">
  <div class="container">
    <div class="row align-items-center g-4">

      <div class="col-12 col-md-6 text-center">
        <img class="img-fluid rounded"
             src="<?php echo (function_exists('get_field') && get_field('imagen_home_conocenos', 'option'))
               ? get_field('imagen_home_conocenos', 'option')
               : get_stylesheet_directory_uri() . '/img/conocenos/conocenos.png'; ?>"
             alt="Equipo SESNA">
      </div>

      <div class="col-12 col-md-5 offset-md-1">
        <h2 class="h4 fw-bold text-guinda mb-3">
          <span class="text-burgundi">CONÓCENOS</span>
        </h2>
        <p class="mb-4">Somos un equipo de abogados, economistas, politólogos, comunicólogos, programadores, entre otros profesionales, trabajando juntos para combatir la corrupción en México.</p>
        <a class="btn bg-guinda text-white px-4" href="/conocenos">
          Conoce al equipo <i class="bi bi-people ms-1"></i>
        </a>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
