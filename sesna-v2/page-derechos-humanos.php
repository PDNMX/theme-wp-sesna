<?php
/**
 * Template Name: Derechos Humanos y Perspectiva de Género
 * Template Post Type: page
 *
 * @package sesna
 */
get_header();
?>

<div class="page-derechos-humanos front-page-bg">

    <!-- ── Breadcrumb ─────────────────────────────────────────── -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"><i class="bi bi-house-door"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Derechos Humanos y Perspectiva de Género</li>
            </ol>
        </div>
    </nav>

    <!-- ── Hero ──────────────────────────────────────────────── -->
    <section class="sesna-page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8 position-relative z-1 mb-4 mb-lg-0">
                    <h1 class="sesna-hero__title">Derechos Humanos<br>y Perspectiva de Género</h1>
                    <div class="hero-separator"></div>
                    <p class="sesna-hero__subtitle">
                        Promovemos el respeto a los Derechos Humanos, la igualdad de género y la no discriminación, contribuyendo a fortalecer la cultura de integridad y prevenir la violencia en la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Pronunciamientos ──────────────────────────────────── -->
    <section class="dh-pronunciamientos py-5">
        <div class="container">
            <div class="cp-recursos__header mb-2">
                <div>
                    <h2 class="cp-recursos__titulo mb-0">PRONUNCIAMIENTOS</h2>
                    <div class="cp-recursos__linea"></div>
                </div>
            </div>
            <p class="dh-section__subtitle">Conoce nuestros pronunciamientos institucionales.</p>

            <div class="row g-4 mt-2">
                <div class="col-md-6">
                    <a href="#" class="sna-noticias-card rounded-4 h-100 d-flex align-items-center text-decoration-none text-dark px-4 py-4 w-100 gap-3" target="_blank" rel="noopener">
                        <div class="icon-bg-circle flex-shrink-0" style="width: 64px; height: 64px; background-color: var(--color-burgundi-tenue);">
                            <i class="bi bi-file-earmark-richtext" style="font-size: 2.2rem; color: var(--color-burgundi);"></i>
                        </div>
                        <h5 class="fw-bold mb-0 flex-grow-1" style="font-size: 1.4rem; line-height: 1.4;">Pronunciamiento de No Discriminación</h5>
                        <i class="bi bi-chevron-right text-muted flex-shrink-0" style="font-size: 1.1rem;"></i>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="sna-noticias-card rounded-4 h-100 d-flex align-items-center text-decoration-none text-dark px-4 py-4 w-100 gap-3" target="_blank" rel="noopener">
                        <div class="icon-bg-circle flex-shrink-0" style="width: 64px; height: 64px; background-color: var(--color-burgundi-tenue);">
                            <i class="bi bi-file-earmark-richtext" style="font-size: 2.2rem; color: var(--color-burgundi);"></i>
                        </div>
                        <h5 class="fw-bold mb-0 flex-grow-1" style="font-size: 1.4rem; line-height: 1.4;">Pronunciamiento de Cero Tolerancia al Acoso y Hostigamiento Sexual</h5>
                        <i class="bi bi-chevron-right text-muted flex-shrink-0" style="font-size: 1.1rem;"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Campañas de Sensibilización ───────────────────────── -->
    <section class="dh-campanias py-5">
        <div class="container">
            <div class="cp-recursos__header mb-2">
                <div>
                    <h2 class="cp-recursos__titulo mb-0">CAMPAÑAS DE SENSIBILIZACIÓN</h2>
                    <div class="cp-recursos__linea"></div>
                </div>
            </div>
            <p class="dh-section__subtitle">Conoce nuestras campañas permanentes para construir espacios libres de violencia y discriminación.</p>

            <div class="row g-4 mt-2">
                <?php
                $campanias = [
                    [
                        'titulo' => 'Menstruación Digna',
                        'desc'   => 'Hablemos de menstruación sin tabúes.',
                        'icono'  => 'bi-heart-pulse',
                        'color'  => '#9d2449',
                        'url'    => '#',
                    ],
                    [
                        'titulo' => 'La Salud Mental también es Trabajo',
                        'desc'   => 'Cuidar nuestra mente es cuidar nuestra integridad.',
                        'icono'  => 'bi-emoji-smile',
                        'color'  => '#1e5b4f',
                        'url'    => '#',
                    ],
                    [
                        'titulo' => 'Diversidad e Inclusión',
                        'desc'   => 'Reconocemos, respetamos e incluimos.',
                        'icono'  => 'bi-people',
                        'color'  => '#a57f2c',
                        'url'    => '#',
                    ],
                    [
                        'titulo' => 'Cero Tolerancia a la Violencia',
                        'desc'   => 'Comprometidos con espacios seguros.',
                        'icono'  => 'bi-hand-index-thumb',
                        'color'  => '#611232',
                        'url'    => '#',
                    ],
                ];
                foreach ( $campanias as $camp ) : ?>
                <div class="col-lg-3 col-md-6">
                    <div class="dh-campania-card">
                        <div class="dh-campania-card__img" style="background-color: <?php echo esc_attr($camp['color']); ?>20;">
                            <i class="bi <?php echo esc_attr($camp['icono']); ?>" style="color: <?php echo esc_attr($camp['color']); ?>; font-size: 3rem;"></i>
                        </div>
                        <h5 class="dh-campania-card__title"><?php echo esc_html($camp['titulo']); ?></h5>
                        <p class="dh-campania-card__desc"><?php echo esc_html($camp['desc']); ?></p>
                        <a href="<?php echo esc_url($camp['url']); ?>" class="dh-campania-card__link">Ver más <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ── Acciones X la Integridad ──────────────────────────── -->
    <section class="dh-acciones py-5">
        <div class="container">
            <div class="cp-recursos__header mb-2">
                <div>
                    <h2 class="cp-recursos__titulo mb-0">ACCIONES X LA INTEGRIDAD</h2>
                    <div class="cp-recursos__linea"></div>
                </div>
            </div>
            <p class="dh-section__subtitle">Acciones X la integridad es nuestra publicación permanente sobre integridad, Derechos Humanos y perspectiva de género.</p>

            <div class="dh-acciones-card mt-4">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4">
                        <div class="dh-acciones-card__img">
                            <img src="<?php echo esc_url( get_theme_file_uri('/img/derechos-humanos/acciones-integridad.png') ); ?>"
                                 alt="Acciones X la Integridad"
                                 class="img-fluid"
                                 onerror="this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100 bg-light\' style=\'min-height:180px;\'><i class=\'bi bi-image fs-1 text-muted\'></i></div>';">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="dh-acciones-card__body">
                            <h3 class="fw-bold mb-3">Acciones X la Integridad</h3>
                            <p class="text-muted mb-3">Infografía, datos relevantes y efemérides para fortalecer nuestra cultura de integridad, igualdad y derechos humanos.</p>
                            <a href="#" class="btn-sesna-link">Leer más <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Comité de Igualdad de Género ──────────────────────── -->
    <section class="dh-comite py-5 pb-5 mb-4">
        <div class="container">
            <div class="cp-recursos__header mb-2">
                <div>
                    <h2 class="cp-recursos__titulo mb-0">COMITÉ DE IGUALDAD DE GÉNERO</h2>
                    <div class="cp-recursos__linea"></div>
                </div>
            </div>
            <p class="dh-section__subtitle">Consulta las sesiones y actas del Comité de Igualdad de Género (CIG-SESNA).</p>

            <div class="dh-comite-panel mt-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <h4 class="fw-bold mb-2 mb-md-0">Sesiones del Comité</h4>
                    <div class="d-flex gap-3">
                        <select class="form-select form-select-sm dh-comite-filter" aria-label="Año">
                            <option selected>Año: 2024</option>
                            <option>Año: 2023</option>
                            <option>Año: 2022</option>
                        </select>
                        <select class="form-select form-select-sm dh-comite-filter" aria-label="Tipo de sesión">
                            <option selected>Tipo de sesión: Todas</option>
                            <option>Ordinaria</option>
                            <option>Extraordinaria</option>
                        </select>
                    </div>
                </div>

                <?php
                $sesiones = [
                    [
                        'dia'   => '15',
                        'mes'   => 'FEB',
                        'anio'  => '2024',
                        'titulo'=> 'Primera Sesión Ordinaria 2024',
                        'tipo'  => 'Ordinaria',
                        'modal' => 'Presencial',
                    ],
                    [
                        'dia'   => '18',
                        'mes'   => 'ABR',
                        'anio'  => '2024',
                        'titulo'=> 'Segunda Sesión Ordinaria 2024',
                        'tipo'  => 'Ordinaria',
                        'modal' => 'Presencial',
                    ],
                    [
                        'dia'   => '27',
                        'mes'   => 'JUN',
                        'anio'  => '2024',
                        'titulo'=> 'Tercera Sesión Extraordinaria 2024',
                        'tipo'  => 'Extraordinaria',
                        'modal' => 'Virtual',
                    ],
                ];
                foreach ( $sesiones as $sesion ) : ?>
                <div class="dh-sesion-row">
                    <div class="dh-sesion-row__date">
                        <span class="dh-sesion-row__dia"><?php echo esc_html($sesion['dia']); ?></span>
                        <span class="dh-sesion-row__mes"><?php echo esc_html($sesion['mes']); ?></span>
                        <span class="dh-sesion-row__anio"><?php echo esc_html($sesion['anio']); ?></span>
                    </div>
                    <div class="dh-sesion-row__info">
                        <h5 class="fw-bold mb-1"><?php echo esc_html($sesion['titulo']); ?></h5>
                        <p class="text-muted mb-0 small">Tipo: <?php echo esc_html($sesion['tipo']); ?> &nbsp;|&nbsp; Modalidad: <?php echo esc_html($sesion['modal']); ?></p>
                    </div>
                    <div class="dh-sesion-row__actions">
                        <a href="#" class="dh-sesion-btn"><i class="bi bi-journal-text"></i> Orden del día</a>
                        <span class="dh-sesion-sep">|</span>
                        <a href="#" class="dh-sesion-btn"><i class="bi bi-file-earmark"></i> Acta</a>
                        <span class="dh-sesion-sep">|</span>
                        <a href="#" class="dh-sesion-btn"><i class="bi bi-check2-square"></i> Acuerdos</a>
                        <i class="bi bi-chevron-right dh-sesion-chevron"></i>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="text-center mt-4">
                    <a href="#" class="btn-sesna-link"><i class="bi bi-arrow-down me-1"></i> Más sesiones</a>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
