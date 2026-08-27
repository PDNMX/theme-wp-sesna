<?php
/**
 * Template Name: Órganos Colegiados y Normativa
 */

get_header();

$oc_stats_comite   = sesna_get_oc_stats('comite');
$oc_stats_comision = sesna_get_oc_stats('comision');
$oc_stats_organo   = sesna_get_oc_stats('organo_gobierno');

$oc_sesiones_comite   = sesna_get_oc_entries('comite');
$oc_sesiones_comision = sesna_get_oc_entries('comision');
$oc_sesiones_organo   = sesna_get_oc_entries('organo_gobierno');
$oc_recomendaciones   = sesna_get_oc_entries('recomendaciones');
$oc_exhortos          = sesna_get_oc_entries('exhortos');

$oc_anios_comite   = array_values(array_unique(array_filter(array_column($oc_sesiones_comite, 'anio'))));
$oc_anios_comision = array_values(array_unique(array_filter(array_column($oc_sesiones_comision, 'anio'))));
$oc_anios_organo   = array_values(array_unique(array_filter(array_column($oc_sesiones_organo, 'anio'))));
rsort($oc_anios_comite);
rsort($oc_anios_comision);
rsort($oc_anios_organo);
?>

<div class="page-organos-colegiados front-page-bg pb-5">

    <!-- Migas de pan (Breadcrumb) -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/') ) ?>">
                        <i class="bi bi-house-door"></i> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/acciones-y-programas/') ) ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Órganos Colegiados y Normativa</li>
            </ol>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="sesna-page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8 position-relative z-1 mb-4 mb-lg-0">
                    <h1 class="sesna-hero__title">Órganos Colegiados</h1>
                    <div class="hero-separator"></div>
                    <p class="sesna-hero__subtitle">
                        Información de los diversos órganos colegiados en los que participa la SESNA: Comité Coordinador, Órgano de Gobierno y Comisión Ejecutiva.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="container py-5">
        <div class="row">
            
            <!-- SIDEBAR -->
            <aside class="col-12 col-lg-3 mb-5 mb-lg-0 pe-lg-4">
                <!-- Órganos Colegiados Nav -->
                <h2 class="h6 fw-bold font-noto-sans mb-3 text-uppercase" style="color: var(--color-burgundi); letter-spacing: 0.5px;">ÓRGANOS COLEGIADOS</h2>
                <div class="ocn-sidebar-nav mb-5" id="sidebar-nav-colegiados">
                    <a href="#" data-target="comite" class="ocn-sidebar-link js-tab-link active d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans">Comité Coordinador</span>
                        <i class="bi bi-chevron-right fw-bold"></i>
                    </a>
                    <a href="#" data-target="comision" class="ocn-sidebar-link js-tab-link d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans">Comisión Ejecutiva</span>
                        <i class="bi bi-chevron-right fw-bold"></i>
                    </a>
                    <a href="#" data-target="organo" class="ocn-sidebar-link js-tab-link d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans">Órgano de Gobierno</span>
                        <i class="bi bi-chevron-right fw-bold"></i>
                    </a>
                    <a href="#" data-target="recomendaciones" class="ocn-sidebar-link js-tab-link d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans lh-sm">Recomendaciones<br>no vinculantes</span>
                        <i class="bi bi-chevron-right fw-bold"></i>
                    </a>
                    <a href="#" data-target="exhortos" class="ocn-sidebar-link js-tab-link d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans">Exhortos</span>
                        <i class="bi bi-chevron-right fw-bold"></i>
                    </a>
                </div>
            </aside>

            <!-- MAIN COLUMN -->
            <div class="col-12 col-lg-9 ps-lg-4">
                
                <!-- SECTION: COMITÉ COORDINADOR -->
                <div class="content-section" id="sec-comite">
                <div class="row mb-5">
                    <div class="col-12">
                        <h2 class="cp-recursos__titulo mb-2">COMITÉ COORDINADOR</h2>
                    </div>
                </div>

                <?php sesna_render_oc_stats_cards($oc_stats_comite); ?>

                <!-- SUBSECTION: SESIONES -->
                <div class="row mb-3">
                    <div class="col-12">
                        <h3 class="font-patria fw-bold text-dark m-0" style="font-size: 20px;">Sesiones</h3>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <label for="filter-anio-comite" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Año</label>
                        <select id="filter-anio-comite" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                            <option value="Todos">Todos</option>
                            <?php foreach ($oc_anios_comite as $anio) : ?>
                                <option value="<?= esc_attr($anio) ?>"><?= esc_html($anio) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="filter-tipo-comite" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Tipo de sesión</label>
                        <select id="filter-tipo-comite" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                            <option value="Todas">Todas</option>
                            <option value="Ordinaria">Ordinaria</option>
                            <option value="Extraordinaria">Extraordinaria</option>
                        </select>
                    </div>
                </div>

                <!-- SESSIONS LIST -->
                <div class="d-flex flex-column gap-3 mb-4 tx-sesion-list" id="sesiones-list-comite">
                    <?php foreach ($oc_sesiones_comite as $sesion) : sesna_render_oc_sesion_card($sesion); endforeach; ?>
                    <?php if (empty($oc_sesiones_comite)) : ?>
                        <p class="text-muted fs-5 mb-0">Aún no hay sesiones registradas.</p>
                    <?php endif; ?>
                </div>

                <!-- VER MÁS BTN -->
                <div class="text-center mt-5" id="sesiones-vermas-wrap-comite">
                    <a href="#" class="tx-comite-btn-more" id="sesiones-vermas-btn-comite">
                        Ver más sesiones <i class="bi bi-chevron-down"></i>
                    </a>
                </div>
                </div> <!-- END sec-comite -->

                <!-- SECTION: COMISIÓN EJECUTIVA -->
                <div class="content-section d-none" id="sec-comision">
                    <div class="row mb-5">
                        <div class="col-12">
                            <h2 class="cp-recursos__titulo mb-2">COMISIÓN EJECUTIVA</h2>
                        </div>
                    </div>

                    <?php sesna_render_oc_stats_cards($oc_stats_comision, false); ?>

                    <div class="row mb-3">
                        <div class="col-12">
                            <h3 class="font-patria fw-bold text-dark m-0" style="font-size: 20px;">Sesiones</h3>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <label for="filter-anio-comision" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Año</label>
                            <select id="filter-anio-comision" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php foreach ($oc_anios_comision as $anio) : ?>
                                    <option value="<?= esc_attr($anio) ?>"><?= esc_html($anio) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="filter-tipo-comision" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Tipo de sesión</label>
                            <select id="filter-tipo-comision" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                                <option value="Todas">Todas</option>
                                <option value="Ordinaria">Ordinaria</option>
                                <option value="Extraordinaria">Extraordinaria</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-column gap-3 mb-4 tx-sesion-list" id="sesiones-list-comision">
                        <?php foreach ($oc_sesiones_comision as $sesion) : sesna_render_oc_sesion_card($sesion); endforeach; ?>
                        <?php if (empty($oc_sesiones_comision)) : ?>
                            <p class="text-muted fs-5 mb-0">Aún no hay sesiones registradas.</p>
                        <?php endif; ?>
                    </div>

                    <div class="text-center mt-5" id="sesiones-vermas-wrap-comision">
                        <a href="#" class="tx-comite-btn-more" id="sesiones-vermas-btn-comision">
                            Ver más sesiones <i class="bi bi-chevron-down"></i>
                        </a>
                    </div>
                </div>

                <!-- SECTION: ÓRGANO DE GOBIERNO -->
                <div class="content-section d-none" id="sec-organo">
                    <div class="row mb-5">
                        <div class="col-12">
                            <h2 class="cp-recursos__titulo mb-2">ÓRGANO DE GOBIERNO</h2>
                        </div>
                    </div>

                    <?php sesna_render_oc_stats_cards($oc_stats_organo, false); ?>

                    <div class="row mb-3">
                        <div class="col-12">
                            <h3 class="font-patria fw-bold text-dark m-0" style="font-size: 20px;">Sesiones</h3>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <label for="filter-anio-organo" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Año</label>
                            <select id="filter-anio-organo" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php foreach ($oc_anios_organo as $anio) : ?>
                                    <option value="<?= esc_attr($anio) ?>"><?= esc_html($anio) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="filter-tipo-organo" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Tipo de sesión</label>
                            <select id="filter-tipo-organo" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                                <option value="Todas">Todas</option>
                                <option value="Ordinaria">Ordinaria</option>
                                <option value="Extraordinaria">Extraordinaria</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-column gap-3 mb-4 tx-sesion-list" id="sesiones-list-organo">
                        <?php foreach ($oc_sesiones_organo as $sesion) : sesna_render_oc_sesion_card($sesion); endforeach; ?>
                        <?php if (empty($oc_sesiones_organo)) : ?>
                            <p class="text-muted fs-5 mb-0">Aún no hay sesiones registradas.</p>
                        <?php endif; ?>
                    </div>

                    <div class="text-center mt-5" id="sesiones-vermas-wrap-organo">
                        <a href="#" class="tx-comite-btn-more" id="sesiones-vermas-btn-organo">
                            Ver más sesiones <i class="bi bi-chevron-down"></i>
                        </a>
                    </div>
                </div>

                <!-- SECTION: RECOMENDACIONES -->
                <div class="content-section d-none" id="sec-recomendaciones">
                    <div class="row mb-5">
                        <div class="col-12">
                            <h2 class="cp-recursos__titulo mb-2">RECOMENDACIONES NO VINCULANTES</h2>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-3 mb-4">
                        <?php foreach ($oc_recomendaciones as $item) : sesna_render_oc_lista_directa_item($item); endforeach; ?>
                        <?php if (empty($oc_recomendaciones)) : ?>
                            <div class="card border border-light shadow-sm rounded-4 mb-5 bg-white p-5 text-center">
                                <p class="text-muted fs-5 mb-0">Aún no hay recomendaciones registradas.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- SECTION: EXHORTOS -->
                <div class="content-section d-none" id="sec-exhortos">
                    <div class="row mb-5">
                        <div class="col-12">
                            <h2 class="cp-recursos__titulo mb-2">EXHORTOS</h2>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-3 mb-4">
                        <?php foreach ($oc_exhortos as $item) : sesna_render_oc_lista_directa_item($item); endforeach; ?>
                        <?php if (empty($oc_exhortos)) : ?>
                            <div class="card border border-light shadow-sm rounded-4 mb-5 bg-white p-5 text-center">
                                <p class="text-muted fs-5 mb-0">Aún no hay exhortos registrados.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php get_template_part( 'template-parts/transparencia/visor-pdf' ); ?>

<!-- Modal Visor de Video (Ver sesión) -->
<div class="modal fade tx-pdf-modal" id="oc-video-modal" tabindex="-1" aria-labelledby="oc-video-modal-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 900px !important; margin: 5vh auto !important;">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-white border-0 py-4 px-4 position-relative d-flex align-items-center justify-content-between">
                <h5 class="modal-title fw-bold font-noto-sans mb-0" id="oc-video-modal-label" style="color: #9f2241; font-size: 1.25rem;">Ver sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body p-0 bg-dark position-relative" style="height: 65vh; min-height: 400px;">
                <div class="embed-responsive embed-responsive-16by9 h-100">
                    <iframe id="oc-video-iframe" class="w-100 h-100 border-0" src="" title="Video de la sesión" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var videoModalEl = document.getElementById('oc-video-modal');
    if (!videoModalEl) return;
    var iframe = document.getElementById('oc-video-iframe');
    var title = document.getElementById('oc-video-modal-label');

    videoModalEl.addEventListener('show.bs.modal', function (event) {
        var trigger = event.relatedTarget;
        if (!trigger) return;
        var videoId = trigger.getAttribute('data-video-id') || '';
        var videoTitle = trigger.getAttribute('data-video-title') || 'Ver sesión';
        if (title) title.textContent = videoTitle;
        if (iframe && videoId) {
            iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
        }
    });

    videoModalEl.addEventListener('hidden.bs.modal', function () {
        if (iframe) iframe.src = '';
        if (title) title.textContent = 'Ver sesión';
    });
});
</script>

<script src="<?php echo get_template_directory_uri(); ?>/script/organos-colegiados.js?v=1"></script>

<?php get_footer(); ?>
