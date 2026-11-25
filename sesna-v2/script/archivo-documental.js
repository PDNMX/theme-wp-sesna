/**
 * Archivo Documental: navegación por sidebar en escritorio, drawer móvil y buscador insensible a acentos/mayúsculas.
 *
 * Extraído de template-parts/administracion-finanzas/archivo-documental-contenido.php.
 * Se encola con defer desde inc/enqueue.php.
 */
(function () {
    'use strict';

    /**
     * Normaliza un texto para búsqueda insensible a mayúsculas/minúsculas y acentos/diacríticos.
     */
    function normalizeSearchText(str) {
        if (!str) return '';
        var text = String(str).toLowerCase();
        if (typeof text.normalize === 'function') {
            text = text.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        } else {
            text = text
                .replace(/[áàäâã]/g, 'a')
                .replace(/[éèëê]/g, 'e')
                .replace(/[íìïî]/g, 'i')
                .replace(/[óòöôõ]/g, 'o')
                .replace(/[úùüû]/g, 'u');
        }
        return text.trim();
    }

    function initArchivoDocumental() {
        var adRoot = document.querySelector('.page-pna-archivo');
        if (!adRoot) return;

        // Pre-normalizar el texto de cada fila (escritorio y móvil)
        adRoot.querySelectorAll('.cf-doc-row').forEach(function (row) {
            row._normalizedSearch = normalizeSearchText(row.getAttribute('data-cf-search') || row.textContent || '');
        });

        function filterPanelRows(panelEl, rawQuery) {
            if (!panelEl) return;
            var query = normalizeSearchText(rawQuery);
            var rows = panelEl.querySelectorAll('.cf-doc-row');
            var visibleCount = 0;

            rows.forEach(function (r) {
                var targetText = r._normalizedSearch || normalizeSearchText(r.getAttribute('data-cf-search') || '');
                var match = !query || targetText.indexOf(query) !== -1;
                r.classList.toggle('muestra--ninguno', !match);
                if (match) visibleCount++;
            });

            var isNoResults = Boolean(query) && visibleCount === 0;
            var emptyNotice = panelEl.querySelector('.ad-doc-empty');
            if (emptyNotice) {
                emptyNotice.classList.toggle('muestra--ninguno', !isNoResults);
            }
            var defaultNote = panelEl.querySelector('.ad-doc-nota');
            if (defaultNote) {
                defaultNote.classList.toggle('muestra--ninguno', isNoResults);
            }
        }

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
                    filterPanelRows(panel, desktopSearch ? desktopSearch.value : '');
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
            var desktopSearchBox = desktopSearch.closest('.tx-comite-search-box');
            desktopSearch.addEventListener('input', function () {
                if (desktopSearchBox) {
                    desktopSearchBox.classList.toggle('is-filled', normalizeSearchText(this.value).length > 0);
                }
                var activePanel = document.querySelector('#adDocPanelsDesktop .ad-doc-panel:not(.muestra--ninguno)');
                filterPanelRows(activePanel, this.value);
            });
        }

        // ── Lógica Móvil: Selector Chip + Drawer Bottom Sheet + Buscador ──
        var triggerBtn   = document.getElementById('adOpenDrawerBtn');
        var labelEl      = document.getElementById('adActiveSectionLabel');
        var overlayEl    = document.getElementById('adDrawerOverlay');
        var drawerEl     = document.getElementById('adDrawer');
        var closeBtn     = document.getElementById('adDrawerCloseBtn');
        var drawerItems  = document.querySelectorAll('#adDrawer .fin-dictamen-item');
        var mobilePanes  = document.querySelectorAll('#adMobilePanels .ad-mobile-pane');
        var mobileSearch = document.getElementById('adSearchInputMobile');

        function activateMobileSection(index) {
            mobilePanes.forEach(function (pane) {
                var paneIdx = parseInt(pane.getAttribute('data-section-index'), 10);
                var isAct = (paneIdx === index);
                pane.classList.toggle('muestra--ninguno', !isAct);
                if (isAct) {
                    filterPanelRows(pane, mobileSearch ? mobileSearch.value : '');
                }
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

        if (mobileSearch) {
            var mobileSearchBox = mobileSearch.closest('.tx-comite-search-box');
            mobileSearch.addEventListener('input', function () {
                if (mobileSearchBox) {
                    mobileSearchBox.classList.toggle('is-filled', normalizeSearchText(this.value).length > 0);
                }
                var activeMobPane = document.querySelector('#adMobilePanels .ad-mobile-pane:not(.muestra--ninguno)');
                filterPanelRows(activeMobPane, this.value);
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
