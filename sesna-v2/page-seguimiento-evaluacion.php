<?php
/**
 * Template Name: PNA - Seguimiento y Evaluación
 *
 * @package sesna
 */

get_header();
?>

<div class="page-pna page-pna-seguimiento front-page-bg">

    <!-- ── Breadcrumb (SND v1.1.0) ─────────────────────────────── -->
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
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/') ); ?>" class="ruta__a">Política Nacional Anticorrupción</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Seguimiento y evaluación</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ============================================================
         BLOQUE 1: Hero
         ============================================================ -->
    <section class="pt-4 pb-5">
        <div class="contenedor">
            <!-- Fila: Título/descripción (izquierda) e ícono (derecha) -->
            <div class="reticulaGrid__12 align-items-center mb--24">
                <div class="columna__12 columna__7--lg">
                    <h1 class="h1b patria color--pguinda600 mb--24">Seguimiento y evaluación</h1>
                    <p class="sh1r color--neutro600 mb--0 texto--justify">
                        El seguimiento y evaluación de la política anticorrupción es el proceso sistemático mediante el cual se monitorea y analiza la implementación de las acciones, estrategias y objetivos establecidos para prevenir, detectar y sancionar actos de corrupción. Su propósito es medir resultados, identificar avances, áreas de oportunidad y efectos de las intervenciones, generando información útil para la toma de decisiones y la mejora continua de la política pública.
                    </p>
                </div>
                <div class="columna__12 columna__5--lg muestra--ninguno muestra--flex--lg align-items-center justify-content-end">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/ciclo_pna/' . rawurlencode('seguimiento y evaluacion.svg') ); ?>" alt="Seguimiento y evaluación" class="sesna-hero__img" loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         BLOQUE 2: ¿Qué es el SiSE? y Criterios Fundamentales
         ============================================================ -->
    <section class="pb-5" id="seguimiento">
        <div class="contenedor">
            <div class="cf-panel-card sise-panel-card">
                
                <!-- Fila 1: Definición de SiSE a todo el ancho de la página -->
                <div class="reticulaGrid__12 mb--24">
                    <div class="columna__12">
                        <h2 class="h1b patria color--pguinda600 mb--16">¿Qué es el SiSE?</h2>
                        <p class="sise-definicion color--neutro700 texto--justify mb--0">
                            El Sistema de Seguimiento y Evaluación (SiSE) es el conjunto de elementos metodológicos de medición y análisis que permiten realizar una valoración objetiva, sistemática y periódica de la acción del Estado mexicano para combatir y controlar la corrupción, con base en una serie de procesos y procedimientos homologados del Sistema Nacional Anticorrupción (SNA).
                        </p>
                        <hr class="sise-divider">
                    </div>
                </div>

                <!-- Fila 2: Criterios a la izquierda y Portada + Botón a la derecha -->
                <div class="reticulaGrid__12 align-items-start">
                    
                    <!-- Columna Izquierda: Introducción y Acordeones de Criterios -->
                    <div class="columna__12 columna__7--lg sise-criterios-col">
                        <p class="sise-lead-intro b1b color--neutro900">
                            Para su concepción, se establecieron los siguientes criterios fundamentales:
                        </p>

                        <div class="sise-accordion-list" id="siseCriteriaAccordion" role="region" aria-label="Criterios fundamentales del SiSE">
                            
                            <!-- Criterio 1: Nacional (Abierto por defecto) -->
                            <div class="fin-acc-card sise-accordion-item is-open">
                                <button type="button" class="fin-acc-header sise-accordion-header" aria-expanded="true" aria-controls="criterio-content-1" id="criterio-btn-1">
                                    <div class="d-flex align-items-center gap--12">
                                        <span class="sise-accordion-badge">
                                            <i class="snd__icono snd-map icono--20 color--pguinda600" aria-hidden="true"></i>
                                        </span>
                                        <span class="b1sb color--neutro800 mb--0 sise-accordion-title">Nacional</span>
                                    </div>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron sise-accordion-chevron is-open" aria-hidden="true"></i>
                                </button>
                                <div id="criterio-content-1" class="fin-acc-collapse sise-accordion-body" role="region" aria-labelledby="criterio-btn-1">
                                    <p class="sise-accordion-text">
                                        Permitirá conocer el desempeño de las acciones implementadas en los tres ámbitos de gobierno para cumplir con los objetivos de la Política Nacional Anticorrupción.
                                    </p>
                                </div>
                            </div>

                            <!-- Criterio 2: Independiente -->
                            <div class="fin-acc-card sise-accordion-item">
                                <button type="button" class="fin-acc-header sise-accordion-header" aria-expanded="false" aria-controls="criterio-content-2" id="criterio-btn-2">
                                    <div class="d-flex align-items-center gap--12">
                                        <span class="sise-accordion-badge">
                                            <i class="snd__icono snd-security icono--20 color--pguinda600" aria-hidden="true"></i>
                                        </span>
                                        <span class="b1sb color--neutro800 mb--0 sise-accordion-title">Independiente</span>
                                    </div>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron sise-accordion-chevron" aria-hidden="true"></i>
                                </button>
                                <div id="criterio-content-2" class="fin-acc-collapse sise-accordion-body" role="region" aria-labelledby="criterio-btn-2">
                                    <p class="sise-accordion-text">
                                        Garantizará que los resultados del seguimiento y la evaluación sean confiables y creíbles.
                                    </p>
                                </div>
                            </div>

                            <!-- Criterio 3: Escalable -->
                            <div class="fin-acc-card sise-accordion-item">
                                <button type="button" class="fin-acc-header sise-accordion-header" aria-expanded="false" aria-controls="criterio-content-3" id="criterio-btn-3">
                                    <div class="d-flex align-items-center gap--12">
                                        <span class="sise-accordion-badge">
                                            <i class="snd__icono snd-chart--bar icono--20 color--pguinda600" aria-hidden="true"></i>
                                        </span>
                                        <span class="b1sb color--neutro800 mb--0 sise-accordion-title">Escalable</span>
                                    </div>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron sise-accordion-chevron" aria-hidden="true"></i>
                                </button>
                                <div id="criterio-content-3" class="fin-acc-collapse sise-accordion-body" role="region" aria-labelledby="criterio-btn-3">
                                    <p class="sise-accordion-text">
                                        Incrementará el alcance y número de instrumentos que lo compondrán, a partir de las necesidades que emerjan.
                                    </p>
                                </div>
                            </div>

                            <!-- Criterio 4: Transversal -->
                            <div class="fin-acc-card sise-accordion-item">
                                <button type="button" class="fin-acc-header sise-accordion-header" aria-expanded="false" aria-controls="criterio-content-4" id="criterio-btn-4">
                                    <div class="d-flex align-items-center gap--12">
                                        <span class="sise-accordion-badge">
                                            <i class="snd__icono snd-collaborate icono--20 color--pguinda600" aria-hidden="true"></i>
                                        </span>
                                        <span class="b1sb color--neutro800 mb--0 sise-accordion-title">Transversal</span>
                                    </div>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron sise-accordion-chevron" aria-hidden="true"></i>
                                </button>
                                <div id="criterio-content-4" class="fin-acc-collapse sise-accordion-body" role="region" aria-labelledby="criterio-btn-4">
                                    <p class="sise-accordion-text">
                                        Valorará el desempeño de las acciones implementadas por las instituciones públicas de los distintos sectores de la administración pública para combatir la corrupción.
                                    </p>
                                </div>
                            </div>

                            <!-- Criterio 5: Inclusivo -->
                            <div class="fin-acc-card sise-accordion-item">
                                <button type="button" class="fin-acc-header sise-accordion-header" aria-expanded="false" aria-controls="criterio-content-5" id="criterio-btn-5">
                                    <div class="d-flex align-items-center gap--12">
                                        <span class="sise-accordion-badge">
                                            <i class="snd__icono snd-group icono--20 color--pguinda600" aria-hidden="true"></i>
                                        </span>
                                        <span class="b1sb color--neutro800 mb--0 sise-accordion-title">Inclusivo</span>
                                    </div>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron sise-accordion-chevron" aria-hidden="true"></i>
                                </button>
                                <div id="criterio-content-5" class="fin-acc-collapse sise-accordion-body" role="region" aria-labelledby="criterio-btn-5">
                                    <p class="sise-accordion-text">
                                        Promoverá un diálogo amplio y permanente con las instituciones pertenecientes al SNA durante el desarrollo de las herramientas de seguimiento y evaluación.
                                    </p>
                                </div>
                            </div>

                            <!-- Criterio 6: Alineado con la teoría del cambio -->
                            <div class="fin-acc-card sise-accordion-item">
                                <button type="button" class="fin-acc-header sise-accordion-header" aria-expanded="false" aria-controls="criterio-content-6" id="criterio-btn-6">
                                    <div class="d-flex align-items-center gap--12">
                                        <span class="sise-accordion-badge">
                                            <i class="snd__icono snd-renew icono--20 color--pguinda600" aria-hidden="true"></i>
                                        </span>
                                        <span class="b1sb color--neutro800 mb--0 sise-accordion-title">Alineado con la teoría del cambio</span>
                                    </div>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron sise-accordion-chevron" aria-hidden="true"></i>
                                </button>
                                <div id="criterio-content-6" class="fin-acc-collapse sise-accordion-body" role="region" aria-labelledby="criterio-btn-6">
                                    <p class="sise-accordion-text">
                                        Dará seguimiento y evaluará los objetivos trazados en la teoría de cambio.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Columna Derecha: Portada del Documento SiSE y Botón de Consulta -->
                    <div class="columna__12 columna__5--lg sise-doc-col">
                        <div class="sise-doc-wrapper">
                            <div class="sise-doc-cover">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/pna/sise_portada.png' ); ?>" 
                                     alt="Portada Sistema de Seguimiento y Evaluación (SiSE)" 
                                     class="sise-doc-cover__img" 
                                     loading="lazy">
                            </div>
                            <a href="<?php echo esc_url( home_url( '/wp-content/uploads/2024/01/Sistema-de-Seguimiento-y-Evaluacion-SiSE-SNA_CC-SNA.pdf' ) ); ?>" 
                               class="boton__secundario sise-doc-btn" 
                               target="_blank" 
                               rel="noopener"
                               data-modal-target="#pdfViewerModal" 
                               data-pdf-title="Sistema de Seguimiento y Evaluación (SiSE)" 
                               data-pdf-url="<?php echo esc_url( home_url( '/wp-content/uploads/2024/01/Sistema-de-Seguimiento-y-Evaluacion-SiSE-SNA_CC-SNA.pdf' ) ); ?>"
                               title="Ver documento (Abre visor)">
                                <i class="snd snd__icono snd-screen icono--16" aria-hidden="true"></i> Ver documento
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
        </div>
    </section>

    <div class="contenedor">
        <div class="reticulaGrid__12">

            <div class="columna__12">
                <h2 class="h2b patria text-center my-4">Teoría de Cambio</h2>

                <p>La teoría de cambio define los objetivos a alcanzar para ejercer la acción pública con integridad y apego a
                    la legalidad. Debe entenderse como una herramienta de planeación, que permite ordenar los objetivos de tal
                    forma, que la consecución de los objetivos que anteceden permiten alcanzar los que suceden. En este sentido,
                    la teoría de cambio traza una línea causal y argumentativa, que dicta que el cumplimiento de determinado
                    objetivo brindará las condiciones necesarias para poder alcanzar los objetivos del nivel inmediato superior.
                </p>

                <p>La teoría de cambio del SiSE cuenta con <b style="color:Tomato">cuatro grupos de objetivos,</b> cada uno de
                    los cuales se enmarca en un ámbito de competencia distinto:</p>
            </div>

            <div class="columna__12 text-center my-4">
                <img src="https://www.sesna.gob.mx/wp-content/uploads/2024/05/Sitio-SESNA-SyE2-1.svg" class="img-fluid d-block mx-auto" alt="Teoría de Cambio">
            </div>

            <div class="columna__12">
                <h2 class="h2b patria text-center my-4">Indicadores Nacionales</h2>

                <p>Una de las herramientas fundamentales del SiSE serán los 10 Indicadores Nacionales, que se asociaron a cada
                    uno de los Objetivos Específicos de la PNA. Además de constituirse como aliados para el seguimiento, éstos
                    ofrecerán elementos de cara a las posteriores evaluaciones que se habrán de llevar a cabo.</p>

                <p>La construcción de estos indicadores fue resultado de un amplio consenso y diálogo técnico tanto con
                    instituciones públicas integrantes e involucradas en el SNA, como con instituciones académicas. Esta
                    dinámica permitió fortalecer técnicamente las métricas, al mismo tiempo que se aseguró la construcción de
                    indicadores integrales a partir de la inclusión de diversos de enfoques.</p>

                <p>Los Indicadores Nacionales se aprobaron en la Primera Sesión Extraordinaria 2024 del CC-SNA, celebrada el 12
                    de enero.</p>

                <div class="text-center my-3">
                    <a rel="noopener" href="https://www.sesna.gob.mx/wp-content/uploads/2024/07/Indicadores-Nacionales_CC-SNA_enero2024.pdf"
                        class="boton__secundario mt-auto" target="_blank" title="El enlace abre en ventana nueva" role="button">Consulta el documento aprobado
                        <i class="snd__icono snd-download icono--16" aria-hidden="true"></i>
                    </a>
                </div>

                <p>Los Indicadores Nacionales se insertan en la consolidación del Sistema de Seguimiento y Evaluación. Con su
                    aprobación se instruye a la SESNA la elaboración y presentación de un informe anual que reporte el avance de
                    estas mediciones.</p>

                <p>El Primer Informe de Avances de los Indicadores Nacionales da cuenta de los resultados del Sistema Nacional
                    Anticorrupción con desagregación federal, estatal y municipal. Los grandes resultados del Informe se
                    concentran en un Decálogo que, a través del análisis y disponibilidad de la información, se identifican
                    Retos y Acciones sugeridas que los entes públicos pueden implementar en el corto plazo para lograr valor
                    público.</p>

                <div class="text-center my-3">
                    <a rel="noopener" href="https://www.sesna.gob.mx/wp-content/uploads/2023/10/INFORME-DE-AVANCES-DE-LOS-INDICADORES-NACIONALES-2024_septiembre-1.pdf"
                        class="boton__secundario mt-auto" target="_blank" title="El enlace abre en ventana nueva" role="button">Descargar informe
                        <i class="snd__icono snd-download icono--16" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="my-4">
                    <p><b style="font-size:25px; color:Tomato">CONOCE MÁS SOBRE LOS 10 INDICADORES NACIONALES</b></p>
                    <p><b style="font-size:20px; color:Tomato">Haz clic en cada uno para descargar el documento completo:</b></p>

                    <div class="fila justify-content-center text-center my-4" style="gap:1.5rem;">
                        <div class="columna__auto text-center">
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2024/05/OE1-Coordinacion-SNA.pdf" target="_blank" rel="noopener" title="El enlace abre en ventana nueva">
                                <img src="https://www.sesna.gob.mx/wp-content/uploads/2024/05/Indicador-1-2.svg" style="width:175px;height:175px;max-width:100%;height:auto;" alt="Indicador 1">
                            </a>
                        </div>
                        <div class="columna__auto text-center">
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2024/05/OE2-Justicia-Anticorrupcion.pdf" target="_blank" rel="noopener" title="El enlace abre en ventana nueva">
                                <img src="https://www.sesna.gob.mx/wp-content/uploads/2024/05/Indicador-2-2.svg" style="width:175px;height:175px;max-width:100%;height:auto;" alt="Indicador 2">
                            </a>
                        </div>
                        <div class="columna__auto text-center">
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2024/05/OE3-Profesionalizacion-1.pdf" target="_blank" rel="noopener" title="El enlace abre en ventana nueva">
                                <img src="https://www.sesna.gob.mx/wp-content/uploads/2024/05/Indicador-3-2.svg" style="width:175px;height:175px;max-width:100%;height:auto;" alt="Indicador 3">
                            </a>
                        </div>
                        <div class="columna__auto text-center">
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2024/05/OE4-Estandarizacion-Presupuestaria-1.pdf" target="_blank" rel="noopener" title="El enlace abre en ventana nueva">
                                <img src="https://www.sesna.gob.mx/wp-content/uploads/2024/05/Indicador-4-2.svg" style="width:175px;height:175px;max-width:100%;height:auto;" alt="Indicador 4">
                            </a>
                        </div>
                        <div class="columna__auto text-center">
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2024/05/OE5-Homologacion-SNF.pdf" target="_blank" rel="noopener" title="El enlace abre en ventana nueva">
                                <img src="https://www.sesna.gob.mx/wp-content/uploads/2024/05/Indicador-5-2.svg" style="width:175px;height:175px;max-width:100%;height:auto;" alt="Indicador 5">
                            </a>
                        </div>
                        <div class="columna__auto text-center">
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2024/05/OE6-Contencion-Riesgos.pdf" target="_blank" rel="noopener" title="El enlace abre en ventana nueva">
                                <img src="https://www.sesna.gob.mx/wp-content/uploads/2024/05/Indicador-6-2.svg" style="width:175px;height:175px;max-width:100%;height:auto;" alt="Indicador 6">
                            </a>
                        </div>
                        <div class="columna__auto text-center">
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2024/05/OE7-Contrataciones.pdf" target="_blank" rel="noopener" title="El enlace abre en ventana nueva">
                                <img src="https://www.sesna.gob.mx/wp-content/uploads/2024/05/Indicador-7-2.svg" style="width:175px;height:175px;max-width:100%;height:auto;" alt="Indicador 7">
                            </a>
                        </div>
                        <div class="columna__auto text-center">
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2024/05/OE8-Participacion-Ciudadana.pdf" target="_blank" rel="noopener" title="El enlace abre en ventana nueva">
                                <img src="https://www.sesna.gob.mx/wp-content/uploads/2024/05/Indicador-8-2.svg" style="width:175px;height:175px;max-width:100%;height:auto;" alt="Indicador 8">
                            </a>
                        </div>
                        <div class="columna__auto text-center">
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2024/05/OE9-Mecanismos-Integridad.pdf" target="_blank" rel="noopener" title="El enlace abre en ventana nueva">
                                <img src="https://www.sesna.gob.mx/wp-content/uploads/2024/05/Indicador-9-1.svg" style="width:175px;height:175px;max-width:100%;height:auto;" alt="Indicador 9">
                            </a>
                        </div>
                        <div class="columna__auto text-center">
                            <a href="https://www.sesna.gob.mx/wp-content/uploads/2024/05/OE10-Normalizacion.pdf" target="_blank" rel="noopener" title="El enlace abre en ventana nueva">
                                <img src="https://www.sesna.gob.mx/wp-content/uploads/2024/05/Indicador-10-2.svg" style="width:175px;height:175px;max-width:100%;height:auto;" alt="Indicador 10">
                            </a>
                        </div>
                    </div>
                </div>

                <p>Para consultar las fichas de cálculo de los Indicadores Nacionales, a nivel variable y componente, para
                    todas las desagregaciones de orden de gobierno, <a href="https://sesnamx.sharepoint.com/:x:/s/DocumentosPublicos/EU8LQUYrMPpLqj3qwR-2_I8BDOD_avLyHUqCMoXjsEYtbg?e=h86z6a" target="_blank" rel="noopener" title="El enlace abre en ventana nueva">
                    <b style="color:Tomato">ingresa aquí.</b> </a>
                </p>

                <h2 class="h2b patria text-center my-4">Métrica Transversal</h2>

                <p>
                    En el marco del SiSE y de los Indicadores Nacionales vinculados a los Objetivos Específicos de la PNA se desarrolló la Métrica transversal que estima el impacto diferenciado de la corrupción en México.
                </p>

                <div class="text-center my-4">
                    <img src="https://www.sesna.gob.mx/wp-content/uploads/2025/07/Metrica-de-genero-Color.svg"
                        style="width:250px;height:250px;max-width:100%;" class="d-block mx-auto mb-3" alt="Métrica Transversal">
                    <a rel="noopener" href="https://www.sesna.gob.mx/wp-content/uploads/2025/07/Metrica-transversal-impacto-diferencia-de-la-corrupcion-en-Mexico-2025_Nota-metodologica.pdf"
                        class="boton__secundario" target="_blank" title="El enlace abre en ventana nueva" role="button">¡Conócela aquí!
                        <i class="snd__icono snd-download icono--16" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const accordion = document.getElementById('siseCriteriaAccordion');
    if (!accordion) return;

    const items = accordion.querySelectorAll('.sise-accordion-item');

    items.forEach(item => {
        const header = item.querySelector('.sise-accordion-header');
        if (!header) return;

        header.addEventListener('click', function() {
            const isOpen = item.classList.contains('is-open');

            // Cerrar todos los acordeones para mantener solo uno abierto (comportamiento acordeón estricto)
            items.forEach(otherItem => {
                otherItem.classList.remove('is-open');
                const btn = otherItem.querySelector('.sise-accordion-header');
                const chevron = otherItem.querySelector('.fin-acc-chevron');
                if (btn) btn.setAttribute('aria-expanded', 'false');
                if (chevron) chevron.classList.remove('is-open');
            });

            // Si el actual no estaba abierto, abrirlo
            if (!isOpen) {
                item.classList.add('is-open');
                header.setAttribute('aria-expanded', 'true');
                const chevron = header.querySelector('.fin-acc-chevron');
                if (chevron) chevron.classList.add('is-open');
            }
        });
    });
});
</script>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<?php
get_footer();
?>