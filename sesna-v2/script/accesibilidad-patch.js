(function () {
    // ── Parche: Lector de pantalla — compatibilidad Firefox + mejoras ─────
    // El CDN llama speechSynthesis.speak() directamente sin esperar que las
    // voces carguen. En Firefox, getVoices() regresa [] al inicio y el
    // intento falla silenciosamente. Además acumula utterances en cola.
    //
    // Solución: monkey-patch de speechSynthesis.speak para:
    //   1. Cancelar speech previo antes de hablar (sin acumulación de cola)
    //   2. Asignar idioma español si el utterance no lo tiene
    //   3. Si las voces no están listas (Firefox), esperar voiceschanged
    //      antes de llamar al speak original

    if (window.speechSynthesis) {
        var _voicesReady = false;
        var _pendingUtterances = [];
        var _originalSpeak = window.speechSynthesis.speak.bind(window.speechSynthesis);

        function _getBestSpanishVoice() {
            var voices = window.speechSynthesis.getVoices();
            // Prioridad: es-MX → es-419 → cualquier es-*
            return (
                voices.find(function (v) { return v.lang === 'es-MX'; }) ||
                voices.find(function (v) { return v.lang === 'es-419'; }) ||
                voices.find(function (v) { return v.lang.startsWith('es'); }) ||
                null
            );
        }

        function _doSpeak(utterance) {
            // Cancela cualquier speech en curso para evitar acumulación de cola
            window.speechSynthesis.cancel();

            if (!utterance.lang) {
                utterance.lang = 'es-MX';
            }

            var bestVoice = _getBestSpanishVoice();
            if (bestVoice && !utterance.voice) {
                utterance.voice = bestVoice;
            }

            _originalSpeak(utterance);
        }

        function _flushPending() {
            _voicesReady = true;
            if (_pendingUtterances.length) {
                // Solo habla el último (el más reciente), descarta los previos
                var last = _pendingUtterances[_pendingUtterances.length - 1];
                _pendingUtterances = [];
                _doSpeak(last);
            }
        }

        // Precarga voces inmediatamente (Firefox las carga de forma lazy)
        window.speechSynthesis.getVoices();

        if (window.speechSynthesis.onvoiceschanged !== undefined) {
            window.speechSynthesis.addEventListener('voiceschanged', _flushPending, { once: true });
        }

        // Si las voces ya están disponibles al momento de cargar el script
        if (window.speechSynthesis.getVoices().length > 0) {
            _voicesReady = true;
        }

        // Reemplaza el método speak con la versión mejorada
        window.speechSynthesis.speak = function (utterance) {
            if (_voicesReady) {
                _doSpeak(utterance);
            } else {
                // Firefox aún no cargó las voces — encola y espera
                _pendingUtterances.push(utterance);
            }
        };
    }

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
