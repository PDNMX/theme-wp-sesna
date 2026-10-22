<?php
/**
 * Template Name: Derechos Humanos y Perspectiva de Género
 * Template Post Type: page
 *
 * @package sesna
 */
get_header();
?>

<div class="page-derechos-humanos front-page-bg">

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
                    <span class="ruta__a" aria-current="page">Derechos Humanos y Perspectiva de Género</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ── Hero ──────────────────────────────────────────────── -->
    <section class="sesna-page-hero">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 columna__8--md columna__6--lg posicion--relativa z--1 mb--24 mb--0--lg">
                    <h1 class="h1b patria color--pguinda600">Derechos Humanos<br>y Perspectiva de Género</h1>
                    <p class="sh1r texto--justify">
                        Promovemos el respeto a los Derechos Humanos, la igualdad de género y la no discriminación, contribuyendo a fortalecer la cultura de integridad y prevenir la violencia en la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.
                    </p>
                </div>
                <div class="columna__12 columna__4--md columna__6--lg muestra--ninguno muestra--flex--md align-items-center justify-content-end position-relative">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/heroes_section/' . rawurlencode('Derechos humanos Encabezado.png') ); ?>"
                         alt="Derechos Humanos y Perspectiva de Género"
                         class="sesna-hero__img"
                         loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- ── Pronunciamientos ──────────────────────────────────── -->
    <?php
    $dh_upload_dir  = wp_upload_dir();
    $dh_upload_url  = trailingslashit( $dh_upload_dir['baseurl'] );
    $dh_pdf_nondiscriminacion = $dh_upload_url . '2026/06/pronunciamiento_no_discriminacion2026.pdf';
    $dh_pdf_acoso             = $dh_upload_url . '2026/06/pronunciamiento_has2026.pdf';
    ?>
    <section class="dh-pronunciamientos pt-3 pb-5">
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 mb--8">Pronunciamientos</h2>
            <p class="sh1r color--neutro600 mb--0">Conoce nuestros pronunciamientos institucionales.</p>

            <div class="reticulaGrid__12 mt--16">
                <div class="columna__12 columna__6--md">
                    <a href="javascript:void(0)"
                       data-modal-target="#pdfViewerModal"
                       data-pdf-url="<?php echo esc_url( $dh_pdf_nondiscriminacion ); ?>"
                       data-pdf-title="Pronunciamiento de No Discriminación 2026"
                       class="sna-noticias-card alto--100 posicion--relativa decoracion--ninguna color--neutro800 muestra--flex align-items-center ancho--100 gap--16">
                        <div class="cp-doc-thumb cp-doc-thumb--burgundi flex-shrink-0">
                            <div class="cp-doc-thumb__logo">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/icon_logo_sesna.png' ); ?>" alt="SESNA" style="max-width: 38px; max-height: 22px; object-fit: contain; filter: brightness(0) invert(1);">
                            </div>
                            <p class="cp-doc-thumb__nombre">Pronunciamiento de No Discriminación</p>
                        </div>
                        <h3 class="sh1b color--neutro800 mb--0 flex-grow-1">Pronunciamiento de No Discriminación</h3>
                        <i class="snd__icono snd-chevron--right color--neutro600 flex-shrink-0 icono--16" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="columna__12 columna__6--md">
                    <a href="javascript:void(0)"
                       data-modal-target="#pdfViewerModal"
                       data-pdf-url="<?php echo esc_url( $dh_pdf_acoso ); ?>"
                       data-pdf-title="Pronunciamiento de Cero Tolerancia al Acoso y Hostigamiento Sexual 2026"
                       class="sna-noticias-card alto--100 posicion--relativa decoracion--ninguna color--neutro800 muestra--flex align-items-center ancho--100 gap--16">
                        <div class="cp-doc-thumb cp-doc-thumb--burgundi flex-shrink-0">
                            <div class="cp-doc-thumb__logo">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/home_v2/icon_logo_sesna.png' ); ?>" alt="SESNA" style="max-width: 38px; max-height: 22px; object-fit: contain; filter: brightness(0) invert(1);">
                            </div>
                            <p class="cp-doc-thumb__nombre">Pronunciamiento de Cero Tolerancia al Acoso y Hostigamiento Sexual</p>
                        </div>
                        <h3 class="sh1b color--neutro800 mb--0 flex-grow-1">Pronunciamiento de Cero Tolerancia al Acoso y Hostigamiento Sexual</h3>
                        <i class="snd__icono snd-chevron--right color--neutro600 flex-shrink-0 icono--16" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Campañas de Sensibilización ───────────────────────── -->
    <section class="dh-campanias pb-5">
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 mb--8">Campañas de sensibilización</h2>
            <p class="sh1r color--neutro600 mb--0">Conoce nuestras campañas permanentes para construir espacios libres de violencia y discriminación.</p>

            <div class="reticulaGrid__12 mt--16">
                <?php
                $dh_campanias_query = new WP_Query(array(
                    'post_type'      => 'dh_campania',
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                    'meta_key'       => '_dh_orden',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'ASC',
                ));

                if ($dh_campanias_query->have_posts()) :
                    while ($dh_campanias_query->have_posts()) : $dh_campanias_query->the_post();
                        $dh_c_id          = get_the_ID();
                        $dh_c_titulo      = get_the_title();
                        $dh_c_icono       = get_post_meta($dh_c_id, '_dh_icono',        true) ?: 'snd-star';
                        $dh_c_icono_img_raw = get_post_meta($dh_c_id, '_dh_icono_img', true);
                        $dh_c_icono_img   = $dh_c_icono_img_raw ? sesna_resolve_archivo_url($dh_c_icono_img_raw) : '';
                        $dh_c_infografia_ids = get_post_meta($dh_c_id, '_dh_infografia_ids', true) ?: '';
                        $dh_c_color       = get_post_meta($dh_c_id, '_dh_color',        true) ?: '#9B2247';
                        $dh_c_galeria_ids = get_post_meta($dh_c_id, '_dh_galeria_ids',  true) ?: '';
                        $dh_c_video_raw   = get_post_meta($dh_c_id, '_dh_video_url', true);
                        $dh_c_video       = $dh_c_video_raw ? sesna_resolve_archivo_url($dh_c_video_raw) : '';
                        $dh_c_banner      = get_post_meta($dh_c_id, '_dh_banner_texto', true) ?: '';
                        $dh_c_resumen     = get_post_meta($dh_c_id, '_dh_resumen',      true) ?: '';

                        // Reemplazar dinámicamente la imagen con SVG específico según el título
                        $titulo_lower = mb_strtolower($dh_c_titulo, 'UTF-8');
                        $svg_especifico = '';
                        if (strpos($titulo_lower, 'menstruación') !== false) {
                            $svg_especifico = 'Menstruacion_Digna.svg';
                        } elseif (strpos($titulo_lower, 'salud mental') !== false) {
                            $svg_especifico = 'Salud_mental.svg';
                        } elseif (strpos($titulo_lower, 'juicios') !== false) {
                            $svg_especifico = 'Cuidarnos_sin_juicios.svg';
                        } elseif (strpos($titulo_lower, 'cuidado') !== false) {
                            $svg_especifico = 'Taller_del_Derecho_al_cuidado.svg';
                        }
                        
                        if (!empty($svg_especifico)) {
                            $dh_c_icono_img = get_theme_file_uri('/img/genero/' . rawurlencode($svg_especifico));
                        }

                        // Imagen destacada → fondo de la tarjeta + columna derecha de la modal
                        $dh_c_thumbnail      = '';
                        $dh_c_thumbnail_full = '';
                        if (has_post_thumbnail()) {
                            $dh_c_thumbnail      = get_the_post_thumbnail_url($dh_c_id, 'large');
                            $dh_c_thumbnail_full = get_the_post_thumbnail_url($dh_c_id, 'full');
                        }

                        // Galería adicional → "Evidencias de la campaña"
                        $dh_c_galeria = [];
                        if (!empty($dh_c_galeria_ids)) {
                            foreach (array_filter(explode(',', $dh_c_galeria_ids)) as $img_id) {
                                $url_medium = wp_get_attachment_image_url(intval($img_id), 'large');
                                $url_full   = wp_get_attachment_image_url(intval($img_id), 'full');
                                if ($url_medium && $url_full) {
                                    $dh_c_galeria[] = array(
                                        'url'  => $url_medium,
                                        'full' => $url_full
                                    );
                                }
                            }
                        }

                        // Infografías (Múltiples)
                        $dh_c_infografia = [];
                        if (!empty($dh_c_infografia_ids)) {
                            foreach (array_filter(explode(',', $dh_c_infografia_ids)) as $img_id) {
                                $url_medium = wp_get_attachment_image_url(intval($img_id), 'large');
                                $url_full   = wp_get_attachment_image_url(intval($img_id), 'full');
                                if ($url_medium && $url_full) {
                                    $dh_c_infografia[] = array(
                                        'url'  => $url_medium,
                                        'full' => $url_full
                                    );
                                }
                            }
                        }
                ?>
                <div class="columna__12 columna__6--md columna__3--lg mb-4">
                    <div class="dh-campania-card dh-campania-trigger h-100 d-flex flex-column"
                         role="button"
                         tabindex="0"
                         data-modal-target="#modal-campania"
                         data-titulo="<?php echo esc_attr($dh_c_titulo); ?>"
                         data-icono="<?php echo esc_attr($dh_c_icono); ?>"
                         data-color="<?php echo esc_attr($dh_c_color); ?>"
                         data-contenido="<?php echo esc_attr(apply_filters('the_content', get_the_content())); ?>"
                         data-thumbnail="<?php echo esc_attr($dh_c_thumbnail); ?>"
                         data-thumbnail-full="<?php echo esc_attr($dh_c_thumbnail_full); ?>"
                         data-infografia="<?php echo esc_attr(json_encode($dh_c_infografia)); ?>"
                         data-galeria="<?php echo esc_attr(json_encode($dh_c_galeria)); ?>"
                         data-video="<?php echo esc_attr($dh_c_video); ?>"
                         data-banner="<?php echo esc_attr($dh_c_banner); ?>">
                        <!-- Parte superior de la tarjeta: imagen cubre el área o color de fondo con ícono -->
                        <div class="dh-campania-card__img"
                             style="background-color: <?php echo esc_attr($dh_c_color); ?>18; <?php if ($dh_c_icono_img): ?>background-image: url('<?php echo esc_url($dh_c_icono_img); ?>');<?php endif; ?>">
                            <?php if (!$dh_c_icono_img): ?>
                                <i class="snd__icono snd icono--32 <?php echo esc_attr($dh_c_icono); ?>" aria-hidden="true" style="color: <?php echo esc_attr($dh_c_color); ?>;"></i>
                            <?php endif; ?>
                        </div>
                        <h3 class="dh-campania-card__title sh1b patria color--pguinda600"><?php echo esc_html($dh_c_titulo); ?></h3>
                        <p class="dh-campania-card__desc sdr flex-grow-1 mb--16"><?php echo esc_html($dh_c_resumen); ?></p>
                        <span class="boton__fantasma mt-auto">Ver más <i class="snd__icono snd snd-arrow--right" aria-hidden="true"></i></span>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                <div class="columna__12">
                    <p class="b1r color--neutro600">No hay campañas publicadas aún.</p>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- ── Acciones X la Integridad ──────────────────────────── -->
    <section class="dh-acciones pb-5">
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 mb--8">Acciones x la integridad</h2>
            <p class="sh1r color--neutro600 mb--0">Acciones X la integridad es nuestra publicación permanente sobre integridad, Derechos Humanos y perspectiva de género.</p>

            <?php
            $dh_catalogo_titulo  = '';
            $dh_catalogo_paginas = array();

            $dh_catalogo_query = new WP_Query(array(
                'post_type'      => 'dh_catalogo',
                'post_status'    => 'publish',
                'posts_per_page' => 1,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));

            if ($dh_catalogo_query->have_posts()) {
                $dh_catalogo_query->the_post();
                $dh_catalogo_titulo      = get_the_title();
                $dh_catalogo_paginas_ids = get_post_meta(get_the_ID(), '_dh_cat_paginas_ids', true) ?: '';

                if (!empty($dh_catalogo_paginas_ids)) {
                    foreach (array_filter(explode(',', $dh_catalogo_paginas_ids)) as $dh_cat_img_id) {
                        $dh_cat_img_url = wp_get_attachment_image_url(intval($dh_cat_img_id), 'large');
                        if ($dh_cat_img_url) {
                            $dh_catalogo_paginas[] = $dh_cat_img_url;
                        }
                    }
                }

                // La portada (campo "Portada" del catálogo en wp-admin) se
                // antepone como página 0: con showCover:true el flipbook abre
                // "cerrado" mostrando esta imagen sola, y al hojear pasa a las
                // páginas reales del catálogo.
                if (!empty($dh_catalogo_paginas)) {
                    $dh_catalogo_portada_id  = get_post_meta(get_the_ID(), '_dh_cat_portada_id', true) ?: '';
                    $dh_catalogo_portada_url = $dh_catalogo_portada_id ? wp_get_attachment_image_url(intval($dh_catalogo_portada_id), 'large') : '';
                    if ($dh_catalogo_portada_url) {
                        array_unshift($dh_catalogo_paginas, $dh_catalogo_portada_url);
                    }
                }

                wp_reset_postdata();
            }
            ?>

            <?php if (!empty($dh_catalogo_paginas)) : ?>
                <div class="dh-acciones-card cd-clickable mt-4"
                     role="button"
                     tabindex="0"
                     data-modal-target="#modal-catalogo"
                     data-titulo="<?php echo esc_attr($dh_catalogo_titulo); ?>"
                     data-paginas="<?php echo esc_attr( json_encode($dh_catalogo_paginas) ); ?>">
            <?php else : ?>
                <div class="dh-acciones-card mt-4">
            <?php endif; ?>
                <div class="reticulaGrid__12 gap--0 align-items-center">
                    <div class="columna__12 columna__4--md">
                        <div class="dh-acciones-card__img fondo--neutro200 muestra--flex align-items-center justify-content-center p--16">
                            <img src="<?php echo esc_url( get_theme_file_uri('/img/genero/acciones_x_integridad.png') ); ?>"
                                 alt="Acciones X la Integridad"
                                 class="ancho--100 dh-acciones-img--portrait"
                                 onerror="this.parentElement.innerHTML='<div class=\'muestra--flex align-items-center justify-content-center alto--100 fondo--neutro200\' style=\'min-height:180px;\'><i class=\'snd__icono snd-image icono--32 color--neutro600\'></i></div>';">
                        </div>
                    </div>
                    <div class="columna__12 columna__8--md">
                        <div class="dh-acciones-card__body">
                            <h3 class="sh1b color--neutro800 mb--16">Acciones X la Integridad</h3>
                            <p class="b1r color--neutro600 mb--16">Infografía, datos relevantes y efemérides para fortalecer nuestra cultura de integridad, igualdad y derechos humanos.</p>
                            <?php if (!empty($dh_catalogo_paginas)) : ?>
                                <span class="boton__fantasma">Leer más <i class="snd__icono snd-arrow--right ml--4 icono--16" aria-hidden="true"></i></span>
                            <?php else : ?>
                                <span class="boton__fantasma--disabled" aria-disabled="true">Leer más <i class="snd__icono snd-arrow--right ml--4 icono--16" aria-hidden="true"></i></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Comité de Igualdad de Género ──────────────────────── -->
    <section class="dh-comite pb-5 mb-4">
        <div class="contenedor">
            <h2 class="h2b patria color--pguinda600 mb--8">Comité de igualdad de género</h2>
            <p class="sh1r color--neutro600 mb--0">Consulta las sesiones y actas del Comité de Igualdad de Género (CIG-SESNA).</p>

            <div class="dh-comite-panel mt--32">
                <h3 class="sh0b color--neutro800 mb--24">Sesiones del Comité</h3>
                <!-- Filtros Sesiones -->
                <?php
                $sesiones = [];
                $anios_unicos = [];
                $args_actas = array(
                    'post_type'      => 'dh_comite_acta',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'meta_key'       => '_dh_cg_anio',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'DESC'
                );
                $actas_query = new WP_Query($args_actas);
                if ($actas_query->have_posts()) {
                    while ($actas_query->have_posts()) {
                        $actas_query->the_post();
                        $pid = get_the_ID();
                        $anio = get_post_meta($pid, '_dh_cg_anio', true);
                        if (!empty($anio) && !in_array($anio, $anios_unicos)) {
                            $anios_unicos[] = $anio;
                        }
                        $sesiones[] = [
                            'anio'      => $anio,
                            'titulo'    => get_the_title(),
                            'tipo'      => get_post_meta($pid, '_dh_cg_tipo', true),
                            'modal'     => get_post_meta($pid, '_dh_cg_modalidad', true),
                            'url'       => sesna_resolve_archivo_url(get_post_meta($pid, '_dh_cg_url', true)),
                        ];
                    }
                    wp_reset_postdata();
                }
                rsort($anios_unicos);
                ?>
                <div class="reticulaGrid__12 mb--32 align-items-end">
                    <div class="columna__12 columna__6--sm columna__3--md mb--16 mb--0--md">
                        <label for="filter-anio" class="b1sb dblock color--neutro800 mb--8">Año</label>
                        <div class="tx-select-wrap">
                            <select id="filter-anio" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todos">Todos</option>
                                <?php foreach ($anios_unicos as $a): ?>
                                <option value="<?php echo esc_attr($a); ?>"><?php echo esc_html($a); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="columna__12 columna__6--sm columna__4--md">
                        <label for="filter-tipo" class="b1sb dblock color--neutro800 mb--8">Tipo de sesión</label>
                        <div class="tx-select-wrap">
                            <select id="filter-tipo" class="tx-comite-select tx-comite-filter-control">
                                <option value="Todas">Todas</option>
                                <option value="Ordinaria">Ordinaria</option>
                                <option value="Extraordinaria">Extraordinaria</option>
                            </select>
                            <i class="snd__icono snd-chevron--down icono--20 tx-select-chevron" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="muestra--flex flex-column gap--16">
                    <?php foreach ( $sesiones as $sesion ) : ?>
                    <div class="tx-sesion-card" data-anio="<?php echo esc_attr($sesion['anio']); ?>" data-tipo="<?php echo esc_attr($sesion['tipo']); ?>">
                        <div class="tx-sesion-card__inner">

                            <!-- Date Column -->
                            <div class="tx-sesion-date texto--centro muestra--flex flex-column justify-content-center">
                                <div class="sh0b color--neutro600 tx-sesion-date-year"><?php echo esc_html($sesion['anio']); ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="tx-sesion-info flex-grow-1 muestra--flex flex-column justify-content-center">
                                <h3 class="sh1b color--neutro800 mb--8 tx-sesion-info-title"><?php echo esc_html($sesion['titulo']); ?></h3>
                                <p class="b1r color--neutro700 mb--0 tx-sesion-info-type">
                                    <span class="b1sb color--neutro800">Tipo:</span> <?php echo esc_html($sesion['tipo']); ?> &nbsp;|&nbsp; <span class="b1sb color--neutro800">Modalidad:</span> <?php echo esc_html($sesion['modal']); ?>
                                </p>
                            </div>

                            <!-- Action Column -->
                            <div class="tx-sesion-action muestra--flex align-items-center gap--24">
                                <a href="javascript:void(0)" data-modal-target="#pdfViewerModal" data-pdf-url="<?php echo esc_url($sesion['url']); ?>" data-pdf-title="<?php echo esc_attr($sesion['titulo']); ?>" class="boton__fantasma boton--vertical tx-sesion-pdf-link">
                                    <i class="snd__icono snd-document--pdf tx-sesion-pdf-icon icono--24" aria-hidden="true"></i>
                                    Acta
                                </a>
                                <a href="javascript:void(0)" data-modal-target="#pdfViewerModal" data-pdf-url="<?php echo esc_url($sesion['url']); ?>" data-pdf-title="<?php echo esc_attr($sesion['titulo']); ?>" class="tx-sesion-chevron-link decoracion--ninguna ml--8">
                                    <i class="snd__icono snd-chevron--right tx-sesion-chevron-icon icono--24" aria-hidden="true"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Ver más Sesiones -->
                <?php if (count($sesiones) > 5) : ?>
                <div class="text-center mt-5" id="sesiones-load-more-container">
                    <a href="javascript:void(0)" id="sesiones-btn-more" class="boton__fantasma">
                        Ver más sesiones <i class="snd__icono snd-chevron--down icono--16" aria-hidden="true"></i>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

</div>

<!-- ── Modal Unificada: Campañas de Sensibilización (SND v1.1.0) ──────── -->
<div class="modal tx-pdf-modal snd-modal" id="modal-campania" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <!-- Botón de Cerrar -->
            <button type="button" class="boton__fantasma position-absolute top-0 end-0 m-3 z-3 p-2 rounded-circle" data-modal-dismiss aria-label="Cerrar modal">
                <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
            </button>

            <div class="modal-body p-4 p-md-5 position-relative" id="dh-modal-body">
                <!-- Contenido inyectado dinámicamente por derechos-humanos.js -->
                <div class="d-flex justify-content-center align-items-center" style="min-height: 200px;">
                    <i class="snd__icono snd-snd-loading2 icono__spin icono--32 color--neutro600" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ── Modal: Catálogo Digital (flipbook) (SND v1.1.0) ────────────────── -->
<div class="modal tx-pdf-modal snd-modal" id="modal-catalogo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down cd-flipbook-dialog">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden cd-flipbook-content">
            <button type="button" class="boton__fantasma position-absolute top-0 end-0 m-3 z-3 p-2 rounded-circle cd-flipbook-close" data-modal-dismiss aria-label="Cerrar modal">
                <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
            </button>

            <div class="modal-body p-0" id="cd-flipbook-container">
                <div class="d-flex justify-content-center align-items-center" style="min-height:300px;">
                    <i class="snd__icono snd-snd-loading2 icono__spin icono--32 color--neutro600" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ── Lightbox: Visor de imágenes de galería ────────────── -->
<div id="dh-lightbox" role="dialog" aria-modal="true" aria-label="Visor de imagen" style="display:none; position:fixed; inset:0; z-index:9999;">
    <div id="dh-lightbox__overlay" style="position:absolute; inset:0; background:rgba(0,0,0,0.88); cursor:zoom-out;"></div>
    <div id="dh-lightbox__box" style="position:relative; z-index:1; display:flex; flex-direction:column; align-items:center; justify-content:center; height:100%; padding:20px;">
        <!-- Cerrar -->
        <button id="dh-lightbox__close" aria-label="Cerrar"
            style="position:absolute; top:16px; right:20px; background:rgba(255,255,255,0.15); border:none; border-radius:50%; width:40px; height:40px; font-size:24px; color:#fff; cursor:pointer; line-height:1; display:flex; align-items:center; justify-content:center;">&times;</button>
        <!-- Prev -->
        <button id="dh-lightbox__prev" aria-label="Anterior"
            style="position:absolute; left:16px; top:50%; transform:translateY(-50%); background:rgba(255,255,255,0.15); border:none; border-radius:50%; width:46px; height:46px; font-size:28px; color:#fff; cursor:pointer; display:flex; align-items:center; justify-content:center;">&#8249;</button>
        <!-- Imagen -->
        <img id="dh-lightbox__img" src="" alt=""
            style="max-width:90vw; max-height:82vh; object-fit:contain; border-radius:8px; box-shadow:0 8px 40px rgba(0,0,0,0.5); transition:opacity .2s;">
        <!-- Next -->
        <button id="dh-lightbox__next" aria-label="Siguiente"
            style="position:absolute; right:16px; top:50%; transform:translateY(-50%); background:rgba(255,255,255,0.15); border:none; border-radius:50%; width:46px; height:46px; font-size:28px; color:#fff; cursor:pointer; display:flex; align-items:center; justify-content:center;">&#8250;</button>
        <!-- Contador -->
        <div id="dh-lightbox__counter"
            style="margin-top:14px; color:rgba(255,255,255,0.7); font-size:13px; font-weight:500; letter-spacing:.05em;"></div>
    </div>
</div>

<?php get_template_part( 'template-parts/visor-pdf' ); ?>


<?php get_footer(); ?>
