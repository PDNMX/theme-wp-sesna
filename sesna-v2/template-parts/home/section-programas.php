<section class="py-5 sna-programas-section">
    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold font-patria sesna-section-heading">Acciones y <span class="text-burgundi">Programas</span></h2>
            <p class="text-muted">Conoce y accede a nuestros micrositios</p>
        </div>
        <div class="row g-4 pt-4">

            <?php
            $programas = [
                [
                    'title' => 'Plataforma<br>Digital Nacional',
                    'icon' => 'bi-graph-up',
                    'img' => esc_url( get_theme_file_uri( '/img/home_v2/img_web_01_pdn.jpg' ) ),
                    'desc' => 'Herramienta de inteligencia tecnológica que integra y conecta diversos sistemas electrónicos que poseen información necesaria a las autoridades competentes en materia de combate a la corrupción.',
                    'link' => 'https://www.plataformadigitalnacional.org/'
                ],
                [
                    'title' => 'Política Nacional<br>Anticorrupción',
                    'icon' => 'bi-shield-check',
                    'img' => esc_url( get_theme_file_uri( '/img/home_v2/img_web_02_politica.jpg' ) ),
                    'desc' => 'Fue aprobada el 29 de enero de 2020 por el Comite Coordinador del Sistema Nacional Anticorrupción, en ella se define la estrategia para combatir el problema de la corrupción en México.'
                ],
                [
                    'title' => 'Plataforma de Aprendizaje<br>Anticorrupción',
                    'icon' => 'bi-laptop',
                    'img' => esc_url( get_theme_file_uri( '/img/home_v2/img_web_04_aprendizaje.jpg' ) ),
                    'desc' => 'Herramienta tecnológica y pedagógica que promueve conocimientos y capacidades para fortalecer la integridad y combatir la corrupción.'
                ],
                [
                    'title' => 'Riesgos e Inteligencia<br>Anticorrupción',
                    'icon' => 'bi-building',
                    'img' => esc_url( get_theme_file_uri( '/img/home_v2/img_web_03_riesgos.jpg' ) ),
                    'desc' => 'Genera evidencia y herramientas de análisis para identificar riesgos de corrupción y fortalecer la toma de decisiones.',
                    'link' => home_url('/riesgos-inteligencia/')
                ]
            ];

            foreach ($programas as $prog):
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="h-100 border-0 bg-transparent sna-programas-wrapper">
                        <div class="d-flex flex-column h-100 sna-programas-card">

                            <!-- Contenedor del grupo superior (Imagen + Icono) que sobresale -->
                            <div class="sna-programas-img-outer">
                                <!-- Imagen -->
                                <div class="sna-programas-img-inner">
                                    <img src="<?php echo $prog['img']; ?>" class="w-100 h-100 sna-programas-img"
                                        alt="<?php echo strip_tags($prog['title']); ?>">
                                </div>
                            </div>

                            <!-- Cuerpo de la tarjeta -->
                            <div class="pt-4 pb-4 px-4 text-start d-flex flex-column flex-grow-1">
                                <h5 class="fw-bold mb-3 sna-programas-title">
                                    <?php echo $prog['title']; ?>
                                </h5>

                                <p class="text-muted mb-3">
                                    <?php echo $prog['desc']; ?>
                                </p>

                                <div class="mt-auto text-center">
                                    <a href="<?php echo isset($prog['link']) ? esc_url($prog['link']) : '#'; ?>" <?php if( isset($prog['link']) ): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?> class="text-decoration-none fw-bold fs-5 sna-programas-link d-inline-flex align-items-center">
                                        Leer más <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>