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
    <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/') ); ?>"><i class="bi bi-house-door"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url('/acciones-y-programas/') ); ?>">Acciones y Programas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Derechos Humanos y Perspectiva de Género</li>
            </ol>
        </div>
    </nav>

    <!-- ── Hero ──────────────────────────────────────────────── -->
    <section class="sesna-page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8 position-relative z-1 mb-4 mb-lg-0">
                    <h1 class="sesna-hero__title">Derechos Humanos<br>y Perspectiva de Género</h1>
                    <div class="hero-separator"></div>
                    <p class="sesna-hero__subtitle">
                        Promovemos el respeto a los Derechos Humanos, la igualdad de género y la no discriminación, contribuyendo a fortalecer la cultura de integridad y prevenir la violencia en la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.
                    </p>
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
        <div class="container">
            <div class="cp-recursos__header mb-2">
                <div>
                    <h2 class="cp-recursos__titulo mb-0">PRONUNCIAMIENTOS</h2>
                    <div class="cp-recursos__linea"></div>
                </div>
            </div>
            <p class="dh-section__subtitle">Conoce nuestros pronunciamientos institucionales.</p>

            <div class="row g-4 mt-2">
                <div class="col-md-6">
                    <a href="javascript:void(0)"
                       data-bs-toggle="modal"
                       data-bs-target="#pdfViewerModal"
                       data-pdf-url="<?php echo esc_url( $dh_pdf_nondiscriminacion ); ?>"
                       data-pdf-title="Pronunciamiento de No Discriminación 2026"
                       class="sna-noticias-card rounded-4 h-100 d-flex align-items-center text-decoration-none text-dark px-4 py-4 w-100 gap-3">
                        <div class="icon-bg-circle icon-bg-circle--md flex-shrink-0">
                            <i class="bi bi-file-earmark-richtext" style="font-size: 22px; color: var(--color-burgundi);"></i>
                        </div>
                        <h5 class="fw-bold mb-0 flex-grow-1" style="font-size: 18px; line-height: 1.4;">Pronunciamiento de No Discriminación</h5>
                        <i class="bi bi-chevron-right text-muted flex-shrink-0" style="font-size: 14px;"></i>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="javascript:void(0)"
                       data-bs-toggle="modal"
                       data-bs-target="#pdfViewerModal"
                       data-pdf-url="<?php echo esc_url( $dh_pdf_acoso ); ?>"
                       data-pdf-title="Pronunciamiento de Cero Tolerancia al Acoso y Hostigamiento Sexual 2026"
                       class="sna-noticias-card rounded-4 h-100 d-flex align-items-center text-decoration-none text-dark px-4 py-4 w-100 gap-3">
                        <div class="icon-bg-circle icon-bg-circle--md flex-shrink-0">
                            <i class="bi bi-file-earmark-richtext" style="font-size: 22px; color: var(--color-burgundi);"></i>
                        </div>
                        <h5 class="fw-bold mb-0 flex-grow-1" style="font-size: 18px; line-height: 1.4;">Pronunciamiento de Cero Tolerancia al Acoso y Hostigamiento Sexual</h5>
                        <i class="bi bi-chevron-right text-muted flex-shrink-0" style="font-size: 14px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Campañas de Sensibilización ───────────────────────── -->
    <section class="dh-campanias py-5">
        <div class="container">
            <div class="cp-recursos__header mb-2">
                <div>
                    <h2 class="cp-recursos__titulo mb-0">CAMPAÑAS DE SENSIBILIZACIÓN</h2>
                    <div class="cp-recursos__linea"></div>
                </div>
            </div>
            <p class="dh-section__subtitle">Conoce nuestras campañas permanentes para construir espacios libres de violencia y discriminación.</p>

            <div class="row g-4 mt-2">
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
                        $dh_c_icono       = get_post_meta($dh_c_id, '_dh_icono',        true) ?: 'bi-star';
                        $dh_c_icono_img   = get_post_meta($dh_c_id, '_dh_icono_img',    true) ?: '';
                        $dh_c_infografia_ids = get_post_meta($dh_c_id, '_dh_infografia_ids', true) ?: '';
                        $dh_c_color       = get_post_meta($dh_c_id, '_dh_color',        true) ?: '#9d2449';
                        $dh_c_galeria_ids = get_post_meta($dh_c_id, '_dh_galeria_ids',  true) ?: '';
                        $dh_c_video       = get_post_meta($dh_c_id, '_dh_video_url',    true) ?: '';
                        $dh_c_banner      = get_post_meta($dh_c_id, '_dh_banner_texto', true) ?: '';
                        $dh_c_resumen     = get_post_meta($dh_c_id, '_dh_resumen',      true) ?: '';

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
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="dh-campania-card dh-campania-trigger h-100 d-flex flex-column"
                         role="button"
                         tabindex="0"
                         data-bs-toggle="modal"
                         data-bs-target="#modal-campania"
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
                             style="<?php if ($dh_c_icono_img): ?>background-image: url('<?php echo esc_url($dh_c_icono_img); ?>');<?php else: ?>background-color: <?php echo esc_attr($dh_c_color); ?>18;<?php endif; ?>">
                            <?php if (!$dh_c_icono_img): ?>
                                <i class="bi <?php echo esc_attr($dh_c_icono); ?>" style="color: <?php echo esc_attr($dh_c_color); ?>; font-size: 34px;"></i>
                            <?php endif; ?>
                        </div>
                        <h5 class="dh-campania-card__title"><?php echo esc_html($dh_c_titulo); ?></h5>
                        <p class="dh-campania-card__desc flex-grow-1 mb-3"><?php echo esc_html($dh_c_resumen); ?></p>
                        <span class="dh-campania-card__link mt-auto">Ver más <i class="bi bi-arrow-right ms-1"></i></span>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                <div class="col-12">
                    <p class="text-muted">No hay campañas publicadas aún.</p>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- ── Acciones X la Integridad ──────────────────────────── -->
    <section class="dh-acciones py-5">
        <div class="container">
            <div class="cp-recursos__header mb-2">
                <div>
                    <h2 class="cp-recursos__titulo mb-0">ACCIONES X LA INTEGRIDAD</h2>
                    <div class="cp-recursos__linea"></div>
                </div>
            </div>
            <p class="dh-section__subtitle">Acciones X la integridad es nuestra publicación permanente sobre integridad, Derechos Humanos y perspectiva de género.</p>

            <div class="dh-acciones-card mt-4">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4">
                        <div class="dh-acciones-card__img">
                            <img src="<?php echo esc_url( get_theme_file_uri('/img/derechos-humanos/acciones-integridad.png') ); ?>"
                                 alt="Acciones X la Integridad"
                                 class="img-fluid"
                                 onerror="this.parentElement.innerHTML='<div class=\'d-flex align-items-center justify-content-center h-100 bg-light\' style=\'min-height:180px;\'><i class=\'bi bi-image fs-1 text-muted\'></i></div>';">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="dh-acciones-card__body">
                            <h3 class="fw-bold mb-3">Acciones X la Integridad</h3>
                            <p class="text-muted mb-3">Infografía, datos relevantes y efemérides para fortalecer nuestra cultura de integridad, igualdad y derechos humanos.</p>
                            <a href="#" class="btn-sesna-link">Leer más <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Comité de Igualdad de Género ──────────────────────── -->
    <section class="dh-comite py-5 pb-5 mb-4">
        <div class="container">
            <div class="cp-recursos__header mb-2">
                <div>
                    <h2 class="cp-recursos__titulo mb-0">COMITÉ DE IGUALDAD DE GÉNERO</h2>
                    <div class="cp-recursos__linea"></div>
                </div>
            </div>
            <p class="dh-section__subtitle">Consulta las sesiones y actas del Comité de Igualdad de Género (CIG-SESNA).</p>

            <div class="dh-comite-panel mt-4">
                <h4 class="fw-bold mb-4 font-noto-sans text-dark">Sesiones del Comité</h4>
                <!-- Filtros Sesiones -->
                <div class="row mb-5 align-items-end">
                    <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                        <label for="filter-anio" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Año</label>
                        <select id="filter-anio" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                            <option value="Todos">Todos</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <label for="filter-tipo" class="form-label fw-bold font-noto-sans fs-5 text-dark mb-2">Tipo de sesión</label>
                        <select id="filter-tipo" class="form-select font-noto-sans small text-dark shadow-sm rounded-3 py-2 tx-comite-filter-control">
                            <option value="Todas">Todas</option>
                            <option value="Ordinaria">Ordinaria</option>
                            <option value="Extraordinaria">Extraordinaria</option>
                        </select>
                    </div>
                </div>

                <?php
                $sesiones = [];
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
                        $sesiones[] = [
                            'anio'      => get_post_meta($pid, '_dh_cg_anio', true),
                            'titulo'    => get_the_title(),
                            'tipo'      => get_post_meta($pid, '_dh_cg_tipo', true),
                            'modal'     => get_post_meta($pid, '_dh_cg_modalidad', true),
                            'url'       => sesna_resolve_archivo_url(get_post_meta($pid, '_dh_cg_url', true)),
                        ];
                    }
                    wp_reset_postdata();
                }
                ?>
                <div class="d-flex flex-column gap-3">
                    <?php foreach ( $sesiones as $sesion ) : ?>
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3 tx-sesion-card" data-anio="<?php echo esc_attr($sesion['anio']); ?>" data-tipo="<?php echo esc_attr($sesion['tipo']); ?>">
                        <div class="card-body p-0 d-flex flex-column flex-md-row align-items-md-stretch">
                            
                            <!-- Date Column -->
                            <div class="tx-sesion-date text-center p-3 p-md-4 d-flex flex-column justify-content-center">
                                <div class="fw-bold fs-3 tx-sesion-date-year" style="color:#666;"><?php echo esc_html($sesion['anio']); ?></div>
                            </div>

                            <!-- Info Column -->
                            <div class="p-4 ps-md-4 flex-grow-1 d-flex flex-column justify-content-center">
                                <h3 class="h5 fw-bold mb-2 font-noto-sans tx-sesion-info-title"><?php echo esc_html($sesion['titulo']); ?></h3>
                                <p class="mb-0 font-noto-sans tx-sesion-info-type">
                                    <strong>Tipo:</strong> <?php echo esc_html($sesion['tipo']); ?> &nbsp;|&nbsp; <strong>Modalidad:</strong> <?php echo esc_html($sesion['modal']); ?>
                                </p>
                            </div>

                            <!-- Action Column -->
                            <div class="tx-sesion-action d-flex align-items-center justify-content-md-end p-4 gap-4 ms-md-auto">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pdfViewerModal" data-pdf-url="<?php echo esc_url($sesion['url']); ?>" data-pdf-title="<?php echo esc_attr($sesion['titulo']); ?>" class="text-decoration-none text-center d-flex flex-column align-items-center tx-sesion-pdf-link">
                                    <i class="bi bi-filetype-pdf tx-sesion-pdf-icon" style="font-size: 1.5rem; color: #9d2449;"></i>
                                    <div class="fw-bold mt-1 font-noto-sans tx-sesion-pdf-text" style="color: #9d2449;">Acta</div>
                                </a>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pdfViewerModal" data-pdf-url="<?php echo esc_url($sesion['url']); ?>" data-pdf-title="<?php echo esc_attr($sesion['titulo']); ?>" class="tx-sesion-chevron-link text-decoration-none ms-2">
                                    <i class="bi bi-chevron-right tx-sesion-chevron-icon" style="stroke-width: 2px; font-size: 1.5rem; color: #9d2449;"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Ver más Sesiones -->
                <div class="text-center mt-5" id="sesiones-load-more-container">
                    <a href="javascript:void(0)" id="sesiones-btn-more" class="tx-comite-btn-more">
                        Ver más sesiones <i class="bi bi-chevron-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- ── Modal Unificada: Campañas de Sensibilización ──────── -->
<div class="modal fade" id="modal-campania" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <!-- Botón de Cerrar -->
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3 z-3" data-bs-dismiss="modal" aria-label="Cerrar"
                style="background-color: white; border: 1px solid var(--color-burgundi, #9d2449); border-radius: 50%; padding: .4rem; opacity: 1; background-size: 0.8em;"></button>

            <div class="modal-body p-4 p-md-5 position-relative" id="dh-modal-body">
                <!-- Contenido inyectado dinámicamente por derechos-humanos.js -->
                <div class="d-flex justify-content-center align-items-center" style="min-height: 200px;">
                    <div class="spinner-border text-secondary" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
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

<?php get_template_part( 'template-parts/transparencia/visor-pdf' ); ?>


<?php get_footer(); ?>
