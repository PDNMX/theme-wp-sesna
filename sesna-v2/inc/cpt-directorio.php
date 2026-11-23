<?php
/**
 * CPT `directorio` (directorio de servidores públicos) y su metabox.
 *
 * Módulo cargado desde functions.php. El código se movió sin modificaciones
 * funcionales respecto al functions.php monolítico original.
 *
 * @package sesna
 */

if (!defined('ABSPATH')) {
	exit;
}

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
