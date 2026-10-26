<?php
/**
 * Contenido: Archivo Documental
 * Compartido por page-archivo-documental.php.
 * Homologado al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 *
 * Fuente (inventario-dgayf.json): sección "Archivo Documental".
 * Las URLs se enlazan tal como vienen en el JSON (solo se reescribe el
 * dominio de producción al dominio actual, sin alterar la ruta). Cuando el
 * documento no es un PDF directo (algunas entradas del JSON apuntan a la
 * página de transparencia en vez de al archivo), se enlaza como página
 * externa en lugar de abrir el visor modal.
 */

$ad_json_path = get_template_directory() . '/data/inventario-dgayf.json';

$ad_columnas = array(
    'Plan Anual de Desarrollo Archivístico (PADA)' => array( 'icono' => 'snd-calendar', 'bg' => '#F9F0F3', 'color' => '#611232' ),
    'Informe de Cumplimiento del Programa Anual de Desarrollo Archivístico (PADA)' => array( 'icono' => 'snd-chart--bar', 'bg' => '#EEE8F5', 'color' => '#72588F' ),
    'Instrumentos de Control Archivístico de la SESNA' => array( 'icono' => 'snd-collaborate', 'bg' => '#F9F0F3', 'color' => '#611232' ),
    'Guía de Archivo Documental' => array( 'icono' => 'snd-education', 'bg' => '#EEE8F5', 'color' => '#72588F' ),
    'Inventario general por Expediente' => array( 'icono' => 'snd-archive', 'bg' => '#F9F0F3', 'color' => '#611232' ),
);

$ad_short_names = array(
    'Plan Anual de Desarrollo Archivístico (PADA)' => 'PADA',
    'Informe de Cumplimiento del Programa Anual de Desarrollo Archivístico (PADA)' => 'Informe PADA',
    'Instrumentos de Control Archivístico de la SESNA' => 'Instrumentos Control',
    'Guía de Archivo Documental' => 'Guía de Archivo',
    'Inventario general por Expediente' => 'Inventario',
    'Inventario General por Expediente' => 'Inventario',
);

$ad_grupos = array();

if ( file_exists( $ad_json_path ) ) {
    $ad_data = json_decode( file_get_contents( $ad_json_path ), true );

    if ( is_array( $ad_data ) ) {
        foreach ( $ad_data as $seccion ) {
            if ( ! isset( $seccion['seccion'] ) || 'Archivo Documental' !== $seccion['seccion'] ) {
                continue;
            }

            foreach ( $seccion['subsecciones'] as $sub ) {
                $titulo = $sub['subseccion'];
                $nota   = '';
                $docs   = array();

                foreach ( $sub['documentos'] as $doc ) {
                    if ( empty( $doc['url'] ) ) {
                        continue;
                    }
                    if ( ! $nota && ! empty( $doc['descripcion'] ) ) {
                        $nota = $doc['descripcion'];
                    }
                    $url_final = function_exists( 'sna_rewrite_sesna_domain_in_content' ) ? sna_rewrite_sesna_domain_in_content( $doc['url'] ) : $doc['url'];
                    $docs[]    = array(
                        'label'  => $doc['contenidoN1'],
                        'url'    => $url_final,
                        'anio'   => ! empty( $doc['anio'] ) ? intval( $doc['anio'] ) : 0,
                        'es_pdf' => (bool) preg_match( '/\.pdf(\?.*)?$/i', $url_final ),
                    );
                }

                // Más reciente primero.
                usort( $docs, function ( $a, $b ) {
                    return $b['anio'] <=> $a['anio'];
                } );

                $ad_grupos[ $titulo ] = array(
                    'titulo' => $titulo,
                    'nota'   => $nota,
                    'docs'   => $docs,
                );
            }
            break;
        }
    }
}

$first_key   = ! empty( $ad_grupos ) ? array_key_first( $ad_grupos ) : '';
$first_short = ( $first_key && isset( $ad_short_names[ $first_key ] ) ) ? $ad_short_names[ $first_key ] : 'PADA';
?>
<div class="page-pna-archivo cf-search-scope">

    <!-- Encabezado de Sección (SND v1.1.0 — Homologado con Información Financiera y Contrataciones) -->
    <div class="mb--32">
        <h1 class="h1b patria color--pguinda600 mb--4">Archivo Documental</h1>
        <p class="sh1r color--neutro600 mb--0">Instrumentos para la organización, conservación y administración de los archivos institucionales.</p>
    </div>

    <!-- ── VISTA DESKTOP: Sidebar de navegación (4 cols) + Área de contenido (8 cols) ── -->
    <div class="ad-desktop-view">
        <div class="reticulaGrid__12 align-items-start">

            <!-- Sidebar izquierdo (Desktop) -->
            <div class="columna__12 columna__4--lg ad-desktop-sidebar-col">
                <div class="fin-panel-card p--20">
                    <div class="fin-sidebar-section">
                        <h2 class="sh0b color--neutro800 mb--16" style="line-height: 1.3;">Secciones</h2>
                        <div class="fin-dictamen-list d-flex flex-column gap--4" role="tablist" aria-label="Secciones de Archivo Documental">
                            <?php $s_i = 0; foreach ( $ad_grupos as $sec_title => $grupo ) :
                                $is_active = ( 0 === $s_i );
                                $display_title = ( 'Inventario general por Expediente' === $sec_title ) ? 'Inventario General por Expediente' : $sec_title;
                                ?>
                                <button type="button"
                                        class="fin-dictamen-item <?php echo $is_active ? 'active' : ''; ?>"
                                        role="tab"
                                        aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                                        aria-controls="ad-doc-panel-<?php echo esc_attr( $s_i ); ?>"
                                        id="ad-tab-<?php echo esc_attr( $s_i ); ?>"
                                        data-ad-panel="<?php echo esc_attr( $s_i ); ?>">
                                    <span><?php echo esc_html( $display_title ); ?></span>
                                    <i class="snd__icono snd-chevron--right icono--16 fin-nav-chevron" aria-hidden="true"></i>
                                </button>
                            <?php $s_i++; endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Área de contenido compartida (Derecha) -->
            <div class="columna__12 columna__8--lg ad-desktop-content-col">
                <div class="fin-panel-card p--24 mb--24">

                    <!-- Barra de búsqueda superior — SND 4.1 homologado con la sección -->
                    <div class="search-container mb--20" role="search">
                        <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control w-100">
                            <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
                            <input type="search" id="adSearchInputDesktop" class="cf-search-input sh0r js-input tx-comite-search-input" placeholder="Buscar documento..." aria-label="Buscar documento" autocomplete="off">
                        </div>
                    </div>

                    <!-- Paneles de documentos por sección -->
                    <div id="adDocPanelsDesktop">
                        <?php $p_i = 0; foreach ( $ad_grupos as $sec_title => $grupo ) :
                            $meta = isset( $ad_columnas[ $sec_title ] ) ? $ad_columnas[ $sec_title ] : array( 'icono' => 'snd-folder', 'bg' => '#F9F0F3', 'color' => '#611232' );
                            $is_active = ( 0 === $p_i );
                            $display_title = ( 'Inventario general por Expediente' === $sec_title ) ? 'Inventario General por Expediente' : $sec_title;
                            ?>
                            <div class="ad-doc-panel <?php echo $is_active ? '' : 'muestra--ninguno'; ?>"
                                 id="ad-doc-panel-<?php echo esc_attr( $p_i ); ?>"
                                 role="tabpanel"
                                 aria-labelledby="ad-tab-<?php echo esc_attr( $p_i ); ?>"
                                 tabindex="0"
                                 data-ad-panel="<?php echo esc_attr( $p_i ); ?>">

                                <!-- Encabezado de la sección activa (ícono + nombre) -->
                                <div class="d-flex align-items-center gap--12 pb--16 mb--20 border-bottom">
                                    <div class="icon-bg-circle icon-bg-circle--sm flex-shrink-0" style="background-color: <?php echo esc_attr( $meta['bg'] ); ?>;">
                                        <i class="snd__icono <?php echo esc_attr( $meta['icono'] ); ?> icono--20" aria-hidden="true" style="color: <?php echo esc_attr( $meta['color'] ); ?>;"></i>
                                    </div>
                                    <h2 class="sh0b color--pguinda600 mb--0" style="line-height: 1.3;"><?php echo esc_html( $display_title ); ?></h2>
                                </div>

                                <!-- Lista de documentos de la sección -->
                                <div class="fin-doc-list">
                                    <?php foreach ( $grupo['docs'] as $doc ) :
                                        $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                                        ?>
                                        <div class="fin-doc-row cf-doc-row" data-cf-search="<?php echo $search_attr; ?>">
                                            <div class="fin-doc-left">
                                                <h3 class="b1r color--neutro800 mb--0 fin-doc-label"><?php echo esc_html( $doc['label'] ); ?></h3>
                                            </div>
                                            <div class="fin-doc-action">
                                                <?php if ( $doc['es_pdf'] ) : ?>
                                                    <button type="button" class="boton__fantasma fin-doc-btn"
                                                            data-modal-target="#pdfViewerModal"
                                                            data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                                                            data-pdf-title="<?php echo esc_attr( $doc['label'] ); ?>">
                                                        <i class="snd__icono snd-document--pdf icono--24" aria-hidden="true"></i>
                                                        Consultar
                                                        <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                                                    </button>
                                                <?php else : ?>
                                                    <a href="<?php echo esc_url( $doc['url'] ); ?>" target="_blank" rel="noopener"
                                                       class="boton__fantasma fin-doc-btn text-decoration-none">
                                                        <i class="snd__icono snd-launch icono--20" aria-hidden="true"></i>
                                                        Abrir enlace
                                                        <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <?php if ( ! empty( $grupo['nota'] ) ) : ?>
                                <div class="aviso aviso--info mt--20" role="region" aria-label="Información">
                                    <i class="snd__icono snd-information aviso__icon icono--20 color--azul500" aria-hidden="true"></i>
                                    <div class="aviso__cont">
                                        <div class="aviso__txt">
                                            <p class="b1r color--azul500 mb--0"><?php echo esc_html( $grupo['nota'] ); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <!-- Estado vacío de búsqueda SND 4.16 -->
                                <div class="aviso aviso--info mt--16 muestra--ninguno ad-doc-empty" role="status" aria-live="polite">
                                    <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
                                    <div class="aviso__cont">
                                        <div class="aviso__txt">
                                            <p class="b1r color--azul500 mb--0">No se encontraron documentos que coincidan con la búsqueda.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php $p_i++; endforeach; ?>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- ── VISTA MÓVIL: Selector Chip + Drawer Bottom Sheet SND v1.1.0 (Sin modificar) ── -->
    <div class="ad-mobile-view">
        <div class="cf-panel-card mb-4">
            <!-- Buscador móvil -->
            <form class="search-container mb--20" role="search" action="javascript:void(0);">
                <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                    <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
                    <input type="search" id="adSearchInputMobile" class="cf-search-input sh0r js-input tx-comite-search-input" placeholder="Buscar documento..." aria-label="Buscar documento" autocomplete="off">
                </div>
            </form>

            <!-- Selector Móvil: Chip con nombre corto y chevron -->
            <div class="pna-mobile-selector mb--20">
                <button type="button" class="boton__secundario ocn-mobile-tab-trigger" id="adOpenDrawerBtn" aria-haspopup="dialog" aria-expanded="false" aria-controls="adDrawer">
                    <span id="adActiveSectionLabel"><?php echo esc_html( $first_short ); ?></span>
                    <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Contenedor de la card principal para la sección activa -->
            <div class="ad-mobile-panels" id="adMobilePanels">
                <?php $m_i = 0; foreach ( $ad_grupos as $grupo ) :
                    $meta = isset( $ad_columnas[ $grupo['titulo'] ] ) ? $ad_columnas[ $grupo['titulo'] ] : array( 'icono' => 'snd-folder', 'bg' => '#F9F0F3', 'color' => '#611232' );
                    $is_first = ( 0 === $m_i );
                    ?>
                <div class="ad-mobile-pane <?php echo $is_first ? '' : 'muestra--ninguno'; ?>" id="ad-mobile-pane-<?php echo esc_attr( $m_i ); ?>" data-section-index="<?php echo esc_attr( $m_i ); ?>">
                    <div class="cf-inner-card d-flex flex-column p-3">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <div class="icon-bg-circle icon-bg-circle--sm flex-shrink-0" style="background-color: <?php echo esc_attr( $meta['bg'] ); ?>;">
                                <i class="snd__icono <?php echo esc_attr( $meta['icono'] ); ?> icono--20" aria-hidden="true" style="color: <?php echo esc_attr( $meta['color'] ); ?>;"></i>
                            </div>
                            <h3 class="h6 fw-bold mb-0 font-noto-sans" style="color: #611232; line-height: 1.3;"><?php echo esc_html( $grupo['titulo'] ); ?></h3>
                        </div>

                        <div class="d-flex flex-column flex-grow-1">
                            <?php foreach ( $grupo['docs'] as $doc ) :
                                $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                                if ( $doc['es_pdf'] ) : ?>
                            <a href="<?php echo esc_url( $doc['url'] ); ?>"
                               class="pna-doc-item cf-doc-row px-2 py-2 rounded-3 text-decoration-none"
                               data-modal-target="#pdfViewerModal"
                               data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                               data-pdf-title="<?php echo esc_attr( $doc['label'] ); ?>"
                               data-cf-search="<?php echo $search_attr; ?>"
                               style="color: #333;">
                                <span class="font-noto-sans" style="font-size: 13px;"><?php echo esc_html( $doc['label'] ); ?></span>
                                <span class="cf-doc-view" data-tooltip="Ver documento" aria-hidden="true"><i class="snd__icono snd-document icono--16" aria-hidden="true"></i></span>
                                <span class="visually-hidden">Ver documento</span>
                            </a>
                            <?php else : ?>
                            <a href="<?php echo esc_url( $doc['url'] ); ?>" target="_blank" rel="noopener"
                               class="pna-doc-item cf-doc-row px-2 py-2 rounded-3 text-decoration-none"
                               data-cf-search="<?php echo $search_attr; ?>"
                               style="color: #333;">
                                <span class="font-noto-sans" style="font-size: 13px;"><?php echo esc_html( $doc['label'] ); ?></span>
                                <span class="cf-doc-view" data-tooltip="Abrir enlace" aria-hidden="true"><i class="snd__icono snd-launch icono--16" aria-hidden="true"></i></span>
                                <span class="visually-hidden">Abrir enlace</span>
                            </a>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <?php if ( ! empty( $grupo['nota'] ) ) : ?>
                        <div class="mt-3 pt-3 d-flex align-items-start gap-2 cf-inner-card__footer">
                            <i class="snd__icono snd-information text-muted flex-shrink-0 icono--16" aria-hidden="true" style="margin-top: 2px;"></i>
                            <span class="text-muted font-noto-sans" style="font-size: 12px;"><?php echo esc_html( $grupo['nota'] ); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php $m_i++; endforeach; ?>
            </div>
        </div>
    </div>

</div>

<!-- ── Drawer Móvil (Bottom Sheet): Selección de Sección SND v1.1.0 ────── -->
<div class="snd-drawer-overlay page-pna-archivo is-hidden" id="adDrawerOverlay" aria-hidden="true">
    <div class="snd-drawer snd-drawer--bottom" id="adDrawer" role="dialog" aria-modal="true" aria-labelledby="adDrawerTitle">
        <!-- Drag handle -->
        <div class="snd-drawer__handle-wrap" id="adDrawerHandle">
            <span class="snd-drawer__handle" aria-hidden="true"></span>
        </div>

        <!-- Header con título "Seleccionar sección" y un IconButton de cierre -->
        <div class="snd-drawer__header">
            <h2 class="sh0b color--neutro800 mb--0" id="adDrawerTitle">Seleccionar sección</h2>
            <button type="button" class="boton__fantasma snd-drawer__close-btn" id="adDrawerCloseBtn" aria-label="Cerrar selección de sección">
                <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Las cinco secciones como ListItems seleccionables mostrando su nombre completo -->
        <div class="snd-drawer__body" id="adDrawerBody">
            <div class="d-flex flex-column gap--8" role="listbox" aria-label="Secciones de Archivo Documental">
                <?php $d_i = 0; foreach ( $ad_grupos as $sec_title => $grupo ) :
                    $is_active = ( 0 === $d_i );
                    $short_name = isset( $ad_short_names[ $sec_title ] ) ? $ad_short_names[ $sec_title ] : $sec_title;
                    $display_title = ( 'Inventario general por Expediente' === $sec_title ) ? 'Inventario General por Expediente' : $sec_title;
                    ?>
                    <button type="button"
                            class="fin-dictamen-item <?php echo $is_active ? 'active' : ''; ?>"
                            role="option"
                            aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                            data-section-index="<?php echo esc_attr( $d_i ); ?>"
                            data-short-name="<?php echo esc_attr( $short_name ); ?>"
                            data-section-title="<?php echo esc_attr( $display_title ); ?>">
                        <span><?php echo esc_html( $display_title ); ?></span>
                        <i class="snd__icono snd-checkmark icono--16 ocn-drawer-check" aria-hidden="true"></i>
                    </button>
                <?php $d_i++; endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    'use strict';

    function initArchivoDocumental() {
        // ── Lógica Desktop: Sidebar + Área de Contenido Compartida ──────
        var sidebarItems  = Array.from(document.querySelectorAll('.ad-desktop-sidebar-col .fin-dictamen-item'));
        var docPanels     = Array.from(document.querySelectorAll('#adDocPanelsDesktop .ad-doc-panel'));
        var desktopSearch = document.getElementById('adSearchInputDesktop');

        function activateDesktopSection(index) {
            sidebarItems.forEach(function (btn) {
                var btnIdx = parseInt(btn.getAttribute('data-ad-panel'), 10);
                var isAct = (btnIdx === index);
                btn.classList.toggle('active', isAct);
                btn.setAttribute('aria-selected', isAct ? 'true' : 'false');
            });

            docPanels.forEach(function (panel) {
                var panelIdx = parseInt(panel.getAttribute('data-ad-panel'), 10);
                var isAct = (panelIdx === index);
                panel.classList.toggle('muestra--ninguno', !isAct);

                if (isAct) {
                    var query = desktopSearch ? desktopSearch.value.trim().toLowerCase() : '';
                    var rows = panel.querySelectorAll('.cf-doc-row');
                    var visibleCount = 0;
                    rows.forEach(function (r) {
                        var match = !query || ((r.getAttribute('data-cf-search') || '').indexOf(query) !== -1);
                        r.classList.toggle('muestra--ninguno', !match);
                        if (match) visibleCount++;
                    });
                    var emptyNotice = panel.querySelector('.ad-doc-empty');
                    if (emptyNotice) {
                        emptyNotice.classList.toggle('muestra--ninguno', visibleCount > 0 || !query);
                    }
                }
            });
        }

        sidebarItems.forEach(function (item, idx) {
            item.addEventListener('click', function () {
                var targetIdx = parseInt(this.getAttribute('data-ad-panel'), 10);
                activateDesktopSection(targetIdx);
            });

            item.addEventListener('keydown', function (e) {
                var nextIdx = null;
                if (e.key === 'ArrowDown') {
                    nextIdx = (idx + 1) % sidebarItems.length;
                } else if (e.key === 'ArrowUp') {
                    nextIdx = (idx - 1 + sidebarItems.length) % sidebarItems.length;
                }
                if (nextIdx !== null) {
                    e.preventDefault();
                    sidebarItems[nextIdx].focus();
                    var panelIndex = parseInt(sidebarItems[nextIdx].getAttribute('data-ad-panel'), 10);
                    activateDesktopSection(panelIndex);
                }
            });
        });

        if (desktopSearch) {
            desktopSearch.addEventListener('input', function () {
                var query = this.value.trim().toLowerCase();
                var activePanel = document.querySelector('#adDocPanelsDesktop .ad-doc-panel:not(.muestra--ninguno)');
                if (activePanel) {
                    var rows = activePanel.querySelectorAll('.cf-doc-row');
                    var visibleCount = 0;
                    rows.forEach(function (r) {
                        var match = !query || ((r.getAttribute('data-cf-search') || '').indexOf(query) !== -1);
                        r.classList.toggle('muestra--ninguno', !match);
                        if (match) visibleCount++;
                    });
                    var emptyNotice = activePanel.querySelector('.ad-doc-empty');
                    if (emptyNotice) {
                        emptyNotice.classList.toggle('muestra--ninguno', visibleCount > 0 || !query);
                    }
                }
            });
        }

        // ── Lógica Móvil: Selector Chip + Drawer Bottom Sheet ──────────
        var triggerBtn  = document.getElementById('adOpenDrawerBtn');
        var labelEl     = document.getElementById('adActiveSectionLabel');
        var overlayEl   = document.getElementById('adDrawerOverlay');
        var drawerEl    = document.getElementById('adDrawer');
        var closeBtn    = document.getElementById('adDrawerCloseBtn');
        var drawerItems = document.querySelectorAll('#adDrawer .fin-dictamen-item');
        var mobilePanes = document.querySelectorAll('#adMobilePanels .ad-mobile-pane');

        function activateMobileSection(index) {
            mobilePanes.forEach(function (pane) {
                var paneIdx = parseInt(pane.getAttribute('data-section-index'), 10);
                pane.classList.toggle('muestra--ninguno', paneIdx !== index);
            });

            drawerItems.forEach(function (item) {
                var itemIdx = parseInt(item.getAttribute('data-section-index'), 10);
                var isAct = (itemIdx === index);
                item.classList.toggle('active', isAct);
                item.setAttribute('aria-selected', isAct ? 'true' : 'false');
                if (isAct && labelEl) {
                    labelEl.textContent = item.getAttribute('data-short-name') || '';
                }
            });
        }

        function openDrawer() {
            if (!overlayEl || !drawerEl) return;
            overlayEl.classList.remove('is-hidden');
            overlayEl.setAttribute('aria-hidden', 'false');
            document.body.classList.add('snd-drawer-open');
            if (triggerBtn) triggerBtn.setAttribute('aria-expanded', 'true');
            void overlayEl.offsetWidth;
            overlayEl.classList.add('is-visible');
            if (closeBtn) closeBtn.focus();
        }

        function closeDrawer() {
            if (!overlayEl || !drawerEl) return;
            overlayEl.classList.remove('is-visible');
            overlayEl.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('snd-drawer-open');
            if (triggerBtn) triggerBtn.setAttribute('aria-expanded', 'false');
            if (drawerEl) drawerEl.style.transform = '';
            setTimeout(function () {
                if (!overlayEl.classList.contains('is-visible')) {
                    overlayEl.classList.add('is-hidden');
                }
            }, 280);
            if (triggerBtn) triggerBtn.focus();
        }

        if (triggerBtn) triggerBtn.addEventListener('click', openDrawer);
        if (closeBtn) closeBtn.addEventListener('click', closeDrawer);

        if (overlayEl) {
            overlayEl.addEventListener('click', function (e) {
                if (e.target === overlayEl) closeDrawer();
            });
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && overlayEl && overlayEl.classList.contains('is-visible')) {
                closeDrawer();
            }
        });

        // Swipe Down / Touch drag en móvil para cerrar el Bottom Sheet
        var touchStartY = 0;
        var touchCurrentY = 0;
        var handle = document.getElementById('adDrawerHandle');
        if (handle && drawerEl) {
            handle.addEventListener('touchstart', function (e) {
                touchStartY = e.touches[0].clientY;
            }, { passive: true });
            handle.addEventListener('touchmove', function (e) {
                touchCurrentY = e.touches[0].clientY;
                var diff = touchCurrentY - touchStartY;
                if (diff > 0) {
                    drawerEl.style.transform = 'translateY(' + diff + 'px)';
                }
            }, { passive: true });
            handle.addEventListener('touchend', function () {
                var diff = touchCurrentY - touchStartY;
                if (diff > 80) {
                    closeDrawer();
                } else {
                    drawerEl.style.transform = '';
                }
                touchStartY = 0;
                touchCurrentY = 0;
            });
        }

        drawerItems.forEach(function (item) {
            item.addEventListener('click', function () {
                var idx = parseInt(this.getAttribute('data-section-index'), 10);
                activateMobileSection(idx);
                closeDrawer();
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initArchivoDocumental);
    } else {
        initArchivoDocumental();
    }
})();
</script>
