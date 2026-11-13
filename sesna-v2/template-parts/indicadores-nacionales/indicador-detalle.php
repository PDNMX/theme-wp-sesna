<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ind        = isset( $args['ind'] ) ? $args['ind'] : array();
$entidades  = isset( $args['entidades'] ) ? $args['entidades'] : array();

if ( empty( $ind ) ) {
    return;
}

$n          = $ind['num'];
$pid        = 'in-ind' . (int) $ind['oe'];
$default    = ! empty( $ind['entidad_default'] ) ? $ind['entidad_default'] : '';
$def_data   = ( ! empty( $default ) && isset( $ind['entidades'][ $default ] ) ) ? $ind['entidades'][ $default ] : array();
$total_vars = count( $ind['variables'] );
$has_map    = ! empty( $ind['entidades'] );

$entidades_json = array();
if ( $has_map ) {
    foreach ( $ind['entidades'] as $slug => $d ) {
        $entidades_json[ $slug ] = array(
            'nombre' => isset( $entidades[ $slug ] ) ? $entidades[ $slug ] : $slug,
            'total'  => $d['total'],
            'vars'   => $d['vars'],
        );
    }
}

$ranking = $has_map ? $ind['entidades'] : array();
if ( ! empty( $ranking ) ) {
    uasort(
        $ranking,
        function ( $a, $b ) {
            return $b['total'] <=> $a['total'];
        }
    );
}

$kpis = array(
    'nacional' => array( 'label' => 'Resultado Nacional', 'icono' => 'snd-earth' ),
    'federal'  => array( 'label' => 'Resultado Federal', 'icono' => 'snd-building' ),
    'estatal'  => array( 'label' => 'Promedio Estatal', 'icono' => 'snd-group' ),
);
$kpis      = array_intersect_key( $kpis, $ind['resultados'] );
$kpi_count = count( $kpis );
if ( 1 === $kpi_count ) {
    $kpi_col = 'columna__12';
} elseif ( 2 === $kpi_count ) {
    $kpi_col = 'columna__12 columna__6--lg';
} else {
    $kpi_col = 'columna__12 columna__4--lg';
}

$primary_val = isset( $ind['resultados']['nacional']['valor'] ) ? $ind['resultados']['nacional']['valor'] : null;
?>

<div id="detalle-indicador-<?php echo esc_attr( $n ); ?>"
     class="page-indicador-detalle in-detalle-panel"
     data-oe-panel="<?php echo esc_attr( $ind['oe'] ); ?>"
     data-entidades="<?php echo esc_attr( wp_json_encode( $entidades_json ) ); ?>"
     hidden
     style="--oe-color: <?php echo esc_attr( $ind['color'] ); ?>; --oe-bg: <?php echo esc_attr( $ind['bg'] ); ?>;">

    <section class="pt--16 pb--48" id="encabezado-indicador-<?php echo esc_attr( $n ); ?>">
        <div class="contenedor">

            <!-- 1. Título del indicador: FUERA de la card, en guinda, ancho completo y responsivo -->
            <div class="in-detalle-hero-standalone mb--24">
                <h2 class="h2b patria color--pguinda600 mb--0 in-detalle-main-title">
                    <?php echo esc_html( $ind['titulo'] ); ?>
                </h2>
            </div>

            <!-- 2. ¿Qué mide? -->
            <div class="cf-panel-card sise-panel-card in-que-mide-card mb--24">
                <div class="muestra--flex align-items-start gap--16 in-card-intro-flex">
                    <div class="tx-consulta-card__icon-wrap in-que-mide-card__icon-wrap flex-none" aria-hidden="true">
                        <i class="snd__icono <?php echo esc_attr( $ind['icono'] ); ?> icono--32" aria-hidden="true"></i>
                    </div>
                    <div class="muestra--flex flex-direction-column flex-grow">
                        <div class="mb--8">
                            <span class="in-detalle-badge sdsb">Indicador <?php echo esc_html( $n ); ?></span>
                        </div>
                        <h3 class="sh0b mb--8" style="color: var(--oe-color, <?php echo esc_attr( $ind['color'] ); ?>);">¿Qué mide?</h3>
                        <p class="b1r tx-consulta-card__desc texto--justify mb--0"><?php echo esc_html( $ind['que_mide'] ); ?></p>
                    </div>
                </div>
            </div>

            <!-- 3. Resultados del indicador (KPI cards con filtro de año) -->
            <div class="cf-panel-card sise-panel-card mb--24">
                <div class="in-res-header-bar mb--20">
                    <div>
                        <h3 class="sh0b mb--2" style="color: var(--oe-color, <?php echo esc_attr( $ind['color'] ); ?>);">Resultados del indicador</h3>
                        <p class="sdr color--neutro600 mb--0">Valores consolidados al cierre del ejercicio <?php echo esc_html( $ind['anio'] ); ?></p>
                    </div>
                    <div class="in-filter-bar in-filter-bar--anio">
                        <label for="<?php echo esc_attr( $pid ); ?>-anio" class="b1sb color--neutro800 in-filter-bar__label">Año de consulta:</label>
                        <div class="tx-select-wrap in-select-wrap in-select-wrap--anio">
                            <select id="<?php echo esc_attr( $pid ); ?>-anio" class="tx-comite-select tx-comite-filter-control in-comite-select--anio" aria-label="Seleccionar año de consulta">
                                <option value="<?php echo esc_attr( $ind['anio'] ); ?>" selected><?php echo esc_html( $ind['anio'] ); ?></option>
                            </select>
                            <i class="snd__icono snd-chevron--down icono--20 color--neutro800 tx-select-chevron" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="reticulaGrid__12 align-items-stretch">
                    <?php foreach ( $kpis as $key => $kpi ) : ?>
                        <div class="<?php echo esc_attr( $kpi_col ); ?>">
                            <div class="in-kpi">
                                <div class="in-kpi__top">
                                    <div class="tx-consulta-card__icon-wrap flex-none" aria-hidden="true">
                                        <i class="snd__icono <?php echo esc_attr( $kpi['icono'] ); ?> icono--32 color--pguinda600" aria-hidden="true"></i>
                                    </div>
                                    <div class="in-res-card__metric">
                                        <div class="in-res-card__label-row">
                                            <span class="b1r color--neutro800"><?php echo esc_html( $kpi['label'] ); ?></span>
                                            <div class="tooltip in-kpi__tooltip">
                                                <button type="button" class="tooltip__boton in-kpi__info-btn" aria-label="Definición de <?php echo esc_attr( $kpi['label'] ); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr( $pid . '-tt-' . $key ); ?>" aria-describedby="<?php echo esc_attr( $pid . '-tt-desc-' . $key ); ?>" data-tooltip-trigger>
                                                    <i class="snd__icono snd-information icono--16" aria-hidden="true"></i>
                                                </button>
                                                <div id="<?php echo esc_attr( $pid . '-tt-' . $key ); ?>" class="tooltip__burbuja tooltip__burbuja--abajo-izquierda tooltip__burbuja--mediano" role="tooltip" aria-hidden="true">
                                                    <?php echo esc_html( $ind['resultados'][ $key ]['desc'] ); ?>
                                                </div>
                                                <span id="<?php echo esc_attr( $pid . '-tt-desc-' . $key ); ?>" class="accesibilidadLector"><?php echo esc_html( $ind['resultados'][ $key ]['desc'] ); ?></span>
                                            </div>
                                        </div>
                                        <div class="sh0b color--pguinda600 mb--0 in-res-card__num"><?php echo esc_html( $ind['resultados'][ $key ]['valor'] ); ?>%</div>
                                    </div>
                                </div>
                                <div class="in-kpi__bar" aria-hidden="true">
                                    <div class="in-kpi__bar-fill" style="width: <?php echo esc_attr( $ind['resultados'][ $key ]['valor'] ); ?>%;"></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- 4. ¿Cómo se integra este indicador? (Fórmula y Variables) -->
            <div class="cf-panel-card sise-panel-card mb--24">
                <div class="mb--16">
                    <h3 class="sh0b mb--6" style="color: var(--oe-color, <?php echo esc_attr( $ind['color'] ); ?>);">¿Cómo se integra este indicador?</h3>
                    <p class="b1r color--neutro700 mb--4"><?php echo esc_html( $ind['integracion_desc'] ); ?></p>
                    <p class="sdr color--neutro600 mb--0">Selecciona cada variable para consultar su descripción detallada:</p>
                </div>

                <?php
                $formula_class = '';
                if ( 2 === $total_vars ) {
                    $formula_class = 'in-formula-row--2vars';
                } elseif ( 4 === $total_vars ) {
                    $formula_class = 'in-formula-row--4vars';
                }
                ?>
                <div class="in-formula-row <?php echo esc_attr( $formula_class ); ?> mb--24" role="tablist" aria-label="Variables que integran el indicador">
                    <?php foreach ( $ind['variables'] as $i => $var ) : ?>
                        <?php $active = 0 === $i; ?>
                        <div class="in-formula-card<?php echo $active ? ' is-active' : ''; ?>"
                             id="<?php echo esc_attr( $pid . '-tab-' . $var['num'] ); ?>"
                             role="tab"
                             tabindex="<?php echo $active ? '0' : '-1'; ?>"
                             aria-selected="<?php echo $active ? 'true' : 'false'; ?>"
                             aria-controls="<?php echo esc_attr( $pid . '-pane-' . $var['num'] ); ?>"
                             data-var-target="#<?php echo esc_attr( $pid . '-pane-' . $var['num'] ); ?>">
                            <div class="tx-consulta-card__icon-wrap flex-none" aria-hidden="true">
                                <i class="snd__icono <?php echo esc_attr( $var['icono'] ); ?> icono--32 color--pguinda600" aria-hidden="true"></i>
                            </div>
                            <div class="in-formula-card__body">
                                <span class="b1sb color--neutro800 in-formula-card__title"><?php echo esc_html( $var['titulo_corto'] ); ?></span>
                            </div>
                        </div>
                        <div class="in-formula-op" aria-hidden="true"><?php echo ( $i < $total_vars - 1 ) ? '+' : '='; ?></div>
                    <?php endforeach; ?>

                    <div class="in-formula-result">
                        <span class="b1b color--blanco in-formula-result__title">
                            <?php echo esc_html( $ind['corto'] ); ?>
                        </span>
                        <?php if ( null !== $primary_val ) : ?>
                            <span class="sdsb color--blanco in-formula-result__val">Nacional: <?php echo esc_html( $primary_val ); ?>%</span>
                        <?php endif; ?>
                    </div>
                </div>

                <?php foreach ( $ind['variables'] as $i => $var ) : ?>
                    <?php $active = 0 === $i; ?>
                    <div class="in-variable-detail-box in-variable-pane<?php echo $active ? ' is-active' : ''; ?>"
                         id="<?php echo esc_attr( $pid . '-pane-' . $var['num'] ); ?>"
                         role="tabpanel"
                         aria-labelledby="<?php echo esc_attr( $pid . '-tab-' . $var['num'] ); ?>"
                         <?php echo $active ? '' : 'hidden'; ?>>
                        <div class="muestra--flex align-items-start gap--16 in-card-intro-flex">
                            <div class="tx-consulta-card__icon-wrap flex-none" aria-hidden="true">
                                <i class="snd__icono <?php echo esc_attr( $var['icono'] ); ?> icono--32 color--pguinda600" aria-hidden="true"></i>
                            </div>
                            <div class="muestra--flex flex-direction-column flex-grow">
                                <h4 class="sh1b tx-consulta-card__title color--neutro800 mb--8"><?php echo esc_html( $var['titulo_largo'] ); ?></h4>
                                <p class="b1r tx-consulta-card__desc texto--justify mb--0"><?php echo esc_html( $var['desc'] ); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- 5. Resultados por entidad federativa (Mapa + Detalle / Ranking) -->
            <?php if ( $has_map ) : ?>
                <div class="cf-panel-card sise-panel-card mb--24">
                    <div class="mb--16">
                        <h3 class="sh0b mb--4" style="color: var(--oe-color, <?php echo esc_attr( $ind['color'] ); ?>);">Resultados por entidad federativa</h3>
                        <p class="b1r color--neutro700 mb--0">Selecciona una entidad federativa para consultar su resultado.</p>
                    </div>

                    <div class="reticulaGrid__12 align-items-start">

                        <div class="columna__12 columna__7--xl">
                            <div class="in-map-section-wrap">
                                <div class="in-map-canvas">
                                    <div class="in-map-zoom" role="group" aria-label="Controles de zoom del mapa">
                                        <button type="button" class="in-map-zoom__btn js-map-zoom-in" aria-label="Acercar mapa">+</button>
                                        <button type="button" class="in-map-zoom__btn js-map-zoom-out" aria-label="Alejar mapa">&minus;</button>
                                    </div>
                                    <div class="in-map-tooltip" role="status" aria-live="polite" hidden></div>
                                    <div class="in-map-svg-wrap">
                                        <?php get_template_part( 'template-parts/indicadores-nacionales/mapa-mexico' ); ?>
                                    </div>
                                </div>

                                <div class="in-map-legend" aria-label="Simbología del resultado del indicador">
                                    <h4 class="sdsb color--neutro800 mb--12">Resultado del indicador (%)</h4>
                                    <ul class="in-map-legend__list">
                                        <li class="in-map-legend__item"><span class="in-map-legend__swatch in-map-level--5" aria-hidden="true"></span><span class="sdr color--neutro800">70 &ndash; 100</span></li>
                                        <li class="in-map-legend__item"><span class="in-map-legend__swatch in-map-level--4" aria-hidden="true"></span><span class="sdr color--neutro800">50 &ndash; 69.9</span></li>
                                        <li class="in-map-legend__item"><span class="in-map-legend__swatch in-map-level--3" aria-hidden="true"></span><span class="sdr color--neutro800">30 &ndash; 49.9</span></li>
                                        <li class="in-map-legend__item"><span class="in-map-legend__swatch in-map-level--2" aria-hidden="true"></span><span class="sdr color--neutro800">10 &ndash; 29.9</span></li>
                                        <li class="in-map-legend__item"><span class="in-map-legend__swatch in-map-level--1" aria-hidden="true"></span><span class="sdr color--neutro800">0 &ndash; 9.9</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="columna__12 columna__5--xl">
                            <div class="in-entidad-panel">

                                <div class="tx-comite-tabs-container tx-comite-tabs-container--underline mb--16 in-entidad-tabs-container">
                                    <ul class="ul--limpio tx-comite-tabs in-entidad-tabs" role="tablist" aria-label="Vista de resultados por entidad">
                                        <li role="presentation">
                                            <button type="button" class="tx-comite-tab in-entidad-tab is-active active" role="tab" aria-selected="true" data-entidad-view="detalle" tabindex="0">Detalle de entidad</button>
                                        </li>
                                        <li role="presentation">
                                            <button type="button" class="tx-comite-tab in-entidad-tab" role="tab" aria-selected="false" data-entidad-view="ranking" tabindex="-1">Ranking (32)</button>
                                        </li>
                                    </ul>
                                </div>

                                <div class="in-entidad-view" data-view="detalle">
                                    <div class="in-filter-bar in-filter-bar--full mb--16">
                                        <label for="<?php echo esc_attr( $pid ); ?>-entidad" class="b1sb color--neutro800 in-filter-bar__label mb--0">Entidad federativa</label>
                                        <div class="tx-select-wrap in-select-wrap in-select-wrap--entidad flex-grow">
                                            <select id="<?php echo esc_attr( $pid ); ?>-entidad" class="tx-comite-select tx-comite-filter-control js-in-entidad-select" aria-label="Seleccionar entidad federativa">
                                                <?php foreach ( $entidades as $slug => $nombre ) : ?>
                                                    <option value="<?php echo esc_attr( $slug ); ?>" <?php selected( $slug, $default ); ?>><?php echo esc_html( $nombre ); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <i class="snd__icono snd-chevron--down icono--20 color--neutro800 tx-select-chevron" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="in-entidad-summary mb--20">
                                        <h4 class="sh1b color--neutro800 mb--4 js-in-entidad-nombre"><?php echo esc_html( isset( $entidades[ $default ] ) ? $entidades[ $default ] : '' ); ?></h4>
                                        <p class="b1r mb--8">Resultado del Indicador <?php echo esc_html( $n ); ?></p>
                                        <div class="sh0b color--pguinda600 mb--0 in-res-card__num js-in-entidad-valor"><?php echo esc_html( isset( $def_data['total'] ) ? $def_data['total'] : '' ); ?>%</div>
                                    </div>

                                    <div class="in-entidad-bars" role="list" aria-label="Desglose por variable en la entidad seleccionada">
                                        <?php foreach ( $ind['variables'] as $i => $var ) : ?>
                                            <div class="in-bar-row" role="listitem">
                                                <span class="sdr color--neutro800 in-bar-row__label"><?php echo esc_html( $var['barra_label'] ); ?></span>
                                                <div class="in-bar-row__track" aria-hidden="true">
                                                    <div class="in-bar-row__fill js-in-bar-fill" style="width: <?php echo esc_attr( isset( $def_data['vars'][ $i ] ) ? $def_data['vars'][ $i ] : 0 ); ?>%;"></div>
                                                </div>
                                                <span class="sdsb color--neutro800 in-bar-row__val js-in-bar-val"><?php echo esc_html( isset( $def_data['vars'][ $i ] ) ? $def_data['vars'][ $i ] : 0 ); ?>%</span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="in-entidad-view" data-view="ranking" hidden>
                                    <div class="in-ranking" role="region" aria-label="Ranking de entidades federativas" tabindex="0">
                                        <table class="in-ranking__table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="sdsb">#</th>
                                                    <th scope="col" class="sdsb">Entidad federativa</th>
                                                    <th scope="col" class="sdsb in-ranking__num">Resultado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $pos = 0; foreach ( $ranking as $slug => $d ) : $pos++; ?>
                                                    <tr class="in-ranking__row" data-entidad="<?php echo esc_attr( $slug ); ?>" tabindex="0">
                                                        <td class="sdr"><?php echo esc_html( $pos ); ?></td>
                                                        <td class="b1r color--neutro800"><?php echo esc_html( isset( $entidades[ $slug ] ) ? $entidades[ $slug ] : '' ); ?></td>
                                                        <td class="b1sb color--neutro800 in-ranking__num"><?php echo esc_html( $d['total'] ); ?>%</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            <?php endif; ?>

            <!-- 6. Documentos del indicador -->
            <div class="cf-panel-card sise-panel-card mb--24">
                <div class="mb--20">
                    <h3 class="sh0b mb--4" style="color: var(--oe-color, <?php echo esc_attr( $ind['color'] ); ?>);">Documentos del indicador</h3>
                    <p class="b1r color--neutro700 mb--0">Consulta y descarga la información técnica y los datos utilizados para el cálculo del indicador.</p>
                </div>

                <div class="reticulaGrid__12 align-items-stretch">
                    <div class="columna__12 columna__6--lg">
                        <div class="in-doc-download-card">
                            <div class="in-doc-download-card__head">
                                <div class="tx-consulta-card__icon-wrap flex-none" aria-hidden="true">
                                    <i class="snd__icono snd-document icono--32 color--pguinda600" aria-hidden="true"></i>
                                </div>
                                <div class="in-doc-download-card__text flex-grow">
                                    <h4 class="sh1b color--neutro800 mb--4">Nota técnica</h4>
                                    <p class="sdr color--neutro600 mb--0">Metodología, variables, componentes y método de cálculo del indicador.</p>
                                </div>
                            </div>
                            <div class="in-doc-download-card__action">
                                <a href="<?php echo esc_url( $ind['documentos']['pdf_url'] ); ?>" 
                                   class="boton__secundario" 
                                   target="_blank" 
                                   rel="noopener"
                                   data-modal-target="#pdfViewerModal" 
                                   data-pdf-title="Nota técnica &ndash; Indicador <?php echo esc_attr( $n . ': ' . $ind['corto'] ); ?>" 
                                   data-pdf-url="<?php echo esc_url( $ind['documentos']['pdf_url'] ); ?>"
                                   title="Ver documento (Abre visor)"
                                   aria-label="Ver documento Nota técnica (Abre visor)">
                                    <i class="snd__icono snd-screen icono--16" aria-hidden="true"></i> Ver documento
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="columna__12 columna__6--lg">
                        <div class="in-doc-download-card">
                            <div class="in-doc-download-card__head">
                                <div class="tx-consulta-card__icon-wrap flex-none" aria-hidden="true">
                                    <i class="snd__icono snd-calculator icono--32 color--pguinda600" aria-hidden="true"></i>
                                </div>
                                <div class="in-doc-download-card__text flex-grow">
                                    <h4 class="sh1b color--neutro800 mb--4">Ficha de cálculo</h4>
                                    <p class="sdr color--neutro600 mb--0">Resultados y datos utilizados para el cálculo del indicador.</p>
                                </div>
                            </div>
                            <div class="in-doc-download-card__action">
                                <a href="<?php echo esc_url( $ind['documentos']['excel_url'] ); ?>" 
                                   class="boton__primario" 
                                   aria-label="Descargar base de datos (<?php echo esc_attr( $ind['documentos']['excel_peso'] ); ?>)"
                                   download>
                                    <i class="snd__icono snd-download icono--16" aria-hidden="true"></i> Descargar base de datos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
