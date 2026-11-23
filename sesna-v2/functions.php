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

// Desactivar admin-bar en el front-end para evitar el bump vertical de 32px sobre el header fijo SND
add_filter('show_admin_bar', '__return_false');
add_action('get_header', function() {
	remove_action('wp_head', '_admin_bar_bump_cb');
});


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
   Enqueue scripts y estilos — SND v1.0.0
   Nota: header.php incluye la etiqueta oficial <link rel="stylesheet"
   integrity="sha384-..." crossorigin="anonymous"
   href="https://framework-gb.cdn.gob.mx/snd/v1/snd-guinda.css"> y
   carga.js al inicio de <head>, garantizando cero FOUC y caché con SRI.
   ============================================================ */
function sesna_theme_scripts()
{
	// Barra de accesibilidad GOB.mx — CDN oficial
	wp_enqueue_style('gobmx-accesibilidad', 'https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css', array(), null);
	// Hoja principal del tema — carga después de snd-guinda.css (declarada en header.php)
	wp_enqueue_style('sesna-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), filemtime( get_template_directory() . '/assets/css/main.css' ));
	// Utilidades propias del tema — al final de la cascada para ganar a los componentes de main.css
	wp_enqueue_style('sesna-utilidades', get_template_directory_uri() . '/assets/css/utilidades-tema.css', array('sesna-main-style'), filemtime( get_template_directory() . '/assets/css/utilidades-tema.css' ));

	// Barra de accesibilidad GOB.mx — CDN oficial (requiere jQuery global $)
	wp_enqueue_script('gobmx-accesibilidad-js', 'https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js', array('jquery'), null, true);
	wp_add_inline_script('jquery-core', 'window.$ = window.$ || window.jQuery;', 'after');

	// JS global del tema (Vanilla JS autónomo)
	wp_enqueue_script('sesna-main-script', get_template_directory_uri() . '/assets/js/main.js', array(), wp_get_theme()->get('Version'), true);

	// Parche de accesibilidad — mejoras sobre el widget CDN de GOB.mx
	wp_enqueue_script('sesna-accesibilidad-patch', get_template_directory_uri() . '/script/accesibilidad-patch.js', array('gobmx-accesibilidad-js'), wp_get_theme()->get('Version'), true);

	wp_localize_script('sesna-main-script', 'ajax_object', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'loading_url' => get_bloginfo('stylesheet_directory') . '/img/loading.gif',
	));

	// Scripts por página
	
	if (!is_home() && !is_front_page()) {
		wp_enqueue_style('sesna-components-style', get_theme_file_uri('/assets/css/components.css'), array('sesna-main-style'), wp_get_theme()->get('Version'));
	}

	if (is_page('como-vamos')) {
		wp_enqueue_script('sesiones-script', get_theme_file_uri('/script/sesiones.js'), array('jquery'), wp_get_theme()->get('Version'), true);
	}

	if (is_page('directorio')) {
		wp_enqueue_script('directorio-script', get_theme_file_uri('/script/directorio.js'), array(), wp_get_theme()->get('Version'), true);
	}

	if (is_page('que-hacemos')) {
		wp_enqueue_script('quehacemos-script', get_theme_file_uri('/script/quehacemos.js'), array('jquery'), wp_get_theme()->get('Version'), true);
	}

	if (is_page('transparencia')) {
		wp_enqueue_script('transparencia-script', get_theme_file_uri('/script/transparencia.js'), array(), wp_get_theme()->get('Version'), true);
	}

	if (is_page('politica-nacional-anticorrupcion')) {
		wp_enqueue_script('d3-script', 'https://d3js.org/d3.v4.min.js', array(), 'v4', true);
		wp_enqueue_script('pna-script', get_theme_file_uri('/script/pna.js'), array('d3-script'), wp_get_theme()->get('Version'), true);
	}

	if (is_page_template('page-derechos-humanos.php') || is_page('derechos-humanos-y-perspectiva-de-genero')) {
		wp_enqueue_script('dh-campania-script', get_theme_file_uri('/script/derechos-humanos.js'), array(), filemtime( get_template_directory() . '/script/derechos-humanos.js' ), true);

		// Catálogo digital tipo flipbook — sección "Acciones X la Integridad"
		wp_enqueue_style('catalogo-digital-style', get_theme_file_uri('/assets/css/catalogo-digital.css'), array('sesna-main-style'), filemtime( get_template_directory() . '/assets/css/catalogo-digital.css' ));
		wp_enqueue_script('page-flip-vendor-script', get_theme_file_uri('/js/vendor/page-flip.browser.js'), array(), wp_get_theme()->get('Version'), true);
		wp_enqueue_script('catalogo-digital-script', get_theme_file_uri('/script/catalogo-digital.js'), array('page-flip-vendor-script'), filemtime( get_template_directory() . '/script/catalogo-digital.js' ), true);
	}

	if (is_archive() || is_search()) {
		wp_enqueue_script('home-script', get_theme_file_uri('/script/home.js'), array('jquery'), wp_get_theme()->get('Version'), true);
		wp_enqueue_script('blog-script', get_theme_file_uri('/script/blog.js'), array('jquery'), wp_get_theme()->get('Version'), true);
	}

	if (is_front_page() || is_home() || is_page('noticias-y-actividades') || is_category()) {
		wp_enqueue_script('home-entries-script', get_theme_file_uri('/script/home-entries.js'), array('jquery'), wp_get_theme()->get('Version'), true);
		wp_localize_script('home-entries-script', 'ajax_object', array(
			'ajax_url'    => admin_url('admin-ajax.php'),
			'loading_url' => get_bloginfo('stylesheet_directory') . '/img/loading.gif',
		));
	}
}
add_action('wp_enqueue_scripts', 'sesna_theme_scripts');

// Reescritura dinámica de URLs de sesna.gob.mx → URL del sitio actual
require_once get_template_directory() . '/inc/sna-url-rewriter.php';


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

// Funciones de fallback defensivas para entornos sin ACF activo
if (!function_exists('get_field')) {
	function get_field($selector, $post_id = false, $format_value = true) {
		return false;
	}
}
if (!function_exists('the_field')) {
	function the_field($selector, $post_id = false, $format_value = true) {
		$value = get_field($selector, $post_id, $format_value);
		if (is_array($value)) {
			$value = implode(', ', $value);
		}
		echo $value ? esc_html($value) : '';
	}
}
if (!function_exists('have_rows')) {
	function have_rows($selector, $post_id = false) {
		return false;
	}
}
if (!function_exists('the_row')) {
	function the_row() {
		return false;
	}
}
if (!function_exists('get_sub_field')) {
	function get_sub_field($selector, $format_value = true) {
		return false;
	}
}
if (!function_exists('the_sub_field')) {
	function the_sub_field($selector, $format_value = true) {
		$value = get_sub_field($selector, $format_value);
		if (is_array($value)) {
			$value = implode(', ', $value);
		}
		echo $value ? esc_html($value) : '';
	}
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

/**
 * Normaliza una cadena eliminando tildes/diacríticos para ordenamiento alfabético en español.
 */
function sna_normalize_category_sort_name($cadena)
{
	$cadena = str_replace(
		['á', 'é', 'í', 'ó', 'ú', 'ü', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ü'],
		['a', 'e', 'i', 'o', 'u', 'u', 'a', 'e', 'i', 'o', 'u', 'u'],
		(string) $cadena
	);
	return function_exists('mb_strtolower') ? mb_strtolower($cadena, 'UTF-8') : strtolower($cadena);
}

/**
 * Obtiene dinámicamente todas las categorías de entradas registradas en wp-admin,
 * ordenadas alfabéticamente. Cualquier categoría nueva creada en WordPress
 * aparece automáticamente sin modificar código.
 */
function sna_get_familias_tematicas()
{
	$cats = get_categories([
		'taxonomy'   => 'category',
		'orderby'    => 'name',
		'order'      => 'ASC',
		'hide_empty' => false,
		'number'     => 0,
	]);

	if (!is_array($cats) || empty($cats)) {
		return [];
	}

	usort($cats, function ($a, $b) {
		return strcmp(
			sna_normalize_category_sort_name($a->name),
			sna_normalize_category_sort_name($b->name)
		);
	});

	$familias = [];

	foreach ($cats as $cat) {
		$familias[$cat->slug] = [
			'label'   => $cat->name,
			'slug'    => $cat->slug,
			'term_id' => (int) $cat->term_id,
			'count'   => (int) $cat->count,
			'cats'    => [$cat->slug],
		];
	}

	return $familias;
}

function sna_get_term_ids_for_familia($familia_key)
{
	if (empty($familia_key) || $familia_key === 'todas') {
		return [];
	}

	$familias = sna_get_familias_tematicas();

	if (isset($familias[$familia_key]['term_id'])) {
		return [(int) $familias[$familia_key]['term_id']];
	}

	$term = get_category_by_slug($familia_key);
	return $term ? [(int) $term->term_id] : [];
}

/**
 * Calcula en lote el número de entradas publicadas (post_type = 'post') por categoría,
 * aplicando opcionalmente filtros de año, mes y búsqueda por palabra clave.
 */
function sna_get_all_categories_post_counts($year = 0, $monthnum = 0, $search = '')
{
	global $wpdb;

	$familias = sna_get_familias_tematicas();
	$counts   = [];

	foreach ($familias as $slug => $info) {
		$counts[$slug] = 0;
	}

	if (empty($familias)) {
		return $counts;
	}

	$filtered_post_ids = null;

	if ($year || $monthnum || $search !== '') {
		$q_args = [
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'fields'              => 'ids',
			'posts_per_page'      => -1,
		];

		if ($year) {
			$q_args['year'] = (int) $year;
		}
		if ($monthnum) {
			$q_args['monthnum'] = (int) $monthnum;
		}
		if ($search !== '') {
			$q_args['s'] = $search;
		}

		$q = new WP_Query($q_args);
		$filtered_post_ids = !empty($q->posts) ? array_map('intval', $q->posts) : [];

		if (empty($filtered_post_ids)) {
			return $counts;
		}
	}

	$where_ids = '';
	if (is_array($filtered_post_ids)) {
		$ids_sql   = implode(',', $filtered_post_ids);
		$where_ids = " AND p.ID IN ({$ids_sql}) ";
	}

	$sql = "
		SELECT t.slug, COUNT(DISTINCT p.ID) AS total
		FROM {$wpdb->term_taxonomy} tt
		INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id
		LEFT JOIN {$wpdb->term_relationships} tr ON tr.term_taxonomy_id = tt.term_taxonomy_id
		LEFT JOIN {$wpdb->posts} p ON p.ID = tr.object_id
			AND p.post_type = 'post'
			AND p.post_status = 'publish'
			{$where_ids}
		WHERE tt.taxonomy = 'category'
		GROUP BY t.slug
	";

	$rows = $wpdb->get_results($sql);

	if (is_array($rows)) {
		foreach ($rows as $row) {
			if (isset($counts[$row->slug])) {
				$counts[$row->slug] = (int) $row->total;
			}
		}
	}

	return $counts;
}

function sna_get_familia_post_count($familia_key, $year = 0, $monthnum = 0, $search = '')
{
	static $cached_default_counts = null;

	if (!$year && !$monthnum && $search === '') {
		if ($cached_default_counts === null) {
			$cached_default_counts = sna_get_all_categories_post_counts(0, 0, '');
		}
		return $cached_default_counts[$familia_key] ?? 0;
	}

	$counts = sna_get_all_categories_post_counts($year, $monthnum, $search);
	return $counts[$familia_key] ?? 0;
}

add_action('wp_ajax_get_familias_counts', 'sna_get_familias_counts');
add_action('wp_ajax_nopriv_get_familias_counts', 'sna_get_familias_counts');

function sna_get_familias_counts()
{
	$year     = isset($_POST['year']) ? (int) $_POST['year'] : 0;
	$monthnum = isset($_POST['monthnum']) ? (int) $_POST['monthnum'] : 0;
	$search   = isset($_POST['search']) ? sanitize_text_field(wp_unslash($_POST['search'])) : '';

	$counts = sna_get_all_categories_post_counts($year, $monthnum, $search);

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
	$familia_key    = isset($_POST['familia']) ? sanitize_text_field($_POST['familia']) : 'todas';
	$page           = isset($_POST['page']) ? max(0, (int) $_POST['page']) : 0;
	$year           = isset($_POST['year']) ? (int) $_POST['year'] : 0;
	$monthnum       = isset($_POST['monthnum']) ? (int) $_POST['monthnum'] : 0;
	$search         = isset($_POST['search']) ? sanitize_text_field(wp_unslash($_POST['search'])) : '';
	$posts_per_page = 6;

	$args = [
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => $posts_per_page,
		'offset'              => $page * $posts_per_page,
		'orderby'             => 'date',
		'order'               => 'DESC',
	];

	if ($familia_key !== '' && $familia_key !== 'todas') {
		$term_ids = sna_get_term_ids_for_familia($familia_key);
		if (empty($term_ids)) {
			echo '<div class="columna__12" role="status"><div id="sna-entradas-empty-msg" class="mensajeInformativo mensajeInformativo--informativo mt--16" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="sna-entradas-empty-msg">No se encontraron notas o actividades que coincidan con los filtros seleccionados.</div></div>';
			echo '<span class="muestra--ninguno" data-has-more="0"></span>';
			wp_die();
		}
		$args['category__in'] = $term_ids;
	}

	if ($year) {
		$args['year'] = $year;
	}

	if ($monthnum) {
		$args['monthnum'] = $monthnum;
	}

	if ($search !== '') {
		$args['s'] = $search;
	}

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/home/card-entrada', null, ['familia_key' => $familia_key]);
		}
		wp_reset_postdata();
	} elseif ($page === 0) {
		echo '<div class="columna__12" role="status"><div id="sna-entradas-empty-msg" class="mensajeInformativo mensajeInformativo--informativo mt--16" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="sna-entradas-empty-msg">No se encontraron notas o actividades que coincidan con los filtros seleccionados.</div></div>';
	}

	$has_more = ($query->found_posts > (($page + 1) * $posts_per_page)) ? 1 : 0;
	echo '<span class="muestra--ninguno" data-has-more="' . esc_attr($has_more) . '"></span>';

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
// META BOX PARA OPCIONES DEL SLIDER (Mostrar/Ocultar Textos y URL de Enlace)
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

// 2. Imprimir el HTML del Meta Box
function sesna_slider_meta_box_html($post)
{
	wp_nonce_field('sesna_save_slider_meta_data', 'sesna_slider_meta_nonce');

	// Obtener el valor actual. Si es un post nuevo sin guardar, asumimos "1" (mostrar)
	$show_text = get_post_meta($post->ID, '_show_text_slider', true);
	if ($show_text === '') {
		$show_text = '1';
	}
	$slider_url = get_post_meta($post->ID, '_slider_url', true);

	?>
	<p>
		<label>
			<input type="checkbox" name="_show_text_slider" value="1" <?php checked($show_text, '1'); ?> />
			Mostrar título y extracto en el carrusel
		</label>
	</p>
	<p class="description">Si desmarcas esta casilla, solo se mostrará la imagen para este slide.</p>
	<hr style="margin: 12px 0; border: 0; border-top: 1px solid #ddd;" />
	<p>
		<label for="sesna_slider_url" style="font-weight: 600; display: block; margin-bottom: 5px;">
			<?php _e('Agregar URL', 'sesna'); ?>
		</label>
		<input type="url" id="sesna_slider_url" name="_slider_url" value="<?php echo esc_url($slider_url); ?>" class="widefat" placeholder="https://..." />
	</p>
	<p class="description">Opcional. Al ingresar una URL, se habilitará el clic en este slide para redirigir al enlace.</p>
	<?php
}

// 3. Guardar el estado del Checkbox y la URL al actualizar/publicar
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

	if (isset($_POST['_slider_url'])) {
		$slider_url = esc_url_raw(trim($_POST['_slider_url']));
		if (!empty($slider_url)) {
			update_post_meta($post_id, '_slider_url', $slider_url);
		} else {
			delete_post_meta($post_id, '_slider_url');
		}
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
/**
 * SND v1 Nav Walker — genera HTML compatible con .navHeader__* del Sistema Nacional de Diseño.
 * Usa <details>/<summary> para submenús (hover en desktop vía CSS/JS, nativo en móvil).
 * URLs externas detectadas automáticamente para agregar ícono SND de enlace externo.
 */
class Sesna_Bootstrap_Nav_Walker extends Walker_Nav_Menu {

    /** URLs o slugs que son enlaces externos — reciben ícono snd-launch */
    private $external_slugs = ['pdn', 'paa', 'mercado-digital', 'mercado_digital'];

    private function is_external( $item ) {
        $home = home_url();
        $url  = $item->url;
        // Detectar por URL (fuera del dominio local) o por clases del ítem
        if ( strpos( $url, 'http' ) === 0 && strpos( $url, $home ) !== 0 ) {
            return true;
        }
        foreach ( $this->external_slugs as $slug ) {
            if ( in_array( 'menu-item-' . $slug, $item->classes ) ) return true;
        }
        return false;
    }

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= '<ul class="navHeader__submenu">';
        }
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= '</ul></details>';
        }
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $has_children = in_array( 'menu-item-has-children', $item->classes );
        $is_active    = in_array( 'current-menu-item', $item->classes ) ||
                        in_array( 'current-menu-ancestor', $item->classes );
        $is_external  = $this->is_external( $item );
        $current_attr = $is_active ? ' aria-current="page"' : '';
        $ext_icon     = $is_external ? ' <svg class="snd__icono snd-launch" data-snd-procesado="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="13" height="13" fill="currentColor" aria-hidden="true" style="font-size:0.85em;vertical-align:middle;margin-left:4px;"><path d="M26,28H6a2.0027,2.0027,0,0,1-2-2V6A2.0027,2.0027,0,0,1,6,4H16V6H6V26H26V16h2V26A2.0027,2.0027,0,0,1,26,28Z"/><path d="M20 2 20 4 26.586 4 18 12.586 19.414 14 28 5.414 28 12 30 12 30 2 20 2z"/></svg>' : '';
        $ext_attr     = $is_external ? ' target="_blank" rel="noopener noreferrer"' : '';
        $chevron_svg  = '<svg class="snd__icono snd-chevron--down navHeader__chevron" data-snd-procesado="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="12" height="12" fill="currentColor" aria-hidden="true"><path d="M16 22 6 12 7.4 10.6 16 19.2 24.6 10.6 26 12z"/></svg>';

        if ( $depth === 0 ) {
            $output .= '<li class="navHeader__li' . ( $is_active ? ' navHeader__li--active' : '' ) . '">';

            if ( $has_children ) {
                // <details> abre/cierra el submenu nativamente; hover en desktop vía CSS/JS
                $output .= '<details class="navHeader__details detailsClickOut">';
                $output .= '<summary class="navHeader__a navHeader__a--toggle"' . $current_attr . '>'
                    . esc_html( $item->title )
                    . $chevron_svg
                    . '</summary>';
                // end_lvl closes </ul></details>
            } else {
                $output .= '<a class="navHeader__a"'
                    . ' href="' . esc_url( $item->url ) . '"'
                    . $current_attr
                    . $ext_attr . '>'
                    . esc_html( $item->title )
                    . $ext_icon
                    . '</a>';
            }
        } else {
            // Nivel 1 — subitems dentro del <details>
            $is_sub_active = in_array( 'current-menu-item', $item->classes );
            $sub_current   = $is_sub_active ? ' aria-current="page"' : '';
            $output .= '<li class="navHeader__li--sub' . ( $is_sub_active ? ' navHeader__li--subActive' : '' ) . '">';
            $output .= '<a class="navHeader__a--sub"'
                . ' href="' . esc_url( $item->url ) . '"'
                . $sub_current
                . $ext_attr . '>'
                . esc_html( $item->title )
                . $ext_icon
                . '</a>';
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
 * Recorta cualquier dominio absoluto de una URL de /wp-content/uploads/,
 * dejando solo el path relativo. Es la contraparte de sesna_resolve_archivo_url():
 * esta función se usa AL GUARDAR, la otra AL LEER. Juntas garantizan que
 * nunca se congele un dominio (localhost, staging, producción) en post meta.
 */
function sesna_strip_domain_from_url($valor) {
    if (empty($valor)) {
        return '';
    }
    $idx = strpos($valor, '/wp-content/uploads/');
    if ($idx !== false) {
        return substr($valor, $idx);
    }
    return $valor;
}

/**
 * Renderiza directamente en PHP el <svg class="snd__icono ..."> oficial del SND v1.0.0
 * para íconos repetitivos en listados masivos (como las cientos de tarjetas de Órganos
 * Colegiados). Al emitir <svg data-snd-procesado="true"> en lugar de <i class="snd__icono">,
 * el bucle secuencial de snd.js no se bloquea procesando ni haciendo getComputedStyle/reflows
 * sobre más de 1,000 nodos <i> al cargar la página, y los botones fantasma ("Ver más sesiones",
 * "Consultar") aparecen renderizados desde el primer milisegundo.
 */
function sesna_render_snd_svg_icon($icon_name, $extra_classes = '', $inline_style = '') {
    static $paths = array(
        'snd-accessibility--alt'       => '<path d="M23 14 23 12 9 12 9 14 14 14 14 16.734 10.132 23.504 11.868 24.496 15.58 18 16.42 18 20.132 24.496 21.868 23.504 18 16.734 18 14 23 14z"/><circle cx="16" cy="9" r="2"/><path d="M16,30A14,14,0,1,1,30,16,14.0158,14.0158,0,0,1,16,30ZM16,4A12,12,0,1,0,28,16,12.0137,12.0137,0,0,0,16,4Z"/>',
        'snd-arrow--left'              => '<path d="M14 26 15.41 24.59 7.83 17 28 17 28 15 7.83 15 15.41 7.41 14 6 4 16 14 26z"/>',
        'snd-arrow--right'             => '<path d="M18 6 16.57 7.393 24.15 15 4 15 4 17 24.15 17 16.57 24.573 18 26 28 16 18 6z"/>',
        'snd-arrow--up'                => '<path d="M16 4 6 14 7.41 15.41 15 7.83 15 28 17 28 17 7.83 24.59 15.41 26 14 16 4z"/>',
        'snd-building'                 => '<path d="M28,2H16a2.002,2.002,0,0,0-2,2V14H4a2.002,2.002,0,0,0-2,2V30H30V4A2.0023,2.0023,0,0,0,28,2ZM9,28V21h4v7Zm19,0H15V20a1,1,0,0,0-1-1H8a1,1,0,0,0-1,1v8H4V16H16V4H28Z"/><path d="M18 8H20V10H18z"/><path d="M24 8H26V10H24z"/><path d="M18 14H20V16H18z"/><path d="M24 14H26V16H24z"/><path d="M18 20H20V22H18z"/><path d="M24 20H26V22H24z"/>',
        'snd-calculator'               => '<path d="M26,4V28H6V4H26m0-2H6A2,2,0,0,0,4,4V28a2,2,0,0,0,2,2H26a2,2,0,0,0,2-2V4A2,2,0,0,0,26,2Z"/><path d="M9 23H11V25H9z"/><path d="M21 23H23V25H21z"/><path d="M9 18H11V20H9z"/><path d="M21 18H23V20H21z"/><path d="M9 13H11V15H9z"/><path d="M15 23H17V25H15z"/><path d="M15 18H17V20H15z"/><path d="M15 13H17V15H15z"/><path d="M21 13H23V15H21z"/><path d="M9 7H23V10H9z"/>',
        'snd-calendar'                 => '<path d="M26,4h-4V2h-2v2h-8V2h-2v2H6C4.9,4,4,4.9,4,6v20c0,1.1,0.9,2,2,2h20c1.1,0,2-0.9,2-2V6C28,4.9,27.1,4,26,4z M26,26H6V12h20 V26z M26,10H6V6h4v2h2V6h8v2h2V6h4V10z"/>',
        'snd-catalog'                  => '<path d="M26,2H8A2,2,0,0,0,6,4V8H4v2H6v5H4v2H6v5H4v2H6v4a2,2,0,0,0,2,2H26a2,2,0,0,0,2-2V4A2,2,0,0,0,26,2Zm0,26H8V24h2V22H8V17h2V15H8V10h2V8H8V4H26Z"/><path d="M14 8H22V10H14z"/><path d="M14 15H22V17H14z"/><path d="M14 22H22V24H14z"/>',
        'snd-chart--bar'               => '<path d="M4,2H2V28a2,2,0,0,0,2,2H30V28H4V25H26V17H4V13H18V5H4ZM24,19v4H4V19ZM16,7v4H4V7Z"/>',
        'snd-checkmark'                => '<path d="M13 24 4 15 5.414 13.586 13 21.171 26.586 7.586 28 9 13 24z"/>',
        'snd-checkmark--filled'        => '<path d="M16,2A14,14,0,1,0,30,16,14,14,0,0,0,16,2ZM14,21.5908l-5-5L10.5906,15,14,18.4092,21.41,11l1.5957,1.5859Z"/><path fill="none" d="M14 21.591 9 16.591 10.591 15 14 18.409 21.41 11 23.005 12.585 14 21.591z" data-icon-path="inner-path"/>',
        'snd-checkmark--outline'       => '<polygon points="14 21.414 9 16.413 10.413 15 14 18.586 21.585 11 23 12.415 14 21.414"/><path d="M16,2A14,14,0,1,0,30,16,14,14,0,0,0,16,2Zm0,26A12,12,0,1,1,28,16,12,12,0,0,1,16,28Z"/>',
        'snd-chevron--down'            => '<path d="M16 22 6 12 7.4 10.6 16 19.2 24.6 10.6 26 12z"/>',
        'snd-chevron--left'            => '<path d="M10 16 20 6 21.4 7.4 12.8 16 21.4 24.6 20 26z"/>',
        'snd-chevron--right'           => '<path d="M22 16 12 26 10.6 24.6 19.2 16 10.6 7.4 12 6z"/>',
        'snd-chevron--up'              => '<path d="M16 10 26 20 24.6 21.4 16 12.8 7.4 21.4 6 20z"/>',
        'snd-close'                    => '<path d="M17.4141 16 24 9.4141 22.5859 8 16 14.5859 9.4143 8 8 9.4141 14.5859 16 8 22.5859 9.4143 24 16 17.4141 22.5859 24 24 22.5859 17.4141 16z"/>',
        'snd-collaborate'              => '<path d="M6,21V20H4v1a7,7,0,0,0,7,7h3V26H11A5,5,0,0,1,6,21Z"/><path d="M24,11v1h2V11a7,7,0,0,0-7-7H16V6h3A5,5,0,0,1,24,11Z"/><path d="M11,11H5a3,3,0,0,0-3,3v2H4V14a1,1,0,0,1,1-1h6a1,1,0,0,1,1,1v2h2V14A3,3,0,0,0,11,11Z"/><path d="M8,10A4,4,0,1,0,4,6,4,4,0,0,0,8,10ZM8,4A2,2,0,1,1,6,6,2,2,0,0,1,8,4Z"/><path d="M27,25H21a3,3,0,0,0-3,3v2h2V28a1,1,0,0,1,1-1h6a1,1,0,0,1,1,1v2h2V28A3,3,0,0,0,27,25Z"/><path d="M20,20a4,4,0,1,0,4-4A4,4,0,0,0,20,20Zm6,0a2,2,0,1,1-2-2A2,2,0,0,1,26,20Z"/>',
        'snd-document'                 => '<path d="M25.7,9.3l-7-7C18.5,2.1,18.3,2,18,2H8C6.9,2,6,2.9,6,4v24c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V10C26,9.7,25.9,9.5,25.7,9.3z M18,4.4l5.6,5.6H18V4.4z M24,28H8V4h8v6c0,1.1,0.9,2,2,2h6V28z"/><path d="M10 22H22V24H10z"/><path d="M10 16H22V18H10z"/>',
        'snd-document--import'         => '<path d="M28 19 14.83 19 17.41 16.41 16 15 11 20 16 25 17.41 23.59 14.83 21 28 21 28 19z"/><path d="M24,14V10a1,1,0,0,0-.29-.71l-7-7A1,1,0,0,0,16,2H6A2,2,0,0,0,4,4V28a2,2,0,0,0,2,2H22a2,2,0,0,0,2-2V26H22v2H6V4h8v6a2,2,0,0,0,2,2h6v2Zm-8-4V4.41L21.59,10Z"/>',
        'snd-document--pdf'            => '<path d="M30 18 30 16 24 16 24 26 26 26 26 22 29 22 29 20 26 20 26 18 30 18z"/><path d="M19,26H15V16h4a3.0033,3.0033,0,0,1,3,3v4A3.0033,3.0033,0,0,1,19,26Zm-2-2h2a1.0011,1.0011,0,0,0,1-1V19a1.0011,1.0011,0,0,0-1-1H17Z"/><path d="M11,16H6V26H8V23h3a2.0027,2.0027,0,0,0,2-2V18A2.0023,2.0023,0,0,0,11,16ZM8,21V18h3l.001,3Z"/><path d="M22,14V10a.9092.9092,0,0,0-.3-.7l-7-7A.9087.9087,0,0,0,14,2H4A2.0059,2.0059,0,0,0,2,4V28a2,2,0,0,0,2,2H20V28H4V4h8v6a2.0059,2.0059,0,0,0,2,2h6v2Zm-8-4V4.4L19.6,10Z"/>',
        'snd-document--requirements'   => '<polygon points="28.5899 20.59 22 27.1798 19.41 24.5898 18 26 22 30 30 22 28.5899 20.59"/><rect x="10" y="20" width="6" height="2"/><rect x="10" y="16" width="8" height="2"/><path d="m8,4h8v6c0,1.1001.8999,2,2,2h6v6h2v-8c0-.2998-.1001-.5-.3-.7002l-7-7c-.2-.1997-.3999-.2998-.7-.2998h-10c-1.1001,0-2,.8999-2,2v24c0,1.1001.8999,2,2,2h7v-2h-7V4Zm10,.3999l5.6001,5.6001h-5.6001v-5.6001Z"/>',
        'snd-document--view'           => '<circle cx="22" cy="24" r="2"/><path fill="none" d="M22,28a4,4,0,1,1,4-4A4.0039,4.0039,0,0,1,22,28Zm0-6a2,2,0,1,0,2,2A2.0027,2.0027,0,0,0,22,22Z"/><path d="M29.7769,23.4785A8.64,8.64,0,0,0,22,18a8.64,8.64,0,0,0-7.7769,5.4785L14,24l.2231.5215A8.64,8.64,0,0,0,22,30a8.64,8.64,0,0,0,7.7769-5.4785L30,24ZM22,28a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,22,28Z"/><path d="M12,28H8V4h8v6a2.0058,2.0058,0,0,0,2,2h6v4h2V10a.9092.9092,0,0,0-.3-.7l-7-7A.9087.9087,0,0,0,18,2H8A2.0058,2.0058,0,0,0,6,4V28a2.0058,2.0058,0,0,0,2,2h4ZM18,4.4,23.6,10H18Z"/>',
        'snd-dot-mark'                 => '<circle cx="16" cy="16" r="8"/>',
        'snd-download'                 => '<path d="M26,24v4H6V24H4v4H4a2,2,0,0,0,2,2H26a2,2,0,0,0,2-2h0V24Z"/><path d="M26 14 24.59 12.59 17 20.17 17 2 15 2 15 20.17 7.41 12.59 6 14 16 24 26 14z"/>',
        'snd-earth'                    => '<path d="M16,2A14,14,0,1,0,30,16,14.0158,14.0158,0,0,0,16,2Zm5,3.1055a12.0136,12.0136,0,0,1,2.9158,1.8994L23.5034,8H21ZM13.3784,27.7026A11.9761,11.9761,0,0,1,8.1157,6.9761L9.4648,9h3.3423l-1.5,4H7.2793L5.8967,17.1475,8.4648,21h5l1.4319,2.1475ZM16,28c-.2034,0-.4016-.02-.6025-.03l1.3967-4.19a1.9876,1.9876,0,0,0-.2334-1.7412l-1.4319-2.1475A1.9962,1.9962,0,0,0,13.4648,19h-3.93L8.1033,16.8525,8.7207,15H11v2h2V14.1812l2.9363-7.83-1.8726-.7022L13.5571,7H10.5352L9.728,5.7891A11.7941,11.7941,0,0,1,19,4.395V8a2.0025,2.0025,0,0,0,2,2h2.5857A1.9865,1.9865,0,0,0,25,9.4141l.1406-.1407.2818-.68A11.9813,11.9813,0,0,1,27.3,12H22.5986a1.9927,1.9927,0,0,0-1.9719,1.665L20.03,17.1064a1.99,1.99,0,0,0,.991,2.086l2.1647,1.4638,1.4585,3.646A11.9577,11.9577,0,0,1,16,28Zm8.8145-8.6563L22.1,17.5088l-.1-.06L22.5986,14h5.2207a11.743,11.743,0,0,1-1.7441,8.4951Z"/>',
        'snd-education'                => '<path d="M26,30H24V27a5.0059,5.0059,0,0,0-5-5H13a5.0059,5.0059,0,0,0-5,5v3H6V27a7.0082,7.0082,0,0,1,7-7h6a7.0082,7.0082,0,0,1,7,7Z"/><path d="M5,6A1,1,0,0,0,4,7v9H6V7A1,1,0,0,0,5,6Z"/><path d="M4,2V4H9v7a7,7,0,0,0,14,0V4h5V2Zm7,2H21V7H11Zm5,12a5,5,0,0,1-5-5V9H21v2A5,5,0,0,1,16,16Z"/>',
        'snd-email'                    => '<path d="M28,6H4A2,2,0,0,0,2,8V24a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V8A2,2,0,0,0,28,6ZM25.8,8,16,14.78,6.2,8ZM4,24V8.91l11.43,7.91a1,1,0,0,0,1.14,0L28,8.91V24Z"/>',
        'snd-enterprise'               => '<path d="M8 8H10V12H8z"/><path d="M8 14H10V18H8z"/><path d="M14 8H16V12H14z"/><path d="M14 14H16V18H14z"/><path d="M8 20H10V24H8z"/><path d="M14 20H16V24H14z"/><path d="M30,14a2,2,0,0,0-2-2H22V4a2,2,0,0,0-2-2H4A2,2,0,0,0,2,4V30H30ZM4,4H20V28H4ZM22,28V14h6V28Z"/>',
        'snd-events'                   => '<path d="M26,14H24v2h2a3.0033,3.0033,0,0,1,3,3v4h2V19A5.0058,5.0058,0,0,0,26,14Z"/><path d="M24,4a3,3,0,1,1-3,3,3,3,0,0,1,3-3m0-2a5,5,0,1,0,5,5A5,5,0,0,0,24,2Z"/><path d="M23,30H21V28a3.0033,3.0033,0,0,0-3-3H14a3.0033,3.0033,0,0,0-3,3v2H9V28a5.0059,5.0059,0,0,1,5-5h4a5.0059,5.0059,0,0,1,5,5Z"/><path d="M16,13a3,3,0,1,1-3,3,3,3,0,0,1,3-3m0-2a5,5,0,1,0,5,5A5,5,0,0,0,16,11Z"/><path d="M8,14H6a5.0059,5.0059,0,0,0-5,5v4H3V19a3.0033,3.0033,0,0,1,3-3H8Z"/><path d="M8,4A3,3,0,1,1,5,7,3,3,0,0,1,8,4M8,2a5,5,0,1,0,5,5A5,5,0,0,0,8,2Z"/>',
        'snd-favorite'                 => '<path d="M22.45,6a5.47,5.47,0,0,1,3.91,1.64,5.7,5.7,0,0,1,0,8L16,26.13,5.64,15.64a5.7,5.7,0,0,1,0-8,5.48,5.48,0,0,1,7.82,0L16,10.24l2.53-2.58A5.44,5.44,0,0,1,22.45,6m0-2a7.47,7.47,0,0,0-5.34,2.24L16,7.36,14.89,6.24a7.49,7.49,0,0,0-10.68,0,7.72,7.72,0,0,0,0,10.82L16,29,27.79,17.06a7.72,7.72,0,0,0,0,10.82A7.49,7.49,0,0,0,22.45,4Z"/>',
        'snd-favorite--filled'         => '<path d="M22.5,4c-2,0-3.9,0.8-5.3,2.2L16,7.4l-1.1-1.1C12,3.3,7.2,3.3,4.3,6.2c0,0-0.1,0.1-0.1,0.1c-3,3-3,7.8,0,10.8L16,29 l11.8-11.9c3-3,3-7.8,0-10.8C26.4,4.8,24.5,4,22.5,4z"/>',
        'snd-filter'                   => '<path d="M18,28H14a2,2,0,0,1-2-2V18.41L4.59,11A2,2,0,0,1,4,9.59V6A2,2,0,0,1,6,4H26a2,2,0,0,1,2,2V9.59A2,2,0,0,1,27.41,11L20,18.41V26A2,2,0,0,1,18,28ZM6,6V9.59l8,8V26h4V17.59l8-8V6Z"/>',
        'snd-finance'                  => '<path d="M2 28H30V30H2z"/><path d="M27,11a1,1,0,0,0,1-1V7a1,1,0,0,0-.66-.94l-11-4a1,1,0,0,0-.68,0l-11,4A1,1,0,0,0,4,7v3a1,1,0,0,0,1,1H6V24H4v2H28V24H26V11ZM6,7.7,16,4.06,26,7.7V9H6ZM18,24H14V11h4ZM8,11h4V24H8ZM24,24H20V11h4Z"/>',
        'snd-folder'                   => '<path d="M11.17,6l3.42,3.41.58.59H28V26H4V6h7.17m0-2H4A2,2,0,0,0,2,6V26a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V10a2,2,0,0,0-2-2H16L12.59,4.59A2,2,0,0,0,11.17,4Z"/>',
        'snd-folder--details'          => '<path d="M16 20H30V22H16z"/><path d="M16 24H30V26H16z"/><path d="M16 28H23V30H16z"/><path d="M14,26H4V6h7.17l3.42,3.41.58.59H28v8h2V10a2,2,0,0,0-2-2H16L12.59,4.59A2,2,0,0,0,11.17,4H4A2,2,0,0,0,2,6V26a2,2,0,0,0,2,2H14Z"/>',
        'snd-group'                    => '<path d="M31,30H29V27a3,3,0,0,0-3-3H22a3,3,0,0,0-3,3v3H17V27a5,5,0,0,1,5-5h4a5,5,0,0,1,5,5Z"/><path d="M24,12a3,3,0,1,1-3,3,3,3,0,0,1,3-3m0-2a5,5,0,1,0,5,5A5,5,0,0,0,24,10Z"/><path d="M15,22H13V19a3,3,0,0,0-3-3H6a3,3,0,0,0-3,3v3H1V19a5,5,0,0,1,5-5h4a5,5,0,0,1,5,5Z"/><path d="M8,4A3,3,0,1,1,5,7,3,3,0,0,1,8,4M8,2a5,5,0,1,0,5,5A5,5,0,0,0,8,2Z"/>',
        'snd-home'                     => '<path d="M16.6123,2.2138a1.01,1.01,0,0,0-1.2427,0L1,13.4194l1.2427,1.5717L4,13.6209V26a2.0041,2.0041,0,0,0,2,2H26a2.0037,2.0037,0,0,0,2-2V13.63L29.7573,15,31,13.4282ZM18,26H14V18h4Zm2,0V18a2.0023,2.0023,0,0,0-2-2H14a2.002,2.002,0,0,0-2,2v8H6V12.0615l10-7.79,10,7.8005V26Z"/>',
        'snd-image'                    => '<path d="M19,14a3,3,0,1,0-3-3A3,3,0,0,0,19,14Zm0-4a1,1,0,1,1-1,1A1,1,0,0,1,19,10Z"/><path d="M26,4H6A2,2,0,0,0,4,6V26a2,2,0,0,0,2,2H26a2,2,0,0,0,2-2V6A2,2,0,0,0,26,4Zm0,22H6V20l5-5,5.59,5.59a2,2,0,0,0,2.82,0L21,19l5,5Zm0-4.83-3.59-3.59a2,2,0,0,0-2.82,0L18,19.17l-5.59-5.59a2,2,0,0,0-2.82,0L6,17.17V6H26Z"/>',
        'snd-information'              => '<path d="M17 22 17 14 13 14 13 16 15 16 15 22 12 22 12 24 20 24 20 22 17 22z"/><path d="M16,8a1.5,1.5,0,1,0,1.5,1.5A1.5,1.5,0,0,0,16,8Z"/><path d="M16,30A14,14,0,1,1,30,16,14,14,0,0,1,16,30ZM16,4A12,12,0,1,0,28,16,12,12,0,0,0,16,4Z"/>',
        'snd-launch'                   => '<path d="M26,28H6a2.0027,2.0027,0,0,1-2-2V6A2.0027,2.0027,0,0,1,6,4H16V6H6V26H26V16h2V26A2.0027,2.0027,0,0,1,26,28Z"/><path d="M20 2 20 4 26.586 4 18 12.586 19.414 14 28 5.414 28 12 30 12 30 2 20 2z"/>',
        'snd-list'                     => '<path d="M10 6H28V8H10z"/><path d="M10 24H28V26H10z"/><path d="M10 15H28V17H10z"/><path d="M4 15H6V17H4z"/><path d="M4 6H6V8H4z"/><path d="M4 24H6V26H4z"/>',
        'snd-location'                 => '<path d="M16,18a5,5,0,1,1,5-5A5.0057,5.0057,0,0,1,16,18Zm0-8a3,3,0,1,0,3,3A3.0033,3.0033,0,0,0,16,10Z"/><path d="M16,30,7.5645,20.0513c-.0479-.0571-.3482-.4515-.3482-.4515A10.8888,10.8888,0,0,1,5,13a11,11,0,0,1,22,0,10.8844,10.8844,0,0,1-2.2148,6.5973l-.0015.0025s-.3.3944-.3447.4474ZM8.8125,18.395c.001.0007.2334.3082.2866.3744L16,26.9079l6.91-8.15c.0439-.0552.2783-.3649.2788-.3657A8.901,8.901,0,0,0,25,13,9,9,0,1,0,7,13a8.9054,8.9054,0,0,0,1.8125,5.395Z"/>',
        'snd-location--filled'         => '<path d="M16,2A11.0134,11.0134,0,0,0,5,13a10.8885,10.8885,0,0,0,2.2163,6.6s.3.3945.3482.4517L16,30l8.439-9.9526c.0444-.0533.3447-.4478.3447-.4478l.0015-.0024A10.8846,10.8846,0,0,0,27,13,11.0134,11.0134,0,0,0,16,2Zm0,15a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,16,17Z"/><circle cx="16" cy="13" r="4" fill="none"/>',
        'snd-logo--x'                  => '<path d="m18.2342,14.1624l8.7424-10.1624h-2.0717l-7.591,8.8238-6.0629-8.8238h-6.9929l9.1684,13.3432-9.1684,10.6568h2.0718l8.0163-9.3183,6.4029,9.3183h6.9929l-9.5083-13.8376h.0005Zm-2.8376,3.2984l-.9289-1.3287L7.0763,5.5596h3.1822l5.9649,8.5323.9289,1.3287,7.7536,11.0907h-3.1822l-6.3272-9.05v-.0005Z"/>',
        'snd-map'                      => '<path d="M16,24l-6.09-8.6A8.14,8.14,0,0,1,16,2a8.08,8.08,0,0,1,8,8.13,8.2,8.2,0,0,1-1.8,5.13ZM16,4a6.07,6.07,0,0,0-6,6.13,6.19,6.19,0,0,0,1.49,4L16,20.52,20.63,14A6.24,6.24,0,0,0,22,10.13,6.07,6.07,0,0,0,16,4Z"/><circle cx="16" cy="9" r="2"/><path d="M28,12H26v2h2V28H4V14H6V12H4a2,2,0,0,0-2,2V28a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V14A2,2,0,0,0,28,12Z"/>',
        'snd-notification'             => '<path d="M28.7071,19.293,26,16.5859V13a10.0136,10.0136,0,0,0-9-9.9492V1H15V3.0508A10.0136,10.0136,0,0,0,6,13v3.5859L3.2929,19.293A1,1,0,0,0,3,20v3a1,1,0,0,0,1,1h7v.7768a5.152,5.152,0,0,0,4.5,5.1987A5.0057,5.0057,0,0,0,21,25V24h7a1,1,0,0,0,1-1V20A1,1,0,0,0,28.7071,19.293ZM19,25a3,3,0,0,1-6,0V24h6Zm8-3H5V20.4141L7.707,17.707A1,1,0,0,0,8,17V13a8,8,0,0,1,16,0v4a1,1,0,0,0,.293.707L27,20.4141Z"/>',
        'snd-overflow-menu--horizontal'=> '<circle cx="8" cy="16" r="2"/><circle cx="16" cy="16" r="2"/><circle cx="24" cy="16" r="2"/>',
        'snd-phone'                    => '<path d="M26,29h-.17C6.18,27.87,3.39,11.29,3,6.23A3,3,0,0,1,5.76,3h5.51a2,2,0,0,1,1.86,1.26L14.65,8a2,2,0,0,1-.44,2.16l-2.13,2.15a9.37,9.37,0,0,0,7.58,7.6l2.17-2.15A2,2,0,0,1,24,17.35l3.77,1.51A2,2,0,0,1,29,20.72V26A3,3,0,0,1,26,29ZM6,5A1,1,0,0,0,5,6v.08C5.46,12,8.41,26,25.94,27A1,1,0,0,0,27,26.06V20.72l-3.77-1.51-2.87,2.85L19.88,22C11.18,20.91,10,12.21,10,12.12l-.06-.48,2.84-2.87L11.28,5Z"/>',
        'snd-play'                     => '<path d="M7,28a1,1,0,0,1-1-1V5a1,1,0,0,1,1.4819-.8763l20,11a1,1,0,0,1,0,1.7525l-20,11A1.0005,1.0005,0,0,1,7,28ZM8,6.6909V25.3088L24.9248,16Z"/>',
        'snd-play--outline'            => '<path d="M11,23a1,1,0,0,1-1-1V10a1,1,0,0,1,1.4473-.8945l12,6a1,1,0,0,1,0,1.789l-12,6A1.001,1.001,0,0,1,11,23Zm1-11.3821v8.7642L20.7642,16Z"/><path d="M16,4A12,12,0,1,1,4,16,12,12,0,0,1,16,4m0-2A14,14,0,1,0,30,16,14,14,0,0,0,16,2Z"/>',
        'snd-portfolio'                => '<path d="M28,10H22V6a2,2,0,0,0-2-2H12a2,2,0,0,0-2,2v4H4a2,2,0,0,0-2,2V26a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V12A2,2,0,0,0,28,10ZM12,6h8v4H12ZM4,26V12H28V26Z"/>',
        'snd-recently-viewed'          => '<path d="M20.59 22 15 16.41 15 7 17 7 17 15.58 22 20.59 20.59 22z"/><path d="M16,2A13.94,13.94,0,0,0,6,6.23V2H4v8h8V8H7.08A12,12,0,1,1,4,16H2A14,14,0,1,0,16,2Z"/>',
        'snd-renew'                    => '<path d="M12,10H6.78A11,11,0,0,1,27,16h2A13,13,0,0,0,6,7.68V4H4v8h8Z"/><path d="M20,22h5.22A11,11,0,0,1,5,16H3a13,13,0,0,0,23,8.32V28h2V20H20Z"/>',
        'snd-scales'                   => '<path d="M20,16a5,5,0,0,0,10,0,1,1,0,0,0-.1055-.4473L25.896,7.5562a.8913.8913,0,0,0-.0454-.0816A1,1,0,0,0,25,7H18.8218A3.0155,3.0155,0,0,0,17,5.1841V2H15V5.1841A3.0155,3.0155,0,0,0,13.1782,7H7a1,1,0,0,0-.8945.5527l-4,8A1,1,0,0,0,2,16a5,5,0,0,0,10,0,1,1,0,0,0-.1055-.4473L8.6182,9h4.56A3.0147,3.0147,0,0,0,15,10.8154V28H6v2H26V28H17V10.8159A3.0155,3.0155,0,0,0,18.8218,9h4.56l-3.2763,6.5527A1,1,0,0,0,20,16ZM7,19a2.9958,2.9958,0,0,1-2.8152-2h5.63A2.9956,2.9956,0,0,1,7,19Zm2.3821-4H4.6179L7,10.2363ZM16,9a1,1,0,1,1,1-1A1.0009,1.0009,0,0,1,16,9Zm9,10a2.9958,2.9958,0,0,1-2.8152-2h5.63A2.9956,2.9956,0,0,1,25,19Zm0-8.7637L27.3821,15H22.6179Z"/>',
        'snd-screen'                   => '<path d="M28,4H4A2,2,0,0,0,2,6V22a2,2,0,0,0,2,2h8v4H8v2H24V28H20V24h8a2,2,0,0,0,2-2V6A2,2,0,0,0,28,4ZM18,28H14V24h4Zm10-6H4V6H28Z"/>',
        'snd-search'                   => '<path d="M29,27.5859l-7.5521-7.5521a11.0177,11.0177,0,1,0-1.4141,1.4141L27.5859,29ZM4,13a9,9,0,1,1,9,9A9.01,9.01,0,0,1,4,13Z"/>',
        'snd-security'                 => '<path d="M14 16.59 11.41 14 10 15.41 14 19.41 22 11.41 20.59 10 14 16.59z"/><path d="M16,30,9.8242,26.7071A10.9818,10.9818,0,0,1,4,17V4A2.0021,2.0021,0,0,1,6,2H26a2.0021,2.0021,0,0,1,2,2V17a10.9818,10.9818,0,0,1-5.8242,9.7071ZM6,4V17a8.9852,8.9852,0,0,0,4.7656,7.9423L16,27.7333l5.2344-2.791A8.9852,8.9852,0,0,0,26,17V4Z"/>',
        'snd-select--window'           => '<path d="M8,26H4a2.0021,2.0021,0,0,1-2-2V20H4v4H8Z"/><path d="M2 12H4V16H2z"/><path d="M26,8H24V4H20V2h4a2.0021,2.0021,0,0,1,2,2Z"/><path d="M12 2H16V4H12z"/><path d="M4,8H2V4A2.0021,2.0021,0,0,1,4,2H8V4H4Z"/><path d="M27,32a.9967.9967,0,0,1-.707-.293l-6.1377-6.1377L16.832,30.5547a1,1,0,0,1-1.79-.2676l-6-20A1,1,0,0,1,10.2871,9.042l20,6a1,1,0,0,1,.2676,1.79l-4.9854,3.3233L31.707,26.293a.9994.9994,0,0,1,0,1.414l-4,4A.9967.9967,0,0,1,27,32Zm0-2.4141L29.5859,27,22.431,19.845l5.2458-3.4978L11.4917,11.4917l4.8555,16.1851L19.845,22.431Z"/>',
        'snd-settings'                 => '<path d="M27,16.76c0-.25,0-.5,0-.76s0-.51,0-.77l1.92-1.68A2,2,0,0,0,29.3,11L26.94,7a2,2,0,0,0-1.73-1,2,2,0,0,0-.64.1l-2.43.82a11.35,11.35,0,0,0-1.31-.75l-.51-2.52a2,2,0,0,0-2-1.61H13.64a2,2,0,0,0-2,1.61l-.51,2.52a11.48,11.48,0,0,0-1.32.75L7.43,6.06A2,2,0,0,0,6.79,6,2,2,0,0,0,5.06,7L2.7,11a2,2,0,0,0,.41,2.51L5,15.24c0,.25,0,.5,0,.76s0,.51,0,.77L3.11,18.45A2,2,0,0,0,2.7,21L5.06,25a2,2,0,0,0,1.73,1,2,2,0,0,0,.64-.1l2.43-.82a11.35,11.35,0,0,0,1.31.75l.51,2.52a2,2,0,0,0,2,1.61h4.72a2,2,0,0,0,2-1.61l.51-2.52a11.48,11.48,0,0,0,1.32-.75l2.42.82a2,2,0,0,0,.64.1,2,2,0,0,0,1.73-1L29.3,21a2,2,0,0,0-.41-2.51ZM25.21,24l-3.43-1.16a8.86,8.86,0,0,1-2.71,1.57L18.36,28H13.64l-.71-3.55a9.36,9.36,0,0,1-2.7-1.57L6.79,24,4.43,20l2.72-2.4a8.9,8.9,0,0,1,0-3.13L4.43,12,6.79,8l3.43,1.16a8.86,8.86,0,0,1,2.71-1.57L13.64,4h4.72l.71,3.55a9.36,9.36,0,0,1,2.7,1.57L25.21,8,27.57,12l-2.72,2.4a8.9,8.9,0,0,1,0,3.13L27.57,20Z"/><path d="M16,22a6,6,0,1,1,6-6A5.94,5.94,0,0,1,16,22Zm0-10a3.91,3.91,0,0,0-4,4,3.91,3.91,0,0,0,4,4,3.91,3.91,0,0,0,4-4A3.91,3.91,0,0,0,16,12Z"/>',
        'snd-shopping--cart'           => '<circle cx="10" cy="28" r="2"/><circle cx="24" cy="28" r="2"/><path d="M28,7H5.82L5,2.8A1,1,0,0,0,4,2H0V4H3.18L7,23.2A1,1,0,0,0,8,24H26V22H8.82L8,18H26a1,1,0,0,0,1-.78l2-9A1,1,0,0,0,28,7Zm-2.8,9H7.62L6.22,9H26.75Z"/>',
        'snd-star'                     => '<path d="M16,6.52l2.76,5.58.46,1,1,.15,6.16.89L22,18.44l-.75.73.18,1,1.05,6.13-5.51-2.89L16,23l-.93.49L9.56,26.34l1-6.13.18-1L10,18.44,5.58,14.09l6.16-.89,1-.15.46-1L16,6.52M16,2l-4.55,9.22L1.28,12.69l7.36,7.18L6.9,30,16,25.22,25.1,30,23.36,19.87l7.36-7.17L20.55,11.22Z"/>',
        'snd-tag'                      => '<path d="M10,14a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,10,14Zm0-6a2,2,0,1,0,1.998,2.0044A2.002,2.002,0,0,0,10,8Z"/><path d="M16.6436,29.4145,2.5858,15.3555A2,2,0,0,1,2,13.9414V4A2,2,0,0,1,4,2h9.9413a2,2,0,0,1,1.4142.5858L29.4144,16.6436a2.0005,2.0005,0,0,1,0,2.8285l-9.9424,9.9425a2.0008,2.0008,0,0,1-2.8285,0ZM4,4v9.9417L18.0578,28,28,18.0579,13.9416,4Z"/>',
        'snd-timer'                    => '<path d="M15 11H17V20H15z"/><path d="M13 2H19V4H13z"/><path d="M28,9,26.58,7.59,24.33,9.84a10.94,10.94,0,1,0,1.18,1.65ZM16,26a9,9,0,1,1,9-9A9,9,0,0,1,16,26Z"/>',
        'snd-user'                     => '<path d="M16,4a5,5,0,1,1-5,5,5,5,0,0,1,5-5m0-2a7,7,0,1,0,7,7A7,7,0,0,0,16,2Z"/><path d="M26,30H24V25a5,5,0,0,0-5-5H13a5,5,0,0,0-5,5v5H6V25a7,7,0,0,1,7-7h6a7,7,0,0,1,7,7Z"/>',
        'snd-user--settings'           => '<path d="M30,10V8H27.8989a4.9678,4.9678,0,0,0-.7319-1.7529l1.49-1.49-1.414-1.414-1.49,1.49A4.9678,4.9678,0,0,0,24,4.1011V2H22V4.1011a4.9678,4.9678,0,0,0-1.7529.7319l-1.49-1.49-1.414,1.414,1.49,1.49A4.9678,4.9678,0,0,0,18.1011,8H16v2h2.1011a4.9678,4.9678,0,0,0,.7319,1.7529l-1.49,1.49,1.414,1.414,1.49-1.49A4.9678,4.9678,0,0,0,22,13.8989V16h2V13.8989a4.9678,4.9678,0,0,0,1.7529-.7319l1.49,1.49,1.414-1.414-1.49-1.49A4.9678,4.9678,0,0,0,27.8989,10Zm-7,2a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,23,12Z"/><path d="M16,30H14V25a3.0033,3.0033,0,0,0-3-3H7a3.0033,3.0033,0,0,0-3,3v5H2V25a5.0059,5.0059,0,0,1,5-5h4a5.0059,5.0059,0,0,1,5,5Z"/><path d="M9,10a3,3,0,1,1-3,3,3,3,0,0,1,3-3M9,8a5,5,0,1,0,5,5A5,5,0,0,0,9,8Z"/>',
        'snd-warning'                  => '<path d="M16,2A14,14,0,1,0,30,16,14,14,0,0,0,16,2Zm0,26A12,12,0,1,1,28,16,12,12,0,0,1,16,28Z"/><path d="M15 8H17V19H15z"/><path d="M16,22a1.5,1.5,0,1,0,1.5,1.5A1.5,1.5,0,0,0,16,22Z"/>',
        'snd-warning--alt'             => '<path d="M16,23a1.5,1.5,0,1,0,1.5,1.5A1.5,1.5,0,0,0,16,23Z"/><rect x="15" y="12" width="2" height="9"/><path d="M29,30H3a1,1,0,0,1-.8872-1.4614l13-25a1,1,0,0,1,1.7744,0l13,25A1,1,0,0,1,29,30ZM4.6507,28H27.3493l.002-.0033L16.002,6.1714h-.004L4.6487,27.9967Z"/>',
    );

    $classes = trim('snd__icono ' . $icon_name . ' ' . $extra_classes);
    $style_attr = $inline_style !== '' ? ' style="' . esc_attr($inline_style) . '"' : '';
    if (isset($paths[$icon_name])) {
        return '<svg class="' . esc_attr($classes) . '" data-snd-procesado="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true"' . $style_attr . '>' . $paths[$icon_name] . '</svg>';
    }
    return '<i class="' . esc_attr($classes) . '" aria-hidden="true"' . $style_attr . '></i>';
}

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
        </div>

    </div>
    <?php
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

// Agrega clases al body según el template activo (para páginas PNA con slug-matching)
add_filter('body_class', function($classes) {
    $template = basename(get_page_template());
    $map = array(
        'page-politica-nacional-anticorrupcion.php'  => array('page-politica-nacional-anticorrupcion'),
        'page-diseno-pna.php'                        => array('page-pna-diseno'),
        'page-presupuestacion.php'                   => array('page-pna-presupuestacion'),
        'page-programa-implemetancion-pna.php'       => array('page-pna', 'page-pna-implementacion'),
        'page-seguimiento-evaluacion.php'            => array('page-pna', 'page-pna-seguimiento'),
        'page-indicadores-nacionales.php'            => array('page-pna', 'page-pna-seguimiento', 'page-indicadores-nacionales', 'page-indicador-detalle'),
        'page-indicador-coordinacion.php'            => array('page-pna', 'page-pna-seguimiento', 'page-indicadores-nacionales', 'page-indicador-detalle'),
    );
    if (isset($map[$template])) {
        $classes = array_merge($classes, $map[$template]);
    }
    return $classes;
});

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

// =========================================================================
// DESCARGA MASIVA EN ZIP (botón "Descargar todo" — columnas de documentos)
// =========================================================================
function sesna_descargar_zip_documentos() {
    $urls     = isset($_POST['files']) ? (array) wp_unslash($_POST['files']) : array();
    $zip_name = isset($_POST['zip_name']) ? sanitize_file_name(wp_unslash($_POST['zip_name'])) : 'documentos';

    if (empty($urls) || ! class_exists('ZipArchive')) {
        wp_die('No se pudo generar el archivo ZIP.', '', array('response' => 400));
    }

    $upload_dir = wp_upload_dir();
    $base_url   = $upload_dir['baseurl'];
    $base_path  = $upload_dir['basedir'];

    $tmp_zip = tempnam(sys_get_temp_dir(), 'sesna_zip_');
    $zip = new ZipArchive();
    if ($zip->open($tmp_zip, ZipArchive::OVERWRITE) !== true) {
        wp_die('No se pudo generar el archivo ZIP.', '', array('response' => 500));
    }

    $added = 0;
    $usados = array();
    foreach ($urls as $url) {
        $url = esc_url_raw($url);
        if (strpos($url, $base_url) !== 0) {
            continue; // solo archivos dentro de wp-content/uploads de este sitio
        }
        $relative = rawurldecode(ltrim(substr($url, strlen($base_url)), '/'));
        $relative = str_replace('..', '', $relative); // evita path traversal
        $file_path = $base_path . '/' . $relative;
        if (is_file($file_path)) {
            $nombre = basename($file_path);
            // Evita colisiones de nombre dentro del ZIP
            if (isset($usados[$nombre])) {
                $usados[$nombre]++;
                $info = pathinfo($nombre);
                $nombre = $info['filename'] . '-' . $usados[$nombre] . '.' . $info['extension'];
            } else {
                $usados[$nombre] = 0;
            }
            $zip->addFile($file_path, $nombre);
            $added++;
        }
    }
    $zip->close();

    if ($added === 0) {
        @unlink($tmp_zip);
        wp_die('No se encontraron archivos válidos para descargar.', '', array('response' => 404));
    }

    nocache_headers();
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . $zip_name . '.zip"');
    header('Content-Length: ' . filesize($tmp_zip));
    readfile($tmp_zip);
    @unlink($tmp_zip);
    exit;
}
add_action('wp_ajax_sesna_descargar_zip', 'sesna_descargar_zip_documentos');
add_action('wp_ajax_nopriv_sesna_descargar_zip', 'sesna_descargar_zip_documentos');

/**
 * ID del Google Sheet (con varias pestañas) que el equipo mantiene con los datos
 * del Anexo Transversal Anticorrupción (ATA) para la página de Presupuestación.
 */
define('SESNA_ATA_SHEET_ID', '1ThHOo2EQfDgqxODx-2GkrJsvbXz-hQIn');

/**
 * Descarga y parsea como CSV una pestaña (gid) del Google Sheet público del ATA,
 * con caché por transient. Devuelve un array de filas (incluye la fila de
 * encabezados) o false si falla.
 */
function sesna_obtener_csv_google_sheet($gid, $cache_key, $cache_duration = HOUR_IN_SECONDS) {
    $cached = get_transient($cache_key);
    if (false !== $cached) {
        return $cached;
    }

    $url = sprintf(
        'https://docs.google.com/spreadsheets/d/%s/export?format=csv&gid=%s',
        SESNA_ATA_SHEET_ID,
        rawurlencode($gid)
    );
    $response = wp_remote_get($url, array('timeout' => 10));

    if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {
        return false;
    }

    $body = wp_remote_retrieve_body($response);
    if (empty($body)) {
        return false;
    }

    $lineas = array_filter(array_map('trim', explode("\n", $body)), 'strlen');
    $filas  = array();
    foreach ($lineas as $linea) {
        $filas[] = str_getcsv($linea);
    }

    if (count($filas) < 2) {
        return false;
    }

    set_transient($cache_key, $filas, $cache_duration);

    return $filas;
}

/**
 * Convierte un monto con formato "$3.315,74" (miles con punto, decimales con
 * coma) a float. Regresa null si no es un número válido.
 */
function sesna_parsear_monto_mx($texto) {
    $num = preg_replace('/[^0-9,.-]/', '', trim($texto));
    $num = str_replace('.', '', $num);
    $num = str_replace(',', '.', $num);
    return is_numeric($num) ? (float) $num : null;
}

/**
 * Convierte un porcentaje con formato "82,76%" a float (82.76). Regresa null
 * si no es un número válido.
 */
function sesna_parsear_porcentaje_mx($texto) {
    $num = str_replace('%', '', trim($texto));
    $num = str_replace(',', '.', $num);
    return is_numeric($num) ? (float) $num : null;
}

/**
 * Datos de "Evolución presupuestal" (pestaña "Año,Monto"). Si la hoja no está
 * disponible, regresa los últimos valores conocidos como respaldo.
 */
function sesna_obtener_datos_presupuesto_ata() {
    $filas = sesna_obtener_csv_google_sheet('1894395896', 'sesna_ata_presupuesto_csv');

    $respaldo = array(
        'anios'  => array('2021', '2022', '2023', '2024', '2025', '2026'),
        'montos' => array(3315.74, 3532.04, 6711.38, 9109.09, 7939.30, 9599.12),
    );

    if (false === $filas) {
        return $respaldo;
    }

    array_shift($filas); // encabezado: Año,Monto en millones de pesos

    $anios  = array();
    $montos = array();
    foreach ($filas as $fila) {
        if (count($fila) < 2) {
            continue;
        }
        $anio  = trim($fila[0]);
        $monto = sesna_parsear_monto_mx($fila[1]);

        if ('' === $anio || null === $monto) {
            continue;
        }

        $anios[]  = $anio;
        $montos[] = $monto;
    }

    return empty($anios) ? $respaldo : array('anios' => $anios, 'montos' => $montos);
}

/**
 * Datos de "Instituciones participantes por año" (pestaña con matriz
 * Institución x Año, valor "Participó" o vacío). Regresa la lista de
 * instituciones por año y el total por año. Si la hoja no está disponible,
 * regresa los últimos valores conocidos como respaldo.
 */
function sesna_obtener_datos_instituciones_ata() {
    $filas = sesna_obtener_csv_google_sheet('792763780', 'sesna_ata_instituciones_csv');

    $respaldo = array(
        'por_anio' => array(
            '2021' => array('CJF','SFP','FEMCC','SESNA','TFJA','INAI','SHCP-CNBV','SHCP-SAT','SHCP'),
            '2022' => array('CJF','SFP','FEMCC','SESNA','TFJA','INAI','SHCP-CNBV','SHCP-SAT','SHCP'),
            '2023' => array('CJF','SFP','FEMCC','SESNA','TFJA','INAI','ASF','SHCP-CNBV','SHCP-SAT','SHCP','SEP','Bienestar','CONAMER','CONACYT','SRE','INMUJERES','AGN'),
            '2024' => array('CJF','SFP','FEMCC','SESNA','TFJA','ASF','SHCP-CNBV','SHCP-SAT','SHCP','SEP','Bienestar','SRE','INMUJERES','AGN','SE','COFECE'),
            '2025' => array('CJF','SFP','FEMCC','SESNA','TFJA','ASF','SHCP-CNBV','SHCP-SAT','SHCP','SEP','Bienestar','SRE','INMUJERES','AGN','SE','COFECE'),
            '2026' => array('SFP','FEMCC','SESNA','TFJA','ASF','SHCP-CNBV','SHCP-SAT','SHCP','INMUJERES','SE','TDJ','SECIHTI','Cultura','Defensa Nacional','SEDATU','FGR','SEGOB','SCT','ISSSTE','IMSS','INPI','Marina','Medio Ambiente','Órgano de Administración Judicial','Salud','IMSS Bienestar','STPS','Tribunales Agrarios','SECTUR'),
        ),
        'totales' => array('2021' => 9, '2022' => 9, '2023' => 17, '2024' => 17, '2025' => 17, '2026' => 29),
    );

    if (false === $filas) {
        return $respaldo;
    }

    $encabezado = array_shift($filas); // Institución,2021,2022,...
    $anios      = array_slice($encabezado, 1);

    $por_anio = array_fill_keys($anios, array());
    foreach ($filas as $fila) {
        if (empty($fila[0])) {
            continue;
        }
        $institucion = trim($fila[0]);
        foreach ($anios as $i => $anio) {
            $valor = isset($fila[$i + 1]) ? trim($fila[$i + 1]) : '';
            if ('' !== $valor) {
                $por_anio[$anio][] = $institucion;
            }
        }
    }

    $totales = array();
    foreach ($por_anio as $anio => $lista) {
        $totales[$anio] = count($lista);
    }

    return empty($por_anio) ? $respaldo : array('por_anio' => $por_anio, 'totales' => $totales);
}

/**
 * Datos de "Alineación porcentual por Capítulo de Clasificación del Gasto"
 * (pestaña con filas 1000-6000 y columnas de años, valores en %). Si la hoja
 * no está disponible, regresa los últimos valores conocidos como respaldo.
 */
function sesna_obtener_datos_capitulos_ata() {
    $filas = sesna_obtener_csv_google_sheet('1416393738', 'sesna_ata_capitulos_csv');

    $respaldo = array(
        'anios'  => array('2021', '2022', '2023', '2024', '2025', '2026'),
        'datos'  => array(
            '1000' => array(82.76, 85.14, 85.15, 87.74, 89.29, 89.14),
            '2000' => array(0.72, 0.50, 0.56, 0.52, 0.65, 0.88),
            '3000' => array(16.30, 14.15, 13.55, 11.42, 9.79, 9.68),
            '4000' => array(0.18, 0.18, 0.67, 0.27, 0.21, 0.28),
            '5000' => array(0.04, 0.03, 0.03, 0.02, 0.03, 0.02),
            '6000' => array(0.00, 0.00, 0.04, 0.03, 0.04, 0.00),
        ),
    );

    if (false === $filas) {
        return $respaldo;
    }

    $encabezado = array_shift($filas); // Capítulo/Año ,2021,2022,...
    $anios      = array_slice($encabezado, 1);

    $datos = array();
    foreach ($filas as $fila) {
        if (empty($fila[0])) {
            continue;
        }
        $capitulo  = trim($fila[0]);
        $valores   = array();
        foreach ($anios as $i => $anio) {
            $pct = isset($fila[$i + 1]) ? sesna_parsear_porcentaje_mx($fila[$i + 1]) : null;
            $valores[] = null !== $pct ? $pct : 0;
        }
        $datos[$capitulo] = $valores;
    }

    return empty($datos) ? $respaldo : array('anios' => $anios, 'datos' => $datos);
}

/**
 * Datos de "Monto de presupuesto asignado por Eje-Objetivo" (pestaña con filas
 * Eje 1-4 y columnas de años, valores en pesos). Si la hoja no está disponible,
 * regresa los últimos valores conocidos como respaldo.
 */
function sesna_obtener_datos_ejes_ata() {
    $filas = sesna_obtener_csv_google_sheet('694836072', 'sesna_ata_ejes_csv');

    $respaldo = array(
        'anios' => array('2021', '2022', '2023', '2024', '2025'),
        'datos' => array(
            'Eje 1' => array(2483.70, 2659.53, 1939.50, 2276.25, 1918.83),
            'Eje 2' => array(693.49, 737.84, 4498.88, 5015.50, 4410.60),
            'Eje 3' => array(56.67, 47.57, 185.29, 684.09, 476.32),
            'Eje 4' => array(81.88, 87.10, 87.70, 1133.25, 1133.54),
        ),
    );

    if (false === $filas) {
        return $respaldo;
    }

    $encabezado = array_shift($filas); // Eje/Año,2021,2022,...
    $anios      = array_slice($encabezado, 1);

    $datos = array();
    foreach ($filas as $fila) {
        if (empty($fila[0])) {
            continue;
        }
        $eje     = trim($fila[0]);
        $valores = array();
        foreach ($anios as $i => $anio) {
            $monto     = isset($fila[$i + 1]) ? sesna_parsear_monto_mx($fila[$i + 1]) : null;
            $valores[] = null !== $monto ? $monto : 0;
        }
        $datos[$eje] = $valores;
    }

    return empty($datos) ? $respaldo : array('anios' => $anios, 'datos' => $datos);
}
