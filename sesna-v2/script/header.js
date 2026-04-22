	/*$(function(){
		console.log("ready");
          $("#header").load("header.html"); 
          $("#footer").load("footer.html"); 
    });*/

window.onload = function(){ //this callback executes when the window is fully loaded
	document.querySelector('#menu-item-382 a').addEventListener('click', function(e) {
		e.preventDefault();
        e.stopPropagation();
		$('#modalLinksPNA').modal('show');
        console.log('Event in #element2 fired!');
    });
};

/* MODAL DATATÓN 2023 */
/*
$(window).on('load',function(){
    var delayMs = 1000; // delay in milliseconds
    
    setTimeout(function(){
        $('#modalDataton').modal('show');
    }, delayMs);
});
*/