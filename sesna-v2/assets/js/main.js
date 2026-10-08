/* SESNA v2 — JS global */

(function () {

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

    /* El header/subheader ya son markup estático de header.php (position:fixed
       vía CSS, --bodyTop oficial de snd-guinda.css) — no hay nada async que
       esperar para mostrar la página. Se oculta el loader apenas el DOM está listo. */
    function ocultarLoader() {
        var loader = document.getElementById('sesna-page-loader');
        if (loader && !loader.classList.contains('loader-hidden')) {
            loader.classList.add('loader-hidden');
            setTimeout(function() {
                loader.style.display = 'none';
            }, 600);
        }
    }
    document.addEventListener('DOMContentLoaded', ocultarLoader);
    /* Red de seguridad por si algo bloquea DOMContentLoaded (fuentes, CSS lento) */
    window.addEventListener('load', ocultarLoader);

    /* Seguridad: el widget de accesibilidad (gobmx-accesibilidad-js) y el
       navbar legado oculto (.navbar-fixed-top, ver main.css) pueden inyectar
       enlaces target="_blank" sin rel="noopener". Reforzamos en todo el
       documento para cerrar el reverse-tabnabbing, incluido lo inyectado por
       scripts externos. */
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
