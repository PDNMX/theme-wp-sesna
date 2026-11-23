<?php
/**
 * Creación automática, una sola vez, de las subpáginas de Indicadores Nacionales.
 *
 * Módulo cargado desde functions.php. El código se movió sin modificaciones
 * funcionales respecto al functions.php monolítico original.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
}

// Asegura que exista la subpágina "Indicadores Nacionales" bajo "Seguimiento y evaluación"
add_action('init', function() {
    if (get_option('sesna_indicadores_nacionales_page_ready') === '1') {
        return;
    }
    $existing = get_page_by_path('acciones-y-programas/politica-nacional-anticorrupcion/seguimiento-evaluacion/indicadores-nacionales');
    if ($existing && $existing->post_status === 'publish') {
        update_post_meta($existing->ID, '_wp_page_template', 'page-indicadores-nacionales.php');
        update_option('sesna_indicadores_nacionales_page_ready', '1');
        return;
    }
    $parent = get_page_by_path('acciones-y-programas/politica-nacional-anticorrupcion/seguimiento-evaluacion');
    if (!$parent) {
        $parent = get_page_by_path('seguimiento-evaluacion');
    }
    $parent_id = $parent ? (int) $parent->ID : 0;
    $page_id = wp_insert_post(array(
        'post_title'   => 'Indicadores Nacionales',
        'post_name'    => 'indicadores-nacionales',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_parent'  => $parent_id,
        'post_content' => '',
    ));
    if ($page_id && !is_wp_error($page_id)) {
        update_post_meta($page_id, '_wp_page_template', 'page-indicadores-nacionales.php');
        update_option('sesna_indicadores_nacionales_page_ready', '1');
    }
});

add_action('init', function() {
    if (get_option('sesna_indicador_coordinacion_page_ready') === '1') {
        return;
    }
    $existing = get_page_by_path('acciones-y-programas/politica-nacional-anticorrupcion/seguimiento-evaluacion/indicadores-nacionales/coordinacion');
    if (!$existing) {
        $existing = get_page_by_path('seguimiento-evaluacion/indicadores-nacionales/coordinacion');
    }
    if ($existing && $existing->post_status === 'publish') {
        update_post_meta($existing->ID, '_wp_page_template', 'page-indicador-coordinacion.php');
        update_option('sesna_indicador_coordinacion_page_ready', '1');
        return;
    }
    $parent = get_page_by_path('acciones-y-programas/politica-nacional-anticorrupcion/seguimiento-evaluacion/indicadores-nacionales');
    if (!$parent) {
        $parent = get_page_by_path('seguimiento-evaluacion/indicadores-nacionales');
    }
    if (!$parent) {
        $parent = get_page_by_path('indicadores-nacionales');
    }
    $parent_id = $parent ? (int) $parent->ID : 0;
    $page_id = wp_insert_post(array(
        'post_title'   => 'Índice de Coordinación del Sistema Nacional Anticorrupción',
        'post_name'    => 'coordinacion',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_parent'  => $parent_id,
        'post_content' => '',
    ));
    if ($page_id && !is_wp_error($page_id)) {
        update_post_meta($page_id, '_wp_page_template', 'page-indicador-coordinacion.php');
        update_option('sesna_indicador_coordinacion_page_ready', '1');
    }
});
