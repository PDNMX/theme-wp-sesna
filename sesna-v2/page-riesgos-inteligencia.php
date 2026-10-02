<?php
/**
 * Template Name: Riesgos e Inteligencia
 *
 * @package sesna
 */

get_header(); ?>

<div class="page-riesgos-inteligencia front-page-bg" style="min-height: 100vh;">

    <!-- Breadcrumb -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"><svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Riesgos e Inteligencia Anticorrupción</li>
            </ol>
        </div>
    </nav>

    <!-- Hero Banner -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="fila align-items-center">
                <div class="columna__6--lg columna__8--md position-relative z-1">
                    <h1 class="sesna-hero__title">Riesgos e <br>Inteligencia Anticorrupción</h1>
                    <div class="hero-separator"></div>
                    <p class="sesna-hero__subtitle">
                        Se identifican y analizan riesgos de corrupción para generar herramientas y acciones de prevención en sectores prioritarios.
                    </p>
                </div>
                <div class="columna__6--lg columna__4--md d-none d-md-flex align-items-center justify-content-end position-relative">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/' . rawurlencode('Riegos e Inteligencia Encabezado.png') ); ?>"
                         alt="Riesgos e Inteligencia Anticorrupción"
                         class="sesna-hero__img"
                         loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- Documentos Section -->
    <section class="contenedor mb--48">
        <div class="d-flex align-items-center mb-4">
            <svg class="text-guinda me-3 flex-shrink-0" style="font-size: 32px; line-height: 1;" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
            <h2 class="cp-recursos__titulo m-0 me-4">Documentos</h2>

            <!-- Separador vertical en desktop -->
            <div class="d-none d-md-block flex-shrink-0 me-4" style="width: 1px; height: 45px; background-color: #ccc;"></div>

            <!-- Texto descriptivo desktop -->
            <div class="tx-hero__subtitle text-muted d-none d-md-block" style="max-width: 600px;">
                Consulta análisis y documentos técnicos elaborados para la identificación y prevención de riesgos de corrupción.
            </div>
        </div>

        <!-- Texto descriptivo mobile -->
        <div class="tx-hero__subtitle text-muted d-block d-md-none mb-4">
            Consulta análisis y documentos técnicos elaborados para la identificación y prevención de riesgos de corrupción.
        </div>

        <div class="fila gap--24 pt-4">
            <!-- Card 1 -->
            <div class="col-lg-3 col-md-6">
                <a href="javascript:void(0)" data-target="#sec-contrataciones" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark sna-tab-trigger">
                    <div class="icon-bg-circle mb-4">
                        <svg class="tx-card__icon" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/></svg>
                    </div>
                    <h5 class="tx-card__title mb-3">Contrataciones<br>públicas</h5>
                    <p class="tx-card__desc text-muted mb-4">Análisis, estudios y propuestas metodológicas sobre riesgos en contrataciones públicas.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <svg class="ms-2" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></span>
                </a>
            </div>
            <!-- Card 2 -->
            <div class="columna__3--lg columna__6--md">
                <a href="javascript:void(0)" data-target="#sec-conflicto" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark sna-tab-trigger">
                    <div class="icon-bg-circle mb-4">
                        <svg class="tx-card__icon" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/></svg>
                    </div>
                    <h5 class="tx-card__title mb-3">Conflicto<br>de interés</h5>
                    <p class="tx-card__desc text-muted mb-4">Diagnósticos y documentos técnicos para la prevención y gestión de conflictos de interés.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <svg class="ms-2" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></span>
                </a>
            </div>
            <!-- Card 3 -->
            <div class="columna__3--lg columna__6--md">
                <a href="javascript:void(0)" data-target="#sec-verificacion" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark sna-tab-trigger">
                    <div class="icon-bg-circle mb-4">
                        <svg class="tx-card__icon" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
  <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/></svg>
                    </div>
                    <h5 class="tx-card__title mb-3">Verificación<br>patrimonial</h5>
                    <p class="tx-card__desc text-muted mb-4">Documentos y propuestas técnicas para fortalecer mecanismos de verificación patrimonial.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <svg class="ms-2" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></span>
                </a>
            </div>
            <!-- Card 4 -->
            <div class="columna__3--lg columna__6--md">
                <a href="javascript:void(0)" data-target="#sec-deporte" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark sna-tab-trigger">
                    <div class="icon-bg-circle mb-4">
                        <svg class="tx-card__icon" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2"/></svg>
                    </div>
                    <h5 class="tx-card__title mb-3">Deporte</h5>
                    <p class="tx-card__desc text-muted mb-4">Guías y herramientas para la prevención de riesgos de corrupción e integridad en el sector deporte.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <svg class="ms-2" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Filtro por subsección (chips) de "Recursos metodológicos" -->
    <style>
        .cp-subsec-filtros {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
        }
        .cp-subsec-chip {
            font-family: var(--font-montserrat);
            font-size: 14px;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 20px;
            border: 1px solid var(--color-burgundi);
            background: #fff;
            color: var(--color-burgundi);
            cursor: pointer;
            transition: background-color .2s ease, color .2s ease;
        }
        .cp-subsec-chip:hover {
            background: rgba(157, 36, 73, 0.08);
        }
        .cp-subsec-chip.is-active {
            background: var(--color-burgundi);
            border-color: var(--color-burgundi);
            color: #fff;
        }

        /* Enlace externo (no es un documento descargable) dentro de una subsección */
        .cp-subsec-enlace {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px 20px;
            padding: 18px 24px;
            border: 1px solid var(--color-teal);
            border-radius: 8px;
            background: rgba(30, 91, 79, 0.06);
        }
        .cp-subsec-enlace__icono {
            width: 44px;
            height: 44px;
            min-width: 44px;
            border-radius: 50%;
            background: var(--color-teal);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }
        .cp-subsec-enlace__texto {
            flex: 1;
            min-width: 200px;
        }
        .cp-subsec-enlace__badge {
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            color: var(--color-teal);
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 4px;
        }
        .cp-subsec-enlace__titulo {
            font-family: var(--font-montserrat);
            font-size: 17px;
            font-weight: 700;
            color: var(--color-negro);
            margin: 0;
        }
    </style>

    <!-- CONTENEDORES DINÁMICOS -->
    <div id="dinamic-content-wrapper" class="contenedor mt-5 mb-5 pt-4 border-top" style="display: none; scroll-margin-top: 100px;">

        <div id="sec-contrataciones" class="dinamic-section" style="display: none;">
            <!-- Texto descriptivo -->
            <div class="columna__8--lg columna__7--md position-relative z-1">
                <h1 class="sesna-hero__title">Contrataciones públicas</h1>
                <div class="hero-separator"></div>
                <p class="sesna-hero__subtitle mb-3" style="max-width: 600px;">El macroproceso de contrataciones públicas no es sencillo, ya que en él intervienen múltiples subprocesos y actividades específicas. En ese sentido, la implementación de actividades de mejora y control deben estar presentes en múltiples aristas del procedimiento, para asegurar un cambio integral, que permita fortalecerlos, con el fin de mejorar la calidad del gasto, promover la competencia y estimular la transparencia.</p>
                <p class="sesna-hero__subtitle mb-0" style="max-width: 600px;">Para contribuir con lo anterior se han elaborado los siguientes recursos:</p>
            </div>

            <!-- ── Recursos disponibles ──────────────────────────────── -->
            <section class="cp-recursos py-4 pb-5">
                <div class="contenedor">

                    <!-- Encabezado de sección -->
                    <div class="cp-recursos__header mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="cp-recursos__icono-box">
                                <svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7z"/></svg>
                            </div>
                            <div>
                                <h2 class="cp-recursos__titulo mb-0">Recursos disponibles</h2>
                                <div class="cp-recursos__linea"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Lista de documentos -->
                    <div class="cp-docs-lista">

                        <?php
                        $recursos_contrataciones = sesna_get_recursos_por_seccion('contrataciones');
                        foreach ( $recursos_contrataciones as $recurso ) :
                            sesna_render_recurso_card( $recurso );
                        endforeach;
                        ?>

                    </div><!-- /.cp-docs-lista -->

                </div>
            </section>

            <!-- ── Nota informativa ──────────────────────────────────── -->
            <div class="cp-nota pb-5">
                <div class="contenedor">
                    <div class="cp-nota__inner">
                        <svg class="cp-nota__icono" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/></svg>
                        <p class="cp-nota__texto mb-0">Estos recursos forman parte del trabajo técnico de la SESNA para fortalecer la integridad en los procesos de contratación pública y prevenir riesgos de corrupción.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="sec-verificacion" class="dinamic-section" style="display: none;">
            <!-- ── Recursos metodológicos ─────────────────────────────── -->
            <section class="cp-recursos py-4 pb-5">
                <div class="contenedor">

                    <div class="cp-recursos__header mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="cp-recursos__icono-box">
                                <svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7z"/></svg>
                            </div>
                            <div>
                                <h2 class="cp-recursos__titulo mb-0">Recursos metodológicos</h2>
                                <div class="cp-recursos__linea"></div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $recursos_verificacion     = sesna_get_recursos_por_seccion('verificacion');
                    $subsecciones_verificacion = array();
                    foreach ( $recursos_verificacion as $recurso ) {
                        $nombre_subseccion = get_post_meta( $recurso->ID, '_sesna_recurso_subseccion', true );
                        if ( ! empty( $nombre_subseccion ) && ! in_array( $nombre_subseccion, $subsecciones_verificacion, true ) ) {
                            $subsecciones_verificacion[] = $nombre_subseccion;
                        }
                    }
                    ?>

                    <!-- Filtro por subsección -->
                    <?php if ( ! empty( $subsecciones_verificacion ) ) : ?>
                    <div class="cp-subsec-filtros" id="vp-metodologicos-filtros">
                        <?php foreach ( $subsecciones_verificacion as $indice => $nombre_subseccion ) : ?>
                        <button type="button" class="cp-subsec-chip<?php echo $indice === 0 ? ' is-active' : ''; ?>" data-filter="<?php echo esc_attr( $nombre_subseccion ); ?>"><?php echo esc_html( $nombre_subseccion ); ?></button>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <div class="cp-docs-lista" id="vp-metodologicos-lista">

                        <!-- Enlace externo (no es un documento): herramienta ALEA -->
                        <div class="cp-subsec-enlace" data-subseccion="ALEA, Muestreo Aleatorio Simple">
                            <div class="cp-subsec-enlace__icono">
                                <svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z"/>
  <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z"/></svg>
                            </div>
                            <div class="cp-subsec-enlace__texto">
                                <span class="cp-subsec-enlace__badge">Enlace externo</span>
                                <p class="cp-subsec-enlace__titulo">ALEA, Muestreo Aleatorio Simple</p>
                            </div>
                            <a href="https://alea.sesna.gob.mx" class="btn-sesna" target="_blank" rel="noopener">
                                Visitar sitio <svg class="ms-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
  <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/></svg>
                            </a>
                        </div>

                        <?php foreach ( $recursos_verificacion as $recurso ) : sesna_render_recurso_card( $recurso ); endforeach; ?>
                    </div>

                </div>
            </section>

            <!-- ── Nota informativa ──────────────────────────────────── -->
            <div class="cp-nota pb-5">
                <div class="contenedor">
                    <div class="cp-nota__inner">
                        <svg class="cp-nota__icono" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/></svg>
                        <p class="cp-nota__texto mb-0">Esta herramienta y los documentos asociados forman parte del trabajo técnico de la SESNA para fortalecer la integridad en el servicio público y prevenir riesgos de corrupción.</p>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $recursos_conflicto = sesna_get_recursos_por_seccion('conflicto');
        ?>
        <div id="sec-conflicto" class="dinamic-section" style="display: none;">
            <?php if ( ! empty( $recursos_conflicto ) ) : ?>
            <section class="cp-recursos py-4 pb-5">
                <div class="contenedor">

                    <div class="cp-recursos__header mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="cp-recursos__icono-box">
                                <svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7z"/></svg>
                            </div>
                            <div>
                                <h2 class="cp-recursos__titulo mb-0">Recursos disponibles</h2>
                                <div class="cp-recursos__linea"></div>
                            </div>
                        </div>
                    </div>

                    <div class="cp-docs-lista">
                        <?php foreach ( $recursos_conflicto as $recurso ) : sesna_render_recurso_card( $recurso ); endforeach; ?>
                    </div>

                </div>
            </section>
            <?php else : ?>
            <div class="text-center py-5">
                <svg class="text-muted mb-3" style="font-size: 3rem;" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/></svg>
                <h3 class="fw-bold">Contenido en construcción</h3>
                <p class="text-muted">Los recursos para Conflicto de interés estarán disponibles próximamente.</p>
            </div>
            <?php endif; ?>
        </div>

        <?php
        $recursos_deporte = sesna_get_recursos_por_seccion('deporte');
        ?>
        <div id="sec-deporte" class="dinamic-section" style="display: none;">
            <?php if ( ! empty( $recursos_deporte ) ) : ?>
            <section class="cp-recursos py-4 pb-5">
                <div class="contenedor">

                    <div class="cp-recursos__header mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="cp-recursos__icono-box">
                                <svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7z"/></svg>
                            </div>
                            <div>
                                <h2 class="cp-recursos__titulo mb-0">Recursos disponibles</h2>
                                <div class="cp-recursos__linea"></div>
                            </div>
                        </div>
                    </div>

                    <div class="cp-docs-lista">
                        <?php foreach ( $recursos_deporte as $recurso ) : sesna_render_recurso_card( $recurso ); endforeach; ?>
                    </div>

                </div>
            </section>
            <?php else : ?>
            <div class="text-center py-5">
                <svg class="text-muted mb-3" style="font-size: 3rem;" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/></svg>
                <h3 class="fw-bold">Contenido en construcción</h3>
                <p class="text-muted">Los recursos para Deporte estarán disponibles próximamente.</p>
            </div>
            <?php endif; ?>
        </div>

    </div>

    <!-- JAVASCRIPT PARA PESTAÑAS -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const triggers = document.querySelectorAll('.sna-tab-trigger');
        const sections = document.querySelectorAll('.dinamic-section');
        const wrapper = document.getElementById('dinamic-content-wrapper');

        triggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();

                // Remover active de todas las tarjetas (opcional para estilo visual)
                triggers.forEach(t => t.style.boxShadow = '');
                this.style.boxShadow = '0 0 0 2px rgba(155, 34, 66, 1)'; // Estilo activo guinda

                // Ocultar todas las secciones
                sections.forEach(sec => sec.style.display = 'none');

                // Mostrar wrapper principal
                wrapper.style.display = 'block';

                // Mostrar sección seleccionada
                const targetId = this.getAttribute('data-target');
                const targetSec = document.querySelector(targetId);
                if (targetSec) {
                    targetSec.style.display = 'block';

                    // Hacer scroll suave hacia el contenido
                    wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Filtro por subsección (chips) de "Recursos metodológicos"
        const filtros = document.getElementById('vp-metodologicos-filtros');
        const lista = document.getElementById('vp-metodologicos-lista');
        if (filtros && lista) {
            const chips = filtros.querySelectorAll('.cp-subsec-chip');
            const items = lista.querySelectorAll('[data-subseccion]');

            const aplicarFiltro = (filtro) => {
                items.forEach(item => {
                    const coincide = !filtro || item.getAttribute('data-subseccion') === filtro;
                    item.style.display = coincide ? '' : 'none';
                });
            };

            chips.forEach(chip => {
                chip.addEventListener('click', function() {
                    const yaActivo = this.classList.contains('is-active');
                    chips.forEach(c => c.classList.remove('is-active'));

                    // Clic sobre el chip ya activo = quitar filtro (mostrar todos)
                    const filtro = yaActivo ? '' : this.getAttribute('data-filter');
                    if (!yaActivo) {
                        this.classList.add('is-active');
                    }

                    aplicarFiltro(filtro);
                });
            });

            // Estado inicial: el primer chip viene marcado "is-active" desde PHP,
            // así que por default solo se ve esa subsección (ej. "ALEA").
            const chipActivoInicial = filtros.querySelector('.cp-subsec-chip.is-active');
            if (chipActivoInicial) {
                aplicarFiltro(chipActivoInicial.getAttribute('data-filter'));
            }
        }
    });
    </script>

</div>

<?php get_footer(); ?>
