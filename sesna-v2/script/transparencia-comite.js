/**
 * Comité de Transparencia: filtros, contador y paginación de sesiones y resoluciones.
 *
 * Extraído de template-transparencia-comite.php (Etapa 3.3 del plan SND v1.0.0). Se carga con defer
 * desde inc/enqueue.php; el código es el mismo que estaba en línea.
 */
document.addEventListener('DOMContentLoaded', function() {

    // Logic for filtering, counter and pagination (Sesiones)
    const filterAnioSesion = document.getElementById('filter-anio');
    const filterTipoSesion = document.getElementById('filter-tipo');
    const searchSesion = document.getElementById('search-sesion');
    const formSearchSesion = document.getElementById('form-search-sesion');
    const searchSesionBox = searchSesion ? searchSesion.closest('.tx-comite-search-box') : null;
    const sesionesCards = Array.from(document.querySelectorAll('.tx-sesion-card'));
    const sesionesCountStatus = document.getElementById('sesiones-count-status');
    const sesionesEmptyState = document.getElementById('sesiones-empty-state');
    const btnResetSesiones = document.getElementById('sesiones-btn-reset');
    const btnMoreSesiones = document.getElementById('sesiones-btn-more');
    const sesionesLoadMoreContainer = document.getElementById('sesiones-load-more-container');
    let sesionesVisibleLimit = 5;

    function applySesionesFilters() {
        const anio = filterAnioSesion ? filterAnioSesion.value : 'Todos';
        const tipo = filterTipoSesion ? filterTipoSesion.value : 'Todas';
        const query = searchSesion ? searchSesion.value.toLowerCase().trim() : '';

        if (searchSesionBox) {
            searchSesionBox.classList.toggle('is-filled', query.length > 0);
        }

        let visibleCount = 0;
        let totalMatched = 0;

        sesionesCards.forEach(card => {
            const cardAnio = card.getAttribute('data-anio') || '';
            const cardTipo = card.getAttribute('data-tipo') || '';
            const cardTitulo = card.getAttribute('data-titulo') || '';

            const matchAnio = anio === 'Todos' || cardAnio === anio;
            const matchTipo = tipo === 'Todas' || cardTipo.toLowerCase() === tipo.toLowerCase();
            const matchQuery = query === '' || cardTitulo.includes(query);

            if (matchAnio && matchTipo && matchQuery) {
                if (totalMatched < sesionesVisibleLimit) {
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

        if (sesionesCountStatus) {
            sesionesCountStatus.textContent = totalMatched === 0
                ? '0 actas encontradas'
                : 'Mostrando ' + visibleCount + ' de ' + totalMatched + ' ' + (totalMatched === 1 ? 'acta' : 'actas');
        }

        if (sesionesEmptyState) {
            sesionesEmptyState.classList.toggle('muestra--ninguno', totalMatched > 0);
        }

        if (btnResetSesiones) {
            const hasActiveFilter = anio !== 'Todos' || tipo !== 'Todas' || query !== '';
            btnResetSesiones.classList.toggle('muestra--ninguno', !hasActiveFilter);
        }

        if (sesionesLoadMoreContainer) {
            sesionesLoadMoreContainer.style.display = totalMatched > sesionesVisibleLimit ? 'block' : 'none';
        }
    }

    if (filterAnioSesion) filterAnioSesion.addEventListener('change', () => { sesionesVisibleLimit = 5; applySesionesFilters(); });
    if (filterTipoSesion) filterTipoSesion.addEventListener('change', () => { sesionesVisibleLimit = 5; applySesionesFilters(); });
    if (searchSesion) {
        searchSesion.addEventListener('input', () => { sesionesVisibleLimit = 5; applySesionesFilters(); });
        searchSesion.addEventListener('search', () => { sesionesVisibleLimit = 5; applySesionesFilters(); });
    }
    if (formSearchSesion) {
        formSearchSesion.addEventListener('submit', (e) => {
            e.preventDefault();
            sesionesVisibleLimit = 5;
            applySesionesFilters();
        });
    }
    if (btnResetSesiones) {
        btnResetSesiones.addEventListener('click', () => {
            if (filterAnioSesion) filterAnioSesion.value = 'Todos';
            if (filterTipoSesion) filterTipoSesion.value = 'Todas';
            if (searchSesion) searchSesion.value = '';
            sesionesVisibleLimit = 5;
            applySesionesFilters();
        });
    }
    if (btnMoreSesiones) {
        btnMoreSesiones.addEventListener('click', function(e) {
            e.preventDefault();
            sesionesVisibleLimit += 5;
            applySesionesFilters();
        });
    }

    // Logic for filtering, counter and pagination (Resoluciones)
    const filterAnioRes = document.getElementById('filter-anio-res');
    const filterTipoRes = document.getElementById('filter-tipo-res');
    const searchRes = document.getElementById('search-res');
    const formSearchRes = document.getElementById('form-search-res');
    const searchResBox = searchRes ? searchRes.closest('.tx-comite-search-box') : null;
    const resCards = Array.from(document.querySelectorAll('.tx-resolucion-card'));
    const resCountStatus = document.getElementById('resoluciones-count-status');
    const resEmptyState = document.getElementById('resoluciones-empty-state');
    const btnResetRes = document.getElementById('resoluciones-btn-reset');
    const btnMoreRes = document.getElementById('resoluciones-btn-more');
    const resLoadMoreContainer = document.getElementById('resoluciones-load-more-container');
    let resVisibleLimit = 5;

    function applyResFilters() {
        const anio = filterAnioRes ? filterAnioRes.value : 'Todos';
        const tipo = filterTipoRes ? filterTipoRes.value : 'Todas';
        const query = searchRes ? searchRes.value.toLowerCase().trim() : '';

        if (searchResBox) {
            searchResBox.classList.toggle('is-filled', query.length > 0);
        }

        let visibleCount = 0;
        let totalMatched = 0;

        resCards.forEach(card => {
            const cardAnio = card.getAttribute('data-anio') || '';
            const cardTipo = card.getAttribute('data-tipo') || '';
            const cardTitulo = card.getAttribute('data-titulo') || '';

            const matchAnio = anio === 'Todos' || cardAnio === anio;
            const matchTipo = tipo === 'Todas' || cardTipo.toLowerCase() === tipo.toLowerCase();
            const matchQuery = query === '' || cardTitulo.includes(query);

            if (matchAnio && matchTipo && matchQuery) {
                if (totalMatched < resVisibleLimit) {
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

        if (resCountStatus) {
            resCountStatus.textContent = totalMatched === 0
                ? '0 resoluciones encontradas'
                : 'Mostrando ' + visibleCount + ' de ' + totalMatched + ' ' + (totalMatched === 1 ? 'resolución' : 'resoluciones');
        }

        if (resEmptyState) {
            resEmptyState.classList.toggle('muestra--ninguno', totalMatched > 0);
        }

        if (btnResetRes) {
            const hasActiveFilter = anio !== 'Todos' || tipo !== 'Todas' || query !== '';
            btnResetRes.classList.toggle('muestra--ninguno', !hasActiveFilter);
        }

        if (resLoadMoreContainer) {
            resLoadMoreContainer.style.display = totalMatched > resVisibleLimit ? 'block' : 'none';
        }
    }

    if (filterAnioRes) filterAnioRes.addEventListener('change', () => { resVisibleLimit = 5; applyResFilters(); });
    if (filterTipoRes) filterTipoRes.addEventListener('change', () => { resVisibleLimit = 5; applyResFilters(); });
    if (searchRes) {
        searchRes.addEventListener('input', () => { resVisibleLimit = 5; applyResFilters(); });
        searchRes.addEventListener('search', () => { resVisibleLimit = 5; applyResFilters(); });
    }
    if (formSearchRes) {
        formSearchRes.addEventListener('submit', (e) => {
            e.preventDefault();
            resVisibleLimit = 5;
            applyResFilters();
        });
    }
    if (btnResetRes) {
        btnResetRes.addEventListener('click', () => {
            if (filterAnioRes) filterAnioRes.value = 'Todos';
            if (filterTipoRes) filterTipoRes.value = 'Todas';
            if (searchRes) searchRes.value = '';
            resVisibleLimit = 5;
            applyResFilters();
        });
    }
    if (btnMoreRes) {
        btnMoreRes.addEventListener('click', function(e) {
            e.preventDefault();
            resVisibleLimit += 5;
            applyResFilters();
        });
    }

    // Controlador nativo de pestañas SND v1.1.0 (Tabs 2)
    var comiteTabs = Array.from(document.querySelectorAll('#comiteTabs [role="tab"]'));
    function activateComiteTab(tab) {
        var targetId = tab.getAttribute('data-tab-target');
        if (!targetId) return;

        comiteTabs.forEach(function(t) {
            t.setAttribute('aria-selected', 'false');
        });
        tab.setAttribute('aria-selected', 'true');

        document.querySelectorAll('#comiteTabsContent [role="tabpanel"]').forEach(function(pane) {
            pane.classList.add('muestra--ninguno');
        });
        var targetPane = document.querySelector(targetId);
        if (targetPane) {
            targetPane.classList.remove('muestra--ninguno');
        }
    }

    comiteTabs.forEach(function(tab, idx) {
        tab.addEventListener('click', function() {
            activateComiteTab(tab);
        });
        tab.addEventListener('keydown', function(e) {
            var nextIdx = null;
            if (e.key === 'ArrowRight') nextIdx = (idx + 1) % comiteTabs.length;
            else if (e.key === 'ArrowLeft') nextIdx = (idx - 1 + comiteTabs.length) % comiteTabs.length;
            if (nextIdx !== null) {
                e.preventDefault();
                comiteTabs[nextIdx].focus();
                activateComiteTab(comiteTabs[nextIdx]);
            }
        });
    });

    // Initial load
    applySesionesFilters();
    applyResFilters();
});
