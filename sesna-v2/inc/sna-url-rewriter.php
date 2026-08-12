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
