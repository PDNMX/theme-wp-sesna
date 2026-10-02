<?php

/**
* Template Name: Transparencia - Archivos
*/

get_header();
?>


<?php get_template_part( 'template-parts/transparencia/header' ); ?>

<div class="transparenciaContainer" id="normatividadContainer">
      <div class="contenedor">
		<p class="normatividadTitulo">Consulta <b>información relevante</b> en materia de <b><i>archivos de la SESNA.</i><b/></b></p>
      </div>


        <div class="contenedor" >
          <div class="fila gap--24" id="filaTitulos">
            <div class="columna__9--md d-md-block d-none">
              <p>DESCRIPCIÓN </p>
            </div>
            <div class="columna__3--md d-md-block d-none">
              <p>DESCARGAS </p>
            </div>
          </div>
        </div>

        <div class="contenedor scrollbar scrollbar-primary" id="tableContainer">

        <?php 
          global $post;
          $archivos = get_posts([
            'post_type'=>'archivos',
            'posts_per_page' => -1,
          ]);
          ?>

          <?php foreach( $archivos as $archivo ): $post = $archivo; setup_postdata($post);?>
            <div class="fila gap--24">
              <div class="col-100 columna__9--sm columna__9--md columna__9--lg" id="year">
                <p class="nombreActa"><?php the_title(); ?></p>
              </div>
              <div class="col-100 columna__3--sm columna__3--md columna__3--lg">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pdfViewerModal" data-pdf-url="<?php the_file('archivo'); ?>" data-pdf-title="<?php echo esc_attr(get_the_title()); ?>" class="btn btn-light d-inline-flex align-items-center gap-2">Consultar <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" style="color: #9f2241;"><path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"/></svg></a>
              </div>
            </div>

          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
              
        </div>
    </div>

    <?php get_template_part( 'template-parts/transparencia/denuncia' ); ?>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<?php
get_footer();
?>