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
            $item['tipo'] = get_post_meta($id, '_ct_tipo_sesion', true);
            $sesiones[] = $item;
        } else if ($tipo_doc === 'Resolución') {
            $item['numero'] = get_post_meta($id, '_ct_numero_res', true);
            $resoluciones[] = $item;
        }
    }
}
wp_reset_postdata();
?>

<div class="page-transparencia-comite front-page-bg pb-5">
    <!-- Migas de pan (Breadcrumb) -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/') ) ?>">
                        <i class="snd__icono snd-home icono--16" aria-hidden="true"></i> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/transparencia/') ) ?>">Transparencia</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Comité de Transparencia</li>
            </ol>
        </div>
    </nav>

    <!-- Contenedor Principal -->
    <div class="contenedor py-4">

        <!-- Títulos — SND Sección 3.4: h1b patria -->
        <div class="reticulaGrid__12 mb-4">
            <div class="columna__12">
                <h1 class="h1b patria tx-section-title mb-2 tx-comite-title">Comité de Transparencia</h1>
            </div>
        </div>

        <!-- Tabs — SND UI Kit (Tabs 2: 1562:4021 / 16460:3792) -->
        <div class="reticulaGrid__12 mb--32">
            <div class="columna__12">
                <div class="tx-comite-tabs-container">
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
            </div>
        </div>

        <div class="tx-comite-tab-content" id="comiteTabsContent">
            <!-- TAB: SESIONES -->
            <div class="tx-comite-tab-pane" id="sesiones-pane" role="tabpanel" aria-labelledby="sesiones-tab" tabindex="0">
                
                <!-- Filtros Sesiones -->
                <div class="reticulaGrid__12 mb--32 align-items-end">
                    <div class="columna__12 columna__6--md columna__3--lg">
                        <label for="filter-anio" class="b1sb dblock color--neutro800 mb--8">Año</label>
                        <div class="tx-select-wrap">
                            <select id="filter-anio" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php
                                $anios_sesiones = array_unique(array_column($sesiones, 'anio'));
                                rsort($anios_sesiones);
                                foreach($anios_sesiones as $a): ?>
                                    <option value="<?= esc_attr($a) ?>"><?= esc_html($a) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="columna__12 columna__6--md columna__4--lg">
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
                </div>

                <!-- Lista de Sesiones -->
                <div class="d-flex flex-column gap-3" id="sesiones-list-container">
                    <?php foreach ($sesiones as $sesion): ?>
                    <!-- Card Item -->
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3 tx-sesion-card" data-anio="<?= esc_attr($sesion['anio']) ?>" data-tipo="<?= esc_attr($sesion['tipo']) ?>">
                        <div class="card-body p-0 d-flex flex-column flex-md-row align-items-md-stretch">
                            
                            <!-- Date Column -->
                            <div class="tx-sesion-date text-center p-3 p-md-4 d-flex flex-column justify-content-center">
                                <div class="fw-bold fs-3 tx-sesion-date-year" style="color:#666;"><?= esc_html($sesion['anio']) ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="p-4 ps-md-4 flex-grow-1 d-flex flex-column justify-content-center">
                                <h3 class="h5b mb-2 tx-sesion-info-title"><?= esc_html($sesion['titulo']) ?></h3>
                                <p class="mb-0 font-noto-sans tx-sesion-info-type"><strong>Tipo:</strong> <?= esc_html($sesion['tipo']) ?></p>
                            </div>

                            <!-- Action Column -->
                            <div class="tx-sesion-action d-flex align-items-center justify-content-md-end p-4 gap-4 ms-md-auto">
                                <a href="javascript:void(0)" data-modal-target="#pdfViewerModal" data-pdf-url="<?= esc_url($sesion['enlace']) ?>" data-pdf-title="<?= esc_attr($sesion['titulo']) ?>" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link">
                                    <i class="snd__icono snd-document--pdf icono--24 tx-sesion-pdf-icon" aria-hidden="true"></i>
                                    <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Acta</div>
                                </a>
                                <a href="javascript:void(0)" data-modal-target="#pdfViewerModal" data-pdf-url="<?= esc_url($sesion['enlace']) ?>" data-pdf-title="<?= esc_attr($sesion['titulo']) ?>" class="tx-sesion-chevron-link text-decoration-none ms-2">
                                    <i class="snd__icono snd-chevron--right icono--20 tx-sesion-chevron-icon" aria-hidden="true" style="stroke-width: 2px;"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Ver más Sesiones -->
                <div class="text-center mt-5" id="sesiones-load-more-container">
                    <a href="javascript:void(0)" id="sesiones-btn-more" class="boton__fantasma">
                        Ver más sesiones <i class="snd__icono snd-chevron--down icono--16 ms-2" aria-hidden="true"></i>
                    </a>
                </div>

            </div>

            <!-- TAB: RESOLUCIONES -->
            <div class="tx-comite-tab-pane muestra--ninguno" id="resoluciones-pane" role="tabpanel" aria-labelledby="resoluciones-tab" tabindex="0">
                
                <!-- Filtros Resoluciones -->
                <div class="reticulaGrid__12 mb--32 align-items-end">
                    <div class="columna__12 columna__6--md columna__3--lg">
                        <label for="filter-anio-res" class="b1sb dblock color--neutro800 mb--8">Año</label>
                        <div class="tx-select-wrap">
                            <select id="filter-anio-res" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php
                                $anios_resoluciones = array_unique(array_column($resoluciones, 'anio'));
                                rsort($anios_resoluciones);
                                foreach($anios_resoluciones as $a): ?>
                                    <option value="<?= esc_attr($a) ?>"><?= esc_html($a) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="columna__12 columna__6--md columna__6--lg">
                        <label for="search-res" class="b1sb dblock color--neutro800 mb--8">Número de resolución</label>
                        <form class="search-container" role="search" id="form-search-res" action="javascript:void(0);">
                            <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
                                <input type="search" id="search-res" name="q" placeholder="Buscar resolución..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Lista de Resoluciones -->
                <div class="d-flex flex-column gap-3" id="resoluciones-list-container">
                    <?php foreach ($resoluciones as $res): ?>
                    <!-- Card Item -->
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3 tx-resolucion-card" data-anio="<?= esc_attr($res['anio']) ?>" data-titulo="<?= esc_attr(strtolower($res['titulo'])) ?>">
                        <div class="card-body p-0 d-flex flex-column flex-md-row align-items-md-stretch">
                            
                            <!-- Date Column -->
                            <div class="tx-sesion-date text-center p-3 p-md-4 d-flex flex-column justify-content-center">
                                <div class="fw-bold fs-3 tx-sesion-date-year" style="color:#666;"><?= esc_html($res['anio']) ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="p-4 ps-md-4 flex-grow-1 d-flex flex-column justify-content-center">
                                <h3 class="h5b mb-2 tx-sesion-info-title"><?= esc_html($res['titulo']) ?></h3>
                                <p class="mb-0 font-noto-sans tx-sesion-info-type"><strong>Número:</strong> <?= esc_html($res['numero']) ?></p>
                            </div>

                            <!-- Action Column -->
                            <div class="tx-sesion-action d-flex align-items-center justify-content-md-end p-4 gap-4 ms-md-auto">
                                <a href="javascript:void(0)" data-modal-target="#pdfViewerModal" data-pdf-url="<?= esc_url($res['enlace']) ?>" data-pdf-title="<?= esc_attr($res['titulo']) ?>" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link">
                                    <i class="snd__icono snd-document--pdf icono--24 tx-sesion-pdf-icon" aria-hidden="true"></i>
                                    <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Resolución</div>
                                </a>
                                <a href="javascript:void(0)" data-modal-target="#pdfViewerModal" data-pdf-url="<?= esc_url($res['enlace']) ?>" data-pdf-title="<?= esc_attr($res['titulo']) ?>" class="tx-sesion-chevron-link text-decoration-none ms-2">
                                    <i class="snd__icono snd-chevron--right icono--20 tx-sesion-chevron-icon" aria-hidden="true" style="stroke-width: 2px;"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Ver más Resoluciones -->
                <div class="text-center mt-5" id="resoluciones-load-more-container">
                    <a href="javascript:void(0)" id="resoluciones-btn-more" class="boton__fantasma">
                        Ver más resoluciones <i class="snd__icono snd-chevron--down icono--16 ms-2" aria-hidden="true"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

<style>
.tx-pdf-action-btn {
    color: var(--color-burgundi);
    border: 1px solid var(--color-burgundi);
    border-radius: 8px;
    background-color: transparent;
    transition: all 0.2s ease-in-out;
}
.tx-pdf-action-btn:hover {
    background-color: var(--color-burgundi);
    color: #ffffff;
</style>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // Logic for filtering and pagination (Sesiones)
    const filterAnioSesion = document.getElementById('filter-anio');
    const filterTipoSesion = document.getElementById('filter-tipo');
    const sesionesCards = Array.from(document.querySelectorAll('.tx-sesion-card'));
    const btnMoreSesiones = document.getElementById('sesiones-btn-more');
    const sesionesLoadMoreContainer = document.getElementById('sesiones-load-more-container');
    let sesionesVisibleLimit = 5;

    function applySesionesFilters() {
        const anio = filterAnioSesion.value;
        const tipo = filterTipoSesion.value;
        
        let visibleCount = 0;
        let totalMatched = 0;

        sesionesCards.forEach(card => {
            const cardAnio = card.getAttribute('data-anio');
            const cardTipo = card.getAttribute('data-tipo');
            
            const matchAnio = anio === 'Todos' || cardAnio === anio;
            const matchTipo = tipo === 'Todas' || cardTipo === tipo;

            if (matchAnio && matchTipo) {
                if (totalMatched < sesionesVisibleLimit) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
                totalMatched++;
            } else {
                card.style.display = 'none';
            }
        });

        if (totalMatched > sesionesVisibleLimit) {
            sesionesLoadMoreContainer.style.display = 'block';
        } else {
            sesionesLoadMoreContainer.style.display = 'none';
        }
    }

    if(filterAnioSesion) filterAnioSesion.addEventListener('change', () => { sesionesVisibleLimit = 5; applySesionesFilters(); });
    if(filterTipoSesion) filterTipoSesion.addEventListener('change', () => { sesionesVisibleLimit = 5; applySesionesFilters(); });
    
    if(btnMoreSesiones) {
        btnMoreSesiones.addEventListener('click', function(e) {
            e.preventDefault();
            sesionesVisibleLimit += 5;
            applySesionesFilters();
        });
    }
    
    // Logic for filtering and pagination (Resoluciones)
    const filterAnioRes = document.getElementById('filter-anio-res');
    const searchRes = document.getElementById('search-res');
    const formSearchRes = document.getElementById('form-search-res');
    const searchResBox = searchRes ? searchRes.closest('.tx-comite-search-box') : null;
    const resCards = Array.from(document.querySelectorAll('.tx-resolucion-card'));
    const btnMoreRes = document.getElementById('resoluciones-btn-more');
    const resLoadMoreContainer = document.getElementById('resoluciones-load-more-container');
    let resVisibleLimit = 5;

    function applyResFilters() {
        const anio = filterAnioRes.value;
        const query = searchRes.value.toLowerCase().trim();
        if (searchResBox) {
            searchResBox.classList.toggle('is-filled', query.length > 0);
        }
        
        let visibleCount = 0;
        let totalMatched = 0;

        resCards.forEach(card => {
            const cardAnio = card.getAttribute('data-anio');
            const cardTitulo = card.getAttribute('data-titulo');
            
            const matchAnio = anio === 'Todos' || cardAnio === anio;
            const matchQuery = query === '' || cardTitulo.includes(query);

            if (matchAnio && matchQuery) {
                if (totalMatched < resVisibleLimit) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
                totalMatched++;
            } else {
                card.style.display = 'none';
            }
        });

        if (totalMatched > resVisibleLimit) {
            resLoadMoreContainer.style.display = 'block';
        } else {
            resLoadMoreContainer.style.display = 'none';
        }
    }

    if(filterAnioRes) filterAnioRes.addEventListener('change', () => { resVisibleLimit = 5; applyResFilters(); });
    if(searchRes) {
        searchRes.addEventListener('input', () => { resVisibleLimit = 5; applyResFilters(); });
        searchRes.addEventListener('search', () => { resVisibleLimit = 5; applyResFilters(); });
    }
    if(formSearchRes) {
        formSearchRes.addEventListener('submit', (e) => {
            e.preventDefault();
            resVisibleLimit = 5;
            applyResFilters();
        });
    }
    
    if(btnMoreRes) {
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
