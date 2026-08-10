(function () {
    // ── Parche: Escala de grises completa ────────────────────────────────
    // El widget CDN aplica imgBW solo a <img> y .container, dejando
    // backgrounds, gradientes y el header sin afectar.
    //
    // Solución: MutationObserver sobre el <li> de escala de grises.
    // Además sincroniza el estado inicial por si el CDN ya restauró
    // la opción activa desde sesión anterior.

    function applyGrayscale(active) {
        if (active) {
            document.documentElement.classList.add('sesna-grayscale');
        } else {
            document.documentElement.classList.remove('sesna-grayscale');
        }
    }

    var observerStarted = false;

    function startGrayscaleObserver() {
        if (observerStarted) return;

        var escalaLi = document.querySelector('li.escala, li.BlackAndWhite');
        if (!escalaLi) return;

        observerStarted = true;

        // Sincroniza estado actual en caso de que el CDN ya haya
        // restaurado icon-box-active desde sesión anterior
        applyGrayscale(escalaLi.classList.contains('icon-box-active'));

        // Observa cambios futuros de clase en el <li>
        var observer = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                if (mutation.attributeName === 'class') {
                    applyGrayscale(mutation.target.classList.contains('icon-box-active'));
                }
            });
        });

        observer.observe(escalaLi, {
            attributes: true,
            attributeFilter: ['class']
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', startGrayscaleObserver);
    } else {
        startGrayscaleObserver();
    }

    // Reintentos por si el CDN inyecta el widget de forma tardía
    var attempts = 0;
    var retry = setInterval(function () {
        attempts++;
        startGrayscaleObserver();
        if (observerStarted || attempts >= 20) {
            clearInterval(retry);
        }
    }, 300);
})();
