jQuery(function($) {
  var pop = $('.map-popup');
  pop.click(function(e) {
    e.stopPropagation();
  });
  
  $('a.marker').hover(function(e) {
    e.preventDefault();
    e.stopPropagation();
      $(this).next('.map-popup').toggleClass('open');
      $(this).parent().siblings().children('.map-popup').removeClass('open');
  });

  $('a.marker').click(function(e) {
    e.preventDefault();
    e.stopPropagation();
      $(this).next('.map-popup').toggleClass('open');
      $(this).parent().siblings().children('.map-popup').removeClass('open');
  });

  
  $(document).click(function() {
    pop.removeClass('open');
  });
  
  pop.each(function() {
    var w = $(window).outerWidth(),
        edge = Math.round( ($(this).offset().left) + ($(this).outerWidth()) );
    if( w < edge ) {
      $(this).addClass('edge');
    }
  });








  /*  ciclo   */
  var activeCiclo = 1;
  var myVar;
  comenzar();

  $(".whiteBack").mouseover(function() { parar(); }).mouseout(function() { comenzar(); });

  function comenzar(){
    myVar = setInterval(function(){ 
      // console.log("setInterval");
      activeCiclo++;
      if(activeCiclo%4 == 0){
        activeCiclo = 1;
      }
      changeCiclo();
     }, 3000);
  }

  function parar(){
    clearInterval(myVar);
  }
  


  function changeCiclo(){
    // console.log("cgangeCiclo");
    // console.log(activeCiclo);
    $(".circle").removeClass("active");
    $(".cicloList li").removeClass("active");
    $(".circleText").removeClass("active");

    $(".circle#"+activeCiclo).addClass("active");
    $("#"+activeCiclo+".listaCiclo").addClass("active");
    $("#"+activeCiclo+".circleText").addClass("active");

  }
  $(".circle").on("click",function(){
    var idCircleClick = $(this).attr("id");
    activeCiclo = idCircleClick;
    changeCiclo();
  });
  $(".cicloList li").on("click",function(){
    var idCircleClick = $(this).attr("id");
    activeCiclo = idCircleClick;
    changeCiclo();
  });


});