<?php
/**
 * Template part for displaying the home page banner.
 *
 * @package sesna
 */
?>

<!-- ============================================================
     SECCIÓN 1 — Banner / Hero
     ============================================================ -->
<section class="sesna-banner" aria-label="Banner institucional SESNA">
     <picture>
          <source media="(max-width: 767px)"
               srcset="<?php echo esc_url( get_theme_file_uri( '/img/home_v2/chico_sesna.jpg' ) ); ?>">
          <source media="(max-width: 1024px)"
               srcset="<?php echo esc_url( get_theme_file_uri( '/img/home_v2/medio_sesna.jpg' ) ); ?>">
          <img src="<?php echo esc_url( get_theme_file_uri( '/img/home_v2/grande_sesna.jpg' ) ); ?>"
               alt="Secretaría Ejecutiva del Sistema Nacional Anticorrupción" 
               class="sesna-banner__img">
     </picture>
</section>
