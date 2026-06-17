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
    <section class="py-5" aria-label="Encabezado de Normativa">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-8 col-lg-7">
                    <h1 class="fw-bold mb-3 font-patria text-burgundi" style="font-size: 2.5rem;">
                        Normativa
                    </h1>
                    <p class="text-muted" style="font-size: 1.1rem;">
                        Disposiciones legales, reglamentarias y administrativas para la transparencia.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- LISTADO DE NORMATIVIDAD -->
    <section class="tx-normativa py-5">
        <div class="container">

            <!-- 1. MARCO NORMATIVO -->
            <div class="mb-5">
                <div class="row"><div class="col-md-8">
                    <h2 class="tx-section-title font-patria mb-4">Marco Normativo</h2>
                </div></div>
                <div class="list-group shadow-sm rounded-4 border-0">
                    <?php 
                    global $post;
                    $archivos = get_posts([
                        'post_type'=>'normatividad',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo_normatividad',
                                'field'    => 'slug',
                                'terms'    => 'marco-normativo',
                            ),
                        ),
                    ]);
                    
                    if ( $archivos ) :
                        foreach( $archivos as $archivo ): $post = $archivo; setup_postdata($post);
                            sesna_render_document_row();
                        endforeach; wp_reset_postdata();
                    else: ?>
                        <div class="list-group-item p-5 text-center bg-light border-0">
                            <i class="bi bi-folder-x fs-1 text-secondary opacity-50 mb-3 d-block"></i>
                            <p class="mb-0 fs-5 fw-medium text-muted">No hay documentos disponibles en esta sección.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- 2. NORMATIVIDAD INTERNA -->
            <div class="mb-5">
                <div class="row"><div class="col-md-8">
                    <h2 class="tx-section-title font-patria mb-4">Normatividad Interna</h2>
                </div></div>
                <div class="list-group shadow-sm rounded-4 border-0">
                    <?php 
                    $archivos = get_posts([
                        'post_type'=>'normatividad',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo_normatividad',
                                'field'    => 'slug',
                                'terms'    => 'normatividad-interna',
                            ),
                        ),
                    ]);
                    
                    if ( $archivos ) :
                        foreach( $archivos as $archivo ): $post = $archivo; setup_postdata($post);
                            sesna_render_document_row();
                        endforeach; wp_reset_postdata();
                    else: ?>
                        <div class="list-group-item p-5 text-center bg-light border-0">
                            <i class="bi bi-folder-x fs-1 text-secondary opacity-50 mb-3 d-block"></i>
                            <p class="mb-0 fs-5 fw-medium text-muted">No hay documentos disponibles en esta sección.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- 3. NORMATIVIDAD EN MATERIA DE TRANSPARENCIA -->
            <div class="mb-5">
                <div class="row"><div class="col-md-8">
                    <h2 class="tx-section-title font-patria mb-4">Normatividad en Materia de Transparencia</h2>
                </div></div>
                <div class="list-group shadow-sm rounded-4 border-0">
                    <?php 
                    $archivos = get_posts([
                        'post_type'=>'normatividad',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo_normatividad',
                                'field'    => 'slug',
                                'terms'    => 'normatividad-en-materia-de-transparencia',
                            ),
                        ),
                    ]);
                    
                    if ( $archivos ) :
                        foreach( $archivos as $archivo ): $post = $archivo; setup_postdata($post);
                            sesna_render_document_row();
                        endforeach; wp_reset_postdata();
                    else: ?>
                        <div class="list-group-item p-5 text-center bg-light border-0">
                            <i class="bi bi-folder-x fs-1 text-secondary opacity-50 mb-3 d-block"></i>
                            <p class="mb-0 fs-5 fw-medium text-muted">No hay documentos disponibles en esta sección.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </section>

</div>

<?php get_template_part( 'template-parts/transparencia/denuncia' ); ?>

<?php
get_footer();
