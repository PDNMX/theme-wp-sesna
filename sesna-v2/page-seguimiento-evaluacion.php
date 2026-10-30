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

    <!-- ============================================================
         BLOQUE 3: Teoría de Cambio (SND v1.1.0)
         ============================================================ -->
    <section class="pb-5" id="teoria-cambio">
        <div class="contenedor">
            <div class="cf-panel-card sise-panel-card teoria-panel-card">
                
                <!-- Título y Texto Introductorio de la Teoría de Cambio -->
                <div class="reticulaGrid__12 mb--24">
                    <div class="columna__12">
                        <h2 class="h1b patria color--pguinda600 mb--16">Teoría de cambio</h2>
                        <p class="sise-definicion color--neutro700 texto--justify mb--32">
                            La teoría de cambio define los objetivos a alcanzar para ejercer la acción pública con integridad y apego a la legalidad, por lo que el cumplimiento de determinado objetivo brindará las condiciones necesarias para poder alcanzar los objetivos del nivel inmediato superior. La teoría de cambio del SiSE cuenta con cuatro niveles de objetivos enmarcado en ámbitos de competencia distintos.
                        </p>
                    </div>
                </div>

                <!-- Banner Transversal: Instrumentos de Inteligencia Aprovechados -->
                <div class="teoria-transversal-container">
                    <div class="teoria-transversal-pill">
                        <div class="teoria-transversal-icon">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/pna/inteligencia-monitor.svg' ); ?>" alt="" aria-hidden="true">
                        </div>
                        <div class="teoria-transversal-content">
                            <h3 class="teoria-transversal-title">Instrumentos de inteligencia aprovechados</h3>
                            <p class="teoria-transversal-desc">Generación y uso de información para la toma de decisiones</p>
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
                            <h3 class="teoria-card-title">Instituciones</h3>
                            <div class="teoria-card-pills">
                                <div class="teoria-pill">Recursos y capacidades institucionales fortalecidas</div>
                                <div class="teoria-pill">Programas institucionales bien definidos e implementados</div>
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
                            <h3 class="teoria-card-title">Enfoque sistémico</h3>
                            <div class="teoria-card-pills">
                                <div class="teoria-pill">Vinculación de funciones orientadas a cumplir los procesos establecidos en la LGSNA mejorada</div>
                                <div class="teoria-pill">Innovación tecnológica robustecida, a través del mejoramiento en la gestión de la información institucional</div>
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
                            <h3 class="teoria-card-title">Política Nacional Anticorrupción y Programa de Implementación</h3>
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
                            <h3 class="teoria-card-title">Valor público</h3>
                            <div class="teoria-card-pills">
                                <div class="teoria-pill">Acción gubernamental ejercida con integridad</div>
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
                            <h3 class="teoria-detail-title">1. Instituciones</h3>
                        </div>
                        
                        <div class="teoria-item-card">
                            <h4 class="teoria-item-title">
                                <i class="snd__icono snd-checkmark--outline icono--16" aria-hidden="true"></i>
                                Recursos y capacidades institucionales
                            </h4>
                            <p class="teoria-item-text">
                                Las instituciones cuentan con los recursos humanos, técnicos y financieros necesarios, así como con capacidades organizacionales fortalecidas para llevar a cabo sus funciones, cumplir con sus objetivos y alcanzar los resultados previstos en materia de prevención, detección, sanción de la corrupción y fiscalización de los recursos públicos.
                            </p>
                        </div>

                        <div class="teoria-item-card mb--0">
                            <h4 class="teoria-item-title">
                                <i class="snd__icono snd-checkmark--outline icono--16" aria-hidden="true"></i>
                                Programas y acciones institucionales
                            </h4>
                            <p class="teoria-item-text">
                                Se cuenta con planes institucionales estructurados y robustos, alineados a la Política Nacional Anticorrupción, que funjan como brújulas, para orientar sus acciones sustantivas en el corto, mediano y largo plazo.
                            </p>
                        </div>
                    </div>

                    <!-- ── Detalle Nivel 02: Enfoque Sistémico ── -->
                    <div class="teoria-detail-pane" id="teoria-pane-2" role="tabpanel" aria-labelledby="teoria-card-2">
                        <div class="teoria-detail-header">
                            <span class="teoria-badge">02</span>
                            <h3 class="teoria-detail-title">2. Enfoque Sistémico</h3>
                        </div>

                        <div class="teoria-item-card">
                            <h4 class="teoria-item-title">
                                <i class="snd__icono snd-collaborate icono--16" aria-hidden="true"></i>
                                Vinculación interinstitucional
                            </h4>
                            <p class="teoria-item-text">
                                El reforzamiento de la unión de esfuerzos institucionales individuales para permitir la implementación de acciones conjuntas que se dirijan hacia el logro del mandato y objetivos establecidos en la LGSNA, poniendo en marcha los macroprocesos: prevención, detección, sanción y fiscalización y control de recursos.
                            </p>
                        </div>

                        <div class="teoria-item-card mb--0">
                            <h4 class="teoria-item-title">
                                <i class="snd__icono snd-screen icono--16" aria-hidden="true"></i>
                                Innovación tecnológica
                            </h4>
                            <p class="teoria-item-text">
                                Robustecimiento de la Plataforma Digital Nacional para propiciar una mejor y más amplia interconexión entre los sistemas de información de las distintas instituciones participantes.
                            </p>
                        </div>
                    </div>

                    <!-- ── Detalle Nivel 03: PNA y PI-PNA ── -->
                    <div class="teoria-detail-pane" id="teoria-pane-3" role="tabpanel" aria-labelledby="teoria-card-3">
                        <div class="teoria-detail-header">
                            <span class="teoria-badge">03</span>
                            <h3 class="teoria-detail-title">3. Política Nacional Anticorrupción y PI-PNA</h3>
                        </div>

                        <p class="teoria-detail-desc">
                            La PNA define el rumbo estratégico para combatir la corrupción en México, mientras que el PI-PNA busca traducir cada uno de los elementos de la PNA en Estrategias y Líneas de Acción concretas, que serán ejecutadas por actores responsables en un periodo de 3 años.
                        </p>

                        <!-- Principio Transversal de Inteligencia -->
                        <div class="teoria-transversal-card">
                            <span class="teoria-transversal-tag">
                                <i class="snd__icono snd-renew icono--16" aria-hidden="true"></i>
                                Principio Transversal
                            </span>
                            <h4 class="teoria-item-title">
                                Inteligencia como herramienta transversal
                            </h4>
                            <p class="teoria-item-text">
                                La generación de información obtenida por las instituciones durante el desarrollo de sus capacidades, acciones y políticas públicas permitirá obtener evidencia que alimente la toma de decisiones y, en consecuencia, mejorar el desempeño de su función pública.
                            </p>
                        </div>
                    </div>

                    <!-- ── Detalle Nivel 04: Valor Público ── -->
                    <div class="teoria-detail-pane" id="teoria-pane-4" role="tabpanel" aria-labelledby="teoria-card-4">
                        <div class="teoria-detail-header">
                            <span class="teoria-badge">04</span>
                            <h3 class="teoria-detail-title">4. Valor público</h3>
                        </div>

                        <p class="teoria-detail-desc">
                            En la medida en que los tres primeros niveles de la teoría de cambio generen resultados efectivos, la sociedad reconocerá las acciones de gobierno como valor público impactando positivamente otros ámbitos como en la mejora del ejercicio de los derechos humanos de la población.
                        </p>

                        <!-- Principio Transversal de Perspectiva de Género -->
                        <div class="teoria-transversal-card">
                            <span class="teoria-transversal-tag">
                                <i class="snd__icono snd-user icono--16" aria-hidden="true"></i>
                                Principio Transversal
                            </span>
                            <h4 class="teoria-item-title">
                                Principio transversal de perspectiva de género
                            </h4>
                            <p class="teoria-item-text">
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

<!--     <div class="contenedor">
        <div class="reticulaGrid__12">

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
    </div> -->
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
});
</script>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<?php
get_footer();
?>