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
        <div class="contenedor">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"><svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Inicio</a>
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
        <div class="contenedor">
            <div class="fila align-items-center">
                <div class="columna__6--lg columna__8--md position-relative z-1">
                    <h1 class="sesna-hero__title">Administración y<br>Finanzas</h1>
                    <div class="hero-separator"></div>
                    <p class="sesna-hero__subtitle">
                        Consulta información institucional relacionada con la planeación, estados financieros, adquisiciones, contrataciones y gestión documental de la SESNA.
                    </p>
                </div>
                <div class="columna__6--lg columna__4--md d-none d-md-flex align-items-center justify-content-end position-relative">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/' . rawurlencode('logo_admin_finanzas.png') ); ?>"
                         alt="Administración y Finanzas"
                         class="sesna-hero__img"
                         loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- Cards Section -->
    <section class="contenedor mb--48">
        <div class="fila gap--24 pt--32">

            <!-- Card 1 -->
            <div class="columna__3--lg columna__6--md">
                <a href="<?php echo esc_url( home_url('/planeacion-institucional/') ); ?>" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark">
                    <div class="icon-bg-circle mb-4">
                        <svg class="tx-card__icon" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm-2 14l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                    </div>
                    <h5 class="tx-card__title mb-3">Planeación<br>Institucional</h5>
                    <p class="tx-card__desc text-muted mb-4">Documentos que orientan y dan seguimiento al cumplimiento de los objetivos y metas institucionales.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <svg class="ms-2" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></span>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="columna__3--lg columna__6--md">
                <a href="<?php echo esc_url( home_url('/informacion-financiera/') ); ?>" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark">
                    <div class="icon-bg-circle mb-4">
                        <svg class="tx-card__icon" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M3.5 18.5l6-6 4 4L22 6.92l-1.41-1.41-7.09 7.09-4-4-7.5 7.5 1.5 1.5z"/></svg>
                    </div>
                    <h5 class="tx-card__title mb-3">Información<br>Financiera</h5>
                    <p class="tx-card__desc text-muted mb-4">Estados financieros, dictámenes y documentación relacionada con la situación financiera de la institución.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <svg class="ms-2" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></span>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="columna__3--lg columna__6--md">
                <a href="<?php echo esc_url( home_url('/contrataciones-y-adquisiciones/') ); ?>" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark">
                    <div class="icon-bg-circle mb-4">
                        <svg class="tx-card__icon" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/></svg>
                    </div>
                    <h5 class="tx-card__title mb-3">Contrataciones<br>y Adquisiciones</h5>
                    <p class="tx-card__desc text-muted mb-4">Información relacionada con los procedimientos de contratación y adquisición de bienes y servicios.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <svg class="ms-2" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></span>
                </a>
            </div>

            <!-- Card 4 -->
            <div class="columna__3--lg columna__6--md">
                <a href="<?php echo esc_url( home_url('/archivo-documental/') ); ?>" class="sna-noticias-card rounded-4 h-100 d-flex flex-column align-items-center text-center px-4 py-5 w-100 text-decoration-none text-dark">
                    <div class="icon-bg-circle mb-4">
                        <svg class="tx-card__icon" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/></svg>
                    </div>
                    <h5 class="tx-card__title mb-3">Gestión<br>Documental</h5>
                    <p class="tx-card__desc text-muted mb-4">Instrumentos para la organización, conservación y administración de los archivos institucionales.</p>
                    <span class="btn-sesna-link mt-auto">Consultar <svg class="ms-2" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></span>
                </a>
            </div>

        </div>

        <!-- Instrucción Banner -->
        <div class="cp-instruccion-banner d-flex align-items-center gap-4">
            <svg class="text-guinda flex-shrink-0" style="font-size: 3rem; line-height: 1;" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M20.5 6c-2.61.7-5.67 1-8.5 1s-5.89-.3-8.5-1L3 8c1.86.5 4 .83 6 1v13h2v-6h2v6h2V9c2-.17 4.14-.5 6-1l-.5-2zM12 6c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg>
            <div class="tx-hero__subtitle text-muted m-0" style="max-width: 800px; line-height: 1.5;">
                Selecciona una de las siguientes categorías para <span class="text-guinda fw-bold" style="color: var(--color-burgundi);">consultar documentos, informes y recursos relacionados.</span>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
