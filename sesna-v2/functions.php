<?php
/**
 * Tema SESNA v2 — archivo orquestador.
 *
 * Toda la lógica vive en módulos cohesivos dentro de /inc. El orden de los
 * require_once es significativo: conserva el orden de registro de hooks
 * (init, admin_menu, widgets_init…) que tenía el functions.php monolítico,
 * de modo que menús de administración y tipos de contenido no cambian de posición.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
}

$sesna_inc = get_template_directory() . '/inc/';

$sesna_modulos = array(
	// Núcleo del tema
	'setup.php',                  // after_setup_theme, widgets, admin bar, body_class
	'enqueue.php',                // wp_enqueue_scripts (CSS/JS públicos)
	'sna-url-rewriter.php',       // Reescritura de URLs sesna.gob.mx → sitio actual
	'nav-walker.php',             // Filtros de navegación y Sesna_Bootstrap_Nav_Walker

	// Helpers reutilizables
	'helpers-media.php',          // Medios, archivos, URLs de uploads e íconos SND SVG
	'helpers-acf.php',            // Fallbacks defensivos sin ACF
	'helpers-template.php',       // Helpers de plantilla (títulos, YouTube, sesiones)
	'blog-familias.php',          // Familias temáticas y conteos del blog / home

	// Tipos de contenido, metaboxes y menús de administración
	'cpt-slider.php',             // Carrusel del home
	'cpt-normatividad.php',       // Normatividad
	'cpt-directorio.php',         // Directorio de servidores públicos
	'cpt-transparencia.php',      // Comité de Transparencia y Datos Personales
	'cpt-organos-colegiados.php', // Órganos Colegiados (oc_sesion)
	'cpt-derechos-humanos.php',   // Micrositio de Derechos Humanos
	'cpt-recursos.php',           // Recursos de interés
	'cpt-fichero-pna.php',        // Fichero del Informe PI-PNA
	'bootstrap-pages.php',        // Subpáginas automáticas de Indicadores Nacionales

	// Endpoints y fuentes de datos
	'ajax-handlers.php',          // wp_ajax_* / wp_ajax_nopriv_* y ZIP
	'data-ata-sheets.php',        // Anexo Transversal Anticorrupción (Google Sheets)
);

foreach ($sesna_modulos as $sesna_modulo) {
	require_once $sesna_inc . $sesna_modulo;
}

unset($sesna_inc, $sesna_modulos, $sesna_modulo);
