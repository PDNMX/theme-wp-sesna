<?php
/**
 * Template Name: PNA - Presupuestación
 *
 * @package sesna
 */

get_header();
?>

<div class="page-pna page-pna-presupuestacion front-page-bg">

    <!-- ── Breadcrumb ─────────────────────────────────────────── -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="ruta__a"><i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>" class="ruta__a">Acciones y Programas</a>
                </li>
                <li class="ruta__li">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/') ); ?>" class="ruta__a">Política Nacional Anticorrupción</a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Presupuestación</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- BLOQUE 1: Hero -->
    <section class="pt-4 pb-5">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">

                <!-- Columna Izquierda -->
                <div class="columna__12 columna__7--lg">
                    <h1 class="h1b patria color--pguinda600 mb--24">Presupuestación</h1>
                    <p class="sh1r mb--16 texto--justify">
                        Conoce más sobre el Anexo Transversal 30 del Presupuesto de Egresos de la Federación, el cual agrupa los recursos públicos destinados a la prevención, detección, investigación y sanción de hechos de corrupción.
                    </p>
                    <p class="sh1r mb--0 texto--justify">
                        Este Anexo Transversal identifica a los responsables y los montos de recursos públicos destinados a dichas tareas, permitiendo dar seguimiento al gasto anticorrupción a nivel federal.
                    </p>
                </div>

                <!-- Columna Derecha: Ícono representativo -->
                <div class="columna__12 columna__5--lg muestra--ninguno muestra--flex--lg align-items-center justify-content-end">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/ciclo_pna/presupuestacion.svg' ); ?>" alt="" class="sesna-hero__img" loading="eager">
                </div>

            </div>
        </div>
    </section>

    <!-- BLOQUE 2: Documentos del Anexo Transversal Anticorrupción -->
    <?php
    $ata_columnas = array(
        array(
            'icono'  => 'snd-education',
            'titulo' => 'Metodología',
            'docs'   => array(
                array( 'label' => 'Metodología para la integración del ATA',  'file' => 'Metodologia-para-la-Integracion-del-ATA.pdf',              'path' => '2024/08/Metodologia-para-la-Integracion-del-ATA.pdf' ),
                array( 'label' => 'Metodología 2023 y 2024',                  'file' => 'Metodologia-Integracion-ATA-2023-2024-28.06.2023-1.pdf',   'path' => '2023/04/Metodologia-Integracion-ATA-2023-2024-28.06.2023-1.pdf' ),
                array( 'label' => 'Metodología 2021 y 2022',                  'file' => 'Met_integraci%C3%B3n_ATA_VF-18ago20.pdf',                 'path' => '2020/08/Met_integraci%C3%B3n_ATA_VF-18ago20.pdf' ),
            ),
        ),
        array(
            'icono'  => 'snd-chart--bar',
            'titulo' => 'Informe de asignación',
            'docs'   => array(
                array( 'label' => '2025', 'file' => 'Informe-de-asignacion-ATA-2025.pdf',  'path' => '2025/03/Informe-de-asignacion-ATA-2025.pdf' ),
                array( 'label' => '2024', 'file' => 'Informe-de-asignacion-ATA-2024.pdf',  'path' => '2023/03/Informe-de-asignacion-ATA-2024.pdf' ),
                array( 'label' => '2023', 'file' => 'INF_ATA2023.pdf',                     'path' => '2023/03/INF_ATA2023.pdf' ),
                array( 'label' => '2022', 'file' => 'INF_ATA2022.pdf',                     'path' => '2022/01/INF_ATA2022.pdf' ),
                array( 'label' => '2021', 'file' => 'Informe-ATA.pdf',                     'path' => '2021/01/Informe-ATA.pdf' ),
            ),
        ),
        array(
            'icono'  => 'snd-catalog',
            'titulo' => 'Base de datos',
            'docs'   => array(
                array( 'label' => '2025', 'file' => 'ATA-2025-PEF.zip',                          'path' => '2025/03/ATA-2025-PEF.zip' ),
                array( 'label' => '2024', 'file' => 'ATA-2024-PPEF.xlsx',                        'path' => '2023/03/ATA-2024-PPEF.xlsx' ),
                array( 'label' => '2023', 'file' => 'BD_ATA-2023-AC01.xlsx',                     'path' => '2023/03/BD_ATA-2023-AC01.xlsx' ),
                array( 'label' => '2022', 'file' => 'BD_ATA-2022-AC01.xls',                      'path' => '2022/01/BD_ATA-2022-AC01.xls' ),
                array( 'label' => '2021', 'file' => 'Anexo-Transversal-Anticorrupcion-2021.xlsx', 'path' => '2021/01/Anexo-Transversal-Anticorrupcion-2021.xlsx' ),
            ),
        ),
        array(
            'icono'  => 'snd-recently-viewed',
            'titulo' => 'Informe de Ejecución y Seguimiento',
            'docs'   => array(
                array( 'label' => '2024', 'file' => 'Informe-de-Ejecucion-y-Seguimiento-ATA-2024.pdf',   'path' => '2025/08/Informe-de-Ejecucion-y-Seguimiento-ATA-2024.pdf' ),
                array( 'label' => '2023', 'file' => '001-Informe_ejecucion_seguimiento_ATA_2023.pdf',     'path' => '2024/07/001-Informe_ejecucion_seguimiento_ATA_2023.pdf' ),
                array( 'label' => '2022', 'file' => 'INF_ejec2022_ATA.pdf',                               'path' => '2023/05/INF_ejec2022_ATA.pdf' ),
                array( 'label' => '2021', 'file' => 'INF_ejec2021_ATA.pdf',                               'path' => '2022/07/INF_ejec2021_ATA.pdf' ),
            ),
        ),
    );
    ?>
    <section class="pb-5">
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 mb--16">Documentos del Anexo Transversal Anticorrupción</h2>
            <p class="sh1r color--neutro600 mb--24">Consulta y descarga los documentos metodológicos, informes y bases de datos disponibles.</p>

            <div class="card border rounded-4 p-4 p-md-5 shadow-sm bg-white" style="border-color: var(--neutro400) !important;">

                <!-- 4 columnas de documentos -->
                <div class="reticulaGrid__12">
                    <?php foreach ( $ata_columnas as $i => $col ) : ?>
                    <div class="columna__12 columna__6--md columna__3--lg">
                        <div class="card border rounded-4 h-100 d-flex flex-column p-4 bg-white" style="border-color: var(--neutro400) !important;">
                            <!-- Encabezado de columna -->
                            <div class="d-flex align-items-center gap--8 mb--16">
                                <div class="pna-guinda-icon-box flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="snd__icono <?php echo esc_attr( $col['icono'] ); ?> icono--20 color--neutro100" aria-hidden="true"></i>
                                </div>
                                <h3 class="b1sb mb--0"><?php echo esc_html( $col['titulo'] ); ?></h3>
                            </div>
                            <!-- Lista de documentos -->
                            <div class="d-flex flex-column flex-grow-1">
                                <?php foreach ( $col['docs'] as $doc ) : ?>
                                    <?php if ( ! empty( $doc['file'] ) ) : $doc_url = sesna_get_media_attachment_url( $doc['file'], $doc['path'] ); ?>
                                    <a href="#"
                                       data-modal-target="#pdfViewerModal"
                                       data-pdf-url="<?php echo esc_url( $doc_url ); ?>"
                                       data-pdf-title="<?php echo esc_attr( $col['titulo'] . ' — ' . $doc['label'] ); ?>"
                                       class="d-flex align-items-center justify-content-between gap-3 px-2 py-2 rounded-3 decoracion--ninguna pna-doc-item pna-anexo-link">
                                        <span class="b1r color--neutro800"><?php echo esc_html( $doc['label'] ); ?></span>
                                        <i class="snd__icono snd-download icono--16 flex-shrink-0 color--pguinda600" aria-hidden="true"></i>
                                    </a>
                                    <?php else : ?>
                                    <span class="d-flex align-items-center justify-content-between gap-3 px-2 py-2 rounded-3">
                                        <span class="b1r color--neutro500"><?php echo esc_html( $doc['label'] ); ?> <small>(próximamente)</small></span>
                                        <i class="snd__icono snd-download icono--16 flex-shrink-0 color--neutro500" aria-hidden="true"></i>
                                    </span>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <!-- Botón descargar todo -->
                            <?php
                            $urls = array();
                            foreach ( $col['docs'] as $doc ) {
                                if ( ! empty( $doc['file'] ) ) {
                                    $url = sesna_get_media_attachment_url( $doc['file'], $doc['path'] );
                                    if ( $url ) $urls[] = $url;
                                }
                            }
                            ?>
                            <div class="mt--16 pt--16 w-100 d-flex justify-content-end" style="border-top: 1px solid var(--neutro400);">
                                <button type="button"
                                        class="btn-descargar-todo boton__fantasma d-flex align-items-center gap-2"
                                        data-files="<?php echo esc_attr( json_encode( $urls ) ); ?>"
                                        data-zip-name="<?php echo esc_attr( sanitize_title( $col['titulo'] ) ); ?>"
                                        style="padding: 6px 12px; min-height: auto; font-size: 13px;">
                                    <i class="snd__icono snd-download icono--16" aria-hidden="true"></i> Descargar todo
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div><!-- /.row -->
            </div><!-- /.card -->
        </div>
    </section>

    <!-- BLOQUE 3: Panorama nacional del Anexo Transversal -->
    <section class="pb-5">
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 mb--16">Panorama del Anexo Transversal 30</h2>
            <div class="reticulaGrid__12 align-items-center mb--24">
                <div class="columna__12 columna__8--md">
                    <p class="sh1r color--neutro600 mb--0">Consulta indicadores sobre la evolución y distribución de los recursos identificados en el Anexo Transversal 30 del Presupuesto de Egresos de la Federación.</p>
                </div>
                <div class="columna__12 columna__4--md texto--derecha--md">
                    <a href="<?php echo esc_url( sprintf( 'https://docs.google.com/spreadsheets/d/%s/export?format=xlsx', SESNA_ATA_SHEET_ID ) ); ?>"
                       class="boton__primario d-flex align-items-center gap-2" style="display: inline-flex;" download="Datos-procesados-Anexo-Transversal-2021-2026.xlsx">
                        <i class="snd__icono snd-download icono--16" aria-hidden="true"></i> Descargar base de datos
                    </a>
                </div>
            </div>

            <div class="card border rounded-4 p-4 p-md-5 shadow-sm bg-white" style="border-color: var(--neutro400) !important;">

            <!-- Fila 1: Evolución presupuestal + Instituciones -->
            <div class="reticulaGrid__12 mb--24">

                <!-- Gráfica 1: Evolución presupuestal -->
                <div class="columna__12 columna__6--lg">
                    <div class="card border rounded-4 p-4 h-100 bg-white" style="border-color: var(--neutro400) !important; border-top: 3px solid var(--pguinda600) !important;">
                        <h3 class="sh1b color--neutro800 mb--4">Evolución presupuestal del Anexo Transversal en materia anticorrupción (2021–2026)</h3>
                        <p class="b1r mb--16">(millones de pesos)</p>
                        <canvas id="chartMontos" height="220"></canvas>
                        <p class="b1r mt--8">Fuente: Anexo Transversal en materia anticorrupción.</p>
                        <div class="d-flex align-items-center gap-2 mt--4 p-2 rounded-3 fondo--azul100">
                            <i class="snd__icono snd-information icono--20 color--azul500 flex-shrink-0" aria-hidden="true"></i>
                            <span class="sdr color--azul500">Pasa el cursor sobre cada barra para ver el monto exacto.</span>
                        </div>
                    </div>
                </div>

                <!-- Gráfica 2: Instituciones participantes -->
                <div class="columna__12 columna__6--lg">
                    <div class="card border rounded-4 p-4 h-100 bg-white" style="border-color: var(--neutro400) !important; border-top: 3px solid #72588F !important;">
                        <h3 class="sh1b color--neutro800 mb--4">Instituciones participantes del Anexo Transversal en materia anticorrupción (2021–2026)</h3>
                        <p class="b1r mb--16">(número de instituciones)</p>
                        <canvas id="chartInstituciones" height="160"></canvas>
                        <p class="b1r mt--8">Fuente: Anexo Transversal en materia anticorrupción.</p>

                        <!-- Toggle de instituciones por año -->
                        <?php
                        $ata_instituciones    = sesna_obtener_datos_instituciones_ata();
                        $ata_instituciones_por_anio = $ata_instituciones['por_anio'];
                        $ata_totales          = $ata_instituciones['totales'];
                        $anios_inst = array_keys($ata_instituciones_por_anio);
                        $primer_anio = $anios_inst[0];
                        ?>
                        <div class="mt--16">
                            <button class="boton__secundario d-flex align-items-center gap-2 w-100 justify-content-between"
                                    id="btnVerInstituciones"
                                    style="font-size: 13px; padding: 8px 16px; min-height: auto;">
                                <span><i class="snd__icono snd-building icono--16" aria-hidden="true"></i> Ver instituciones participantes por año</span>
                                <i class="snd__icono snd-chevron--down icono--16" aria-hidden="true" id="iconVerInstituciones"></i>
                            </button>
                            <div id="listaInstituciones" class="muestra--ninguno mt--8 p-3 rounded-3" style="background-color: var(--neutro200); border: 1px solid var(--neutro400);">
                                <!-- Selector de año -->
                                <div class="d-flex flex-wrap gap-2 mb--16">
                                    <?php foreach ( $anios_inst as $anio ) : ?>
                                    <button class="inst-anio-btn b1sb <?php echo $anio === $primer_anio ? 'active' : ''; ?>"
                                            data-anio="<?php echo esc_attr($anio); ?>"
                                            style="font-size: 13px; border-radius: 6px; min-width: 64px; padding: 5px 12px; <?php echo $anio === $primer_anio ? 'background-color:var(--pguinda600);color:#fff;border:1px solid var(--pguinda600);' : 'background-color:var(--neutro100);color:var(--pguinda600);border:1px solid var(--neutro400);'; ?>">
                                        <?php echo esc_html($anio); ?>
                                    </button>
                                    <?php endforeach; ?>
                                </div>
                                <!-- Lista del año seleccionado -->
                                <?php foreach ( $ata_instituciones_por_anio as $anio => $lista ) : ?>
                                <div class="inst-panel <?php echo $anio === $primer_anio ? '' : 'muestra--ninguno'; ?>" data-anio="<?php echo esc_attr($anio); ?>">
                                    <p class="sdr color--pguinda600 mb--8">
                                        <strong><?php echo intval($ata_totales[$anio]); ?> instituciones participantes</strong>
                                    </p>
                                    <div class="reticulaGrid__12 gap--4">
                                        <?php foreach ( $lista as $inst ) : ?>
                                        <div class="columna__6">
                                            <span class="d-flex align-items-center gap-1 sdr color--neutro700">
                                                <i class="snd__icono snd-dot-mark icono--16 color--pguinda600 flex-shrink-0" aria-hidden="true"></i><?php echo esc_html( $inst ); ?>
                                            </span>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /fila 1 -->

            <!-- Fila 2: Capítulos + Eje-Objetivo -->
            <div class="reticulaGrid__12">

                <!-- Gráfica 3: Alineación por Capítulo -->
                <div class="columna__12 columna__6--lg">
                    <div class="card border rounded-4 p-4 h-100 bg-white" style="border-color: var(--neutro400) !important; border-top: 3px solid #72588F !important;">
                        <h3 class="sh1b color--neutro800 mb--4">Alineación porcentual por Capítulo de Clasificación del Gasto (2021–2026)</h3>
                        <p class="b1r mb--16">(%)</p>
                        <canvas id="chartCapitulos" height="220"></canvas>
                        <p class="b1r mt--8">Fuente: Anexo Transversal en materia anticorrupción.</p>
                        <div class="d-flex align-items-center gap-2 mt--8 p-2 rounded-3 fondo--azul100">
                            <i class="snd__icono snd-information icono--20 color--azul500 flex-shrink-0" aria-hidden="true"></i>
                            <span class="sdr color--azul500">Pasa el cursor sobre cada segmento para ver la descripción.</span>
                        </div>
                        <!-- Tooltip de descripción -->
                        <div id="capTooltip" class="mt--8 p-3 rounded-3 muestra--ninguno" style="background-color: var(--gama100); border: 1px solid var(--neutro400);">
                            <strong id="capTooltipTitulo" class="d-block mb--4 b1sb color--pguinda600"></strong>
                            <span id="capTooltipDesc" class="b1r "></span>
                        </div>
                    </div>
                </div>

                <!-- Gráfica 4: Monto por Eje-Objetivo -->
                <div class="columna__12 columna__6--lg">
                    <div class="card border rounded-4 p-4 h-100 bg-white" style="border-color: var(--neutro400) !important; border-top: 3px solid var(--pguinda600) !important;">
                        <h3 class="sh1b color--neutro800 mb--4">Monto de presupuesto asignado por Eje (2021–2025)</h3>
                        <p class="b1r mb--16">(millones de pesos)</p>
                        <div id="ejesToggles" class="d-flex flex-wrap justify-content-center gap-2 mb--16"></div>
                        <canvas id="chartEjes" height="220"></canvas>
                        <p class="b1r mt--8">Fuente: Anexo Transversal en materia anticorrupción.</p>
                        <div class="d-flex align-items-center gap-2 mt--8 p-2 rounded-3 fondo--azul100">
                            <i class="snd__icono snd-information icono--20 color--azul500 flex-shrink-0" aria-hidden="true"></i>
                            <span class="sdr color--azul500">Pasa el cursor para ver el detalle. Activa o desactiva cada eje para comparar sus tendencias.</span>
                        </div>
                        <p class="b1r mt--8" style="font-style: italic;">
                            La información correspondiente al ejercicio 2026 no se incluye en esta visualización debido a un cambio en la metodología de alineación presupuestaria.
                        </p>
                    </div>
                </div>

            </div><!-- /fila 2 -->

            </div><!-- /.card -->
        </div>
    </section>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <script>
    (function() {

        Chart.register(ChartDataLabels);
        Chart.defaults.set('plugins.datalabels', { display: false });

        var anios = ['2021','2022','2023','2024','2025','2026'];
        var burgundi = '#611232';

        <?php $ata_presupuesto = sesna_obtener_datos_presupuesto_ata(); ?>
        var aniosPresupuesto  = <?php echo wp_json_encode( $ata_presupuesto['anios'] ); ?>;
        var montosPresupuesto = <?php echo wp_json_encode( $ata_presupuesto['montos'] ); ?>;

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
        <?php
        $inst_totales_anios = array_keys($ata_totales);
        $inst_totales_vals  = array();
        foreach ( $inst_totales_anios as $anio_total ) {
            $inst_totales_vals[] = intval( $ata_totales[ $anio_total ] );
        }
        ?>
        var aniosInstituciones   = <?php echo wp_json_encode( $inst_totales_anios ); ?>;
        var totalesInstituciones = <?php echo wp_json_encode( $inst_totales_vals ); ?>;

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
            var icono = document.getElementById('iconVerInstituciones');
            if (lista.classList.contains('muestra--ninguno')) {
                lista.classList.remove('muestra--ninguno');
                icono.classList.replace('snd-chevron--down', 'snd-chevron--up');
            } else {
                lista.classList.add('muestra--ninguno');
                icono.classList.replace('snd-chevron--up', 'snd-chevron--down');
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
                btn.innerHTML = '<i class="snd__icono snd-recently-viewed icono--16" aria-hidden="true"></i> Generando ZIP…';

                var formData = new FormData();
                formData.append('action', 'sesna_descargar_zip');
                formData.append('zip_name', zipName);
                files.forEach(function(url) { formData.append('files[]', url); });

                fetch('<?php echo esc_url( admin_url('admin-ajax.php') ); ?>', {
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
        <?php
        $ata_capitulos    = sesna_obtener_datos_capitulos_ata();
        $cap_label_map    = array( '1000' => 'Cap. 1000', '2000' => 'Cap. 2000', '3000' => 'Cap. 3000', '4000' => 'Cap. 4000', '5000' => 'Cap. 5000', '6000' => 'Cap. 6000' );
        $cap_labels       = array();
        $cap_datos        = array();
        foreach ( $ata_capitulos['datos'] as $cap_key => $cap_vals ) {
            $cap_labels[] = isset( $cap_label_map[ $cap_key ] ) ? $cap_label_map[ $cap_key ] : $cap_key;
            $cap_datos[]  = $cap_vals;
        }
        ?>
        var aniosCapitulos = <?php echo wp_json_encode( $ata_capitulos['anios'] ); ?>;
        var capLabels  = <?php echo wp_json_encode( $cap_labels ); ?>;
        var capDatos   = <?php echo wp_json_encode( $cap_datos ); ?>;

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
        <?php $ata_ejes = sesna_obtener_datos_ejes_ata(); ?>
        var aniosEje = <?php echo wp_json_encode( $ata_ejes['anios'] ); ?>;
        var ejeColores = { 'Eje 1': '#6AC72C', 'Eje 2': '#3A90C5', 'Eje 3': '#72588F', 'Eje 4': '#E14586' };
        var ejeDatos   = <?php echo wp_json_encode( $ata_ejes['datos'] ); ?>;

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
    </script>

    <!-- BLOQUE 4: Consulta por entidad federativa -->
    <section class="pb-5">
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 mb--16">Consulta por entidad federativa</h2>

            <div class="card border rounded-4 p-4 p-md-5 shadow-sm bg-white" style="border-color: var(--neutro400) !important;">

                <div class="reticulaGrid__12 align-items-center">
                    <!-- Col 1: Ícono representativo -->
                    <div class="columna__12 columna__2--md d-flex justify-content-center">
                        <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 96px; height: 96px; background-color: var(--gama100);">
                            <i class="snd__icono snd-map icono--32 color--pguinda600" aria-hidden="true"></i>
                        </div>
                    </div>

                    <!-- Col 2: Descripción -->
                    <div class="columna__12 columna__7--md">
                        <p class="b1r color--neutro700 mb--8 texto--justify">
                            La información del Anexo Transversal 30 en materia anticorrupción por entidad federativa puede consultarse en la <strong>Dimensión de Presupuesto del Sistema de Seguimiento de la Política Nacional Anticorrupción.</strong>
                        </p>
                        <p class="b1r color--neutro600 mb--0 texto--justify">
                            Selecciona la entidad de tu interés para conocer la información disponible.
                        </p>
                    </div>

                    <!-- Col 3: Botón -->
                    <div class="columna__12 columna__3--md d-flex justify-content-center justify-content-md-end">
                        <a href="https://www.sna.org.mx/sistemas-estatales-anticorrupcion/" target="_blank" title="El enlace abre en ventana nueva" rel="noopener"
                           class="boton__primario d-flex align-items-center justify-content-center gap-3"
                           style="max-width: 280px; width: 100%; min-height: 72px; text-align: center;">
                            <i class="snd__icono snd-launch icono--24 flex-shrink-0" aria-hidden="true"></i>
                            <span class="b1sb">Consultar información por entidad federativa</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_template_part('template-parts/visor-pdf'); ?>

<?php get_footer(); ?>
