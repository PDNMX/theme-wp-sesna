<div class="entryContainer activeEntry">
    <div class="reticulaGrid__12">
        <div class="columna__12 columna__<?= is_page('solicitudes-de-informacion')?4:5 ?>--lg">
        <div class="thumbnailContainer">
        <a class="" href="<?php the_permalink(); ?>">
            <img src="<?php the_thumbnail_photo('thumb-medium'); ?>" class="thumbnail">
        </a>
        </div>
        <div class="d-flex">
            <div class="p-2"><img src="<?php bloginfo('stylesheet_directory') ?>/img/blog/entrada_<?= get_post_format() ?>.png" alt="lineas"></div>
            <div class="p-2"><p class="fecha"><?= get_the_date('d / m / Y'); ?></p></div>
        </div>
        </div>
        <div class="columna__12 columna__<?= is_page('solicitudes-de-informacion')?8:7 ?>--lg">
            <div class="etiquetasEntradaContainer">

            <?php get_template_part( 'template-parts/content/categories' ); ?> 

            </div>
            <h1 class="tituloEntry"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p class="descripcionEntry"><?php the_excerpt(); ?></p>

            <?php if( in_array(get_post_type(), ['normatividad', 'faqs']) ): ?>
                <a href="<?php the_file('archivo'); ?>" class="boton__secundario btn-download">Descargar PDF  <i class="fas fa-download" aria-hidden="true"></i></a>
            <?php else: ?>
                <a class="linkEntry" href="<?php the_permalink(); ?>">SEGUIR LEYENDO</a>
            
            <?php endif; ?>
        </div>
    </div>  <!-- ROW -->
</div>  <!--  entry Container -->