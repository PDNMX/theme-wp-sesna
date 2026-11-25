/**
 * Contrataciones y Adquisiciones: acordeón de años, drawer móvil y buscador insensible a acentos/mayúsculas.
 *
 * Extraído de template-parts/administracion-finanzas/contrataciones-contenido.php.
 * Se encola con defer desde inc/enqueue.php.
 */
(function () {
    'use strict';

    /**
     * Normaliza un texto para búsqueda insensible a mayúsculas/minúsculas y acentos/diacríticos.
     */
    function normalizeSearchText(str) {
        if (!str) return '';
        var text = String(str).toLowerCase();
        if (typeof text.normalize === 'function') {
            text = text.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        } else {
            text = text
                .replace(/[áàäâã]/g, 'a')
                .replace(/[éèëê]/g, 'e')
                .replace(/[íìïî]/g, 'i')
                .replace(/[óòöôõ]/g, 'o')
                .replace(/[úùüû]/g, 'u');
        }
        return text.trim();
    }

    function initContrataciones() {
        var cfRoot      = document.querySelector('.page-pna-contrataciones');
        if (!cfRoot) return;

        var triggerBtn  = document.getElementById('cfOpenDrawerBtn');
        var labelEl     = document.getElementById('cfActiveSectionLabel');
        var overlayEl   = document.getElementById('cfDrawerOverlay');
        var drawerEl    = document.getElementById('cfDrawer');
        var closeBtn    = document.getElementById('cfDrawerCloseBtn');
        var drawerItems = document.querySelectorAll('#cfDrawer .fin-dictamen-item');

        function activateMobileSection(key) {
            document.querySelectorAll('#cfTabsContent [role="tabpanel"]').forEach(function (pane) {
                pane.classList.add('muestra--ninguno');
            });
            var targetPane = document.getElementById('cf-pane-' + key);
            if (targetPane) targetPane.classList.remove('muestra--ninguno');

            drawerItems.forEach(function (item) {
                var isAct = (item.getAttribute('data-tab-index') === key);
                item.classList.toggle('active', isAct);
                item.setAttribute('aria-selected', isAct ? 'true' : 'false');
                if (isAct && labelEl) {
                    labelEl.textContent = item.getAttribute('data-section-title') || '';
                }
            });

            // Re-aplicar filtro activo en el nuevo panel móvil si hay texto en el buscador
            var searchInput = document.getElementById('cfSearchInput');
            if (searchInput && searchInput.value) {
                searchInput.dispatchEvent(new Event('input'));
            }
        }

        drawerItems.forEach(function (item) {
            item.addEventListener('click', function () {
                activateMobileSection(this.getAttribute('data-tab-index'));
                closeDrawer();
            });
        });

        // Control del Drawer Móvil
        function openDrawer() {
            if (!overlayEl || !drawerEl) return;
            overlayEl.classList.remove('is-hidden');
            overlayEl.setAttribute('aria-hidden', 'false');
            document.body.classList.add('snd-drawer-open');
            if (triggerBtn) triggerBtn.setAttribute('aria-expanded', 'true');
            void overlayEl.offsetWidth;
            overlayEl.classList.add('is-visible');
            if (closeBtn) closeBtn.focus();
        }

        function closeDrawer() {
            if (!overlayEl || !drawerEl) return;
            overlayEl.classList.remove('is-visible');
            overlayEl.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('snd-drawer-open');
            if (triggerBtn) triggerBtn.setAttribute('aria-expanded', 'false');
            drawerEl.style.transform = '';
            setTimeout(function () {
                if (!overlayEl.classList.contains('is-visible')) {
                    overlayEl.classList.add('is-hidden');
                }
            }, 280);
            if (triggerBtn) triggerBtn.focus();
        }

        if (triggerBtn) triggerBtn.addEventListener('click', openDrawer);
        if (closeBtn) closeBtn.addEventListener('click', closeDrawer);

        if (overlayEl) {
            overlayEl.addEventListener('click', function (e) {
                if (e.target === overlayEl) closeDrawer();
            });
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && overlayEl && overlayEl.classList.contains('is-visible')) {
                closeDrawer();
            }
        });

        // Swipe Down en móvil para cerrar el Bottom Sheet
        var touchStartY = 0;
        var touchCurrentY = 0;
        var handle = document.getElementById('cfDrawerHandle');
        if (handle && drawerEl) {
            handle.addEventListener('touchstart', function (e) {
                touchStartY = e.touches[0].clientY;
            }, { passive: true });
            handle.addEventListener('touchmove', function (e) {
                touchCurrentY = e.touches[0].clientY;
                var diff = touchCurrentY - touchStartY;
                if (diff > 0) drawerEl.style.transform = 'translateY(' + diff + 'px)';
            }, { passive: true });
            handle.addEventListener('touchend', function () {
                var diff = touchCurrentY - touchStartY;
                if (diff > 80) {
                    closeDrawer();
                } else {
                    drawerEl.style.transform = '';
                }
                touchStartY = 0;
                touchCurrentY = 0;
            });
        }

        // Acordeón de años — solo uno abierto a la vez por card/panel
        cfRoot.querySelectorAll('[data-cf-toggle]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var targetId = this.getAttribute('data-cf-toggle') || this.dataset.cfToggle;
                var target   = document.getElementById(targetId);
                var chevron  = this.querySelector('.fin-acc-chevron');
                if (!target) return;
                var isOpen = !target.classList.contains('muestra--ninguno');

                if (isOpen) {
                    target.classList.add('muestra--ninguno');
                    this.setAttribute('aria-expanded', 'false');
                    if (chevron) chevron.classList.remove('is-open');
                } else {
                    var card = this.closest('.fin-acc-card');
                    if (card && card.parentElement) {
                        Array.prototype.forEach.call(card.parentElement.children, function (sib) {
                            if (sib !== card && sib.classList.contains('fin-acc-card')) {
                                var sibBtn = sib.querySelector('[data-cf-toggle]');
                                if (sibBtn) {
                                    var sibTargetId = sibBtn.getAttribute('data-cf-toggle') || sibBtn.dataset.cfToggle;
                                    var sibTarget   = document.getElementById(sibTargetId);
                                    var sibChevron  = sibBtn.querySelector('.fin-acc-chevron');
                                    if (sibTarget && !sibTarget.classList.contains('muestra--ninguno')) {
                                        sibTarget.classList.add('muestra--ninguno');
                                        sibBtn.setAttribute('aria-expanded', 'false');
                                        if (sibChevron) sibChevron.classList.remove('is-open');
                                    }
                                }
                            }
                        });
                    }
                    target.classList.remove('muestra--ninguno');
                    this.setAttribute('aria-expanded', 'true');
                    if (chevron) chevron.classList.add('is-open');
                }
            });
        });

        // Pre-normalizar el texto de cada fila para búsqueda insensible a acentos y mayúsculas
        cfRoot.querySelectorAll('.fin-doc-row').forEach(function (row) {
            row._normalizedSearch = normalizeSearchText(row.dataset.cfSearch || row.textContent || '');
        });

        // Buscador — filtra filas en vista desktop y en vista móvil, mostrando estado vacío cuando no hay coincidencias
        var searchInput = document.getElementById('cfSearchInput');
        if (searchInput) {
            var searchBox = searchInput.closest('.tx-comite-search-box');

            function filterSectionScope(scopeEl, query) {
                if (!scopeEl) return;
                var anyCardMatched = false;

                scopeEl.querySelectorAll('.fin-acc-card').forEach(function (card) {
                    var rows = card.querySelectorAll('.fin-doc-row');
                    var anyMatch = false;
                    rows.forEach(function (row) {
                        var targetText = row._normalizedSearch || normalizeSearchText(row.dataset.cfSearch || '');
                        var match = !query || targetText.indexOf(query) !== -1;
                        row.classList.toggle('muestra--ninguno', !match);
                        if (match) anyMatch = true;
                    });

                    var collapse = card.querySelector('.fin-acc-collapse');
                    var header   = card.querySelector('[data-cf-toggle]');
                    var chevron  = header ? header.querySelector('.fin-acc-chevron') : null;

                    if (query) {
                        card.style.display = anyMatch ? '' : 'none';
                        if (collapse) collapse.classList.toggle('muestra--ninguno', !anyMatch);
                        if (header) header.setAttribute('aria-expanded', anyMatch ? 'true' : 'false');
                        if (chevron) chevron.classList.toggle('is-open', anyMatch);
                    } else {
                        card.style.display = '';
                    }

                    if (anyMatch) anyCardMatched = true;
                });

                var isNoResults = Boolean(query) && !anyCardMatched;
                var emptyNotice = scopeEl.querySelector('.cf-doc-empty');
                if (emptyNotice) {
                    emptyNotice.classList.toggle('muestra--ninguno', !isNoResults);
                }
                var defaultNote = scopeEl.querySelector('.cf-doc-nota');
                if (defaultNote) {
                    defaultNote.classList.toggle('muestra--ninguno', isNoResults);
                }
            }

            searchInput.addEventListener('input', function () {
                var query = normalizeSearchText(this.value);
                if (searchBox) searchBox.classList.toggle('is-filled', query.length > 0);

                // Filtrar cada una de las 4 cards en vista desktop
                document.querySelectorAll('.cf-desktop-view .cf-inner-card').forEach(function (innerCard) {
                    filterSectionScope(innerCard, query);
                });

                // Filtrar todos los paneles móviles
                document.querySelectorAll('#cfTabsContent [role="tabpanel"]').forEach(function (pane) {
                    filterSectionScope(pane, query);
                });
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initContrataciones);
    } else {
        initContrataciones();
    }
})();
