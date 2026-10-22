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
                    <i class="snd__icono snd-launch icono--16" aria-hidden="true"></i>
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
                        <div class="tx-card radio--4 posicion--relativa desborde--oculto alto--100 muestra--flex flex-direction-column">
                            <div class="tx-card__icon mb--16" aria-hidden="true">
                                <i class="snd__icono <?= esc_attr( $card['icon'] ); ?> icono--32 color--pguinda600" aria-hidden="true"></i>
                            </div>
                            <h3 class="sh1b tx-card__title mb--8">
                                <a href="<?= esc_url( $card['url'] ); ?>"
                                   <?= !empty($card['target']) ? 'target="' . esc_attr($card['target']) . '" rel="noopener noreferrer" title="El enlace abre en ventana nueva"' : '' ?>
                                   class="enlace--expandido decoracion--ninguna color--neutro800">
                                    <?= esc_html( $card['title'] ); ?>
                                </a>
                            </h3>
                            <p class="b1r color--neutro600 tx-card__desc flex-grow mb--0">
                                <?= esc_html( $card['desc'] ); ?>
                            </p>
                            <div class="mt--auto pt--16 muestra--flex align-items-center justify-content-flex-end">
                                <i class="snd__icono snd-chevron--right icono--20 tx-card__arrow" aria-hidden="true"></i>
                            </div>

                            <?php if ( !empty($card['manual']) ): ?>
                                <a href="<?= esc_url( $card['manual'] ); ?>"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   title="Consultar manual de acceso en formato PDF (abre en ventana nueva)"
                                   class="tx-card-manual-overlay z--2 decoracion--ninguna">
                                    <i class="snd__icono snd-document--pdf icono--20 pe--8" aria-hidden="true"></i>
                                    <span>Consultar manual</span>
                                </a>
                            <?php endif; ?>
                        </div>
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
                    <a href="<?= esc_url( get_option('options_url_transparencia_pueblo') ?: 'https://www.transparencia.gob.mx/' ); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       title="El enlace abre en ventana nueva" 
                       class="tx-consulta-card radio--4 alto--100 d-block decoracion--ninguna">
                        <div class="muestra--flex align-items-start gap--16 alto--100">
                            <div class="tx-consulta-card__icon-wrap flex-none" aria-hidden="true">
                                <i class="snd__icono snd-group icono--32 color--pguinda600" aria-hidden="true"></i>
                            </div>
                            <div class="muestra--flex flex-direction-column alto--100 flex-grow">
                                <h3 class="sh1b tx-consulta-card__title color--neutro800 mb--8">Transparencia para el Pueblo</h3>
                                <p class="b1r color--neutro600 tx-consulta-card__desc flex-grow mb--16">
                                    Conoce el nuevo modelo nacional de transparencia y consulta información de interés público.
                                </p>
                                <div class="mt--auto">
                                    <span class="boton__primario"
                                          aria-label="Ir al portal de Transparencia para el Pueblo (abre en nueva ventana)">
                                        <i class="snd__icono snd-launch icono--16" aria-hidden="true"></i>
                                        Ir al portal
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Tarjeta 2: Plataforma Nacional de Transparencia -->
                <div class="columna__12 columna__6--md mb--24">
                    <a href="https://www.plataformadetransparencia.org.mx/" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       title="El enlace abre en ventana nueva" 
                       class="tx-consulta-card radio--4 alto--100 d-block decoracion--ninguna">
                        <div class="muestra--flex align-items-start gap--16 alto--100">
                            <div class="tx-consulta-card__icon-wrap flex-none" aria-hidden="true">
                                <i class="snd__icono snd-search icono--32 color--pguinda600" aria-hidden="true"></i>
                            </div>
                            <div class="muestra--flex flex-direction-column alto--100 flex-grow">
                                <h3 class="sh1b tx-consulta-card__title color--neutro800 mb--8">Plataforma Nacional de Transparencia</h3>
                                <p class="b1r color--neutro600 tx-consulta-card__desc flex-grow mb--16">
                                    Realiza solicitudes de información y consulta obligaciones de transparencia.
                                </p>
                                <div class="mt--auto">
                                    <span class="boton__primario"
                                          aria-label="Acceder a la Plataforma Nacional de Transparencia (abre en nueva ventana)">
                                        <i class="snd__icono snd-launch icono--16" aria-hidden="true"></i>
                                        Acceder
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
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
                            <i class="snd__icono snd-email icono--24 color--blanco" aria-hidden="true"></i>
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
                            <i class="snd__icono snd-phone icono--24 color--blanco" aria-hidden="true"></i>
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