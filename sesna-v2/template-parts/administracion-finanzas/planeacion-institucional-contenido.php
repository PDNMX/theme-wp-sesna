<?php
/**
 * Contenido: Planeación Institucional
 * Homologado al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 *
 * @package sesna
 */

$pi_grupos = array(
    array(
        'titulo' => 'Programa Institucional',
        'nota'   => 'Documento rector que establece los objetivos, estrategias y líneas de acción de la SESNA.',
        'docs'   => array(
            array( 'label' => 'Programa Institucional SESNA 2025-2030', 'url' => '/wp-content/uploads/2025/10/2025_08_29_PI_2025-2030_sesna.pdf', 'disponible' => true ),
            array( 'label' => 'Programa Institucional SESNA 2020-2024', 'url' => '/wp-content/uploads/2020/06/2020_06_17_MAT_sesna.pdf', 'disponible' => true ),
        ),
    ),
    array(
        'titulo' => 'Informes del Programa Institucional 2020-2024',
        'nota'   => 'Informes anuales de avance y resultados del Programa Institucional de la SESNA.',
        'docs'   => array(
            array( 'label' => 'Informe de Avance y Resultados 2023-2024', 'url' => '/wp-content/uploads/2024/09/Informe-de-Avance-y-Resultados-2023-2024.pdf', 'disponible' => true ),
            array( 'label' => 'Consulta el informe 2022', 'url' => '/wp-content/uploads/2023/05/Informe-de-Avance-y-Resultados-PI-SESNA-2022.pdf', 'disponible' => true ),
            array( 'label' => 'Consulta el informe 2021', 'url' => '/wp-content/uploads/2022/05/Informe-Avance-y-Resultados-PI-SESNA-2021.pdf', 'disponible' => true ),
            array( 'label' => 'Consulta el informe 2020', 'url' => '/wp-content/uploads/2021/05/Informe-Avance-y-Resultados-2020.pdf', 'disponible' => true ),
        ),
    ),
    array(
        'titulo' => 'Informes de Autoevaluación de la Gestión',
        'nota'   => 'Informes de autoevaluación semestrales y anuales de la SESNA.',
        'docs'   => array(
            array( 'label' => 'Informe de Autoevaluación de la Gestión Anual 2025', 'url' => '/wp-content/uploads/2026/05/informe_autoevaluacion_gestion_anual_sesna_2025.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión 1er Semestre 2025', 'url' => '/wp-content/uploads/2025/11/Informe-de-Evaluacion-de-la-Gestion-SESNA-1erS_2025-c_a0.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión Anual 2024', 'url' => '/wp-content/uploads/2025/11/Informe-de-Evaluacion-de-la-Gestion-SESNA-2S_2024_-Nuevos-TdR_120820250.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión 1er Semestre 2024', 'url' => '/wp-content/uploads/2024/09/Informe-de-Evaluacion-de-la-Gestion-SESNA-1erS_2024_-Nuevos-TdR-002.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión Anual 2023', 'url' => '/wp-content/uploads/2023/10/Informe-Anual-de-Autoevaluacion-SESNA-2023_.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión 1er Semestre 2023', 'url' => '/wp-content/uploads/2023/10/Informe-Semestral-de-Gestion-SESNA-2023_.pdf', 'disponible' => true ),
        ),
    ),
);
?>
<div class="page-pna-planeacion cf-search-scope">

    <!-- Encabezado de Sección -->
    <div class="mb--32">
        <h1 class="h1b patria color--pguinda600 mb--4">Planeación Institucional</h1>
        <p class="sh1r color--neutro600 mb--0">Documentos que orientan y dan seguimiento al cumplimiento de los objetivos y metas institucionales.</p>
    </div>

    <!-- Caja/panel que envuelve Tabs + contenido — misma estructura que template-transparencia-comite.php y page-organos-colegiados.php -->
    <div class="tx-comite-panel">

        <!-- Selector Móvil SND v1.1.0: mismo .boton__secundario + chevron que page-organos-colegiados.php -->
        <div class="pna-mobile-selector mb--20">
            <button type="button" class="boton__secundario ocn-mobile-tab-trigger" id="pnaOpenDrawerBtn" aria-haspopup="dialog" aria-expanded="false" aria-controls="pnaDrawer">
                <span id="pnaActiveSectionLabel"><?php echo esc_html( $pi_grupos[0]['titulo'] ); ?></span>
                <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Pestañas Desktop — SND UI Kit (Tabs 01 / línea inferior: 618:2598 / 16460:870) -->
        <div class="pna-tabs-desktop tx-comite-tabs-container tx-comite-tabs-container--underline mb--24">
            <ul class="ul--limpio tx-comite-tabs" id="pnaTabs" role="tablist">
                <?php foreach ( $pi_grupos as $i => $grupo ) : ?>
                <li role="presentation">
                    <button class="tx-comite-tab" id="pna-tab-<?php echo esc_attr( $i ); ?>" data-tab-target="#pna-pane-<?php echo esc_attr( $i ); ?>" type="button" role="tab" aria-controls="pna-pane-<?php echo esc_attr( $i ); ?>" aria-selected="<?php echo ( 0 === $i ) ? 'true' : 'false'; ?>">
                        <?php echo esc_html( $grupo['titulo'] ); ?>
                    </button>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Contenido de cada pestaña: lista de documentos de ancho completo -->
        <div class="tx-comite-tab-content" id="pnaTabsContent">
            <?php foreach ( $pi_grupos as $i => $grupo ) : ?>
            <div class="tx-comite-tab-pane <?php echo ( 0 === $i ) ? '' : 'muestra--ninguno'; ?>" id="pna-pane-<?php echo esc_attr( $i ); ?>" role="tabpanel" aria-labelledby="pna-tab-<?php echo esc_attr( $i ); ?>" tabindex="0">

                <div class="fin-doc-list">
                    <?php foreach ( $grupo['docs'] as $doc ) :
                        $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                        $doc_url     = function_exists( 'sna_rewrite_sesna_domain_in_content' ) ? sna_rewrite_sesna_domain_in_content( $doc['url'] ) : $doc['url'];
                        ?>
                        <div class="fin-doc-row pna-doc-row" data-cf-search="<?php echo $search_attr; ?>">
                            <div class="fin-doc-left">
                                <h3 class="b1r color--neutro800 mb--0 fin-doc-label"><?php echo esc_html( $doc['label'] ); ?></h3>
                            </div>
                            <div class="fin-doc-action">
                                <?php if ( ! empty( $doc['disponible'] ) ) : ?>
                                    <button type="button" class="boton__fantasma fin-doc-btn"
                                            data-modal-target="#pdfViewerModal"
                                            data-pdf-url="<?php echo esc_url( $doc_url ); ?>"
                                            data-pdf-title="<?php echo esc_attr( $doc['label'] ); ?>">
                                        <i class="snd__icono snd-document--pdf icono--24" aria-hidden="true"></i>
                                        Consultar
                                        <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                                    </button>
                                <?php else : ?>
                                    <span class="xsdr color--neutro600 radio--pildora fondo--neutro200 px--8 py--4 borde mb--0">Próximamente</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="aviso aviso--info mt--20" role="region" aria-label="Información">
                    <i class="snd__icono snd-information aviso__icon icono--20 color--azul500" aria-hidden="true"></i>
                    <div class="aviso__cont">
                        <div class="aviso__txt">
                            <p class="b1r color--azul500 mb--0"><?php echo esc_html( $grupo['nota'] ); ?></p>
                        </div>
                    </div>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>

</div>

<!-- ── Drawer Móvil (Bottom Sheet): Selección de Sección SND v1.1.0 ────── -->
<div class="snd-drawer-overlay page-planeacion-institucional is-hidden" id="pnaDrawerOverlay" aria-hidden="true">
    <div class="snd-drawer snd-drawer--bottom" id="pnaDrawer" role="dialog" aria-modal="true" aria-labelledby="pnaDrawerTitle">
        <!-- Drag Handle -->
        <div class="snd-drawer__handle-wrap" id="pnaDrawerHandle">
            <span class="snd-drawer__handle" aria-hidden="true"></span>
        </div>

        <!-- Header con título "Seleccionar sección" y un IconButton de cierre -->
        <div class="snd-drawer__header">
            <h2 class="sh0b color--neutro800 mb--0" id="pnaDrawerTitle">Seleccionar sección</h2>
            <button type="button" class="boton__fantasma snd-drawer__close-btn" id="pnaDrawerCloseBtn" aria-label="Cerrar selección de sección">
                <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Body con ListItems seleccionables -->
        <div class="snd-drawer__body" id="pnaDrawerBody">
            <div class="d-flex flex-column gap--8" role="listbox" aria-label="Secciones de Planeación Institucional">
                <?php foreach ( $pi_grupos as $i => $grupo ) :
                    $is_active = ( 0 === $i );
                    ?>
                    <button type="button"
                            class="fin-dictamen-item <?php echo $is_active ? 'active' : ''; ?>"
                            role="option"
                            aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                            data-tab-index="<?php echo esc_attr( $i ); ?>"
                            data-tab-target="#pna-pane-<?php echo esc_attr( $i ); ?>"
                            data-section-title="<?php echo esc_attr( $grupo['titulo'] ); ?>">
                        <span><?php echo esc_html( $grupo['titulo'] ); ?></span>
                        <i class="snd__icono snd-checkmark icono--16 ocn-drawer-check" aria-hidden="true"></i>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    'use strict';

    function initPlaneacion() {
        var tabsRoot    = document.getElementById('pnaTabs');
        var triggerBtn  = document.getElementById('pnaOpenDrawerBtn');
        var labelEl     = document.getElementById('pnaActiveSectionLabel');
        var overlayEl   = document.getElementById('pnaDrawerOverlay');
        var drawerEl    = document.getElementById('pnaDrawer');
        var closeBtn    = document.getElementById('pnaDrawerCloseBtn');
        var drawerItems = document.querySelectorAll('#pnaDrawer .fin-dictamen-item');

        var tabs = tabsRoot ? Array.from(tabsRoot.querySelectorAll('[role="tab"]')) : [];

        // Activa una sección (índice i: 0, 1, 2)
        function activateSection(index) {
            var targetTab = tabs[index];
            var targetPaneId = '#pna-pane-' + index;

            // 1. Sincronizar tabs desktop
            tabs.forEach(function (t, i) {
                t.setAttribute('aria-selected', i === index ? 'true' : 'false');
            });

            // 2. Sincronizar paneles de contenido
            document.querySelectorAll('#pnaTabsContent [role="tabpanel"]').forEach(function (pane) {
                pane.classList.add('muestra--ninguno');
            });
            var targetPane = document.querySelector(targetPaneId);
            if (targetPane) {
                targetPane.classList.remove('muestra--ninguno');
            }

            // 3. Sincronizar ListItems del Drawer y actualizar label del botón/chip
            drawerItems.forEach(function (item) {
                var itemIdx = parseInt(item.getAttribute('data-tab-index'), 10);
                var isAct = (itemIdx === index);
                item.classList.toggle('active', isAct);
                item.setAttribute('aria-selected', isAct ? 'true' : 'false');
                if (isAct && labelEl) {
                    labelEl.textContent = item.getAttribute('data-section-title') || (targetTab ? targetTab.textContent.trim() : '');
                }
            });
        }

        // Clics y navegación por teclado en tabs desktop
        tabs.forEach(function (tab, idx) {
            tab.addEventListener('click', function () {
                activateSection(idx);
            });
            tab.addEventListener('keydown', function (e) {
                var nextIdx = null;
                if (e.key === 'ArrowRight') nextIdx = (idx + 1) % tabs.length;
                else if (e.key === 'ArrowLeft') nextIdx = (idx - 1 + tabs.length) % tabs.length;
                if (nextIdx !== null) {
                    e.preventDefault();
                    tabs[nextIdx].focus();
                    activateSection(nextIdx);
                }
            });
        });

        // Control del Drawer Móvil
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
                if (e.target === overlayEl) {
                    closeDrawer();
                }
            });
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && overlayEl && overlayEl.classList.contains('is-visible')) {
                closeDrawer();
            }
        });

        // Touch Drag en móvil para cerrar Drawer deslizando hacia abajo
        var touchStartY = 0;
        var touchCurrentY = 0;
        var handle = document.getElementById('pnaDrawerHandle');
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

        // Selección en ListItems del Drawer: selecciona sección, actualiza chip y cierra drawer
        drawerItems.forEach(function (item) {
            item.addEventListener('click', function () {
                var idx = parseInt(this.getAttribute('data-tab-index'), 10);
                activateSection(idx);
                closeDrawer();
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initPlaneacion);
    } else {
        initPlaneacion();
    }
})();
</script>
