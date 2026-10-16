<?php
/**
 * Visor Universal de PDF en Modal (SND v1.1.0)
 * Utilizado en páginas de Transparencia, PNA y Administración.
 */
?>
<!-- Estilos del Modal Nativo Accesible SND v1.1.0 -->
<style>
.snd-modal-backdrop {
    position: fixed;
    inset: 0;
    z-index: 1050;
    background-color: rgba(22, 26, 29, 0.56); /* neutro-800 al 56% según SND Sección 3.1 */
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.25s ease-in-out, visibility 0.25s ease-in-out;
}
.snd-modal-backdrop.is-visible {
    opacity: 1;
    visibility: visible;
}
.modal.snd-modal,
.modal.tx-pdf-modal {
    position: fixed;
    inset: 0;
    z-index: 1055;
    display: none;
    overflow-x: hidden;
    overflow-y: auto;
    outline: 0;
}
.modal.snd-modal.is-open,
.modal.tx-pdf-modal.is-open {
    display: block;
}
.modal.snd-modal .modal-dialog,
.modal.tx-pdf-modal .modal-dialog {
    transform: translateY(-20px);
    transition: transform 0.25s ease-out;
}
.modal.snd-modal.is-open .modal-dialog,
.modal.tx-pdf-modal.is-open .modal-dialog {
    transform: translateY(0);
}
.modal.snd-modal .modal-content,
.modal.tx-pdf-modal .modal-content {
    background-color: #ffffff;
    box-shadow: 0px 6px 12px 0px rgba(0, 0, 0, 0.2); /* Sombra Drop LV 3 SND */
    border-radius: 16px;
    border: none;
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
    <div class="modal-dialog" style="max-width: 900px !important; margin: 5vh auto !important;">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-white border-0 py-4 px-4 position-relative d-flex align-items-center justify-content-between">
                <h5 class="modal-title h5b patria mb-0" id="pdfViewerModalLabel" style="color: var(--color-burgundi); font-size: 1.25rem;">Visor de Documento</h5>
                <button type="button" class="boton__fantasma p-2 rounded-circle" data-modal-dismiss aria-label="Cerrar modal">
                    <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body p-0 bg-dark position-relative" style="height: 65vh; min-height: 500px;">
                <!-- Loader spinner -->
                <div id="pdfLoader" class="position-absolute top-50 start-50 translate-middle text-white text-center">
                    <i class="snd__icono snd-snd-loading2 icono__spin icono--32 color--blanco mb-2" aria-hidden="true"></i>
                    <div class="font-noto-sans small">Cargando documento...</div>
                </div>
                <iframe id="pdfIframe" src="" class="w-100 h-100 border-0 position-relative" style="z-index: 2;" allowfullscreen></iframe>
            </div>
            <div class="modal-footer border-0 justify-content-center py-4 bg-white gap-3">
                <button type="button" id="pdfCopyLinkBtn" class="boton__secundario boton--redondeado font-noto-sans fw-bold px-4 py-2">
                    <i class="snd__icono snd-launch icono--16 me-2" aria-hidden="true"></i> <span id="pdfCopyLinkBtnText">Copiar enlace</span>
                </button>
                <a href="#" id="pdfDownloadBtn" class="boton__primario boton--redondeado font-noto-sans fw-bold px-4 py-2" download>
                    <i class="snd__icono snd-download icono--16 me-2" aria-hidden="true"></i> Descargar PDF
                </a>
            </div>
        </div>
    </div>
</div>
