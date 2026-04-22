<?php


get_header();
?>


    <?php
        get_template_part( 'template-parts/header', 'blog' );
    ?>



    <!--    LISTA DE ENTRADAS Y SIDEBAR  -->
    <div class="container" id="content">
        <div class="row">
          <div class="col-lg-9 col-sm-12 order-lg-1 order-sm-2 order-2">

          <div class="filtradoParametrosContainer">
              <div class="filtradoPersonalizado">
                <p>Busqueda: Intervalo personalizado</p>
                <p class="filtradoTexto">Desde <span class="desde_intervalo"></span> Hasta <span class="hasta_intervalo"></span></p><button class="clear_intervalo">Quitar filtro <i class="fas fa-times"></i></button>
              </div>

              <div class="filtradoFecha">
                <p>Búsqueda: Mes/Año</p>
                <p class="filtradoFechaTexto"></p><button class="clear_fecha">Remover filtro <i class="fas fa-times"></i></button>
              </div>

            </div>



          <div class="orderContainer">
              <div class="row">
                <div class="col-lg-3 col-sm-12">
                  <p>Busqueda por:</p>
                </div>
                <div class="col-lg-9 col-sm-12">

                  <select class="orderPost custom-select">
                    <option value="0">Más Recientes</option>
                    <option value="1">Última Semana</option>
                    <option value="2">Último Mes</option>
                    <option value="3">Último Año</option>
                    <option value="4">Intervalo Personalizado</option>
                  </select>
                </div>
              </div>
              <div class="collapse" id="collapseIntervalo">
                <div class="periodoP">
                  <p>Periodo personalizado</p>
                  <form class="orderPostForm">
                    <div class="row"><div class="col-sm-12 col-lg-3"><label>Desde</label></div><div class="col-sm-12 col-lg-6"><input id="datepickerInicio" width="150"  /></div></div>
                    <div class="row"><div class="col-sm-12 col-lg-3"><label>Hasta</label></div><div class="col-sm-12 col-lg-6"><input id="datepickerFinal" width="150"  /></div></div>
                    <!-- <div class="row">
                      <div class="col-sm-12 col-lg-3"><label>&nbsp;</label></div><div class="col-sm-12 col-lg-6"><input type="submit" name="" value="Ir" class="btn btn-light"></div>
                    </div> -->
                  </form>
                </div>
              </div>
            </div>

            <!--  MAIN  -->
            <div class="blogEntriesList">

              
            </div>  <!-- blog entries list  -->

            <div class="row" >
                <div class="col-12 loadMore" id="btn_load_more">
                  
                    <p>Cargar notas anteriores <i class="fas fa-redo-alt"></i></p>
                </div>
            </div>




          </div><!--  col-lg-9 col-sm-12 order-lg-1 order-sm-2   -->
          <div class="col-lg-3 col-sm-12 order-lg-2 order-sm-1 order-1 sidebar-archive">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
          </div>
        </div>
      </div>


<?php
get_footer();
