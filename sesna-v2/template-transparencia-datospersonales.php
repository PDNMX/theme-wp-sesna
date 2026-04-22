<?php

/**
* Template Name: Transparencia - Datos Personales
*/

get_header();
?>


<?php get_template_part( 'template-parts/transparencia/header' ); ?>



    <div class="transparenciaContainer" id="normatividadContainer">
      <div class="container">
		  <p class="normatividadTitulo">Consulta <b>los avisos de privacidad y otros documentos</b> importantes respecto al <b><i>tratamiento de los datos personales</i></b> en posesión de la SESNA.</p>
      </div>

        <div class="container" >
          <div class="row" id="filaTitulos">
            <div class="col-9 d-md-block d-none">
              <p>DESCRIPCIÓN </p>
            </div>
            <div class="col-3 d-md-block d-none">
              <p>DESCARGAS </p>
            </div>
          </div>
        </div>

        <div class="container scrollbar scrollbar-primary" id="tableContainer">

        <?php 
          global $post;
          $archivos = get_posts([
            'post_type'=>'datos-personales',
            'posts_per_page' => -1
          ]);
          ?>

          <?php foreach( $archivos as $archivo ): $post = $archivo; setup_postdata($post);?>

            <div class="row">
              <div class="col-lg-9 col-md-9 col-sm-12" id="year">
                <p class="nombreActa"><?php the_title(); ?></p>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-12">
                <a href="<?php the_file('archivo'); ?>" class="btn btn-light">Descargar PDF  <i class="fas fa-download"></i></a>
              </div>
            </div>

          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
              
        </div>
	</div>
    <?php get_template_part( 'template-parts/transparencia/denuncia' ); ?>

<?php
get_footer();
?>