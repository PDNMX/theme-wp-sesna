<?php
/**
 * Template Name: Acciones y Programas
 *
 * Página hub/índice de Acciones y Programas del Sistema Nacional Anticorrupción.
 * Estandarizada y homologada al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda).
 *
 * @package sesna
 */

get_header();

$acciones_programas = [
    [
        'title'       => 'Plataforma Digital Nacional',
        'desc'        => 'Herramienta de inteligencia tecnológica que integra y conecta diversos sistemas electrónicos que poseen información necesaria a las autoridades competentes en materia de combate a la corrupción.',
        'img'         => get_theme_file_uri( '/img/home_v2/img_web_01_pdn.jpg' ),
        'link'        => 'https://www.plataformadigitalnacional.org/',
        'is_external' => true,
    ],
    [
        'title'       => 'Política Nacional Anticorrupción',
        'desc'        => 'Fue aprobada el 29 de enero de 2020 por el Comite Coordinador del Sistema Nacional Anticorrupción, en ella se define la estrategia para combatir el problema de la corrupción en México.',
        'img'         => get_theme_file_uri( '/img/home_v2/img_web_02_politica.jpg' ),
        'link'        => home_url( '/acciones-y-programas/politica-nacional-anticorrupcion/' ),
        'is_external' => false,
    ],
    [
        'title'       => 'Plataforma de Aprendizaje Anticorrupción',
        'desc'        => 'Herramienta tecnológica y pedagógica que promueve conocimientos y capacidades para fortalecer la integridad y combatir la corrupción.',
        'img'         => get_theme_file_uri( '/img/home_v2/img_web_04_aprendizaje.jpg' ),
        'link'        => 'https://paa.sesna.gob.mx/web/index.html',
        'is_external' => true,
    ],
    [
        'title'       => 'Riesgos e Inteligencia Anticorrupción',
        'desc'        => 'Genera evidencia y herramientas de análisis para identificar riesgos de corrupción y fortalecer la toma de decisiones.',
        'img'         => get_theme_file_uri( '/img/home_v2/img_web_03_riesgos.jpg' ),
        'link'        => home_url( '/acciones-y-programas/riesgos-e-inteligencia-anticorrupcion/' ),
        'is_external' => false,
    ],
    [
        'title'       => 'Órganos Colegiados',
        'desc'        => 'Información de los diversos órganos colegiados en los que participa la SESNA: Comité Coordinador, Órgano de Gobierno y Comisión Ejecutiva.',
        'img'         => '', // Área lista para acoplar imagen sin inventar
        'link'        => home_url( '/acciones-y-programas/organos-colegiados/' ),
        'is_external' => false,
    ],
    [
        'title'       => 'Mercado Digital Anticorrupción',
        'desc'        => 'Plataforma que facilita la consulta, difusión y adopción de herramientas digitales y proyectos de software libre para el combate a la corrupción.',
        'img'         => '', // Área lista para acoplar imagen sin inventar
        'link'        => 'https://mda.plataformadigitalnacional.org/',
        'is_external' => true,
    ],
    [
        'title'       => 'Derechos Humanos y Perspectiva de Género',
        'desc'        => 'Promovemos el respeto a los Derechos Humanos, la igualdad de género y la no discriminación, fortaleciendo la cultura de integridad en la SESNA.',
        'img'         => '', // Área lista para acoplar imagen sin inventar
        'link'        => home_url( '/acciones-y-programas/derechos-humanos-y-perspectiva-de-genero/' ),
        'is_external' => false,
    ],
    [
        'title'       => 'Administración y Finanzas',
        'desc'        => 'Consulta información institucional relacionada con la planeación, estados financieros, adquisiciones, contrataciones y gestión documental de la SESNA.',
        'img'         => '', // Área lista para acoplar imagen sin inventar
        'link'        => home_url( '/acciones-y-programas/administracion-y-finanzas/' ),
        'is_external' => false,
    ],
];
?>

<div class="page-acciones-programas front-page-bg">

    <!-- ── Breadcrumb (SND v1.1.0) ───────────────────────────────── -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ruta__a"><i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Acciones y Programas</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ── Hero Banner (SND v1.1.0) ────────────────────────────── -->
    <section class="sesna-page-hero" aria-label="Encabezado de Acciones y Programas">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__8--md columna__7--lg posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Acciones y programas</h1>
                    <p class="sh1r color--neutro600 mb--0">
                        Conoce y accede a nuestros micrositios.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Grid de Cards (2 filas × 4 columnas en Desktop) ─────── -->
    <section class="pb--48 pt--24 sna-programas-section" aria-label="Listado de acciones y programas">
        <div class="contenedor mb--48">
            <div class="reticulaGrid__12">
                <?php foreach ( $acciones_programas as $prog ) : ?>
                    <div class="columna__12 columna__6--md columna__3--lg mb--32">
                        <div class="alto--100 borde--ninguno fondo--ninguno sna-programas-wrapper">
                            <a href="<?php echo esc_url( $prog['link'] ); ?>"
                               class="muestra--flex flex-direction-column alto--100 sna-programas-card decoracion--ninguna color--neutro800"
                               <?php if ( ! empty( $prog['is_external'] ) ) : ?>
                                   target="_blank" rel="noopener noreferrer"
                                   aria-label="<?php echo esc_attr( $prog['title'] ); ?> (abre en nueva pestaña)"
                               <?php endif; ?>>

                                <!-- Contenedor del grupo superior (Imagen o Área lista para acoplar) -->
                                <div class="sna-programas-img-outer">
                                    <div class="sna-programas-img-inner">
                                        <?php if ( ! empty( $prog['img'] ) ) : ?>
                                            <img src="<?php echo esc_url( $prog['img'] ); ?>"
                                                 class="ancho--100 alto--100 sna-programas-img"
                                                 alt="<?php echo esc_attr( $prog['title'] ); ?>"
                                                 loading="lazy">
                                        <?php else : ?>
                                            <!-- Área lista para acoplar la imagen -->
                                            <div class="ancho--100 alto--100 muestra--flex align-items-center justify-content-center"
                                                 style="background-color: var(--neutro200, #F3F3F3); color: var(--neutro500, #808080);"
                                                 aria-hidden="true">
                                                <i class="snd__icono snd-image icono--40" aria-hidden="true"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Cuerpo de la tarjeta -->
                                <div class="pt--24 pb--24 px--24 texto--izquierda muestra--flex flex-direction-column flex-grow">
                                    <h2 class="sh1b color--neutro800 mb--12" style="font-size: 20px; line-height: 1.35; min-height: 54px;">
                                        <?php echo esc_html( $prog['title'] ); ?>
                                    </h2>

                                    <p class="b1r color--neutro600 mb--24 texto--justify">
                                        <?php echo esc_html( $prog['desc'] ); ?>
                                    </p>

                                    <div class="mt--auto texto--derecha ancho--100 d-flex justify-content-end">
                                        <span class="sh1b color--pguinda600">
                                            Conoce más
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

</div>

<?php get_footer(); ?>
