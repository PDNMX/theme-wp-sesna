<?php
/**
 * CPT `pna_fichero` (Fichero del Informe PI-PNA), menú, metabox y mapa de fichas.
 *
 * Módulo cargado desde functions.php. El código se movió sin modificaciones
 * funcionales respecto al functions.php monolítico original.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
}

// =========================================================================
// REGISTRO DE MENÚ "PNA" Y CPT "FICHA DEL INFORME PI-PNA"
// (alimenta la sección "Fichero del Informe PI-PNA" de Implementación)
// =========================================================================

// 1. Agregar el menú agrupador "PNA"
function sesna_add_pna_menu() {
    add_menu_page(
        'PNA',                    // Título de la página
        'PNA',                    // Título del menú
        'edit_posts',              // Capacidad requerida
        'menu-pna',                // Slug del menú
        '',                        // Callback vacío (solo agrupador)
        'dashicons-media-document',// Ícono
        9                          // Posición
    );
}
add_action('admin_menu', 'sesna_add_pna_menu');

// 2. Registrar el Custom Post Type "Ficha del Informe PI-PNA"
//    Aparece como submenú "Implementación" dentro de "PNA".
function sesna_register_pna_fichero_cpt() {
    $labels = array(
        'name'               => _x('Fichas del Informe PI-PNA', 'Post type general name', 'sesna'),
        'singular_name'      => _x('Ficha del Informe PI-PNA', 'Post type singular name', 'sesna'),
        'menu_name'          => _x('Implementación', 'Admin Menu text', 'sesna'),
        'name_admin_bar'     => _x('Ficha PI-PNA', 'Add New on Toolbar', 'sesna'),
        'add_new'            => __('Añadir nueva', 'sesna'),
        'add_new_item'       => __('Añadir nueva ficha', 'sesna'),
        'new_item'           => __('Nueva ficha', 'sesna'),
        'edit_item'          => __('Editar ficha', 'sesna'),
        'view_item'          => __('Ver ficha', 'sesna'),
        'all_items'          => __('Fichero del Informe PI-PNA', 'sesna'),
        'search_items'       => __('Buscar fichas', 'sesna'),
        'not_found'          => __('No se encontraron fichas.', 'sesna'),
        'not_found_in_trash' => __('No se encontraron fichas en la papelera.', 'sesna'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => 'menu-pna',
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'supports'           => array('title'),
    );

    register_post_type('pna_fichero', $args);
}
add_action('init', 'sesna_register_pna_fichero_cpt');

// 3. Meta box: año, eje temático y archivo de la ficha
function sesna_add_pna_fichero_meta_box() {
    add_meta_box(
        'pna_fichero_meta',
        'Datos de la ficha',
        'sesna_pna_fichero_meta_box_html',
        'pna_fichero',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sesna_add_pna_fichero_meta_box');

function sesna_pna_fichero_meta_box_html($post) {
    wp_nonce_field('sesna_save_pna_fichero_meta', 'sesna_pna_fichero_nonce');

    $anio        = get_post_meta($post->ID, '_pna_fichero_anio', true) ?: date('Y');
    $eje         = get_post_meta($post->ID, '_pna_fichero_eje', true) ?: '1';
    $archivo_url = get_post_meta($post->ID, '_pna_fichero_archivo_url', true) ?: '';
    ?>
    <style>
        .pf-mb-row { margin-bottom: 16px; }
        .pf-mb-row label { font-weight: 600; display: block; margin-bottom: 5px; }
        .pf-mb-row input[type="number"],
        .pf-mb-row select { width: 100%; max-width: 300px; }
        .pf-mb-hint { color: #777; font-size: 12px; margin-top: 4px; }
    </style>

    <div class="pf-mb-row">
        <label for="pf_anio">Año</label>
        <input type="number" id="pf_anio" name="_pna_fichero_anio" value="<?php echo esc_attr($anio); ?>" min="2000" max="2100">
        <p class="pf-mb-hint">Año del informe al que pertenece la ficha. Controla qué botón de año aparece habilitado en "Fichero del Informe PI-PNA".</p>
    </div>

    <div class="pf-mb-row">
        <label for="pf_eje">Eje temático</label>
        <select id="pf_eje" name="_pna_fichero_eje">
            <?php for ($i = 1; $i <= 4; $i++) : ?>
                <option value="<?php echo $i; ?>" <?php selected((string) $eje, (string) $i); ?>>Eje <?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
    </div>

    <div class="pf-mb-row">
        <label for="pf_archivo_url">Archivo </label>
        <div style="display:flex; gap:10px; max-width:600px;">
            <input type="text" id="pf_archivo_url" name="_pna_fichero_archivo_url" value="<?php echo esc_attr($archivo_url); ?>" style="flex-grow:1;">
            <button type="button" class="button" id="pf_upload_btn">Seleccionar archivo</button>
        </div>
        <p class="pf-mb-hint">Si ya existe una ficha publicada con el mismo año y eje, esta la reemplaza (se muestra siempre la más reciente).</p>
    </div>

    <script>
    jQuery(document).ready(function($){
        var pfMediaFrame;
        $('#pf_upload_btn').on('click', function(e) {
            e.preventDefault();
            if (pfMediaFrame) {
                pfMediaFrame.open();
                return;
            }
            pfMediaFrame = wp.media({
                title: 'Seleccionar archivo de la ficha',
                button: { text: 'Usar este archivo' },
                multiple: false
            });
            pfMediaFrame.on('select', function() {
                var attachment = pfMediaFrame.state().get('selection').first().toJSON();
                var idx = attachment.url.indexOf('/wp-content/uploads/');
                var relativeUrl = idx !== -1 ? attachment.url.substring(idx) : attachment.url;
                $('#pf_archivo_url').val(relativeUrl);
            });
            pfMediaFrame.open();
        });
    });
    </script>
    <?php
}

function sesna_save_pna_fichero_meta($post_id) {
    if (!isset($_POST['sesna_pna_fichero_nonce']) || !wp_verify_nonce($_POST['sesna_pna_fichero_nonce'], 'sesna_save_pna_fichero_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['_pna_fichero_anio'])) {
        update_post_meta($post_id, '_pna_fichero_anio', sanitize_text_field($_POST['_pna_fichero_anio']));
    }
    if (isset($_POST['_pna_fichero_eje'])) {
        update_post_meta($post_id, '_pna_fichero_eje', max(1, min(4, intval($_POST['_pna_fichero_eje']))));
    }
    if (isset($_POST['_pna_fichero_archivo_url'])) {
        update_post_meta($post_id, '_pna_fichero_archivo_url', sesna_strip_domain_from_url(esc_url_raw($_POST['_pna_fichero_archivo_url'])));
    }
}
add_action('save_post_pna_fichero', 'sesna_save_pna_fichero_meta');

// 4. Encolar WP Media para que funcione el uploader en este CPT
function sesna_pna_fichero_admin_scripts($hook) {
    global $typenow;
    if ($typenow === 'pna_fichero') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'sesna_pna_fichero_admin_scripts');

/**
 * Mapa [año][eje] => URL resuelta (sin dominio congelado) de la ficha
 * publicada más reciente para esa combinación. Alimenta el visor de
 * "Fichero del Informe PI-PNA" en page-programa-implemetancion-pna.php.
 */
function sesna_get_pna_fichero_map() {
    $map = array();
    $posts = get_posts(array(
        'post_type'      => 'pna_fichero',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'ASC',
        'no_found_rows'  => true,
        'update_post_term_cache' => false,
    ));
    foreach ($posts as $post) {
        $anio = get_post_meta($post->ID, '_pna_fichero_anio', true);
        $eje  = get_post_meta($post->ID, '_pna_fichero_eje', true);
        $url  = get_post_meta($post->ID, '_pna_fichero_archivo_url', true);
        if (empty($anio) || empty($eje) || empty($url)) {
            continue;
        }
        $map[(int) $anio][(int) $eje] = sesna_resolve_archivo_url($url);
    }
    return $map;
}
