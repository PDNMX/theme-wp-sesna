<?php
/**
* Template Name: Conocenos
*/


if( is_page('conocenos') ){
  $pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order");
  if ($pagekids) {
    $firstchild = $pagekids[0];
    wp_redirect(get_permalink($firstchild->ID));
  } 
}

get_header();



?>

  <?php if( is_page('organo-interno-de-control') ): ?>

    <div class="conocenosHeader">
      <div class="container">
        <h1 class="titulo">Conócenos</h1>
        <h2 class="subtitulo"> OFICINA <b> DE <i> REPRESENTACION</i></b></h2>
*         <img  class="equipo" src="<?php the_field('imagen_seccion_oic', 'option') ?>" alt=""/> 
      </div>
    </div>




    <div class="titularContainer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <img src="<?php the_field('imagen', get_field('titular')->ID ) ?>"/>
            <?php if( !empty( get_field('twitter', get_field('titular')->ID ) ) ): ?>
              <div class="d-flex">
                <div class="p-2">
                <i class="fab fa-twitter"></i>
                </div>
                <div class="p-2">
                  <a href="http://twitter.com/<?php the_field('twitter', get_field('titular')->ID ) ?>" target="_blank"><?php the_field('twitter', get_field('titular')->ID ) ?></a>
                </div>
              </div>
            <?php endif; ?>
            <?php if( !empty( get_field('correo', get_field('titular')->ID ) ) ): ?>
              <div class="d-flex">
                <div class="p-2">
                  <i class="fas fa-envelope"></i>
                </div>
                <div class="p-2">
                  <a href="mailto:<?php the_field('correo', get_field('titular')->ID ) ?>" target="_blank"><?php the_field('correo', get_field('titular')->ID ) ?></a>
                </div>
              </div>
            <?php endif; ?>


            <?php if( !empty( get_field('declaracion', get_field('titular')->ID )  ) ): ?>
              <a href="<?php the_field('declaracion', get_field('titular')->ID ) ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory') ?>/img/conocenos/btn_declaracion.png"></a>
            <?php endif; ?>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12">
            <h2 class="tituloPerfil"><?php echo get_the_title( get_field('titular')->ID ) ?></h2>
            <h3 class="cargoPerfil"><?php the_field('puesto', get_field('titular')->ID ) ?></h3>
            <p class="descripcionCargo">
              <?php echo get_the_content(null, false, get_field('titular')->ID ) ?>
            </p>
          </div>
        </div>
      </div>
    </div>

  <?php else: ?>
    <div class="conocenosHeader">
      <div class="container">
        <h1 class="titulo">Conócenos</h1>
        <h2 class="subtitulo">Somos un grupo de <b>especialistas</b> trabajando para <b><i>combatir la corrupción.</i></b></h2>
      </div>
    </div>



    <div class="conocenosMenu" id="pruebaaaa">
      <div class="container">
        <div class="d-xs-block d-sm-block d-md-none">
            <ul class="list-group list-group-horizontal justify-content-center" style="display: none;">
              <a href="conocenos.html"><li class="list-group-item active">1</li></a>
              <a href="conocenos_unidad_de_riesgos.html"><li class="list-group-item">2</li></a>
              <a href="conocenos_unidad_de_servicios_tecnologicos.html"><li class="list-group-item">3</li></a>
              <a href="conocenos_direccion_general_vinculacion.html"><li class="list-group-item">4</li></a>
              <a href="conocenos_direccion_general_administracion.html"><li class="list-group-item">5</li></a>
              <a href="conocenos_direccion_general_asuntos_juridicos.html"><li class="list-group-item">6</li></a>
              <a href="conocenos_unidad_transparencia.html"><li class="list-group-item">7</li></a>
            </ul>
            <div class="d-flex justify-content-center" style="margin:50px 0 0 0;">
              <div class="p-2">
                <img class="funcionarioThumb" src="<?php the_field('imagen', get_field('titular')->ID ) ?>"/>
              </div>
            </div>
        </div>
      </div>

        <div class="container d-none d-md-block d-lg-block">


            <div class="d-flex justify-content-center flex-wrap">


            <?php

            $items = wp_get_nav_menu_items('Conocenos');

            foreach( $items as $item ):

            ?>

<script>
    console.log(<?= json_encode($items); ?>);
</script>
                 <?php if( get_the_ID() == $item->object_id ): ?>                


                    <div class="p-2 active"> 
                        <div class="circleContainer">
                            <div class="iconContainer">
                                <img class="funcionarioThumb" src="<?php the_field('imagen', get_field('titular')->ID ) ?>"/>
                            </div>
                        </div>
                    </div>

                <?php else: ?>

                    <div class="p-2">
                        <a href="<?= $item->url ?>">
                            <div class="circleContainer">
                                <div class="d-flex align-self-center justify-content-center iconContainer">
                                <div class="p-2">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 21 29" xml:space="preserve">
                                    <path id="Shape_40_copy_7" class="st0" d="M6.2,1.6h8.7v5.1c0,3.2-2.6,5.9-5.8,5.9c0,0,0,0,0,0H6.1L6.2,1.6L6.2,1.6z M19.4,27.4H1.6
                                    v-3.1c-0.1-4.9,3.9-9,8.8-9s9,3.9,9,8.8c0,0.1,0,0.1,0,0.2V27.4z M11,13.8c3.2-0.9,5.4-3.8,5.4-7.2V0H4.6v14.1h3.5
                                    C3.3,15.2,0,19.5,0,24.4V29h21v-4.6C21,18.7,16.6,14.1,11,13.8z"/>
                                    </svg>
                                </div>
                                </div><!--  ICON CONTAINER  -->
                            </div><!--    CIRCLE CONTAINER -->
                            <p class="tituloTransparencia"><?= $item->title ?></p>
                        </a>
                    </div>

                <?php endif; ?>

            <?php endforeach; ?>

              
            </div>
        </div>
    </div>


    <div class="titularContainer1">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12">
            <h2 class="tituloPerfil"><?php echo get_the_title( get_field('titular')->ID ) ?></h2>
            <h3 class="cargoPerfil"><?php the_field('puesto', get_field('titular')->ID ) ?></h3>
            <?php if( !empty( get_field('twitter', get_field('titular')->ID ) ) ): ?>
              <div class="d-flex">
                <div class="p-2">
                <i class="fab fa-twitter"></i>
                </div>
                <div class="p-2">
                  <a href="http://twitter.com/<?php the_field('twitter', get_field('titular')->ID ) ?>" target="_blank"><?php the_field('twitter', get_field('titular')->ID ) ?></a>
                </div>
              </div>
            <?php endif; ?>
            <?php if( !empty( get_field('correo', get_field('titular')->ID ) ) ): ?>
              <div class="d-flex">
                <div class="p-2">
                  <i class="fas fa-envelope"></i>
                </div>
                <div class="p-2">
                  <a href="mailto:<?php the_field('correo', get_field('titular')->ID ) ?>" target="_blank"><?php the_field('correo', get_field('titular')->ID ) ?></a>
                </div>
              </div>
            <?php endif; ?>

            <?php if( !empty( get_field('declaracion', get_sub_field('titular')->ID )  ) ): ?>
              <a href="<?php the_field('declaracion', get_sub_field('titular')->ID ) ?>" target="_blank"><img class="declaracion" src="<?php bloginfo('stylesheet_directory') ?>/img/conocenos/btn_declaracion.png"></a>
            <?php endif; ?>
          </div>
          <div class="col-lg-7 col-md-7 col-sm-12">
            
            <p class="descripcionCargo">
              <?php echo get_the_content(null, false, get_field('titular')->ID ) ?>
            </p>
          </div>
        </div>
      </div>
    </div>


    <?php endif; ?>

    

    


    <?php if( !empty( get_field('slogan') ) ): ?>          
    <div class="fraseContainer">
      <img src="<?php bloginfo('stylesheet_directory') ?>/img/conocenos/ellipse_frase_conocenos.png" class="ellipse_izq"/>
      <img src="<?php bloginfo('stylesheet_directory') ?>/img/transparencia/tx2.png" class="tx2"/>
      <div class="container">
        <div class="d-flex align-items-center justify-content-center">
          <div class="p-2 flex-fill d-none d-sm-block">
            <p class="comilla">"</p>
          </div>

          <div class="p-2 flex-fill">
            <p class="frase">
              <?php the_field('slogan', false, false) ?>
            </p>
          </div>

          <div class="p-2 flex-fill d-none d-sm-block">
            <p class="comilla2">"</p>
          </div>
        </div>

        <?php if( !empty( get_field('slogan_sub') ) ): ?>
        <div class="d-flex justify-content-center">
          <div class="p-2">
            <p class="autor"><?php the_field('slogan_sub') ?></p>
          </div>
        </div>

        <?php endif; ?>
      </div>
    </div>
    <?php endif; ?>









    <?php if( have_rows('funciones') ): ?>
    <div class="functionesContainer">
      <img class="ellipse_funciones" src="<?php bloginfo('stylesheet_directory') ?>/img/conocenos/ellipse_funciones.png"/>
      <div class="container">
        <h1 class="containerTitulo">FUNCIONES</h1>
      </div>


      <div class="container">
        <div class="row">

          
            <?php while ( have_rows('funciones') ) : the_row(); ?>

            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="funcionBox">
                <div class="row">
                  <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="circleContainer">
                      <div class="d-flex align-self-center justify-content-center iconContainer">
                        <div class="p-2">
                            <?php the_sub_field('icono'); ?>
                        </div>
                      </div><!--  ICON CONTAINER  -->
                    </div><!--    CIRCLE CONTAINER -->
                  </div>
                  <div class="col-lg-9 col-md-12 col-sm-12">
                      <h2  class="tituloPerfil"><?php the_sub_field('titulo'); ?></h2>
                      <p class="descripcionCargo">
                      <?php the_sub_field('contenido', false, false); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>

          
          
          </div>
        </div>
      </div>
    </div>

    <?php endif; ?>









    <?php if( have_rows('equipo') ): ?>
    <div class="equipoContainer">
      <div class="container">
        <h1 class="containerTitulo">EQUIPO</h1>
      </div>

      <img class="ellipse_der" src="<?php bloginfo('stylesheet_directory') ?>/img/conocenos/ellipse_der.png" alt="ellipse"/>
      <div class="container">
        <div class="row">

        
            <?php while ( have_rows('equipo') ) : the_row(); ?>

              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="perfilContainer">
                  <div class="container">
                    <div class="row">
                      <div class="col-12 col-lg-3">

                        <?php if( empty( get_field('imagen', get_sub_field('funcionario')->ID ) ) ): ?>
                        
                        <div class="circleContainer">
                                <div class="d-flex align-self-center justify-content-center iconContainer iconContainer2">
                                <div class="p-2">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 21 29" xml:space="preserve">
                                    <path id="Shape_40_copy_7" class="st0" d="M6.2,1.6h8.7v5.1c0,3.2-2.6,5.9-5.8,5.9c0,0,0,0,0,0H6.1L6.2,1.6L6.2,1.6z M19.4,27.4H1.6
                                    v-3.1c-0.1-4.9,3.9-9,8.8-9s9,3.9,9,8.8c0,0.1,0,0.1,0,0.2V27.4z M11,13.8c3.2-0.9,5.4-3.8,5.4-7.2V0H4.6v14.1h3.5
                                    C3.3,15.2,0,19.5,0,24.4V29h21v-4.6C21,18.7,16.6,14.1,11,13.8z"/>
                                    </svg>
                                </div>
                                </div><!--  ICON CONTAINER  -->
                            </div><!--    CIRCLE CONTAINER -->

                        <?php else: ?>
                          <img src="<?php the_field('imagen', get_sub_field('funcionario')->ID ) ?>"/>
                        <?php endif; ?>
                      </div>
                      <div class="col-12 col-lg-9">
                        <p class="nombreFuncionario"><?php echo get_the_title( get_sub_field('funcionario')->ID ) ?></p>
                        <p class="cargoFuncionario"><?php the_field('puesto', get_sub_field('funcionario')->ID ) ?></p>

                        <?php if( !empty( get_field('twitter', get_sub_field('funcionario')->ID ) ) ): ?>
                        <div class="d-flex">
                          <div class="p-2 grayLink">
                            <i class="fas fa-twitter"></i>
                          </div>
                          <div class="p-2 grayLink">
                            <a href="http//twiiter.com/<?php the_field('twitter', get_sub_field('funcionario')->ID ) ?>" target="_blank"><?php the_field('twitter', get_sub_field('funcionario')->ID ) ?></a>
                          </div>
                        </div>
                        <?php endif; ?>

                        <?php if( !empty( get_field('correo', get_sub_field('funcionario')->ID ) ) ): ?>
                        <div class="d-flex">
                          <div class="p-2 grayLink">
                            <i class="fas fa-envelope"></i>
                          </div>
                          <div class="p-2 grayLink">
                            <a href="mailto:<?php the_field('correo', get_sub_field('funcionario')->ID ) ?>" target="_blank"><?php the_field('correo', get_sub_field('funcionario')->ID ) ?></a>
                          </div>
                        </div>
                        <?php endif; ?>

                        <?php if( !empty( get_field('declaracion', get_sub_field('funcionario')->ID )  ) ): ?>
                          <div class="d-flex">
                            <div class="p-2 redLink">
                              <i class="fas fa-external-link-alt"></i>
                            </div>

                            

                              <div class="p-2 redLink">
                                <a href="<?php the_field('declaracion', get_sub_field('funcionario')->ID ) ?>" target="_blank">Ver declaración</a>
                              </div>

                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <p class="descripcionCargo"><?php echo get_the_content(null, false, get_sub_field('funcionario')->ID ) ?> </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>

          


        </div>
      </div>
    </div>

    <?php endif; ?>




    <?php get_template_part( 'template-parts/content/recent' ); ?>


    <?php if( !is_page('organo-interno-de-control') ): ?>

    <div class="conocenosHeader">
      <div class="container">
	<h2 class="subtitulo"> OFICINA <b> DE <i> REPRESENTACION</i></b></h2>        
        <a class="btn_equipo" href="/conocenos/organo-interno-de-control/"><img src="<?php bloginfo('stylesheet_directory') ?>/img/conocenos/btn_equipo.png"></a>
        <img  class="equipo" src="<?php the_field('imagen_banner_oic', 'option') ?>" alt="ORGANO Interno DE CONTROL"/>
      </div>
    </div>

    <?php endif; ?>



<?php
get_footer();
