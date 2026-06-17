<?php
get_header();
?>

<div class="front-page-bg">
    
    <!-- Hero Section -->
    <section class="qh-hero">
        <!-- Floating icons -->
        <i class="bi bi-file-earmark-text qh-floating-icon qh-fi-1"></i>
        <i class="bi bi-bullseye qh-floating-icon qh-fi-2"></i>
        <i class="bi bi-bar-chart-line qh-floating-icon qh-fi-3"></i>
        <i class="bi bi-shield-check qh-floating-icon qh-fi-4"></i>
        <i class="bi bi-laptop qh-floating-icon qh-fi-5"></i>

        <div class="container position-relative z-index-1">
            <div class="row">
                <div class="col-lg-7 col-md-8">
                    <span class="qh-hero-tag">Quiénes somos</span>
                    <h1 class="font-patria fw-bold text-white mb-4" style="font-size: 2.8rem; line-height: 1.2;">Secretaría Ejecutiva del Sistema Nacional Anticorrupción</h1>
                    <p class="text-white opacity-75" style="font-size: 1.15rem; line-height: 1.6; font-weight: 300;">
                        Somos el órgano técnico de apoyo del Sistema Nacional Anticorrupción encargado de generar insumos técnicos especializados, desarrollar herramientas estratégicas, coordinar esfuerzos institucionales y contribuir al fortalecimiento de las políticas públicas para prevenir y combatir la corrupción en México.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="qh-video-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-8 mb-4 mb-lg-0 pe-lg-5">
                    <h2 class="font-patria fw-bold text-burgundi mb-4">Conoce a la SESNA</h2>
                    <p>
                        Descubre el papel de la Secretaría Ejecutiva dentro del Sistema Nacional Anticorrupción y cómo contribuye al fortalecimiento de la coordinación institucional, la generación de información estratégica y el desarrollo de herramientas para la prevención y el combate a la corrupción.
                    </p>
                </div>
                <div class="col-lg-7">
                    <div class="qh-video-wrapper">
                        <!-- Maqueta del reproductor -->
                        <div class="qh-video-fake-thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="SESNA">
                            <h3 class="font-patria fw-bold text-burgundi mt-3 mb-0" style="font-size: 1.8rem;">¿QUÉ HACEMOS?</h3>
                        </div>
                        <div class="qh-video-fake-controls">
                            <i class="bi bi-play-fill fs-5"></i>
                            <i class="bi bi-skip-end-fill"></i>
                            <i class="bi bi-volume-up-fill"></i>
                            <span class="ms-2" style="font-size: 0.75rem;">0:02 / 2:13</span>
                            <div class="qh-video-progress mx-3">
                                <div class="qh-video-progress-bar"></div>
                            </div>
                            <i class="bi bi-gear-fill"></i>
                            <i class="bi bi-pip"></i>
                            <i class="bi bi-fullscreen"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Misión y Visión Section -->
    <section class="qh-mv-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <h2 class="font-patria fw-bold text-burgundi mb-3">Nuestra razón de ser</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Misión -->
                <div class="col-md-6 mb-4">
                    <div class="qh-mv-card rounded-4">
                        <div class="qh-mv-icon">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <div class="qh-mv-content">
                            <h3 class="font-patria fw-bold text-burgundi mb-3" style="font-size: 1.4rem;">MISIÓN</h3>
                            <p class="mb-0">Fungir como órgano técnico de apoyo del Comité Coordinador del SNA, encargado de producir los insumos y herramientas necesarias para el desempeño de sus atribuciones establecidas en el artículo 113 de la Constitución Política de los Estados Unidos Mexicanos y en la LGSNA.</p>
                        </div>
                    </div>
                </div>
                <!-- Visión -->
                <div class="col-md-6 mb-4">
                    <div class="qh-mv-card rounded-4">
                        <div class="qh-mv-icon">
                            <i class="bi bi-eye"></i>
                        </div>
                        <div class="qh-mv-content">
                            <h3 class="font-patria fw-bold text-burgundi mb-3" style="font-size: 1.4rem;">VISIÓN</h3>
                            <p class="mb-0">Ser una institución eficaz y eficiente que contribuye a generar confianza y credibilidad en las instituciones públicas, mediante el uso de tecnologías de la información y el diseño, seguimiento y evaluación de políticas públicas enfocadas a la prevención, detección y sanción de faltas administrativas y hechos de corrupción, así como a la fiscalización y control de recursos públicos en el Marco del SNA.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nuestra Labor Section -->
    <section class="qh-labor-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <h2 class="font-patria fw-bold text-burgundi mb-3">Nuestra labor</h2>
                    <p class="text-muted mx-auto">
                        Contribuimos al fortalecimiento del Sistema Nacional Anticorrupción mediante la generación de conocimiento, el desarrollo de herramientas y la coordinación institucional.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="qh-labor-card rounded-4">
                        <div class="qh-labor-icon-wrapper">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h3 class="font-patria fw-bold text-burgundi mb-3" style="font-size: 1.2rem;">Diseñamos</h3>
                        <p class="text-muted mb-0">Generamos propuestas de política pública, metodologías e indicadores que contribuyen al fortalecimiento de la prevención, detección y combate a la corrupción.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="qh-labor-card rounded-4">
                        <div class="qh-labor-icon-wrapper">
                            <i class="bi bi-laptop"></i>
                        </div>
                        <h3 class="font-patria fw-bold text-burgundi mb-3" style="font-size: 1.2rem;">Desarrollamos</h3>
                        <p class="text-muted mb-0">Impulsamos herramientas tecnológicas y soluciones digitales, incluida la Plataforma Digital Nacional, para facilitar el acceso, intercambio y aprovechamiento de información estratégica.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="qh-labor-card rounded-4">
                        <div class="qh-labor-icon-wrapper">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h3 class="font-patria fw-bold text-burgundi mb-3" style="font-size: 1.2rem;">Analizamos</h3>
                        <p class="text-muted mb-0">Realizamos estudios, evaluaciones y análisis de datos que permiten identificar riesgos, tendencias y áreas de oportunidad para la toma de decisiones basada en evidencia.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="qh-labor-card rounded-4">
                        <div class="qh-labor-icon-wrapper">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3 class="font-patria fw-bold text-burgundi mb-3" style="font-size: 1.2rem;">Impulsamos</h3>
                        <p class="text-muted mb-0">Promovemos la coordinación entre instituciones, la colaboración con diversos actores y el fortalecimiento de una cultura de integridad.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Section -->
    <section class="qh-social-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <h2 class="font-patria fw-bold text-burgundi mb-3">Mantente conectado con la SESNA</h2>
                    <p class="text-muted mx-auto">
                        Conoce nuestras actividades, publicaciones, herramientas, eventos y acciones a través de nuestros canales oficiales.
                    </p>
                </div>
            </div>
            <div class="row">
                <!-- X (Twitter) -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="qh-social-card rounded-4">
                        <div class="qh-social-header qh-sh-x">
                            <i class="bi bi-twitter-x"></i>
                        </div>
                        <div class="qh-social-body">
                            <div class="qh-social-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/favicon.png" alt="SESNA">
                            </div>
                            <div class="qh-social-account mt-2">
                                SESNA <i class="bi bi-patch-check-fill"></i>
                            </div>
                            <div class="qh-social-handle">@SESNAOficial</div>
                            <p class="mb-4">Noticias, comunicados y actualizaciones institucionales.</p>
                            <a href="#" class="qh-social-btn mt-auto">Visitar <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- YouTube -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="qh-social-card rounded-4">
                        <div class="qh-social-header qh-sh-yt">
                            <i class="bi bi-youtube"></i>
                        </div>
                        <div class="qh-social-body">
                            <div class="qh-social-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/favicon.png" alt="SESNA">
                            </div>
                            <div class="qh-social-account mt-2">
                                SESNA <i class="bi bi-patch-check-fill"></i>
                            </div>
                            <div class="qh-social-handle">@SESNAOficial</div>
                            <p class="mb-4">Videos, transmisiones y contenido audiovisual.</p>
                            <a href="#" class="qh-social-btn mt-auto">Visitar <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Instagram -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="qh-social-card rounded-4">
                        <div class="qh-social-header qh-sh-ig">
                            <i class="bi bi-instagram"></i>
                        </div>
                        <div class="qh-social-body">
                            <div class="qh-social-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/favicon.png" alt="SESNA">
                            </div>
                            <div class="qh-social-account mt-2">
                                SESNA <i class="bi bi-patch-check-fill"></i>
                            </div>
                            <div class="qh-social-handle">@sesnaoficial</div>
                            <p class="mb-4">Actividades, campañas y contenido visual.</p>
                            <a href="#" class="qh-social-btn mt-auto">Visitar <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- LinkedIn -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="qh-social-card rounded-4">
                        <div class="qh-social-header qh-sh-in">
                            <i class="bi bi-linkedin"></i>
                        </div>
                        <div class="qh-social-body">
                            <div class="qh-social-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/favicon.png" alt="SESNA">
                            </div>
                            <div class="qh-social-account mt-2" style="font-size: 0.85rem;">
                                SESNA <i class="bi bi-patch-check-fill"></i>
                            </div>
                            <div class="qh-social-handle" style="font-size: 0.75rem;">Secretaría Ejecutiva del Sistema Nacional Anticorrupción</div>
                            <p class="mb-4">Información institucional y profesional.</p>
                            <a href="#" class="qh-social-btn mt-auto">Visitar <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
get_footer();
