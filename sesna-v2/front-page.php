<?php
get_header();
?>

        <!-- DESPUES DE HEADER  -->
        <div class="home_sesna_container">
          <!-- <img class="tx_left" src="img/home_sesna/tx_left.png"/> -->
          <!-- <img class="tx_right" src="img/home_sesna/tx_right.png"/> -->

            <div class="d-flex justify-content-center align-items-center">
              <div class="p-2">
                <h1 class="sentence"> En la SESNA<br>estamos trabajando para<br>
                    <div class="slidingVertical" >
                      <span> combatir </span>
                      <span>  medir </span>
                      <span> prevenir </span>
                      <span>  disuadir  </span>
                      <!-- <span> acabar </span>  -->
                    </div>
                    <b>la corrupción junto contigo.</b> </h1>  
              </div>
            </div>
        </div>

<!--<div class="alert alert-info alert-dismissible fade show" role="alert" style="text-align: center;background: transparent linear-gradient(230deg, #1C7CBF 0%, #1C7CBF 4%, #9F58E2 49%, #6D4061 100%) 0% 0% no-repeat padding-box;padding: 1.5rem 1.25rem;border-radius: 0;margin: 0;border: 0;">
  <a href="https://dataton2023.plataformadigitalnacional.org/" target="_blank" style="color: #fff;font-weight: 550;">¡Únete al Datatón Anticorrupción 2023! 🚀🚀 Inscríbete para ser parte de la revolución de datos. 🗓️ Del 30 de noviembre al 3 de diciembre de 2023. 🌐💡🇲🇽🚀 ¡No te lo pierdas!</a>
</div> -->


<!-- <div class="container mb-5 mt-5">
 <div class="row">
	 <div class="col-2">
	</div>
	<div class="col-7" align="center">
         
 	     <a href="https://www.youtube.com/watch?v=Od8q-urmmiY"><img src="/wp-content/uploads/2022/10/invitacion_4tasesion22_CC.png" class="card-img-top" alt="..."></a>	
<P> <a href="https://www.sesna.gob.mx/como-vamos/">CONSULTA AQUÍ</a> el orden del día y los documentos que se discutirán en la sesión </P>
	</div>
</div>
</div> -->

        <!-- ENTRADAS DEL BLOG  -->
        <div class="container" id="entradasBlogContainer">
          <div class="row">
            <div class="col-sm-12 col-md-7">

              <?php 
                global $post;
                $recent_posts = get_posts( [
                  'posts_per_page'=>3,
                  'meta_query' => array(
                    array(
                      'key'     => 'destacado',
                      'value'   => 1
                    )
                  ),
                ] ); 
              ?>
              <?php if( count( $recent_posts ) > 0 ): $post = $recent_posts[0]; setup_postdata($post); ?>
                <div class="row">
                  <div class="col-12 entradaContainer">
                    <img src="<?php the_thumbnail_photo('featured-large'); ?>" class="back_img">
                    

                    <div class="image-overlay"></div>
                    <div class="textContainer">
                      <!-- <p class="categoria"><?php the_category( ' ' ); ?> </p><br> -->
                      <p clasS="title"><a href="<?php the_permalink(); ?>"><?php the_title_limit(85); ?></a></p><br>
                      <p class="date"><?php the_date('d - m - Y') ?></p>
                    </div>
                  </div>
                </div>

                <?php if( count( $recent_posts ) > 1 ): $post = $recent_posts[1]; setup_postdata($post);  ?>
                  <div class="row">
                    <div class="col-lg-6 col-sm-12 entradaContainer2">

                    <img src="<?php the_thumbnail_photo('thumb-medium'); ?>" class="back_img">

                    <div class="image-overlay"></div>
                      <div class="textContainer">
                        <!-- <p class="categoria"><?php the_category( ' ' ); ?></p><br> -->
                        <p clasS="title"><a href="<?php the_permalink(); ?>"><?php the_title_limit(30); ?></a></p><br>
                        <p class="date"><?php the_date('d - m - Y') ?></p>
                      </div>
                    </div>
                    <?php if( count( $recent_posts ) > 2 ): $post = $recent_posts[2]; setup_postdata($post);  ?>
                      <div class="col-lg-6 col-sm-12 entradaContainer2">
                      <img src="<?php the_thumbnail_photo('thumb-medium'); ?>" class="back_img">
                      <div class="image-overlay"></div>
                        <div class="textContainer">
                          <!-- <p class="categoria"><?php the_category( ' ' ); ?></p><br> -->
                          <p clasS="title"><a href="<?php the_permalink(); ?>"><?php the_title_limit(30); ?></a></p><br>
                          <p class="date"><?php the_date('d - m - Y') ?></p>
                        </div>
                      </div>
                    <?php endif; ?>    
                  </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
				<div id="viaticos" class="row p-0">
					<div class="col-12 p-4 text-center my-auto">
						<!-- <img src="https://www.sesna.gob.mx/wp-content/uploads/2023/05/BANNER_COMUNICADO_25052023-635x334.jpeg" class="back_img">-->
						<p class="text-center m-0">
							<a target="_blank" href="https://consultapublicamx.plataformadetransparencia.org.mx/vut-web/faces/view/consultaPublica.xhtml?param=7VGiTs3Nuog%3D%3Fqn0ghtpYvQs%3D%3FnLhfIvX0xik%3D%3FJm1gz2S7by0%3D%3FNWd+9vb4ubBccbr7wuAJAcLES2Dom1K606uejwBltzSyqgTJOT+c+WqHTlsKG4oaVhW73S2n2WBJ+FrLvzCw4i3T3kM9RG3w06uejwBltzSyqgTJOT+c+fzuF34dRpygLdPeQz1EbfAgYsvAg9aY9V8zqJAA3qO2sqoEyTk%2FnPl4eCjGCjBOgs8z5J8vWJClWn0w9ZHxJAA%3D%3FEuMdxln%2FRPU%3D%3FJDURliPEU%2Fn87hd+HUacoGqHTlsKG4oatiFAUB2bv0dNVthRQVRqxHUuwNruDqgbE7hVaY330Zhqh05bChuKGrYhQFAdm79HTVbYUUFUasTPtwEdLwZOEXUuwNruDqgbE7hVaY330Zhqh05bChuKGrYhQFAdm79HQYrgdAqHqCJJ+FrLvzCw4vzuF34dRpygaodOWwobihq2IUBQHZu%2FR0GK4HQKh6gitiFAUB2bv0dNVthRQVRqxM+3AR0vBk4RREm4P9coMqU%3D%3FigOLKmyD4frxHvfFxauAZJ1JYyCOt6Uk5FcQX7H%2FC%2FNQxNBtGUWIfcXAp0WfW2rD6ESEWx86sEld8whHfyvBk51JYyCOt6UkDEx08atj+qgKS15FOommRISQ8iZL36rg8R73xcWrgGSdSWMgjrelJKJj9foHlCHZUMTQbRlFiH3FwKdFn1tqw+hEhFsfOrBJXfMIR38rwZOdSWMgjrelJI0ThAcjJ4na%2FinYiX5h3nUYb9cQFqt5sQ%3D%3D%3Fq73eYbqqHXg%3D%3F%2FxoRfMVrMBw%3D#inicio">
								Transparencia Proactiva
								<br/>
								Consulta la información sobre Gastos y Viáticos de la SESNA
							</a>
						</p>
                  </div>
				</div>	
            </div>
            <div class="col-sm-12 col-md-1 .d-md-none .d-lg-block"></div>
            <div class="col-md-4 cl-sm-12">
              <table>
                <tr>
                  <td>
                    <h4>SESNA <span>INFORMA</span></h4>
                    <p>Conoce los últimos avances, documentos y noticias relacionadas con la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.</p>
                    <a class="btn btn-light masArticulos" href="<?= home_url( '/informacion/' ) ?>" role="button">Busca un documento <i class="fas fa-eye"></i></a>
                  </td>
                </tr>
              </table>
          </div>
          </div>
        </div>





        <!-- ANTI CORRUPCION  -->
    <div class="anticorrupcionContainer">
      <div class="container">
        <div clasS="row">
          <div class="col-md-7 col-sm-12">
            <table>
              <tr>
                <td>
                  <h4>POLÍTICA NACIONAL <span>ANTICORRUPCIÓN</span></h4>
                  <!-- <p>Después de meses de consulta a expertos, organizaciones de la sociedad civil y  ciudadanos; la <b>SESNA</b> y la <b>Comisión Ejecutiva</b> presentaron la propuesta a la <b>Política Nacional Anticorrupción al Comité Coordinador del SNA</b>, misma que fue aprobada el <b>martes 07 de febrero 2019.</b></p> -->

                  <a class="btn btn-light trata" href="/politica-nacional-anticorrupcion/" role="button">Conócela <i class="fas fa-eye"></i></a>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-sm-12 col-md-1 .d-sm-none .d-md-block"></div>
          <div class="col-sm-12 col-md-4">
            <img class="anticorrupcion" src="<?php echo function_exists('get_field') && get_field('imagen_home_pna', 'option') ? get_field('imagen_home_pna', 'option') : get_stylesheet_directory_uri() . '/img/pna/bannerPNA1.png'; ?>" alt="anticorrupcion"/>
          </div>
        </div>
      </div>
    </div>





      <!-- CONOCENOS    -->
      <div class="conocenosContainer">
        <img class="tx_2" src="<?php bloginfo('stylesheet_directory') ?>/img/home_sesna/Tx_2.png" alt="Tx_2"/>
        <div class="container" id="conocenos">
          <div clasS="row">
            <div class="col-sm-12 col-md-6">
              <img class="politicos" src="<?php echo function_exists('get_field') && get_field('imagen_home_conocenos', 'option') ? get_field('imagen_home_conocenos', 'option') : get_stylesheet_directory_uri() . '/img/conocenos/conocenos.png'; ?>" alt="politicos"/>
            </div>
            <div class="col-sm-12 col-md-1 .d-sm-none .d-md-block"></div>
            <div class="col-md-5 col-sm-12">
              <table>
                <tr>
                  <td>
                    <h4><span>CONÓCENOS</span></h4>
                    <p>Somos un equipo de abogados, economistas, politólogos, comunicólogos, programadores, entre otros profesionales, trabajando juntos para combatir la corrupción en México.</p>
                    <a class="btn btn-light leermas" href="/conocenos" role="button">Conoce al equipo <i class="fas fa-eye"></i></a>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

<!-- Modal DATATON 2023 -->
<div class="modal fade" id="modalDataton">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #fff; color:#54565a">
            <div class="modal-header" style="display: flex; padding: 0.3em 0.5rem;">
                <!-- <h4 class="modal-title">#Datatón2023</h4> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><a style="color:#0071bf; text-decoration-line: none;" href="https://dataton2025.plataformadigitalnacional.org/" target="_blank"><strong>¡Participa en el Datatón Anticorrupción 2023!</strong> 🚀🚀🚀<img src="https://www.sesna.gob.mx/wp-content/uploads/2025/11/dataton-2025-que-es.png" class="img-fluid" alt="Responsive image" style="margin-top: 10px; max-width: 75%;">
</a></h3>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
