<?php
/**
 * Visor Universal de PDF en Modal
 * Utilizado en páginas de Transparencia y Política Nacional Anticorrupción.
 */
?>
<!-- Script del Visor Universal de PDF -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const pdfModalEl = document.getElementById('pdfViewerModal');
    if (pdfModalEl) {
        const iframe = document.getElementById('pdfIframe');
        const downloadBtn = document.getElementById('pdfDownloadBtn');
        const loader = document.getElementById('pdfLoader');
        const title = document.getElementById('pdfViewerModalLabel');

        document.addEventListener('click', function(e) {
            // No hacer nada si se hace clic en cabeceras de acordeón u otros controles de UI
            if (e.target.closest('.pna-anexos-header')) return;

            // Buscar si el clic fue en un elemento de documento PDF
            const trigger = e.target.closest('[data-bs-toggle="modal"][data-bs-target="#pdfViewerModal"], .pna-doc-card, .pna-anexo-item, .tx-sesion-pdf-link, .tx-sesion-chevron-link, a[data-pdf-url]');
            
            // Verificar por clase, atributo o contenido de texto si es un PDF
            let isPdfTrigger = false;
            if (trigger) {
                if (trigger.getAttribute('data-bs-target') === '#pdfViewerModal' || trigger.classList.contains('pna-doc-card') || trigger.classList.contains('pna-anexo-item') || trigger.classList.contains('tx-sesion-pdf-link') || trigger.classList.contains('tx-sesion-chevron-link') || trigger.hasAttribute('data-pdf-url')) {
                    isPdfTrigger = true;
                } else if (trigger.innerText && (trigger.innerText.includes('PDF') || trigger.innerText.includes('Relatoría') || trigger.innerText.includes('Acta') || trigger.innerText.includes('Resolución'))) {
                    isPdfTrigger = true;
                }
            }

            if (!isPdfTrigger || !trigger) return;

            e.preventDefault();
            
            // Obtener título y URL
            let pdfTitle = trigger.getAttribute('data-pdf-title') || '';
            if (!pdfTitle) {
                const parentRow = trigger.closest('.pna-foro-item, .pna-step-card, .tx-doc-row, .tx-sesion-row, tr, li, div.row, div.card');
                if (parentRow && parentRow.querySelector('h3, h4, h5, h6, .fw-bold, .nombreActa, .tx-sesion-info-title')) {
                    pdfTitle = parentRow.querySelector('h3, h4, h5, h6, .fw-bold, .nombreActa, .tx-sesion-info-title').innerText.trim();
                } else {
                    pdfTitle = trigger.innerText.trim();
                }
            }
            pdfTitle = pdfTitle.replace(/\s*\(PDF\)\s*/gi, '').replace(/<i[^>]*>.*?<\/i>/gi, '').replace(/^Ver\s+/i, '').replace(/^Descargar\s+/i, '').replace(/^Consultar\s*/i, '').trim() || 'Visor de Documento';
            
            const pdfUrl = trigger.getAttribute('data-pdf-url') || trigger.getAttribute('href') || '#';
            
            if (title) title.textContent = pdfTitle;
            if (downloadBtn) downloadBtn.href = pdfUrl;
            
            if (iframe) {
                iframe.style.opacity = '0';
                if (loader) loader.style.display = 'block';
                
                if (pdfUrl === '#' || !pdfUrl || pdfUrl === '') {
                    iframe.src = 'about:blank';
                    setTimeout(function() {
                        const doc = iframe.contentWindow || iframe.contentDocument;
                        const docEl = doc.document ? doc.document : doc;
                        docEl.open();
                        docEl.write('<div style="font-family: \'Noto Sans\', \'Inter\', sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; background: #f8f9fa; color: #555; text-align: center; padding: 20px; box-sizing: border-box;"><div style="font-size: 56px; color: #691C32; margin-bottom: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16"><path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"/><path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.659.823-.073.31-.069.663-.038 1.042.029.36.082.748.16 1.155a13.266 13.266 0 0 1-1.028 1.543c-.347.432-.676.786-.983 1.04-.3.247-.6.417-.852.477-.247.059-.446.035-.572-.058a.56.56 0 0 1-.168-.23c-.024-.056-.035-.118-.035-.181 0-.107.03-.217.087-.323z"/></svg></div><h3 style="margin: 0 0 12px 0; color: #222; font-weight: 700; font-size: 22px;">' + (title ? title.textContent : pdfTitle) + '</h3><p style="margin: 0 0 24px 0; font-size: 15px; max-width: 480px; line-height: 1.5;">Este documento estará disponible próximamente para consulta e impresión en formato PDF.</p><div style="padding: 10px 20px; background: #E5B8C0; color: #691C32; border-radius: 50px; font-weight: 600; font-size: 13px;">Archivo en vinculación</div></div>');
                        docEl.close();
                        iframe.style.transition = 'opacity 0.4s ease';
                        iframe.style.opacity = '1';
                        if (loader) loader.style.display = 'none';
                    }, 150);
                } else {
                    iframe.src = pdfUrl;
                }

                // Abrir modal usando Bootstrap o jQuery
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    let modalInstance = bootstrap.Modal.getInstance(pdfModalEl) || new bootstrap.Modal(pdfModalEl);
                    modalInstance.show();
                } else if (typeof $ !== 'undefined' && $.fn.modal) {
                    $(pdfModalEl).modal('show');
                }
            }
        });

        // Soporte adicional para cuando el modal se abre vía evento de Bootstrap
        pdfModalEl.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (!button) return;
            const pdfUrl = button.getAttribute('data-pdf-url') || button.getAttribute('href') || '#';
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

        const pageLoader = document.getElementById('sesna-page-loader');

        pdfModalEl.addEventListener('show.bs.modal', function () {
            if (pageLoader) {
                pageLoader.style.transition = 'none';
                pageLoader.style.display = 'flex';
                pageLoader.classList.remove('loader-hidden');
            }
        });

        pdfModalEl.addEventListener('shown.bs.modal', function () {
            if (pageLoader) {
                pageLoader.style.transition = 'opacity 0.5s ease-out, visibility 0.5s ease-out';
                pageLoader.classList.add('loader-hidden');
                setTimeout(() => { pageLoader.style.display = 'none'; }, 600);
            }
        });

        pdfModalEl.addEventListener('hide.bs.modal', function () {
            if (pageLoader) {
                pageLoader.style.transition = 'none';
                pageLoader.style.display = 'flex';
                pageLoader.classList.remove('loader-hidden');
            }
        });

        pdfModalEl.addEventListener('hidden.bs.modal', function () {
            if (iframe) iframe.src = '';
            if (title) title.textContent = 'Visor de Documento';
            if (loader) loader.style.display = 'block';
            
            if (pageLoader) {
                pageLoader.style.transition = 'opacity 0.5s ease-out, visibility 0.5s ease-out';
                pageLoader.classList.add('loader-hidden');
                setTimeout(() => { pageLoader.style.display = 'none'; }, 600);
            }
        });
    }
});
</script>

<!-- Modal Visor de Documento PDF -->
<div class="modal fade tx-pdf-modal" id="pdfViewerModal" tabindex="-1" aria-labelledby="pdfViewerModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 900px !important; margin: 5vh auto !important;">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-white border-0 py-4 px-4 position-relative d-flex align-items-center justify-content-between">
                <h5 class="modal-title fw-bold font-noto-sans mb-0" id="pdfViewerModalLabel" style="color: #9f2241; font-size: 1.25rem;">Visor de Documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body p-0 bg-dark position-relative" style="height: 65vh; min-height: 500px;">
                <!-- Loader spinner -->
                <div id="pdfLoader" class="position-absolute top-50 start-50 translate-middle text-white text-center">
                    <div class="spinner-border mb-2" role="status"></div>
                    <div class="font-noto-sans small">Cargando documento...</div>
                </div>
                <iframe id="pdfIframe" src="" class="w-100 h-100 border-0 position-relative" style="z-index: 2;" allowfullscreen></iframe>
            </div>
            <div class="modal-footer border-0 justify-content-center py-4 bg-white gap-3">
                <a href="#" id="pdfDownloadBtn" class="btn tx-pdf-download-btn font-noto-sans fw-bold px-4 py-2" download target="_blank">
                    <i class="bi bi-download me-2"></i> Descargar PDF
                </a>
            </div>
        </div>
    </div>
</div>
