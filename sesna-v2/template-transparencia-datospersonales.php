<?php
/**
 * Template Name: Transparencia - Datos Personales
 */

get_header();

// Obtener los documentos de la función dinámica que creamos
$documentos = sesna_get_datos_personales_docs();

?>

<div class="page-transparencia-datos front-page-bg pb-5">
    <!-- Migas de pan (Breadcrumb) -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/') ) ?>">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= esc_url( home_url('/transparencia/') ) ?>">Transparencia</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Datos Personales</li>
            </ol>
        </div>
    </nav>

    <!-- Contenedor Principal -->
    <div class="contenedor py-4">
        
        <!-- Títulos -->
        <div class="fila mb-4">
            <div class="col-100">
                <h1 class="tx-section-title font-patria mb-2 tx-comite-title">Datos Personales</h1>
            </div>
        </div>
        
        <div class="fila mb-4">
            <div class="col-100">
                <p class="text-muted fs-5">
                    Consulta los avisos de privacidad y otros documentos importantes respecto al tratamiento de los datos personales en posesión de la SESNA.
                </p>
            </div>
        </div>

        <div class="tx-comite-tab-content">
            <!-- Filtros -->
            <div class="fila gap--24 mb-5 align-items-end">
                <div class="col-100 columna__6--sm columna__3--md mb-3 mb-md-0">
                    <label for="filter-anio" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Año</label>
                    <select id="filter-anio" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                        <option value="Todos">Todos</option>
                        <?php 
                        $anios_doc = array_unique(array_column($documentos, 'anio'));
                        rsort($anios_doc);
                        foreach($anios_doc as $a): ?>
                            <option value="<?= esc_attr($a) ?>"><?= esc_html($a) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-100 columna__6--sm columna__4--md">
                    <label for="filter-tipo" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Tipo de documento</label>
                    <select id="filter-tipo" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                        <option value="Todos">Todos</option>
                        <?php 
                        $tipos_doc = array_unique(array_column($documentos, 'tipo'));
                        sort($tipos_doc);
                        foreach($tipos_doc as $t): ?>
                            <option value="<?= esc_attr($t) ?>"><?= esc_html($t) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Lista de Documentos -->
            <div class="d-flex flex-column gap-3" id="documentos-list-container">
                <?php foreach ($documentos as $doc): ?>
                <!-- Card Item -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3 tx-sesion-card" data-anio="<?= esc_attr($doc['anio']) ?>" data-tipo="<?= esc_attr($doc['tipo']) ?>">
                    <div class="card-body p-0 d-flex flex-column flex-md-row align-items-md-stretch">
                        
                        <!-- Date Column -->
                        <div class="tx-sesion-date text-center p-3 p-md-4 d-flex flex-column justify-content-center">
                            <div class="fw-bold fs-3 tx-sesion-date-year" style="color:#666;"><?= esc_html($doc['anio']) ?></div>
                        </div>

                        <!-- Info Column -->
                        <div class="p-4 ps-md-4 flex-grow-1 d-flex flex-column justify-content-center">
                            <h3 class="h5 fw-bold mb-2 font-noto-sans tx-sesion-info-title"><?= esc_html($doc['titulo']) ?></h3>
                            <p class="mb-0 font-noto-sans tx-sesion-info-type"><strong>Categoría:</strong> <?= esc_html($doc['tipo']) ?></p>
                        </div>

                        <!-- Action Column -->
                        <div class="tx-sesion-action d-flex align-items-center justify-content-md-end p-4 gap-4 ms-md-auto">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pdfViewerModal" data-pdf-url="<?= esc_url($doc['enlace']) ?>" data-pdf-title="<?= esc_attr($doc['titulo']) ?>" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="tx-sesion-pdf-icon"><path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"/></svg>
                                <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text">Consultar</div>
                            </a>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pdfViewerModal" data-pdf-url="<?= esc_url($doc['enlace']) ?>" data-pdf-title="<?= esc_attr($doc['titulo']) ?>" class="tx-sesion-chevron-link text-decoration-none ms-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="tx-sesion-chevron-icon"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
                            </a>
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Ver más Documentos -->
            <div class="text-center mt-5" id="documentos-load-more-container">
                <a href="javascript:void(0)" id="documentos-btn-more" class="tx-comite-btn-more">
                    Ver más documentos <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg>
                </a>
            </div>

        </div>

    </div>
</div>

<style>
.tx-pdf-action-btn {
    color: #9f2241;
    border: 1px solid #9f2241;
    border-radius: 8px;
    background-color: transparent;
    transition: all 0.2s ease-in-out;
}
.tx-pdf-action-btn:hover {
    background-color: #9f2241;
    color: #ffffff;
}
</style>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // Logic for filtering and pagination
    const filterAnio = document.getElementById('filter-anio');
    const filterTipo = document.getElementById('filter-tipo');
    const cards = Array.from(document.querySelectorAll('.tx-sesion-card'));
    const btnMore = document.getElementById('documentos-btn-more');
    const loadMoreContainer = document.getElementById('documentos-load-more-container');
    let visibleLimit = 5;

    function applyFilters() {
        const anio = filterAnio ? filterAnio.value : 'Todos';
        const tipo = filterTipo ? filterTipo.value : 'Todos';
        
        let visibleCount = 0;
        let totalMatched = 0;

        cards.forEach(card => {
            const cardAnio = card.getAttribute('data-anio');
            const cardTipo = card.getAttribute('data-tipo');
            
            const matchAnio = anio === 'Todos' || cardAnio === anio;
            const matchTipo = tipo === 'Todos' || cardTipo === tipo;

            if (matchAnio && matchTipo) {
                if (totalMatched < visibleLimit) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
                totalMatched++;
            } else {
                card.style.display = 'none';
            }
        });

        if (totalMatched > visibleLimit && loadMoreContainer) {
            loadMoreContainer.style.display = 'block';
        } else if (loadMoreContainer) {
            loadMoreContainer.style.display = 'none';
        }
    }

    if(filterAnio) filterAnio.addEventListener('change', () => { visibleLimit = 5; applyFilters(); });
    if(filterTipo) filterTipo.addEventListener('change', () => { visibleLimit = 5; applyFilters(); });
    
    if(btnMore) {
        btnMore.addEventListener('click', function(e) {
            e.preventDefault();
            visibleLimit += 5;
            applyFilters();
        });
    }

    applyFilters();
});
</script>

<?php get_footer(); ?>