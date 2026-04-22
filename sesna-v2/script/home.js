var loading = '<div class="loading"><img src="'+ajax_object.loading_url+'"/></div>';
$( document ).ready(function() {
	let params = new URLSearchParams(location.search);
	let categoria = params.get('categoria');
	//console.log(categoria);
	if (categoria == 'comunicados-de-prensa'){
		$('html, body').animate({
			scrollTop: $("#content").offset().top
		}, 2000);	
	}
});
jQuery(function(){
	

    jQuery('.blogEntriesList').empty();
    
    get_blog_posts();

    jQuery('#btn_load_more').click(function(){
        get_blog_posts();
    });


    jQuery('.blog-category a').click(function(e){

        e.preventDefault();

        jQuery(this).find('span').toggleClass('active');

        $('.blogEntriesList').empty().data('page', 0);


        get_blog_posts();

        console.log('Click');
    })
});


function get_current_page(){

    var page = $('.blogEntriesList').data('page');

    if( page === null || page === undefined ){
        page = 0;
    }

    $('.blogEntriesList').data('page', page+1);

    return page;

}


function get_current_categories(){

    var cats = [];

    jQuery('.blog-category a').each(function(){

        if( jQuery(this).find('span').hasClass('active') ){
            cats.push( jQuery(this).data('cat') );
        }
    });

    return cats;
}


function get_blog_posts(){


    $('.blogEntriesList').append(loading)


    

    $.post(ajax_object.ajax_url, {
        'action': 'get_blog_posts',
        'page' : get_current_page(),
        'categories': get_current_categories(),
        'year': $('.blogEntriesList').data('year'),
        'monthnum': $('.blogEntriesList').data('monthnum'),
        'search': $('.blogEntriesList').data('search'),
        'filter': $(".orderPost").val(),
        'date_init': $('#datepickerInicio').val(),
        'date_end': $('#datepickerFinal').val()
    }, function(response) {
		
        $('.blogEntriesList .entry-none').remove();
        $('.blogEntriesList .loading').remove();
        $('.blogEntriesList').append(response);
    });
}

