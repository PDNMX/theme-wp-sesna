<?php
/**
 * Contenido: Archivo Documental
 * Compartido por page-archivo-documental.php.
 * Homologado al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 *
 * Fuente (inventario-dgayf.json): sección "Archivo Documental".
 * Las URLs se enlazan tal como vienen en el JSON (solo se reescribe el
 * dominio de producción al dominio actual, sin alterar la ruta). Cuando el
 * documento no es un PDF directo (algunas entradas del JSON apuntan a la
 * página de transparencia en vez de al archivo), se enlaza como página
 * externa en lugar de abrir el visor modal.
 */

$ad_json_path = get_template_directory() . '/data/inventario-dgayf.json';

$ad_columnas = array(
    'Plan Anual de Desarrollo Archivístico (PADA)' => array( 'icono' => 'snd-calendar' ),
    'Informe de Cumplimiento del Programa Anual de Desarrollo Archivístico (PADA)' => array( 'icono' => 'snd-chart--bar' ),
    'Instrumentos de Control Archivístico de la SESNA' => array( 'icono' => 'snd-collaborate' ),
    'Guía de Archivo Documental' => array( 'icono' => 'snd-education' ),
    'Inventario general por Expediente' => array( 'icono' => 'snd-folder--details' ),
);

$ad_short_names = array(
    'Plan Anual de Desarrollo Archivístico (PADA)' => 'PADA',
    'Informe de Cumplimiento del Programa Anual de Desarrollo Archivístico (PADA)' => 'Informe PADA',
    'Instrumentos de Control Archivístico de la SESNA' => 'Instrumentos Control',
    'Guía de Archivo Documental' => 'Guía de Archivo',
    'Inventario general por Expediente' => 'Inventario',
    'Inventario General por Expediente' => 'Inventario',
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
                    $url_final = function_exists( 'sna_resolve_upload_url' ) ? sna_resolve_upload_url( $doc['url'] ) : $doc['url'];
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

$first_key       = ! empty( $ad_grupos ) ? array_key_first( $ad_grupos ) : '';
$first_short     = ( $first_key && isset( $ad_short_names[ $first_key ] ) ) ? $ad_short_names[ $first_key ] : 'PADA';
$ad_is_dashboard = is_page_template( 'page-administracion-finanzas.php' );
$ad_htag         = $ad_is_dashboard ? 'h2' : 'h1';
$ad_hclass       = $ad_is_dashboard ? 'h2b' : 'h1b';
?>
<div class="page-pna-archivo cf-search-scope">

    <!-- Encabezado de Sección (SND v1.1.0 — Homologado con Información Financiera y Contrataciones) -->
    <div class="mb--32">
        <<?php echo $ad_htag; ?> class="<?php echo $ad_hclass; ?> patria color--pguinda600 mb--4">Archivo Documental</<?php echo $ad_htag; ?>>
        <p class="sh1r color--neutro600 mb--0">Instrumentos para la organización, conservación y administración de los archivos institucionales.</p>
    </div>

    <!-- ── VISTA DESKTOP: Sidebar de navegación (4 cols) + Área de contenido (8 cols) ── -->
    <div class="ad-desktop-view">
        <div class="reticulaGrid__12 align-items-start">

            <!-- Sidebar izquierdo (Desktop) -->
            <div class="columna__12 columna__4--lg ad-desktop-sidebar-col">
                <div class="fin-panel-card p--20">
                    <div class="fin-sidebar-section">
                        <h2 class="sh0b color--neutro800 mb--16 fin-sidebar-heading">Secciones</h2>
                        <div class="fin-dictamen-list muestra--flex flex-direction-column gap--4" role="tablist" aria-label="Secciones de Archivo Documental">
                            <?php $s_i = 0; foreach ( $ad_grupos as $sec_title => $grupo ) :
                                $is_active = ( 0 === $s_i );
                                $display_title = ( 'Inventario general por Expediente' === $sec_title ) ? 'Inventario General por Expediente' : $sec_title;
                                ?>
                                <button type="button"
                                        class="fin-dictamen-item <?php echo $is_active ? 'active' : ''; ?>"
                                        role="tab"
                                        aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                                        aria-controls="ad-doc-panel-<?php echo esc_attr( $s_i ); ?>"
                                        id="ad-tab-<?php echo esc_attr( $s_i ); ?>"
                                        data-ad-panel="<?php echo esc_attr( $s_i ); ?>">
                                    <span><?php echo esc_html( $display_title ); ?></span>
                                    <?= sesna_render_snd_svg_icon('snd-chevron--right', 'icono--16 fin-nav-chevron') ?>
                                </button>
                            <?php $s_i++; endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Área de contenido compartida (Derecha) -->
            <div class="columna__12 columna__8--lg ad-desktop-content-col">
                <div class="fin-panel-card p--24 mb--24">

                    <!-- Barra de búsqueda superior — SND 4.1 homologado con la sección -->
                    <div class="search-container mb--20" role="search">
                        <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control ancho--100">
                            <?= sesna_render_snd_svg_icon('snd-search', 'search-icon icono--24') ?>
                            <input type="search" id="adSearchInputDesktop" class="cf-search-input sh0r js-input tx-comite-search-input" placeholder="Buscar documento..." aria-label="Buscar documento" autocomplete="off">
                        </div>
                    </div>

                    <!-- Paneles de documentos por sección -->
                    <div id="adDocPanelsDesktop">
                        <?php $p_i = 0; foreach ( $ad_grupos as $sec_title => $grupo ) :
                            $meta = isset( $ad_columnas[ $sec_title ] ) ? $ad_columnas[ $sec_title ] : array( 'icono' => 'snd-folder' );
                            $is_active = ( 0 === $p_i );
                            $display_title = ( 'Inventario general por Expediente' === $sec_title ) ? 'Inventario General por Expediente' : $sec_title;
                            ?>
                            <div class="ad-doc-panel <?php echo $is_active ? '' : 'muestra--ninguno'; ?>"
                                 id="ad-doc-panel-<?php echo esc_attr( $p_i ); ?>"
                                 role="tabpanel"
                                 aria-labelledby="ad-tab-<?php echo esc_attr( $p_i ); ?>"
                                 tabindex="0"
                                 data-ad-panel="<?php echo esc_attr( $p_i ); ?>">

                                <!-- Encabezado de la sección activa (ícono + nombre) -->
                                <div class="muestra--flex align-items-center gap--12 pb--16 mb--20 borde--inferior">
                                    <div class="cf-card-icon-wrap">
                                        <?= sesna_render_snd_svg_icon($meta['icono'], 'icono--20') ?>
                                    </div>
                                    <h2 class="sh0b color--pguinda600 mb--0 fin-sidebar-heading"><?php echo esc_html( $display_title ); ?></h2>
                                </div>

                                <!-- Lista de documentos de la sección -->
                                <div class="fin-doc-list">
                                    <?php foreach ( $grupo['docs'] as $doc ) :
                                        $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                                        ?>
                                        <div class="fin-doc-row cf-doc-row" data-cf-search="<?php echo $search_attr; ?>">
                                            <div class="fin-doc-left">
                                                <h3 class="b1r color--neutro800 mb--0 fin-doc-label"><?php echo esc_html( $doc['label'] ); ?></h3>
                                            </div>
                                            <div class="fin-doc-action">
                                                <?php if ( $doc['es_pdf'] ) : ?>
                                                    <button type="button" class="boton__fantasma fin-doc-btn"
                                                            data-modal-target="#pdfViewerModal"
                                                            data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                                                            data-pdf-title="<?php echo esc_attr( $doc['label'] ); ?>"
                                                            aria-label="Consultar <?php echo esc_attr( $doc['label'] ); ?>">
                                                        <?= sesna_render_snd_svg_icon('snd-document--pdf', 'icono--20') ?>
                                                        Consultar
                                                    </button>
                                                <?php else : ?>
                                                    <a href="<?php echo esc_url( $doc['url'] ); ?>" target="_blank" rel="noopener noreferrer"
                                                       class="boton__fantasma fin-doc-btn decoracion--ninguna"
                                                       aria-label="Abrir enlace de <?php echo esc_attr( $doc['label'] ); ?> (abre en ventana nueva)">
                                                        <?= sesna_render_snd_svg_icon('snd-launch', 'icono--20') ?>
                                                        Abrir enlace
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <?php if ( ! empty( $grupo['nota'] ) ) : ?>
                                <div id="ad-nota-msg-<?php echo esc_attr( $p_i ); ?>" class="mensajeInformativo mensajeInformativo--informativo mt--20 ad-doc-nota" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="ad-nota-msg-<?php echo esc_attr( $p_i ); ?>">
                                    <?php echo esc_html( $grupo['nota'] ); ?>
                                </div>
                                <?php endif; ?>

                                <!-- Estado vacío de búsqueda — Mensajes informativos SND v1.0.0 -->
                                <div role="status">
                                    <div id="ad-empty-msg-<?php echo esc_attr( $p_i ); ?>" class="mensajeInformativo mensajeInformativo--informativo mt--16 muestra--ninguno ad-doc-empty" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="ad-empty-msg-<?php echo esc_attr( $p_i ); ?>">
                                        No se encontraron documentos que coincidan con la búsqueda.
                                    </div>
                                </div>

                            </div>
                        <?php $p_i++; endforeach; ?>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- ── VISTA MÓVIL: Selector Chip + Drawer Bottom Sheet SND v1.0.0 ── -->
    <div class="ad-mobile-view">
        <div class="fin-panel-card p--20 mb--24">
            <!-- Buscador móvil -->
            <form class="search-container mb--20" role="search" action="javascript:void(0);">
                <div class="form__inset general-search tx-comite-search-box tx-comite-filter-control">
                    <?= sesna_render_snd_svg_icon('snd-search', 'search-icon icono--24') ?>
                    <input type="search" id="adSearchInputMobile" class="cf-search-input sh0r js-input tx-comite-search-input" placeholder="Buscar documento..." aria-label="Buscar documento" autocomplete="off">
                </div>
            </form>

            <!-- Selector Móvil: Chip con nombre corto y chevron -->
            <div class="pna-mobile-selector mb--20">
                <button type="button" class="boton__secundario ocn-mobile-tab-trigger" id="adOpenDrawerBtn" aria-haspopup="dialog" aria-expanded="false" aria-controls="adDrawer">
                    <span id="adActiveSectionLabel"><?php echo esc_html( $first_short ); ?></span>
                    <?= sesna_render_snd_svg_icon('snd-chevron--down', 'icono--20') ?>
                </button>
            </div>

            <!-- Contenedor de paneles móviles homologados con la vista Desktop -->
            <div class="ad-mobile-panels" id="adMobilePanels">
                <?php $m_i = 0; foreach ( $ad_grupos as $sec_title => $grupo ) :
                    $meta = isset( $ad_columnas[ $sec_title ] ) ? $ad_columnas[ $sec_title ] : array( 'icono' => 'snd-folder' );
                    $is_first = ( 0 === $m_i );
                    $display_title = ( 'Inventario general por Expediente' === $sec_title ) ? 'Inventario General por Expediente' : $sec_title;
                    ?>
                <div class="ad-mobile-pane <?php echo $is_first ? '' : 'muestra--ninguno'; ?>" id="ad-mobile-pane-<?php echo esc_attr( $m_i ); ?>" data-section-index="<?php echo esc_attr( $m_i ); ?>">
                    <div class="muestra--flex align-items-center gap--12 pb--16 mb--16 borde--inferior">
                        <div class="cf-card-icon-wrap">
                            <?= sesna_render_snd_svg_icon($meta['icono'], 'icono--20') ?>
                        </div>
                        <h3 class="sh1b color--pguinda600 mb--0 fin-sidebar-heading"><?php echo esc_html( $display_title ); ?></h3>
                    </div>

                    <div class="fin-doc-list">
                        <?php foreach ( $grupo['docs'] as $doc ) :
                            $search_attr = esc_attr( mb_strtolower( $doc['label'], 'UTF-8' ) );
                            ?>
                            <div class="fin-doc-row cf-doc-row" data-cf-search="<?php echo $search_attr; ?>">
                                <div class="fin-doc-left">
                                    <h4 class="b1r color--neutro800 mb--0 fin-doc-label"><?php echo esc_html( $doc['label'] ); ?></h4>
                                </div>
                                <div class="fin-doc-action">
                                    <?php if ( $doc['es_pdf'] ) : ?>
                                        <button type="button" class="boton__fantasma fin-doc-btn"
                                                data-modal-target="#pdfViewerModal"
                                                data-pdf-url="<?php echo esc_url( $doc['url'] ); ?>"
                                                data-pdf-title="<?php echo esc_attr( $doc['label'] ); ?>"
                                                aria-label="Consultar <?php echo esc_attr( $doc['label'] ); ?>">
                                            <?= sesna_render_snd_svg_icon('snd-document--pdf', 'icono--20') ?>
                                            Consultar
                                        </button>
                                    <?php else : ?>
                                        <a href="<?php echo esc_url( $doc['url'] ); ?>" target="_blank" rel="noopener noreferrer"
                                           class="boton__fantasma fin-doc-btn decoracion--ninguna"
                                           aria-label="Abrir enlace de <?php echo esc_attr( $doc['label'] ); ?> (abre en ventana nueva)">
                                            <?= sesna_render_snd_svg_icon('snd-launch', 'icono--20') ?>
                                            Abrir enlace
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <?php if ( ! empty( $grupo['nota'] ) ) : ?>
                    <div id="ad-mob-nota-msg-<?php echo esc_attr( $m_i ); ?>" class="mensajeInformativo mensajeInformativo--informativo mt--20 ad-doc-nota" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="ad-mob-nota-msg-<?php echo esc_attr( $m_i ); ?>">
                        <?php echo esc_html( $grupo['nota'] ); ?>
                    </div>
                    <?php endif; ?>

                    <!-- Estado vacío de búsqueda en móvil -->
                    <div role="status">
                        <div id="ad-mob-empty-msg-<?php echo esc_attr( $m_i ); ?>" class="mensajeInformativo mensajeInformativo--informativo mt--16 muestra--ninguno ad-doc-empty" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="ad-mob-empty-msg-<?php echo esc_attr( $m_i ); ?>">
                            No se encontraron documentos que coincidan con la búsqueda.
                        </div>
                    </div>
                </div>
                <?php $m_i++; endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Nota informativa al pie SND v1.0.0 (Informativo) -->
    <div id="ad-footer-nota-msg" class="mensajeInformativo mensajeInformativo--informativo mt--32" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="ad-footer-nota-msg">
        La información publicada en esta sección contribuye a la transparencia, la rendición de cuentas y el fortalecimiento de la gestión institucional de la SESNA.
    </div>

</div>

<?php get_template_part( 'template-parts/ui/mobile-drawer', null, array(
    'prefix'        => 'ad',
    'overlay_class' => 'page-pna-archivo',
    'title'         => 'Seleccionar sección',
    'close_label'   => 'Cerrar selección de sección',
    'body'          => function () use ( $ad_grupos, $ad_short_names ) { ?>
            <div class="muestra--flex flex-direction-column gap--8" role="listbox" aria-label="Secciones de Archivo Documental">
                <?php $d_i = 0; foreach ( $ad_grupos as $sec_title => $grupo ) :
                    $is_active = ( 0 === $d_i );
                    $short_name = isset( $ad_short_names[ $sec_title ] ) ? $ad_short_names[ $sec_title ] : $sec_title;
                    $display_title = ( 'Inventario general por Expediente' === $sec_title ) ? 'Inventario General por Expediente' : $sec_title;
                    ?>
                    <button type="button"
                            class="fin-dictamen-item <?php echo $is_active ? 'active' : ''; ?>"
                            role="option"
                            aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                            data-section-index="<?php echo esc_attr( $d_i ); ?>"
                            data-short-name="<?php echo esc_attr( $short_name ); ?>"
                            data-section-title="<?php echo esc_attr( $display_title ); ?>">
                        <span><?php echo esc_html( $display_title ); ?></span>
                        <?= sesna_render_snd_svg_icon('snd-checkmark', 'icono--16 ocn-drawer-check') ?>
                    </button>
                <?php $d_i++; endforeach; ?>
            </div>
    <?php },
) ); ?>
