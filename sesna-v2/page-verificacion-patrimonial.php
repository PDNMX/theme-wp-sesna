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
    <nav class="gobmx-breadcrumb-container" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"><i class="bi bi-house-door"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/riesgos-inteligencia/') ); ?>">Riesgos e Inteligencia Anticorrupción</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Verificación Patrimonial</li>
            </ol>
        </div>
    </nav>

    <!-- ── Hero ──────────────────────────────────────────────── -->
    <section class="vp-hero pt-2 pb-0">
        <div class="container">
            <div class="row align-items-start g-4">

                <!-- Izquierda: texto -->
                <div class="col-lg-6 col-md-8 position-relative z-1">
                    <span class="vp-hero__badge mb-2 fw-bold">Herramienta Especializada</span>
                    <h1 class="tx-hero__title fw-bold mb-2 font-patria">Generador de muestras aleatorio</h1>
                    <p class="fs-3 fw-normal mb-3" style="color: var(--color-burgundi); font-family: var(--font-patria);">Verificación patrimonial</p>
                    <div class="vp-hero__line"></div>
                    <p class="tx-hero__subtitle text-muted" style="max-width: 480px;">Herramienta para apoyar ejercicios de verificación patrimonial mediante la generación automatizada de muestras, con base en criterios técnicos y parámetros normativos.</p>
                </div>

                <!-- Derecha: imagen laptop -->
                <div class="col-lg-6 text-center">
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
                <a href="#" class="vp-cta-btn" target="_blank" rel="noopener">
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

</div><!-- /.page-verificacion -->

<?php get_footer(); ?>
