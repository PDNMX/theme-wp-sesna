<?php
/**
 * Endpoints AJAX (wp_ajax_* / wp_ajax_nopriv_*) y descarga masiva en ZIP.
 *
 * Módulo cargado desde functions.php. El código se movió sin modificaciones
 * funcionales respecto al functions.php monolítico original.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
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

add_action('wp_ajax_get_blog_posts', 'get_blog_posts');
add_action('wp_ajax_nopriv_get_blog_posts', 'get_blog_posts');

function get_blog_posts()
{
	$posts_per_page = 10;
	$page = (isset($_POST['page']) && !empty($_POST['page'])) ? $_POST['page'] : 0;

	$args = [
		'posts_per_page' => $posts_per_page,
		'offset' => ($page * $posts_per_page),
		'no_found_rows' => true,
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
