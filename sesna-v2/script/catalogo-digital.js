/**
 * Flipbook del "Catálogo Digital" (CPT: dh_catalogo), abierto desde la
 * tarjeta de "Acciones X la Integridad" (SND v1.1.0).
 * Usa StPageFlip (js/vendor/page-flip.browser.js), expuesta como window.St.PageFlip.
 */
(function () {
    'use strict';

    var MODAL_ID = 'modal-catalogo';

    var pageFlip      = null;
    var resizeHandler = null;
    var keyHandler    = null;
    var currentTotal  = 0;

    function destroyFlipbook() {
        if (resizeHandler) {
            window.removeEventListener('resize', resizeHandler);
            resizeHandler = null;
        }
        if (keyHandler) {
            document.removeEventListener('keydown', keyHandler);
            keyHandler = null;
        }
        if (pageFlip) {
            try { pageFlip.destroy(); } catch (err) { /* noop */ }
            pageFlip = null;
        }
        var stageEl = document.getElementById('cd-flipbook-stage');
        if (stageEl) {
            stageEl.innerHTML = '<div id="cd-flipbook-book" class="cd-flipbook-book"></div>';
        }
    }

    function setLoaderVisible(visible) {
        var loaderEl = document.getElementById('cd-flipbook-loader');
        if (!loaderEl) return;
        if (visible) {
            loaderEl.classList.remove('is-hidden');
        } else {
            loaderEl.classList.add('is-hidden');
        }
    }

    function updateControlsState(pageIndex, totalPages) {
        var counterEl = document.getElementById('cd-flipbook-counter');
        var homeBtn   = document.getElementById('cd-btn-home');
        var prevBtn   = document.getElementById('cd-btn-prev');
        var nextBtn   = document.getElementById('cd-btn-next');

        if (counterEl) {
            counterEl.textContent = (pageIndex + 1) + ' / ' + totalPages;
        }
        if (homeBtn) {
            homeBtn.disabled = (pageIndex <= 0);
        }
        if (prevBtn) {
            prevBtn.disabled = (pageIndex <= 0);
        }
        if (nextBtn) {
            nextBtn.disabled = (pageIndex >= totalPages - 1);
        }
    }

    // Proporción natural (alto/ancho) de una imagen. DEFAULT_RATIO se usa
    // solo si la imagen no carga (red caída, 404), para no romper el layout.
    function getImageRatio(src, callback) {
        var DEFAULT_RATIO = 1.35;
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

    function initFlipbook(paginas, titulo) {
        var titleEl = document.getElementById('cd-flipbook-title');
        var stageEl = document.getElementById('cd-flipbook-stage');

        if (titleEl && titulo) {
            titleEl.textContent = titulo;
        }

        if (!stageEl || !window.St || !window.St.PageFlip || !paginas.length) {
            setLoaderVisible(false);
            return;
        }

        destroyFlipbook();
        currentTotal = paginas.length;
        updateControlsState(0, currentTotal);

        var coverSrc   = paginas[0];
        var contentSrc = paginas.length > 1 ? paginas[1] : paginas[0];

        getImageRatio(coverSrc, function (coverRatio) {
            getImageRatio(contentSrc, function (contentRatio) {
                var bookEl = document.getElementById('cd-flipbook-book');
                if (!bookEl) {
                    stageEl.innerHTML = '<div id="cd-flipbook-book" class="cd-flipbook-book"></div>';
                    bookEl = document.getElementById('cd-flipbook-book');
                }

                function computeSizes() {
                    var bodyEl = document.getElementById('cd-flipbook-container');
                    var rawW = stageEl.clientWidth  || (bodyEl ? bodyEl.clientWidth - 48 : 0) || Math.round(window.innerWidth * 0.82);
                    var rawH = stageEl.clientHeight || (bodyEl ? bodyEl.clientHeight - 40 : 0) || Math.round(window.innerHeight * 0.65);

                    var stageW = Math.max(rawW - 16, 280);
                    var stageH = Math.max(rawH - 16, 360);

                    // Ancho de UNA página de contenido al leer: intenta que
                    // quepan 2 lado a lado (spread) en pantallas de escritorio;
                    // si no caben (pantallas angostas/móvil), usa 1 sola página.
                    var singleW = Math.round(stageH / contentRatio);
                    var isMobileViewport = window.innerWidth < 768;
                    var spreads = !isMobileViewport && (singleW * 2 <= stageW);
                    var contentPage;

                    if (spreads) {
                        contentPage = { w: singleW, h: stageH };
                    } else if (!isMobileViewport && stageW >= 640) {
                        // En escritorio/tablet horizontal, ajusta la altura para que quepan 2 páginas lado a lado
                        var halfW = Math.floor(stageW / 2);
                        var fitH  = Math.round(halfW * contentRatio);
                        if (fitH >= 320 && fitH <= stageH) {
                            spreads = true;
                            contentPage = { w: halfW, h: fitH };
                        } else {
                            var cw = stageW, ch = Math.round(cw * contentRatio);
                            if (ch > stageH) { ch = stageH; cw = Math.round(ch / contentRatio); }
                            contentPage = { w: cw, h: ch };
                        }
                    } else {
                        var cw2 = stageW, ch2 = Math.round(cw2 * contentRatio);
                        if (ch2 > stageH) { ch2 = stageH; cw2 = Math.round(ch2 / contentRatio); }
                        contentPage = { w: cw2, h: ch2 };
                    }

                    // Portada cerrada: proporción propia de la portada ocupando
                    // toda la altura disponible para máxima legibilidad inicial.
                    var closedH = contentPage.h;
                    var closedW = Math.round(closedH / coverRatio);
                    if (closedW > stageW) {
                        closedW = stageW;
                        closedH = Math.round(closedW * coverRatio);
                    }
                    var closed = { w: closedW, h: closedH };

                    var openW = spreads ? contentPage.w * 2 : contentPage.w;
                    var openH = contentPage.h;
                    var openMinWidth = spreads ? 100 : (contentPage.w + 10);

                    return {
                        contentPage: contentPage,
                        closed: closed,
                        openW: openW,
                        openH: openH,
                        openMinWidth: openMinWidth
                    };
                }

                var sizes          = computeSizes();
                var contentPage    = sizes.contentPage;
                var closed         = sizes.closed;
                var openW          = sizes.openW;
                var openH          = sizes.openH;
                var OPEN_MIN_WIDTH = sizes.openMinWidth;

                pageFlip = new window.St.PageFlip(bookEl, {
                    width: closed.w,
                    height: closed.h,
                    size: 'stretch',
                    minWidth: closed.w,
                    maxWidth: 3000,
                    minHeight: 100,
                    maxHeight: 3000,
                    autoSize: false,
                    showCover: true,
                    useMouseEvents: true,
                    disableFlipByClick: true,
                    flippingTime: 650,
                    maxShadowOpacity: 0.45
                });

                var BOOK_TRANSITION = 'width .32s ease, height .32s ease, opacity .22s ease';

                bookEl.style.width      = closed.w + 'px';
                bookEl.style.height     = closed.h + 'px';
                bookEl.style.transition = BOOK_TRANSITION;

                function setBookSizeInstant(w, h) {
                    bookEl.style.transition = 'none';
                    bookEl.style.width      = w + 'px';
                    bookEl.style.height     = h + 'px';
                    void bookEl.offsetWidth;
                    bookEl.style.transition = BOOK_TRANSITION;
                }

                function applyClosedState() {
                    if (!pageFlip) return;
                    var s = pageFlip.getSettings();
                    s.width              = closed.w;
                    s.height             = closed.h;
                    s.minWidth           = closed.w;
                    s.disableFlipByClick = true;
                    setBookSizeInstant(closed.w, closed.h);
                    pageFlip.update();
                }

                function applyOpenState() {
                    if (!pageFlip) return;
                    var s = pageFlip.getSettings();
                    s.width              = contentPage.w;
                    s.height             = openH;
                    s.minWidth           = OPEN_MIN_WIDTH;
                    s.disableFlipByClick = false;
                    setBookSizeInstant(openW, openH);
                    pageFlip.update();
                }

                pageFlip.loadFromImages(paginas);
                setLoaderVisible(false);

                var currentMode = 'closed';
                var homing      = false;

                pageFlip.on('flip', function (e) {
                    var idx = e.data || 0;
                    updateControlsState(idx, paginas.length);

                    var wantMode = (idx === 0) ? 'closed' : 'open';
                    if (wantMode !== currentMode) {
                        currentMode = wantMode;
                        if (wantMode === 'closed') {
                            applyClosedState();
                        } else {
                            applyOpenState();
                        }
                    }

                    if (homing) {
                        if (idx === 0) {
                            homing = false;
                        } else {
                            pageFlip.flipPrev();
                        }
                    }
                });

                var resizeTimer = null;
                resizeHandler = function () {
                    window.clearTimeout(resizeTimer);
                    resizeTimer = window.setTimeout(function () {
                        if (!pageFlip) return;
                        var next       = computeSizes();
                        contentPage    = next.contentPage;
                        closed         = next.closed;
                        openW          = next.openW;
                        openH          = next.openH;
                        OPEN_MIN_WIDTH = next.openMinWidth;
                        if (currentMode === 'closed') {
                            applyClosedState();
                        } else {
                            applyOpenState();
                        }
                    }, 180);
                };
                window.addEventListener('resize', resizeHandler);

                function openBook() {
                    if (!pageFlip) return;
                    bookEl.style.opacity = '0';
                    bookEl.style.width   = openW + 'px';
                    bookEl.style.height  = openH + 'px';

                    var finished = false;
                    var fallbackTimer = window.setTimeout(finish, 400);

                    function finish(ev) {
                        if (finished) return;
                        if (ev && ev.target !== bookEl) return;
                        finished = true;
                        window.clearTimeout(fallbackTimer);
                        bookEl.removeEventListener('transitionend', finish);
                        currentMode = 'open';
                        applyOpenState();
                        window.requestAnimationFrame(function () {
                            window.requestAnimationFrame(function () {
                                if (!pageFlip) return;
                                bookEl.style.opacity = '1';
                                pageFlip.flipNext();
                            });
                        });
                    }
                    bookEl.addEventListener('transitionend', finish);
                }

                bookEl.addEventListener('click', function () {
                    if (pageFlip && pageFlip.getCurrentPageIndex() === 0) {
                        openBook();
                    }
                });

                var homeBtn = document.getElementById('cd-btn-home');
                var prevBtn = document.getElementById('cd-btn-prev');
                var nextBtn = document.getElementById('cd-btn-next');

                if (homeBtn) {
                    homeBtn.onclick = function () {
                        if (!pageFlip || pageFlip.getCurrentPageIndex() === 0) return;
                        homing = true;
                        pageFlip.flipPrev();
                    };
                }
                if (prevBtn) {
                    prevBtn.onclick = function () {
                        if (!pageFlip || pageFlip.getCurrentPageIndex() === 0) return;
                        pageFlip.flipPrev();
                    };
                }
                if (nextBtn) {
                    nextBtn.onclick = function () {
                        if (!pageFlip) return;
                        if (pageFlip.getCurrentPageIndex() === 0) {
                            openBook();
                        } else {
                            pageFlip.flipNext();
                        }
                    };
                }

                keyHandler = function (e) {
                    if (!pageFlip) return;
                    if (e.key === 'ArrowRight') {
                        e.preventDefault();
                        if (pageFlip.getCurrentPageIndex() === 0) {
                            openBook();
                        } else {
                            pageFlip.flipNext();
                        }
                    } else if (e.key === 'ArrowLeft') {
                        e.preventDefault();
                        if (pageFlip.getCurrentPageIndex() > 0) {
                            pageFlip.flipPrev();
                        }
                    }
                };
                document.addEventListener('keydown', keyHandler);
            });
        });
    }

    document.addEventListener('show.bs.modal', function (e) {
        if (!e.target || e.target.id !== MODAL_ID) return;
        setLoaderVisible(true);
        var trigger = e.relatedTarget;
        var titleEl = document.getElementById('cd-flipbook-title');
        if (titleEl && trigger) {
            titleEl.textContent = trigger.getAttribute('data-titulo') || 'Acciones x la integridad';
        }
    });

    document.addEventListener('shown.bs.modal', function (e) {
        if (!e.target || e.target.id !== MODAL_ID) return;

        var trigger = e.relatedTarget || document.querySelector('[data-modal-target="#' + MODAL_ID + '"]');
        if (!trigger) {
            setLoaderVisible(false);
            return;
        }

        var paginas = [];
        try { paginas = JSON.parse(trigger.getAttribute('data-paginas') || '[]'); }
        catch (err) { paginas = []; }

        var titulo = trigger.getAttribute('data-titulo') || 'Acciones x la integridad';

        initFlipbook(paginas, titulo);
    });

    document.addEventListener('hidden.bs.modal', function (e) {
        if (!e.target || e.target.id !== MODAL_ID) return;
        destroyFlipbook();
        setLoaderVisible(true);
    });

})();
