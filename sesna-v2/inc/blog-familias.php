<?php
/**
 * Blog / Home: filtro de categorías y helpers de familias temáticas y conteos.
 *
 * Módulo cargado desde functions.php. El código se movió sin modificaciones
 * funcionales respecto al functions.php monolítico original.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
}

add_action('pre_get_posts', 'ad_filter_categories');
function ad_filter_categories($query)
{
	if ($query->is_main_query() && is_home() && isset($_GET['categoria']) && !empty($_GET['categoria'])) {
		$query->set('category_name', $_GET['categoria']);
	}
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
			'no_found_rows'       => true,
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false,
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
