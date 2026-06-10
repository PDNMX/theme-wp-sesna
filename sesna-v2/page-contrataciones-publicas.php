<?php
/**
 * Template Name: Contrataciones Públicas
 * Template Post Type: page
 *
 * @package sesna
 */
get_header();
?>

<div class="page-contrataciones front-page-bg">

    <!-- ── Breadcrumb ─────────────────────────────────────────── -->
    <nav class="gobmx-breadcrumb-container" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>">
                        <i class="bi bi-house-door"></i> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/riesgos-inteligencia/') ); ?>">Riesgos e Inteligencia Anticorrupción</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Contrataciones públicas</li>
            </ol>
        </div>
    </nav>

    <!-- ── Hero ──────────────────────────────────────────────── -->
    <section class="cp-hero py-5">
        <div class="container">
            <div class="row align-items-center g-5">

                <!-- Card ilustración -->
                <div class="col-lg-4 col-md-5">
                    <div class="cp-hero-card">
                        <div class="cp-hero-card__img">
                            <i class="bi bi-file-earmark-check cp-hero-card__icon-main"></i>
                            <i class="bi bi-bank cp-hero-card__icon-sub"></i>
                        </div>
                        <div class="cp-hero-card__body">
                            <h2 class="cp-hero-card__title">CONTRATACIONES PÚBLICAS</h2>
                            <p class="cp-hero-card__subtitle">Análisis y prevención de riesgos de corrupción</p>
                        </div>
                    </div>
                </div>

                <!-- Texto descriptivo -->
                <div class="col-lg-8 col-md-7 position-relative z-1">
                    <h1 class="tx-hero__title fw-bold mb-3 font-patria">Contrataciones públicas</h1>
                    <div class="hero-separator" style="width: 60px; height: 4px; background-color: var(--color-burgundi); border-radius: 2px; margin-bottom: 22px;"></div>
                    <p class="tx-hero__subtitle text-muted mb-3" style="max-width: 600px;">El macroproceso de contrataciones públicas no es sencillo, ya que en él intervienen múltiples subprocesos y actividades específicas. En ese sentido, la implementación de actividades de mejora y control deben estar presentes en múltiples aristas del procedimiento, para asegurar un cambio integral, que permita fortalecerlos, con el fin de mejorar la calidad del gasto, promover la competencia y estimular la transparencia.</p>
                    <p class="tx-hero__subtitle text-muted mb-0" style="max-width: 600px;">Para contribuir con lo anterior se han elaborado los siguientes recursos:</p>
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
                            <i class="bi bi-c-circle"></i> SESNA
                        </div>
                        <p class="cp-doc-thumb__nombre"><?php echo esc_html($doc['titulo']); ?></p>
                        <div class="cp-doc-thumb__footer">
                            <span>DOCUMENTO<br>TÉCNICO</span>
                            <span><?php echo esc_html($doc['anio']); ?></span>
                        </div>
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

</div><!-- /.page-contrataciones -->

<?php get_footer(); ?>
