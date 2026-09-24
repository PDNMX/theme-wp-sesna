<?php
/**
 * Contenido: Planeación Institucional
 * Compartido entre page-planeacion-institucional.php y el panel dinámico
 * "Planeación Institucional" de page-administracion-finanzas.php.
 */

$pi_grupos = array(
    array(
        'titulo' => 'Programa Institucional',
        'icono'  => 'bi-book',
        'bg'     => '#F9F0F3',
        'color'  => '#611232',
        'nota'   => 'Documento rector que establece los objetivos, estrategias y líneas de acción de la SESNA.',
        'docs'   => array(
            array( 'label' => 'Programa Institucional SESNA 2025-2030', 'url' => '/wp-content/uploads/2025/10/2025_08_29_PI_2025-2030_sesna.pdf', 'disponible' => true ),
            array( 'label' => 'Programa Institucional SESNA 2020-2024', 'url' => '/wp-content/uploads/2020/06/2020_06_17_MAT_sesna.pdf', 'disponible' => true ),
        ),
    ),
    array(
        'titulo' => 'Informes del Programa Institucional 2020-2024',
        'icono'  => 'bi-graph-up-arrow',
        'bg'     => '#EEE8F5',
        'color'  => '#72588F',
        'nota'   => 'Informes anuales de avance y resultados del Programa Institucional de la SESNA.',
        'docs'   => array(
            array( 'label' => 'Informe de Avance y Resultados 2023-2024', 'url' => '/wp-content/uploads/2024/09/Informe-de-Avance-y-Resultados-2023-2024.pdf', 'disponible' => true ),
            array( 'label' => 'Consulta el informe 2022', 'url' => '/wp-content/uploads/2023/05/Informe-de-Avance-y-Resultados-PI-SESNA-2022.pdf', 'disponible' => true ),
            array( 'label' => 'Consulta el informe 2021', 'url' => '/wp-content/uploads/2022/05/Informe-Avance-y-Resultados-PI-SESNA-2021.pdf', 'disponible' => true ),
            array( 'label' => 'Consulta el informe 2020', 'url' => '/wp-content/uploads/2021/05/Informe-Avance-y-Resultados-2020.pdf', 'disponible' => true ),
        ),
    ),
    array(
        'titulo' => 'Informes de Autoevaluación de la Gestión',
        'icono'  => 'bi-clipboard-data',
        'bg'     => '#F9F0F3',
        'color'  => '#611232',
        'nota'   => 'Informes de autoevaluación semestrales y anuales de la SESNA.',
        'docs'   => array(
            array( 'label' => 'Informe de Autoevaluación de la Gestión Anual 2025', 'url' => '/wp-content/uploads/2026/05/informe_autoevaluacion_gestion_anual_sesna_2025.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión 1er Semestre 2025', 'url' => '/wp-content/uploads/2025/11/Informe-de-Evaluacion-de-la-Gestion-SESNA-1erS_2025-c_a0.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión Anual 2024', 'url' => '/wp-content/uploads/2025/11/Informe-de-Evaluacion-de-la-Gestion-SESNA-2S_2024_-Nuevos-TdR_120820250.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión 1er Semestre 2024', 'url' => '/wp-content/uploads/2024/09/Informe-de-Evaluacion-de-la-Gestion-SESNA-1erS_2024_-Nuevos-TdR-002.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión Anual 2023', 'url' => '/wp-content/uploads/2023/10/Informe-Anual-de-Autoevaluacion-SESNA-2023_.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión 1er Semestre 2023', 'url' => '/wp-content/uploads/2023/10/Informe-Semestral-de-Gestion-SESNA-2023_.pdf', 'disponible' => true ),
        ),
    ),
);
?>
<div class="page-pna-planeacion cf-search-scope">

    <!-- Encabezado -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-bg-circle flex-shrink-0" style="background-color: #611232;">
                <i class="bi bi-clipboard-check" style="color: #fff;"></i>
            </div>
            <div>
                <h2 class="h3 fw-bold font-patria mb-1" style="color: #611232;">Planeación Institucional</h2>
                <p class="text-muted mb-0" style="font-size: 15px;">Documentos que orientan y dan seguimiento al cumplimiento de los objetivos y metas institucionales.</p>
            </div>
        </div>
        <div class="fin-search flex-shrink-0">
            <i class="bi bi-search"></i>
            <input type="search" class="cf-search-input" placeholder="Buscar documento" aria-label="Buscar documento">
        </div>
    </div>

    <div class="row g-4">
        <?php foreach ( $pi_grupos as $i => $grupo ) : ?>
        <div class="col-lg-4 col-md-6 pna-chart-card" style="--delay:<?php echo esc_attr( $i * .1 ); ?>s">
            <div class="card border rounded-4 h-100 d-flex flex-column p-3" style="border-color: #e8d0d8 !important;">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="icon-bg-circle icon-bg-circle--sm flex-shrink-0" style="background-color: <?php echo esc_attr( $grupo['bg'] ); ?>;">
                        <i class="bi <?php echo esc_attr( $grupo['icono'] ); ?>" style="color: <?php echo esc_attr( $grupo['color'] ); ?>;"></i>
                    </div>
                    <h3 class="h6 fw-bold mb-0 font-noto-sans" style="color: #611232; line-height: 1.3;"><?php echo esc_html( $grupo['titulo'] ); ?></h3>
                </div>
                <div class="d-flex flex-column flex-grow-1">
                    <?php foreach ( $grupo['docs'] as $doc ) :
                        $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                        if ( $doc['disponible'] ) : ?>
                    <a href="<?php echo esc_url( $doc['url'] ); ?>"
                       class="pna-doc-item cf-doc-row px-2 py-2 rounded-3 text-decoration-none"
                       data-bs-toggle="modal" data-bs-target="#pdfViewerModal"
                       data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                       data-pdf-title="<?php echo esc_attr( $doc['label'] ); ?>"
                       data-cf-search="<?php echo $search_attr; ?>"
                       style="color: #333;">
                        <span class="font-noto-sans" style="font-size: 13px;"><?php echo esc_html( $doc['label'] ); ?></span>
                        <span class="cf-doc-view" data-tooltip="Ver documento" aria-hidden="true"><i class="bi bi-file-earmark-text"></i></span>
                        <span class="visually-hidden">Ver documento</span>
                    </a>
                    <?php else : ?>
                    <div class="cf-doc-row px-2 py-2 rounded-3" data-cf-search="<?php echo $search_attr; ?>">
                        <span class="font-noto-sans text-muted" style="font-size: 13px;"><?php echo esc_html( $doc['label'] ); ?></span>
                        <span class="badge rounded-pill" style="background-color: #f0e9f0; color: #9c8a94; font-weight: 600; font-size: 10px; padding: 4px 10px; white-space: nowrap; justify-self: start;">Próximamente</span>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="mt-3 pt-3 d-flex align-items-start gap-2" style="border-top: 1px solid #e8d0d8;">
                    <i class="bi bi-info-circle text-muted flex-shrink-0" style="font-size: 13px; margin-top: 2px;"></i>
                    <span class="text-muted font-noto-sans" style="font-size: 12px;"><?php echo esc_html( $grupo['nota'] ); ?></span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>
