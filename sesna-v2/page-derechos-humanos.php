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
    <nav class="gobmx-breadcrumb-container" aria-label="Ruta de navegación">
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
    <section class="dh-hero py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7 col-md-8">
                    <h1 class="dh-hero__title fw-bold font-patria">Derechos Humanos<br>y Perspectiva de Género</h1>
                    <p class="dh-hero__desc text-muted mt-3" style="max-width: 540px;">Promovemos el respeto a los Derechos Humanos, la igualdad de género y la no discriminación, contribuyendo a fortalecer la cultura de integridad y prevenir la violencia en la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.</p>
                </div>
                <div class="col-lg-5 col-md-4 text-center">
                    <div class="dh-hero__ilustracion">
                        <svg viewBox="0 0 320 300" xmlns="http://www.w3.org/2000/svg" class="dh-hero__svg">
                            <!-- Círculo decorativo -->
                            <circle cx="160" cy="150" r="130" fill="none" stroke="#e8ddd8" stroke-width="1.5" stroke-dasharray="6 4" opacity="0.6"/>
                            <circle cx="160" cy="150" r="110" fill="none" stroke="#e8ddd8" stroke-width="1" opacity="0.3"/>

                            <!-- Puntos decorativos -->
                            <circle cx="55" cy="80" r="4" fill="#d4a5a5" opacity="0.5"/>
                            <circle cx="270" cy="95" r="3" fill="#d4a5a5" opacity="0.4"/>
                            <circle cx="85" cy="250" r="3.5" fill="#d4a5a5" opacity="0.35"/>
                            <circle cx="245" cy="240" r="4" fill="#9d2449" opacity="0.25"/>

                            <!-- Balanza -->
                            <g transform="translate(160, 60)">
                                <!-- Soporte central -->
                                <rect x="-3" y="0" width="6" height="60" rx="3" fill="#9d2449"/>
                                <circle cx="0" cy="0" r="8" fill="#9d2449"/>
                                <!-- Barra horizontal -->
                                <rect x="-65" y="12" width="130" height="5" rx="2.5" fill="#9d2449"/>
                                <!-- Plato izquierdo -->
                                <line x1="-60" y1="17" x2="-60" y2="50" stroke="#9d2449" stroke-width="2"/>
                                <path d="M-85,50 Q-60,62 -35,50" fill="none" stroke="#9d2449" stroke-width="2.5" stroke-linecap="round"/>
                                <!-- Plato derecho -->
                                <line x1="60" y1="17" x2="60" y2="42" stroke="#9d2449" stroke-width="2"/>
                                <path d="M35,42 Q60,54 85,42" fill="none" stroke="#9d2449" stroke-width="2.5" stroke-linecap="round"/>
                            </g>

                            <!-- Personas -->
                            <!-- Persona izquierda -->
                            <g transform="translate(100, 165)">
                                <circle cx="0" cy="0" r="12" fill="#c4956a" opacity="0.8"/>
                                <path d="M-18,50 Q0,20 18,50" fill="#c4956a" opacity="0.6"/>
                            </g>

                            <!-- Persona central -->
                            <g transform="translate(160, 155)">
                                <circle cx="0" cy="0" r="14" fill="#9d2449" opacity="0.7"/>
                                <path d="M-20,55 Q0,22 20,55" fill="#9d2449" opacity="0.5"/>
                            </g>

                            <!-- Persona derecha -->
                            <g transform="translate(220, 165)">
                                <circle cx="0" cy="0" r="12" fill="#a57f2c" opacity="0.7"/>
                                <path d="M-18,50 Q0,20 18,50" fill="#a57f2c" opacity="0.5"/>
                            </g>

                            <!-- Persona extra izquierda pequeña -->
                            <g transform="translate(70, 185)">
                                <circle cx="0" cy="0" r="9" fill="#d4a5a5" opacity="0.6"/>
                                <path d="M-14,38 Q0,15 14,38" fill="#d4a5a5" opacity="0.4"/>
                            </g>

                            <!-- Persona extra derecha pequeña -->
                            <g transform="translate(250, 185)">
                                <circle cx="0" cy="0" r="9" fill="#d4a5a5" opacity="0.6"/>
                                <path d="M-14,38 Q0,15 14,38" fill="#d4a5a5" opacity="0.4"/>
                            </g>

                            <!-- Línea base -->
                            <line x1="60" y1="250" x2="260" y2="250" stroke="#e8ddd8" stroke-width="1.5" opacity="0.5"/>
                        </svg>
                    </div>
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
                        <div class="icon-bg-circle flex-shrink-0" style="width: 64px; height: 64px; background-color: #fdf2f5;">
                            <i class="bi bi-file-earmark-richtext" style="font-size: 2.2rem; color: var(--color-burgundi);"></i>
                        </div>
                        <h5 class="fw-bold mb-0 flex-grow-1" style="font-size: 1.4rem; line-height: 1.4;">Pronunciamiento de No Discriminación</h5>
                        <i class="bi bi-chevron-right text-muted flex-shrink-0" style="font-size: 1.1rem;"></i>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="sna-noticias-card rounded-4 h-100 d-flex align-items-center text-decoration-none text-dark px-4 py-4 w-100 gap-3" target="_blank" rel="noopener">
                        <div class="icon-bg-circle flex-shrink-0" style="width: 64px; height: 64px; background-color: #fdf2f5;">
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
                        'color'  => '#E8486A',
                        'url'    => '#',
                    ],
                    [
                        'titulo' => 'La Salud Mental también es Trabajo',
                        'desc'   => 'Cuidar nuestra mente es cuidar nuestra integridad.',
                        'icono'  => 'bi-emoji-smile',
                        'color'  => '#7B61A6',
                        'url'    => '#',
                    ],
                    [
                        'titulo' => 'Diversidad e Inclusión',
                        'desc'   => 'Reconocemos, respetamos e incluimos.',
                        'icono'  => 'bi-people',
                        'color'  => '#E8A038',
                        'url'    => '#',
                    ],
                    [
                        'titulo' => 'Cero Tolerancia a la Violencia',
                        'desc'   => 'Comprometidos con espacios seguros.',
                        'icono'  => 'bi-hand-index-thumb',
                        'color'  => '#D04545',
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
                            <a href="#" class="dh-link-burgundi">Leer más <i class="bi bi-arrow-right ms-1"></i></a>
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
                    <a href="#" class="dh-link-burgundi"><i class="bi bi-arrow-down me-1"></i> Más sesiones</a>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
