<?php
get_header();
?>

<div class="front-page-bg">

    <!-- Hero Section -->
    <section class="qh-hero">
        <!-- Floating icons -->
        <i class="snd__icono snd snd-document qh-floating-icon qh-fi-1" aria-hidden="true"></i>
        <i class="snd__icono snd snd-chart--bar qh-floating-icon qh-fi-2" aria-hidden="true"></i>
        <i class="snd__icono snd snd-chart--bar qh-floating-icon qh-fi-3" aria-hidden="true"></i>
        <i class="snd__icono snd snd-security qh-floating-icon qh-fi-4" aria-hidden="true"></i>
        <i class="snd__icono snd snd-screen qh-floating-icon qh-fi-5" aria-hidden="true"></i>

        <div class="contenedor posicion--relativa z--1">
            <div class="reticulaGrid__12">
                <div class="columna__12 columna__8--md columna__7--lg">
                    <span class="qh-hero-tag">Quiénes somos</span>
                    <h1 class="sesna-hero__title color--blanco mb--24">Secretaría Ejecutiva del Sistema Nacional Anticorrupción</h1>
                    <p class="sesna-hero__subtitle color--blanco opacidad--75 peso--normal">
                        Somos el órgano técnico de apoyo del Sistema Nacional Anticorrupción encargado de generar insumos técnicos especializados, desarrollar herramientas estratégicas, coordinar esfuerzos institucionales y contribuir al fortalecimiento de las políticas públicas para prevenir y combatir la corrupción en México.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="qh-video-section">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__8--md columna__5--lg mb--24 mb--0--lg pe--48--lg">
                    <h2 class="h2b patria color--pguinda600 mb--24">Conoce a la SESNA</h2>
                    <p>
                        Descubre el papel de la Secretaría Ejecutiva dentro del Sistema Nacional Anticorrupción y cómo contribuye al fortalecimiento de la coordinación institucional, la generación de información estratégica y el desarrollo de herramientas para la prevención y el combate a la corrupción.
                    </p>
                </div>
                <div class="columna__12 columna__7--lg">
                    <div class="qh-video-wrapper relacion--16x9 sombraLV2 radio--4 desborde--oculto">
                        <iframe src="https://www.youtube.com/embed/6PQb_xTNpb0?rel=0" title="¿QUÉ HACEMOS? - SESNA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Misión y Visión Section -->
    <section class="qh-mv-section">
        <div class="contenedor">
            <div class="fila justify-content-center mb--48">
                <div class="columna__12 columna__8--md texto--centro">
                    <h2 class="h2b patria color--pguinda600 mb--16">Nuestra razón de ser</h2>
                </div>
            </div>
            <div class="reticulaGrid__12 justify-content-center">
                <!-- Misión -->
                <div class="columna__12 columna__6--md mb--24">
                    <div class="qh-mv-card radio--4">
                        <div class="qh-mv-icon">
                            <i class="snd__icono snd snd-chart--bar" aria-hidden="true"></i>
                        </div>
                        <div class="qh-mv-content">
                            <h3 class="sh1b patria color--pguinda600">MISIÓN</h3>
                            <p class="mb--0">Fungir como órgano técnico de apoyo del Comité Coordinador del SNA, encargado de producir los insumos y herramientas necesarias para el desempeño de sus atribuciones establecidas en el artículo 113 de la Constitución Política de los Estados Unidos Mexicanos y en la LGSNA.</p>
                        </div>
                    </div>
                </div>
                <!-- Visión -->
                <div class="columna__12 columna__6--md mb--24">
                    <div class="qh-mv-card radio--4">
                        <div class="qh-mv-icon">
                            <i class="snd__icono snd snd-screen" aria-hidden="true"></i>
                        </div>
                        <div class="qh-mv-content">
                            <h3 class="sh1b patria color--pguinda600">VISIÓN</h3>
                            <p class="mb--0">Ser una institución eficaz y eficiente que contribuye a generar confianza y credibilidad en las instituciones públicas, mediante el uso de tecnologías de la información y el diseño, seguimiento y evaluación de políticas públicas enfocadas a la prevención, detección y sanción de faltas administrativas y hechos de corrupción, así como a la fiscalización y control de recursos públicos en el Marco del SNA.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nuestra Labor Section -->
    <section class="qh-labor-section">
        <div class="contenedor">
            <div class="fila justify-content-center mb--48">
                <div class="columna__12 columna__8--md texto--centro">
                    <h2 class="h2b patria color--pguinda600 mb--16">Nuestra labor</h2>
                    <p class="color--neutro600 mx--auto">
                        Contribuimos al fortalecimiento del Sistema Nacional Anticorrupción mediante la generación de conocimiento, el desarrollo de herramientas y la coordinación institucional.
                    </p>
                </div>
            </div>
            <div class="reticulaGrid__12">
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <div class="qh-labor-card radio--4">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/home_v2/icon-disenamos.svg" alt="Diseñamos" class="sna-integrantes-icon-circle mb--24">
                        <h3 class="sh1b patria color--pguinda600">Diseñamos</h3>
                        <p class="color--neutro600 mb--0">Generamos propuestas de política pública, metodologías e indicadores que contribuyen al fortalecimiento de la prevención, detección y combate a la corrupción.</p>
                    </div>
                </div>
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <div class="qh-labor-card radio--4">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/home_v2/icon-desarrollamos.svg" alt="Desarrollamos" class="sna-integrantes-icon-circle mb--24">
                        <h3 class="sh1b patria color--pguinda600">Desarrollamos</h3>
                        <p class="color--neutro600 mb--0">Impulsamos herramientas tecnológicas y soluciones digitales, incluida la Plataforma Digital Nacional, para facilitar el acceso, intercambio y aprovechamiento de información estratégica.</p>
                    </div>
                </div>
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <div class="qh-labor-card radio--4">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/home_v2/icon-analizamos.svg" alt="Analizamos" class="sna-integrantes-icon-circle mb--24">
                        <h3 class="sh1b patria color--pguinda600">Analizamos</h3>
                        <p class="color--neutro600 mb--0">Realizamos estudios, evaluaciones y análisis de datos que permiten identificar riesgos, tendencias y áreas de oportunidad para la toma de decisiones basada en evidencia.</p>
                    </div>
                </div>
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <div class="qh-labor-card radio--4">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/home_v2/icon-impulsamos.svg" alt="Impulsamos" class="sna-integrantes-icon-circle mb--24">
                        <h3 class="sh1b patria color--pguinda600">Impulsamos</h3>
                        <p class="color--neutro600 mb--0">Promovemos la coordinación entre instituciones, la colaboración con diversos actores y el fortalecimiento de una cultura de integridad.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Section -->
    <section class="qh-social-section">
        <div class="contenedor">
            <div class="fila justify-content-center mb--48">
                <div class="columna__12 columna__8--md texto--centro">
                    <h2 class="h2b patria color--pguinda600 mb--16">Mantente conectado con la SESNA</h2>
                    <p class="color--neutro600 mx--auto">
                        Conoce nuestras actividades, publicaciones, herramientas, eventos y acciones a través de nuestros canales oficiales.
                    </p>
                </div>
            </div>
            <div class="reticulaGrid__12">
                <!-- X (Twitter) -->
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <div class="qh-social-card radio--4 posicion--relativa">
                        <div class="qh-social-header qh-sh-x">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons-base/twitter-x.svg" alt="" aria-hidden="true">
                        </div>
                        <div class="qh-social-body">
                            <div class="qh-social-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/home_v2/icon_logo_sesna.png?v=2" alt="SESNA">
                            </div>
                            <div class="qh-social-account mt--8">
                                SESNA <i class="snd__icono snd snd-checkmark--filled" aria-hidden="true"></i>
                            </div>
                            <div class="qh-social-handle">@SESNAOficial</div>
                            <p class="mb--24">Noticias, comunicados y actualizaciones institucionales.</p>
                            <a rel="noopener" href="https://x.com/SESNAOficial" target="_blank" title="El enlace abre en ventana nueva" class="boton__secundario boton--redondeado mt--auto align-self-start enlace--expandido">Visitar <i class="snd snd__icono snd-arrow--right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <!-- YouTube -->
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <div class="qh-social-card radio--4 posicion--relativa">
                        <div class="qh-social-header qh-sh-yt">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons-base/youtube.svg" alt="" aria-hidden="true">
                        </div>
                        <div class="qh-social-body">
                            <div class="qh-social-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/home_v2/icon_logo_sesna.png?v=2" alt="SESNA">
                            </div>
                            <div class="qh-social-account mt--8">
                                SESNA <i class="snd__icono snd snd-checkmark--filled" aria-hidden="true"></i>
                            </div>
                            <div class="qh-social-handle">@SESNAOficial</div>
                            <p class="mb--24">Videos, transmisiones y contenido audiovisual.</p>
                            <a rel="noopener" href="https://www.youtube.com/@SESNAOficial" target="_blank" title="El enlace abre en ventana nueva" class="boton__secundario boton--redondeado mt--auto align-self-start enlace--expandido">Visitar <i class="snd snd__icono snd-arrow--right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Instagram -->
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <div class="qh-social-card radio--4 posicion--relativa">
                        <div class="qh-social-header qh-sh-ig">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons-base/instagram.svg" alt="" aria-hidden="true">
                        </div>
                        <div class="qh-social-body">
                            <div class="qh-social-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/home_v2/icon_logo_sesna.png?v=2" alt="SESNA">
                            </div>
                            <div class="qh-social-account mt--8">
                                SESNA <i class="snd__icono snd snd-checkmark--filled" aria-hidden="true"></i>
                            </div>
                            <div class="qh-social-handle">@sesnaoficial</div>
                            <p class="mb--24">Actividades, campañas y contenido visual.</p>
                            <a rel="noopener" href="https://www.instagram.com/sesnaoficial/" target="_blank" title="El enlace abre en ventana nueva" class="boton__secundario boton--redondeado mt--auto align-self-start enlace--expandido">Visitar <i class="snd snd__icono snd-arrow--right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <!-- LinkedIn -->
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <div class="qh-social-card radio--4 posicion--relativa">
                        <!-- Pendiente: no tenemos ícono propio de LinkedIn en img/icons-base (sí existen facebook/twitter-x/instagram/youtube). snd-earth es un marcador genérico temporal. -->
                        <div class="qh-social-header qh-sh-in">
                            <i class="snd__icono snd snd-earth" aria-hidden="true"></i>
                        </div>
                        <div class="qh-social-body">
                            <div class="qh-social-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/home_v2/icon_logo_sesna.png?v=2" alt="SESNA">
                            </div>
                            <div class="qh-social-account mt--8">
                                SESNA <i class="snd__icono snd snd-checkmark--filled" aria-hidden="true"></i>
                            </div>
                            <div class="qh-social-handle qh-social-handle--sm">Secretaría Ejecutiva del Sistema Nacional Anticorrupción</div>
                            <p class="mb--24">Información institucional y profesional.</p>
                            <a rel="noopener" href="https://www.linkedin.com/company/sesnaoficial/" target="_blank" title="El enlace abre en ventana nueva" class="boton__secundario boton--redondeado mt--auto align-self-start enlace--expandido">Visitar <i class="snd snd__icono snd-arrow--right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
get_footer();
