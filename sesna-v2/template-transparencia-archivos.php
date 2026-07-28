<?php

/**
* Template Name: Transparencia - Archivos
*/

get_header();
?>


<?php get_template_part( 'template-parts/transparencia/header' ); ?>

<div class="transparenciaContainer" id="normatividadContainer">
      <div class="container">
		<p class="normatividadTitulo">Consulta <b>información relevante</b> en materia de <b><i>archivos de la SESNA.</i><b/></b></p>
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
            'post_type'=>'archivos',
            'posts_per_page' => -1,
          ]);
          ?>

          <?php foreach( $archivos as $archivo ): $post = $archivo; setup_postdata($post);?>
            <div class="row">
              <div class="col-lg-9 col-md-9 col-sm-12" id="year">
                <p class="nombreActa"><?php the_title(); ?></p>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-12">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pdfViewerModal" data-pdf-url="<?php the_file('archivo'); ?>" data-pdf-title="<?php echo esc_attr(get_the_title()); ?>" class="btn btn-light d-inline-flex align-items-center gap-2">Consultar <i class="bi bi-filetype-pdf fs-5" style="color: #9f2241;"></i></a>
              </div>
            </div>

          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
              
        </div>
    </div>

    <?php get_template_part( 'template-parts/transparencia/denuncia' ); ?>

<?php get_template_part( 'template-parts/transparencia/visor-pdf' ); ?>

<?php
get_footer();
?>