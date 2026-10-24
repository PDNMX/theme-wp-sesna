<?php
/**
 * Template Name: Administración y Finanzas
 * Homologada al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 *
 * @package sesna
 */

get_header();

$af_cards = array(
    array(
        'title' => 'Planeación<br>Institucional',
        'icon'  => 'snd-checkmark--filled',
        'desc'  => 'Documentos que orientan y dan seguimiento al cumplimiento de los objetivos y metas institucionales.',
        'url'   => home_url( '/acciones-y-programas/administracion-y-finanzas/planeacion-institucional/' ),
    ),
    array(
        'title' => 'Información<br>Financiera',
        'icon'  => 'snd-chart--bar',
        'desc'  => 'Estados financieros, dictámenes y documentación relacionada con la situación financiera de la institución.',
        'url'   => home_url( '/acciones-y-programas/administracion-y-finanzas/informacion-financiera/' ),
    ),
    array(
        'title' => 'Contrataciones<br>y Adquisiciones',
        'icon'  => 'snd-portfolio',
        'desc'  => 'Información relacionada con los procedimientos de contratación y adquisición de bienes y servicios.',
        'url'   => home_url( '/acciones-y-programas/administracion-y-finanzas/contrataciones-y-adquisiciones/' ),
    ),
    array(
        'title' => 'Gestión<br>Documental',
        'icon'  => 'snd-document',
        'desc'  => 'Instrumentos para la organización, conservación y administración de los archivos institucionales.',
        'url'   => home_url( '/acciones-y-programas/administracion-y-finanzas/archivo-documental/' ),
    ),
);
?>

<div class="page-administracion-finanzas front-page-bg" style="min-height: 100vh;">

    <!-- ── Migas de Pan (SND v1.1.0) ───────────────────────────── -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ruta__a"><i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url( '/acciones-y-programas/' ) ); ?>" class="ruta__a">Acciones y Programas</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Administración y Finanzas</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ── Hero Banner (SND v1.1.0) ────────────────────────────── -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__8--md columna__7--lg posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Administración y<br>Finanzas</h1>
                    <p class="sh1r color--neutro600">
                        Consulta información institucional relacionada con la planeación, estados financieros, adquisiciones, contrataciones y gestión documental de la SESNA.
                    </p>
                </div>
                <div class="columna__12 columna__4--md columna__5--lg muestra--ninguno muestra--flex--md align-items-center justify-content-flex-end posicion--relativa">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/' . rawurlencode( 'logo_admin_finanzas.png' ) ); ?>"
                         alt="Administración y Finanzas"
                         class="sesna-hero__img"
                         loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- ── Categorías de Consulta ─────────────────────────────── -->
    <section class="contenedor mb--48">
        <h2 class="h2b patria color--pguinda600 mb--8">Categorías de consulta</h2>

        <!-- Texto descriptivo -->
        <p class="sh1r color--neutro600 mb--0">
            Selecciona una de las siguientes categorías para consultar documentos, informes y recursos relacionados.
        </p>

        <div class="reticulaGrid__12 pt--24">
            <?php foreach ( $af_cards as $card ) : ?>
                <div class="columna__12 columna__6--md columna__3--lg">
                    <a href="<?php echo esc_url( $card['url'] ); ?>" class="sna-noticias-card alto--100 muestra--flex flex-direction-column align-items-center texto--centro px--24 py--48 ancho--100 decoracion--ninguna color--neutro800">
                        <div class="icon-bg-circle mb--24">
                            <i class="snd__icono <?php echo esc_attr( $card['icon'] ); ?> icono--24" aria-hidden="true"></i>
                        </div>
                        <h3 class="sh1b mb--16">
                            <?php echo $card['title']; ?>
                        </h3>
                        <p class="b1r texto--justify">
                            <?php echo esc_html( $card['desc'] ); ?>
                        </p>
                        <div class="mt--auto texto--derecha--md ancho--100">
                            <span class="sh1b muestra--flex-linea align-items-center color--pguinda600">
                                Consultar
                            </span>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</div>

<?php get_footer(); ?>
