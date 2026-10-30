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
        'icono'       => 'Combatir.svg',
        'gradiente'   => 'linear-gradient(135deg, #F3FAF0 0%, #E8F5E3 100%)',
        'acento'      => '#225C0E',
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
        'color'       => '#74598F',
        'icono'       => 'Arbitrariedad.svg',
        'gradiente'   => 'linear-gradient(135deg, #F7F2FA 0%, #EEE4F5 100%)',
        'acento'      => '#3A2649',
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
        'color'       => '#1D70B8',
        'icono'       => 'Promover.svg',
        'gradiente'   => 'linear-gradient(135deg, #F0F6FC 0%, #E1EFFC 100%)',
        'acento'      => '#0C365C',
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
        'icono'       => 'Involucrar.svg',
        'gradiente'   => 'linear-gradient(135deg, #FCF0F4 0%, #F9DEE7 100%)',
        'acento'      => '#701D2D',
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

$fichero_url_map = sesna_get_pna_fichero_map();
$fichero_anios   = array_keys($fichero_url_map);
sort($fichero_anios);
if (empty($fichero_anios)) {
    $fichero_anios = [(int) date('Y')];
}
?>

<div class="page-pna page-pna-implementacion front-page-bg">

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
                    <span class="ruta__a" aria-current="page">Implementación</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- BLOQUE 1: Hero -->
    <section class="pt-4 pb-5">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__7--lg">
                    <h1 class="h1b patria color--pguinda600 mb--24">Implementación</h1>
                    <p class="sh1r mb--0 texto--justify">
                        En esta sección se presenta el Programa de Implementación de la Política Nacional Anticorrupción (PI-PNA), instrumento que traduce las prioridades de la PNA en estrategias, líneas de acción e indicadores para orientar su ejecución y seguimiento.
                    </p>
                </div>
                <div class="columna__12 columna__5--lg muestra--ninguno muestra--flex--lg align-items-center justify-content-end">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/ciclo_pna/implementacion.svg' ); ?>" alt="" class="sesna-hero__img" loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- ── BLOQUE 2: PI-PNA ────────────────────────────────────── -->
    <section class="pb-5">
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 mb--16">Programa de Implementación de la Política Nacional Anticorrupción</h2>

            <div class="pna-doc-card pna-chart-card" style="--delay:0s;">
                <div class="fila align-items-stretch" style="display:flex; flex-wrap:wrap; gap:1.5rem;">

                    <!-- Izquierda: texto + botón -->
                    <div class="columna__6 d-flex flex-column justify-content-between" style="flex:1 1 50%; min-width:280px; border-right:2px solid var(--neutro400); padding-right:2rem;">
                        <div>
                            <p class="b1r mb--16 texto--justify">
                                El Programa de Implementación de la Política Nacional Anticorrupción (PI-PNA) es el instrumento técnico mediante el cual se operacionalizan las prioridades establecidas en la PNA a través de estrategias, líneas de acción e indicadores de desempeño, articulando la participación de las instituciones responsables y permitiendo el seguimiento a los avances en el cumplimiento de los objetivos.
                            </p>
                            <p class="b1r mb--0 texto--justify">
                                Su ejecución se concibe como un proceso coordinado, flexible y sujeto a mejora continua, en que la información generada permite identificar avances y áreas de oportunidad para realizar, con base en evidencia, los ajustes necesarios.
                            </p>
                        </div>

                        <a href="#" class="boton__primario mt--24"
                           data-modal-target="#pdfViewerModal"
                           data-pdf-url="<?php echo esc_url(sesna_get_media_attachment_url('PI-PNA_actualizacion-indicadores_2024-1.pdf','2024/03/PI-PNA_actualizacion-indicadores_2024-1.pdf')); ?>"
                           data-pdf-title="PI-PNA – Actualización 2024">
                            <i class="snd__icono snd-screen icono--16" aria-hidden="true"></i> Consultar PI-PNA (Actualización 2024)
                        </a>
                    </div>

                    <!-- Derecha: fecha + portada (ocupa todo el alto) -->
                    <div class="columna__6 d-flex flex-column" style="flex:0 0 45%; min-width:240px; padding-left:2rem;">
                        <div class="pna-hero__badge mb--16">
                            <span class="pna-hero__badge-icon" aria-hidden="true">
                                <i class="snd__icono snd-calendar icono--20" aria-hidden="true"></i>
                            </span>
                            <div>
                                <p class="sh1b color--neutro800 mb--0">Aprobado el 27 de enero de 2022</p>
                                <p class="b1r color--neutro600 texto--justify mb--0">por el Comité Coordinador del Sistema Nacional Anticorrupción.</p>
                            </div>
                        </div>
                        <a href="#" class="pna-doc-cover text-decoration-none d-flex mx-auto"
                           data-modal-target="#pdfViewerModal"
                           data-pdf-url="<?php echo esc_url(sesna_get_media_attachment_url('PI-PNA_actualizacion-indicadores_2024-1.pdf','2024/03/PI-PNA_actualizacion-indicadores_2024-1.pdf')); ?>"
                           data-pdf-title="PI-PNA – Actualización 2024"
                           title="Consultar PI-PNA (Actualización 2024)"
                           style="cursor:pointer; max-width:260px;">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/pna_portada.png' ); ?>" alt="Portada Programa de Implementación de la PNA">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ── BLOQUE 3: Estructura ────────────────────────────────── -->
    <section class="pb-5">
        <div class="contenedor">

            <h2 class="h2b patria color--pguinda600 mb--16">Estructura del Programa de Implementación</h2>

            <!-- Card única: Fases + Donut -->
            <div class="pna-doc-card pna-chart-card" style="--delay:.05s;">

                <!-- 5 Fases – Chevron + portada -->
                <p class="b1sb mb--12">
                    Proceso de integración del proyecto de <strong>Programa de Implementación</strong>
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
                        <div class="d-flex flex-column align-items-start justify-content-center"
                             style="flex:1; min-height:68px; padding:4px <?php echo $pr; ?> 4px <?php echo $pl; ?>;
                                    background:<?php echo $color_fase; ?>;
                                    clip-path:<?php echo $clip; ?>;
                                    color:#fff;">
                            <span class="sdb" style="display:block; margin-bottom:3px; line-height:1;">Fase <?php echo $i + 1; ?>:</span>
                            <span class="sdr" style="display:block; line-height:1.35; margin-bottom:0;"><?php echo esc_html($titulo); ?></span>
                        </div>
                        <?php endforeach; ?>
                        <!-- Flecha gris de cierre -->
                        <div style="width:22px; min-height:68px; flex-shrink:0; background:#c8c8c8;
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

                <!-- Donut 4 ejes (mismo diseño que Diseño PNA: pna-wheel) -->
                <div class="reticulaGrid__12 align-items-center justify-content-center my-4 position-relative">

                    <!-- Izquierda: Eje 1 y 3 -->
                    <div class="columna__12 columna__6--md columna__4--lg d-flex flex-column order-2 order-lg-1" style="gap: 32px !important;">
                        <?php foreach ([1,3] as $n) :
                            $e = $ejes_data[$n];
                        ?>
                        <div class="position-relative w-100">
                            <div class="card rounded-4 p-4 shadow-sm sna-integrantes-card pna-eje-btn<?php echo $n === 1 ? ' active' : ''; ?> d-flex flex-column justify-content-center" data-eje="<?php echo $n; ?>" role="button" tabindex="0" style="background: <?php echo $e['gradiente']; ?>; min-height: 128px; cursor: pointer;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="sna-integrantes-icon-circle rounded-circle d-flex flex-column align-items-center justify-content-center text-white flex-shrink-0 shadow-sm" style="background-color: <?php echo $e['color']; ?>;">
                                        <span class="font-montserrat fw-normal" style="font-size: 11px; line-height: 1; opacity: 0.95;">Eje</span>
                                        <span class="fw-bold" style="font-size: 22px; line-height: 1.1;"><?php echo $n; ?></span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="fw-bold mb-2 lh-sm" style="font-size: 15px; color: <?php echo $e['acento']; ?>;"><?php echo esc_html($e['titulo']); ?></p>
                                        <div style="width: 38px; height: 3px; background-color: <?php echo $e['color']; ?>; border-radius: 2px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pna-connector pna-connector--right muestra--ninguno muestra--flex--lg align-items-center" aria-hidden="true">
                                <span class="pna-connector__line" style="background-color: <?php echo $e['color']; ?>;"></span>
                                <span class="pna-connector__dot" style="background-color: <?php echo $e['color']; ?>;"></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Centro: Rueda Donut SVG -->
                    <div class="columna__12 columna__4--lg d-flex flex-column align-items-center justify-content-center order-1 order-lg-2 my-2 my-lg-0">
                        <div class="pna-wheel-container d-flex flex-column align-items-center justify-content-center w-100">
                            <div class="pna-wheel position-relative d-flex justify-content-center align-items-center my-2" style="max-width: 380px; width: 100%; aspect-ratio: 1/1;">
                                <svg class="pna-wheel-svg w-100 h-100" viewBox="0 0 320 320" style="filter: drop-shadow(0 8px 24px rgba(0,0,0,0.08));">
                                    <!-- Eje 1: superior izquierdo -->
                                    <g class="pna-wheel-slice active" data-eje="1" role="button" tabindex="0" aria-label="Eje 1: <?php echo esc_attr($ejes_data[1]['titulo']); ?>" style="cursor: pointer; transition: transform 0.25s ease;">
                                        <path d="M 160 160 L 20 160 A 140 140 0 0 1 160 20 Z" fill="<?php echo $ejes_data[1]['color']; ?>" stroke="#ffffff" stroke-width="6" stroke-linejoin="round" />
                                        <foreignObject x="56" y="56" width="58" height="58" style="pointer-events: none;">
                                            <div xmlns="http://www.w3.org/1999/xhtml" class="d-flex align-items-center justify-content-center w-100 h-100">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/ejes_objetivos/' . $ejes_data[1]['icono'] ); ?>" width="50" height="50" alt="" style="filter: brightness(0) invert(1) drop-shadow(0 2px 4px rgba(0,0,0,0.25));">
                                            </div>
                                        </foreignObject>
                                    </g>
                                    <!-- Eje 2: superior derecho -->
                                    <g class="pna-wheel-slice" data-eje="2" role="button" tabindex="0" aria-label="Eje 2: <?php echo esc_attr($ejes_data[2]['titulo']); ?>" style="cursor: pointer; transition: transform 0.25s ease;">
                                        <path d="M 160 160 L 160 20 A 140 140 0 0 1 300 160 Z" fill="<?php echo $ejes_data[2]['color']; ?>" stroke="#ffffff" stroke-width="6" stroke-linejoin="round" />
                                        <foreignObject x="208" y="56" width="58" height="58" style="pointer-events: none;">
                                            <div xmlns="http://www.w3.org/1999/xhtml" class="d-flex align-items-center justify-content-center w-100 h-100">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/ejes_objetivos/' . $ejes_data[2]['icono'] ); ?>" width="50" height="50" alt="" style="filter: brightness(0) invert(1) drop-shadow(0 2px 4px rgba(0,0,0,0.25));">
                                            </div>
                                        </foreignObject>
                                    </g>
                                    <!-- Eje 4: inferior derecho -->
                                    <g class="pna-wheel-slice" data-eje="4" role="button" tabindex="0" aria-label="Eje 4: <?php echo esc_attr($ejes_data[4]['titulo']); ?>" style="cursor: pointer; transition: transform 0.25s ease;">
                                        <path d="M 160 160 L 300 160 A 140 140 0 0 1 160 300 Z" fill="<?php echo $ejes_data[4]['color']; ?>" stroke="#ffffff" stroke-width="6" stroke-linejoin="round" />
                                        <foreignObject x="208" y="208" width="58" height="58" style="pointer-events: none;">
                                            <div xmlns="http://www.w3.org/1999/xhtml" class="d-flex align-items-center justify-content-center w-100 h-100">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/ejes_objetivos/' . $ejes_data[4]['icono'] ); ?>" width="50" height="50" alt="" style="filter: brightness(0) invert(1) drop-shadow(0 2px 4px rgba(0,0,0,0.25));">
                                            </div>
                                        </foreignObject>
                                    </g>
                                    <!-- Eje 3: inferior izquierdo -->
                                    <g class="pna-wheel-slice" data-eje="3" role="button" tabindex="0" aria-label="Eje 3: <?php echo esc_attr($ejes_data[3]['titulo']); ?>" style="cursor: pointer; transition: transform 0.25s ease;">
                                        <path d="M 160 160 L 160 300 A 140 140 0 0 1 20 160 Z" fill="<?php echo $ejes_data[3]['color']; ?>" stroke="#ffffff" stroke-width="6" stroke-linejoin="round" />
                                        <foreignObject x="56" y="208" width="58" height="58" style="pointer-events: none;">
                                            <div xmlns="http://www.w3.org/1999/xhtml" class="d-flex align-items-center justify-content-center w-100 h-100">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/ejes_objetivos/' . $ejes_data[3]['icono'] ); ?>" width="50" height="50" alt="" style="filter: brightness(0) invert(1) drop-shadow(0 2px 4px rgba(0,0,0,0.25));">
                                            </div>
                                        </foreignObject>
                                    </g>
                                    <!-- Círculo interior para efecto Donut -->
                                    <circle cx="160" cy="160" r="78" fill="#ffffff" />
                                </svg>

                                <!-- Centro: Objetivo de la PNA -->
                                <div class="pna-wheel-center position-absolute bg-white rounded-circle d-flex flex-column align-items-center justify-content-center text-center p-3 shadow" style="width: 182px; height: 182px; z-index: 10;">
                                    <span class="mb-1"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/ejes_objetivos/problema.svg' ); ?>" width="38" height="38" alt="" style="display: block;"></span>
                                    <strong class="d-block mb-1 color--pguinda600" style="font-size: 13px; line-height: 1.1;">Objetivo de la PNA:</strong>
                                    <span class="color--neutro800" style="font-size: 11px; line-height: 1.25;">"Incapacidad para controlar la corrupción, esto es, prevenirla, detectarla y sancionarla eficazmente".</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Derecha: Eje 2 y 4 -->
                    <div class="columna__12 columna__6--md columna__4--lg d-flex flex-column order-3 order-lg-3" style="gap: 32px !important;">
                        <?php foreach ([2,4] as $n) :
                            $e = $ejes_data[$n];
                        ?>
                        <div class="position-relative w-100">
                            <div class="card rounded-4 p-4 shadow-sm sna-integrantes-card pna-eje-btn d-flex flex-column justify-content-center" data-eje="<?php echo $n; ?>" role="button" tabindex="0" style="background: <?php echo $e['gradiente']; ?>; min-height: 128px; cursor: pointer;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="sna-integrantes-icon-circle rounded-circle d-flex flex-column align-items-center justify-content-center text-white flex-shrink-0 shadow-sm" style="background-color: <?php echo $e['color']; ?>;">
                                        <span class="font-montserrat fw-normal" style="font-size: 11px; line-height: 1; opacity: 0.95;">Eje</span>
                                        <span class="fw-bold" style="font-size: 22px; line-height: 1.1;"><?php echo $n; ?></span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="fw-bold mb-2 lh-sm" style="font-size: 15px; color: <?php echo $e['acento']; ?>;"><?php echo esc_html($e['titulo']); ?></p>
                                        <div style="width: 38px; height: 3px; background-color: <?php echo $e['color']; ?>; border-radius: 2px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pna-connector pna-connector--left muestra--ninguno muestra--flex--lg align-items-center" aria-hidden="true">
                                <span class="pna-connector__line" style="background-color: <?php echo $e['color']; ?>;"></span>
                                <span class="pna-connector__dot" style="background-color: <?php echo $e['color']; ?>;"></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                </div>

                <!-- Pie de sección: Texto oficial con icono institucional -->
                <div class="muestra--flex justify-content-center mt--4 mb--24">
                    <div class="cp-nota__inner fondo--azul100 muestra--flex-linea mx--auto" style="max-width: 100%; width: 100%;">
                        <i class="snd__icono snd-select--window icono--20 cp-nota__icono color--azul500" aria-hidden="true"></i>
                        <p class="cp-nota__texto b1r color--azul500 mb--0">Selecciona un <strong>eje</strong> para conocer sus objetivos específicos, número de estrategias y líneas de acción.</p>
                    </div>
                </div>

                <!-- Divider entre la rueda/nota y el detalle del eje seleccionado -->
                <div class="pt--24" style="border-top: 1px solid var(--neutro400);">

                <!-- Paneles de eje -->
                <div class="pna-objectives-panel d-flex flex-column" id="objectivesPanelImplementacion" style="width: 100%;">
                    <?php foreach ($ejes_data as $n => $e) : ?>
                    <div class="pna-eje-content<?php echo $n === 1 ? ' active' : ' muestra--ninguno'; ?> p-4 p-md-5 rounded-4" id="content-eje-<?php echo $n; ?>" style="background-color: <?php echo $e['color']; ?>10; border: 1px solid <?php echo $e['color']; ?>50; box-shadow: var(--dropLV1);">
                        <div class="reticulaGrid__12 align-items-start">

                            <!-- Columna Izquierda: Viñeta, Título, Descripción y cifras -->
                            <div class="columna__12 columna__5--lg border-end-lg pe-lg-4">
                                <div class="d-inline-block px-3 py-1 text-white fw-bold mb-3 rounded-end shadow-sm" style="background-color: <?php echo $e['color']; ?>; font-size: 13px;">
                                    Eje <?php echo $n; ?>
                                </div>
                                <h3 class="sh0b mb--16" style="color: <?php echo $e['color']; ?>;"><?php echo esc_html($e['titulo']); ?></h3>
                                <p class="b1r mb--16 texto--justify">
                                    <?php echo esc_html($e['desc']); ?>
                                </p>
                                <div class="d-flex gap-3">
                                    <div class="text-center px-4 py-2 rounded-3" style="background-color:<?php echo $e['color']; ?>;color:#fff;">
                                        <div class="fw-bold" style="font-size:22px;"><?php echo $e['estrategias']; ?></div>
                                        <div class="sdr mb--0" style="font-size:11px;color:#fff;">Estrategias</div>
                                    </div>
                                    <div class="text-center px-4 py-2 rounded-3" style="background-color:#611232;color:#fff;">
                                        <div class="fw-bold" style="font-size:22px;"><?php echo $e['lineas']; ?></div>
                                        <div class="sdr mb--0" style="font-size:11px;color:#fff;">Líneas de<br>Acción</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Columna Derecha: Objetivos específicos asociados -->
                            <div class="columna__12 columna__7--lg ps-lg-4">
                                <div class="pb-2 mb-3 border-bottom">
                                    <h4 class="b1b mb--0" style="color: <?php echo $e['color']; ?>;">Objetivos específicos asociados</h4>
                                </div>
                                <div class="d-flex flex-column">
                                    <?php foreach ($e['objetivos'] as $i => $obj) : ?>
                                    <div class="d-flex align-items-start gap-3 py-2<?php echo $i < count($e['objetivos']) - 1 ? ' border-bottom' : ''; ?>">
                                        <span class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold flex-shrink-0" style="background-color: <?php echo $e['color']; ?>; width: 32px; height: 32px; min-width: 32px; font-size: 13px;"><?php echo $obj['num']; ?></span>
                                        <span class="b1r texto--justify"><?php echo esc_html($obj['texto']); ?></span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── BLOQUE 4: Documentos e informes ────────────────────── -->
    <section class="pb-5">
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 mb--16">Documentos e informes del PI-PNA</h2>
            <?php
            $docs_cols = [
                ['icono'=>'snd-document','titulo'=>'Programa','desc'=>'Versiones del Programa de Implementación de la PNA.','docs'=>[
                    ['label'=>'PI-PNA aprobado 2022','nota'=>'Versión original aprobada por el CC-SNA','file'=>'Programa_Implementacion_PNA_.pdf','path'=>'2024/04/Programa_Implementacion_PNA_.pdf'],
                    ['label'=>'Actualización 2024','nota'=>'Actualización de indicadores','file'=>'PI-PNA_actualizacion-indicadores_2024-1.pdf','path'=>'2024/03/PI-PNA_actualizacion-indicadores_2024-1.pdf'],
                ]],
                ['icono'=>'snd-catalog','titulo'=>'Informes','desc'=>'Seguimiento a la ejecución del PI-PNA por periodo.','docs'=>[
                    ['label'=>'Primer Informe','nota'=>'Resultados al 28 de abril de 2023','file'=>'Primer-Informe-de-ejecucion-del-PI-PNA-28.04.2023.pdf','path'=>'2023/04/Primer-Informe-de-ejecucion-del-PI-PNA-28.04.2023.pdf'],
                    ['label'=>'Segundo Informe','nota'=>'Resultados mayo 2024','file'=>'SEGUNDO-INFORME-PI-PNA.pdf','path'=>'2024/05/SEGUNDO-INFORME-PI-PNA.pdf'],
                ]],
                ['icono'=>'snd-document--import','titulo'=>'Anexos','desc'=>'Material complementario de los informes de seguimiento.','docs'=>[
                    ['label'=>'Anexo Segundo Informe','nota'=>'Datos estadísticos detallados','file'=>'ANEXO_INFORME_PI-PNA.pdf','path'=>'2024/05/ANEXO_INFORME_PI-PNA.pdf'],
                ]],
            ];
            ?>
            <div class="reticulaGrid__12">
                <?php foreach ($docs_cols as $col) : ?>
                <div class="columna__12 columna__4--md pna-chart-card" style="--delay:.05s;">
                    <div class="pna-doc-card-compact h-100 d-flex flex-column">
                        <!-- Header -->
                        <div class="d-flex align-items-center gap--12 mb--16">
                            <div class="pna-guinda-icon-box flex-shrink-0 d-flex align-items-center justify-content-center">
                                <i class="snd__icono <?php echo esc_attr( $col['icono'] ); ?> icono--20 color--neutro100" aria-hidden="true"></i>
                            </div>
                            <h3 class="sh1b mb--0"><?php echo esc_html($col['titulo']); ?></h3>
                        </div>
                        <!-- Documentos -->
                        <div class="d-flex flex-column flex-grow-1">
                            <?php foreach ($col['docs'] as $doc) :
                                $url = sesna_get_media_attachment_url($doc['file'], $doc['path']);
                            ?>
                                <?php if ($url) : ?>
                                <a href="#"
                                   data-modal-target="#pdfViewerModal"
                                   data-pdf-url="<?php echo esc_url($url); ?>"
                                   data-pdf-title="<?php echo esc_attr($doc['label']); ?>"
                                   class="d-flex align-items-center justify-content-between gap-3 px-2 py-2 rounded-3 decoracion--ninguna pna-doc-item">
                                    <span class="flex-grow-1">
                                        <span class="b1r color--neutro800 d-block mb--4"><?php echo esc_html($doc['label']); ?></span>
                                        <span class="sdr color--neutro600 mb--0"><?php echo esc_html($doc['nota']); ?></span>
                                    </span>
                                    <i class="snd__icono snd-screen icono--16 flex-shrink-0 color--pguinda600" aria-hidden="true"></i>
                                </a>
                                <?php else : ?>
                                <span class="d-flex align-items-center justify-content-between gap-3 px-2 py-2 rounded-3">
                                    <span class="flex-grow-1">
                                        <span class="b1r color--neutro500 d-block mb--4"><?php echo esc_html($doc['label']); ?></span>
                                        <span class="sdr color--neutro500 mb--0"><?php echo esc_html($doc['nota']); ?></span>
                                    </span>
                                    <i class="snd__icono snd-screen icono--16 flex-shrink-0 color--neutro500" aria-hidden="true"></i>
                                </span>
                                <?php endif; ?>
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
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 mb--16">Fichero del Informe PI-PNA</h2>
            <p class="sh1r color--neutro600 mb--24">
                Consulta las fichas de análisis que integran el Informe del Programa de Implementación de la PNA por año y por eje temático.
            </p>

            <?php
            // Lista plana de fichas (año + eje) a partir de $fichero_url_map
            $fichero_list = [];
            foreach ($fichero_url_map as $f_anio => $f_ejes) {
                foreach ($f_ejes as $f_eje => $f_url) {
                    if (empty($f_url) || empty($ejes_data[$f_eje])) continue;
                    $fichero_list[] = [
                        'anio'   => $f_anio,
                        'eje'    => $f_eje,
                        'titulo' => 'Ficha de análisis — Eje ' . $f_eje,
                        'tipo'   => $ejes_data[$f_eje]['titulo'],
                        'url'    => $f_url,
                    ];
                }
            }
            usort($fichero_list, function($a, $b) {
                return $b['anio'] <=> $a['anio'] ?: $a['eje'] <=> $b['eje'];
            });
            ?>

            <div class="tx-comite-panel pna-chart-card" style="--delay:0s;">

                <!-- Encabezado y contador -->
                <div class="tx-comite-panel__header mb--24">
                    <div>
                        <p class="b1r color--neutro600 mb--0" id="fichero-count-status" aria-live="polite">
                            Mostrando <?php echo count($fichero_list); ?> de <?php echo count($fichero_list); ?> fichas
                        </p>
                    </div>
                    <button type="button" id="fichero-btn-reset" class="boton__fantasma tx-comite-reset-btn muestra--ninguno">
                        <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
                        Limpiar filtros
                    </button>
                </div>

                <!-- Filtros -->
                <div class="reticulaGrid__12 mb--32 align-items-end">
                    <div class="columna__12 columna__6--md columna__3--lg">
                        <label for="fichero-filter-anio" class="b1sb dblock color--neutro800 mb--8">Año</label>
                        <div class="tx-select-wrap">
                            <select id="fichero-filter-anio" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php foreach ($fichero_anios as $anio) : ?>
                                <option value="<?php echo esc_attr($anio); ?>"><?php echo esc_html($anio); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="columna__12 columna__6--md columna__3--lg">
                        <label for="fichero-filter-eje" class="b1sb dblock color--neutro800 mb--8">Eje</label>
                        <div class="tx-select-wrap">
                            <select id="fichero-filter-eje" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php foreach ([1,2,3,4] as $en) : ?>
                                <option value="<?php echo $en; ?>">Eje <?php echo $en; ?>: <?php echo esc_html($ejes_data[$en]['titulo']); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <!-- Lista de fichas -->
                <div class="tx-comite-card-list" id="fichero-list-container">
                    <?php foreach ($fichero_list as $f) : ?>
                    <div class="tx-comite-card fichero-card" data-anio="<?php echo esc_attr($f['anio']); ?>" data-eje="<?php echo esc_attr($f['eje']); ?>">
                        <div class="tx-comite-card-date">
                            <div class="sh0b color--neutro600 mb--0 tx-comite-card-year"><?php echo esc_html($f['anio']); ?></div>
                        </div>
                        <div class="tx-comite-card-info">
                            <h3 class="sh1b color--neutro800 mb--8 tx-comite-card-title"><?php echo esc_html($f['titulo']); ?></h3>
                            <p class="b1r color--neutro700 mb--0 tx-comite-card-subtitle"><span class="b1sb color--neutro800">Eje <?php echo esc_html($f['eje']); ?>:</span> <?php echo esc_html($f['tipo']); ?></p>
                        </div>
                        <div class="tx-comite-card-action">
                            <button type="button" class="boton__fantasma" data-modal-target="#pdfViewerModal" data-pdf-url="<?php echo esc_url($f['url']); ?>" data-pdf-title="<?php echo esc_attr($f['titulo'] . ' (' . $f['anio'] . ')'); ?>">
                                <i class="snd__icono snd-document--pdf icono--24" aria-hidden="true"></i>
                                Ficha
                                <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Estado vacío -->
                <div class="aviso aviso--info mt--16<?php echo empty($fichero_list) ? '' : ' muestra--ninguno'; ?>" id="fichero-empty-state" role="status" aria-live="polite">
                    <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
                    <div class="aviso__cont">
                        <div class="aviso__txt">
                            <p class="b1r color--azul500 mb--0">No se encontraron fichas que coincidan con los filtros seleccionados.</p>
                        </div>
                    </div>
                </div>

            </div><!-- fin tx-comite-panel -->
        </div>
    </section>

</div><!-- .page-pna-implementacion -->

<?php get_template_part('template-parts/visor-pdf'); ?>

<style>
/* Animación de entrada del panel de eje */
@keyframes ejeSlideIn {
    from { opacity: 0; transform: translateY(-10px); }
    to   { opacity: 1; transform: translateY(0); }
}
.pna-eje-content:not(.muestra--ninguno) {
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

    // Interacción ejes donut (mismo patrón que Diseño PNA: pna-eje-btn / pna-wheel-slice)
    var ejeButtons = document.querySelectorAll('.pna-eje-btn, .pna-wheel-slice');
    var ejeContents = document.querySelectorAll('.pna-eje-content');
    var activeEjeId = null;

    function deselectEje() {
        activeEjeId = null;
        document.querySelectorAll('.pna-eje-btn, .pna-wheel-slice').forEach(function(el) {
            el.classList.remove('active', 'pna-eje-inactive');
        });
        ejeContents.forEach(function(content) { content.classList.add('muestra--ninguno'); });
    }

    function selectEje(ejeId, scrollTo) {
        if (activeEjeId === ejeId) { deselectEje(); return; }
        activeEjeId = ejeId;

        document.querySelectorAll('.pna-eje-btn, .pna-wheel-slice').forEach(function(el) {
            var isActive = el.getAttribute('data-eje') === ejeId;
            el.classList.remove('active');
            el.classList.toggle('pna-eje-inactive', !isActive);
        });
        ejeContents.forEach(function(content) { content.classList.add('muestra--ninguno'); });

        document.querySelectorAll('[data-eje="' + ejeId + '"]').forEach(function(el) {
            el.classList.add('active');
            el.classList.remove('pna-eje-inactive');
        });

        var targetContent = document.getElementById('content-eje-' + ejeId);
        if (targetContent) {
            targetContent.classList.remove('muestra--ninguno');
            targetContent.classList.add('active');
            if (scrollTo) targetContent.scrollIntoView({behavior:'smooth', block:'nearest'});
        }
    }

    ejeButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var ejeId = this.getAttribute('data-eje');
            if (ejeId) selectEje(ejeId, true);
        });
        btn.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                var ejeId = this.getAttribute('data-eje');
                if (ejeId) selectEje(ejeId, true);
            }
        });
    });

    // Estado inicial: Eje 1 activo por defecto, el resto atenuado (sin hacer scroll)
    var initialActive = document.querySelector('.pna-eje-btn.active, .pna-wheel-slice.active');
    if (initialActive) selectEje(initialActive.getAttribute('data-eje'), false);

    // Fichero: filtros de Año / Eje sobre el listado (mismo patrón que Actas del Comité)
    var ficheroFilterAnio = document.getElementById('fichero-filter-anio');
    var ficheroFilterEje = document.getElementById('fichero-filter-eje');
    var ficheroCards = Array.from(document.querySelectorAll('.fichero-card'));
    var ficheroCountStatus = document.getElementById('fichero-count-status');
    var ficheroEmptyState = document.getElementById('fichero-empty-state');
    var ficheroBtnReset = document.getElementById('fichero-btn-reset');

    function applyFicheroFilters() {
        var anio = ficheroFilterAnio ? ficheroFilterAnio.value : 'Todos';
        var eje = ficheroFilterEje ? ficheroFilterEje.value : 'Todos';
        var total = ficheroCards.length;
        var matched = 0;

        ficheroCards.forEach(function(card) {
            var matchAnio = anio === 'Todos' || card.getAttribute('data-anio') === anio;
            var matchEje = eje === 'Todos' || card.getAttribute('data-eje') === eje;
            if (matchAnio && matchEje) {
                card.style.display = '';
                matched++;
            } else {
                card.style.display = 'none';
            }
        });

        if (ficheroCountStatus) {
            ficheroCountStatus.textContent = matched === 0
                ? '0 fichas encontradas'
                : 'Mostrando ' + matched + ' de ' + total + ' ' + (total === 1 ? 'ficha' : 'fichas');
        }
        if (ficheroEmptyState) {
            ficheroEmptyState.classList.toggle('muestra--ninguno', matched > 0);
        }
        if (ficheroBtnReset) {
            var hasActiveFilter = anio !== 'Todos' || eje !== 'Todos';
            ficheroBtnReset.classList.toggle('muestra--ninguno', !hasActiveFilter);
        }
    }

    if (ficheroFilterAnio) ficheroFilterAnio.addEventListener('change', applyFicheroFilters);
    if (ficheroFilterEje) ficheroFilterEje.addEventListener('change', applyFicheroFilters);
    if (ficheroBtnReset) {
        ficheroBtnReset.addEventListener('click', function() {
            if (ficheroFilterAnio) ficheroFilterAnio.value = 'Todos';
            if (ficheroFilterEje) ficheroFilterEje.value = 'Todos';
            applyFicheroFilters();
        });
    }
});
</script>

<?php get_footer(); ?>
