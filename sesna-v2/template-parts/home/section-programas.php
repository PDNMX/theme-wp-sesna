<section class="py--48 sna-programas-section">
    <div class="contenedor my--48">
        <div class="fila justify-content-center mb--48">
            <div class="columna__12 columna__8--md texto--centro">
                <h2 class="peso--negrita font-patria sesna-section-heading">Acciones y <span class="color--pguinda600">Programas</span></h2>
                <p class="color--neutro600 tamano--secundario">Conoce y accede a nuestros micrositios</p>
            </div>
        </div>
        <div class="reticulaGrid__12 pt--24">

            <?php
            $programas = [
                [
                    'title' => 'Plataforma<br>Digital Nacional',
                    'icon' => 'snd-chart--bar',
                    'img' => esc_url( get_theme_file_uri( '/img/home_v2/img_web_01_pdn.jpg' ) ),
                    'desc' => 'Herramienta de inteligencia tecnológica que integra y conecta diversos sistemas electrónicos que poseen información necesaria a las autoridades competentes en materia de combate a la corrupción.',
                    'link' => 'https://www.plataformadigitalnacional.org/'
                ],
                [
                    'title' => 'Política Nacional<br>Anticorrupción',
                    'icon' => 'snd-security',
                    'img' => esc_url( get_theme_file_uri( '/img/home_v2/img_web_02_politica.jpg' ) ),
                    'desc' => 'Fue aprobada el 29 de enero de 2020 por el Comite Coordinador del Sistema Nacional Anticorrupción, en ella se define la estrategia para combatir el problema de la corrupción en México.',
                    'link' => home_url('/acciones-y-programas/politica-nacional-anticorrupcion/')
                ],
                [
                    'title' => 'Plataforma de Aprendizaje<br>Anticorrupción',
                    'icon' => 'snd-screen',
                    'img' => esc_url( get_theme_file_uri( '/img/home_v2/img_web_04_aprendizaje.jpg' ) ),
                    'desc' => 'Herramienta tecnológica y pedagógica que promueve conocimientos y capacidades para fortalecer la integridad y combatir la corrupción.',
                    'link' => 'https://paa.sesna.gob.mx/web/index.html'
                ],
                [
                    'title' => 'Riesgos e Inteligencia<br>Anticorrupción',
                    'icon' => 'snd-building',
                    'img' => esc_url( get_theme_file_uri( '/img/home_v2/img_web_03_riesgos.jpg' ) ),
                    'desc' => 'Genera evidencia y herramientas de análisis para identificar riesgos de corrupción y fortalecer la toma de decisiones.',
                    'link' => home_url('/acciones-y-programas/riesgos-e-inteligencia-anticorrupcion/')
                ]
            ];

            foreach ($programas as $prog):
                ?>
                <div class="columna__12 columna__6--md columna__3--lg">
                    <div class="alto--100 borde--ninguno fondo--ninguno sna-programas-wrapper">
                        <?php $is_external = isset($prog['link']) && strpos($prog['link'], home_url()) === false; ?>
                        <a href="<?php echo isset($prog['link']) ? esc_url($prog['link']) : '#'; ?>" <?php if( $is_external ): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?> class="muestra--flex flex-direction-column alto--100 sna-programas-card decoracion--ninguna color--neutro800 fondo--blanco">

                            <!-- Contenedor del grupo superior (Imagen + Icono) que sobresale -->
                            <div class="sna-programas-img-outer">
                                <!-- Imagen -->
                                <div class="sna-programas-img-inner">
                                    <img src="<?php echo $prog['img']; ?>" class="ancho--100 alto--100 sna-programas-img"
                                        alt="<?php echo strip_tags($prog['title']); ?>">
                                </div>
                            </div>

                            <!-- Cuerpo de la tarjeta -->
                            <div class="pt--24 pb--24 px--24 texto--izquierda muestra--flex flex-direction-column flex-grow">
                                <h3 class="h4 peso--negrita mb--16 sna-programas-title color--neutro800">
                                    <?php echo $prog['title']; ?>
                                </h3>

                                <p class="color--neutro600 tamano--secundario mb--16">
                                    <?php echo $prog['desc']; ?>
                                </p>

                                <div class="mt--auto texto--centro">
                                    <span class="decoracion--ninguna peso--negrita tamano--5 sna-programas-link muestra--flex-linea align-items-center color--pguinda600">
                                        Leer más
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>