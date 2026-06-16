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

    /* Loader / Transición Suave Inicial */
    window.addEventListener('load', function() {
        var loader = document.getElementById('sesna-page-loader');
        if (loader) {
            loader.classList.add('loader-hidden');
            setTimeout(function() {
                if (loader.parentNode) loader.parentNode.removeChild(loader);
            }, 600);
        }
    });

    /* Fallback de seguridad: 7 segundos máximo por si algún script bloquea el load */
    setTimeout(function() {
        var loader = document.getElementById('sesna-page-loader');
        if (loader && !loader.classList.contains('loader-hidden')) {
            loader.classList.add('loader-hidden');
            setTimeout(function() {
                if (loader.parentNode) loader.parentNode.removeChild(loader);
            }, 600);
        }
    }, 7000);

    /* Delegación de eventos: Abrir Trámites, Gobierno y Búsqueda en nueva pestaña */
    document.addEventListener('click', function(e) {
        var link = e.target.closest ? e.target.closest('a') : null;
        if (!link) return;
        
        var href = link.getAttribute('href') || '';
        if (href.indexOf('gob.mx/tramites') !== -1 || 
            href.indexOf('gob.mx/gobierno') !== -1 || 
            href.indexOf('gob.mx/busqueda') !== -1 ||
            link.classList.contains('search-button')) {
            link.setAttribute('target', '_blank');
        }
    }, true);

})();
