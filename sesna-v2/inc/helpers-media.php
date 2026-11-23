<?php
/**
 * Helpers de medios, archivos, URLs de uploads e íconos SND pre-renderizados en servidor.
 *
 * Módulo cargado desde functions.php. El código se movió sin modificaciones
 * funcionales respecto al functions.php monolítico original.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
}

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
 * Obtiene de manera dinámica y portable la URL de un documento almacenado en la Biblioteca de Medios (wp-admin).
 * Busca el archivo por nombre o ruta relativa en los archivos adjuntos de WordPress, evitando dominios codificados.
 *
 * @param string $filename      Nombre del archivo o patrón a buscar (ej: 'PNA-resumen-ejecutivo.pdf').
 * @param string $fallback_path Ruta relativa dentro de la carpeta de subidas de WordPress por si no existe en BD (ej: '2020/01/PNA-resumen-ejecutivo.pdf').
 * @return string URL completa del archivo generada dinámicamente según la configuración del entorno actual.
 */
function sesna_get_media_attachment_url( $filename, $fallback_path = '' ) {
    // Caché estático por petición: la misma URL se solicita varias veces por plantilla.
    static $cache = array();
    $cache_key = $filename . '|' . $fallback_path;
    if ( isset( $cache[ $cache_key ] ) ) {
        return $cache[ $cache_key ];
    }

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
        'order'          => 'DESC',
        'no_found_rows'  => true,
        'update_post_term_cache' => false,
    );

    $attachments = get_posts( $args );

    if ( ! empty( $attachments ) && ! is_wp_error( $attachments ) ) {
        foreach ( $attachments as $attachment ) {
            $attached_file = get_post_meta( $attachment->ID, '_wp_attached_file', true );
            // Ensure exact filename match to prevent matching prefixed files (e.g. 11.-filename.pdf)
            if ( basename( $attached_file ) === $filename ) {
                $url = wp_get_attachment_url( $attachment->ID );
                if ( ! empty( $url ) && ! is_wp_error( $url ) ) {
                    return $cache[ $cache_key ] = $url;
                }
            }
        }
    }

    $upload_dir = wp_upload_dir();
    $path = ! empty( $fallback_path ) ? $fallback_path : $filename;
    
    return $cache[ $cache_key ] = trailingslashit( $upload_dir['baseurl'] ) . ltrim( $path, '/' );
}
