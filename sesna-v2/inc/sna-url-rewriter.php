<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sna_rewrite_sesna_domain_in_content( $content ) {
    $sesna_domains = [
        'https://www.sesna.gob.mx',
        'http://www.sesna.gob.mx',
        'https://sesna.gob.mx',
        'http://sesna.gob.mx',
    ];

    $site_url = untrailingslashit( home_url() );

    return str_replace( $sesna_domains, $site_url, $content );
}

/**
 * Resuelve la URL de un archivo del inventario a partir de su ruta relativa
 * dentro de uploads, sin depender del dominio.
 *
 * - "https://dominio/wp-content/uploads/2023/11/a.pdf" -> {uploads_baseurl}/2023/11/a.pdf
 * - "/wp-content/uploads/2023/11/a.pdf"                -> {uploads_baseurl}/2023/11/a.pdf
 * - Otras URLs/rutas (p. ej. /transparencia/archivo/)  -> se reescriben al dominio actual.
 * - Texto que no es URL ni ruta                         -> se devuelve sin cambios.
 */
function sna_resolve_upload_url( $url ) {
    if ( ! is_string( $url ) ) {
        return $url;
    }
    $url = trim( $url );

    if ( preg_match( '#/wp-content/uploads/(.+)$#', $url, $m ) ) {
        $uploads = wp_get_upload_dir();
        return trailingslashit( $uploads['baseurl'] ) . $m[1];
    }

    if ( 0 === strpos( $url, '/' ) && 0 !== strpos( $url, '//' ) ) {
        return home_url( $url );
    }

    return sna_rewrite_sesna_domain_in_content( $url );
}

// Contenido de las entradas (the_content)
add_filter( 'the_content', 'sna_rewrite_sesna_domain_in_content', 20 );

// Campos de ACF
add_filter( 'acf/format_value/type=url',  'sna_rewrite_sesna_domain_in_content', 20 );
add_filter( 'acf/format_value/type=text', 'sna_rewrite_sesna_domain_in_content', 20 );
add_filter( 'acf/format_value/type=file', function ( $value ) {
    if ( is_array( $value ) && isset( $value['url'] ) ) {
        $value['url'] = sna_rewrite_sesna_domain_in_content( $value['url'] );
    } elseif ( is_string( $value ) ) {
        $value = sna_rewrite_sesna_domain_in_content( $value );
    }
    return $value;
}, 20 );
