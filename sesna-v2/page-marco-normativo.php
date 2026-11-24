<?php
/**
 * Template Name: Marco Normativo
 * Homologada al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 */

get_header();

$sesna_marco_normativo   = require get_theme_file_path('inc/data/marco-normativo.php');
$normatividad_externa    = $sesna_marco_normativo['externa'];
$normatividad_interna    = $sesna_marco_normativo['interna'];
?>

<div class="page-marco-normativo front-page-bg pb--40">

    <!-- Migas de pan (Breadcrumb) — Estándar SND v1.1.0 -->
    <?php get_template_part( 'template-parts/ui/breadcrumb', null, array(
        'items' => array(
            array( 'label' => 'Marco Normativo' ),
        ),
    ) ); ?>

    <!-- HERO SECTION -->
    <section class="sesna-page-hero" aria-label="Encabezado de Marco Normativo">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__8--md columna__6--lg posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Marco Normativo</h1>
                    <p class="sh1r mb--0 texto--justify">
                        Sustenta y regula las atribuciones, funciones y actividades de la Secretaría Ejecutiva del Sistema Nacional Anticorrupción, así como las disposiciones jurídicas que orientan su actuación y participación en el cumplimiento de los objetivos del Sistema Nacional Anticorrupción.
                    </p>
                </div>
                <div class="columna__12 columna__4--md columna__6--lg muestra--ninguno muestra--flex--md align-items-center justify-content-end posicion--relativa">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/Marco_normativo_Encabezado.png' ); ?>"
                         alt="Marco Normativo"
                         class="sesna-hero__img"
                         loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <div class="contenedor">

        <div class="tx-comite-panel" id="normatividad-section">
            <!-- Tabs — SND UI Kit (Tabs 01 / State: 618:2598 / 1562:3995 / 16460:870) integradas en el panel padre -->
            <div class="tx-comite-tabs-container tx-comite-tabs-container--underline ocn-tabs-nav mb--24">
                <ul class="ul--limpio tx-comite-tabs" role="tablist" aria-label="Secciones de Marco Normativo">
                    <li role="presentation">
                        <button type="button" id="tab-norm-ext" data-target="norm-ext" class="tx-comite-tab js-tab-link active" role="tab" aria-selected="true" aria-controls="normatividad-externa-container" tabindex="0">
                            Normatividad externa
                        </button>
                    </li>
                    <li role="presentation">
                        <button type="button" id="tab-norm-int" data-target="norm-int" class="tx-comite-tab js-tab-link" role="tab" aria-selected="false" aria-controls="normatividad-interna-container" tabindex="-1">
                            Normatividad interna
                        </button>
                    </li>
                </ul>
            </div>

            <!-- TABPANEL 1: NORMATIVIDAD EXTERNA -->
            <div id="normatividad-externa-container" class="tx-comite-tab-pane" role="tabpanel" aria-labelledby="tab-norm-ext">

                <!-- Encabezado y Contador (Atomo/Count & actions — 22373:36067) -->
                <div class="tx-comite-panel__header mb--24">
                    <div>
                        <h2 class="sh0b color--neutro800 mb--4" id="normatividad-externa-title">Normatividad externa</h2>
                        <p class="b1r color--neutro600 mb--0" id="normatividad-externa-count" aria-live="polite">
                            Mostrando <?= min(5, count($normatividad_externa)) ?> de <?= count($normatividad_externa) ?> documentos
                        </p>
                    </div>
                    <button type="button" id="normatividad-externa-reset" class="boton__fantasma tx-comite-reset-btn muestra--ninguno">
                        <?= sesna_render_snd_svg_icon('snd-close', 'icono--20') ?>
                        Limpiar filtros
                    </button>
                </div>

                <!-- Filtros Normatividad Externa (Panel de filtros 4.11 + Barra de búsqueda 4.1) -->
                <div class="reticulaGrid__12 mb--32 align-items-end">
                    <div class="columna__12 columna__6--md columna__4--lg">
                        <label for="filter-tipo-ext" class="b1sb dblock color--neutro800 mb--8">Tipo de documento</label>
                        <div class="tx-select-wrap">
                            <select id="filter-tipo-ext" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php
                                $tipos_ext = array_unique(array_filter(array_column($normatividad_externa, 'tipo')));
                                foreach ($tipos_ext as $te) : ?>
                                    <option value="<?= esc_attr($te) ?>"><?= esc_html($te) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20 tx-select-chevron') ?>
                        </div>
                    </div>
                    <div class="columna__12 columna__6--md columna__8--lg">
                        <label for="search-doc-ext" class="b1sb dblock color--neutro800 mb--8">Buscar documento</label>
                        <form class="search-container" role="search" id="form-search-ext" action="javascript:void(0);">
                            <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                <?= sesna_render_snd_svg_icon('snd-search', 'search-icon icono--24') ?>
                                <input type="search" id="search-doc-ext" name="q" placeholder="Nombre, palabra clave, tipo de documento..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Lista de Tarjetas Normatividad Externa -->
                <div class="tx-comite-card-list" id="normatividad-externa-body">
                    <?php foreach ($normatividad_externa as $ext_idx => $doc) :
                        $busqueda_ext = trim($doc['titulo'] . ' ' . $doc['tipo'] . ' ' . $doc['etiqueta']);
                    ?>
                        <div class="tx-comite-card tx-norm-ext-card" data-tipo="<?= esc_attr($doc['tipo']) ?>" data-doc-search="<?= esc_attr( function_exists('mb_strtolower') ? mb_strtolower($busqueda_ext, 'UTF-8') : strtolower($busqueda_ext) ) ?>"<?= $ext_idx >= 5 ? ' style="display:none;"' : '' ?>>

                            <!-- Type Column -->
                            <div class="tx-comite-card-date">
                                <div class="sh1b color--neutro600 mb--0 texto--centro"><?= esc_html($doc['etiqueta']) ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="tx-comite-card-info">
                                <h3 class="sh1b color--neutro800 mb--8 tx-comite-card-title"><?= esc_html($doc['titulo']) ?></h3>
                                <p class="b1r color--neutro700 mb--0 tx-comite-card-subtitle"><span class="b1sb color--neutro800">Tipo de documento:</span> <?= esc_html($doc['tipo']) ?></p>
                            </div>

                            <!-- Action Column — Botón Fantasma Horizontal (4.2 Botones) -->
                            <div class="tx-comite-card-action">
                                <a rel="noopener" href="<?= esc_attr($doc['url']) ?>" target="_blank" aria-label="<?= esc_attr('Consultar ' . $doc['titulo'] . ' (abre en ventana nueva)') ?>" class="boton__fantasma">
                                    <?= sesna_render_snd_svg_icon('snd-launch', 'icono--20') ?>
                                    Consultar
                                </a>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Estado vacío Externa — Mensajes informativos SND v1.0.0 (Informativo) -->
                <div role="status">
                    <div id="normatividad-externa-empty" class="mensajeInformativo mensajeInformativo--informativo mt--16 muestra--ninguno" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="normatividad-externa-empty">
                        No se encontraron documentos que coincidan con los filtros seleccionados.
                    </div>
                </div>

                <!-- Indicador de carga progresiva por scroll (SND v1.0.0 Loading MD 48x48px) -->
                <div id="normatividad-externa-vermas-wrap" class="sesna-inline-loader mt--16" role="status" aria-live="polite">
                    <div class="spin sesna-snd-spin sesna-snd-spin--md">Cargando...</div>
                </div>

            </div>

            <!-- TABPANEL 2: NORMATIVIDAD INTERNA -->
            <div id="normatividad-interna-container" class="tx-comite-tab-pane muestra--ninguno" role="tabpanel" aria-labelledby="tab-norm-int">

                <!-- Encabezado y Contador (Atomo/Count & actions — 22373:36067) -->
                <div class="tx-comite-panel__header mb--24">
                    <div>
                        <h2 class="sh0b color--neutro800 mb--4" id="normatividad-interna-title">Normatividad interna</h2>
                        <p class="b1r color--neutro600 mb--0" id="normatividad-interna-count" aria-live="polite">
                            Mostrando <?= min(5, count($normatividad_interna)) ?> de <?= count($normatividad_interna) ?> documentos
                        </p>
                    </div>
                    <button type="button" id="normatividad-interna-reset" class="boton__fantasma tx-comite-reset-btn muestra--ninguno">
                        <?= sesna_render_snd_svg_icon('snd-close', 'icono--20') ?>
                        Limpiar filtros
                    </button>
                </div>

                <!-- Filtros Normatividad Interna (Panel de filtros 4.11 + Barra de búsqueda 4.1) -->
                <div class="reticulaGrid__12 mb--32 align-items-end">
                    <div class="columna__12 columna__6--md columna__4--lg">
                        <label for="filter-tipo-int" class="b1sb dblock color--neutro800 mb--8">Tipo de documento</label>
                        <div class="tx-select-wrap">
                            <select id="filter-tipo-int" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php
                                $tipos_int = array_unique(array_filter(array_column($normatividad_interna, 'tipo')));
                                foreach ($tipos_int as $ti) : ?>
                                    <option value="<?= esc_attr($ti) ?>"><?= esc_html($ti) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20 tx-select-chevron') ?>
                        </div>
                    </div>
                    <div class="columna__12 columna__6--md columna__8--lg">
                        <label for="search-doc-int" class="b1sb dblock color--neutro800 mb--8">Buscar documento</label>
                        <form class="search-container" role="search" id="form-search-int" action="javascript:void(0);">
                            <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                                <?= sesna_render_snd_svg_icon('snd-search', 'search-icon icono--24') ?>
                                <input type="search" id="search-doc-int" name="q" placeholder="Nombre, palabra clave, tipo de documento..." class="sh0r js-input tx-comite-search-input" autocomplete="off" />
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Lista de Tarjetas Normatividad Interna -->
                <div class="tx-comite-card-list" id="normatividad-interna-body">
                    <?php foreach ($normatividad_interna as $int_idx => $doc) :
                        $busqueda_int = trim($doc['titulo'] . ' ' . $doc['tipo'] . ' ' . $doc['etiqueta']);
                    ?>
                        <div class="tx-comite-card tx-norm-int-card" data-tipo="<?= esc_attr($doc['tipo']) ?>" data-doc-search="<?= esc_attr( function_exists('mb_strtolower') ? mb_strtolower($busqueda_int, 'UTF-8') : strtolower($busqueda_int) ) ?>"<?= $int_idx >= 5 ? ' style="display:none;"' : '' ?>>

                            <!-- Type Column -->
                            <div class="tx-comite-card-date">
                                <div class="sh1b color--neutro600 mb--0 texto--centro"><?= esc_html($doc['etiqueta']) ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="tx-comite-card-info">
                                <h3 class="sh1b color--neutro800 mb--8 tx-comite-card-title"><?= esc_html($doc['titulo']) ?></h3>
                                <p class="b1r color--neutro700 mb--0 tx-comite-card-subtitle"><span class="b1sb color--neutro800">Tipo de documento:</span> <?= esc_html($doc['tipo']) ?></p>
                            </div>

                            <!-- Action Column — Botón Fantasma Horizontal (4.2 Botones) -->
                            <div class="tx-comite-card-action">
                                <button type="button" class="boton__fantasma" data-modal-target="#pdfViewerModal" data-pdf-url="<?= esc_url($doc['url']) ?>" data-pdf-title="<?= esc_attr($doc['titulo']) ?>" aria-label="<?= esc_attr('Consultar ' . $doc['titulo']) ?>">
                                    <?= sesna_render_snd_svg_icon('snd-document--pdf', 'icono--20') ?>
                                    Consultar
                                </button>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Estado vacío Interna — Mensajes informativos SND v1.0.0 (Informativo) -->
                <div role="status">
                    <div id="normatividad-interna-empty" class="mensajeInformativo mensajeInformativo--informativo mt--16 muestra--ninguno" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="normatividad-interna-empty">
                        No se encontraron documentos que coincidan con los filtros seleccionados.
                    </div>
                </div>

                <!-- Indicador de carga progresiva por scroll (SND v1.0.0 Loading MD 48x48px) -->
                <div id="normatividad-interna-vermas-wrap" class="sesna-inline-loader mt--16" role="status" aria-live="polite">
                    <div class="spin sesna-snd-spin sesna-snd-spin--md">Cargando...</div>
                </div>

            </div>
        </div>

    </div>
</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>

<?php get_footer(); ?>
