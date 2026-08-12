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
                    <h1 class="sesna-hero__title">Órganos Colegiados<br>y Normativa</h1>
                    <div class="hero-separator"></div>
                    <p class="sesna-hero__subtitle">
                        Conoce la estructura, atribuciones y marco jurídico de los Órganos Colegiados del SESNA.
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

                <!-- Normatividad Nav -->
                <h2 class="h6 fw-bold font-noto-sans mb-3 text-uppercase" style="color: var(--color-burgundi); letter-spacing: 0.5px;">NORMATIVA</h2>
                <div class="ocn-sidebar-nav mb-5" id="sidebar-nav-normatividad">
                    <a href="#" data-target="norm-ext" class="ocn-sidebar-link js-tab-link d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans">Normativa externa</span>
                        <i class="bi bi-chevron-right fw-bold"></i>
                    </a>
                    <a href="#" data-target="norm-int" class="ocn-sidebar-link js-tab-link d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans">Normativa interna</span>
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

                <!-- SECTION: NORMATIVIDAD -->
                <div class="card border border-light shadow-sm rounded-4 mb-5 mt-5 content-section d-none" style="background-color: #ffffff;" id="normatividad-section">
                    <div class="card-body p-4 p-md-5">
                        <div class="row align-items-end mb-4">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <h2 class="cp-recursos__titulo mb-0">NORMATIVA</h2>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="search-doc" class="form-label fw-bold font-noto-sans text-dark mb-2">Buscar documento</label>
                                <div class="position-relative">
                                    <input type="text" id="search-doc" class="form-control font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-search-input tx-comite-filter-control" placeholder="Nombre, palabra clave, año, etc.">
                                    <i class="bi bi-search tx-comite-search-icon"></i>
                                </div>
                            </div>
                        </div>

                        <!-- TABLE 1: EXTERNA -->
                        <div id="normatividad-externa-container">
                        <h3 class="tx-table-normatividad-title mt-5" id="normatividad-externa-title">NORMATIVA EXTERNA</h3>
                        <div class="table-responsive" id="normatividad-externa-table-wrap">
                            <table class="tx-table-normatividad">
                                <thead>
                                    <tr>
                                        <th>Documento</th>
                                        <th>Tipo de documento</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="normatividad-externa-body">
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Constitución Política de los Estados Unidos Mexicanos</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Constitución Política de los Estados Unidos Mexicanos</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/ref/cpeum.htm" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Pacto Internacional de Derechos Civiles y Políticos</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Tratados Internacionales</div></td>
                                        <td>
                                            <a href="https://www.ohchr.org/es/instruments-mechanisms/instruments/international-covenant-civil-and-political-rights" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Pacto Internacional de Derechos Económicos, Sociales y Culturales</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Tratados Internacionales</div></td>
                                        <td>
                                            <a href="https://www.ordenjuridico.gob.mx/TratInt/Derechos%20Humanos/D50.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Convención Americana sobre Derechos Humanos</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Tratados Internacionales</div></td>
                                        <td>
                                            <a href="https://www.cndh.org.mx/sites/default/files/doc/Programas/TrataPersonas/MarcoNormativoTrata/InsInternacionales/Regionales/Convencion_ADH.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Convención Interamericana Contra la Corrupción (OEA)</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Tratados Internacionales</div></td>
                                        <td>
                                            <a href="https://www.oas.org/es/sla/ddi/docs/tratados_multilaterales_interamericanos_b-58_contra_corrupcion.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Convención para Combatir el Cohecho de Servidores Públicos Extranjeros en Transacciones Comerciales Internacionales</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Tratados Internacionales</div></td>
                                        <td>
                                            <a href="https://www.oecd.org/content/dam/oecd/es/publications/reports/2011/03/convention-on-combating-bribery-of-foreign-public-officials-in-international-business-transactions_037f7856/24d80d2c-es.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Convención de las Naciones Unidas contra la Corrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Tratados Internacionales</div></td>
                                        <td>
                                            <a href="https://www.unodc.org/pdf/corruption/publications_unodc_convention-s.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Ley General de Responsabilidades Administrativas</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Leyes Generales</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/ref/lgra.htm" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Ley General del Sistema Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Leyes Generales</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/ref/lgsna.htm" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Ley General de Archivos.</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Leyes Generales</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/ref/lga.htm" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Ley Orgánica de la Administración Pública Federal</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Leyes Federales</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/ref/loapf.htm" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Ley de Adquisiciones, Arrendamientos y Servicios del Sector Público</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Leyes Federales</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/ref/laassp.htm" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Ley Federal de Procedimiento Administrativo</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Leyes Federales</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/ref/lfpa.htm" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Ley Federal de Procedimiento Contencioso Administrativo</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Leyes Federales</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/ref/lfpca.htm" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Ley Federal de las Entidades Paraestatales</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Leyes Federales</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/ref/lfep.htm" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Ley de Fiscalización y Rendición de Cuentas de la Federación</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Leyes Federales</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/ref/lfrcf.htm" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Ley de Amparo, Reglamentaria de los artículos 103 y 107 de la Constitución Política de los Estados Unidos Mexicanos</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Leyes Federales</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/ref/lamp.htm" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Código Penal Federal</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Códigos Federales</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/ref/cpf.htm" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Reglamento de la Ley Federal de las Entidades Paraestatales</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Reglamentos</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/regley/Reg_LFEP.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Reglamento de la Ley de Adquisiciones, Arrendamientos y Servicios del Sector Público</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Reglamentos</div></td>
                                        <td>
                                            <a href="https://www.diputados.gob.mx/LeyesBiblio/regley/Reg_LAASSP.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo mediante el cual el Comité Coordinador del Sistema Nacional Anticorrupción aprueba la Política Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="https://sidof.segob.gob.mx/notas/getDoc/5587360" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción da a conocer que los formatos de declaración de situación patrimonial y de intereses son técnicamente operables con el Sistema de Evolución Patrimonial y de Declaración de Intereses de la Plataforma Digital Nacional, así como el inicio de la obligación de los servidores públicos de presentar sus respectivas declaraciones de situación patrimonial y de intereses conforme a los artículos 32 y 33 de la Ley General de Responsabilidades Administrativas</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="https://www.dof.gob.mx/nota_detalle.php?codigo=5582735&amp;fecha=24/12/2019#gsc.tab=0" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo por el que se modifican los Anexos Primero y Segundo del Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción emite el formato de declaraciones: de situación patrimonial y de intereses; y expide las normas e instructivo para su llenado y presentación.</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="https://www.gob.mx/cms/uploads/attachment/file/496436/ACUERDO_POR_EL_QUE_SE_MODIFICAN_LOS_ANEXOS_PRIMERO_Y_SEGUNDO_DEL_ACUERDO_POR....pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo por el que se modifica el artículo Segundo Transitorio del Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción emite el formato de declaraciones: de situación patrimonial y de intereses; y expide las normas e instructivo para su llenado y presentación.</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="https://www.seseabc.gob.mx/doctos/dof_23092019_formatos_SP.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción emite el formato de declaraciones: de situación patrimonial y de intereses; y expide las normas e instructivo para su llenado y presentación.</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="https://www.dof.gob.mx/nota_detalle.php?codigo=5582735&amp;fecha=24/12/2019#gsc.tab=0" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo mediante el cual el Comité Coordinador del Sistema Nacional Anticorrupción emite el Análisis para la Implementación y Operación de la Plataforma Digital Nacional y las Bases para el Funcionamiento de la Plataforma Digital Nacional.</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="https://www.gob.mx/cms/uploads/attachment/file/403489/Implementacion_y_Operacion_de_la_PDN_y_las_Bases_para_el_Funcionamiento_de_la_PDN_completo.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo mediante el cual el Comité Coordinador del Sistema Nacional Anticorrupción emite el Análisis para la Identificación y Transparencia del Beneficiario Final en México y aprueba los Principios para la Identificación y Transparencia del Beneficiario Final para el Combate a la Corrupción en México.</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="https://www.dof.gob.mx/nota_detalle.php?codigo=5541803&amp;fecha=23/10/2018#gsc.tab=0" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción aprueba la difusión y da a conocer el Protocolo para prevenir, detectar, investigar, perseguir y sancionar el Cohecho Internacional en cualquiera de sus modalidades</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="https://www.gob.mx/cms/uploads/attachment/file/429770/Acuerdo_por_el_que_el_Comit__Coordinador_del_Sistema_Nacional_Anticorrupci_n_aprueba_la_difusi_n_y_da_a....pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción designa los días 9 de cada mes como el Día por la Integridad</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="https://www.gob.mx/cms/uploads/attachment/file/404145/ACUERDO_CC_SESNA_designa_los_dias_9_de_cada_mes_como_el_Dia_por_la_Integridad.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo por el que se dan a conocer los Lineamientos para la emisión del Código de Ética a que se refiere el artículo 16 de la Ley General de Responsabilidades Administrativas</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="https://www.gob.mx/cms/uploads/attachment/file/483383/2019-08-06_acuerdo_codigo_etica.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo por el que el Comité Coordinador del Sistema Nacional Anticorrupción da a conocer la obligación de presentar las declaraciones de situación patrimonial y de intereses conforme a los artículos 32 y 33 de la Ley General de Responsabilidades Administrativas</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="https://www.dof.gob.mx/nota_detalle.php?codigo=5582735&amp;fecha=24/12/2019#gsc.tab=0" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Lineamientos para la incorporación de la información al sistema de evolución patrimonial, de declaración de intereses y constancia de presentación de declaración fiscal de la Plataforma Digital Nacional, previsto en el artículo 49, fracción I de la Ley General del Sistema Nacional Anticorrupción.</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Lineamientos, Códigos y Reglas de Integridad</div></td>
                                        <td>
                                            <a href="https://sidof.segob.gob.mx/notas/getDoc/5718117" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Código de Ética e Integridad para un Buen Gobierno en la Administración Pública Federal.</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Lineamientos, Códigos y Reglas de Integridad</div></td>
                                        <td>
                                            <a href="https://www.dof.gob.mx/nota_detalle.php?codigo=5773147&amp;fecha=18/11/2025#gsc.tab=0" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Reglas de Integridad para el Ejercicio de la Función Pública</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Lineamientos, Códigos y Reglas de Integridad</div></td>
                                        <td>
                                            <a href="https://www.gob.mx/cms/uploads/attachment/file/167646/Reglas-Integridad.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Declaratoria de inicio de funciones del sistema de evolución patrimonial, de declaración de intereses y constancia de presentación de declaración fiscal de la Plataforma Digital Nacional, previsto en el artículo 49, fracción I de la Ley General del Sistema Nacional Anticorrupción.</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Declaratoria</div></td>
                                        <td>
                                            <a href="https://www.dof.gob.mx/nota_detalle.php?codigo=5729579&amp;fecha=05/06/2024#gsc.tab=0" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Política Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Políticas</div></td>
                                        <td>
                                            <a href="https://www.dof.gob.mx/2020/SESNA/PNA.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Protocolo para la prevención, atención y sanción del hostigamiento sexual y acoso sexual</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Protocolos</div></td>
                                        <td>
                                            <a href="https://www.gob.mx/cms/uploads/attachment/file/619797/Protocolo_para_la_prevenci_n__atenci_n_y_sanci_n_del_hostigamiento_sexual_y_acoso_sexual.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- VER MÁS BTN (EXTERNA) -->
                        <div class="text-center mt-4 mb-2" id="normatividad-externa-vermas-wrap">
                            <a href="#" class="btn-sesna-outline" id="normatividad-externa-vermas-btn">
                                Ver más documentos <i class="bi bi-chevron-down ms-1"></i>
                            </a>
                        </div>

                        </div>

                        <!-- TABLE 2: INTERNA -->
                        <div id="normatividad-interna-container">
                        <h3 class="tx-table-normatividad-title mt-5" id="normatividad-interna-title">NORMATIVA INTERNA</h3>
                        <div class="table-responsive" id="normatividad-interna-table-wrap">
                            <table class="tx-table-normatividad">
                                <thead>
                                    <tr>
                                        <th>Documento</th>
                                        <th>Tipo de documento</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="normatividad-interna-body">
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Estatuto Orgánico de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Estatuto</div></td>
                                        <td>
                                            <a href="/wp-content/uploads/2019/06/10.-Estatuto-Organico-de-la-SESNA.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Reglas para la Celebración de las Reuniones Nacionales de los Secretarios Técnicos de las Secretarías Ejecutivas de los Sistemas Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Reglas</div></td>
                                        <td>
                                            <a href="https://sesaemm.gob.mx/documentos/sc01/06_marco_juridico/05_Reglamentos/Reglamentos_13.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo por el que el Órgano de Gobierno de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción aprueba la celebración de sesiones a distancia</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="/wp-content/uploads/2020/12/Acuerdo-OG-SESNA-Aprobacion-Celebracion-Sesiones-Distancia-DOF_12Oct2020.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo mediante el cual el Sistema Nacional Anticorrupción refrenda los Lineamientos para la emisión del Código de Ética.</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdos</div></td>
                                        <td>
                                            <a href="https://sidof.segob.gob.mx/notas/5722585" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Lineamientos que regulan las sesiones del Comité Coordinador del Sistema Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Lineamientos</div></td>
                                        <td>
                                            <a href="/wp-content/uploads/2024/05/lineamientos-sesiones-CC-SNA-2024.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Lineamientos que regulan el procedimiento para que el Comité de Participación Ciudadana acceda a la información que genere el Sistema Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Lineamientos</div></td>
                                        <td>
                                            <a href="/wp-content/uploads/2019/12/LINEAMIENTOS-QUE-REGULAN-EL-PROCEDIMIENTO-01Oct2019.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Lineamientos que regulan las sesiones de la Comisión Ejecutiva de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Lineamientos</div></td>
                                        <td>
                                            <a href="/wp-content/uploads/2022/03/Lineamientos_Sesiones_CE_SESNA_09Jun2020-07Mar2022.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Lineamientos que regulan la Generación de Insumos Técnicos de la Comisión Ejecutiva de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción para el Comité Coordinador del Sistema Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Lineamientos</div></td>
                                        <td>
                                            <a href="/wp-content/uploads/2021/07/44.-LINEAMIENTOS....pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Lineamientos relativos al control y registro de asistencia de las personas servidoras públicas adscritas a la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Lineamientos</div></td>
                                        <td>
                                            <a href="#" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Políticas, Bases y Lineamientos en Materia de Adquisiciones, Arrendamientos y Servicios de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Políticas</div></td>
                                        <td>
                                            <a href="https://www.gob.mx/cms/uploads/attachment/file/318383/POL_TICAS__BASES_Y_LINEAMIENTOS_EN_MATERIA_DE_ADQUISICIONES__ARRENDAMIENTOS_Y_SERVICIOS_DE_LA_SECRETAR_A_EJECUTIVA_DEL_SISTEMA_NACIONAL_ANTICORRUPCI_N.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Manual de Integración y Funcionamiento del Subcomité Revisor de Convocatorias para Adquisiciones, Arrendamientos y Prestación de Servicios de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Manuales</div></td>
                                        <td>
                                            <a href="https://www.gob.mx/cms/uploads/attachment/file/389674/5.1_Manual_Subcomite-RUBRICADO.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Manual de Integración y Funcionamiento del Comité de Adquisiciones, Arrendamientos y Servicios de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Manuales</div></td>
                                        <td>
                                            <a href="https://www.gob.mx/cms/uploads/attachment/file/318479/MANUAL_DE_INTEGRACI_N_Y_FUNCIONAMIENTO_DEL_COMT__DE_ADQUISICIONES__ARRENDAMIENTOS_Y_SERVICIOS_DE_LA_SECRETARIA_EJECUTIVA_DEL_SISTEMA_NACIONAL_ANTICORRUPCI_N__-_RUBRICADO.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Manual de Organización General de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Manuales</div></td>
                                        <td>
                                            <a href="https://www.dof.gob.mx/nota_detalle.php?codigo=5773842&amp;fecha=25/11/2025#gsc.tab=0" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Programa Institucional 2020-2024 de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Programas, Planes y Guías</div></td>
                                        <td>
                                            <a href="/wp-content/uploads/2020/06/2020_06_17_MAT_sesna.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Guía Básica para realizar Eventos Accesibles de la SESNA</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Programas, Planes y Guías</div></td>
                                        <td>
                                            <a href="/wp-content/uploads/2022/05/Guia-Basica-Eventos-Accesibles-12May2022.pdf" target="_blank" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Plan Anual de Desarrollo Archivístico</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Programas, Planes y Guías</div></td>
                                        <td>
                                            <a href="#" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right tx-table-normatividad-link-icon"></i>
                                                <span class="tx-table-normatividad-link-label">Consultar</span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- VER MÁS BTN (INTERNA) -->
                        <div class="text-center mt-5 mb-2" id="normatividad-interna-vermas-wrap">
                            <a href="#" class="btn-sesna-outline" id="normatividad-interna-vermas-btn">
                                Ver más documentos <i class="bi bi-chevron-down ms-1"></i>
                            </a>
                        </div>
                        </div>
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
