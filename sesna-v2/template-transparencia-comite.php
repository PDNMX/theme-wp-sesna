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
    'order'          => 'DESC'
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
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?= esc_url( home_url('/') ) ?>" class="ruta__a"><i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="ruta__li">
                    <a href="<?= esc_url( home_url('/transparencia/') ) ?>" class="ruta__a">Transparencia</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Comité de Transparencia</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Comité de Transparencia</h1>
                    <p class="sh1r color--neutro600 mb--0">Consulta las actas de sesión y resoluciones emitidas por el Comité de Transparencia de la SESNA.</p>
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
                            <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
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
                                <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
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
                                <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="columna__12 columna__12--md columna__6--lg">
                            <label for="search-sesion" class="b1sb dblock color--neutro800 mb--8">Buscar acta</label>
                            <form class="search-container" role="search" id="form-search-sesion" action="javascript:void(0);">
                                <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                    <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
                                    <input type="search" id="search-sesion" name="q" placeholder="Buscar por nombre o número de sesión..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Lista de Sesiones -->
                    <div class="tx-comite-card-list" id="sesiones-list-container">
                        <?php foreach ($sesiones as $sesion): ?>
                        <!-- Card — SND UI Kit (Cards *: 12022:57247 / 37597:51336) -->
                        <div class="tx-comite-card tx-sesion-card" data-anio="<?= esc_attr($sesion['anio']) ?>" data-tipo="<?= esc_attr($sesion['tipo']) ?>" data-titulo="<?= esc_attr( function_exists('mb_strtolower') ? mb_strtolower($sesion['titulo'], 'UTF-8') : strtolower($sesion['titulo']) ) ?>">

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
                                    <i class="snd__icono snd-document--pdf icono--24" aria-hidden="true"></i>
                                    Acta
                                    <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                                </button>
                            </div>

                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Estado vacío Sesiones — 4.16 Mensajes informativos (Informativo) -->
                    <div class="aviso aviso--info mt--16 muestra--ninguno" id="sesiones-empty-state" role="status" aria-live="polite">
                        <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
                        <div class="aviso__cont">
                            <div class="aviso__txt">
                                <p class="b1r color--azul500 mb--0">No se encontraron actas que coincidan con los filtros seleccionados.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Ver más Sesiones -->
                    <div class="texto--centro mt--32" id="sesiones-load-more-container">
                        <button type="button" id="sesiones-btn-more" class="boton__fantasma">
                            Ver más sesiones <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
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
                            <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
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
                                <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
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
                                <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="columna__12 columna__12--md columna__6--lg">
                            <label for="search-res" class="b1sb dblock color--neutro800 mb--8">Número o clave de resolución</label>
                            <form class="search-container" role="search" id="form-search-res" action="javascript:void(0);">
                                <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                    <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
                                    <input type="search" id="search-res" name="q" placeholder="Buscar resolución..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Lista de Resoluciones -->
                    <div class="tx-comite-card-list" id="resoluciones-list-container">
                        <?php foreach ($resoluciones as $res):
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
                        <div class="tx-comite-card tx-resolucion-card" data-anio="<?= esc_attr($res['anio']) ?>" data-tipo="<?= esc_attr($res['tipo']) ?>" data-titulo="<?= esc_attr( function_exists('mb_strtolower') ? mb_strtolower($busqueda_res, 'UTF-8') : strtolower($busqueda_res) ) ?>">

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
                                    <i class="snd__icono snd-document--pdf icono--24" aria-hidden="true"></i>
                                    Resolución
                                    <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                                </button>
                            </div>

                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Estado vacío Resoluciones — 4.16 Mensajes informativos (Informativo) -->
                    <div class="aviso aviso--info mt--16 muestra--ninguno" id="resoluciones-empty-state" role="status" aria-live="polite">
                        <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
                        <div class="aviso__cont">
                            <div class="aviso__txt">
                                <p class="b1r color--azul500 mb--0">No se encontraron resoluciones que coincidan con los filtros seleccionados.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Ver más Resoluciones -->
                    <div class="texto--centro mt--32" id="resoluciones-load-more-container">
                        <button type="button" id="resoluciones-btn-more" class="boton__fantasma">
                            Ver más resoluciones <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // Logic for filtering, counter and pagination (Sesiones)
    const filterAnioSesion = document.getElementById('filter-anio');
    const filterTipoSesion = document.getElementById('filter-tipo');
    const searchSesion = document.getElementById('search-sesion');
    const formSearchSesion = document.getElementById('form-search-sesion');
    const searchSesionBox = searchSesion ? searchSesion.closest('.tx-comite-search-box') : null;
    const sesionesCards = Array.from(document.querySelectorAll('.tx-sesion-card'));
    const sesionesCountStatus = document.getElementById('sesiones-count-status');
    const sesionesEmptyState = document.getElementById('sesiones-empty-state');
    const btnResetSesiones = document.getElementById('sesiones-btn-reset');
    const btnMoreSesiones = document.getElementById('sesiones-btn-more');
    const sesionesLoadMoreContainer = document.getElementById('sesiones-load-more-container');
    let sesionesVisibleLimit = 5;

    function applySesionesFilters() {
        const anio = filterAnioSesion ? filterAnioSesion.value : 'Todos';
        const tipo = filterTipoSesion ? filterTipoSesion.value : 'Todas';
        const query = searchSesion ? searchSesion.value.toLowerCase().trim() : '';

        if (searchSesionBox) {
            searchSesionBox.classList.toggle('is-filled', query.length > 0);
        }

        let visibleCount = 0;
        let totalMatched = 0;

        sesionesCards.forEach(card => {
            const cardAnio = card.getAttribute('data-anio') || '';
            const cardTipo = card.getAttribute('data-tipo') || '';
            const cardTitulo = card.getAttribute('data-titulo') || '';

            const matchAnio = anio === 'Todos' || cardAnio === anio;
            const matchTipo = tipo === 'Todas' || cardTipo.toLowerCase() === tipo.toLowerCase();
            const matchQuery = query === '' || cardTitulo.includes(query);

            if (matchAnio && matchTipo && matchQuery) {
                if (totalMatched < sesionesVisibleLimit) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
                totalMatched++;
            } else {
                card.style.display = 'none';
            }
        });

        if (sesionesCountStatus) {
            sesionesCountStatus.textContent = totalMatched === 0
                ? '0 actas encontradas'
                : 'Mostrando ' + visibleCount + ' de ' + totalMatched + ' ' + (totalMatched === 1 ? 'acta' : 'actas');
        }

        if (sesionesEmptyState) {
            sesionesEmptyState.classList.toggle('muestra--ninguno', totalMatched > 0);
        }

        if (btnResetSesiones) {
            const hasActiveFilter = anio !== 'Todos' || tipo !== 'Todas' || query !== '';
            btnResetSesiones.classList.toggle('muestra--ninguno', !hasActiveFilter);
        }

        if (sesionesLoadMoreContainer) {
            sesionesLoadMoreContainer.style.display = totalMatched > sesionesVisibleLimit ? 'block' : 'none';
        }
    }

    if (filterAnioSesion) filterAnioSesion.addEventListener('change', () => { sesionesVisibleLimit = 5; applySesionesFilters(); });
    if (filterTipoSesion) filterTipoSesion.addEventListener('change', () => { sesionesVisibleLimit = 5; applySesionesFilters(); });
    if (searchSesion) {
        searchSesion.addEventListener('input', () => { sesionesVisibleLimit = 5; applySesionesFilters(); });
        searchSesion.addEventListener('search', () => { sesionesVisibleLimit = 5; applySesionesFilters(); });
    }
    if (formSearchSesion) {
        formSearchSesion.addEventListener('submit', (e) => {
            e.preventDefault();
            sesionesVisibleLimit = 5;
            applySesionesFilters();
        });
    }
    if (btnResetSesiones) {
        btnResetSesiones.addEventListener('click', () => {
            if (filterAnioSesion) filterAnioSesion.value = 'Todos';
            if (filterTipoSesion) filterTipoSesion.value = 'Todas';
            if (searchSesion) searchSesion.value = '';
            sesionesVisibleLimit = 5;
            applySesionesFilters();
        });
    }
    if (btnMoreSesiones) {
        btnMoreSesiones.addEventListener('click', function(e) {
            e.preventDefault();
            sesionesVisibleLimit += 5;
            applySesionesFilters();
        });
    }

    // Logic for filtering, counter and pagination (Resoluciones)
    const filterAnioRes = document.getElementById('filter-anio-res');
    const filterTipoRes = document.getElementById('filter-tipo-res');
    const searchRes = document.getElementById('search-res');
    const formSearchRes = document.getElementById('form-search-res');
    const searchResBox = searchRes ? searchRes.closest('.tx-comite-search-box') : null;
    const resCards = Array.from(document.querySelectorAll('.tx-resolucion-card'));
    const resCountStatus = document.getElementById('resoluciones-count-status');
    const resEmptyState = document.getElementById('resoluciones-empty-state');
    const btnResetRes = document.getElementById('resoluciones-btn-reset');
    const btnMoreRes = document.getElementById('resoluciones-btn-more');
    const resLoadMoreContainer = document.getElementById('resoluciones-load-more-container');
    let resVisibleLimit = 5;

    function applyResFilters() {
        const anio = filterAnioRes ? filterAnioRes.value : 'Todos';
        const tipo = filterTipoRes ? filterTipoRes.value : 'Todas';
        const query = searchRes ? searchRes.value.toLowerCase().trim() : '';

        if (searchResBox) {
            searchResBox.classList.toggle('is-filled', query.length > 0);
        }

        let visibleCount = 0;
        let totalMatched = 0;

        resCards.forEach(card => {
            const cardAnio = card.getAttribute('data-anio') || '';
            const cardTipo = card.getAttribute('data-tipo') || '';
            const cardTitulo = card.getAttribute('data-titulo') || '';

            const matchAnio = anio === 'Todos' || cardAnio === anio;
            const matchTipo = tipo === 'Todas' || cardTipo.toLowerCase() === tipo.toLowerCase();
            const matchQuery = query === '' || cardTitulo.includes(query);

            if (matchAnio && matchTipo && matchQuery) {
                if (totalMatched < resVisibleLimit) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
                totalMatched++;
            } else {
                card.style.display = 'none';
            }
        });

        if (resCountStatus) {
            resCountStatus.textContent = totalMatched === 0
                ? '0 resoluciones encontradas'
                : 'Mostrando ' + visibleCount + ' de ' + totalMatched + ' ' + (totalMatched === 1 ? 'resolución' : 'resoluciones');
        }

        if (resEmptyState) {
            resEmptyState.classList.toggle('muestra--ninguno', totalMatched > 0);
        }

        if (btnResetRes) {
            const hasActiveFilter = anio !== 'Todos' || tipo !== 'Todas' || query !== '';
            btnResetRes.classList.toggle('muestra--ninguno', !hasActiveFilter);
        }

        if (resLoadMoreContainer) {
            resLoadMoreContainer.style.display = totalMatched > resVisibleLimit ? 'block' : 'none';
        }
    }

    if (filterAnioRes) filterAnioRes.addEventListener('change', () => { resVisibleLimit = 5; applyResFilters(); });
    if (filterTipoRes) filterTipoRes.addEventListener('change', () => { resVisibleLimit = 5; applyResFilters(); });
    if (searchRes) {
        searchRes.addEventListener('input', () => { resVisibleLimit = 5; applyResFilters(); });
        searchRes.addEventListener('search', () => { resVisibleLimit = 5; applyResFilters(); });
    }
    if (formSearchRes) {
        formSearchRes.addEventListener('submit', (e) => {
            e.preventDefault();
            resVisibleLimit = 5;
            applyResFilters();
        });
    }
    if (btnResetRes) {
        btnResetRes.addEventListener('click', () => {
            if (filterAnioRes) filterAnioRes.value = 'Todos';
            if (filterTipoRes) filterTipoRes.value = 'Todas';
            if (searchRes) searchRes.value = '';
            resVisibleLimit = 5;
            applyResFilters();
        });
    }
    if (btnMoreRes) {
        btnMoreRes.addEventListener('click', function(e) {
            e.preventDefault();
            resVisibleLimit += 5;
            applyResFilters();
        });
    }

    // Controlador nativo de pestañas SND v1.1.0 (Tabs 2)
    var comiteTabs = Array.from(document.querySelectorAll('#comiteTabs [role="tab"]'));
    function activateComiteTab(tab) {
        var targetId = tab.getAttribute('data-tab-target');
        if (!targetId) return;

        comiteTabs.forEach(function(t) {
            t.setAttribute('aria-selected', 'false');
        });
        tab.setAttribute('aria-selected', 'true');

        document.querySelectorAll('#comiteTabsContent [role="tabpanel"]').forEach(function(pane) {
            pane.classList.add('muestra--ninguno');
        });
        var targetPane = document.querySelector(targetId);
        if (targetPane) {
            targetPane.classList.remove('muestra--ninguno');
        }
    }

    comiteTabs.forEach(function(tab, idx) {
        tab.addEventListener('click', function() {
            activateComiteTab(tab);
        });
        tab.addEventListener('keydown', function(e) {
            var nextIdx = null;
            if (e.key === 'ArrowRight') nextIdx = (idx + 1) % comiteTabs.length;
            else if (e.key === 'ArrowLeft') nextIdx = (idx - 1 + comiteTabs.length) % comiteTabs.length;
            if (nextIdx !== null) {
                e.preventDefault();
                comiteTabs[nextIdx].focus();
                activateComiteTab(comiteTabs[nextIdx]);
            }
        });
    });

    // Initial load
    applySesionesFilters();
    applyResFilters();
});
</script>

<?php get_footer(); ?>
