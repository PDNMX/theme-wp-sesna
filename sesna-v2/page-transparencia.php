<?php
/*
 * Landing de la sección Transparencia — se aplica automáticamente a la página
 * con slug "transparencia" (convención page-{slug}.php de WordPress).
 *
 * CAMBIÓ   : diseño completo (hero diagonal, accesos rápidos, buscador,
 *             consulta pública, banda de contacto) + guía gráfica GOB.mx v3.
 * CONSERVÓ : get_header(), get_footer(); parciales header.php y denuncia.php
 *             intactos (no se incluyen aquí).
 * HIJOS    : ningún subtemplate (comite, unidad, solicitudes, etc.) usa las
 *             clases .tx-* ni .page-transparencia — sin riesgo de regresión.
 */

get_header();

/* Accesos rápidos — 8 tarjetas fijas de la maqueta.
 * Links en '#' hasta que se definan las URLs definitivas. */
$tx_cards = [
    ['icon' => 'bi-people',            'title' => 'Comité de Transparencia',      'desc' => 'Sesiones, actas, resoluciones y criterios del Comité de Transparencia.'],
    ['icon' => 'bi-person-badge',      'title' => 'Unidad de Transparencia',       'desc' => 'Atención, orientación y canales de contacto con la Unidad.'],
    ['icon' => 'bi-file-earmark-text', 'title' => 'Solicitudes de Información',    'desc' => 'Presenta solicitudes de acceso a la información pública.'],
    ['icon' => 'bi-shield-lock',       'title' => 'Datos Personales',              'desc' => 'Consulta y ejerce tus derechos de privacidad y acceso ARCO.'],
    ['icon' => 'bi-folder2-open',      'title' => 'Obligaciones de Transparencia', 'desc' => 'Información pública de oficio según el (T&#237;tulo Quinto LGTAIP).'],
    ['icon' => 'bi-book',              'title' => 'Normativa',                     'desc' => 'Leyes, lineamientos y normas en materia de transparencia.'],
    ['icon' => 'bi-archive',           'title' => 'Archivos',                      'desc' => 'Gestión, resguardo y consulta de documentos históricos.'],
    ['icon' => 'bi-bell',              'title' => 'Denuncias',                     'desc' => 'Reporta incumplimientos en las obligaciones de transparencia.'],
];
?>

<div class="page-transparencia has-fullbleed-hero">

    <!-- ============================================================
         1. HERO / BANNER PRINCIPAL
         ============================================================ -->
    <section class="tx-hero" aria-label="Encabezado de Transparencia y acceso a la información">

        <!-- PLACEHOLDER BANNER — sustituir por:
             background-image: url('ruta/imagen.jpg'); filter: grayscale(100%);
             en la regla .page-transparencia .tx-hero__bg dentro de main.css -->
        <div class="tx-hero__bg" role="img" aria-label="Pendiente: fotografía del banner"></div>
        <div class="tx-hero__overlay" aria-hidden="true"></div>
        <div class="tx-hero__accent"  aria-hidden="true"></div>

        <div class="container tx-hero__content">
            <div class="row align-items-center">

                <!-- Columna izquierda: logo (zona visible antes del corte diagonal) -->
                <div class="col-md-4 col-lg-5 d-none d-md-flex justify-content-center align-items-center">                   
                </div>

                <!-- Columna derecha: texto sobre el overlay oscuro -->
                <div class="col-12 col-md-8 col-lg-7">
                    <h1 class="tx-hero__title">
                        Transparencia y acceso a la información
                    </h1>
                    <p class="tx-hero__subtitle">
                        Consulta información pública de la SESNA de manera clara, accesible y actualizada.
                    </p>
                    <a href="https://www.plataformadetransparencia.org.mx/group/guest/crear-solicitud"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="tx-hero__cta"
                       aria-label="Solicitar información (abre la Plataforma Nacional de Transparencia en nueva ventana)">
                        <span class="bootstrap-icons" aria-hidden="true">
                            <i class="bi bi-file-earmark-arrow-up"></i>
                        </span>
                        Solicitar información &rsaquo;
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         2. ACCESOS RÁPIDOS
         ============================================================ -->
    <section class="tx-accesos py-5" aria-labelledby="tx-accesos-titulo">
        <div class="container">
            <h2 class="tx-section-title" id="tx-accesos-titulo">Accesos rápidos</h2>

            <div class="row g-4 mt-3">
                <?php foreach ( $tx_cards as $card ) : ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="#" class="tx-card h-100 d-flex flex-column" aria-label="<?= esc_attr( $card['title'] ) ?>">
                        <span class="bootstrap-icons tx-card__icon mb-3" aria-hidden="true">
                            <i class="bi <?= esc_attr( $card['icon'] ) ?>"></i>
                        </span>
                        <strong class="tx-card__title d-block mb-2"><?= esc_html( $card['title'] ) ?></strong>
                        <p class="tx-card__desc flex-grow-1 mb-0"><?= esc_html( $card['desc'] ) ?></p>
                        <span class="tx-card__arrow mt-3 align-self-end" aria-hidden="true">&rsaquo;</span>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ============================================================
         3. BUSCADOR
         ============================================================ -->
    <section class="tx-search py-5" aria-label="Buscador de información de transparencia">
        <div class="container">
            <div class="tx-search__box">
            <div class="row align-items-center g-4">
                <div class="col-auto">
                    <div class="tx-search__circle" aria-hidden="true">
                        <span class="bootstrap-icons">
                            <i class="bi bi-search"></i>
                        </span>
                    </div>
                </div>
                <div class="col">
                    <p class="tx-search__label">¿Qué información estás buscando?</p>
                    <form role="search"
                          method="get"
                          action="<?= esc_url( home_url( '/' ) ) ?>"
                          class="tx-search__form">
                        <label for="tx-search-input" class="visually-hidden">Buscar en transparencia</label>
                        <input type="text"
                               id="tx-search-input"
                               name="s"
                               class="tx-search__input"
                               placeholder="Buscar por palabra clave, documento, acta, obligación, resolución...">
                        <button type="submit" class="tx-search__btn">
                            <span class="bootstrap-icons" aria-hidden="true">
                                <i class="bi bi-search"></i>
                            </span>
                            Buscar
                        </button>
                    </form>
                </div>
            </div>
            </div><!-- /.tx-search__box -->
        </div>
    </section>

    <!-- ============================================================
         4. CONSULTA INFORMACIÓN PÚBLICA
         ============================================================ -->
    <section class="tx-consulta py-5" aria-labelledby="tx-consulta-titulo">
        <div class="container">
            <h2 class="tx-section-title" id="tx-consulta-titulo">Consulta información pública</h2>

            <div class="row g-4 mt-2">

                <div class="col-12 col-md-6">
                    <div class="tx-consulta-card h-100">
                        <div class="d-flex align-items-start gap-3">
                            <div class="tx-consulta-card__icon-wrap flex-shrink-0" aria-hidden="true">
                                <span class="bootstrap-icons">
                                    <i class="bi bi-people"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column h-100">
                                <strong class="tx-consulta-card__title">Transparencia para el Pueblo</strong>
                                <p class="tx-consulta-card__desc mt-2 flex-grow-1">
                                    Conoce el nuevo modelo nacional de transparencia y consulta información de interés público.
                                </p>
                                <div class="mt-3">
                                    <a href="<?= esc_url( get_option( 'options_url_transparencia_pueblo' ) ?: 'https://www.transparencia.gob.mx/' ) ?>"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="tx-consulta-card__btn"
                                       aria-label="Ir al portal de Transparencia para el Pueblo (abre en nueva ventana)">
                                        Ir al portal
                                        <span class="bootstrap-icons" aria-hidden="true">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="tx-consulta-card h-100">
                        <div class="d-flex align-items-start gap-3">
                            <div class="tx-consulta-card__icon-wrap flex-shrink-0" aria-hidden="true">
                                <span class="bootstrap-icons">
                                    <i class="bi bi-search"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column h-100">
                                <strong class="tx-consulta-card__title">Plataforma Nacional de Transparencia</strong>
                                <p class="tx-consulta-card__desc mt-2 flex-grow-1">
                                    Realiza solicitudes de información y consulta obligaciones de transparencia.
                                </p>
                                <div class="mt-3">
                                    <a href="https://www.plataformadetransparencia.org.mx/"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="tx-consulta-card__btn"
                                       aria-label="Acceder a la Plataforma Nacional de Transparencia (abre en nueva ventana)">
                                        Acceder
                                        <span class="bootstrap-icons" aria-hidden="true">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         5. BANDA DE CONTACTO
         ============================================================ -->
    <section class="tx-contacto py-4" aria-label="Datos de contacto de la Unidad de Transparencia">
        <div class="container">
            <div class="row align-items-center g-4 text-center text-md-start">

                <div class="col-12 col-md-4">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3">
                        <div class="tx-contacto__icon-wrap flex-shrink-0" aria-hidden="true">
                            <span class="bootstrap-icons">
                                <i class="bi bi-headset"></i>
                            </span>
                        </div>
                        <div>
                            <strong class="tx-contacto__name d-block">Unidad de Transparencia</strong>
                            <span class="tx-contacto__detail d-block">Estamos para ayudarte</span>
                            <span class="tx-contacto__detail d-block">Lunes a viernes de 9:00 a 18:00 h</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3">
                        <div class="tx-contacto__icon-wrap flex-shrink-0" aria-hidden="true">
                            <span class="bootstrap-icons">
                                <i class="bi bi-envelope"></i>
                            </span>
                        </div>
                        <div>
                            <a href="mailto:transparencia@sesna.gob.mx" class="tx-contacto__link">
                                transparencia@sesna.gob.mx
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3">
                        <div class="tx-contacto__icon-wrap flex-shrink-0" aria-hidden="true">
                            <span class="bootstrap-icons">
                                <i class="bi bi-telephone"></i>
                            </span>
                        </div>
                        <div>
                            <a href="tel:+525520003000" class="tx-contacto__link">
                                55 2000 3000<br>Ext. 1000
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div><!-- /.page-transparencia -->

<?php get_footer(); ?>
