/**
 * Información Financiera: acordeones del árbol de documentos, drawer móvil y panel de documentos.
 *
 * Extraído de template-parts/administracion-finanzas/informacion-financiera-contenido.php (Etapa 3.3 del plan SND v1.0.0). Se carga con defer
 * desde inc/enqueue.php; el código es el mismo que estaba en línea.
 */
(function () {
    'use strict';

    function initFinanciera() {
        var drawerOverlay = document.getElementById('finDrawerOverlay');
        var drawerEl      = document.getElementById('finDrawer');
        var openDrawerBtn = document.getElementById('finOpenDrawerBtn');
        var closeDrawerBtn= document.getElementById('finDrawerCloseBtn');

        // Expandir / contraer acordeones (años y trimestres tanto en desktop como en drawer móvil)
        document.querySelectorAll('[data-fin-toggle]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var targetId = this.getAttribute('data-fin-toggle') || this.dataset.finToggle;
                var target = document.getElementById(targetId);
                var chevron = this.querySelector('.fin-acc-chevron');
                if (!target) return;
                var isOpen = !target.classList.contains('muestra--ninguno');

                if (isOpen) {
                    target.classList.add('muestra--ninguno');
                    this.setAttribute('aria-expanded', 'false');
                    if (chevron) chevron.classList.remove('is-open');
                } else {
                    // Cerrar acordeones hermanos en el mismo nivel (Figma)
                    var card = this.closest('.fin-acc-card, .fin-acc-subcard');
                    if (card && card.parentElement) {
                        var siblings = card.parentElement.children;
                        for (var i = 0; i < siblings.length; i++) {
                            var sib = siblings[i];
                            if (sib !== card && (sib.classList.contains('fin-acc-card') || sib.classList.contains('fin-acc-subcard'))) {
                                var sibBtn = sib.querySelector('[data-fin-toggle]');
                                if (sibBtn) {
                                    var sibTargetId = sibBtn.getAttribute('data-fin-toggle') || sibBtn.dataset.finToggle;
                                    var sibTarget = document.getElementById(sibTargetId);
                                    var sibChevron = sibBtn.querySelector('.fin-acc-chevron');
                                    if (sibTarget && !sibTarget.classList.contains('muestra--ninguno')) {
                                        sibTarget.classList.add('muestra--ninguno');
                                        sibBtn.setAttribute('aria-expanded', 'false');
                                        if (sibChevron) sibChevron.classList.remove('is-open');
                                    }
                                }
                            }
                        }
                    }

                    target.classList.remove('muestra--ninguno');
                    this.setAttribute('aria-expanded', 'true');
                    if (chevron) chevron.classList.add('is-open');
                }
            });
        });

        // Control del Drawer (Bottom Sheet)
        var drawerOverlay = document.getElementById('finDrawerOverlay');
        var drawerEl      = document.getElementById('finDrawer');
        var openDrawerBtn = document.getElementById('finOpenDrawerBtn');
        var closeDrawerBtn= document.getElementById('finDrawerCloseBtn');

        function openDrawer() {
            if (!drawerOverlay || !drawerEl) return;
            drawerOverlay.classList.remove('is-hidden');
            drawerOverlay.setAttribute('aria-hidden', 'false');
            document.body.classList.add('snd-drawer-open');
            if (openDrawerBtn) openDrawerBtn.setAttribute('aria-expanded', 'true');
            void drawerOverlay.offsetWidth;
            drawerOverlay.classList.add('is-visible');
            if (closeDrawerBtn) closeDrawerBtn.focus();
        }

        function closeDrawer() {
            if (!drawerOverlay || !drawerEl) return;
            drawerOverlay.classList.remove('is-visible');
            drawerOverlay.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('snd-drawer-open');
            if (openDrawerBtn) openDrawerBtn.setAttribute('aria-expanded', 'false');
            if (drawerEl) drawerEl.style.transform = '';
            setTimeout(function() {
                if (!drawerOverlay.classList.contains('is-visible')) {
                    drawerOverlay.classList.add('is-hidden');
                }
            }, 280);
            if (openDrawerBtn) openDrawerBtn.focus();
        }

        if (openDrawerBtn) openDrawerBtn.addEventListener('click', openDrawer);
        if (closeDrawerBtn) closeDrawerBtn.addEventListener('click', closeDrawer);

        if (drawerOverlay) {
            drawerOverlay.addEventListener('click', function (e) {
                if (e.target === drawerOverlay) {
                    closeDrawer();
                }
            });
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && drawerOverlay && drawerOverlay.classList.contains('is-visible')) {
                closeDrawer();
            }
        });

        // Gesto Swipe Down en mobile para cerrar Bottom Sheet
        var touchStartY = 0;
        var touchCurrentY = 0;
        var handle = document.getElementById('finDrawerHandle');
        var drawerHeader = drawerEl ? drawerEl.querySelector('.snd-drawer__header') : null;
        [handle, drawerHeader].forEach(function(el) {
            if (!el) return;
            el.addEventListener('touchstart', function(e) {
                touchStartY = e.touches[0].clientY;
            }, { passive: true });
            el.addEventListener('touchmove', function(e) {
                touchCurrentY = e.touches[0].clientY;
                var diff = touchCurrentY - touchStartY;
                if (diff > 0 && drawerEl) {
                    drawerEl.style.transform = 'translateY(' + diff + 'px)';
                }
            }, { passive: true });
            el.addEventListener('touchend', function() {
                var diff = touchCurrentY - touchStartY;
                if (diff > 75) {
                    closeDrawer();
                } else if (drawerEl) {
                    drawerEl.style.transform = '';
                }
                touchStartY = 0;
                touchCurrentY = 0;
            });
        });

        // Selección de navegación unificada (meses de Estados Financieros y años de Dictámenes)
        document.querySelectorAll('.fin-nav-leaf').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var panelKey   = this.dataset.finPanel;
                var contextStr = this.dataset.finContext || 'Documentos';

                // Marcar activo en sidebar desktop y en drawer móvil
                document.querySelectorAll('.fin-nav-leaf').forEach(function (b) {
                    var match = (b.dataset.finPanel === panelKey);
                    b.classList.toggle('active', match);
                });

                // Mostrar el panel de documentos correspondiente
                document.querySelectorAll('.fin-doc-panel').forEach(function (p) {
                    p.classList.add('muestra--ninguno');
                });
                var targetPanel = document.getElementById('fin-panel-' + panelKey);
                if (targetPanel) {
                    targetPanel.classList.remove('muestra--ninguno');
                    targetPanel.querySelectorAll('.fin-doc-row').forEach(function (row) {
                        row.classList.remove('muestra--ninguno');
                    });
                    var empty = targetPanel.querySelector('.fin-doc-empty');
                    if (empty) empty.classList.add('muestra--ninguno');
                }

                // Actualizar encabezado ligero del área de contenido
                var contextHeader = document.getElementById('finActiveContext');
                if (contextHeader) {
                    contextHeader.textContent = contextStr;
                }

                // Cerrar Drawer si estaba abierto
                if (drawerOverlay && drawerOverlay.classList.contains('is-visible')) {
                    closeDrawer();
                }

                // Limpiar filtro de búsqueda
                var searchInput = document.getElementById('finSearchInput');
                if (searchInput) {
                    searchInput.value = '';
                    var sBox = searchInput.closest('.tx-comite-search-box');
                    if (sBox) sBox.classList.remove('is-filled');
                }
            });
        });

        // Buscador SND 4.1 en el área de contenido: filtra las filas del panel activo
        var searchInput = document.getElementById('finSearchInput');
        if (searchInput) {
            var searchBox = searchInput.closest('.tx-comite-search-box');
            searchInput.addEventListener('input', function () {
                var query = this.value.trim().toLowerCase();
                if (searchBox) {
                    searchBox.classList.toggle('is-filled', query.length > 0);
                }
                var panel = document.querySelector('.fin-doc-panel:not(.muestra--ninguno)');
                if (!panel) return;
                var rows = panel.querySelectorAll('.fin-doc-row');
                var visibles = 0;
                rows.forEach(function (row) {
                    var match = (row.dataset.finSearch || '').indexOf(query) !== -1;
                    row.classList.toggle('muestra--ninguno', !match);
                    if (match) visibles++;
                });
                var empty = panel.querySelector('.fin-doc-empty');
                if (empty) empty.classList.toggle('muestra--ninguno', visibles !== 0);
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFinanciera);
    } else {
        initFinanciera();
    }

})();
