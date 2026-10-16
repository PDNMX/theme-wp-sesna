<?php


/**
* Template Name: Transparencia - Preguntas Frecuentes
*/

get_header();
?>

<?php get_template_part( 'template-parts/transparencia/header' ); ?>


<div class="transparenciaContainer" id="normatividadContainer">
      <div class="contenedor">
        <h1 class="normatividadTitulo h1b patria">Preguntas Frecuentes</h1>
      </div>

      <div class="contenedor">
        <p class="normatividadTitulo">A continuación te presentamos los documentos más solicitados a través de solicitudes de información, conócelos.</p>
      </div>


        <div class="contenedor" >
          <div class="reticulaGrid__12" id="filaTitulos">
            <div class="columna__9 muestra--ninguno muestra--bloque--md">
              <p>LISTA DE DOCUMENTOS </p>
            </div>
            <div class="columna__3 muestra--ninguno muestra--bloque--md">
              <p>DESCARGAS </p>
            </div>
          </div>
        </div>



        <div class="contenedor scrollbar scrollbar-primary" id="tableContainer">

        <?php 

          global $post;
          $archivos = get_posts([
            'post_type'=>'faqs',
            'posts_per_page' => -1,
          ]);
          ?>

          <?php foreach( $archivos as $archivo ): $post = $archivo; setup_postdata($post);?>

            <div class="reticulaGrid__12">
              <div class="columna__12 columna__9--md" id="year">
                <p class="nombreActa"><?php the_title(); ?></p>
              </div>
              <div class="columna__12 columna__3--md">
                <a href="<?php the_file('archivo'); ?>" class="boton__secundario" aria-label="Descargar PDF de <?php echo esc_attr(get_the_title()); ?>">Descargar PDF <i class="snd__icono snd-download icono--16 ms-2" aria-hidden="true"></i></a>
              </div>
            </div>

          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
              
        </div>

        <!-- <div style="text-align: center;padding:50px 0;" id="loadMoreContainer">
            <p class="normatividadTitulo">Acuerdos del <b>Comité Coordinador</b> </p>
            <a href="/como-vamos/" class="boton__primario">Conocer acuerdos</a>

            
        </div> -->
    </div>



<?php get_template_part( 'template-parts/transparencia/denuncia' ); ?>

<?php
get_footer();
