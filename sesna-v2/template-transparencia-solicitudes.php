<?php

/**
* Template Name: Transparencia - Solicitudes
*/

get_header();
?>

<?php get_template_part( 'template-parts/transparencia/header' ); ?>




<div class="transparenciaContainer" id="normatividadContainer">



<div class="container" id="blogEntries">
     <img class="imagen" src="<?php the_field('imagen_seccion_solicitudes', 'option') ?>"/>

     
</div>


<div class="container" id="loadMoreContainer">
    <p class="normatividadTitulo">Si tienes dudas, o quieres conocer algo más:</p>
    <a class="btn btn-black" target="_blank" href="https://www.plataformadetransparencia.org.mx/group/guest/crear-solicitud">Solicita información</a></div>
</div>

    <?php get_template_part( 'template-parts/transparencia/denuncia' ); ?>

<?php
get_footer();
