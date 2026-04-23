<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11" />

    <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory') ?>/img/favicon.png">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <!-- 
          HEADER

      -->

      <div class="container">
        <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="<?php bloginfo('url') ?>"><img src="<?php bloginfo('stylesheet_directory') ?>/img/logo.png"/></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>


          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <div class="row ml-auto menuList">
                <div class="col-sm-12 col-md-6">

                    <?php
                          wp_nav_menu(
                            array(
                            'container'      => false,
                            'theme_location' => 'menu-1',
                            'menu_class'     => 'nav flex-column navbar-nav',
                            'depth'          => 1,
                            'add_li_class'  => 'nav-item',
                            'link_before'         => '<span>',
                            'link_after'          => '</span>',
                            'fallback_cb'    => '__return_false'
                          )
                        );
					?>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="row">
                    <div class="col-sm-12 col-md-9 borderLeft">

                        <?php
                        wp_nav_menu(
                            array(
                                'container'      => false,
                                'theme_location' => 'menu-2',
                                'menu_class'     => 'nav flex-column navbar-nav',
                                'depth'          => 1,
                                'add_li_class'   => 'nav-item',
                                'link_before'         => '<span>',
                              'link_after'          => '</span>',
                              'fallback_cb'    => '__return_false'
                            )
                        );
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-2 borderLeft redesContainer">
                      <ul class="nav flex-column redes">
<!--                        <li><a href="<?= get_option('options_facebook') ?>" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="<?= get_option('options_twitter') ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
			<li><a href="https://www.youtube.com/channel/UCRUpiHth_WRkNo2sBmZIyfQ" target="_blank"><i class="fab fa-youtube"></i></a></li>
 -->
			 <li class="d-none d-md-block"><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-search"></i></button></li>
                      </ul>
                    </div>
                  </div>

                  <form class="row buscador d-flex d-md-none" action="/" >
                    <input class="form-control" name="s" type="search" value="<?= get_search_query() ?>" placeholder="BÚSQUEDA" aria-label="Search">
                    <button class="btn btn-danger" type="submit"><i class="fas fa-search"></i></button>
                  </form>
                </div>
            </div>
          </div>
        </nav>
      </div>
<!-- 
        END HEADER

      -->
	  
<!-- Modal -->
<div class="modal fade" id="modalLinksPNA" tabindex="-1" role="dialog" aria-labelledby="modalLinksPNA" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-bottom: 5%">
		  <h2>
			  Selecciona una opción:
		  </h2><br>
		   <ul>
			   <li><a style="font-size: 24px; color: #fff;" href="https://www.sesna.gob.mx/politica-nacional-anticorrupcion/">Política Nacional Anticorrupción</a></li>
			  <li><a style="font-size: 24px; color: #fff;" href="https://www.sesna.gob.mx/programa-implemetancion-pna/">Programa de Implementación</a></li>
<li><a style="font-size: 24px; color: #fff;" href="https://www.sesna.gob.mx/seguimiento-evaluacion/">Seguimiento y Evaluación</a></li> 
		  </ul> 
        
		  <br>
		  
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div> -->
    </div>
  </div>
</div>
