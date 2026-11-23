<?php
/**
 * Template Name: Transparencia - Comite de transparencia
 */

get_header();

$sesiones = [];
$resoluciones = [];

$args = array(
    'post_type'      => 'comite_transparencia',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_key'       => '_ct_anio',
    'orderby'        => 'meta_value_num',
    'order'          => 'DESC',
    'no_found_rows'  => true,
    'update_post_term_cache' => false,
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $id = get_the_ID();
        $tipo_doc = get_post_meta($id, '_ct_tipo_doc', true);
        
        $item = [
            'titulo' => get_the_title(),
            'anio'   => get_post_meta($id, '_ct_anio', true),
            'enlace' => sesna_resolve_archivo_url(get_post_meta($id, '_ct_archivo_url', true))
        ];

        if ($tipo_doc === 'Acta') {
            $tipo_sesion = trim((string) get_post_meta($id, '_ct_tipo_sesion', true));
            if ($tipo_sesion === '') {
                if (stripos($item['titulo'], 'extraordinaria') !== false || stripos($item['titulo'], '-EXT') !== false) {
                    $tipo_sesion = 'Extraordinaria';
                } else {
                    $tipo_sesion = 'Ordinaria';
                }
            }
            $item['tipo'] = $tipo_sesion;
            $sesiones[] = $item;
        } else if ($tipo_doc === 'Resolución') {
            $numero_res  = trim((string) get_post_meta($id, '_ct_numero_res', true));
            $tipo_sesion = trim((string) get_post_meta($id, '_ct_tipo_sesion', true));
            if ($tipo_sesion === '') {
                if (stripos($item['titulo'], 'extraordinaria') !== false || stripos($item['titulo'], '-EXT') !== false) {
                    $tipo_sesion = 'Extraordinaria';
                } elseif (stripos($item['titulo'], 'ordinaria') !== false || stripos($item['titulo'], '-ORD') !== false) {
                    $tipo_sesion = 'Ordinaria';
                }
            }
            $folio_extraido = '';
            if ($numero_res === '' && preg_match('/(CT-[A-Z0-9\-\/]+)/i', $item['titulo'], $matches)) {
                $folio_extraido = strtoupper($matches[1]);
            }
            $item['numero'] = $numero_res;
            $item['folio']  = $folio_extraido;
            $item['tipo']   = $tipo_sesion;
            $resoluciones[] = $item;
        }
    }
}
wp_reset_postdata();
?>

<div class="page-transparencia-comite front-page-bg pb--40">
    <!-- Breadcrumb -->
    <?php get_template_part( 'template-parts/ui/breadcrumb', null, array(
        'items' => array(
            array( 'label' => 'Transparencia', 'url' => home_url('/transparencia/') ),
            array( 'label' => 'Comité de Transparencia' ),
        ),
    ) ); ?>

    <!-- Hero -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Comité de Transparencia</h1>
                    <p class="sh1r mb--0">Consulta las actas de sesión y resoluciones emitidas por el Comité de Transparencia de la SESNA.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenedor Principal -->
    <div class="contenedor">

        <div class="tx-comite-panel">
            <!-- Tabs — SND UI Kit (Tabs 01 / State: 618:2598 / 1562:3995 / 16460:870) integradas en el panel padre -->
            <div class="tx-comite-tabs-container tx-comite-tabs-container--underline mb--24">
                <ul class="ul--limpio tx-comite-tabs" id="comiteTabs" role="tablist">
                    <li role="presentation">
                        <button class="tx-comite-tab" id="sesiones-tab" data-tab-target="#sesiones-pane" type="button" role="tab" aria-controls="sesiones-pane" aria-selected="true">
                            Actas
                        </button>
                    </li>
                    <li role="presentation">
                        <button class="tx-comite-tab" id="resoluciones-tab" data-tab-target="#resoluciones-pane" type="button" role="tab" aria-controls="resoluciones-pane" aria-selected="false">
                            Resoluciones
                        </button>
                    </li>
                </ul>
            </div>

            <div class="tx-comite-tab-content" id="comiteTabsContent">
                <!-- TAB: SESIONES -->
                <div class="tx-comite-tab-pane" id="sesiones-pane" role="tabpanel" aria-labelledby="sesiones-tab" tabindex="0">

                    <!-- Encabezado y Contador (Atomo/Count & actions — 22373:36067) -->
                    <div class="tx-comite-panel__header mb--24">
                        <div>
                            <h2 class="sh0b color--neutro800 mb--4">Actas de sesión del Comité</h2>
                            <p class="b1r color--neutro600 mb--0" id="sesiones-count-status" aria-live="polite">
                                Mostrando <?= min(5, count($sesiones)) ?> de <?= count($sesiones) ?> actas
                            </p>
                        </div>
                        <button type="button" id="sesiones-btn-reset" class="boton__fantasma tx-comite-reset-btn muestra--ninguno">
                            <?= sesna_render_snd_svg_icon('snd-close', 'icono--20') ?>
                            Limpiar filtros
                        </button>
                    </div>

                    <!-- Filtros Sesiones (Panel de filtros 4.11 + Barra de búsqueda 4.1) -->
                    <div class="reticulaGrid__12 mb--32 align-items-end">
                        <div class="columna__12 columna__6--md columna__3--lg">
                            <label for="filter-anio" class="b1sb dblock color--neutro800 mb--8">Año</label>
                            <div class="tx-select-wrap">
                                <select id="filter-anio" class="tx-comite-select tx-comite-filter-control">
                                    <option value="Todos">Todos</option>
                                    <?php
                                    $anios_sesiones = array_unique(array_filter(array_column($sesiones, 'anio')));
                                    rsort($anios_sesiones);
                                    foreach($anios_sesiones as $a): ?>
                                        <option value="<?= esc_attr($a) ?>"><?= esc_html($a) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20 tx-select-chevron') ?>
                            </div>
                        </div>
                        <div class="columna__12 columna__6--md columna__3--lg">
                            <label for="filter-tipo" class="b1sb dblock color--neutro800 mb--8">Tipo de sesión</label>
                            <div class="tx-select-wrap">
                                <select id="filter-tipo" class="tx-comite-select tx-comite-filter-control">
                                    <option value="Todas">Todas</option>
                                    <option value="Ordinaria">Ordinaria</option>
                                    <option value="Extraordinaria">Extraordinaria</option>
                                </select>
                                <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20 tx-select-chevron') ?>
                            </div>
                        </div>
                        <div class="columna__12 columna__12--md columna__6--lg">
                            <label for="search-sesion" class="b1sb dblock color--neutro800 mb--8">Buscar acta</label>
                            <form class="search-container" role="search" id="form-search-sesion" action="javascript:void(0);">
                                <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                    <?= sesna_render_snd_svg_icon('snd-search', 'search-icon icono--24') ?>
                                    <input type="search" id="search-sesion" name="q" placeholder="Buscar por nombre o número de sesión..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Lista de Sesiones -->
                    <div class="tx-comite-card-list" id="sesiones-list-container">
                        <?php foreach ($sesiones as $s_idx => $sesion): ?>
                        <!-- Card — SND UI Kit (Cards *: 12022:57247 / 37597:51336) -->
                        <div class="tx-comite-card tx-sesion-card" data-anio="<?= esc_attr($sesion['anio']) ?>" data-tipo="<?= esc_attr($sesion['tipo']) ?>" data-titulo="<?= esc_attr( function_exists('mb_strtolower') ? mb_strtolower($sesion['titulo'], 'UTF-8') : strtolower($sesion['titulo']) ) ?>"<?= $s_idx >= 5 ? ' style="display:none;"' : '' ?>>

                            <!-- Date Column -->
                            <div class="tx-comite-card-date">
                                <div class="sh0b color--neutro600 mb--0 tx-comite-card-year"><?= esc_html($sesion['anio']) ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="tx-comite-card-info">
                                <h3 class="sh1b color--neutro800 mb--8 tx-comite-card-title"><?= esc_html($sesion['titulo']) ?></h3>
                                <p class="b1r color--neutro700 mb--0 tx-comite-card-subtitle"><span class="b1sb color--neutro800">Tipo:</span> <?= esc_html($sesion['tipo']) ?></p>
                            </div>

                            <!-- Action Column — Botón Fantasma Horizontal (4.2 Botones) -->
                            <div class="tx-comite-card-action">
                                <button type="button" class="boton__fantasma" data-modal-target="#pdfViewerModal" data-pdf-url="<?= esc_url($sesion['enlace']) ?>" data-pdf-title="<?= esc_attr($sesion['titulo']) ?>">
                                    <?= sesna_render_snd_svg_icon('snd-document--pdf', 'icono--24') ?>
                                    Acta
                                    <?= sesna_render_snd_svg_icon('snd-chevron--right', 'icono--20') ?>
                                </button>
                            </div>

                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Estado vacío Sesiones — Mensajes informativos SND v1.0.0 (Informativo) -->
                    <div role="status">
                        <div id="sesiones-empty-state" class="mensajeInformativo mensajeInformativo--informativo mt--16 muestra--ninguno" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="sesiones-empty-state">
                            No se encontraron actas que coincidan con los filtros seleccionados.
                        </div>
                    </div>

                    <!-- Ver más Sesiones -->
                    <div class="texto--centro mt--32" id="sesiones-load-more-container">
                        <button type="button" id="sesiones-btn-more" class="boton__fantasma">
                            Ver más sesiones <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20') ?>
                        </button>
                    </div>

                </div>

                <!-- TAB: RESOLUCIONES -->
                <div class="tx-comite-tab-pane muestra--ninguno" id="resoluciones-pane" role="tabpanel" aria-labelledby="resoluciones-tab" tabindex="0">

                    <!-- Encabezado y Contador (Atomo/Count & actions — 22373:36067) -->
                    <div class="tx-comite-panel__header mb--24">
                        <div>
                            <h2 class="sh0b color--neutro800 mb--4">Resoluciones del Comité</h2>
                            <p class="b1r color--neutro600 mb--0" id="resoluciones-count-status" aria-live="polite">
                                Mostrando <?= min(5, count($resoluciones)) ?> de <?= count($resoluciones) ?> resoluciones
                            </p>
                        </div>
                        <button type="button" id="resoluciones-btn-reset" class="boton__fantasma tx-comite-reset-btn muestra--ninguno">
                            <?= sesna_render_snd_svg_icon('snd-close', 'icono--20') ?>
                            Limpiar filtros
                        </button>
                    </div>

                    <!-- Filtros Resoluciones (Panel de filtros 4.11 + Barra de búsqueda 4.1) -->
                    <div class="reticulaGrid__12 mb--32 align-items-end">
                        <div class="columna__12 columna__6--md columna__3--lg">
                            <label for="filter-anio-res" class="b1sb dblock color--neutro800 mb--8">Año</label>
                            <div class="tx-select-wrap">
                                <select id="filter-anio-res" class="tx-comite-select tx-comite-filter-control">
                                    <option value="Todos">Todos</option>
                                    <?php
                                    $anios_resoluciones = array_unique(array_filter(array_column($resoluciones, 'anio')));
                                    rsort($anios_resoluciones);
                                    foreach($anios_resoluciones as $a): ?>
                                        <option value="<?= esc_attr($a) ?>"><?= esc_html($a) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20 tx-select-chevron') ?>
                            </div>
                        </div>
                        <div class="columna__12 columna__6--md columna__3--lg">
                            <label for="filter-tipo-res" class="b1sb dblock color--neutro800 mb--8">Tipo de sesión</label>
                            <div class="tx-select-wrap">
                                <select id="filter-tipo-res" class="tx-comite-select tx-comite-filter-control">
                                    <option value="Todas">Todas</option>
                                    <option value="Ordinaria">Ordinaria</option>
                                    <option value="Extraordinaria">Extraordinaria</option>
                                </select>
                                <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20 tx-select-chevron') ?>
                            </div>
                        </div>
                        <div class="columna__12 columna__12--md columna__6--lg">
                            <label for="search-res" class="b1sb dblock color--neutro800 mb--8">Número o clave de resolución</label>
                            <form class="search-container" role="search" id="form-search-res" action="javascript:void(0);">
                                <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                    <?= sesna_render_snd_svg_icon('snd-search', 'search-icon icono--24') ?>
                                    <input type="search" id="search-res" name="q" placeholder="Buscar resolución..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Lista de Resoluciones -->
                    <div class="tx-comite-card-list" id="resoluciones-list-container">
                        <?php foreach ($resoluciones as $r_idx => $res):
                            $busqueda_res = trim($res['titulo'] . ' ' . $res['numero'] . ' ' . $res['folio']);
                            $meta_parts = [];
                            if (!empty($res['tipo'])) {
                                $meta_parts[] = '<span class="b1sb color--neutro800">Tipo:</span> ' . esc_html($res['tipo']);
                            }
                            if (!empty($res['numero'])) {
                                $meta_parts[] = '<span class="b1sb color--neutro800">Número:</span> ' . esc_html($res['numero']);
                            } elseif (!empty($res['folio'])) {
                                $meta_parts[] = '<span class="b1sb color--neutro800">Clave:</span> ' . esc_html($res['folio']);
                            }
                        ?>
                        <!-- Card — SND UI Kit (Cards *: 12022:57247 / 37597:51336) -->
                        <div class="tx-comite-card tx-resolucion-card" data-anio="<?= esc_attr($res['anio']) ?>" data-tipo="<?= esc_attr($res['tipo']) ?>" data-titulo="<?= esc_attr( function_exists('mb_strtolower') ? mb_strtolower($busqueda_res, 'UTF-8') : strtolower($busqueda_res) ) ?>"<?= $r_idx >= 5 ? ' style="display:none;"' : '' ?>>

                            <!-- Date Column -->
                            <div class="tx-comite-card-date">
                                <div class="sh0b color--neutro600 mb--0 tx-comite-card-year"><?= esc_html($res['anio']) ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="tx-comite-card-info">
                                <h3 class="sh1b color--neutro800 mb--8 tx-comite-card-title"><?= esc_html($res['titulo']) ?></h3>
                                <?php if (!empty($meta_parts)): ?>
                                    <p class="b1r color--neutro700 mb--0 tx-comite-card-subtitle"><?= implode(' &nbsp;|&nbsp; ', $meta_parts) ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Action Column — Botón Fantasma Horizontal (4.2 Botones) -->
                            <div class="tx-comite-card-action">
                                <button type="button" class="boton__fantasma" data-modal-target="#pdfViewerModal" data-pdf-url="<?= esc_url($res['enlace']) ?>" data-pdf-title="<?= esc_attr($res['titulo']) ?>">
                                    <?= sesna_render_snd_svg_icon('snd-document--pdf', 'icono--24') ?>
                                    Resolución
                                    <?= sesna_render_snd_svg_icon('snd-chevron--right', 'icono--20') ?>
                                </button>
                            </div>

                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Estado vacío Resoluciones — Mensajes informativos SND v1.0.0 (Informativo) -->
                    <div role="status">
                        <div id="resoluciones-empty-state" class="mensajeInformativo mensajeInformativo--informativo mt--16 muestra--ninguno" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="resoluciones-empty-state">
                            No se encontraron resoluciones que coincidan con los filtros seleccionados.
                        </div>
                    </div>

                    <!-- Ver más Resoluciones -->
                    <div class="texto--centro mt--32" id="resoluciones-load-more-container">
                        <button type="button" id="resoluciones-btn-more" class="boton__fantasma">
                            Ver más resoluciones <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20') ?>
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<?php get_footer(); ?>
