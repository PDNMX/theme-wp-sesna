<?php
/**
 * Template Name: Verificación Patrimonial
 * Template Post Type: page
 *
 * @package sesna
 */
get_header();
?>

<div class="page-verificacion front-page-bg">

    <!-- ── Breadcrumb ─────────────────────────────────────────── -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"><svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/riesgos-e-inteligencia-anticorrupcion/') ); ?>">Riesgos e Inteligencia Anticorrupción</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Verificación Patrimonial</li>
            </ol>
        </div>
    </nav>

    <!-- ── Hero ──────────────────────────────────────────────── -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="fila align-items-start gap--24">

                <!-- Izquierda: texto -->
                <div class="columna__6--lg columna__8--md position-relative z-1">
                    <span class="vp-hero__badge mb-2 fw-bold">Herramienta Especializada</span>
                    <h1 class="sesna-hero__title">Generador de muestras aleatorio</h1>
                    <p class="vp-hero__subtitle mb-3">Verificación patrimonial</p>
                    <div class="hero-separator"></div>
                    <p class="sesna-hero__subtitle">Herramienta para apoyar ejercicios de verificación patrimonial mediante la generación automatizada de muestras, con base en criterios técnicos y parámetros normativos.</p>
                </div>

                <!-- Derecha: imagen laptop -->
                <div class="columna__6--lg text-center">
                    <div class="vp-hero__img-wrapper">
                        <img src="<?php echo esc_url( get_theme_file_uri('/img/verificacion/laptop-gm.png') ); ?>"
                             alt="Generador de Muestras Aleatorio"
                             class="vp-hero__img img-fluid"
                             onerror="this.parentElement.classList.add('vp-hero__img-placeholder')">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ── Funcionalidades principales ───────────────────────── -->
    <section class="vp-funcionalidades py-4">
        <div class="contenedor">
            <div class="vp-func-box">

            <h2 class="text-center fw-bold font-patria vp-func-box__title mb-4">
                Funcionalidades principales
            </h2>

            <div class="vp-func-row">

                <div class="vp-func-item">
                    <div class="vp-func-item__icon">
                        <svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0m-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"/></svg>
                    </div>
                    <div class="vp-func-item__text">
                        <h5 class="vp-func-item__title">Generación automatizada</h5>
                        <p class="vp-func-item__desc">Realiza muestreos aleatorios simples con base en parámetros definidos y criterios normativos.</p>
                    </div>
                </div>

                <div class="vp-func-sep">|</div>

                <div class="vp-func-item">
                    <div class="vp-func-item__icon">
                        <svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                    </div>
                    <div class="vp-func-item__text">
                        <h5 class="vp-func-item__title">Apoyo a la verificación</h5>
                        <p class="vp-func-item__desc">Facilita la identificación de casos para la verificación patrimonial y de intereses.</p>
                    </div>
                </div>

                <div class="vp-func-sep">|</div>

                <div class="vp-func-item">
                    <div class="vp-func-item__icon">
                        <svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5zM3 12v-2h2v2zm0 1h2v2H4a1 1 0 0 1-1-1zm3 2v-2h7v1a1 1 0 0 1-1 1zm7-3H6v-2h7z"/></svg>
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
                    <svg class="fs-5" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4q0 1 .25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75Q6 13 6 12H2s-2 0-2-2zm1.398-.855a.76.76 0 0 0-.254.302A1.5 1.5 0 0 0 1 4.01V10c0 .325.078.502.145.602q.105.156.302.254a1.5 1.5 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.76.76 0 0 0 .254-.302 1.5 1.5 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.76.76 0 0 0-.302-.254A1.5 1.5 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145"/></svg>
                    Acceder a la herramienta
                    <svg class="fs-6" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
  <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/></svg>
                </a>
            </div>

            </div><!-- /.vp-func-box -->
        </div>
    </section>

    <!-- ── Recursos metodológicos ─────────────────────────────── -->
    <section class="cp-recursos py-4 pb-5">
        <div class="contenedor">

            <div class="cp-recursos__header mb-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="cp-recursos__icono-box">
                        <svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7z"/></svg>
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
                        <div class="cp-doc-thumb__logo"><svg  width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512"/></svg> SESNA</div>
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
                            <span><svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z"/></svg> <?php echo esc_html($doc['anio']); ?></span>
                            <span class="cp-doc-meta__sep">·</span>
                            <span><svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg> <?php echo esc_html($doc['formato']); ?></span>
                            <span class="cp-doc-meta__sep">·</span>
                            <span><?php echo esc_html($doc['paginas']); ?></span>
                        </div>
                    </div>
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

            </div>

        </div>
    </section>

    <!-- ── Nota informativa ──────────────────────────────────── -->
    <div class="cp-nota pb-5">
        <div class="contenedor">
            <div class="cp-nota__inner">
                <svg class="cp-nota__icono" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/></svg>
                <p class="cp-nota__texto mb-0">Esta herramienta y los documentos asociados forman parte del trabajo técnico de la SESNA para fortalecer la integridad en el servicio público y prevenir riesgos de corrupción.</p>
            </div>
        </div>
    </div>

</div><!-- /.page-verificacion -->

<?php get_footer(); ?>
