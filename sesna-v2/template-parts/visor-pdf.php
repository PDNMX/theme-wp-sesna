<?php
/**
 * Visor Universal de PDF en Modal (SND v1.1.0)
 * Utilizado en páginas de Transparencia, PNA y Administración.
 */
?>
<!-- Estilos del Modal Nativo Accesible SND v1.1.0 -->
<style>
/* Overlay/Backdrop institucional SND (neutro-800 al 56%) */
.snd-modal-backdrop {
    position: fixed !important;
    inset: 0 !important;
    z-index: 20000000 !important;
    background-color: rgba(22, 26, 29, 0.56) !important;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.25s ease-in-out, visibility 0.25s ease-in-out;
}
.snd-modal-backdrop.is-visible {
    opacity: 1 !important;
    visibility: visible !important;
}

/* Contenedor Modal */
.modal.snd-modal,
.modal.tx-pdf-modal {
    position: fixed !important;
    inset: 0 !important;
    z-index: 20000005 !important;
    display: none;
    overflow-x: hidden;
    overflow-y: auto;
    outline: 0;
    padding: 24px 16px;
    box-sizing: border-box;
}
.modal.snd-modal.is-open,
.modal.tx-pdf-modal.is-open {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

/* Diálogo / Layout */
.modal.snd-modal .modal-dialog,
.tx-pdf-modal__dialog {
    width: 100% !important;
    max-width: 960px !important;
    height: auto !important;
    margin: auto !important;
    transform: translateY(-20px);
    transition: transform 0.25s ease-out;
    box-sizing: border-box;
}
.modal.snd-modal.is-open .modal-dialog,
.modal.tx-pdf-modal.is-open .tx-pdf-modal__dialog {
    transform: translateY(0) !important;
}

/* Superficie Modal (Fondo blanco, Sombra Drop LV 3 y radio 16px) */
.modal.snd-modal .modal-content,
.tx-pdf-modal__content {
    background-color: var(--neutro100, #ffffff) !important;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.20) !important;
    border-radius: 16px !important;
    border: 1px solid var(--neutro400, #dddddd) !important;
    overflow: hidden !important;
    display: flex !important;
    flex-direction: column !important;
    height: auto !important;
    max-height: calc(100vh - 48px) !important;
    width: 100% !important;
}

/* Cabecera del Visor */
.tx-pdf-modal__header {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    gap: 16px !important;
    padding: 16px 24px !important;
    background-color: var(--neutro100, #ffffff) !important;
    border-bottom: 1px solid var(--neutro400, #dddddd) !important;
    flex-shrink: 0 !important;
}
.tx-pdf-modal__title {
    margin: 0 !important;
    font-size: 1.25rem !important;
    line-height: 1.4 !important;
    word-break: break-word !important;
}
.tx-pdf-modal__close-btn {
    width: 44px !important;
    min-width: 44px !important;
    height: 44px !important;
    min-height: 44px !important;
    padding: 0 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    border-radius: 50% !important;
    flex-shrink: 0 !important;
    cursor: pointer !important;
    border: none !important;
    background: transparent !important;
    color: var(--principal, #611232) !important;
    transition: background-color 0.15s ease-in-out, color 0.15s ease-in-out !important;
}
.tx-pdf-modal__close-btn:hover {
    background-color: var(--gama100, #f3e4e9) !important;
    color: var(--gama600, #9b2247) !important;
}
.tx-pdf-modal__close-btn:focus-visible {
    outline: 2px solid var(--principal, #611232) !important;
    background-color: var(--gama100, #f3e4e9) !important;
}
.tx-pdf-modal__close-btn .snd-close:empty::before {
    content: "✕";
    font-size: 20px;
    line-height: 1;
    font-style: normal;
    font-weight: 700;
}

/* Cuerpo del Visor con Iframe y Loader */
.tx-pdf-modal__body {
    position: relative !important;
    background-color: var(--neutro800, #161a1d) !important;
    height: 60vh !important;
    min-height: 400px !important;
    max-height: calc(100vh - 220px) !important;
    flex: 1 1 auto !important;
    overflow: hidden !important;
}
.tx-pdf-modal__loader {
    position: absolute !important;
    inset: 0 !important;
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: center !important;
    z-index: 1 !important;
    text-align: center !important;
    padding: 24px !important;
    pointer-events: none !important;
}
.tx-pdf-modal__iframe {
    width: 100% !important;
    height: 100% !important;
    border: 0 !important;
    display: block !important;
    position: relative !important;
    z-index: 2 !important;
}

/* Pie de Acciones */
.tx-pdf-modal__footer {
    display: flex !important;
    flex-wrap: wrap !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 16px !important;
    padding: 16px 24px !important;
    background-color: var(--neutro100, #ffffff) !important;
    border-top: 1px solid var(--neutro400, #dddddd) !important;
    flex-shrink: 0 !important;
}
#pdfCopyLinkBtn.is-copied {
    background-color: var(--principal, #611232) !important;
    border-color: var(--principal, #611232) !important;
    color: var(--neutro100, #ffffff) !important;
}
#pdfCopyLinkBtn.is-copied .snd__icono,
#pdfCopyLinkBtn.is-copied svg,
#pdfCopyLinkBtn.is-copied svg path,
#pdfCopyLinkBtn.is-copied img,
#pdfCopyLinkBtn.is-copied i {
    color: var(--neutro100, #ffffff) !important;
    fill: var(--neutro100, #ffffff) !important;
    stroke: var(--neutro100, #ffffff) !important;
    filter: brightness(0) invert(1) !important;
}
#pdfCopyLinkBtn.is-copied:hover {
    background-color: var(--pguinda600, #9b2247) !important;
    border-color: var(--pguinda600, #9b2247) !important;
    color: var(--neutro100, #ffffff) !important;
}
#pdfCopyLinkBtn.is-copied:hover .snd__icono,
#pdfCopyLinkBtn.is-copied:hover svg,
#pdfCopyLinkBtn.is-copied:hover svg path,
#pdfCopyLinkBtn.is-copied:hover img,
#pdfCopyLinkBtn.is-copied:hover i {
    color: var(--neutro100, #ffffff) !important;
    fill: var(--neutro100, #ffffff) !important;
    stroke: var(--neutro100, #ffffff) !important;
    filter: brightness(0) invert(1) !important;
}
#pdfCopyLinkBtn.is-copied:focus,
#pdfCopyLinkBtn.is-copied:focus-visible {
    background-color: var(--principal, #611232) !important;
    border-color: var(--principal, #611232) !important;
    outline: 3px solid var(--pguinda300, #ce92a6) !important;
    outline-offset: -1px !important;
    color: var(--neutro100, #ffffff) !important;
}
#pdfCopyLinkBtn.is-copied:active {
    background-color: var(--pguinda100, #f3e4e9) !important;
    border-color: var(--pguinda100, #f3e4e9) !important;
    color: var(--neutro800, #161a1d) !important;
}
#pdfCopyLinkBtn.is-copied:active .snd__icono,
#pdfCopyLinkBtn.is-copied:active svg,
#pdfCopyLinkBtn.is-copied:active svg path,
#pdfCopyLinkBtn.is-copied:active img,
#pdfCopyLinkBtn.is-copied:active i {
    color: var(--neutro800, #161a1d) !important;
    fill: var(--neutro800, #161a1d) !important;
    stroke: var(--neutro800, #161a1d) !important;
    filter: none !important;
}

/* Adaptación responsiva SND Móvil (< 640px) */
@media (max-width: 639.98px) {
    .modal.snd-modal,
    .modal.tx-pdf-modal {
        padding: 8px !important;
    }
    .tx-pdf-modal__dialog {
        max-height: calc(100vh - 16px) !important;
    }
    .tx-pdf-modal__header {
        padding: 12px 16px !important;
    }
    .tx-pdf-modal__title {
        font-size: 1.125rem !important;
    }
    .tx-pdf-modal__body {
        height: 50vh !important;
        min-height: 300px !important;
    }
    .tx-pdf-modal__footer {
        padding: 12px 16px !important;
        gap: 8px !important;
        flex-direction: column !important;
    }
    .tx-pdf-modal__footer [class*="boton__"] {
        width: 100% !important;
    }
}

body.snd-modal-open {
    overflow: hidden !important;
}
</style>

<!-- Script del Visor Universal y Controlador Modal Nativo SND v1.1.0 -->
<script>
(function() {
    'use strict';

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
            document.body.classList.add('snd-modal-open');

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
                document.body.classList.remove('snd-modal-open');
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
                        docEl.write('<div style="font-family: \'Noto Sans\', sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; background: #f8f9fa; color: #555; text-align: center; padding: 20px; box-sizing: border-box;"><div style="font-size: 56px; color: #691C32; margin-bottom: 20px;"><i class="snd__icono snd-document--pdf icono--64" style="color:#691C32;"></i></div><h3 style="margin: 0 0 12px 0; color: #222; font-weight: 700; font-size: 22px;">' + (title ? title.textContent : pdfTitle) + '</h3><p style="margin: 0 0 24px 0; font-size: 15px; max-width: 480px; line-height: 1.5;">Este documento estará disponible próximamente para consulta e impresión en formato PDF.</p><div style="padding: 10px 20px; background: #E5B8C0; color: #691C32; border-radius: 50px; font-weight: 600; font-size: 13px;">Archivo en vinculación</div></div>');
                        docEl.close();
                        iframe.style.transition = 'opacity 0.4s ease';
                        iframe.style.opacity = '1';
                        if (loader) loader.style.display = 'none';
                    }, 150);
                } else {
                    iframe.src = pdfUrl;
                }
            }

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

            if (iframe && iframe.src !== pdfUrl) {
                iframe.style.opacity = '0';
                if (loader) loader.style.display = 'block';
                if (pdfUrl !== '#' && pdfUrl !== '') {
                    iframe.src = pdfUrl;
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
</script>

<!-- Modal Visor de Documento PDF (SND v1.1.0) -->
<div class="modal tx-pdf-modal" id="pdfViewerModal" tabindex="-1" role="dialog" aria-labelledby="pdfViewerModalLabel" aria-hidden="true">
    <div class="tx-pdf-modal__dialog">
        <div class="tx-pdf-modal__content">
            <!-- Header -->
            <div class="tx-pdf-modal__header">
                <h2 class="sh1b patria color--principal tx-pdf-modal__title" id="pdfViewerModalLabel">Visor de Documento</h2>
                <button type="button" class="boton__fantasma tx-pdf-modal__close-btn" data-modal-dismiss aria-label="Cerrar modal">
                    <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
                </button>
            </div>
            
            <!-- Body con iframe y spinner SND -->
            <div class="tx-pdf-modal__body">
                <div id="pdfLoader" class="tx-pdf-modal__loader">
                    <i class="snd__icono snd-snd-loading2 icono__spin icono--32 color--blanco mb--8" aria-hidden="true"></i>
                    <div class="b2r color--blanco">Cargando documento...</div>
                </div>
                <iframe id="pdfIframe" src="" class="tx-pdf-modal__iframe" allowfullscreen title="Documento PDF"></iframe>
            </div>

            <!-- Footer con acciones oficiales SND (Botón con iconos: radio canónico 8px) -->
            <div class="tx-pdf-modal__footer">
                <button type="button" id="pdfCopyLinkBtn" class="boton__secundario">
                    <i class="snd__icono snd-launch icono--16" aria-hidden="true"></i>
                    <span id="pdfCopyLinkBtnText">Copiar enlace</span>
                </button>
                <a href="#" id="pdfDownloadBtn" class="boton__primario" download>
                    <i class="snd__icono snd-download icono--16" aria-hidden="true"></i>
                    Descargar PDF
                </a>
            </div>
        </div>
    </div>
</div>
