<?php
/**
 * Encolado de estilos y scripts públicos del tema.
 *
 * Módulo cargado desde functions.php. El código se movió sin modificaciones
 * funcionales respecto al functions.php monolítico original.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Versión de un asset basada en filemtime() (cache-busting automático).
 */
function sesna_asset_version($relative_path)
{
	$file = get_template_directory() . $relative_path;
	return file_exists($file) ? filemtime($file) : wp_get_theme()->get('Version');
}

/**
 * Guarda el nombre de la plantilla raíz que WordPress eligió para la petición
 * (page-que-hacemos.php, single.php, front-page.php…), incluso cuando se
 * resuelve por slug y no por la meta _wp_page_template.
 */
function sesna_capture_template($template)
{
	$GLOBALS['sesna_template_basename'] = basename($template);
	return $template;
}
add_filter('template_include', 'sesna_capture_template', PHP_INT_MAX);

/**
 * Hojas CSS por plantilla (assets/css/pages/*.css). El orden del arreglo es el
 * orden de carga en la cascada; cada hoja se encola solo si la plantilla activa
 * figura en su lista.
 */
function sesna_template_styles_map()
{
	return array(
		'pna-comun' => array('page-diseno-pna.php', 'page-politica-nacional-anticorrupcion.php', 'page-presupuestacion.php', 'page-programa-implemetancion-pna.php'),
		'home' => array('front-page.php'),
		'home-acciones' => array('front-page.php', 'page-acciones-y-programas.php'),
		'que-hacemos' => array('page-que-hacemos.php'),
		'directorio' => array('page-directorio.php'),
		'single' => array('single.php'),
		'transparencia-landing' => array('page-transparencia.php'),
		'contacto-unidad' => array('template-contacto.php', 'template-transparencia-unidad.php'),
		'riesgos-comun' => array('page-contrataciones-publicas.php', 'page-riesgos-inteligencia.php', 'page-verificacion-patrimonial.php'),
		'verificacion-patrimonial' => array('page-verificacion-patrimonial.php'),
		'contrataciones-publicas' => array('page-contrataciones-publicas.php'),
		'derechos-humanos' => array('page-derechos-humanos.php'),
		'organos-colegiados' => array('page-organos-colegiados.php'),
		'finanzas' => array('page-administracion-finanzas.php', 'page-archivo-documental.php', 'page-contrataciones-adquisiciones.php', 'page-informacion-financiera.php', 'page-planeacion-institucional.php'),
		'pna-politica' => array('page-politica-nacional-anticorrupcion.php'),
		'pna-diseno' => array('page-diseno-pna.php'),
		'seguimiento-evaluacion' => array('page-seguimiento-evaluacion.php'),
		'indicadores-nacionales' => array('page-indicadores-nacionales.php'),
	);
}

/**
 * Encola las hojas de assets/css/pages/ que correspondan a la plantilla activa.
 *
 * @return string[] Handles encolados (para declararlos como dependencia de las utilidades).
 */
function sesna_enqueue_template_styles()
{
	$tpl     = isset($GLOBALS['sesna_template_basename']) ? $GLOBALS['sesna_template_basename'] : '';
	$handles = array();
	if ($tpl === '') {
		return $handles;
	}
	$previo = 'sesna-card';
	foreach (sesna_template_styles_map() as $name => $templates) {
		if (!in_array($tpl, $templates, true)) {
			continue;
		}
		$handle = 'sesna-page-' . $name;
		wp_enqueue_style($handle, get_template_directory_uri() . '/assets/css/pages/' . $name . '.css', array($previo), sesna_asset_version('/assets/css/pages/' . $name . '.css'));
		$handles[] = $handle;
		$previo    = $handle;
	}
	return $handles;
}

/**
 * Scripts por plantilla (script/*.js extraídos de las plantillas, Etapa 3.3).
 * El orden del arreglo es el orden de ejecución; todos se cargan en el footer con defer.
 *
 * Cada entrada: handle => array( 'src' => ruta, 'templates' => plantillas raíz, 'deps' => handles previos ).
 */
function sesna_template_scripts_map()
{
	return array(
		// Controlador global de modales SND y visor de PDF (parcial template-parts/visor-pdf.php)
		'sesna-visor-pdf' => array(
			'src'       => '/script/visor-pdf.js',
			'templates' => array(
				'page-administracion-finanzas.php',
				'page-archivo-documental.php',
				'page-como-vamos.php',
				'page-contrataciones-adquisiciones.php',
				'page-derechos-humanos.php',
				'page-diseno-pna.php',
				'page-indicadores-nacionales.php',
				'page-informacion-financiera.php',
				'page-marco-normativo.php',
				'page-organos-colegiados.php',
				'page-planeacion-institucional.php',
				'page-politica-nacional-anticorrupcion.php',
				'page-presupuestacion.php',
				'page-programa-implemetancion-pna.php',
				'page-riesgos-inteligencia.php',
				'page-seguimiento-evaluacion.php',
				'template-transparencia-archivos.php',
				'template-transparencia-comite.php',
				'template-transparencia-datospersonales.php',
			),
		),
		'sesna-administracion-finanzas' => array(
			'src'       => '/script/administracion-finanzas.js',
			'templates' => array('page-administracion-finanzas.php'),
		),
		'sesna-informacion-financiera' => array(
			'src'       => '/script/informacion-financiera.js',
			'templates' => array('page-administracion-finanzas.php', 'page-informacion-financiera.php'),
		),
		'sesna-organos-colegiados-drawer' => array(
			'src'       => '/script/organos-colegiados-drawer.js',
			'templates' => array('page-organos-colegiados.php'),
		),
		'sesna-organos-colegiados-video' => array(
			'src'       => '/script/organos-colegiados-video.js',
			'templates' => array('page-organos-colegiados.php'),
		),
		'sesna-organos-colegiados' => array(
			'src'       => '/script/organos-colegiados.js',
			'templates' => array('page-organos-colegiados.php'),
			'deps'      => array('sesna-organos-colegiados-drawer', 'sesna-organos-colegiados-video'),
		),
		'sesna-marco-normativo' => array(
			'src'       => '/script/marco-normativo.js',
			'templates' => array('page-marco-normativo.php'),
		),
		'sesna-diseno-pna' => array(
			'src'       => '/script/diseno-pna.js',
			'templates' => array('page-diseno-pna.php'),
		),
		'sesna-transparencia-comite' => array(
			'src'       => '/script/transparencia-comite.js',
			'templates' => array('template-transparencia-comite.php'),
		),
		'sesna-transparencia-datospersonales' => array(
			'src'       => '/script/transparencia-datospersonales.js',
			'templates' => array('template-transparencia-datospersonales.php'),
		),
		'sesna-presupuestacion' => array(
			'src'       => '/script/presupuestacion.js',
			'templates' => array('page-presupuestacion.php'),
			'deps'      => array('sesna-chartjs', 'sesna-chartjs-datalabels'),
		),
	);
}

/**
 * Encola los scripts de assets locales que correspondan a la plantilla activa.
 */
function sesna_enqueue_template_scripts()
{
	$tpl = isset($GLOBALS['sesna_template_basename']) ? $GLOBALS['sesna_template_basename'] : '';
	if ($tpl === '') {
		return;
	}

	$args = array('in_footer' => true, 'strategy' => 'defer');

	// Chart.js (CDN) — solo en Presupuestación
	if ($tpl === 'page-presupuestacion.php') {
		wp_enqueue_script('sesna-chartjs', 'https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js', array(), null, $args);
		wp_enqueue_script('sesna-chartjs-datalabels', 'https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js', array('sesna-chartjs'), null, $args);
	}

	foreach (sesna_template_scripts_map() as $handle => $script) {
		if (!in_array($tpl, $script['templates'], true)) {
			continue;
		}
		wp_enqueue_script(
			$handle,
			get_template_directory_uri() . $script['src'],
			isset($script['deps']) ? $script['deps'] : array(),
			sesna_asset_version($script['src']),
			$args
		);
	}

	// Ícono SVG pre-renderizado que el visor de PDF usa en su mensaje "Archivo en vinculación"
	if (wp_script_is('sesna-visor-pdf', 'enqueued')) {
		wp_add_inline_script(
			'sesna-visor-pdf',
			'window.sesnaVisorPdf = ' . wp_json_encode(array(
				'iconoPdf' => sesna_render_snd_svg_icon('snd-document--pdf', 'icono--64', 'color:#691C32;width:64px;height:64px;'),
			)) . ';',
			'before'
		);
	}
}

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
	// Hoja base del tema (variables, accesibilidad, header/subheader) — carga después de snd-guinda.css (declarada en header.php)
	wp_enqueue_style('sesna-main-style', get_template_directory_uri() . '/assets/css/layout.css', array(), sesna_asset_version('/assets/css/layout.css'));
	// Componentes SND y estilos transversales
	wp_enqueue_style('sesna-components-snd', get_template_directory_uri() . '/assets/css/components-snd.css', array('sesna-main-style'), sesna_asset_version('/assets/css/components-snd.css'));
	// Componente Card (ícono + título + texto + acción): única fuente de estilos de las cards
	wp_enqueue_style('sesna-card', get_template_directory_uri() . '/assets/css/card.css', array('sesna-components-snd'), sesna_asset_version('/assets/css/card.css'));
	// Hojas por plantilla: solo se descargan en las páginas donde se usan
	$sesna_estilos_pagina = sesna_enqueue_template_styles();
	// Utilidades propias del tema — al final de la cascada para ganar a los componentes
	wp_enqueue_style('sesna-utilidades', get_template_directory_uri() . '/assets/css/utilidades-tema.css', array_merge(array('sesna-card'), $sesna_estilos_pagina), sesna_asset_version('/assets/css/utilidades-tema.css'));

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

	// Scripts por plantilla extraídos de las vistas (script/*.js, defer)
	sesna_enqueue_template_scripts();

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
