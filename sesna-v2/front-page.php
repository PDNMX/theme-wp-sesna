<?php get_header(); ?>

<div class="front-page-bg">

<?php get_template_part( 'template-parts/home/banner' ); ?>

<?php get_template_part( 'template-parts/home/carousel' ); ?>

<?php get_template_part( 'template-parts/home/section-sna' ); ?>
<?php get_template_part( 'template-parts/home/section-integrantes' ); ?>
<?php get_template_part( 'template-parts/home/section-programas' ); ?>
<?php get_template_part( 'template-parts/home/section-noticias' ); ?>

    <div class="contenedor pb--48">
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