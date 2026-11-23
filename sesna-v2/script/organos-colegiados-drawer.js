/**
 * Drawer móvil de navegación de secciones de Órganos Colegiados.
 *
 * Extraído de page-organos-colegiados.php (Etapa 3.3 del plan SND v1.0.0). Se carga con defer
 * desde inc/enqueue.php; el código es el mismo que estaba en línea.
 */
(function () {
    'use strict';

    function initOcnDrawer() {
        var drawerOverlay  = document.getElementById('ocnDrawerOverlay');
        var drawerEl       = document.getElementById('ocnDrawer');
        var openDrawerBtn  = document.getElementById('ocnOpenDrawerBtn');
        var closeDrawerBtn = document.getElementById('ocnDrawerCloseBtn');

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
            drawerEl.style.transform = '';
            setTimeout(function () {
                if (!drawerOverlay.classList.contains('is-visible')) {
                    drawerOverlay.classList.add('is-hidden');
                }
            }, 280);
            if (openDrawerBtn) openDrawerBtn.focus();
        }

        // Expuesto para que organos-colegiados.js cierre el Drawer al seleccionar una sección
        window.ocnCloseDrawer = closeDrawer;

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

        // Gesto Swipe Down en móvil para cerrar el Bottom Sheet
        var touchStartY = 0;
        var touchCurrentY = 0;
        var handle = document.getElementById('ocnDrawerHandle');
        var drawerHeader = drawerEl ? drawerEl.querySelector('.snd-drawer__header') : null;
        [handle, drawerHeader].forEach(function (el) {
            if (!el) return;
            el.addEventListener('touchstart', function (e) {
                touchStartY = e.touches[0].clientY;
            }, { passive: true });
            el.addEventListener('touchmove', function (e) {
                touchCurrentY = e.touches[0].clientY;
                var diff = touchCurrentY - touchStartY;
                if (diff > 0 && drawerEl) {
                    drawerEl.style.transform = 'translateY(' + diff + 'px)';
                }
            }, { passive: true });
            el.addEventListener('touchend', function () {
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
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initOcnDrawer);
    } else {
        initOcnDrawer();
    }
})();
