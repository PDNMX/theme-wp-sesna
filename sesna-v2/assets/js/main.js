/* SESNA v2 — JS global */

(function () {

    function adjustNavbar() {
        var gobmxHeader = document.querySelector('.navbar-fixed-top');
        /* SND: el .mexico header también es el header GOB.mx */
        if (!gobmxHeader) gobmxHeader = document.querySelector('.mexico');
        var siteHeader  = document.querySelector('.sesna-subheader, .site-header');
        if (!siteHeader) return;

        /* Posiciona el sub-navbar justo debajo del header GOB.mx / .mexico */
        var gobmxBottom = gobmxHeader ? gobmxHeader.getBoundingClientRect().bottom : 70;
        siteHeader.style.top = gobmxBottom + 'px';

        /* El v3 CSS ya compensa el header GOB.mx con body{padding-top:80px}.
           --sesna-offset solo necesita compensar la altura del SESNA subheader. */
        var totalOffset = siteHeader.offsetHeight;
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

    /* Mobile nav toggle — hamburger button */
    document.addEventListener('DOMContentLoaded', function() {
        var toggle = document.getElementById('sesna-nav-toggle');
        var nav    = document.getElementById('sesna-nav-main');
        if (!toggle || !nav) return;

        toggle.addEventListener('click', function() {
            var isOpen = nav.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        /* Cerrar al hacer clic fuera del menú */
        document.addEventListener('click', function(e) {
            if (!toggle.contains(e.target) && !nav.contains(e.target)) {
                nav.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });

        /* Hover para submenús en desktop: abrir/cerrar <details> con mouse */
        if (window.innerWidth >= 992) {
            document.querySelectorAll('.navHeader__details').forEach(function(det) {
                det.addEventListener('mouseenter', function() { det.setAttribute('open', ''); });
                det.addEventListener('mouseleave', function() { det.removeAttribute('open'); });
            });
        }
    });

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
