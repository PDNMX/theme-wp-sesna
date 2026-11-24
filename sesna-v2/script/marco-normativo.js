document.addEventListener('DOMContentLoaded', function () {
    /**
     * Normaliza una cadena para búsqueda insensible a mayúsculas, minúsculas y acentos.
     */
    function normalizeSearchText(str) {
        if (!str) return '';
        var lower = String(str).toLowerCase().trim();
        return typeof lower.normalize === 'function'
            ? lower.normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            : lower;
    }

    /**
     * Calcula el tamaño de lote inicial y de incremento según las dimensiones
     * actuales de la ventana/dispositivo (viewport width y height).
     */
    function getViewportBatchConfig() {
        var vw = window.innerWidth || document.documentElement.clientWidth || 1024;
        var vh = window.innerHeight || document.documentElement.clientHeight || 768;

        var estimatedCardHeight = vw < 640 ? 180 : 120;
        var cardsInViewport = Math.max(4, Math.ceil(vh / estimatedCardHeight));

        if (vw < 640) {
            return {
                initial: Math.min(5, cardsInViewport),
                step: 4
            };
        }
        if (vw < 1024) {
            return {
                initial: Math.max(5, Math.min(7, cardsInViewport)),
                step: 5
            };
        }
        return {
            initial: Math.max(6, Math.min(8, cardsInViewport + 1)),
            step: 6
        };
    }

    var activePanels = [];

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
        var loaderSentinel = document.getElementById(config.verMasWrapId);

        // Pre-normalizar el texto buscable de cada tarjeta una sola vez
        cards.forEach(function (card) {
            var rawSearch = card.getAttribute('data-doc-search') || '';
            card.dataset.normalizedSearch = normalizeSearchText(rawSearch);
        });

        var batchCfg = getViewportBatchConfig();
        var visibleLimit = batchCfg.initial;
        var isLoadingBatch = false;
        var loadTimer = null;

        function isPanelVisible() {
            return body.offsetParent !== null || (loaderSentinel && loaderSentinel.offsetParent !== null);
        }

        function matchesCard(card, tipoSel, terminoNorm) {
            var cardTipo = card.getAttribute('data-tipo') || '';
            var cardSearch = card.dataset.normalizedSearch || '';

            var matchTipo = (tipoSel === 'Todos') || (cardTipo === tipoSel);
            var matchSearch = !terminoNorm || (cardSearch.indexOf(terminoNorm) !== -1);

            return matchTipo && matchSearch;
        }

        function getMatchingCards() {
            var tipoSel = filterTipo ? filterTipo.value : 'Todos';
            var terminoNorm = searchInput ? normalizeSearchText(searchInput.value) : '';
            return cards.filter(function (card) {
                return matchesCard(card, tipoSel, terminoNorm);
            });
        }

        function render() {
            var tipoSel = filterTipo ? filterTipo.value : 'Todos';
            var terminoNorm = searchInput ? normalizeSearchText(searchInput.value) : '';
            var hasActiveFilters = (tipoSel !== 'Todos') || (terminoNorm.length > 0);

            if (searchBox) {
                searchBox.classList.toggle('is-filled', terminoNorm.length > 0);
            }

            if (resetBtn) {
                resetBtn.classList.toggle('muestra--ninguno', !hasActiveFilters);
            }

            var matchingCards = cards.filter(function (card) {
                return matchesCard(card, tipoSel, terminoNorm);
            });

            var limit = hasActiveFilters ? matchingCards.length : visibleLimit;
            var shownCount = 0;

            cards.forEach(function (card) {
                var match = matchesCard(card, tipoSel, terminoNorm);
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

            if (loaderSentinel) {
                var hasMore = !hasActiveFilters && (matchingCards.length > shownCount);
                loaderSentinel.classList.toggle('muestra--ninguno', !hasMore);
                loaderSentinel.style.display = hasMore ? '' : 'none';
                loaderSentinel.setAttribute('aria-busy', hasMore && isLoadingBatch ? 'true' : 'false');
            }
        }

        function loadNextBatch() {
            if (isLoadingBatch || !isPanelVisible()) return;

            var tipoSel = filterTipo ? filterTipo.value : 'Todos';
            var terminoNorm = searchInput ? normalizeSearchText(searchInput.value) : '';
            var hasActiveFilters = (tipoSel !== 'Todos') || (terminoNorm.length > 0);
            if (hasActiveFilters) return;

            var matchingCards = getMatchingCards();
            if (visibleLimit >= matchingCards.length) return;

            isLoadingBatch = true;
            if (loaderSentinel) {
                loaderSentinel.setAttribute('aria-busy', 'true');
            }

            clearTimeout(loadTimer);
            loadTimer = setTimeout(function () {
                var step = getViewportBatchConfig().step;
                visibleLimit = Math.min(matchingCards.length, visibleLimit + step);
                isLoadingBatch = false;
                render();
                checkSentinelInView();
            }, 260);
        }

        function checkSentinelInView() {
            if (!loaderSentinel || isLoadingBatch || !isPanelVisible()) return;
            if (loaderSentinel.style.display === 'none' || loaderSentinel.classList.contains('muestra--ninguno')) return;

            var rect = loaderSentinel.getBoundingClientRect();
            var vh = window.innerHeight || document.documentElement.clientHeight || 768;
            if (rect.top <= vh + 140) {
                loadNextBatch();
            }
        }

        function resetAndRender() {
            clearTimeout(loadTimer);
            isLoadingBatch = false;
            visibleLimit = getViewportBatchConfig().initial;
            render();
            checkSentinelInView();
        }

        if (filterTipo) {
            filterTipo.addEventListener('change', resetAndRender);
        }

        if (searchInput) {
            searchInput.addEventListener('input', resetAndRender);
            searchInput.addEventListener('search', resetAndRender);
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
                resetAndRender();
            });
        }

        if (loaderSentinel && 'IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        loadNextBatch();
                    }
                });
            }, {
                root: null,
                rootMargin: '0px 0px 140px 0px',
                threshold: 0.05
            });
            observer.observe(loaderSentinel);
        }

        window.addEventListener('scroll', checkSentinelInView, { passive: true });
        window.addEventListener('resize', function () {
            var minInitial = getViewportBatchConfig().initial;
            if (visibleLimit < minInitial) {
                visibleLimit = minInitial;
                render();
            }
            checkSentinelInView();
        }, { passive: true });

        render();
        checkSentinelInView();

        activePanels.push({
            refreshOnTabShow: function () {
                var minInitial = getViewportBatchConfig().initial;
                if (visibleLimit < minInitial) {
                    visibleLimit = minInitial;
                }
                render();
                checkSentinelInView();
            }
        });
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
        verMasWrapId: 'normatividad-externa-vermas-wrap'
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
        verMasWrapId: 'normatividad-interna-vermas-wrap'
    });

    // Controlador accesible de pestañas horizontales SND v1.0.0 (Tabs 01: Normatividad externa / interna)
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

        activePanels.forEach(function (panel) {
            panel.refreshOnTabShow();
        });
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
