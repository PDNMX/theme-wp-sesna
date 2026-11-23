<?php
/**
 * Migas de pan (breadcrumb) — Estándar SND v1.1.0 (.ruta__*).
 *
 * Genera exactamente el marcado oficial: ítem "Inicio" con ícono SND, ítems
 * intermedios con enlace y el ítem final como página actual.
 *
 * Uso:
 *   get_template_part( 'template-parts/ui/breadcrumb', null, array(
 *       'items' => array(
 *           array( 'label' => 'Acciones y Programas', 'url' => home_url( '/acciones-y-programas/' ) ),
 *           array( 'label' => 'Órganos Colegiados' ), // sin 'url' = página actual
 *       ),
 *   ) );
 *
 * @param array $args {
 *     @type array[] $items Cada ítem: 'label' (texto o HTML ya escapado) y 'url' opcional.
 * }
 */

if (!defined('ABSPATH')) {
	exit;
}

$items = isset($args['items']) && is_array($args['items']) ? $args['items'] : array();
?>
<nav class="ruta__cont" aria-label="Ruta de navegación">
    <div class="contenedor">
        <ul class="ruta__lista">
            <li class="ruta__li">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ruta__a"><?= sesna_render_snd_svg_icon('snd-home', 'icono--20') ?> Inicio</a>
            </li>
            <?php foreach ( $items as $item ) : ?>
            <li class="ruta__li">
                <?php if ( ! empty( $item['url'] ) ) : ?>
                <a href="<?php echo esc_url( $item['url'] ); ?>" class="ruta__a"><?php echo wp_kses_post( $item['label'] ); ?></a>
                <?php else : ?>
                <span class="ruta__a" aria-current="page"><?php echo wp_kses_post( $item['label'] ); ?></span>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>
