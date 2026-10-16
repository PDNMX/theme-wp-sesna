$(document).ready(function(){
	if (typeof $.fn.datepicker === 'function') {
		$('#datepickerInicio, #datepickerFinal').datepicker({
			uiLibrary: 'bootstrap4'
		});
	}

	$('#datepickerInicio').change(function(){

		jQuery('.blogEntriesList').empty().data('page', 0);

		$(".filtradoPersonalizado").addClass("filtradoActive");
		$(".desde_intervalo").text($(this).val());

		get_blog_posts();
	});

	$('#datepickerFinal').change(function(){

		jQuery('.blogEntriesList').empty().data('page', 0);

		$(".filtradoPersonalizado").addClass("filtradoActive");
		$(".hasta_intervalo").text($(this).val());

		get_blog_posts();
	});

	
	$(".orderPost").on("change",function(){
		$('#collapseIntervalo').addClass('muestra--ninguno').hide();
		var value = $(this).val();
		console.log(value);
		switch(value){
			case '4':
				$('#collapseIntervalo').removeClass('muestra--ninguno').show();
			break;
		}
		jQuery('.blogEntriesList').empty().data('page', 0);
		get_blog_posts();
	});



	$('.sidebar-archive a').click(function(e){

		e.preventDefault();

		$('.sidebar-archive a').removeClass('active');
		$(this).addClass('active');


		var pathArray = $(this).attr('href').split('/');

		$(".filtradoFecha").addClass("filtradoActive");
		$(".filtradoFechaTexto").text($(this).text());

		
		jQuery('.blogEntriesList').empty().data('page', 0);
		
		$('.blogEntriesList').data('year', pathArray[pathArray.length - 3]);
		$('.blogEntriesList').data('monthnum', pathArray[pathArray.length - 2]);

		get_blog_posts();

	});

	var actual_desde = $('#datepickerInicio').val();
	var actual_hasta = $('#datepickerFinal').val();


	$(".clear_intervalo").on("click",function() {

		jQuery('.blogEntriesList').empty().data('page', 0);

		
		$(".filtradoPersonalizado").removeClass("filtradoActive");
		$(".orderPost ").val(0);
		$('#collapseIntervalo').addClass('muestra--ninguno').hide();
		$(".desde_intervalo").text("");
		$(".hasta_intervalo").text("");
		$('#datepickerInicio').val(actual_desde);
		$('#datepickerFinal').val(actual_hasta);

		get_blog_posts();
	});

	$(".clear_fecha").on("click",function(){

		jQuery('.blogEntriesList').empty().data('page', 0);
		
		$('.blogEntriesList').data('year','');
		$('.blogEntriesList').data('monthnum', '');

		$(".filtradoFecha").removeClass("filtradoActive");
		$(".filterContainer ul li a").removeClass("active");
		$(".filtradoFechaTexto").text("");

		get_blog_posts();
	});
});