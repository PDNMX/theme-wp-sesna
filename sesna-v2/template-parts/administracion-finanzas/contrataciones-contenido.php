<?php
/**
 * Contenido: Contrataciones y Adquisiciones
 * Compartido entre page-contrataciones-adquisiciones.php y el panel dinámico
 * "Contrataciones y Adquisiciones" de page-administracion-finanzas.php.
 *
 * Datos hardcodeados (ya no se leen de Inventario_DGAyF.json) para evitar la
 * dependencia de la copia del JSON dentro del tema. Si se agregan documentos
 * nuevos, hay que añadirlos aquí manualmente.
 */

$cf_columnas = array(
    'comite' => array(
        'titulo' => 'Contratos de Integrantes del Comité de Participación Ciudadana',
        'icono'  => 'bi-people',
        'bg'     => '#F9F0F3',
        'color'  => '#611232',
        'nota'   => 'Documentos que contienen los contratos de las personas integrantes del Comité de Participación Ciudadana.',
        'anios'  => array(
            '2024' => array(
                array( 'label' => 'Jorge Alberto Alatorre Flores', 'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/06/CONTRATO-HONORARIOS_JORGE-ALBERTO-ALATORRE-FLORES_FEB-2024_VP.pdf', 'disponible' => true ),
                array( 'label' => 'Magdalena Verónica Rodríguez Castillo', 'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/06/CONTRATO-HONORARIOS_MAGDALENA-VERONICA-RODRIGUEZ-CASTILLO_FEB-2024_VP.pdf', 'disponible' => true ),
                array( 'label' => 'Vania Pérez Morales', 'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/06/CONTRATO-HONORARIOS_VANIA-PEREZ-MORALES_FEB-2024_VP.pdf', 'disponible' => true ),
                array( 'label' => 'José Rafael Martínez Puón', 'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/06/CONTRATO-HONORARIOS_JOSE-RAFAEL-MARTINEZ-PUON_FEB-2024_VP.pdf', 'disponible' => true ),
                array( 'label' => 'Blanca Patricia Talavera Torres', 'url' => 'https://www.sesna.gob.mx/wp-content/uploads/2024/06/CONTRATO-HONORARIOS_BLANCA-PATRICIA-TALAVERA-TORRES_FEB-2024_VP.pdf', 'disponible' => true ),
            ),
        ),
    ),
    'convocatorias' => array(
        'titulo' => 'Convocatorias de Invitación a Cuando Menos Tres Personas',
        'icono'  => 'bi-megaphone',
        'bg'     => '#EEE8F5',
        'color'  => '#72588F',
        'nota'   => 'Convocatorias para procedimientos de invitación a cuando menos tres personas.',
        'anios'  => array(
            '2025' => array(
                array( 'label' => 'Convocatoria de Invitación a cuando menos tres personas denominada Servicio de Evaluación de la Política Nacional Anticorrupción, con número de procedimiento IA-47-AYM-047AYM999-N-11-2025', 'url' => '/wp-content/uploads/2025/07/Convocatoria-de-Invitacion-a-cuando-menos-tres-personas-denominada-Servicio-de-Evaluacion-de-la-Politica-Nacional-Anticorrupcion-con-numero-de-procedimiento-IA-47-AYM-047AYM999-N-11-2025.pdf', 'disponible' => true ),
            ),
        ),
    ),
    'licitaciones' => array(
        'titulo' => 'Licitaciones Públicas',
        'icono'  => 'bi-file-earmark-text',
        'bg'     => '#F9F0F3',
        'color'  => '#611232',
        'nota'   => 'Información de las licitaciones públicas realizadas por la SESNA.',
        'anios'  => array(
            '2025' => array(
                array( 'label' => 'LA-47-AYM-047AYM999-N-5-2025', 'url' => '/wp-content/uploads/2025/03/CONVOCATORIA-VF.pdf', 'disponible' => true ),
            ),
            '2024' => array(
                array( 'label' => 'LA-47-AYM-047AYM999-N-1-2024', 'url' => '/wp-content/uploads/2024/02/CONVOCATORIA-Servicio-Integral_.pdf', 'disponible' => true ),
            ),
            '2023' => array(
                array( 'label' => 'LA-47-AYM-047AYM999-N-6-2023', 'url' => '/wp-content/uploads/2023/03/CONVOCATORIA-LA-47-AYM-047AYM999-N-6-2023-SERVICIO-INTEGRAL-DE-EVENTOS.pdf', 'disponible' => true ),
            ),
            '2020' => array(
                array( 'label' => 'LA-047AYM999-E11-2020', 'url' => '/wp-content/uploads/2020/03/CONVOCATORIA-PASAJES-AÉREOS-LA-047AYM999-E11-2020.pdf', 'disponible' => true ),
            ),
        ),
    ),
    'programa' => array(
        'titulo' => 'Programa Anual de Adquisiciones, Arrendamientos y Servicios',
        'icono'  => 'bi-cart-check',
        'bg'     => '#EEE8F5',
        'color'  => '#72588F',
        'nota'   => 'Programa que establece las adquisiciones, arrendamientos y servicios programados para cada ejercicio fiscal.',
        'anios'  => array(
            '2024' => array(
                array( 'label' => 'Programa Anual de Adquisiciones, Arrendamientos y Servicios 2024', 'url' => '/wp-content/uploads/2024/02/PAAAS-2024.pdf', 'disponible' => true ),
            ),
            '2023' => array(
                array( 'label' => 'Programa Anual de Adquisiciones, Arrendamientos y Servicios 2023', 'url' => '/wp-content/uploads/2023/01/2023-47-047AYM-001-ENERO-23-CAAS-1a-SESION.pdf', 'disponible' => true ),
            ),
            '2022' => array(
                array( 'label' => 'Programa Anual de Adquisiciones, Arrendamientos y Servicios 2022', 'url' => '/wp-content/uploads/2022/02/PASOP-ENERO-2022-REPORTE-EJECUTIVO-28Ene2022.pdf', 'disponible' => true ),
            ),
            '2021' => array(
                array( 'label' => 'Programa Anual de Adquisiciones, Arrendamientos y Servicios 2021', 'url' => '/wp-content/uploads/2021/01/PROGRAMA-ANUAL-SESNA-2021.pdf', 'disponible' => true ),
            ),
        ),
    ),
);

foreach ( $cf_columnas as &$cf_col ) {
    foreach ( $cf_col['anios'] as &$cf_docs ) {
        foreach ( $cf_docs as &$cf_doc ) {
            if ( $cf_doc['disponible'] ) {
                $cf_doc['url'] = sna_rewrite_sesna_domain_in_content( $cf_doc['url'] );
            }
        }
        unset( $cf_doc );
    }
    unset( $cf_docs );
}
unset( $cf_col );
?>
<div class="page-pna-contrataciones cf-search-scope">

    <!-- Encabezado -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-bg-circle flex-shrink-0" style="background-color: #611232;">
                <svg  style="color: #fff;" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/></svg>
            </div>
            <div>
                <h2 class="h3 fw-bold font-patria mb-1" style="color: #611232;">Contrataciones y Adquisiciones</h2>
                <p class="text-muted mb-0" style="font-size: 15px;">Información relacionada con los procedimientos de contratación y adquisición de bienes y servicios.</p>
            </div>
        </div>
        <div class="fin-search flex-shrink-0">
            <svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
            <input type="search" class="cf-search-input" placeholder="Buscar documento" aria-label="Buscar documento">
        </div>
    </div>

    <div class="row g-4">
        <?php foreach ( $cf_columnas as $col_key => $col ) : ?>
        <div class="col-lg-3 col-md-6 pna-chart-card" style="--delay:0s">
            <div class="card border rounded-4 h-100 d-flex flex-column p-3" style="border-color: #e8d0d8 !important;">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="icon-bg-circle icon-bg-circle--sm flex-shrink-0" style="background-color: <?php echo esc_attr( $col['bg'] ); ?>;">
                        <i class="bi <?php echo esc_attr( $col['icono'] ); ?>" style="color: <?php echo esc_attr( $col['color'] ); ?>;"></i>
                    </div>
                    <h3 class="h6 fw-bold mb-0 font-noto-sans" style="color: #611232; line-height: 1.3;"><?php echo esc_html( $col['titulo'] ); ?></h3>
                </div>

                <div class="d-flex flex-column flex-grow-1">
                    <?php
                    $multi = count( $col['anios'] ) > 1;
                    $first = true;
                    foreach ( $col['anios'] as $anio => $docs ) :
                        $group_id = 'cf-' . $col_key . '-' . sanitize_title( $anio );
                        $abierto  = $first;
                        $first    = false;
                        ?>
                    <div class="mb-1">
                        <?php if ( $multi ) : ?>
                        <button type="button" class="cf-year-toggle" data-cf-toggle="<?php echo esc_attr( $group_id ); ?>">
                            <span><?php echo esc_html( $anio ); ?></span>
                            <i class="bi <?php echo $abierto ? 'bi-chevron-down' : 'bi-chevron-right'; ?> cf-year-chevron"></i>
                        </button>
                        <?php else : ?>
                        <div class="cf-year-label"><?php echo esc_html( $anio ); ?></div>
                        <?php endif; ?>
                        <div class="cf-year-docs <?php echo ( $multi && ! $abierto ) ? 'd-none' : ''; ?>" id="<?php echo esc_attr( $group_id ); ?>" data-cf-default-open="<?php echo $abierto ? 'true' : 'false'; ?>">
                            <?php foreach ( $docs as $doc ) :
                                $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                                if ( $doc['disponible'] ) : ?>
                            <a href="<?php echo esc_url( $doc['url'] ); ?>"
                               class="pna-doc-item cf-doc-row px-2 py-2 rounded-3 text-decoration-none"
                               data-bs-toggle="modal" data-bs-target="#pdfViewerModal"
                               data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                               data-pdf-title="<?php echo esc_attr( $doc['label'] ); ?>"
                               data-cf-search="<?php echo $search_attr; ?>"
                               style="color: #333;">
                                <span class="font-noto-sans" style="font-size: 13px;"><?php echo esc_html( $doc['label'] ); ?></span>
                                <span class="cf-doc-view" data-tooltip="Ver documento" aria-hidden="true"><svg  width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg></span>
                                <span class="visually-hidden">Ver documento</span>
                            </a>
                            <?php else : ?>
                            <div class="cf-doc-row px-2 py-2 rounded-3" data-cf-search="<?php echo $search_attr; ?>">
                                <span class="font-noto-sans text-muted" style="font-size: 13px;"><?php echo esc_html( $doc['label'] ); ?></span>
                                <span class="badge rounded-pill" style="background-color: #f0e9f0; color: #9c8a94; font-weight: 600; font-size: 10px; padding: 4px 10px; white-space: nowrap; justify-self: start;">Próximamente</span>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-3 pt-3 d-flex align-items-start gap-2" style="border-top: 1px solid #e8d0d8;">
                    <svg class="text-muted flex-shrink-0" style="font-size: 13px; margin-top: 2px;" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/></svg>
                    <span class="text-muted font-noto-sans" style="font-size: 12px;"><?php echo esc_html( $col['nota'] ); ?></span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Nota al pie -->
    <div class="fin-footer-note d-flex align-items-center gap-3 mt-4">
        <div class="icon-bg-circle flex-shrink-0" style="background-color: #611232;">
            <svg  style="color: #fff;" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
        </div>
        <p class="mb-0 font-noto-sans text-muted">La información publicada en esta sección contribuye a la transparencia, la rendición de cuentas y el fortalecimiento de la gestión institucional de la SESNA.</p>
    </div>

</div>
