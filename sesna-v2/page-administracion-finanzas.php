<?php
/**
 * Template Name: Administración y Finanzas
 * Homologada al Sistema Nacional de Diseño (SND v1.0.0 — Tema Guinda)
 * Dashboard unificado de una sola página con selector por Cards
 *
 * @package sesna
 */

get_header();

$af_cards = array(
    'planeacion' => array(
        'id'     => 'planeacion',
        'target' => '#sec-planeacion',
        'hash'   => 'planeacion',
        'title'  => 'Planeación Institucional',
        'icon'   => 'snd-checkmark--filled',
        'img'    => 'planeacion_institucional.png',
        'desc'   => 'Documentos que orientan y dan seguimiento al cumplimiento de los objetivos y metas institucionales.',
    ),
    'info-financiera' => array(
        'id'     => 'info-financiera',
        'target' => '#sec-info-financiera',
        'hash'   => 'info-financiera',
        'title'  => 'Información Financiera',
        'icon'   => 'snd-chart--bar',
        'img'    => 'informacion_financiera.png',
        'desc'   => 'Estados financieros, dictámenes y documentación relacionada con la situación financiera de la institución.',
    ),
    'contrataciones' => array(
        'id'     => 'contrataciones',
        'target' => '#sec-contrataciones',
        'hash'   => 'contrataciones',
        'title'  => 'Contrataciones y Adquisiciones',
        'icon'   => 'snd-portfolio',
        'img'    => 'contrataciones_adquisiciones.png',
        'desc'   => 'Información relacionada con los procedimientos de contratación y adquisición de bienes y servicios.',
    ),
    'gestion-documental' => array(
        'id'     => 'gestion-documental',
        'target' => '#sec-gestion-documental',
        'hash'   => 'gestion-documental',
        'title'  => 'Archivo Documental',
        'icon'   => 'snd-document',
        'img'    => 'gestion_documental.png',
        'desc'   => 'Instrumentos para la organización, conservación y administración de los archivos institucionales.',
    ),
);
?>

<div class="page-administracion-finanzas front-page-bg">

    <!-- ── Migas de Pan (SND v1.0.0) ───────────────────────────── -->
    <?php get_template_part( 'template-parts/ui/breadcrumb', null, array(
        'items' => array(
            array( 'label' => 'Acciones y Programas', 'url' => home_url( '/acciones-y-programas/' ) ),
            array( 'label' => 'Administración y Finanzas' ),
        ),
    ) ); ?>

    <!-- ── Hero Banner (SND v1.0.0) ────────────────────────────── -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__8--md columna__7--lg posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Administración y<br>Finanzas</h1>
                    <p class="sh1r texto--justify">
                        Consulta información institucional relacionada con la planeación, estados financieros, adquisiciones, contrataciones y gestión documental de la SESNA.
                    </p>
                </div>
                <div class="columna__12 columna__4--md columna__5--lg muestra--ninguno muestra--flex--md align-items-center justify-content-end posicion--relativa">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/' . rawurlencode( 'logo_admin_finanzas.png' ) ); ?>"
                         alt="Administración y Finanzas"
                         class="sesna-hero__img"
                         loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- ── Categorías de Consulta (Cards Selectoras) ───────────── -->
    <section class="contenedor mb--32">
        <h2 class="h2b patria color--pguinda600 mb--8">Categorías de consulta</h2>

        <!-- Texto descriptivo -->
        <p class="sh1r color--neutro600 mb--0">
            Selecciona una de las siguientes categorías para consultar documentos, informes y recursos relacionados.
        </p>

        <div class="reticulaGrid__12 pt--24" id="af-cards-grid" role="tablist" aria-label="Categorías de consulta de Administración y Finanzas">
            <?php $c_i = 0; foreach ( $af_cards as $key => $card ) :
                $is_default = ( 0 === $c_i );
                ?>
                <div class="columna__12 columna__6--md columna__3--lg" role="presentation">
                    <?php get_template_part( 'template-parts/ui/card', null, array(
                        'href'     => '#' . $card['hash'],
                        'title'    => $card['title'],
                        'text'     => $card['desc'],
                        'icon_img' => get_template_directory_uri() . '/img/administracion_finanzas/' . rawurlencode( $card['img'] ),
                        'icon_alt' => '',
                        'action'   => array( 'type' => 'link', 'label' => 'Consultar' ),
                        'class'    => 'sna-tab-trigger' . ( $is_default ? ' active' : '' ),
                        'attrs'    => array(
                            'id'            => 'af-card-' . $key,
                            'data-target'   => $card['target'],
                            'data-hash'     => $card['hash'],
                            'role'          => 'tab',
                            'aria-controls' => ltrim( $card['target'], '#' ),
                            'aria-selected' => $is_default ? 'true' : 'false',
                        ),
                    ) ); ?>
                </div>
            <?php $c_i++; endforeach; ?>
        </div>
    </section>

    <!-- ── Contenedor Dinámico de Paneles de Contenido (Dashboard) ── -->
    <div id="af-content-wrapper" class="contenedor mb--48">

        <!-- 1. Planeación Institucional -->
        <div id="sec-planeacion" class="af-dinamic-section" role="tabpanel" aria-labelledby="af-card-planeacion">
            <?php get_template_part( 'template-parts/administracion-finanzas/planeacion-institucional-contenido' ); ?>
        </div>

        <!-- 2. Información Financiera -->
        <div id="sec-info-financiera" class="af-dinamic-section muestra--ninguno" role="tabpanel" aria-labelledby="af-card-info-financiera">
            <?php get_template_part( 'template-parts/administracion-finanzas/informacion-financiera-contenido' ); ?>
        </div>

        <!-- 3. Contrataciones y Adquisiciones -->
        <div id="sec-contrataciones" class="af-dinamic-section muestra--ninguno" role="tabpanel" aria-labelledby="af-card-contrataciones">
            <?php get_template_part( 'template-parts/administracion-finanzas/contrataciones-contenido' ); ?>
        </div>

        <!-- 4. Archivo Documental -->
        <div id="sec-gestion-documental" class="af-dinamic-section muestra--ninguno" role="tabpanel" aria-labelledby="af-card-gestion-documental">
            <?php get_template_part( 'template-parts/administracion-finanzas/archivo-documental-contenido' ); ?>
        </div>

    </div>

</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<?php get_footer(); ?>
