<?php

/**
* Template Name: Transparencia - Normatividad
*/

get_header();
?>


<?php get_template_part( 'template-parts/transparencia/header' ); ?>



    <div class="transparenciaContainer" id="normatividadContainer">
      <div class="container">
        <p class="normatividadTitulo">Éstas son las disposiciones <b>legales, reglamentarias y administrativas <i>para la transparencia.</i></b></p>
      </div>


        


        <div class="container" >
          <div class="row" id="filaTitulos">
            <div class="col-9 d-md-block d-none">
              <p>MARCO NORMATIVO </p>
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
            'post_type'=>'normatividad',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'tipo_normatividad',
                'field'    => 'slug',
                'terms'    => 'marco-normativo',
              ),
            ),
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


        <hr>

        <div class="container" >
          <div class="row" id="filaTitulos">
            <div class="col-9 d-md-block d-none">
              <p>NORMATIVIDAD INTERNA </p>
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
            'post_type'=>'normatividad',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'tipo_normatividad',
                'field'    => 'slug',
                'terms'    => 'normatividad-interna',
              ),
            ),
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



        <hr>
        <div class="container" >
          <div class="row" id="filaTitulos">
            <div class="col-9 d-md-block d-none">
              <p>NORMATIVIDAD EN MATERIA DE TRANSPARENCIA </p>
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
            'post_type'=>'normatividad',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'tipo_normatividad',
                'field'    => 'slug',
                'terms'    => 'normatividad-en-materia-de-transparencia',
              ),
            ),
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

    <!-- <div class="container">
      <div class="d-flex align-self-center">
        <div class="p-2">
          <a class="loadMore"><img src="<?php bloginfo('stylesheet_directory') ?>/img/transparencia/btn_info.png"/></a>
        </div>
      </div>
    </div> -->


    <?php get_template_part( 'template-parts/transparencia/denuncia' ); ?>

<?php
get_footer();
