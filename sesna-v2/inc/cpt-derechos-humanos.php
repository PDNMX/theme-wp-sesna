<?php
/**
 * Micrositio de Derechos Humanos: CPTs `dh_campania`, `dh_comite_acta` y `dh_catalogo`, menú y metaboxes.
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
// REGISTRO DE CUSTOM POST TYPE: CAMPAÑAS DE SENSIBILIZACIÓN (DERECHOS HUMANOS)
// =========================================================================
function sesna_register_dh_campania_cpt() {
    $labels = array(
        'name'               => _x('Campañas de Sensibilización', 'Post type general name', 'sesna'),
        'singular_name'      => _x('Campaña', 'Post type singular name', 'sesna'),
        'menu_name'          => _x('Campañas D.H.', 'Admin Menu text', 'sesna'),
        'name_admin_bar'     => _x('Campaña', 'Add New on Toolbar', 'sesna'),
        'add_new'            => __('Añadir campaña', 'sesna'),
        'add_new_item'       => __('Añadir nueva campaña', 'sesna'),
        'new_item'           => __('Nueva campaña', 'sesna'),
        'edit_item'          => __('Editar campaña', 'sesna'),
        'view_item'          => __('Ver campaña', 'sesna'),
        'all_items'          => __('Todas las campañas', 'sesna'),
        'search_items'       => __('Buscar campañas', 'sesna'),
        'not_found'          => __('No se encontraron campañas.', 'sesna'),
        'not_found_in_trash' => __('No se encontraron campañas en la papelera.', 'sesna'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => 'menu-ddhhypgi',
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('dh_campania', $args);
}
add_action('init', 'sesna_register_dh_campania_cpt');

// Agregar menú agrupador "DDHHyPGI"
function sesna_add_ddhhypgi_menu() {
    add_menu_page(
        'DDHHyPGI',
        'DDHHyPGI',
        'edit_posts',
        'menu-ddhhypgi',
        '',
        'dashicons-groups',
        7
    );
}
add_action('admin_menu', 'sesna_add_ddhhypgi_menu');

// Meta Box principal para campos extra de la campaña
function sesna_add_dh_campania_meta_box() {
    add_meta_box(
        'dh_campania_extra',
        'Detalles de la Campaña',
        'sesna_dh_campania_meta_box_html',
        'dh_campania',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sesna_add_dh_campania_meta_box');

function sesna_dh_campania_meta_box_html($post) {
    wp_nonce_field('sesna_save_dh_campania_meta', 'sesna_dh_campania_nonce');

    $icono          = get_post_meta($post->ID, '_dh_icono',          true) ?: 'snd-star';
    $icono_img      = get_post_meta($post->ID, '_dh_icono_img',      true) ?: '';
    $infografia_ids = get_post_meta($post->ID, '_dh_infografia_ids', true) ?: '';
    $color          = get_post_meta($post->ID, '_dh_color',          true) ?: '#9B2247';
    $galeria_ids    = get_post_meta($post->ID, '_dh_galeria_ids',    true) ?: '';
    $video_url      = get_post_meta($post->ID, '_dh_video_url',      true) ?: '';
    $banner_texto   = get_post_meta($post->ID, '_dh_banner_texto',   true) ?: '';
    $orden          = get_post_meta($post->ID, '_dh_orden',          true) ?: '0';
    ?>
    <style>
        .dh-mb-row { margin-bottom: 16px; }
        .dh-mb-row label { font-weight: 600; display: block; margin-bottom: 5px; }
        .dh-mb-row input[type=text],
        .dh-mb-row input[type=number],
        .dh-mb-row input[type=color],
        .dh-mb-row textarea { width: 100%; max-width: 500px; }
        .dh-mb-row textarea { height: 80px; resize: vertical; }
        .dh-galeria-preview { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 8px; }
        .dh-galeria-preview img { width: 80px; height: 80px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; }
        .dh-mb-hint { color: #777; font-size: 12px; margin-top: 4px; }
    </style>

    <div class="dh-mb-row">
        <label>Imagen del ícono de la tarjeta <span class="dh-mb-hint">(imagen que aparece en la parte superior de la tarjeta — reemplaza al ícono si se carga)</span></label>
        <input type="hidden" id="dh_icono_img" name="_dh_icono_img" value="<?php echo esc_attr($icono_img); ?>">
        <div style="display:flex; align-items:center; gap:10px; margin-bottom:8px;">
            <button type="button" class="button" id="dh_icono_img_btn">Seleccionar imagen</button>
            <button type="button" class="button" id="dh_icono_img_clear">Quitar imagen</button>
        </div>
        <div id="dh_icono_img_preview" style="margin-bottom:8px;">
            <?php if ($icono_img): ?>
                <img src="<?php echo esc_url($icono_img); ?>" style="height:80px; width:auto; border-radius:6px; border:1px solid #ddd; object-fit:contain; background:#f9f9f9; padding:4px;">
            <?php endif; ?>
        </div>
        <p class="dh-mb-hint">Si no se carga imagen, se usará el ícono Bootstrap indicado abajo como respaldo.</p>
    </div>

    <div class="dh-mb-row">
        <label for="dh_icono">Ícono representativo (respaldo) <span class="dh-mb-hint">(solo aplica si no hay imagen de ícono cargada)</span></label>
        <input type="text" id="dh_icono" name="_dh_icono" value="<?php echo esc_attr($icono); ?>" placeholder="snd-favorite">
        <p class="dh-mb-hint">Ver íconos disponibles en el catálogo del Sistema Nacional de Diseño (SND).</p>
    </div>

    <div class="dh-mb-row">
        <label for="dh_color">Color institucional de la campaña</label>
        <div style="display:flex; align-items:center; gap:10px;">
            <input type="color" id="dh_color_picker" value="<?php echo esc_attr($color); ?>">
            <input type="text" id="dh_color" name="_dh_color" value="<?php echo esc_attr($color); ?>" placeholder="#9B2247" style="max-width:120px;">
        </div>
    </div>

    <div class="dh-mb-row">
        <label>Galería de imágenes <span class="dh-mb-hint">(puedes seleccionar varias imágenes)</span></label>
        <input type="hidden" id="dh_galeria_ids" name="_dh_galeria_ids" value="<?php echo esc_attr($galeria_ids); ?>">
        <div>
            <button type="button" class="button" id="dh_galeria_btn">Seleccionar imágenes</button>
            <button type="button" class="button" id="dh_galeria_clear" style="margin-left:6px;">Limpiar galería</button>
        </div>
        <div class="dh-galeria-preview" id="dh_galeria_preview">
            <?php
            if (!empty($galeria_ids)) {
                $ids_array = array_filter(explode(',', $galeria_ids));
                foreach ($ids_array as $img_id) {
                    $img_url = wp_get_attachment_image_url(intval($img_id), 'thumbnail');
                    if ($img_url) {
                        echo '<img src="' . esc_url($img_url) . '" data-id="' . intval($img_id) . '" alt="">';
                    }
                }
            }
            ?>
        </div>
    </div>

    <div class="dh-mb-row">
        <label>Imágenes de Infografía <span class="dh-mb-hint">(puedes seleccionar varias infografías)</span></label>
        <input type="hidden" id="dh_infografia_ids" name="_dh_infografia_ids" value="<?php echo esc_attr($infografia_ids); ?>">
        <div style="display:flex; align-items:center; gap:10px; margin-bottom:8px;">
            <button type="button" class="button" id="dh_infografia_btn">Seleccionar infografías</button>
            <button type="button" class="button" id="dh_infografia_clear">Limpiar infografías</button>
        </div>
        <div class="dh-galeria-preview" id="dh_infografia_preview">
            <?php
            if (!empty($infografia_ids)) {
                $ids_array = array_filter(explode(',', $infografia_ids));
                foreach ($ids_array as $img_id) {
                    $img_url = wp_get_attachment_image_url(intval($img_id), 'thumbnail');
                    if ($img_url) {
                        echo '<img src="' . esc_url($img_url) . '" data-id="' . intval($img_id) . '" alt="">';
                    }
                }
            }
            ?>
        </div>
        <p class="dh-mb-hint">Estas imágenes se mostrarán en la sección de infografía en la modal de la campaña.</p>
    </div>

    <div class="dh-mb-row">
        <label for="dh_video_url">URL de video <span class="dh-mb-hint">(YouTube, Vimeo o URL directa de video)</span></label>
        <div style="display:flex; gap:10px; align-items:center;">
            <input type="text" id="dh_video_url" name="_dh_video_url" value="<?php echo esc_attr($video_url); ?>" placeholder="https://www.youtube.com/watch?v=..." style="flex:1; max-width:none;">
            <button type="button" class="button" id="dh_video_media_btn">Seleccionar archivo</button>
        </div>
        <p class="dh-mb-hint">Deja vacío si no hay video. Si hay galería y video, el video tendrá prioridad en la modal.</p>
    </div>

    <div class="dh-mb-row">
        <label for="dh_banner_texto">Texto del banner informativo inferior <span class="dh-mb-hint">(aparece en recuadro rosa al pie de la modal)</span></label>
        <textarea id="dh_banner_texto" name="_dh_banner_texto"><?php echo esc_textarea($banner_texto); ?></textarea>
    </div>

    <div class="dh-mb-row">
        <label for="dh_orden">Orden de aparición en la página <span class="dh-mb-hint">(número menor = aparece primero)</span></label>
        <input type="number" id="dh_orden" name="_dh_orden" value="<?php echo esc_attr($orden); ?>" min="0" max="999" style="max-width:100px;">
    </div>

    <div class="dh-mb-row">
        <label for="dh_resumen">Resumen para la tarjeta <span class="dh-mb-hint">(texto corto que aparece en la tarjeta, ~80-120 caracteres)</span></label>
        <textarea id="dh_resumen" name="_dh_resumen" style="height:60px;"><?php echo esc_textarea( get_post_meta($post->ID, '_dh_resumen', true) ); ?></textarea>
    </div>

    <script>
    jQuery(document).ready(function($) {

        // Sincronizar color picker con input de texto
        $('#dh_color_picker').on('input change', function() {
            $('#dh_color').val($(this).val());
        });
        $('#dh_color').on('change', function() {
            var v = $(this).val();
            if (/^#[0-9A-Fa-f]{6}$/.test(v)) $('#dh_color_picker').val(v);
        });

        // ── Imagen del ícono de la tarjeta ──────────────────────
        var iconoImgFrame;
        $('#dh_icono_img_btn').on('click', function(e) {
            e.preventDefault();
            if (iconoImgFrame) { iconoImgFrame.open(); return; }
            iconoImgFrame = wp.media({
                title: 'Seleccionar imagen del ícono',
                button: { text: 'Usar esta imagen' },
                multiple: false,
                library: { type: 'image' }
            });
            iconoImgFrame.on('select', function() {
                var a = iconoImgFrame.state().get('selection').first().toJSON();
                var url = a.url;
                $('#dh_icono_img').val(url);
                $('#dh_icono_img_preview').html('<img src="' + url + '" style="height:80px; width:auto; border-radius:6px; border:1px solid #ddd; object-fit:contain; background:#f9f9f9; padding:4px;">');
            });
            iconoImgFrame.open();
        });
        $('#dh_icono_img_clear').on('click', function() {
            $('#dh_icono_img').val('');
            $('#dh_icono_img_preview').empty();
        });

        // ── Imágenes de la infografía (Múltiple) ─────────────────────────────
        var infografiaFrame;
        $('#dh_infografia_btn').on('click', function(e) {
            e.preventDefault();
            if (infografiaFrame) {
                infografiaFrame.open();
                return;
            }
            infografiaFrame = wp.media({
                title: 'Seleccionar Infografías',
                button: { text: 'Usar selección' },
                multiple: true,
                library: { type: 'image' }
            });
            infografiaFrame.on('select', function() {
                var selection = infografiaFrame.state().get('selection');
                var ids = [];
                var preview = $('#dh_infografia_preview');
                preview.empty();
                selection.each(function(attachment) {
                    var a = attachment.toJSON();
                    ids.push(a.id);
                    var thumb = a.sizes && a.sizes.thumbnail ? a.sizes.thumbnail.url : a.url;
                    preview.append('<img src="' + thumb + '" data-id="' + a.id + '" alt="">');
                });
                $('#dh_infografia_ids').val(ids.join(','));
            });
            infografiaFrame.open();
        });

        $('#dh_infografia_clear').on('click', function() {
            $('#dh_infografia_ids').val('');
            $('#dh_infografia_preview').empty();
        });

        // ── Galería múltiple con WP Media ───────────────────────
        var galeriaFrame;
        $('#dh_galeria_btn').on('click', function(e) {
            e.preventDefault();
            if (galeriaFrame) {
                galeriaFrame.open();
                return;
            }
            galeriaFrame = wp.media({
                title: 'Seleccionar imágenes de la campaña',
                button: { text: 'Usar selección' },
                multiple: true,
                library: { type: 'image' }
            });
            galeriaFrame.on('select', function() {
                var selection = galeriaFrame.state().get('selection');
                var ids = [];
                var preview = $('#dh_galeria_preview');
                preview.empty();
                selection.each(function(attachment) {
                    var a = attachment.toJSON();
                    ids.push(a.id);
                    var thumb = a.sizes && a.sizes.thumbnail ? a.sizes.thumbnail.url : a.url;
                    preview.append('<img src="' + thumb + '" data-id="' + a.id + '" alt="">');
                });
                $('#dh_galeria_ids').val(ids.join(','));
            });
            galeriaFrame.open();
        });

        $('#dh_galeria_clear').on('click', function() {
            $('#dh_galeria_ids').val('');
            $('#dh_galeria_preview').empty();
        });

        // Selector de archivo de video (WP Media, single)
        var videoFrame;
        $('#dh_video_media_btn').on('click', function(e) {
            e.preventDefault();
            if (videoFrame) {
                videoFrame.open();
                return;
            }
            videoFrame = wp.media({
                title: 'Seleccionar video',
                button: { text: 'Usar este archivo' },
                multiple: false,
                library: { type: 'video' }
            });
            videoFrame.on('select', function() {
                var attachment = videoFrame.state().get('selection').first().toJSON();
                $('#dh_video_url').val(attachment.url);
            });
            videoFrame.open();
        });
    });
    </script>
    <?php
}

function sesna_save_dh_campania_meta($post_id) {
    if (!isset($_POST['sesna_dh_campania_nonce']) || !wp_verify_nonce($_POST['sesna_dh_campania_nonce'], 'sesna_save_dh_campania_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $text_fields = array('_dh_icono', '_dh_infografia_ids', '_dh_color', '_dh_galeria_ids', '_dh_orden');
    foreach ($text_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }

    // Campos de URL: recortar el dominio para portabilidad (localhost -> prod)
    $url_fields = array('_dh_icono_img', '_dh_video_url');
    foreach ($url_fields as $field) {
        if (isset($_POST[$field])) {
            $val = sanitize_text_field($_POST[$field]);
            update_post_meta($post_id, $field, sesna_strip_domain_from_url($val));
        }
    }
    // Textareas
    foreach (array('_dh_banner_texto', '_dh_resumen') as $tf) {
        if (isset($_POST[$tf])) {
            update_post_meta($post_id, $tf, sanitize_textarea_field($_POST[$tf]));
        }
    }
}
add_action('save_post_dh_campania', 'sesna_save_dh_campania_meta');

// Encolar WP Media en admin para este CPT
function sesna_dh_campania_admin_scripts($hook) {
    global $typenow;
    if ($typenow === 'dh_campania') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'sesna_dh_campania_admin_scripts');

// =========================================================================
// CPT: Actas del Comité de Género (dh_comite_acta)
// =========================================================================
function sesna_register_dh_comite_acta_cpt() {
    $labels = array(
        'name'               => 'Actas C. Género',
        'singular_name'      => 'Acta',
        'menu_name'          => 'Actas C. Género',
        'add_new'            => 'Añadir nueva',
        'add_new_item'       => 'Añadir nueva Acta',
        'edit_item'          => 'Editar Acta',
        'new_item'           => 'Nueva Acta',
        'view_item'          => 'Ver Acta',
        'search_items'       => 'Buscar Actas',
        'not_found'          => 'No se encontraron actas',
        'not_found_in_trash' => 'No hay actas en la papelera'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => 'menu-ddhhypgi',
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 8,
        'menu_icon'          => 'dashicons-media-document',
        'supports'           => array('title'),
    );

    register_post_type('dh_comite_acta', $args);
}
add_action('init', 'sesna_register_dh_comite_acta_cpt');

function sesna_add_dh_comite_acta_meta_box() {
    add_meta_box(
        'dh_comite_acta_extra',
        'Detalles del Acta',
        'sesna_dh_comite_acta_meta_box_html',
        'dh_comite_acta',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sesna_add_dh_comite_acta_meta_box');

function sesna_dh_comite_acta_meta_box_html($post) {
    wp_nonce_field('sesna_save_dh_comite_acta_meta', 'sesna_dh_comite_acta_nonce');

    $anio   = get_post_meta($post->ID, '_dh_cg_anio', true) ?: date('Y');
    $tipo   = get_post_meta($post->ID, '_dh_cg_tipo', true) ?: 'Ordinaria';
    $modal  = get_post_meta($post->ID, '_dh_cg_modalidad', true) ?: 'Presencial';
    $url    = get_post_meta($post->ID, '_dh_cg_url', true) ?: '';
    ?>
    <style>
        .dh-cg-row { margin-bottom: 15px; }
        .dh-cg-row label { font-weight: 600; display: block; margin-bottom: 5px; }
        .dh-cg-row input[type="text"], .dh-cg-row input[type="number"], .dh-cg-row select { width: 100%; max-width: 400px; }
    </style>
    <div class="dh-cg-row">
        <label for="dh_cg_anio">Año</label>
        <input type="number" id="dh_cg_anio" name="_dh_cg_anio" value="<?php echo esc_attr($anio); ?>" required>
    </div>
    <div class="dh-cg-row">
        <label for="dh_cg_tipo">Tipo de sesión</label>
        <select id="dh_cg_tipo" name="_dh_cg_tipo">
            <option value="Ordinaria" <?php selected($tipo, 'Ordinaria'); ?>>Ordinaria</option>
            <option value="Extraordinaria" <?php selected($tipo, 'Extraordinaria'); ?>>Extraordinaria</option>
            <option value="Instalación" <?php selected($tipo, 'Instalación'); ?>>Instalación</option>
        </select>
    </div>
    <div class="dh-cg-row">
        <label for="dh_cg_modalidad">Modalidad</label>
        <select id="dh_cg_modalidad" name="_dh_cg_modalidad">
            <option value="Presencial" <?php selected($modal, 'Presencial'); ?>>Presencial</option>
            <option value="Virtual" <?php selected($modal, 'Virtual'); ?>>Virtual</option>
        </select>
    </div>
    <div class="dh-cg-row">
        <label for="dh_cg_url">URL del Acta </label>
        <div style="display:flex; gap:10px; max-width: 600px;">
            <input type="text" id="dh_cg_url" name="_dh_cg_url" value="<?php echo esc_attr($url); ?>" style="flex-grow:1;">
            <button type="button" class="button dh-cg-media-btn">Seleccionar Archivo</button>
        </div>
    </div>
    <script>
    jQuery(document).ready(function($){
        var mediaFrame;
        $('.dh-cg-media-btn').on('click', function(e) {
            e.preventDefault();
            if (mediaFrame) {
                mediaFrame.open();
                return;
            }
            mediaFrame = wp.media({
                title: 'Seleccionar PDF de Acta',
                button: { text: 'Usar este archivo' },
                multiple: false
            });
            mediaFrame.on('select', function() {
                var attachment = mediaFrame.state().get('selection').first().toJSON();
                $('#dh_cg_url').val(attachment.url);
            });
            mediaFrame.open();
        });
    });
    </script>
    <?php
}

function sesna_save_dh_comite_acta_meta($post_id) {
    if (!isset($_POST['sesna_dh_comite_acta_nonce']) || !wp_verify_nonce($_POST['sesna_dh_comite_acta_nonce'], 'sesna_save_dh_comite_acta_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['_dh_cg_anio'])) update_post_meta($post_id, '_dh_cg_anio', sanitize_text_field($_POST['_dh_cg_anio']));
    if (isset($_POST['_dh_cg_tipo'])) update_post_meta($post_id, '_dh_cg_tipo', sanitize_text_field($_POST['_dh_cg_tipo']));
    if (isset($_POST['_dh_cg_modalidad'])) update_post_meta($post_id, '_dh_cg_modalidad', sanitize_text_field($_POST['_dh_cg_modalidad']));
    if (isset($_POST['_dh_cg_url'])) update_post_meta($post_id, '_dh_cg_url', sesna_strip_domain_from_url(esc_url_raw($_POST['_dh_cg_url'])));
}
add_action('save_post_dh_comite_acta', 'sesna_save_dh_comite_acta_meta');

function sesna_dh_comite_acta_admin_scripts($hook) {
    global $typenow;
    if ($typenow === 'dh_comite_acta') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'sesna_dh_comite_acta_admin_scripts');

// =========================================================================
// CPT: Catálogos Digitales (dh_catalogo)
// =========================================================================
function sesna_register_dh_catalogo_cpt() {
    $labels = array(
        'name'               => 'Catálogos Digitales',
        'singular_name'      => 'Catálogo',
        'menu_name'          => 'Catálogos Digitales',
        'add_new'            => 'Añadir catálogo',
        'add_new_item'       => 'Añadir nuevo catálogo',
        'edit_item'          => 'Editar catálogo',
        'new_item'           => 'Nuevo catálogo',
        'view_item'          => 'Ver catálogo',
        'all_items'          => 'Todos los catálogos',
        'search_items'       => 'Buscar catálogos',
        'not_found'          => 'No se encontraron catálogos.',
        'not_found_in_trash' => 'No se encontraron catálogos en la papelera.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => 'menu-ddhhypgi',
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 9,
        'menu_icon'          => 'dashicons-book-alt',
        'supports'           => array('title', 'thumbnail'),
    );

    register_post_type('dh_catalogo', $args);
}
add_action('init', 'sesna_register_dh_catalogo_cpt');

function sesna_add_dh_catalogo_meta_box() {
    add_meta_box(
        'dh_catalogo_extra',
        'Páginas del Catálogo',
        'sesna_dh_catalogo_meta_box_html',
        'dh_catalogo',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sesna_add_dh_catalogo_meta_box');

function sesna_dh_catalogo_meta_box_html($post) {
    wp_nonce_field('sesna_save_dh_catalogo_meta', 'sesna_dh_catalogo_nonce');

    $paginas_ids = get_post_meta($post->ID, '_dh_cat_paginas_ids', true) ?: '';
    $portada_id  = get_post_meta($post->ID, '_dh_cat_portada_id',  true) ?: '';
    $resumen     = get_post_meta($post->ID, '_dh_cat_resumen',     true) ?: '';
    ?>
    <style>
        .dh-mb-row { margin-bottom: 16px; }
        .dh-mb-row label { font-weight: 600; display: block; margin-bottom: 5px; }
        .dh-mb-row textarea { width: 100%; max-width: 500px; height: 80px; resize: vertical; }
        .dh-galeria-preview { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 8px; }
        .dh-galeria-preview img { width: 80px; height: 80px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; }
        .dh-mb-hint { color: #777; font-size: 12px; margin-top: 4px; }
        .dh-portada-preview img { width: 90px; height: 112px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; margin-top: 8px; }
    </style>

    <div class="dh-mb-row">
        <label>Portada <span class="dh-mb-hint">(se muestra cerrada al abrir el catálogo; al hojear pasa a las páginas de abajo)</span></label>
        <input type="hidden" id="dh_cat_portada_id" name="_dh_cat_portada_id" value="<?php echo esc_attr($portada_id); ?>">
        <div>
            <button type="button" class="button" id="dh_cat_portada_btn">Seleccionar portada</button>
            <button type="button" class="button" id="dh_cat_portada_clear" style="margin-left:6px;">Quitar portada</button>
        </div>
        <div class="dh-portada-preview" id="dh_cat_portada_preview">
            <?php
            if (!empty($portada_id)) {
                $portada_url = wp_get_attachment_image_url(intval($portada_id), 'medium');
                if ($portada_url) {
                    echo '<img src="' . esc_url($portada_url) . '" alt="">';
                }
            }
            ?>
        </div>
    </div>

    <div class="dh-mb-row">
        <label>Páginas del catálogo <span class="dh-mb-hint">(selecciona las imágenes en el orden en que deben aparecer como páginas)</span></label>
        <input type="hidden" id="dh_cat_paginas_ids" name="_dh_cat_paginas_ids" value="<?php echo esc_attr($paginas_ids); ?>">
        <div>
            <button type="button" class="button" id="dh_cat_paginas_btn">Seleccionar imágenes</button>
            <button type="button" class="button" id="dh_cat_paginas_clear" style="margin-left:6px;">Limpiar páginas</button>
        </div>
        <div class="dh-galeria-preview" id="dh_cat_paginas_preview">
            <?php
            if (!empty($paginas_ids)) {
                $ids_array = array_filter(explode(',', $paginas_ids));
                foreach ($ids_array as $img_id) {
                    $img_url = wp_get_attachment_image_url(intval($img_id), 'thumbnail');
                    if ($img_url) {
                        echo '<img src="' . esc_url($img_url) . '" data-id="' . intval($img_id) . '" alt="">';
                    }
                }
            }
            ?>
        </div>
        <p class="dh-mb-hint">El orden de selección define el orden de las páginas en el catálogo.</p>
    </div>

    <div class="dh-mb-row">
        <label for="dh_cat_resumen">Resumen breve <span class="dh-mb-hint">(opcional)</span></label>
        <textarea id="dh_cat_resumen" name="_dh_cat_resumen"><?php echo esc_textarea($resumen); ?></textarea>
    </div>

    <script>
    jQuery(document).ready(function($) {
        // ── Portada ──────────────────────────────────────────────
        var portadaFrame;
        $('#dh_cat_portada_btn').on('click', function(e) {
            e.preventDefault();
            if (portadaFrame) { portadaFrame.open(); return; }
            portadaFrame = wp.media({
                title: 'Seleccionar portada del catálogo',
                button: { text: 'Usar esta imagen' },
                multiple: false,
                library: { type: 'image' }
            });
            portadaFrame.on('select', function() {
                var a = portadaFrame.state().get('selection').first().toJSON();
                var thumb = a.sizes && a.sizes.medium ? a.sizes.medium.url : a.url;
                $('#dh_cat_portada_id').val(a.id);
                $('#dh_cat_portada_preview').html('<img src="' + thumb + '" alt="">');
            });
            portadaFrame.open();
        });
        $('#dh_cat_portada_clear').on('click', function() {
            $('#dh_cat_portada_id').val('');
            $('#dh_cat_portada_preview').empty();
        });

        // Cada apertura crea un frame nuevo para poder precargar la selección
        // actual (lo ya guardado) y que las páginas nuevas se sumen a esas,
        // en vez de reemplazar todo el catálogo.
        $('#dh_cat_paginas_btn').on('click', function(e) {
            e.preventDefault();

            var paginasFrame = wp.media({
                title: 'Seleccionar páginas del catálogo',
                button: { text: 'Usar selección' },
                multiple: true,
                library: { type: 'image' }
            });

            paginasFrame.on('open', function() {
                var currentIds = ($('#dh_cat_paginas_ids').val() || '')
                    .split(',')
                    .map(function(id) { return parseInt(id, 10); })
                    .filter(function(id) { return !isNaN(id); });

                if (!currentIds.length) return;

                var selection = paginasFrame.state().get('selection');
                currentIds.forEach(function(id) {
                    var attachment = wp.media.attachment(id);
                    attachment.fetch();
                    selection.add(attachment);
                });
            });

            paginasFrame.on('select', function() {
                var selection = paginasFrame.state().get('selection');
                var ids = [];
                var preview = $('#dh_cat_paginas_preview');
                preview.empty();
                selection.each(function(attachment) {
                    var a = attachment.toJSON();
                    ids.push(a.id);
                    var thumb = a.sizes && a.sizes.thumbnail ? a.sizes.thumbnail.url : a.url;
                    preview.append('<img src="' + thumb + '" data-id="' + a.id + '" alt="">');
                });
                $('#dh_cat_paginas_ids').val(ids.join(','));
            });

            paginasFrame.open();
        });

        $('#dh_cat_paginas_clear').on('click', function() {
            $('#dh_cat_paginas_ids').val('');
            $('#dh_cat_paginas_preview').empty();
        });
    });
    </script>
    <?php
}

function sesna_save_dh_catalogo_meta($post_id) {
    if (!isset($_POST['sesna_dh_catalogo_nonce']) || !wp_verify_nonce($_POST['sesna_dh_catalogo_nonce'], 'sesna_save_dh_catalogo_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['_dh_cat_paginas_ids'])) {
        update_post_meta($post_id, '_dh_cat_paginas_ids', sanitize_text_field($_POST['_dh_cat_paginas_ids']));
    }
    if (isset($_POST['_dh_cat_portada_id'])) {
        update_post_meta($post_id, '_dh_cat_portada_id', sanitize_text_field($_POST['_dh_cat_portada_id']));
    }
    if (isset($_POST['_dh_cat_resumen'])) {
        update_post_meta($post_id, '_dh_cat_resumen', sanitize_textarea_field($_POST['_dh_cat_resumen']));
    }
}
add_action('save_post_dh_catalogo', 'sesna_save_dh_catalogo_meta');

function sesna_dh_catalogo_admin_scripts($hook) {
    global $typenow;
    if ($typenow === 'dh_catalogo') {
        wp_enqueue_media();
    }
}

add_action('admin_enqueue_scripts', 'sesna_dh_catalogo_admin_scripts');
add_action('admin_enqueue_scripts', 'sesna_dh_comite_acta_admin_scripts');
