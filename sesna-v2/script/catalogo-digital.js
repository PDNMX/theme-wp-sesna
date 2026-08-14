/**
 * catalogo-digital.js
 * Flipbook del "Catálogo Digital" (CPT: dh_catalogo)
 * Se abre desde el botón "Leer más" de la sección "Acciones X la Integridad"
 * Usa StPageFlip (js/vendor/page-flip.browser.js) — expone window.St.PageFlip
 */
(function () {
    'use strict';

    var MODAL_ID     = 'modal-catalogo';
    var CONTAINER_ID = 'cd-flipbook-container';

    var pageFlip = null;

    function escHtml(str) {
        return String(str)
            .replace(/&/g, '&amp;').replace(/"/g, '&quot;')
            .replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }

    function buildLoadingHtml() {
        return '<div class="d-flex justify-content-center align-items-center" style="min-height:300px;">' +
                   '<div class="spinner-border text-secondary" role="status">' +
                       '<span class="visually-hidden">Cargando...</span>' +
                   '</div>' +
               '</div>';
    }

    function buildEmptyHtml() {
        return '<div class="d-flex justify-content-center align-items-center text-muted" style="min-height:300px;">' +
                   '<p class="mb-0">No hay páginas disponibles para este catálogo.</p>' +
               '</div>';
    }

    function destroyFlipbook() {
        if (pageFlip) {
            try { pageFlip.destroy(); } catch (err) { /* noop */ }
            pageFlip = null;
        }
    }

    /** Proporción alto/ancho de la primera página, para dimensionar el libro
     *  a la forma real del contenido en vez de asumir una proporción fija. */
    function getFirstPageRatio(paginas, callback) {
        var DEFAULT_RATIO = 560 / 400; // fallback retrato si la imagen no carga
        var img = new Image();
        img.onload = function () {
            if (img.naturalWidth && img.naturalHeight) {
                callback(img.naturalHeight / img.naturalWidth);
            } else {
                callback(DEFAULT_RATIO);
            }
        };
        img.onerror = function () { callback(DEFAULT_RATIO); };
        img.src = paginas[0];
    }

    function buildFlipbookChrome(container, paginas, titulo) {
        container.innerHTML =
            '<div class="cd-flipbook-title">' + escHtml(titulo) + '</div>' +
            '<div class="cd-flipbook-stage">' +
                '<div id="cd-flipbook-book" class="cd-flipbook-book"></div>' +
            '</div>' +
            '<div class="cd-flipbook-controls">' +
                '<button type="button" class="cd-flipbook-btn cd-flipbook-btn--home" aria-label="Volver al inicio"><i class="bi bi-skip-start-fill"></i></button>' +
                '<button type="button" class="cd-flipbook-btn cd-flipbook-btn--prev" aria-label="Página anterior"><i class="bi bi-chevron-left"></i></button>' +
                '<span class="cd-flipbook-counter" id="cd-flipbook-counter">1 / ' + paginas.length + '</span>' +
                '<button type="button" class="cd-flipbook-btn cd-flipbook-btn--next" aria-label="Página siguiente"><i class="bi bi-chevron-right"></i></button>' +
            '</div>';
    }

    function initFlipbook(container, paginas, titulo) {
        if (!window.St || !window.St.PageFlip) {
            container.innerHTML = buildEmptyHtml();
            return;
        }

        getFirstPageRatio(paginas, function (ratio) {
            buildFlipbookChrome(container, paginas, titulo);

            var stageEl = container.querySelector('.cd-flipbook-stage');
            var bookEl  = container.querySelector('#cd-flipbook-book');

            // Tamaño de una sola página, calculado a partir del espacio
            // disponible en el stage y la proporción real de las imágenes
            // del catálogo — así el libro llena el modal sin recortar
            // ni dejar franjas de sobra en las páginas.
            var stageW = stageEl.clientWidth  || 900;
            var stageH = stageEl.clientHeight || 600;

            var pageH = stageH;
            var pageW = Math.round(pageH / ratio);

            // En pantallas angostas el libro se ve a doble página; si no
            // cabe el doble ancho, se reduce hasta ajustar (StPageFlip pasa
            // a modo una sola página automáticamente por debajo de minWidth*2).
            if (pageW * 2 > stageW) {
                pageW = Math.round(stageW / 2);
                pageH = Math.round(pageW * ratio);
            }

            pageFlip = new window.St.PageFlip(bookEl, {
                width: pageW,
                height: pageH,
                size: 'stretch',
                minWidth: 220,
                maxWidth: 1200,
                minHeight: 300,
                maxHeight: 1600,
                showCover: true,
                useMouseEvents: true,
                flippingTime: 700,
                maxShadowOpacity: 0.5
            });

            pageFlip.loadFromImages(paginas);

            var counterEl = container.querySelector('#cd-flipbook-counter');
            pageFlip.on('flip', function (e) {
                counterEl.textContent = (e.data + 1) + ' / ' + paginas.length;
            });

            var homeBtn = container.querySelector('.cd-flipbook-btn--home');
            var prevBtn = container.querySelector('.cd-flipbook-btn--prev');
            var nextBtn = container.querySelector('.cd-flipbook-btn--next');
            homeBtn.addEventListener('click', function () { pageFlip.turnToPage(0); });
            prevBtn.addEventListener('click', function () { pageFlip.flipPrev(); });
            nextBtn.addEventListener('click', function () { pageFlip.flipNext(); });
        });
    }

    document.addEventListener('show.bs.modal', function (e) {
        if (!e.target || e.target.id !== MODAL_ID) return;

        var trigger = e.relatedTarget;
        var container = document.getElementById(CONTAINER_ID);
        if (!container || !trigger) return;

        container.innerHTML = buildLoadingHtml();

        var paginas = [];
        try { paginas = JSON.parse(trigger.getAttribute('data-paginas') || '[]'); }
        catch (err) { paginas = []; }

        var titulo = trigger.getAttribute('data-titulo') || 'Catálogo';

        if (!paginas.length) {
            container.innerHTML = buildEmptyHtml();
            return;
        }

        // Margen para permitir que el modal termine su transición de apertura
        // (necesario para medir el tamaño real del stage antes de crear el libro)
        window.setTimeout(function () {
            initFlipbook(container, paginas, titulo);
        }, 300);
    });

    document.addEventListener('hidden.bs.modal', function (e) {
        if (!e.target || e.target.id !== MODAL_ID) return;
        destroyFlipbook();
        var container = document.getElementById(CONTAINER_ID);
        if (container) container.innerHTML = '';
    });

})();
