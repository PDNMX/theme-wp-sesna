<?php
get_header();

$tx_cards = [
    ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>', 'title' => 'Unidad de Transparencia', 'desc' => 'Atención, orientación y canales de contacto con la Unidad.', 'url' => home_url('/transparencia/unidad-de-transparencia/')],
    ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>', 'title' => 'Solicitudes de Información', 'desc' => 'Consulta el manual para presentar solicitudes de acceso a la información.', 'url' => home_url('/wp-content/uploads/2026/07/PNT_SISAI_SOLICITANTE.pdf'), 'target' => '_blank'],
    ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>', 'title' => 'Datos Personales', 'desc' => 'Consulta y ejerce tus derechos de privacidad y acceso ARCO.', 'url' => home_url('/transparencia/datos-personales/')],
    ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20 6h-8l-2-2H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 12H4V8h16v10z"/></svg>', 'title' => 'Obligaciones de Transparencia', 'desc' => 'Información pública de oficio según el (T&#237;tulo Quinto LGTAIP).', 'url' => 'https://consultapublicamx.plataformadetransparencia.org.mx/', 'target' => '_blank'],
    ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/></svg>', 'title' => 'Normativa', 'desc' => 'Leyes, lineamientos y normas en materia de transparencia.', 'url' => home_url('/transparencia/normatividad/')],
    ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg>', 'title' => 'Denuncias', 'desc' => 'Consulta las denuncias por incumplimiento a las obligaciones de transparencia.', 'url' => 'https://sesnamx-my.sharepoint.com/:x:/g/personal/ediaz_sesna_gob_mx/IQBDDzfZrG3oTKikEkDd2XxYASEEXwYBDlpmKd0ChUiwZvU?e=ARg1ys', 'target' => '_blank'],
];

?>
<style>
/* CSS para la opción de consultar manual en la tarjeta de Obligaciones */
.tx-card-manual-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: rgba(109, 27, 50, 0.95); /* Guinda semi-transparente */
    color: white;
    padding: 15px;
    text-align: center;
    transform: translateY(100%);
    transition: transform 0.3s ease;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-weight: 500;
}
.tx-card:hover .tx-card-manual-overlay {
    transform: translateY(0);
}
.tx-card-manual-overlay:hover {
    background: #501022;
}
</style>
<div class="page-transparencia has-fullbleed-hero">

    <section class="position-relative" aria-label="Encabezado de Transparencia y acceso a la información">
        <!-- Imagen del Banner Nativa -->
        <img src="<?= get_template_directory_uri() ?>/img/home_v2/BannerSESNA_Transparencia.jpg" alt="Transparencia"
            class="w-100 img-fluid" style="object-fit: cover; min-height: 200px;">

        <!-- Botón flotante -->
        <div class="position-absolute w-100 text-center" style="bottom: 6%; left: 0; z-index: 10;">
            <div class="contenedor">
                <a href="https://www.plataformadetransparencia.org.mx" target="_blank" rel="noopener noreferrer"
                    class="btn d-inline-flex align-items-center gap-2"
                    style="background-color: var(--color-guinda); color: white; border: 2px solid white; padding: 18px 40px; font-size: 16px; font-weight: 500; box-shadow: 0 4px 12px rgba(0,0,0,0.6); transition: transform 0.2s ease;"
                    onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'"
                    aria-label="Solicitar información (abre la Plataforma Nacional de Transparencia en nueva ventana)">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/></svg>
                    Solicitar información &rsaquo;
                </a>
            </div>
        </div>
    </section>

    <section class="tx-accesos py-5" aria-labelledby="tx-accesos-titulo">
        <div class="contenedor">
            <div class="fila">
                <div class="columna__8--md">
                    <h2 class="cp-recursos__titulo" id="tx-accesos-titulo">Accesos rápidos</h2>
                    <div class="cp-recursos__linea mb-3"></div>
                </div>
            </div>

            <div class="fila gap--24 mt-3">
                <div class="columna__3--lg columna__6--sm col-100">
                    <a href="<?= esc_url(home_url('/transparencia/comite-de-transparencia/')) ?>"
                        class="tx-card rounded-4 h-100 d-flex flex-column"
                        aria-label="Comité de Transparencia — abre el detalle de sesiones y actas">
                        <span class="bootstrap-icons tx-card__icon mb-3" aria-hidden="true">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                        </span>
                        <strong class="tx-card__title d-block mb-2">Comité de Transparencia</strong>
                        <p class="tx-card__desc flex-grow-1 mb-0">Sesiones, actas, resoluciones y criterios del Comité de Transparencia.</p>
                        <span class="tx-card__arrow mt-3 align-self-end" aria-hidden="true">&rsaquo;</span>
                    </a>
                </div>
                <?php foreach ($tx_cards as $card): ?>
                    <div class="columna__3--lg columna__6--sm col-100">
                        <a href="<?= $card['url'] !== '#' ? esc_url($card['url']) : '#' ?>"
                            <?= isset($card['target']) ? 'target="' . esc_attr($card['target']) . '" rel="noopener noreferrer"' : '' ?>
                            class="tx-card rounded-4 h-100 d-flex flex-column position-relative overflow-hidden" aria-label="<?= esc_attr($card['title']) ?>">
                            <span class="bootstrap-icons tx-card__icon mb-3" aria-hidden="true">
                                <?= $card['icon'] ?>
                            </span>
                            <strong class="tx-card__title d-block mb-2"><?= esc_html($card['title']) ?></strong>
                            <p class="tx-card__desc flex-grow-1 mb-0"><?= esc_html($card['desc']) ?></p>
                            <span class="tx-card__arrow mt-3 align-self-end" aria-hidden="true">&rsaquo;</span>
                            
                            <?php if ($card['title'] === 'Obligaciones de Transparencia'): ?>
                                <div class="tx-card-manual-overlay" onclick="event.preventDefault(); window.open('<?= home_url('/wp-content/uploads/2026/07/MAUAL-DE-ACCESO-AL-PORTAL-DE-OBLIGACIONES-DE-TRANSPARENCIA.pdf') ?>', '_blank');">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"/></svg> Consultar manual
                                </div>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="tx-consulta py-5" aria-labelledby="tx-consulta-titulo">
        <div class="contenedor">
            <div class="fila">
                <div class="columna__8--md">
                    <h2 class="cp-recursos__titulo" id="tx-consulta-titulo">Consulta información pública</h2>
                    <div class="cp-recursos__linea mb-3"></div>
                </div>
            </div>

            <div class="fila gap--24 mt-2">

                <div class="columna__6--md col-100">
                    <a href="<?= esc_url(get_option('options_url_transparencia_pueblo') ?: 'https://www.transparencia.gob.mx/') ?>" target="_blank" rel="noopener noreferrer" class="tx-consulta-card rounded-4 h-100 d-block text-decoration-none text-dark">
                        <div class="d-flex align-items-start gap-3 h-100">
                            <div class="tx-consulta-card__icon-wrap flex-shrink-0" aria-hidden="true">
                                <span class="bootstrap-icons">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column h-100">
                                <strong class="tx-consulta-card__title">Transparencia para el Pueblo</strong>
                                <p class="tx-consulta-card__desc mt-2 flex-grow-1">
                                    Conoce el nuevo modelo nacional de transparencia y consulta información de interés
                                    público.
                                </p>
                                <div class="mt-3">
                                    <span class="tx-consulta-card__btn"
                                        aria-label="Ir al portal de Transparencia para el Pueblo (abre en nueva ventana)">
                                        Ir al portal
                                        <span class="bootstrap-icons" aria-hidden="true">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="columna__6--md col-100">
                    <a href="https://www.plataformadetransparencia.org.mx/" target="_blank" rel="noopener noreferrer" class="tx-consulta-card rounded-4 h-100 d-block text-decoration-none text-dark">
                        <div class="d-flex align-items-start gap-3 h-100">
                            <div class="tx-consulta-card__icon-wrap flex-shrink-0" aria-hidden="true">
                                <span class="bootstrap-icons">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column h-100">
                                <strong class="tx-consulta-card__title">Plataforma Nacional de Transparencia</strong>
                                <p class="tx-consulta-card__desc mt-2 flex-grow-1">
                                    Realiza solicitudes de información y consulta obligaciones de transparencia.
                                </p>
                                <div class="mt-3">
                                    <span class="tx-consulta-card__btn"
                                        aria-label="Acceder a la Plataforma Nacional de Transparencia (abre en nueva ventana)">
                                        Acceder
                                        <span class="bootstrap-icons" aria-hidden="true">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section class="tx-contacto py-4" aria-label="Datos de contacto de la Unidad de Transparencia">
        <div class="contenedor">
            <div class="fila align-items-center justify-content-center gap--24 text-center">

                <div class="columna__6--md col-100">
                    <div class="d-flex align-items-center justify-content-center gap-3">
                        <div class="tx-contacto__icon-wrap flex-shrink-0" aria-hidden="true">
                            <span class="bootstrap-icons">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </span>
                        </div>
                        <div>
                            <a href="mailto:unidadtransparencia@sesna.gob.mx" class="tx-contacto__link">
                                unidadtransparencia@sesna.gob.mx
                            </a>
                        </div>
                    </div>
                </div>

                <div class="columna__6--md col-100">
                    <div class="d-flex align-items-center justify-content-center gap-3">
                        <div class="tx-contacto__icon-wrap flex-shrink-0" aria-hidden="true">
                            <span class="bootstrap-icons">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                            </span>
                        </div>
                        <div>
                            <a href="tel:+525581178100" class="tx-contacto__link">
                                55 8117 8100<br>Ext. 1116
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



</div><!-- /.page-transparencia -->

<?php get_footer(); ?>