<?php get_header(); ?>

<div class="front-page-bg has-fullbleed-hero">

<?php get_template_part( 'template-parts/home/banner' ); ?>

<?php get_template_part( 'template-parts/home/carousel' ); ?>

<?php get_template_part( 'template-parts/home/section-sna' ); ?>
<div class="sna-section-separator"></div>
<?php get_template_part( 'template-parts/home/section-integrantes' ); ?>
<div class="sna-section-separator"></div>
<?php get_template_part( 'template-parts/home/section-programas' ); ?>
<div class="sna-section-separator"></div>
<?php get_template_part( 'template-parts/home/section-noticias' ); ?>

    <div class="container pb-5">
        <?php
        // Loop principal requerido por Elementor
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>

</div>

<?php get_footer(); ?>