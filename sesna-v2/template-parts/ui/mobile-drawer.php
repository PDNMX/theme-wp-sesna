<?php
/**
 * Drawer móvil (bottom sheet) — SND v1.1.0.
 *
 * Marco común de los selectores de sección/período en móvil: overlay, asa de
 * arrastre, encabezado con botón de cierre y cuerpo. El contenido del cuerpo lo
 * imprime cada vista mediante la función indicada en 'body', de modo que el
 * marcado resultante es idéntico al que antes se duplicaba en cada plantilla.
 *
 * Los ids se derivan del prefijo: {prefix}DrawerOverlay, {prefix}Drawer,
 * {prefix}DrawerHandle, {prefix}DrawerTitle, {prefix}DrawerCloseBtn y
 * {prefix}DrawerBody (los usan los scripts de cada página).
 *
 * @param array $args {
 *     @type string   $prefix        Prefijo de ids (p. ej. 'ocn', 'ad', 'pna', 'cf', 'fin').
 *     @type string   $title         Título del encabezado.
 *     @type string   $close_label   aria-label del botón de cierre.
 *     @type string   $overlay_class Clase adicional del overlay (opcional).
 *     @type callable $body          Imprime el contenido del cuerpo.
 * }
 */

if (!defined('ABSPATH')) {
	exit;
}

$prefix        = isset($args['prefix']) ? (string) $args['prefix'] : '';
$title         = isset($args['title']) ? (string) $args['title'] : '';
$close_label   = isset($args['close_label']) ? (string) $args['close_label'] : '';
$overlay_class = !empty($args['overlay_class']) ? ' ' . $args['overlay_class'] : '';
$body          = isset($args['body']) && is_callable($args['body']) ? $args['body'] : null;
?>
<div class="snd-drawer-overlay<?php echo esc_attr( $overlay_class ); ?> is-hidden" id="<?php echo esc_attr( $prefix ); ?>DrawerOverlay" aria-hidden="true">
    <div class="snd-drawer snd-drawer--bottom" id="<?php echo esc_attr( $prefix ); ?>Drawer" role="dialog" aria-modal="true" aria-labelledby="<?php echo esc_attr( $prefix ); ?>DrawerTitle">
        <!-- Drag Handle -->
        <div class="snd-drawer__handle-wrap" id="<?php echo esc_attr( $prefix ); ?>DrawerHandle">
            <span class="snd-drawer__handle" aria-hidden="true"></span>
        </div>

        <!-- Header -->
        <div class="snd-drawer__header">
            <h2 class="sh0b color--neutro800 mb--0" id="<?php echo esc_attr( $prefix ); ?>DrawerTitle"><?php echo esc_html( $title ); ?></h2>
            <button type="button" class="boton__fantasma snd-drawer__close-btn" id="<?php echo esc_attr( $prefix ); ?>DrawerCloseBtn" aria-label="<?php echo esc_attr( $close_label ); ?>">
                <?= sesna_render_snd_svg_icon('snd-close', 'icono--20') ?>
            </button>
        </div>

        <!-- Body -->
        <div class="snd-drawer__body" id="<?php echo esc_attr( $prefix ); ?>DrawerBody">
            <?php if ( $body ) { call_user_func( $body ); } ?>
        </div>
    </div>
</div>
