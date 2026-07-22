<?php
/**
 * Template Name: Transparencia - Comite de transparencia
 */

get_header();

// Datos hardcodeados (mockup) según el diseño para maquetación inicial
$sesiones = [
    [
        'dia' => '18',
        'mes' => 'DIC',
        'anio' => '2024',
        'titulo' => 'Primera Sesión Extraordinaria 2024',
        'tipo' => 'Extraordinaria',
        'enlace' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
    ],
    [
        'dia' => '15',
        'mes' => 'NOV',
        'anio' => '2024',
        'titulo' => 'Tercera Sesión Ordinaria 2024',
        'tipo' => 'Ordinaria',
        'enlace' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
    ],
    [
        'dia' => '21',
        'mes' => 'AGO',
        'anio' => '2024',
        'titulo' => 'Segunda Sesión Ordinaria 2024',
        'tipo' => 'Ordinaria',
        'enlace' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
    ],
    [
        'dia' => '28',
        'mes' => 'FEB',
        'anio' => '2024',
        'titulo' => 'Primera Sesión Ordinaria 2024',
        'tipo' => 'Ordinaria',
        'enlace' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
    ],
];

$resoluciones = [
    [
        'dia' => '12',
        'mes' => 'OCT',
        'anio' => '2026',
        'titulo' => 'Resolución de la Tercera Sesión Extraordinaria 2026',
        'numero' => 'Resolución CT/003/2026',
        'enlace' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
    ],
    [
        'dia' => '05',
        'mes' => 'SEP',
        'anio' => '2026',
        'titulo' => 'Resolución de la Primera Sesión Ordinaria 2026',
        'numero' => 'Resolución CT/002/2026',
        'enlace' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
    ],
    [
        'dia' => '20',
        'mes' => 'AGO',
        'anio' => '2025',
        'titulo' => 'Resolución de la Cuarta Sesión Ordinaria 2025',
        'numero' => 'Resolución CT/004/2025',
        'enlace' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
    ],
    [
        'dia' => '10',
        'mes' => 'JUL',
        'anio' => '2025',
        'titulo' => 'Resolución de la Tercera Sesión Ordinaria 2025',
        'numero' => 'Resolución CT/003/2025',
        'enlace' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
    ]
];
?>

<div class="page-transparencia-comite front-page-bg pb-5">
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

    <!-- Contenedor Principal -->
    <div class="container py-4">
        
        <!-- Títulos -->
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="tx-section-title font-patria mb-2 tx-comite-title">Comité de Transparencia</h1>
            </div>
        </div>

        <!-- Tabs -->
        <div class="tx-comite-tabs-container">
            <ul class="nav nav-tabs tx-comite-tabs" id="comiteTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="sesiones-tab" data-bs-toggle="tab" data-bs-target="#sesiones-pane" type="button" role="tab" aria-controls="sesiones-pane" aria-selected="true">
                        <i class="bi bi-list-ul"></i> Sesiones
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="resoluciones-tab" data-bs-toggle="tab" data-bs-target="#resoluciones-pane" type="button" role="tab" aria-controls="resoluciones-pane" aria-selected="false">
                        <i class="bi bi-clipboard-check"></i> Resoluciones
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content tx-comite-tab-content" id="comiteTabsContent">
            <!-- TAB: SESIONES -->
            <div class="tab-pane fade show active" id="sesiones-pane" role="tabpanel" aria-labelledby="sesiones-tab" tabindex="0">
                
                <!-- Filtros Sesiones -->
                <div class="row mb-5 align-items-end">
                    <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                        <label for="filter-anio" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Año</label>
                        <select id="filter-anio" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                            <option>2024</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <label for="filter-tipo" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Tipo de sesión</label>
                        <select id="filter-tipo" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                            <option>Todas</option>
                        </select>
                    </div>
                </div>

                <!-- Lista de Sesiones -->
                <div class="d-flex flex-column gap-3">
                    <?php foreach ($sesiones as $sesion): ?>
                    <!-- Card Item -->
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3">
                        <div class="card-body p-0 d-flex flex-column flex-md-row align-items-md-stretch">
                            
                            <!-- Date Column -->
                            <div class="tx-sesion-date text-center p-3 p-md-4 d-flex flex-column justify-content-center">
                                <div class="fw-bold lh-1 font-noto-sans text-dark tx-sesion-date-day"><?= esc_html($sesion['dia']) ?></div>
                                <div class="text-uppercase fw-semibold mt-2 tx-sesion-date-month"><?= esc_html($sesion['mes']) ?></div>
                                <div class="fw-semibold tx-sesion-date-year"><?= esc_html($sesion['anio']) ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="p-4 ps-md-4 flex-grow-1 d-flex flex-column justify-content-center">
                                <h3 class="h5 fw-bold mb-2 font-noto-sans tx-sesion-info-title"><?= esc_html($sesion['titulo']) ?></h3>
                                <p class="mb-0 font-noto-sans tx-sesion-info-type"><strong>Tipo:</strong> <?= esc_html($sesion['tipo']) ?></p>
                            </div>

                            <!-- Action Column -->
                            <div class="tx-sesion-action d-flex align-items-center justify-content-md-end p-4 gap-4 ms-md-auto">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pdfViewerModal" data-pdf-url="<?= esc_url($sesion['enlace']) ?>" data-pdf-title="<?= esc_attr($sesion['titulo']) ?>" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link">
                                    <i class="bi bi-filetype-pdf tx-sesion-pdf-icon"></i>
                                    <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Acta</div>
                                </a>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pdfViewerModal" data-pdf-url="<?= esc_url($sesion['enlace']) ?>" data-pdf-title="<?= esc_attr($sesion['titulo']) ?>" class="tx-sesion-chevron-link text-decoration-none ms-2">
                                    <i class="bi bi-chevron-right tx-sesion-chevron-icon" style="stroke-width: 2px;"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Ver más Sesiones -->
                <div class="text-center mt-5">
                    <a href="#" class="tx-comite-btn-more">
                        Ver más sesiones <i class="bi bi-chevron-down"></i>
                    </a>
                </div>

            </div>

            <!-- TAB: RESOLUCIONES -->
            <div class="tab-pane fade" id="resoluciones-pane" role="tabpanel" aria-labelledby="resoluciones-tab" tabindex="0">
                
                <!-- Filtros Resoluciones -->
                <div class="row mb-5 align-items-end">
                    <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                        <label for="filter-anio-res" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Año</label>
                        <select id="filter-anio-res" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                            <option>2026</option>
                            <option>2025</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <label for="search-res" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Número de resolución</label>
                        <div class="position-relative">
                            <input type="text" id="search-res" class="form-control font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-search-input tx-comite-filter-control" placeholder="Buscar resolución...">
                            <i class="bi bi-search tx-comite-search-icon"></i>
                        </div>
                    </div>
                </div>

                <!-- Lista de Resoluciones -->
                <div class="d-flex flex-column gap-3">
                    <?php foreach ($resoluciones as $res): ?>
                    <!-- Card Item -->
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3">
                        <div class="card-body p-0 d-flex flex-column flex-md-row align-items-md-stretch">
                            
                            <!-- Date Column (Homologated) -->
                            <div class="tx-sesion-date text-center p-3 p-md-4 d-flex flex-column justify-content-center">
                                <div class="fw-bold lh-1 font-noto-sans text-dark tx-sesion-date-day"><?= esc_html($res['dia']) ?></div>
                                <div class="text-uppercase fw-semibold mt-2 tx-sesion-date-month"><?= esc_html($res['mes']) ?></div>
                                <div class="fw-semibold tx-sesion-date-year"><?= esc_html($res['anio']) ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="p-4 ps-md-4 flex-grow-1 d-flex flex-column justify-content-center">
                                <h3 class="h5 fw-bold mb-2 font-noto-sans tx-sesion-info-title"><?= esc_html($res['titulo']) ?></h3>
                                <p class="mb-0 font-noto-sans tx-sesion-info-type"><strong>Número:</strong> <?= esc_html($res['numero']) ?></p>
                            </div>

                            <!-- Action Column -->
                            <div class="tx-sesion-action d-flex align-items-center justify-content-md-end p-4 gap-4 ms-md-auto">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pdfViewerModal" data-pdf-url="<?= esc_url($res['enlace']) ?>" data-pdf-title="<?= esc_attr($res['titulo']) ?>" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link">
                                    <i class="bi bi-filetype-pdf tx-sesion-pdf-icon"></i>
                                    <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Resolución</div>
                                </a>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pdfViewerModal" data-pdf-url="<?= esc_url($res['enlace']) ?>" data-pdf-title="<?= esc_attr($res['titulo']) ?>" class="tx-sesion-chevron-link text-decoration-none ms-2">
                                    <i class="bi bi-chevron-right tx-sesion-chevron-icon" style="stroke-width: 2px;"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Ver más Resoluciones -->
                <div class="text-center mt-5">
                    <a href="#" class="tx-comite-btn-more">
                        Ver más resoluciones <i class="bi bi-chevron-down"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- Modal Visor PDF -->
<div class="modal fade tx-pdf-modal" id="pdfViewerModal" tabindex="-1" aria-labelledby="pdfViewerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0 shadow-lg rounded-0 overflow-hidden">
            <div class="modal-header bg-light border-0 py-3 position-relative d-flex align-items-center">
                <h5 class="modal-title fw-bold font-noto-sans tx-comite-title mb-0" id="pdfViewerModalLabel">Visor de Documento</h5>
                
                <div class="position-absolute top-50 start-50 translate-middle">
                    <a href="#" id="pdfDownloadBtn" class="tx-pdf-download-btn px-4 py-2 font-noto-sans" download target="_blank">
                        <i class="bi bi-download" style="margin-right: 0.5rem;"></i> Descargar PDF
                    </a>
                </div>

                <button type="button" class="close position-absolute" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Cerrar" style="right: 1.5rem; top: 50%; transform: translateY(-50%); font-size: 2.5rem; background: none; border: none; padding: 0; color: #000; opacity: 0.5; line-height: 1;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0 bg-dark position-relative">
                <!-- Loader spinner -->
                <div id="pdfLoader" class="position-absolute top-50 start-50 translate-middle text-white text-center">
                    <div class="spinner-border mb-2" role="status"></div>
                    <div class="font-noto-sans small">Cargando documento...</div>
                </div>
                <iframe id="pdfIframe" src="" class="w-100 h-100 border-0 position-relative" style="z-index: 2;" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const pdfModal = document.getElementById('pdfViewerModal');
    if(pdfModal) {
        const iframe = document.getElementById('pdfIframe');
        const downloadBtn = document.getElementById('pdfDownloadBtn');
        const loader = document.getElementById('pdfLoader');
        const title = document.getElementById('pdfViewerModalLabel');

        pdfModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            const button = event.relatedTarget;
            
            // Allow clicking outside triggers (like direct links) to work normally
            if(!button) return;

            const pdfUrl = button.getAttribute('data-pdf-url');
            const pdfTitle = button.getAttribute('data-pdf-title');

            // Update UI
            if (pdfTitle) title.textContent = pdfTitle;
            downloadBtn.href = pdfUrl;
            
            // Show loader, hide iframe temporarily
            iframe.style.opacity = '0';
            
            // Load PDF
            iframe.src = pdfUrl;
            
            iframe.onload = function() {
                iframe.style.transition = 'opacity 0.4s ease';
                iframe.style.opacity = '1';
            };
        });

        pdfModal.addEventListener('hidden.bs.modal', function () {
            // Clear iframe to stop downloading/processing when closed
            iframe.src = '';
            title.textContent = 'Visor de Documento';
        });
    }
});
</script>

<?php get_footer(); ?>
