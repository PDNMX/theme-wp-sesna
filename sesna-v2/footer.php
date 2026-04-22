<div class="footer">
        <div class="container">
          
        
          <div class="row">
            <div class="col-12">
              <a href="/">
                <img class="logo_footer" src="<?php bloginfo('stylesheet_directory') ?>/img/logo_footer.png" alt="logo_footer"/>
              </a>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">

            <ul class="topLista">
                <li>
                  <a href="/">INICIO</a>
                </li>
              </ul>
              <?php
                wp_nav_menu(
                    array(
                        'container'      => false,
                        'theme_location' => 'footer-1',
                        'menu_class'     => 'lista',
                        'depth'          => 1,
                        'add_li_class'   => '',
                    )
                );
              ?>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-12">
              
              <ul class="topLista">
                <li>
                  <a href="/conocenos">CONOCENOS</a>
                </li>
              </ul>
              <?php
                wp_nav_menu(
                    array(
                        'container'      => false,
                        'theme_location' => 'footer-2',
                        'menu_class'     => 'lista2',
                        'depth'          => 1,
                        'add_li_class'   => '',
                    )
                );
              ?>

              <!-- <ul class="lista2">
                <li><a href="#">Secretaría Técnica</a></li>
                <li><a href="#">Unidad de Riesgos y Política Pública</a></li>
                <li><a href="#">Unidad de Servicios Tecnológicos</a></li>
                <li><a href="#">Dirección General de Vinculación</a></li>
                <li><a href="#">Dirección General de Administración</a></li>
                <li><a href="#">Dirección General de Asuntos Jurídicos</a></li>
                <li><a href="#">Unidad de Transparencia</a></li>
                
              </ul> -->
            </div>



            <div class="col-lg-3 col-md-6 col-sm-12">

              <ul class="topLista">
                <li>
                  <a href="/transparencia">RENDICIÓN DE CUENTAS</a>
                </li>
              </ul>
              <?php
                wp_nav_menu(
                    array(
                        'container'      => false,
                        'theme_location' => 'footer-3',
                        'menu_class'     => 'lista2',
                        'depth'          => 1,
                        'add_li_class'   => '',
                    )
                );
              ?>
          </div>





          <div class="col-lg-3 col-md-6 col-sm-12">
              <ul class="lista2">
                <!--

                     DIFERENTES PERFILES DENTRO DE LA PANTALLA DE TRANSPARENCIA (TENTATIVAMENTE ME DICEN QUE VAN A SER CONTENIDOS COLAPSABLES) 

                -->
                <li>
                  <a href="#">
                    <div class="row">
                      <div class="col-2"><i class="fas fa-map-marker-alt"></i></div>
                      <div class="col-10"><p>Viaducto Presidente Miguel Alemán Valdés, No.105 Col.Escandón Sección 1, Alcaldía Miguel Hidalgo, CP11800, Ciudad de México.</p></div>
                    </div>
                  </a></li>
                <li>
                  <a href="#">
                    <div class="row">
                      <div class="col-2"><i class="fas fa-phone"></i></div>
                      <div class="col-10"><p><a href="tel:+525551315645">Tel. +52 55 5131 5645</a></p></div>
                    </div>
                  </a></li>
                <li>
                  <a href="#">
                    <div class="row">
                      <div class="col-2"><i class="far fa-clock"></i></div>
                      <div class="col-10"><p>Lunes a jueves: 9:00 a 14:00 hrs. / 15:30 a 19:00 hrs. Viernes: 9:00 a 15:00 hrs</p></div>
                    </div>
                  </a></li>

                <!--SE OMITE EL CORREO ELECTRONICO

	 	<li>
                    <a href="mailto:sesna-consulta@sesna.gob.mx">
                    <div class="row">
                      <div class="col-2"><i class="far fa-envelope"></i></div>
                    </div>
                  </a>
		</li>

                -->
                  

                
                <li>
                  <div class="row justify-content-center">
                      <div class="col-4"><a class="social" href="<?= get_option('options_facebook') ?>" target="_blank"><i class="fab fa-facebook"></i></a></div>
                      <div class="col-4"><a class="social" href="<?= get_option('options_twitter') ?>" target="_blank"><i class="fab fa-twitter"></i></a></div>
		                  <div class="col-4"><a class="social" href="https://www.youtube.com/channel/UCRUpiHth_WRkNo2sBmZIyfQ" target="_blank"><i class="fab fa-youtube"></i></a></div>                      
                  </div>
                </li>
                <?php if ( is_front_page() ) { ?>
                
                <li>
                  <div class="row justify-content-center ">
                      <div class="col-12">
                        <a class="social" href="https://www.plataformadetransparencia.org.mx/web/guest/inicio" target="_blank">
                          <img style="width: 80%;" src="<?php bloginfo('stylesheet_directory') ?>/img/transparencia/bannerPNT1.svg"/>
                        </a>
                      </div>
                  </div>
                </li>
                <li>
                  <div class="row justify-content-center">
                      <div class="col-12">
                        <a class="social" href="http://consultapublicamx.inai.org.mx:8080/vut-web/?idSujetoObigadoParametro=16370&idEntidadParametro=33&idSectorParametro=21" target="_blank">
                          <img style="width: 80%;" src="<?php bloginfo('stylesheet_directory') ?>/img/transparencia/bannerObligaciones1.svg"/>
                        </a>
                      </div>
                  </div>
                </li>


                <?php } ?>
                
              </ul>
            </div>
          </div>




        </div>
      </div>



      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h5 class="modal-title" id="exampleModalLongTitle">Buscador</h5>
              
            </div>
            <div class="modal-body">
              <p>¿Qué estás buscando?</p>
              <form class="buscador_modal" action="/">
                <input type="search" name="s"/>
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>

<!-- Modal anuncio VEDA ELECTORAL -->

<div class="modal fade" id="modal-anuncio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header" style="display: flex;">
            <h4 class="modal-title">Anuncio</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <h5>Conforme al calendario electoral emitido por el Instituto Nacional Electoral, a partir del día 04 de abril de 2021 y hasta la conclusión de las jornadas comiciales, el día 06 de junio de 2021, deberán suspenderse la difusión en los medios de comunicación social de toda propaganda gubernamental, con la salvedad relativa a campañas de información de las autoridades electorales, servicios educativos y de salud, o las necesarias para la protección civil en casos de emergencia.</h5>
         </div>
      </div>
   </div>
</div>

<script>
	/*$(document).ready(function(){
		setTimeout(function(){
            $('#modal-anuncio').modal('show');
    	},800);
	});*/
</script>

    <?php wp_footer(); ?>

  </body>
</html>
