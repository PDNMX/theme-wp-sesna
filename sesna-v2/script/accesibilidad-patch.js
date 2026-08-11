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

    // ── Parche: Alto contraste completo ──────────────────────────────────
    // El CDN solo aplica filter:invert(1) a .btn e img — texto, fondos y
    // secciones no cambian. Efecto casi imperceptible, no cumple WCAG.
    //
    // Solución: mismo patrón que escala de grises. MutationObserver sobre
    // li.contraste → clase sesna-high-contrast en <html> → filter global.

    function applyHighContrast(active) {
        if (active) {
            document.documentElement.classList.add('sesna-high-contrast');
        } else {
            document.documentElement.classList.remove('sesna-high-contrast');
        }
    }

    var contrastObserverStarted = false;

    function startContrastObserver() {
        if (contrastObserverStarted) return;

        var contrasteLi = document.querySelector('li.contraste');
        if (!contrasteLi) return;

        contrastObserverStarted = true;

        // Fix CDN: el handler del CDN está en el ícono (.InvertContrast),
        // no en el <li>. Clicar el texto no hace nada. Delegamos al ícono.
        contrasteLi.addEventListener('click', function (e) {
            if (!e.target.classList.contains('InvertContrast') &&
                !e.target.closest('i.InvertContrast')) {
                var icon = contrasteLi.querySelector('i.InvertContrast');
                if (icon) icon.click();
            }
        });

        applyHighContrast(contrasteLi.classList.contains('icon-box-active'));

        var contrastObserver = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                if (mutation.attributeName === 'class') {
                    applyHighContrast(mutation.target.classList.contains('icon-box-active'));
                }
            });
        });

        contrastObserver.observe(contrasteLi, {
            attributes: true,
            attributeFilter: ['class']
        });
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

    // ── Parche: Dislexia — fuente accesible global ───────────────────────
    // CDN agrega dislexia_active a elementos individuales. Depende del CSS
    // cross-origin del CDN. Mejora: clase en <html> con Atkinson Hyperlegible
    // (ya cargada en el tema) que aplica en cascada a todo el contenido.

    function applyDislexia(active) {
        if (active) {
            document.documentElement.classList.add('sesna-dislexia');
        } else {
            document.documentElement.classList.remove('sesna-dislexia');
        }
    }

    var dislexiaObserverStarted = false;

    function startDislexiaObserver() {
        if (dislexiaObserverStarted) return;
        var li = document.querySelector('li.dislexia');
        if (!li) return;
        dislexiaObserverStarted = true;
        applyDislexia(li.classList.contains('icon-box-active'));
        new MutationObserver(function (mutations) {
            mutations.forEach(function (m) {
                if (m.attributeName === 'class') {
                    applyDislexia(m.target.classList.contains('icon-box-active'));
                }
            });
        }).observe(li, { attributes: true, attributeFilter: ['class'] });
    }

    // ── Parche: Espaciado vertical — CSS con !important ───────────────────
    // CDN aplica line-height via inline style. Reglas !important en el tema
    // bloquean el inline style. Usamos clases en <html> con !important.
    // Observamos las stepping dots (.s1/.s2/.s3) para detectar el nivel.

    function applySpacingV() {
        var html = document.documentElement;
        html.classList.remove('sesna-spacing-v-1', 'sesna-spacing-v-2', 'sesna-spacing-v-3');
        var s3 = document.querySelector('.s3.stepping_active');
        var s2 = document.querySelector('.s2.stepping_active');
        var s1 = document.querySelector('.s1.stepping_active');
        if (s3)      html.classList.add('sesna-spacing-v-3');
        else if (s2) html.classList.add('sesna-spacing-v-2');
        else if (s1) html.classList.add('sesna-spacing-v-1');
    }

    var spacingVObserverStarted = false;

    function startSpacingVObserver() {
        if (spacingVObserverStarted) return;
        var li = document.querySelector('li.spacing_v');
        if (!li) return;
        spacingVObserverStarted = true;
        // Observa cambios en las stepping dots dentro del li
        new MutationObserver(applySpacingV)
            .observe(li, { attributes: true, subtree: true, attributeFilter: ['class'] });
    }

    // ── Parche: Espaciado horizontal — CSS con !important ─────────────────
    // Mismo problema que espaciado vertical. Usa .sh1/.sh2/.sh3 como señal.

    function applySpacingH() {
        var html = document.documentElement;
        html.classList.remove('sesna-spacing-h-1', 'sesna-spacing-h-2', 'sesna-spacing-h-3');
        var sh3 = document.querySelector('.sh3.stepping_active');
        var sh2 = document.querySelector('.sh2.stepping_active');
        var sh1 = document.querySelector('.sh1.stepping_active');
        if (sh3)      html.classList.add('sesna-spacing-h-3');
        else if (sh2) html.classList.add('sesna-spacing-h-2');
        else if (sh1) html.classList.add('sesna-spacing-h-1');
    }

    var spacingHObserverStarted = false;

    function startSpacingHObserver() {
        if (spacingHObserverStarted) return;
        var li = document.querySelector('li.spacing_h');
        if (!li) return;
        spacingHObserverStarted = true;
        new MutationObserver(applySpacingH)
            .observe(li, { attributes: true, subtree: true, attributeFilter: ['class'] });
    }

    // ── Parche: Resaltar enlaces — fix bug CDN ────────────────────────────
    // BUG: CDN usa $("body").find("href") — selector inválido en jQuery.
    // <href> no es un elemento HTML, por lo que la búsqueda regresa vacío
    // y el botón no hace absolutamente nada.
    //
    // Solución: interceptamos el click en li.resaltar y aplicamos/removemos
    // la clase sesna-highlight en <html>. CSS marca todos los <a> del sitio.

    function applyHighlight(active) {
        if (active) {
            document.documentElement.classList.add('sesna-highlight');
        } else {
            document.documentElement.classList.remove('sesna-highlight');
        }
    }

    var highlightObserverStarted = false;

    function startHighlightObserver() {
        if (highlightObserverStarted) return;
        var li = document.querySelector('li.resaltar');
        if (!li) return;
        highlightObserverStarted = true;
        applyHighlight(li.classList.contains('icon-box-active'));
        new MutationObserver(function (mutations) {
            mutations.forEach(function (m) {
                if (m.attributeName === 'class') {
                    applyHighlight(m.target.classList.contains('icon-box-active'));
                }
            });
        }).observe(li, { attributes: true, attributeFilter: ['class'] });
    }

    var accessibilityProtectorStarted = false;

    function startAllObservers() {
        startGrayscaleObserver();
        startContrastObserver();
        startDislexiaObserver();
        startSpacingVObserver();
        startSpacingHObserver();
        startHighlightObserver();
        if (!accessibilityProtectorStarted) {
            _startAccessibilityProtector();
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', startAllObservers);
    } else {
        startAllObservers();
    }

    // Reintentos por si el CDN inyecta el widget de forma tardía
    var attempts = 0;
    var retry = setInterval(function () {
        attempts++;
        startAllObservers();
        var allDone = observerStarted && contrastObserverStarted &&
                      dislexiaObserverStarted && spacingVObserverStarted &&
                      spacingHObserverStarted && highlightObserverStarted &&
                      accessibilityProtectorStarted;
        if (allDone || attempts >= 20) { clearInterval(retry); }
    }, 300);

    // ── Parche: Tamaño de fuente — preserva el widget de accesibilidad ───
    // El CDN aplica font-size via inline styles a todos los li, a, btn, etc.
    // Esto incluye los propios botones del widget (#accessibility li/a/span),
    // que crecen junto al contenido y se salen del panel.
    //
    // Solución: después de cada click en inc-font/dec-font, eliminamos los
    // inline styles de font-size y margin-bottom dentro del widget.

    // MutationObserver sobre #accessibility: cada vez que el CDN aplique un
    // inline style de font-size / line-height / letter-spacing a un elemento
    // del widget, lo removemos inmediatamente — sin depender de timers.
    function _startAccessibilityProtector() {
        var acc = document.getElementById('accessibility');
        if (!acc) return;
        accessibilityProtectorStarted = true;

        new MutationObserver(function (mutations) {
            mutations.forEach(function (m) {
                if (m.type === 'attributes' && m.attributeName === 'style') {
                    var el = m.target;
                    el.style.removeProperty('font-size');
                    el.style.removeProperty('margin-bottom');
                    el.style.removeProperty('line-height');
                    el.style.removeProperty('letter-spacing');
                }
            });
        }).observe(acc, {
            attributes: true,
            attributeFilter: ['style'],
            subtree: true
        });
    }

    // ── Parche: Restablecer completo ──────────────────────────────────────
    // El CDN resetea: grayscale, contraste, audio, cursor, máscara, guía.
    // NO resetea: dislexia, espaciado V/H, resaltar enlaces, tamaño fuente.
    // Nuestros observadores no reciben señal para esos porque el CDN no
    // toca sus li ni sus localStorage keys.

    function _sesnaFullReset() {
        var html = document.documentElement;

        // 1. Clases propias del parche en <html>
        html.classList.remove(
            'sesna-grayscale', 'sesna-high-contrast', 'sesna-dislexia',
            'sesna-spacing-v-1', 'sesna-spacing-v-2', 'sesna-spacing-v-3',
            'sesna-spacing-h-1', 'sesna-spacing-h-2', 'sesna-spacing-h-3',
            'sesna-highlight'
        );

        // 2. Clases que el CDN agrega al contenido pero NO limpia en su reset
        //    imgBW               → escala de grises CDN (filter:grayscale via CSS class)
        //    dislexia_active     → tipografía dislexia CDN (font-family via CSS class)
        //    highlight-accessibility → resaltar enlaces CDN (background-color via CSS class)
        document.querySelectorAll('.imgBW').forEach(function (el) {
            el.classList.remove('imgBW');
        });
        document.querySelectorAll('.dislexia_active').forEach(function (el) {
            el.classList.remove('dislexia_active');
        });
        document.querySelectorAll('.highlight-accessibility').forEach(function (el) {
            el.classList.remove('highlight-accessibility');
        });

        // 3. localStorage — limpia TODOS los flags del CDN
        //    activeGrayScale/Contrast/Cursor/Audio/Mask/LineRead → keys estándar
        //    lsDislexia / lsResaltar / highlight → keys adicionales del CDN
        ['activeGrayScale', 'activeContrast', 'activeCursor', 'activeAudio',
         'activeMask', 'activeLineRead', 'lsDislexia', 'lsResaltar', 'highlight'].forEach(function (k) {
            localStorage.setItem(k, 'false');
        });

        // 4. icon-box-active en ítems que el CDN no resetea (o resetea mal)
        ['li.dislexia', 'li.spacing_v', 'li.spacing_h', 'li.resaltar',
         'li.mask', 'li.guia'].forEach(function (sel) {
            var el = document.querySelector(sel);
            if (el) el.classList.remove('icon-box-active');
        });

        // Clases de estado propias del CDN en máscara y guía
        var liMask = document.querySelector('li.mask');
        if (liMask) liMask.classList.remove('activeMask');
        var liGuia = document.querySelector('li.guia');
        if (liGuia) liGuia.classList.remove('activeLineRead');

        // Oculta el contenedor de la máscara de lectura directamente.
        // El CDN llama activateMask() DESPUÉS de quitar icon-box-active, lo que
        // confunde al toggle (ve "inactivo" y lo reactiva). Lo forzamos oculto.
        var maskContainer = document.getElementById('maskAccesibility');
        if (maskContainer) {
            maskContainer.style.display = 'none';
            // Resetea las bandas al estado inicial (altura 0)
            Array.from(maskContainer.querySelectorAll('.maskRead')).forEach(function (band) {
                band.style.height = '0px';
            });
        }

        // Oculta el elemento separador de la guía de lectura si existe
        var separator = document.getElementById('separator');
        if (separator) separator.style.display = 'none';

        // 5. Stepping dots de espaciado
        document.querySelectorAll('.stepping').forEach(function (el) {
            el.classList.remove('stepping_active');
        });

        // 6. Inline styles acumulados por inc-font, espaciado y contraste CDN
        document.querySelectorAll('body *').forEach(function (el) {
            el.style.removeProperty('font-size');
            el.style.removeProperty('margin-bottom');
            el.style.removeProperty('line-height');
            el.style.removeProperty('letter-spacing');
            el.style.removeProperty('filter');
        });

        // 7. Cursor ring y clase cursor-big del body
        document.body.classList.remove('cursor-big');
        _deactivateCursorRing();

        // 8. Detiene lectura de pantalla en curso
        if (window.speechSynthesis) { window.speechSynthesis.cancel(); }
    }

    // Intercepta click en Restablecer — setTimeout para correr DESPUÉS del CDN
    document.addEventListener('click', function (e) {
        if (e.target.closest('.icon-box-simple-reset, li.reset')) {
            setTimeout(_sesnaFullReset, 200);
        }
    });

    // ── Parche: Cursor grande — anillo visual ─────────────────────────────
    // El CDN reemplaza el cursor del sistema con un SVG blanco que es
    // invisible sobre fondos claros y tiene soporte irregular en navegadores.
    //
    // Solución: anillo visual que sigue al mouse. Funciona en todos los
    // navegadores, visible en cualquier fondo, y no depende del cursor SVG.

    var _ring = null;
    var _ringMoveHandler = null;

    function _createRing() {
        var el = document.createElement('div');
        el.id = 'sesna-cursor-ring';
        document.body.appendChild(el);
        return el;
    }

    function _activateCursorRing() {
        if (!_ring) _ring = _createRing();
        _ring.classList.add('sesna-cursor-ring--active');
        _ringMoveHandler = function (e) {
            _ring.style.left = e.clientX + 'px';
            _ring.style.top  = e.clientY + 'px';
        };
        document.addEventListener('mousemove', _ringMoveHandler);
    }

    function _deactivateCursorRing() {
        if (_ring) _ring.classList.remove('sesna-cursor-ring--active');
        if (_ringMoveHandler) {
            document.removeEventListener('mousemove', _ringMoveHandler);
            _ringMoveHandler = null;
        }
    }

    // Observa la clase cursor-big en body (la agrega el CDN al activar)
    var _cursorObserver = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            if (mutation.attributeName === 'class') {
                var hasCursorBig = document.body.classList.contains('cursor-big');
                if (hasCursorBig) {
                    _activateCursorRing();
                } else {
                    _deactivateCursorRing();
                }
            }
        });
    });

    // Inicia observador en cuanto el body esté disponible
    function _startCursorObserver() {
        if (document.body) {
            _cursorObserver.observe(document.body, {
                attributes: true,
                attributeFilter: ['class']
            });
            // Sincroniza estado inicial por si se restauró desde sesión anterior
            if (document.body.classList.contains('cursor-big')) {
                _activateCursorRing();
            }
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', _startCursorObserver);
    } else {
        _startCursorObserver();
    }
})();
