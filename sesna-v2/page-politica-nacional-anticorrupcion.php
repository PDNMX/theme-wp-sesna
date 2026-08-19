<?php
/**
 * Template Name: PNA-Nueva
 *
 * @package sesna
 */

get_header();
?>

<div class="page-pna">

    <!-- Breadcrumb -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"><i class="bi bi-house-door" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Política Nacional Anticorrupción</li>
            </ol>
        </div>
    </nav>

    <!-- Hero -->
    <section class="sesna-page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 position-relative z-1">
                    <h1 class="sesna-hero__title">Política Nacional Anticorrupción</h1>
                    <div class="hero-separator"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Documento principal: portada + descarga -->
    <section class="pb-5">
        <div class="container">
            <div class="pna-doc-card">
                <div class="row g-4 align-items-center">

                    <!-- Portada -->
                    <div class="col-lg-4">
                        <div class="pna-doc-cover">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/pna_portada.png' ); ?>" alt="Portada Política Nacional Anticorrupción">
                        </div>
                    </div>

                    <!-- Detalle + descargas -->
                    <div class="col-lg-8">
                        <div class="pna-hero__badge">
                            <span class="pna-hero__badge-icon" aria-hidden="true">
                                <i class="bi bi-calendar-check"></i>
                            </span>
                            <div>
                                <p class="pna-hero__badge-title">Aprobada el 29 de enero de 2020</p>
                                <p class="pna-hero__badge-desc">por el Comité Coordinador del Sistema Nacional Anticorrupción.</p>
                            </div>
                        </div>

                        <hr class="my-3">

                        <p class="pna-doc-desc">
                            Documento estratégico de largo aliento que plasma la agenda del Estado mexicano en la materia.
                            Contiene el diagnóstico y las prioridades mínimas que orientan la actuación del SNA en materia
                            de prevención, detección, investigación y sanción de faltas administrativas y hechos de
                            corrupción, así como la fiscalización y el control de recursos públicos.
                        </p>

                        <div class="d-flex flex-wrap gap-3">
                            <a href="<?php echo esc_url( sesna_get_media_attachment_url( 'PNA-resumen-ejecutivo.pdf', '2020/01/PNA-resumen-ejecutivo.pdf' ) ); ?>" class="btn-sesna" target="_blank" rel="noopener">
                                <i class="bi bi-file-earmark-text" aria-hidden="true"></i> Resumen Ejecutivo
                            </a>
                            <a href="<?php echo esc_url( sesna_get_media_attachment_url( 'Política-Nacional-Anticorrupción.pdf', '2020/02/Política-Nacional-Anticorrupción.pdf' ) ); ?>" class="btn-sesna" target="_blank" rel="noopener">
                                <i class="bi bi-book" aria-hidden="true"></i> Documento Completo
                            </a>
                            <a href="<?php echo esc_url( sesna_get_media_attachment_url( 'Guía-diseño-PEA.pdf', '2020/02/Guía-diseño-PEA.pdf' ) ); ?>" class="btn-sesna" target="_blank" rel="noopener">
                                <i class="bi bi-phone" aria-hidden="true"></i> Guía para la elaboración de las PEA
                            </a>

                            <!-- Anexos -->
                            <div class="dropdown pna-anexos-dropdown">
                                <button class="btn btn-sesna dropdown-toggle" type="button" id="pnaAnexosDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-paperclip" aria-hidden="true"></i> Anexos
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="pnaAnexosDropdown">
                                    <li>
                                        <a class="dropdown-item" target="_blank" rel="noopener" href="<?php echo esc_url( sesna_get_media_attachment_url( '2-Anexo-1-Estadísticos-23012020.pdf', '2020/01/2-Anexo-1-Estadísticos-23012020.pdf' ) ); ?>">
                                            <i class="bi bi-download" aria-hidden="true"></i> Estadísticos
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" target="_blank" rel="noopener" href="<?php echo esc_url( sesna_get_media_attachment_url( '3-Anexo-2-Proceso-de-integración-de-la-PNA-23012020.pdf', '2020/01/3-Anexo-2-Proceso-de-integración-de-la-PNA-23012020.pdf' ) ); ?>">
                                            <i class="bi bi-download" aria-hidden="true"></i> Proceso de integración de la PNA
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" target="_blank" rel="noopener" href="<?php echo esc_url( sesna_get_media_attachment_url( '4-Anexo-3-Acciones-sugeridas-vf-29012020.pdf', '2020/01/4-Anexo-3-Acciones-sugeridas-vf-29012020.pdf' ) ); ?>">
                                            <i class="bi bi-download" aria-hidden="true"></i> Acciones sugeridas
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" target="_blank" rel="noopener" href="<?php echo esc_url( sesna_get_media_attachment_url( '5-Anexo-4-Acciones-ejecutivos-vf-29012020.pdf', '2020/01/5-Anexo-4-Acciones-ejecutivos-vf-29012020.pdf' ) ); ?>">
                                            <i class="bi bi-download" aria-hidden="true"></i> Acciones de poderes ejecutivos
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <p class="pna-doc-note">
                            <i class="bi bi-download" aria-hidden="true"></i> Todos los documentos están disponibles para descarga en formato PDF.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Estructura de la Política -->
    <section class="pb-5">
        <div class="container">
            <h2 class="pna-section-title">Estructura de la Política</h2>
            <p class="text-muted mb-4" style="max-width: 640px;">
                La PNA se organiza en cuatro ejes estratégicos, diez objetivos específicos y cuarenta prioridades de política pública.
            </p>

            <div class="pna-stats-card">
                <div class="pna-stats-row">
                    <div class="pna-stat-tile">
                        <span class="pna-stat-tile__icon pna-stat-tile__icon--img" aria-hidden="true">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/estructura_politica/Ejes_estrategicos.jpg' ); ?>" alt="">
                        </span>
                        <div>
                            <p class="pna-stat-tile__number">4</p>
                            <p class="pna-stat-tile__label">Ejes estratégicos</p>
                        </div>
                    </div>
                    <div class="pna-stat-sep"></div>
                    <div class="pna-stat-tile">
                        <span class="pna-stat-tile__icon pna-stat-tile__icon--img" aria-hidden="true">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/estructura_politica/Objetivos_especificos.jpg' ); ?>" alt="">
                        </span>
                        <div>
                            <p class="pna-stat-tile__number">10</p>
                            <p class="pna-stat-tile__label">Objetivos específicos</p>
                        </div>
                    </div>
                    <div class="pna-stat-sep"></div>
                    <div class="pna-stat-tile">
                        <span class="pna-stat-tile__icon pna-stat-tile__icon--img" aria-hidden="true">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/estructura_politica/40_prioridades.jpg' ); ?>" alt="">
                        </span>
                        <div>
                            <p class="pna-stat-tile__number">40</p>
                            <p class="pna-stat-tile__label">Prioridades de política pública</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ciclo de la Política Pública -->
    <section class="pb-5">
        <div class="container">
            <div class="pna-ciclo-section">
            <h2 class="pna-section-title pna-section-title--center mx-auto">Ciclo de la Política Pública</h2>
            <p class="pna-ciclo-subtitle">La política se diseña, implementa, se evalúa, se financia y mejora continuamente.</p>

            <div class="pna-ciclo-diagram mt-4">

                <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/diseno-pna/') ); ?>" class="pna-ciclo-step pna-ciclo-step--1 text-decoration-none">
                    <img class="pna-ciclo-step__watermark" aria-hidden="true" src="<?php echo esc_url( get_template_directory_uri() . '/img/ciclo_pna/' . rawurlencode('diseño.svg') ); ?>" alt="">
                    <div class="pna-ciclo-step__header">
                        <span class="pna-ciclo-step__number">1</span>
                        <p class="pna-ciclo-step__title">Diseño</p>
                    </div>
                    <p class="pna-ciclo-step__desc">Define el rumbo estratégico de la política a partir de prioridades, objetivos y participación de diversos actores.</p>
                </a>

                <div class="pna-ciclo-step pna-ciclo-step--4">
                    <img class="pna-ciclo-step__watermark" aria-hidden="true" src="<?php echo esc_url( get_template_directory_uri() . '/img/ciclo_pna/' . rawurlencode('seguimiento y evaluacion.svg') ); ?>" alt="">
                    <div class="pna-ciclo-step__header">
                        <span class="pna-ciclo-step__number">4</span>
                        <p class="pna-ciclo-step__title">Seguimiento y evaluación</p>
                    </div>
                    <p class="pna-ciclo-step__desc">Da seguimiento a los avances y retos en el combate a la corrupción a nivel de impacto, resultados y procesos.</p>
                </div>

                <!-- Centro: SVG de flechas + iconos superpuestos en cada esquina + logo -->
                <div class="pna-ciclo-center">
                    <div class="pna-ciclo-center__wrapper">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ciclo_pna/Flechas.svg"
                             alt="Diagrama circular del Ciclo de la Política Nacional Anticorrupción"
                             class="pna-ciclo-center__flechas" loading="lazy">

                        <!-- Íconos superpuestos en los espacios del diagrama circular -->
                        <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/diseno-pna/') ); ?>" class="pna-ciclo-overlay pna-ciclo-overlay--1" aria-label="Ir a Diseño de la Política Nacional Anticorrupción">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/ciclo_pna/' . rawurlencode('diseño.svg') ); ?>" alt="">
                        </a>
                        <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/presupuestacion/') ); ?>" class="pna-ciclo-overlay pna-ciclo-overlay--2" aria-label="Ir a Presupuestación de la Política Nacional Anticorrupción">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ciclo_pna/presupuestacion.svg" alt="">
                        </a>
                        <div class="pna-ciclo-overlay pna-ciclo-overlay--3" aria-hidden="true">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ciclo_pna/implementacion.svg" alt="">
                        </div>
                        <div class="pna-ciclo-overlay pna-ciclo-overlay--4" aria-hidden="true">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/ciclo_pna/' . rawurlencode('seguimiento y evaluacion.svg') ); ?>" alt="">
                        </div>

                        <!-- Logo central -->
                        <div class="pna-ciclo-center__logo" aria-hidden="true">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ciclo_pna/logo_pna_ok.png" alt="">
                        </div>
                    </div>
                </div>

                <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/presupuestacion/') ); ?>" class="pna-ciclo-step pna-ciclo-step--2 text-decoration-none">
                    <img class="pna-ciclo-step__watermark" aria-hidden="true" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ciclo_pna/presupuestacion.svg" alt="">
                    <div class="pna-ciclo-step__header">
                        <span class="pna-ciclo-step__number">2</span>
                        <p class="pna-ciclo-step__title">Presupuestación</p>
                    </div>
                    <p class="pna-ciclo-step__desc">El Anexo Transversal en materia anticorrupción identifica a los responsables y los montos de recursos públicos destinados a la prevención y sanción de hechos de corrupción.</p>
                </a>

                <div class="pna-ciclo-step pna-ciclo-step--3">
                    <img class="pna-ciclo-step__watermark" aria-hidden="true" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ciclo_pna/implementacion.svg" alt="">
                    <div class="pna-ciclo-step__header">
                        <span class="pna-ciclo-step__number">3</span>
                        <p class="pna-ciclo-step__title">Implementación</p>
                    </div>
                    <p class="pna-ciclo-step__desc">Instrumenta las prioridades de la PNA a través del Programa de Implementación con estrategias, líneas de acción e indicadores de desempeño.</p>
                </div>

            </div><!-- /.pna-ciclo-diagram -->

            <div class="pna-ciclo-hint mt-4">
                <span class="pna-ciclo-hint__icon" aria-hidden="true"><i class="bi bi-hand-index-thumb"></i></span>
                <p><strong>Haz clic</strong> en cada etapa para conocer más información, instrumentos y resultados de la Política Nacional Anticorrupción.</p>
            </div>
            </div><!-- /.pna-ciclo-section -->
        </div>
    </section>

    <script>
    (function () {
        var section = document.querySelector('.pna-ciclo-section');
        if (!section || !('IntersectionObserver' in window)) return;
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        section.classList.add('pna-ciclo-pre');
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    section.classList.add('pna-ciclo-visible');
                    io.unobserve(section);
                }
            });
        }, { threshold: 0.2 });
        io.observe(section);
    })();
    </script>

</div>

<?php get_footer(); ?>
