<?php
/**
 * Template part for displaying the home page banner.
 *
 * @package sesna
 */
?>

<!-- ============================================================
     SECCIÓN 1 — Banner / Hero
     Dimensión de referencia GOB.mx v3: 2880 × 624 px desktop
     ============================================================ -->
<section class="sesna-portada" aria-label="Banner institucional SESNA">
     <picture>
          <source media="(max-width: 767px)"
               srcset="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/chico_sesna.jpg' ); ?>">
          <source media="(max-width: 1199px)"
               srcset="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/medio_sesna.jpg' ); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/BannerSESNA.jpg' ); ?>"
               alt="Secretaría Ejecutiva del Sistema Nacional Anticorrupción"
               class="sesna-portada__img"
               width="2880" height="624">
     </picture>
</section>
