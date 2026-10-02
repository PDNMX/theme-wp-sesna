<?php

/**
* Template Name: Transparencia - Normativa
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
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"/></svg>
                </div>
                
                <!-- Content -->
                <div class="d-flex flex-column justify-content-center">
                    <h3 class="h6 font-patria mb-1 text-dark fw-bold lh-base"><?php the_title(); ?></h3>
                    <div class="d-flex align-items-center gap-2 mt-1">
                        <?php if ($has_file) : ?>
                            <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle fw-medium rounded-pill px-2 py-1"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="me-1"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg> Disponible</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="flex-shrink-0 text-md-end mt-2 mt-md-0 ms-md-4">
                <?php if ($has_file): ?>
                <a href="<?= esc_url($file_url) ?>" class="btn btn-outline-danger px-4 rounded-pill fw-semibold d-inline-flex align-items-center gap-2 shadow-sm" target="_blank" rel="noopener" aria-label="Descargar PDF de <?php echo esc_attr(get_the_title()); ?>">
                    Consultar <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
                </a>
                <?php else: ?>
                <span class="btn btn-light px-4 rounded-pill fw-medium text-muted disabled d-inline-flex align-items-center gap-2" aria-disabled="true">
                    No disponible <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm-3.5 12.5l-2.5-2.5-2.5 2.5L4 13l2.5-2.5L4 8l1.5-1.5 2.5 2.5 2.5-2.5L12 8l-2.5 2.5L12 13l-1.5 1.5zM13 9V3.5L18.5 9H13z"/></svg>
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
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Inicio
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
    <div class="contenedor py-4 mt-2" aria-label="Encabezado de Normativa">
        <div class="fila mb-2">
            <div class="col-100">
                <h1 class="tx-section-title font-patria mb-2 tx-comite-title" style="color: #9f2241; font-weight: bold;">Normativa</h1>
            </div>
        </div>
        <div class="fila mb-2">
            <div class="col-100">
                <p class="text-dark fs-5 font-noto-sans" style="max-width: 800px; margin-bottom: 0;">
                    Consulta la información en materia de transparencia: leyes, lineamientos y demás disposiciones que rigen el acceso a la información pública.
                </p>
            </div>
        </div>
    </div>

    <!-- LISTADO DE NORMATIVA -->
                <section class="tx-normativa py-5">
        <div class="contenedor">

            <div class="card border border-light shadow-sm rounded-4 mb-5" style="background-color: #ffffff;">
                <!-- Decorative top line (Dorado GOB.mx) -->
                <div style="height: 4px; width: 100px; background-color: #B38E5D; border-top-left-radius: 10px;"></div>
                
                <div class="card-body p-4 p-md-5">
                    
                    <!-- Header Section -->
                    <div class="d-flex align-items-start gap-4 mb-5">
                        <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px; background-color: #F2F2F2; color: #9F2241; border: 1px solid #EAEAEA;">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                        </div>
                        <div>
                            <h2 class="h4 fw-bold font-patria mb-2" style="color: #9F2241;">Normativa en materia de transparencia</h2>
                            <p class="mb-0 font-noto-sans" style="font-size: 0.85rem; font-weight: 300; color: #888888;">Consulta la normativa aplicable en materia de transparencia, acceso a la información, protección de datos personales y gestión documental.</p>
                        </div>
                    </div>

                    <!-- Table (Minimalist Layout) -->
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
                                <?php
                                $normatividad_externa = [
                                    [
                                        'titulo' => 'Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados.',
                                        'tipo' => 'Ley',
                                        'url' => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lgpdppso.htm'
                                    ],
                                    [
                                        'titulo' => 'Ley General de Transparencia y Acceso a la Información Pública.',
                                        'tipo' => 'Ley',
                                        'url' => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lgtaip.htm'
                                    ],
                                    [
                                        'titulo' => 'Ley General de Archivo.',
                                        'tipo' => 'Ley',
                                        'url' => 'https://www.diputados.gob.mx/LeyesBiblio/ref/lga.htm'
                                    ]
                                ];
                                
                                foreach ($normatividad_externa as $index => $doc) :
                                ?>
                                    <tr>
                                        <td><div class="h6 fw-bold mb-2 font-patria tx-sesion-info-title"><?= esc_html($doc['titulo']) ?></div></td>
                                        <td><div class="font-noto-sans tx-sesion-info-type"><?= esc_html($doc['tipo']) ?></div></td>
                                    <td>
                                        <a href="<?= esc_url($doc['url']) ?>" target="_blank" rel="noopener noreferrer" class="tx-table-normatividad-link" aria-label="Consultar <?= esc_attr($doc['titulo']) ?>">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="tx-table-normatividad-link-icon"><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg>
                                            <span class="tx-table-normatividad-link-label">Consultar</span>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- Botón de redirección -->
            <div class="card border border-light rounded-4 overflow-hidden shadow-sm" style="background-color: #F9F9F9;">
                <div class="card-body p-4 p-md-5 d-flex flex-column flex-md-row align-items-center justify-content-between gap-4">
                    <div class="d-flex align-items-center gap-4">
                        <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px; background-color: #FFFFFF; color: #9F2241; border: 1px solid #EAEAEA;">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M11.5 1L2 6v2h19V6l-9.5-5zM16 10h-2v7h2v-7zm-3 0h-2v7h2v-7zm-5 0H6v7h2v-7zm-4 8v2h15v-2H4z"/></svg>
                        </div>
                        <div>
                            <h3 class="h5 fw-bold font-patria mb-1" style="color: #9F2241;">¿Deseas consultar más normativa?</h3>
                            <p class="mb-0 font-noto-sans" style="font-size: 1rem; color: #545454;">Visita la sección de Órganos Colegiados y Normativa de la SESNA.</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 mt-4 mt-md-0 align-self-stretch align-self-md-auto text-md-end">
                        <a href="<?php echo esc_url( home_url('/marco-normativo/') ); ?>" class="sna-entradas-archive-link d-inline-flex align-items-center justify-content-center m-0" style="padding: 10px 24px; font-size: 16px;">
                            Marco Normativo<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="ms-2"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>



<?php
get_footer();
