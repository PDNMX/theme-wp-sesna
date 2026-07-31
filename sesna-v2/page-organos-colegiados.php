<?php
/**
 * Template Name: Órganos Colegiados y Normatividad
 */

get_header();
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
                <li class="breadcrumb-item active" aria-current="page">Órganos Colegiados y Normatividad</li>
            </ol>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="sesna-page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8 position-relative z-1 mb-4 mb-lg-0">
                    <h1 class="sesna-hero__title">Órganos Colegiados<br>y Normatividad</h1>
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
                <div class="ocn-sidebar-nav mb-5">
                    <a href="#" class="ocn-sidebar-link active d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans">Comité Coordinador</span>
                        <i class="bi bi-chevron-down fw-bold"></i>
                    </a>
                    <a href="#" class="ocn-sidebar-link d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans">Comisión Ejecutiva</span>
                        <i class="bi bi-chevron-down fw-bold"></i>
                    </a>
                    <a href="#" class="ocn-sidebar-link d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans">Órgano de Gobierno</span>
                        <i class="bi bi-chevron-down fw-bold"></i>
                    </a>
                    <a href="#" class="ocn-sidebar-link d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none">
                        <span class="fw-bold font-noto-sans lh-sm">Recomendaciones<br>no vinculantes</span>
                        <i class="bi bi-chevron-down fw-bold"></i>
                    </a>
                </div>

                <!-- Normatividad Nav -->
                <h2 class="h6 fw-bold font-noto-sans mb-3 text-uppercase" style="color: var(--color-burgundi); letter-spacing: 0.5px;">NORMATIVIDAD</h2>
                <ul class="list-unstyled ocn-normatividad-list px-3">
                    <li class="mb-3">
                        <a href="#" class="text-decoration-none text-muted font-noto-sans d-flex align-items-center">
                            <span class="ocn-dot me-2"></span> Normatividad externa
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="text-decoration-none text-muted font-noto-sans d-flex align-items-center">
                            <span class="ocn-dot me-2"></span> Normatividad interna
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- MAIN COLUMN -->
            <div class="col-12 col-lg-9 ps-lg-4">
                
                <!-- SECTION: COMITÉ COORDINADOR -->
                <div class="row mb-5">
                    <div class="col-12">
                        <h2 class="tx-section-title font-patria mb-2 tx-comite-title text-uppercase">COMITÉ COORDINADOR</h2>
                    </div>
                </div>

                <!-- STATS CARDS -->
                <div class="row g-3 mb-5">
                    <!-- Stat Card 1 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 rounded-4 shadow-sm h-100 ocn-stat-card bg-white p-3 d-flex flex-column justify-content-center align-items-center">
                            <span class="fw-bold font-patria" style="font-size: 2.5rem; color: var(--color-negro);">30</span>
                            <span class="font-noto-sans text-uppercase fw-bold text-center" style="font-size: 0.8rem; letter-spacing: 0.5px; color: var(--color-burgundi);">Sesiones</span>
                        </div>
                    </div>
                    <!-- Stat Card 2 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 rounded-4 shadow-sm h-100 ocn-stat-card bg-white p-3 d-flex flex-column justify-content-center align-items-center">
                            <span class="fw-bold font-patria" style="font-size: 2.5rem; color: var(--color-negro);">120</span>
                            <span class="font-noto-sans text-uppercase fw-bold text-center" style="font-size: 0.8rem; letter-spacing: 0.5px; color: var(--color-burgundi);">Acuerdos</span>
                        </div>
                    </div>
                    <!-- Stat Card 3 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 rounded-4 shadow-sm h-100 ocn-stat-card bg-white p-3 d-flex flex-column justify-content-center align-items-center">
                            <span class="fw-bold font-patria" style="font-size: 2.5rem; color: var(--color-negro);">15</span>
                            <span class="font-noto-sans text-uppercase fw-bold text-center" style="font-size: 0.8rem; letter-spacing: 0.5px; color: var(--color-burgundi);">Recomendaciones</span>
                        </div>
                    </div>
                    <!-- Stat Card 4 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 rounded-4 shadow-sm h-100 ocn-stat-card bg-white p-3 d-flex flex-column justify-content-center align-items-center">
                            <span class="fw-bold font-patria" style="font-size: 2.5rem; color: var(--color-negro);">8</span>
                            <span class="font-noto-sans text-uppercase fw-bold text-center" style="font-size: 0.8rem; letter-spacing: 0.5px; color: var(--color-burgundi);">Exhortos</span>
                        </div>
                    </div>
                </div>

                <!-- SUBSECTION: SESIONES -->
                <div class="row mb-3">
                    <div class="col-12">
                        <h3 class="font-patria fw-bold text-dark m-0" style="font-size: 1.5rem;">Sesiones</h3>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <label for="filter-anio" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Año</label>
                        <select id="filter-anio" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                            <option value="Todos">Todos</option>
                            <option value="2024" selected>2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="filter-tipo" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Tipo de sesión</label>
                        <select id="filter-tipo" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                            <option value="Todas">Todas</option>
                            <option value="Ordinaria" selected>Ordinaria</option>
                            <option value="Extraordinaria">Extraordinaria</option>
                        </select>
                    </div>
                </div>

                <!-- SESSIONS LIST -->
                <div class="d-flex flex-column gap-3 mb-4">
                    
                <!-- SESSION ITEM 1 -->
                <div class="card border border-light shadow-sm rounded-3 mb-3 overflow-hidden tx-sesion-card" data-anio="2024" data-tipo="Ordinaria">
                    <div class="card-body p-0">
                        <div class="row g-0 h-100 align-items-center">
                            <!-- Date col -->
                            <div class="col-12 col-md-2 tx-sesion-date text-center p-3 p-md-4 d-flex flex-column justify-content-center border-end">
                                <div class="fw-bold tx-sesion-date-day lh-1 text-secondary">15</div>
                                <div class="fw-bold tx-sesion-date-month text-secondary text-uppercase" style="letter-spacing: 1px;">FEB</div>
                                <div class="fw-bold tx-sesion-date-year text-secondary mt-1">2024</div>
                            </div>
                            
                            <!-- Content col -->
                            <div class="col-12 col-md-4 p-4 d-flex flex-column justify-content-center">
                                <h3 class="h5 fw-bold mb-2 font-noto-sans tx-sesion-info-title">Primera Sesión Ordinaria 2024</h3>
                                <p class="mb-0 font-noto-sans tx-sesion-info-type"><strong>Tipo:</strong> Ordinaria</p>
                            </div>
                            
                            <!-- Actions col -->
                            <div class="col-12 col-md-5 tx-sesion-action p-3 p-md-4 d-flex align-items-center">
                                <div class="d-flex flex-wrap flex-md-nowrap align-items-start justify-content-between w-100 gap-2">
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-clipboard tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Convocatoria</div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-file-earmark-text tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Orden del día</div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-file-earmark-text tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Acta</div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-folder tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Anexos</div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-play-btn tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Ver sesión</div>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Chevron col -->
                            <div class="col-12 col-md-1 d-none d-md-flex align-items-center justify-content-center p-3 p-md-4">
                                <i class="bi bi-chevron-right text-muted fs-5"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SESSION ITEM 2 -->
                <div class="card border border-light shadow-sm rounded-3 mb-3 overflow-hidden tx-sesion-card" data-anio="2024" data-tipo="Ordinaria">
                    <div class="card-body p-0">
                        <div class="row g-0 h-100 align-items-center">
                            <!-- Date col -->
                            <div class="col-12 col-md-2 tx-sesion-date text-center p-3 p-md-4 d-flex flex-column justify-content-center border-end">
                                <div class="fw-bold tx-sesion-date-day lh-1 text-secondary">18</div>
                                <div class="fw-bold tx-sesion-date-month text-secondary text-uppercase" style="letter-spacing: 1px;">ABR</div>
                                <div class="fw-bold tx-sesion-date-year text-secondary mt-1">2024</div>
                            </div>
                            
                            <!-- Content col -->
                            <div class="col-12 col-md-4 p-4 d-flex flex-column justify-content-center">
                                <h3 class="h5 fw-bold mb-2 font-noto-sans tx-sesion-info-title">Segunda Sesión Ordinaria 2024</h3>
                                <p class="mb-0 font-noto-sans tx-sesion-info-type"><strong>Tipo:</strong> Ordinaria</p>
                            </div>
                            
                            <!-- Actions col -->
                            <div class="col-12 col-md-5 tx-sesion-action p-3 p-md-4 d-flex align-items-center">
                                <div class="d-flex flex-wrap flex-md-nowrap align-items-start justify-content-between w-100 gap-2">
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-clipboard tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Convocatoria</div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-file-earmark-text tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Orden del día</div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-file-earmark-text tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Acta</div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-folder tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Anexos</div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-play-btn tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Ver sesión</div>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Chevron col -->
                            <div class="col-12 col-md-1 d-none d-md-flex align-items-center justify-content-center p-3 p-md-4">
                                <i class="bi bi-chevron-right text-muted fs-5"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SESSION ITEM 3 -->
                <div class="card border border-light shadow-sm rounded-3 mb-3 overflow-hidden tx-sesion-card" data-anio="2024" data-tipo="Extraordinaria">
                    <div class="card-body p-0">
                        <div class="row g-0 h-100 align-items-center">
                            <!-- Date col -->
                            <div class="col-12 col-md-2 tx-sesion-date text-center p-3 p-md-4 d-flex flex-column justify-content-center border-end">
                                <div class="fw-bold tx-sesion-date-day lh-1 text-secondary">27</div>
                                <div class="fw-bold tx-sesion-date-month text-secondary text-uppercase" style="letter-spacing: 1px;">JUN</div>
                                <div class="fw-bold tx-sesion-date-year text-secondary mt-1">2024</div>
                            </div>
                            
                            <!-- Content col -->
                            <div class="col-12 col-md-4 p-4 d-flex flex-column justify-content-center">
                                <h3 class="h5 fw-bold mb-2 font-noto-sans tx-sesion-info-title">Tercera Sesión Extraordinaria 2024</h3>
                                <p class="mb-0 font-noto-sans tx-sesion-info-type"><strong>Tipo:</strong> Extraordinaria</p>
                            </div>
                            
                            <!-- Actions col -->
                            <div class="col-12 col-md-5 tx-sesion-action p-3 p-md-4 d-flex align-items-center">
                                <div class="d-flex flex-wrap flex-md-nowrap align-items-start justify-content-between w-100 gap-2">
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-clipboard tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Convocatoria</div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-file-earmark-text tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Orden del día</div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-file-earmark-text tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Acta</div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-folder tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Anexos</div>
                                    </a>
                                    <a href="#" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link flex-fill px-1">
                                        <i class="bi bi-play-btn tx-sesion-pdf-icon"></i>
                                        <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Ver sesión</div>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Chevron col -->
                            <div class="col-12 col-md-1 d-none d-md-flex align-items-center justify-content-center p-3 p-md-4">
                                <i class="bi bi-chevron-right text-muted fs-5"></i>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

                <!-- VER MÁS BTN -->
                <div class="text-center mt-5">
                    <a href="#" class="tx-comite-btn-more">
                        Ver más sesiones <i class="bi bi-chevron-down"></i>
                    </a>
                </div>

                <!-- SECTION: NORMATIVIDAD -->
                <div class="card border border-light shadow-sm rounded-4 mb-5 mt-5" style="background-color: #ffffff;">
                    <div class="card-body p-4 p-md-5">
                        <div class="row align-items-end mb-4">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <h2 class="tx-section-title font-patria fw-bold mb-0 tx-comite-title text-uppercase">NORMATIVIDAD</h2>
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
                        <h3 class="tx-table-normatividad-title mt-5">NORMATIVIDAD EXTERNA</h3>
                        <div class="table-responsive">
                            <table class="tx-table-normatividad">
                                <thead>
                                    <tr>
                                        <th>Documento</th>
                                        <th>Tipo de documento</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Constitución Política de los<br>Estados Unidos Mexicanos</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Marco jurídico</div></td>
                                        <td>
                                            <a href="#" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Ley General del Sistema Nacional<br>Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Ley</div></td>
                                        <td>
                                            <a href="#" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Reglamento de la Ley General del<br>Sistema Nacional Anticorrupción</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Reglamento</div></td>
                                        <td>
                                            <a href="#" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- TABLE 2: INTERNA -->
                        <h3 class="tx-table-normatividad-title mt-4">NORMATIVIDAD INTERNA</h3>
                        <div class="table-responsive">
                            <table class="tx-table-normatividad">
                                <thead>
                                    <tr>
                                        <th>Documento</th>
                                        <th>Tipo de documento</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Lineamientos para la organización y<br>conservación de archivos</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Lineamiento</div></td>
                                        <td>
                                            <a href="#" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title">Acuerdo por el que se establecen los<br>criterios de clasificación de información</div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type">Acuerdo</div></td>
                                        <td>
                                            <a href="#" class="tx-table-normatividad-link">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- VER MÁS BTN (DOCUMENTOS) -->
                        <div class="text-center mt-5 mb-2">
                            <a href="#" class="tx-btn-outline-guinda">
                                Ver más documentos <i class="bi bi-chevron-down ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
