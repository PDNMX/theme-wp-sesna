<?php

if (!function_exists('sesna_theme_setup')):

	function sesna_theme_setup()
	{
		load_theme_textdomain('sesna', get_template_directory() . '/languages');

		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');

		register_nav_menus(
			array(
				'menu-1' => __('Header 1', 'sesna'),
				'menu-2' => __('Header 2', 'sesna'),
				'transparencia' => __('Transparencia', 'sesna'),
				'conocenos' => __('Conocenos', 'sesna'),
				'footer-1' => __('Footer 1', 'sesna'),
				'footer-2' => __('Footer 2', 'sesna'),
				'footer-3' => __('Footer 3', 'sesna'),
				'social' => __('Social Links Menu', 'sesna'),
			)
		);

		add_theme_support('post-formats', array('aside', 'video'));

		add_image_size('thumb-medium', 350, 208, true);
		add_image_size('featured-large', 635, 334, true);
		add_image_size('featured-small', 303, 270, true);
	}
endif;
add_action('after_setup_theme', 'sesna_theme_setup');


function twentynineteen_widgets_init()
{
	register_sidebar(
		array(
			'name' => __('Blog sidebar', 'sesna'),
			'id' => 'sidebar-1',
			'description' => __('Add widgets here to appear in your blog.', 'sesna'),
			'before_widget' => '<div class="filterContainer">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'twentynineteen_widgets_init');


/* ============================================================
   Enqueue scripts y estilos — GOB.mx v3
   ============================================================ */
function sesna_theme_scripts()
{
	// Hoja principal del tema (estilos SESNA sobre el framework)
	wp_enqueue_style('sesna-main-style', get_template_directory_uri() . '/assets/css/main.css', array('gobmx-framework'), wp_get_theme()->get('Version'));
	// Framework GOB.mx v3 — incluye Bootstrap 5, fuente Patria y variables de color
	wp_enqueue_style('gobmx-framework', 'https://framework-gb.cdn.gob.mx/gm/v3/assets/styles/main.css', array(), null);
	// Bootstrap Icons — CDN (no incluido en el framework GOB.mx)
	wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css', array(), '1.11.3');
	// Barra de accesibilidad GOB.mx — CDN oficial (no descargar localmente)
	wp_enqueue_style('gobmx-accesibilidad', 'https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css', array(), null);

	// Framework GOB.mx v3 — JS oficial — ya incluye Bootstrap 5 y jQuery 3.7.1
	wp_enqueue_script('gobmx-framework-js', 'https://framework-gb.cdn.gob.mx/gm/v3/assets/js/gobmx.js', array(), null, false);
	// Barra de accesibilidad GOB.mx — CDN oficial (no descargar localmente)
	wp_enqueue_script('gobmx-accesibilidad-js', 'https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js', array(), null, true);

	// JS global del tema (depende solo del framework)
	wp_enqueue_script('sesna-main-script', get_template_directory_uri() . '/assets/js/main.js', array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);

	wp_localize_script('sesna-main-script', 'ajax_object', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'loading_url' => get_bloginfo('stylesheet_directory') . '/img/loading.gif',
	));

	// Scripts por página — dependen del framework (Bootstrap y jQuery ya vienen en él)
	// Estilos de tipografía e iconografía GOB.mx v3 — solo para el landing de Transparencia
	if (is_page('transparencia')) {
		wp_enqueue_style('sesna-transparencia-style', get_theme_file_uri('/assets/css/transparencia.css'), array('sesna-main-style'), wp_get_theme()->get('Version'));
	}

	if (is_page('como-vamos')) {
		wp_enqueue_script('sesiones-script', get_theme_file_uri('/script/sesiones.js'), array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);
	}

	if (is_page('que-hacemos')) {
		wp_enqueue_script('quehacemos-script', get_theme_file_uri('/script/quehacemos.js'), array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);
	}

	if (is_page('politica-nacional-anticorrupcion')) {
		wp_enqueue_script('d3-script', 'https://d3js.org/d3.v4.min.js', array('gobmx-framework-js'), 'v4', true);
		wp_enqueue_script('pna-script', get_theme_file_uri('/script/pna.js'), array('gobmx-framework-js', 'd3-script'), wp_get_theme()->get('Version'), true);
	}

	if (is_page('informacion') || is_home() || is_archive() || is_search()) {
		wp_enqueue_script('home-script', get_theme_file_uri('/script/home.js'), array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);
		wp_enqueue_script('blog-script', get_theme_file_uri('/script/blog.js'), array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);
	}
}
add_action('wp_enqueue_scripts', 'sesna_theme_scripts');



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


function the_thumbnail_photo($size)
{
	echo get_the_thumbnail_photo($size);
}

function get_the_thumbnail_photo($size)
{
	$fallback_text = get_bloginfo('stylesheet_directory') . '/img/blog/PIC-Texto.jpg';
	$fallback_video = get_bloginfo('stylesheet_directory') . '/img/blog/PIC-Multimedia.jpg';

	if (has_post_thumbnail()) {
		$url = get_the_post_thumbnail_url(get_the_ID(), $size);
		return $url ? $url : $fallback_text;
	} elseif (get_post_format() === 'video') {
		return $fallback_video;
	} else {
		return $fallback_text;
	}
}

add_action('pre_get_posts', 'ad_filter_categories');
function ad_filter_categories($query)
{
	if ($query->is_main_query() && is_home() && isset($_GET['categoria']) && !empty($_GET['categoria'])) {
		$query->set('category_name', $_GET['categoria']);
	}
}


add_action('wp_ajax_get_sesiones', 'get_sesiones');
add_action('wp_ajax_nopriv_get_sesiones', 'get_sesiones');

function get_sesiones()
{
	global $post;

	$page = $_POST['page'];
	$type = $_POST['type'];
	$posts_per_page = 3;

	$args = [
		'post_type' => 'sesion',
		'posts_per_page' => $posts_per_page,
		'offset' => ($page * $posts_per_page),
		'post_status' => array('publish', 'convocatoria'),
		'tax_query' => array(
			array(
				'taxonomy' => 'tipo_sesion',
				'field' => 'slug',
				'terms' => $type,
			)
		),
		'date_query' => array(),
	];

	if (isset($_POST['start_date']) && !empty($_POST['start_date'])) {
		$start_date = explode('/', $_POST['start_date']);
		array_push($args['date_query'], array(
			'year' => $start_date[2],
			'month' => $start_date[0],
			'day' => $start_date[1],
			'compare' => '>=',
		));
	}

	if (isset($_POST['end_date']) && !empty($_POST['end_date'])) {
		$end_date = explode('/', $_POST['end_date']);
		array_push($args['date_query'], array(
			'year' => $end_date[2],
			'month' => $end_date[0],
			'day' => $end_date[1],
			'compare' => '<=',
		));
	}

	$sesiones = get_posts($args);

	foreach ($sesiones as $sesion) {
		$post = $sesion;
		setup_postdata($post);
		get_template_part('template-parts/sesion/content', $post->post_status);
	}
	wp_reset_postdata();

	wp_die();
}

function the_file($file, $sub = false)
{
	echo get_the_file($file, $sub);
}

function get_the_file($file_key, $sub)
{
	if (!function_exists('get_field')) {
		return '#';
	}

	if ($sub) {
		$file = get_sub_field($file_key);
	} else {
		$file = get_field($file_key);
	}

	if (empty($file)) {
		return '#';
	}

	if (is_array($file)) {
		$file = isset($file['url']) ? $file['url'] : '';
	}

	if (empty($file)) {
		return '#';
	}

	$filename = str_replace(get_bloginfo('url'), '', $file);
	return get_bloginfo('url') . '/download.php?file=' . urlencode($filename);
}

function get_the_file_url($file, $sub = false)
{
	if ($sub) {
		$file = get_sub_field($file);
	} else {
		$file = get_field($file);
	}

	return str_replace(get_bloginfo('url'), '', $file);
}

function the_file_all()
{
	echo get_the_file_all();
}

function get_the_file_all()
{
	return get_bloginfo('url') . '/download_all.php?id=' . get_the_ID();
}

function the_session_type()
{
	echo get_the_session_type();
}

function get_the_session_type()
{
	$terms = get_the_terms(get_the_ID(), 'tipo_sesion');

	foreach ($terms as $term) {
		return $term->name;
	}
}

function the_title_transparencia()
{
	echo get_the_title_transparencia();
}

function get_the_title_transparencia()
{
	$title = explode(' ', get_the_title());

	if (count($title) > 1) {
		$title[count($title) - 1] = '<b>' . $title[count($title) - 1] . '</b>';
	}

	return implode(' ', $title);
}

function the_youtube_video_ID()
{
	echo get_the_youtube_video_ID();
}

function get_the_youtube_video_ID()
{
	$youtube_video_url = get_field('sesion_youtube');

	if (empty($youtube_video_url)) {
		return '';
	}

	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_video_url, $match);

	return $match[1];
}


add_action('wp_ajax_get_blog_posts', 'get_blog_posts');
add_action('wp_ajax_nopriv_get_blog_posts', 'get_blog_posts');

function get_blog_posts()
{
	$posts_per_page = 10;
	$page = (isset($_POST['page']) && !empty($_POST['page'])) ? $_POST['page'] : 0;

	$args = [
		'posts_per_page' => $posts_per_page,
		'offset' => ($page * $posts_per_page),
	];

	if (isset($_POST['filter']) && !empty($_POST['filter'])) {
		switch ($_POST['filter']) {
			case 1:
				$args['date_query'] = array('after' => '-1 week');
				break;
			case 2:
				$args['date_query'] = array('after' => '-1 month');
				break;
			case 3:
				$args['date_query'] = array('after' => '-1 year');
				break;
			case 4:
				$args['date_query'] = array(
					'after' => $_POST['date_init'],
					'before' => $_POST['date_end'],
				);
				break;
		}
	}

	if (isset($_POST['categories']) && !empty($_POST['categories'])) {
		$args['category__and'] = [];

		foreach ($_POST['categories'] as $cate) {
			$c = get_category_by_slug($cate);
			array_push($args['category__and'], $c->term_id);
		}
	}

	if (isset($_POST['monthnum']) && !empty($_POST['monthnum'])) {
		$args['monthnum'] = $_POST['monthnum'];
	}

	if (isset($_POST['year']) && !empty($_POST['year'])) {
		$args['year'] = $_POST['year'];
	}

	if (isset($_POST['search']) && !empty($_POST['search'])) {
		$args['s'] = $_POST['search'];
	}

	$the_query = new WP_Query($args);

	if ($the_query->have_posts()) {
		while ($the_query->have_posts()) {
			$the_query->the_post();
			get_template_part('template-parts/content/content');
		}
	} else {
		get_template_part('template-parts/content/content', 'none');
	}

	wp_die();
}

function sortByName($a, $b)
{
	return $a->name < $b->name;
}

function the_title_limit($limit)
{
	echo get_the_title_limit($limit);
}

function get_the_title_limit($limit)
{
	$t = get_the_title();

	if (strlen($t) <= $limit) {
		return $t;
	}

	return mb_substr($t, 0, $limit, 'UTF-8') . '...';
}


// Widget de documentos
function wpb_load_widget()
{
	register_widget('wpb_widget');
}
add_action('widgets_init', 'wpb_load_widget');

class wpb_widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
			'wpb_widget',
			__('Documentos Widget', 'sesna'),
			array('description' => __('Widget con número de documentos', 'sesna'))
		);
	}

	public function widget($args, $instance)
	{
		?>
		<div class="redBox">
			<p class="titulo">Contamos con: <b><span><?= wp_count_posts()->publish ?></span> documentos <br>originales a tu<br>
					disposición.</b></p>
		</div>
		<?php
	}
}

// =========================================================================
// REGISTRO DE CUSTOM POST TYPE PARA EL CARRUSEL
// =========================================================================
function sesna_register_slider_cpt()
{
	$labels = array(
		'name' => _x('Sliders', 'Post type general name', 'sesna'),
		'singular_name' => _x('Slider', 'Post type singular name', 'sesna'),
		'menu_name' => _x('Carrusel', 'Admin Menu text', 'sesna'),
		'name_admin_bar' => _x('Slide', 'Add New on Toolbar', 'sesna'),
		'add_new' => __('Añadir nuevo', 'sesna'),
		'add_new_item' => __('Añadir nuevo slide', 'sesna'),
		'new_item' => __('Nuevo slide', 'sesna'),
		'edit_item' => __('Editar slide', 'sesna'),
		'view_item' => __('Ver slide', 'sesna'),
		'all_items' => __('Todos los slides', 'sesna'),
		'search_items' => __('Buscar slides', 'sesna'),
		'not_found' => __('No se encontraron slides.', 'sesna'),
		'not_found_in_trash' => __('No se encontraron slides en la papelera.', 'sesna'),
	);

	$args = array(
		'labels' => $labels,
		'public' => false, // Para que no tenga página individual propia
		'publicly_queryable' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => false,
		'rewrite' => false,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-images-alt2', // Icono representativo (imágenes)
		'supports' => array('title', 'excerpt', 'thumbnail'), // Título, Extracto e Imagen Destacada
	);

	register_post_type('slider', $args);
}
add_action('init', 'sesna_register_slider_cpt');

// =========================================================================
// META BOX PARA OPCIONES DEL SLIDER (Mostrar/Ocultar Textos)
// =========================================================================

// 1. Agregar el Meta Box en el panel derecho (side)
function sesna_add_slider_meta_box()
{
	add_meta_box(
		'slider_options_meta',
		'Opciones del Slide',
		'sesna_slider_meta_box_html',
		'slider',
		'side',
		'default'
	);
}
add_action('add_meta_boxes', 'sesna_add_slider_meta_box');

// 2. Imprimir el HTML del Checkbox
function sesna_slider_meta_box_html($post)
{
	wp_nonce_field('sesna_save_slider_meta_data', 'sesna_slider_meta_nonce');

	// Obtener el valor actual. Si es un post nuevo sin guardar, asumimos "1" (mostrar)
	$show_text = get_post_meta($post->ID, '_show_text_slider', true);
	if ($show_text === '') {
		$show_text = '1';
	}

	?>
	<p>
		<label>
			<input type="checkbox" name="_show_text_slider" value="1" <?php checked($show_text, '1'); ?> />
			Mostrar título y extracto en el carrusel
		</label>
	</p>
	<p class="description">Si desmarcas esta casilla, solo se mostrará la imagen para este slide.</p>
	<?php
}

// 3. Guardar el estado del Checkbox al actualizar/publicar
function sesna_save_slider_meta_data($post_id)
{
	if (!isset($_POST['sesna_slider_meta_nonce']) || !wp_verify_nonce($_POST['sesna_slider_meta_nonce'], 'sesna_save_slider_meta_data')) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (isset($_POST['_show_text_slider'])) {
		update_post_meta($post_id, '_show_text_slider', '1');
	} else {
		update_post_meta($post_id, '_show_text_slider', '0');
	}
}
add_action('save_post_slider', 'sesna_save_slider_meta_data');

// =========================================================================
// REGISTRO DE CUSTOM POST TYPE PARA NORMATIVIDAD
// =========================================================================
function sesna_register_normatividad_cpt() {
    register_post_type('normatividad', array(
        'labels' => array(
            'name' => _x('Normatividad', 'Post type general name', 'sesna'),
            'singular_name' => _x('Normatividad', 'Post type singular name', 'sesna'),
            'menu_name' => _x('Normatividad', 'Admin Menu text', 'sesna'),
            'name_admin_bar' => _x('Documento', 'Add New on Toolbar', 'sesna'),
            'add_new' => __('Añadir nuevo', 'sesna'),
            'add_new_item' => __('Añadir nuevo documento', 'sesna'),
            'new_item' => __('Nuevo documento', 'sesna'),
            'edit_item' => __('Editar documento', 'sesna'),
            'view_item' => __('Ver documento', 'sesna'),
            'all_items' => __('Todos los documentos', 'sesna'),
            'search_items' => __('Buscar documentos', 'sesna'),
            'not_found' => __('No se encontraron documentos.', 'sesna'),
            'not_found_in_trash' => __('No se encontraron documentos en la papelera.', 'sesna'),
        ),
        'public' => true,
        'has_archive' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-portfolio', // Icono representativo
        'supports' => array('title'), // El archivo se administra vía ACF o post_meta
    ));

    register_taxonomy('tipo_normatividad', 'normatividad', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x('Tipos de Normatividad', 'taxonomy general name', 'sesna'),
            'singular_name' => _x('Tipo de Normatividad', 'taxonomy singular name', 'sesna'),
            'search_items' =>  __('Buscar Tipos', 'sesna'),
            'all_items' => __('Todos los Tipos', 'sesna'),
            'edit_item' => __('Editar Tipo', 'sesna'),
            'update_item' => __('Actualizar Tipo', 'sesna'),
            'add_new_item' => __('Añadir nuevo Tipo', 'sesna'),
            'new_item_name' => __('Nuevo nombre de Tipo', 'sesna'),
            'menu_name' => __('Tipos de Normatividad', 'sesna'),
        ),
        'public' => true,
        'show_admin_column' => true,
        'show_ui' => true,
    ));
}
add_action('init', 'sesna_register_normatividad_cpt');

