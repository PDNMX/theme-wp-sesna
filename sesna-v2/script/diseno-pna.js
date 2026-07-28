document.addEventListener('DOMContentLoaded', function() {
    
    // -------------------------------------------------------------
    // 1. Selector de Ejes (Rueda Donut & Pestañas de Objetivos)
    // -------------------------------------------------------------
    const ejeButtons = document.querySelectorAll('.pna-eje-btn, .pna-wheel-slice, .pna-page-indicator');
    const ejeContents = document.querySelectorAll('.pna-eje-content');

    function selectEje(ejeId) {
        // Desactivar todos
        document.querySelectorAll('.pna-eje-btn').forEach(btn => btn.classList.remove('active', 'border-dark', 'shadow-sm'));
        document.querySelectorAll('.pna-wheel-slice').forEach(slice => slice.classList.remove('active', 'opacity-100'));
        document.querySelectorAll('.pna-page-indicator').forEach(ind => {
            ind.classList.remove('active');
            ind.style.background = '#e9edf2';
            ind.style.color = '#54565a';
        });
        ejeContents.forEach(content => content.classList.add('d-none'));

        // Activar seleccionados
        document.querySelectorAll(`[data-eje="${ejeId}"]`).forEach(el => {
            el.classList.add('active');
            if(el.classList.contains('pna-eje-btn')) {
                el.classList.add('border-dark', 'shadow-sm');
            }
            if(el.classList.contains('pna-page-indicator')) {
                let colors = { '1': '#6AC72C', '2': '#1D70B8', '3': '#74598F', '4': '#E04F67' };
                el.style.background = colors[ejeId] || '#6AC72C';
                el.style.color = '#fff';
            }
        });

        const targetContent = document.getElementById(`content-eje-${ejeId}`);
        if(targetContent) {
            targetContent.classList.remove('d-none');
            targetContent.classList.add('active');
        }
        const objPanel = document.getElementById('objectivesPanel');
        // El borde sólido fue removido para homologación institucional con las demás cards.
    }

    ejeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const ejeId = this.getAttribute('data-eje');
            if(ejeId) selectEje(ejeId);
        });
        btn.addEventListener('keydown', function(e) {
            if(e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const ejeId = this.getAttribute('data-eje');
                if(ejeId) selectEje(ejeId);
            }
        });
    });

    // -------------------------------------------------------------
    // 1.5 Selector de Etapas del Bloque 3 (Interacción 1 sola etapa a la vez)
    // -------------------------------------------------------------
    const stageBtns = document.querySelectorAll('.pna-stage-btn');
    const stageCards = document.querySelectorAll('.pna-stage-card');

    stageBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const stageId = this.getAttribute('data-stage');
            if(!stageId) return;

            // Desactivar todos los botones de etapa
            stageBtns.forEach(b => {
                b.classList.remove('active', 'shadow-sm');
                const bStage = b.getAttribute('data-stage');
                if(bStage === '1') b.style.background = '#f8f9fa';
                if(bStage === '2') b.style.background = '#f8f9fa';
                if(bStage === '3') b.style.background = '#f8f9fa';
                b.style.borderColor = '#E9ECEF';
            });

            // Activar botón seleccionado
            this.classList.add('active', 'shadow-sm');
            if(stageId === '1') {
                this.style.background = 'linear-gradient(135deg, #F7F2FA 0%, #EEE4F5 100%)';
                this.style.borderColor = '#E9ECEF';
            } else if(stageId === '2') {
                this.style.background = 'linear-gradient(135deg, #E0F2F1 0%, #B2DFDB 100%)';
                this.style.borderColor = '#E9ECEF';
            } else if(stageId === '3') {
                this.style.background = 'linear-gradient(135deg, #FFF3E0 0%, #FFE0B2 100%)';
                this.style.borderColor = '#E9ECEF';
            }

            // Ocultar todas las tarjetas y mostrar la seleccionada
            stageCards.forEach(card => {
                card.classList.add('d-none');
                if(card.getAttribute('data-stage-card') === stageId) {
                    card.classList.remove('d-none');
                }
            });
        });
        
        btn.addEventListener('keydown', function(e) {
            if(e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });

    // -------------------------------------------------------------
    // 2. Mapa Interactivo de México (Hover/Clic & Sincronización)
    // -------------------------------------------------------------
    const forumsData = {
        '1': { city: 'Guadalajara, Jalisco', date: '23 Oct 2018', forum: 'Foro Regional 1', url: '#' },
        '2': { city: 'Zacatecas, Zacatecas', date: '25 Oct 2018', forum: 'Foro Regional 2', url: '#' },
        '3': { city: 'Saltillo, Coahuila', date: '30 Oct 2018', forum: 'Foro Regional 3', url: '#' },
        '4': { city: 'Oaxaca, Oaxaca', date: '6 Nov 2018', forum: 'Foro Regional 4', url: '#' },
        '5': { city: 'Querétaro, Querétaro', date: '12 Nov 2018', forum: 'Foro Regional 5', url: '#' },
        '6': { city: 'Hermosillo, Sonora', date: '20 Nov 2018', forum: 'Foro Regional 6', url: '#' },
        '7': { city: 'Cancún, Quintana Roo', date: '22 Nov 2018', forum: 'Foro Regional 7', url: '#' },
        '8': { city: 'Ciudad de México, CDMX', date: '29 Nov 2018', forum: 'Foro Regional 8', url: '#' }
    };

    const mapPins = document.querySelectorAll('.sede-pin, .estado-mapa');
    const foroItems = document.querySelectorAll('.pna-foro-item');
    const tooltip = document.getElementById('mapTooltip');
    const tooltipCity = document.getElementById('tooltipCity');
    const tooltipDate = document.getElementById('tooltipDate');
    const tooltipForum = document.getElementById('tooltipForum');
    const tooltipLink = tooltip ? tooltip.querySelector('a') : null;

    function highlightSede(sedeId, showTip = false, event = null) {
        // Reset estilos
        document.querySelectorAll('.sede-pin circle:nth-child(2)').forEach(c => { c.setAttribute('fill', '#D97706'); c.setAttribute('r', '9'); });
        document.querySelectorAll('.estado-mapa').forEach(e => e.setAttribute('fill', '#E5E7EB'));
        foroItems.forEach(item => { item.classList.remove('bg-warning', 'bg-opacity-25', 'border-warning', 'shadow-sm'); });

        // Resaltar mapa
        const targetPin = document.querySelector(`.sede-pin[data-sede="${sedeId}"] circle:nth-child(2)`);
        const targetState = document.querySelector(`.estado-mapa[data-sede="${sedeId}"]`);
        if(targetPin) {
            targetPin.setAttribute('fill', '#691C32');
            targetPin.setAttribute('r', '12');
        }
        if(targetState) {
            targetState.setAttribute('fill', '#FCD34D');
        }

        // Resaltar lista lateral
        const targetItem = document.querySelector(`.pna-foro-item[data-sede="${sedeId}"]`);
        if(targetItem) {
            targetItem.classList.add('bg-warning', 'bg-opacity-25', 'border-warning', 'shadow-sm');
            if(showTip) {
                targetItem.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }

        // Mostrar Tooltip en mapa
        if(showTip && tooltip && forumsData[sedeId]) {
            const data = forumsData[sedeId];
            tooltipCity.textContent = data.city;
            tooltipDate.textContent = data.date;
            tooltipForum.textContent = data.forum;
            if(tooltipLink) tooltipLink.href = data.url;

            tooltip.classList.remove('d-none');
            
            // Posicionar tooltip sobre el mapa
            const wrapper = document.querySelector('.svg-map-wrapper');
            if(wrapper) {
                const rect = wrapper.getBoundingClientRect();
                let x = 100, y = 100;
                if(event && event.clientX) {
                    x = event.clientX - rect.left - 110;
                    y = event.clientY - rect.top - 140;
                } else if(targetPin) {
                    const pinRect = targetPin.getBoundingClientRect();
                    x = pinRect.left - rect.left - 90;
                    y = pinRect.top - rect.top - 130;
                }
                // Evitar desbordes
                if(x < 10) x = 10;
                if(y < 10) y = 10;
                tooltip.style.left = `${x}px`;
                tooltip.style.top = `${y}px`;
            }
        }
    }

    function hideTooltip() {
        if(tooltip) tooltip.classList.add('d-none');
        document.querySelectorAll('.sede-pin circle:nth-child(2)').forEach(c => { c.setAttribute('fill', '#D97706'); c.setAttribute('r', '9'); });
        document.querySelectorAll('.estado-mapa').forEach(e => e.setAttribute('fill', '#E5E7EB'));
        foroItems.forEach(item => { item.classList.remove('bg-warning', 'bg-opacity-25', 'border-warning', 'shadow-sm'); });
    }

    mapPins.forEach(pin => {
        pin.addEventListener('mouseenter', function(e) {
            const sedeId = this.getAttribute('data-sede');
            if(sedeId) highlightSede(sedeId, true, e);
        });
        pin.addEventListener('click', function(e) {
            const sedeId = this.getAttribute('data-sede');
            if(sedeId) highlightSede(sedeId, true, e);
        });
    });

    const mapWrapper = document.querySelector('.svg-map-wrapper');
    if(mapWrapper) {
        mapWrapper.addEventListener('mouseleave', hideTooltip);
    }

    foroItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            const sedeId = this.getAttribute('data-sede');
            if(sedeId) highlightSede(sedeId, false);
        });
        item.addEventListener('mouseleave', hideTooltip);
    });

    // -------------------------------------------------------------
    // 4. Auto-contraer acordeón de Anexos al abrir otro documento
    // -------------------------------------------------------------
    document.querySelectorAll('.pna-doc-card-compact:not(.pna-accordion-card)').forEach(card => {
        card.addEventListener('click', function() {
            document.querySelectorAll('.accordion-collapse.show').forEach(openAccordion => {
                if (typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                    const bsCollapse = bootstrap.Collapse.getInstance(openAccordion) || new bootstrap.Collapse(openAccordion, { toggle: false });
                    bsCollapse.hide();
                }
            });
        });
    });

});
