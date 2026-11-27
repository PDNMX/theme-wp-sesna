<?php
/**
 * @package sesna
 */
?>
<section class="pt--48 pb--24 sesna-intro-section" aria-labelledby="sesna-home-main-title">
    <div class="contenedor">
        <div class="reticulaGrid__12 align-items-center">
            <div class="columna__12 columna__8--md columna__7--lg">
                <h1 class="h1b patria color--pguinda600 mb--16" id="sesna-home-main-title">Secretaría Ejecutiva del Sistema Nacional Anticorrupción</h1>
                <p class="sh1r texto--justify mb--24">
                    Organismo descentralizado que funge como órgano técnico de apoyo del Comité Coordinador del Sistema Nacional Anticorrupción, encargado de proveer insumos técnicos, metodologías y herramientas digitales para la prevención, detección y combate a la corrupción.
                </p>
                <div class="texto--centro texto--izquierda--md">
                    <a href="<?php echo esc_url( home_url( '/que-hacemos/' ) ); ?>" class="boton__primario boton--grande boton--redondeado">
                        Conoce a la SESNA
                    </a>
                </div>
            </div>
            <div class="columna__12 columna__4--md columna__5--lg muestra--ninguno muestra--flex--md align-items-center justify-content-end">
                <a href="<?php echo esc_url( home_url( '/que-hacemos/' ) ); ?>" class="sna-logo-link sesna-intro__logo-link" aria-label="Conoce qué hacemos en la Secretaría Ejecutiva del Sistema Nacional Anticorrupción">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/logo-sesna.svg' ); ?>"
                         alt="Secretaría Ejecutiva del Sistema Nacional Anticorrupción (SESNA)"
                         class="sesna-intro__logo"
                         width="420"
                         height="190">
                </a>
            </div>
        </div>
    </div>
</section>
