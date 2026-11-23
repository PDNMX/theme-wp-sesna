<?php
/**
 * Card SESNA con ícono — componente único (estilos en assets/css/card.css).
 *
 * Genera el marcado .sesna-card (encabezado ícono + título, texto y acción a
 * la derecha). El diseño (radio, color, sombra, hover, posición del ícono…) se
 * controla solo desde card.css; este parcial no lleva estilos.
 *
 * Sin atributo title (no hay tooltips): el aviso de ventana nueva va como texto oculto (.oculto).
 *
 * Uso:
 *   get_template_part( 'template-parts/ui/card', null, array(
 *       'href'   => 'https://…',          // si se indica y no hay 'stretched', la card completa es un <a>
 *       'target' => '_blank',
 *       'title'  => 'Comité Coordinador',
 *       'text'   => 'Descripción…',
 *       'icon'   => 'snd-group',          // nombre de ícono SND (SVG pre-renderizado)…
 *       'icon_img' => 'https://…/x.svg',  // …o imagen con su propio círculo
 *       'action' => array( 'type' => 'link', 'label' => 'Conoce más' ),
 *   ) );
 *
 * @param array $args {
 *     @type string       $href         Destino. Sin él, la card es un <div>.
 *     @type string       $target       '_blank' agrega rel y el aviso de ventana nueva.
 *     @type string       $tag          'a' | 'div'. Por defecto 'a' si hay href, si no 'div'.
 *     @type bool         $stretched    true: card <div> con el título como enlace expandido (enlace--expandido).
 *     @type string       $title        Título (texto plano).
 *     @type string       $title_tag    h2…h6. Por defecto 'h3'.
 *     @type string       $text         Descripción (texto plano).
 *     @type string       $icon         Nombre de ícono SND.
 *     @type string       $icon_img     URL de imagen de ícono.
 *     @type string       $icon_alt     Alt de la imagen del ícono.
 *     @type array        $action       'type' => link|button|arrow, 'label', 'icon' (ícono SND opcional), 'aria_label'.
 *     @type string       $class        Clases adicionales del contenedor.
 *     @type string       $aria_label   aria-label del contenedor (si es enlace).
 *     @type callable     $after        Imprime contenido extra dentro de la card (p. ej. un overlay).
 * }
 */

if (!defined('ABSPATH')) {
	exit;
}

$href      = isset($args['href']) ? (string) $args['href'] : '';
$target    = isset($args['target']) ? (string) $args['target'] : '';
$stretched = !empty($args['stretched']);
$tag       = isset($args['tag']) ? (string) $args['tag'] : ( ( $href !== '' && !$stretched ) ? 'a' : 'div' );
$title_tag = isset($args['title_tag']) ? (string) $args['title_tag'] : 'h3';
$title     = isset($args['title']) ? (string) $args['title'] : '';
$text      = isset($args['text']) ? (string) $args['text'] : '';
$icon      = isset($args['icon']) ? (string) $args['icon'] : '';
$icon_img  = isset($args['icon_img']) ? (string) $args['icon_img'] : '';
$icon_alt  = isset($args['icon_alt']) ? (string) $args['icon_alt'] : '';
$action    = isset($args['action']) && is_array($args['action']) ? $args['action'] : null;
$class     = 'sesna-card' . ( !empty($args['class']) ? ' ' . $args['class'] : '' );

$new_window = ( $target === '_blank' );
$link_attrs = '';
if ( $tag === 'a' ) {
	$link_attrs  = ' href="' . esc_url( $href ) . '"';
	$link_attrs .= $new_window ? ' target="_blank" rel="noopener noreferrer"' : '';
	$link_attrs .= !empty($args['aria_label']) ? ' aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
}
?>
<<?php echo esc_html( $tag ); ?> class="<?php echo esc_attr( $class ); ?>"<?php echo $link_attrs; // phpcs:ignore WordPress.Security.EscapeOutput ?>>
    <?php if ( $icon !== '' || $icon_img !== '' || $title !== '' ) : ?>
    <div class="sesna-card__header">
        <?php if ( $icon_img !== '' ) : ?>
            <img src="<?php echo esc_url( $icon_img ); ?>" alt="<?php echo esc_attr( $icon_alt ); ?>" class="sesna-card__icon">
        <?php elseif ( $icon !== '' ) : ?>
            <span class="sesna-card__icon" aria-hidden="true"><?= sesna_render_snd_svg_icon( $icon, 'icono--32' ) ?></span>
        <?php endif; ?>
        <?php if ( $title !== '' ) : ?>
            <<?php echo esc_html( $title_tag ); ?> class="sesna-card__title sh1b">
                <?php if ( $stretched && $href !== '' ) : ?>
                    <a href="<?php echo esc_url( $href ); ?>"<?php echo $new_window ? ' target="_blank" rel="noopener noreferrer"' : ''; ?> class="enlace--expandido decoracion--ninguna"><?php echo esc_html( $title ); ?><?php if ( $new_window ) : ?><span class="oculto"> (abre en ventana nueva)</span><?php endif; ?></a>
                <?php else : ?>
                    <?php echo esc_html( $title ); ?>
                <?php endif; ?>
            </<?php echo esc_html( $title_tag ); ?>>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <?php if ( $text !== '' ) : ?>
        <p class="sesna-card__text b1r mb--0"><?php echo esc_html( $text ); ?></p>
    <?php endif; ?>

    <?php if ( $action ) : ?>
        <div class="sesna-card__action">
            <?php if ( ( $action['type'] ?? 'link' ) === 'arrow' ) : ?>
                <?= sesna_render_snd_svg_icon( 'snd-chevron--right', 'icono--20 sesna-card__arrow' ) ?>
            <?php elseif ( ( $action['type'] ?? 'link' ) === 'button' ) : ?>
                <span class="boton__primario"<?php echo !empty($action['aria_label']) ? ' aria-label="' . esc_attr( $action['aria_label'] ) . '"' : ''; ?>>
                    <?php if ( !empty($action['icon']) ) { echo sesna_render_snd_svg_icon( $action['icon'], 'icono--16' ); } ?>
                    <?php echo esc_html( $action['label'] ?? '' ); ?>
                </span>
            <?php else : ?>
                <span class="sesna-card__link sh1b"><?php echo esc_html( $action['label'] ?? '' ); ?></span>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ( $tag === 'a' && $new_window ) : ?><span class="oculto">(abre en ventana nueva)</span><?php endif; ?>

    <?php if ( !empty($args['after']) && is_callable($args['after']) ) { call_user_func( $args['after'] ); } ?>
</<?php echo esc_html( $tag ); ?>>
