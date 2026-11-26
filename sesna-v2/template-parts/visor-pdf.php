<?php
/**
 * Visor Universal de PDF en Modal (SND v1.1.0)
 * Utilizado en páginas de Transparencia, PNA y Administración.
 */
?>
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
