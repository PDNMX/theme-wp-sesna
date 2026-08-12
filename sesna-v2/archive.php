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
 * Determinar la familia temática activa basada en la categoría actual
 * ------------------------------------------------------------------ */
$sna_active_familia = '';

if (is_category()) {
    $sna_current_cat  = get_queried_object();
    $sna_current_slug = $sna_current_cat ? $sna_current_cat->slug : '';

    if ($sna_current_slug) {
        foreach (sna_get_familias_tematicas() as $key => $familia) {
            if (in_array($sna_current_slug, $familia['cats'], true)) {
                $sna_active_familia = $key;
                break;
            }
        }
    }
}
?>

<div class="informacion-page-bg">
    <?php
    get_template_part(
        'template-parts/home/section-entradas',
        null,
        ['active_familia' => $sna_active_familia]
    );
    ?>
</div>

<?php get_footer(); ?>
