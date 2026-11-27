/**
 * Implementación de la PNA (page-programa-implemetancion-pna.php):
 * - Animaciones de entrada por IntersectionObserver
 * - Interacción de ejes del donut (.pna-eje-btn / .pna-wheel-slice)
 * - Filtros de Año y Eje del Fichero del Informe PI-PNA
 */
document.addEventListener('DOMContentLoaded', function () {

    // Animaciones entrada
    var obs = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) {
                e.target.classList.add('pna-visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.pna-chart-card, .pna-reveal').forEach(function (el) {
        obs.observe(el);
    });

    // Interacción ejes donut (mismo patrón que Diseño PNA: pna-eje-btn / pna-wheel-slice)
    var ejeButtons = document.querySelectorAll('.pna-eje-btn, .pna-wheel-slice');
    var ejeContents = document.querySelectorAll('.pna-eje-content');
    var activeEjeId = null;

    function deselectEje() {
        activeEjeId = null;
        document.querySelectorAll('.pna-eje-btn, .pna-wheel-slice').forEach(function (el) {
            el.classList.remove('active', 'pna-eje-inactive');
        });
        ejeContents.forEach(function (content) {
            content.classList.add('muestra--ninguno');
        });
    }

    function selectEje(ejeId, scrollTo) {
        if (activeEjeId === ejeId) {
            deselectEje();
            return;
        }
        activeEjeId = ejeId;

        document.querySelectorAll('.pna-eje-btn, .pna-wheel-slice').forEach(function (el) {
            var isActive = el.getAttribute('data-eje') === ejeId;
            el.classList.remove('active');
            el.classList.toggle('pna-eje-inactive', !isActive);
        });
        ejeContents.forEach(function (content) {
            content.classList.add('muestra--ninguno');
        });

        document.querySelectorAll('[data-eje="' + ejeId + '"]').forEach(function (el) {
            el.classList.add('active');
            el.classList.remove('pna-eje-inactive');
        });

        var targetContent = document.getElementById('content-eje-' + ejeId);
        if (targetContent) {
            targetContent.classList.remove('muestra--ninguno');
            targetContent.classList.add('active');
            if (scrollTo) {
                targetContent.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }
    }

    ejeButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var ejeId = this.getAttribute('data-eje');
            if (ejeId) selectEje(ejeId, true);
        });
        btn.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                var ejeId = this.getAttribute('data-eje');
                if (ejeId) selectEje(ejeId, true);
            }
        });
    });

    // Estado inicial: Eje 1 activo por defecto, el resto atenuado (sin hacer scroll)
    var initialActive = document.querySelector('.pna-eje-btn.active, .pna-wheel-slice.active');
    if (initialActive) {
        selectEje(initialActive.getAttribute('data-eje'), false);
    }

    // Fichero: filtros de Año / Eje sobre el listado (mismo patrón que Actas del Comité)
    var ficheroFilterAnio = document.getElementById('fichero-filter-anio');
    var ficheroFilterEje = document.getElementById('fichero-filter-eje');
    var ficheroCards = Array.from(document.querySelectorAll('.fichero-card'));
    var ficheroCountStatus = document.getElementById('fichero-count-status');
    var ficheroEmptyState = document.getElementById('fichero-empty-state');
    var ficheroBtnReset = document.getElementById('fichero-btn-reset');

    function applyFicheroFilters() {
        var anio = ficheroFilterAnio ? ficheroFilterAnio.value : 'Todos';
        var eje = ficheroFilterEje ? ficheroFilterEje.value : 'Todos';
        var total = ficheroCards.length;
        var matched = 0;

        ficheroCards.forEach(function (card) {
            var matchAnio = anio === 'Todos' || card.getAttribute('data-anio') === anio;
            var matchEje = eje === 'Todos' || card.getAttribute('data-eje') === eje;
            if (matchAnio && matchEje) {
                card.style.display = '';
                matched++;
            } else {
                card.style.display = 'none';
            }
        });

        if (ficheroCountStatus) {
            ficheroCountStatus.textContent = matched === 0
                ? '0 fichas encontradas'
                : 'Mostrando ' + matched + ' de ' + total + ' ' + (total === 1 ? 'ficha' : 'fichas');
        }
        if (ficheroEmptyState) {
            ficheroEmptyState.classList.toggle('muestra--ninguno', matched > 0);
        }
        if (ficheroBtnReset) {
            var hasActiveFilter = anio !== 'Todos' || eje !== 'Todos';
            ficheroBtnReset.classList.toggle('muestra--ninguno', !hasActiveFilter);
        }
    }

    if (ficheroFilterAnio) ficheroFilterAnio.addEventListener('change', applyFicheroFilters);
    if (ficheroFilterEje) ficheroFilterEje.addEventListener('change', applyFicheroFilters);
    if (ficheroBtnReset) {
        ficheroBtnReset.addEventListener('click', function () {
            if (ficheroFilterAnio) ficheroFilterAnio.value = 'Todos';
            if (ficheroFilterEje) ficheroFilterEje.value = 'Todos';
            applyFicheroFilters();
        });
    }
});
