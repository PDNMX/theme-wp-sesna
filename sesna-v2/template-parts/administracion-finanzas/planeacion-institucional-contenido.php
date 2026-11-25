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
        'nota'   => 'Documento rector que establece los objetivos, estrategias y líneas de acción de la SESNA.',
        'docs'   => array(
            array( 'label' => 'Programa Institucional SESNA 2025-2030', 'url' => '/wp-content/uploads/2025/10/2025_08_29_PI_2025-2030_sesna.pdf', 'disponible' => true ),
            array( 'label' => 'Programa Institucional SESNA 2020-2024', 'url' => '/wp-content/uploads/2020/06/2020_06_17_MAT_sesna.pdf', 'disponible' => true ),
        ),
    ),
    array(
        'titulo' => 'Informes del Programa Institucional 2020-2024',
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
$pi_is_dashboard = is_page_template( 'page-administracion-finanzas.php' );
$pi_htag         = $pi_is_dashboard ? 'h2' : 'h1';
$pi_hclass       = $pi_is_dashboard ? 'h2b' : 'h1b';
?>
<div class="page-pna-planeacion cf-search-scope">

    <!-- Encabezado de Sección -->
    <div class="mb--32">
        <<?php echo $pi_htag; ?> class="<?php echo $pi_hclass; ?> patria color--pguinda600 mb--4">Planeación Institucional</<?php echo $pi_htag; ?>>
        <p class="sh1r color--neutro600 mb--0">Documentos que orientan y dan seguimiento al cumplimiento de los objetivos y metas institucionales.</p>
    </div>

    <!-- Caja/panel que envuelve Tabs + contenido — misma estructura que template-transparencia-comite.php y page-organos-colegiados.php -->
    <div class="tx-comite-panel">

        <!-- Selector Móvil SND v1.1.0: mismo .boton__secundario + chevron que page-organos-colegiados.php -->
        <div class="pna-mobile-selector mb--20">
            <button type="button" class="boton__secundario ocn-mobile-tab-trigger" id="pnaOpenDrawerBtn" aria-haspopup="dialog" aria-expanded="false" aria-controls="pnaDrawer">
                <span id="pnaActiveSectionLabel"><?php echo esc_html( $pi_grupos[0]['titulo'] ); ?></span>
                <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20') ?>
            </button>
        </div>

        <!-- Pestañas Desktop — SND UI Kit (Tabs 01 / línea inferior: 618:2598 / 16460:870) -->
        <div class="pna-tabs-desktop tx-comite-tabs-container tx-comite-tabs-container--underline mb--24">
            <ul class="ul--limpio tx-comite-tabs" id="pnaTabs" role="tablist">
                <?php foreach ( $pi_grupos as $i => $grupo ) : ?>
                <li role="presentation">
                    <button class="tx-comite-tab" id="pna-tab-<?php echo esc_attr( $i ); ?>" data-tab-target="#pna-pane-<?php echo esc_attr( $i ); ?>" type="button" role="tab" aria-controls="pna-pane-<?php echo esc_attr( $i ); ?>" aria-selected="<?php echo ( 0 === $i ) ? 'true' : 'false'; ?>">
                        <?php echo esc_html( $grupo['titulo'] ); ?>
                    </button>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Contenido de cada pestaña: lista de documentos de ancho completo -->
        <div class="tx-comite-tab-content" id="pnaTabsContent">
            <?php foreach ( $pi_grupos as $i => $grupo ) : ?>
            <div class="tx-comite-tab-pane <?php echo ( 0 === $i ) ? '' : 'muestra--ninguno'; ?>" id="pna-pane-<?php echo esc_attr( $i ); ?>" role="tabpanel" aria-labelledby="pna-tab-<?php echo esc_attr( $i ); ?>" tabindex="0">

                <div class="fin-doc-list">
                    <?php foreach ( $grupo['docs'] as $doc ) :
                        $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                        $doc_url     = function_exists( 'sna_resolve_upload_url' ) ? sna_resolve_upload_url( $doc['url'] ) : $doc['url'];
                        ?>
                        <div class="fin-doc-row pna-doc-row" data-cf-search="<?php echo $search_attr; ?>">
                            <div class="fin-doc-left">
                                <h3 class="b1r color--neutro800 mb--0 fin-doc-label"><?php echo esc_html( $doc['label'] ); ?></h3>
                            </div>
                            <div class="fin-doc-action">
                                <?php if ( ! empty( $doc['disponible'] ) ) : ?>
                                    <button type="button" class="boton__fantasma fin-doc-btn"
                                            data-modal-target="#pdfViewerModal"
                                            data-pdf-url="<?php echo esc_url( $doc_url ); ?>"
                                            data-pdf-title="<?php echo esc_attr( $doc['label'] ); ?>"
                                            aria-label="Consultar <?php echo esc_attr( $doc['label'] ); ?>">
                                        <?= sesna_render_snd_svg_icon('snd-document--pdf', 'icono--20') ?>
                                        Consultar
                                    </button>
                                <?php else : ?>
                                    <span class="insignia-borde insignia-neutro" role="status">Próximamente</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div id="pi-nota-msg-<?php echo esc_attr( $i ); ?>" class="mensajeInformativo mensajeInformativo--informativo mt--20" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="pi-nota-msg-<?php echo esc_attr( $i ); ?>">
                    <?php echo esc_html( $grupo['nota'] ); ?>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>

</div>

<?php get_template_part( 'template-parts/ui/mobile-drawer', null, array(
    'prefix'        => 'pna',
    'overlay_class' => 'page-planeacion-institucional',
    'title'         => 'Seleccionar sección',
    'close_label'   => 'Cerrar selección de sección',
    'body'          => function () use ( $pi_grupos ) { ?>
            <div class="muestra--flex flex-direction-column gap--8" role="listbox" aria-label="Secciones de Planeación Institucional">
                <?php foreach ( $pi_grupos as $i => $grupo ) :
                    $is_active = ( 0 === $i );
                    ?>
                    <button type="button"
                            class="fin-dictamen-item <?php echo $is_active ? 'active' : ''; ?>"
                            role="option"
                            aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                            data-tab-index="<?php echo esc_attr( $i ); ?>"
                            data-tab-target="#pna-pane-<?php echo esc_attr( $i ); ?>"
                            data-section-title="<?php echo esc_attr( $grupo['titulo'] ); ?>">
                        <span><?php echo esc_html( $grupo['titulo'] ); ?></span>
                        <?= sesna_render_snd_svg_icon('snd-checkmark', 'icono--16 ocn-drawer-check') ?>
                    </button>
                <?php endforeach; ?>
            </div>
    <?php },
) ); ?>
