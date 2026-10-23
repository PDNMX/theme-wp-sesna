<?php
/**
 * archive.php — Archivo de categoría / tag / fecha
 *
 * Muestra el diseño "Noticias y Actividades" (section-entradas) con el tab
 * de la familia temática correcta pre-seleccionado según la categoría actual.
 * Esto permite que las URLs de categoría (e.g. /category/comite-coordinador/)
 * sigan siendo válidas y compartibles.
 */

get_header();

/* ------------------------------------------------------------------
 * Determinar la categoría activa basada en el archivo de categoría actual
 * ------------------------------------------------------------------ */
$sna_active_familia = 'todas';

if (is_category()) {
    $sna_current_cat  = get_queried_object();
    $sna_current_slug = $sna_current_cat && !empty($sna_current_cat->slug) ? $sna_current_cat->slug : '';

    if ($sna_current_slug) {
        $sna_active_familia = $sna_current_slug;
    }
}
?>

<div class="page-prensa front-page-bg">
    <?php
    get_template_part(
        'template-parts/home/section-entradas',
        null,
        ['active_familia' => $sna_active_familia]
    );
    ?>
</div>

<?php get_footer(); ?>
