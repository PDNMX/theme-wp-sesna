/**
 * Navegación del dashboard de Administración y Finanzas (cards selectoras, hash de URL y paneles).
 *
 * Extraído de page-administracion-finanzas.php (Etapa 3.3 del plan SND v1.0.0). Se carga con defer
 * desde inc/enqueue.php; el código es el mismo que estaba en línea.
 */
(function () {
    'use strict';

    function initAfDashboard() {
        var triggers = Array.from(document.querySelectorAll('#af-cards-grid .sna-tab-trigger'));
        var sections = Array.from(document.querySelectorAll('#af-content-wrapper .af-dinamic-section'));
        var wrapper  = document.getElementById('af-content-wrapper');

        var hashMap = {
            'planeacion': 'sec-planeacion',
            'info-financiera': 'sec-info-financiera',
            'informacion-financiera': 'sec-info-financiera',
            'contrataciones': 'sec-contrataciones',
            'contrataciones-y-adquisiciones': 'sec-contrataciones',
            'gestion-documental': 'sec-gestion-documental',
            'archivo-documental': 'sec-gestion-documental'
        };

        var canonicalHashes = {
            'sec-planeacion': 'planeacion',
            'sec-info-financiera': 'info-financiera',
            'sec-contrataciones': 'contrataciones',
            'sec-gestion-documental': 'gestion-documental'
        };

        function switchSection(targetSecId, shouldScroll, updateHash) {
            var targetSec = document.getElementById(targetSecId);
            if (!targetSec) {
                targetSecId = 'sec-planeacion';
                targetSec = document.getElementById('sec-planeacion');
            }
            if (!targetSec) return;

            // Actualizar visibilidad de paneles
            sections.forEach(function (sec) {
                if (sec.id === targetSecId) {
                    sec.classList.remove('muestra--ninguno');
                } else {
                    sec.classList.add('muestra--ninguno');
                }
            });

            // Actualizar estado activo en las cards selectoras (homologado a page-riesgos-inteligencia.php)
            triggers.forEach(function (t) {
                var isMatch = (t.getAttribute('data-target') === '#' + targetSecId);
                t.classList.toggle('active', isMatch);
                t.setAttribute('aria-selected', isMatch ? 'true' : 'false');
                if (isMatch) {
                    t.style.boxShadow = '0 0 0 2px rgba(155, 34, 66, 1)';
                } else {
                    t.style.boxShadow = '';
                }
            });

            // Actualizar URL hash de forma limpia
            var canonicalHash = canonicalHashes[targetSecId] || 'planeacion';
            if (updateHash !== false) {
                if (window.history && window.history.replaceState) {
                    window.history.replaceState(null, '', '#' + canonicalHash);
                } else {
                    window.location.hash = canonicalHash;
                }
            }

            // Scroll suave hacia el contenedor si fue activado por clic
            if (shouldScroll && wrapper) {
                wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // Eventos de clic en cards
        triggers.forEach(function (trigger) {
            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                var targetId = (this.getAttribute('data-target') || '').replace('#', '');
                switchSection(targetId, true, true);
            });
        });

        // Cargar sección inicial según hash en la URL o default
        function resolveInitialSection() {
            var rawHash = window.location.hash ? window.location.hash.replace('#', '').toLowerCase() : '';
            var targetSecId = hashMap[rawHash] || 'sec-planeacion';
            var shouldScroll = Boolean(rawHash);
            switchSection(targetSecId, shouldScroll, false);
        }

        // Escuchar cambios de hash en el navegador (historial atrás/adelante)
        window.addEventListener('hashchange', function () {
            var rawHash = window.location.hash ? window.location.hash.replace('#', '').toLowerCase() : '';
            var targetSecId = hashMap[rawHash] || 'sec-planeacion';
            switchSection(targetSecId, false, false);
        });

        resolveInitialSection();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAfDashboard);
    } else {
        initAfDashboard();
    }
})();
