// Lógica de Tabs horizontales SND — Órganos Colegiados
document.addEventListener('DOMContentLoaded', function() {
    // Todos los disparadores de sección: tabs del tablist (Desktop/Tablet)
    // + ListItems del Drawer (Móvil). Ambos comparten .js-tab-link para que
    // el estado "activo" quede sincronizado entre los dos sin duplicar lógica.
    const tabLinks = Array.from(document.querySelectorAll('.js-tab-link'));
    // Solo los botones del tablist horizontal usan roving tabindex
    // (navegación con flechas); los ListItems del Drawer deben permanecer
    // siempre alcanzables por teclado mientras el Drawer está abierto.
    const rovingTabLinks = Array.from(document.querySelectorAll('[role="tab"].js-tab-link'));
    const sections = {
        'comite': document.getElementById('sec-comite'),
        'comision': document.getElementById('sec-comision'),
        'organo': document.getElementById('sec-organo'),
        'recomendaciones': document.getElementById('sec-recomendaciones'),
        'exhortos': document.getElementById('sec-exhortos')
    };
    const activeLabelEl = document.getElementById('ocnActiveTabLabel');

    function activateTab(tab) {
        tabLinks.forEach(l => {
            l.classList.remove('active');
            l.setAttribute('aria-selected', 'false');
        });
        rovingTabLinks.forEach(l => l.setAttribute('tabindex', '-1'));

        tab.classList.add('active');
        tab.setAttribute('aria-selected', 'true');
        if (tab.getAttribute('role') === 'tab') {
            tab.setAttribute('tabindex', '0');
        }

        Object.values(sections).forEach(sec => {
            if (sec) sec.classList.add('muestra--ninguno');
        });

        const target = tab.getAttribute('data-target');
        if (sections[target]) {
            sections[target].classList.remove('muestra--ninguno');
        }

        if (activeLabelEl) {
            activeLabelEl.textContent = (tab.querySelector('span') || tab).textContent.trim();
        }

        var tabsNav = document.querySelector('.tx-comite-tabs-container, .ocn-tabs-nav');
        if (tabsNav && window.innerWidth < 992) {
            window.scrollTo({ top: tabsNav.offsetTop - 80, behavior: 'smooth' });
        }
    }

    tabLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            activateTab(this);
            this.focus();

            // Si el disparador vive dentro del Drawer móvil, cerrarlo tras seleccionar
            if (this.closest('#ocnDrawer') && typeof window.ocnCloseDrawer === 'function') {
                window.ocnCloseDrawer();
            }
        });

        // Keyboard: ArrowLeft/ArrowRight navigate tabs (WCAG 2.1.1) — solo aplica al tablist
        if (link.getAttribute('role') === 'tab') {
            link.addEventListener('keydown', function(e) {
                const idx = rovingTabLinks.indexOf(this);
                if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    const next = rovingTabLinks[(idx + 1) % rovingTabLinks.length];
                    activateTab(next);
                    next.focus();
                } else if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    const prev = rovingTabLinks[(idx - 1 + rovingTabLinks.length) % rovingTabLinks.length];
                    activateTab(prev);
                    prev.focus();
                } else if (e.key === 'Home') {
                    e.preventDefault();
                    activateTab(rovingTabLinks[0]);
                    rovingTabLinks[0].focus();
                } else if (e.key === 'End') {
                    e.preventDefault();
                    activateTab(rovingTabLinks[rovingTabLinks.length - 1]);
                    rovingTabLinks[rovingTabLinks.length - 1].focus();
                }
            });
        }
    });
});

// Filtros de Año / Tipo de sesión / Buscador + contador, botón Limpiar filtros, estado vacío y paginación "Ver más sesiones"
document.addEventListener('DOMContentLoaded', function () {
    var SESIONES_PAGE_SIZE = 5;

    function initSesionSeccion(sufijo) {
        var filterAnio = document.getElementById('filter-anio-' + sufijo);
        var filterTipo = document.getElementById('filter-tipo-' + sufijo);
        var searchInput = document.getElementById('search-sesion-' + sufijo);
        var searchForm = document.getElementById('form-search-' + sufijo);
        var searchBox = searchInput ? searchInput.closest('.tx-comite-search-box') : null;
        var countStatus = document.getElementById('sesiones-count-' + sufijo);
        var resetBtn = document.getElementById('sesiones-reset-' + sufijo);
        var emptyMsg = document.getElementById('sesiones-empty-' + sufijo);
        var lista = document.getElementById('sesiones-list-' + sufijo);
        var verMasBtn = document.getElementById('sesiones-vermas-btn-' + sufijo);
        var verMasWrap = document.getElementById('sesiones-vermas-wrap-' + sufijo);

        if (!lista) return;

        var visibleLimit = SESIONES_PAGE_SIZE;
        var cards = Array.prototype.slice.call(lista.querySelectorAll('.tx-sesion-card'));

        function matchesCard(card, anio, tipo, termino) {
            var matchAnio = (anio === 'Todos') || (card.getAttribute('data-anio') === anio);
            var matchTipo = (tipo === 'Todas') || (card.getAttribute('data-tipo') === tipo);
            var titulo = (card.getAttribute('data-titulo') || card.textContent || '').toLowerCase();
            var matchSearch = !termino || (titulo.indexOf(termino) !== -1);
            return matchAnio && matchTipo && matchSearch;
        }

        function render() {
            var anio = filterAnio ? filterAnio.value : 'Todos';
            var tipo = filterTipo ? filterTipo.value : 'Todas';
            var termino = searchInput ? searchInput.value.toLowerCase().trim() : '';
            var hasActiveFilters = (anio !== 'Todos') || (tipo !== 'Todas') || (termino.length > 0);

            if (searchBox) {
                searchBox.classList.toggle('is-filled', termino.length > 0);
            }

            if (resetBtn) {
                resetBtn.classList.toggle('muestra--ninguno', !hasActiveFilters);
            }

            var coincidencias = cards.filter(function (card) {
                return matchesCard(card, anio, tipo, termino);
            });

            var limite = hasActiveFilters ? coincidencias.length : visibleLimit;
            var visibles = 0;

            cards.forEach(function (card) {
                var coincide = matchesCard(card, anio, tipo, termino);
                var mostrar = coincide && (visibles < limite);
                card.style.display = mostrar ? '' : 'none';
                if (mostrar) visibles++;
            });

            if (countStatus) {
                var total = coincidencias.length;
                var noun = total === 1 ? 'sesión' : 'sesiones';
                countStatus.textContent = 'Mostrando ' + visibles + ' de ' + total + ' ' + noun;
            }

            lista.style.display = coincidencias.length === 0 ? 'none' : '';

            if (emptyMsg) {
                emptyMsg.classList.toggle('muestra--ninguno', coincidencias.length !== 0);
            }

            if (verMasWrap) {
                var hayMas = !hasActiveFilters && (coincidencias.length > visibles);
                verMasWrap.style.display = hayMas ? '' : 'none';
            }
        }

        if (filterAnio) {
            filterAnio.addEventListener('change', function () {
                visibleLimit = SESIONES_PAGE_SIZE;
                render();
            });
        }
        if (filterTipo) {
            filterTipo.addEventListener('change', function () {
                visibleLimit = SESIONES_PAGE_SIZE;
                render();
            });
        }
        if (searchInput) {
            searchInput.addEventListener('input', function () {
                visibleLimit = SESIONES_PAGE_SIZE;
                render();
            });
            searchInput.addEventListener('search', function () {
                visibleLimit = SESIONES_PAGE_SIZE;
                render();
            });
        }
        if (searchForm) {
            searchForm.addEventListener('submit', function (e) {
                e.preventDefault();
                render();
            });
        }
        if (resetBtn) {
            resetBtn.addEventListener('click', function () {
                if (filterAnio) filterAnio.value = 'Todos';
                if (filterTipo) filterTipo.value = 'Todas';
                if (searchInput) searchInput.value = '';
                visibleLimit = SESIONES_PAGE_SIZE;
                render();
            });
        }
        if (verMasBtn) {
            verMasBtn.addEventListener('click', function (e) {
                e.preventDefault();
                visibleLimit += SESIONES_PAGE_SIZE;
                render();
            });
        }

        render();
    }

    ['comite', 'comision', 'organo'].forEach(initSesionSeccion);
});
