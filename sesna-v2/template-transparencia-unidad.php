<?php

/**
* Template Name: Transparencia - Unidad
*/

get_header();
?>

 
<div class="page-transparencia-unidad front-page-bg pb-5">
    <!-- Migas de pan (Breadcrumb) -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/') ) ?>">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/transparencia/') ) ?>">Transparencia</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Unidad de Transparencia</li>
            </ol>
        </div>
    </nav>

    <!-- Contenedor Principal -->
    <div class="contenedor py-4">
        
        <!-- Títulos -->
        <div class="fila mb-4">
            <div class="col-100">
                <h1 class="tx-section-title font-patria mb-2 tx-comite-title">Unidad de Transparencia</h1>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5 tx-unidad-card">
            <div class="fila gap--0">
                <!-- Columna Izquierda: Información -->
                <div class="columna__6--lg p-4 p-md-5 d-flex flex-column justify-content-center">
                    <p class="text-muted mb-4">
                        La Unidad de Transparencia es el área responsable de garantizar el derecho de acceso a la información pública y la protección de datos personales en la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.
                    </p>
                    
                    <hr class="mb-4 text-burgundi opacity-25">
                    
                    <!-- Lista de Datos -->
                    <div class="d-flex flex-column gap-4">
                        
                        <!-- Dirección -->
                        <div class="d-flex align-items-start">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 tx-unidad-icon-circle flex-shrink-0" style="width: 50px; height: 50px;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
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
                        
                        <!-- Teléfono -->
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 tx-unidad-icon-circle flex-shrink-0" style="width: 50px; height: 50px;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-burgundi h5">Teléfono:</h5>
                                <a href="tel:5581178100" class="text-muted text-decoration-none">55 5131 5645</a>
                            </div>
                        </div>
                        
                        <!-- Horarios -->
                        <div class="d-flex align-items-start">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 tx-unidad-icon-circle flex-shrink-0" style="width: 50px; height: 50px;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-burgundi h5">Horarios:</h5>
                                <p class="text-muted mb-0">
                                    Lunes a jueves de 9:00 a 14:00 y de 15:30 a 19:00<br>
                                    Viernes de 9:00 a 15:00
                                </p>
                            </div>
                        </div>
                        
                        <!-- Correo Electrónico -->
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 tx-unidad-icon-circle flex-shrink-0" style="width: 50px; height: 50px;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-burgundi h5">Correo Electrónico:</h5>
                                <a href="mailto:unidadtransparencia@sesna.gob.mx" class="text-muted text-decoration-none">unidadtransparencia@sesna.gob.mx</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Columna Derecha: Mapa -->
                <div class="columna__6--lg px-4 pb-4 pt-0 p-lg-5 d-flex align-items-stretch">
                    <div class="w-100 h-100 rounded-4 overflow-hidden position-relative shadow-sm tx-unidad-map-container" style="background-color: #eee;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.1557022066127!2d-99.17698038509923!3d19.398939786903697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff745bbdfbbd%3A0xc6c4f0393b4ffdb8!2sViaducto%20Presidente%20Miguel%20Alem%C3%A1n%20Vald%C3%A9s%20105%2C%20Escand%C3%B3n%20I%20Secc%2C%20Miguel%20Hidalgo%2C%2011800%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses!2smx!4v1689270000000!5m2!1ses!2smx" width="100%" height="100%" style="border:0; position: absolute; top:0; left:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <!-- Banner Inferior (Footer del card) -->
            <div class="position-relative d-flex align-items-center px-4 px-md-5 py-4 mt-2" style="background-color: #fbf4f5; overflow: hidden;">
                <div class="d-flex align-items-center position-relative z-1 w-100 pe-lg-5">
                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0 tx-unidad-icon-circle" style="width: 50px; height: 50px;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                    </div>
                    <p class="mb-0 fw-medium text-dark">
                        Nuestro compromiso es promover la transparencia, la rendición de cuentas<br class="d-none d-md-block">y la participación ciudadana.
                    </p>
                </div>
                
                <!-- Figuras decorativas guindas de la derecha -->
                <div class="tx-unidad-footer-bg-lighter"></div>
                <div class="tx-unidad-footer-bg-light"></div>
                <div class="tx-unidad-footer-bg"></div>
            </div>

        </div>
    </div>
</div>

<?php
get_footer();
