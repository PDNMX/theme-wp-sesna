<?php
/**
 * Template Name: PNA - Presupuestación
 *
 * @package sesna
 */

get_header();
?>

<div class="page-pna page-pna-presupuestacion">

    <!-- Breadcrumb -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"><i class="bi bi-house-door" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/politica-nacional-anticorrupcion/') ); ?>">Política Nacional Anticorrupción</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Presupuestación</li>
            </ol>
        </div>
    </nav>

    <!-- BLOQUE 1: Hero -->
    <section class="pt-4 pb-5">
        <div class="container">
            <div class="row g-4 align-items-start justify-content-between">

                <!-- Columna Izquierda -->
                <div class="col-lg-7 col-xl-7 pna-reveal" style="--delay:0s">
                    <h2 class="fw-bold font-patria text-burgundi mb-3">Presupuestación</h2>
                    <p class="text-muted mb-4">
                        Conoce más sobre el Anexo Transversal 30 del Presupuesto de Egresos de la Federación, el cual agrupa los recursos públicos destinados a la prevención, detección, investigación y sanción de hechos de corrupción.
                    </p>
                    <p class="text-muted mb-0">
                        Este Anexo Transversal identifica a los responsables y los montos de recursos públicos ejecutados a dichas tareas, permitiendo dar seguimiento al gasto anticorrupción a nivel federal.
                    </p>
                </div>

                <!-- Columna Derecha: Ícono representativo -->
                <div class="col-lg-5 col-xl-5 d-flex justify-content-lg-end justify-content-center align-items-center mt-5 mt-lg-0 pna-reveal" style="--delay:.25s">
                    <i class="bi bi-pie-chart-fill" style="font-size: 220px; color: #72588F; opacity: 0.15;"></i>
                </div>

            </div>
        </div>
    </section>

    <!-- BLOQUE 2: Documentos del Anexo Transversal Anticorrupción -->
    <?php
    $ata_columnas = array(
        array(
            'icono'  => 'bi-book',
            'titulo' => 'Metodología',
            'docs'   => array(
                array( 'label' => 'Metodología para la integración del ATA',  'file' => 'Metodologia-para-la-Integracion-del-ATA.pdf',              'path' => '2024/08/Metodologia-para-la-Integracion-del-ATA.pdf' ),
                array( 'label' => 'Metodología 2023 y 2024',                  'file' => 'Metodologia-Integracion-ATA-2023-2024-28.06.2023-1.pdf',   'path' => '2023/04/Metodologia-Integracion-ATA-2023-2024-28.06.2023-1.pdf' ),
                array( 'label' => 'Metodología 2021 y 2022',                  'file' => 'Met_integraci%C3%B3n_ATA_VF-18ago20.pdf',                 'path' => '2020/08/Met_integraci%C3%B3n_ATA_VF-18ago20.pdf' ),
            ),
        ),
        array(
            'icono'  => 'bi-bar-chart',
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
            'icono'  => 'bi-database',
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
            'icono'  => 'bi-clock-history',
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
        <div class="container">
            <div class="card border rounded-4 shadow-sm p-4 p-md-5 pna-reveal" style="border-color: #E9ECEF !important; --delay:0s">

                <!-- Encabezado -->
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="icon-bg-circle flex-shrink-0" style="background-color: #F9F0F3;">
                        <i class="bi bi-file-earmark-text" style="color: #611232;"></i>
                    </div>
                    <div>
                        <h2 class="h4 fw-bold font-patria mb-0" style="color: #611232;">1. Documentos del Anexo Transversal Anticorrupción</h2>
                    </div>
                </div>
                <p class="text-muted mb-4 ms-1" style="font-size: 15px;">Consulta y descarga los documentos metodológicos, informes y bases de datos disponibles.</p>
                <div class="cp-recursos__linea mb-4"></div>

                <!-- 4 columnas de documentos -->
                <div class="row g-4">
                    <?php foreach ( $ata_columnas as $i => $col ) : ?>
                    <div class="col-lg-3 col-md-6 pna-chart-card" style="--delay:<?php echo ($i * .1); ?>s">
                        <div class="card border rounded-4 h-100 d-flex flex-column p-3" style="border-color: #e8d0d8 !important;">
                            <!-- Encabezado de columna -->
                            <div class="d-flex align-items-center gap-2 mb-4">
                                <div class="icon-bg-circle icon-bg-circle--sm flex-shrink-0" style="background-color: #F9F0F3;">
                                    <i class="bi <?php echo esc_attr( $col['icono'] ); ?>" style="color: #611232;"></i>
                                </div>
                                <h3 class="h6 fw-bold mb-0 font-noto-sans" style="color: #611232;"><?php echo esc_html( $col['titulo'] ); ?></h3>
                            </div>
                            <!-- Lista de documentos -->
                            <div class="d-flex flex-column flex-grow-1">
                                <?php foreach ( $col['docs'] as $doc ) : ?>
                                    <?php if ( ! empty( $doc['file'] ) ) : ?>
                                    <a href="<?php echo esc_url( sesna_get_media_attachment_url( $doc['file'], $doc['path'] ) ); ?>"
                                       target="_blank" rel="noopener"
                                       class="d-flex align-items-center gap-2 px-2 py-2 rounded-3 text-decoration-none pna-doc-item"
                                       style="transition: background-color .15s; color: #333;">
                                        <i class="bi bi-download flex-shrink-0" style="color: #611232;"></i>
                                        <span class="font-noto-sans" style="font-size: 14px;"><?php echo esc_html( $doc['label'] ); ?></span>
                                    </a>
                                    <?php else : ?>
                                    <span class="d-flex align-items-center gap-2 px-2 py-2 rounded-3 text-muted">
                                        <i class="bi bi-download flex-shrink-0" style="color: #ccc;"></i>
                                        <span class="font-noto-sans" style="font-size: 14px;"><?php echo esc_html( $doc['label'] ); ?> <small>(próximamente)</small></span>
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
                            <div class="mt-3 pt-3" style="border-top: 1px solid #e8d0d8;">
                                <button type="button"
                                        class="btn-descargar-todo d-flex align-items-center gap-2 text-decoration-none font-noto-sans fw-semibold border-0 bg-transparent p-0"
                                        data-files="<?php echo esc_attr( json_encode( $urls ) ); ?>"
                                        style="font-size: 13px; color: #611232; cursor: pointer;">
                                    <i class="bi bi-download"></i> Descargar todo
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
        <div class="container">
            <div class="card border rounded-4 shadow-sm p-4 p-md-5 pna-reveal" style="border-color: #E9ECEF !important; --delay:0s">

            <!-- Encabezado de sección -->
            <div class="d-flex align-items-center gap-3 mb-2">
                <div class="icon-bg-circle flex-shrink-0" style="background-color: #EEE8F5;">
                    <i class="bi bi-bar-chart-line" style="color: #72588F;"></i>
                </div>
                <h2 class="h4 fw-bold font-patria mb-0" style="color: #611232;">2. Panorama del Anexo Transversal 30</h2>
            </div>
            <div class="row align-items-center mb-4 ms-1 me-0">
                <div class="col">
                    <p class="text-muted mb-0" style="font-size: 15px;">Consulta indicadores sobre la evolución y distribución de los recursos identificados en el Anexo Transversal 30 del Presupuesto de Egresos de la Federación.</p>
                </div>
                <div class="col-auto">
                    <a href="<?php echo esc_url( sesna_get_media_attachment_url( 'Datos-procesados-Anexo-Transversal-2021-2026_rev.xlsx', '' ) ); ?>"
                       class="btn d-inline-flex align-items-center gap-2 font-noto-sans fw-semibold"
                       style="font-size: 13px; border-radius: 8px; background-color: #F9F0F3; color: #611232; border: 1px solid #e8d0d8; padding: 8px 16px;" download>
                        <i class="bi bi-download"></i> Descargar base de datos
                    </a>
                </div>
            </div>
            <div class="cp-recursos__linea mb-5"></div>

            <!-- Fila 1: Evolución presupuestal + Instituciones -->
            <div class="row g-4 mb-4">

                <!-- Gráfica 1: Evolución presupuestal -->
                <div class="col-lg-6 pna-chart-card" style="--delay:.0s">
                    <div class="card border rounded-4 shadow-sm p-4 h-100" style="border-color: #E9ECEF !important; border-top: 3px solid #611232 !important;">
                        <h3 class="fw-bold font-noto-sans mb-1" style="font-size: 15px; color: #222;">Evolución presupuestal del Anexo Transversal en materia anticorrupción (2021–2026)</h3>
                        <p class="text-muted mb-3" style="font-size: 12px;">(millones de pesos)</p>
                        <canvas id="chartMontos" height="220"></canvas>
                        <p class="text-muted mt-2" style="font-size: 11px;">Fuente: Anexo Transversal en materia anticorrupción.</p>
                        <div class="d-flex align-items-center gap-2 mt-1 p-2 rounded-3" style="background-color: #F8F9FA; font-size: 12px;">
                            <i class="bi bi-info-circle text-muted flex-shrink-0"></i>
                            <span class="text-muted font-noto-sans">Pasa el cursor sobre cada barra para ver el monto exacto.</span>
                        </div>
                    </div>
                </div>

                <!-- Gráfica 2: Instituciones participantes -->
                <div class="col-lg-6 pna-chart-card" style="--delay:.15s">
                    <div class="card border rounded-4 shadow-sm p-4 h-100" style="border-color: #E9ECEF !important; border-top: 3px solid #72588F !important;">
                        <h3 class="fw-bold font-noto-sans mb-1" style="font-size: 15px; color: #222;">Instituciones participantes del Anexo Transversal en materia anticorrupción (2021–2026)</h3>
                        <p class="text-muted mb-3" style="font-size: 12px;">(número de instituciones)</p>
                        <canvas id="chartInstituciones" height="160"></canvas>

                        <!-- Toggle de instituciones por año -->
                        <?php
                        $ata_instituciones_por_anio = array(
                            '2026' => array('SFP','FEMCC','SESNA','TFJA','ASF','SHCP-CNBV','SHCP-SAT','SHCP','INMUJERES','SE','TDJ','SECIHTI','Cultura','Defensa Nacional','SEDATU','FGR','SEGOB','SCT','ISSSTE','IMSS','INPI','Marina','Medio Ambiente','Órgano de Administración Judicial','Salud','IMSS Bienestar','STPS','Tribunales Agrarios','SECTUR'),
                            '2025' => array('CJF','SFP','FEMCC','SESNA','TFJA','ASF','SHCP-CNBV','SHCP-SAT','SHCP','SEP','Bienestar','SRE','INMUJERES','AGN','SE','COFECE'),
                            '2024' => array('CJF','SFP','FEMCC','SESNA','TFJA','ASF','SHCP-CNBV','SHCP-SAT','SHCP','SEP','Bienestar','SRE','INMUJERES','AGN','SE','COFECE'),
                            '2023' => array('CJF','SFP','FEMCC','SESNA','TFJA','INAI','ASF','SHCP-CNBV','SHCP-SAT','SHCP','SEP','Bienestar','CONAMER','CONACYT','SRE','INMUJERES','AGN'),
                            '2022' => array('CJF','SFP','FEMCC','SESNA','TFJA','INAI','SHCP-CNBV','SHCP-SAT','SHCP'),
                            '2021' => array('CJF','SFP','FEMCC','SESNA','TFJA','INAI','SHCP-CNBV','SHCP-SAT','SHCP'),
                        );
                        $ata_totales = array('2021'=>9,'2022'=>9,'2023'=>17,'2024'=>17,'2025'=>17,'2026'=>29);
                        $anios_inst = array_keys($ata_instituciones_por_anio);
                        $primer_anio = $anios_inst[0];
                        ?>
                        <div class="mt-3">
                            <button class="btn btn-sm d-flex align-items-center gap-2 font-noto-sans fw-semibold w-100 justify-content-between px-3 py-2"
                                    id="btnVerInstituciones"
                                    style="background-color: #F9F0F3; color: #611232; border: 1px solid #e8d0d8; border-radius: 8px; font-size: 13px;">
                                <span><i class="bi bi-building me-1"></i> Ver instituciones participantes por año</span>
                                <i class="bi bi-chevron-down" id="iconVerInstituciones"></i>
                            </button>
                            <div id="listaInstituciones" class="d-none mt-2 p-3 rounded-3" style="background-color: #fafafa; border: 1px solid #e8d0d8;">
                                <!-- Selector de año -->
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <?php foreach ( $anios_inst as $anio ) : ?>
                                    <button class="btn btn-sm font-noto-sans fw-semibold inst-anio-btn <?php echo $anio === $primer_anio ? 'active' : ''; ?>"
                                            data-anio="<?php echo esc_attr($anio); ?>"
                                            style="font-size: 13px; border-radius: 6px; min-width: 64px; padding: 5px 12px; <?php echo $anio === $primer_anio ? 'background-color:#611232;color:#fff;border-color:#611232;' : 'background-color:#F9F0F3;color:#611232;border:1px solid #e8d0d8;'; ?>">
                                        <?php echo esc_html($anio); ?>
                                    </button>
                                    <?php endforeach; ?>
                                </div>
                                <!-- Lista del año seleccionado -->
                                <?php foreach ( $ata_instituciones_por_anio as $anio => $lista ) : ?>
                                <div class="inst-panel <?php echo $anio === $primer_anio ? '' : 'd-none'; ?>" data-anio="<?php echo esc_attr($anio); ?>">
                                    <p class="font-noto-sans mb-2" style="font-size: 12px; color: #611232;">
                                        <strong><?php echo intval($ata_totales[$anio]); ?> instituciones participantes</strong>
                                    </p>
                                    <div class="row g-1 ps-2">
                                        <?php foreach ( $lista as $inst ) : ?>
                                        <div class="col-6">
                                            <span class="d-flex align-items-center gap-1 font-noto-sans" style="font-size: 12px; color: #444;">
                                                <i class="bi bi-dot flex-shrink-0" style="color: #611232;"></i><?php echo esc_html( $inst ); ?>
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
            <div class="row g-4">

                <!-- Gráfica 3: Alineación por Capítulo -->
                <div class="col-lg-6 pna-chart-card" style="--delay:.05s">
                    <div class="card border rounded-4 shadow-sm p-4 h-100" style="border-color: #E9ECEF !important; border-top: 3px solid #72588F !important;">
                        <h3 class="fw-bold font-noto-sans mb-1" style="font-size: 15px; color: #222;">Alineación porcentual por Capítulo de Clasificación del Gasto (2021–2026)</h3>
                        <p class="text-muted mb-3" style="font-size: 12px;">(%)</p>
                        <canvas id="chartCapitulos" height="220"></canvas>
                        <div class="d-flex align-items-center gap-2 mt-2 p-2 rounded-3" style="background-color: #F8F9FA; font-size: 12px;">
                            <i class="bi bi-info-circle text-muted flex-shrink-0"></i>
                            <span class="text-muted font-noto-sans">Pasa el cursor sobre cada segmento para ver la descripción.</span>
                        </div>
                        <!-- Tooltip de descripción -->
                        <div id="capTooltip" class="mt-2 p-3 rounded-3 d-none" style="background-color: #F9F0F3; border: 1px solid #e8d0d8; font-size: 13px;">
                            <strong id="capTooltipTitulo" class="d-block mb-1 font-noto-sans" style="color: #611232;"></strong>
                            <span id="capTooltipDesc" class="text-muted font-noto-sans"></span>
                        </div>
                    </div>
                </div>

                <!-- Gráfica 4: Monto por Eje-Objetivo -->
                <div class="col-lg-6 pna-chart-card" style="--delay:.2s">
                    <div class="card border rounded-4 shadow-sm p-4 h-100" style="border-color: #E9ECEF !important; border-top: 3px solid #611232 !important;">
                        <h3 class="fw-bold font-noto-sans mb-1" style="font-size: 15px; color: #222;">Monto de presupuesto asignado por Eje–Objetivo (2021–2025)</h3>
                        <p class="text-muted mb-3" style="font-size: 12px;">(millones de pesos)</p>
                        <canvas id="chartEjes" height="220"></canvas>
                        <div class="d-flex align-items-center gap-2 mt-2 p-2 rounded-3" style="background-color: #F8F9FA; font-size: 12px;">
                            <i class="bi bi-info-circle text-muted flex-shrink-0"></i>
                            <span class="text-muted font-noto-sans">Pasa el cursor sobre cada línea o punto para ver el monto y el detalle del Eje–Objetivo.</span>
                        </div>
                        <p class="text-muted mt-2" style="font-size: 11px; font-style: italic;">
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
    <script>
    (function() {

        var anios = ['2021','2022','2023','2024','2025','2026'];
        var burgundi = '#611232';

        // ── Gráfica 1: Evolución presupuestal ──
        new Chart(document.getElementById('chartMontos'), {
            type: 'bar',
            data: {
                labels: anios,
                datasets: [{
                    label: 'Millones de pesos',
                    data: [3315.74, 3532.04, 6711.38, 9109.09, 7939.30, 9599.12],
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
                    datalabels: { display: false }
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

        // ── Gráfica 2: Instituciones ──
        new Chart(document.getElementById('chartInstituciones'), {
            type: 'bar',
            data: {
                labels: anios,
                datasets: [{
                    label: 'Instituciones',
                    data: [9, 9, 17, 17, 17, 29],
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
            if (lista.classList.contains('d-none')) {
                lista.classList.remove('d-none');
                icono.classList.replace('bi-chevron-down', 'bi-chevron-up');
            } else {
                lista.classList.add('d-none');
                icono.classList.replace('bi-chevron-up', 'bi-chevron-down');
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

        // Descargar todo por columna
        document.querySelectorAll('.btn-descargar-todo').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var files = JSON.parse(this.dataset.files || '[]');
                files.forEach(function(url, i) {
                    setTimeout(function() {
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = '';
                        a.target = '_blank';
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);
                    }, i * 600);
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
                    p.classList.add('d-none');
                });
                document.querySelector('.inst-panel[data-anio="' + anio + '"]').classList.remove('d-none');
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
        var capLabels  = ['Cap. 1000','Cap. 2000','Cap. 3000','Cap. 4000','Cap. 5000','Cap. 6000'];
        var capDatos   = [
            [82.76, 85.14, 85.15, 87.74, 89.29, 89.14],
            [ 0.72,  0.50,  0.56,  0.52,  0.65,  0.88],
            [16.30, 14.15, 13.55, 11.42,  9.79,  9.68],
            [ 0.18,  0.18,  0.67,  0.27,  0.21,  0.28],
            [ 0.04,  0.03,  0.03,  0.02,  0.03,  0.02],
            [ 0.00,  0.00,  0.04,  0.03,  0.04,  0.00],
        ];

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
            data: { labels: anios, datasets: capDatasets },
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
                        box.classList.remove('d-none');
                    }
                }
            }
        });

        // ── Gráfica 4: Monto por Eje-Objetivo (líneas, 2021-2025) ──
        var aniosEje = ['2021','2022','2023','2024','2025'];
        var ejeColores = { 'Eje 1': '#6AC72C', 'Eje 2': '#3A90C5', 'Eje 3': '#72588F', 'Eje 4': '#E14586' };
        var ejeDatos   = {
            'Eje 1': [2483.70, 2659.53, 1939.50, 2276.25, 1918.83],
            'Eje 2': [ 693.49,  737.84, 4498.88, 5015.50, 4410.60],
            'Eje 3': [  56.67,   47.57,  185.29,  684.09,  476.32],
            'Eje 4': [  81.88,   87.10,   87.70, 1133.25, 1133.54],
        };

        var ejeDatasets = Object.keys(ejeDatos).map(function(eje) {
            return {
                label: eje,
                data: ejeDatos[eje],
                borderColor: ejeColores[eje],
                backgroundColor: ejeColores[eje],
                tension: 0.3,
                pointRadius: 5,
                pointHoverRadius: 7,
                fill: false,
            };
        });

        new Chart(document.getElementById('chartEjes'), {
            type: 'line',
            data: { labels: aniosEje, datasets: ejeDatasets },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { font: { size: 11 }, boxWidth: 14, padding: 8 }
                    },
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

    })();
    </script>

    <!-- BLOQUE 4: Consulta por entidad federativa -->
    <section class="pb-5">
        <div class="container">
            <div class="card border rounded-4 shadow-sm p-4 p-md-5 pna-reveal" style="border-color: #E9ECEF !important; --delay:0s">

                <div class="row align-items-center g-4">
                    <!-- Col 1: Ícono / imagen placeholder -->
                    <div class="col-lg-2 d-flex justify-content-center">
                        <div class="d-flex align-items-center justify-content-center rounded-circle"
                             style="width: 110px; height: 110px; background-color: #F9F0F3;">
                            <i class="bi bi-map fs-1" style="color: #611232;"></i>
                        </div>
                    </div>

                    <!-- Col 2: Título + descripción -->
                    <div class="col-lg-7">
                        <h2 class="h4 fw-bold font-patria mb-2" style="color: #611232;">3. Consulta por entidad federativa</h2>
                        <p class="font-noto-sans mb-2" style="font-size: 15px; color: #333; text-align: justify;">
                            La información del Anexo Transversal 30 en materia anticorrupción por entidad federativa puede consultarse en la <strong>Dimensión de Presupuesto del Sistema de Seguimiento de la Política Nacional Anticorrupción.</strong>
                        </p>
                        <p class="font-noto-sans mb-0 text-muted" style="font-size: 14px; text-align: justify;">
                            Selecciona la entidad de tu interés para conocer la información disponible.
                        </p>
                    </div>

                    <!-- Col 3: Botón -->
                    <div class="col-lg-3 d-flex justify-content-center justify-content-lg-end">
                        <a href="#" target="_blank" rel="noopener"
                           class="d-flex align-items-center justify-content-center gap-3 text-decoration-none px-4 py-4 rounded-3"
                           style="background-color: #611232; color: #fff; max-width: 260px; width: 100%;">
                            <i class="bi bi-box-arrow-up-right flex-shrink-0" style="font-size: 1.8rem; opacity: 0.85;"></i>
                            <span class="font-noto-sans fw-semibold lh-sm" style="font-size: 15px;">
                                Consultar información<br>por entidad federativa
                            </span>
                        </a>
                    </div>
                </div>

                <!-- Nota al pie -->
                <div class="d-flex align-items-center gap-2 mt-4 pt-3 px-3 py-2 rounded-3" style="background-color: #F8F9FA; font-size: 13px; border-top: 1px solid #e9ecef;">
                    <i class="bi bi-info-circle text-muted flex-shrink-0"></i>
                    <span class="text-muted font-noto-sans">Los montos se presentan en millones de pesos corrientes.</span>
                </div>

            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
