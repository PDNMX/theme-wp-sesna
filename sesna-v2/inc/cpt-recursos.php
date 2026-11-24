<?php
/**
 * CPT `sesna_recurso`, taxonomía de sección, menú DGRIA, metaboxes y sesna_render_recurso_card().
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
// CPT: Recursos Disponibles (sesna_recurso)
// Documentos que se listan en las tarjetas "Recursos disponibles" /
// "Recursos metodológicos" (ej. página Riesgos e Inteligencia), agrupados
// bajo el menú padre "DGRIA".
// =========================================================================
function sesna_register_recurso_cpt() {
    $labels = array(
        'name'               => 'Recursos Disponibles',
        'singular_name'      => 'Recurso Disponible',
        'menu_name'          => 'Recursos Disponibles',
        'name_admin_bar'     => 'Recurso',
        'add_new'            => 'Añadir recurso',
        'add_new_item'       => 'Añadir nuevo recurso',
        'edit_item'          => 'Editar recurso',
        'new_item'           => 'Nuevo recurso',
        'view_item'          => 'Ver recurso',
        'all_items'          => 'Todos los recursos',
        'search_items'       => 'Buscar recursos',
        'not_found'          => 'No se encontraron recursos.',
        'not_found_in_trash' => 'No se encontraron recursos en la papelera.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => 'menu-dgria',
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-media-document',
        // 'thumbnail' = portada opcional; si no se define, la portada se
        // genera con el título (ver sesna_recurso_meta_box_html más abajo).
        'supports'           => array('title', 'excerpt', 'thumbnail'),
    );

    register_post_type('sesna_recurso', $args);

    // Categoría del recurso (ej. "Documento técnico"). Se registra como
    // taxonomía jerárquica para reutilizar el guardado nativo de WP
    // (tax_input), pero con meta box propio para que se vea como un
    // <select> de una sola opción en vez de la lista de checkboxes.
    register_taxonomy('categoria_recurso', 'sesna_recurso', array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'          => 'Categoría del documento',
            'singular_name' => 'Categoría del documento',
            'menu_name'     => 'Categoría del documento',
            'all_items'     => 'Todas las categorías',
            'edit_item'     => 'Editar categoría',
            'add_new_item'  => 'Añadir categoría del documento',
            'search_items'  => 'Buscar categorías',
        ),
        'public'            => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'meta_box_cb'       => 'sesna_categoria_recurso_select_metabox',
    ));
}
add_action('init', 'sesna_register_recurso_cpt');

// Agregar menú agrupador "DGRIA"
function sesna_add_dgria_menu() {
    add_menu_page(
        'DGRIA',
        'DGRIA',
        'edit_posts',
        'menu-dgria',
        '',
        'dashicons-shield',
        8
    );
}
add_action('admin_menu', 'sesna_add_dgria_menu');

// Siembra la categoría inicial "Documento técnico" una sola vez.
function sesna_seed_categoria_recurso_default() {
    if (get_option('sesna_categoria_recurso_seeded')) {
        return;
    }
    if (!term_exists('Documento técnico', 'categoria_recurso')) {
        wp_insert_term('Documento técnico', 'categoria_recurso');
    }
    update_option('sesna_categoria_recurso_seeded', 1);
}
add_action('init', 'sesna_seed_categoria_recurso_default', 20);

// Meta box de categoría como <select> de una sola opción.
function sesna_categoria_recurso_select_metabox($post) {
    $taxonomy = 'categoria_recurso';
    $terms    = get_terms(array('taxonomy' => $taxonomy, 'hide_empty' => false));
    $current_terms = wp_get_post_terms($post->ID, $taxonomy, array('fields' => 'ids'));
    $current  = !empty($current_terms) ? $current_terms[0] : '';
    ?>
    <select name="tax_input[categoria_recurso][]" id="categoria_recurso_select" style="width:100%; max-width:400px;">
        <option value="">— Selecciona una categoría —</option>
        <?php foreach ($terms as $term) : ?>
            <option value="<?php echo esc_attr($term->term_id); ?>" <?php selected($current, $term->term_id); ?>><?php echo esc_html($term->name); ?></option>
        <?php endforeach; ?>
    </select>
    <p class="description" style="margin-top:8px;">Por ahora solo existe "Documento técnico". Para agregar otra, escríbela abajo:</p>
    <p style="margin-top:8px;">
        <input type="text" id="categoria_recurso_nueva" name="_sesna_recurso_categoria_nueva" value="" placeholder="Escribe una categoría nueva" style="width:100%; max-width:400px;">
    </p>
    <p class="description">Si escribes algo aquí, se crea (si no existe todavía) y se usa en lugar de la selección de arriba al guardar.</p>
    <?php
}

function sesna_add_recurso_meta_box() {
    add_meta_box(
        'sesna_recurso_extra',
        'Detalles del recurso',
        'sesna_recurso_meta_box_html',
        'sesna_recurso',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sesna_add_recurso_meta_box');

function sesna_recurso_meta_box_html($post) {
    wp_nonce_field('sesna_save_recurso_meta', 'sesna_recurso_nonce');

    $formato     = get_post_meta($post->ID, '_sesna_recurso_formato', true) ?: 'PDF';
    $anio_inicio = get_post_meta($post->ID, '_sesna_recurso_anio_inicio', true) ?: date('Y');
    $anio_fin    = get_post_meta($post->ID, '_sesna_recurso_anio_fin', true) ?: '';
    $paginas     = get_post_meta($post->ID, '_sesna_recurso_paginas', true) ?: '';
    $color       = get_post_meta($post->ID, '_sesna_recurso_color', true) ?: 'burgundi';
    $archivo_url = get_post_meta($post->ID, '_sesna_recurso_archivo_url', true) ?: '';
    $seccion     = get_post_meta($post->ID, '_sesna_recurso_seccion', true) ?: 'contrataciones';
    $subseccion  = get_post_meta($post->ID, '_sesna_recurso_subseccion', true) ?: '';
    $tipo        = get_post_meta($post->ID, '_sesna_recurso_tipo', true) ?: 'documento';

    $tipos = array(
        'documento'   => 'Documento',
        'herramienta' => 'Herramienta',
    );
    $formatos = array('PDF', 'DOCX', 'XLSX', 'PPTX', 'ZIP');
    $colores  = array(
        'burgundi' => 'Guinda',
        'teal'     => 'Verde azulado',
        'negro'    => 'Negro',
    );
    $secciones = sesna_recurso_secciones();
    ?>
    <style>
        .sr-mb-row { margin-bottom: 16px; }
        .sr-mb-row label { font-weight: 600; display: block; margin-bottom: 5px; }
        .sr-mb-row input[type="text"],
        .sr-mb-row input[type="number"],
        .sr-mb-row select { width: 100%; max-width: 400px; }
        .sr-mb-inline { display: flex; gap: 16px; flex-wrap: wrap; }
        .sr-mb-inline .sr-mb-row { flex: 1; min-width: 180px; }
        .sr-mb-hint { color: #777; font-size: 12px; margin-top: 4px; }
    </style>

    <div class="sr-mb-row">
        <label for="sr_seccion">Tarjeta / sección donde se pinta</label>
        <select id="sr_seccion" name="_sesna_recurso_seccion">
            <?php foreach ($secciones as $valor => $etiqueta) : ?>
                <option value="<?php echo esc_attr($valor); ?>" <?php selected($seccion, $valor); ?>><?php echo esc_html($etiqueta); ?></option>
            <?php endforeach; ?>
        </select>
        <p class="sr-mb-hint">Define en cuál de las 4 tarjetas de "Documentos" (y su contenido dinámico) aparece este recurso.</p>
    </div>

    <div class="sr-mb-row">
        <label for="sr_subseccion">Subsección <span class="sr-mb-hint">(opcional)</span></label>
        <input type="text" id="sr_subseccion" name="_sesna_recurso_subseccion" value="<?php echo esc_attr($subseccion); ?>" placeholder="Ej: ALEA, Muestreo Aleatorio Simple">
        <p class="sr-mb-hint">Si se llena, el recurso se agrupa junto con los demás que compartan el mismo texto exacto de subsección (se pintan en un acordeón dentro de su tarjeta). Si se deja vacío, el recurso se muestra en la lista general, sin agrupar.</p>
    </div>

    <div class="sr-mb-row">
        <label for="sr_tipo">Tipo de recurso</label>
        <select id="sr_tipo" name="_sesna_recurso_tipo">
            <?php foreach ($tipos as $valor => $etiqueta) : ?>
                <option value="<?php echo esc_attr($valor); ?>" <?php selected($tipo, $valor); ?>><?php echo esc_html($etiqueta); ?></option>
            <?php endforeach; ?>
        </select>
        <p class="sr-mb-hint">"Documento" muestra los botones "Ver documento" y "Descargar". "Herramienta" (ej. un ZIP, un ejecutable, un paquete) oculta "Ver documento" y deja solo "Descargar", ya que no tiene sentido previsualizarlo en el navegador.</p>
    </div>

    <div class="sr-mb-inline">
        <div class="sr-mb-row">
            <label for="sr_formato">Formato del documento</label>
            <select id="sr_formato" name="_sesna_recurso_formato">
                <?php foreach ($formatos as $f) : ?>
                    <option value="<?php echo esc_attr($f); ?>" <?php selected($formato, $f); ?>><?php echo esc_html($f); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="sr-mb-row">
            <label for="sr_paginas">Total de páginas</label>
            <input type="text" id="sr_paginas" name="_sesna_recurso_paginas" value="<?php echo esc_attr($paginas); ?>" placeholder="Ej: 45 págs.">
            <p class="sr-mb-hint">Se captura manualmente, tal como debe mostrarse (ej. "45 págs.").</p>
        </div>
    </div>

    <div class="sr-mb-inline">
        <div class="sr-mb-row">
            <label for="sr_anio_inicio">Año</label>
            <input type="number" id="sr_anio_inicio" name="_sesna_recurso_anio_inicio" value="<?php echo esc_attr($anio_inicio); ?>" min="1900" max="2100">
        </div>

        <div class="sr-mb-row">
            <label for="sr_anio_fin">Año fin <span class="sr-mb-hint">(opcional, solo si es un periodo)</span></label>
            <input type="number" id="sr_anio_fin" name="_sesna_recurso_anio_fin" value="<?php echo esc_attr($anio_fin); ?>" min="1900" max="2100">
            <p class="sr-mb-hint">Si se llena y es distinto al año, se muestra como periodo, ej. "2023–2025".</p>
        </div>
    </div>

    <div class="sr-mb-row">
        <label for="sr_color">Color de acento de la portada</label>
        <select id="sr_color" name="_sesna_recurso_color">
            <?php foreach ($colores as $valor => $etiqueta) : ?>
                <option value="<?php echo esc_attr($valor); ?>" <?php selected($color, $valor); ?>><?php echo esc_html($etiqueta); ?></option>
            <?php endforeach; ?>
        </select>
        <p class="sr-mb-hint">Solo aplica cuando el recurso NO tiene imagen destacada: la portada se genera con el título sobre este color.</p>
    </div>

    <div class="sr-mb-row">
        <label for="sr_archivo_url">Archivo del recurso</label>
        <div style="display:flex; gap:10px; max-width: 600px;">
            <input type="text" id="sr_archivo_url" name="_sesna_recurso_archivo_url" value="<?php echo esc_attr($archivo_url); ?>" style="flex-grow:1;">
            <button type="button" class="button sr-media-btn">Seleccionar archivo</button>
        </div>
        <p class="sr-mb-hint">Se usa tanto para el botón "Ver documento" como para "Descargar PDF".</p>
    </div>

    <p class="description" style="margin-top: 10px;">
        <strong>Título del post</strong> = título del recurso.<br>
        <strong>Extracto</strong> = descripción corta que se muestra en la tarjeta.<br>
        <strong>Imagen destacada</strong> = portada del recurso (opcional). Si no se define, la portada se genera automáticamente con el título sobre el color elegido arriba.
    </p>

    <script>
    jQuery(document).ready(function($) {
        var srMediaFrame;
        $('.sr-media-btn').on('click', function(e) {
            e.preventDefault();
            if (srMediaFrame) {
                srMediaFrame.open();
                return;
            }
            srMediaFrame = wp.media({
                title: 'Seleccionar archivo del recurso',
                button: { text: 'Usar este archivo' },
                multiple: false
            });
            srMediaFrame.on('select', function() {
                var attachment = srMediaFrame.state().get('selection').first().toJSON();
                $('#sr_archivo_url').val(attachment.url);
            });
            srMediaFrame.open();
        });
    });
    </script>
    <?php
}

function sesna_save_recurso_meta($post_id) {
    if (!isset($_POST['sesna_recurso_nonce']) || !wp_verify_nonce($_POST['sesna_recurso_nonce'], 'sesna_save_recurso_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['_sesna_recurso_formato'])) {
        update_post_meta($post_id, '_sesna_recurso_formato', sanitize_text_field($_POST['_sesna_recurso_formato']));
    }
    if (isset($_POST['_sesna_recurso_paginas'])) {
        update_post_meta($post_id, '_sesna_recurso_paginas', sanitize_text_field($_POST['_sesna_recurso_paginas']));
    }
    if (isset($_POST['_sesna_recurso_anio_inicio'])) {
        update_post_meta($post_id, '_sesna_recurso_anio_inicio', sanitize_text_field($_POST['_sesna_recurso_anio_inicio']));
    }
    if (isset($_POST['_sesna_recurso_anio_fin'])) {
        update_post_meta($post_id, '_sesna_recurso_anio_fin', sanitize_text_field($_POST['_sesna_recurso_anio_fin']));
    }
    if (isset($_POST['_sesna_recurso_color'])) {
        update_post_meta($post_id, '_sesna_recurso_color', sanitize_text_field($_POST['_sesna_recurso_color']));
    }
    if (isset($_POST['_sesna_recurso_archivo_url'])) {
        update_post_meta($post_id, '_sesna_recurso_archivo_url', sesna_strip_domain_from_url(esc_url_raw($_POST['_sesna_recurso_archivo_url'])));
    }
    if (isset($_POST['_sesna_recurso_seccion'])) {
        update_post_meta($post_id, '_sesna_recurso_seccion', sanitize_text_field($_POST['_sesna_recurso_seccion']));
    }
    if (isset($_POST['_sesna_recurso_subseccion'])) {
        update_post_meta($post_id, '_sesna_recurso_subseccion', sanitize_text_field($_POST['_sesna_recurso_subseccion']));
    }
    if (isset($_POST['_sesna_recurso_tipo'])) {
        update_post_meta($post_id, '_sesna_recurso_tipo', sanitize_text_field($_POST['_sesna_recurso_tipo']));
    }

    // Si se escribió una categoría nueva, se crea (si hace falta) y
    // sustituye a lo elegido en el select.
    if (!empty($_POST['_sesna_recurso_categoria_nueva'])) {
        $nombre_categoria = sanitize_text_field(wp_unslash($_POST['_sesna_recurso_categoria_nueva']));
        $termino = term_exists($nombre_categoria, 'categoria_recurso');
        if (!$termino) {
            $termino = wp_insert_term($nombre_categoria, 'categoria_recurso');
        }
        if (!is_wp_error($termino)) {
            $term_id = is_array($termino) ? (int) $termino['term_id'] : (int) $termino;
            wp_set_post_terms($post_id, array($term_id), 'categoria_recurso');
        }
    }
}
add_action('save_post_sesna_recurso', 'sesna_save_recurso_meta');

function sesna_recurso_admin_scripts($hook) {
    global $typenow;
    if ($typenow === 'sesna_recurso') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'sesna_recurso_admin_scripts');

/**
 * Año (o periodo) formateado de un Recurso Técnico para pintarlo en la
 * tarjeta. Ej: "2025" si solo hay año, o "2023–2025" (guión medio) si
 * se capturó un año fin distinto al de inicio.
 */
function sesna_recurso_get_anio_display($post_id) {
    $inicio = get_post_meta($post_id, '_sesna_recurso_anio_inicio', true);
    $fin    = get_post_meta($post_id, '_sesna_recurso_anio_fin', true);

    if (!empty($fin) && $fin !== $inicio) {
        return $inicio . '–' . $fin;
    }
    return $inicio;
}

/**
 * Tarjetas/secciones disponibles para clasificar un Recurso Disponible.
 * Las claves coinciden con los id de los bloques dinámicos
 * (#sec-contrataciones, #sec-conflicto, etc.) en page-riesgos-inteligencia.php.
 */
function sesna_recurso_secciones() {
    return array(
        'contrataciones' => 'Contrataciones públicas',
        'conflicto'      => 'Conflicto de interés',
        'verificacion'   => 'Verificación patrimonial',
        'deporte'        => 'Deporte',
    );
}

/**
 * Recursos publicados asignados a una sección/tarjeta, listos para pintar.
 */
function sesna_get_recursos_por_seccion($seccion) {
    return get_posts(array(
        'post_type'      => 'sesna_recurso',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order title',
        'order'          => 'ASC',
        'meta_key'       => '_sesna_recurso_seccion',
        'meta_value'     => $seccion,
    ));
}

/**
 * Pinta la tarjeta (.cp-doc-item) de un Recurso Disponible.
 * Portada: si el recurso tiene imagen destacada la usa; si no, replica el
 * título sobre el color de acento elegido (comportamiento original).
 */
function sesna_render_recurso_card($post) {
    $formato   = get_post_meta($post->ID, '_sesna_recurso_formato', true) ?: 'PDF';
    $paginas   = get_post_meta($post->ID, '_sesna_recurso_paginas', true);
    $color     = get_post_meta($post->ID, '_sesna_recurso_color', true) ?: 'burgundi';
    $archivo   = get_post_meta($post->ID, '_sesna_recurso_archivo_url', true) ?: '#';
    $anio      = sesna_recurso_get_anio_display($post->ID);
    $titulo    = get_the_title($post);
    $descripcion = get_the_excerpt($post);

    $terms = get_the_terms($post->ID, 'categoria_recurso');
    $badge = (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : 'Documento técnico';
    $subseccion = get_post_meta($post->ID, '_sesna_recurso_subseccion', true);
    $tipo = get_post_meta($post->ID, '_sesna_recurso_tipo', true) ?: 'documento';
    $video_url = get_post_meta($post->ID, '_sesna_recurso_video_url', true);
    ?>
    <div class="cp-doc-item" data-subseccion="<?php echo esc_attr($subseccion); ?>">

        <!-- Thumbnail del documento -->
        <?php if (has_post_thumbnail($post)) : ?>
            <div class="cp-doc-thumb cp-doc-thumb--<?php echo esc_attr($color); ?>" style="padding: 0; align-items: center; justify-content: center;">
                <?php echo get_the_post_thumbnail($post, 'medium', array(
                    'style' => 'display: block; width: 100%; height: 100%; object-fit: contain;',
                    'alt'   => esc_attr($titulo),
                )); ?>
            </div>
        <?php else : ?>
            <div class="cp-doc-thumb cp-doc-thumb--<?php echo esc_attr($color); ?>">
                <div class="cp-doc-thumb__logo">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/icon_logo_sesna.png' ); ?>" alt="SESNA" style="max-width: 38px; max-height: 22px; object-fit: contain; filter: brightness(0) invert(1);">
                </div>
                <p class="cp-doc-thumb__nombre"><?php echo esc_html($titulo); ?></p>
            </div>
        <?php endif; ?>

        <!-- Info del documento -->
        <div class="cp-doc-info">
            <span class="insignia-borde insignia-guinda mb--4"><?php echo esc_html($badge); ?></span>
            <h3 class="cp-doc-titulo sh1b"><?php echo esc_html($titulo); ?></h3>
            <p class="cp-doc-desc b1r"><?php echo esc_html($descripcion); ?></p>
            <div class="cp-doc-meta b1r">
                <span><?php echo sesna_render_snd_svg_icon('snd-calendar', 'icono--16'); ?> <?php echo esc_html($anio); ?></span>
                <span class="cp-doc-meta__sep">·</span>
                <span><?php echo sesna_render_snd_svg_icon('snd-document', 'icono--16'); ?> <?php echo esc_html($formato); ?></span>
                <?php if (!empty($paginas)) : ?>
                <span class="cp-doc-meta__sep">·</span>
                <span><?php echo esc_html($paginas); ?></span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Acciones -->
        <div class="cp-doc-acciones">
            <?php if ($tipo !== 'herramienta') : ?>
            <a href="#" class="boton__secundario" data-modal-target="#pdfViewerModal" data-pdf-url="<?php echo esc_url($archivo); ?>" data-pdf-title="<?php echo esc_attr($titulo); ?>">
                <?php echo sesna_render_snd_svg_icon('snd-screen', 'icono--16'); ?> Ver documento
            </a>
            <?php else : ?>
            <a href="<?php echo esc_url($archivo); ?>" class="boton__primario" target="_blank" rel="noopener" download>
                <?php echo sesna_render_snd_svg_icon('snd-download', 'icono--16'); ?> Descargar <?php echo esc_html($formato); ?>
            </a>
            <?php endif; ?>
            <?php if (!empty($video_url)) : ?>
            <a href="<?php echo esc_url($video_url); ?>" class="boton__secundario" target="_blank" rel="noopener" title="El enlace abre en ventana nueva">
                <?php echo sesna_render_snd_svg_icon('snd-play', 'icono--16'); ?> Ver video
            </a>
            <?php endif; ?>
        </div>

    </div>
    <?php
}
