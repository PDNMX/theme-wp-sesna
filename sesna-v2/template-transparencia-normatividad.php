<?php

/**
* Template Name: Transparencia - Normatividad
*/

get_header();

/**
 * Renderiza una fila moderna del listado de documentos (DRY Helper)
 */
if (!function_exists('sesna_render_document_row')) {
    function sesna_render_document_row() {
        $file_url = get_the_file('archivo', false);
        $has_file = ($file_url !== '#');
        ?>
        <div class="list-group-item bg-white p-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4 border-light">
            <div class="d-flex align-items-start align-items-md-center gap-3 flex-grow-1">
                <!-- Icon container -->
                <div class="flex-shrink-0 bg-danger bg-opacity-10 text-danger rounded-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;" aria-hidden="true">
                    <i class="bi bi-file-earmark-pdf-fill fs-4"></i>
                </div>
                
                <!-- Content -->
                <div class="d-flex flex-column justify-content-center">
                    <h3 class="h6 font-patria mb-1 text-dark fw-bold lh-base"><?php the_title(); ?></h3>
                    <div class="d-flex align-items-center gap-2 mt-1">
                        <?php if ($has_file) : ?>
                            <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle fw-medium rounded-pill px-2 py-1"><i class="bi bi-check-circle me-1"></i> Disponible</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="flex-shrink-0 text-md-end mt-2 mt-md-0 ms-md-4">
                <?php if ($has_file): ?>
                <a href="<?= esc_url($file_url) ?>" class="btn btn-outline-danger px-4 rounded-pill fw-semibold d-inline-flex align-items-center gap-2 shadow-sm" target="_blank" rel="noopener" aria-label="Descargar PDF de <?php echo esc_attr(get_the_title()); ?>">
                    Descargar <i class="bi bi-download fs-6" aria-hidden="true"></i>
                </a>
                <?php else: ?>
                <span class="btn btn-light px-4 rounded-pill fw-medium text-muted disabled d-inline-flex align-items-center gap-2" aria-disabled="true">
                    No disponible <i class="bi bi-dash-circle fs-6" aria-hidden="true"></i>
                </span>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}
?>

<div class="page-transparencia has-fullbleed-hero">

    <!-- MIGAS DE PAN (BREADCRUMB) -->
    <nav class="gobmx-breadcrumb-container" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>">
                        <i class="bi bi-house-door"></i> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/transparencia/') ); ?>">
                        Transparencia
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Normativa</li>
            </ol>
        </div>
    </nav>

    <!-- HERO / BANNER PRINCIPAL -->
    <div class="container py-4 mt-2" aria-label="Encabezado de Normativa">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="tx-section-title font-patria mb-2 tx-comite-title" style="color: #9f2241; font-weight: bold;">Normatividad</h1>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <p class="text-dark fs-5 font-noto-sans" style="max-width: 800px; margin-bottom: 0;">
                    Consulta la información en materia de transparencia: leyes, lineamientos y demás disposiciones que rigen el acceso a la información pública.
                </p>
            </div>
        </div>
    </div>

    <!-- LISTADO DE NORMATIVIDAD -->
                <section class="tx-normativa py-5">
        <div class="container">

            <div class="card border border-light shadow-sm rounded-4 mb-5" style="background-color: #ffffff;">
                <!-- Decorative top line (Dorado GOB.mx) -->
                <div style="height: 4px; width: 100px; background-color: #B38E5D; border-top-left-radius: 10px;"></div>
                
                <div class="card-body p-4 p-md-5">
                    
                    <!-- Header Section -->
                    <div class="d-flex align-items-start gap-4 mb-5">
                        <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px; background-color: #F2F2F2; color: #9F2241; border: 1px solid #EAEAEA;">
                            <i class="bi bi-shield-check fs-1"></i>
                        </div>
                        <div>
                            <h2 class="h4 fw-bold font-patria mb-2" style="color: #9F2241;">Normativa en materia de transparencia</h2>
                            <p class="mb-0 font-noto-sans" style="font-size: 1rem; color: #545454;">Consulta la normativa aplicable en materia de transparencia, acceso a la información, protección de datos personales y gestión documental.</p>
                        </div>
                    </div>

                    <!-- Table (Flexbox Responsive Layout) -->
                    <div class="border rounded-3 overflow-hidden" style="border-color: #EAEAEA !important;">
                        <!-- Desktop Header -->
                        <div class="d-none d-md-flex align-items-center border-bottom" style="background-color: #F9F9F9; border-color: #EAEAEA !important;">
                            <div class="py-3 px-4 fw-bold font-noto-sans" style="width: 70%; font-size: 0.95rem; color: #545454;">Documento</div>
                            <div class="py-3 px-4 fw-bold font-noto-sans text-center" style="width: 30%; font-size: 0.95rem; color: #545454;">Tipo de documento</div>
                        </div>
                        
                        <!-- Rows -->
                        <div class="bg-white">
                            <?php
                            $normatividad_externa = [
                                [
                                    'titulo' => 'Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados.',
                                    'tipo' => 'Ley',
                                    'url' => 'https://www.diputados.gob.mx/LeyesBiblio/pdf/LGPDPPSO.pdf'
                                ],
                                [
                                    'titulo' => 'Ley General de Transparencia y Acceso a la Información Pública.',
                                    'tipo' => 'Ley',
                                    'url' => 'https://www.diputados.gob.mx/LeyesBiblio/pdf/LGTAIP.pdf'
                                ],
                                [
                                    'titulo' => 'Ley General de Archivo.',
                                    'tipo' => 'Ley',
                                    'url' => 'https://www.diputados.gob.mx/LeyesBiblio/pdf/LGA.pdf'
                                ]
                            ];
                            
                            foreach ($normatividad_externa as $index => $doc) :
                            ?>
                            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center p-4 <?= $index < count($normatividad_externa) - 1 ? 'border-bottom' : '' ?>" style="border-color: #F2F2F2 !important;">
                                
                                <!-- Document Info -->
                                <div class="d-flex align-items-center gap-3 gap-md-4 mb-3 mb-md-0 w-100" style="flex: 1 1 70%;">
                                    <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px; background-color: #F9F9F9; color: #9F2241; border: 1px solid #EAEAEA;">
                                        <i class="bi bi-book fs-4"></i>
                                    </div>
                                    <div>
                                        <h3 class="h6 font-noto-sans mb-0 fw-bold lh-base" style="color: #333333;"><?= esc_html($doc['titulo']) ?></h3>
                                    </div>
                                </div>

                                <!-- Type and Action -->
                                <div class="d-flex flex-row align-items-center justify-content-between justify-content-md-center gap-3 gap-md-4 gap-lg-5 w-100 mt-2 mt-md-0" style="flex: 1 1 30%;">
                                    <span class="badge rounded-pill font-noto-sans px-4 py-2" style="background-color: #F2F2F2; color: #545454; font-weight: 500; font-size: 0.9rem; border: 1px solid #EAEAEA;"><?= esc_html($doc['tipo']) ?></span>
                                    
                                    <a href="<?= esc_url($doc['url']) ?>" target="_blank" rel="noopener noreferrer" class="text-decoration-none text-center d-flex flex-column align-items-center rounded-3 p-2 border" style="color: #9F2241; border-color: #9F2241 !important; background-color: #fff; width: 70px; transition: all 0.2s;" onmouseover="this.style.backgroundColor='#9F2241'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='#fff'; this.style.color='#9F2241';" aria-label="Consultar <?= esc_attr($doc['titulo']) ?>">
                                        <i class="bi bi-box-arrow-up-right fs-5 mb-1"></i>
                                        <span class="font-noto-sans" style="font-size: 0.75rem; font-weight: 600;">Consultar</span>
                                    </a>
                                </div>

                            </div>
                            <?php endforeach; ?>
                        </div></div>

                </div>
            </div>

            <!-- Botón de redirección -->
            <div class="card border border-light rounded-4 overflow-hidden shadow-sm" style="background-color: #F9F9F9;">
                <div class="card-body p-4 p-md-5 d-flex flex-column flex-md-row align-items-center justify-content-between gap-4">
                    <div class="d-flex align-items-center gap-4">
                        <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px; background-color: #FFFFFF; color: #9F2241; border: 1px solid #EAEAEA;">
                            <i class="bi bi-bank fs-2"></i>
                        </div>
                        <div>
                            <h3 class="h5 fw-bold font-patria mb-1" style="color: #9F2241;">¿Deseas consultar más normatividad?</h3>
                            <p class="mb-0 font-noto-sans" style="font-size: 1rem; color: #545454;">Visita la sección de Órganos Colegiados y Normatividad de la SESNA.</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 mt-4 mt-md-0 align-self-stretch align-self-md-auto text-md-end">
                        <a href="javascript:void(0)" class="btn btn-primary btn-lg d-block d-md-inline-flex align-items-center justify-content-center gap-2" style="background-color: #9F2241 !important; color: #FFFFFF !important; border: 1px solid #9F2241 !important; border-radius: 8px !important; white-space: normal; padding: 12px 24px;">
                            Ir a Órganos Colegiados y Normatividad <i class="bi bi-chevron-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>



<?php
get_footer();
