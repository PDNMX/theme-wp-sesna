<?php
get_header();

// Funciones auxiliares
function print_table_headers()
{
?>
    <div class="container">
        <div class="row" id="filaTitulos">
            <div class="col-2 d-md-block d-none">
                <p>AÑO:</p>
            </div>
            <div class="col-4 d-md-block d-none">
                <p>NOMBRE:</p>
            </div>
            <div class="col-2 d-md-block d-none">
                <p>FECHA:</p>
            </div>
            <div class="col-4 d-md-block d-none">
                <p>URL DEL DOCUMENTO:</p>
            </div>
        </div>
    </div>
<?php
}

function print_empty_content()
{
?>
    <div class="container scrollbar scrollbar-primary" id="tableContainer">
        <div class="row">
            <div class="col-12 text-center">
                <p style="margin: 20px 0; color: #888; font-size: 1.2rem">
                    No hay documentos disponibles en esta sección.
                </p>
            </div>
        </div>
    </div>
<?php
}

function print_document($year, $title, $date, $url)
{
    // Obtener la extensión del archivo
    $file_extension = strtolower(pathinfo($url, PATHINFO_EXTENSION));

    // Determinar si es un archivo para descarga directa
    $is_download = in_array($file_extension, ['xlsx', 'xls', 'doc', 'docx']);

    // Determinar el texto del botón basado en el tipo de archivo
    $button_text = $is_download ? 'Descargar' : 'Da click aquí';

    // Determinar los atributos adicionales para la descarga
    $download_attrs = $is_download ? 'download' : '';
?>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12" id="year">
            <p class="year"><?php echo $year; ?></p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <p class="nombreActa" style="text-align: left; margin: 0">
                <?php echo $title; ?>
            </p>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 text-center" id="fechaContainer">
            <p class="fecha"><?php echo $date; ?></p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
            <a href="<?php echo $url; ?>"
                class="btn btn-light"
                <?php echo $download_attrs; ?>
                target="_blank">
                <?php echo $button_text; ?>
                <i class="fas <?php echo $is_download ? 'fa-download' : 'fa-link'; ?>"></i>
            </a>
        </div>
    </div>
<?php
}

function print_nav_tab($id, $icon, $text, $isActive = false)
{
    $activeClass = $isActive ? 'active' : '';
?>
    <li class="nav-item" style="flex: 1">
        <a class="nav-link <?php echo $activeClass; ?>"
            id="<?php echo $id; ?>-tab"
            data-toggle="tab"
            href="#<?php echo $id; ?>"
            role="tab"
            aria-controls="<?php echo $id; ?>"
            aria-selected="<?php echo $isActive ? 'true' : 'false'; ?>"
            style="display: flex; align-items: center; justify-content: center; font-size: 0.85rem; height: 60px; padding: 5px 10px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            <?php if ($icon): ?>
                <i class="fas fa-<?php echo $icon; ?>" style="margin-right: 8px; font-size: 1rem"></i>
            <?php endif; ?>
            <span><?php echo $text; ?></span>
        </a>
    </li>
<?php
}

// Estructura de datos
$documentos = [
    'spc' => [
        'reclutamiento' => [
            [
                'year' => '2024',
                'title' => 'Mecanismo de Reclutamiento y Selección',
                'date' => '03-09-24',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/09/MECANISMO_RECLUTAMIENTO-Y-SELECCION.pdf'
            ]
        ],
        'capacitacion' => [
            [
                'year' => '2024',
                'title' => 'Mecanismo de Necesidades de Capacitación',
                'date' => '03-09-24',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/09/MECANISMO_NECESIDADES-DE-CAPACITACION.pdf'
            ]
        ],
        'evaluacion' => [
            [
                'year' => '2024',
                'title' => 'Mecanismo de Evaluación del Desempeño',
                'date' => '03-09-24',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/09/MECANISMO_EVALUACION-DEL-DESEMPENO.pdf'
            ]
        ]
    ],
    'cultura' => [
        [
            'year' => '2025',
            'title' => 'Encuesta de Clima y Cultura Organizaciona',
            'date' => '14-01-25',
            'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2025/01/ANALISIS-ECCO-2024.pdf'
        ],
        [
            'year' => '',
            'title' => 'Prácticas de Transformación de Clima y Cultura Organizacional',
            'date' => '14-01-25',
            'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2025/01/ECCO-PTCCO.pdf'
        ]
    ],
    'igg' => [
        'informe-gestion' => [
            [
                'year' => '2024',
                'title' => 'Informe Consolidado 3° Etapa Firma CIR',
                'date' => '05-09-24',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/09/INFORME-CONSOLIDADO_3°-ETAPA_FIRMA-CIR.pdf'
            ]
        ],
        'memorias-documentales' => [
            [
                'year' => '2024',
                'title' => 'Memoria ATA',
                'date' => '05-09-24',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/09/Memoria-ATA.pdf'
            ],
            [
                'year' => '',
                'title' => 'Memoria PDN',
                'date' => '05-09-24',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/09/Memoria-PDN.pdf'
            ],
            [
                'year' => '',
                'title' => 'Memoria PNA',
                'date' => '05-09-24',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/09/Memoria-PNA.pdf'
            ],
            [
                'year' => '',
                'title' => 'Memoria Riesgos',
                'date' => '05-09-24',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/09/Memoria-RIESGOS.pdf'
            ]
        ]
    ],
    'cpc' => [
        'informes-mensuales' => [
            [
                'year' => '2024',
                'title' => '001. INFORME MENSUAL DE ACTIVIDADES',
                'date' => 'OCTUBRE',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/11/001.-INFORME-MENSUAL-DE-ACTIVIDADES_OCTUBRE-2024.pdf'
            ],
            [
                'year' => '',
                'title' => '002. INFORME MENSUAL DE ACTIVIDADES',
                'date' => 'OCTUBRE',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/11/002.-INFORME-MENSUAL-DE-ACTIVIDADES_OCTUBRE-2024.pdf'
            ],
            [
                'year' => '',
                'title' => '003. INFORME MENSUAL DE ACTIVIDADES',
                'date' => 'OCTUBRE',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/11/003.-INFORME-MENSUAL-DE-ACTIVIDADES_OCTUBRE-2024.pdf'
            ],
            [
                'year' => '',
                'title' => '004. INFORME MENSUAL DE ACTIVIDADES',
                'date' => 'OCTUBRE',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/11/004.-INFORME-MENSUAL-DE-ACTIVIDADES_OCTUBRE-2024.pdf'
            ],
            [
                'year' => '',
                'title' => '001. INFORME MENSUAL DE ACTIVIDADES',
                'date' => 'SEPTIEMBRE',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/11/001.-INFORME-MENSUAL-DE-ACTIVIDADES_SEPTIEMBRE-2024.pdf'
            ],
            [
                'year' => '',
                'title' => '002. INFORME MENSUAL DE ACTIVIDADES',
                'date' => 'SEPTIEMBRE',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/11/002.-INFORME-MENSUAL-DE-ACTIVIDADES_SEPTIEMBRE-2024.pdf'
            ],
            [
                'year' => '',
                'title' => '003. INFORME MENSUAL DE ACTIVIDADES',
                'date' => 'SEPTIEMBRE',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/11/003.-INFORME-MENSUAL-DE-ACTIVIDADES_SEPTIEMBRE-2024.pdf'
            ],
            [
                'year' => '',
                'title' => '004. INFORME MENSUAL DE ACTIVIDADES',
                'date' => 'SEPTIEMBRE',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/11/004.-INFORME-MENSUAL-DE-ACTIVIDADES_SEPTIEMBRE-2024.pdf'
            ],
            [
                'year' => '',
                'title' => '001. INFORME MENSUAL DE ACTIVIDADES',
                'date' => 'AGOSTO',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/09/001.-INFORME-MENSUAL-DE-ACTIVIDADES_AGOSTO-2024.pdf'
            ],
            [
                'year' => '',
                'title' => '002. INFORME MENSUAL DE ACTIVIDADES',
                'date' => 'AGOSTO',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/09/002.-INFORME-MENSUAL-DE-ACTIVIDADES_AGOSTO-2024.pdf'
            ],
            [
                'year' => '',
                'title' => '003. INFORME MENSUAL DE ACTIVIDADES',
                'date' => 'AGOSTO',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/09/003.-INFORME-MENSUAL-DE-ACTIVIDADES_AGOSTO-2024.pdf'
            ],
            [
                'year' => '',
                'title' => '004. INFORME MENSUAL DE ACTIVIDADES',
                'date' => 'AGOSTO',
                'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/09/004.-INFORME-MENSUAL-DE-ACTIVIDADES_AGOSTO-2024.pdf'
            ]
        ]
    ],
    'otros' => [
        [
            'year' => '2025',
            'title' => 'Formato de autorización individual de vacaciones',
            'date' => '31-01-25',
            'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2025/01/FORMATO-AUTORIZACION-INDIVIDUAL-DE-VACACIONES.xlsx'
        ],
        [
            'year' => '2024',
            'title' => 'Lineamientos específicos SESNA',
            'date' => '22-11-24',
            'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/11/Lineamientos-especificos-relativos-al-control-y-registro-de-asistencia-del-personal-adscrito-a-la-SESNA.pdf'
        ],
        [
            'year' => '',
            'title' => 'PNAP 2024',
            'date' => '24-10-24',
            'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/10/INFORME-PNAP-2024.pdf'
        ]
    ]
];
?>

<!-- Banner principal -->
<div style="background-color: #54565a; position: relative; z-index: 10; padding: 80px 0; background-image: url('/wp-content/themes/sesna-300819-2/img/pna/banner.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="d-flex align-items-center justify-content-center text-center">
        <div style="padding: 20px; background-color: rgba(0, 0, 0, 0.5); border-radius: 10px;">
            <h1 style="color: #fff; max-width: 660px; margin: 0 auto; line-height: 1.4; font-size: 2.5rem; font-weight: bold;">
                <span style="color: #c22521">R</span>ecursos <br />
                <span style="color: #c22521">H</span>umanos
            </h1>
        </div>
    </div>
</div>

<!-- Navegación principal -->
<div class="container" id="comiteTransparencia">
    <ul class="nav nav-tabs d-flex justify-content-between flex-nowrap" id="myTab" role="tablist" style="margin-bottom: 5px">
        <?php
        $main_tabs = [
            ['id' => 'home', 'icon' => 'file', 'text' => 'Ingresos', 'active' => true],
            ['id' => 'spc', 'icon' => 'folder', 'text' => 'SPC'],
            ['id' => 'servicio', 'icon' => 'users', 'text' => 'Servicio Social'],
            ['id' => 'cultura', 'icon' => 'people-carry', 'text' => 'Cultura Organizacional'],
            ['id' => 'igg', 'icon' => 'chart-line', 'text' => 'IGG 2018-2024'],
            ['id' => 'cpc', 'icon' => 'users', 'text' => 'CPC'],
            ['id' => 'otros', 'icon' => 'ellipsis-h', 'text' => 'Otros']
        ];

        foreach ($main_tabs as $tab) {
            print_nav_tab($tab['id'], $tab['icon'], $tab['text'], isset($tab['active']));
        }
        ?>
    </ul>

    <!-- Contenido de las pestañas -->
    <div class="tab-content" id="myTabContent">
        <!-- Pestaña Ingresos -->
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?php
            print_table_headers();
            print_empty_content();
            ?>
        </div>

        <!-- Pestaña SPC -->
        <div class="tab-pane fade" id="spc" role="tabpanel" aria-labelledby="spc-tab">
            <div class="container" style="padding: 0">
                <!-- Submenú SPC -->
                <ul class="nav nav-tabs d-flex justify-content-between flex-wrap" id="tab-spc" role="tablist" style="margin-bottom: 5px; padding: 0">
                    <?php
                    $spc_tabs = [
                        ['id' => 'planeacion', 'text' => 'Planeación de<br>Recursos Humanos', 'active' => true],
                        ['id' => 'reclutamiento', 'text' => 'Reclutamiento y<br>Selección'],
                        ['id' => 'ingreso', 'text' => 'Ingreso'],
                        ['id' => 'desarrollo', 'text' => 'Desarrollo de las<br>Capacidades Profesionales'],
                        ['id' => 'capacitacion', 'text' => 'Capacitación'],
                        ['id' => 'evaluacion', 'text' => 'Evaluación del<br>Desempeño'],
                        ['id' => 'separacion', 'text' => 'Separación']
                    ];

                    foreach ($spc_tabs as $tab) {
                        print_nav_tab($tab['id'], '', $tab['text'], isset($tab['active']));
                    }
                    ?>
                </ul>

                <!-- Contenido subpestañas SPC -->
                <div class="tab-content" id="tab-spc-content">
                    <?php foreach ($spc_tabs as $tab): ?>
                        <div class="tab-pane fade <?php echo isset($tab['active']) ? 'show active' : ''; ?>"
                            id="<?php echo $tab['id']; ?>"
                            role="tabpanel"
                            aria-labelledby="<?php echo $tab['id']; ?>-tab">
                            <?php
                            print_table_headers();
                            if (isset($documentos['spc'][$tab['id']]) && !empty($documentos['spc'][$tab['id']])) {
                                echo '<div class="container scrollbar scrollbar-primary" id="tableContainer">';
                                foreach ($documentos['spc'][$tab['id']] as $doc) {
                                    print_document($doc['year'], $doc['title'], $doc['date'], $doc['url']);
                                }
                                echo '</div>';
                            } else {
                                print_empty_content();
                            }
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Pestaña Servicio Social -->
        <div class="tab-pane fade" id="cultura" role="tabpanel" aria-labelledby="cultura-tab">
            <?php
            print_table_headers();
            if (isset($documentos['cultura']) && !empty($documentos['cultura'])) {
                echo '<div class="container scrollbar scrollbar-primary" id="tableContainer">';
                foreach ($documentos['cultura'] as $doc) {
                    print_document($doc['year'], $doc['title'], $doc['date'], $doc['url']);
                }
                echo '</div>';
            } else {
                print_empty_content();
            }
            ?>
        </div>

        <!-- Pestaña IGG -->
        <div class="tab-pane fade" id="igg" role="tabpanel" aria-labelledby="igg-tab">
            <div class="container" style="padding: 0">
                <!-- Submenú IGG -->
                <ul class="nav nav-tabs d-flex justify-content-between flex-wrap" role="tablist" style="margin-bottom: 5px; padding: 0">
                    <!-- Continuación del submenú IGG -->
                    <li class="nav-item" style="flex: 1">
                        <a class="nav-link active" id="informe-gestion-tab" data-toggle="tab" href="#informe-gestion" role="tab"
                            aria-controls="informe-gestion" aria-selected="true"
                            style="display: flex; align-items: center; justify-content: center; font-size: 0.8rem; height: 50px; padding: 0 2px; text-align: center;">
                            <span>Informe de Gestión</span>
                        </a>
                    </li>
                    <li class="nav-item" style="flex: 1">
                        <a class="nav-link" id="memorias-documentales-tab" data-toggle="tab" href="#memorias-documentales" role="tab"
                            aria-controls="memorias-documentales" aria-selected="false"
                            style="display: flex; align-items: center; justify-content: center; font-size: 0.8rem; height: 50px; padding: 0 2px; text-align: center;">
                            <span>Memorias Documentales</span>
                        </a>
                    </li>
                </ul>

                <!-- Contenido subpestañas IGG -->
                <div class="tab-content" id="tab-igg-content">
                    <!-- Sección Informe de Gestión -->
                    <div class="tab-pane fade show active" id="informe-gestion" role="tabpanel" aria-labelledby="informe-gestion-tab">
                        <?php
                        print_table_headers();
                        if (isset($documentos['igg']['informe-gestion']) && !empty($documentos['igg']['informe-gestion'])) {
                            echo '<div class="container scrollbar scrollbar-primary" id="tableContainer">';
                            foreach ($documentos['igg']['informe-gestion'] as $doc) {
                                print_document($doc['year'], $doc['title'], $doc['date'], $doc['url']);
                            }
                            echo '</div>';
                        } else {
                            print_empty_content();
                        }
                        ?>
                    </div>

                    <!-- Sección Memorias Documentales -->
                    <div class="tab-pane fade" id="memorias-documentales" role="tabpanel" aria-labelledby="memorias-documentales-tab">
                        <?php
                        print_table_headers();
                        if (isset($documentos['igg']['memorias-documentales']) && !empty($documentos['igg']['memorias-documentales'])) {
                            echo '<div class="container scrollbar scrollbar-primary" id="tableContainer">';
                            foreach ($documentos['igg']['memorias-documentales'] as $doc) {
                                print_document($doc['year'], $doc['title'], $doc['date'], $doc['url']);
                            }
                            echo '</div>';
                        } else {
                            print_empty_content();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pestaña CPC -->
        <div class="tab-pane fade" id="cpc" role="tabpanel" aria-labelledby="cpc-tab">
            <div class="container" style="padding: 0">
                <!-- Submenú CPC -->
                <ul class="nav nav-tabs d-flex justify-content-between flex-wrap" role="tablist" style="margin-bottom: 5px; padding: 0">
                    <li class="nav-item" style="flex: 1">
                        <a class="nav-link active" id="informes-mensuales-tab" data-toggle="tab" href="#informes-mensuales" role="tab"
                            aria-controls="informes-mensuales" aria-selected="true"
                            style="display: flex; align-items: center; justify-content: center; font-size: 0.8rem; height: 50px; padding: 0 2px; text-align: center;">
                            <span>Informes Mensuales de Actividades</span>
                        </a>
                    </li>
                </ul>

                <!-- Contenido CPC -->
                <div class="tab-content" id="tab-cpc-content">
                    <div class="tab-pane fade show active" id="informes-mensuales" role="tabpanel" aria-labelledby="informes-mensuales-tab">
                        <?php
                        print_table_headers();
                        if (isset($documentos['cpc']['informes-mensuales']) && !empty($documentos['cpc']['informes-mensuales'])) {
                            echo '<div class="container scrollbar scrollbar-primary" id="tableContainer">';
                            foreach ($documentos['cpc']['informes-mensuales'] as $doc) {
                                print_document($doc['year'], $doc['title'], $doc['date'], $doc['url']);
                            }
                            echo '</div>';
                        } else {
                            print_empty_content();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pestaña Otros -->
        <div class="tab-pane fade" id="otros" role="tabpanel" aria-labelledby="otros-tab">
            <?php
            print_table_headers();
            if (isset($documentos['otros']) && !empty($documentos['otros'])) {
                echo '<div class="container scrollbar scrollbar-primary" id="tableContainer">';
                foreach ($documentos['otros'] as $doc) {
                    print_document($doc['year'], $doc['title'], $doc['date'], $doc['url']);
                }
                echo '</div>';
            } else {
                print_empty_content();
            }
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>