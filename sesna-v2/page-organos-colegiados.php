<?php
/**
 * Template Name: Órganos Colegiados y Normativa
 * Homologada al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 */

get_header();

$oc_stats_comite   = sesna_get_oc_stats('comite');
$oc_stats_comision = sesna_get_oc_stats('comision');
$oc_stats_organo   = sesna_get_oc_stats('organo_gobierno');

$oc_sesiones_comite   = sesna_get_oc_entries('comite');
$oc_sesiones_comision = sesna_get_oc_entries('comision');
$oc_sesiones_organo   = sesna_get_oc_entries('organo_gobierno');
$oc_recomendaciones   = sesna_get_oc_entries('recomendaciones');
$oc_exhortos          = sesna_get_oc_entries('exhortos');

$oc_anios_comite   = array_values(array_unique(array_filter(array_column($oc_sesiones_comite, 'anio'))));
$oc_anios_comision = array_values(array_unique(array_filter(array_column($oc_sesiones_comision, 'anio'))));
$oc_anios_organo   = array_values(array_unique(array_filter(array_column($oc_sesiones_organo, 'anio'))));
rsort($oc_anios_comite);
rsort($oc_anios_comision);
rsort($oc_anios_organo);
?>

<div class="page-organos-colegiados front-page-bg pb--40">

    <!-- Migas de pan (Breadcrumb) — Estándar SND v1.1.0 -->
    <?php get_template_part( 'template-parts/ui/breadcrumb', null, array(
        'items' => array(
            array( 'label' => 'Acciones y Programas', 'url' => home_url('/acciones-y-programas/') ),
            array( 'label' => 'Órganos Colegiados' ),
        ),
    ) ); ?>

    <!-- HERO SECTION -->
    <section class="sesna-page-hero" aria-label="Encabezado de Órganos Colegiados">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__8--md columna__6--lg posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Órganos Colegiados</h1>
                    <p class="sh1r mb--0 texto--justify">
                        Información de los diversos órganos colegiados en los que participa la SESNA: Comité Coordinador, Órgano de Gobierno y Comisión Ejecutiva.
                    </p>
                </div>
                <div class="columna__12 columna__4--md columna__6--lg muestra--ninguno muestra--flex--md align-items-center justify-content-end posicion--relativa">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/Organos_Colegiados_Encabezado.png' ); ?>"
                         alt="Órganos Colegiados"
                         class="sesna-hero__img"
                         loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="contenedor">

        <div class="tx-comite-panel">
            <!-- Tabs — SND UI Kit (Tabs 01 / State: 618:2598 / 1562:3995 / 16460:870) integradas en el panel padre (Desktop / Tablet) -->
            <div class="tx-comite-tabs-container tx-comite-tabs-container--underline ocn-tabs-nav mb--24">
                <ul class="ul--limpio tx-comite-tabs" role="tablist" aria-label="Secciones de órganos colegiados">
                    <li role="presentation">
                        <button type="button" id="tab-comite" data-target="comite" class="tx-comite-tab js-tab-link active" role="tab" aria-selected="true" aria-controls="sec-comite" tabindex="0">
                            Comité Coordinador
                        </button>
                    </li>
                    <li role="presentation">
                        <button type="button" id="tab-comision" data-target="comision" class="tx-comite-tab js-tab-link" role="tab" aria-selected="false" aria-controls="sec-comision" tabindex="-1">
                            Comisión Ejecutiva
                        </button>
                    </li>
                    <li role="presentation">
                        <button type="button" id="tab-organo" data-target="organo" class="tx-comite-tab js-tab-link" role="tab" aria-selected="false" aria-controls="sec-organo" tabindex="-1">
                            Órgano de Gobierno
                        </button>
                    </li>
                    <li role="presentation">
                        <button type="button" id="tab-recomendaciones" data-target="recomendaciones" class="tx-comite-tab js-tab-link" role="tab" aria-selected="false" aria-controls="sec-recomendaciones" tabindex="-1">
                            Recomendaciones no vinculantes
                        </button>
                    </li>
                    <li role="presentation">
                        <button type="button" id="tab-exhortos" data-target="exhortos" class="tx-comite-tab js-tab-link" role="tab" aria-selected="false" aria-controls="sec-exhortos" tabindex="-1">
                            Exhortos
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Selector de sección — Móvil (abre Drawer) -->
            <button type="button" class="boton__secundario ocn-mobile-tab-trigger mb--24" id="ocnOpenDrawerBtn" aria-haspopup="dialog" aria-expanded="false" aria-controls="ocnDrawer">
                <span id="ocnActiveTabLabel">Comité Coordinador</span>
                <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20') ?>
            </button>

            <!-- SECTION: COMITÉ COORDINADOR -->
            <div class="content-section tx-comite-tab-pane" id="sec-comite" role="tabpanel" aria-labelledby="tab-comite">

                <?php sesna_render_oc_stats_cards($oc_stats_comite); ?>

                <!-- Encabezado y Contador (Atomo/Count & actions — 22373:36067) -->
                <div class="tx-comite-panel__header mb--24">
                    <div>
                        <h2 class="sh0b color--neutro800 mb--4">Sesiones del Comité Coordinador</h2>
                        <p class="b1r color--neutro600 mb--0" id="sesiones-count-comite" aria-live="polite">
                            Mostrando <?= min(5, count($oc_sesiones_comite)) ?> de <?= count($oc_sesiones_comite) ?> sesiones
                        </p>
                    </div>
                    <button type="button" id="sesiones-reset-comite" class="boton__fantasma tx-comite-reset-btn muestra--ninguno">
                        <?= sesna_render_snd_svg_icon('snd-close', 'icono--20') ?>
                        Limpiar filtros
                    </button>
                </div>

                <!-- FILTROS SND (Select / Dropatom + 4.1 Barra de búsqueda) -->
                <div class="reticulaGrid__12 mb--32 align-items-end">
                    <div class="columna__6--xs columna__3--lg">
                        <label for="filter-anio-comite" class="b1sb dblock color--neutro800 mb--8">Año</label>
                        <div class="tx-select-wrap">
                            <select id="filter-anio-comite" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php foreach ($oc_anios_comite as $anio) : ?>
                                    <option value="<?= esc_attr($anio) ?>"><?= esc_html($anio) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20 tx-select-chevron') ?>
                        </div>
                    </div>
                    <div class="columna__6--xs columna__3--lg">
                        <label for="filter-tipo-comite" class="b1sb dblock color--neutro800 mb--8">Tipo de sesión</label>
                        <div class="tx-select-wrap">
                            <select id="filter-tipo-comite" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todas">Todas</option>
                                <option value="Ordinaria">Ordinaria</option>
                                <option value="Extraordinaria">Extraordinaria</option>
                            </select>
                            <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20 tx-select-chevron') ?>
                        </div>
                    </div>
                    <div class="columna__12 columna__12--md columna__6--lg">
                        <label for="search-sesion-comite" class="b1sb dblock color--neutro800 mb--8">Buscar sesión</label>
                        <form class="search-container" role="search" id="form-search-comite" action="javascript:void(0);">
                            <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                <?= sesna_render_snd_svg_icon('snd-search', 'search-icon icono--24') ?>
                                <input type="search" id="search-sesion-comite" name="q" placeholder="Nombre de la sesión, mes o año..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                            </div>
                        </form>
                    </div>
                </div>

                <!-- SESSIONS LIST -->
                <div class="tx-comite-card-list tx-sesion-list" id="sesiones-list-comite">
                    <?php foreach ($oc_sesiones_comite as $idx => $sesion) : sesna_render_oc_sesion_card($sesion, $idx); endforeach; ?>
                </div>

                <!-- Estado vacío Comité — Mensajes informativos SND v1.0.0 (Informativo) -->
                <div role="status">
                    <div id="sesiones-empty-comite" class="mensajeInformativo mensajeInformativo--informativo mt--16 <?= empty($oc_sesiones_comite) ? '' : 'muestra--ninguno' ?>" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="sesiones-empty-comite">
                        No se encontraron sesiones que coincidan con los filtros seleccionados.
                    </div>
                </div>

                <!-- VER MÁS BTN -->
                <div class="texto--centro mt--32" id="sesiones-vermas-wrap-comite"<?= count($oc_sesiones_comite) <= 5 ? ' style="display:none;"' : '' ?>>
                    <button type="button" class="boton__fantasma" id="sesiones-vermas-btn-comite">
                        Ver más sesiones <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20') ?>
                    </button>
                </div>

            </div> <!-- END sec-comite -->

            <!-- SECTION: COMISIÓN EJECUTIVA -->
            <div class="content-section tx-comite-tab-pane muestra--ninguno" id="sec-comision" role="tabpanel" aria-labelledby="tab-comision">

                <?php sesna_render_oc_stats_cards($oc_stats_comision, false); ?>

                <!-- Encabezado y Contador (Atomo/Count & actions — 22373:36067) -->
                <div class="tx-comite-panel__header mb--24">
                    <div>
                        <h2 class="sh0b color--neutro800 mb--4">Sesiones de la Comisión Ejecutiva</h2>
                        <p class="b1r color--neutro600 mb--0" id="sesiones-count-comision" aria-live="polite">
                            Mostrando <?= min(5, count($oc_sesiones_comision)) ?> de <?= count($oc_sesiones_comision) ?> sesiones
                        </p>
                    </div>
                    <button type="button" id="sesiones-reset-comision" class="boton__fantasma tx-comite-reset-btn muestra--ninguno">
                        <?= sesna_render_snd_svg_icon('snd-close', 'icono--20') ?>
                        Limpiar filtros
                    </button>
                </div>

                <div class="reticulaGrid__12 mb--32 align-items-end">
                    <div class="columna__6--xs columna__3--lg">
                        <label for="filter-anio-comision" class="b1sb dblock color--neutro800 mb--8">Año</label>
                        <div class="tx-select-wrap">
                            <select id="filter-anio-comision" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php foreach ($oc_anios_comision as $anio) : ?>
                                    <option value="<?= esc_attr($anio) ?>"><?= esc_html($anio) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20 tx-select-chevron') ?>
                        </div>
                    </div>
                    <div class="columna__6--xs columna__3--lg">
                        <label for="filter-tipo-comision" class="b1sb dblock color--neutro800 mb--8">Tipo de sesión</label>
                        <div class="tx-select-wrap">
                            <select id="filter-tipo-comision" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todas">Todas</option>
                                <option value="Ordinaria">Ordinaria</option>
                                <option value="Extraordinaria">Extraordinaria</option>
                            </select>
                            <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20 tx-select-chevron') ?>
                        </div>
                    </div>
                    <div class="columna__12 columna__12--md columna__6--lg">
                        <label for="search-sesion-comision" class="b1sb dblock color--neutro800 mb--8">Buscar sesión</label>
                        <form class="search-container" role="search" id="form-search-comision" action="javascript:void(0);">
                            <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                <?= sesna_render_snd_svg_icon('snd-search', 'search-icon icono--24') ?>
                                <input type="search" id="search-sesion-comision" name="q" placeholder="Nombre de la sesión, mes o año..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tx-comite-card-list tx-sesion-list" id="sesiones-list-comision">
                    <?php foreach ($oc_sesiones_comision as $idx => $sesion) : sesna_render_oc_sesion_card($sesion, $idx); endforeach; ?>
                </div>

                <!-- Estado vacío Comisión — Mensajes informativos SND v1.0.0 (Informativo) -->
                <div role="status">
                    <div id="sesiones-empty-comision" class="mensajeInformativo mensajeInformativo--informativo mt--16 <?= empty($oc_sesiones_comision) ? '' : 'muestra--ninguno' ?>" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="sesiones-empty-comision">
                        No se encontraron sesiones que coincidan con los filtros seleccionados.
                    </div>
                </div>

                <div class="texto--centro mt--32" id="sesiones-vermas-wrap-comision"<?= count($oc_sesiones_comision) <= 5 ? ' style="display:none;"' : '' ?>>
                    <button type="button" class="boton__fantasma" id="sesiones-vermas-btn-comision">
                        Ver más sesiones <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20') ?>
                    </button>
                </div>

            </div>

            <!-- SECTION: ÓRGANO DE GOBIERNO -->
            <div class="content-section tx-comite-tab-pane muestra--ninguno" id="sec-organo" role="tabpanel" aria-labelledby="tab-organo">

                <?php sesna_render_oc_stats_cards($oc_stats_organo, false); ?>

                <!-- Encabezado y Contador (Atomo/Count & actions — 22373:36067) -->
                <div class="tx-comite-panel__header mb--24">
                    <div>
                        <h2 class="sh0b color--neutro800 mb--4">Sesiones del Órgano de Gobierno</h2>
                        <p class="b1r color--neutro600 mb--0" id="sesiones-count-organo" aria-live="polite">
                            Mostrando <?= min(5, count($oc_sesiones_organo)) ?> de <?= count($oc_sesiones_organo) ?> sesiones
                        </p>
                    </div>
                    <button type="button" id="sesiones-reset-organo" class="boton__fantasma tx-comite-reset-btn muestra--ninguno">
                        <?= sesna_render_snd_svg_icon('snd-close', 'icono--20') ?>
                        Limpiar filtros
                    </button>
                </div>

                <div class="reticulaGrid__12 mb--32 align-items-end">
                    <div class="columna__6--xs columna__3--lg">
                        <label for="filter-anio-organo" class="b1sb dblock color--neutro800 mb--8">Año</label>
                        <div class="tx-select-wrap">
                            <select id="filter-anio-organo" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php foreach ($oc_anios_organo as $anio) : ?>
                                    <option value="<?= esc_attr($anio) ?>"><?= esc_html($anio) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20 tx-select-chevron') ?>
                        </div>
                    </div>
                    <div class="columna__6--xs columna__3--lg">
                        <label for="filter-tipo-organo" class="b1sb dblock color--neutro800 mb--8">Tipo de sesión</label>
                        <div class="tx-select-wrap">
                            <select id="filter-tipo-organo" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todas">Todas</option>
                                <option value="Ordinaria">Ordinaria</option>
                                <option value="Extraordinaria">Extraordinaria</option>
                            </select>
                            <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20 tx-select-chevron') ?>
                        </div>
                    </div>
                    <div class="columna__12 columna__12--md columna__6--lg">
                        <label for="search-sesion-organo" class="b1sb dblock color--neutro800 mb--8">Buscar sesión</label>
                        <form class="search-container" role="search" id="form-search-organo" action="javascript:void(0);">
                            <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                <?= sesna_render_snd_svg_icon('snd-search', 'search-icon icono--24') ?>
                                <input type="search" id="search-sesion-organo" name="q" placeholder="Nombre de la sesión, mes o año..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tx-comite-card-list tx-sesion-list" id="sesiones-list-organo">
                    <?php foreach ($oc_sesiones_organo as $idx => $sesion) : sesna_render_oc_sesion_card($sesion, $idx); endforeach; ?>
                </div>

                <!-- Estado vacío Órgano — Mensajes informativos SND v1.0.0 (Informativo) -->
                <div role="status">
                    <div id="sesiones-empty-organo" class="mensajeInformativo mensajeInformativo--informativo mt--16 <?= empty($oc_sesiones_organo) ? '' : 'muestra--ninguno' ?>" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="sesiones-empty-organo">
                        No se encontraron sesiones que coincidan con los filtros seleccionados.
                    </div>
                </div>

                <div class="texto--centro mt--32" id="sesiones-vermas-wrap-organo"<?= count($oc_sesiones_organo) <= 5 ? ' style="display:none;"' : '' ?>>
                    <button type="button" class="boton__fantasma" id="sesiones-vermas-btn-organo">
                        Ver más sesiones <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20') ?>
                    </button>
                </div>

            </div>

            <!-- SECTION: RECOMENDACIONES -->
            <div class="content-section tx-comite-tab-pane muestra--ninguno" id="sec-recomendaciones" role="tabpanel" aria-labelledby="tab-recomendaciones">
                <div class="tx-comite-panel__header mb--24">
                    <div>
                        <h2 class="sh0b color--neutro800 mb--4">Recomendaciones no vinculantes</h2>
                        <p class="b1r color--neutro600 mb--0">
                            Mostrando <?= count($oc_recomendaciones) ?> de <?= count($oc_recomendaciones) ?> recomendaciones
                        </p>
                    </div>
                </div>
                <div class="tx-comite-card-list">
                    <?php foreach ($oc_recomendaciones as $item) : sesna_render_oc_lista_directa_item($item); endforeach; ?>
                    <?php if (empty($oc_recomendaciones)) : ?>
                        <div id="recomendaciones-empty-msg" class="mensajeInformativo mensajeInformativo--informativo mt--16" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="recomendaciones-empty-msg">
                            Aún no hay recomendaciones registradas.
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- SECTION: EXHORTOS -->
            <div class="content-section tx-comite-tab-pane muestra--ninguno" id="sec-exhortos" role="tabpanel" aria-labelledby="tab-exhortos">
                <div class="tx-comite-panel__header mb--24">
                    <div>
                        <h2 class="sh0b color--neutro800 mb--4">Exhortos</h2>
                        <p class="b1r color--neutro600 mb--0">
                            Mostrando <?= count($oc_exhortos) ?> de <?= count($oc_exhortos) ?> <?= count($oc_exhortos) === 1 ? 'exhorto' : 'exhortos' ?>
                        </p>
                    </div>
                </div>
                <div class="tx-comite-card-list">
                    <?php foreach ($oc_exhortos as $item) : sesna_render_oc_lista_directa_item($item); endforeach; ?>
                    <?php if (empty($oc_exhortos)) : ?>
                        <div id="exhortos-empty-msg" class="mensajeInformativo mensajeInformativo--informativo mt--16" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="exhortos-empty-msg">
                            Aún no hay exhortos registrados.
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php get_template_part( 'template-parts/ui/mobile-drawer', null, array(
    'prefix'        => 'ocn',
    'overlay_class' => 'page-organos-colegiados',
    'title'         => 'Seleccionar sección',
    'close_label'   => 'Cerrar selección de sección',
    'body'          => function () { ?>
            <div class="d-flex flex-column gap--8">
                <button type="button" class="fin-dictamen-item js-tab-link active" data-target="comite" aria-selected="true">
                    <span>Comité Coordinador</span>
                    <?= sesna_render_snd_svg_icon('snd-checkmark', 'icono--16 ocn-drawer-check') ?>
                </button>
                <button type="button" class="fin-dictamen-item js-tab-link" data-target="comision" aria-selected="false">
                    <span>Comisión Ejecutiva</span>
                    <?= sesna_render_snd_svg_icon('snd-checkmark', 'icono--16 ocn-drawer-check') ?>
                </button>
                <button type="button" class="fin-dictamen-item js-tab-link" data-target="organo" aria-selected="false">
                    <span>Órgano de Gobierno</span>
                    <?= sesna_render_snd_svg_icon('snd-checkmark', 'icono--16 ocn-drawer-check') ?>
                </button>
                <button type="button" class="fin-dictamen-item js-tab-link" data-target="recomendaciones" aria-selected="false">
                    <span>Recomendaciones no vinculantes</span>
                    <?= sesna_render_snd_svg_icon('snd-checkmark', 'icono--16 ocn-drawer-check') ?>
                </button>
                <button type="button" class="fin-dictamen-item js-tab-link" data-target="exhortos" aria-selected="false">
                    <span>Exhortos</span>
                    <?= sesna_render_snd_svg_icon('snd-checkmark', 'icono--16 ocn-drawer-check') ?>
                </button>
            </div>
    <?php },
) ); ?>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<!-- Modal Visor de Video (Ver sesión) SND v1.1.0 -->
<div class="modal tx-pdf-modal snd-modal" id="oc-video-modal" tabindex="-1" role="dialog" aria-labelledby="oc-video-modal-label" aria-hidden="true">
    <div class="tx-pdf-modal__dialog">
        <div class="tx-pdf-modal__content">
            <div class="tx-pdf-modal__header">
                <h5 class="tx-pdf-modal__title sh1b color--pguinda800" id="oc-video-modal-label">Ver sesión</h5>
                <button type="button" class="boton__fantasma tx-pdf-modal__close-btn" data-modal-dismiss aria-label="Cerrar modal">
                    <?= sesna_render_snd_svg_icon('snd-close', 'icono--24') ?>
                </button>
            </div>
            <div class="tx-pdf-modal__body">
                <iframe id="oc-video-iframe" class="tx-pdf-modal__iframe" src="" title="Video de la sesión" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
