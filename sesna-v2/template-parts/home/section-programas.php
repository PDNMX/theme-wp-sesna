<section class="py-5 sna-programas-section">
    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold font-patria">Acciones y <span class="text-burgundi">Programas</span></h2>
            <p class="text-muted">Conoce y accede a nuestros micrositios</p>
        </div>
        <div class="row g-4 pt-4">

            <?php
            $programas = [
                [
                    'title' => 'Plataforma<br>Digital Nacional',
                    'icon' => 'bi-graph-up',
                    'img' => esc_url( get_theme_file_uri( '/img/home_v2/plataforma.jpg' ) )
                ],
                [
                    'title' => 'Política Nacional<br>Anticorrupción',
                    'icon' => 'bi-shield-check',
                    'img' => esc_url( get_theme_file_uri( '/img/home_v2/corrupcion.jpg' ) )
                ],
                [
                    'title' => 'Plataforma de Aprendizaje<br>Anticorrupción',
                    'icon' => 'bi-laptop',
                    'img' => esc_url( get_theme_file_uri( '/img/home_v2/aprendizaje.jpg' ) )
                ],
                [
                    'title' => 'Riesgos e Inteligencia<br>Anticorrupción',
                    'icon' => 'bi-building',
                    'img' => esc_url( get_theme_file_uri( '/img/home_v2/riesgos.jpg' ) )
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
                                <!-- Icono Flotante -->
                                <div class="position-absolute start-50 translate-middle-x d-flex align-items-center justify-content-center shadow-sm sna-programas-icon-container">
                                    <i class="bi <?php echo $prog['icon']; ?> text-white fs-4"></i>
                                </div>
                            </div>

                            <!-- Cuerpo de la tarjeta -->
                            <div class="pt-4 pb-4 px-4 text-start d-flex flex-column flex-grow-1">
                                <h5 class="fw-bold mb-3 sna-programas-title">
                                    <?php echo $prog['title']; ?>
                                </h5>

                                <p class="text-muted mb-3">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed Lorem ipsum dolor sit
                                    amet,
                                </p>

                                <div class="mt-auto text-center">
                                    <a href="#" class="text-decoration-none fw-bold fs-5 sna-programas-link d-inline-flex align-items-center">
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