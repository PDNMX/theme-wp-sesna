<?php
/**
 * Template Name: Transparencia - Comite de transparencia
 */

get_header();

/* Datos del "Comité de Transparencia" — contenido temporal (hardcoded) hasta
 * que exista una fuente de datos definitiva (CPT/ACF) para el expediente. */
$tx_comite_pdf_placeholder = 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf';
$tx_comite_grupos = [
    [
        'titulo' => 'Sesiones Extraordinarias 2024',
        'actas' => [
            'Acta primera sesión extraordinaria 2024',
        ],
    ],
    [
        'titulo' => 'Sesiones Ordinarias 2024',
        'actas' => [
            'Acta primera sesión ordinaria 2024',
            'Acta segunda sesión ordinaria 2024',
            'Acta tercera sesión ordinaria 2024',
            'Acta cuarta sesión ordinaria 2024',
            'Acta quinta sesión ordinaria 2024',
            'Acta sexta sesión ordinaria 2024',
        ],
    ],
];
?>

<div class="page-transparencia-comite">
    <!-- Migas de pan (Breadcrumb) -->
    <nav class="gobmx-breadcrumb-container" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/') ) ?>">
                        <i class="bi bi-house-door"></i> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/transparencia/') ) ?>">Transparencia</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Comité de Transparencia</li>
            </ol>
        </div>
    </nav>

    <!-- Encabezado de sección -->
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12">
                <p class="tx-modal__eyebrow mb-1">Transparencia</p>
                <h1 class="tx-section-title font-patria">Comité de Transparencia</h1>
                <div class="tx-meta-row d-flex flex-wrap gap-3 mt-3 p-3 bg-light border-bottom rounded-top-4">
                    <span class="tx-meta-chip"><span class="tx-meta-chip__dot" aria-hidden="true"></span><?= array_reduce($tx_comite_grupos, function($c, $g) { return $c + count($g['actas']); }, 0) ?> archivos en PDF</span>
                    <span class="tx-meta-chip"><span class="tx-meta-chip__dot" aria-hidden="true"></span>Vigencia 2024–2026</span>
                    <span class="tx-meta-chip tx-meta-chip--legal text-muted fst-italic flex-grow-1">Fundamento: Artículos 19 y 20 de la Ley General de Transparencia y Acceso a la Información Pública (LGTAIP)</span>
                </div>
            </div>
        </div>

        <!-- Contenedor Principal: Sidebar e Iframe -->
        <div class="row g-4 align-items-stretch">
            <!-- Columna Izquierda: Índice de Documentos -->
            <div class="col-lg-4">
                <div class="tx-comite-sidebar border rounded-4 p-3 bg-white h-100" style="max-height: 80vh; overflow-y: auto;">
                    <?php foreach ($tx_comite_grupos as $grupo): ?>
                        <div class="tx-modal__group mt-0 mb-4">
                            <h3 class="tx-modal__group-title">
                                <?= esc_html($grupo['titulo']) ?>
                                <span class="tx-modal__group-count"><?= count($grupo['actas']) ?></span>
                            </h3>
                            <ul class="tx-doc-list">
                                <?php foreach ($grupo['actas'] as $acta): ?>
                                    <li>
                                        <button type="button" class="tx-doc-row"
                                            data-pdf-url="<?= esc_url($tx_comite_pdf_placeholder) ?>"
                                            data-pdf-title="<?= esc_attr($acta) ?>"
                                            aria-label="Ver <?= esc_attr($acta) ?> en el visor de documentos">
                                            <span class="tx-doc-row__icon" aria-hidden="true"><i class="bi bi-file-earmark-pdf-fill"></i></span>
                                            <span class="tx-doc-row__name"><?= esc_html($acta) ?></span>
                                            <span class="tx-doc-row__hint">Ver PDF <i class="bi bi-arrow-right" aria-hidden="true"></i></span>
                                        </button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Columna Derecha: Visor de PDF -->
            <div class="col-lg-8">
                <div class="tx-viewer-page border rounded-4 bg-light d-flex flex-column h-100" id="tx-viewer-page" style="min-height: 70vh;">
                    <div class="tx-viewer__bar bg-white border-bottom rounded-top-4 d-flex align-items-center justify-content-between p-3 flex-wrap gap-2">
                        <span class="tx-viewer__title fs-5 fw-bold text-truncate" id="tx-viewer-title">
                            Selecciona un documento para visualizarlo
                        </span>
                        <div class="tx-viewer__actions" id="tx-viewer-actions" style="display: none;">
                            <a href="#" id="tx-viewer-open" target="_blank" rel="noopener noreferrer" class="text-decoration-none">
                                <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i> Nueva pestaña
                            </a>
                            <a href="#" id="tx-viewer-download" download class="text-decoration-none">
                                <i class="bi bi-download" aria-hidden="true"></i> Descargar
                            </a>
                        </div>
                    </div>
                    <div class="tx-viewer__frame-wrap flex-grow-1 p-3 d-flex flex-column">
                        <div id="tx-viewer-empty" class="flex-grow-1 d-flex flex-column align-items-center justify-content-center text-muted">
                            <i class="bi bi-file-earmark-pdf" style="font-size: 4rem; opacity: 0.5;"></i>
                            <p class="mt-3 fs-5">El documento seleccionado aparecerá aquí</p>
                        </div>
                        <iframe id="tx-viewer-frame" class="w-100 flex-grow-1 border-0 rounded shadow-sm" style="display: none; min-height: 650px;" title="Visor de documento PDF"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
