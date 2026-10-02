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
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>">
                        <svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/riesgos-e-inteligencia-anticorrupcion/') ); ?>">Riesgos e Inteligencia Anticorrupción</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Contrataciones públicas</li>
            </ol>
        </div>
    </nav>

    <!-- ── Hero ──────────────────────────────────────────────── -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="fila align-items-center gap--48">

                <!-- Card ilustración -->
                <div class="columna__4--lg columna__5--md">
                    <div class="cp-hero-card">
                        <div class="cp-hero-card__img">
                            <svg class="cp-hero-card__icon-main" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/></svg>
                            <svg class="cp-hero-card__icon-sub" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M11.5 1L2 6v2h19V6l-9.5-5zM16 10h-2v7h2v-7zm-3 0h-2v7h2v-7zm-5 0H6v7h2v-7zm-4 8v2h15v-2H4z"/></svg>
                        </div>
                        <div class="cp-hero-card__body">
                            <h2 class="cp-hero-card__title">CONTRATACIONES PÚBLICAS</h2>
                            <p class="cp-hero-card__subtitle">Análisis y prevención de riesgos de corrupción</p>
                        </div>
                    </div>
                </div>

                <!-- Texto descriptivo -->
                <div class="columna__8--lg columna__7--md position-relative z-1">
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
                            <span><svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z"/></svg> <?php echo esc_html($doc['anio']); ?></span>
                            <span class="cp-doc-meta__sep">·</span>
                            <span><svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg> <?php echo esc_html($doc['formato']); ?></span>
                            <span class="cp-doc-meta__sep">·</span>
                            <span><?php echo esc_html($doc['paginas']); ?></span>
                        </div>
                    </div>

                    <!-- Acciones -->
                    <div class="cp-doc-acciones">
                        <a href="<?php echo esc_url($doc['url_ver']); ?>" class="cp-btn-ver" target="_blank" rel="noopener">
                            <svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg> Ver documento
                        </a>
                        <a href="<?php echo esc_url($doc['url_pdf']); ?>" class="cp-btn-pdf" target="_blank" rel="noopener" download>
                            <svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg> Descargar PDF
                        </a>
                    </div>

                </div>

                <?php endforeach; ?>

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

</div><!-- /.page-contrataciones -->

<?php get_footer(); ?>
