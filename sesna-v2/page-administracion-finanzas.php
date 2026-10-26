<?php
/**
 * Template Name: Administración y Finanzas
 * Homologada al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
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
        'title'  => 'Planeación<br>Institucional',
        'icon'   => 'snd-checkmark--filled',
        'desc'   => 'Documentos que orientan y dan seguimiento al cumplimiento de los objetivos y metas institucionales.',
    ),
    'info-financiera' => array(
        'id'     => 'info-financiera',
        'target' => '#sec-info-financiera',
        'hash'   => 'info-financiera',
        'title'  => 'Información<br>Financiera',
        'icon'   => 'snd-chart--bar',
        'desc'   => 'Estados financieros, dictámenes y documentación relacionada con la situación financiera de la institución.',
    ),
    'contrataciones' => array(
        'id'     => 'contrataciones',
        'target' => '#sec-contrataciones',
        'hash'   => 'contrataciones',
        'title'  => 'Contrataciones<br>y Adquisiciones',
        'icon'   => 'snd-portfolio',
        'desc'   => 'Información relacionada con los procedimientos de contratación y adquisición de bienes y servicios.',
    ),
    'gestion-documental' => array(
        'id'     => 'gestion-documental',
        'target' => '#sec-gestion-documental',
        'hash'   => 'gestion-documental',
        'title'  => 'Gestión<br>Documental',
        'icon'   => 'snd-document',
        'desc'   => 'Instrumentos para la organización, conservación y administración de los archivos institucionales.',
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

    <!-- ── Categorías de Consulta (Cards Selectoras) ───────────── -->
    <section class="contenedor mb--32">
        <h2 class="h2b patria color--pguinda600 mb--8">Categorías de consulta</h2>

        <!-- Texto descriptivo -->
        <p class="sh1r color--neutro600 mb--0">
            Selecciona una de las siguientes categorías para consultar documentos, informes y recursos relacionados.
        </p>

        <div class="reticulaGrid__12 pt--24" id="af-cards-grid">
            <?php $c_i = 0; foreach ( $af_cards as $key => $card ) :
                $is_default = ( 0 === $c_i );
                ?>
                <div class="columna__12 columna__6--md columna__3--lg">
                    <a href="#<?php echo esc_attr( $card['hash'] ); ?>"
                       id="af-card-<?php echo esc_attr( $key ); ?>"
                       data-target="<?php echo esc_attr( $card['target'] ); ?>"
                       data-hash="<?php echo esc_attr( $card['hash'] ); ?>"
                       class="sna-noticias-card alto--100 muestra--flex flex-direction-column align-items-center texto--centro px--24 py--48 ancho--100 decoracion--ninguna color--neutro800 sna-tab-trigger <?php echo $is_default ? 'active' : ''; ?>"
                       role="tab"
                       aria-controls="<?php echo esc_attr( ltrim( $card['target'], '#' ) ); ?>"
                       aria-selected="<?php echo $is_default ? 'true' : 'false'; ?>">
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
            <?php $c_i++; endforeach; ?>
        </div>
    </section>

    <!-- ── Contenedor Dinámico de Paneles de Contenido (Dashboard) ── -->
    <div id="af-content-wrapper" class="contenedor mb--48" style="scroll-margin-top: 80px;">

        <!-- 1. Planeación Institucional -->
        <div id="sec-planeacion" class="af-dinamic-section" role="region" aria-labelledby="af-card-planeacion">
            <?php get_template_part( 'template-parts/administracion-finanzas/planeacion-institucional-contenido' ); ?>
        </div>

        <!-- 2. Información Financiera -->
        <div id="sec-info-financiera" class="af-dinamic-section muestra--ninguno" role="region" aria-labelledby="af-card-info-financiera">
            <?php get_template_part( 'template-parts/administracion-finanzas/informacion-financiera-contenido' ); ?>
        </div>

        <!-- 3. Contrataciones y Adquisiciones -->
        <div id="sec-contrataciones" class="af-dinamic-section muestra--ninguno" role="region" aria-labelledby="af-card-contrataciones">
            <?php get_template_part( 'template-parts/administracion-finanzas/contrataciones-contenido' ); ?>
        </div>

        <!-- 4. Gestión Documental (Archivo Documental) -->
        <div id="sec-gestion-documental" class="af-dinamic-section muestra--ninguno" role="region" aria-labelledby="af-card-gestion-documental">
            <?php get_template_part( 'template-parts/administracion-finanzas/archivo-documental-contenido' ); ?>
        </div>

    </div>

</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<!-- ── Script de Navegación del Dashboard de Administración y Finanzas ── -->
<script>
(function () {
    'use strict';

    function initAfDashboard() {
        var triggers = Array.from(document.querySelectorAll('#af-cards-grid .sna-tab-trigger'));
        var sections = Array.from(document.querySelectorAll('#af-content-wrapper .af-dinamic-section'));
        var wrapper  = document.getElementById('af-content-wrapper');

        var hashMap = {
            'planeacion': 'sec-planeacion',
            'info-financiera': 'sec-info-financiera',
            'informacion-financiera': 'sec-info-financiera',
            'contrataciones': 'sec-contrataciones',
            'contrataciones-y-adquisiciones': 'sec-contrataciones',
            'gestion-documental': 'sec-gestion-documental',
            'archivo-documental': 'sec-gestion-documental'
        };

        var canonicalHashes = {
            'sec-planeacion': 'planeacion',
            'sec-info-financiera': 'info-financiera',
            'sec-contrataciones': 'contrataciones',
            'sec-gestion-documental': 'gestion-documental'
        };

        function switchSection(targetSecId, shouldScroll, updateHash) {
            var targetSec = document.getElementById(targetSecId);
            if (!targetSec) {
                targetSecId = 'sec-planeacion';
                targetSec = document.getElementById('sec-planeacion');
            }
            if (!targetSec) return;

            // Actualizar visibilidad de paneles
            sections.forEach(function (sec) {
                if (sec.id === targetSecId) {
                    sec.classList.remove('muestra--ninguno');
                } else {
                    sec.classList.add('muestra--ninguno');
                }
            });

            // Actualizar estado activo en las cards selectoras (homologado a page-riesgos-inteligencia.php)
            triggers.forEach(function (t) {
                var isMatch = (t.getAttribute('data-target') === '#' + targetSecId);
                t.classList.toggle('active', isMatch);
                t.setAttribute('aria-selected', isMatch ? 'true' : 'false');
                if (isMatch) {
                    t.style.boxShadow = '0 0 0 2px rgba(155, 34, 66, 1)';
                } else {
                    t.style.boxShadow = '';
                }
            });

            // Actualizar URL hash de forma limpia
            var canonicalHash = canonicalHashes[targetSecId] || 'planeacion';
            if (updateHash !== false) {
                if (window.history && window.history.replaceState) {
                    window.history.replaceState(null, '', '#' + canonicalHash);
                } else {
                    window.location.hash = canonicalHash;
                }
            }

            // Scroll suave hacia el contenedor si fue activado por clic
            if (shouldScroll && wrapper) {
                wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // Eventos de clic en cards
        triggers.forEach(function (trigger) {
            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                var targetId = (this.getAttribute('data-target') || '').replace('#', '');
                switchSection(targetId, true, true);
            });
        });

        // Cargar sección inicial según hash en la URL o default
        function resolveInitialSection() {
            var rawHash = window.location.hash ? window.location.hash.replace('#', '').toLowerCase() : '';
            var targetSecId = hashMap[rawHash] || 'sec-planeacion';
            var shouldScroll = Boolean(rawHash);
            switchSection(targetSecId, shouldScroll, false);
        }

        // Escuchar cambios de hash en el navegador (historial atrás/adelante)
        window.addEventListener('hashchange', function () {
            var rawHash = window.location.hash ? window.location.hash.replace('#', '').toLowerCase() : '';
            var targetSecId = hashMap[rawHash] || 'sec-planeacion';
            switchSection(targetSecId, false, false);
        });

        resolveInitialSection();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAfDashboard);
    } else {
        initAfDashboard();
    }
})();
</script>

<?php get_footer(); ?>

