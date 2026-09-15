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

            </div>
        </div>
    </section>

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
                $documentos = [
                    [
                        'badge'       => 'Documento técnico',
                        'titulo'      => 'Análisis normativo nacional contrataciones públicas SESNA',
                        'descripcion' => 'Análisis del marco normativo aplicable a las contrataciones públicas en México, con enfoque en riesgos de corrupción y áreas de oportunidad.',
                        'anio'        => '2025',
                        'formato'     => 'PDF',
                        'paginas'     => '45 págs.',
                        'color'       => 'burgundi',
                        'url_ver'     => '#',
                        'url_pdf'     => '#',
                    ],
                    [
                        'badge'       => 'Documento técnico',
                        'titulo'      => 'Análisis normativo nacional obra pública',
                        'descripcion' => 'Revisión y análisis del marco normativo en materia de obra pública, identificando riesgos de corrupción y buenas prácticas para su mitigación.',
                        'anio'        => '2025',
                        'formato'     => 'PDF',
                        'paginas'     => '38 págs.',
                        'color'       => 'teal',
                        'url_ver'     => '#',
                        'url_pdf'     => '#',
                    ],
                    [
                        'badge'       => 'Documento técnico',
                        'titulo'      => 'Propuesta de variables estratégicas para el seguimiento de las contrataciones públicas en México',
                        'descripcion' => 'Propuesta de variables e indicadores clave para el seguimiento y monitoreo de contrataciones públicas, orientadas a la detección temprana de riesgos.',
                        'anio'        => '2025',
                        'formato'     => 'PDF',
                        'paginas'     => '52 págs.',
                        'color'       => 'negro',
                        'url_ver'     => '#',
                        'url_pdf'     => '#',
                    ],
                ];
                foreach ( $documentos as $doc ) : ?>

                <div class="cp-doc-item">

                    <!-- Thumbnail del documento -->
                    <div class="cp-doc-thumb cp-doc-thumb--<?php echo esc_attr($doc['color']); ?>">
                        <div class="cp-doc-thumb__logo">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/icon_logo_sesna.png' ); ?>" alt="SESNA" style="max-width: 38px; max-height: 22px; object-fit: contain; filter: brightness(0) invert(1);">
                        </div>
                        <p class="cp-doc-thumb__nombre"><?php echo esc_html($doc['titulo']); ?></p>
                    </div>

                    <!-- Info del documento -->
                    <div class="cp-doc-info">
                        <span class="cp-doc-badge"><?php echo esc_html($doc['badge']); ?></span>
                        <h3 class="cp-doc-titulo"><?php echo esc_html($doc['titulo']); ?></h3>
                        <p class="cp-doc-desc"><?php echo esc_html($doc['descripcion']); ?></p>
                        <div class="cp-doc-meta">
                            <span><i class="bi bi-calendar3"></i> <?php echo esc_html($doc['anio']); ?></span>
                            <span class="cp-doc-meta__sep">·</span>
                            <span><i class="bi bi-file-earmark"></i> <?php echo esc_html($doc['formato']); ?></span>
                            <span class="cp-doc-meta__sep">·</span>
                            <span><?php echo esc_html($doc['paginas']); ?></span>
                        </div>
                    </div>

                    <!-- Acciones -->
                    <div class="cp-doc-acciones">
                        <a href="<?php echo esc_url($doc['url_ver']); ?>" class="cp-btn-ver" target="_blank" rel="noopener">
                            <i class="bi bi-eye"></i> Ver documento
                        </a>
                        <a href="<?php echo esc_url($doc['url_pdf']); ?>" class="cp-btn-pdf" target="_blank" rel="noopener" download>
                            <i class="bi bi-download"></i> Descargar PDF
                        </a>
                    </div>

                </div>

                <?php endforeach; ?>

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
            <!-- ── Funcionalidades principales ───────────────────────── -->
    <section class="vp-funcionalidades py-4">
        <div class="container">
            <div class="vp-func-box">

            <h2 class="text-center fw-bold font-patria vp-func-box__title mb-4">
                Funcionalidades principales
            </h2>

            <div class="vp-func-row">

                <div class="vp-func-item">
                    <div class="vp-func-item__icon">
                        <i class="bi bi-cpu"></i>
                    </div>
                    <div class="vp-func-item__text">
                        <h5 class="vp-func-item__title">Generación automatizada</h5>
                        <p class="vp-func-item__desc">Realiza muestreos aleatorios simples con base en parámetros definidos y criterios normativos.</p>
                    </div>
                </div>

                <div class="vp-func-sep">|</div>

                <div class="vp-func-item">
                    <div class="vp-func-item__icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="vp-func-item__text">
                        <h5 class="vp-func-item__title">Apoyo a la verificación</h5>
                        <p class="vp-func-item__desc">Facilita la identificación de casos para la verificación patrimonial y de intereses.</p>
                    </div>
                </div>

                <div class="vp-func-sep">|</div>

                <div class="vp-func-item">
                    <div class="vp-func-item__icon">
                        <i class="bi bi-file-earmark-ruled"></i>
                    </div>
                    <div class="vp-func-item__text">
                        <h5 class="vp-func-item__title">Criterios técnicos</h5>
                        <p class="vp-func-item__desc">Basado en lineamientos normativos y metodologías estandarizadas.</p>
                    </div>
                </div>

            </div>

            <!-- CTA -->
            <div class="text-center mt-5 pt-2">
                <a href="#" class="btn-sesna btn-sesna--lg" target="_blank" rel="noopener">
                    <i class="bi bi-display fs-5"></i>
                    Acceder a la herramienta
                    <i class="bi bi-box-arrow-up-right fs-6"></i>
                </a>
            </div>

            </div><!-- /.vp-func-box -->
        </div>
    </section>

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

            <div class="cp-docs-lista">

                <?php
                $documentos = [
                    [
                        'badge'       => 'Documento técnico',
                        'titulo'      => 'Nota técnica normativa del procedimiento de verificación evolución patrimonial',
                        'descripcion' => 'Documento que establece el marco normativo y procedimental para la verificación de la evolución patrimonial y de intereses en el servicio público.',
                        'anio'        => '2025',
                        'formato'     => 'PDF',
                        'paginas'     => '28 págs.',
                        'color'       => 'teal',
                        'url_ver'     => '#',
                        'url_pdf'     => '#',
                    ],
                    [
                        'badge'       => 'Documento técnico',
                        'titulo'      => 'Nota Elementos Técnicos del GM',
                        'descripcion' => 'Describe los elementos técnicos y parámetros utilizados en el Generador de Muestras (GM) para la selección aleatoria y la integridad del proceso.',
                        'anio'        => '2025',
                        'formato'     => 'PDF',
                        'paginas'     => '18 págs.',
                        'color'       => 'negro',
                        'url_ver'     => '#',
                        'url_pdf'     => '#',
                    ],
                    [
                        'badge'       => 'Documento técnico',
                        'titulo'      => 'Guía de funcionamiento',
                        'descripcion' => 'Guía práctica para el uso del Generador de Muestras Aleatorio, incluye instrucciones, roles y buenas prácticas.',
                        'anio'        => '2025',
                        'formato'     => 'PDF',
                        'paginas'     => '34 págs.',
                        'color'       => 'negro',
                        'url_ver'     => '#',
                        'url_pdf'     => '#',
                    ],
                ];
                foreach ( $documentos as $doc ) : ?>

                <div class="cp-doc-item">
                    <div class="cp-doc-thumb cp-doc-thumb--<?php echo esc_attr($doc['color']); ?>">
                        <div class="cp-doc-thumb__logo"><i class="bi bi-c-circle"></i> SESNA</div>
                        <p class="cp-doc-thumb__nombre"><?php echo esc_html($doc['titulo']); ?></p>
                        <div class="cp-doc-thumb__footer">
                            <span>DOCUMENTO<br>TÉCNICO</span>
                            <span><?php echo esc_html($doc['anio']); ?></span>
                        </div>
                    </div>
                    <div class="cp-doc-info">
                        <span class="cp-doc-badge"><?php echo esc_html($doc['badge']); ?></span>
                        <h3 class="cp-doc-titulo"><?php echo esc_html($doc['titulo']); ?></h3>
                        <p class="cp-doc-desc"><?php echo esc_html($doc['descripcion']); ?></p>
                        <div class="cp-doc-meta">
                            <span><i class="bi bi-calendar3"></i> <?php echo esc_html($doc['anio']); ?></span>
                            <span class="cp-doc-meta__sep">·</span>
                            <span><i class="bi bi-file-earmark"></i> <?php echo esc_html($doc['formato']); ?></span>
                            <span class="cp-doc-meta__sep">·</span>
                            <span><?php echo esc_html($doc['paginas']); ?></span>
                        </div>
                    </div>
                    <div class="cp-doc-acciones">
                        <a href="<?php echo esc_url($doc['url_ver']); ?>" class="cp-btn-ver" target="_blank" rel="noopener">
                            <i class="bi bi-eye"></i> Ver documento
                        </a>
                        <a href="<?php echo esc_url($doc['url_pdf']); ?>" class="cp-btn-pdf" target="_blank" rel="noopener" download>
                            <i class="bi bi-download"></i> Descargar PDF
                        </a>
                    </div>
                </div>

                <?php endforeach; ?>

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

        <div id="sec-conflicto" class="dinamic-section" style="display: none;">
            <div class="text-center py-5">
                <i class="bi bi-tools text-muted mb-3" style="font-size: 3rem;"></i>
                <h3 class="fw-bold">Contenido en construcción</h3>
                <p class="text-muted">Los recursos para Conflicto de interés estarán disponibles próximamente.</p>
            </div>
        </div>

        <div id="sec-deporte" class="dinamic-section" style="display: none;">
            <div class="text-center py-5">
                <i class="bi bi-tools text-muted mb-3" style="font-size: 3rem;"></i>
                <h3 class="fw-bold">Contenido en construcción</h3>
                <p class="text-muted">Los recursos para Deporte estarán disponibles próximamente.</p>
            </div>
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
                this.style.boxShadow = '0 0 0 3px rgba(155, 34, 66, 0.5)'; // Estilo activo guinda
                
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
    });
    </script>

</div>

<?php get_footer(); ?>
