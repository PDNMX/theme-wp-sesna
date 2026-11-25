/**
 * Planeación Institucional: pestañas en escritorio y drawer móvil (Bottom Sheet).
 *
 * Extraído de template-parts/administracion-finanzas/planeacion-institucional-contenido.php.
 * Se encola con defer desde inc/enqueue.php.
 */
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

        if (!tabsRoot && !triggerBtn) return;

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
