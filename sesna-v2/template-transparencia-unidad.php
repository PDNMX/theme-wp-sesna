<?php

/**
* Template Name: Transparencia - Unidad
*/

get_header();
?>

 
<div class="page-transparencia-unidad front-page-bg pb-5">
    <!-- Migas de pan (Breadcrumb) -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/') ) ?>">
                        <i class="bi bi-house-door"></i> Inicio
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
    <div class="container py-4">
        
        <!-- Títulos -->
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="tx-section-title font-patria mb-2 tx-comite-title">Unidad de Transparencia</h1>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5 tx-unidad-card">
            <div class="row g-0">
                <!-- Columna Izquierda: Información -->
                <div class="col-lg-6 p-4 p-md-5 d-flex flex-column justify-content-center">
                    <p class="text-muted mb-4">
                        La Unidad de Transparencia es el área responsable de garantizar el derecho de acceso a la información pública y la protección de datos personales en la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.
                    </p>
                    
                    <hr class="mb-4 text-burgundi opacity-25">
                    
                    <!-- Lista de Datos -->
                    <div class="d-flex flex-column gap-4">
                        
                        <!-- Dirección -->
                        <div class="d-flex align-items-start">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 tx-unidad-icon-circle flex-shrink-0" style="width: 50px; height: 50px;">
                                <i class="bi bi-geo-alt fs-4"></i>
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
                                <i class="bi bi-telephone fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-burgundi h5">Teléfono:</h5>
                                <a href="tel:5581178100" class="text-muted text-decoration-none">558117-8100 ext.1116</a>
                            </div>
                        </div>
                        
                        <!-- Horarios -->
                        <div class="d-flex align-items-start">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 tx-unidad-icon-circle flex-shrink-0" style="width: 50px; height: 50px;">
                                <i class="bi bi-clock fs-4"></i>
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
                                <i class="bi bi-envelope fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-burgundi h5">Correo Electrónico:</h5>
                                <a href="mailto:unidadtransparencia@sesna.gob.mx" class="text-muted text-decoration-none">unidadtransparencia@sesna.gob.mx</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Columna Derecha: Mapa -->
                <div class="col-lg-6 px-4 pb-4 pt-0 p-lg-5 d-flex align-items-stretch">
                    <div class="w-100 h-100 rounded-4 overflow-hidden position-relative shadow-sm tx-unidad-map-container" style="background-color: #eee;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.1557022066127!2d-99.17698038509923!3d19.398939786903697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff745bbdfbbd%3A0xc6c4f0393b4ffdb8!2sViaducto%20Presidente%20Miguel%20Alem%C3%A1n%20Vald%C3%A9s%20105%2C%20Escand%C3%B3n%20I%20Secc%2C%20Miguel%20Hidalgo%2C%2011800%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses!2smx!4v1689270000000!5m2!1ses!2smx" width="100%" height="100%" style="border:0; position: absolute; top:0; left:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <!-- Banner Inferior (Footer del card) -->
            <div class="position-relative d-flex align-items-center px-4 px-md-5 py-4 mt-2" style="background-color: #fbf4f5; overflow: hidden;">
                <div class="d-flex align-items-center position-relative z-1 w-100 pe-lg-5">
                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0 tx-unidad-icon-circle" style="width: 50px; height: 50px;">
                        <i class="bi bi-shield-lock fs-4"></i>
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
