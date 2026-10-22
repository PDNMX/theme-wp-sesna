<?php
/**
 * Template Name: PNA-Nueva
 *
 * @package sesna
 */

get_header();
?>

<div class="page-pna front-page-bg">

    <!-- ── Breadcrumb ─────────────────────────────────────────── -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="ruta__a"><i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>" class="ruta__a">Acciones y Programas</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Política Nacional Anticorrupción</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Política Nacional Anticorrupción</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Documento principal: portada + descarga -->
    <section class="pb-5">
        <div class="contenedor">
            <div class="pna-doc-card">
                <div class="reticulaGrid__12 align-items-stretch">

                    <!-- Portada -->
                    <div class="columna__12 columna__4--lg">
                        <div class="pna-doc-cover">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/pna_portada.png' ); ?>" alt="Portada Política Nacional Anticorrupción">
                        </div>
                    </div>

                    <!-- Detalle + descargas -->
                    <div class="columna__12 columna__8--lg muestra--flex flex-direction-column alto--100">
                        <div class="pna-hero__badge">
                            <span class="pna-hero__badge-icon" aria-hidden="true">
                                <i class="snd__icono snd-calendar icono--20" aria-hidden="true"></i>
                            </span>
                            <div>
                                <p class="sh1b color--neutro800 mb--0">Aprobada el 29 de enero de 2020</p>
                                <p class="b1r color--neutro600 mb--0">por el Comité Coordinador del Sistema Nacional Anticorrupción.</p>
                            </div>
                        </div>

                        <hr class="mt--16 mb--16">

                        <p class="b1r texto--justify flex-grow-1">
                            Documento estratégico de largo aliento que plasma la agenda del Estado mexicano en la materia.
                            Contiene el diagnóstico y las prioridades mínimas que orientan la actuación del SNA en materia
                            de prevención, detección, investigación y sanción de faltas administrativas y hechos de
                            corrupción, así como la fiscalización y el control de recursos públicos.
                        </p>

                        <div class="muestra--flex flex-wrap-wrap gap--16 justify-content-flex-end--md">
                            <a href="<?php echo esc_url( sesna_get_media_attachment_url( 'PNA-resumen-ejecutivo.pdf', '2020/01/PNA-resumen-ejecutivo.pdf' ) ); ?>" class="boton__primario" target="_blank" rel="noopener">
                                <i class="snd__icono snd-document icono--16" aria-hidden="true"></i> Resumen Ejecutivo
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Estructura de la Política -->
    <section class="pb-5">
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 mb--16">Estructura de la Política</h2>
            <p class="sh1r color--neutro600 mb--24">
                La PNA se organiza en cuatro ejes estratégicos, diez objetivos específicos y cuarenta prioridades de política pública.
            </p>

            <div class="pna-stats-card">
                <div class="pna-stats-row">
                    <div class="pna-stat-tile">
                        <span class="pna-stat-tile__icon pna-stat-tile__icon--img" aria-hidden="true">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/estructura_politica/Ejes_estrategicos.jpg' ); ?>" alt="">
                        </span>
                        <div>
                            <p class="sh1b color--neutro800 mb--2">4</p>
                            <p class="b1r color--neutro600 mb--0">Ejes estratégicos</p>
                        </div>
                    </div>
                    <div class="pna-stat-sep"></div>
                    <div class="pna-stat-tile">
                        <span class="pna-stat-tile__icon pna-stat-tile__icon--img" aria-hidden="true">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/estructura_politica/Objetivos_especificos.jpg' ); ?>" alt="">
                        </span>
                        <div>
                            <p class="sh1b color--neutro800 mb--2">10</p>
                            <p class="b1r color--neutro600 mb--0">Objetivos específicos</p>
                        </div>
                    </div>
                    <div class="pna-stat-sep"></div>
                    <div class="pna-stat-tile">
                        <span class="pna-stat-tile__icon pna-stat-tile__icon--img" aria-hidden="true">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/estructura_politica/40_prioridades.jpg' ); ?>" alt="">
                        </span>
                        <div>
                            <p class="sh1b color--neutro800 mb--2">40</p>
                            <p class="b1r color--neutro600 mb--0">Prioridades de política pública</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ciclo de la Política Pública -->
    <section class="pb-5">
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 texto--centro mb--16">Ciclo de la Política Pública</h2>
            <p class="sh1r color--neutro600 texto--centro mb--24">La política se diseña, implementa, se evalúa, se financia y mejora continuamente.</p>

            <div class="pna-ciclo-section">
            <div class="pna-ciclo-diagram mt-4">

                <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/diseno-pna/') ); ?>" class="pna-ciclo-step pna-ciclo-step--1 decoracion--ninguna">
                    <img class="pna-ciclo-step__watermark" aria-hidden="true" src="<?php echo esc_url( get_template_directory_uri() . '/img/ciclo_pna/' . rawurlencode('diseño.svg') ); ?>" alt="">
                    <div class="pna-ciclo-step__header">
                        <span class="pna-ciclo-step__number">1</span>
                        <p class="pna-ciclo-step__title sh1b">Diseño</p>
                    </div>
                    <p class="b1r texto--justify">Define el rumbo estratégico de la política a partir de prioridades, objetivos y participación de diversos actores.</p>
                </a>

                <div class="pna-ciclo-step pna-ciclo-step--4">
                    <img class="pna-ciclo-step__watermark" aria-hidden="true" src="<?php echo esc_url( get_template_directory_uri() . '/img/ciclo_pna/' . rawurlencode('seguimiento y evaluacion.svg') ); ?>" alt="">
                    <div class="pna-ciclo-step__header">
                        <span class="pna-ciclo-step__number">4</span>
                        <p class="pna-ciclo-step__title sh1b">Seguimiento y evaluación</p>
                    </div>
                    <p class="b1r texto--justify">Da seguimiento a los avances y retos en el combate a la corrupción a nivel de impacto, resultados y procesos.</p>
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
                        <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/implementacion/') ); ?>" class="pna-ciclo-overlay pna-ciclo-overlay--3" aria-label="Ir a Implementación de la Política Nacional Anticorrupción">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ciclo_pna/implementacion.svg" alt="">
                        </a>
                        <div class="pna-ciclo-overlay pna-ciclo-overlay--4" aria-hidden="true">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/ciclo_pna/' . rawurlencode('seguimiento y evaluacion.svg') ); ?>" alt="">
                        </div>

                        <!-- Logo central -->
                        <div class="pna-ciclo-center__logo" aria-hidden="true">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ciclo_pna/logo_pna_ok.png" alt="">
                        </div>
                    </div>
                </div>

                <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/presupuestacion/') ); ?>" class="pna-ciclo-step pna-ciclo-step--2 decoracion--ninguna">
                    <img class="pna-ciclo-step__watermark" aria-hidden="true" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ciclo_pna/presupuestacion.svg" alt="">
                    <div class="pna-ciclo-step__header">
                        <span class="pna-ciclo-step__number">2</span>
                        <p class="pna-ciclo-step__title sh1b">Presupuestación</p>
                    </div>
                    <p class="b1r texto--justify">El Anexo Transversal en materia anticorrupción identifica a los responsables y los montos de recursos públicos destinados a la prevención y sanción de hechos de corrupción.</p>
                </a>

                <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/implementacion/') ); ?>" class="pna-ciclo-step pna-ciclo-step--3 decoracion--ninguna">
                    <img class="pna-ciclo-step__watermark" aria-hidden="true" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ciclo_pna/implementacion.svg" alt="">
                    <div class="pna-ciclo-step__header">
                        <span class="pna-ciclo-step__number">3</span>
                        <p class="pna-ciclo-step__title sh1b">Implementación</p>
                    </div>
                    <p class="b1r texto--justify">Instrumenta las prioridades de la PNA a través del Programa de Implementación con estrategias, líneas de acción e indicadores de desempeño.</p>
                </a>

            </div><!-- /.pna-ciclo-diagram -->

            <div class="cp-nota__inner fondo--azul100 mt-4">
                <i class="snd__icono snd-screen icono--20 cp-nota__icono color--azul500" aria-hidden="true"></i>
                <p class="cp-nota__texto b1r color--azul500 mb--0"><strong>Haz clic</strong> en cada etapa para conocer más información, instrumentos y resultados de la Política Nacional Anticorrupción.</p>
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
