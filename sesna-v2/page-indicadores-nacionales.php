<?php
/**
 * Template Name: SISE - Indicadores Nacionales
 *
 * @package sesna
 */

get_header();

$indicadores_nacionales = array(
    array(
        'num'    => '01',
        'oe'     => 1,
        'titulo' => 'Coordinación',
        'icono'  => 'snd-collaborate',
        'color'  => '#F0512D',
        'bg'     => 'rgba(240, 81, 45, 0.12)',
    ),
    array(
        'num'    => '02',
        'oe'     => 2,
        'titulo' => 'Procuración e impartición de justicia',
        'icono'  => 'snd-scales',
        'color'  => '#424C98',
        'bg'     => 'rgba(66, 76, 152, 0.12)',
    ),
    array(
        'num'    => '03',
        'oe'     => 3,
        'titulo' => 'Integridad pública',
        'icono'  => 'snd-group',
        'color'  => '#FF3298',
        'bg'     => 'rgba(255, 50, 152, 0.12)',
    ),
    array(
        'num'    => '04',
        'oe'     => 4,
        'titulo' => 'Información presupuestaria',
        'icono'  => 'snd-finance',
        'color'  => '#9B2247',
        'bg'     => 'rgba(155, 34, 71, 0.12)',
    ),
    array(
        'num'    => '05',
        'oe'     => 5,
        'titulo' => 'Fiscalización y control interno',
        'icono'  => 'snd-document--view',
        'color'  => '#0089B7',
        'bg'     => 'rgba(0, 137, 183, 0.12)',
    ),
    array(
        'num'    => '06',
        'oe'     => 6,
        'titulo' => 'Riesgos en trámites y programas',
        'icono'  => 'snd-warning--alt',
        'color'  => '#009776',
        'bg'     => 'rgba(0, 151, 118, 0.12)',
    ),
    array(
        'num'    => '07',
        'oe'     => 7,
        'titulo' => 'Contrataciones públicas',
        'icono'  => 'snd-document--requirements',
        'color'  => '#004C82',
        'bg'     => 'rgba(0, 76, 130, 0.12)',
    ),
    array(
        'num'    => '08',
        'oe'     => 8,
        'titulo' => 'Gobierno abierto y rendición de cuentas',
        'icono'  => 'snd-enterprise',
        'color'  => '#9B2247',
        'bg'     => 'rgba(155, 34, 71, 0.12)',
    ),
    array(
        'num'    => '09',
        'oe'     => 9,
        'titulo' => 'Integridad en el sector privado',
        'icono'  => 'snd-user--settings',
        'color'  => '#D78118',
        'bg'     => 'rgba(215, 129, 24, 0.12)',
    ),
    array(
        'num'    => '10',
        'oe'     => 10,
        'titulo' => 'Integridad como valor social',
        'icono'  => 'snd-events',
        'color'  => '#7C2F6B',
        'bg'     => 'rgba(124, 47, 107, 0.12)',
    ),
);
?>

<div class="page-pna page-pna-seguimiento page-indicadores-nacionales front-page-bg">

    <!-- ── Breadcrumb (SND v1.1.0) ─────────────────────────────── -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="ruta__a"><i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>" class="ruta__a">Acciones y Programas</a>
                </li>
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/') ); ?>" class="ruta__a">Política Nacional Anticorrupción</a>
                </li>
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/seguimiento-evaluacion/') ); ?>" class="ruta__a">Seguimiento y evaluación</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Indicadores Nacionales</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ============================================================
         BLOQUE 1: Hero (SND v1.1.0)
         ============================================================ -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__7--lg posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600 mb--16">Indicadores Nacionales</h1>
                    <p class="sh1r texto--justify mb--0">
                        Conoce los avances del Sistema Nacional Anticorrupción a través de los 10 indicadores asociados a los Objetivos Específicos de la Política Nacional Anticorrupción.
                    </p>
                </div>
                <div class="columna__12 columna__5--lg muestra--ninguno muestra--flex--lg align-items-center justify-content-flex-end">
                    <div class="in-hero-visual" aria-hidden="true">
                        <div class="in-hero-visual__ring">
                            <div class="in-hero-visual__circle">
                                <svg class="in-hero-visual__svg" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
                                    <!-- Línea de tendencia ascendente -->
                                    <path d="M24 58L78 26" stroke="#9B2247" stroke-width="4" stroke-linecap="round"/>
                                    <path d="M68 24L80 25L75 36" stroke="#9B2247" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                    <!-- 4 barras ascendentes -->
                                    <rect x="20" y="74" width="14" height="24" rx="3" fill="#9B2247"/>
                                    <rect x="42" y="62" width="14" height="36" rx="3" fill="#9B2247"/>
                                    <rect x="64" y="48" width="14" height="50" rx="3" fill="#9B2247"/>
                                    <rect x="86" y="32" width="14" height="66" rx="3" fill="#9B2247"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         BLOQUE 2: ¿Qué son los Indicadores Nacionales? + 2 Métricas
         ============================================================ -->
    <section class="pb--32" id="que-son-indicadores">
        <div class="contenedor">
            <div class="reticulaGrid__12">
                <div class="columna__12">
                    <div class="cf-panel-card sise-panel-card in-intro-card">
                        <div class="reticulaGrid__12 align-items-center">

                            <!-- Columna Izquierda: Explicación -->
                            <div class="columna__12 columna__7--xl">
                                <div class="muestra--flex align-items-start gap--16 in-card-intro-flex">
                                    <div class="tx-consulta-card__icon-wrap flex-none" aria-hidden="true">
                                        <i class="snd__icono snd-document icono--32 color--pguinda600" aria-hidden="true"></i>
                                    </div>
                                    <div class="muestra--flex flex-direction-column flex-grow">
                                        <h2 class="sh1b tx-consulta-card__title color--neutro800 mb--8">¿Qué son los Indicadores Nacionales?</h2>
                                        <p class="b1r tx-consulta-card__desc texto--justify mb--0">
                                            Los Indicadores Nacionales permiten medir el avance sistémico en el combate a la corrupción y valorar el grado de consolidación del Sistema Nacional Anticorrupción. Cada indicador se encuentra asociado a uno de los Objetivos Específicos de la PNA.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Columna Derecha: 2 Métricas -->
                            <div class="columna__12 columna__5--xl">
                                <div class="in-stats-box" role="group" aria-label="Cifras clave de los Indicadores Nacionales">

                                    <!-- Métrica 1: 10 Indicadores Nacionales -->
                                    <div class="in-stat-item">
                                        <div class="in-stat-item__icon" aria-hidden="true">
                                            <i class="snd__icono snd-chart--bar icono--24 color--pguinda600" aria-hidden="true"></i>
                                        </div>
                                        <div class="in-stat-item__body">
                                            <div class="sh0b color--neutro800 mb--4 in-stat-item__num">10</div>
                                            <div class="b1r in-stat-item__label">Indicadores<br>Nacionales</div>
                                        </div>
                                    </div>

                                    <div class="in-stat-divider" aria-hidden="true"></div>

                                    <!-- Métrica 2: 10 Objetivos Específicos de la PNA -->
                                    <div class="in-stat-item">
                                        <div class="in-stat-item__icon" aria-hidden="true">
                                            <svg class="in-target-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
                                                <circle cx="12" cy="12" r="9" stroke="#9B2247" stroke-width="2"/>
                                                <circle cx="12" cy="12" r="5" stroke="#9B2247" stroke-width="2"/>
                                                <circle cx="12" cy="12" r="2" fill="#9B2247"/>
                                                <path d="M16 8L21 3M21 3H17.5M21 3V6.5" stroke="#9B2247" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="in-stat-item__body">
                                            <div class="sh0b color--neutro800 mb--4 in-stat-item__num">10</div>
                                            <div class="b1r in-stat-item__label">Objetivos<br>Específicos de la PNA</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         BLOQUE 3: Conoce los 10 Indicadores Nacionales (OE 1 a OE 10)
         ============================================================ -->
    <section class="pb--32" id="catalogo-indicadores-nacionales">
        <div class="contenedor">

            <!-- Encabezado de Sección -->
            <div class="reticulaGrid__12 mb--24">
                <div class="columna__12">
                    <h2 class="h2b patria color--pguinda600 mb--8">Conoce los 10 Indicadores Nacionales</h2>
                    <p class="sh1r color--neutro600 mb--0">
                        Selecciona un indicador para conocer sus resultados, evolución y datos asociados.
                    </p>
                </div>
            </div>

            <!-- Grilla de 10 Indicadores (Retícula SND v1.1.0: 1 en XS, 2 en SM/MD, 5 en LG/XL) -->
            <div class="reticulaGrid__1 reticulaGrid__2--sm reticulaGrid__5--lg in-oe-grid" role="list">
                <?php foreach ( $indicadores_nacionales as $ind ) : ?>
                    <a href="#"
                       class="in-oe-card decoracion--ninguna"
                       role="listitem"
                       data-oe="<?php echo esc_attr( $ind['oe'] ); ?>"
                       style="--oe-color: <?php echo esc_attr( $ind['color'] ); ?>; --oe-bg: <?php echo esc_attr( $ind['bg'] ); ?>;"
                       aria-label="<?php echo esc_attr( 'Indicador ' . $ind['num'] . ': ' . $ind['titulo'] ); ?>">
                        <div class="in-oe-card__top">
                            <span class="in-oe-card__num"><?php echo esc_html( $ind['num'] ); ?></span>
                        </div>
                        <div class="in-oe-card__icon-wrap" aria-hidden="true">
                            <div class="in-oe-card__icon-circle">
                                <i class="snd__icono <?php echo esc_attr( $ind['icono'] ); ?> icono--32" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="in-oe-card__footer">
                            <h3 class="b1sb color--neutro800 texto--centro mb--0 in-oe-card__title">
                                <?php echo esc_html( $ind['titulo'] ); ?>
                            </h3>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <!-- ============================================================
         BLOQUE 4: Consulta y descarga (SND v1.1.0)
         ============================================================ -->
    <section class="pb--48" id="consulta-descarga-indicadores">
        <div class="contenedor">
            <div class="reticulaGrid__12">
                <div class="columna__12">
                    <div class="cf-panel-card sise-panel-card in-consulta-panel">
                        <div class="reticulaGrid__12 align-items-center">

                            <!-- Columna Izquierda: Título y descripción -->
                            <div class="columna__12 columna__4--xl">
                                <div class="muestra--flex align-items-start gap--16 in-card-intro-flex">
                                    <div class="tx-consulta-card__icon-wrap flex-none" aria-hidden="true">
                                        <i class="snd__icono snd-document icono--32 color--pguinda600" aria-hidden="true"></i>
                                    </div>
                                    <div class="muestra--flex flex-direction-column flex-grow">
                                        <h2 class="sh1b tx-consulta-card__title color--neutro800 mb--8">Consulta y descarga</h2>
                                        <p class="b1r tx-consulta-card__desc texto--justify mb--0">
                                            Accede al informe de avances, a las fichas de cálculo y a otros documentos relevantes sobre los Indicadores Nacionales.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Columna Derecha: 3 Tarjetas de Consulta / Descarga -->
                            <div class="columna__12 columna__8--xl">
                                <div class="reticulaGrid__12">

                                    <!-- 1. Informe de Avances de los Indicadores Nacionales 2025 -->
                                    <div class="columna__12 columna__4--lg">
                                        <a href="#"
                                           class="in-download-card decoracion--ninguna"
                                           aria-label="Consultar Informe de Avances de los Indicadores Nacionales 2025">
                                            <div class="in-download-card__icon flex-none" aria-hidden="true">
                                                <i class="snd__icono snd-document--pdf icono--24 color--pguinda600" aria-hidden="true"></i>
                                            </div>
                                            <div class="in-download-card__body">
                                                <span class="sdr color--neutro600 in-download-card__title">
                                                    <strong class="b1sb color--neutro800 dblock">Informe de Avances</strong> de los Indicadores Nacionales <strong class="b1b color--neutro800">2025</strong>
                                                </span>
                                            </div>
                                            <span class="in-download-card__action" aria-hidden="true">
                                                <i class="snd__icono snd-arrow--right icono--20 color--pguinda600" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </div>

                                    <!-- 2. Fichas de cálculo de los Indicadores Nacionales 2025 (Flecha hacia abajo de descarga) -->
                                    <div class="columna__12 columna__4--lg">
                                        <a href="#"
                                           class="in-download-card decoracion--ninguna"
                                           aria-label="Descargar Fichas de cálculo de los Indicadores Nacionales 2025">
                                            <div class="in-download-card__icon flex-none" aria-hidden="true">
                                                <i class="snd__icono snd-calculator icono--24 color--pguinda600" aria-hidden="true"></i>
                                            </div>
                                            <div class="in-download-card__body">
                                                <span class="sdr color--neutro600 in-download-card__title">
                                                    <strong class="b1sb color--neutro800 dblock">Fichas de cálculo</strong> de los Indicadores Nacionales 2025
                                                </span>
                                            </div>
                                            <span class="in-download-card__action" aria-hidden="true">
                                                <i class="snd__icono snd-download icono--20 color--pguinda600" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </div>

                                    <!-- 3. Datos abiertos (Flecha hacia abajo de descarga) -->
                                    <div class="columna__12 columna__4--lg">
                                        <a href="#"
                                           class="in-download-card decoracion--ninguna"
                                           aria-label="Descargar Datos abiertos de los Indicadores Nacionales">
                                            <div class="in-download-card__icon flex-none" aria-hidden="true">
                                                <i class="snd__icono snd-catalog icono--24 color--pguinda600" aria-hidden="true"></i>
                                            </div>
                                            <div class="in-download-card__body">
                                                <span class="b1sb color--neutro800 in-download-card__title">
                                                    Datos abiertos
                                                </span>
                                            </div>
                                            <span class="in-download-card__action" aria-hidden="true">
                                                <i class="snd__icono snd-download icono--20 color--pguinda600" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Evitar salto de scroll al hacer clic en tarjetas con href="#" mientras se conectan sus vistas finales
    document.querySelectorAll('.page-indicadores-nacionales a[href="#"]').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
        });
    });
});
</script>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<?php
get_footer();
?>
