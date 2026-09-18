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
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"><i class="bi bi-house-door"></i> Inicio</a>
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
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8 position-relative z-1">
                    <h1 class="sesna-hero__title">Riesgos e <br>Inteligencia Anticorrupción</h1>
                    <div class="hero-separator"></div>
                    <p class="sesna-hero__subtitle">
                        Se identifican y analizan riesgos de corrupción para generar herramientas y acciones de prevención en sectores prioritarios.
                    </p>
                </div>
                <div class="col-lg-6 col-md-4 d-none d-md-flex align-items-center justify-content-end position-relative">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/' . rawurlencode('Riegos e Inteligencia Encabezado.png') ); ?>"
                         alt="Riesgos e Inteligencia Anticorrupción"
                         class="sesna-hero__img"
                         loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- Documentos Section -->
    <section class="container mb-5">
        <div class="d-flex align-items-center mb-4">
            <i class="bi bi-file-earmark-text text-guinda me-3 flex-shrink-0" style="font-size: 32px; line-height: 1;"></i>
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

        <div class="row g-4 pt-4">
            <!-- Card 1 -->
            <div class="col-lg-3 col-md-6">
                <a href="javascript:void(0)" data-target="#sec-contrataciones" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark sna-tab-trigger">
                    <div class="icon-bg-circle mb-4">
                        <i class="bi bi-briefcase tx-card__icon"></i>
                    </div>
                    <h5 class="tx-card__title mb-3">Contrataciones<br>públicas</h5>
                    <p class="tx-card__desc text-muted mb-4">Análisis, estudios y propuestas metodológicas sobre riesgos en contrataciones públicas.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <i class="bi bi-arrow-right ms-2"></i></span>
                </a>
            </div>
            <!-- Card 2 -->
            <div class="col-lg-3 col-md-6">
                <a href="javascript:void(0)" data-target="#sec-conflicto" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark sna-tab-trigger">
                    <div class="icon-bg-circle mb-4">
                        <i class="bi bi-people tx-card__icon"></i>
                    </div>
                    <h5 class="tx-card__title mb-3">Conflicto<br>de interés</h5>
                    <p class="tx-card__desc text-muted mb-4">Diagnósticos y documentos técnicos para la prevención y gestión de conflictos de interés.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <i class="bi bi-arrow-right ms-2"></i></span>
                </a>
            </div>
            <!-- Card 3 -->
            <div class="col-lg-3 col-md-6">
                <a href="javascript:void(0)" data-target="#sec-verificacion" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark sna-tab-trigger">
                    <div class="icon-bg-circle mb-4">
                        <i class="bi bi-person-vcard tx-card__icon"></i>
                    </div>
                    <h5 class="tx-card__title mb-3">Verificación<br>patrimonial</h5>
                    <p class="tx-card__desc text-muted mb-4">Documentos y propuestas técnicas para fortalecer mecanismos de verificación patrimonial.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <i class="bi bi-arrow-right ms-2"></i></span>
                </a>
            </div>
            <!-- Card 4 -->
            <div class="col-lg-3 col-md-6">
                <a href="javascript:void(0)" data-target="#sec-deporte" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark sna-tab-trigger">
                    <div class="icon-bg-circle mb-4">
                        <i class="bi bi-activity tx-card__icon"></i>
                    </div>
                    <h5 class="tx-card__title mb-3">Deporte</h5>
                    <p class="tx-card__desc text-muted mb-4">Guías y herramientas para la prevención de riesgos de corrupción e integridad en el sector deporte.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <i class="bi bi-arrow-right ms-2"></i></span>
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
    <div id="dinamic-content-wrapper" class="container mt-5 mb-5 pt-4 border-top" style="display: none; scroll-margin-top: 100px;">

        <div id="sec-contrataciones" class="dinamic-section" style="display: none;">
            <!-- Texto descriptivo -->
            <div class="col-lg-8 col-md-7 position-relative z-1">
                <h1 class="sesna-hero__title">Contrataciones públicas</h1>
                <div class="hero-separator"></div>
                <p class="sesna-hero__subtitle mb-3" style="max-width: 600px;">El macroproceso de contrataciones públicas no es sencillo, ya que en él intervienen múltiples subprocesos y actividades específicas. En ese sentido, la implementación de actividades de mejora y control deben estar presentes en múltiples aristas del procedimiento, para asegurar un cambio integral, que permita fortalecerlos, con el fin de mejorar la calidad del gasto, promover la competencia y estimular la transparencia.</p>
                <p class="sesna-hero__subtitle mb-0" style="max-width: 600px;">Para contribuir con lo anterior se han elaborado los siguientes recursos:</p>
            </div>

            <!-- ── Recursos disponibles ──────────────────────────────── -->
            <section class="cp-recursos py-4 pb-5">
                <div class="container">

                    <!-- Encabezado de sección -->
                    <div class="cp-recursos__header mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="cp-recursos__icono-box">
                                <i class="bi bi-folder2-open"></i>
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
                <div class="container">
                    <div class="cp-nota__inner">
                        <i class="bi bi-info-circle-fill cp-nota__icono"></i>
                        <p class="cp-nota__texto mb-0">Estos recursos forman parte del trabajo técnico de la SESNA para fortalecer la integridad en los procesos de contratación pública y prevenir riesgos de corrupción.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="sec-verificacion" class="dinamic-section" style="display: none;">
            <!-- ── Recursos metodológicos ─────────────────────────────── -->
            <section class="cp-recursos py-4 pb-5">
                <div class="container">

                    <div class="cp-recursos__header mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="cp-recursos__icono-box">
                                <i class="bi bi-folder2-open"></i>
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
                                <i class="bi bi-link-45deg"></i>
                            </div>
                            <div class="cp-subsec-enlace__texto">
                                <span class="cp-subsec-enlace__badge">Enlace externo</span>
                                <p class="cp-subsec-enlace__titulo">ALEA, Muestreo Aleatorio Simple</p>
                            </div>
                            <a href="https://alea.sesna.gob.mx" class="btn-sesna" target="_blank" rel="noopener">
                                Visitar sitio <i class="bi bi-box-arrow-up-right ms-1"></i>
                            </a>
                        </div>

                        <?php foreach ( $recursos_verificacion as $recurso ) : sesna_render_recurso_card( $recurso ); endforeach; ?>
                    </div>

                </div>
            </section>

            <!-- ── Nota informativa ──────────────────────────────────── -->
            <div class="cp-nota pb-5">
                <div class="container">
                    <div class="cp-nota__inner">
                        <i class="bi bi-info-circle-fill cp-nota__icono"></i>
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
                <div class="container">

                    <div class="cp-recursos__header mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="cp-recursos__icono-box">
                                <i class="bi bi-folder2-open"></i>
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
                <i class="bi bi-tools text-muted mb-3" style="font-size: 3rem;"></i>
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
                <div class="container">

                    <div class="cp-recursos__header mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="cp-recursos__icono-box">
                                <i class="bi bi-folder2-open"></i>
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
                <i class="bi bi-tools text-muted mb-3" style="font-size: 3rem;"></i>
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
