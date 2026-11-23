<?php
/**
 * Micrositio de Transparencia: CPT `comite_transparencia`, CPT `datos-personales`, metaboxes y catálogo de documentos.
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
// REGISTRO DE MENÚ PRINCIPAL "TRANSPARENCIA" Y CPT "COMITÉ DE TRANSPARENCIA"
// =========================================================================

// 1. Agregar el menú principal "Transparencia"
function sesna_add_transparencia_menu() {
    add_menu_page(
        'Transparencia',          // Título de la página
        'Transparencia',          // Título del menú
        'edit_posts',             // Capacidad requerida (edit_posts permite a editores/administradores)
        'menu-transparencia',     // Slug del menú
        '',                       // Función de callback (vacío porque será redirigido o solo agrupador)
        'dashicons-visibility',   // Ícono
        7                         // Posición (después de Entradas/Medios)
    );
}
add_action('admin_menu', 'sesna_add_transparencia_menu');

// 2. Registrar el Custom Post Type "Comité de Transparencia"
function sesna_register_comite_transparencia_cpt() {
    $labels = array(
        'name'               => _x('Comité de Transparencia', 'Post type general name', 'sesna'),
        'singular_name'      => _x('Documento del Comité', 'Post type singular name', 'sesna'),
        'menu_name'          => _x('Comité de Transparencia', 'Admin Menu text', 'sesna'),
        'name_admin_bar'     => _x('Doc. Comité de Transparencia', 'Add New on Toolbar', 'sesna'),
        'add_new'            => __('Añadir nuevo', 'sesna'),
        'add_new_item'       => __('Añadir nuevo documento', 'sesna'),
        'new_item'           => __('Nuevo documento', 'sesna'),
        'edit_item'          => __('Editar documento', 'sesna'),
        'view_item'          => __('Ver documento', 'sesna'),
        'all_items'          => __('Comité de Transparencia', 'sesna'),
        'search_items'       => __('Buscar documentos', 'sesna'),
        'not_found'          => __('No se encontraron documentos.', 'sesna'),
        'not_found_in_trash' => __('No se encontraron documentos en la papelera.', 'sesna'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false, // No tiene vista individual pública por defecto
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => 'menu-transparencia', // Colocar dentro del menú Transparencia
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'supports'           => array('title'), // El archivo y demás info van en meta boxes
    );

    register_post_type('comite_transparencia', $args);
}
add_action('init', 'sesna_register_comite_transparencia_cpt');

// 3. Meta Box para los datos del documento
function sesna_add_comite_transparencia_meta_box() {
    add_meta_box(
        'comite_transparencia_meta',
        'Datos del Documento',
        'sesna_comite_transparencia_meta_box_html',
        'comite_transparencia',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sesna_add_comite_transparencia_meta_box');

function sesna_comite_transparencia_meta_box_html($post) {
    wp_nonce_field('sesna_save_comite_meta', 'sesna_comite_meta_nonce');

    $tipo_doc = get_post_meta($post->ID, '_ct_tipo_doc', true);
    $anio     = get_post_meta($post->ID, '_ct_anio', true) ?: date('Y');
    $tipo_sesion = get_post_meta($post->ID, '_ct_tipo_sesion', true);
    $numero_res  = get_post_meta($post->ID, '_ct_numero_res', true);
    $archivo_url = get_post_meta($post->ID, '_ct_archivo_url', true);

    ?>
    <style>
        .ct-row { margin-bottom: 15px; }
        .ct-row label { font-weight: bold; display: block; margin-bottom: 5px; }
        .ct-row input[type=text], .ct-row input[type=number], .ct-row select { width: 100%; max-width: 400px; }
    </style>
    <div class="ct-row">
        <label for="ct_tipo_doc">Tipo de documento</label>
        <select id="ct_tipo_doc" name="_ct_tipo_doc">
            <option value="Acta" <?php selected($tipo_doc, 'Acta'); ?>>Acta de Sesión</option>
            <option value="Resolución" <?php selected($tipo_doc, 'Resolución'); ?>>Resolución</option>
        </select>
    </div>

    <div class="ct-row">
        <label for="ct_anio">Año</label>
        <input type="number" id="ct_anio" name="_ct_anio" value="<?php echo esc_attr($anio); ?>" min="2000" max="2100">
    </div>

    <div class="ct-row" id="row_tipo_sesion">
        <label for="ct_tipo_sesion">Tipo de Sesión</label>
        <select id="ct_tipo_sesion" name="_ct_tipo_sesion">
            <option value="Ordinaria" <?php selected($tipo_sesion, 'Ordinaria'); ?>>Ordinaria</option>
            <option value="Extraordinaria" <?php selected($tipo_sesion, 'Extraordinaria'); ?>>Extraordinaria</option>
        </select>
    </div>

    <div class="ct-row" id="row_numero_res" style="display:none;">
        <label for="ct_numero_res">Número de Resolución</label>
        <input type="text" id="ct_numero_res" name="_ct_numero_res" value="<?php echo esc_attr($numero_res); ?>" placeholder="Ej: Primera">
    </div>

    <div class="ct-row">
        <label for="ct_archivo_url">Archivo (PDF, DOCX, XLSX)</label>
        <div style="display:flex; gap:10px;">
            <input type="text" id="ct_archivo_url" name="_ct_archivo_url" value="<?php echo esc_attr($archivo_url); ?>" style="flex:1;">
            <button type="button" class="button" id="ct_upload_btn">Seleccionar Archivo</button>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($){
        // Show/Hide fields based on document type
        function toggleFields() {
            var val = $('#ct_tipo_doc').val();
            if(val === 'Acta') {
                $('#row_tipo_sesion').show();
                $('#row_numero_res').hide();
            } else {
                $('#row_tipo_sesion').hide();
                $('#row_numero_res').show();
            }
        }
        $('#ct_tipo_doc').change(toggleFields);
        toggleFields();

        // WP Media Uploader
        var mediaUploader;
        $('#ct_upload_btn').click(function(e) {
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Seleccionar Archivo',
                button: { text: 'Usar este archivo' },
                multiple: false
            });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                var idx = attachment.url.indexOf('/wp-content/uploads/');
                var relativeUrl = idx !== -1 ? attachment.url.substring(idx) : attachment.url;
                $('#ct_archivo_url').val(relativeUrl);
            });
            mediaUploader.open();
        });
    });
    </script>
    <?php
}

function sesna_save_comite_meta($post_id) {
    if (!isset($_POST['sesna_comite_meta_nonce']) || !wp_verify_nonce($_POST['sesna_comite_meta_nonce'], 'sesna_save_comite_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array('_ct_tipo_doc', '_ct_anio', '_ct_tipo_sesion', '_ct_numero_res', '_ct_archivo_url');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post_comite_transparencia', 'sesna_save_comite_meta');

// 4. Encolar WP Media para que funcione el uploader en nuestro CPT
function sesna_comite_admin_scripts($hook) {
    global $typenow;
    if ($typenow == 'comite_transparencia') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'sesna_comite_admin_scripts');

// 5. Estilos para resaltar "Comité de Transparencia" en el menú
function sesna_transparencia_admin_menu_styles() {
    echo '<style>
        /* Destacar "Comité de Transparencia" en el submenú */
        #adminmenu a[href="edit.php?post_type=comite_transparencia"] {
            color: #00d1b2 !important; /* Color distintivo (cian) */
            font-weight: bold;
        }
        #adminmenu a[href="edit.php?post_type=comite_transparencia"]:hover,
        #adminmenu a[href="edit.php?post_type=comite_transparencia"]:focus {
            color: #00e6c3 !important;
        }
    </style>';
}
add_action('admin_head', 'sesna_transparencia_admin_menu_styles');

// Registrar el Custom Post Type "Datos Personales"
function sesna_register_datos_personales_cpt() {
    $labels = array(
        'name'               => _x('Datos Personales', 'Post type general name', 'sesna'),
        'singular_name'      => _x('Documento Datos Personales', 'Post type singular name', 'sesna'),
        'menu_name'          => _x('Datos Personales', 'Admin Menu text', 'sesna'),
        'name_admin_bar'     => _x('Doc. Datos Personales', 'Add New on Toolbar', 'sesna'),
        'add_new'            => __('Añadir nuevo', 'sesna'),
        'add_new_item'       => __('Añadir nuevo documento', 'sesna'),
        'new_item'           => __('Nuevo documento', 'sesna'),
        'edit_item'          => __('Editar documento', 'sesna'),
        'view_item'          => __('Ver documento', 'sesna'),
        'all_items'          => __('Datos Personales', 'sesna'),
        'search_items'       => __('Buscar documentos', 'sesna'),
        'not_found'          => __('No se encontraron documentos.', 'sesna'),
        'not_found_in_trash' => __('No se encontraron documentos en la papelera.', 'sesna'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => 'menu-transparencia',
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'supports'           => array('title'),
    );

    register_post_type('datos-personales', $args);
}
add_action('init', 'sesna_register_datos_personales_cpt');

function sesna_add_datos_personales_meta_box() {
    add_meta_box(
        'datos_personales_meta',
        'Datos del Documento',
        'sesna_datos_personales_meta_box_html',
        'datos-personales',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sesna_add_datos_personales_meta_box');

function sesna_datos_personales_meta_box_html($post) {
    wp_nonce_field('sesna_save_dp_meta', 'sesna_dp_meta_nonce');

    $anio     = get_post_meta($post->ID, '_dp_anio', true) ?: date('Y');
    $archivo_url = get_post_meta($post->ID, '_dp_archivo_url', true);

    ?>
    <style>
        .dp-row { margin-bottom: 15px; }
        .dp-row label { font-weight: bold; display: block; margin-bottom: 5px; }
        .dp-row input[type=text], .dp-row input[type=number], .dp-row select { width: 100%; max-width: 400px; }
    </style>
    <div class="dp-row">
        <label for="dp_anio">Año</label>
        <input type="number" id="dp_anio" name="_dp_anio" value="<?php echo esc_attr($anio); ?>" min="2000" max="2100">
    </div>

    <div class="dp-row">
        <label for="dp_archivo_url">Archivo (PDF, DOCX, XLSX)</label>
        <div style="display:flex; gap:10px;">
            <input type="text" id="dp_archivo_url" name="_dp_archivo_url" value="<?php echo esc_attr($archivo_url); ?>" style="flex:1;">
            <button type="button" class="button" id="dp_upload_btn">Seleccionar Archivo</button>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($){
        var mediaUploader;
        $('#dp_upload_btn').click(function(e) {
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Seleccionar Archivo',
                button: { text: 'Usar este archivo' },
                multiple: false
            });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                var idx = attachment.url.indexOf('/wp-content/uploads/');
                var relativeUrl = idx !== -1 ? attachment.url.substring(idx) : attachment.url;
                $('#dp_archivo_url').val(relativeUrl);
            });
            mediaUploader.open();
        });
    });
    </script>
    <?php
}

function sesna_save_dp_meta($post_id) {
    if (!isset($_POST['sesna_dp_meta_nonce']) || !wp_verify_nonce($_POST['sesna_dp_meta_nonce'], 'sesna_save_dp_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array('_dp_anio', '_dp_archivo_url');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post_datos-personales', 'sesna_save_dp_meta');

function sesna_dp_admin_scripts($hook) {
    global $typenow;
    if ($typenow == 'datos-personales') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'sesna_dp_admin_scripts');

/**
 * Obtiene los documentos para la sección de Datos Personales,
 * infiriendo su categoría y localizando el archivo físicamente en uploads.
 */
function sesna_get_datos_personales_docs() {
    $base_docs = [
        [
            'titulo' => 'Aviso de Privacidad Simplificado de la Plataforma de Aprendizaje Anticorrupción, 2023',
            'anio' => '2023',
            'filename' => 'PAA_Aviso-de-Privacidad-Simplificado.pdf'
        ],
        [
            'titulo' => 'Aviso de Privacidad Integral de la Plataforma de Aprendizaje Anticorrupción, 2023',
            'anio' => '2023',
            'filename' => 'PAA_Aviso-de-Privacidad-Integral.pdf'
        ],
        [
            'titulo' => 'Información sobre Avisos de Privacidad Integrales, 2022',
            'anio' => '2022',
            'filename' => 'Anexo-Guia-1.-Informacion-sobre-el-aviso-o-los-avisos-de-privacidad-integrales_30Jun2022.pdf'
        ],
        [
            'titulo' => 'Formatos Obligatorios para la Publicación de Medios de Verificación, 2022',
            'anio' => '2022',
            'filename' => 'Anexo-8.-Formatos-obligatorios-para-publicacion-de-medios-de-verificacion_30Jun2022-05Jul2022.pdf'
        ],
        [
            'titulo' => 'Aviso de Privacidad Simplificado, 2022',
            'anio' => '2022',
            'filename' => 'Anexo-4-AVISO-DE-PRIVACIDAD-SIMPLIFICADO_16Jun2022-30Jun2022.pdf'
        ],
        [
            'titulo' => 'Aviso de Privacidad Integral, 2022',
            'anio' => '2022',
            'filename' => 'Anexo-3-AVISO-DE-PRIVACIDAD-INTEGRAL_16Jun2022-30Jun2022.pdf'
        ],
        [
            'titulo' => 'Documento de Seguridad de la Plataforma Digital Nacional, 2022',
            'anio' => '2022',
            'filename' => 'Anexo-1.1-Documento-de-Seguridad-PDN_VP_16Jun2022-30Jun2022.pdf'
        ],
        [
            'titulo' => 'Documento de Seguridad de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción, 2022',
            'anio' => '2022',
            'filename' => 'Anexo-1-Documento-de-Seguridad-DGA-2022_VP_16Jun2022-30Jun2022.pdf'
        ],
        [
            'titulo' => 'Aviso de Privacidad de la Plataforma Digital Nacional, 2022',
            'anio' => '2022',
            'filename' => 'Aviso-Privacidad-PDN_14Feb2022-22Mar2022.pdf'
        ],
        [
            'titulo' => 'Aviso de Privacidad Integral, 2021',
            'anio' => '2021',
            'filename' => 'AVISO-DE-PRIVACIDAD-INTEGRAL_23Abr2021-26Abr2021.pdf'
        ],
        [
            'titulo' => 'Aviso de Privacidad Simplificado, 2021',
            'anio' => '2021',
            'filename' => 'AVISO-DE-PRIVACIDAD-SIMPLIFICADO_23Abr2021-26Abr2021.pdf'
        ]
    ];

    $transient_key = 'sesna_dp_docs_cache_v4';
    $cached_docs = get_transient($transient_key);

    if (false === $cached_docs || isset($_GET['clear_cache'])) {
        $upload_dir = wp_upload_dir();
        $basedir = $upload_dir['basedir'];

        $file_map = [];
        try {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($basedir, RecursiveDirectoryIterator::SKIP_DOTS));
            foreach ($iterator as $file) {
                if ($file->isFile() && strtolower($file->getExtension()) === 'pdf') {
                    $filename = $file->getFilename();
                    if (!isset($file_map[$filename])) {
                        // Se guarda solo el path relativo (sin dominio) para que la URL
                        // absoluta se reconstruya con home_url() en cada carga y nunca
                        // quede un dominio (p. ej. localhost) congelado en el transient.
                        $relative_path = str_replace('\\', '/', substr($file->getPathname(), strlen($basedir)));
                        $file_map[$filename] = $relative_path;
                    }
                }
            }
        } catch(Exception $e) {
            // Ignorar errores de lectura de directorio
        }

        $processed_docs = [];
        foreach ($base_docs as $doc) {
            $tipo = 'Información General';
            $tit_lower = strtolower($doc['titulo']);
            if (strpos($tit_lower, 'simplificado') !== false) {
                $tipo = 'Aviso de Privacidad Simplificado';
            } elseif (strpos($tit_lower, 'integral') !== false) {
                $tipo = 'Aviso de Privacidad Integral';
            } elseif (strpos($tit_lower, 'seguridad') !== false) {
                $tipo = 'Documento de Seguridad';
            } elseif (strpos($tit_lower, 'formato') !== false) {
                $tipo = 'Formatos';
            }

            $ruta_relativa = isset($file_map[$doc['filename']]) ? $file_map[$doc['filename']] : '';

            $processed_docs[] = [
                'titulo' => $doc['titulo'],
                'anio'   => $doc['anio'],
                'tipo'   => $tipo,
                'ruta_relativa' => $ruta_relativa
            ];
        }

        usort($processed_docs, function($a, $b) {
            return (int)$b['anio'] - (int)$a['anio'];
        });

        set_transient($transient_key, $processed_docs, 12 * HOUR_IN_SECONDS);
        $cached_docs = $processed_docs;
    }

    // La URL final siempre se construye con el dominio actual del sitio,
    // sin importar cuándo se generó el transient cacheado.
    $upload_dir = wp_upload_dir();
    foreach ($cached_docs as &$doc) {
        $doc['enlace'] = !empty($doc['ruta_relativa'])
            ? $upload_dir['baseurl'] . $doc['ruta_relativa']
            : '#';
    }
    unset($doc);

    // Se agregan los documentos cargados desde wp-admin (CPT "Datos Personales"),
    // junto a los históricos de arriba. El enlace se resuelve con
    // sesna_resolve_archivo_url() para nunca depender del dominio guardado al subir el archivo.
    $cpt_docs = [];
    $cpt_query = new WP_Query([
        'post_type'      => 'datos-personales',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'no_found_rows'  => true,
        'update_post_term_cache' => false,
    ]);

    if ($cpt_query->have_posts()) {
        while ($cpt_query->have_posts()) {
            $cpt_query->the_post();
            $post_id = get_the_ID();
            $titulo = get_the_title();
            $tit_lower = strtolower($titulo);

            $tipo = 'Información General';
            if (strpos($tit_lower, 'simplificado') !== false) {
                $tipo = 'Aviso de Privacidad Simplificado';
            } elseif (strpos($tit_lower, 'integral') !== false) {
                $tipo = 'Aviso de Privacidad Integral';
            } elseif (strpos($tit_lower, 'seguridad') !== false) {
                $tipo = 'Documento de Seguridad';
            } elseif (strpos($tit_lower, 'formato') !== false) {
                $tipo = 'Formatos';
            }

            $cpt_docs[] = [
                'titulo' => $titulo,
                'anio'   => get_post_meta($post_id, '_dp_anio', true) ?: date('Y'),
                'tipo'   => $tipo,
                'enlace' => sesna_resolve_archivo_url(get_post_meta($post_id, '_dp_archivo_url', true)),
            ];
        }
        wp_reset_postdata();
    }

    $todos_docs = array_merge($cpt_docs, $cached_docs);

    usort($todos_docs, function($a, $b) {
        return (int)$b['anio'] - (int)$a['anio'];
    });

    return $todos_docs;
}
