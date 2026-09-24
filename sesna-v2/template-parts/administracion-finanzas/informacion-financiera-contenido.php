<?php
/**
 * Contenido: Información Financiera
 * Compartido entre page-informacion-financiera.php y el panel dinámico
 * "Información Financiera" de page-administracion-finanzas.php.
 *
 * Requiere que la página que lo incluya también incluya, una sola vez,
 * get_template_part( 'template-parts/visor-pdf' ).
 */

$fin_anios       = array();
$fin_dictamenes  = array();
$fin_json_path   = get_template_directory() . '/data/inventario-dgayf.json';

$fin_orden_trimestres = array( 'Primer Trimestre', 'Segundo Trimestre', 'Tercer Trimestre', 'Cuarto Trimestre' );
$fin_orden_meses      = array( 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre', 'Diciembre (acumulado)' );
$fin_mes_a_trimestre  = array(
    'Enero' => 'Primer Trimestre', 'Febrero' => 'Primer Trimestre', 'Marzo' => 'Primer Trimestre',
    'Abril' => 'Segundo Trimestre', 'Mayo' => 'Segundo Trimestre', 'Junio' => 'Segundo Trimestre',
    'Julio' => 'Tercer Trimestre', 'Agosto' => 'Tercer Trimestre', 'Septiembre' => 'Tercer Trimestre',
    'Octubre' => 'Cuarto Trimestre', 'Noviembre' => 'Cuarto Trimestre', 'Diciembre' => 'Cuarto Trimestre', 'Diciembre (acumulado)' => 'Cuarto Trimestre',
);

if ( file_exists( $fin_json_path ) ) {
    $fin_data = json_decode( file_get_contents( $fin_json_path ), true );

    if ( is_array( $fin_data ) ) {

        // ── Sección "Estados Financieros" ──
        $fin_seccion_ef = null;
        foreach ( $fin_data as $seccion ) {
            if ( isset( $seccion['seccion'] ) && 'Estados Financieros' === $seccion['seccion'] ) {
                $fin_seccion_ef = $seccion;
                break;
            }
        }

        if ( $fin_seccion_ef ) {
            foreach ( $fin_seccion_ef['subsecciones'] as $sub ) {
                if ( ! preg_match( '/(\d{4})/', $sub['subseccion'], $m ) ) {
                    continue;
                }
                $anio = $m[1];

                if ( ! isset( $fin_anios[ $anio ] ) ) {
                    $fin_anios[ $anio ] = array();
                    foreach ( $fin_orden_trimestres as $t ) {
                        $fin_anios[ $anio ][ $t ] = array( 'documentos' => array(), 'meses' => array() );
                    }
                }

                foreach ( $sub['documentos'] as $doc ) {
                    if ( empty( $doc['url'] ) ) {
                        continue;
                    }
                    $doc['url'] = sna_rewrite_sesna_domain_in_content( $doc['url'] );
                    $n1         = $doc['contenidoN1'];

                    if ( in_array( $n1, $fin_orden_trimestres, true ) ) {
                        $fin_anios[ $anio ][ $n1 ]['documentos'][] = $doc;
                    } elseif ( isset( $fin_mes_a_trimestre[ $n1 ] ) ) {
                        $trimestre = $fin_mes_a_trimestre[ $n1 ];
                        if ( ! isset( $fin_anios[ $anio ][ $trimestre ]['meses'][ $n1 ] ) ) {
                            $fin_anios[ $anio ][ $trimestre ]['meses'][ $n1 ] = array();
                        }
                        $fin_anios[ $anio ][ $trimestre ]['meses'][ $n1 ][] = $doc;
                    }
                }
            }
        }

        // ── Sección "Dictamen de los Estados Financieros/Presupuestarios" ──
        foreach ( $fin_data as $seccion ) {
            if ( isset( $seccion['seccion'] ) && 'Dictamen de los Estados Financieros/Presupuestarios' === $seccion['seccion'] ) {
                foreach ( $seccion['subsecciones'] as $sub ) {
                    foreach ( $sub['documentos'] as $doc ) {
                        if ( ! empty( $doc['url'] ) ) {
                            $doc['url'] = sna_rewrite_sesna_domain_in_content( $doc['url'] );
                            $fin_dictamenes[ $sub['subseccion'] ] = $doc;
                            break;
                        }
                    }
                }
                break;
            }
        }
    }
}

krsort( $fin_anios, SORT_NUMERIC );
krsort( $fin_dictamenes );

// Determina el panel activo por defecto: el más reciente disponible (año, trimestre y mes más nuevos).
$fin_default_key   = null;
$fin_default_trail = '';
$fin_anios_asc     = $fin_anios;
ksort( $fin_anios_asc, SORT_NUMERIC );

foreach ( $fin_anios_asc as $anio => $trimestres ) {
    foreach ( $fin_orden_trimestres as $trimestre ) {
        $data_t = $trimestres[ $trimestre ];
        if ( ! empty( $data_t['meses'] ) ) {
            foreach ( $fin_orden_meses as $mes ) {
                if ( ! empty( $data_t['meses'][ $mes ] ) ) {
                    $fin_default_key   = $anio . '__' . sanitize_title( $trimestre ) . '__' . sanitize_title( $mes );
                    $fin_default_trail = $anio . ' > ' . $trimestre . ' > ' . $mes;
                }
            }
        } elseif ( ! empty( $data_t['documentos'] ) ) {
            $fin_default_key   = $anio . '__' . sanitize_title( $trimestre );
            $fin_default_trail = $anio . ' > ' . $trimestre;
        }
    }
}
?>
<div class="page-informacion-financiera">

    <!-- Encabezado -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-bg-circle flex-shrink-0" style="background-color: #611232;">
                <i class="bi bi-bar-chart-line" style="color: #fff;"></i>
            </div>
            <div>
                <h2 class="h3 fw-bold font-patria mb-1" style="color: #611232;">Información Financiera</h2>
                <p class="text-muted mb-0" style="font-size: 15px;">Estados financieros, dictámenes y documentación relacionada con la situación financiera de la institución.</p>
            </div>
        </div>
        <div class="fin-search flex-shrink-0">
            <i class="bi bi-search"></i>
            <input type="search" id="finSearchInput" placeholder="Buscar documento" aria-label="Buscar documento">
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="row g-4 align-items-start">

        <!-- Columna izquierda: árbol Estados Financieros -->
        <div class="col-lg-3">
            <div class="card border rounded-4 shadow-sm p-3 fin-tree-panel" style="border-color: #E9ECEF !important;">
                <div class="d-flex align-items-center justify-content-between mb-2 px-1 pt-1">
                    <div class="d-flex align-items-center gap-2">
                        <div class="icon-bg-circle icon-bg-circle--sm flex-shrink-0" style="background-color: #F9F0F3;">
                            <i class="bi bi-file-earmark-text" style="color: #611232;"></i>
                        </div>
                        <h3 class="h6 fw-bold font-patria mb-0" style="color: #611232;">Estados Financieros</h3>
                    </div>
                </div>
                <div class="fin-tree-body">
                    <?php foreach ( $fin_anios as $anio => $trimestres ) :
                        $anio_id     = 'fin-anio-' . $anio;
                        $anio_activo = ( false !== strpos( (string) $fin_default_key, $anio . '__' ) );
                        ?>
                        <div class="fin-tree-node">
                            <button type="button" class="fin-tree-label" data-fin-toggle="<?php echo esc_attr( $anio_id ); ?>">
                                <span><?php echo esc_html( $anio ); ?></span>
                                <i class="bi bi-chevron-down fin-tree-chevron <?php echo $anio_activo ? 'is-open' : ''; ?>"></i>
                            </button>
                            <div class="fin-tree-children <?php echo $anio_activo ? '' : 'd-none'; ?>" id="<?php echo esc_attr( $anio_id ); ?>">
                                <?php foreach ( $fin_orden_trimestres as $trimestre ) :
                                    $data_t = $trimestres[ $trimestre ];
                                    if ( empty( $data_t['documentos'] ) && empty( $data_t['meses'] ) ) {
                                        continue;
                                    }

                                    if ( ! empty( $data_t['meses'] ) ) :
                                        $trim_id     = 'fin-trim-' . $anio . '-' . sanitize_title( $trimestre );
                                        $trim_activo = ( false !== strpos( (string) $fin_default_key, $anio . '__' . sanitize_title( $trimestre ) . '__' ) );
                                        ?>
                                        <div class="fin-tree-node fin-tree-node--sub">
                                            <button type="button" class="fin-tree-label fin-tree-label--sub" data-fin-toggle="<?php echo esc_attr( $trim_id ); ?>">
                                                <span><?php echo esc_html( $trimestre ); ?></span>
                                                <i class="bi bi-chevron-down fin-tree-chevron <?php echo $trim_activo ? 'is-open' : ''; ?>"></i>
                                            </button>
                                            <div class="fin-tree-children <?php echo $trim_activo ? '' : 'd-none'; ?>" id="<?php echo esc_attr( $trim_id ); ?>">
                                                <?php foreach ( $fin_orden_meses as $mes ) :
                                                    if ( empty( $data_t['meses'][ $mes ] ) ) {
                                                        continue;
                                                    }
                                                    $key    = $anio . '__' . sanitize_title( $trimestre ) . '__' . sanitize_title( $mes );
                                                    $activo = ( $key === $fin_default_key );
                                                    ?>
                                                    <button type="button"
                                                            class="fin-tree-leaf <?php echo $activo ? 'active' : ''; ?>"
                                                            data-fin-panel="<?php echo esc_attr( $key ); ?>"
                                                            data-fin-trail="<?php echo esc_attr( $anio . ' > ' . $trimestre . ' > ' . $mes ); ?>">
                                                        <?php echo esc_html( $mes ); ?>
                                                    </button>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php else :
                                        $key    = $anio . '__' . sanitize_title( $trimestre );
                                        $activo = ( $key === $fin_default_key );
                                        ?>
                                        <button type="button"
                                                class="fin-tree-leaf fin-tree-leaf--trim <?php echo $activo ? 'active' : ''; ?>"
                                                data-fin-panel="<?php echo esc_attr( $key ); ?>"
                                                data-fin-trail="<?php echo esc_attr( $anio . ' > ' . $trimestre ); ?>">
                                            <?php echo esc_html( $trimestre ); ?>
                                        </button>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Columna central: listado de documentos -->
        <div class="col-lg-6">
            <div class="card border rounded-4 shadow-sm p-4" style="border-color: #E9ECEF !important;">
                <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                    <nav class="fin-trail" id="finTrail" aria-label="Ubicación del listado">
                        <?php
                        $fin_trail_partes = array_map( 'trim', explode( '>', $fin_default_trail ) );
                        foreach ( $fin_trail_partes as $idx => $parte ) :
                            if ( $idx > 0 ) : ?><i class="bi bi-chevron-right fin-trail__sep"></i><?php endif; ?>
                            <span class="fin-trail__item <?php echo ( $idx === count( $fin_trail_partes ) - 1 ) ? 'fin-trail__item--current' : ''; ?>"><?php echo esc_html( $parte ); ?></span>
                        <?php endforeach; ?>
                    </nav>
                    <button type="button" class="fin-collapse-btn" id="finCollapseBtn">
                        <span id="finCollapseBtnText">Contraer lista</span> <i class="bi bi-chevron-up" id="finCollapseBtnIcon"></i>
                    </button>
                </div>

                <div id="finDocListWrap">
                    <?php foreach ( $fin_anios as $anio => $trimestres ) :
                        foreach ( $fin_orden_trimestres as $trimestre ) :
                            $data_t = $trimestres[ $trimestre ];

                            if ( ! empty( $data_t['meses'] ) ) :
                                foreach ( $fin_orden_meses as $mes ) :
                                    if ( empty( $data_t['meses'][ $mes ] ) ) {
                                        continue;
                                    }
                                    $key = $anio . '__' . sanitize_title( $trimestre ) . '__' . sanitize_title( $mes );
                                    ?>
                                    <div class="fin-doc-panel <?php echo ( $key === $fin_default_key ) ? '' : 'd-none'; ?>" id="fin-panel-<?php echo esc_attr( $key ); ?>">
                                        <?php foreach ( $data_t['meses'][ $mes ] as $doc ) :
                                            $label = $doc['descripcion'] ? $doc['descripcion'] : $doc['contenidoN2'];
                                            ?>
                                            <a href="<?php echo esc_url( $doc['url'] ); ?>"
                                               class="fin-doc-row"
                                               data-bs-toggle="modal" data-bs-target="#pdfViewerModal"
                                               data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                                               data-pdf-title="<?php echo esc_attr( $label ); ?>"
                                               data-fin-search="<?php echo esc_attr( mb_strtolower( $label, 'UTF-8' ) ); ?>">
                                                <span class="fin-doc-label"><?php echo esc_html( $label ); ?></span>
                                                <span class="fin-doc-action">
                                                    <span class="cf-doc-view" data-tooltip="Ver documento" aria-hidden="true"><i class="bi bi-file-earmark-text"></i></span>
                                                    <span class="visually-hidden">Ver documento</span>
                                                </span>
                                            </a>
                                        <?php endforeach; ?>
                                        <p class="fin-doc-empty d-none text-muted text-center py-4 mb-0">No se encontraron documentos que coincidan con la búsqueda.</p>
                                    </div>
                                <?php endforeach;
                            elseif ( ! empty( $data_t['documentos'] ) ) :
                                $key = $anio . '__' . sanitize_title( $trimestre );
                                ?>
                                <div class="fin-doc-panel <?php echo ( $key === $fin_default_key ) ? '' : 'd-none'; ?>" id="fin-panel-<?php echo esc_attr( $key ); ?>">
                                    <?php foreach ( $data_t['documentos'] as $doc ) :
                                        $label = $doc['descripcion'] ? $doc['descripcion'] : $doc['contenidoN2'];
                                        ?>
                                        <a href="<?php echo esc_url( $doc['url'] ); ?>"
                                           class="fin-doc-row"
                                           data-bs-toggle="modal" data-bs-target="#pdfViewerModal"
                                           data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                                           data-pdf-title="<?php echo esc_attr( $label ); ?>"
                                           data-fin-search="<?php echo esc_attr( mb_strtolower( $label, 'UTF-8' ) ); ?>">
                                            <span class="fin-doc-label"><?php echo esc_html( $label ); ?></span>
                                            <span class="fin-doc-action">
                                                <span class="cf-doc-view" data-tooltip="Ver documento" aria-hidden="true"><i class="bi bi-file-earmark-text"></i></span>
                                                <span class="visually-hidden">Ver documento</span>
                                            </span>
                                        </a>
                                    <?php endforeach; ?>
                                    <p class="fin-doc-empty d-none text-muted text-center py-4 mb-0">No se encontraron documentos que coincidan con la búsqueda.</p>
                                </div>
                                <?php
                            endif;
                        endforeach;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>

        <!-- Columna derecha: Dictámenes -->
        <div class="col-lg-3">
            <div class="card border rounded-4 shadow-sm p-3 mb-4" style="border-color: #E9ECEF !important;">
                <div class="d-flex align-items-start gap-2 mb-3 px-1 pt-1">
                    <i class="bi bi-file-earmark-text flex-shrink-0 mt-1" style="color: #611232;"></i>
                    <h3 class="h6 fw-bold font-patria mb-0" style="color: #611232; line-height: 1.3;">Dictámenes de Estados Financieros y Presupuestarios</h3>
                </div>
                <div class="d-flex flex-column">
                    <?php foreach ( $fin_dictamenes as $anio_dict => $doc ) : ?>
                        <a href="<?php echo esc_url( $doc['url'] ); ?>" target="_blank" rel="noopener" class="fin-side-link">
                            <span><?php echo esc_html( $anio_dict ); ?></span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="fin-info-box">
                <i class="bi bi-info-circle flex-shrink-0"></i>
                <span>Los dictámenes incluyen la opinión de cumplimiento y los resultados de la revisión de los estados financieros y presupuestarios de la SESNA.</span>
            </div>
        </div>

    </div>

    <!-- Nota al pie -->
    <div class="fin-footer-note d-flex align-items-center gap-3 mt-4">
        <div class="icon-bg-circle flex-shrink-0" style="background-color: #611232;">
            <i class="bi bi-shield-check" style="color: #fff;"></i>
        </div>
        <p class="mb-0 font-noto-sans text-muted">La información publicada en esta sección contribuye a la transparencia, la rendición de cuentas y el fortalecimiento de la gestión institucional de la SESNA.</p>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // Expandir / contraer nodos del árbol (años y trimestres)
    document.querySelectorAll('[data-fin-toggle]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var target = document.getElementById(this.dataset.finToggle);
            var chevron = this.querySelector('.fin-tree-chevron');
            if (!target) return;
            target.classList.toggle('d-none');
            chevron.classList.toggle('is-open');
        });
    });

    // Selección de hoja (mes o trimestre sin desglose) -> muestra su panel de documentos
    document.querySelectorAll('.fin-tree-leaf').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.fin-tree-leaf').forEach(function (b) { b.classList.remove('active'); });
            this.classList.add('active');

            document.querySelectorAll('.fin-doc-panel').forEach(function (p) { p.classList.add('d-none'); });
            var panel = document.getElementById('fin-panel-' + this.dataset.finPanel);
            if (panel) {
                panel.classList.remove('d-none');
                panel.querySelectorAll('.fin-doc-row').forEach(function (row) { row.classList.remove('d-none'); });
                var empty = panel.querySelector('.fin-doc-empty');
                if (empty) empty.classList.add('d-none');
            }

            var trailEl = document.getElementById('finTrail');
            var partes = this.dataset.finTrail.split(' > ');
            trailEl.innerHTML = partes.map(function (p, i) {
                var sep = i > 0 ? '<i class="bi bi-chevron-right fin-trail__sep"></i>' : '';
                var cls = (i === partes.length - 1) ? 'fin-trail__item fin-trail__item--current' : 'fin-trail__item';
                return sep + '<span class="' + cls + '">' + p + '</span>';
            }).join('');

            var searchInput = document.getElementById('finSearchInput');
            if (searchInput) searchInput.value = '';
        });
    });

    // Contraer / expandir la lista de documentos
    var collapseBtn = document.getElementById('finCollapseBtn');
    var listWrap = document.getElementById('finDocListWrap');
    var collapseText = document.getElementById('finCollapseBtnText');
    var collapseIcon = document.getElementById('finCollapseBtnIcon');
    if (collapseBtn) {
        collapseBtn.addEventListener('click', function () {
            var collapsed = listWrap.classList.toggle('d-none');
            collapseText.textContent = collapsed ? 'Expandir lista' : 'Contraer lista';
            collapseIcon.classList.toggle('bi-chevron-up', !collapsed);
            collapseIcon.classList.toggle('bi-chevron-down', collapsed);
        });
    }

    // Buscador: filtra las filas del panel de documentos visible
    var searchInput = document.getElementById('finSearchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            var query = this.value.trim().toLowerCase();
            var panel = document.querySelector('.fin-doc-panel:not(.d-none)');
            if (!panel) return;
            var rows = panel.querySelectorAll('.fin-doc-row');
            var visibles = 0;
            rows.forEach(function (row) {
                var match = row.dataset.finSearch.indexOf(query) !== -1;
                row.classList.toggle('d-none', !match);
                if (match) visibles++;
            });
            var empty = panel.querySelector('.fin-doc-empty');
            if (empty) empty.classList.toggle('d-none', visibles !== 0);
        });
    }

});
</script>
