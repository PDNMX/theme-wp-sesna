/* SESNA v2 — JS global */

(function () {

    function adjustNavbar() {
        var gobmxHeader = document.querySelector('.navbar-fixed-top');
        var siteHeader  = document.querySelector('.site-header');
        if (!siteHeader) return;

        /* Posiciona el sub-navbar justo debajo del header GOB.mx usando
           getBoundingClientRect().bottom — posición visual real en el viewport */
        var gobmxBottom = gobmxHeader ? gobmxHeader.getBoundingClientRect().bottom : 70;
        siteHeader.style.top = gobmxBottom + 'px';
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
