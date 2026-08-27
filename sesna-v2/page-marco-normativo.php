<?php
/**
 * Template Name: Marco Normativo
 */

get_header();
?>

<div class="page-marco-normativo front-page-bg pb-5">

    <!-- Migas de pan (Breadcrumb) -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/') ) ?>">
                        <i class="bi bi-house-door"></i> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Marco Normativo</li>
            </ol>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="sesna-page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8 position-relative z-1 mb-4 mb-lg-0">
                    <h1 class="sesna-hero__title">Marco Normativo</h1>
                    <div class="hero-separator"></div>
                    <p class="sesna-hero__subtitle">
                        Conoce el <strong>marco normativo</strong> que sustenta y regula las atribuciones, funciones y actividades de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción, así como las disposiciones jurídicas que orientan su actuación y participación en el cumplimiento de los objetivos del Sistema Nacional Anticorrupción.
                    </p>
                </div>
                <div class="col-lg-6 col-md-4 d-none d-md-flex align-items-center justify-content-end position-relative">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/Marco_normativo_Encabezado.png' ); ?>"
                         alt="Marco Normativo"
                         class="sesna-hero__img"
                         loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="container py-5">
        <div class="row">

            <!-- SIDEBAR -->
            <aside class="col-12 col-lg-3 mb-5 mb-lg-0 pe-lg-4">
                <h2 class="h6 fw-bold font-noto-sans mb-3 text-uppercase" style="color: var(--color-burgundi); letter-spacing: 0.5px;">MARCO NORMATIVO</h2>
                <div class="ocn-sidebar-nav mb-5" id="sidebar-nav-normatividad">
                    <a href="#" data-target="norm-ext" class="ocn-sidebar-link js-tab-link active d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans">Normatividad externa</span>
                        <i class="bi bi-chevron-right fw-bold"></i>
                    </a>
                    <a href="#" data-target="norm-int" class="ocn-sidebar-link js-tab-link d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans">Normatividad interna</span>
                        <i class="bi bi-chevron-right fw-bold"></i>
                    </a>
                </div>
            </aside>

            <!-- MAIN COLUMN -->
            <div class="col-12 col-lg-9 ps-lg-4">

                <!-- SECTION: NORMATIVIDAD -->
                <div class="card border border-light shadow-sm rounded-4 mb-5 content-section" style="background-color: #ffffff;" id="normatividad-section">
                    <div class="card-body p-4 p-md-5">
                        <div class="row align-items-end mb-4">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <h2 class="cp-recursos__titulo mb-0">MARCO NORMATIVO</h2>
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
                        <h3 class="tx-table-normatividad-title mt-5" id="normatividad-externa-title">NORMATIVIDAD EXTERNA</h3>
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
                        <h3 class="tx-table-normatividad-title mt-5" id="normatividad-interna-title">NORMATIVIDAD INTERNA</h3>
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

<script src="<?php echo get_template_directory_uri(); ?>/script/marco-normativo.js?v=1"></script>

<?php get_footer(); ?>
