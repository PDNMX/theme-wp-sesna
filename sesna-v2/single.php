<?php
get_header();

$posts_page_id = (int) get_option('page_for_posts');
$prensa_url    = $posts_page_id ? get_permalink($posts_page_id) : home_url('/prensa/');
?>

<div class="page-prensa front-page-bg pb--64">

    <!-- Migas de pan (Breadcrumb) — Estándar SND v1.1.0 -->
    <?php get_template_part( 'template-parts/ui/breadcrumb', null, array(
        'items' => array(
            array( 'label' => 'Noticias', 'url' => $prensa_url ),
            array( 'label' => esc_html(wp_trim_words(get_the_title(), 8, '...')) ),
        ),
    ) ); ?>

    <div class="contenedor pt--20">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content/single' ); ?>
        <?php endwhile; ?>
    </div>

</div>

<?php get_footer(); ?>
