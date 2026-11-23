<?php
/**
 * Navegación institucional: filtros de menú y Sesna_Bootstrap_Nav_Walker (SND v1).
 *
 * Módulo cargado desde functions.php. El código se movió sin modificaciones
 * funcionales respecto al functions.php monolítico original.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
}

function add_additional_class_on_li($classes, $item, $args)
{
	if ($args->add_li_class) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class($atts, $item, $args)
{
	if (isset($args->theme_location) && in_array($args->theme_location, ['menu-1', 'menu-2', 'transparencia'])) {
		$atts['class'] = 'nav-link';
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

/* ---------------------------------------------------------------
   Bootstrap 5 Nav Walker para el menú principal SESNA
--------------------------------------------------------------- */
/**
 * SND v1 Nav Walker — genera HTML compatible con .navHeader__* del Sistema Nacional de Diseño.
 * Usa <details>/<summary> para submenús (hover en desktop vía CSS/JS, nativo en móvil).
 * URLs externas detectadas automáticamente para agregar ícono SND de enlace externo.
 */
class Sesna_Bootstrap_Nav_Walker extends Walker_Nav_Menu {

    /** URLs o slugs que son enlaces externos — reciben ícono snd-launch */
    private $external_slugs = ['pdn', 'paa', 'mercado-digital', 'mercado_digital'];

    private function is_external( $item ) {
        $home = home_url();
        $url  = $item->url;
        // Detectar por URL (fuera del dominio local) o por clases del ítem
        if ( strpos( $url, 'http' ) === 0 && strpos( $url, $home ) !== 0 ) {
            return true;
        }
        foreach ( $this->external_slugs as $slug ) {
            if ( in_array( 'menu-item-' . $slug, $item->classes ) ) return true;
        }
        return false;
    }

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= '<ul class="navHeader__submenu">';
        }
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= '</ul></details>';
        }
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $has_children = in_array( 'menu-item-has-children', $item->classes );
        $is_active    = in_array( 'current-menu-item', $item->classes ) ||
                        in_array( 'current-menu-ancestor', $item->classes );
        $is_external  = $this->is_external( $item );
        $current_attr = $is_active ? ' aria-current="page"' : '';
        $ext_icon     = $is_external ? ' <svg class="snd__icono snd-launch" data-snd-procesado="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="13" height="13" fill="currentColor" aria-hidden="true" style="font-size:0.85em;vertical-align:middle;margin-left:4px;"><path d="M26,28H6a2.0027,2.0027,0,0,1-2-2V6A2.0027,2.0027,0,0,1,6,4H16V6H6V26H26V16h2V26A2.0027,2.0027,0,0,1,26,28Z"/><path d="M20 2 20 4 26.586 4 18 12.586 19.414 14 28 5.414 28 12 30 12 30 2 20 2z"/></svg>' : '';
        $ext_attr     = $is_external ? ' target="_blank" rel="noopener noreferrer"' : '';
        $chevron_svg  = '<svg class="snd__icono snd-chevron--down navHeader__chevron" data-snd-procesado="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="12" height="12" fill="currentColor" aria-hidden="true"><path d="M16 22 6 12 7.4 10.6 16 19.2 24.6 10.6 26 12z"/></svg>';

        if ( $depth === 0 ) {
            $output .= '<li class="navHeader__li' . ( $is_active ? ' navHeader__li--active' : '' ) . '">';

            if ( $has_children ) {
                // <details> abre/cierra el submenu nativamente; hover en desktop vía CSS/JS
                $output .= '<details class="navHeader__details detailsClickOut">';
                $output .= '<summary class="navHeader__a navHeader__a--toggle"' . $current_attr . '>'
                    . esc_html( $item->title )
                    . $chevron_svg
                    . '</summary>';
                // end_lvl closes </ul></details>
            } else {
                $output .= '<a class="navHeader__a"'
                    . ' href="' . esc_url( $item->url ) . '"'
                    . $current_attr
                    . $ext_attr . '>'
                    . esc_html( $item->title )
                    . $ext_icon
                    . '</a>';
            }
        } else {
            // Nivel 1 — subitems dentro del <details>
            $is_sub_active = in_array( 'current-menu-item', $item->classes );
            $sub_current   = $is_sub_active ? ' aria-current="page"' : '';
            $output .= '<li class="navHeader__li--sub' . ( $is_sub_active ? ' navHeader__li--subActive' : '' ) . '">';
            $output .= '<a class="navHeader__a--sub"'
                . ' href="' . esc_url( $item->url ) . '"'
                . $sub_current
                . $ext_attr . '>'
                . esc_html( $item->title )
                . $ext_icon
                . '</a>';
        }
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}
