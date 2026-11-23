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


<!-- Modal Visor de Documento PDF (SND v1.1.0) -->
<div class="modal tx-pdf-modal" id="pdfViewerModal" tabindex="-1" role="dialog" aria-labelledby="pdfViewerModalLabel" aria-hidden="true">
    <div class="tx-pdf-modal__dialog">
        <div class="tx-pdf-modal__content">
            <!-- Header -->
            <div class="tx-pdf-modal__header">
                <h2 class="sh1b patria color--principal tx-pdf-modal__title" id="pdfViewerModalLabel">Visor de Documento</h2>
                <button type="button" class="boton__fantasma tx-pdf-modal__close-btn" data-modal-dismiss aria-label="Cerrar modal">
                    <?= sesna_render_snd_svg_icon('snd-close', 'icono--20') ?>
                </button>
            </div>
            
            <!-- Body con iframe y spinner SND -->
            <div class="tx-pdf-modal__body">
                <div id="pdfLoader" class="tx-pdf-modal__loader">
                    <i class="snd__icono snd-snd-loading2 icono__spin icono--32 color--blanco mb--8" data-snd-procesado="true" aria-hidden="true"></i>
                    <div class="b2r color--blanco">Cargando documento...</div>
                </div>
                <iframe id="pdfIframe" src="" class="tx-pdf-modal__iframe" allowfullscreen title="Documento PDF"></iframe>
            </div>

            <!-- Footer con acciones oficiales SND (Botón con iconos: radio canónico 8px) -->
            <div class="tx-pdf-modal__footer">
                <button type="button" id="pdfCopyLinkBtn" class="boton__secundario">
                    <?= sesna_render_snd_svg_icon('snd-launch', 'icono--16') ?>
                    <span id="pdfCopyLinkBtnText">Copiar enlace</span>
                </button>
                <a href="#" id="pdfDownloadBtn" class="boton__primario" download>
                    <?= sesna_render_snd_svg_icon('snd-download', 'icono--16') ?>
                    Descargar PDF
                </a>
            </div>
        </div>
    </div>
</div>
