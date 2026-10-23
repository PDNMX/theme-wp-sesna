<?php
/**
 * Template part para una card de entrada (sección "Entradas por Familia Temática")
 * Homologada con las cards del home (template-parts/home/section-noticias.php)
 */
$sna_entrada_cats = get_the_category();
$sna_entrada_cat  = '';
$sna_familia_key  = isset($args['familia_key']) ? $args['familia_key'] : '';

foreach ($sna_entrada_cats as $sna_cat) {
	if (empty($sna_familia_key) || $sna_familia_key === 'todas' || $sna_cat->slug === $sna_familia_key) {
		$sna_entrada_cat = $sna_cat->name;
		break;
	}
}

if (!$sna_entrada_cat && !empty($sna_entrada_cats)) {
	$sna_entrada_cat = $sna_entrada_cats[0]->name;
}
?>
<div class="columna__12 columna__6--md columna__4--lg">
    <a href="<?php the_permalink(); ?>" class="posicion--relativa ancho-minimo--0 alto--100 sna-noticias-card decoracion--ninguna color--neutro800 muestra--flex flex-direction-column">

        <?php if ($sna_entrada_cat) : ?>
            <span class="sna-entradas-card-category" title="<?php echo esc_attr($sna_entrada_cat); ?>">
                <?php echo esc_html($sna_entrada_cat); ?>
            </span>
        <?php endif; ?>

        <!-- Date Ribbon -->
        <div class="sna-noticias-date-badge">
            <span class="sna-noticias-date-day"><?php echo get_the_date('d'); ?></span>
            <span class="sna-noticias-date-month"><?php echo get_the_date('M'); ?></span>
        </div>

        <!-- Imagen -->
        <div class="sna-noticias-img-wrapper">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium_large', ['class' => 'ancho--100 alto--100 sna-noticias-img']); ?>
            <?php else : ?>
                <div class="ancho--100 alto--100 fondo--neutro200 muestra--flex align-items-center justify-content-center color--neutro600 sd sna-noticias-img">
                    <i class="snd__icono snd snd-image tamano--1" aria-hidden="true"></i>
                </div>
            <?php endif; ?>
        </div>

        <!-- Contenido -->
        <div class="flex--1-auto muestra--flex flex-direction-column texto--centro px--16 pt--24 pb--8">
            <h3 class="sh1b">
                <?php echo wp_trim_words(get_the_title(), 12, '...'); ?>
            </h3>
            <p class="b1r mb--24 sna-noticias-excerpt">
                <?php echo wp_trim_words(get_the_excerpt(), 35, '...'); ?>
            </p>
            <div class="mt--auto pb--16 texto--derecha--md">
                <span class="sh1b muestra--flex-linea align-items-center color--pguinda600">
                    Leer más
                </span>
            </div>
        </div>

    </a>
</div>
