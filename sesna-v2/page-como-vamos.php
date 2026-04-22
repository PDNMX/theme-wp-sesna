<?php
get_header();
?>

      <!--
      COMITE COORDINADOR
      -->

      <div class="container-fluid comovamoscontainer" id="comite_coordinador">
        <div class="container">
          <div class="row">
            <div class="col-12" align="center">
              <h1 class="title-vamos">¿Cómo vamos?</h1>
              <h2 class="comite-title">Sesiones del <span>Comité Coordinador</span></h2>
            </div>
          </div>


          <div class="row">
           <div class="col-xl-3 col-6 mb-4">
              <div class="card-deck text-center">
                <div class="card mb-4 shadow-sm">
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= get_option('options_comite_sesiones') ?></h1>
                    <h4 class="my-0 font-weight-bold">SESIONES</h4>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-6 mb-4">
              <div class="card-deck text-center">
                <div class="card mb-4 shadow-sm">
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title"> <?= get_option('options_comite_acuerdos') ?></h1>
                    <h4 class="my-0 font-weight-bold">ACUERDOS</h4>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-6 mb-4">
              <div class="card-deck text-center">
                <div style="cursor: pointer;" class="card mb-4 shadow-sm" data-toggle="modal" data-target="#modal-recomendaciones">
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= get_option('options_comite_recomendaciones') ?></h1>
                    <h4 class="my-0 font-weight-bold">RECOMENDACIONES</h4>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-6 mb-4">
              <div class="card-deck text-center">
                <div style="cursor: pointer;" class="card mb-4 shadow-sm" data-toggle="modal" data-target="#modal-exhortos">
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= get_option('options_comite_exhortos') ?></h1>
                    <h4 class="my-0 font-weight-bold">EXHORTOS</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="container" >
        <div class="row fechas" >
          <div class="col-lg-4 col-sm-12"></div>
          <div class="col-lg-3 col-sm-6"><p>FILTRAR POR FECHA:</p></div>
          <div class="col-lg-2 col-sm-6"><input id="datepickerInicio" width="150"  /></div>
          <div class="col-lg-1 col-sm-6"><p>AL</p></div>
          <div class="col-lg-2 col-sm-6"><input id="datepickerFinal" width="150" /></div>
        </div>

        <div class="row titulosFilas">
          <div class="col col-lg-3 d-md-none d-lg-block"><div class="boxF"><p>EVENTO:</p></div></div>
          <div class="col-lg-9 d-md-none d-lg-block"><p>DESCARGAR DE RECURSOS: </p></div>
        </div>

        <div class="sesiones_container" id="sesiones_comite" data-page="0">

        </div>

        <div class="row" >
          <div class="col-12 loadSesiones" id="btn_sesiones_comite">
          <p>Cargar sesiones anteriores <i class="fas fa-redo-alt"></i></p>
          </div>
        </div>
      </div>



      <!--

          COMISION EJECUTIVA

      -->
    <div class="container-fluid comovamoscontainer" id="comision_ejecutiva">
        <div class="container">
            <div class="row">
            <div class="col-12" align="center">
                <h1 class="title-vamos">¿Cómo vamos?</h1>
                <h2 class="comite-title">Sesiones de la <span>Comisión Ejecutiva</span></h2>
            </div>
            </div>


            <div class="row">
            <div class="col-6">
                <div class="card-deck text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= get_option('options_comision_sesiones') ?></h1>
                    <h4 class="my-0 font-weight-bold">SESIONES</h4>
                    </div>
                </div>
                </div>
            </div>


            <div class="col-6">
                <div class="card-deck text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                    <h1 class="card-title pricing-card-title"> <?= get_option('options_comision_acuerdos') ?></h1>
                    <h4 class="my-0 font-weight-bold">ACUERDOS</h4>
                    </div>
                </div>
                </div>
            </div>

            <!-- <div class="col-xl-4 col-lg-4 col-md-12 ">
                <div class="card-deck text-center">
                  <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                      <h1 class="card-title pricing-card-title"><?= get_option('options_comision_exhortos') ?></h1>
                      <h4 class="my-0 font-weight-bold">EXHORTOS</h4>
                    </div>
                  </div>
              </div>
            </div> -->
            </div>
        </div>
    </div>



    <div class="container" >
        <div class="row fechas" >
          <div class="col-lg-4 col-sm-12"></div>
          <div class="col-lg-3 col-sm-6"><p>FILTRAR POR FECHA:</p></div>
          <div class="col-lg-2 col-sm-6"><input id="datepickerInicio2" width="150"  /></div>
          <div class="col-lg-1 col-sm-6"><p>AL</p></div>
          <div class="col-lg-2 col-sm-6"><input id="datepickerFinal2" width="150" /></div>
        </div>

        <div class="row titulosFilas">
          <div class="col col-lg-3 d-md-none d-lg-block"><div class="boxF"><p>EVENTO:</p></div></div>
          <div class="col-lg-9 d-md-none d-lg-block"><p>DESCARGAR DE RECURSOS: </p></div>
        </div>


        <div class="sesiones_container" id="sesiones_comision" data-page="0">
        </div>

        <div class="row" >
            <div class="col-12 loadSesiones" id="btn_sesiones_comision">
                <p>Cargar sesiones anteriores <i class="fas fa-redo-alt"></i></p>
            </div>
        </div>
    </div>

      <!--
      Órgano de Gobierno
      -->

      <div class="container-fluid comovamoscontainer" id="organo_gobierno">
        <div class="container">
            <div class="row">
            <div class="col-12" align="center">
                <h1 class="title-vamos">¿Cómo vamos?</h1>
                <h2 class="comite-title">Sesiones del <span>Órgano de Gobierno</span></h2>
            </div>
            </div>


            <div class="row">
            <div class="col-6">
                <div class="card-deck text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= get_option('options_organo_gobierno_sesiones') ?></h1>
                    <h4 class="my-0 font-weight-bold">SESIONES</h4>
                    </div>
                </div>
                </div>
            </div>


            <div class="col-6">
                <div class="card-deck text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= get_option('options_organo_gobierno_acuerdos') ?></h1>
                    <h4 class="my-0 font-weight-bold">ACUERDOS</h4>
                    </div>
                </div>
                </div>
            </div>

            </div>
        </div>
    </div>



    <div class="container" >
        <div class="row fechas" >
          <div class="col-lg-4 col-sm-12"></div>
          <div class="col-lg-3 col-sm-6"><p>FILTRAR POR FECHA:</p></div>
          <div class="col-lg-2 col-sm-6"><input id="datepickerInicio3" width="150"  /></div>
          <div class="col-lg-1 col-sm-6"><p>AL</p></div>
          <div class="col-lg-2 col-sm-6"><input id="datepickerFinal3" width="150" /></div>
        </div>

        <div class="row titulosFilas">
          <div class="col col-lg-3 d-md-none d-lg-block"><div class="boxF"><p>EVENTO:</p></div></div>
          <div class="col-lg-9 d-md-none d-lg-block"><p>DESCARGAR DE RECURSOS: </p></div>
        </div>


        <div class="sesiones_container" id="sesiones_organo_gobierno" data-page="0">
        </div>

        <div class="row" >
            <div class="col-12 loadSesiones" id="btn_sesiones_organo_gobierno">
                <p>Cargar sesiones anteriores <i class="fas fa-redo-alt"></i></p>
            </div>
        </div>
    </div>




<!-- Modal RECOMENDACIONES -->
<div class="modal fade" id="modal-recomendaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="background-color: #fff">
         <div class="modal-header" style="display: flex;">
            <h5 style="color: #e2211c; font-weight: 550;" class="modal-title">RECOMENDACIONES</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" style="text-align: left;">
			 <h6><a target="_blank" href="/wp-content/uploads/2021/06/1.-recomen-jueces-y-magistrados.pdf" class="linkRecomendacionesExhortos">1.- Recomendación No Vinculante a las legislaturas de los estados, relacionada con la selección de jueces y magistrados (Informe Anual 2017)</a></h6>
			 <br>
			 <h6><a target="_blank" href="/wp-content/uploads/2021/08/2Recomen_Sist_locales_fiscalizacion.pdf" class="linkRecomendacionesExhortos">2.- Recomendación No Vinculante a los Congresos de las entidades federativas, para que se realicen las reformas legales conducentes para funcionamiento de los Sistemas Locales Anticorrupción (Informe Anual 2020)</a></h6>
             <br>
			 <h6><a target="_blank" href="/wp-content/uploads/2022/03/Recomen_PDN-27Ene2022.pdf" class="linkRecomendacionesExhortos">3.- Recomendación No Vinculante para interconectarse con la Plataforma Digital Nacional (Informe Anual 2021)</a></h6>
			  <br>
			 <h6><a target="_blank" href="/wp-content/uploads/2024/08/Recomendacion-no-vinculante.pdf" class="linkRecomendacionesExhortos">4.- Recomendación No Vinculante para la Óptima Integración de los Sistemas Locales Anticorrupción </a></h6>
		  </div>
      </div>
   </div>
</div>

<!-- Modal EXHORTOS -->
<div class="modal fade" id="modal-exhortos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="background-color: #fff">
         <div class="modal-header" style="display: flex;">
            <h5 style="color: #e2211c; font-weight: 550;" class="modal-title">EXHORTOS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" style="text-align: left;">
            <h6>
				<a target="_blank" href="/wp-content/uploads/2021/06/1.-Exhorto-Caso-Odebrecht.pdf" class="linkRecomendacionesExhortos">1.- Exhorto del caso Odebretch</a>
			 </h6>
         </div>
      </div>
   </div>
</div>

<?php
get_footer();
