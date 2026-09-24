<?php
/**
 * Contenido: Archivo Documental
 * Compartido por page-archivo-documental.php.
 *
 * Fuente (Inventario_DGAyF.json): sección "Archivo Documental".
 * Las URLs se enlazan tal como vienen en el JSON (solo se reescribe el
 * dominio de producción al dominio actual, sin alterar la ruta). Cuando el
 * documento no es un PDF directo (algunas entradas del JSON apuntan a la
 * página de transparencia en vez de al archivo), se enlaza como página
 * externa en lugar de abrir el visor modal.
 */

$ad_json_path = get_template_directory() . '/data/inventario-dgayf.json';

$ad_columnas = array(
    'Plan Anual de Desarrollo Archivístico (PADA)' => array( 'icono' => 'bi-calendar-check', 'bg' => '#F9F0F3', 'color' => '#611232' ),
    'Informe de Cumplimiento del Programa Anual de Desarrollo Archivístico (PADA)' => array( 'icono' => 'bi-graph-up-arrow', 'bg' => '#EEE8F5', 'color' => '#72588F' ),
    'Instrumentos de Control Archivístico de la SESNA' => array( 'icono' => 'bi-diagram-3', 'bg' => '#F9F0F3', 'color' => '#611232' ),
    'Guía de Archivo Documental' => array( 'icono' => 'bi-book', 'bg' => '#EEE8F5', 'color' => '#72588F' ),
    'Inventario general por Expediente' => array( 'icono' => 'bi-archive', 'bg' => '#F9F0F3', 'color' => '#611232' ),
);

$ad_grupos = array();

if ( file_exists( $ad_json_path ) ) {
    $ad_data = json_decode( file_get_contents( $ad_json_path ), true );

    if ( is_array( $ad_data ) ) {
        foreach ( $ad_data as $seccion ) {
            if ( ! isset( $seccion['seccion'] ) || 'Archivo Documental' !== $seccion['seccion'] ) {
                continue;
            }

            foreach ( $seccion['subsecciones'] as $sub ) {
                $titulo = $sub['subseccion'];
                $nota   = '';
                $docs   = array();

                foreach ( $sub['documentos'] as $doc ) {
                    if ( empty( $doc['url'] ) ) {
                        continue;
                    }
                    if ( ! $nota && ! empty( $doc['descripcion'] ) ) {
                        $nota = $doc['descripcion'];
                    }
                    $url_final = sna_rewrite_sesna_domain_in_content( $doc['url'] );
                    $docs[]    = array(
                        'label'  => $doc['contenidoN1'],
                        'url'    => $url_final,
                        'anio'   => ! empty( $doc['anio'] ) ? intval( $doc['anio'] ) : 0,
                        'es_pdf' => (bool) preg_match( '/\.pdf(\?.*)?$/i', $url_final ),
                    );
                }

                // Más reciente primero.
                usort( $docs, function ( $a, $b ) {
                    return $b['anio'] <=> $a['anio'];
                } );

                $ad_grupos[ $titulo ] = array(
                    'titulo' => $titulo,
                    'nota'   => $nota,
                    'docs'   => $docs,
                );
            }
            break;
        }
    }
}
?>
<div class="page-pna-archivo cf-search-scope">

    <!-- Encabezado -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-bg-circle flex-shrink-0" style="background-color: #611232;">
                <i class="bi bi-journals" style="color: #fff;"></i>
            </div>
            <div>
                <h2 class="h3 fw-bold font-patria mb-1" style="color: #611232;">Archivo Documental</h2>
                <p class="text-muted mb-0" style="font-size: 15px;">Instrumentos para la organización, conservación y administración de los archivos institucionales.</p>
            </div>
        </div>
        <div class="fin-search flex-shrink-0">
            <i class="bi bi-search"></i>
            <input type="search" class="cf-search-input" placeholder="Buscar documento" aria-label="Buscar documento">
        </div>
    </div>

    <div class="row g-4">
        <?php $ad_i = 0; foreach ( $ad_grupos as $grupo ) :
            $meta = isset( $ad_columnas[ $grupo['titulo'] ] ) ? $ad_columnas[ $grupo['titulo'] ] : array( 'icono' => 'bi-folder2-open', 'bg' => '#F9F0F3', 'color' => '#611232' );
            ?>
        <div class="col-lg-4 col-md-6 pna-chart-card" style="--delay:<?php echo esc_attr( ( $ad_i++ % 3 ) * .1 ); ?>s">
            <div class="card border rounded-4 h-100 d-flex flex-column p-3" style="border-color: #e8d0d8 !important;">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="icon-bg-circle icon-bg-circle--sm flex-shrink-0" style="background-color: <?php echo esc_attr( $meta['bg'] ); ?>;">
                        <i class="bi <?php echo esc_attr( $meta['icono'] ); ?>" style="color: <?php echo esc_attr( $meta['color'] ); ?>;"></i>
                    </div>
                    <h3 class="h6 fw-bold mb-0 font-noto-sans" style="color: #611232; line-height: 1.3;"><?php echo esc_html( $grupo['titulo'] ); ?></h3>
                </div>

                <div class="d-flex flex-column flex-grow-1">
                    <?php foreach ( $grupo['docs'] as $doc ) :
                        $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                        if ( $doc['es_pdf'] ) : ?>
                    <a href="<?php echo esc_url( $doc['url'] ); ?>"
                       class="pna-doc-item cf-doc-row px-2 py-2 rounded-3 text-decoration-none"
                       data-bs-toggle="modal" data-bs-target="#pdfViewerModal"
                       data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                       data-pdf-title="<?php echo esc_attr( $doc['label'] ); ?>"
                       data-cf-search="<?php echo $search_attr; ?>"
                       style="color: #333;">
                        <span class="font-noto-sans" style="font-size: 13px;"><?php echo esc_html( $doc['label'] ); ?></span>
                        <span class="cf-doc-view" data-tooltip="Ver documento" aria-hidden="true"><i class="bi bi-file-earmark-text"></i></span>
                        <span class="visually-hidden">Ver documento</span>
                    </a>
                    <?php else : ?>
                    <a href="<?php echo esc_url( $doc['url'] ); ?>" target="_blank" rel="noopener"
                       class="pna-doc-item cf-doc-row px-2 py-2 rounded-3 text-decoration-none"
                       data-cf-search="<?php echo $search_attr; ?>"
                       style="color: #333;">
                        <span class="font-noto-sans" style="font-size: 13px;"><?php echo esc_html( $doc['label'] ); ?></span>
                        <span class="cf-doc-view" data-tooltip="Abrir enlace" aria-hidden="true"><i class="bi bi-box-arrow-up-right"></i></span>
                        <span class="visually-hidden">Abrir enlace</span>
                    </a>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <?php if ( $grupo['nota'] ) : ?>
                <div class="mt-3 pt-3 d-flex align-items-start gap-2" style="border-top: 1px solid #e8d0d8;">
                    <i class="bi bi-info-circle text-muted flex-shrink-0" style="font-size: 13px; margin-top: 2px;"></i>
                    <span class="text-muted font-noto-sans" style="font-size: 12px;"><?php echo esc_html( $grupo['nota'] ); ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>
