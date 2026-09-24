<?php
/**
 * Contenido: Contrataciones y Adquisiciones
 * Compartido entre page-contrataciones-adquisiciones.php y el panel dinámico
 * "Contrataciones y Adquisiciones" de page-administracion-finanzas.php.
 *
 * Fuentes (Inventario_DGAyF.json):
 *  - "Contratos de las personas Integrantes del Comité de Participación Ciudadana..."
 *  - "Adquisiciones" > subsecciones, reclasificadas por código de procedimiento
 *    (IA- = invitación a cuando menos tres personas, LA- = licitación pública).
 */

$cf_json_path = get_template_directory() . '/data/inventario-dgayf.json';

$cf_columnas = array(
    'comite' => array(
        'titulo' => 'Contratos de Integrantes del Comité de Participación Ciudadana',
        'icono'  => 'bi-people',
        'bg'     => '#F9F0F3',
        'color'  => '#611232',
        'nota'   => 'Documentos que contienen los contratos de las personas integrantes del Comité de Participación Ciudadana.',
        'anios'  => array(),
    ),
    'convocatorias' => array(
        'titulo' => 'Convocatorias de Invitación a Cuando Menos Tres Personas',
        'icono'  => 'bi-megaphone',
        'bg'     => '#EEE8F5',
        'color'  => '#72588F',
        'nota'   => 'Convocatorias para procedimientos de invitación a cuando menos tres personas.',
        'anios'  => array(),
    ),
    'licitaciones' => array(
        'titulo' => 'Licitaciones Públicas',
        'icono'  => 'bi-file-earmark-text',
        'bg'     => '#F9F0F3',
        'color'  => '#611232',
        'nota'   => 'Información de las licitaciones públicas realizadas por la SESNA.',
        'anios'  => array(),
    ),
    'programa' => array(
        'titulo' => 'Programa Anual de Adquisiciones, Arrendamientos y Servicios',
        'icono'  => 'bi-cart-check',
        'bg'     => '#EEE8F5',
        'color'  => '#72588F',
        'nota'   => 'Programa que establece las adquisiciones, arrendamientos y servicios programados para cada ejercicio fiscal.',
        'anios'  => array(),
    ),
);

if ( file_exists( $cf_json_path ) ) {
    $cf_data = json_decode( file_get_contents( $cf_json_path ), true );

    if ( is_array( $cf_data ) ) {
        foreach ( $cf_data as $seccion ) {
            if ( ! isset( $seccion['seccion'] ) ) {
                continue;
            }

            // ── Comité de Participación Ciudadana ──
            if ( 'Contratos de las personas Integrantes del Comité de Participación Ciudadana del Sistema Nacional Anticorrupción' === $seccion['seccion'] ) {
                foreach ( $seccion['subsecciones'] as $sub ) {
                    foreach ( $sub['documentos'] as $doc ) {
                        if ( empty( $doc['url'] ) || empty( $doc['anio'] ) ) {
                            continue;
                        }
                        $anio = strval( $doc['anio'] );
                        $cf_columnas['comite']['anios'][ $anio ][] = array(
                            'label'      => mb_convert_case( $doc['contenidoN1'], MB_CASE_TITLE, 'UTF-8' ),
                            'url'        => sna_rewrite_sesna_domain_in_content( $doc['url'] ),
                            'disponible' => true,
                        );
                    }
                }
            }

            // ── Adquisiciones ──
            if ( 'Adquisiciones' === $seccion['seccion'] ) {
                foreach ( $seccion['subsecciones'] as $sub ) {
                    foreach ( $sub['documentos'] as $doc ) {
                        $url         = isset( $doc['url'] ) ? trim( $doc['url'] ) : '';
                        $es_url_real = ( 0 === strpos( $url, 'http' ) || 0 === strpos( $url, '/' ) );
                        $url_final   = $es_url_real ? sna_rewrite_sesna_domain_in_content( $url ) : '';
                        $anio        = ! empty( $doc['anio'] ) ? strval( $doc['anio'] ) : 'Sin fecha';
                        $texto       = $doc['contenidoN1'];

                        if ( 'Convocatorias de Invitación a Cuando Menos Tres Personas' === $sub['subseccion'] ) {
                            if ( preg_match( '/\bIA-[A-Z0-9-]+/', $texto ) ) {
                                $cf_columnas['convocatorias']['anios'][ $anio ][] = array(
                                    'label'      => $doc['descripcion'] ? $doc['descripcion'] : $texto,
                                    'url'        => $url_final,
                                    'disponible' => $es_url_real,
                                );
                            } elseif ( preg_match( '/\bLA-[A-Z0-9-]+/', $texto, $m ) ) {
                                $cf_columnas['licitaciones']['anios'][ $anio ][] = array(
                                    'label'      => $m[0],
                                    'url'        => $url_final,
                                    'disponible' => $es_url_real,
                                );
                            }
                        } elseif ( 'Licitación Pública Nacional Electrónica' === $sub['subseccion'] ) {
                            preg_match( '/\bLA-[A-Z0-9-]+/', $texto, $m );
                            $cf_columnas['licitaciones']['anios'][ $anio ][] = array(
                                'label'      => $m ? $m[0] : $texto,
                                'url'        => $url_final,
                                'disponible' => $es_url_real,
                            );
                        } elseif ( 'Programa Anual de Adquisiciones, Arrendamientos y Servicios' === $sub['subseccion'] ) {
                            $cf_columnas['programa']['anios'][ $anio ][] = array(
                                'label'      => $doc['descripcion'] ? $doc['descripcion'] : $texto,
                                'url'        => $url_final,
                                'disponible' => $es_url_real,
                            );
                        }
                    }
                }
            }
        }
    }
}

foreach ( $cf_columnas as &$cf_col ) {
    krsort( $cf_col['anios'], SORT_STRING );
}
unset( $cf_col );
?>
<div class="page-pna-contrataciones cf-search-scope">

    <!-- Encabezado -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-bg-circle flex-shrink-0" style="background-color: #611232;">
                <i class="bi bi-briefcase" style="color: #fff;"></i>
            </div>
            <div>
                <h2 class="h3 fw-bold font-patria mb-1" style="color: #611232;">Contrataciones y Adquisiciones</h2>
                <p class="text-muted mb-0" style="font-size: 15px;">Información relacionada con los procedimientos de contratación y adquisición de bienes y servicios.</p>
            </div>
        </div>
        <div class="fin-search flex-shrink-0">
            <i class="bi bi-search"></i>
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
                                <span class="cf-doc-view" data-tooltip="Ver documento" aria-hidden="true"><i class="bi bi-file-earmark-text"></i></span>
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
                    <i class="bi bi-info-circle text-muted flex-shrink-0" style="font-size: 13px; margin-top: 2px;"></i>
                    <span class="text-muted font-noto-sans" style="font-size: 12px;"><?php echo esc_html( $col['nota'] ); ?></span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Nota al pie -->
    <div class="fin-footer-note d-flex align-items-center gap-3 mt-4">
        <div class="icon-bg-circle flex-shrink-0" style="background-color: #611232;">
            <i class="bi bi-shield-check" style="color: #fff;"></i>
        </div>
        <p class="mb-0 font-noto-sans text-muted">La información publicada en esta sección contribuye a la transparencia, la rendición de cuentas y el fortalecimiento de la gestión institucional de la SESNA.</p>
    </div>

</div>
