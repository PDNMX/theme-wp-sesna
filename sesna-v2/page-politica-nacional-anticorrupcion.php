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
    <nav class="gobmx-breadcrumb-container" aria-label="Ruta de navegación">
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
    <section class="pna-hero">
        <div class="container">
            <h1 class="pna-hero__title">Política Nacional Anticorrupción</h1>
            <div class="pna-hero__line"></div>
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
                            <i class="bi bi-file-earmark-richtext" aria-hidden="true"></i>
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
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2020/01/PNA-resumen-ejecutivo.pdf" class="pna-download-btn" target="_blank" rel="noopener">
                                <i class="bi bi-file-earmark-text" aria-hidden="true"></i> Resumen Ejecutivo
                            </a>
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2020/02/Política-Nacional-Anticorrupción.pdf" class="pna-download-btn" target="_blank" rel="noopener">
                                <i class="bi bi-book" aria-hidden="true"></i> Documento Completo
                            </a>
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2020/02/Guía-diseño-PEA.pdf" class="pna-download-btn" target="_blank" rel="noopener">
                                <i class="bi bi-phone" aria-hidden="true"></i> Guía para la elaboración de las PEA
                            </a>

                            <!-- Anexos -->
                            <div class="dropdown pna-anexos-dropdown">
                                <button class="pna-download-btn dropdown-toggle" type="button" id="pnaAnexosDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-paperclip" aria-hidden="true"></i> Anexos
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="pnaAnexosDropdown">
                                    <li>
                                        <a class="dropdown-item" target="_blank" rel="noopener" href="https://www.sesna.gob.mx/wp-content/uploads/2020/01/2-Anexo-1-Estadísticos-23012020.pdf">
                                            <i class="bi bi-download" aria-hidden="true"></i> Estadísticos
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" target="_blank" rel="noopener" href="https://www.sesna.gob.mx/wp-content/uploads/2020/01/3-Anexo-2-Proceso-de-integración-de-la-PNA-23012020.pdf">
                                            <i class="bi bi-download" aria-hidden="true"></i> Proceso de integración de la PNA
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" target="_blank" rel="noopener" href="https://www.sesna.gob.mx/wp-content/uploads/2020/01/4-Anexo-3-Acciones-sugeridas-vf-29012020.pdf">
                                            <i class="bi bi-download" aria-hidden="true"></i> Acciones sugeridas
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" target="_blank" rel="noopener" href="https://www.sesna.gob.mx/wp-content/uploads/2020/01/5-Anexo-4-Acciones-ejecutivos-vf-29012020.pdf">
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
                        <span class="pna-stat-tile__icon pna-stat-tile__icon--verde" aria-hidden="true">
                            <i class="bi bi-bullseye"></i>
                        </span>
                        <div>
                            <p class="pna-stat-tile__number">4</p>
                            <p class="pna-stat-tile__label">Ejes estratégicos</p>
                        </div>
                    </div>
                    <div class="pna-stat-sep"></div>
                    <div class="pna-stat-tile">
                        <span class="pna-stat-tile__icon pna-stat-tile__icon--morado" aria-hidden="true">
                            <i class="bi bi-flag"></i>
                        </span>
                        <div>
                            <p class="pna-stat-tile__number">10</p>
                            <p class="pna-stat-tile__label">Objetivos específicos</p>
                        </div>
                    </div>
                    <div class="pna-stat-sep"></div>
                    <div class="pna-stat-tile">
                        <span class="pna-stat-tile__icon pna-stat-tile__icon--verde-oscuro" aria-hidden="true">
                            <i class="bi bi-list-check"></i>
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
    <!--
        NOTA: sección temporal maquetada como grid de tarjetas.
        Se reemplazará por el diagrama circular con flechas SVG
        (4 pasos + logo central) en cuanto el usuario proporcione
        los archivos SVG definitivos.
    -->
    <section class="pb-5">
        <div class="container">
            <h2 class="pna-section-title pna-section-title--center mx-auto">Ciclo de la Política Pública</h2>

            <div class="row g-4 pt-4">
                <div class="col-md-6">
                    <div class="pna-ciclo-card">
                        <div class="pna-ciclo-card__top">
                            <span class="pna-ciclo-card__number">1</span>
                            <span class="pna-ciclo-card__icon" aria-hidden="true"><i class="bi bi-bullseye"></i></span>
                            <p class="pna-ciclo-card__title">Diseño</p>
                        </div>
                        <p class="pna-ciclo-card__desc">
                            Define el rumbo estratégico de la política a partir de prioridades, objetivos y participación de diversos actores.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pna-ciclo-card">
                        <div class="pna-ciclo-card__top">
                            <span class="pna-ciclo-card__number">2</span>
                            <span class="pna-ciclo-card__icon" aria-hidden="true"><i class="bi bi-wallet2"></i></span>
                            <p class="pna-ciclo-card__title">Presupuestación</p>
                        </div>
                        <p class="pna-ciclo-card__desc">
                            El Anexo Transversal en materia anticorrupción identifica a los responsables y los montos de recursos públicos destinados a la prevención, detección, investigación y sanción de hechos de corrupción.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pna-ciclo-card">
                        <div class="pna-ciclo-card__top">
                            <span class="pna-ciclo-card__number">3</span>
                            <span class="pna-ciclo-card__icon" aria-hidden="true"><i class="bi bi-gear"></i></span>
                            <p class="pna-ciclo-card__title">Implementación</p>
                        </div>
                        <p class="pna-ciclo-card__desc">
                            Instrumenta las prioridades de la PNA a través del Programa de Implementación con estrategias, líneas de acción e indicadores de desempeño.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pna-ciclo-card">
                        <div class="pna-ciclo-card__top">
                            <span class="pna-ciclo-card__number">4</span>
                            <span class="pna-ciclo-card__icon" aria-hidden="true"><i class="bi bi-graph-up-arrow"></i></span>
                            <p class="pna-ciclo-card__title">Seguimiento y evaluación</p>
                        </div>
                        <p class="pna-ciclo-card__desc">
                            El sistema de seguimiento y evaluación tiene como objetivo dar seguimiento a los avances y retos en el combate a la corrupción a nivel de impacto, resultados y procesos, derivados de la implementación de políticas.
                        </p>
                    </div>
                </div>
            </div>

            <div class="pna-ciclo-hint mt-4">
                <span class="pna-ciclo-hint__icon" aria-hidden="true"><i class="bi bi-hand-index-thumb"></i></span>
                <p><strong>Haz clic</strong> en cada etapa para conocer más información, instrumentos y resultados de la Política Nacional Anticorrupción.</p>
            </div>
        </div>
    </section>

    <!-- Documentos relativos a la integración de la PNA -->
    <section class="pb-5">
        <div class="container">
            <div class="pna-final-card">
                <h2 class="pna-section-title pna-section-title--center mx-auto">Documentos relativos a la integración de la PNA</h2>
                <p class="pna-final-card__desc">
                    La Política Nacional Anticorrupción es resultado del análisis de datos oficiales, evidencias generadas por
                    distintas instancias gubernamentales y de la sociedad civil, así como muchas otras fuentes provenientes de
                    instituciones nacionales e internacionales, además de una Consulta Pública que permitió dar voz a diversos
                    sectores de la sociedad. Si deseas saber más sobre los insumos de la Política Nacional Anticorrupción
                    consúltalos aquí.
                </p>
                <a href="https://www.sesna.gob.mx/2020/03/19/insumos-de-la-politica-nacional-anticorrupcion/" class="pna-download-btn" target="_blank" rel="noopener">
                    <i class="bi bi-folder2-open" aria-hidden="true"></i> Insumos de la PNA
                </a>

                <div class="mt-4">
                    <a href="/wp-content/uploads/2019/07/Aviso-de-privacidad.pdf" class="pna-privacy-link" target="_blank" rel="noopener">
                        <i class="bi bi-shield-lock" aria-hidden="true"></i> Aviso de privacidad sobre los datos recabados para la propuesta de la PNA
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
