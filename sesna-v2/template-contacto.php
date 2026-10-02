<?php
/*
Template Name: Contacto
*/

get_header();
?>

 
<div class="page-contacto front-page-bg pb-5">
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/') ) ?>">
                        <svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Contacto</li>
            </ol>
        </div>
    </nav>

    <div class="contenedor py-4">
        <div class="fila align-items-center mb-4">
            <div class="col-100 position-relative z-1">
                <h1 class="sesna-hero__title">Contacto</h1>
                <div class="hero-separator"></div>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5 tx-unidad-card">
            <div class="fila gap--0">
                <div class="columna__6--lg p-4 p-md-5 d-flex flex-column justify-content-center">
                    
                    <p class="text-muted mb-4">
                        Conoce los medios oficiales de contacto de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción, así como la ubicación de sus oficinas y los horarios de atención para asuntos relacionados con el ejercicio de sus atribuciones.
                    </p>
                    
                    <hr class="mb-4 text-burgundi opacity-25">
                    
                    <div class="d-flex flex-column gap-4">
                        
                        <div class="d-flex align-items-start">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 tx-unidad-icon-circle flex-shrink-0" style="width: 50px; height: 50px;">
                                <svg class="fs-4" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/></svg>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-burgundi h5">Dirección:</h5>
                                <p class="text-muted mb-0">
                                    Viaducto Presidente Miguel Alemán Valdés, No.105<br>
                                    Col. Escandón Sección 1, Alcaldía Miguel Hidalgo,<br>
                                    CP 11800, Ciudad de México.
                                </p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 tx-unidad-icon-circle flex-shrink-0" style="width: 50px; height: 50px;">
                                <svg class="fs-4" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/></svg>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-burgundi h5">Teléfono:</h5>
                                <a href="tel:5551315645" class="text-muted text-decoration-none">55 5131 5645</a>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 tx-unidad-icon-circle flex-shrink-0" style="width: 50px; height: 50px;">
                                <svg class="fs-4" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/></svg>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-burgundi h5">Horarios:</h5>
                                <p class="text-muted mb-0">
                                    Lunes a jueves de 9:00 a 14:00 y de 15:30 a 19:00<br>
                                    Viernes de 9:00 a 15:00
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="columna__6--lg px-4 pb-4 pt-0 p-lg-5 d-flex align-items-stretch">
                    <div class="w-100 h-100 rounded-4 overflow-hidden position-relative shadow-sm tx-unidad-map-container" style="background-color: #eee;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.1557022066127!2d-99.17698038509923!3d19.398939786903697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff745bbdfbbd%3A0xc6c4f0393b4ffdb8!2sViaducto%20Presidente%20Miguel%20Alem%C3%A1n%20Vald%C3%A9s%20105%2C%20Escand%C3%B3n%20I%20Secc%2C%20Miguel%20Hidalgo%2C%2011800%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses!2smx!4v1689270000000!5m2!1ses!2smx" width="100%" height="100%" style="border:0; position: absolute; top:0; left:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <div class="position-relative d-flex align-items-center px-4 px-md-5 py-4 mt-2" style="background-color: #fbf4f5; overflow: hidden;">
                <div class="d-flex align-items-center position-relative z-1 w-100 pe-lg-5">
                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0 tx-unidad-icon-circle" style="width: 50px; height: 50px;">
                        <svg class="fs-4" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56"/>
  <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415"/></svg>
                    </div>
                    <p class="mb-0 fw-medium text-dark">
                        Nuestro compromiso es promover la transparencia, la rendición de cuentas<br class="d-none d-md-block">y la participación ciudadana.
                    </p>
                </div>
                
                <div class="tx-unidad-footer-bg-lighter"></div>
                <div class="tx-unidad-footer-bg-light"></div>
                <div class="tx-unidad-footer-bg"></div>
            </div>

        </div>
    </div>
</div>

<?php
get_footer();
