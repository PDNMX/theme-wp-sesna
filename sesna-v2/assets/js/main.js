/* SESNA v2 — JS global */

(function () {

    var _resizeObserver = null;

    function adjustNavbar() {
        var gobmxHeader = document.querySelector('.navbar-fixed-top');
        if (!gobmxHeader) gobmxHeader = document.querySelector('.mexico');
        var siteHeader  = document.querySelector('.sesna-subheader, .site-header');
        if (!siteHeader) return;

        /* Posiciona el sub-navbar justo debajo del header GOB.mx / .mexico.
           getBoundingClientRect().bottom da la posición viewport-relativa del borde inferior. */
        var gobmxBottom = gobmxHeader ? Math.round(gobmxHeader.getBoundingClientRect().bottom) : 94;
        if (gobmxBottom <= 0) gobmxBottom = gobmxHeader ? gobmxHeader.offsetHeight : 94;
        siteHeader.style.top = gobmxBottom + 'px';

        /* --sesna-offset = delta que main.page necesita sobre el body padding-top ya existente.
           body ya tiene padding-top del v3 CSS (~80px). El total del stack es gobmxBottom + sesnaH.
           Delta = total - bodyPaddingTop (para no doblar el offset del GOB.mx nav). */
        var bodyPaddingTop = parseInt(window.getComputedStyle(document.body).paddingTop) || 0;
        var totalStack = gobmxBottom + siteHeader.offsetHeight;
        var delta = Math.max(0, totalStack - bodyPaddingTop);
        document.documentElement.style.setProperty('--sesna-offset', delta + 'px');

        /* Hero de portada: recibe el offset completo del stack (body padding ya es 0 en main.page home) */
        var heroWrapper = document.querySelector('.front-page-bg.has-fullbleed-hero');
        if (heroWrapper) {
            heroWrapper.style.paddingTop = totalStack + 'px';
        }
    }

    function init() {
        var gobmxHeader = document.querySelector('.navbar-fixed-top');

        if (gobmxHeader && gobmxHeader.offsetHeight > 0) {
            adjustNavbar();
            if (window.ResizeObserver && !_resizeObserver) {
                _resizeObserver = new ResizeObserver(adjustNavbar);
                _resizeObserver.observe(gobmxHeader);
            }
            return;
        }

        /* GOB.mx nav aún no aparece — observar el DOM */
        var observer = new MutationObserver(function () {
            var h = document.querySelector('.navbar-fixed-top');
            if (h && h.offsetHeight > 0) {
                observer.disconnect();
                adjustNavbar();
                if (window.ResizeObserver && !_resizeObserver) {
                    _resizeObserver = new ResizeObserver(adjustNavbar);
                    _resizeObserver.observe(h);
                }
            }
        });
        observer.observe(document.body, { childList: true, subtree: true });
    }

    /* Hamburguesa SND: details/summary — cerrar al hacer clic fuera */
    document.addEventListener('DOMContentLoaded', function() {
        var navDetails = document.getElementById('sesna-nav-details');
        if (navDetails) {
            document.addEventListener('click', function(e) {
                if (!navDetails.contains(e.target)) {
                    navDetails.removeAttribute('open');
                }
            });
        }

        /* Hover para submenús de dropdown en desktop (solo dentro del nav, no el hamburguesa) */
        if (window.innerWidth >= 768) {
            document.querySelectorAll('#sesna-nav-main .navHeader__details').forEach(function(det) {
                det.addEventListener('mouseenter', function() { det.setAttribute('open', ''); });
                det.addEventListener('mouseleave', function() { det.removeAttribute('open'); });
            });
        }
    });

    /* Inicialización: intentar vía $gmx (GOB.mx jQuery) o DOMContentLoaded */
    if (typeof $gmx !== 'undefined') {
        $gmx(document).ready(init);
    } else {
        document.addEventListener('DOMContentLoaded', init);
    }
    /* También ejecutar siempre en DOMContentLoaded como fallback independiente */
    document.addEventListener('DOMContentLoaded', init);

    window.addEventListener('resize', adjustNavbar);

    /* Loader / Transición Suave Inicial + fallback de posicionamiento en window.load */
    window.addEventListener('load', function() {
        /* Fallback final: re-ejecutar adjustNavbar cuando todo el layout esté listo */
        adjustNavbar();

        var loader = document.getElementById('sesna-page-loader');
        if (loader) {
            loader.classList.add('loader-hidden');
            setTimeout(function() {
                loader.style.display = 'none';
            }, 600);
        }
    });

    /* Fallback de seguridad: 7 segundos máximo por si algún script bloquea el load */
    setTimeout(function() {
        var loader = document.getElementById('sesna-page-loader');
        if (loader && !loader.classList.contains('loader-hidden')) {
            loader.classList.add('loader-hidden');
            setTimeout(function() {
                loader.style.display = 'none';
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
