/**
 * Flipbook del "Catálogo Digital" (CPT: dh_catalogo), abierto desde el
 * botón "Leer más" de "Acciones X la Integridad". Usa StPageFlip
 * (js/vendor/page-flip.browser.js), expuesta como window.St.PageFlip.
 */
(function () {
    'use strict';

    var MODAL_ID     = 'modal-catalogo';
    var CONTAINER_ID = 'cd-flipbook-container';

    var pageFlip = null;
    var resizeHandler = null;

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
        if (resizeHandler) {
            window.removeEventListener('resize', resizeHandler);
            resizeHandler = null;
        }
        if (pageFlip) {
            try { pageFlip.destroy(); } catch (err) { /* noop */ }
            pageFlip = null;
        }
    }

    // Proporción natural (alto/ancho) de una imagen. DEFAULT_RATIO se usa
    // solo si la imagen no carga (red caída, 404), para no romper el layout.
    function getImageRatio(src, callback) {
        var DEFAULT_RATIO = 1.3;
        var img = new Image();
        img.onload = function () {
            if (img.naturalWidth && img.naturalHeight) {
                callback(img.naturalHeight / img.naturalWidth);
            } else {
                callback(DEFAULT_RATIO);
            }
        };
        img.onerror = function () { callback(DEFAULT_RATIO); };
        img.src = src;
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

        var coverSrc   = paginas[0];
        var contentSrc = paginas.length > 1 ? paginas[1] : paginas[0];

        getImageRatio(coverSrc, function (coverRatio) {
            getImageRatio(contentSrc, function (contentRatio) {
                buildFlipbookChrome(container, paginas, titulo);

                var stageEl = container.querySelector('.cd-flipbook-stage');
                var bookEl  = container.querySelector('#cd-flipbook-book');

                // Mide el stage y calcula los tamaños "cerrado"/"abierto".
                // Se reutiliza en el cálculo inicial y en cada resize de
                // ventana (ver window.addEventListener('resize', ...) más
                // abajo): si el navegador se redimensiona (o el layout de
                // la página termina de asentarse) después de abrir el
                // modal, el libro se recalcula en vez de quedarse con
                // medidas congeladas de un momento que ya no existe.
                function computeSizes() {
                    var stageW = stageEl.clientWidth  || 900;
                    var stageH = stageEl.clientHeight || 600;

                    // Ancho de UNA página de contenido al leer: intenta que
                    // quepan 2 lado a lado (spread); si no caben (pantallas
                    // angostas/móvil), usa 1 sola a todo el ancho — igual
                    // que decidiría StPageFlip de forma nativa, pero
                    // calculado a mano para controlar el tamaño siempre.
                    var singleW = Math.round(stageH / contentRatio);
                    var spreads = (singleW * 2 <= stageW);
                    var contentPage;
                    if (spreads) {
                        contentPage = { w: singleW, h: stageH };
                    } else {
                        var cw = stageW, ch = Math.round(cw * contentRatio);
                        if (ch > stageH) { ch = stageH; cw = Math.round(ch / contentRatio); }
                        contentPage = { w: cw, h: ch };
                    }

                    // Portada cerrada: el MISMO ancho que una página de
                    // contenido (para que no haya salto de tamaño entre
                    // cerrado/abierto, sobre todo en móvil), con la
                    // proporción PROPIA de la portada (no la del
                    // contenido) para no deformarla.
                    var closedW = contentPage.w;
                    var closedH = Math.round(closedW * coverRatio);
                    if (closedH > stageH) { closedH = stageH; closedW = Math.round(closedH / coverRatio); }
                    var closed = { w: closedW, h: closedH };

                    var openW = spreads ? contentPage.w * 2 : contentPage.w;
                    var openH = contentPage.h;
                    // Con el libro abierto a openW, cualquier minWidth
                    // menor a openW/2 basta para que StPageFlip mantenga
                    // el spread (o la página única) en vez de recalcularlo.
                    var openMinWidth = spreads ? 100 : (contentPage.w + 10);

                    return { contentPage: contentPage, closed: closed, openW: openW, openH: openH, openMinWidth: openMinWidth };
                }

                var sizes = computeSizes();
                var contentPage = sizes.contentPage, closed = sizes.closed, openW = sizes.openW, openH = sizes.openH, OPEN_MIN_WIDTH = sizes.openMinWidth;

                pageFlip = new window.St.PageFlip(bookEl, {
                    width: closed.w,
                    height: closed.h,
                    size: 'stretch',
                    // bookEl se deja al ancho EXACTO de una sola página
                    // (ver más abajo), así que cualquier minWidth mayor a la
                    // mitad de eso basta para forzar modo "portada" (una
                    // hoja completa, sin la mitad en blanco de un spread).
                    minWidth: closed.w,
                    maxWidth: 3000,
                    minHeight: 100,
                    maxHeight: 3000,
                    // autoSize (true por defecto) hace que StPageFlip fije
                    // bookEl.style.width="100%" apenas carga las imágenes,
                    // pisando el ancho que calculamos para la portada. Se
                    // desactiva porque el ancho/alto de bookEl se controla
                    // a mano en todo momento (ver applyClosedState/OpenState).
                    autoSize: false,
                    // La primera imagen del arreglo es la portada: con
                    // showCover:true el libro la cuenta como página suelta,
                    // y al hojear pasa a mostrar las páginas reales en pareja.
                    showCover: true,
                    useMouseEvents: true,
                    // Mientras está cerrada, el propio clic de StPageFlip
                    // sobre la esquina de la portada (volteo nativo) queda
                    // desactivado: el único volteo válido es el que dispara
                    // openBook() después del deslizamiento. Se reactiva al
                    // terminar de abrir, para poder seguir hojeando con clic.
                    disableFlipByClick: true,
                    flippingTime: 700,
                    maxShadowOpacity: 0.5
                });

                // El propio contenedor del libro mide el ancho de una sola
                // página: StPageFlip usa ESE ancho (no el del stage) para
                // decidir tamaño y modo, así que la portada sale siempre
                // proporcionada, sin importar la resolución de pantalla.
                var BOOK_TRANSITION = 'width .35s ease, height .35s ease, opacity .25s ease';

                bookEl.style.width  = closed.w + 'px';
                bookEl.style.height = closed.h + 'px';
                bookEl.style.transition = BOOK_TRANSITION;

                // Cambia el tamaño de bookEl SIN animar y sin que quede
                // ninguna duda sobre el ancho/alto ya aplicado antes de que
                // StPageFlip lo mida (pageFlip.update() -> getBlockWidth()).
                // Mientras hay una transición de CSS activa en bookEl,
                // clientWidth/clientHeight pueden devolver el valor que se
                // está interpolando en ese instante en vez del valor final
                // recién asignado (el momento exacto en que esto pasa varía
                // entre Chrome y Firefox); por eso se apaga la transición,
                // se fuerza un reflow síncrono con los valores nuevos antes
                // de medir, y se reactiva la transición después, para que
                // openBook() pueda seguir usándola para el deslizamiento.
                function setBookSizeInstant(w, h) {
                    bookEl.style.transition = 'none';
                    bookEl.style.width  = w + 'px';
                    bookEl.style.height = h + 'px';
                    void bookEl.offsetWidth; // fuerza el reflow con el tamaño nuevo
                    bookEl.style.transition = BOOK_TRANSITION;
                }

                function applyClosedState() {
                    var s = pageFlip.getSettings();
                    s.width = closed.w;
                    s.height = closed.h;
                    s.minWidth = closed.w;
                    s.disableFlipByClick = true;
                    setBookSizeInstant(closed.w, closed.h);
                    pageFlip.update();
                }

                function applyOpenState() {
                    var s = pageFlip.getSettings();
                    s.width = contentPage.w;
                    s.height = openH;
                    s.minWidth = OPEN_MIN_WIDTH;
                    s.disableFlipByClick = false;
                    setBookSizeInstant(openW, openH);
                    pageFlip.update();
                }

                pageFlip.loadFromImages(paginas);

                // pageFlip.update() (usado en applyClosedState/OpenState)
                // dispara pages.show(), que SIEMPRE emite "flip" aunque sea
                // la misma página. Sin esta bandera, el handler de abajo
                // volvería a llamar update() en cada emisión → bucle
                // infinito. Solo se reaplica el tamaño cuando el modo
                // (cerrado/abierto) realmente cambia.
                var currentMode = 'closed';
                // "Inicio" necesita varios volteos animados si hay más de
                // una página de por medio (flipPrev solo retrocede un
                // spread a la vez); esta bandera encadena un flipPrev()
                // tras otro, disparado por cada 'flip', hasta llegar a 0.
                var homing = false;

                var counterEl = container.querySelector('#cd-flipbook-counter');
                pageFlip.on('flip', function (e) {
                    counterEl.textContent = (e.data + 1) + ' / ' + paginas.length;
                    // Al volver a la página 0 (portada) hay que regresar al
                    // tamaño "cerrado"; si no, queda en blanco (showCover la
                    // sigue tratando como página suelta, pero con medidas de
                    // spread). Al alejarse de la portada, tamaño "abierto".
                    var wantMode = (e.data === 0) ? 'closed' : 'open';
                    if (wantMode !== currentMode) {
                        currentMode = wantMode;
                        if (wantMode === 'closed') {
                            applyClosedState();
                        } else {
                            applyOpenState();
                        }
                    }

                    if (homing) {
                        if (e.data === 0) {
                            homing = false;
                        } else {
                            pageFlip.flipPrev();
                        }
                    }
                });

                // Si la ventana cambia de tamaño (o el layout de la página
                // terminó de asentarse, ej. la barra de administración de
                // WordPress) mientras el modal sigue abierto, las medidas
                // calculadas una sola vez al inicio quedan obsoletas: el
                // libro se queda "chico" o descentrado respecto al stage
                // actual. Se recalculan y reaplican en cada resize.
                var resizeTimer = null;
                resizeHandler = function () {
                    window.clearTimeout(resizeTimer);
                    resizeTimer = window.setTimeout(function () {
                        var next = computeSizes();
                        contentPage   = next.contentPage;
                        closed        = next.closed;
                        openW         = next.openW;
                        openH         = next.openH;
                        OPEN_MIN_WIDTH = next.openMinWidth;
                        if (currentMode === 'closed') {
                            applyClosedState();
                        } else {
                            applyOpenState();
                        }
                    }, 200);
                };
                window.addEventListener('resize', resizeHandler);

                function openBook() {
                    // "Deslizamiento" de apertura: el contenedor crece de
                    // una página a las del spread (o se queda igual si no
                    // hay spread, ej. móvil). El lienzo de StPageFlip sigue
                    // dibujado con el tamaño viejo mientras esto ocurre (su
                    // caja CSS sigue a bookEl al 100%, pero el bitmap no se
                    // vuelve a dibujar hasta el final), así que de otro modo
                    // se ve la portada "estirándose" durante el cambio. Para
                    // evitarlo, se desvanece mientras cambia de tamaño y
                    // solo se vuelve a mostrar ya con el contenido correcto,
                    // justo cuando arranca el volteo.
                    bookEl.style.opacity = '0';
                    bookEl.style.width   = openW + 'px';
                    bookEl.style.height  = openH + 'px';

                    var finished = false;
                    var fallbackTimer = window.setTimeout(finish, 420);

                    function finish(ev) {
                        if (finished) return;
                        if (ev && ev.target !== bookEl) return;
                        finished = true;
                        window.clearTimeout(fallbackTimer);
                        bookEl.removeEventListener('transitionend', finish);
                        currentMode = 'open';
                        applyOpenState();
                        // Deja que el navegador pinte el redimensionado de
                        // applyOpenState() antes de iniciar el volteo; si no,
                        // a veces el primer frame del volteo se dibuja con
                        // la altura vieja y se nota un pequeño salto. El
                        // libro sigue invisible (opacity:0) durante este
                        // respiro, así que tampoco se alcanza a ver el
                        // "hueco en blanco" de un instante en spread sin
                        // voltear todavía.
                        window.requestAnimationFrame(function () {
                            window.requestAnimationFrame(function () {
                                bookEl.style.opacity = '1';
                                pageFlip.flipNext();
                            });
                        });
                    }
                    bookEl.addEventListener('transitionend', finish);
                }

                // Mientras el libro está cerrado, cualquier clic en el stage
                // lo abre (disableFlipByClick evita que StPageFlip intente
                // voltear la portada por su cuenta con las medidas "cerradas").
                stageEl.addEventListener('click', function () {
                    if (pageFlip.getCurrentPageIndex() === 0) openBook();
                });

                var homeBtn = container.querySelector('.cd-flipbook-btn--home');
                var prevBtn = container.querySelector('.cd-flipbook-btn--prev');
                var nextBtn = container.querySelector('.cd-flipbook-btn--next');
                homeBtn.addEventListener('click', function () {
                    if (pageFlip.getCurrentPageIndex() === 0) return;
                    // turnToPage(0) sería un salto instantáneo sin animar;
                    // en vez de eso se encadenan volteos hacia atrás (ver
                    // "homing" en el handler de 'flip') para que se vea
                    // hojeando el libro también al volver al inicio.
                    homing = true;
                    pageFlip.flipPrev();
                });
                prevBtn.addEventListener('click', function () {
                    if (pageFlip.getCurrentPageIndex() !== 0) pageFlip.flipPrev();
                });
                nextBtn.addEventListener('click', function () {
                    if (pageFlip.getCurrentPageIndex() === 0) { openBook(); } else { pageFlip.flipNext(); }
                });
            });
        });
    }

    document.addEventListener('show.bs.modal', function (e) {
        if (!e.target || e.target.id !== MODAL_ID) return;
        var container = document.getElementById(CONTAINER_ID);
        if (container) container.innerHTML = buildLoadingHtml();
    });

    // Se espera a "shown.bs.modal" (no "show.bs.modal" + un setTimeout
    // adivinado) porque Bootstrap solo la dispara cuando el modal terminó
    // por completo su transición de apertura: medir el stage antes de eso
    // da un tamaño de página angosto/equivocado (el modal aún se está
    // agrandando), y el libro queda calculado "chico" y mal proporcionado.
    document.addEventListener('shown.bs.modal', function (e) {
        if (!e.target || e.target.id !== MODAL_ID) return;

        var trigger = e.relatedTarget;
        var container = document.getElementById(CONTAINER_ID);
        if (!container || !trigger) return;

        var paginas = [];
        try { paginas = JSON.parse(trigger.getAttribute('data-paginas') || '[]'); }
        catch (err) { paginas = []; }

        var titulo = trigger.getAttribute('data-titulo') || 'Catálogo';

        if (!paginas.length) {
            container.innerHTML = buildEmptyHtml();
            return;
        }

        initFlipbook(container, paginas, titulo);
    });

    document.addEventListener('hidden.bs.modal', function (e) {
        if (!e.target || e.target.id !== MODAL_ID) return;
        destroyFlipbook();
        var container = document.getElementById(CONTAINER_ID);
        if (container) container.innerHTML = '';
    });

})();
