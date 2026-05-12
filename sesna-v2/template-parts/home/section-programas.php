<section class="py-5 sna-programas-section">
    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold font-patria">Acciones y <span class="text-burgundi">Programas</span></h2>
            <p class="text-muted">Conoce y accede a nuestros micrositios</p>
        </div>
        <div class="row g-4">

            <?php
            $programas = [
                [
                    'title' => 'Plataforma<br>Digital Nacional',
                    'icon' => 'bi-graph-up',
                    'img' => 'https://via.placeholder.com/400x300/343a40/ffffff?text=PDN'
                ],
                [
                    'title' => 'Política Nacional<br>Anticorrupción',
                    'icon' => 'bi-shield-check',
                    'img' => 'https://via.placeholder.com/400x300/e9ecef/212529?text=PNA'
                ],
                [
                    'title' => 'Plataforma de Aprendizaje<br>Anticorrupción',
                    'icon' => 'bi-laptop',
                    'img' => 'https://via.placeholder.com/400x300/dee2e6/212529?text=PAA'
                ],
                [
                    'title' => 'Riesgos e Inteligencia<br>Anticorrupción',
                    'icon' => 'bi-building',
                    'img' => 'https://via.placeholder.com/400x300/ced4da/212529?text=RIA'
                ]
            ];

            foreach ($programas as $prog):
                ?>
                <div class="col-lg-3 col-md-6">
                    <!-- Se usa un div en lugar de card para mejor control de bordes y sombras en el interior -->
                    <div class="h-100 border-0 bg-transparent">
                        <div class="d-flex flex-column h-100 shadow-sm sna-programas-card">

                            <!-- Imagen superior -->
                            <div class="sna-programas-img-wrapper">
                                <!-- Asegúrate de reemplazar $prog['img'] con los campos personalizados de WP reales cuando los integres -->
                                <img src="<?php echo $prog['img']; ?>" class="w-100 h-100 sna-programas-img"
                                    alt="<?php echo strip_tags($prog['title']); ?>">
                            </div>

                            <!-- Cuerpo de la tarjeta -->
                            <div class="position-relative pt-5 pb-4 px-3 text-center d-flex flex-column flex-grow-1">

                                <!-- Icono Flotante -->
                                <div class="position-absolute start-50 translate-middle-x bg-burgundi rounded-3 d-flex align-items-center justify-content-center shadow-sm sna-programas-icon-container">
                                    <i class="bi <?php echo $prog['icon']; ?> text-white fs-4"></i>
                                </div>

                                <h5 class="fw-bold mb-3 mt-2">
                                    <?php echo $prog['title']; ?>
                                </h5>

                                <p class="small text-muted mb-4">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed Lorem ipsum dolor sit
                                    amet,
                                </p>

                                <div class="mt-auto">
                                    <a href="#" class="text-decoration-none text-dark small fw-bold sna-programas-link">
                                        Leer más <i class="bi bi-arrow-right ms-1"></i>
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