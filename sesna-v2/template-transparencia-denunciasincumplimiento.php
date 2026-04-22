<?php

/**
* Template Name: Transparencia - Denuncias por Incumplimiento
*/

get_header();
?>


<?php get_template_part( 'template-parts/transparencia/header' ); ?>



    <div class="transparenciaContainer" id="normatividadContainer">
      <div class="container">
		  
		  <p class="normatividadTitulo" style="margin-bottom: 20px">Consulta las <b><i>denuncias presentadas</i></b> en contra de la <b>SESNA</b> <b><i>por incumplimiento y/o por la falta de actualización de las Obligaciones de Transparencia.</i></b></p>
      </div>

        <div class="container" >
		<div class="row justify-content-center align-self-center">
			<div class="mx-auto">
                <a href="https://www.sesna.gob.mx/wp-content/uploads/2021/10/Denuncias-Incumplimiento-Obligaciones-Transparencia.xlsx" class="btn btn-light btn-lg">Descargar PDF  <i class="fas fa-download"></i></a>
              </div>
		</div>
        </div>

	</div>
    <?php get_template_part( 'template-parts/transparencia/denuncia' ); ?>

<?php
get_footer();
?>
