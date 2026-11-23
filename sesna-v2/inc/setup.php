<?php
/**
 * Configuración del tema: soporte, menús, widgets, admin bar y body_class.
 *
 * Módulo cargado desde functions.php. El código se movió sin modificaciones
 * funcionales respecto al functions.php monolítico original.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
}

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
