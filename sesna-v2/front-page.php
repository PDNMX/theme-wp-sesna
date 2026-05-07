<?php get_header(); ?>

<?php get_template_part( 'template-parts/home/banner' ); ?>

<?php get_template_part( 'template-parts/home/carousel' ); ?>

<?php get_template_part( 'template-parts/home/section-sna' ); ?>
<?php get_template_part( 'template-parts/home/section-integrantes' ); ?>
<?php get_template_part( 'template-parts/home/section-programas' ); ?>

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

<?php get_footer(); ?>