<?php
/**
 * Contenido: Planeación Institucional
 * Homologado al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 *
 * @package sesna
 */

$pi_grupos = array(
    array(
        'titulo' => 'Programa Institucional',
        'icono'  => 'snd-education',
        'nota'   => 'Documento rector que establece los objetivos, estrategias y líneas de acción de la SESNA.',
        'docs'   => array(
            array( 'label' => 'Programa Institucional SESNA 2025-2030', 'url' => '/wp-content/uploads/2025/10/2025_08_29_PI_2025-2030_sesna.pdf', 'disponible' => true ),
            array( 'label' => 'Programa Institucional SESNA 2020-2024', 'url' => '/wp-content/uploads/2020/06/2020_06_17_MAT_sesna.pdf', 'disponible' => true ),
        ),
    ),
    array(
        'titulo' => 'Informes del Programa Institucional 2020-2024',
        'icono'  => 'snd-chart--bar',
        'nota'   => 'Informes anuales de avance y resultados del Programa Institucional de la SESNA.',
        'docs'   => array(
            array( 'label' => 'Informe de Avance y Resultados 2023-2024', 'url' => '/wp-content/uploads/2024/09/Informe-de-Avance-y-Resultados-2023-2024.pdf', 'disponible' => true ),
            array( 'label' => 'Consulta el informe 2022', 'url' => '/wp-content/uploads/2023/05/Informe-de-Avance-y-Resultados-PI-SESNA-2022.pdf', 'disponible' => true ),
            array( 'label' => 'Consulta el informe 2021', 'url' => '/wp-content/uploads/2022/05/Informe-Avance-y-Resultados-PI-SESNA-2021.pdf', 'disponible' => true ),
            array( 'label' => 'Consulta el informe 2020', 'url' => '/wp-content/uploads/2021/05/Informe-Avance-y-Resultados-2020.pdf', 'disponible' => true ),
        ),
    ),
    array(
        'titulo' => 'Informes de Autoevaluación de la Gestión',
        'icono'  => 'snd-data--table',
        'nota'   => 'Informes de autoevaluación semestrales y anuales de la SESNA.',
        'docs'   => array(
            array( 'label' => 'Informe de Autoevaluación de la Gestión Anual 2025', 'url' => '/wp-content/uploads/2026/05/informe_autoevaluacion_gestion_anual_sesna_2025.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión 1er Semestre 2025', 'url' => '/wp-content/uploads/2025/11/Informe-de-Evaluacion-de-la-Gestion-SESNA-1erS_2025-c_a0.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión Anual 2024', 'url' => '/wp-content/uploads/2025/11/Informe-de-Evaluacion-de-la-Gestion-SESNA-2S_2024_-Nuevos-TdR_120820250.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión 1er Semestre 2024', 'url' => '/wp-content/uploads/2024/09/Informe-de-Evaluacion-de-la-Gestion-SESNA-1erS_2024_-Nuevos-TdR-002.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión Anual 2023', 'url' => '/wp-content/uploads/2023/10/Informe-Anual-de-Autoevaluacion-SESNA-2023_.pdf', 'disponible' => true ),
            array( 'label' => 'Informe de Autoevaluación de la Gestión 1er Semestre 2023', 'url' => '/wp-content/uploads/2023/10/Informe-Semestral-de-Gestion-SESNA-2023_.pdf', 'disponible' => true ),
        ),
    ),
);
?>
<div class="page-pna-planeacion cf-search-scope">

    <!-- Encabezado de Sección y Buscador -->
    <div class="muestra--flex flex-wrap align-items-center justify-content-between gap--16 mb--32">
        <div class="muestra--flex align-items-center gap--16">
            <div class="icon-bg-circle flex-shrink-0 fondo--principal">
                <i class="snd__icono snd-checkmark--filled icono--24 color--blanco" aria-hidden="true"></i>
            </div>
            <div>
                <h1 class="h1b patria color--pguinda600 mb--4">Planeación Institucional</h1>
                <p class="sh1r color--neutro600 mb--0">Documentos que orientan y dan seguimiento al cumplimiento de los objetivos y metas institucionales.</p>
            </div>
        </div>
        <div class="fin-search flex-shrink-0" role="search">
            <i class="snd__icono snd-search search-icon icono--16 color--neutro600" aria-hidden="true"></i>
            <input type="search" class="cf-search-input" placeholder="Buscar documento..." aria-label="Buscar documento">
        </div>
    </div>

    <!-- Retícula de Tarjetas de Documentos -->
    <div class="reticulaGrid__12">
        <?php foreach ( $pi_grupos as $i => $grupo ) : ?>
        <div class="columna__12 columna__6--md columna__4--lg pna-chart-card mb--24" style="--delay:<?php echo esc_attr( $i * .1 ); ?>s">
            <div class="pna-group-card">
                <!-- Encabezado del grupo -->
                <div class="muestra--flex align-items-center gap--12 mb--16">
                    <div class="icon-bg-circle icon-bg-circle--sm flex-shrink-0 fondo--pguinda100">
                        <i class="snd__icono <?php echo esc_attr( $grupo['icono'] ); ?> icono--20 color--pguinda600" aria-hidden="true"></i>
                    </div>
                    <h2 class="sh1b color--pguinda600 mb--0"><?php echo esc_html( $grupo['titulo'] ); ?></h2>
                </div>

                <!-- Lista de documentos -->
                <div class="muestra--flex flex-direction-column flex-grow">
                    <?php foreach ( $grupo['docs'] as $doc ) :
                        $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                        if ( $doc['disponible'] ) : ?>
                    <a href="<?php echo esc_url( $doc['url'] ); ?>"
                       class="pna-doc-item cf-doc-row px--12 py--8 radio--2 decoracion--ninguna color--neutro800"
                       data-modal-target="#pdfViewerModal"
                       data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                       data-pdf-title="<?php echo esc_attr( $doc['label'] ); ?>"
                       data-cf-search="<?php echo $search_attr; ?>">
                        <span class="sdr color--neutro800 mb--0"><?php echo esc_html( $doc['label'] ); ?></span>
                        <span class="cf-doc-view" data-tooltip="Ver documento" aria-hidden="true">
                            <i class="snd__icono snd-document icono--16" aria-hidden="true"></i>
                        </span>
                        <span class="oculto">Ver documento</span>
                    </a>
                    <?php else : ?>
                    <div class="cf-doc-row px--12 py--8 radio--2" data-cf-search="<?php echo $search_attr; ?>">
                        <span class="sdr color--neutro600 mb--0"><?php echo esc_html( $doc['label'] ); ?></span>
                        <span class="xsdr color--neutro600 radio--pildora fondo--neutro200 px--8 py--4 borde mb--0">Próximamente</span>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <!-- Nota informativa al pie -->
                <div class="mt--auto pt--16 muestra--flex align-items-start gap--8 borde--superior">
                    <i class="snd__icono snd-information icono--16 color--neutro600 flex-shrink-0 mt--2" aria-hidden="true"></i>
                    <p class="xsdr color--neutro600 mb--0"><?php echo esc_html( $grupo['nota'] ); ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>
