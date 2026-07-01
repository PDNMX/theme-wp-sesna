<?php
/**
 * Template part para una card de entrada (sección "Entradas por Familia Temática")
 * Espera (opcional) $args['familia_key'] para mostrar, entre las categorías
 * del post, la que realmente pertenece a la familia activa.
 */
$sna_entrada_cats   = get_the_category();
$sna_entrada_cat    = '';
$sna_familia_key    = isset($args['familia_key']) ? $args['familia_key'] : '';
$sna_familia_slugs  = $sna_familia_key ? sna_get_familias_tematicas()[$sna_familia_key]['cats'] ?? [] : [];

foreach ($sna_entrada_cats as $sna_cat) {
	if (empty($sna_familia_slugs) || in_array($sna_cat->slug, $sna_familia_slugs, true)) {
		$sna_entrada_cat = $sna_cat->name;
		break;
	}
}

if (!$sna_entrada_cat && !empty($sna_entrada_cats)) {
	$sna_entrada_cat = $sna_entrada_cats[0]->name;
}
?>
<div class="col-lg-4 col-md-6">
    <a href="<?php the_permalink(); ?>" class="card h-100 border-0 sna-noticias-card position-relative text-decoration-none text-dark d-flex flex-column">

        <?php if ($sna_entrada_cat) : ?>
            <span class="sna-entradas-card-category"><?php echo esc_html($sna_entrada_cat); ?></span>
        <?php endif; ?>

        <!-- Date Ribbon -->
        <div class="sna-noticias-date-badge">
            <span class="sna-noticias-date-day"><?php echo get_the_date('d'); ?></span>
            <span class="sna-noticias-date-month"><?php echo get_the_date('M'); ?></span>
        </div>

        <!-- Imagen -->
        <div class="sna-noticias-img-wrapper">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium_large', ['class' => 'w-100 h-100 sna-noticias-img']); ?>
            <?php else : ?>
                <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted sna-noticias-img">
                    <i class="bi bi-image fs-1"></i>
                </div>
            <?php endif; ?>
        </div>

        <!-- Contenido -->
        <div class="card-body d-flex flex-column text-center px-3 pt-4 pb-2">
            <h4 class="fw-bold mb-3 sna-noticias-title text-dark">
                <?php echo wp_trim_words(get_the_title(), 12, '...'); ?>
            </h4>
            <p class="text-muted mb-4 sna-noticias-excerpt">
                <?php echo wp_trim_words(get_the_excerpt(), 35, '...'); ?>
            </p>
            <div class="mt-auto pb-3">
                <span class="text-decoration-none fw-bold fs-5 sna-noticias-link d-inline-flex align-items-center text-guinda">
                    Leer más <i class="bi bi-arrow-right ms-2"></i>
                </span>
            </div>
        </div>

    </a>
</div>
