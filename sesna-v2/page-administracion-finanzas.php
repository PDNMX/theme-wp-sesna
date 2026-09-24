<?php
/**
 * Template Name: Administración y Finanzas
 *
 * @package sesna
 */

get_header(); ?>



<div class="page-administracion-finanzas front-page-bg" style="min-height: 100vh;">

    <!-- Breadcrumb -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"><i class="bi bi-house-door"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administración y Finanzas</li>
            </ol>
        </div>
    </nav>

    <!-- Hero Banner -->
    <section class="sesna-page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8 position-relative z-1">
                    <h1 class="sesna-hero__title">Administración y<br>Finanzas</h1>
                    <div class="hero-separator"></div>
                    <p class="sesna-hero__subtitle">
                        Consulta información institucional relacionada con la planeación, estados financieros, adquisiciones, contrataciones y gestión documental de la SESNA.
                    </p>
                </div>
                <div class="col-lg-6 col-md-4 d-none d-md-flex align-items-center justify-content-end position-relative">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/' . rawurlencode('logo_admin_finanzas.png') ); ?>"
                         alt="Administración y Finanzas"
                         class="sesna-hero__img"
                         loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- Cards Section -->
    <section class="container mb-5">
        <div class="row g-4 pt-4">

            <!-- Card 1 -->
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo esc_url( home_url('/planeacion-institucional/') ); ?>" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark">
                    <div class="icon-bg-circle mb-4">
                        <i class="bi bi-clipboard-check tx-card__icon"></i>
                    </div>
                    <h5 class="tx-card__title mb-3">Planeación<br>Institucional</h5>
                    <p class="tx-card__desc text-muted mb-4">Documentos que orientan y dan seguimiento al cumplimiento de los objetivos y metas institucionales.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <i class="bi bi-arrow-right ms-2"></i></span>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo esc_url( home_url('/informacion-financiera/') ); ?>" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark">
                    <div class="icon-bg-circle mb-4">
                        <i class="bi bi-graph-up-arrow tx-card__icon"></i>
                    </div>
                    <h5 class="tx-card__title mb-3">Información<br>Financiera</h5>
                    <p class="tx-card__desc text-muted mb-4">Estados financieros, dictámenes y documentación relacionada con la situación financiera de la institución.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <i class="bi bi-arrow-right ms-2"></i></span>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo esc_url( home_url('/contrataciones-y-adquisiciones/') ); ?>" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark">
                    <div class="icon-bg-circle mb-4">
                        <i class="bi bi-briefcase tx-card__icon"></i>
                    </div>
                    <h5 class="tx-card__title mb-3">Contrataciones<br>y Adquisiciones</h5>
                    <p class="tx-card__desc text-muted mb-4">Información relacionada con los procedimientos de contratación y adquisición de bienes y servicios.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <i class="bi bi-arrow-right ms-2"></i></span>
                </a>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo esc_url( home_url('/archivo-documental/') ); ?>" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark">
                    <div class="icon-bg-circle mb-4">
                        <i class="bi bi-journals tx-card__icon"></i>
                    </div>
                    <h5 class="tx-card__title mb-3">Gestión<br>Documental</h5>
                    <p class="tx-card__desc text-muted mb-4">Instrumentos para la organización, conservación y administración de los archivos institucionales.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <i class="bi bi-arrow-right ms-2"></i></span>
                </a>
            </div>

        </div>

        <!-- Instrucción Banner -->
        <div class="cp-instruccion-banner d-flex align-items-center gap-4">
            <i class="bi bi-hand-index-thumb text-guinda flex-shrink-0" style="font-size: 3rem; line-height: 1;"></i>
            <div class="tx-hero__subtitle text-muted m-0" style="max-width: 800px; line-height: 1.5;">
                Selecciona una de las siguientes categorías para <span class="text-guinda fw-bold" style="color: var(--color-burgundi);">consultar documentos, informes y recursos relacionados.</span>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
