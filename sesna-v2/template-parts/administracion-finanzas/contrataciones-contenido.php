<?php
/**
 * Contenido: Contrataciones y Adquisiciones
 * Homologado al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda).
 * Mismo patrón que template-parts/administracion-finanzas/planeacion-institucional-contenido.php:
 * Grid 2x2 en contenedor exterior blanco (Desktop) + Drawer móvil (.snd-drawer) + acordeón de años (.fin-acc-*).
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
        'icono'  => 'snd-group',
        'nota'   => 'Documentos que contienen los contratos de las personas integrantes del Comité de Participación Ciudadana.',
        'anios'  => array(),
    ),
    'convocatorias' => array(
        'titulo' => 'Convocatorias de Invitación a Cuando Menos Tres Personas',
        'icono'  => 'snd-notification',
        'nota'   => 'Convocatorias para procedimientos de invitación a cuando menos tres personas.',
        'anios'  => array(),
    ),
    'licitaciones' => array(
        'titulo' => 'Licitaciones Públicas',
        'icono'  => 'snd-document',
        'nota'   => 'Información de las licitaciones públicas realizadas por la SESNA.',
        'anios'  => array(),
    ),
    'programa' => array(
        'titulo' => 'Programa Anual de Adquisiciones, Arrendamientos y Servicios',
        'icono'  => 'snd-shopping--cart',
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
                            'url'        => sna_resolve_upload_url( $doc['url'] ),
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
                        $url_final   = $es_url_real ? sna_resolve_upload_url( $url ) : '';
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

$cf_keys         = array_keys( $cf_columnas );
$cf_is_dashboard = is_page_template( 'page-administracion-finanzas.php' );
$cf_htag         = $cf_is_dashboard ? 'h2' : 'h1';
$cf_hclass       = $cf_is_dashboard ? 'h2b' : 'h1b';
?>
<div class="page-pna-contrataciones cf-search-scope">

    <!-- Encabezado de Sección (sin ícono ni fondo — solo tipografía y color SND) -->
    <div class="mb--32">
        <<?php echo $cf_htag; ?> class="<?php echo $cf_hclass; ?> patria color--pguinda600 mb--4">Contrataciones y Adquisiciones</<?php echo $cf_htag; ?>>
        <p class="sh1r color--neutro600 mb--0">Información relacionada con los procedimientos de contratación y adquisición de bienes y servicios.</p>
    </div>

    <!-- Contenedor exterior (Card o Box) con fondo blanco (SND v1.1.0 — Superficie Base) -->
    <div class="cf-panel-card mb--32">

        <!-- Buscador — 4.1 Barra de búsqueda -->
        <form class="search-container mb--24" role="search" action="javascript:void(0);">
            <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                <?= sesna_render_snd_svg_icon('snd-search', 'search-icon icono--24') ?>
                <input type="search" id="cfSearchInput" class="cf-search-input sh0r js-input tx-comite-search-input" placeholder="Buscar documento..." aria-label="Buscar documento" autocomplete="off">
            </div>
        </form>

        <!-- ── VISTA DESKTOP: Grid 2×2 con las cuatro secciones simultáneamente (≥ 992px) ── -->
        <div class="cf-desktop-view">
            <div class="reticulaGrid__12 align-items-stretch">
                <?php foreach ( $cf_columnas as $col_key => $col ) : ?>
                <div class="columna__12 columna__6--lg mb--24">
                    <div class="cf-inner-card" data-section-key="<?php echo esc_attr( $col_key ); ?>">

                        <!-- Encabezado homologado de la Card: Ícono + Título de Sección -->
                        <div class="cf-card-header">
                            <div class="cf-card-icon-wrap">
                                <?= sesna_render_snd_svg_icon($col['icono'], 'icono--20') ?>
                            </div>
                            <h2 class="sh1b color--neutro800 mb--0 cf-card-title"><?php echo esc_html( $col['titulo'] ); ?></h2>
                        </div>

                        <!-- Cuerpo: Acordeón de años y ListItems de documentos -->
                        <div class="cf-card-body flex--1-auto">
                            <?php
                            $first = true;
                            foreach ( $col['anios'] as $anio => $docs ) :
                                $group_id = 'cf-acc-desk-' . $col_key . '-' . sanitize_title( $anio );
                                $abierto  = $first;
                                $first    = false;
                                ?>
                            <div class="fin-acc-card mb--8">
                                <button type="button" class="fin-acc-header" data-cf-toggle="<?php echo esc_attr( $group_id ); ?>" aria-expanded="<?php echo $abierto ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $group_id ); ?>">
                                    <span class="b1sb color--neutro800 mb--0"><?php echo esc_html( $anio ); ?></span>
                                    <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--16 fin-acc-chevron' . ($abierto ? ' is-open' : '')) ?>
                                </button>
                                <div class="fin-acc-collapse <?php echo $abierto ? '' : 'muestra--ninguno'; ?>" id="<?php echo esc_attr( $group_id ); ?>">
                                    <div class="fin-doc-list p--8">
                                        <?php foreach ( $docs as $doc ) :
                                            $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                                            ?>
                                            <div class="fin-doc-row" data-cf-search="<?php echo $search_attr; ?>">
                                                <div class="fin-doc-left">
                                                    <h3 class="b1r color--neutro800 mb--0 fin-doc-label"><?php echo esc_html( $doc['label'] ); ?></h3>
                                                </div>
                                                <div class="fin-doc-action">
                                                    <?php if ( $doc['disponible'] ) : ?>
                                                        <button type="button" class="boton__fantasma fin-doc-btn"
                                                                data-modal-target="#pdfViewerModal"
                                                                data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
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
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Estado vacío de búsqueda en la Card -->
                        <div role="status">
                            <div id="cf-desk-empty-<?php echo esc_attr( $col_key ); ?>" class="mensajeInformativo mensajeInformativo--informativo mt--16 muestra--ninguno cf-doc-empty" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="cf-desk-empty-<?php echo esc_attr( $col_key ); ?>">
                                No se encontraron documentos que coincidan con la búsqueda.
                            </div>
                        </div>

                        <?php if ( ! empty( $col['nota'] ) ) : ?>
                        <!-- Nota informativa al pie de la Card -->
                        <div id="cf-desk-nota-<?php echo esc_attr( $col_key ); ?>" class="mensajeInformativo mensajeInformativo--informativo mt--auto mt--16 cf-doc-nota" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="cf-desk-nota-<?php echo esc_attr( $col_key ); ?>">
                            <?php echo esc_html( $col['nota'] ); ?>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ── VISTA MÓVIL: Selector Chip + Paneles alternables con Drawer (< 992px) ── -->
        <div class="cf-mobile-view">
            <div class="pna-mobile-selector mb--20">
                <button type="button" class="boton__secundario ocn-mobile-tab-trigger" id="cfOpenDrawerBtn" aria-haspopup="dialog" aria-expanded="false" aria-controls="cfDrawer">
                    <span id="cfActiveSectionLabel"><?php echo esc_html( $cf_columnas[ $cf_keys[0] ]['titulo'] ); ?></span>
                    <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20') ?>
                </button>
            </div>

            <div class="tx-comite-tab-content" id="cfTabsContent">
                <?php foreach ( $cf_columnas as $col_key => $col ) : ?>
                <div class="tx-comite-tab-pane <?php echo ( 'comite' === $col_key ) ? '' : 'muestra--ninguno'; ?>" id="cf-pane-<?php echo esc_attr( $col_key ); ?>" role="tabpanel" tabindex="0">

                    <?php
                    $first = true;
                    foreach ( $col['anios'] as $anio => $docs ) :
                        $group_id = 'cf-acc-mob-' . $col_key . '-' . sanitize_title( $anio );
                        $abierto  = $first;
                        $first    = false;
                        ?>
                    <div class="fin-acc-card mb--8">
                        <button type="button" class="fin-acc-header" data-cf-toggle="<?php echo esc_attr( $group_id ); ?>" aria-expanded="<?php echo $abierto ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $group_id ); ?>">
                            <span class="b1sb color--neutro800 mb--0"><?php echo esc_html( $anio ); ?></span>
                            <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--16 fin-acc-chevron' . ($abierto ? ' is-open' : '')) ?>
                        </button>
                        <div class="fin-acc-collapse <?php echo $abierto ? '' : 'muestra--ninguno'; ?>" id="<?php echo esc_attr( $group_id ); ?>">
                            <div class="fin-doc-list p--8">
                                <?php foreach ( $docs as $doc ) :
                                    $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                                    ?>
                                    <div class="fin-doc-row" data-cf-search="<?php echo $search_attr; ?>">
                                        <div class="fin-doc-left">
                                            <h3 class="b1r color--neutro800 mb--0 fin-doc-label"><?php echo esc_html( $doc['label'] ); ?></h3>
                                        </div>
                                        <div class="fin-doc-action">
                                            <?php if ( $doc['disponible'] ) : ?>
                                                <button type="button" class="boton__fantasma fin-doc-btn"
                                                        data-modal-target="#pdfViewerModal"
                                                        data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
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
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <!-- Estado vacío de búsqueda en móvil -->
                    <div role="status">
                        <div id="cf-mob-empty-<?php echo esc_attr( $col_key ); ?>" class="mensajeInformativo mensajeInformativo--informativo mt--16 muestra--ninguno cf-doc-empty" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="cf-mob-empty-<?php echo esc_attr( $col_key ); ?>">
                            No se encontraron documentos que coincidan con la búsqueda.
                        </div>
                    </div>

                    <?php if ( ! empty( $col['nota'] ) ) : ?>
                    <div id="cf-mob-nota-<?php echo esc_attr( $col_key ); ?>" class="mensajeInformativo mensajeInformativo--informativo mt--20 cf-doc-nota" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="cf-mob-nota-<?php echo esc_attr( $col_key ); ?>">
                        <?php echo esc_html( $col['nota'] ); ?>
                    </div>
                    <?php endif; ?>

                </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <!-- Nota al pie — Mensajes informativos SND v1.0.0 (Informativo) -->
    <div id="cf-footer-nota-msg" class="mensajeInformativo mensajeInformativo--informativo mt--32" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="cf-footer-nota-msg">
        La información publicada en esta sección contribuye a la transparencia, la rendición de cuentas y el fortalecimiento de la gestión institucional de la SESNA.
    </div>

</div>

<?php get_template_part( 'template-parts/ui/mobile-drawer', null, array(
    'prefix'        => 'cf',
    'overlay_class' => 'page-pna-contrataciones',
    'title'         => 'Seleccionar sección',
    'close_label'   => 'Cerrar selección de sección',
    'body'          => function () use ( $cf_columnas ) { ?>
            <div class="muestra--flex flex-direction-column gap--8" role="listbox" aria-label="Secciones de Contrataciones y Adquisiciones">
                <?php foreach ( $cf_columnas as $col_key => $col ) :
                    $is_active = ( 'comite' === $col_key );
                    ?>
                    <button type="button"
                            class="fin-dictamen-item <?php echo $is_active ? 'active' : ''; ?>"
                            role="option"
                            aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                            data-tab-index="<?php echo esc_attr( $col_key ); ?>"
                            data-tab-target="#cf-pane-<?php echo esc_attr( $col_key ); ?>"
                            data-section-title="<?php echo esc_attr( $col['titulo'] ); ?>">
                        <span><?php echo esc_html( $col['titulo'] ); ?></span>
                        <?= sesna_render_snd_svg_icon('snd-checkmark', 'icono--16 ocn-drawer-check') ?>
                    </button>
                <?php endforeach; ?>
            </div>
    <?php },
) ); ?>
