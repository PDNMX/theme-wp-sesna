document.addEventListener('DOMContentLoaded', function () {
    var PAGE_SIZE = 5;

    function setupNormatividadPanel(config) {
        var body = document.getElementById(config.bodyId);
        if (!body) return;

        var cards = Array.prototype.slice.call(body.querySelectorAll(config.cardSelector));
        var filterTipo = document.getElementById(config.filterTipoId);
        var searchInput = document.getElementById(config.searchInputId);
        var searchForm = document.getElementById(config.searchFormId);
        var searchBox = searchInput ? searchInput.closest('.tx-comite-search-box') : null;
        var countStatus = document.getElementById(config.countId);
        var resetBtn = document.getElementById(config.resetBtnId);
        var emptyMsg = document.getElementById(config.emptyId);
        var verMasWrap = document.getElementById(config.verMasWrapId);
        var verMasBtn = document.getElementById(config.verMasBtnId);

        var visibleLimit = PAGE_SIZE;

        function matchesCard(card, tipoSel, termino) {
            var cardTipo = card.getAttribute('data-tipo') || '';
            var cardSearch = (card.getAttribute('data-doc-search') || '').toLowerCase();

            var matchTipo = (tipoSel === 'Todos') || (cardTipo === tipoSel);
            var matchSearch = !termino || (cardSearch.indexOf(termino) !== -1);

            return matchTipo && matchSearch;
        }

        function render() {
            var tipoSel = filterTipo ? filterTipo.value : 'Todos';
            var termino = searchInput ? searchInput.value.toLowerCase().trim() : '';
            var hasActiveFilters = (tipoSel !== 'Todos') || (termino.length > 0);

            if (searchBox) {
                searchBox.classList.toggle('is-filled', termino.length > 0);
            }

            if (resetBtn) {
                resetBtn.classList.toggle('muestra--ninguno', !hasActiveFilters);
            }

            var matchingCards = cards.filter(function (card) {
                return matchesCard(card, tipoSel, termino);
            });

            var limit = hasActiveFilters ? matchingCards.length : visibleLimit;
            var shownCount = 0;

            cards.forEach(function (card) {
                var match = matchesCard(card, tipoSel, termino);
                var show = match && (shownCount < limit);
                card.style.display = show ? '' : 'none';
                if (show) shownCount++;
            });

            if (countStatus) {
                var total = matchingCards.length;
                var noun = total === 1 ? 'documento' : 'documentos';
                countStatus.textContent = 'Mostrando ' + shownCount + ' de ' + total + ' ' + noun;
            }

            if (body) {
                body.style.display = matchingCards.length === 0 ? 'none' : '';
            }

            if (emptyMsg) {
                emptyMsg.classList.toggle('muestra--ninguno', matchingCards.length !== 0);
            }

            if (verMasWrap) {
                var hasMore = !hasActiveFilters && (matchingCards.length > shownCount);
                verMasWrap.style.display = hasMore ? '' : 'none';
            }
        }

        if (filterTipo) {
            filterTipo.addEventListener('change', function () {
                visibleLimit = PAGE_SIZE;
                render();
            });
        }

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                visibleLimit = PAGE_SIZE;
                render();
            });
            searchInput.addEventListener('search', function () {
                visibleLimit = PAGE_SIZE;
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
                if (filterTipo) filterTipo.value = 'Todos';
                if (searchInput) searchInput.value = '';
                visibleLimit = PAGE_SIZE;
                render();
            });
        }

        if (verMasBtn) {
            verMasBtn.addEventListener('click', function (e) {
                e.preventDefault();
                visibleLimit += PAGE_SIZE;
                render();
            });
        }

        render();
    }

    setupNormatividadPanel({
        bodyId: 'normatividad-externa-body',
        cardSelector: '.tx-norm-ext-card',
        filterTipoId: 'filter-tipo-ext',
        searchInputId: 'search-doc-ext',
        searchFormId: 'form-search-ext',
        countId: 'normatividad-externa-count',
        resetBtnId: 'normatividad-externa-reset',
        emptyId: 'normatividad-externa-empty',
        verMasWrapId: 'normatividad-externa-vermas-wrap',
        verMasBtnId: 'normatividad-externa-vermas-btn'
    });

    setupNormatividadPanel({
        bodyId: 'normatividad-interna-body',
        cardSelector: '.tx-norm-int-card',
        filterTipoId: 'filter-tipo-int',
        searchInputId: 'search-doc-int',
        searchFormId: 'form-search-int',
        countId: 'normatividad-interna-count',
        resetBtnId: 'normatividad-interna-reset',
        emptyId: 'normatividad-interna-empty',
        verMasWrapId: 'normatividad-interna-vermas-wrap',
        verMasBtnId: 'normatividad-interna-vermas-btn'
    });

    // Controlador accesible de pestañas horizontales SND v1.1.0 (Tabs 01: Normatividad externa / interna)
    var tabLinks = Array.from(document.querySelectorAll('.js-tab-link'));
    var normExtContainer = document.getElementById('normatividad-externa-container');
    var normIntContainer = document.getElementById('normatividad-interna-container');

    function activateTab(tab) {
        tabLinks.forEach(function (l) {
            l.classList.remove('active');
            l.setAttribute('aria-selected', 'false');
            l.setAttribute('tabindex', '-1');
        });
        tab.classList.add('active');
        tab.setAttribute('aria-selected', 'true');
        tab.setAttribute('tabindex', '0');

        var target = tab.getAttribute('data-target');
        if (target === 'norm-ext') {
            if (normExtContainer) {
                normExtContainer.classList.remove('muestra--ninguno');
                normExtContainer.style.display = '';
            }
            if (normIntContainer) {
                normIntContainer.classList.add('muestra--ninguno');
                normIntContainer.style.display = 'none';
            }
        } else if (target === 'norm-int') {
            if (normExtContainer) {
                normExtContainer.classList.add('muestra--ninguno');
                normExtContainer.style.display = 'none';
            }
            if (normIntContainer) {
                normIntContainer.classList.remove('muestra--ninguno');
                normIntContainer.style.display = '';
            }
        }
    }

    tabLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            activateTab(this);
            this.focus();
        });

        // Navegación por teclado WAI-ARIA (ArrowLeft, ArrowRight, Home, End)
        link.addEventListener('keydown', function (e) {
            var idx = tabLinks.indexOf(this);
            if (e.key === 'ArrowRight') {
                e.preventDefault();
                var next = tabLinks[(idx + 1) % tabLinks.length];
                activateTab(next);
                next.focus();
            } else if (e.key === 'ArrowLeft') {
                e.preventDefault();
                var prev = tabLinks[(idx - 1 + tabLinks.length) % tabLinks.length];
                activateTab(prev);
                prev.focus();
            } else if (e.key === 'Home') {
                e.preventDefault();
                activateTab(tabLinks[0]);
                tabLinks[0].focus();
            } else if (e.key === 'End') {
                e.preventDefault();
                activateTab(tabLinks[tabLinks.length - 1]);
                tabLinks[tabLinks.length - 1].focus();
            }
        });
    });

    // Mostrar solo "Normatividad externa" al cargar (pestaña activa por defecto).
    if (normIntContainer) {
        normIntContainer.classList.add('muestra--ninguno');
        normIntContainer.style.display = 'none';
    }
});
