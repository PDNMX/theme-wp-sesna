<?php
/**
 * Template Name: PNA - Implementación
 *
 * @package sesna
 */
get_header();

$ejes_data = [
    1 => [
        'color'       => '#6AC72C',
        'titulo'      => 'Combatir la corrupción y la impunidad',
        'desc'        => 'Busca fortalecer las capacidades del Estado para prevenir, detectar, investigar y sancionar los actos de corrupción, así como combatir la impunidad que lo permite y perpetúa.',
        'estrategias' => 15,
        'lineas'      => 35,
        'objetivos'   => [
            ['num'=>1,'texto'=>'Promover los mecanismos de coordinación de las autoridades competentes para la mejora de los procesos de prevención, denuncia, detección, investigación, substanciación y sanción de faltas administrativas y hechos de corrupción.'],
            ['num'=>2,'texto'=>'Fortalecer las capacidades institucionales para el desahogo de carpetas de investigación y causas penales en materia de delitos por hechos de corrupción.'],
        ],
    ],
    2 => [
        'color'       => '#72588F',
        'titulo'      => 'Combatir la arbitrariedad y el abuso de poder',
        'desc'        => 'Busca disminuir los márgenes de arbitrariedad en el servicio público mediante mecanismos de profesionalización, integridad, control interno, auditoría, fiscalización, rendición de cuentas en el uso de recursos públicos y en la operación de procesos institucionales clave.',
        'estrategias' => 20,
        'lineas'      => 44,
        'objetivos'   => [
            ['num'=>3,'texto'=>'Fortalecer el servicio público mediante servicios profesionales de carrera y mecanismos de integridad a escala nacional, bajo principios de mérito, eficiencia, consistencia estructural, capacidad funcional, ética e integridad.'],
            ['num'=>4,'texto'=>'Fomentar el desarrollo y aplicación de procesos estandarizados de planeación presupuestación y ejercicio del gasto con un enfoque de máxima publicidad y participación de la sociedad en la gestión de riesgos y el fomento de la integridad empresarial.'],
            ['num'=>5,'texto'=>'Fortalecer los mecanismos de homologación de sistemas, principios, prácticas y capacidades de auditoría, fiscalización, control interno y rendición de cuentas a escala nacional.'],
        ],
    ],
    3 => [
        'color'       => '#3A90C5',
        'titulo'      => 'Promover la mejora de la gestión pública y de los puntos de contacto gobierno-sociedad',
        'desc'        => 'Busca fortalecer los puntos de contacto, espacios de interacción y esquemas de relación entre los entes públicos y distintos sectores de la sociedad, a fin de contener sus riesgos de corrupción.',
        'estrategias' => 16,
        'lineas'      => 36,
        'objetivos'   => [
            ['num'=>6,'texto'=>'Promover la implementación de esquemas que erradiquen áreas de riesgo que propician la corrupción en las interacciones que establecen ciudadanos y empresas con el gobierno al realizar trámites, y acceder a programas y servicios públicos.'],
            ['num'=>7,'texto'=>'Impulsar la adopción y homologación de reglas en materia de contrataciones públicas, asociaciones público-privadas y cabildeo, que garanticen interacciones íntegras e imparciales entre gobierno y sector privado.'],
        ],
    ],
    4 => [
        'color'       => '#E14586',
        'titulo'      => 'Involucrar a la sociedad y el sector privado',
        'desc'        => 'Busca incentivar el involucramiento de diversos sectores de la sociedad en el control de la corrupción mediante el fortalecimiento e institucionalización de mecanismos de participación, vigilancia y autorregulación social, bajo un enfoque incluyente y con perspectiva de género.',
        'estrategias' => 13,
        'lineas'      => 25,
        'objetivos'   => [
            ['num'=>8,'texto'=>'Impulsar el desarrollo de mecanismos efectivos de participación que favorezcan el involucramiento social en el control de la corrupción, así como en la vigilancia y rendición de cuentas de las decisiones de gobierno.'],
            ['num'=>9,'texto'=>'Promover la adopción y aplicación de principios, políticas y programas de integridad y anticorrupción en el sector privado.'],
            ['num'=>10,'texto'=>'Fomentar la socialización y adopción de valores prácticos relevantes en la sociedad para el control de la corrupción.'],
        ],
    ],
];

$fichero_pdfs = [
    2023 => [1=>'Fichas-Eje1-2023.pdf', 2=>'Fichas-Eje2-2023.pdf', 3=>'Fichas-Eje3-2023.pdf', 4=>'Fichas-Eje4-2023.pdf'],
    2024 => [1=>'Fichas-Eje1-2024.pdf', 2=>'Fichas-Eje2-2024.pdf', 3=>'Fichas-Eje3-2024.pdf', 4=>'Fichas-Eje4-2024.pdf'],
    2025 => [1=>'Fichas-Eje1-2025.pdf', 2=>'Fichas-Eje2-2025.pdf', 3=>'Fichas-Eje3-2025.pdf', 4=>'Fichas-Eje4-2025.pdf'],
];
$fichero_url_map = [];
foreach ($fichero_pdfs as $anio => $ejes) {
    foreach ($ejes as $eje => $fname) {
        $fichero_url_map[$anio][$eje] = sesna_get_media_attachment_url($fname, '') ?: '';
    }
}
?>

<div class="page-pna page-pna-implementacion">

    <!-- Breadcrumb -->
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>"><i class="snd snd-home" aria-hidden="true"></i> Inicio</a></li>
                <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/acciones-y-programas/')); ?>">Acciones y Programas</a></li>
                <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/acciones-y-programas/politica-nacional-anticorrupcion/')); ?>">Política Nacional Anticorrupción</a></li>
                <li class="breadcrumb-item active" aria-current="page">Implementación</li>
            </ol>
        </div>
    </nav>

    <!-- ── BLOQUE 1: Hero ──────────────────────────────────────── -->
    <section class="pt-4 pb-5">
        <div class="container">
            <div class="row g-4 align-items-start justify-content-between">
                <div class="col-lg-7 col-xl-7 pna-reveal" style="--delay:0s">
                    <h2 class="fw-bold font-patria text-burgundi mb-3">Implementación</h2>
                    <p class="text-muted mb-4">
                        En esta sección se presenta el Programa de Implementación de la Política Nacional Anticorrupción (PI-PNA), instrumento que traduce las prioridades de la PNA en estrategias, líneas de acción e indicadores para orientar su ejecución y seguimiento.
                    </p>
                </div>
                <div class="col-lg-5 col-xl-5 d-flex justify-content-lg-end justify-content-center align-items-center mt-5 mt-lg-0 pna-reveal" style="--delay:.25s">
                    <i class="snd snd-settings" style="font-size: 220px; color: #3A90C5; opacity: 0.15;"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- ── BLOQUE 2: PI-PNA ────────────────────────────────────── -->
    <section class="pb-5">
        <div class="container">
            <div class="pna-doc-card pna-chart-card" style="--delay:0s;">
                <div class="row align-items-stretch" style="display:flex; flex-wrap:wrap; gap:1.5rem;">

                    <!-- Izquierda: título + texto + botón -->
                    <div class="col-lg-6 d-flex flex-column justify-content-between" style="flex:1 1 50%; min-width:280px; border-right:2px solid #e8d0d8; padding-right:2rem;">
                        <div>
                            <h2 class="cp-recursos__titulo mb-1">Programa de Implementación de la Política Nacional Anticorrupción</h2>
                            <div class="cp-recursos__linea mb-3"></div>

                            <p class="pna-doc-desc mb-2">
                                El Programa de Implementación de la Política Nacional Anticorrupción (PI-PNA) es el instrumento técnico mediante el cual se operacionalizan las prioridades establecidas en la PNA a través de estrategias, líneas de acción e indicadores de desempeño, articulando la participación de las instituciones responsables y permitiendo el seguimiento a los avances en el cumplimiento de los objetivos.
                            </p>
                            <p class="pna-doc-desc mb-0">
                                Su ejecución se concibe como un proceso coordinado, flexible y sujeto a mejora continua, en que la información generada permite identificar avances y áreas de oportunidad para realizar, con base en evidencia, los ajustes necesarios.
                            </p>
                        </div>

                        <a href="#" class="btn-sesna mt-4"
                           data-bs-toggle="modal" data-bs-target="#pdfViewerModal"
                           data-pdf-url="<?php echo esc_url(sesna_get_media_attachment_url('PI-PNA_actualizacion-indicadores_2024-1.pdf','2024/03/PI-PNA_actualizacion-indicadores_2024-1.pdf')); ?>"
                           data-pdf-title="PI-PNA – Actualización 2024">
                            <i class="snd snd-screen" aria-hidden="true"></i> Consultar PI-PNA (Actualización 2024)
                        </a>
                    </div>

                    <!-- Derecha: fecha + portada (ocupa todo el alto) -->
                    <div class="col-lg-6 d-flex flex-column" style="flex:0 0 45%; min-width:240px; padding-left:2rem;">
                        <div class="pna-hero__badge mb-3">
                            <span class="pna-hero__badge-icon" aria-hidden="true">
                                <i class="snd snd-calendar"></i>
                            </span>
                            <div>
                                <p class="pna-hero__badge-title">Aprobado el 27 de enero de 2022</p>
                                <p class="pna-hero__badge-desc">por el Comité Coordinador del Sistema Nacional Anticorrupción.</p>
                            </div>
                        </div>
                        <a href="#" class="pna-doc-cover flex-grow-1 text-decoration-none d-flex"
                           data-bs-toggle="modal" data-bs-target="#pdfViewerModal"
                           data-pdf-url="<?php echo esc_url(sesna_get_media_attachment_url('PI-PNA_actualizacion-indicadores_2024-1.pdf','2024/03/PI-PNA_actualizacion-indicadores_2024-1.pdf')); ?>"
                           data-pdf-title="PI-PNA – Actualización 2024"
                           title="Consultar PI-PNA (Actualización 2024)"
                           style="cursor:pointer;">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/pna_portada.png' ); ?>" alt="Portada Programa de Implementación de la PNA">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ── BLOQUE 3: Estructura ────────────────────────────────── -->
    <section class="pb-5">
        <div class="container">

            <!-- Card única: Título + Fases + Donut -->
            <div class="pna-doc-card pna-chart-card" style="--delay:.05s;">

                <div class="cp-recursos__header mb-4">
                    <div>
                        <h2 class="cp-recursos__titulo mb-0">Estructura del Programa de Implementación</h2>
                        <div class="cp-recursos__linea"></div>
                    </div>
                </div>

                <!-- 5 Fases – Chevron + portada -->
                <p class="font-noto-sans fw-semibold mb-3" style="font-size: 11px; color: #999; text-transform: uppercase; letter-spacing: .07em;">
                    Proceso de integración del proyecto de <span style="color:#611232;">Programa de Implementación</span>
                </p>
                <?php
                $fases = [
                    'Planeación',
                    'Primera ronda de mesas de trabajo',
                    'Borrador del Programa de Implementación',
                    'Segunda ronda de mesas de trabajo',
                    'Integración y aprobación del PI-PNA por parte del CC-SNA',
                ];
                $total      = count($fases);
                $depth      = 18;
                $color_fase = '#3A90C5';
                $r          = 6;
                ?>
                <div style="display:flex; align-items:center; gap:16px;">

                    <!-- Flechas -->
                    <div style="flex:1; display:flex; align-items:stretch; gap:0; border-radius:6px; overflow:hidden;">
                        <?php foreach ($fases as $i => $titulo) :
                            $first = ($i === 0);
                            if ($first) {
                                $clip = "polygon(0 0, calc(100% - {$depth}px) 0, 100% 50%, calc(100% - {$depth}px) 100%, 0 100%)";
                                $pl = '12px';
                            } else {
                                $clip = "polygon(0 0, calc(100% - {$depth}px) 0, 100% 50%, calc(100% - {$depth}px) 100%, 0 100%, {$depth}px 50%)";
                                $pl = ($depth + 10) . 'px';
                            }
                            $pr = ($depth + 6) . 'px';
                        ?>
                        <div class="font-noto-sans d-flex flex-column align-items-start justify-content-center"
                             style="flex:1; min-height:56px; padding:4px <?php echo $pr; ?> 4px <?php echo $pl; ?>;
                                    background:<?php echo $color_fase; ?>;
                                    clip-path:<?php echo $clip; ?>;
                                    color:#fff;">
                            <span style="display:block; font-size:9px; font-weight:900; letter-spacing:.05em; margin-bottom:2px; line-height:1; text-transform:uppercase;">Fase <?php echo $i + 1; ?>:</span>
                            <span style="display:block; font-size:10px; line-height:1.3; font-weight:600;"><?php echo esc_html($titulo); ?></span>
                        </div>
                        <?php endforeach; ?>
                        <!-- Flecha gris de cierre -->
                        <div style="width:22px; min-height:56px; flex-shrink:0; background:#c8c8c8;
                                    clip-path:polygon(0 0, calc(100% - <?php echo $depth; ?>px) 0, 100% 50%, calc(100% - <?php echo $depth; ?>px) 100%, 0 100%, <?php echo $depth; ?>px 50%);">
                        </div>
                    </div>

                    <!-- Portada -->
                    <div style="flex-shrink:0; display:flex; align-items:center; justify-content:center; align-self:center;">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/pna_portada.png' ); ?>"
                             alt="Portada PI-PNA"
                             style="width:125px; display:block; object-fit:contain;">
                    </div>

                </div>

                <hr class="my-4" style="border-color:#f0e8ec;">

                <!-- Donut 4 ejes -->
                <div class="row align-items-stretch g-4">

                    <!-- Izquierda: Eje 1 y 3 -->
                    <div class="col-lg-3 col-md-3 d-flex flex-column" style="gap:20px; justify-content:space-evenly;">
                        <?php foreach ([1,3] as $n) :
                            $e = $ejes_data[$n];
                        ?>
                        <div class="eje-btn font-noto-sans" role="button" tabindex="snd-star"
                             data-eje="<?php echo $n; ?>" data-color="<?php echo esc_attr($e['color']); ?>"
                             style="display:flex; align-items:center; gap:12px; cursor:pointer; transition:all .2s;
                                    border-radius:10px; padding:14px 14px; flex:1;
                                    background-color:<?php echo $e['color']; ?>18;
                                    border: 2px solid <?php echo $e['color']; ?>;
                                    --eje-color:<?php echo $e['color']; ?>66;">
                            <div style="background-color:<?php echo $e['color']; ?>; color:white; text-align:center;
                                        padding:6px 10px 8px; border-radius:6px; flex-shrink:0; min-width:48px; line-height:1.1;">
                                <div style="font-size:9px; font-weight:700; letter-spacing:.06em; text-transform:uppercase;">Eje</div>
                                <div style="font-size:26px; font-weight:900; line-height:1;"><?php echo $n; ?></div>
                            </div>
                            <div style="flex:1;">
                                <div style="font-size:13px; font-weight:700; color:#333; line-height:1.35;"><?php echo esc_html($e['titulo']); ?></div>
                                <div style="height:2.5px; background-color:<?php echo $e['color']; ?>; margin-top:8px; width:36px; border-radius:2px;"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Centro: SVG donut -->
                    <div class="col-lg-6 col-md-6 d-flex justify-content-center">
                        <div class="position-relative" style="width:300px;height:300px;">
                            <svg viewBox="0 0 320 320" xmlns="http://www.w3.org/2000/svg" width="300" height="300" style="display:block;">
                                <!-- Eje 1: top-left -->
                                <path d="M 20 160 A 140 140 0 0 1 160 20 L 160 70 A 90 90 0 0 0 70 160 Z"
                                      fill="#6AC72C" class="eje-segment" data-eje="1" style="cursor:pointer;transition:opacity .2s;" opacity="0.9"/>
                                <!-- Eje 2: top-right -->
                                <path d="M 160 20 A 140 140 0 0 1 300 160 L 250 160 A 90 90 0 0 0 160 70 Z"
                                      fill="#72588F" class="eje-segment" data-eje="2" style="cursor:pointer;transition:opacity .2s;" opacity="0.9"/>
                                <!-- Eje 3: bottom-left -->
                                <path d="M 160 300 A 140 140 0 0 1 20 160 L 70 160 A 90 90 0 0 0 160 250 Z"
                                      fill="#3A90C5" class="eje-segment" data-eje="3" style="cursor:pointer;transition:opacity .2s;" opacity="0.9"/>
                                <!-- Eje 4: bottom-right -->
                                <path d="M 300 160 A 140 140 0 0 1 160 300 L 160 250 A 90 90 0 0 0 250 160 Z"
                                      fill="#E14586" class="eje-segment" data-eje="4" style="cursor:pointer;transition:opacity .2s;" opacity="0.9"/>
                                <!-- Separadores blancos -->
                                <line x1="160" y1="20"  x2="160" y2="70"  stroke="white" stroke-width="4"/>
                                <line x1="160" y1="250" x2="160" y2="300" stroke="white" stroke-width="4"/>
                                <line x1="20"  y1="160" x2="70"  y2="160" stroke="white" stroke-width="4"/>
                                <line x1="250" y1="160" x2="300" y2="160" stroke="white" stroke-width="4"/>
                                <!-- Círculo central -->
                                <circle cx="160" cy="160" r="88" fill="white" stroke="#eee" stroke-width="2"/>
                            </svg>
                            <!-- Íconos sobre segmentos -->
                            <div style="position:absolute; top:74px; left:74px; transform:translate(-50%,-50%); color:white; font-size:21px; pointer-events:none; filter:drop-shadow(0 1px 3px rgba(0,0,0,.3));">
                                <i class="snd snd-security"></i>
                            </div>
                            <div style="position:absolute; top:74px; left:226px; transform:translate(-50%,-50%); color:white; font-size:21px; pointer-events:none; filter:drop-shadow(0 1px 3px rgba(0,0,0,.3));">
                                <i class="snd snd-building"></i>
                            </div>
                            <div style="position:absolute; top:226px; left:74px; transform:translate(-50%,-50%); color:white; font-size:21px; pointer-events:none; filter:drop-shadow(0 1px 3px rgba(0,0,0,.3));">
                                <i class="snd snd-group"></i>
                            </div>
                            <div style="position:absolute; top:226px; left:226px; transform:translate(-50%,-50%); color:white; font-size:21px; pointer-events:none; filter:drop-shadow(0 1px 3px rgba(0,0,0,.3));">
                                <i class="snd snd-collaborate"></i>
                            </div>
                            <!-- Texto central -->
                            <div class="position-absolute top-50 start-50 translate-middle text-center px-1" style="width:155px;pointer-events:none;">
                                <i class="snd snd-user d-block mb-1" style="font-size:22px; color:#611232;"></i>
                                <div class="font-noto-sans fw-bold mb-1" style="font-size:9px;color:#611232;letter-spacing:.02em;">Objetivo de la PNA:</div>
                                <div class="font-noto-sans" style="font-size:8px;color:#444;line-height:1.4;">
                                    "Incapacidad para controlar la corrupción, esto es, prevenirla, detectarla y sancionarla eficazmente".
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Derecha: Eje 2 y 4 -->
                    <div class="col-lg-3 col-md-3 d-flex flex-column" style="gap:20px; justify-content:space-evenly;">
                        <?php foreach ([2,4] as $n) :
                            $e = $ejes_data[$n];
                        ?>
                        <div class="eje-btn font-noto-sans" role="button" tabindex="snd-star"
                             data-eje="<?php echo $n; ?>" data-color="<?php echo esc_attr($e['color']); ?>"
                             style="display:flex; align-items:center; gap:12px; cursor:pointer; transition:all .2s;
                                    border-radius:10px; padding:14px 14px; flex:1;
                                    background-color:<?php echo $e['color']; ?>18;
                                    border: 2px solid <?php echo $e['color']; ?>;
                                    --eje-color:<?php echo $e['color']; ?>66;">
                            <div style="background-color:<?php echo $e['color']; ?>; color:white; text-align:center;
                                        padding:6px 10px 8px; border-radius:6px; flex-shrink:0; min-width:48px; line-height:1.1;">
                                <div style="font-size:9px; font-weight:700; letter-spacing:.06em; text-transform:uppercase;">Eje</div>
                                <div style="font-size:26px; font-weight:900; line-height:1;"><?php echo $n; ?></div>
                            </div>
                            <div style="flex:1;">
                                <div style="font-size:13px; font-weight:700; color:#333; line-height:1.35;"><?php echo esc_html($e['titulo']); ?></div>
                                <div style="height:2.5px; background-color:<?php echo $e['color']; ?>; margin-top:8px; width:36px; border-radius:2px;"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <p class="text-center font-noto-sans text-muted mt-3 mb-3" style="font-size:13px;">
                    <i class="snd snd-screen me-1"></i> Selecciona un <strong>eje</strong> para conocer sus objetivos específicos, número de estrategias y líneas de acción.
                </p>

                <!-- Paneles de eje -->
                <?php foreach ($ejes_data as $n => $e) : ?>
                <div id="ejePanel<?php echo $n; ?>" class="eje-panel d-none mt-2 p-4 rounded-3"
                     style="background-color:<?php echo $e['color']; ?>10; border:1.5px solid <?php echo $e['color']; ?>50;">
                    <div class="row g-4">
                        <div class="col-lg-5">
                            <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                                <span class="badge fw-bold px-3 py-2" style="background-color:<?php echo $e['color']; ?>; font-size:13px;">Eje <?php echo $n; ?></span>
                                <span class="fw-bold font-noto-sans" style="font-size:14px;color:#333;"><?php echo esc_html($e['titulo']); ?></span>
                            </div>
                            <p class="font-noto-sans mb-3" style="font-size:13px;color:#555;text-align:justify;"><?php echo esc_html($e['desc']); ?></p>
                            <div class="d-flex gap-3">
                                <div class="text-center px-4 py-2 rounded-3" style="background-color:<?php echo $e['color']; ?>;color:#fff;">
                                    <div class="fw-bold" style="font-size:22px;"><?php echo $e['estrategias']; ?></div>
                                    <div style="font-size:11px;">Estrategias</div>
                                </div>
                                <div class="text-center px-4 py-2 rounded-3" style="background-color:#611232;color:#fff;">
                                    <div class="fw-bold" style="font-size:22px;"><?php echo $e['lineas']; ?></div>
                                    <div style="font-size:11px;">Líneas de<br>Acción</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="fw-semibold font-noto-sans mb-3" style="font-size:12px;color:#777;text-transform:uppercase;letter-spacing:.04em;">Objetivos específicos asociados</div>
                            <?php foreach ($e['objetivos'] as $obj) : ?>
                            <div class="d-flex gap-3 mb-3 align-items-start">
                                <span class="badge rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                      style="background-color:<?php echo $e['color']; ?>;width:24px;height:24px;font-size:11px;min-width:24px;"><?php echo $obj['num']; ?></span>
                                <p class="font-noto-sans mb-0" style="font-size:13px;color:#444;text-align:justify;"><?php echo esc_html($obj['texto']); ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ── BLOQUE 4: Documentos e informes ────────────────────── -->
    <section class="pb-5">
        <div class="container">
            <div class="cp-recursos__header mb-4 pna-reveal" style="--delay:0s">
                <div>
                    <h2 class="cp-recursos__titulo mb-0">Documentos e informes del PI-PNA</h2>
                    <div class="cp-recursos__linea"></div>
                </div>
            </div>
            <?php
            $docs_cols = [
                ['icono'=>'snd-document','titulo'=>'Programa','desc'=>'Versiones del Programa de Implementación de la PNA.','color'=>'#3A90C5','docs'=>[
                    ['label'=>'PI-PNA aprobado 2022','nota'=>'Versión original aprobada por el CC-SNA','file'=>'PI_PNA_aprobado.pdf','path'=>'2022/09/PI_PNA_aprobado.pdf'],
                    ['label'=>'Actualización 2024','nota'=>'Actualización de indicadores','file'=>'PI-PNA_actualizacion-indicadores_2024-1.pdf','path'=>'2024/03/PI-PNA_actualizacion-indicadores_2024-1.pdf'],
                ]],
                ['icono'=>'snd-data--table','titulo'=>'Informes','desc'=>'Seguimiento a la ejecución del PI-PNA por periodo.','color'=>'#72588F','docs'=>[
                    ['label'=>'Primer Informe','nota'=>'Resultados al 28 de abril de 2023','file'=>'Primer-Informe-de-ejecucion-del-PI-PNA-28.04.2023.pdf','path'=>'2023/04/Primer-Informe-de-ejecucion-del-PI-PNA-28.04.2023.pdf'],
                    ['label'=>'Segundo Informe','nota'=>'Resultados mayo 2024','file'=>'SEGUNDO-INFORME-PI-PNA.pdf','path'=>'2024/05/SEGUNDO-INFORME-PI-PNA.pdf'],
                ]],
                ['icono'=>'snd-document--import','titulo'=>'Anexos','desc'=>'Material complementario de los informes de seguimiento.','color'=>'#611232','docs'=>[
                    ['label'=>'Anexo Segundo Informe','nota'=>'Datos estadísticos detallados','file'=>'ANEXO_INFORME_PI-PNA.pdf','path'=>'2024/05/ANEXO_INFORME_PI-PNA.pdf'],
                ]],
            ];
            ?>
            <div class="row g-4">
                <?php foreach ($docs_cols as $col) : ?>
                <div class="col-lg-4 col-md-4 pna-chart-card" style="--delay:.05s;">
                    <div class="card border-0 rounded-4 shadow-sm h-100 overflow-hidden">
                        <!-- Header -->
                        <div class="d-flex align-items-center gap-3 px-4 pt-4 pb-3 border-bottom" style="border-color:#f0f0f0 !important;">
                            <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0"
                                 style="width:40px;height:40px;background-color:#61123218;">
                                <i class="snd <?php echo esc_attr($col['icono']); ?>" style="color:#611232;font-size:1.2rem;"></i>
                            </div>
                            <h3 class="h6 fw-bold mb-0 font-patria" style="color:#611232;font-size:15px;"><?php echo esc_html($col['titulo']); ?></h3>
                        </div>
                        <!-- Documentos -->
                        <div class="px-4 py-3 d-flex flex-column gap-3">
                            <?php foreach ($col['docs'] as $doc) :
                                $url = sesna_get_media_attachment_url($doc['file'], $doc['path']);
                            ?>
                            <div class="rounded-3 p-3" style="background:#f8f9fa;">
                                <div class="font-noto-sans fw-semibold mb-1" style="font-size:13px;color:#333;"><?php echo esc_html($doc['label']); ?></div>
                                <div class="font-noto-sans text-muted mb-2" style="font-size:11px;"><?php echo esc_html($doc['nota']); ?></div>
                                <div class="d-flex gap-2">
                                    <?php if ($url) : ?>
                                    <a href="#"
                                       data-bs-toggle="modal" data-bs-target="#pdfViewerModal"
                                       data-pdf-url="<?php echo esc_url($url); ?>"
                                       data-pdf-title="<?php echo esc_attr($doc['label']); ?>"
                                       class="d-inline-flex align-items-center gap-1 font-noto-sans"
                                       style="background:#61123215;color:#611232;border:1px solid #61123240;border-radius:6px;font-size:12px;padding:4px 12px;text-decoration:none;">
                                        <i class="snd snd-screen"></i> Ver
                                    </a>
                                    <a href="<?php echo esc_url($url); ?>" download
                                       class="d-inline-flex align-items-center gap-1 font-noto-sans"
                                       style="background:#61123215;color:#611232;border:1px solid #61123240;border-radius:6px;font-size:12px;padding:4px 12px;text-decoration:none;">
                                        <i class="snd snd-download"></i> PDF
                                    </a>
                                    <?php else : ?>
                                    <span class="font-noto-sans" style="font-size:11px;color:#aaa;">Próximamente</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ── BLOQUE 5: Fichero ──────────────────────────────────── -->
    <section class="pb-5">
        <div class="container">
            <div class="pna-doc-card pna-chart-card" style="--delay:0s;">
                <!-- Título + descripción -->
                <div class="cp-recursos__header mb-3">
                    <div>
                        <h2 class="cp-recursos__titulo mb-0">Fichero del Informe PI-PNA</h2>
                        <div class="cp-recursos__linea"></div>
                    </div>
                </div>
                <p class="font-noto-sans text-muted mb-4" style="font-size:14px;">
                    Consulta las fichas de análisis que integran el Informe del Programa de Implementación de la PNA por año y por eje temático.
                </p>
                <div>
                <div class="row g-4">
                    <!-- Selectores -->
                    <div class="col-lg-4">
                        <p class="font-noto-sans fw-semibold mb-2" style="font-size:14px;color:#333;">Selecciona el año:</p>
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            <?php foreach ([2023,2024,2025] as $anio) : $act = $anio===2023; ?>
                            <button type="button" class="btn fichero-anio-btn font-noto-sans fw-semibold"
                                    data-anio="<?php echo $anio; ?>"
                                    style="font-size:14px;min-width:76px;border-radius:8px;padding:8px 14px;
                                           background-color:<?php echo $act?'#611232':'#F9F0F3'; ?>;
                                           color:<?php echo $act?'#fff':'#611232'; ?>;
                                           border:1px solid <?php echo $act?'#611232':'#e8d0d8'; ?>;">
                                <?php echo $anio; ?>
                            </button>
                            <?php endforeach; ?>
                        </div>
                        <p class="font-noto-sans fw-semibold mb-2" style="font-size:14px;color:#333;">Selecciona un eje:</p>
                        <div class="d-flex flex-wrap gap-2">
                            <?php foreach ([1,2,3,4] as $en) :
                                $ec = $ejes_data[$en]['color'];
                                $act = $en===1;
                            ?>
                            <button type="button" class="btn fichero-eje-btn font-noto-sans fw-semibold"
                                    data-eje="<?php echo $en; ?>" data-color="<?php echo esc_attr($ec); ?>"
                                    style="font-size:14px;min-width:76px;border-radius:8px;padding:8px 14px;
                                           background-color:<?php echo $act?'#611232':'#F9F0F3'; ?>;
                                           color:<?php echo $act?'#fff':'#611232'; ?>;
                                           border:1px solid <?php echo $act?'#611232':'#e8d0d8'; ?>;">
                                Eje <?php echo $en; ?>
                            </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Visor -->
                    <div class="col-lg-8">
                        <div id="ficheroVisor" class="border rounded-3 overflow-hidden" style="height:480px;background:#f8f9fa;">
                            <div id="ficheroPlaceholder" class="d-flex flex-column align-items-center justify-content-center h-100 text-muted">
                                <i class="snd snd-document--pdf" style="font-size:3rem;color:#ccc;"></i>
                                <p class="font-noto-sans mt-2 mb-0" style="font-size:14px;">Selecciona un año y un eje para ver las fichas</p>
                            </div>
                            <iframe id="ficheroFrame" src="" class="w-100 h-100 d-none" frameborder="snd-star"></iframe>
                        </div>
                    </div>
                </div>
            </div><!-- fin card bloque 5 -->
        </div>
    </section>

</div><!-- .page-pna-implementacion -->

<?php get_template_part('template-parts/transparencia/visor-pdf'); ?>

<style>
/* Hover cards de eje */
.eje-btn {
    transition: transform .2s ease, box-shadow .2s ease, opacity .2s ease !important;
}
.eje-btn:hover {
    transform: scale(1.04) !important;
    box-shadow: 0 4px 16px -4px var(--eje-color, rgba(0,0,0,.2));
}

/* Hover segmentos SVG */
.eje-segment {
    transition: opacity .2s ease, filter .2s ease;
}
.eje-segment:hover {
    filter: brightness(1.15);
    opacity: 1 !important;
}

/* Animación de entrada del panel de eje */
@keyframes ejeSlideIn {
    from { opacity: 0; transform: translateY(-10px); }
    to   { opacity: 1; transform: translateY(0); }
}
.eje-panel:not(.d-none) {
    animation: ejeSlideIn .3s ease forwards;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // Animaciones entrada
    var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(e) {
            if (e.isIntersecting) { e.target.classList.add('pna-visible'); obs.unobserve(e.target); }
        });
    }, {threshold: 0.1});
    document.querySelectorAll('.pna-chart-card, .pna-reveal').forEach(function(el) { obs.observe(el); });

    // Interacción ejes donut
    var activeEje = null;

    function resetEjes() {
        activeEje = null;
        document.querySelectorAll('.eje-btn').forEach(function(b) {
            b.style.opacity = '1';
            b.style.transform = 'scale(1)';
        });
        document.querySelectorAll('.eje-segment').forEach(function(s) {
            s.style.opacity = '0.9';
        });
        document.querySelectorAll('.eje-panel').forEach(function(p) {
            p.classList.add('d-none');
        });
    }

    function activateEje(num) {
        if (activeEje == num) { resetEjes(); return; }
        activeEje = num;
        document.querySelectorAll('.eje-btn').forEach(function(b) {
            var active = b.dataset.eje == num;
            b.style.opacity = active ? '1' : '0.45';
            b.style.transform = active ? 'scale(1.03)' : 'scale(1)';
        });
        document.querySelectorAll('.eje-segment').forEach(function(s) {
            s.style.opacity = s.dataset.eje == num ? '1' : '0.35';
        });
        document.querySelectorAll('.eje-panel').forEach(function(p) {
            var n = p.id.replace('ejePanel','');
            n == num ? p.classList.remove('d-none') : p.classList.add('d-none');
        });
        var panel = document.getElementById('ejePanel' + num);
        if (panel) panel.scrollIntoView({behavior:'smooth', block:'nearest'});
    }
    document.querySelectorAll('.eje-btn, .eje-segment').forEach(function(el) {
        el.addEventListener('click', function() { activateEje(this.dataset.eje); });
    });

    // Fichero
    var ficheroMap = <?php echo json_encode($fichero_url_map); ?>;
    var selAnio = 2023, selEje = 1;

    function updateFichero() {
        var url = ficheroMap[selAnio] && ficheroMap[selAnio][selEje] ? ficheroMap[selAnio][selEje] : '';
        var frame = document.getElementById('ficheroFrame');
        var ph = document.getElementById('ficheroPlaceholder');
        if (url) {
            frame.src = url;
            frame.classList.remove('d-none');
            ph.classList.add('d-none');
        } else {
            frame.src = '';
            frame.classList.add('d-none');
            ph.classList.remove('d-none');
        }
    }

    document.querySelectorAll('.fichero-anio-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            selAnio = parseInt(this.dataset.anio);
            document.querySelectorAll('.fichero-anio-btn').forEach(function(b) {
                var a = b.dataset.anio == selAnio;
                b.style.backgroundColor = a ? '#611232' : '#F9F0F3';
                b.style.color = a ? '#fff' : '#611232';
                b.style.borderColor = a ? '#611232' : '#e8d0d8';
            });
            updateFichero();
        });
    });

    document.querySelectorAll('.fichero-eje-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            selEje = parseInt(this.dataset.eje);
            document.querySelectorAll('.fichero-eje-btn').forEach(function(b) {
                var a = b.dataset.eje == selEje;
                b.style.backgroundColor = a ? '#611232' : '#F9F0F3';
                b.style.color = a ? '#fff' : '#611232';
                b.style.borderColor = a ? '#611232' : '#e8d0d8';
            });
            updateFichero();
        });
    });
});
</script>

<?php get_footer(); ?>
