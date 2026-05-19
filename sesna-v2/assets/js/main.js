/* SESNA v2 — JS global */

(function () {

    function adjustNavbar() {
        var gobmxHeader = document.querySelector('.navbar-fixed-top');
        var siteHeader  = document.querySelector('.site-header');
        if (!siteHeader) return;

        /* Posiciona el sub-navbar justo debajo del header GOB.mx */
        var gobmxBottom = gobmxHeader ? gobmxHeader.getBoundingClientRect().bottom : 70;
        siteHeader.style.top = gobmxBottom + 'px';

        /* Calcula el borde inferior real del sub-navbar */
        var totalOffset = gobmxBottom + siteHeader.offsetHeight;

        /* Actualiza la variable CSS (para páginas que la usen vía var()) */
        document.documentElement.style.setProperty('--sesna-offset', totalOffset + 'px');

        /* Aplica inline style directamente al wrapper hero (más confiable) */
        var heroWrapper = document.querySelector('.front-page-bg.has-fullbleed-hero');
        if (heroWrapper) {
            heroWrapper.style.paddingTop = totalOffset + 'px';
        }
    }

    function init() {
        var gobmxHeader = document.querySelector('.navbar-fixed-top');

        if (gobmxHeader && gobmxHeader.offsetHeight > 0) {
            adjustNavbar();
            if (window.ResizeObserver) {
                new ResizeObserver(adjustNavbar).observe(gobmxHeader);
            }
            return;
        }

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

    if (typeof $gmx !== 'undefined') {
        $gmx(document).ready(init);
    } else {
        document.addEventListener('DOMContentLoaded', init);
    }

    window.addEventListener('resize', adjustNavbar);

})();
