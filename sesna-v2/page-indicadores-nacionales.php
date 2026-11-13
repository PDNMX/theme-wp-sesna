<?php
/**
 * Template Name: SISE - Indicadores Nacionales
 *
 * @package sesna
 */

get_header();

require get_theme_file_path( 'template-parts/indicadores-nacionales/datos-indicadores.php' );

$indicadores_nacionales = array();
foreach ( $sesna_indicadores_detalle as $item ) {
    $indicadores_nacionales[] = array(
        'num'      => $item['num'],
        'oe'       => $item['oe'],
        'titulo'   => $item['corto'],
        'icono'    => $item['icono'],
        'color'    => $item['color'],
        'bg'       => $item['bg'],
        'url'      => '#detalle-indicador-' . $item['num'],
    );
}
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
                                            <i class="snd__icono snd-chart--bar icono--24 color--pguinda600"></i>
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

            <!-- Encabezado de Sección con alternador de vista -->
            <div class="reticulaGrid__12 mb--16">
                <div class="columna__12">
                    <div class="in-catalogo-head">
                        <div class="in-catalogo-head__text">
                            <h2 class="h2b patria color--pguinda600 mb--8">Conoce los 10 Indicadores Nacionales</h2>
                            <p class="sh1r color--neutro600 mb--0">
                                Selecciona un indicador para conocer sus resultados, evolución y datos asociados.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Caja contenedora estándar SND (tx-comite-panel) con Tabs 01 y contenido integrado -->
            <div class="tx-comite-panel in-catalogo-panel">

                <!-- Tabs homologadas con el estándar del proyecto (Tabs 01 / Underline) -->
                <div class="tx-comite-tabs-container tx-comite-tabs-container--underline mb--24 in-view-toggle-container">
                    <ul class="ul--limpio tx-comite-tabs in-view-toggle-tabs" role="tablist" aria-label="Cambiar vista del catálogo de indicadores">
                        <li role="presentation">
                            <button type="button" class="tx-comite-tab in-view-toggle__btn is-active active" role="tab" aria-selected="true" data-catalog-view="cards" tabindex="0">
                                Tarjetas
                            </button>
                        </li>
                        <li role="presentation">
                            <button type="button" class="tx-comite-tab in-view-toggle__btn" role="tab" aria-selected="false" data-catalog-view="table" tabindex="-1">
                                Tabla comparativa
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Panel 1: Grilla de Tarjetas -->
                <div class="in-catalogo-view" data-catalog-panel="cards">
                    <div class="reticulaGrid__1 reticulaGrid__2--sm reticulaGrid__5--lg in-oe-grid" role="list">
                        <?php foreach ( $indicadores_nacionales as $ind ) : ?>
                            <a href="<?php echo esc_url( ! empty( $ind['url'] ) ? $ind['url'] : '#' ); ?>"
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
                                    <h3 class="b1sb texto--centro mb--0 in-oe-card__title" style="color: var(--oe-color);">
                                        <?php echo esc_html( $ind['titulo'] ); ?>
                                    </h3>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Panel 2: Tabla comparativa (oculta por defecto en la pestaña) -->
                <div class="in-catalogo-view" data-catalog-panel="table" hidden>
                    <div class="in-comparativa" role="region" aria-label="Tabla comparativa de los 10 Indicadores Nacionales" tabindex="0">
                        <table class="in-comparativa__table">
                            <caption class="in-sr-only">Resultados nacionales, federales y estatales de los 10 Indicadores Nacionales, año de consulta 2024</caption>
                            <thead>
                                <tr>
                                    <th scope="col" class="sdsb">#</th>
                                    <th scope="col" class="sdsb">Indicador</th>
                                    <th scope="col" class="sdsb in-comparativa__num">Nacional</th>
                                    <th scope="col" class="sdsb in-comparativa__num">Federal</th>
                                    <th scope="col" class="sdsb in-comparativa__num">Promedio estatal</th>
                                    <th scope="col" class="sdsb in-comparativa__actions">Descargas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $sesna_indicadores_detalle as $ind_t ) : ?>
                                    <tr style="--oe-color: <?php echo esc_attr( $ind_t['color'] ); ?>; --oe-bg: <?php echo esc_attr( $ind_t['bg'] ); ?>;">
                                        <td>
                                            <span class="in-comparativa__badge"><?php echo esc_html( $ind_t['num'] ); ?></span>
                                        </td>
                                        <td>
                                            <a href="#detalle-indicador-<?php echo esc_attr( $ind_t['num'] ); ?>" class="in-comparativa__link b1sb decoracion--ninguna js-open-indicador" data-target="#detalle-indicador-<?php echo esc_attr( $ind_t['num'] ); ?>">
                                                <?php echo esc_html( $ind_t['corto'] ); ?>
                                            </a>
                                            <span class="sdr color--neutro600 in-comparativa__sub"><?php echo esc_html( $ind_t['titulo'] ); ?></span>
                                        </td>
                                        <?php foreach ( array( 'nacional', 'federal', 'estatal' ) as $k ) : ?>
                                            <td class="in-comparativa__num">
                                                <?php if ( isset( $ind_t['resultados'][ $k ] ) ) : ?>
                                                    <span class="b1sb color--pguinda600"><?php echo esc_html( $ind_t['resultados'][ $k ]['valor'] ); ?>%</span>
                                                <?php else : ?>
                                                    <span class="sdr color--neutro600" aria-label="No aplica">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; ?>
                                        <td class="in-comparativa__actions">
                                            <a href="<?php echo esc_url( $ind_t['documentos']['pdf_url'] ); ?>" class="in-comparativa__dl sdsb" aria-label="Descargar Nota técnica del indicador <?php echo esc_attr( $ind_t['num'] ); ?> en PDF">
                                                <i class="snd__icono snd-download icono--16" aria-hidden="true"></i> PDF
                                            </a>
                                            <a href="<?php echo esc_url( $ind_t['documentos']['excel_url'] ); ?>" class="in-comparativa__dl sdsb" aria-label="Descargar Ficha de cálculo del indicador <?php echo esc_attr( $ind_t['num'] ); ?> en Excel">
                                                <i class="snd__icono snd-download icono--16" aria-hidden="true"></i> Excel
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

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

                                    <!-- 2. Fichas de cálculo de los Indicadores Nacionales 2025 -->
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

                                    <!-- 3. Datos abiertos -->
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

    <?php
    foreach ( $sesna_indicadores_detalle as $sesna_ind ) {
        get_template_part(
            'template-parts/indicadores-nacionales/indicador-detalle',
            null,
            array(
                'ind'       => $sesna_ind,
                'entidades' => $sesna_entidades_federativas,
                'catalogo'  => $indicadores_nacionales,
            )
        );
    }
    ?>

    <a href="#catalogo-indicadores-nacionales"
       class="boton__primario in-floating-return-btn js-return-indicadores"
       id="in-floating-return-btn"
       aria-label="Regresar a indicadores">
        <i class="snd__icono snd-arrow--up icono--20" aria-hidden="true"></i>
        <span>Regresar a indicadores</span>
    </a>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var allCards = document.querySelectorAll('.page-indicadores-nacionales .in-oe-card[href^="#detalle-indicador-"]');
    var allPanels = document.querySelectorAll('.page-indicadores-nacionales .in-detalle-panel');
    var catalogSection = document.getElementById('catalogo-indicadores-nacionales');
    var floatingBtn = document.getElementById('in-floating-return-btn');
    var siteFooter = document.querySelector('footer.sesna-footer, footer.footer, footer');

    var resetAllIndicators = function() {
        allCards.forEach(function(card) {
            card.classList.remove('is-active');
            card.removeAttribute('aria-current');
        });
        allPanels.forEach(function(panel) {
            panel.classList.remove('is-active');
            panel.setAttribute('hidden', '');
        });
    };

    resetAllIndicators();

    if (window.location.hash && window.location.hash.indexOf('#detalle-indicador-') === 0) {
        if (window.history && window.history.replaceState) {
            window.history.replaceState(null, '', window.location.pathname + window.location.search);
        }
    }

    var updateFloatingBtn = function() {
        if (!catalogSection || !floatingBtn) {
            return;
        }
        var activePanel = document.querySelector('.page-indicadores-nacionales .in-detalle-panel.is-active');
        var catalogRect = catalogSection.getBoundingClientRect();
        var shouldShow = Boolean(activePanel) && catalogRect.bottom < 120;
        floatingBtn.classList.toggle('is-visible', shouldShow);

        var baseBottom = window.innerWidth < 640 ? 16 : 28;
        if (siteFooter) {
            var footerRect = siteFooter.getBoundingClientRect();
            var viewportHeight = window.innerHeight;
            var footerGap = 24;
            if (footerRect.top < viewportHeight) {
                var clampedBottom = Math.max(baseBottom, (viewportHeight - footerRect.top) + footerGap);
                floatingBtn.style.bottom = clampedBottom + 'px';
            } else {
                floatingBtn.style.bottom = baseBottom + 'px';
            }
        }
    };

    document.querySelectorAll('.page-indicadores-nacionales a[href="#"]').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
        });
    });

    document.querySelectorAll('.page-indicadores-nacionales .in-oe-card[href^="#detalle-indicador-"]').forEach(function(card) {
        card.addEventListener('click', function(e) {
            var targetId = card.getAttribute('href');
            var targetEl = targetId ? document.querySelector(targetId) : null;
            if (targetEl) {
                e.preventDefault();
                resetAllIndicators();
                card.classList.add('is-active');
                card.setAttribute('aria-current', 'true');
                targetEl.removeAttribute('hidden');
                targetEl.classList.add('is-active');
                updateFloatingBtn();
                targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    document.querySelectorAll('.js-return-indicadores').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            if (catalogSection) {
                e.preventDefault();
                allCards.forEach(function(c) {
                    c.classList.remove('is-active');
                    c.removeAttribute('aria-current');
                });
                catalogSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    var setCatalogView = function(view) {
        document.querySelectorAll('.in-view-toggle__btn').forEach(function(b) {
            var on = b.getAttribute('data-catalog-view') === view;
            b.classList.toggle('is-active', on);
            b.classList.toggle('active', on);
            b.setAttribute('aria-selected', on ? 'true' : 'false');
            b.setAttribute('tabindex', on ? '0' : '-1');
        });
        document.querySelectorAll('.in-catalogo-view').forEach(function(panel) {
            if (panel.getAttribute('data-catalog-panel') === view) {
                panel.removeAttribute('hidden');
            } else {
                panel.setAttribute('hidden', '');
            }
        });
        if (view === 'table') {
            resetAllIndicators();
        }
        updateFloatingBtn();
    };

    document.querySelectorAll('.in-view-toggle__btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            setCatalogView(btn.getAttribute('data-catalog-view'));
        });
    });

    document.querySelectorAll('.js-open-indicador').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var target = link.getAttribute('data-target');
            var card = target ? document.querySelector('.page-indicadores-nacionales .in-oe-card[href="' + target + '"]') : null;
            if (card) {
                setCatalogView('cards');
                card.click();
            }
        });
    });

    document.querySelectorAll('.page-indicadores-nacionales .in-detalle-panel').forEach(function(panel) {
        var varTabs = Array.prototype.slice.call(panel.querySelectorAll('.in-formula-card[data-var-target]'));
        var varPanes = panel.querySelectorAll('.in-variable-pane');

        var activateVarTab = function(selectedTab, focusTab) {
            var targetSelector = selectedTab.getAttribute('data-var-target');
            var targetPane = targetSelector ? panel.querySelector(targetSelector) : null;
            if (!targetPane) {
                return;
            }
            varTabs.forEach(function(tab) {
                var isSelected = tab === selectedTab;
                tab.classList.toggle('is-active', isSelected);
                tab.setAttribute('aria-selected', isSelected ? 'true' : 'false');
                tab.setAttribute('tabindex', isSelected ? '0' : '-1');
            });
            varPanes.forEach(function(pane) {
                var isTarget = pane === targetPane;
                pane.classList.toggle('is-active', isTarget);
                if (isTarget) {
                    pane.removeAttribute('hidden');
                } else {
                    pane.setAttribute('hidden', '');
                }
            });
            if (focusTab) {
                selectedTab.focus();
            }
        };

        varTabs.forEach(function(tab, index) {
            tab.addEventListener('click', function() {
                activateVarTab(tab, false);
            });
            tab.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    activateVarTab(tab, false);
                } else if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                    e.preventDefault();
                    var nextTab = varTabs[(index + 1) % varTabs.length];
                    activateVarTab(nextTab, true);
                } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                    e.preventDefault();
                    var prevTab = varTabs[(index - 1 + varTabs.length) % varTabs.length];
                    activateVarTab(prevTab, true);
                }
            });
        });
    });

    var levelClass = function(v) {
        if (v >= 70) { return 'in-map-level--5'; }
        if (v >= 50) { return 'in-map-level--4'; }
        if (v >= 30) { return 'in-map-level--3'; }
        if (v >= 10) { return 'in-map-level--2'; }
        return 'in-map-level--1';
    };

    allPanels.forEach(function(panel) {
        var data = {};
        try { data = JSON.parse(panel.getAttribute('data-entidades') || '{}'); } catch (err) { data = {}; }
        var select = panel.querySelector('.js-in-entidad-select');
        var nameEl = panel.querySelector('.js-in-entidad-nombre');
        var valEl = panel.querySelector('.js-in-entidad-valor');
        var fills = panel.querySelectorAll('.js-in-bar-fill');
        var vals = panel.querySelectorAll('.js-in-bar-val');
        var states = panel.querySelectorAll('.in-map-state');

        states.forEach(function(st) {
            var d = data[st.getAttribute('data-entidad')];
            if (d) {
                st.classList.remove('in-map-level--1', 'in-map-level--2', 'in-map-level--3', 'in-map-level--4', 'in-map-level--5');
                st.classList.add(levelClass(d.total));
            }
        });

        var selectEntidad = function(slug) {
            var d = data[slug];
            if (!d) { return; }
            if (select) { select.value = slug; }
            if (nameEl) { nameEl.textContent = d.nombre; }
            if (valEl) { valEl.textContent = d.total + '%'; }
            fills.forEach(function(f, i) { f.style.width = d.vars[i] + '%'; });
            vals.forEach(function(v, i) { v.textContent = d.vars[i] + '%'; });
            states.forEach(function(st) {
                st.classList.toggle('is-selected', st.getAttribute('data-entidad') === slug);
            });
        };

        if (select) {
            select.addEventListener('change', function() { selectEntidad(select.value); });
            selectEntidad(select.value);
        }

        var mapCanvas = panel.querySelector('.in-map-canvas');
        var mapSvgWrap = panel.querySelector('.in-map-svg-wrap');
        var mapTooltip = panel.querySelector('.in-map-tooltip');
        var zoomInBtn = panel.querySelector('.js-map-zoom-in');
        var zoomOutBtn = panel.querySelector('.js-map-zoom-out');
        var mapZoom = 1;

        var applyMapZoom = function(nextZoom) {
            mapZoom = Math.min(2.2, Math.max(1, nextZoom));
            if (mapSvgWrap) {
                mapSvgWrap.style.transform = 'scale(' + mapZoom.toFixed(2) + ')';
            }
            if (zoomInBtn) { zoomInBtn.disabled = mapZoom >= 2.2; }
            if (zoomOutBtn) { zoomOutBtn.disabled = mapZoom <= 1; }
        };

        if (zoomInBtn) {
            zoomInBtn.addEventListener('click', function() { applyMapZoom(mapZoom + 0.25); });
        }
        if (zoomOutBtn) {
            zoomOutBtn.addEventListener('click', function() { applyMapZoom(mapZoom - 0.25); });
        }
        applyMapZoom(1);

        states.forEach(function(st) {
            st.addEventListener('click', function() { selectEntidad(st.getAttribute('data-entidad')); });
            if (mapTooltip && mapCanvas) {
                st.addEventListener('mouseenter', function() {
                    var d = data[st.getAttribute('data-entidad')];
                    if (!d) { return; }
                    mapTooltip.textContent = d.nombre + ': ' + d.total + '%';
                    mapTooltip.removeAttribute('hidden');
                });
                st.addEventListener('mousemove', function(e) {
                    var rect = mapCanvas.getBoundingClientRect();
                    mapTooltip.style.left = (e.clientX - rect.left + 12) + 'px';
                    mapTooltip.style.top = (e.clientY - rect.top - 12) + 'px';
                });
                st.addEventListener('mouseleave', function() {
                    mapTooltip.setAttribute('hidden', '');
                });
            }
        });



        var setView = function(view) {
            panel.querySelectorAll('.in-entidad-tab').forEach(function(t) {
                var on = t.getAttribute('data-entidad-view') === view;
                t.classList.toggle('is-active', on);
                t.classList.toggle('active', on);
                t.setAttribute('aria-selected', on ? 'true' : 'false');
                t.setAttribute('tabindex', on ? '0' : '-1');
            });
            panel.querySelectorAll('.in-entidad-view').forEach(function(v) {
                if (v.getAttribute('data-view') === view) { v.removeAttribute('hidden'); } else { v.setAttribute('hidden', ''); }
            });
        };

        panel.querySelectorAll('.in-entidad-tab').forEach(function(t) {
            t.addEventListener('click', function() { setView(t.getAttribute('data-entidad-view')); });
        });

        panel.querySelectorAll('.in-ranking__row').forEach(function(row) {
            var go = function() {
                selectEntidad(row.getAttribute('data-entidad'));
                setView('detalle');
            };
            row.addEventListener('click', go);
            row.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); go(); }
            });
        });

    });

    document.addEventListener('click', function(e) {
        var trigger = e.target.closest('[data-tooltip-trigger], .tooltip__boton, .in-kpi__info-btn');
        if (trigger) {
            e.preventDefault();
            e.stopPropagation();
            var parentTooltip = trigger.closest('.tooltip');
            if (!parentTooltip) return;
            var isOpen = parentTooltip.classList.contains('tooltip--mostrar') || parentTooltip.classList.contains('is-active');
            document.querySelectorAll('.tooltip--mostrar, .tooltip.is-active').forEach(function(tt) {
                tt.classList.remove('tooltip--mostrar', 'is-active');
                var b = tt.querySelector('[data-tooltip-trigger], .tooltip__boton');
                if (b) b.setAttribute('aria-expanded', 'false');
            });
            if (!isOpen) {
                parentTooltip.classList.add('tooltip--mostrar', 'is-active');
                trigger.setAttribute('aria-expanded', 'true');
            }
            return;
        }

        if (!e.target.closest('.tooltip')) {
            document.querySelectorAll('.tooltip--mostrar, .tooltip.is-active').forEach(function(tt) {
                tt.classList.remove('tooltip--mostrar', 'is-active');
                var b = tt.querySelector('[data-tooltip-trigger], .tooltip__boton');
                if (b) b.setAttribute('aria-expanded', 'false');
            });
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.tooltip--mostrar, .tooltip.is-active').forEach(function(tt) {
                tt.classList.remove('tooltip--mostrar', 'is-active');
                var b = tt.querySelector('[data-tooltip-trigger], .tooltip__boton');
                if (b) b.setAttribute('aria-expanded', 'false');
            });
        }
    });

    window.addEventListener('scroll', updateFloatingBtn, { passive: true });
    window.addEventListener('resize', updateFloatingBtn, { passive: true });
    updateFloatingBtn();
});
</script>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<?php
get_footer();
?>
