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
                        Este Anexo Transversal identifica a los responsables y los montos de recursos públicos ejecutados a dichas tareas, permitiendo dar seguimiento al gasto anticorrupción a nivel federal.
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
            <h2 class="h2b patria color--pguinda600 mb--16">1. Documentos del Anexo Transversal Anticorrupción</h2>
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
                                    <?php if ( ! empty( $doc['file'] ) ) : ?>
                                    <a href="<?php echo esc_url( sesna_get_media_attachment_url( $doc['file'], $doc['path'] ) ); ?>"
                                       target="_blank" rel="noopener"
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
            <h2 class="h2b patria color--pguinda600 mb--16">2. Panorama del Anexo Transversal 30</h2>
            <div class="reticulaGrid__12 align-items-center mb--24">
                <div class="columna__12 columna__8--md">
                    <p class="sh1r color--neutro600 mb--0">Consulta indicadores sobre la evolución y distribución de los recursos identificados en el Anexo Transversal 30 del Presupuesto de Egresos de la Federación.</p>
                </div>
                <div class="columna__12 columna__4--md texto--derecha--md">
                    <a href="<?php echo esc_url( sesna_get_media_attachment_url( 'Datos-procesados-Anexo-Transversal-2021-2026_rev.xlsx', '' ) ); ?>"
                       class="boton__primario d-flex align-items-center gap-2" style="display: inline-flex;" download>
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
                        <h3 class="sh1b color--neutro800 mb--4">Monto de presupuesto asignado por Eje–Objetivo (2021–2025)</h3>
                        <p class="b1r mb--16">(millones de pesos)</p>
                        <canvas id="chartEjes" height="220"></canvas>
                        <div class="d-flex align-items-center gap-2 mt--8 p-2 rounded-3 fondo--azul100">
                            <i class="snd__icono snd-information icono--20 color--azul500 flex-shrink-0" aria-hidden="true"></i>
                            <span class="sdr color--azul500">Pasa el cursor sobre cada línea o punto para ver el monto y el detalle del Eje–Objetivo.</span>
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
                        box.classList.remove('muestra--ninguno');
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
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 mb--16">3. Consulta por entidad federativa</h2>

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

                <!-- Nota al pie -->
                <div class="mt--24 pt--16 texto--centro" style="border-top: 1px solid var(--neutro400);">
                    <div class="cp-nota__inner fondo--azul100 muestra--flex-linea mx--auto" style="max-width: 100%; width: 100%;">
                        <i class="snd__icono snd-information icono--20 cp-nota__icono color--azul500" aria-hidden="true"></i>
                        <span class="cp-nota__texto b1r color--azul500">Los montos se presentan en millones de pesos corrientes.</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
