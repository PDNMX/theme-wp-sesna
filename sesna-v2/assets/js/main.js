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

        /* Hero de portada: el <body> YA aporta bodyPaddingTop (~80px, CSS v3) como
           padding real en su caja — el div .front-page-bg empieza ahí, no en y=0.
           Si aquí usáramos totalStack completo se sumaría ese padding dos veces
           (el "hueco grande" bajo el subnav en el home). Solo hace falta el
           mismo delta que ya usamos para --sesna-offset. */
        var heroWrapper = document.querySelector('.front-page-bg.has-fullbleed-hero');
        if (heroWrapper) {
            heroWrapper.style.paddingTop = delta + 'px';
        }
    }

    /* snd-js.js (CDN) solo agrega/quita [open] a details.mexico__details
       en sus propios listeners de 'load' y 'resize' — nada en
       DOMContentLoaded, ni observador continuo. Si el orden de ejecución
       entre scripts de terceros varía (gobmx.js, snd-js.js, el nuestro),
       el evento 'load' puede completarse sin que snd-js.js alcance a
       correr esa función, dejando el subnav sin [open] indefinidamente
       hasta el siguiente resize — eso es "desaparecen las opciones del
       menú". Nuestro <details class="mexico__details"> es markup propio
       y estático (header.php/footer.php), no depende de ningún script
       externo para existir, así que lo sincronizamos nosotros mismos de
       forma síncrona e inmediata en vez de esperar a snd-js.js. */
    function sincronizarDetailsAbiertos() {
        document.querySelectorAll('details.mexico__details').forEach(function(d) {
            if (window.innerWidth < 768) {
                d.removeAttribute('open');
            } else {
                d.setAttribute('open', '');
            }
        });
    }
    sincronizarDetailsAbiertos();
    document.addEventListener('DOMContentLoaded', sincronizarDetailsAbiertos);
    window.addEventListener('resize', sincronizarDetailsAbiertos);

    /* Oculta el loader SOLO cuando el header real de GOB.mx ya está listo
       (ver init() más abajo). gobmx.js lo inyecta de forma asíncrona —
       window.load puede disparar antes de que termine, dejando ver un
       instante el subnav mal posicionado o el header vacío ("el menú
       desaparece" al navegar). */
    function ocultarLoader() {
        var loader = document.getElementById('sesna-page-loader');
        if (loader && !loader.classList.contains('loader-hidden')) {
            loader.classList.add('loader-hidden');
            setTimeout(function() {
                loader.style.display = 'none';
            }, 600);
        }
    }

    /* Listo para mostrarse cuando:
       1) el header GOB.mx (gobmx.js) ya tiene altura real, Y
       2) en escritorio (>768px), snd-js.js ya agregó [open] a
          .mexico__details — sin eso el <ul> del subnav existe en el DOM
          pero no se ve ninguna opción (justo "desaparecen las opciones
          del menú"). En móvil snd-js.js QUITA [open] a propósito, así
          que ahí no se espera por ese atributo. */
    function headerYSubnavListos() {
        var gobmxHeader = document.querySelector('.navbar-fixed-top');
        if (!gobmxHeader || gobmxHeader.offsetHeight === 0) return false;
        if (window.innerWidth > 768) {
            var details = document.querySelector('.mexico__details');
            if (!details || !details.hasAttribute('open')) return false;
        }
        return gobmxHeader;
    }

    function init() {
        var _poll = null;

        function listo(gobmxHeader) {
            if (_poll) { cancelAnimationFrame(_poll); _poll = null; }
            adjustNavbar();
            ocultarLoader();
            if (window.ResizeObserver && !_resizeObserver) {
                _resizeObserver = new ResizeObserver(adjustNavbar);
                _resizeObserver.observe(gobmxHeader);
            }
        }

        (function esperar() {
            var loader = document.getElementById('sesna-page-loader');
            /* Si el fallback de 7s ya forzó mostrar la página, dejar de sondear */
            if (loader && loader.classList.contains('loader-hidden')) {
                return;
            }
            var h = headerYSubnavListos();
            if (h) {
                listo(h);
                return;
            }
            _poll = requestAnimationFrame(esperar);
        })();
    }

    /* Seguridad (SND Fase 3): gobmx.js inyecta en runtime el header/footer .mexico
       con enlaces target="_blank" sin rel="noopener" (fuera de nuestro control estático).
       Reforzamos aquí para cerrar el reverse-tabnabbing en TODO el documento,
       incluido lo inyectado por el script externo. */
    function reforzarNoopener(root) {
        (root || document).querySelectorAll('a[target="_blank"]').forEach(function(a) {
            var rel = (a.getAttribute('rel') || '').split(/\s+/).filter(Boolean);
            if (rel.indexOf('noopener') === -1) {
                rel.push('noopener');
                a.setAttribute('rel', rel.join(' '));
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() { reforzarNoopener(); });
    window.addEventListener('load', function() { reforzarNoopener(); });
    (function observarInyeccionGobmx() {
        var mo = new MutationObserver(function() { reforzarNoopener(); });
        mo.observe(document.body, { childList: true, subtree: true });
        /* Se detiene tras 10s — el header/footer de gobmx.js ya está inyectado a esas alturas
           y no tiene sentido seguir observando el DOM completo indefinidamente. */
        setTimeout(function() { mo.disconnect(); }, 10000);
    })();

    /* Hamburguesa SND: details/summary — cerrar al hacer clic fuera.
       SOLO en móvil (<768px): en escritorio snd-js.js (y sincronizarDetailsAbiertos
       arriba) mantienen #sesna-nav-details SIEMPRE abierto por diseño del SND
       (el <ul> del menú se muestra inline, no es un colapsable); cerrarlo ahí
       con un clic en cualquier parte de la página es exactamente el bug de
       "desaparecen las opciones del menú". */
    document.addEventListener('DOMContentLoaded', function() {
        var navDetails = document.getElementById('sesna-nav-details');
        if (navDetails) {
            document.addEventListener('click', function(e) {
                if (window.innerWidth >= 768) return;
                if (!navDetails.contains(e.target)) {
                    navDetails.removeAttribute('open');
                }
            });
        }

        /* Submenús de desktop: cerrar al hacer clic fuera */
        document.addEventListener('click', function(e) {
            var subDetails = document.querySelectorAll('.sesna-subheader .navHeader__details[open]');
            subDetails.forEach(function(d) {
                if (!d.contains(e.target)) {
                    d.removeAttribute('open');
                }
            });
        });
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

    /* Fallback de posicionamiento en window.load. NO oculta el loader aquí:
       window.load puede disparar antes de que gobmx.js termine de inyectar
       el header (es asíncrono), y ocultarlo en ese momento mostraría el
       subnav mal posicionado un instante. El loader se oculta solo cuando
       init() confirma que el header real ya existe (arriba), o por el
       fallback de 7s de abajo si algo falla por completo. */
    window.addEventListener('load', function() {
        adjustNavbar();
    });

    /* Fallback de seguridad: 7 segundos máximo por si gobmx.js nunca termina
       de cargar (red lenta, CDN caído, etc.) — mejor mostrar la página
       como esté a dejar al usuario viendo el loader indefinidamente. */
    setTimeout(ocultarLoader, 7000);

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
