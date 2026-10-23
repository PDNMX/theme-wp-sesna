<?php
get_header();

$posts_page_id = (int) get_option('page_for_posts');
$prensa_url    = $posts_page_id ? get_permalink($posts_page_id) : home_url('/prensa/');
?>

<div class="page-prensa front-page-bg pb--64">

    <!-- Migas de pan (Breadcrumb) — Estándar SND v1.1.0 -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="ruta__a">
                        <i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio
                    </a>
                </li>
                <li class="ruta__li">
                    <a href="<?php echo esc_url($prensa_url); ?>" class="ruta__a">Noticias</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page"><?php echo esc_html(wp_trim_words(get_the_title(), 8, '...')); ?></span>
                </li>
            </ul>
        </div>
    </nav>

    <div class="contenedor pt--20">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content/single' ); ?>
        <?php endwhile; ?>
    </div>

</div>

<?php get_footer(); ?>
