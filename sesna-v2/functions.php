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
	wp_enqueue_style('sesna-main-style', get_template_directory_uri() . '/assets/css/main.css', array('gobmx-framework'), filemtime( get_template_directory() . '/assets/css/main.css' ));
	// Framework GOB.mx v3 — incluye Bootstrap 5, fuente Patria y variables de color
	wp_enqueue_style('gobmx-framework', 'https://framework-gb.cdn.gob.mx/gm/v3/assets/styles/main.css', array(), null);
	// Bootstrap Icons — CDN (no incluido en el framework GOB.mx)
	wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css', array(), '1.11.3');
	// Barra de accesibilidad GOB.mx — CDN oficial (no descargar localmente)
	wp_enqueue_style('gobmx-accesibilidad', 'https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css', array(), null);

	// Framework GOB.mx v3 — JS oficial — ya incluye Bootstrap 5 y jQuery 3.7.1
	wp_enqueue_script('gobmx-framework-js', 'https://framework-gb.cdn.gob.mx/gm/v3/assets/js/gobmx.js', array(), null, true);
	// Barra de accesibilidad GOB.mx — CDN oficial (no descargar localmente)
	wp_enqueue_script('gobmx-accesibilidad-js', 'https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js', array(), null, true);

	// JS global del tema (depende solo del framework)
	wp_enqueue_script('sesna-main-script', get_template_directory_uri() . '/assets/js/main.js', array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);

	wp_localize_script('sesna-main-script', 'ajax_object', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'loading_url' => get_bloginfo('stylesheet_directory') . '/img/loading.gif',
	));

	// Scripts por página — dependen del framework (Bootstrap y jQuery ya vienen en él)
	
	if (!is_home() && !is_front_page()) {
		wp_enqueue_style('sesna-components-style', get_theme_file_uri('/assets/css/components.css'), array('sesna-main-style'), wp_get_theme()->get('Version'));
	}

	if (is_page('como-vamos')) {
		wp_enqueue_script('sesiones-script', get_theme_file_uri('/script/sesiones.js'), array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);
	}

	if (is_page('directorio')) {
		wp_enqueue_script('directorio-script', get_theme_file_uri('/script/directorio.js'), array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);
	}

	if (is_page('que-hacemos')) {
		wp_enqueue_script('quehacemos-script', get_theme_file_uri('/script/quehacemos.js'), array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);
	}

	if (is_page('transparencia')) {
		wp_enqueue_script('transparencia-script', get_theme_file_uri('/script/transparencia.js'), array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);
	}

	if (is_page('politica-nacional-anticorrupcion')) {
		wp_enqueue_script('d3-script', 'https://d3js.org/d3.v4.min.js', array('gobmx-framework-js'), 'v4', true);
		wp_enqueue_script('pna-script', get_theme_file_uri('/script/pna.js'), array('gobmx-framework-js', 'd3-script'), wp_get_theme()->get('Version'), true);
	}

	if (is_archive() || is_search()) {
		wp_enqueue_script('home-script', get_theme_file_uri('/script/home.js'), array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);
		wp_enqueue_script('blog-script', get_theme_file_uri('/script/blog.js'), array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);
	}

	if (is_front_page() || is_home()) {
		wp_enqueue_script('home-entries-script', get_theme_file_uri('/script/home-entries.js'), array('gobmx-framework-js'), wp_get_theme()->get('Version'), true);
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

	global $post;

	// 1. Relación estándar de WordPress
	if (has_post_thumbnail()) {
		$url = get_the_post_thumbnail_url(get_the_ID(), $size);
		if (!$url) {
			$url = get_the_post_thumbnail_url(get_the_ID(), 'full');
		}
		if ($url) return $url;
	} 
	
	// 2. Búsqueda algorítmica: Primera imagen en el contenido
	if ($post && !empty($post->post_content)) {
		if (preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches)) {
			return $matches[1];
		}
	}

	// 3. Búsqueda algorítmica: Coincidencia por slug en el directorio uploads
	if ($post) {
		$upload_dir = wp_upload_dir();
		$time = strtotime($post->post_date);
		$year = date('Y', $time);
		$month = date('m', $time);
		$slug = $post->post_name;
		
		$base_dir = $upload_dir['basedir'] . '/' . $year . '/' . $month;
		$base_url = $upload_dir['baseurl'] . '/' . $year . '/' . $month;
		
		if (file_exists($base_dir)) {
			$extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'JPG', 'JPEG', 'PNG', 'GIF', 'WEBP'];
			foreach ($extensions as $ext) {
				$files = glob($base_dir . '/*' . $slug . '*.' . $ext);
				if (!empty($files)) {
					return $base_url . '/' . basename($files[0]);
				}
			}
		}
	}

	// 4. Fallbacks por formato
	if (get_post_format() === 'video') {
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

/* Agrupa las categorías de WordPress en familias.*/
function sna_get_familias_tematicas()
{
	return [
		'comunicados' => [
			'label' => 'Comunicados de Prensa',
			'icon'  => 'bi-megaphone',
			'cats'  => ['comunicados-de-prensa'],
		],
		'comunicacion' => [
			'label' => 'Comunicación y Difusión',
			'icon'  => 'bi-camera-reels',
			'cats'  => [
				'infografia', 'videos', 'relatorias', 'premio',
				'dia-internacional-vs-la-corrupcion',
			],
		],
		'politica-nacional' => [
			'label' => 'Política Nacional Anticorrupción',
			'icon'  => 'bi-shield-check',
			'cats'  => [
				'politica-nacional-anticorrupcion', 'programa-de-implementacion-pna',
				'programa-institucional', 'metodologias', 'reisgos-de-corrupcion',
				'autodiagnostico-riesgos-corrupcion', 'inteligencia-anticorrupcion',
				'conflicto-de-interes',
			],
		],
		'gobierno-coordinacion' => [
			'label' => 'Órganos de Gobierno y Coordinación',
			'icon'  => 'bi-bank',
			'cats'  => [
				'comite-coordinador', 'comite_etica-sesna', 'comision-ejecutiva',
				'organo-de-gobierno', 'ost', 'asamblea-general-sna',
			],
		],
		'vinculacion-sna' => [
			'label' => 'Vinculación e Implementación SNA',
			'icon'  => 'bi-diagram-3',
			'cats'  => [
				'sistemas-locales-anticorrupcion', 'convenios', 'colaboraciones',
				'politicas-estatales-anticorrupcion', 'conoce-mas-del-sna',
				'banco-de-buenas-practicas', 'guias', 'estudios', 'taller',
			],
		],
		'datos-transparencia' => [
			'label' => 'Datos y Plataforma Digital',
			'icon'  => 'bi-database',
			'cats'  => [
				'plataforma-digital-nacional', 'datos', 'estandar-de-datos',
				'catalogo-informacion-corrupcion-mexico', 'ata',
			],
		],
		'rendicion-cuentas' => [
			'label' => 'Transparencia y Rendición de Cuentas',
			'icon'  => 'bi-file-earmark-text',
			'cats'  => [
				'informes', 'reportes', 'declaracion-patrimonial',
				'normatividad_int', 'marco-normativo', 'desempeno-institucional-sesna',
				'semblanzas', 'genero-y-derechos-humanos', 'presupuesto-2021',
			],
		],
		'administracion' => [
			'label' => 'Administración y Adquisiciones',
			'icon'  => 'bi-briefcase',
			'cats'  => [
				'direccion-general-de-administracion', 'adquisiciones',
				'licitaciones-de-la-sesna', 'compras-publicas', 'convocatoria',
				'acciones-y-programas', 'sin-categoria',
			],
		],
	];
}

function sna_get_term_ids_for_familia($familia_key)
{
	$familias = sna_get_familias_tematicas();

	if (!isset($familias[$familia_key])) {
		return [];
	}

	$term_ids = [];

	foreach ($familias[$familia_key]['cats'] as $slug) {
		$term = get_category_by_slug($slug);

		if ($term) {
			$term_ids[] = $term->term_id;
		}
	}

	return $term_ids;
}

function sna_get_familia_post_count($familia_key, $year = 0, $monthnum = 0)
{
	$term_ids = sna_get_term_ids_for_familia($familia_key);

	if (empty($term_ids)) {
		return 0;
	}

	$args = [
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'category__in'   => $term_ids,
		'fields'         => 'ids',
		'posts_per_page' => -1,
	];

	if ($year) {
		$args['year'] = (int) $year;
	}

	if ($monthnum) {
		$args['monthnum'] = (int) $monthnum;
	}

	$q = new WP_Query($args);

	return $q->found_posts;
}

add_action('wp_ajax_get_familias_counts', 'sna_get_familias_counts');
add_action('wp_ajax_nopriv_get_familias_counts', 'sna_get_familias_counts');

function sna_get_familias_counts()
{
	$year     = isset($_POST['year']) ? (int) $_POST['year'] : 0;
	$monthnum = isset($_POST['monthnum']) ? (int) $_POST['monthnum'] : 0;

	$counts = [];

	foreach (sna_get_familias_tematicas() as $key => $familia) {
		$counts[$key] = sna_get_familia_post_count($key, $year, $monthnum);
	}

	wp_send_json_success($counts);
}

function sna_get_entradas_years()
{
	global $wpdb;

	$years = $wpdb->get_col("
		SELECT DISTINCT YEAR(post_date) AS y
		FROM {$wpdb->posts}
		WHERE post_type = 'post' AND post_status = 'publish'
		ORDER BY y DESC
	");

	return array_map('intval', $years);
}

add_action('wp_ajax_get_home_entries_by_family', 'sna_get_home_entries_by_family');
add_action('wp_ajax_nopriv_get_home_entries_by_family', 'sna_get_home_entries_by_family');

function sna_get_home_entries_by_family()
{
	$familia_key    = isset($_POST['familia']) ? sanitize_text_field($_POST['familia']) : '';
	$page           = isset($_POST['page']) ? max(0, (int) $_POST['page']) : 0;
	$year           = isset($_POST['year']) ? (int) $_POST['year'] : 0;
	$monthnum       = isset($_POST['monthnum']) ? (int) $_POST['monthnum'] : 0;
	$posts_per_page = 6;

	$term_ids = sna_get_term_ids_for_familia($familia_key);

	if (empty($term_ids)) {
		wp_die();
	}

	$args = [
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'category__in'        => $term_ids,
		'posts_per_page'      => $posts_per_page,
		'offset'              => $page * $posts_per_page,
	];

	if ($year) {
		$args['year'] = $year;
	}

	if ($monthnum) {
		$args['monthnum'] = $monthnum;
	}

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/home/card-entrada', null, ['familia_key' => $familia_key]);
		}
		wp_reset_postdata();
	} elseif ($page === 0) {
		echo '<p class="text-muted text-center w-100">No hay contenido disponible con los filtros seleccionados.</p>';
	}

	$has_more = ($query->found_posts > (($page + 1) * $posts_per_page)) ? 1 : 0;
	echo '<span class="d-none" data-has-more="' . esc_attr($has_more) . '"></span>';

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
            'all_items' => __('Normatividad', 'sesna'),
            'search_items' => __('Buscar documentos', 'sesna'),
            'not_found' => __('No se encontraron documentos.', 'sesna'),
            'not_found_in_trash' => __('No se encontraron documentos en la papelera.', 'sesna'),
        ),
        'public' => true,
        'has_archive' => false,
        'show_ui' => true,
        'show_in_menu' => 'menu-transparencia',
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

// =========================================================================
// REGISTRO DE CUSTOM POST TYPE PARA EL DIRECTORIO
// =========================================================================
function sesna_register_directorio_cpt()
{
	$labels = array(
		'name'               => _x('Directorio', 'Post type general name', 'sesna'),
		'singular_name'      => _x('Titular', 'Post type singular name', 'sesna'),
		'menu_name'          => _x('Directorio', 'Admin Menu text', 'sesna'),
		'name_admin_bar'     => _x('Titular', 'Add New on Toolbar', 'sesna'),
		'add_new'            => __('Añadir titular', 'sesna'),
		'add_new_item'       => __('Añadir nuevo titular', 'sesna'),
		'new_item'           => __('Nuevo titular', 'sesna'),
		'edit_item'          => __('Editar titular', 'sesna'),
		'view_item'          => __('Ver titular', 'sesna'),
		'all_items'          => __('Todos los titulares', 'sesna'),
		'search_items'       => __('Buscar titulares', 'sesna'),
		'not_found'          => __('No se encontraron titulares.', 'sesna'),
		'not_found_in_trash' => __('No se encontraron titulares en la papelera.', 'sesna'),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => false,
		'rewrite'            => false,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon'          => 'dashicons-id-alt',
		'supports'           => array('title', 'thumbnail', 'page-attributes'),
	);

	register_post_type('directorio', $args);
}
add_action('init', 'sesna_register_directorio_cpt');

// Meta Box: Datos del titular (cargo, email, nombre del área)
function sesna_add_directorio_meta_box()
{
	add_meta_box(
		'directorio_datos_meta',
		'Datos del titular',
		'sesna_directorio_meta_box_html',
		'directorio',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'sesna_add_directorio_meta_box');

function sesna_directorio_meta_box_html($post)
{
	wp_nonce_field('sesna_save_directorio_meta', 'sesna_directorio_meta_nonce');

	$nombre_area       = get_post_meta($post->ID, '_dir_nombre_area', true);
	$estructura        = get_post_meta($post->ID, '_dir_estructura', true);
	$encargado         = get_post_meta($post->ID, '_dir_encargado', true);
	$show_encargado    = get_post_meta($post->ID, '_dir_show_encargado', true);
	$cargo             = get_post_meta($post->ID, '_dir_cargo', true);
	$email             = get_post_meta($post->ID, '_dir_email', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="dir_estructura">Estructura Orgánica</label></th>
			<td>
				<input type="text" id="dir_estructura" name="_dir_estructura"
				       value="<?php echo esc_attr($estructura); ?>" class="regular-text"
				       placeholder="Ej: Secretaría Técnica">
				<p class="description">Texto que se muestra en el listado de Estructura Orgánica (columna izquierda).</p>
			</td>
		</tr>
		<tr>
			<th><label for="dir_nombre_area">Encargado de despacho</label></th>
			<td>
				<input type="text" id="dir_nombre_area" name="_dir_nombre_area"
				       value="<?php echo esc_attr($nombre_area); ?>" class="regular-text"
				       placeholder="Ej: Encargado de despacho de la Secretaría Técnica">
				<br>
				<label style="margin-top: 8px; display: inline-block;">
					<input type="checkbox" name="_dir_show_encargado" value="1" <?php checked($show_encargado, '1'); ?> />
					Mostrar en la ficha del titular
				</label>
				<p class="description">Si se activa, se muestra antes del cargo en la ficha.</p>
			</td>
		</tr>
		<tr>
			<th><label for="dir_cargo">Cargo / Puesto</label></th>
			<td>
				<input type="text" id="dir_cargo" name="_dir_cargo"
				       value="<?php echo esc_attr($cargo); ?>" class="regular-text"
				       placeholder="Ej: Director General de Asuntos Jurídicos">
			</td>
		</tr>
		<tr>
			<th><label for="dir_email">Correo electrónico</label></th>
			<td>
				<input type="email" id="dir_email" name="_dir_email"
				       value="<?php echo esc_attr($email); ?>" class="regular-text"
				       placeholder="Ej: nombre@sesna.gob.mx">
			</td>
		</tr>
	</table>
	<p class="description" style="margin-top: 10px;">
		<strong>Título del post</strong> = Nombre completo del titular.<br>
		<strong>Imagen destacada</strong> = Foto del titular.<br>
		<strong>Orden</strong> = Usa el campo "Orden" (atributos de página) para definir la posición en la lista.
	</p>
	<?php
}

function sesna_save_directorio_meta($post_id)
{
	if (!isset($_POST['sesna_directorio_meta_nonce']) || !wp_verify_nonce($_POST['sesna_directorio_meta_nonce'], 'sesna_save_directorio_meta')) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	$fields = array('_dir_nombre_area', '_dir_estructura', '_dir_cargo', '_dir_email');
	foreach ($fields as $field) {
		if (isset($_POST[$field])) {
			update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
		}
	}

	if (isset($_POST['_dir_show_encargado'])) {
		update_post_meta($post_id, '_dir_show_encargado', '1');
	} else {
		update_post_meta($post_id, '_dir_show_encargado', '0');
	}
}
add_action('save_post_directorio', 'sesna_save_directorio_meta');

/* ---------------------------------------------------------------
   Bootstrap 5 Nav Walker para el menú principal SESNA
--------------------------------------------------------------- */
class Sesna_Bootstrap_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="dropdown-menu sesna-dropdown">';
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $has_children = in_array( 'menu-item-has-children', $item->classes );
        $is_active    = in_array( 'current-menu-item', $item->classes ) ||
                        in_array( 'current-menu-ancestor', $item->classes );

        if ( $depth === 0 ) {
            $li_class = 'nav-item' . ( $has_children ? ' dropdown' : '' ) . ( $is_active ? ' active' : '' );
            $output .= '<li class="' . esc_attr( $li_class ) . '">';

            if ( $has_children ) {
                $output .= '<a class="nav-link dropdown-toggle' . ( $is_active ? ' active' : '' ) . '"'
                    . ' href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">'
                    . esc_html( $item->title ) . '</a>';
            } else {
                $output .= '<a class="nav-link' . ( $is_active ? ' active' : '' ) . '"'
                    . ' href="' . esc_url( $item->url ) . '">'
                    . esc_html( $item->title ) . '</a>';
            }
        } else {
            $is_sub_active = in_array( 'current-menu-item', $item->classes );
            $output .= '<li>';
            $output .= '<a class="dropdown-item' . ( $is_sub_active ? ' active' : '' ) . '"'
                . ' href="' . esc_url( $item->url ) . '">'
                . esc_html( $item->title ) . '</a>';
        }
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
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

/**
 * Resuelve un valor de _ct_archivo_url (path relativo o URL absoluta
 * guardada con un dominio distinto, p. ej. de una migración) a una
 * URL absoluta válida para el dominio actual del sitio.
 */
function sesna_resolve_archivo_url($valor) {
    if (empty($valor) || $valor === '#') {
        return '#';
    }
    if (strpos($valor, '/wp-content/uploads/') === 0) {
        return home_url($valor);
    }
    $idx = strpos($valor, '/wp-content/uploads/');
    if ($idx !== false) {
        return home_url(substr($valor, $idx));
    }
    return $valor;
}

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

    $transient_key = 'sesna_dp_docs_cache_v3';
    $cached_docs = get_transient($transient_key);

    if (false === $cached_docs || isset($_GET['clear_cache'])) {
        $upload_dir = wp_upload_dir();
        $basedir = $upload_dir['basedir'];
        $baseurl = $upload_dir['baseurl'];
        
        $file_map = [];
        try {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($basedir, RecursiveDirectoryIterator::SKIP_DOTS));
            foreach ($iterator as $file) {
                if ($file->isFile() && strtolower($file->getExtension()) === 'pdf') {
                    $filename = $file->getFilename();
                    if (!isset($file_map[$filename])) {
                        $path = $file->getPathname();
                        $url = str_replace($basedir, $baseurl, $path);
                        $url = str_replace('\\', '/', $url);
                        $file_map[$filename] = $url;
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

            $enlace = '#';
            if (isset($file_map[$doc['filename']])) {
                $enlace = $file_map[$doc['filename']];
            }

            $processed_docs[] = [
                'titulo' => $doc['titulo'],
                'anio'   => $doc['anio'],
                'tipo'   => $tipo,
                'enlace' => $enlace
            ];
        }

        usort($processed_docs, function($a, $b) {
            return (int)$b['anio'] - (int)$a['anio'];
        });

        set_transient($transient_key, $processed_docs, 12 * HOUR_IN_SECONDS);
        $cached_docs = $processed_docs;
    }

    return $cached_docs;
}

/**
 * Obtiene de manera dinámica y portable la URL de un documento almacenado en la Biblioteca de Medios (wp-admin).
 * Busca el archivo por nombre o ruta relativa en los archivos adjuntos de WordPress, evitando dominios codificados.
 *
 * @param string $filename      Nombre del archivo o patrón a buscar (ej: 'PNA-resumen-ejecutivo.pdf').
 * @param string $fallback_path Ruta relativa dentro de la carpeta de subidas de WordPress por si no existe en BD (ej: '2020/01/PNA-resumen-ejecutivo.pdf').
 * @return string URL completa del archivo generada dinámicamente según la configuración del entorno actual.
 */
function sesna_get_media_attachment_url( $filename, $fallback_path = '' ) {
    $args = array(
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'posts_per_page' => 20,
        'meta_query'     => array(
            array(
                'key'     => '_wp_attached_file',
                'value'   => $filename,
                'compare' => 'LIKE'
            )
        ),
        'orderby'        => 'date',
        'order'          => 'DESC'
    );

    $attachments = get_posts( $args );

    if ( ! empty( $attachments ) && ! is_wp_error( $attachments ) ) {
        foreach ( $attachments as $attachment ) {
            $attached_file = get_post_meta( $attachment->ID, '_wp_attached_file', true );
            // Ensure exact filename match to prevent matching prefixed files (e.g. 11.-filename.pdf)
            if ( basename( $attached_file ) === $filename ) {
                $url = wp_get_attachment_url( $attachment->ID );
                if ( ! empty( $url ) && ! is_wp_error( $url ) ) {
                    return $url;
                }
            }
        }
    }

    $upload_dir = wp_upload_dir();
    $path = ! empty( $fallback_path ) ? $fallback_path : $filename;
    
    return trailingslashit( $upload_dir['baseurl'] ) . ltrim( $path, '/' );
}