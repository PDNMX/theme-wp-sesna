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
                    <p class="sh1r mb--0 texto--justify">
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
            
            <!-- Encabezado de Sección: Título y Definición fuera de la Card -->
            <div class="reticulaGrid__12 mb--24">
                <div class="columna__12">
                    <h2 class="h2b patria color--pguinda600 mb--16">¿Qué es el SiSE?</h2>
                    <p class="sh1r sise-definicion color--neutro600 texto--justify mb--0">
                        El Sistema de Seguimiento y Evaluación (SiSE) es el conjunto de elementos metodológicos de medición y análisis que permiten realizar una valoración objetiva, sistemática y periódica de la acción del Estado mexicano para combatir y controlar la corrupción, con base en una serie de procesos y procedimientos homologados del Sistema Nacional Anticorrupción (SNA).
                    </p>
                </div>
            </div>

            <!-- Card con el contenido de la sección -->
            <div class="cf-panel-card sise-panel-card">
                
                <!-- Texto introductorio a lo ancho del panel -->
                <p class="sise-lead-intro b1sb mb--20">
                    Para su concepción, se establecieron los siguientes criterios fundamentales:
                </p>

                <!-- Criterios a la izquierda y Portada + Botón a la derecha (Alineados al inicio del primer acordeón) -->
                <div class="reticulaGrid__12 align-items-stretch">
                    
                    <!-- Columna Izquierda: Acordeones de Criterios -->
                    <div class="columna__12 columna__7--lg sise-criterios-col">
                        <div class="sise-accordion-list" id="siseCriteriaAccordion" role="region" aria-label="Criterios fundamentales del SiSE">
                            
                            <!-- Criterio 1: Nacional (Abierto por defecto) -->
                            <div class="fin-acc-card sise-accordion-item is-open">
                                <button type="button" class="fin-acc-header sise-accordion-header" aria-expanded="true" aria-controls="criterio-content-1" id="criterio-btn-1">
                                    <div class="d-flex align-items-center gap--12">
                                        <span class="sise-accordion-badge">
                                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/seguimiento_evaluacion_pna/nacional.png' ); ?>" alt="" aria-hidden="true">
                                        </span>
                                        <span class="b1sb mb--0 sise-accordion-title">Nacional</span>
                                    </div>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron sise-accordion-chevron is-open" aria-hidden="true"></i>
                                </button>
                                <div id="criterio-content-1" class="fin-acc-collapse sise-accordion-body" role="region" aria-labelledby="criterio-btn-1">
                                    <p class="b1r sise-accordion-text">
                                        Permitirá conocer el desempeño de las acciones implementadas en los tres ámbitos de gobierno para cumplir con los objetivos de la Política Nacional Anticorrupción.
                                    </p>
                                </div>
                            </div>

                            <!-- Criterio 2: Independiente -->
                            <div class="fin-acc-card sise-accordion-item">
                                <button type="button" class="fin-acc-header sise-accordion-header" aria-expanded="false" aria-controls="criterio-content-2" id="criterio-btn-2">
                                    <div class="d-flex align-items-center gap--12">
                                        <span class="sise-accordion-badge">
                                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/seguimiento_evaluacion_pna/independiente.png' ); ?>" alt="" aria-hidden="true">
                                        </span>
                                        <span class="b1sb mb--0 sise-accordion-title">Independiente</span>
                                    </div>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron sise-accordion-chevron" aria-hidden="true"></i>
                                </button>
                                <div id="criterio-content-2" class="fin-acc-collapse sise-accordion-body" role="region" aria-labelledby="criterio-btn-2">
                                    <p class="b1r sise-accordion-text">
                                        Garantizará que los resultados del seguimiento y la evaluación sean confiables y creíbles.
                                    </p>
                                </div>
                            </div>

                            <!-- Criterio 3: Escalable -->
                            <div class="fin-acc-card sise-accordion-item">
                                <button type="button" class="fin-acc-header sise-accordion-header" aria-expanded="false" aria-controls="criterio-content-3" id="criterio-btn-3">
                                    <div class="d-flex align-items-center gap--12">
                                        <span class="sise-accordion-badge">
                                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/seguimiento_evaluacion_pna/escalable.png' ); ?>" alt="" aria-hidden="true">
                                        </span>
                                        <span class="b1sb mb--0 sise-accordion-title">Escalable</span>
                                    </div>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron sise-accordion-chevron" aria-hidden="true"></i>
                                </button>
                                <div id="criterio-content-3" class="fin-acc-collapse sise-accordion-body" role="region" aria-labelledby="criterio-btn-3">
                                    <p class="b1r sise-accordion-text">
                                        Incrementará el alcance y número de instrumentos que lo compondrán, a partir de las necesidades que emerjan.
                                    </p>
                                </div>
                            </div>

                            <!-- Criterio 4: Transversal -->
                            <div class="fin-acc-card sise-accordion-item">
                                <button type="button" class="fin-acc-header sise-accordion-header" aria-expanded="false" aria-controls="criterio-content-4" id="criterio-btn-4">
                                    <div class="d-flex align-items-center gap--12">
                                        <span class="sise-accordion-badge">
                                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/seguimiento_evaluacion_pna/transversal.png' ); ?>" alt="" aria-hidden="true">
                                        </span>
                                        <span class="b1sb mb--0 sise-accordion-title">Transversal</span>
                                    </div>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron sise-accordion-chevron" aria-hidden="true"></i>
                                </button>
                                <div id="criterio-content-4" class="fin-acc-collapse sise-accordion-body" role="region" aria-labelledby="criterio-btn-4">
                                    <p class="b1r sise-accordion-text">
                                        Valorará el desempeño de las acciones implementadas por las instituciones públicas de los distintos sectores de la administración pública para combatir la corrupción.
                                    </p>
                                </div>
                            </div>

                            <!-- Criterio 5: Inclusivo -->
                            <div class="fin-acc-card sise-accordion-item">
                                <button type="button" class="fin-acc-header sise-accordion-header" aria-expanded="false" aria-controls="criterio-content-5" id="criterio-btn-5">
                                    <div class="d-flex align-items-center gap--12">
                                        <span class="sise-accordion-badge">
                                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/seguimiento_evaluacion_pna/inclusivo.png' ); ?>" alt="" aria-hidden="true">
                                        </span>
                                        <span class="b1sb mb--0 sise-accordion-title">Inclusivo</span>
                                    </div>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron sise-accordion-chevron" aria-hidden="true"></i>
                                </button>
                                <div id="criterio-content-5" class="fin-acc-collapse sise-accordion-body" role="region" aria-labelledby="criterio-btn-5">
                                    <p class="b1r sise-accordion-text">
                                        Promoverá un diálogo amplio y permanente con las instituciones pertenecientes al SNA durante el desarrollo de las herramientas de seguimiento y evaluación.
                                    </p>
                                </div>
                            </div>

                            <!-- Criterio 6: Alineado con la teoría del cambio -->
                            <div class="fin-acc-card sise-accordion-item">
                                <button type="button" class="fin-acc-header sise-accordion-header" aria-expanded="false" aria-controls="criterio-content-6" id="criterio-btn-6">
                                    <div class="d-flex align-items-center gap--12">
                                        <span class="sise-accordion-badge">
                                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/seguimiento_evaluacion_pna/teoria_cambio.png' ); ?>" alt="" aria-hidden="true">
                                        </span>
                                        <span class="b1sb mb--0 sise-accordion-title">Alineado con la teoría del cambio</span>
                                    </div>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron sise-accordion-chevron" aria-hidden="true"></i>
                                </button>
                                <div id="criterio-content-6" class="fin-acc-collapse sise-accordion-body" role="region" aria-labelledby="criterio-btn-6">
                                    <p class="b1r sise-accordion-text">
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

    <!-- ============================================================
         BLOQUE 3: Teoría de Cambio (SND v1.1.0)
         ============================================================ -->
    <section class="pb-5" id="teoria-cambio">
        <div class="contenedor">
            
            <!-- Encabezado de Sección: Título y Texto Introductorio fuera de la Card -->
            <div class="reticulaGrid__12 mb--24">
                <div class="columna__12">
                    <h2 class="h2b patria color--pguinda600 mb--16">Teoría de cambio</h2>
                    <p class="sh1r sise-definicion color--neutro600 texto--justify mb--0">
                        La teoría de cambio define los objetivos a alcanzar para ejercer la acción pública con integridad y apego a la legalidad, por lo que el cumplimiento de determinado objetivo brindará las condiciones necesarias para poder alcanzar los objetivos del nivel inmediato superior. La teoría de cambio del SiSE cuenta con cuatro niveles de objetivos enmarcado en ámbitos de competencia distintos.
                    </p>
                </div>
            </div>

            <!-- Card con el contenido de la sección -->
            <div class="cf-panel-card sise-panel-card teoria-panel-card">
                <!-- Banner Transversal: Instrumentos de Inteligencia Aprovechados -->
                <div class="teoria-transversal-container">
                    <div class="teoria-transversal-pill">
                        <div class="teoria-transversal-icon">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/pna/inteligencia-monitor.svg' ); ?>" alt="" aria-hidden="true">
                        </div>
                        <div class="teoria-transversal-content">
                            <h3 class="teoria-transversal-title b1sb">Instrumentos de inteligencia aprovechados</h3>
                            <p class="teoria-transversal-desc b1r">Generación y uso de información para la toma de decisiones</p>
                        </div>
                    </div>
                </div>

                <!-- Grilla Interactiva de los 4 Niveles de la Teoría de Cambio -->
                <div class="teoria-flow-wrapper" role="tablist" aria-label="Niveles de la teoría de cambio">
                    
                    <!-- ── NIVEL 01: Instituciones ── -->
                    <div class="teoria-card-col">
                        <div class="teoria-card is-active" id="teoria-card-1" role="tab" tabindex="0" aria-selected="true" aria-controls="teoria-pane-1" data-level="1">
                            <div class="teoria-card-top">
                                <span class="teoria-badge">01</span>
                            </div>
                            <div class="teoria-icon-container">
                                <div class="teoria-icon-circle">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/pna/instituciones-pictograma.svg' ); ?>" alt="" class="teoria-icon-img" aria-hidden="true">
                                </div>
                            </div>
                            <h3 class="teoria-card-title b1sb">Instituciones</h3>
                            <div class="teoria-card-pills">
                                <div class="teoria-pill">Recursos y capacidades institucionales</div>
                                <div class="teoria-pill">Programas y acciones institucionales</div>
                            </div>
                        </div>
                    </div>

                    <!-- Conector 01 -> 02 (Desktop) -->
                    <div class="teoria-flow-connector" aria-hidden="true">
                        <div class="teoria-connector-arrow">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/pna/flecha-teoria.svg' ); ?>" alt="">
                        </div>
                    </div>

                    <!-- ── NIVEL 02: Enfoque sistémico ── -->
                    <div class="teoria-card-col">
                        <div class="teoria-card" id="teoria-card-2" role="tab" tabindex="-1" aria-selected="false" aria-controls="teoria-pane-2" data-level="2">
                            <div class="teoria-card-top">
                                <span class="teoria-badge">02</span>
                            </div>
                            <div class="teoria-icon-container">
                                <div class="teoria-icon-circle teoria-icon-circle--enfoque">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/pna/sna-emblema.svg' ); ?>" alt="" class="teoria-icon-img" aria-hidden="true">
                                </div>
                            </div>
                            <h3 class="teoria-card-title b1sb">Enfoque sistémico</h3>
                            <div class="teoria-card-pills">
                                <div class="teoria-pill">Vinculación interinstitucional</div>
                                <div class="teoria-pill">Innovación tecnológica</div>
                            </div>
                        </div>
                    </div>

                    <!-- Conector 02 -> 03 con Círculo PDN Oficial (Desktop) -->
                    <div class="teoria-flow-connector teoria-flow-connector--pdn" aria-hidden="true">
                        <div class="teoria-pdn-circle" title="Plataforma Digital Nacional (PDN)">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/pna/pdn-logo.svg' ); ?>" alt="PDN" class="teoria-pdn-img">
                        </div>
                        <div class="teoria-connector-arrow">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/pna/flecha-teoria.svg' ); ?>" alt="">
                        </div>
                    </div>

                    <!-- ── NIVEL 03: Política Nacional Anticorrupción y PI-PNA ── -->
                    <div class="teoria-card-col">
                        <div class="teoria-card" id="teoria-card-3" role="tab" tabindex="-1" aria-selected="false" aria-controls="teoria-pane-3" data-level="3">
                            <div class="teoria-card-top">
                                <span class="teoria-badge">03</span>
                            </div>
                            <div class="teoria-icon-container">
                                <div class="teoria-icon-circle">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/pna/pna-4ejes.svg' ); ?>" alt="" class="teoria-icon-img" aria-hidden="true">
                                </div>
                            </div>
                            <h3 class="teoria-card-title b1sb">Política Nacional Anticorrupción y Programa de Implementación</h3>
                            <div class="teoria-card-pills">
                                <div class="teoria-ejes-grid">
                                    <span class="teoria-eje-tag teoria-eje-tag--1">Eje 1</span>
                                    <span class="teoria-eje-tag teoria-eje-tag--2">Eje 2</span>
                                    <span class="teoria-eje-tag teoria-eje-tag--3">Eje 3</span>
                                    <span class="teoria-eje-tag teoria-eje-tag--4">Eje 4</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Conector 03 -> 04 (Desktop) -->
                    <div class="teoria-flow-connector" aria-hidden="true">
                        <div class="teoria-connector-arrow">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/pna/flecha-teoria.svg' ); ?>" alt="">
                        </div>
                    </div>

                    <!-- ── NIVEL 04: Valor público ── -->
                    <div class="teoria-card-col">
                        <div class="teoria-card" id="teoria-card-4" role="tab" tabindex="-1" aria-selected="false" aria-controls="teoria-pane-4" data-level="4">
                            <div class="teoria-card-top">
                                <span class="teoria-badge">04</span>
                            </div>
                            <div class="teoria-icon-container">
                                <div class="teoria-icon-circle">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/pna/valor-publico-pictograma.svg' ); ?>" alt="" class="teoria-icon-img" aria-hidden="true">
                                </div>
                            </div>
                            <h3 class="teoria-card-title b1sb">Valor público</h3>
                            <div class="teoria-card-pills">
                                <div class="teoria-pill">Principio transversal de perspectiva de género</div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Panel de Detalle Dinámico de la Teoría de Cambio -->
                <div class="teoria-detail-container" id="teoriaDetailContainer">
                    
                    <!-- ── Detalle Nivel 01: Instituciones ── -->
                    <div class="teoria-detail-pane is-active" id="teoria-pane-1" role="tabpanel" aria-labelledby="teoria-card-1">
                        <div class="teoria-detail-header">
                            <span class="teoria-badge">01</span>
                            <h3 class="teoria-detail-title sh1b">1. Instituciones</h3>
                        </div>
                        
                        <div class="teoria-item-card">
                            <h4 class="teoria-item-title b1sb">
                                <i class="snd__icono snd-checkmark--outline icono--16" aria-hidden="true"></i>
                                Recursos y capacidades institucionales
                            </h4>
                            <p class="teoria-item-text b1r">
                                Las instituciones cuentan con los recursos humanos, técnicos y financieros necesarios, así como con capacidades organizacionales fortalecidas para llevar a cabo sus funciones, cumplir con sus objetivos y alcanzar los resultados previstos en materia de prevención, detección, sanción de la corrupción y fiscalización de los recursos públicos.
                            </p>
                        </div>

                        <div class="teoria-item-card mb--0">
                            <h4 class="teoria-item-title b1sb">
                                <i class="snd__icono snd-checkmark--outline icono--16" aria-hidden="true"></i>
                                Programas y acciones institucionales
                            </h4>
                            <p class="teoria-item-text b1r">
                                Se cuenta con planes institucionales estructurados y robustos, alineados a la Política Nacional Anticorrupción, que funjan como brújulas, para orientar sus acciones sustantivas en el corto, mediano y largo plazo.
                            </p>
                        </div>
                    </div>

                    <!-- ── Detalle Nivel 02: Enfoque Sistémico ── -->
                    <div class="teoria-detail-pane" id="teoria-pane-2" role="tabpanel" aria-labelledby="teoria-card-2">
                        <div class="teoria-detail-header">
                            <span class="teoria-badge">02</span>
                            <h3 class="teoria-detail-title sh1b">2. Enfoque Sistémico</h3>
                        </div>

                        <div class="teoria-item-card">
                            <h4 class="teoria-item-title b1sb">
                                <i class="snd__icono snd-collaborate icono--16" aria-hidden="true"></i>
                                Vinculación interinstitucional
                            </h4>
                            <p class="teoria-item-text b1r">
                                El reforzamiento de la unión de esfuerzos institucionales individuales para permitir la implementación de acciones conjuntas que se dirijan hacia el logro del mandato y objetivos establecidos en la LGSNA, poniendo en marcha los macroprocesos: prevención, detección, sanción y fiscalización y control de recursos.
                            </p>
                        </div>

                        <div class="teoria-item-card mb--0">
                            <h4 class="teoria-item-title b1sb">
                                <i class="snd__icono snd-screen icono--16" aria-hidden="true"></i>
                                Innovación tecnológica
                            </h4>
                            <p class="teoria-item-text b1r">
                                Robustecimiento de la Plataforma Digital Nacional para propiciar una mejor y más amplia interconexión entre los sistemas de información de las distintas instituciones participantes.
                            </p>
                        </div>
                    </div>

                    <!-- ── Detalle Nivel 03: PNA y PI-PNA ── -->
                    <div class="teoria-detail-pane" id="teoria-pane-3" role="tabpanel" aria-labelledby="teoria-card-3">
                        <div class="teoria-detail-header">
                            <span class="teoria-badge">03</span>
                            <h3 class="teoria-detail-title sh1b">3. Política Nacional Anticorrupción y PI-PNA</h3>
                        </div>

                        <p class="teoria-detail-desc b1r">
                            La PNA define el rumbo estratégico para combatir la corrupción en México, mientras que el PI-PNA busca traducir cada uno de los elementos de la PNA en Estrategias y Líneas de Acción concretas, que serán ejecutadas por actores responsables en un periodo de 3 años.
                        </p>

                        <!-- Principio Transversal de Inteligencia -->
                        <div class="teoria-transversal-card">
                            <span class="teoria-transversal-tag">
                                <i class="snd__icono snd-renew icono--16" aria-hidden="true"></i>
                                Principio Transversal
                            </span>
                            <h4 class="teoria-item-title b1sb">
                                Inteligencia como herramienta transversal
                            </h4>
                            <p class="teoria-item-text b1r">
                                La generación de información obtenida por las instituciones durante el desarrollo de sus capacidades, acciones y políticas públicas permitirá obtener evidencia que alimente la toma de decisiones y, en consecuencia, mejorar el desempeño de su función pública.
                            </p>
                        </div>
                    </div>

                    <!-- ── Detalle Nivel 04: Valor Público ── -->
                    <div class="teoria-detail-pane" id="teoria-pane-4" role="tabpanel" aria-labelledby="teoria-card-4">
                        <div class="teoria-detail-header">
                            <span class="teoria-badge">04</span>
                            <h3 class="teoria-detail-title sh1b">4. Valor público</h3>
                        </div>

                        <p class="teoria-detail-desc b1r">
                            En la medida en que los tres primeros niveles de la teoría de cambio generen resultados efectivos, la sociedad reconocerá las acciones de gobierno como valor público impactando positivamente otros ámbitos como en la mejora del ejercicio de los derechos humanos de la población.
                        </p>

                        <!-- Principio Transversal de Perspectiva de Género -->
                        <div class="teoria-transversal-card">
                            <span class="teoria-transversal-tag">
                                <i class="snd__icono snd-user icono--16" aria-hidden="true"></i>
                                Principio Transversal
                            </span>
                            <h4 class="teoria-item-title b1sb">
                                Principio transversal de perspectiva de género
                            </h4>
                            <p class="teoria-item-text b1r">
                                El SiSE recopilará datos en materia anticorrupción con perspectiva de género, a fin de conocer el impacto diferenciado por género del fenómeno de la corrupción y las acciones desplegadas en el marco del SNA.
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Indicador de Interacción al Pie (SND 4.16 Mensajes informativos) -->
                <div class="aviso aviso--info mt--24" role="note">
                    <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
                    <div class="aviso__cont">
                        <div class="aviso__txt">
                            <p class="b1r color--azul500 mb--0">Da clic en cada nivel para obtener más información.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         BLOQUE 4: Indicadores asociados al SiSE (SND v1.1.0)
         ============================================================ -->
    <section class="pb-5" id="indicadores-sise">
        <div class="contenedor">
            
            <!-- Encabezado de Sección: Título y Texto Introductorio fuera de la Card -->
            <div class="reticulaGrid__12 mb--24">
                <div class="columna__12">
                    <h2 class="h2b patria color--pguinda600 mb--16">Indicadores asociados al SiSE</h2>
                    <p class="sh1r sise-definicion color--neutro600 texto--justify mb--0">
                        Los indicadores asociados al SiSE permiten dar seguimiento a los avances en los objetivos estratégicos y las acciones implementadas en el marco del Sistema Nacional Anticorrupción.
                    </p>
                </div>
            </div>

            <!-- Card con el contenido de la sección -->
            <div class="cf-panel-card sise-panel-card indicadores-panel-card">
                <!-- Grilla de las 4 Tarjetas de Indicadores (Retícula Oficial de 12 Columnas) -->
                <div class="reticulaGrid__12">

                    <!-- ── Tarjeta 01: Indicadores Nacionales ── -->
                    <div class="columna__12 columna__6--md columna__3--lg">
                        <div class="sise-indicador-card">
                            <span class="teoria-badge" aria-label="Nivel 01">01</span>
                            <div class="sise-indicador-icon-wrap">
                                <div class="sise-indicador-icon-circle">
                                    <i class="snd__icono snd-chart--bar icono--40 color--pguinda600" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="sise-indicador-accent" aria-hidden="true"></div>
                            <h3 class="sh1b sise-indicador-title">
                                Indicadores Nacionales
                            </h3>
                            <div class="sise-indicador-statbox">
                                <span class="sh0b sise-statbox-num mb--0">10</span>
                                <span class="b1r mb--0">Objetivos Específicos de la PNA</span>
                            </div>
                            <a href="<?php echo esc_url( home_url('/seguimiento-evaluacion/indicadores-nacionales/') ); ?>" class="boton__primario" aria-label="Consultar Indicadores Nacionales">
                                Consultar indicadores
                            </a>
                        </div>
                    </div>

                    <!-- ── Tarjeta 02: Indicadores de Estrategia ── -->
                    <div class="columna__12 columna__6--md columna__3--lg">
                        <div class="sise-indicador-card">
                            <span class="teoria-badge" aria-label="Nivel 02">02</span>
                            <div class="sise-indicador-icon-wrap">
                                <div class="sise-indicador-icon-circle">
                                    <i class="snd__icono snd-catalog icono--40 color--pguinda600" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="sise-indicador-accent" aria-hidden="true"></div>
                            <h3 class="sh1b sise-indicador-title">
                                Indicadores de Estrategia
                            </h3>
                            <div class="sise-indicador-statbox">
                                <span class="sh0b sise-statbox-num mb--0">64</span>
                                <span class="b1r mb--0">Estrategias de PI-PNA</span>
                            </div>
                            <a href="#" class="boton__primario" role="button" aria-label="Consultar Indicadores de Estrategia">
                                Consultar indicadores
                            </a>
                        </div>
                    </div>

                    <!-- ── Tarjeta 03: Métrica de Género ── -->
                    <div class="columna__12 columna__6--md columna__3--lg">
                        <div class="sise-indicador-card">
                            <span class="teoria-badge" aria-label="Nivel 03">03</span>
                            <div class="sise-indicador-icon-wrap">
                                <div class="sise-indicador-icon-circle">
                                    <i class="snd__icono snd-group icono--40 color--pguinda600" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="sise-indicador-accent" aria-hidden="true"></div>
                            <h3 class="sh1b sise-indicador-title">
                                Métrica de Género
                            </h3>
                            <div class="sise-indicador-statbox">
                                <div class="flex-shrink-0 muestra--flex align-items-center">
                                    <i class="snd__icono snd-user icono--24 color--neutro800" aria-hidden="true"></i>
                                </div>
                                <span class="b1r mb--0">Estima el impacto diferenciado de la corrupción</span>
                            </div>
                            <a href="#" class="boton__primario" role="button" aria-label="Consultar Métrica de Género">
                                Consultar metodología
                            </a>
                        </div>
                    </div>

                    <!-- ── Tarjeta 04: Indicadores Estatales ── -->
                    <div class="columna__12 columna__6--md columna__3--lg">
                        <div class="sise-indicador-card">
                            <span class="teoria-badge" aria-label="Nivel 04">04</span>
                            <div class="sise-indicador-icon-wrap">
                                <div class="sise-indicador-icon-circle">
                                    <i class="snd__icono snd-map icono--40 color--pguinda600" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="sise-indicador-accent" aria-hidden="true"></div>
                            <h3 class="sh1b sise-indicador-title">
                                Indicadores Estatales
                            </h3>
                            <div class="sise-indicador-statbox">
                                <div class="flex-shrink-0 muestra--flex align-items-center">
                                    <i class="snd__icono snd-document icono--24 color--neutro800" aria-hidden="true"></i>
                                </div>
                                <span class="b1r mb--0">PEAs y/o PI-PEAs</span>
                            </div>
                            <a href="#" class="boton__primario" role="button" aria-label="Consultar Indicadores Estatales">
                                Consultar indicadores
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         BLOQUE 5: Evaluación de la Política Nacional Anticorrupción (SND v1.1.0)
         ============================================================ -->
    <section class="pb-5" id="evaluacion-pna">
        <div class="contenedor">

            <!-- Encabezado de Sección: Título, Descripción y Callout 2025 (Izquierda) + Espacio para Imagen (Derecha) -->
            <div class="reticulaGrid__12 align-items-center mb--24">
                <div class="columna__12 columna__7--lg">
                    <h2 class="h2b patria color--pguinda600 mb--16">Evaluación de la Política Nacional Anticorrupción</h2>
                    <p class="sh1r sise-definicion color--neutro600 texto--justify mb--24">
                        La Evaluación de la Política Nacional Anticorrupción (PNA) tiene como objetivo valorar las acciones realizadas en el marco de la PNA a cinco años de su implementación, considerando la coordinación de sus mecanismos, así como el desempeño de los actores que integran el Sistema Nacional Anticorrupción (SNA), con el fin de identificar fortalezas y áreas de mejora para su fortalecimiento.
                    </p>
                    <div class="cp-subsec-enlace">
                        <div class="cp-subsec-enlace__icono">
                            <i class="snd__icono snd-calendar icono--24 color--neutro100" aria-hidden="true"></i>
                        </div>
                        <div class="cp-subsec-enlace__texto">
                            <p class="cp-subsec-enlace__titulo b1sb mb--0">
                                La primera evaluación sobre la implementación de la PNA se realizó en <span class="color--pguinda600">2025</span>.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Espacio reservado para imagen / portada de la Evaluación PNA -->
                <div class="columna__12 columna__5--lg sise-eval-media-col">
                    <div class="sise-eval-media-slot">
                        <!-- Colocar aquí la imagen de portada de la Evaluación PNA:
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/pna/evaluacion_pna_portada.png' ); ?>"
                             alt="Evaluación de la Política Nacional Anticorrupción"
                             class="sise-eval-media-slot__img"
                             loading="lazy">
                        -->
                    </div>
                </div>
            </div>

            <!-- Card Blanca: Documentos de consulta -->
            <div class="cf-panel-card sise-panel-card sise-eval-panel-card">

                <!-- Cabecera de Documentos de consulta -->
                <div class="sise-eval-docs-header mb--24">
                    <div class="sise-eval-docs-header__icon">
                        <i class="snd__icono snd-document icono--32 color--pguinda600" aria-hidden="true"></i>
                    </div>
                    <div class="sise-eval-docs-header__text">
                        <h3 class="sh1b mb--4">Documentos de consulta</h3>
                        <p class="b1r mb--0">Consulta y descarga los documentos de la Evaluación de la Política Nacional Anticorrupción (2025).</p>
                    </div>
                </div>

                <!-- Grilla de 3 Documentos (Retícula Oficial de 12 Columnas) -->
                <div class="reticulaGrid__12">

                    <!-- Documento 1: Informe de la Evaluación de la PNA -->
                    <div class="columna__12 columna__6--md columna__4--lg">
                        <div class="sise-eval-doc-card">
                            <div class="cp-doc-thumb cp-doc-thumb--burgundi flex-shrink-0">
                                <div class="cp-doc-thumb__logo">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/icon_logo_sesna.png' ); ?>" alt="SESNA" style="max-width: 38px; max-height: 22px; object-fit: contain; filter: brightness(0) invert(1);">
                                </div>
                                <p class="cp-doc-thumb__nombre">SERVICIO DE EVALUACIÓN DE LA POLÍTICA NACIONAL ANTICORRUPCIÓN</p>
                            </div>
                            <div class="sise-eval-doc-card__body">
                                <h4 class="sh1b sise-eval-doc-card__title">Informe de la Evaluación de la PNA</h4>
                                <a href="#"
                                   class="boton__secundario sise-eval-doc-btn"
                                   data-modal-target="#pdfViewerModal"
                                   data-pdf-title="Informe de la Evaluación de la PNA"
                                   data-pdf-url="#"
                                   title="Ver documento (Abre visor)">
                                    <i class="snd snd__icono snd-screen icono--16" aria-hidden="true"></i> Ver documento
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Documento 2: Resumen Ejecutivo -->
                    <div class="columna__12 columna__6--md columna__4--lg">
                        <div class="sise-eval-doc-card">
                            <div class="cp-doc-thumb cp-doc-thumb--burgundi flex-shrink-0">
                                <div class="cp-doc-thumb__logo">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/icon_logo_sesna.png' ); ?>" alt="SESNA" style="max-width: 38px; max-height: 22px; object-fit: contain; filter: brightness(0) invert(1);">
                                </div>
                                <p class="cp-doc-thumb__nombre">EVALUACIÓN DE LA POLÍTICA NACIONAL ANTICORRUPCIÓN — RESUMEN EJECUTIVO</p>
                            </div>
                            <div class="sise-eval-doc-card__body">
                                <h4 class="sh1b sise-eval-doc-card__title">Resumen Ejecutivo</h4>
                                <a href="#"
                                   class="boton__secundario sise-eval-doc-btn"
                                   data-modal-target="#pdfViewerModal"
                                   data-pdf-title="Evaluación de la PNA — Resumen Ejecutivo"
                                   data-pdf-url="#"
                                   title="Ver documento (Abre visor)">
                                    <i class="snd snd__icono snd-screen icono--16" aria-hidden="true"></i> Ver documento
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Documento 3: Presentación de resultados -->
                    <div class="columna__12 columna__6--md columna__4--lg">
                        <div class="sise-eval-doc-card">
                            <div class="cp-doc-thumb cp-doc-thumb--burgundi flex-shrink-0">
                                <div class="cp-doc-thumb__logo">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/icon_logo_sesna.png' ); ?>" alt="SESNA" style="max-width: 38px; max-height: 22px; object-fit: contain; filter: brightness(0) invert(1);">
                                </div>
                                <p class="cp-doc-thumb__nombre">EVALUACIÓN DE LA POLÍTICA NACIONAL ANTICORRUPCIÓN — HALLAZGOS Y RECOMENDACIONES</p>
                            </div>
                            <div class="sise-eval-doc-card__body">
                                <h4 class="sh1b sise-eval-doc-card__title">Presentación de resultados</h4>
                                <a href="#"
                                   class="boton__secundario sise-eval-doc-btn"
                                   data-modal-target="#pdfViewerModal"
                                   data-pdf-title="Evaluación de la PNA — Presentación de resultados"
                                   data-pdf-url="#"
                                   title="Ver documento (Abre visor)">
                                    <i class="snd snd__icono snd-screen icono--16" aria-hidden="true"></i> Ver documento
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- ============================================================
         BLOQUE 6: Otras herramientas de consulta (SND v1.1.0)
         ============================================================ -->
    <section class="pb-5" id="otras-herramientas">
        <div class="contenedor">

            <!-- Encabezado de Sección: Título y Descripción fuera de la Card -->
            <div class="reticulaGrid__12 mb--24">
                <div class="columna__12">
                    <h2 class="h2b patria color--pguinda600 mb--16">Otras herramientas de consulta</h2>
                    <p class="sh1r sise-definicion color--neutro600 texto--justify mb--0">
                        El SNA cuenta con herramientas complementarias que generan información para el seguimiento, evaluación y fortalecimiento de la Política Nacional Anticorrupción.
                    </p>
                </div>
            </div>

            <!-- Grilla de las 2 Tarjetas de Herramientas (Homologadas a tx-consulta-card del SND) -->
            <div class="reticulaGrid__12">

                <!-- ── Tarjeta 01: Catálogo de Información (CICM) ── -->
                <div class="columna__12 columna__6--md mb--24 mb--0--md">
                    <a href="<?php echo esc_url( 'https://cicm.sesna.gob.mx/' ); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       title="Catálogo de Información sobre la Corrupción en México (El enlace abre en ventana nueva)" 
                       class="tx-consulta-card radio--4 alto--100 d-block decoracion--ninguna">
                        <div class="muestra--flex align-items-start gap--16 alto--100">
                            <div class="tx-consulta-card__icon-wrap flex-none" aria-hidden="true">
                                <i class="snd__icono snd-catalog icono--32 color--pguinda600" aria-hidden="true"></i>
                            </div>
                            <div class="muestra--flex flex-direction-column alto--100 flex-grow">
                                <h3 class="sh1b tx-consulta-card__title color--neutro800 mb--8">Catálogo de Información (CICM)</h3>
                                <p class="b1r color--neutro600 tx-consulta-card__desc flex-grow mb--16">
                                    Integra información estadística, geográfica y documental sobre la corrupción en México, con el objetivo de facilitar su consulta y análisis.
                                </p>
                                <div class="mt--auto">
                                    <span class="boton__primario"
                                          aria-label="Ir al portal del Catálogo de Información sobre la Corrupción en México (abre en nueva ventana)">
                                        <i class="snd__icono snd-launch icono--16" aria-hidden="true"></i>
                                        Ir al portal
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- ── Tarjeta 02: Sistemas Estatales (SEA) ── -->
                <div class="columna__12 columna__6--md">
                    <a href="<?php echo esc_url( 'https://www.sna.org.mx/sistemas-estatales-anticorrupcion/' ); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       title="Sistemas Estatales Anticorrupción (El enlace abre en ventana nueva)" 
                       class="tx-consulta-card radio--4 alto--100 d-block decoracion--ninguna">
                        <div class="muestra--flex align-items-start gap--16 alto--100">
                            <div class="tx-consulta-card__icon-wrap flex-none" aria-hidden="true">
                                <i class="snd__icono snd-map icono--32 color--pguinda600" aria-hidden="true"></i>
                            </div>
                            <div class="muestra--flex flex-direction-column alto--100 flex-grow">
                                <h3 class="sh1b tx-consulta-card__title color--neutro800 mb--8">Sistemas Estatales (SEA)</h3>
                                <p class="b1r color--neutro600 tx-consulta-card__desc flex-grow mb--16">
                                    Consulta información sobre los Sistemas Estatales Anticorrupción, su integración, marco normativo y avances en la implementación de sus políticas estatales.
                                </p>
                                <div class="mt--auto">
                                    <span class="boton__primario"
                                          aria-label="Ir al portal de Sistemas Estatales Anticorrupción (abre en nueva ventana)">
                                        <i class="snd__icono snd-launch icono--16" aria-hidden="true"></i>
                                        Ir al portal
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ── Acordeón de Criterios SiSE ──
    const accordion = document.getElementById('siseCriteriaAccordion');
    if (accordion) {
        const items = accordion.querySelectorAll('.sise-accordion-item');
        items.forEach(item => {
            const header = item.querySelector('.sise-accordion-header');
            if (!header) return;

            header.addEventListener('click', function() {
                const isOpen = item.classList.contains('is-open');

                items.forEach(otherItem => {
                    otherItem.classList.remove('is-open');
                    const btn = otherItem.querySelector('.sise-accordion-header');
                    const chevron = otherItem.querySelector('.fin-acc-chevron');
                    if (btn) btn.setAttribute('aria-expanded', 'false');
                    if (chevron) chevron.classList.remove('is-open');
                });

                if (!isOpen) {
                    item.classList.add('is-open');
                    header.setAttribute('aria-expanded', 'true');
                    const chevron = header.querySelector('.fin-acc-chevron');
                    if (chevron) chevron.classList.add('is-open');
                }
            });
        });
    }

    // ── Interacción Teoría de Cambio (Tabs / Cards Selectoras) ──
    const teoriaCards = document.querySelectorAll('.teoria-card');
    const teoriaPanes = document.querySelectorAll('.teoria-detail-pane');
    const teoriaContainer = document.getElementById('teoriaDetailContainer');

    function selectTeoriaLevel(level) {
        teoriaCards.forEach(card => {
            const cardLevel = card.getAttribute('data-level');
            const isActive = (cardLevel === String(level));
            card.classList.toggle('is-active', isActive);
            card.setAttribute('aria-selected', isActive ? 'true' : 'false');
            card.setAttribute('tabindex', isActive ? '0' : '-1');
        });

        teoriaPanes.forEach(pane => {
            const paneId = pane.getAttribute('id');
            const isTarget = (paneId === `teoria-pane-${level}`);
            pane.classList.toggle('is-active', isTarget);
        });

        // En pantallas pequeñas, enfocar suavemente el contenedor de detalles
        if (window.innerWidth < 992 && teoriaContainer) {
            teoriaContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    }

    teoriaCards.forEach(card => {
        card.addEventListener('click', function() {
            const level = this.getAttribute('data-level');
            selectTeoriaLevel(level);
        });

        card.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const level = this.getAttribute('data-level');
                selectTeoriaLevel(level);
            }
        });
    });

    // ── Homologación de altura absoluta de las cards, títulos, statboxes y botones ──
    function equalizeSiseElements() {
        const statboxes = document.querySelectorAll('.sise-indicador-statbox');
        if (statboxes.length > 0) {
            statboxes.forEach(el => el.style.minHeight = '');
            let maxH = 0;
            statboxes.forEach(el => {
                const h = el.offsetHeight;
                if (h > maxH) maxH = h;
            });
            if (maxH > 0) {
                statboxes.forEach(el => {
                    el.style.minHeight = maxH + 'px';
                });
            }
        }

        const titles = document.querySelectorAll('.sise-indicador-title');
        if (titles.length > 0) {
            titles.forEach(el => el.style.minHeight = '');
            let maxT = 0;
            titles.forEach(el => {
                const h = el.offsetHeight;
                if (h > maxT) maxT = h;
            });
            if (maxT > 0) {
                titles.forEach(el => {
                    el.style.minHeight = maxT + 'px';
                });
            }
        }

        const btns = document.querySelectorAll('.sise-indicador-card .boton__primario');
        if (btns.length > 0) {
            btns.forEach(el => el.style.minHeight = '');
            let maxB = 0;
            btns.forEach(el => {
                const h = el.offsetHeight;
                if (h > maxB) maxB = h;
            });
            if (maxB > 0) {
                btns.forEach(el => {
                    el.style.minHeight = maxB + 'px';
                });
            }
        }

        const hTitles = document.querySelectorAll('#otras-herramientas .tx-consulta-card__title');
        if (hTitles.length > 0) {
            hTitles.forEach(el => el.style.minHeight = '');
            let maxHT = 0;
            hTitles.forEach(el => {
                const h = el.offsetHeight;
                if (h > maxHT) maxHT = h;
            });
            if (maxHT > 0) {
                hTitles.forEach(el => {
                    el.style.minHeight = maxHT + 'px';
                });
            }
        }
    }

    equalizeSiseElements();
    window.addEventListener('load', equalizeSiseElements);
    window.addEventListener('resize', equalizeSiseElements);
    if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(equalizeSiseElements);
    }
});
</script>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<?php
get_footer();
?>