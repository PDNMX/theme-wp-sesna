/**
 * Presupuestación: gráficas Chart.js del Anexo Transversal Anticorrupción y descarga de documentos en ZIP.
 *
 * Extraído de page-presupuestacion.php (Etapa 3.3 del plan SND v1.0.0). Se carga con defer
 * desde inc/enqueue.php; los datos dinámicos llegan en window.sesnaPresupuestacion
 * (wp_localize_script) en lugar de interpolarse en el script en línea.
 */
(function() {

    // Datos dinámicos inyectados desde page-presupuestacion.php (wp_localize_script)
    var datos = window.sesnaPresupuestacion || {};

    Chart.register(ChartDataLabels);
    Chart.defaults.set('plugins.datalabels', { display: false });

    var anios = ['2021','2022','2023','2024','2025','2026'];
    var burgundi = '#611232';

    var aniosPresupuesto  = datos.aniosPresupuesto;
    var montosPresupuesto = datos.montosPresupuesto;

    // ── Gráfica 1: Evolución presupuestal ──
    new Chart(document.getElementById('chartMontos'), {
        type: 'bar',
        data: {
            labels: aniosPresupuesto,
            datasets: [{
                label: 'Millones de pesos',
                data: montosPresupuesto,
                backgroundColor: burgundi,
                borderRadius: 6,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(ctx) {
                            return ' $' + ctx.parsed.y.toLocaleString('es-MX', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' M';
                        }
                    }
                },
                datalabels: {
                    display: true,
                    anchor: 'end',
                    align: 'top',
                    offset: 4,
                    color: '#611232',
                    font: { size: 11, weight: 'bold' },
                    formatter: function(v) {
                        return '$' + v.toLocaleString('es-MX', {minimumFractionDigits:2, maximumFractionDigits:2});
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(v) { return '$' + v.toLocaleString('es-MX'); }
                    }
                }
            },
            layout: {
                padding: { top: 24 }
            }
        }
    });

    // ── Gráfica 2: Instituciones ──
    var aniosInstituciones   = datos.aniosInstituciones;
    var totalesInstituciones = datos.totalesInstituciones;

    new Chart(document.getElementById('chartInstituciones'), {
        type: 'bar',
        data: {
            labels: aniosInstituciones,
            datasets: [{
                label: 'Instituciones',
                data: totalesInstituciones,
                backgroundColor: burgundi,
                borderRadius: 6,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(ctx) {
                            return ' ' + ctx.parsed.y + ' instituciones';
                        }
                    }
                }
            },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 5 } }
            }
        }
    });

    // Toggle instituciones
    document.getElementById('btnVerInstituciones').addEventListener('click', function() {
        var lista = document.getElementById('listaInstituciones');
        var iconoWrap = document.getElementById('iconVerInstituciones');
        var chevron = iconoWrap ? iconoWrap.querySelector('.fin-acc-chevron') : null;
        if (lista.classList.contains('muestra--ninguno')) {
            lista.classList.remove('muestra--ninguno');
            if (chevron) chevron.classList.add('is-open');
        } else {
            lista.classList.add('muestra--ninguno');
            if (chevron) chevron.classList.remove('is-open');
        }
    });

    // Animación de entrada — todas las secciones y cards
    document.addEventListener('DOMContentLoaded', function() {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('pna-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.pna-chart-card, .pna-reveal').forEach(function(el) {
            observer.observe(el);
        });
    });

    // Descargar todo por columna — un único archivo .zip generado en el servidor
    document.querySelectorAll('.btn-descargar-todo').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var files = JSON.parse(this.dataset.files || '[]');
            if (!files.length) return;

            var zipName = this.dataset.zipName || 'documentos';
            var originalHtml = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = datos.iconoZip + ' Generando ZIP…';

            var formData = new FormData();
            formData.append('action', 'sesna_descargar_zip');
            formData.append('zip_name', zipName);
            files.forEach(function(url) { formData.append('files[]', url); });

            fetch(datos.ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(function(res) {
                if (!res.ok) throw new Error('No se pudo generar el ZIP');
                return res.blob();
            })
            .then(function(blob) {
                var link = document.createElement('a');
                var blobUrl = URL.createObjectURL(blob);
                link.href = blobUrl;
                link.download = zipName + '.zip';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                URL.revokeObjectURL(blobUrl);
            })
            .catch(function() {
                alert('No se pudo generar el archivo ZIP. Intenta de nuevo.');
            })
            .finally(function() {
                btn.disabled = false;
                btn.innerHTML = originalHtml;
            });
        });
    });

    // Selector de año en instituciones
    document.querySelectorAll('.inst-anio-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var anio = this.dataset.anio;
            // Actualizar botones
            document.querySelectorAll('.inst-anio-btn').forEach(function(b) {
                b.classList.remove('active');
                b.style.backgroundColor = '#F9F0F3';
                b.style.color = '#611232';
                b.style.borderColor = '#e8d0d8';
            });
            this.classList.add('active');
            this.style.backgroundColor = '#611232';
            this.style.color = '#fff';
            this.style.borderColor = '#611232';
            // Mostrar panel del año seleccionado
            document.querySelectorAll('.inst-panel').forEach(function(p) {
                p.classList.add('muestra--ninguno');
            });
            document.querySelector('.inst-panel[data-anio="' + anio + '"]').classList.remove('muestra--ninguno');
        });
    });

    // ── Gráfica 3: Capítulos (barras horizontales apiladas) ──
    var capDescripciones = {
        'Cap. 1000': 'Servicios Personales. Comprende las remuneraciones al personal de las dependencias, así como otras prestaciones laborales.',
        'Cap. 2000': 'Materiales y Suministros. Incluye materiales de administración, alimentos, combustibles y otros insumos necesarios para la operación.',
        'Cap. 3000': 'Servicios Generales. Comprende servicios básicos, arrendamiento, servicios profesionales, comunicación social y otros servicios contratados.',
        'Cap. 4000': 'Transferencias, Asignaciones, Subsidios y Otras Ayudas. Recursos transferidos a otras entidades, subsidios y ayudas sociales.',
        'Cap. 5000': 'Bienes Muebles, Inmuebles e Intangibles. Adquisición de mobiliario, equipo, vehículos y activos intangibles.',
        'Cap. 6000': 'Inversión Pública. Recursos destinados a obra pública y proyectos productivos.',
    };
    var capColores = ['#611232','#9B2D50','#C4536E','#D4859A','#E8B4BF','#F5D9DE'];
    var aniosCapitulos = datos.aniosCapitulos;
    var capLabels  = datos.capLabels;
    var capDatos   = datos.capDatos;

    var capDatasets = capLabels.map(function(label, i) {
        return {
            label: label,
            data: capDatos[i],
            backgroundColor: capColores[i],
            borderRadius: 3,
        };
    });

    new Chart(document.getElementById('chartCapitulos'), {
        type: 'bar',
        data: { labels: aniosCapitulos, datasets: capDatasets },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { font: { size: 11 }, boxWidth: 14, padding: 8 }
                },
                tooltip: {
                    callbacks: {
                        label: function(ctx) {
                            return ' ' + ctx.dataset.label + ': ' + ctx.parsed.x.toFixed(2) + '%';
                        },
                        afterBody: function(items) {
                            var desc = capDescripciones[items[0].dataset.label] || '';
                            return desc ? ['\n' + desc] : [];
                        }
                    }
                }
            },
            scales: {
                x: {
                    stacked: true,
                    ticks: { callback: function(v) { return v + '%'; } },
                    max: 100,
                },
                y: { stacked: true }
            },
            onHover: function(evt, elements) {
                if (elements.length) {
                    var label = capLabels[elements[0].datasetIndex];
                    var desc  = capDescripciones[label] || '';
                    var box   = document.getElementById('capTooltip');
                    document.getElementById('capTooltipTitulo').textContent = label;
                    document.getElementById('capTooltipDesc').textContent   = desc;
                    box.classList.remove('muestra--ninguno');
                }
            }
        }
    });

    // ── Gráfica 4: Monto por Eje-Objetivo (líneas) ──
    var aniosEje = datos.aniosEje;
    var ejeColores = { 'Eje 1': '#6AC72C', 'Eje 2': '#3A90C5', 'Eje 3': '#72588F', 'Eje 4': '#E14586' };
    var ejeDatos   = datos.ejeDatos;

    var ejeDatasets = Object.keys(ejeDatos).map(function(eje) {
        return {
            label: eje,
            data: ejeDatos[eje],
            borderColor: ejeColores[eje],
            backgroundColor: ejeColores[eje],
            tension: 0,
            pointRadius: 5,
            pointHoverRadius: 7,
            fill: false,
        };
    });

    var chartEjesInstance = new Chart(document.getElementById('chartEjes'), {
        type: 'line',
        data: { labels: aniosEje, datasets: ejeDatasets },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(ctx) {
                            return ' ' + ctx.dataset.label + ': $' + ctx.parsed.y.toLocaleString('es-MX', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' M';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(v) { return '$' + v.toLocaleString('es-MX'); }
                    }
                }
            }
        }
    });

    // Chips de activar/desactivar por eje (reemplaza la leyenda del canvas,
    // poco descubrible como elemento clickeable).
    var ejesToggles = document.getElementById('ejesToggles');
    Object.keys(ejeDatos).forEach(function(eje, i) {
        var color = ejeColores[eje];
        var btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'eje-toggle-btn b1sb active';
        btn.setAttribute('aria-pressed', 'true');
        btn.dataset.ejeIndex = i;
        btn.style.cssText = 'display:inline-flex;align-items:center;gap:6px;font-size:13px;border-radius:20px;padding:6px 14px;border:1.5px solid ' + color + ';background-color:' + color + ';color:#fff;cursor:pointer;transition:background-color .15s ease,color .15s ease;';
        btn.innerHTML = '<span style="width:10px;height:10px;border-radius:50%;background:currentColor;display:inline-block;"></span>' + eje;

        btn.addEventListener('click', function() {
            var meta = chartEjesInstance.getDatasetMeta(i);
            meta.hidden = !meta.hidden;
            chartEjesInstance.update();

            var visible = !meta.hidden;
            btn.classList.toggle('active', visible);
            btn.setAttribute('aria-pressed', visible ? 'true' : 'false');
            btn.style.backgroundColor = visible ? color : '#fff';
            btn.style.color = visible ? '#fff' : color;
        });

        ejesToggles.appendChild(btn);
    });

})();
