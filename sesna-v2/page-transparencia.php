<?php
get_header();

$tx_cards = [
    ['icon' => 'bi-person-badge', 'title' => 'Unidad de Transparencia', 'desc' => 'Atención, orientación y canales de contacto con la Unidad.', 'url' => home_url('/transparencia/unidad-de-transparencia/')],
    ['icon' => 'bi-file-earmark-text', 'title' => 'Solicitudes de Información', 'desc' => 'Consulta el manual para presentar solicitudes de acceso a la información.', 'url' => home_url('/wp-content/uploads/2026/07/PNT_SISAI_SOLICITANTE.pdf'), 'target' => '_blank'],
    ['icon' => 'bi-shield-lock', 'title' => 'Datos Personales', 'desc' => 'Consulta y ejerce tus derechos de privacidad y acceso ARCO.', 'url' => home_url('/transparencia/datos-personales/')],
    ['icon' => 'bi-folder2-open', 'title' => 'Obligaciones de Transparencia', 'desc' => 'Información pública de oficio según el (T&#237;tulo Quinto LGTAIP).', 'url' => 'https://consultapublicamx.plataformadetransparencia.org.mx/', 'target' => '_blank'],
    ['icon' => 'bi-book', 'title' => 'Normativa', 'desc' => 'Leyes, lineamientos y normas en materia de transparencia.', 'url' => home_url('/transparencia/normatividad/')],
    ['icon' => 'bi-bell', 'title' => 'Denuncias', 'desc' => 'Consulta las denuncias por incumplimiento a las obligaciones de transparencia.', 'url' => 'https://sesnamx-my.sharepoint.com/:x:/g/personal/ediaz_sesna_gob_mx/IQBDDzfZrG3oTKikEkDd2XxYASEEXwYBDlpmKd0ChUiwZvU?e=ARg1ys', 'target' => '_blank'],
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
            <div class="container">
                <a href="https://www.plataformadetransparencia.org.mx" target="_blank" rel="noopener noreferrer"
                    class="btn d-inline-flex align-items-center gap-2"
                    style="background-color: var(--color-guinda); color: white; border: 2px solid white; padding: 18px 40px; font-size: 1.4rem; font-weight: 500; box-shadow: 0 4px 12px rgba(0,0,0,0.6); transition: transform 0.2s ease;"
                    onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'"
                    aria-label="Solicitar información (abre la Plataforma Nacional de Transparencia en nueva ventana)">
                    <i class="bi bi-file-earmark-arrow-up"></i>
                    Solicitar información &rsaquo;
                </a>
            </div>
        </div>
    </section>

    <section class="tx-accesos py-5" aria-labelledby="tx-accesos-titulo">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="cp-recursos__titulo" id="tx-accesos-titulo">Accesos rápidos</h2>
                    <div class="cp-recursos__linea mb-3"></div>
                </div>
            </div>

            <div class="row g-4 mt-3">
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="<?= esc_url(home_url('/transparencia/comite-de-transparencia/')) ?>"
                        class="tx-card rounded-4 h-100 d-flex flex-column"
                        aria-label="Comité de Transparencia — abre el detalle de sesiones y actas">
                        <span class="bootstrap-icons tx-card__icon mb-3" aria-hidden="true">
                            <i class="bi bi-people"></i>
                        </span>
                        <strong class="tx-card__title d-block mb-2" style="font-size: 16px;">Comité de Transparencia</strong>
                        <p class="tx-card__desc flex-grow-1 mb-0" style="font-size: 16px;">Sesiones, actas, resoluciones y criterios del Comité de Transparencia.</p>
                        <span class="tx-card__arrow mt-3 align-self-end" aria-hidden="true">&rsaquo;</span>
                    </a>
                </div>
                <?php foreach ($tx_cards as $card): ?>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="<?= $card['url'] !== '#' ? esc_url($card['url']) : '#' ?>"
                            <?= isset($card['target']) ? 'target="' . esc_attr($card['target']) . '" rel="noopener noreferrer"' : '' ?>
                            class="tx-card rounded-4 h-100 d-flex flex-column position-relative overflow-hidden" aria-label="<?= esc_attr($card['title']) ?>">
                            <span class="bootstrap-icons tx-card__icon mb-3" aria-hidden="true">
                                <i class="bi <?= esc_attr($card['icon']) ?>"></i>
                            </span>
                            <strong class="tx-card__title d-block mb-2" style="font-size: 16px;"><?= esc_html($card['title']) ?></strong>
                            <p class="tx-card__desc flex-grow-1 mb-0" style="font-size: 16px;"><?= esc_html($card['desc']) ?></p>
                            <span class="tx-card__arrow mt-3 align-self-end" aria-hidden="true">&rsaquo;</span>
                            
                            <?php if ($card['title'] === 'Obligaciones de Transparencia'): ?>
                                <div class="tx-card-manual-overlay" onclick="event.preventDefault(); window.open('<?= home_url('/wp-content/uploads/2026/07/MAUAL-DE-ACCESO-AL-PORTAL-DE-OBLIGACIONES-DE-TRANSPARENCIA.pdf') ?>', '_blank');">
                                    <i class="bi bi-filetype-pdf fs-5"></i> Consultar manual
                                </div>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="tx-consulta py-5" aria-labelledby="tx-consulta-titulo">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="cp-recursos__titulo" id="tx-consulta-titulo">Consulta información pública</h2>
                    <div class="cp-recursos__linea mb-3"></div>
                </div>
            </div>

            <div class="row g-4 mt-2">

                <div class="col-12 col-md-6">
                    <a href="<?= esc_url(get_option('options_url_transparencia_pueblo') ?: 'https://www.transparencia.gob.mx/') ?>" target="_blank" rel="noopener noreferrer" class="tx-consulta-card rounded-4 h-100 d-block text-decoration-none text-dark">
                        <div class="d-flex align-items-start gap-3 h-100">
                            <div class="tx-consulta-card__icon-wrap flex-shrink-0" aria-hidden="true">
                                <span class="bootstrap-icons">
                                    <i class="bi bi-people"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column h-100">
                                <strong class="tx-consulta-card__title" style="font-size: 18px;">Transparencia para el Pueblo</strong>
                                <p class="tx-consulta-card__desc mt-2 flex-grow-1" style="font-size: 18px;">
                                    Conoce el nuevo modelo nacional de transparencia y consulta información de interés
                                    público.
                                </p>
                                <div class="mt-3">
                                    <span class="tx-consulta-card__btn" style="font-size: 18px;"
                                        aria-label="Ir al portal de Transparencia para el Pueblo (abre en nueva ventana)">
                                        Ir al portal
                                        <span class="bootstrap-icons" aria-hidden="true">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-6">
                    <a href="https://www.plataformadetransparencia.org.mx/" target="_blank" rel="noopener noreferrer" class="tx-consulta-card rounded-4 h-100 d-block text-decoration-none text-dark">
                        <div class="d-flex align-items-start gap-3 h-100">
                            <div class="tx-consulta-card__icon-wrap flex-shrink-0" aria-hidden="true">
                                <span class="bootstrap-icons">
                                    <i class="bi bi-search"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column h-100">
                                <strong class="tx-consulta-card__title" style="font-size: 18px;">Plataforma Nacional de Transparencia</strong>
                                <p class="tx-consulta-card__desc mt-2 flex-grow-1" style="font-size: 18px;">
                                    Realiza solicitudes de información y consulta obligaciones de transparencia.
                                </p>
                                <div class="mt-3">
                                    <span class="tx-consulta-card__btn" style="font-size: 18px;"
                                        aria-label="Acceder a la Plataforma Nacional de Transparencia (abre en nueva ventana)">
                                        Acceder
                                        <span class="bootstrap-icons" aria-hidden="true">
                                            <i class="bi bi-box-arrow-up-right"></i>
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
        <div class="container">
            <div class="row align-items-center justify-content-center g-4 text-center">

                <div class="col-12 col-md-6">
                    <div class="d-flex align-items-center justify-content-center gap-3">
                        <div class="tx-contacto__icon-wrap flex-shrink-0" aria-hidden="true">
                            <span class="bootstrap-icons">
                                <i class="bi bi-envelope"></i>
                            </span>
                        </div>
                        <div>
                            <a href="mailto:unidadtransparencia@sesna.gob.mx" class="tx-contacto__link">
                                unidadtransparencia@sesna.gob.mx
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="d-flex align-items-center justify-content-center gap-3">
                        <div class="tx-contacto__icon-wrap flex-shrink-0" aria-hidden="true">
                            <span class="bootstrap-icons">
                                <i class="bi bi-telephone"></i>
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