/* SESNA v2 — JS global */

(function () {
    var SESNA_GAP = 24; /* px de respiro debajo del sub-navbar SESNA */

    function adjustNavbar() {
        var gobmxHeader = document.querySelector('.navbar-fixed-top');
        var siteHeader  = document.querySelector('.site-header');
        var mainPage    = document.querySelector('main.page');

        if (!siteHeader) return;

        var gobmxHeight  = gobmxHeader ? gobmxHeader.offsetHeight : 70;
        var navbarHeight = siteHeader.offsetHeight;

        /* Baja el sub-navbar SESNA justo debajo del header GOB.mx */
        siteHeader.style.top = gobmxHeight + 'px';

        /* El framework ya pone margin-top al body por su propio header;
           main.page solo compensa el alto del sub-navbar SESNA + gap      */
        if (mainPage) {
            mainPage.style.paddingTop = (navbarHeight + SESNA_GAP) + 'px';
        }

        document.documentElement.style.setProperty('--sesna-nav-height', navbarHeight + 'px');
        document.documentElement.style.setProperty('--sesna-offset', (gobmxHeight + navbarHeight) + 'px');
    }

    function init() {
        var gobmxHeader = document.querySelector('.navbar-fixed-top');

        /* Si el header GOB.mx ya está en el DOM con altura, ajustamos de inmediato */
        if (gobmxHeader && gobmxHeader.offsetHeight > 0) {
            adjustNavbar();
            if (window.ResizeObserver) {
                new ResizeObserver(adjustNavbar).observe(gobmxHeader);
            }
            return;
        }

        /* Si aún no está, esperamos con MutationObserver */
        var observer = new MutationObserver(function () {
            var h = document.querySelector('.navbar-fixed-top');
            if (h && h.offsetHeight > 0) {
                adjustNavbar();
                observer.disconnect();
                if (window.ResizeObserver) {
                    new ResizeObserver(adjustNavbar).observe(h);
                }
            }
        });
        observer.observe(document.body, { childList: true, subtree: true });
    }

    /* Intenta con $gmx (framework); si aún no está listo usa DOMContentLoaded */
    if (typeof $gmx !== 'undefined') {
        $gmx(document).ready(init);
    } else {
        document.addEventListener('DOMContentLoaded', init);
    }

    window.addEventListener('resize', adjustNavbar);
})();
