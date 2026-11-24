<?php
get_header();
?>

<div class="front-page-bg">

    <!-- Migas de pan (Breadcrumb) — Estándar SND v1.0.0 -->
    <?php get_template_part( 'template-parts/ui/breadcrumb', null, array(
        'items' => array(
            array( 'label' => '¿Qué hacemos?' ),
        ),
    ) ); ?>

    <!-- Hero Section -->
    <section class="sesna-page-hero" aria-label="Encabezado de Quiénes somos">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__8--md columna__7--lg posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Secretaría Ejecutiva del Sistema Nacional Anticorrupción</h1>
                    <p class="sh1r mb--0 texto--justify">
                        Somos el órgano técnico de apoyo del Sistema Nacional Anticorrupción encargado de generar insumos técnicos especializados, desarrollar herramientas estratégicas, coordinar esfuerzos institucionales y contribuir al fortalecimiento de las políticas públicas para prevenir y combatir la corrupción en México.
                    </p>
                </div>
                <div class="columna__12 columna__4--md columna__5--lg muestra--ninguno muestra--flex--md align-items-center justify-content-end posicion--relativa">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/logo-sesna.svg' ); ?>"
                         alt="Secretaría Ejecutiva del Sistema Nacional Anticorrupción"
                         class="sesna-hero__img qh-hero__logo"
                         loading="eager">
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
                    <p class="sh1r color--neutro600 texto--justify">
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
            <div class="fila mb--24">
                <div class="columna__12">
                    <h2 class="h2b patria color--pguinda600 mb--0">Nuestra razón de ser</h2>
                </div>
            </div>
            <div class="reticulaGrid__12 justify-content-center">
                <!-- Misión -->
                <div class="columna__12 columna__6--md mb--24">
                    <?php get_template_part( 'template-parts/ui/card', null, array(
                        'title' => 'MISIÓN',
                        'text'  => 'Fungir como órgano técnico de apoyo del Comité Coordinador del SNA, encargado de producir los insumos y herramientas necesarias para el desempeño de sus atribuciones establecidas en el artículo 113 de la Constitución Política de los Estados Unidos Mexicanos y en la LGSNA.',
                        'icon'  => 'snd-chart--bar',
                    ) ); ?>
                </div>
                <!-- Visión -->
                <div class="columna__12 columna__6--md mb--24">
                    <?php get_template_part( 'template-parts/ui/card', null, array(
                        'title' => 'VISIÓN',
                        'text'  => 'Ser una institución eficaz y eficiente que contribuye a generar confianza y credibilidad en las instituciones públicas, mediante el uso de tecnologías de la información y el diseño, seguimiento y evaluación de políticas públicas enfocadas a la prevención, detección y sanción de faltas administrativas y hechos de corrupción, así como a la fiscalización y control de recursos públicos en el Marco del SNA.',
                        'icon'  => 'snd-screen',
                    ) ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Nuestra Labor Section -->
    <section class="qh-labor-section">
        <div class="contenedor">
            <div class="fila mb--24">
                <div class="columna__12">
                    <h2 class="h2b patria color--pguinda600 mb--8">Nuestra labor</h2>
                    <p class="sh1r color--neutro600 mb--0">
                        Contribuimos al fortalecimiento del Sistema Nacional Anticorrupción mediante la generación de conocimiento, el desarrollo de herramientas y la coordinación institucional.
                    </p>
                </div>
            </div>
            <div class="reticulaGrid__12">
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <?php get_template_part( 'template-parts/ui/card', null, array(
                        'title'    => 'Diseñamos',
                        'text'     => 'Generamos propuestas de política pública, metodologías e indicadores que contribuyen al fortalecimiento de la prevención, detección y combate a la corrupción.',
                        'icon_img' => get_template_directory_uri() . '/img/home_v2/icon-disenamos.svg',
                        'icon_alt' => 'Diseñamos',
                    ) ); ?>
                </div>
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <?php get_template_part( 'template-parts/ui/card', null, array(
                        'title'    => 'Desarrollamos',
                        'text'     => 'Impulsamos herramientas tecnológicas y soluciones digitales, incluida la Plataforma Digital Nacional, para facilitar el acceso, intercambio y aprovechamiento de información estratégica.',
                        'icon_img' => get_template_directory_uri() . '/img/home_v2/icon-desarrollamos.svg',
                        'icon_alt' => 'Desarrollamos',
                    ) ); ?>
                </div>
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <?php get_template_part( 'template-parts/ui/card', null, array(
                        'title'    => 'Analizamos',
                        'text'     => 'Realizamos estudios, evaluaciones y análisis de datos que permiten identificar riesgos, tendencias y áreas de oportunidad para la toma de decisiones basada en evidencia.',
                        'icon_img' => get_template_directory_uri() . '/img/home_v2/icon-analizamos.svg',
                        'icon_alt' => 'Analizamos',
                    ) ); ?>
                </div>
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <?php get_template_part( 'template-parts/ui/card', null, array(
                        'title'    => 'Impulsamos',
                        'text'     => 'Promovemos la coordinación entre instituciones, la colaboración con diversos actores y el fortalecimiento de una cultura de integridad.',
                        'icon_img' => get_template_directory_uri() . '/img/home_v2/icon-impulsamos.svg',
                        'icon_alt' => 'Impulsamos',
                    ) ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Section -->
    <section class="qh-social-section">
        <div class="contenedor">
            <div class="fila mb--24">
                <div class="columna__12">
                    <h2 class="h2b patria color--pguinda600 mb--8">Mantente conectado con la SESNA</h2>
                    <p class="sh1r color--neutro600 mb--0">
                        Conoce nuestras actividades, publicaciones, herramientas, eventos y acciones a través de nuestros canales oficiales.
                    </p>
                </div>
            </div>
            <div class="reticulaGrid__12">
                <!-- X (Twitter) -->
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <div class="qh-social-card posicion--relativa">
                        <div class="qh-social-header qh-sh-x">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons-base/twitter-x.svg" alt="" aria-hidden="true">
                        </div>
                        <div class="qh-social-body">
                            <div class="qh-social-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/home_v2/icon_logo_sesna.png?v=2" alt="SESNA">
                            </div>
                            <div class="qh-social-account mt--8">
                                SESNA <?= sesna_render_snd_svg_icon('snd-checkmark--filled', 'icono--16') ?>
                            </div>
                            <div class="qh-social-handle">@SESNAOficial</div>
                            <p class="b1r mb--24">Noticias, comunicados y actualizaciones institucionales.</p>
                            <div class="mt--auto texto--derecha--md">
                                <a rel="noopener" href="https://x.com/SESNAOficial" target="_blank" class="sh1b muestra--flex-linea align-items-center color--pguinda600 enlace--expandido decoracion--ninguna">Visitar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- YouTube -->
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <div class="qh-social-card posicion--relativa">
                        <div class="qh-social-header qh-sh-yt">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons-base/youtube.svg" alt="" aria-hidden="true">
                        </div>
                        <div class="qh-social-body">
                            <div class="qh-social-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/home_v2/icon_logo_sesna.png?v=2" alt="SESNA">
                            </div>
                            <div class="qh-social-account mt--8">
                                SESNA <?= sesna_render_snd_svg_icon('snd-checkmark--filled', 'icono--16') ?>
                            </div>
                            <div class="qh-social-handle">@SESNAOficial</div>
                            <p class="b1r mb--24">Videos, transmisiones y contenido audiovisual.</p>
                            <div class="mt--auto texto--derecha--md">
                                <a rel="noopener" href="https://www.youtube.com/@SESNAOficial" target="_blank" class="sh1b muestra--flex-linea align-items-center color--pguinda600 enlace--expandido decoracion--ninguna">Visitar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Instagram -->
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <div class="qh-social-card posicion--relativa">
                        <div class="qh-social-header qh-sh-ig">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons-base/instagram.svg" alt="" aria-hidden="true">
                        </div>
                        <div class="qh-social-body">
                            <div class="qh-social-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/home_v2/icon_logo_sesna.png?v=2" alt="SESNA">
                            </div>
                            <div class="qh-social-account mt--8">
                                SESNA <?= sesna_render_snd_svg_icon('snd-checkmark--filled', 'icono--16') ?>
                            </div>
                            <div class="qh-social-handle">@sesnaoficial</div>
                            <p class="b1r mb--24">Actividades, campañas y contenido visual.</p>
                            <div class="mt--auto texto--derecha--md">
                                <a rel="noopener" href="https://www.instagram.com/sesnaoficial/" target="_blank" class="sh1b muestra--flex-linea align-items-center color--pguinda600 enlace--expandido decoracion--ninguna">Visitar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- LinkedIn -->
                <div class="columna__12 columna__6--md columna__3--lg mb--24">
                    <div class="qh-social-card posicion--relativa">
                        <!-- Pendiente: no tenemos ícono propio de LinkedIn en img/icons-base (sí existen facebook/twitter-x/instagram/youtube). snd-earth es un marcador genérico temporal. -->
                        <div class="qh-social-header qh-sh-in">
                            <?= sesna_render_snd_svg_icon('snd-earth', 'icono--32 color--blanco') ?>
                        </div>
                        <div class="qh-social-body">
                            <div class="qh-social-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/home_v2/icon_logo_sesna.png?v=2" alt="SESNA">
                            </div>
                            <div class="qh-social-account mt--8">
                                SESNA <?= sesna_render_snd_svg_icon('snd-checkmark--filled', 'icono--16') ?>
                            </div>
                            <div class="qh-social-handle qh-social-handle--sm">Secretaría Ejecutiva del Sistema Nacional Anticorrupción</div>
                            <p class="b1r mb--24">Información institucional y profesional.</p>
                            <div class="mt--auto texto--derecha--md">
                                <a rel="noopener" href="https://www.linkedin.com/company/sesnaoficial/" target="_blank" class="sh1b muestra--flex-linea align-items-center color--pguinda600 enlace--expandido decoracion--ninguna">Visitar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
get_footer();
