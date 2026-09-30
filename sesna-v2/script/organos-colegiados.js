// Lógica de Tabs horizontales SND — Órganos Colegiados
document.addEventListener('DOMContentLoaded', function() {
    const tabLinks = Array.from(document.querySelectorAll('.js-tab-link'));
    const sections = {
        'comite': document.getElementById('sec-comite'),
        'comision': document.getElementById('sec-comision'),
        'organo': document.getElementById('sec-organo'),
        'recomendaciones': document.getElementById('sec-recomendaciones'),
        'exhortos': document.getElementById('sec-exhortos')
    };

    function activateTab(tab) {
        tabLinks.forEach(l => {
            l.classList.remove('active');
            l.setAttribute('aria-selected', 'false');
            l.setAttribute('tabindex', '-1');
        });
        tab.classList.add('active');
        tab.setAttribute('aria-selected', 'true');
        tab.setAttribute('tabindex', '0');

        Object.values(sections).forEach(sec => {
            if (sec) sec.classList.add('d-none');
        });

        const target = tab.getAttribute('data-target');
        if (sections[target]) {
            sections[target].classList.remove('d-none');
        }

        var tabsNav = document.querySelector('.ocn-tabs-nav');
        if (tabsNav && window.innerWidth < 992) {
            window.scrollTo({ top: tabsNav.offsetTop - 80, behavior: 'smooth' });
        }
    }

    tabLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            activateTab(this);
            this.focus();
        });

        // Keyboard: ArrowLeft/ArrowRight navigate tabs (WCAG 2.1.1)
        link.addEventListener('keydown', function(e) {
            const idx = tabLinks.indexOf(this);
            if (e.key === 'ArrowRight') {
                e.preventDefault();
                const next = tabLinks[(idx + 1) % tabLinks.length];
                activateTab(next);
                next.focus();
            } else if (e.key === 'ArrowLeft') {
                e.preventDefault();
                const prev = tabLinks[(idx - 1 + tabLinks.length) % tabLinks.length];
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
});

// Filtros de Año / Tipo de sesión + paginación "Ver más sesiones", por sección (Comité/Comisión/Órgano)
document.addEventListener('DOMContentLoaded', function () {
    var SESIONES_PAGE_SIZE = 5;

    function initSesionSeccion(sufijo) {
        var filterAnio = document.getElementById('filter-anio-' + sufijo);
        var filterTipo = document.getElementById('filter-tipo-' + sufijo);
        var lista = document.getElementById('sesiones-list-' + sufijo);
        var verMasBtn = document.getElementById('sesiones-vermas-btn-' + sufijo);
        var verMasWrap = document.getElementById('sesiones-vermas-wrap-' + sufijo);

        if (!lista) return;

        var expandido = false;
        var cards = Array.prototype.slice.call(lista.querySelectorAll('.tx-sesion-card'));

        function render() {
            var anio = filterAnio ? filterAnio.value : 'Todos';
            var tipo = filterTipo ? filterTipo.value : 'Todas';

            var coincidencias = cards.filter(function (card) {
                var matchAnio = anio === 'Todos' || card.getAttribute('data-anio') === anio;
                var matchTipo = tipo === 'Todas' || card.getAttribute('data-tipo') === tipo;
                return matchAnio && matchTipo;
            });

            var limite = expandido ? coincidencias.length : SESIONES_PAGE_SIZE;
            var hayOcultasPorLimite = !expandido && coincidencias.length > SESIONES_PAGE_SIZE;

            var visibles = 0;
            cards.forEach(function (card) {
                var matchAnio = anio === 'Todos' || card.getAttribute('data-anio') === anio;
                var matchTipo = tipo === 'Todas' || card.getAttribute('data-tipo') === tipo;
                var coincide = matchAnio && matchTipo;
                var mostrar = coincide && visibles < limite;
                card.style.display = mostrar ? '' : 'none';
                if (mostrar) visibles++;
            });

            if (verMasWrap) {
                verMasWrap.style.display = hayOcultasPorLimite ? '' : 'none';
            }
        }

        if (filterAnio) {
            filterAnio.addEventListener('change', function () { expandido = false; render(); });
        }
        if (filterTipo) {
            filterTipo.addEventListener('change', function () { expandido = false; render(); });
        }
        if (verMasBtn) {
            verMasBtn.addEventListener('click', function (e) {
                e.preventDefault();
                expandido = true;
                render();
            });
        }

        render();
    }

    ['comite', 'comision', 'organo'].forEach(initSesionSeccion);
});

// Panel de Anexos (expandido dentro de la propia tarjeta de sesión):
// buscador interno que filtra las filas de documentos por nombre.
// Los enlaces "Descarga" son target="_blank" normales del navegador,
// así que no requieren manejo especial de clic ni de foco.
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.tx-oc-anexos-panel').forEach(function (panel) {
        var searchInput = panel.querySelector('.tx-oc-anexos-search');
        if (!searchInput) return;

        var rows = Array.prototype.slice.call(panel.querySelectorAll('.tx-oc-anexo-row'));
        var emptyMsg = panel.querySelector('.tx-oc-anexos-empty');

        searchInput.addEventListener('input', function () {
            var termino = searchInput.value.toLowerCase().trim();
            var visibles = 0;
            rows.forEach(function (row) {
                var coincide = !termino || row.getAttribute('data-anexo-nombre').indexOf(termino) !== -1;
                row.classList.toggle('d-none', !coincide);
                if (coincide) visibles++;
            });
            if (emptyMsg) emptyMsg.classList.toggle('d-none', visibles !== 0);
        });
    });
});
