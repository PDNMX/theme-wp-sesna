<?php
get_header();
?>

<div class="sesna-single-wrapper">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content/single' ); ?>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
