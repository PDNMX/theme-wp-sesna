<?php
/**
 * Órganos Colegiados: CPT `oc_sesion`, metaboxes, guardado, sesna_get_all_oc_data() y helpers sesna_render_oc_*.
 *
 * Módulo cargado desde functions.php. El código se movió sin modificaciones
 * funcionales respecto al functions.php monolítico original.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
}

/* =====================================================================
 * ÓRGANOS COLEGIADOS (Comité Coordinador, Comisión Ejecutiva,
 * Órgano de Gobierno, Recomendaciones no vinculantes, Exhortos)
 * CPT único `oc_sesion` con meta discriminador `_oc_organo`, siguiendo
 * el mismo patrón ya usado en comite_transparencia/datos-personales.
 * ===================================================================== */

function sesna_register_oc_sesion_cpt() {
    $labels = array(
        'name'               => _x('Sesiones de Órganos Colegiados', 'Post type general name', 'sesna'),
        'singular_name'      => _x('Sesión / Documento', 'Post type singular name', 'sesna'),
        'menu_name'          => _x('Órganos Colegiados', 'Admin Menu text', 'sesna'),
        'name_admin_bar'     => _x('Sesión OC', 'Add New on Toolbar', 'sesna'),
        'add_new'            => __('Añadir nueva', 'sesna'),
        'add_new_item'       => __('Añadir nueva sesión/documento', 'sesna'),
        'new_item'           => __('Nueva sesión', 'sesna'),
        'edit_item'          => __('Editar sesión', 'sesna'),
        'view_item'          => __('Ver sesión', 'sesna'),
        'all_items'          => __('Órganos Colegiados', 'sesna'),
        'search_items'       => __('Buscar sesiones', 'sesna'),
        'not_found'          => __('No se encontraron sesiones.', 'sesna'),
        'not_found_in_trash' => __('No se encontraron sesiones en la papelera.', 'sesna'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-groups',
        'menu_position'      => 6,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'supports'           => array('title'),
    );

    register_post_type('oc_sesion', $args);
}
add_action('init', 'sesna_register_oc_sesion_cpt');

function sesna_add_oc_sesion_meta_box() {
    add_meta_box(
        'oc_sesion_meta',
        'Datos de la Sesión / Documento',
        'sesna_oc_sesion_meta_box_html',
        'oc_sesion',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sesna_add_oc_sesion_meta_box');

function sesna_oc_sesion_meta_box_html($post) {
    wp_nonce_field('sesna_save_oc_meta', 'sesna_oc_meta_nonce');

    $organo          = get_post_meta($post->ID, '_oc_organo', true) ?: 'comite';
    $modo            = get_post_meta($post->ID, '_oc_modo', true) ?: 'sesion';
    $fecha           = get_post_meta($post->ID, '_oc_fecha', true);
    $tipo_sesion     = get_post_meta($post->ID, '_oc_tipo_sesion', true) ?: 'Ordinaria';
    $acuerdos        = get_post_meta($post->ID, '_oc_acuerdos', true);
    $video_url       = get_post_meta($post->ID, '_oc_video_url', true);
    $documentos_json = get_post_meta($post->ID, '_oc_documentos', true) ?: '[]';
    $documentos      = json_decode($documentos_json, true);
    if (!is_array($documentos)) {
        $documentos = array();
    }
    
    $anexos_json = get_post_meta($post->ID, '_oc_anexos', true) ?: '[]';
    $anexos = json_decode($anexos_json, true);
    if (!is_array($anexos)) {
        $anexos = array();
    }
    ?>
    <style>
        .oc-row { margin-bottom: 15px; }
        .oc-row label { font-weight: bold; display: block; margin-bottom: 5px; }
        .oc-row input[type=text], .oc-row input[type=number], .oc-row input[type=date], .oc-row select { width: 100%; max-width: 400px; }
        .oc-doc-row { display: flex; gap: 10px; align-items: center; margin-bottom: 8px; padding: 8px; background: #f6f7f7; border-radius: 4px; }
        .oc-doc-row .oc-doc-nombre { flex: 1; }
        .oc-doc-row .oc-doc-archivo { flex: 1; }
        .oc-doc-remove { color: #b32d2e; cursor: pointer; }
    </style>

    <div class="oc-row">
        <label for="oc_organo">Órgano</label>
        <select id="oc_organo" name="_oc_organo">
            <option value="comite" <?php selected($organo, 'comite'); ?>>Comité Coordinador</option>
            <option value="comision" <?php selected($organo, 'comision'); ?>>Comisión Ejecutiva</option>
            <option value="organo_gobierno" <?php selected($organo, 'organo_gobierno'); ?>>Órgano de Gobierno</option>
            <option value="recomendaciones" <?php selected($organo, 'recomendaciones'); ?>>Recomendaciones no vinculantes</option>
            <option value="exhortos" <?php selected($organo, 'exhortos'); ?>>Exhortos</option>
        </select>
    </div>

    <div class="oc-row">
        <label for="oc_modo">Tipo de entrada</label>
        <select id="oc_modo" name="_oc_modo">
            <option value="sesion" <?php selected($modo, 'sesion'); ?>>Sesión (con fecha y documentos agrupados)</option>
            <option value="lista_directa" <?php selected($modo, 'lista_directa'); ?>>Documento suelto (sin sesión, ej. Recomendación/Exhorto)</option>
        </select>
        <p class="description">El título de esta entrada (arriba) es el nombre de la sesión o del documento suelto.</p>
    </div>

    <div id="oc_row_sesion_fields">
        <div class="oc-row">
            <label for="oc_fecha">Fecha de la sesión</label>
            <input type="date" id="oc_fecha" name="_oc_fecha" value="<?php echo esc_attr($fecha); ?>">
        </div>
        <div class="oc-row">
            <label for="oc_tipo_sesion">Tipo de sesión</label>
            <select id="oc_tipo_sesion" name="_oc_tipo_sesion">
                <option value="Ordinaria" <?php selected($tipo_sesion, 'Ordinaria'); ?>>Ordinaria</option>
                <option value="Extraordinaria" <?php selected($tipo_sesion, 'Extraordinaria'); ?>>Extraordinaria</option>
            </select>
        </div>
        <div class="oc-row">
            <label for="oc_acuerdos">Número de acuerdos tomados</label>
            <input type="number" id="oc_acuerdos" name="_oc_acuerdos" value="<?php echo esc_attr($acuerdos !== '' ? $acuerdos : '0'); ?>" min="0">
        </div>
        <div class="oc-row">
            <label for="oc_video_url">Ver sesión (URL de YouTube o video)</label>
            <input type="text" id="oc_video_url" name="_oc_video_url" value="<?php echo esc_attr($video_url); ?>" placeholder="https://www.youtube.com/watch?v=... o /wp-content/uploads/...">
            <p class="description">Deja vacío si esta sesión no tiene grabación disponible; el ícono "Ver sesión" se mostrará deshabilitado.</p>
        </div>
    </div>

    <div class="oc-row">
        <label>Documentos</label>
        <div id="oc_documentos_repeater">
            <?php foreach ($documentos as $doc) : ?>
            <div class="oc-doc-row">
                <input type="text" class="oc-doc-nombre" placeholder="Nombre (ej. Convocatoria, Anexo I...)" value="<?php echo esc_attr($doc['nombre'] ?? ''); ?>">
                <input type="text" class="oc-doc-archivo" placeholder="/wp-content/uploads/..." value="<?php echo esc_attr($doc['archivo'] ?? ''); ?>">
                <button type="button" class="button oc-doc-upload-btn">Seleccionar</button>
                <span class="dashicons dashicons-no-alt oc-doc-remove"></span>
            </div>
            <?php endforeach; ?>
        </div>
        <button type="button" class="button button-secondary" id="oc_doc_add_btn">+ Agregar documento</button>
        <input type="hidden" id="oc_documentos_json" name="_oc_documentos_json" value="">
    </div>

    <div class="oc-row" style="margin-top: 30px;">
        <label>Anexos</label>
        <div id="oc_anexos_repeater">
            <?php foreach ($anexos as $doc) : ?>
            <div class="oc-doc-row">
                <input type="text" class="oc-doc-nombre" placeholder="Nombre (ej. Anexo 1...)" value="<?php echo esc_attr($doc['nombre'] ?? ''); ?>">
                <input type="text" class="oc-doc-archivo" placeholder="/wp-content/uploads/..." value="<?php echo esc_attr($doc['archivo'] ?? ''); ?>">
                <button type="button" class="button oc-doc-upload-btn">Seleccionar</button>
                <span class="dashicons dashicons-no-alt oc-doc-remove"></span>
            </div>
            <?php endforeach; ?>
        </div>
        <button type="button" class="button button-secondary" id="oc_anexo_add_btn">+ Agregar anexo</button>
        <input type="hidden" id="oc_anexos_json" name="_oc_anexos_json" value="">
    </div>

    <script>
    jQuery(document).ready(function($){
        function toggleSesionFields() {
            $('#oc_row_sesion_fields').toggle($('#oc_modo').val() === 'sesion');
        }
        $('#oc_modo').change(toggleSesionFields);
        toggleSesionFields();

        function docRowTemplate(nombre, archivo) {
            return '<div class="oc-doc-row">' +
                '<input type="text" class="oc-doc-nombre" placeholder="Nombre (ej. Convocatoria, Anexo I...)" value="' + (nombre || '') + '">' +
                '<input type="text" class="oc-doc-archivo" placeholder="/wp-content/uploads/..." value="' + (archivo || '') + '">' +
                '<button type="button" class="button oc-doc-upload-btn">Seleccionar</button>' +
                '<span class="dashicons dashicons-no-alt oc-doc-remove"></span>' +
                '</div>';
        }

        $('#oc_doc_add_btn').click(function(e) {
            e.preventDefault();
            $('#oc_documentos_repeater').append(docRowTemplate('', ''));
        });

        $('#oc_anexo_add_btn').click(function(e) {
            e.preventDefault();
            $('#oc_anexos_repeater').append(docRowTemplate('', ''));
        });

        $('#oc_documentos_repeater, #oc_anexos_repeater').on('click', '.oc-doc-remove', function() {
            $(this).closest('.oc-doc-row').remove();
        });

        var ocMediaUploader;
        $('#oc_documentos_repeater, #oc_anexos_repeater').on('click', '.oc-doc-upload-btn', function(e) {
            e.preventDefault();
            var $row = $(this).closest('.oc-doc-row');
            ocMediaUploader = wp.media({
                title: 'Seleccionar Archivo',
                button: { text: 'Usar este archivo' },
                multiple: false
            });
            ocMediaUploader.on('select', function() {
                var attachment = ocMediaUploader.state().get('selection').first().toJSON();
                var idx = attachment.url.indexOf('/wp-content/uploads/');
                var relativeUrl = idx !== -1 ? attachment.url.substring(idx) : attachment.url;
                $row.find('.oc-doc-archivo').val(relativeUrl);
            });
            ocMediaUploader.open();
        });

        $('#post').on('submit', function() {
            var docs = [];
            $('#oc_documentos_repeater .oc-doc-row').each(function() {
                var nombre = $(this).find('.oc-doc-nombre').val().trim();
                var archivo = $(this).find('.oc-doc-archivo').val().trim();
                if (nombre || archivo) {
                    docs.push({ nombre: nombre, archivo: archivo });
                }
            });
            $('#oc_documentos_json').val(JSON.stringify(docs));

            var anexos = [];
            $('#oc_anexos_repeater .oc-doc-row').each(function() {
                var nombre = $(this).find('.oc-doc-nombre').val().trim();
                var archivo = $(this).find('.oc-doc-archivo').val().trim();
                if (nombre || archivo) {
                    anexos.push({ nombre: nombre, archivo: archivo });
                }
            });
            $('#oc_anexos_json').val(JSON.stringify(anexos));
        });
    });
    </script>
    <?php
}

function sesna_save_oc_meta($post_id) {
    if (!isset($_POST['sesna_oc_meta_nonce']) || !wp_verify_nonce($_POST['sesna_oc_meta_nonce'], 'sesna_save_oc_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $scalar_fields = array('_oc_organo', '_oc_modo', '_oc_fecha', '_oc_tipo_sesion', '_oc_acuerdos');
    foreach ($scalar_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }

    if (isset($_POST['_oc_video_url'])) {
        update_post_meta($post_id, '_oc_video_url', sesna_strip_domain_from_url(sanitize_text_field($_POST['_oc_video_url'])));
    }

    if (isset($_POST['_oc_documentos_json'])) {
        $raw = json_decode(wp_unslash($_POST['_oc_documentos_json']), true);
        $clean = array();
        if (is_array($raw)) {
            foreach ($raw as $doc) {
                $nombre = isset($doc['nombre']) ? sanitize_text_field($doc['nombre']) : '';
                $archivo = isset($doc['archivo']) ? sanitize_text_field($doc['archivo']) : '';
                if ($nombre === '' && $archivo === '') {
                    continue;
                }
                $clean[] = array(
                    'nombre'  => $nombre,
                    'archivo' => sesna_strip_domain_from_url($archivo),
                );
            }
        }
        update_post_meta($post_id, '_oc_documentos', wp_slash(wp_json_encode($clean)));
    }

    if (isset($_POST['_oc_anexos_json'])) {
        $raw = json_decode(wp_unslash($_POST['_oc_anexos_json']), true);
        $clean = array();
        if (is_array($raw)) {
            foreach ($raw as $doc) {
                $nombre = isset($doc['nombre']) ? sanitize_text_field($doc['nombre']) : '';
                $archivo = isset($doc['archivo']) ? sanitize_text_field($doc['archivo']) : '';
                if ($nombre === '' && $archivo === '') {
                    continue;
                }
                $clean[] = array(
                    'nombre'  => $nombre,
                    'archivo' => sesna_strip_domain_from_url($archivo),
                );
            }
        }
        update_post_meta($post_id, '_oc_anexos', wp_slash(wp_json_encode($clean)));
    }
}
add_action('save_post_oc_sesion', 'sesna_save_oc_meta');

function sesna_oc_admin_scripts($hook) {
    global $typenow;
    if ($typenow == 'oc_sesion') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'sesna_oc_admin_scripts');

/**
 * Carga y agrupa en una sola pasada de base de datos todas las entradas y
 * estadísticas de Órganos Colegiados (evita ejecutar 9 WP_Query separadas).
 */
function sesna_get_all_oc_data() {
    static $cache = null;
    if ($cache !== null) {
        return $cache;
    }

    $query = new WP_Query(array(
        'post_type'              => 'oc_sesion',
        'posts_per_page'         => -1,
        'post_status'            => 'publish',
        'orderby'                => 'date',
        'order'                  => 'DESC',
        'no_found_rows'          => true,
        'update_post_term_cache' => false,
    ));

    $by_organo = array(
        'comite'          => array(),
        'comision'        => array(),
        'organo_gobierno' => array(),
        'recomendaciones' => array(),
        'exhortos'        => array(),
    );
    $stats = array(
        'comite'          => array('sesiones' => 0, 'acuerdos' => 0),
        'comision'        => array('sesiones' => 0, 'acuerdos' => 0),
        'organo_gobierno' => array('sesiones' => 0, 'acuerdos' => 0),
    );

    if ($query->have_posts()) {
        foreach ($query->posts as $post) {
            $id = $post->ID;
            $organo = get_post_meta($id, '_oc_organo', true);
            if (!isset($by_organo[$organo])) {
                continue;
            }

            $documentos_json = get_post_meta($id, '_oc_documentos', true) ?: '[]';
            $documentos = json_decode($documentos_json, true);
            if (!is_array($documentos)) {
                $documentos = array();
            }
            foreach ($documentos as &$doc) {
                $doc['enlace'] = sesna_resolve_archivo_url($doc['archivo'] ?? '');
            }
            unset($doc);

            $anexos_json = get_post_meta($id, '_oc_anexos', true) ?: '[]';
            $anexos_db = json_decode($anexos_json, true);
            if (!is_array($anexos_db)) {
                $anexos_db = array();
            }
            foreach ($anexos_db as &$doc) {
                $doc['enlace'] = sesna_resolve_archivo_url($doc['archivo'] ?? '');
            }
            unset($doc);

            $fecha = get_post_meta($id, '_oc_fecha', true);
            $modo  = get_post_meta($id, '_oc_modo', true) ?: 'sesion';
            $acuerdos = (int) get_post_meta($id, '_oc_acuerdos', true);

            $video_url_raw = get_post_meta($id, '_oc_video_url', true);
            $video_url = '';
            if (!empty($video_url_raw)) {
                $video_url = (strpos($video_url_raw, '/wp-content/uploads/') === 0)
                    ? sesna_resolve_archivo_url($video_url_raw)
                    : $video_url_raw;
            }

            $by_organo[$organo][] = array(
                'id'           => $id,
                'organo'       => $organo,
                'titulo'       => get_the_title($post),
                'modo'         => $modo,
                'fecha'        => $fecha,
                'anio'         => $fecha ? substr($fecha, 0, 4) : '',
                'tipo_sesion'  => get_post_meta($id, '_oc_tipo_sesion', true) ?: '',
                'acuerdos'     => $acuerdos,
                'documentos'   => $documentos,
                'anexos_extra' => $anexos_db,
                'video_url'    => $video_url,
            );

            if (isset($stats[$organo]) && $modo === 'sesion') {
                $stats[$organo]['sesiones']++;
                $stats[$organo]['acuerdos'] += $acuerdos;
            }
        }
    }

    $sort_fn = function ($a, $b) {
        if ($a['fecha'] && $b['fecha']) {
            return strcmp($b['fecha'], $a['fecha']);
        }
        return $a['fecha'] ? -1 : ($b['fecha'] ? 1 : 0);
    };

    foreach ($by_organo as $org => &$list) {
        usort($list, $sort_fn);
    }
    unset($list);

    $total_rec = count($by_organo['recomendaciones']);
    $total_exh = count($by_organo['exhortos']);
    foreach ($stats as $org => &$st) {
        $st['recomendaciones'] = $total_rec;
        $st['exhortos']        = $total_exh;
    }
    unset($st);

    $cache = array(
        'entries' => $by_organo,
        'stats'   => $stats,
    );
    return $cache;
}

function sesna_get_oc_stats($organo) {
    $data = sesna_get_all_oc_data();
    return $data['stats'][$organo] ?? array(
        'sesiones'        => 0,
        'acuerdos'        => 0,
        'recomendaciones' => count($data['entries']['recomendaciones'] ?? array()),
        'exhortos'        => count($data['entries']['exhortos'] ?? array()),
    );
}

function sesna_count_oc_lista_directa($organo) {
    $data = sesna_get_all_oc_data();
    return count($data['entries'][$organo] ?? array());
}

/**
 * Devuelve las sesiones (o documentos sueltos) de un órgano, con sus
 * documentos ya decodificados y las URLs resueltas al dominio actual
 * del sitio (nunca un dominio congelado en base de datos).
 */
function sesna_get_oc_entries($organo) {
    $data = sesna_get_all_oc_data();
    return $data['entries'][$organo] ?? array();
}

/**
 * Mapea el nombre de un documento a un ícono Bootstrap por palabra clave.
 * Con nombres libres y cantidad variable de documentos por sesión no se
 * puede mantener el mapeo fijo por posición que usaba el diseño original.
 */
function sesna_oc_doc_icon($nombre) {
    $nombre_lower = strtolower($nombre);
    if (strpos($nombre_lower, 'convocatoria') !== false) {
        return 'snd-document--requirements';
    }
    if (strpos($nombre_lower, 'acta') !== false) {
        return 'snd-list';
    }
    if (strpos($nombre_lower, 'anexo') !== false) {
        return 'snd-folder';
    }
    if (strpos($nombre_lower, 'orden') !== false) {
        return 'snd-document';
    }
    return 'snd-document';
}

/**
 * Renderiza las stat cards de un órgano. Recomendaciones y Exhortos solo
 * aplican al Comité Coordinador (son secciones propias de ese órgano);
 * para Comisión Ejecutiva y Órgano de Gobierno se omiten esas dos cards
 * y las de Sesiones/Acuerdos ocupan el ancho completo.
 */
function sesna_render_oc_stats_cards($stats, $mostrar_recomendaciones_exhortos = true) {
    // snd-guinda.css resetea TODO [class*="columna__"] a ancho completo bajo 640px
    // (@media max-width:639.9px) salvo que se use la variante --xs explícita.
    $col_class = $mostrar_recomendaciones_exhortos ? 'columna__6--xs columna__3--lg' : 'columna__6--xs';
    ?>
    <div class="reticulaGrid__12 mb--32">
        <div class="<?= esc_attr($col_class) ?>">
            <div class="ocn-stat-card">
                <div class="sh0b color--neutro800 mb--2"><?= (int) $stats['sesiones'] ?></div>
                <div class="b1r">Sesiones</div>
            </div>
        </div>
        <div class="<?= esc_attr($col_class) ?>">
            <div class="ocn-stat-card">
                <div class="sh0b color--neutro800 mb--2"><?= (int) $stats['acuerdos'] ?></div>
                <div class="b1r">Acuerdos</div>
            </div>
        </div>
        <?php if ($mostrar_recomendaciones_exhortos) : ?>
        <div class="<?= esc_attr($col_class) ?>">
            <div class="ocn-stat-card">
                <div class="sh0b color--neutro800 mb--2"><?= (int) $stats['recomendaciones'] ?></div>
                <div class="b1r">Recomendaciones</div>
            </div>
        </div>
        <div class="<?= esc_attr($col_class) ?>">
            <div class="ocn-stat-card">
                <div class="sh0b color--neutro800 mb--2"><?= (int) $stats['exhortos'] ?></div>
                <div class="b1r">Exhortos</div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Mapea los documentos de nombre libre de una sesión a los 5 slots fijos
 * del diseño (Convocatoria, Orden del día, Acta, Anexos, Ver sesión).
 * El slot "Anexos" agrupa cualquier documento cuyo nombre contenga "anexo"
 * y enlaza al primero encontrado. Un slot sin documento queda 'enlace' => ''
 * para que el render lo pinte deshabilitado sin quitar el ícono.
 */
/**
 * Abreviatura de mes en español (3 letras, mayúsculas), independiente del
 * locale del servidor: DateTime::format('M') solo devuelve nombres en inglés.
 */
function sesna_oc_mes_abrev($mes_numero) {
    $meses = array(
        1 => 'ENE', 2 => 'FEB', 3 => 'MAR', 4 => 'ABR',
        5 => 'MAY', 6 => 'JUN', 7 => 'JUL', 8 => 'AGO',
        9 => 'SEP', 10 => 'OCT', 11 => 'NOV', 12 => 'DIC',
    );
    return $meses[$mes_numero] ?? '---';
}

/**
 * Extrae el ID de un video de YouTube a partir de cualquier formato de URL
 * (watch?v=, youtu.be/, embed/). Devuelve '' si no es una URL de YouTube
 * reconocible (p. ej. un archivo de video propio en /wp-content/uploads/).
 */
function sesna_oc_extraer_youtube_id($url) {
    if (preg_match('#(?:youtube\.com/(?:watch\?v=|embed/)|youtu\.be/)([a-zA-Z0-9_-]{6,})#', $url, $m)) {
        return $m[1];
    }
    return '';
}

function sesna_oc_map_slots_fijos($sesion) {
    $slots = array(
        'convocatoria'  => array('label' => 'Convocatoria', 'icon' => 'snd-document--requirements', 'enlace' => ''),
        'orden_del_dia' => array('label' => 'Orden del día', 'icon' => 'snd-document', 'enlace' => ''),
        'acta'          => array('label' => 'Acta', 'icon' => 'snd-list', 'enlace' => ''),
        // 'anexos' puede tener 0, 1 o varios documentos: si hay más de uno,
        // el render pinta un dropdown en vez de un link directo.
        'anexos'        => array('label' => 'Anexos', 'icon' => 'snd-folder', 'enlace' => '', 'documentos' => array()),
        'ver_sesion'    => array('label' => 'Ver sesión', 'icon' => 'snd-play--outline', 'enlace' => ''),
    );

    // Clasifica un documento en su slot por palabra clave. Se reutiliza tanto
    // para "Documentos" como para "Anexos" de wp-admin: lo que define el
    // ícono es el NOMBRE del documento, no en cuál de los dos repetidores se
    // haya capturado — es común que la Orden del Día, el Acta o la
    // Convocatoria se carguen por error en "Anexos".
    //
    // El NOMBRE manda sobre el archivo: varias sesiones reutilizan para la
    // Orden del Día (o el Acta) el mismo PDF que luego también se vuelve a
    // listar como "Anexo I: ..."; ese archivo quedó guardado con "anexo" en
    // su nombre de archivo aunque el documento en sí se llame "Orden del
    // Día"/"Acta". Por eso el nombre del archivo solo se usa como pista de
    // respaldo (al final), nunca antes de revisar el nombre del documento.
    $clasificar_doc = function ($doc) use (&$slots) {
        $nombre_lower = strtolower(trim($doc['nombre'] ?? ''));
        $enlace_lower = strtolower(trim($doc['enlace'] ?? ''));

        if (strpos($nombre_lower, 'anexo') !== false) {
            $slots['anexos']['documentos'][] = $doc;
        } elseif ($slots['convocatoria']['enlace'] === '' && strpos($nombre_lower, 'convocatoria') !== false) {
            $slots['convocatoria']['enlace'] = $doc['enlace'];
        } elseif ($slots['acta']['enlace'] === '' && strpos($nombre_lower, 'acta') !== false) {
            $slots['acta']['enlace'] = $doc['enlace'];
        } elseif ($slots['orden_del_dia']['enlace'] === '' && strpos($nombre_lower, 'orden') !== false) {
            $slots['orden_del_dia']['enlace'] = $doc['enlace'];
        } elseif (strpos($enlace_lower, 'anexo') !== false) {
            // Sin nombre claro: el archivo sí se llama "anexo-algo.pdf", se
            // usa como pista de respaldo (documentos sin nombre descriptivo).
            $slots['anexos']['documentos'][] = $doc;
        } else {
            // Cualquier otro documento que no sea la primera convocatoria, acta u orden del día, se manda a anexos por descarte
            $slots['anexos']['documentos'][] = $doc;
        }
    };

    $modo_anexos = false;

    foreach ($sesion['documentos'] as $doc) {
        $nombre_lower = strtolower(trim($doc['nombre'] ?? ''));
        $enlace_lower = strtolower(trim($doc['enlace'] ?? ''));

        // Si el usuario usa un separador visual en wp-admin (ej: "Anexos" sin archivo)
        if (($nombre_lower === 'anexos' || $nombre_lower === '--- anexos ---' || $nombre_lower === '-- anexos --') && empty($enlace_lower)) {
            $modo_anexos = true;
            continue; // No pintamos este separador como un documento real
        }

        // Evitar agregar documentos que estén completamente vacíos por error
        if (empty($enlace_lower)) {
            continue;
        }

        // Si ya pasamos el separador "Anexos", TODO lo que siga va a anexos
        if ($modo_anexos) {
            $slots['anexos']['documentos'][] = $doc;
            continue;
        }

        $clasificar_doc($doc);
    }

    if (!empty($sesion['anexos_extra'])) {
        foreach ($sesion['anexos_extra'] as $anexo_doc) {
             if (!empty($anexo_doc['enlace'])) {
                 $clasificar_doc($anexo_doc);
             }
        }
    }

    if (!empty($slots['anexos']['documentos'])) {
        // Compatibilidad: 'enlace' queda con el primero, por si algo más lo consulta directo.
        $slots['anexos']['enlace'] = $slots['anexos']['documentos'][0]['enlace'];
    }

    if (!empty($sesion['video_url'])) {
        $slots['ver_sesion']['enlace'] = $sesion['video_url'];
        $slots['ver_sesion']['youtube_id'] = sesna_oc_extraer_youtube_id($sesion['video_url']);
    }

    return $slots;
}

/**
 * Renderiza el ícono "Anexos" como un dropdown de Bootstrap cuando la sesión
 * tiene más de un documento de anexo, para no perder ninguno ni distorsionar
 * el layout fijo de 5 íconos por tarjeta (mismo patrón dropdown ya usado en
 * page-politica-nacional-anticorrupcion.php).
 */
/**
 * Ícono "Anexos" (toggle) que expande/colapsa un panel dentro de la MISMA
 * tarjeta, mostrando cada documento con su propio botón de descarga.
 * Debe llamarse junto con sesna_render_oc_anexos_panel() para pintar el
 * panel colapsable después de la fila de íconos, dentro de la tarjeta.
 */
function sesna_render_oc_anexos_toggle($panel_id, $slot) {
    $total = count($slot['documentos']);
    ?>
    <a href="#<?= esc_attr($panel_id) ?>" role="button" aria-expanded="false" aria-controls="<?= esc_attr($panel_id) ?>" onclick="var p=document.getElementById('<?= esc_attr($panel_id) ?>'); if(p){ p.classList.toggle('muestra--ninguno'); this.setAttribute('aria-expanded', !p.classList.contains('muestra--ninguno')); } return false;" class="tx-oc-slot-btn tx-oc-anexos-toggle">
        <?= sesna_render_snd_svg_icon($slot['icon'], 'icono--24 tx-oc-slot-icon') ?>
        <span class="tx-oc-slot-label"><?= esc_html($slot['label']) ?> (<?= $total ?>)</span>
    </a>
    <?php
}

function sesna_render_oc_anexos_panel($panel_id, $slot) {
    $total = count($slot['documentos']);
    ?>
    <div class="muestra--ninguno tx-oc-anexos-panel" id="<?= esc_attr($panel_id) ?>">
        <div class="tx-oc-anexos-panel__inner">
            <div class="tx-oc-anexos-list">
                <?php foreach ($slot['documentos'] as $doc) : ?>
                <a href="<?= esc_url($doc['enlace']) ?>" data-modal-target="#pdfViewerModal" data-pdf-url="<?= esc_url($doc['enlace']) ?>" data-pdf-title="<?= esc_attr($doc['nombre']) ?>" class="tx-oc-anexo-row" data-anexo-nombre="<?= esc_attr(strtolower($doc['nombre'])) ?>">
                    <div class="tx-oc-anexo-row__info">
                        <?= sesna_render_snd_svg_icon('snd-document', 'icono--20 color--pguinda600') ?>
                        <span class="b1r color--neutro800 tx-oc-anexo-nombre"><?= esc_html($doc['nombre']) ?></span>
                    </div>
                    <?= sesna_render_snd_svg_icon('snd-document--pdf', 'icono--24 color--pguinda600 tx-oc-anexo-row__pdf') ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
}

function sesna_render_oc_sesion_card($sesion, $index = 0) {
    $fecha_obj = !empty($sesion['fecha']) ? DateTime::createFromFormat('Y-m-d', $sesion['fecha']) : null;
    $dia  = $fecha_obj ? $fecha_obj->format('d') : '--';
    $mes  = $fecha_obj ? sesna_oc_mes_abrev((int) $fecha_obj->format('n')) : '---';
    $anio = $fecha_obj ? $fecha_obj->format('Y') : '----';
    $slots = sesna_oc_map_slots_fijos($sesion);
    $anexos_panel_id = 'oc-anexos-panel-' . md5($sesion['titulo'] . $sesion['fecha'] . count($slots['anexos']['documentos']));
    $tiene_anexos_panel = count($slots['anexos']['documentos']) > 1;
    // La búsqueda principal de la página también cubre los nombres de los documentos anexos.
    $nombres_anexos = implode(' ', array_map(function ($d) { return $d['nombre']; }, $slots['anexos']['documentos']));
    $busqueda_sesion = trim($sesion['titulo'] . ' ' . $sesion['tipo_sesion'] . ' ' . $dia . ' ' . $mes . ' ' . $anio . ' ' . $nombres_anexos);
    $hidden_initial = ($index >= 5) ? ' style="display:none;"' : '';
    ?>
    <div class="tx-oc-card tx-sesion-card"<?= $hidden_initial ?> data-anio="<?= esc_attr($anio) ?>" data-tipo="<?= esc_attr($sesion['tipo_sesion']) ?>" data-titulo="<?= esc_attr( function_exists('mb_strtolower') ? mb_strtolower($busqueda_sesion, 'UTF-8') : strtolower($busqueda_sesion) ) ?>">
        <div class="tx-oc-card__main">
            <div class="tx-oc-card__date">
                <span class="h3b color--neutro800 tx-oc-card__day"><?= esc_html($dia) ?></span>
                <span class="sdr peso--negrita texto--mayusculas color--pguinda600 tx-oc-card__month"><?= esc_html($mes) ?></span>
                <span class="b2sb color--neutro600 tx-oc-card__year"><?= esc_html($anio) ?></span>
            </div>

            <div class="tx-oc-card__info">
                <h3 class="sh1b color--neutro800 mb--8 tx-comite-card-title"><?= esc_html($sesion['titulo']) ?></h3>
                <p class="b1r color--neutro700 mb--0"><strong class="b1sb color--neutro800">Tipo:</strong> <?= esc_html($sesion['tipo_sesion']) ?></p>
            </div>

            <div class="tx-oc-card__actions">
                <div class="tx-oc-slots">
                    <?php foreach ($slots as $slot_key => $slot) :
                        if ($slot_key === 'anexos' && $tiene_anexos_panel) :
                            sesna_render_oc_anexos_toggle($anexos_panel_id, $slot);
                            continue;
                        endif;

                        // "Ver sesión" no aplica a Órgano de Gobierno: se omite por
                        // completo (sin dejar un icono deshabilitado) sin afectar la
                        // posición de los demás iconos, que ya vienen antes en $slots.
                        if ($slot_key === 'ver_sesion' && $sesion['organo'] === 'organo_gobierno') :
                            continue;
                        endif;

                        $disabled = ($slot['enlace'] === '');
                        $href = $disabled ? '#' : esc_url($slot['enlace']);
                        $link_class = 'tx-oc-slot-btn' . ($disabled ? ' tx-oc-slot-btn--disabled' : '');
                        $es_ver_sesion = ($slot_key === 'ver_sesion');
                        $youtube_id = $es_ver_sesion ? ($slot['youtube_id'] ?? '') : '';
                    ?>
                    <a rel="noopener" href="<?= $href ?>"
                       <?php if ($disabled): ?>aria-disabled="true" tabindex="-1"<?php elseif ($es_ver_sesion && $youtube_id !== ''): ?>data-modal-target="#oc-video-modal" data-video-id="<?= esc_attr($youtube_id) ?>" data-video-title="<?= esc_attr($sesion['titulo']) ?>"<?php elseif ($es_ver_sesion): ?>target="_blank"<?php else: ?>data-modal-target="#pdfViewerModal" data-pdf-url="<?= esc_url($slot['enlace']) ?>" data-pdf-title="<?= esc_attr($sesion['titulo'] . ' — ' . $slot['label']) ?>"<?php endif; ?>
                       class="<?= esc_attr($link_class) ?>">
                        <?= sesna_render_snd_svg_icon($slot['icon'], 'icono--24 tx-oc-slot-icon') ?>
                        <span class="tx-oc-slot-label"><?= esc_html($slot['label']) ?></span>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php if ($tiene_anexos_panel) : sesna_render_oc_anexos_panel($anexos_panel_id, $slots['anexos']); endif; ?>
    </div>
    <?php
}

function sesna_render_oc_lista_directa_item($item) {
    ?>
    <div class="tx-comite-card tx-sesion-card">
        <div class="tx-comite-card-info">
            <h3 class="sh1b color--neutro800 mb--0 tx-comite-card-title"><?= esc_html($item['titulo']) ?></h3>
        </div>
        <div class="tx-comite-card-action">
            <?php foreach ($item['documentos'] as $doc) : ?>
            <button type="button" class="boton__fantasma" data-modal-target="#pdfViewerModal" data-pdf-url="<?= esc_url($doc['enlace']) ?>" data-pdf-title="<?= esc_attr($item['titulo']) ?>" aria-label="Consultar <?= esc_attr($item['titulo']) ?>">
                <?= sesna_render_snd_svg_icon('snd-document--pdf', 'icono--24') ?>
                Consultar
                <?= sesna_render_snd_svg_icon('snd-chevron--right', 'icono--20') ?>
            </button>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}

/**
 * Submenú de administración para disparar la importación (idempotente)
 * de sesna-v2/files/relacion_documentos_sesna.json hacia el CPT oc_sesion.
 */
function sesna_add_oc_import_admin_page() {
    add_submenu_page(
        'edit.php?post_type=oc_sesion',
        'Importar datos SESNA',
        'Importar datos SESNA',
        'manage_options',
        'oc-importar-datos',
        'sesna_oc_import_admin_page_html'
    );
}
add_action('admin_menu', 'sesna_add_oc_import_admin_page');

function sesna_oc_import_admin_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }

    $resumen = null;

    if (isset($_POST['sesna_oc_import_nonce']) && wp_verify_nonce($_POST['sesna_oc_import_nonce'], 'sesna_oc_import')) {
        require_once get_template_directory() . '/tools/import-relacion-documentos.php';
        $resumen = sesna_import_relacion_documentos();
    }
    ?>
    <div class="wrap">
        <h1>Importar datos de Órganos Colegiados</h1>
        <p>Importa las sesiones y documentos de <code>files/relacion_documentos_sesna.json</code> al CPT "Órganos Colegiados". Es seguro ejecutarla varias veces: las sesiones/documentos ya existentes (mismo título + órgano) no se duplican.</p>

        <?php if ($resumen && empty($resumen['error'])) : ?>
            <div class="notice notice-success">
                <p>
                    Importación completada: <strong><?= (int) $resumen['creados'] ?></strong> creados,
                    <strong><?= (int) $resumen['existentes'] ?></strong> ya existentes (sin cambios),
                    <strong><?= (int) $resumen['omitidos_zip'] ?></strong> documentos ZIP omitidos (paquete dinámico sin archivo físico).
                </p>
            </div>
        <?php elseif ($resumen && !empty($resumen['error'])) : ?>
            <div class="notice notice-error"><p><?= esc_html($resumen['error']) ?></p></div>
        <?php endif; ?>

        <form method="post">
            <?php wp_nonce_field('sesna_oc_import', 'sesna_oc_import_nonce'); ?>
            <?php submit_button('Ejecutar importación'); ?>
        </form>
    </div>
    <?php
}
