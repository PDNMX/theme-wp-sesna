var loading = '<div class="loading"><img src="' + ajax_object.loading_url + '"/></div>';

jQuery(document).ready(function($) {

	function get_sesiones(type_sesion) {

		$('#' + type_sesion).append(loading);

		var page = $('#' + type_sesion).data('page');

		if (type_sesion == 'sesiones_comite') {
			start_date = $('#datepickerInicio').val();
			end_date = $('#datepickerFinal').val();
		} /* else {
			start_date = $('#datepickerInicio2').val();
			end_date = $('#datepickerFinal2').val();
		} */

		if (type_sesion == 'sesiones_comision') {
			start_date = $('#datepickerInicio2').val();
			end_date = $('#datepickerFinal2').val();
		}

		if (type_sesion == 'sesiones_organo_gobierno') {
			start_date = $('#datepickerInicio3').val();
			end_date = $('#datepickerFinal3').val();
		}

		$.post(ajax_object.ajax_url, {
			'action': 'get_sesiones',
			'type': type_sesion,
			'page': page,
			'start_date': start_date,
			'end_date': end_date,
		}, function(response) {

			if (response == '') {
				//$('#btn_'+type_sesion).hide();
			}

			$('#' + type_sesion + ' .loading').remove();
			$('#' + type_sesion).append(response);
		});

		$('#' + type_sesion).data('page', ++page);

	}

	$('#btn_sesiones_comite').click(function() {
		get_sesiones('sesiones_comite');
	});

	$('#btn_sesiones_comision').click(function() {
		get_sesiones('sesiones_comision');
	});

	$('#btn_sesiones_organo_gobierno').click(function() {
		get_sesiones('sesiones_organo_gobierno');
	});

	get_sesiones('sesiones_comite');
	get_sesiones('sesiones_comision');
	get_sesiones('sesiones_organo_gobierno');


	$('#datepickerInicio').datepicker({
		uiLibrary: 'bootstrap4'
	});
	$('#datepickerFinal').datepicker({
		uiLibrary: 'bootstrap4'
	});

	$('#datepickerInicio2').datepicker({
		uiLibrary: 'bootstrap4'
	});
	$('#datepickerFinal2').datepicker({
		uiLibrary: 'bootstrap4'
	});
	$('#datepickerInicio3').datepicker({
		uiLibrary: 'bootstrap4'
	});
	$('#datepickerFinal3').datepicker({
		uiLibrary: 'bootstrap4'
	});

	$('#datepickerInicio, #datepickerFinal').change(function() {
		$('#sesiones_comite').empty().data('page', 0);
		get_sesiones('sesiones_comite');
	});

	$('#datepickerInicio2, #datepickerFinal2').change(function() {
		$('#sesiones_comision').empty().data('page', 0);
		get_sesiones('sesiones_comision');
	});

	$('#datepickerInicio3, #datepickerFinal3').change(function() {
		$('#sesiones_organo_gobierno').empty().data('page', 0);
		get_sesiones('sesiones_organo_gobierno');
	});


	$('body').on("change", ".panel", function() {

		var id = $(this).attr("id");

		var acuerdo_div = "#container_" + id;
		var claseDisabled = $(this).hasClass("disabled");

		// console.log(claseDisabled);

		if (!claseDisabled) {
			if ($(this).is(':checked')) {
				$(acuerdo_div).css({
					"height": "auto",
					"opacity": "1",
					"padding": "100px 0"
				})
			} else {
				$(acuerdo_div).css({
					"height": "0",
					"opacity": "0",
					"padding": "0"
				})
			}
		}

	});

	$('body').on("click", ".launch-modal", function(e) {
		e.preventDefault();
		$('#' + $(this).data('modal-id')).modal();
	});
});
