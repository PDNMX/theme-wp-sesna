<?php

/**
* Template Name: Transparencia - Denuncias por Incumplimiento
*/

get_header();
?>


<?php get_template_part( 'template-parts/transparencia/header' ); ?>



    <div class="transparenciaContainer" id="normatividadContainer">
        <div class="contenedor">
            <p class="normatividadTitulo" style="margin-bottom: 20px">Consulta las <b><i>denuncias presentadas</i></b> en contra de la <b>SESNA</b> <b><i>por incumplimiento y/o por la falta de actualización de las Obligaciones de Transparencia.</i></b></p>
        </div>

        <div class="contenedor">
            <div class="fila justify-content-center align-items-center">
                <div class="columna__auto text-center">
                    <a href="https://www.sesna.gob.mx/wp-content/uploads/2021/10/Denuncias-Incumplimiento-Obligaciones-Transparencia.xlsx" class="boton__secundario boton--grande">
                        Descargar PDF <i class="snd__icono snd-download icono--24 ms-2" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part( 'template-parts/transparencia/denuncia' ); ?>

<?php
get_footer();
?>
