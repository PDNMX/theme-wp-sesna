<?php


/**
* Template Name: Transparencia - Comite de transparencia
*/

get_header();
?>

    
<?php get_template_part( 'template-parts/transparencia/header' ); ?>



<div class="transparenciaContainer">
  <img src="<?php bloginfo('stylesheet_directory') ?>/img/transparencia/tx2.png"/ class="tx2">
  <div class="container" id="funcionariosContainer">
    <div class="row">

        <?php 
          global $post;
        
          $functionarios = get_posts([
            'post_type'=>'funcionario',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'seccion_funcionario',
                'field'    => 'slug',
                'terms'    => 'transparencia',
              ),
            ),
          ]);
        ?>

        <?php foreach( $functionarios as $functionario ):  $post = $functionario; setup_postdata($post);?>

          <div class="col">
            <div class="d-flex justify-content-center align-items-center">
              <div class="p-2">
                <img src="<?php the_field('imagen') ?>"/>
                <p class="functionarioNombre"><?php the_title(); ?></p>
                <p class="funcionarioTitulo"><?php the_field('puesto') ?></p>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>

      
    </div>
  </div>




  <div class="container" id="comiteTransparencia">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
            <i class="fas fa-list-ul"></i>
            <span>Actas</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#resoluciones" role="tab" aria-controls="profile" aria-selected="false">
            <i class="far fa-clipboard"></i>
            <span>Resoluciones</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#expedientes" role="tab" aria-controls="contact" aria-selected="false">
            <i class="fas fa-key"></i>
            <span>Expedientes Reservados</span>
        </a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container">
          <div class="row" id="filaTitulos">
            <div class="col-2 d-md-block d-none">
              <p>AÑO: </p>
            </div>
            <div class="col-4 d-md-block d-none">
              <p>NÚMERO DE ACTA: </p>
            </div>
            <div class="col-2 d-md-block d-none">
              <p>FECHA: </p>
            </div>
            <div class="col-4 d-md-block d-none">
              <p>DOCUMENTO COMPLETO: </p>
            </div>
          </div>
        </div>

        


          <?php 
          
          
            $anios = get_terms( [
              'taxonomy' => 'anio_archivo', 

            ]);

            usort($anios, 'sortByName');

           
          ?>

          <?php foreach( $anios as $anio ): ?>

          <div class="container scrollbar scrollbar-primary" id="tableContainer">

          <?php 

            
            $actas = get_posts([
              'post_type'=>'archivo',
              'posts_per_page' => -1,
              'tax_query' => array(
                array(
                  'taxonomy' => 'tipo_archivo',
                  'field'    => 'slug',
                  'terms'    => 'acta',
                ),
                array(
                  'taxonomy' => 'anio_archivo',
                  'field'    => 'term_id',
                  'terms'    => $anio->term_id,
                ),
              ),
            ]);

            $first = true;
          ?>

            <?php foreach( $actas as $acta ): $post = $acta; setup_postdata($post);?>

            <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-12" id="year">
                <p class="year"><?= ($first)?$anio->name:'&nbsp;' ?></p>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <p class="nombreActa"> <?php the_title(); ?></p>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-12" id="fechaContainer">
                <p class="fecha"><?php echo get_the_date('d/m/Y') ?></p>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <a href="<?php the_file('archivo'); ?>" class="btn btn-light">Descargar PDF  <i class="fas fa-download"></i></a>
              </div>
            </div>
          

            <?php $first = false; endforeach; ?>

            </div>

          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>


      </div>
      <div class="tab-pane fade" id="resoluciones" role="tabpanel" aria-labelledby="profile-tab">
              
        <div class="container">
          <div class="row" id="filaTitulos">
            <div class="col-2 d-md-block d-none">
              <p>AÑO: </p>
            </div>
            <div class="col-4 d-md-block d-none">
              <p>NÚMERO DE RESOLUCIÓN: </p>
            </div>
            <div class="col-2 d-md-block d-none">
              <p>FECHA: </p>
            </div>
            <div class="col-4 d-md-block d-none">
              <p>DOCUMENTO COMPLETO: </p>
            </div>
          </div>
        </div>

        


          <?php 
          
          
            $anios = get_terms([
              'taxonomy' => 'anio_archivo', 
            ]);

            usort($anios, 'sortByName');
          ?>

          <?php foreach( $anios as $anio ): ?>

          <div class="container scrollbar scrollbar-primary" id="tableContainer">

          <?php 

            
            $actas = get_posts([
              'post_type'=>'archivo',
              'posts_per_page' => -1,
              'tax_query' => array(
                array(
                  'taxonomy' => 'tipo_archivo',
                  'field'    => 'slug',
                  'terms'    => 'resolucion',
                ),
                array(
                  'taxonomy' => 'anio_archivo',
                  'field'    => 'term_id',
                  'terms'    => $anio->term_id,
                ),
              ),
            ]);

            $first = true;
          ?>

            <?php foreach( $actas as $acta ): $post = $acta; setup_postdata($post);?>

            <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-12" id="year">
                <p class="year"><?= ($first)?$anio->name:'&nbsp;' ?></p>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <p class="nombreActa"> <?php the_title(); ?></p>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-12" id="fechaContainer">
                <p class="fecha"><?php echo get_the_date('d/m/Y') ?></p>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <a href="<?php the_file('archivo'); ?>" class="btn btn-light">Descargar PDF  <i class="fas fa-download"></i></a>
              </div>
            </div>
          

            <?php $first = false; endforeach; ?>

            </div>

          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
      
      </div>
      <div class="tab-pane fade" id="expedientes" role="tabpanel" aria-labelledby="contact-tab">

          <div class="container" >
              <div class="row" id="filaTitulos">
                <div class="col-9 d-md-block d-none">
                  <p>LISTA DE DOCUMENTOS </p>
                </div>
                <div class="col-3 d-md-block d-none">
                  <p>DESCARGAS </p>
                </div>
              </div>
            </div>


          <div class="container scrollbar scrollbar-primary" id="tableContainer">

          <?php 

            
            $actas = get_posts([
              'post_type'=>'archivo',
              'posts_per_page' => -1,
              'tax_query' => array(
                array(
                  'taxonomy' => 'tipo_archivo',
                  'field'    => 'slug',
                  'terms'    => 'expediente-reservado',
                ),
              ),
            ]);

            $first = true;
          ?>

            <?php foreach( $actas as $acta ): $post = $acta; setup_postdata($post);?>


            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12" id="year">
                  <p class="nombreActa"><?php the_title(); ?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                  <a href="<?php the_file('archivo'); ?>" target="_blank" class="btn btn-light">Descargar PDF  <i class="fas fa-download"></i></a>
                </div>
              </div>

          

            <?php $first = false; endforeach; ?>

            </div>
          <?php wp_reset_postdata(); ?>


      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-1">
        <a class="social" href="https://www.plataformadetransparencia.org.mx/web/guest/inicio" target="_blank">
          <img src="<?php bloginfo('stylesheet_directory') ?>/img/transparencia/bannerPNT2.svg"/>
        </a>
      </div>
      <div class="col-md-4 offset-md-2">
        <a class="social" href="http://consultapublicamx.inai.org.mx:8080/vut-web/?idSujetoObigadoParametro=16370&idEntidadParametro=33&idSectorParametro=21" target="_blank">
          <img src="<?php bloginfo('stylesheet_directory') ?>/img/transparencia/bannerObligaciones2.svg"/>
        </a>
      </div>
    </div>
  </div>

</div>



    <?php get_template_part( 'template-parts/transparencia/denuncia' ); ?>

<?php
get_footer();
