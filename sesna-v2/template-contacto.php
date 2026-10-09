<?php
/*
Template Name: Contacto
*/

get_header();
?>

 
<div class="page-contacto front-page-bg pb-5">
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ol class="breadcrumb mb--0">
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/') ) ?>">
                        <i class="snd snd-home" aria-hidden="true"></i> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Contacto</li>
            </ol>
        </div>
    </nav>

    <div class="contenedor py--24">
        <div class="reticulaGrid__12 align-items-center mb--24">
            <div class="columna__12 position-relative z-1">
                <h1 class="sesna-hero__title">Contacto</h1>
                <div class="hero-separator"></div>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb--48 tx-unidad-card">
            <div class="reticulaGrid__12">
                <div class="columna__12 columna__6--lg p--24 p--48--md muestra--flex flex-direction-column justify-content-center">
                    
                    <p class="color--neutro600 mb--24">
                        Conoce los medios oficiales de contacto de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción, así como la ubicación de sus oficinas y los horarios de atención para asuntos relacionados con el ejercicio de sus atribuciones.
                    </p>
                    
                    <hr class="mb--24 text-burgundi opacity-25">
                    
                    <div class="muestra--flex flex-direction-column gap--24">
                        
                        <div class="muestra--flex align-items-start">
                            <div class="rounded-circle muestra--flex align-items-center justify-content-center me--16 tx-unidad-icon-circle flex-shrink-0" style="width: 50px; height: 50px;">
                                <i class="snd snd-location fs-4" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h5 class="peso--negrita mb--8 color--pguinda600 h5">Dirección:</h5>
                                <p class="color--neutro600 mb--0">
                                    Viaducto Presidente Miguel Alemán Valdés, No.105<br>
                                    Col. Escandón Sección 1, Alcaldía Miguel Hidalgo,<br>
                                    CP 11800, Ciudad de México.
                                </p>
                            </div>
                        </div>

                        <div class="muestra--flex align-items-center mt--24">
                            <div class="rounded-circle muestra--flex align-items-center justify-content-center me--16 tx-unidad-icon-circle flex-shrink-0" style="width: 50px; height: 50px;">
                                <i class="snd snd-phone fs-4" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h5 class="peso--negrita mb--8 color--pguinda600 h5">Teléfono:</h5>
                                <a href="tel:5551315645" class="color--neutro600 decoracion--ninguna">55 5131 5645</a>
                            </div>
                        </div>
                        
                        <div class="muestra--flex align-items-start mt--24">
                            <div class="rounded-circle muestra--flex align-items-center justify-content-center me--16 tx-unidad-icon-circle flex-shrink-0" style="width: 50px; height: 50px;">
                                <i class="snd snd-timer fs-4" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h5 class="peso--negrita mb--8 color--pguinda600 h5">Horarios:</h5>
                                <p class="color--neutro600 mb--0">
                                    Lunes a jueves de 9:00 a 14:00 y de 15:30 a 19:00<br>
                                    Viernes de 9:00 a 15:00
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="columna__12 columna__6--lg px--24 pb--24 pt--0 p--48--lg muestra--flex align-items-stretch">
                    <div class="ancho--100 alto--100 rounded-4 overflow-hidden position-relative sombraLV1 tx-unidad-map-container" style="background-color: #eee;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.1557022066127!2d-99.17698038509923!3d19.398939786903697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff745bbdfbbd%3A0xc6c4f0393b4ffdb8!2sViaducto%20Presidente%20Miguel%20Alem%C3%A1n%20Vald%C3%A9s%20105%2C%20Escand%C3%B3n%20I%20Secc%2C%20Miguel%20Hidalgo%2C%2011800%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses!2smx!4v1689270000000!5m2!1ses!2smx" width="100%" height="100%" style="border:0; position: absolute; top:0; left:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <div class="posicion--relativa muestra--flex align-items-center px--24 px--48--md py--24 mt--8" style="background-color: #fbf4f5; overflow: hidden;">
                <div class="muestra--flex align-items-center posicion--relativa z-1 ancho--100 pe--48--lg">
                    <div class="rounded-circle muestra--flex align-items-center justify-content-center me--16 flex-shrink-0 tx-unidad-icon-circle" style="width: 50px; height: 50px;">
                        <i class="snd snd-security fs-4" aria-hidden="true"></i>
                    </div>
                    <p class="mb--0 peso--medio color--neutro800">
                        Nuestro compromiso es promover la transparencia, la rendición de cuentas<br class="oculta muestra--block--md">y la participación ciudadana.
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
