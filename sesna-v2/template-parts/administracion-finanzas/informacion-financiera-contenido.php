<?php
/**
 * Contenido: Información Financiera
 * Compartido entre page-informacion-financiera.php y el panel dinámico
 * "Información Financiera" de page-administracion-finanzas.php.
 *
 * Estandarizado y homologado al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda).
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
$fin_trimestre_a_mes_default = array(
    'Primer Trimestre'  => 'Marzo',
    'Segundo Trimestre' => 'Junio',
    'Tercer Trimestre'  => 'Septiembre',
    'Cuarto Trimestre'  => 'Diciembre (acumulado)',
);
$fin_mes_canon = array(
    'enero'      => 'Enero',
    'febrero'    => 'Febrero',
    'marzo'      => 'Marzo',
    'abril'      => 'Abril',
    'mayo'       => 'Mayo',
    'junio'      => 'Junio',
    'julio'      => 'Julio',
    'agosto'     => 'Agosto',
    'septiembre' => 'Septiembre',
    'octubre'    => 'Octubre',
    'noviembre'  => 'Noviembre',
    'diciembre'  => 'Diciembre',
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
                        $fin_anios[ $anio ][ $t ] = array( 'meses' => array() );
                    }
                }

                foreach ( $sub['documentos'] as $doc ) {
                    if ( empty( $doc['url'] ) ) {
                        continue;
                    }
                    $doc['url'] = sna_rewrite_sesna_domain_in_content( $doc['url'] );
                    $n1         = $doc['contenidoN1'];
                    $mes        = null;
                    $trimestre  = null;

                    if ( isset( $fin_mes_a_trimestre[ $n1 ] ) ) {
                        $mes       = $n1;
                        $trimestre = $fin_mes_a_trimestre[ $n1 ];
                    } elseif ( in_array( $n1, $fin_orden_trimestres, true ) ) {
                        $trimestre = $n1;
                        $desc      = ! empty( $doc['descripcion'] ) ? $doc['descripcion'] : ( ! empty( $doc['contenidoN2'] ) ? $doc['contenidoN2'] : '' );
                        if ( preg_match( '/\b(enero|febrero|marzo|abril|mayo|junio|julio|agosto|septiembre|octubre|noviembre|diciembre)\b/i', $desc, $m_mes ) ) {
                            $detected = $fin_mes_canon[ strtolower( $m_mes[1] ) ];
                            if ( 'Diciembre' === $detected && stripos( $desc, 'acumulado' ) !== false ) {
                                $detected = 'Diciembre (acumulado)';
                            }
                            $mes = $detected;
                        } else {
                            $mes = isset( $fin_trimestre_a_mes_default[ $n1 ] ) ? $fin_trimestre_a_mes_default[ $n1 ] : 'Marzo';
                        }
                    }

                    if ( $trimestre && $mes ) {
                        if ( ! isset( $fin_anios[ $anio ][ $trimestre ]['meses'][ $mes ] ) ) {
                            $fin_anios[ $anio ][ $trimestre ]['meses'][ $mes ] = array();
                        }
                        $fin_anios[ $anio ][ $trimestre ]['meses'][ $mes ][] = $doc;
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
$fin_default_key     = null;
$fin_default_context = '';
$fin_anios_asc       = $fin_anios;
ksort( $fin_anios_asc, SORT_NUMERIC );

foreach ( $fin_anios_asc as $anio => $trimestres ) {
    foreach ( $fin_orden_trimestres as $trimestre ) {
        $data_t = $trimestres[ $trimestre ];
        if ( ! empty( $data_t['meses'] ) ) {
            foreach ( $fin_orden_meses as $mes ) {
                if ( ! empty( $data_t['meses'][ $mes ] ) ) {
                    $fin_default_key     = $anio . '__' . sanitize_title( $trimestre ) . '__' . sanitize_title( $mes );
                    $fin_default_context = 'Documentos - ' . $mes . ' ' . $anio;
                }
            }
        }
    }
}

if ( empty( $fin_default_context ) ) {
    $fin_default_context = 'Documentos';
}
?>
<div class="page-informacion-financiera">

    <!-- ── Encabezado de Sección SND v1.1.0 ───────────────────────── -->
    <div class="mb--32">
        <h1 class="h1b patria color--pguinda600 mb--4">Información Financiera</h1>
        <p class="sh1r color--neutro600 mb--0">Estados financieros, dictámenes y documentación relacionada con la situación financiera de la institución.</p>
    </div>

    <!-- ── Contenido Principal (ReticulaGrid 12 SND: 4 cols Sidebar / 8 cols Contenido) ─ -->
    <div class="reticulaGrid__12 align-items-start">

        <!-- ── Sidebar Unificado Izquierdo (Desktop) ────────────────── -->
        <div class="columna__12 columna__4--lg fin-desktop-tree-col">
            <div class="fin-panel-card p--20">

                <!-- Sección A: Estados Financieros (Acordeones anidados, contraídos por defecto) -->
                <div class="fin-sidebar-section">
                    <h2 class="sh0b color--neutro800 mb--16">Estados Financieros</h2>
                    <div class="fin-tree-accordion">
                        <?php foreach ( $fin_anios as $anio => $trimestres ) :
                            $anio_acc_id = 'fin-anio-acc-' . $anio;
                            ?>
                            <div class="fin-acc-card mb--8">
                                <button type="button" class="fin-acc-header" data-fin-toggle="<?php echo esc_attr( $anio_acc_id ); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr( $anio_acc_id ); ?>">
                                    <span class="b1sb color--neutro800 mb--0"><?php echo esc_html( $anio ); ?></span>
                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron" aria-hidden="true"></i>
                                </button>
                                <div class="fin-acc-collapse muestra--ninguno" id="<?php echo esc_attr( $anio_acc_id ); ?>">
                                    <div class="fin-acc-body p--8">
                                        <?php foreach ( $fin_orden_trimestres as $trimestre ) :
                                            $data_t = $trimestres[ $trimestre ];
                                            if ( empty( $data_t['meses'] ) ) {
                                                continue;
                                            }
                                            $trim_acc_id = 'fin-trim-acc-' . $anio . '-' . sanitize_title( $trimestre );
                                            ?>
                                            <div class="fin-acc-subcard mb--6">
                                                <button type="button" class="fin-acc-sub-header" data-fin-toggle="<?php echo esc_attr( $trim_acc_id ); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr( $trim_acc_id ); ?>">
                                                    <span class="b2sb color--neutro800 mb--0"><?php echo esc_html( $trimestre ); ?></span>
                                                    <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron" aria-hidden="true"></i>
                                                </button>
                                                <div class="fin-acc-sub-collapse muestra--ninguno" id="<?php echo esc_attr( $trim_acc_id ); ?>">
                                                    <div class="fin-month-list pt--4 pb--4">
                                                        <?php foreach ( $fin_orden_meses as $mes ) :
                                                            if ( empty( $data_t['meses'][ $mes ] ) ) {
                                                                continue;
                                                            }
                                                            $key           = $anio . '__' . sanitize_title( $trimestre ) . '__' . sanitize_title( $mes );
                                                            $context_label = 'Documentos - ' . $mes . ' ' . $anio;
                                                            $is_active     = ( $key === $fin_default_key );
                                                            ?>
                                                            <button type="button"
                                                                    class="fin-nav-leaf fin-tree-leaf <?php echo $is_active ? 'active' : ''; ?>"
                                                                    data-fin-panel="<?php echo esc_attr( $key ); ?>"
                                                                    data-fin-context="<?php echo esc_attr( $context_label ); ?>">
                                                                <span><?php echo esc_html( $mes ); ?></span>
                                                            </button>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Divider SND entre secciones -->
                <hr class="fin-sidebar-divider my--20">

                <!-- Sección B: Dictámenes de Estados Financieros y Presupuestarios (ListItems) -->
                <div class="fin-sidebar-section">
                    <h2 class="sh0b color--neutro800 mb--16" style="line-height: 1.3;">Dictámenes de Estados Financieros y Presupuestarios</h2>
                    <div class="fin-dictamen-list d-flex flex-column gap--4">
                        <?php foreach ( $fin_dictamenes as $anio_dict => $doc ) :
                            $key           = 'dictamen-' . sanitize_title( $anio_dict );
                            $context_label = 'Dictamen ' . $anio_dict;
                            ?>
                            <button type="button"
                                    class="fin-nav-leaf fin-dictamen-item"
                                    data-fin-panel="<?php echo esc_attr( $key ); ?>"
                                    data-fin-context="<?php echo esc_attr( $context_label ); ?>">
                                <span><?php echo esc_html( $anio_dict ); ?></span>
                                <i class="snd__icono snd-chevron--right icono--16 fin-nav-chevron" aria-hidden="true"></i>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>

        <!-- ── Área de Contenido Compartida (Derecha) ───────────────── -->
        <div class="columna__12 columna__8--lg fin-content-col">
            <div class="fin-panel-card p--24 mb--24">

                <!-- Controles superiores: Buscador + Botón Filtrar (móvil) -->
                <div class="fin-toolbar d-flex align-items-center gap--12 mb--20">
                    <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control fin-content-search flex-grow-1">
                        <i class="snd__icono snd-search search-icon icono--24" aria-hidden="true"></i>
                        <input type="search" class="sh0r js-input tx-comite-search-input" id="finSearchInput" placeholder="Buscar documento..." aria-label="Buscar documento" autocomplete="off">
                    </div>
                    <button type="button" class="boton__secundario fin-mobile-filter-btn" id="finOpenDrawerBtn" aria-haspopup="dialog" aria-expanded="false" aria-controls="finDrawer">
                        <i class="snd__icono snd-filter icono--20" aria-hidden="true"></i>
                        <span>Filtrar</span>
                    </button>
                </div>

                <!-- Encabezado ligero con el contexto activo (sin breadcrumb) -->
                <div class="fin-context-header pb--12 mb--16">
                    <h2 class="sh0b color--neutro800 mb--0" id="finActiveContext"><?php echo esc_html( $fin_default_context ); ?></h2>
                </div>

                <!-- Paneles de documentos (Estados Financieros + Dictámenes) -->
                <div id="finDocListWrap">

                    <!-- Paneles de Estados Financieros -->
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
                                    <div class="fin-doc-panel <?php echo ( $key === $fin_default_key ) ? '' : 'muestra--ninguno'; ?>" id="fin-panel-<?php echo esc_attr( $key ); ?>">
                                        <div class="fin-doc-list">
                                            <?php foreach ( $data_t['meses'][ $mes ] as $doc ) :
                                                $label = $doc['descripcion'] ? $doc['descripcion'] : $doc['contenidoN2'];
                                                ?>
                                                <div class="fin-doc-row" data-fin-search="<?php echo esc_attr( mb_strtolower( $label, 'UTF-8' ) ); ?>">
                                                    <div class="fin-doc-left">
                                                        <h3 class="b1r color--neutro800 mb--0 fin-doc-label"><?php echo esc_html( $label ); ?></h3>
                                                    </div>
                                                    <div class="fin-doc-action">
                                                        <!-- Botón Fantasma Horizontal SND (4.2 Botones / Figma) -->
                                                        <button type="button" class="boton__fantasma fin-doc-btn"
                                                                data-modal-target="#pdfViewerModal"
                                                                data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                                                                data-pdf-title="<?php echo esc_attr( $label ); ?>">
                                                            <i class="snd__icono snd-document--pdf icono--24" aria-hidden="true"></i>
                                                            Consultar
                                                            <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <!-- Estado vacío SND 4.16 Mensajes informativos (Informativo) -->
                                        <div class="aviso aviso--info mt--16 muestra--ninguno fin-doc-empty" role="status" aria-live="polite">
                                            <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
                                            <div class="aviso__cont">
                                                <div class="aviso__txt">
                                                    <p class="b1r color--azul500 mb--0">No se encontraron documentos que coincidan con la búsqueda.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;
                            endif;
                        endforeach;
                    endforeach;
                    ?>

                    <!-- Paneles de Dictámenes -->
                    <?php foreach ( $fin_dictamenes as $anio_dict => $doc ) :
                        $key   = 'dictamen-' . sanitize_title( $anio_dict );
                        $label = 'Dictamen de los Estados Financieros y Presupuestarios ' . $anio_dict;
                        ?>
                        <div class="fin-doc-panel muestra--ninguno" id="fin-panel-<?php echo esc_attr( $key ); ?>">
                            <div class="fin-doc-list">
                                <div class="fin-doc-row" data-fin-search="<?php echo esc_attr( mb_strtolower( $label, 'UTF-8' ) ); ?>">
                                    <div class="fin-doc-left">
                                        <h3 class="b1r color--neutro800 mb--0 fin-doc-label"><?php echo esc_html( $label ); ?></h3>
                                    </div>
                                    <div class="fin-doc-action">
                                        <!-- Botón Fantasma Horizontal SND (4.2 Botones / Figma) -->
                                        <button type="button" class="boton__fantasma fin-doc-btn"
                                                data-modal-target="#pdfViewerModal"
                                                data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                                                data-pdf-title="<?php echo esc_attr( $label ); ?>">
                                            <i class="snd__icono snd-document--pdf icono--24" aria-hidden="true"></i>
                                            Consultar
                                            <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Mensaje informativo SND (4.16 Mensajes informativos — Informativo) -->
                            <div class="aviso aviso--info mt--16" role="status">
                                <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
                                <div class="aviso__cont">
                                    <div class="aviso__txt">
                                        <p class="b2r color--azul500 mb--0">Los dictámenes incluyen la opinión de cumplimiento y los resultados de la revisión de los estados financieros y presupuestarios de la SESNA.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Estado vacío de búsqueda -->
                            <div class="aviso aviso--info mt--16 muestra--ninguno fin-doc-empty" role="status" aria-live="polite">
                                <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
                                <div class="aviso__cont">
                                    <div class="aviso__txt">
                                        <p class="b1r color--azul500 mb--0">No se encontraron documentos que coincidan con la búsqueda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    </div>

    <!-- ── Nota informativa al pie SND (4.16 Mensajes informativos — Informativo) ── -->
    <div class="aviso aviso--info mt--32" role="note">
        <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
        <div class="aviso__cont">
            <div class="aviso__txt">
                <p class="b1r color--azul500 mb--0">La información publicada en esta sección contribuye a la transparencia, la rendición de cuentas y el fortalecimiento de la gestión institucional de la SESNA.</p>
            </div>
        </div>
    </div>

    <!-- ── Drawer Móvil (Bottom Sheet): Selección de Período SND v1.1.0 ────── -->
    <div class="snd-drawer-overlay is-hidden" id="finDrawerOverlay" aria-hidden="true">
    <div class="snd-drawer snd-drawer--bottom" id="finDrawer" role="dialog" aria-modal="true" aria-labelledby="finDrawerTitle">
        <!-- Drag Handle -->
        <div class="snd-drawer__handle-wrap" id="finDrawerHandle">
            <span class="snd-drawer__handle" aria-hidden="true"></span>
        </div>

        <!-- Header sin íconos decorativos en el título -->
        <div class="snd-drawer__header">
            <h2 class="sh0b color--neutro800 mb--0" id="finDrawerTitle">Seleccionar período</h2>
            <button type="button" class="boton__fantasma snd-drawer__close-btn" id="finDrawerCloseBtn" aria-label="Cerrar selección de período">
                <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
            </button>
        </div>

        <!-- Body con Acordeón Colapsable (Año → Trimestre → Mes) + Dictámenes -->
        <div class="snd-drawer__body" id="finDrawerBody">
            <div class="fin-drawer-accordion">
                <!-- Sección A: Estados Financieros -->
                <div class="mb--16">
                    <h3 class="sh0b color--neutro800 mb--12">Estados Financieros</h3>
                    <?php foreach ( $fin_anios as $anio => $trimestres ) :
                        $anio_acc_id = 'fin-drawer-anio-' . $anio;
                        ?>
                        <div class="fin-acc-card mb--8">
                            <button type="button" class="fin-acc-header" data-fin-toggle="<?php echo esc_attr( $anio_acc_id ); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr( $anio_acc_id ); ?>">
                                <span class="b1sb color--neutro800 mb--0"><?php echo esc_html( $anio ); ?></span>
                                <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron" aria-hidden="true"></i>
                            </button>
                            <div class="fin-acc-collapse muestra--ninguno" id="<?php echo esc_attr( $anio_acc_id ); ?>">
                                <div class="fin-acc-body p--8">
                                    <?php foreach ( $fin_orden_trimestres as $trimestre ) :
                                        $data_t = $trimestres[ $trimestre ];
                                        if ( empty( $data_t['meses'] ) ) {
                                            continue;
                                        }
                                        $trim_acc_id = 'fin-drawer-trim-' . $anio . '-' . sanitize_title( $trimestre );
                                        ?>
                                        <div class="fin-acc-subcard mb--6">
                                            <button type="button" class="fin-acc-sub-header" data-fin-toggle="<?php echo esc_attr( $trim_acc_id ); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr( $trim_acc_id ); ?>">
                                                <span class="b2sb color--neutro800 mb--0"><?php echo esc_html( $trimestre ); ?></span>
                                                <i class="snd__icono snd-chevron--down icono--16 fin-acc-chevron" aria-hidden="true"></i>
                                            </button>
                                            <div class="fin-acc-sub-collapse muestra--ninguno" id="<?php echo esc_attr( $trim_acc_id ); ?>">
                                                <div class="fin-month-list pt--4 pb--4">
                                                    <?php foreach ( $fin_orden_meses as $mes ) :
                                                        if ( empty( $data_t['meses'][ $mes ] ) ) {
                                                            continue;
                                                        }
                                                        $key           = $anio . '__' . sanitize_title( $trimestre ) . '__' . sanitize_title( $mes );
                                                        $context_label = 'Documentos - ' . $mes . ' ' . $anio;
                                                        $is_active     = ( $key === $fin_default_key );
                                                        ?>
                                                        <button type="button"
                                                                class="fin-nav-leaf fin-tree-leaf <?php echo $is_active ? 'active' : ''; ?>"
                                                                data-fin-panel="<?php echo esc_attr( $key ); ?>"
                                                                data-fin-context="<?php echo esc_attr( $context_label ); ?>">
                                                            <span><?php echo esc_html( $mes ); ?></span>
                                                        </button>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Divider en Drawer -->
                <hr class="fin-sidebar-divider my--16">

                <!-- Sección B en Drawer: Dictámenes -->
                <div>
                    <h3 class="sh0b color--neutro800 mb--12" style="line-height: 1.3;">Dictámenes de Estados Financieros y Presupuestarios</h3>
                    <div class="fin-dictamen-list d-flex flex-column gap--4">
                        <?php foreach ( $fin_dictamenes as $anio_dict => $doc ) :
                            $key           = 'dictamen-' . sanitize_title( $anio_dict );
                            $context_label = 'Dictamen ' . $anio_dict;
                            ?>
                            <button type="button"
                                    class="fin-nav-leaf fin-dictamen-item"
                                    data-fin-panel="<?php echo esc_attr( $key ); ?>"
                                    data-fin-context="<?php echo esc_attr( $context_label ); ?>">
                                <span><?php echo esc_html( $anio_dict ); ?></span>
                                <i class="snd__icono snd-chevron--right icono--16 fin-nav-chevron" aria-hidden="true"></i>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script>
(function () {
    'use strict';

    function initFinanciera() {
        var drawerOverlay = document.getElementById('finDrawerOverlay');
        var drawerEl      = document.getElementById('finDrawer');
        var openDrawerBtn = document.getElementById('finOpenDrawerBtn');
        var closeDrawerBtn= document.getElementById('finDrawerCloseBtn');

        // Expandir / contraer acordeones (años y trimestres tanto en desktop como en drawer móvil)
        document.querySelectorAll('[data-fin-toggle]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var targetId = this.getAttribute('data-fin-toggle') || this.dataset.finToggle;
                var target = document.getElementById(targetId);
                var chevron = this.querySelector('.fin-acc-chevron');
                if (!target) return;
                var isOpen = !target.classList.contains('muestra--ninguno');

                if (isOpen) {
                    target.classList.add('muestra--ninguno');
                    this.setAttribute('aria-expanded', 'false');
                    if (chevron) chevron.classList.remove('is-open');
                } else {
                    // Cerrar acordeones hermanos en el mismo nivel (Figma)
                    var card = this.closest('.fin-acc-card, .fin-acc-subcard');
                    if (card && card.parentElement) {
                        var siblings = card.parentElement.children;
                        for (var i = 0; i < siblings.length; i++) {
                            var sib = siblings[i];
                            if (sib !== card && (sib.classList.contains('fin-acc-card') || sib.classList.contains('fin-acc-subcard'))) {
                                var sibBtn = sib.querySelector('[data-fin-toggle]');
                                if (sibBtn) {
                                    var sibTargetId = sibBtn.getAttribute('data-fin-toggle') || sibBtn.dataset.finToggle;
                                    var sibTarget = document.getElementById(sibTargetId);
                                    var sibChevron = sibBtn.querySelector('.fin-acc-chevron');
                                    if (sibTarget && !sibTarget.classList.contains('muestra--ninguno')) {
                                        sibTarget.classList.add('muestra--ninguno');
                                        sibBtn.setAttribute('aria-expanded', 'false');
                                        if (sibChevron) sibChevron.classList.remove('is-open');
                                    }
                                }
                            }
                        }
                    }

                    target.classList.remove('muestra--ninguno');
                    this.setAttribute('aria-expanded', 'true');
                    if (chevron) chevron.classList.add('is-open');
                }
            });
        });

        // Control del Drawer (Bottom Sheet)
        var drawerOverlay = document.getElementById('finDrawerOverlay');
        var drawerEl      = document.getElementById('finDrawer');
        var openDrawerBtn = document.getElementById('finOpenDrawerBtn');
        var closeDrawerBtn= document.getElementById('finDrawerCloseBtn');

        function openDrawer() {
            if (!drawerOverlay || !drawerEl) return;
            drawerOverlay.classList.remove('is-hidden');
            drawerOverlay.setAttribute('aria-hidden', 'false');
            document.body.classList.add('snd-drawer-open');
            if (openDrawerBtn) openDrawerBtn.setAttribute('aria-expanded', 'true');
            void drawerOverlay.offsetWidth;
            drawerOverlay.classList.add('is-visible');
            if (closeDrawerBtn) closeDrawerBtn.focus();
        }

        function closeDrawer() {
            if (!drawerOverlay || !drawerEl) return;
            drawerOverlay.classList.remove('is-visible');
            drawerOverlay.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('snd-drawer-open');
            if (openDrawerBtn) openDrawerBtn.setAttribute('aria-expanded', 'false');
            if (drawerEl) drawerEl.style.transform = '';
            setTimeout(function() {
                if (!drawerOverlay.classList.contains('is-visible')) {
                    drawerOverlay.classList.add('is-hidden');
                }
            }, 280);
            if (openDrawerBtn) openDrawerBtn.focus();
        }

        if (openDrawerBtn) openDrawerBtn.addEventListener('click', openDrawer);
        if (closeDrawerBtn) closeDrawerBtn.addEventListener('click', closeDrawer);

        if (drawerOverlay) {
            drawerOverlay.addEventListener('click', function (e) {
                if (e.target === drawerOverlay) {
                    closeDrawer();
                }
            });
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && drawerOverlay && drawerOverlay.classList.contains('is-visible')) {
                closeDrawer();
            }
        });

        // Gesto Swipe Down en mobile para cerrar Bottom Sheet
        var touchStartY = 0;
        var touchCurrentY = 0;
        var handle = document.getElementById('finDrawerHandle');
        var drawerHeader = drawerEl ? drawerEl.querySelector('.snd-drawer__header') : null;
        [handle, drawerHeader].forEach(function(el) {
            if (!el) return;
            el.addEventListener('touchstart', function(e) {
                touchStartY = e.touches[0].clientY;
            }, { passive: true });
            el.addEventListener('touchmove', function(e) {
                touchCurrentY = e.touches[0].clientY;
                var diff = touchCurrentY - touchStartY;
                if (diff > 0 && drawerEl) {
                    drawerEl.style.transform = 'translateY(' + diff + 'px)';
                }
            }, { passive: true });
            el.addEventListener('touchend', function() {
                var diff = touchCurrentY - touchStartY;
                if (diff > 75) {
                    closeDrawer();
                } else if (drawerEl) {
                    drawerEl.style.transform = '';
                }
                touchStartY = 0;
                touchCurrentY = 0;
            });
        });

        // Selección de navegación unificada (meses de Estados Financieros y años de Dictámenes)
        document.querySelectorAll('.fin-nav-leaf').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var panelKey   = this.dataset.finPanel;
                var contextStr = this.dataset.finContext || 'Documentos';

                // Marcar activo en sidebar desktop y en drawer móvil
                document.querySelectorAll('.fin-nav-leaf').forEach(function (b) {
                    var match = (b.dataset.finPanel === panelKey);
                    b.classList.toggle('active', match);
                });

                // Mostrar el panel de documentos correspondiente
                document.querySelectorAll('.fin-doc-panel').forEach(function (p) {
                    p.classList.add('muestra--ninguno');
                });
                var targetPanel = document.getElementById('fin-panel-' + panelKey);
                if (targetPanel) {
                    targetPanel.classList.remove('muestra--ninguno');
                    targetPanel.querySelectorAll('.fin-doc-row').forEach(function (row) {
                        row.classList.remove('muestra--ninguno');
                    });
                    var empty = targetPanel.querySelector('.fin-doc-empty');
                    if (empty) empty.classList.add('muestra--ninguno');
                }

                // Actualizar encabezado ligero del área de contenido
                var contextHeader = document.getElementById('finActiveContext');
                if (contextHeader) {
                    contextHeader.textContent = contextStr;
                }

                // Cerrar Drawer si estaba abierto
                if (drawerOverlay && drawerOverlay.classList.contains('is-visible')) {
                    closeDrawer();
                }

                // Limpiar filtro de búsqueda
                var searchInput = document.getElementById('finSearchInput');
                if (searchInput) {
                    searchInput.value = '';
                    var sBox = searchInput.closest('.tx-comite-search-box');
                    if (sBox) sBox.classList.remove('is-filled');
                }
            });
        });

        // Buscador SND 4.1 en el área de contenido: filtra las filas del panel activo
        var searchInput = document.getElementById('finSearchInput');
        if (searchInput) {
            var searchBox = searchInput.closest('.tx-comite-search-box');
            searchInput.addEventListener('input', function () {
                var query = this.value.trim().toLowerCase();
                if (searchBox) {
                    searchBox.classList.toggle('is-filled', query.length > 0);
                }
                var panel = document.querySelector('.fin-doc-panel:not(.muestra--ninguno)');
                if (!panel) return;
                var rows = panel.querySelectorAll('.fin-doc-row');
                var visibles = 0;
                rows.forEach(function (row) {
                    var match = (row.dataset.finSearch || '').indexOf(query) !== -1;
                    row.classList.toggle('muestra--ninguno', !match);
                    if (match) visibles++;
                });
                var empty = panel.querySelector('.fin-doc-empty');
                if (empty) empty.classList.toggle('muestra--ninguno', visibles !== 0);
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFinanciera);
    } else {
        initFinanciera();
    }

})();
</script>
