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
          <div class="reticulaGrid__12" id="filaTitulos">
            <div class="columna__9 d-md-block d-none">
              <p>DESCRIPCIÓN </p>
            </div>
            <div class="columna__3 d-md-block d-none">
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
            <div class="reticulaGrid__12">
              <div class="columna__12 columna__9--md" id="year">
                <p class="nombreActa"><?php the_title(); ?></p>
              </div>
              <div class="columna__12 columna__3--md">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pdfViewerModal" data-pdf-url="<?php the_file('archivo'); ?>" data-pdf-title="<?php echo esc_attr(get_the_title()); ?>" class="boton__secundario muestra--flex-linea align-items-center gap--8">Consultar <i class="snd snd-document--pdf fs-5" aria-hidden="true" style="color: var(--color-burgundi);"></i></a>
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