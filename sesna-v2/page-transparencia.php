<?php
/**
 * Plantilla de Página: Transparencia (Página Principal)
 * Homologada al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 *
 * @package sesna
 */

get_header();

$tx_cards = [
    [
        'icon'  => 'snd-group',
        'title' => 'Comité de Transparencia',
        'desc'  => 'Sesiones, actas, resoluciones y criterios del Comité de Transparencia.',
        'url'   => home_url('/transparencia/comite-de-transparencia/'),
    ],
    [
        'icon'  => 'snd-security',
        'title' => 'Unidad de Transparencia',
        'desc'  => 'Atención, orientación y canales de contacto con la Unidad.',
        'url'   => home_url('/transparencia/unidad-de-transparencia/'),
    ],
    [
        'icon'   => 'snd-document',
        'title'  => 'Solicitudes de Información',
        'desc'   => 'Consulta el manual para presentar solicitudes de acceso a la información.',
        'url'    => home_url('/wp-content/uploads/2026/07/PNT_SISAI_SOLICITANTE.pdf'),
        'target' => '_blank',
    ],
    [
        'icon'  => 'snd-security',
        'title' => 'Datos Personales',
        'desc'  => 'Consulta y ejerce tus derechos de privacidad y acceso ARCO.',
        'url'   => home_url('/transparencia/datos-personales/'),
    ],
    [
        'icon'   => 'snd-folder',
        'title'  => 'Obligaciones de Transparencia',
        'desc'   => 'Información pública de oficio según el (Título Quinto LGTAIP).',
        'url'    => 'https://consultapublicamx.plataformadetransparencia.org.mx/',
        'target' => '_blank',
        'manual' => home_url('/wp-content/uploads/2026/07/MAUAL-DE-ACCESO-AL-PORTAL-DE-OBLIGACIONES-DE-TRANSPARENCIA.pdf'),
    ],
    [
        'icon'  => 'snd-education',
        'title' => 'Normativa',
        'desc'  => 'Leyes, lineamientos y normas en materia de transparencia.',
        'url'   => home_url('/transparencia/normatividad/'),
    ],
    [
        'icon'   => 'snd-notification',
        'title'  => 'Denuncias',
        'desc'   => 'Consulta las denuncias por incumplimiento a las obligaciones de transparencia.',
        'url'    => 'https://sesnamx-my.sharepoint.com/:x:/g/personal/ediaz_sesna_gob_mx/IQBDDzfZrG3oTKikEkDd2XxYASEEXwYBDlpmKd0ChUiwZvU?e=ARg1ys',
        'target' => '_blank',
    ],
];
?>

<div class="page-transparencia front-page-bg">


    <!-- ── Hero Banner Transparencia ──────────────────────────── -->
    <section class="tx-banner posicion--relativa" aria-label="Banner institucional de Transparencia y acceso a la información">
        <h1 class="oculto">Transparencia y acceso a la información</h1>
        <div class="tx-banner__media">
            <img src="<?= esc_url( get_template_directory_uri() . '/img/home_v2/BannerSESNA_Transparencia.jpg' ); ?>" 
                 alt="Transparencia y acceso a la información"
                 class="tx-banner__img"
                 width="6000"
                 height="1458"
                 loading="eager">
        </div>
        <div class="tx-banner__action">
            <div class="contenedor texto--centro">
                <a href="https://www.plataformadetransparencia.org.mx" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   title="El enlace abre en ventana nueva" 
                   class="boton__primario" 
                   aria-label="Solicitar información (abre la Plataforma Nacional de Transparencia en nueva ventana)">
                    <?= sesna_render_snd_svg_icon('snd-launch', 'icono--16') ?>
                    Solicitar información
                </a>
            </div>
        </div>
    </section>

    <!-- ── Accesos Rápidos ────────────────────────────────────── -->
    <section class="tx-accesos py--48" aria-labelledby="tx-accesos-titulo">
        <div class="contenedor">
            <div class="fila mb--24">
                <div class="columna__12">
                    <h2 class="h2b patria color--pguinda600 mb--0" id="tx-accesos-titulo">Accesos rápidos</h2>
                </div>
            </div>

            <div class="reticulaGrid__12">
                <?php foreach ( $tx_cards as $card ): ?>
                    <div class="columna__12 columna__6--sm columna__6--md columna__3--lg mb--24">
                        <?php get_template_part( 'template-parts/ui/card', null, array(
                            'href'      => $card['url'],
                            'target'    => !empty($card['target']) ? $card['target'] : '',
                            'stretched' => true,
                            'title'     => $card['title'],
                            'text'      => $card['desc'],
                            'icon'      => $card['icon'],
                            'action'    => array( 'type' => 'arrow' ),
                            'after'     => !empty($card['manual']) ? function () use ( $card ) { ?>
                                <a href="<?= esc_url( $card['manual'] ); ?>"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   title="Consultar manual de acceso en formato PDF (abre en ventana nueva)"
                                   class="tx-card-manual-overlay z--2 decoracion--ninguna">
                                    <?= sesna_render_snd_svg_icon('snd-document--pdf', 'icono--20 pe--8') ?>
                                    <span>Consultar manual</span>
                                </a>
                            <?php } : null,
                        ) ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ── Consulta Información Pública ───────────────────────── -->
    <section class="tx-consulta py--48" aria-labelledby="tx-consulta-titulo">
        <div class="contenedor">
            <div class="fila mb--24">
                <div class="columna__12">
                    <h2 class="h2b patria color--pguinda600 mb--0" id="tx-consulta-titulo">Consulta información pública</h2>
                </div>
            </div>

            <div class="reticulaGrid__12">

                <!-- Tarjeta 1: Transparencia para el Pueblo -->
                <div class="columna__12 columna__6--md mb--24">
                    <?php get_template_part( 'template-parts/ui/card', null, array(
                        'href'   => get_option('options_url_transparencia_pueblo') ?: 'https://www.transparencia.gob.mx/',
                        'target' => '_blank',
                        'title'  => 'Transparencia para el Pueblo',
                        'text'   => 'Conoce el nuevo modelo nacional de transparencia y consulta información de interés público.',
                        'icon'   => 'snd-group',
                        'action' => array( 'type' => 'button', 'label' => 'Ir al portal', 'icon' => 'snd-launch', 'aria_label' => 'Ir al portal de Transparencia para el Pueblo (abre en nueva ventana)' ),
                    ) ); ?>
                </div>

                <!-- Tarjeta 2: Plataforma Nacional de Transparencia -->
                <div class="columna__12 columna__6--md mb--24">
                    <?php get_template_part( 'template-parts/ui/card', null, array(
                        'href'   => 'https://www.plataformadetransparencia.org.mx/',
                        'target' => '_blank',
                        'title'  => 'Plataforma Nacional de Transparencia',
                        'text'   => 'Realiza solicitudes de información y consulta obligaciones de transparencia.',
                        'icon'   => 'snd-search',
                        'action' => array( 'type' => 'button', 'label' => 'Acceder', 'icon' => 'snd-launch', 'aria_label' => 'Acceder a la Plataforma Nacional de Transparencia (abre en nueva ventana)' ),
                    ) ); ?>
                </div>

            </div>
        </div>
    </section>

    <!-- ── Banda de Contacto ──────────────────────────────────── -->
    <section class="tx-contacto py--32" aria-label="Datos de contacto de la Unidad de Transparencia">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">

                <div class="columna__12 columna__6--md">
                    <div class="reticulaFlex align-items-center justify-content-flex-start justify-content-center--md gap--16">
                        <div class="tx-contacto__icon-wrap flex-none" aria-hidden="true">
                            <?= sesna_render_snd_svg_icon('snd-email', 'icono--24 color--blanco') ?>
                        </div>
                        <div>
                            <span class="sdr dblock color--neutro600 mb--4">Correo electrónico:</span>
                            <a href="mailto:unidadtransparencia@sesna.gob.mx" class="tx-contacto__link b1b color--pguinda600 mb--0">
                                unidadtransparencia@sesna.gob.mx
                            </a>
                        </div>
                    </div>
                </div>

                <div class="columna__12 columna__6--md">
                    <div class="reticulaFlex align-items-center justify-content-flex-start justify-content-center--md gap--16">
                        <div class="tx-contacto__icon-wrap flex-none" aria-hidden="true">
                            <?= sesna_render_snd_svg_icon('snd-phone', 'icono--24 color--blanco') ?>
                        </div>
                        <div>
                            <span class="sdr dblock color--neutro600 mb--4">Teléfono y extensión:</span>
                            <a href="tel:+525581178100" class="tx-contacto__link b1b color--pguinda600 mb--0">
                                55 8117 8100 &nbsp;•&nbsp; Ext. 1116
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div><!-- /.page-transparencia -->

<?php get_footer(); ?>