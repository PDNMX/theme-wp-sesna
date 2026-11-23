/**
 * Datos Personales: filtros, contador y paginación del listado de documentos.
 *
 * Extraído de template-transparencia-datospersonales.php (Etapa 3.3 del plan SND v1.0.0). Se carga con defer
 * desde inc/enqueue.php; el código es el mismo que estaba en línea.
 */
document.addEventListener('DOMContentLoaded', function() {

    // Logic for filtering, counter and pagination
    const filterAnio = document.getElementById('filter-anio');
    const filterTipo = document.getElementById('filter-tipo');
    const searchDp = document.getElementById('search-dp');
    const formSearchDp = document.getElementById('form-search-dp');
    const searchDpBox = searchDp ? searchDp.closest('.tx-comite-search-box') : null;
    const cards = Array.from(document.querySelectorAll('.tx-sesion-card'));
    const countStatus = document.getElementById('documentos-count-status');
    const emptyState = document.getElementById('documentos-empty-state');
    const btnReset = document.getElementById('documentos-btn-reset');
    const btnMore = document.getElementById('documentos-btn-more');
    const loadMoreContainer = document.getElementById('documentos-load-more-container');
    let visibleLimit = 5;

    function applyFilters() {
        const anio = filterAnio ? filterAnio.value : 'Todos';
        const tipo = filterTipo ? filterTipo.value : 'Todos';
        const query = searchDp ? searchDp.value.toLowerCase().trim() : '';

        if (searchDpBox) {
            searchDpBox.classList.toggle('is-filled', query.length > 0);
        }

        let visibleCount = 0;
        let totalMatched = 0;

        cards.forEach(card => {
            const cardAnio = card.getAttribute('data-anio') || '';
            const cardTipo = card.getAttribute('data-tipo') || '';
            const cardTitulo = card.getAttribute('data-titulo') || '';

            const matchAnio = anio === 'Todos' || cardAnio === anio;
            const matchTipo = tipo === 'Todos' || cardTipo === tipo;
            const matchQuery = query === '' || cardTitulo.includes(query);

            if (matchAnio && matchTipo && matchQuery) {
                if (totalMatched < visibleLimit) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
                totalMatched++;
            } else {
                card.style.display = 'none';
            }
        });

        if (countStatus) {
            countStatus.textContent = totalMatched === 0
                ? '0 documentos encontrados'
                : 'Mostrando ' + visibleCount + ' de ' + totalMatched + ' ' + (totalMatched === 1 ? 'documento' : 'documentos');
        }

        if (emptyState) {
            emptyState.classList.toggle('muestra--ninguno', totalMatched > 0);
        }

        if (btnReset) {
            const hasActiveFilter = anio !== 'Todos' || tipo !== 'Todos' || query !== '';
            btnReset.classList.toggle('muestra--ninguno', !hasActiveFilter);
        }

        if (loadMoreContainer) {
            loadMoreContainer.style.display = totalMatched > visibleLimit ? 'block' : 'none';
        }
    }

    if (filterAnio) filterAnio.addEventListener('change', () => { visibleLimit = 5; applyFilters(); });
    if (filterTipo) filterTipo.addEventListener('change', () => { visibleLimit = 5; applyFilters(); });
    if (searchDp) {
        searchDp.addEventListener('input', () => { visibleLimit = 5; applyFilters(); });
        searchDp.addEventListener('search', () => { visibleLimit = 5; applyFilters(); });
    }
    if (formSearchDp) {
        formSearchDp.addEventListener('submit', (e) => {
            e.preventDefault();
            visibleLimit = 5;
            applyFilters();
        });
    }
    if (btnReset) {
        btnReset.addEventListener('click', () => {
            if (filterAnio) filterAnio.value = 'Todos';
            if (filterTipo) filterTipo.value = 'Todos';
            if (searchDp) searchDp.value = '';
            visibleLimit = 5;
            applyFilters();
        });
    }
    if (btnMore) {
        btnMore.addEventListener('click', function(e) {
            e.preventDefault();
            visibleLimit += 5;
            applyFilters();
        });
    }

    applyFilters();
});
