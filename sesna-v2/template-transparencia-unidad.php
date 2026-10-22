<?php
/**
 * Template Name: Transparencia - Unidad
 * Homologada al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 */

get_header();
?>

<div class="page-transparencia-unidad front-page-bg pb--40">

    <!-- Breadcrumb -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?= esc_url( home_url('/') ) ?>" class="ruta__a"><i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="ruta__li">
                    <a href="<?= esc_url( home_url('/transparencia/') ) ?>" class="ruta__a">Transparencia</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Unidad de Transparencia</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Unidad de Transparencia</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenedor Principal -->
    <div class="contenedor">
        <div class="reticulaGrid__12">
            <div class="columna__12">

                <!-- Card Principal — SND UI Kit (Cards *: 12022:57247 / 37597:51336) -->
                <div class="tx-unidad-card">

                    <div class="reticulaGrid__12 gap--0">
                        <!-- Columna Izquierda: Información -->
                        <div class="columna__12 columna__6--lg tx-unidad-card__body">
                            <p class="b1r color--neutro700 mb--24">
                                La Unidad de Transparencia es el área responsable de garantizar el derecho de acceso a la información pública y la protección de datos personales en la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.
                            </p>

                            <hr class="tx-unidad-divider mb--24">

                            <!-- Lista de Datos -->
                            <div class="tx-unidad-info-list">

                                <!-- Dirección -->
                                <div class="tx-unidad-info-item tx-unidad-info-item--top">
                                    <div class="tx-unidad-icon-circle" aria-hidden="true">
                                        <i class="snd__icono snd-location icono--24 color--pguinda600" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <h2 class="b1sb color--pguinda600 mb--4">Dirección:</h2>
                                        <p class="b1r color--neutro700 mb--0">
                                            Viaducto Presidente Miguel Alemán Valdés, No.105<br>
                                            Col. Escandón Sección 1, Alcaldía Miguel Hidalgo,<br>
                                            CP 11800, Ciudad de México.
                                        </p>
                                    </div>
                                </div>

                                <!-- Teléfono -->
                                <div class="tx-unidad-info-item">
                                    <div class="tx-unidad-icon-circle" aria-hidden="true">
                                        <i class="snd__icono snd-phone icono--24 color--pguinda600" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <h2 class="b1sb color--pguinda600 mb--4">Teléfono:</h2>
                                        <a href="tel:5551315645" class="b1r color--neutro800 tx-unidad-link">55 5131 5645</a>
                                    </div>
                                </div>

                                <!-- Horarios -->
                                <div class="tx-unidad-info-item tx-unidad-info-item--top">
                                    <div class="tx-unidad-icon-circle" aria-hidden="true">
                                        <i class="snd__icono snd-timer icono--24 color--pguinda600" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <h2 class="b1sb color--pguinda600 mb--4">Horarios:</h2>
                                        <p class="b1r color--neutro700 mb--0">
                                            Lunes a jueves de 9:00 a 14:00 y de 15:30 a 19:00<br>
                                            Viernes de 9:00 a 15:00
                                        </p>
                                    </div>
                                </div>

                                <!-- Correo Electrónico -->
                                <div class="tx-unidad-info-item">
                                    <div class="tx-unidad-icon-circle" aria-hidden="true">
                                        <i class="snd__icono snd-email icono--24 color--pguinda600" aria-hidden="true"></i>
                                    </div>
                                    <div>
                                        <h2 class="b1sb color--pguinda600 mb--4">Correo Electrónico:</h2>
                                        <a href="mailto:unidadtransparencia@sesna.gob.mx" class="b1r color--neutro800 tx-unidad-link">unidadtransparencia@sesna.gob.mx</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Columna Derecha: Mapa -->
                        <div class="columna__12 columna__6--lg tx-unidad-card__map-col">
                            <div class="tx-unidad-map-container">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.1557022066127!2d-99.17698038509923!3d19.398939786903697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff745bbdfbbd%3A0xc6c4f0393b4ffdb8!2sViaducto%20Presidente%20Miguel%20Alem%C3%A1n%20Vald%C3%A9s%20105%2C%20Escand%C3%B3n%20I%20Secc%2C%20Miguel%20Hidalgo%2C%2011800%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses!2smx!4v1689270000000!5m2!1ses!2smx" width="100%" height="100%" class="tx-unidad-map-iframe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Ubicación de la Unidad de Transparencia de la SESNA"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Banner Inferior (Footer del card) -->
                    <div class="tx-unidad-card__footer">
                        <div class="tx-unidad-card__footer-content">
                            <div class="tx-unidad-icon-circle tx-unidad-icon-circle--white" aria-hidden="true">
                                <i class="snd__icono snd-security icono--24 color--pguinda600" aria-hidden="true"></i>
                            </div>
                            <p class="b1sb color--neutro800 mb--0">
                                Nuestro compromiso es promover la transparencia, la rendición de cuentas<br class="muestra--ninguno muestra--bloque--md">y la participación ciudadana.
                            </p>
                        </div>

                        <!-- Figuras decorativas guindas de la derecha -->
                        <div class="tx-unidad-footer-bg-lighter" aria-hidden="true"></div>
                        <div class="tx-unidad-footer-bg-light" aria-hidden="true"></div>
                        <div class="tx-unidad-footer-bg" aria-hidden="true"></div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<?php
get_footer();
