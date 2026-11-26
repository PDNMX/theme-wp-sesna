/**
 * Visor universal de PDF en modal y controlador global de modales SND (window.sndModal).
 *
 * Extraído de template-parts/visor-pdf.php (Etapa 3.3 del plan SND v1.0.0). Se carga con defer
 * desde inc/enqueue.php; el código es el mismo que estaba en línea.
 */
(function() {
    'use strict';

    // Ícono SVG pre-renderizado en servidor (sesna_render_snd_svg_icon) inyectado desde inc/enqueue.php
    var iconoPdf = (window.sesnaVisorPdf && window.sesnaVisorPdf.iconoPdf) || '';

    // ── Controlador Global de Modales SND ─────────────────────────
    var backdropEl = null;

    function getOrCreateBackdrop() {
        if (!backdropEl) {
            backdropEl = document.getElementById('snd-modal-backdrop');
            if (!backdropEl) {
                backdropEl = document.createElement('div');
                backdropEl.id = 'snd-modal-backdrop';
                backdropEl.className = 'snd-modal-backdrop';
                document.body.appendChild(backdropEl);
                backdropEl.addEventListener('click', function() {
                    var openModal = document.querySelector('.modal.is-open');
                    if (openModal) {
                        window.sndModal.hide(openModal);
                    }
                });
            }
        }
        return backdropEl;
    }

    var SCROLLBAR_VAR = '--snd-scrollbar-width';

    function compensateSndHeader() {
        var header = document.querySelector('snd-header');
        var shadow = header && header.shadowRoot;
        if (!shadow || shadow.getElementById('snd-scrollbar-fix')) return;

        var style = document.createElement('style');
        style.id = 'snd-scrollbar-fix';
        style.textContent = '.mexico { border-right: var(' + SCROLLBAR_VAR + ', 0px) solid transparent !important; }';
        shadow.appendChild(style);
    }

    function lockScroll() {
        var root = document.documentElement;
        var scrollbarWidth = window.innerWidth - root.clientWidth;
        if (scrollbarWidth > 0) {
            root.style.setProperty(SCROLLBAR_VAR, scrollbarWidth + 'px');
        }
        compensateSndHeader();
        document.body.classList.add('snd-modal-open');
    }

    function unlockScroll() {
        document.body.classList.remove('snd-modal-open');
        document.documentElement.style.removeProperty(SCROLLBAR_VAR);
    }

    window.sndModal = {
        show: function(modalEl, trigger) {
            if (typeof modalEl === 'string') {
                modalEl = document.querySelector(modalEl);
            }
            if (!modalEl) return;

            // Disparar evento de apertura (compatible con show.bs.modal)
            var showEvent = new CustomEvent('show.bs.modal', {
                bubbles: true,
                cancelable: true,
                detail: { relatedTarget: trigger }
            });
            showEvent.relatedTarget = trigger;
            modalEl.dispatchEvent(showEvent);
            if (showEvent.defaultPrevented) return;

            var bd = getOrCreateBackdrop();
            bd.classList.add('is-visible');

            modalEl.classList.add('is-open');
            modalEl.setAttribute('aria-modal', 'true');
            modalEl.removeAttribute('aria-hidden');
            lockScroll();

            // Foco accesible al diálogo o botón de cierre
            var closeBtn = modalEl.querySelector('[data-modal-dismiss], .btn-close');
            if (closeBtn) {
                closeBtn.focus();
            }

            // Disparar shown
            setTimeout(function() {
                var shownEvent = new CustomEvent('shown.bs.modal', {
                    bubbles: true,
                    cancelable: false,
                    detail: { relatedTarget: trigger }
                });
                shownEvent.relatedTarget = trigger;
                modalEl.dispatchEvent(shownEvent);
            }, 250);
        },
        hide: function(modalEl) {
            if (typeof modalEl === 'string') {
                modalEl = document.querySelector(modalEl);
            }
            if (!modalEl) return;

            var hideEvent = new CustomEvent('hide.bs.modal', {
                bubbles: true,
                cancelable: true
            });
            modalEl.dispatchEvent(hideEvent);
            if (hideEvent.defaultPrevented) return;

            modalEl.classList.remove('is-open');
            modalEl.setAttribute('aria-hidden', 'true');
            modalEl.removeAttribute('aria-modal');

            // Si no quedan más modales abiertos, ocultar backdrop
            var remaining = document.querySelectorAll('.modal.is-open');
            if (remaining.length === 0) {
                var bd = getOrCreateBackdrop();
                bd.classList.remove('is-visible');
                unlockScroll();
            }

            setTimeout(function() {
                var hiddenEvent = new CustomEvent('hidden.bs.modal', {
                    bubbles: true,
                    cancelable: false
                });
                modalEl.dispatchEvent(hiddenEvent);
            }, 250);
        }
    };

    // Shim de compatibilidad para código externo que invoque la API modal
    var bsObj = window['bootstrap'] = window['bootstrap'] || {};
    if (!bsObj['Modal']) {
        bsObj['Modal'] = function(el) {
            return {
                show: function() { window.sndModal.show(el); },
                hide: function() { window.sndModal.hide(el); }
            };
        };
        bsObj['Modal']['getInstance'] = function(el) {
            return new bsObj['Modal'](el);
        };
    }
    if (window.jQuery && !window.jQuery.fn.modal) {
        window.jQuery.fn.modal = function(action) {
            return this.each(function() {
                if (action === 'hide') {
                    window.sndModal.hide(this);
                } else {
                    window.sndModal.show(this);
                }
            });
        };
    }

    // Delegación global: abrir modal por atributo data-modal-target
    document.addEventListener('click', function(e) {
        var openTrigger = e.target.closest('[data-modal-target]');
        if (openTrigger) {
            var targetSelector = openTrigger.getAttribute('data-modal-target');
            if (targetSelector && targetSelector !== '#pdfViewerModal') {
                var targetModal = document.querySelector(targetSelector);
                if (targetModal) {
                    e.preventDefault();
                    window.sndModal.show(targetModal, openTrigger);
                }
            }
        }
    });

    // Delegación global: cerrar con botón de cierre o tecla Escape
    document.addEventListener('click', function(e) {
        var dismissBtn = e.target.closest('[data-modal-dismiss]');
        if (dismissBtn) {
            var modal = dismissBtn.closest('.modal');
            if (modal) {
                e.preventDefault();
                window.sndModal.hide(modal);
            }
        }

        // Clic en el área exterior del diálogo modal
        if (e.target.classList.contains('modal') && e.target.classList.contains('is-open')) {
            window.sndModal.hide(e.target);
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            var openModal = document.querySelector('.modal.is-open');
            if (openModal) {
                window.sndModal.hide(openModal);
            }
        }
    });

    // ── Lógica del Visor de Documentos PDF ────────────────────────
    document.addEventListener('DOMContentLoaded', function () {
        var pdfModalEl = document.getElementById('pdfViewerModal');
        if (!pdfModalEl) return;

        var iframe = document.getElementById('pdfIframe');
        var downloadBtn = document.getElementById('pdfDownloadBtn');
        var copyLinkBtn = document.getElementById('pdfCopyLinkBtn');
        var copyLinkBtnText = document.getElementById('pdfCopyLinkBtnText');
        var loader = document.getElementById('pdfLoader');
        var title = document.getElementById('pdfViewerModalLabel');
        var lastResolvedByClick = false;

        function urlVisor(url) {
            return url.split('#')[0] + '#pagemode=none&navpanes=0';
        }

        if (copyLinkBtn) {
            copyLinkBtn.addEventListener('click', function () {
                var url = downloadBtn ? downloadBtn.href : '';
                if (!url || url === '#' || url.endsWith('/#')) return;

                var showCopied = function () {
                    copyLinkBtn.classList.add('is-copied');
                    if (copyLinkBtnText) copyLinkBtnText.textContent = '¡Enlace copiado!';
                    setTimeout(function () {
                        copyLinkBtn.classList.remove('is-copied');
                        if (copyLinkBtnText) copyLinkBtnText.textContent = 'Copiar enlace';
                    }, 2000);
                };

                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(url).then(showCopied).catch(function () {
                        copyLinkFallback(url, showCopied);
                    });
                } else {
                    copyLinkFallback(url, showCopied);
                }
            });
        }

        if (downloadBtn) {
            downloadBtn.addEventListener('click', function (e) {
                var url = downloadBtn.href;
                if (!url || url === '#' || url.endsWith('/#')) return;

                e.preventDefault();
                var filename = 'documento.pdf';
                try {
                    var path = new URL(url, window.location.href).pathname;
                    filename = decodeURIComponent(path.substring(path.lastIndexOf('/') + 1)) || filename;
                } catch (err) {}

                var triggerDownload = function (href) {
                    var tempLink = document.createElement('a');
                    tempLink.href = href;
                    tempLink.download = filename;
                    document.body.appendChild(tempLink);
                    tempLink.click();
                    document.body.removeChild(tempLink);
                };

                fetch(url)
                    .then(function (res) {
                        if (!res.ok) throw new Error('network');
                        return res.blob();
                    })
                    .then(function (blob) {
                        var blobUrl = URL.createObjectURL(blob);
                        triggerDownload(blobUrl);
                        setTimeout(function () { URL.revokeObjectURL(blobUrl); }, 1000);
                    })
                    .catch(function () {
                        triggerDownload(url);
                    });
            });
        }

        function copyLinkFallback(url, onSuccess) {
            var temp = document.createElement('textarea');
            temp.value = url;
            temp.style.position = 'fixed';
            temp.style.opacity = '0';
            document.body.appendChild(temp);
            temp.focus();
            temp.select();
            var copied = false;
            try {
                copied = document.execCommand('copy');
            } catch (err) {
                copied = false;
            }
            document.body.removeChild(temp);
            if (copied) {
                onSuccess();
            } else {
                window.prompt('Copia el enlace manualmente (Ctrl+C / Cmd+C):', url);
            }
        }

        // Delegación de apertura para cualquier trigger de PDF
        document.addEventListener('click', function(e) {
            if (e.target.closest('.pna-anexos-header')) return;

            var trigger = e.target.closest('[data-modal-target="#pdfViewerModal"], .pna-anexo-item, .tx-sesion-pdf-link, .tx-sesion-chevron-link, a[data-pdf-url]');
            if (!trigger) return;

            var targetAttr = trigger.getAttribute('data-modal-target');
            if (targetAttr && targetAttr !== '#pdfViewerModal') return;

            var pdfUrl = trigger.getAttribute('data-pdf-url') || trigger.getAttribute('href') || '#';

            // Archivos no-PDF se descargan directo
            if (pdfUrl && pdfUrl !== '#' && !/\.pdf(\?.*)?$/i.test(pdfUrl)) {
                e.preventDefault();
                var tempLink = document.createElement('a');
                tempLink.href = pdfUrl;
                tempLink.download = '';
                document.body.appendChild(tempLink);
                tempLink.click();
                document.body.removeChild(tempLink);
                return;
            }

            e.preventDefault();

            var pdfTitle = trigger.getAttribute('data-pdf-title') || '';
            if (!pdfTitle) {
                var parentRow = trigger.closest('.pna-foro-item, .pna-step-card, .tx-doc-row, .tx-sesion-row, tr, li, div.row, div.card');
                if (parentRow && parentRow.querySelector('h3, h4, h5, h6, .fw-bold, .nombreActa, .tx-sesion-info-title')) {
                    pdfTitle = parentRow.querySelector('h3, h4, h5, h6, .fw-bold, .nombreActa, .tx-sesion-info-title').innerText.trim();
                } else {
                    pdfTitle = trigger.innerText.trim();
                }
            }
            pdfTitle = pdfTitle.replace(/\s*\(PDF\)\s*/gi, '').replace(/<i[^>]*>.*?<\/i>/gi, '').replace(/^Ver\s+/i, '').replace(/^Descargar\s+/i, '').replace(/^Consultar\s*/i, '').trim() || 'Visor de Documento';

            if (title) title.textContent = pdfTitle;
            if (downloadBtn) downloadBtn.href = pdfUrl;

            if (iframe) {
                iframe.style.opacity = '0';
                if (loader) loader.style.display = 'block';

                if (pdfUrl === '#' || !pdfUrl || pdfUrl === '') {
                    iframe.src = 'about:blank';
                    setTimeout(function() {
                        var doc = iframe.contentWindow || iframe.contentDocument;
                        var docEl = doc.document ? doc.document : doc;
                        docEl.open();
                        docEl.write('<div style="font-family: \'Noto Sans\', sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; background: #f8f9fa; color: #555; text-align: center; padding: 20px; box-sizing: border-box;"><div style="font-size: 56px; color: #691C32; margin-bottom: 20px;">' + iconoPdf + '</div><h3 style="margin: 0 0 12px 0; color: #222; font-weight: 700; font-size: 22px;">' + (title ? title.textContent : pdfTitle) + '</h3><p style="margin: 0 0 24px 0; font-size: 15px; max-width: 480px; line-height: 1.5;">Este documento estará disponible próximamente para consulta e impresión en formato PDF.</p><div style="padding: 10px 20px; background: #E5B8C0; color: #691C32; border-radius: 50px; font-weight: 600; font-size: 13px;">Archivo en vinculación</div></div>');
                        docEl.close();
                        iframe.style.transition = 'opacity 0.4s ease';
                        iframe.style.opacity = '1';
                        if (loader) loader.style.display = 'none';
                    }, 150);
                } else {
                    iframe.src = urlVisor(pdfUrl);
                }
            }

            lastResolvedByClick = true;
            window.sndModal.show(pdfModalEl, trigger);
        }, true);

        pdfModalEl.addEventListener('show.bs.modal', function (event) {
            if (lastResolvedByClick) {
                lastResolvedByClick = false;
                return;
            }
            const button = event.relatedTarget;
            if (!button) return;
            const pdfUrl = button.getAttribute('data-pdf-url') || button.getAttribute('href') || '#';

            if (pdfUrl && pdfUrl !== '#' && !/\.pdf(\?.*)?$/i.test(pdfUrl)) {
                event.preventDefault();
                return;
            }

            let pdfTitle = button.getAttribute('data-pdf-title') || '';
            if (!pdfTitle) {
                const parentRow = button.closest('.pna-foro-item, .pna-step-card, .tx-doc-row, .tx-sesion-row, tr, li, div.row, div.card');
                if (parentRow && parentRow.querySelector('h3, h4, h5, h6, .fw-bold, .nombreActa, .tx-sesion-info-title')) {
                    pdfTitle = parentRow.querySelector('h3, h4, h5, h6, .fw-bold, .nombreActa, .tx-sesion-info-title').innerText.trim();
                } else {
                    pdfTitle = button.innerText.trim();
                }
            }
            pdfTitle = pdfTitle.replace(/\s*\(PDF\)\s*/gi, '').replace(/<i[^>]*>.*?<\/i>/gi, '').replace(/^Ver\s+/i, '').replace(/^Descargar\s+/i, '').replace(/^Consultar\s*/i, '').trim() || 'Visor de Documento';

            if (title) title.textContent = pdfTitle;
            if (downloadBtn) downloadBtn.href = pdfUrl;

            if (iframe && iframe.getAttribute('src') !== urlVisor(pdfUrl)) {
                iframe.style.opacity = '0';
                if (loader) loader.style.display = 'block';
                if (pdfUrl !== '#' && pdfUrl !== '') {
                    iframe.src = urlVisor(pdfUrl);
                }
            }
        });

        if (iframe) {
            iframe.onload = function() {
                iframe.style.transition = 'opacity 0.4s ease';
                iframe.style.opacity = '1';
                if (loader) loader.style.display = 'none';
            };
        }

        pdfModalEl.addEventListener('hidden.bs.modal', function () {
            if (iframe) iframe.src = '';
            if (title) title.textContent = 'Visor de Documento';
            if (loader) loader.style.display = 'block';
        });
    });
})();
