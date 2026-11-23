<?php
/**
 * Funciones de fallback defensivas para entornos sin ACF activo.
 *
 * Módulo cargado desde functions.php. El código se movió sin modificaciones
 * funcionales respecto al functions.php monolítico original.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
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
