document.addEventListener('DOMContentLoaded', function () {
    var PAGE_SIZE = 5;
    var searchInput = document.getElementById('search-doc');
    var searchForm = document.getElementById('form-search-doc');
    var searchBox = searchInput ? searchInput.closest('.tx-comite-search-box') : null;

    var tablas = [
        {
            titulo: document.getElementById('normatividad-externa-title'),
            body: document.getElementById('normatividad-externa-body'),
            tableWrap: document.getElementById('normatividad-externa-table-wrap'),
            emptyMsg: document.getElementById('normatividad-externa-empty'),
            verMasBtn: document.getElementById('normatividad-externa-vermas-btn'),
            verMasWrap: document.getElementById('normatividad-externa-vermas-wrap'),
            expandido: false
        },
        {
            titulo: document.getElementById('normatividad-interna-title'),
            body: document.getElementById('normatividad-interna-body'),
            tableWrap: document.getElementById('normatividad-interna-table-wrap'),
            emptyMsg: document.getElementById('normatividad-interna-empty'),
            verMasBtn: document.getElementById('normatividad-interna-vermas-btn'),
            verMasWrap: document.getElementById('normatividad-interna-vermas-wrap'),
            expandido: false
        }
    ];

    tablas.forEach(function (tabla) {
        if (!tabla.body) return;
        var filas = Array.prototype.slice.call(tabla.body.querySelectorAll('tr'));
        filas.forEach(function (fila) {
            var texto = fila.textContent.toLowerCase().trim();
            fila.setAttribute('data-doc-search', texto);
        });
    });

    function filasVisiblesPorBusqueda(fila, termino) {
        if (!termino) return true;
        return fila.getAttribute('data-doc-search').indexOf(termino) !== -1;
    }

    function render() {
        var termino = searchInput ? searchInput.value.toLowerCase().trim() : '';
        if (searchBox) {
            searchBox.classList.toggle('is-filled', termino.length > 0);
        }

        tablas.forEach(function (tabla) {
            if (!tabla.body) return;
            var filas = Array.prototype.slice.call(tabla.body.querySelectorAll('tr'));
            var coincidencias = filas.filter(function (fila) {
                return filasVisiblesPorBusqueda(fila, termino);
            });

            var limite = (termino || tabla.expandido) ? coincidencias.length : PAGE_SIZE;
            var hayOcultasPorLimite = !termino && !tabla.expandido && coincidencias.length > PAGE_SIZE;

            var visibles = 0;
            filas.forEach(function (fila) {
                var coincide = filasVisiblesPorBusqueda(fila, termino);
                var mostrar = coincide && visibles < limite;
                fila.style.display = mostrar ? '' : 'none';
                if (mostrar) visibles++;
            });

            var wrap = tabla.tableWrap || tabla.body.closest('.tx-table-responsive, .table-responsive');
            if (wrap) {
                wrap.style.display = coincidencias.length === 0 ? 'none' : '';
            }
            if (tabla.emptyMsg) {
                tabla.emptyMsg.classList.toggle('muestra--ninguno', coincidencias.length !== 0);
            }
            if (tabla.verMasWrap) {
                tabla.verMasWrap.style.display = hayOcultasPorLimite ? '' : 'none';
            }
        });
    }

    tablas.forEach(function (tabla) {
        if (!tabla.verMasBtn) return;
        tabla.verMasBtn.addEventListener('click', function (e) {
            e.preventDefault();
            tabla.expandido = true;
            render();
        });
    });

    function onSearchChange() {
        if (searchInput && searchInput.value.trim() !== '') {
            tablas.forEach(function (tabla) { tabla.expandido = false; });
        }
        render();
    }

    if (searchInput) {
        searchInput.addEventListener('input', onSearchChange);
        searchInput.addEventListener('search', onSearchChange);
    }
    if (searchForm) {
        searchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            onSearchChange();
        });
    }

    render();
});

// Controlador accesible de pestañas horizontales SND v1.1.0 (Tabs 2: Normatividad externa / interna)
document.addEventListener('DOMContentLoaded', function() {
    var tabLinks = Array.from(document.querySelectorAll('.js-tab-link'));
    var normExtContainer = document.getElementById('normatividad-externa-container');
    var normIntContainer = document.getElementById('normatividad-interna-container');

    function activateTab(tab) {
        tabLinks.forEach(function(l) {
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

    tabLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            activateTab(this);
            this.focus();
        });

        // Navegación por teclado WAI-ARIA (ArrowLeft, ArrowRight, Home, End)
        link.addEventListener('keydown', function(e) {
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
