document.addEventListener('DOMContentLoaded', function () {
    var PAGE_SIZE = 5;
    var searchInput = document.getElementById('search-doc');

    var tablas = [
        {
            titulo: document.getElementById('normatividad-externa-title'),
            body: document.getElementById('normatividad-externa-body'),
            verMasBtn: document.getElementById('normatividad-externa-vermas-btn'),
            verMasWrap: document.getElementById('normatividad-externa-vermas-wrap'),
            expandido: false
        },
        {
            titulo: document.getElementById('normatividad-interna-title'),
            body: document.getElementById('normatividad-interna-body'),
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

            if (tabla.titulo) {
                tabla.titulo.style.display = coincidencias.length === 0 ? 'none' : '';
            }
            var tableWrap = tabla.body.closest('.table-responsive');
            if (tableWrap) {
                tableWrap.style.display = coincidencias.length === 0 ? 'none' : '';
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

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            if (searchInput.value.trim() !== '') {
                tablas.forEach(function (tabla) { tabla.expandido = false; });
            }
            render();
        });
    }

    render();
});

// Lógica de Tabs dinámica para el sidebar
document.addEventListener('DOMContentLoaded', function() {
    const tabLinks = document.querySelectorAll('.js-tab-link');
    const sections = {
        'comite': document.getElementById('sec-comite'),
        'comision': document.getElementById('sec-comision'),
        'organo': document.getElementById('sec-organo'),
        'recomendaciones': document.getElementById('sec-recomendaciones'),
        'norm-ext': document.getElementById('normatividad-section'),
        'norm-int': document.getElementById('normatividad-section')
    };

    const normExtContainer = document.getElementById('normatividad-externa-container');
    const normIntContainer = document.getElementById('normatividad-interna-container');

    tabLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            tabLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');

            Object.values(sections).forEach(sec => {
                if(sec) sec.classList.add('d-none');
            });

            const target = this.getAttribute('data-target');
            if (sections[target]) {
                sections[target].classList.remove('d-none');
            }

            if (target === 'norm-ext') {
                if(normExtContainer) normExtContainer.style.display = '';
                if(normIntContainer) normIntContainer.style.display = 'none';
            } else if (target === 'norm-int') {
                if(normExtContainer) normExtContainer.style.display = 'none';
                if(normIntContainer) normIntContainer.style.display = '';
            } else {
                // If it's another tab, just reset normatividad visibility just in case
                if(normExtContainer) normExtContainer.style.display = '';
                if(normIntContainer) normIntContainer.style.display = '';
            }
            
            // Auto scroll to top on mobile or just to the content area
            const mainContentArea = document.getElementById('main-content-area');
            if(mainContentArea) {
                window.scrollTo({
                    top: mainContentArea.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
});
