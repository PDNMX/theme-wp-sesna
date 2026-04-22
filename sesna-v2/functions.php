<?php

if (!function_exists('sesna_theme_setup')) :

	function sesna_theme_setup()
	{

		load_theme_textdomain('sesna', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');

		add_theme_support('post-thumbnails');


		// This theme uses wp_nav_menu() in two locations.
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


		add_image_size('thumb-medium', 350, 208, true); // width, height, 
		add_image_size('featured-large', 635, 334, true); // width, height, 
		add_image_size('featured-small', 303, 270, true);
	}
endif;
add_action('after_setup_theme', 'sesna_theme_setup');



function twentynineteen_widgets_init()
{

	register_sidebar(
		array(
			'name'          => __('Blog sidebar', 'sesna'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your blog.', 'sesna'),
			'before_widget' => '<div class="filterContainer">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'twentynineteen_widgets_init');




/**
 * Enqueue scripts and styles.
 */

function sesna_theme_scripts()
{


	//wp_enqueue_style( 'sesna-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/bootstrap-4.3.1-dist/css/bootstrap.min.css', array(), wp_get_theme()->get('Version'));
	wp_enqueue_style('datepicker-style', 'https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css', array(), '1.9.11');
	wp_enqueue_style('fontawesome-style', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(), '5.7.2');


	wp_enqueue_style('sesna-custom-style', get_template_directory_uri() . '/css/custom.css', array(), wp_get_theme()->get('Version'));
	wp_enqueue_style('sesna-header-style', get_template_directory_uri() . '/css/header.css', array(), wp_get_theme()->get('Version'));

        if (is_page('seguimiento-evaluacion')) {
		wp_enqueue_style('sesna-pna-style', get_template_directory_uri() . '/css/pna.css', array(), wp_get_theme()->get('Version'));
	}


       if (is_page('seguimiento-evaluacion2')) {
                wp_enqueue_style('sesna-pna-style', get_template_directory_uri() . '/css/pna.css', array(), wp_get_theme()->get('Version'));
        }


	if (is_front_page()) {
		wp_enqueue_style('sesna-index-style', get_template_directory_uri() . '/css/index.css', array(), wp_get_theme()->get('Version'));
	}

	if (is_home() || is_single() || is_archive() || is_search()) {
		wp_enqueue_style('sesna-blog-style', get_template_directory_uri() . '/css/blog.css', array(), wp_get_theme()->get('Version'));
	}


	// if ( has_nav_menu( 'menu-1' ) ) {
	// 	wp_enqueue_script( 'twentynineteen-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.1', true );
	// 	wp_enqueue_script( 'twentynineteen-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '1.1', true );
	// }




	wp_enqueue_script('popper-script', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), '1.14.7', true);
	wp_enqueue_script('bootstrap-script', get_theme_file_uri('/bootstrap-4.3.1-dist/js/bootstrap.min.js'), array('popper-script'), '4.3.1', true);

	wp_enqueue_script('gijgo-script', 'https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js', array('jquery'), '1.9.11', true);

	wp_localize_script('popper-script', 'ajax_object', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'loading_url' => get_bloginfo('stylesheet_directory') . '/img/loading.gif'
	));

	wp_enqueue_script( 'header-script', get_theme_file_uri( '/script/header.js' ), array('jquery'), wp_get_theme()->get( 'Version' ), true );

	if (is_page('como-vamos')) {

		wp_enqueue_style('sesna-como-style', get_template_directory_uri() . '/css/sesiones.css', array(), wp_get_theme()->get('Version'));


		wp_enqueue_script('sesiones-script', get_theme_file_uri('/script/sesiones.js'), array('jquery', 'bootstrap-script', 'gijgo-script'), wp_get_theme()->get('Version'), true);
	}

	if (is_page('que-hacemos')) {

		wp_enqueue_style('sesna-quehacemos-style', get_template_directory_uri() . '/css/quehacemos.css', array(), wp_get_theme()->get('Version'));


		wp_enqueue_script('quehacemos-script', get_theme_file_uri('/script/quehacemos.js'), array('jquery', 'bootstrap-script'), wp_get_theme()->get('Version'), true);
	}
	if (is_page('politica-nacional-anticorrupcion')) {

		wp_enqueue_style('sesna-pna-style', get_template_directory_uri() . '/css/pna.css', array(), wp_get_theme()->get('Version'));

		wp_enqueue_script('d3-script', 'https://d3js.org/d3.v4.min.js', array('jquery'), 'v4', true);
		wp_enqueue_script('pna-script', get_theme_file_uri('/script/pna.js'), array('jquery', 'bootstrap-script'), wp_get_theme()->get('Version'), true);
	}
	if (is_page('programa-implemetancion-pna')) {

		wp_enqueue_style('sesna-pna-style', get_template_directory_uri() . '/css/pna.css', array(), wp_get_theme()->get('Version'));

		/*wp_enqueue_script('d3-script', 'https://d3js.org/d3.v4.min.js', array('jquery'), 'v4', true);
		wp_enqueue_script('pna-script', get_theme_file_uri('/script/pna.js'), array('jquery', 'bootstrap-script'), wp_get_theme()->get('Version'), true);*/
	}


	/* temp PNA-Nueva 
	if (is_page('pna2')) {

		wp_enqueue_style('sesna-pna-style', get_template_directory_uri() . '/css/pna.css', array(), wp_get_theme()->get('Version'));
		wp_enqueue_script('d3-script', 'https://d3js.org/d3.v4.min.js', array('jquery'), 'v4', true);
		wp_enqueue_script('pna-script', get_theme_file_uri('/script/pna.js'), array('jquery', 'bootstrap-script'), wp_get_theme()->get('Version'), true);
	}
	 temp PNA-Nueva */ 


	if (is_page('informacion') ||  is_home() || is_archive()  || is_search()) {

		wp_enqueue_script('home-script', get_theme_file_uri('/script/home.js'), array('jquery'), wp_get_theme()->get('Version'), true);
		wp_enqueue_script('blog-script', get_theme_file_uri('/script/blog.js'), array('jquery', 'bootstrap-script', 'gijgo-script'), wp_get_theme()->get('Version'), true);
	}


	if (
		is_page_template('template-preguntas-frecuentes.php')
		|| is_page_template('template-transparencia-comite.php')
		|| is_page_template('template-transparencia-normatividad.php')
		|| is_page_template('template-transparencia-unidad.php')
		|| is_page_template('template-transparencia-solicitudes.php')
		|| is_page_template('template-transparencia-portales.php')
		|| is_page_template('template-transparencia-archivos.php')
		|| is_page_template('template-transparencia-datospersonales.php')
		|| is_page_template('template-transparencia-denunciasincumplimiento.php')
                || is_page('recursos-humanos')

	) {

		wp_enqueue_style('sesna-transparencia-style', get_template_directory_uri() . '/css/transparencia.css', array(), wp_get_theme()->get('Version'));
	}


	if (is_page_template('template-conocenos.php')) {

		wp_enqueue_style('sesna-conocenos-style', get_template_directory_uri() . '/css/conocenos.css', array(), wp_get_theme()->get('Version'));
	}





	//wp_enqueue_style( 'twentynineteen-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

}
add_action('wp_enqueue_scripts', 'sesna_theme_scripts');


if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue()
{
	wp_deregister_script('jquery');
	wp_register_script('jquery', "https://code.jquery.com/jquery-3.3.1.min.js", false, null);
	wp_enqueue_script('jquery');
}


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

	if (in_array($args->menu->slug, ['header-1', 'header-2', 'transparencia',])) {
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

	if (has_post_thumbnail()) {
		return get_the_post_thumbnail_url(get_the_ID(), $size);
	} else if (get_post_format() === 'video') {
		return get_bloginfo('stylesheet_directory') . '/img/blog/PIC-Multimedia.jpg';
	} else {
		return get_bloginfo('stylesheet_directory') . '/img/blog/PIC-Texto.jpg';
	}
}

add_action('pre_get_posts', 'ad_filter_categories');
function ad_filter_categories($query)
{
	if ($query->is_main_query() && is_home() && isset($_GET['categoria']) && !empty($_GET['categoria'])) {


		$query->set('category_name',  $_GET['categoria']);
	}
}


add_action('wp_ajax_get_sesiones', 'get_sesiones');
add_action('wp_ajax_nopriv_get_sesiones', 'get_sesiones');

function get_sesiones()
{
	//global $wpdb; // this is how you get access to the database

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
				'terms' => $type
			)
		),
		'date_query' => array()

	];

	if (isset($_POST['start_date']) && !empty($_POST['start_date'])) {
		$start_date = explode('/', $_POST['start_date']);
		array_push($args['date_query'], array(
			'year'  => $start_date[2],
			'month' => $start_date[0],
			'day'   => $start_date[1],
			'compare'   => '>=',
		));
	}

	if (isset($_POST['end_date']) && !empty($_POST['end_date'])) {
		$end_date = explode('/', $_POST['end_date']);
		array_push($args['date_query'], array(
			'year'  => $end_date[2],
			'month' => $end_date[0],
			'day'   => $end_date[1],
			'compare'   => '<=',
		));
	}

	$sesiones = get_posts($args);

	foreach ($sesiones as $sesion) {
		$post = $sesion;
		setup_postdata($post);
		get_template_part('template-parts/sesion/content', $post->post_status);
	}
	wp_reset_postdata();


	wp_die(); // this is required to terminate immediately and return a proper response
}

function the_file($file, $sub = false)
{
	echo get_the_file($file, $sub);
}

function get_the_file($file, $sub)
{

	if ($sub) {
		$file = get_sub_field($file);
	} else {
		$file = get_field($file);
	}

	$filename = str_replace(get_bloginfo('url'), '', $file);
	return get_bloginfo('url') . "/download.php?file=" . urlencode($filename);
}


function get_the_file_url($file, $sub = false){
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

	return get_bloginfo('url') . "/download_all.php?id=" . get_the_ID();
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

	// Here is a sample of the URLs this regex matches: (there can be more content after the given URL that will be ignored)
	// http://youtu.be/dQw4w9WgXcQ
	// http://www.youtube.com/embed/dQw4w9WgXcQ
	// http://www.youtube.com/watch?v=dQw4w9WgXcQ
	// http://www.youtube.com/?v=dQw4w9WgXcQ
	// http://www.youtube.com/v/dQw4w9WgXcQ
	// http://www.youtube.com/e/dQw4w9WgXcQ
	// http://www.youtube.com/user/username#p/u/11/dQw4w9WgXcQ
	// http://www.youtube.com/sandalsResorts#p/c/54B8C800269D7C1B/0/dQw4w9WgXcQ
	// http://www.youtube.com/watch?feature=player_embedded&v=dQw4w9WgXcQ
	// http://www.youtube.com/?feature=player_embedded&v=dQw4w9WgXcQ
	// It also works on the youtube-nocookie.com URL with the same above options.
	// It will also pull the ID from the URL in an embed code (both iframe and object tags)
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_video_url, $match);
	$youtube_id = $match[1];

	// if no match return false.
	return $youtube_id;
}


add_action('wp_ajax_get_blog_posts', 'get_blog_posts');
add_action('wp_ajax_nopriv_get_blog_posts', 'get_blog_posts');

function get_blog_posts()
{

	$posts_per_page = 10;
	$page = (isset($_POST['page']) || !empty($_POST['page'])) ? $_POST['page'] : 0;

	$args = [
		'posts_per_page' => $posts_per_page,
		'offset' => ($page * $posts_per_page),

	];



	if (isset($_POST['filter']) || !empty($_POST['filter'])) {

		switch ($_POST['filter']) {

			case 1:
				$args['date_query'] = array(
					'after' => '-1 week'
				);
				break;
			case 2:
				$args['date_query'] = array(
					'after' => '-1 month'
				);
				break;
			case 3:
				$args['date_query'] = array(
					'after' => '-1 year'
				);
				break;
			case 4:
				$args['date_query'] = array(
					'after' => $_POST['date_init'],
					'before' => $_POST['date_end']
				);
				break;
		}
	}


	if (isset($_POST['categories']) || !empty($_POST['categories'])) {

		$args['category__and'] = [];

		foreach( $_POST['categories'] as  $cate ){

			$c = get_category_by_slug($cate);

			array_push( $args['category__and'], $c->term_id);
		}
		//$args['category__and'] = implode(',', $_POST['categories']);
	}



	if (isset($_POST['monthnum']) || !empty($_POST['monthnum'])) {
		$args['monthnum'] = $_POST['monthnum'];
	}

	if (isset($_POST['year']) || !empty($_POST['year'])) {
		$args['year'] = $_POST['year'];
	}

	if (isset($_POST['search']) || !empty($_POST['search'])) {
		$args['s'] = $_POST['search'];
	}

	$the_query = new WP_Query($args);

	if ($the_query->have_posts()) {

		// Load posts loop.
		while ($the_query->have_posts()) {
			$the_query->the_post();
			get_template_part('template-parts/content/content');
		}
	} else {

		// If no content, include the "No posts found" template.
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

	return mb_substr($t, 0, $limit, 'UTF-8') . "...";
}





// Register and load the widget
function wpb_load_widget()
{
	register_widget('wpb_widget');
}
add_action('widgets_init', 'wpb_load_widget');

// Creating the widget 
class wpb_widget extends WP_Widget
{

	function __construct()
	{
		parent::__construct(

			// Base ID of your widget
			'wpb_widget',

			// Widget name will appear in UI
			__('Documentos Widget', 'sesna'),

			// Widget description
			array('description' => __('Widgets con numero de documentos', 'sesna'),)
		);
	}

	// Creating widget front-end

	public function widget($args, $instance)
	{

		//$cat_count = get_category(57);
		?>
	<div class="redBox">
		<p class="titulo">Contamos con: <b><span><?= wp_count_posts()->publish ?></span> documentos <br>originales a tu<br> disposición.</b></p>
	</div>

<?php
}
} // Class wpb_widget ends here


