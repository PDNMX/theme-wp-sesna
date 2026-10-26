<?php
/**
 * Contenido: Contrataciones y Adquisiciones
 * Homologado al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda).
 * Mismo patrón que template-parts/administracion-finanzas/planeacion-institucional-contenido.php:
 * Grid 2x2 en contenedor exterior blanco (Desktop) + Drawer móvil (.snd-drawer) + acordeón de años (.fin-acc-*).
 *
 * Fuentes (Inventario_DGAyF.json):
 *  - "Contratos de las personas Integrantes del Comité de Participación Ciudadana..."
 *  - "Adquisiciones" > subsecciones, reclasificadas por código de procedimiento
 *    (IA- = invitación a cuando menos tres personas, LA- = licitación pública).
 */

$cf_json_path = get_template_directory() . '/data/inventario-dgayf.json';

$cf_columnas = array(
    'comite' => array(
        'titulo' => 'Contratos de Integrantes del Comité de Participación Ciudadana',
        'icono'  => 'snd-group',
        'nota'   => 'Documentos que contienen los contratos de las personas integrantes del Comité de Participación Ciudadana.',
        'anios'  => array(),
    ),
    'convocatorias' => array(
        'titulo' => 'Convocatorias de Invitación a Cuando Menos Tres Personas',
        'icono'  => 'snd-notification',
        'nota'   => 'Convocatorias para procedimientos de invitación a cuando menos tres personas.',
        'anios'  => array(),
    ),
    'licitaciones' => array(
        'titulo' => 'Licitaciones Públicas',
        'icono'  => 'snd-document',
        'nota'   => 'Información de las licitaciones públicas realizadas por la SESNA.',
        'anios'  => array(),
    ),
    'programa' => array(
        'titulo' => 'Programa Anual de Adquisiciones, Arrendamientos y Servicios',
        'icono'  => 'snd-shopping--cart',
        'nota'   => 'Programa que establece las adquisiciones, arrendamientos y servicios programados para cada ejercicio fiscal.',
        'anios'  => array(),
    ),
);

if ( file_exists( $cf_json_path ) ) {
    $cf_data = json_decode( file_get_contents( $cf_json_path ), true );

    if ( is_array( $cf_data ) ) {
        foreach ( $cf_data as $seccion ) {
            if ( ! isset( $seccion['seccion'] ) ) {
                continue;
            }

            // ── Comité de Participación Ciudadana ──
            if ( 'Contratos de las personas Integrantes del Comité de Participación Ciudadana del Sistema Nacional Anticorrupción' === $seccion['seccion'] ) {
                foreach ( $seccion['subsecciones'] as $sub ) {
                    foreach ( $sub['documentos'] as $doc ) {
                        if ( empty( $doc['url'] ) || empty( $doc['anio'] ) ) {
                            continue;
                        }
                        $anio = strval( $doc['anio'] );
                        $cf_columnas['comite']['anios'][ $anio ][] = array(
                            'label'      => mb_convert_case( $doc['contenidoN1'], MB_CASE_TITLE, 'UTF-8' ),
                            'url'        => sna_rewrite_sesna_domain_in_content( $doc['url'] ),
                            'disponible' => true,
                        );
                    }
                }
            }

            // ── Adquisiciones ──
            if ( 'Adquisiciones' === $seccion['seccion'] ) {
                foreach ( $seccion['subsecciones'] as $sub ) {
                    foreach ( $sub['documentos'] as $doc ) {
                        $url         = isset( $doc['url'] ) ? trim( $doc['url'] ) : '';
                        $es_url_real = ( 0 === strpos( $url, 'http' ) || 0 === strpos( $url, '/' ) );
                        $url_final   = $es_url_real ? sna_rewrite_sesna_domain_in_content( $url ) : '';
                        $anio        = ! empty( $doc['anio'] ) ? strval( $doc['anio'] ) : 'Sin fecha';
                        $texto       = $doc['contenidoN1'];

                        if ( 'Convocatorias de Invitación a Cuando Menos Tres Personas' === $sub['subseccion'] ) {
                            if ( preg_match( '/\bIA-[A-Z0-9-]+/', $texto ) ) {
                                $cf_columnas['convocatorias']['anios'][ $anio ][] = array(
                                    'label'      => $doc['descripcion'] ? $doc['descripcion'] : $texto,
                                    'url'        => $url_final,
                                    'disponible' => $es_url_real,
                                );
                            } elseif ( preg_match( '/\bLA-[A-Z0-9-]+/', $texto, $m ) ) {
                                $cf_columnas['licitaciones']['anios'][ $anio ][] = array(
                                    'label'      => $m[0],
                                    'url'        => $url_final,
                                    'disponible' => $es_url_real,
                                );
                            }
                        } elseif ( 'Licitación Pública Nacional Electrónica' === $sub['subseccion'] ) {
                            preg_match( '/\bLA-[A-Z0-9-]+/', $texto, $m );
                            $cf_columnas['licitaciones']['anios'][ $anio ][] = array(
                                'label'      => $m ? $m[0] : $texto,
                                'url'        => $url_final,
                                'disponible' => $es_url_real,
                            );
                        } elseif ( 'Programa Anual de Adquisiciones, Arrendamientos y Servicios' === $sub['subseccion'] ) {
                            $cf_columnas['programa']['anios'][ $anio ][] = array(
                                'label'      => $doc['descripcion'] ? $doc['descripcion'] : $texto,
                                'url'        => $url_final,
                                'disponible' => $es_url_real,
                            );
                        }
                    }
                }
            }
        }
    }
}

foreach ( $cf_columnas as &$cf_col ) {
    krsort( $cf_col['anios'], SORT_STRING );
}
unset( $cf_col );

$cf_keys = array_keys( $cf_columnas );
?>
<div class="page-pna-contrataciones cf-search-scope">

    <!-- Encabezado de Sección (sin ícono ni fondo — solo tipografía y color SND) -->
    <div class="mb--32">
        <h1 class="h1b patria color--pguinda600 mb--4">Contrataciones y Adquisiciones</h1>
        <p class="sh1r color--neutro600 mb--0">Información relacionada con los procedimientos de contratación y adquisición de bienes y servicios.</p>
    </div>

    <!-- Contenedor exterior (Card o Box) con fondo blanco (SND v1.1.0 — Superficie Base) -->
    <div class="cf-panel-card mb--32">

        <!-- Buscador — 4.1 Barra de búsqueda -->
        <form class="search-container mb--24" role="search" action="javascript:void(0);">
            <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
                <input type="search" id="cfSearchInput" class="cf-search-input sh0r js-input tx-comite-search-input" placeholder="Buscar documento..." aria-label="Buscar documento" autocomplete="off">
            </div>
        </form>

        <!-- ── VISTA DESKTOP: Grid 2×2 con las cuatro secciones simultáneamente (≥ 992px) ── -->
        <div class="cf-desktop-view">
            <div class="reticulaGrid__12 align-items-stretch">
                <?php foreach ( $cf_columnas as $col_key => $col ) : ?>
                <div class="columna__12 columna__6--lg mb--24">
                    <div class="cf-inner-card h-100 d-flex flex-column" data-section-key="<?php echo esc_attr( $col_key ); ?>">

                        <!-- Encabezado homologado de la Card: Ícono + Título de Sección -->
                        <div class="cf-card-header d-flex align-items-center gap--12 mb--16">
                            <div class="cf-card-icon-wrap flex-shrink-0">
                                <i class="snd__icono <?php echo esc_attr( $col['icono'] ); ?> icono--20" aria-hidden="true"></i>
                            </div>
                            <h2 class="sh1b color--neutro800 mb--0 cf-card-title"><?php echo esc_html( $col['titulo'] ); ?></h2>
                        </div>

                        <!-- Cuerpo: Acordeón de años y ListItems de documentos -->
                        <div class="cf-card-body flex-grow-1">
                            <?php
                            $first = true;
                            foreach ( $col['anios'] as $anio => $docs ) :
                                $group_id = 'cf-acc-desk-' . $col_key . '-' . sanitize_title( $anio );
                                $abierto  = $first;
                                $first    = false;
                                ?>
                            <div class="fin-acc-card mb--8">
                                <button type="button" class="fin-acc-header" data-cf-toggle="<?php echo esc_attr( $group_id ); ?>" aria-expanded="<?php echo $abierto ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $group_id ); ?>">
                                    <span class="b1sb color--neutro800 mb--0"><?php echo esc_html( $anio ); ?></span>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron <?php echo $abierto ? 'is-open' : ''; ?>" aria-hidden="true"></i>
                                </button>
                                <div class="fin-acc-collapse <?php echo $abierto ? '' : 'muestra--ninguno'; ?>" id="<?php echo esc_attr( $group_id ); ?>">
                                    <div class="fin-doc-list p--8">
                                        <?php foreach ( $docs as $doc ) :
                                            $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                                            ?>
                                            <div class="fin-doc-row" data-cf-search="<?php echo $search_attr; ?>">
                                                <div class="fin-doc-left">
                                                    <h3 class="b1r color--neutro800 mb--0 fin-doc-label"><?php echo esc_html( $doc['label'] ); ?></h3>
                                                </div>
                                                <div class="fin-doc-action">
                                                    <?php if ( $doc['disponible'] ) : ?>
                                                        <button type="button" class="boton__fantasma fin-doc-btn"
                                                                data-modal-target="#pdfViewerModal"
                                                                data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                                                                data-pdf-title="<?php echo esc_attr( $doc['label'] ); ?>">
                                                            <i class="snd__icono snd-document--pdf icono--24" aria-hidden="true"></i>
                                                            Consultar
                                                            <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                                                        </button>
                                                    <?php else : ?>
                                                        <span class="cf-status-badge">Próximamente</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Nota informativa al pie de cada Card -->
                        <div class="aviso aviso--info mt--auto mt--16" role="region" aria-label="Información">
                            <i class="snd__icono snd-information aviso__icon icono--20 color--azul500" aria-hidden="true"></i>
                            <div class="aviso__cont">
                                <div class="aviso__txt">
                                    <p class="b1r color--azul500 mb--0"><?php echo esc_html( $col['nota'] ); ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ── VISTA MÓVIL: Selector Chip + Paneles alternables con Drawer (< 992px) ── -->
        <div class="cf-mobile-view">
            <div class="pna-mobile-selector mb--20">
                <button type="button" class="boton__secundario ocn-mobile-tab-trigger" id="cfOpenDrawerBtn" aria-haspopup="dialog" aria-expanded="false" aria-controls="cfDrawer">
                    <span id="cfActiveSectionLabel"><?php echo esc_html( $cf_columnas[ $cf_keys[0] ]['titulo'] ); ?></span>
                    <i class="snd__icono snd-chevron--down icono--20" aria-hidden="true"></i>
                </button>
            </div>

            <div class="tx-comite-tab-content" id="cfTabsContent">
                <?php foreach ( $cf_columnas as $col_key => $col ) : ?>
                <div class="tx-comite-tab-pane <?php echo ( 'comite' === $col_key ) ? '' : 'muestra--ninguno'; ?>" id="cf-pane-<?php echo esc_attr( $col_key ); ?>" role="tabpanel" tabindex="0">

                    <?php
                    $first = true;
                    foreach ( $col['anios'] as $anio => $docs ) :
                        $group_id = 'cf-acc-mob-' . $col_key . '-' . sanitize_title( $anio );
                        $abierto  = $first;
                        $first    = false;
                        ?>
                    <div class="fin-acc-card mb--8">
                        <button type="button" class="fin-acc-header" data-cf-toggle="<?php echo esc_attr( $group_id ); ?>" aria-expanded="<?php echo $abierto ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $group_id ); ?>">
                            <span class="b1sb color--neutro800 mb--0"><?php echo esc_html( $anio ); ?></span>
                            <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron <?php echo $abierto ? 'is-open' : ''; ?>" aria-hidden="true"></i>
                        </button>
                        <div class="fin-acc-collapse <?php echo $abierto ? '' : 'muestra--ninguno'; ?>" id="<?php echo esc_attr( $group_id ); ?>">
                            <div class="fin-doc-list p--8">
                                <?php foreach ( $docs as $doc ) :
                                    $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                                    ?>
                                    <div class="fin-doc-row" data-cf-search="<?php echo $search_attr; ?>">
                                        <div class="fin-doc-left">
                                            <h3 class="b1r color--neutro800 mb--0 fin-doc-label"><?php echo esc_html( $doc['label'] ); ?></h3>
                                        </div>
                                        <div class="fin-doc-action">
                                            <?php if ( $doc['disponible'] ) : ?>
                                                <button type="button" class="boton__fantasma fin-doc-btn"
                                                        data-modal-target="#pdfViewerModal"
                                                        data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                                                        data-pdf-title="<?php echo esc_attr( $doc['label'] ); ?>">
                                                    <i class="snd__icono snd-document--pdf icono--24" aria-hidden="true"></i>
                                                    Consultar
                                                    <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                                                </button>
                                            <?php else : ?>
                                                <span class="cf-status-badge">Próximamente</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <div class="aviso aviso--info mt--20" role="region" aria-label="Información">
                        <i class="snd__icono snd-information aviso__icon icono--20 color--azul500" aria-hidden="true"></i>
                        <div class="aviso__cont">
                            <div class="aviso__txt">
                                <p class="b1r color--azul500 mb--0"><?php echo esc_html( $col['nota'] ); ?></p>
                            </div>
                        </div>
                    </div>

                </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <!-- Nota al pie — 4.16 Mensajes informativos (Informativo) -->
    <div class="aviso aviso--info mt--32" role="note">
        <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
        <div class="aviso__cont">
            <div class="aviso__txt">
                <p class="b1r color--azul500 mb--0">La información publicada en esta sección contribuye a la transparencia, la rendición de cuentas y el fortalecimiento de la gestión institucional de la SESNA.</p>
            </div>
        </div>
    </div>

</div>

<!-- ── Drawer Móvil (Bottom Sheet): Selección de Sección SND v1.1.0 ────── -->
<div class="snd-drawer-overlay page-pna-contrataciones is-hidden" id="cfDrawerOverlay" aria-hidden="true">
    <div class="snd-drawer snd-drawer--bottom" id="cfDrawer" role="dialog" aria-modal="true" aria-labelledby="cfDrawerTitle">
        <div class="snd-drawer__handle-wrap" id="cfDrawerHandle">
            <span class="snd-drawer__handle" aria-hidden="true"></span>
        </div>

        <div class="snd-drawer__header">
            <h2 class="sh0b color--neutro800 mb--0" id="cfDrawerTitle">Seleccionar sección</h2>
            <button type="button" class="boton__fantasma snd-drawer__close-btn" id="cfDrawerCloseBtn" aria-label="Cerrar selección de sección">
                <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
            </button>
        </div>

        <div class="snd-drawer__body" id="cfDrawerBody">
            <div class="d-flex flex-column gap--8" role="listbox" aria-label="Secciones de Contrataciones y Adquisiciones">
                <?php foreach ( $cf_columnas as $col_key => $col ) :
                    $is_active = ( 'comite' === $col_key );
                    ?>
                    <button type="button"
                            class="fin-dictamen-item <?php echo $is_active ? 'active' : ''; ?>"
                            role="option"
                            aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                            data-tab-index="<?php echo esc_attr( $col_key ); ?>"
                            data-tab-target="#cf-pane-<?php echo esc_attr( $col_key ); ?>"
                            data-section-title="<?php echo esc_attr( $col['titulo'] ); ?>">
                        <span><?php echo esc_html( $col['titulo'] ); ?></span>
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

    function initContrataciones() {
        var triggerBtn  = document.getElementById('cfOpenDrawerBtn');
        var labelEl     = document.getElementById('cfActiveSectionLabel');
        var overlayEl   = document.getElementById('cfDrawerOverlay');
        var drawerEl    = document.getElementById('cfDrawer');
        var closeBtn    = document.getElementById('cfDrawerCloseBtn');
        var drawerItems = document.querySelectorAll('#cfDrawer .fin-dictamen-item');

        function activateMobileSection(key) {
            document.querySelectorAll('#cfTabsContent [role="tabpanel"]').forEach(function (pane) {
                pane.classList.add('muestra--ninguno');
            });
            var targetPane = document.getElementById('cf-pane-' + key);
            if (targetPane) targetPane.classList.remove('muestra--ninguno');

            drawerItems.forEach(function (item) {
                var isAct = (item.getAttribute('data-tab-index') === key);
                item.classList.toggle('active', isAct);
                item.setAttribute('aria-selected', isAct ? 'true' : 'false');
                if (isAct && labelEl) {
                    labelEl.textContent = item.getAttribute('data-section-title') || '';
                }
            });
        }

        drawerItems.forEach(function (item) {
            item.addEventListener('click', function () {
                activateMobileSection(this.getAttribute('data-tab-index'));
                closeDrawer();
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
            drawerEl.style.transform = '';
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

        // Swipe Down en móvil para cerrar el Bottom Sheet
        var touchStartY = 0;
        var touchCurrentY = 0;
        var handle = document.getElementById('cfDrawerHandle');
        if (handle && drawerEl) {
            handle.addEventListener('touchstart', function (e) {
                touchStartY = e.touches[0].clientY;
            }, { passive: true });
            handle.addEventListener('touchmove', function (e) {
                touchCurrentY = e.touches[0].clientY;
                var diff = touchCurrentY - touchStartY;
                if (diff > 0) drawerEl.style.transform = 'translateY(' + diff + 'px)';
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

        // Acordeón de años — solo uno abierto a la vez por card/panel (scoping estricto a Contrataciones)
        var cfContainer = document.querySelector('.page-pna-contrataciones') || document;
        cfContainer.querySelectorAll('[data-cf-toggle]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var targetId = this.getAttribute('data-cf-toggle') || this.dataset.cfToggle;
                var target   = document.getElementById(targetId);
                var chevron  = this.querySelector('.fin-acc-chevron');
                if (!target) return;
                var isOpen = !target.classList.contains('muestra--ninguno');

                if (isOpen) {
                    target.classList.add('muestra--ninguno');
                    this.setAttribute('aria-expanded', 'false');
                    if (chevron) chevron.classList.remove('is-open');
                } else {
                    var card = this.closest('.fin-acc-card');
                    if (card && card.parentElement) {
                        Array.prototype.forEach.call(card.parentElement.children, function (sib) {
                            if (sib !== card && sib.classList.contains('fin-acc-card')) {
                                var sibBtn = sib.querySelector('[data-cf-toggle]');
                                if (sibBtn) {
                                    var sibTargetId = sibBtn.getAttribute('data-cf-toggle') || sibBtn.dataset.cfToggle;
                                    var sibTarget   = document.getElementById(sibTargetId);
                                    var sibChevron  = sibBtn.querySelector('.fin-acc-chevron');
                                    if (sibTarget && !sibTarget.classList.contains('muestra--ninguno')) {
                                        sibTarget.classList.add('muestra--ninguno');
                                        sibBtn.setAttribute('aria-expanded', 'false');
                                        if (sibChevron) sibChevron.classList.remove('is-open');
                                    }
                                }
                            }
                        });
                    }
                    target.classList.remove('muestra--ninguno');
                    this.setAttribute('aria-expanded', 'true');
                    if (chevron) chevron.classList.add('is-open');
                }
            });
        });

        // Buscador — filtra filas en vista desktop y en vista móvil
        var searchInput = document.getElementById('cfSearchInput');
        if (searchInput) {
            var searchBox = searchInput.closest('.tx-comite-search-box');
            searchInput.addEventListener('input', function () {
                var query = this.value.trim().toLowerCase();
                if (searchBox) searchBox.classList.toggle('is-filled', query.length > 0);

                function filterContainer(container) {
                    if (!container) return;
                    container.querySelectorAll('.fin-acc-card').forEach(function (card) {
                        var rows = card.querySelectorAll('.fin-doc-row');
                        var anyMatch = false;
                        rows.forEach(function (row) {
                            var match = !query || (row.dataset.cfSearch || '').indexOf(query) !== -1;
                            row.classList.toggle('muestra--ninguno', !match);
                            if (match) anyMatch = true;
                        });

                        var collapse = card.querySelector('.fin-acc-collapse');
                        var header   = card.querySelector('[data-cf-toggle]');
                        var chevron  = header ? header.querySelector('.fin-acc-chevron') : null;

                        if (query) {
                            card.style.display = anyMatch ? '' : 'none';
                            if (collapse) collapse.classList.toggle('muestra--ninguno', !anyMatch);
                            if (header) header.setAttribute('aria-expanded', anyMatch ? 'true' : 'false');
                            if (chevron) chevron.classList.toggle('is-open', anyMatch);
                        } else {
                            card.style.display = '';
                        }
                    });
                }

                // Filtrar panel activo móvil
                var activeMobilePane = document.querySelector('#cfTabsContent [role="tabpanel"]:not(.muestra--ninguno)');
                filterContainer(activeMobilePane);

                // Filtrar todas las cards en vista desktop
                var desktopView = document.querySelector('.cf-desktop-view');
                filterContainer(desktopView);
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initContrataciones);
    } else {
        initContrataciones();
    }
})();
</script>
