<?php

/**
* Template Name: Transparencia - Solicitudes
*/

get_header();
?>

<?php get_template_part( 'template-parts/transparencia/header' ); ?>




<div class="transparenciaContainer" id="normatividadContainer">

    <div class="contenedor" id="blogEntries">
        <img class="imagen" src="<?php if ( function_exists('the_field') ) { the_field('imagen_seccion_solicitudes', 'option'); } ?>" alt="Sección de solicitudes de información" />
    </div>

    <div class="contenedor" id="loadMoreContainer">
        <p class="normatividadTitulo">Si tienes dudas, o quieres conocer algo más:</p>
        <a rel="noopener" class="boton__primario" target="_blank" title="El enlace abre en ventana nueva" href="https://www.plataformadetransparencia.org.mx/group/guest/crear-solicitud">Solicita información</a>
    </div>

</div>

<?php get_template_part( 'template-parts/transparencia/denuncia' ); ?>

<?php
get_footer();
