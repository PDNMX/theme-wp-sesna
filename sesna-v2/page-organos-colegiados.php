<?php
/**
 * Template Name: Órganos Colegiados y Normativa
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

<div class="page-organos-colegiados front-page-bg">

    <!-- Migas de pan (Breadcrumb) — Estándar SND v1.1.0 -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?= esc_url( home_url('/') ) ?>" class="ruta__a">
                        <i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio
                    </a>
                </li>
                <li class="ruta__li">
                    <a href="<?= esc_url( home_url('/acciones-y-programas/') ) ?>" class="ruta__a">Acciones y Programas</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Órganos Colegiados y Normativa</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__8--md columna__6--lg posicion--relativa">
                    <h1 class="h1b patria color--pguinda600">Órganos Colegiados</h1>
                    <p class="sh1r color--neutro600 mb--0">
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
    <div class="contenedor pt--20 pb--64">

        <!-- TABS HORIZONTALES SND (Tabs 2 — Figma 1562:4021) -->
        <div class="reticulaGrid__12 mb--32">
            <div class="columna__12">
                <div class="tx-comite-tabs-container ocn-tabs-nav">
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
                                Recomendaciones
                            </button>
                        </li>
                        <li role="presentation">
                            <button type="button" id="tab-exhortos" data-target="exhortos" class="tx-comite-tab js-tab-link" role="tab" aria-selected="false" aria-controls="sec-exhortos" tabindex="-1">
                                Exhortos
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="reticulaGrid__12">
            <!-- MAIN COLUMN (full width) -->
            <div class="columna__12">
                
                <!-- SECTION: COMITÉ COORDINADOR -->
                <div class="content-section" id="sec-comite" role="tabpanel" aria-labelledby="tab-comite">
                    <div class="reticulaGrid__12 mb--24">
                        <div class="columna__12">
                            <h2 class="h2b patria color--pguinda600 mb--0">Comité Coordinador</h2>
                        </div>
                    </div>

                    <?php sesna_render_oc_stats_cards($oc_stats_comite); ?>

                    <!-- SUBSECTION: SESIONES -->
                    <div class="reticulaGrid__12 mb--16">
                        <div class="columna__12">
                            <h3 class="h4b patria color--pguinda600 mb--0">Sesiones</h3>
                        </div>
                    </div>

                    <!-- FILTROS SND (Select / Dropatom — Figma 12022:55650) -->
                    <div class="reticulaGrid__12 mb--32 align-items-end">
                        <div class="columna__12 columna__6--md columna__3--lg">
                            <label for="filter-anio-comite" class="b1sb dblock color--neutro800 mb--8">Año</label>
                            <div class="tx-select-wrap">
                                <select id="filter-anio-comite" class="tx-comite-select tx-comite-filter-control">
                                    <option value="Todos">Todos</option>
                                    <?php foreach ($oc_anios_comite as $anio) : ?>
                                        <option value="<?= esc_attr($anio) ?>"><?= esc_html($anio) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="columna__12 columna__6--md columna__4--lg">
                            <label for="filter-tipo-comite" class="b1sb dblock color--neutro800 mb--8">Tipo de sesión</label>
                            <div class="tx-select-wrap">
                                <select id="filter-tipo-comite" class="tx-comite-select tx-comite-filter-control">
                                    <option value="Todas">Todas</option>
                                    <option value="Ordinaria">Ordinaria</option>
                                    <option value="Extraordinaria">Extraordinaria</option>
                                </select>
                                <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                    <!-- SESSIONS LIST -->
                    <div class="tx-comite-card-list tx-sesion-list" id="sesiones-list-comite">
                        <?php foreach ($oc_sesiones_comite as $sesion) : sesna_render_oc_sesion_card($sesion); endforeach; ?>
                        <?php if (empty($oc_sesiones_comite)) : ?>
                            <div class="tx-normativa-card texto--centro">
                                <p class="b1r color--neutro600 mb--0">Aún no hay sesiones registradas.</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- VER MÁS BTN -->
                    <div class="reticulaGrid__12" id="sesiones-vermas-wrap-comite">
                        <div class="columna__12">
                            <div class="texto--centro mt--32">
                                <button type="button" class="boton__fantasma" id="sesiones-vermas-btn-comite">
                                    Ver más sesiones <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> <!-- END sec-comite -->

                <!-- SECTION: COMISIÓN EJECUTIVA -->
                <div class="content-section muestra--ninguno" id="sec-comision" role="tabpanel" aria-labelledby="tab-comision">
                    <div class="reticulaGrid__12 mb--24">
                        <div class="columna__12">
                            <h2 class="h2b patria color--pguinda600 mb--0">Comisión Ejecutiva</h2>
                        </div>
                    </div>

                    <?php sesna_render_oc_stats_cards($oc_stats_comision, false); ?>

                    <div class="reticulaGrid__12 mb--16">
                        <div class="columna__12">
                            <h3 class="h4b patria color--pguinda600 mb--0">Sesiones</h3>
                        </div>
                    </div>

                    <div class="reticulaGrid__12 mb--32 align-items-end">
                        <div class="columna__12 columna__6--md columna__3--lg">
                            <label for="filter-anio-comision" class="b1sb dblock color--neutro800 mb--8">Año</label>
                            <div class="tx-select-wrap">
                                <select id="filter-anio-comision" class="tx-comite-select tx-comite-filter-control">
                                    <option value="Todos">Todos</option>
                                    <?php foreach ($oc_anios_comision as $anio) : ?>
                                        <option value="<?= esc_attr($anio) ?>"><?= esc_html($anio) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="columna__12 columna__6--md columna__4--lg">
                            <label for="filter-tipo-comision" class="b1sb dblock color--neutro800 mb--8">Tipo de sesión</label>
                            <div class="tx-select-wrap">
                                <select id="filter-tipo-comision" class="tx-comite-select tx-comite-filter-control">
                                    <option value="Todas">Todas</option>
                                    <option value="Ordinaria">Ordinaria</option>
                                    <option value="Extraordinaria">Extraordinaria</option>
                                </select>
                                <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                    <div class="tx-comite-card-list tx-sesion-list" id="sesiones-list-comision">
                        <?php foreach ($oc_sesiones_comision as $sesion) : sesna_render_oc_sesion_card($sesion); endforeach; ?>
                        <?php if (empty($oc_sesiones_comision)) : ?>
                            <div class="tx-normativa-card texto--centro">
                                <p class="b1r color--neutro600 mb--0">Aún no hay sesiones registradas.</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="reticulaGrid__12" id="sesiones-vermas-wrap-comision">
                        <div class="columna__12">
                            <div class="texto--centro mt--32">
                                <button type="button" class="boton__fantasma" id="sesiones-vermas-btn-comision">
                                    Ver más sesiones <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION: ÓRGANO DE GOBIERNO -->
                <div class="content-section muestra--ninguno" id="sec-organo" role="tabpanel" aria-labelledby="tab-organo">
                    <div class="reticulaGrid__12 mb--24">
                        <div class="columna__12">
                            <h2 class="h2b patria color--pguinda600 mb--0">Órgano de Gobierno</h2>
                        </div>
                    </div>

                    <?php sesna_render_oc_stats_cards($oc_stats_organo, false); ?>

                    <div class="reticulaGrid__12 mb--16">
                        <div class="columna__12">
                            <h3 class="h4b patria color--pguinda600 mb--0">Sesiones</h3>
                        </div>
                    </div>

                    <div class="reticulaGrid__12 mb--32 align-items-end">
                        <div class="columna__12 columna__6--md columna__3--lg">
                            <label for="filter-anio-organo" class="b1sb dblock color--neutro800 mb--8">Año</label>
                            <div class="tx-select-wrap">
                                <select id="filter-anio-organo" class="tx-comite-select tx-comite-filter-control">
                                    <option value="Todos">Todos</option>
                                    <?php foreach ($oc_anios_organo as $anio) : ?>
                                        <option value="<?= esc_attr($anio) ?>"><?= esc_html($anio) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="columna__12 columna__6--md columna__4--lg">
                            <label for="filter-tipo-organo" class="b1sb dblock color--neutro800 mb--8">Tipo de sesión</label>
                            <div class="tx-select-wrap">
                                <select id="filter-tipo-organo" class="tx-comite-select tx-comite-filter-control">
                                    <option value="Todas">Todas</option>
                                    <option value="Ordinaria">Ordinaria</option>
                                    <option value="Extraordinaria">Extraordinaria</option>
                                </select>
                                <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                    <div class="tx-comite-card-list tx-sesion-list" id="sesiones-list-organo">
                        <?php foreach ($oc_sesiones_organo as $sesion) : sesna_render_oc_sesion_card($sesion); endforeach; ?>
                        <?php if (empty($oc_sesiones_organo)) : ?>
                            <div class="tx-normativa-card texto--centro">
                                <p class="b1r color--neutro600 mb--0">Aún no hay sesiones registradas.</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="reticulaGrid__12" id="sesiones-vermas-wrap-organo">
                        <div class="columna__12">
                            <div class="texto--centro mt--32">
                                <button type="button" class="boton__fantasma" id="sesiones-vermas-btn-organo">
                                    Ver más sesiones <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION: RECOMENDACIONES -->
                <div class="content-section muestra--ninguno" id="sec-recomendaciones" role="tabpanel" aria-labelledby="tab-recomendaciones">
                    <div class="reticulaGrid__12 mb--24">
                        <div class="columna__12">
                            <h2 class="h2b patria color--pguinda600 mb--0">Recomendaciones no vinculantes</h2>
                        </div>
                    </div>
                    <div class="tx-comite-card-list">
                        <?php foreach ($oc_recomendaciones as $item) : sesna_render_oc_lista_directa_item($item); endforeach; ?>
                        <?php if (empty($oc_recomendaciones)) : ?>
                            <div class="tx-normativa-card texto--centro">
                                <p class="b1r color--neutro600 mb--0">Aún no hay recomendaciones registradas.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- SECTION: EXHORTOS -->
                <div class="content-section muestra--ninguno" id="sec-exhortos" role="tabpanel" aria-labelledby="tab-exhortos">
                    <div class="reticulaGrid__12 mb--24">
                        <div class="columna__12">
                            <h2 class="h2b patria color--pguinda600 mb--0">Exhortos</h2>
                        </div>
                    </div>
                    <div class="tx-comite-card-list">
                        <?php foreach ($oc_exhortos as $item) : sesna_render_oc_lista_directa_item($item); endforeach; ?>
                        <?php if (empty($oc_exhortos)) : ?>
                            <div class="tx-normativa-card texto--centro">
                                <p class="b1r color--neutro600 mb--0">Aún no hay exhortos registradas.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<!-- Modal Visor de Video (Ver sesión) SND v1.1.0 -->
<div class="modal tx-pdf-modal snd-modal" id="oc-video-modal" tabindex="-1" role="dialog" aria-labelledby="oc-video-modal-label" aria-hidden="true">
    <div class="tx-pdf-modal__dialog">
        <div class="tx-pdf-modal__content">
            <div class="tx-pdf-modal__header">
                <h5 class="tx-pdf-modal__title sh1b color--pguinda800" id="oc-video-modal-label">Ver sesión</h5>
                <button type="button" class="boton__fantasma tx-pdf-modal__close-btn" data-modal-dismiss aria-label="Cerrar modal">
                    <i class="snd__icono snd-close icono--24" aria-hidden="true"></i>
                </button>
            </div>
            <div class="tx-pdf-modal__body">
                <iframe id="oc-video-iframe" class="tx-pdf-modal__iframe" src="" title="Video de la sesión" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var videoModalEl = document.getElementById('oc-video-modal');
    if (!videoModalEl) return;
    var iframe = document.getElementById('oc-video-iframe');
    var title = document.getElementById('oc-video-modal-label');

    // Manejar apertura tanto por show.bs.modal como por clic directo
    document.addEventListener('click', function(e) {
        var trigger = e.target.closest('[data-video-id]');
        if (!trigger) return;
        var targetAttr = trigger.getAttribute('data-modal-target');
        if (targetAttr && targetAttr !== '#oc-video-modal') return;

        e.preventDefault();
        var videoId = trigger.getAttribute('data-video-id') || '';
        var videoTitle = trigger.getAttribute('data-video-title') || 'Ver sesión';
        if (title) title.textContent = videoTitle;
        if (iframe && videoId) {
            iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
        }
        if (window.sndModal) {
            window.sndModal.show(videoModalEl, trigger);
        }
    });

    videoModalEl.addEventListener('show.bs.modal', function (event) {
        var trigger = event.relatedTarget;
        if (!trigger) return;
        var videoId = trigger.getAttribute('data-video-id') || '';
        var videoTitle = trigger.getAttribute('data-video-title') || 'Ver sesión';
        if (title) title.textContent = videoTitle;
        if (iframe && videoId) {
            iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
        }
    });

    videoModalEl.addEventListener('hidden.bs.modal', function () {
        if (iframe) iframe.src = '';
        if (title) title.textContent = 'Ver sesión';
    });
});
</script>

<script src="<?php echo get_template_directory_uri(); ?>/script/organos-colegiados.js?v=1"></script>

<?php get_footer(); ?>
