<?php
/**
 * Template Name: Directorio
 * Homologada al Sistema Nacional de Diseño (SND v1.1.0 — Tema Guinda)
 */

get_header();

$dir_args = array(
    'post_type'      => 'directorio',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);
$dir_query = new WP_Query($dir_args);

$areas = array();
$oficinas = array();
if ($dir_query->have_posts()) :
    while ($dir_query->have_posts()) : $dir_query->the_post();
        $foto_url    = get_the_post_thumbnail_url(get_the_ID(), 'large');
        $estructura  = get_post_meta(get_the_ID(), '_dir_estructura', true);
        $nombre_area = get_post_meta(get_the_ID(), '_dir_nombre_area', true);
        $show_enc    = get_post_meta(get_the_ID(), '_dir_show_encargado', true);
        $cargo       = get_post_meta(get_the_ID(), '_dir_cargo', true);

        $item = array(
            'estructura'     => $estructura ? $estructura : $nombre_area,
            'nombre_area'    => $nombre_area,
            'encargado'      => ($show_enc === '1') ? $nombre_area : '',
            'foto_titular'   => $foto_url ? $foto_url : '',
            'nombre_titular' => get_the_title(),
            'cargo_titular'  => $cargo,
            'email_titular'  => get_post_meta(get_the_ID(), '_dir_email', true),
        );

        if (stripos($cargo, 'Oficina de Representaci') !== false || stripos($item['nombre_titular'], 'Mónica Vargas') !== false) {
            if (empty($item['estructura'])) {
                $item['estructura'] = 'Oficina de Representación en la SESNA';
            }
            $oficinas[] = $item;
        } else {
            $areas[] = $item;
        }
    endwhile;
    wp_reset_postdata();
endif;

$all_areas = array_merge($areas, $oficinas);
$first = !empty($all_areas) ? $all_areas[0] : null;
?>

<div class="page-directorio front-page-bg pb--40">

    <!-- Migas de pan (Breadcrumb) — Estándar SND v1.1.0 -->
    <nav class="ruta__cont" aria-label="Ruta de navegación">
        <div class="contenedor">
            <ul class="ruta__lista">
                <li class="ruta__li">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="ruta__a">
                        <i class="snd__icono snd-home icono--20" aria-hidden="true"></i> Inicio
                    </a>
                </li>
                <li class="ruta__li">
                    <span class="ruta__a" aria-current="page">Directorio</span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero -->
    <section class="sesna-page-hero" aria-label="Encabezado de Directorio">
        <div class="contenedor">
            <div class="reticulaGrid__12 align-items-center">
                <div class="columna__12 posicion--relativa z--1">
                    <h1 class="h1b patria color--pguinda600">Directorio</h1>
                    <p class="sh1r color--neutro600 mb--0">
                        Conoce a las personas titulares de las áreas que integran la Secretaría Ejecutiva del Sistema Nacional Anticorrupción.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenido principal -->
    <div class="contenedor">
        <div class="reticulaGrid__12 dir-grid">

            <!-- Col izquierda: Estructura Orgánica -->
            <div class="columna__12 columna__6--lg">
                <div class="dir-card">
                    <div class="dir-org__header">
                        <h2 class="dir-org__title sh0b color--neutro800 mb--0">Estructura Orgánica</h2>
                        <?php if (!empty($areas)) : ?>
                        <span class="dir-org__count" aria-label="<?php echo count($areas); ?> unidades administrativas">
                            <?php echo count($areas); ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="dir-org__list" role="listbox" aria-label="Áreas de la SESNA">
                        <div class="dir-org__inner">
                        <?php if (!empty($areas)) : ?>
                            <?php foreach ($areas as $i => $area) : ?>
                                <div class="dir-org__item<?php echo $i === 0 ? ' dir-org__item--active' : ''; ?>"
                                     data-index="<?php echo $i; ?>"
                                     role="option"
                                     aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                                     tabindex="<?php echo $i === 0 ? '0' : '-1'; ?>">
                                    <span class="dir-org__dot" aria-hidden="true"></span>
                                    <span class="dir-org__item-icon" aria-hidden="true">
                                        <i class="snd__icono snd-building icono--20 color--pguinda600" aria-hidden="true"></i>
                                    </span>
                                    <span class="dir-org__item-text b1r mb--0"><?php echo esc_html($area['estructura']); ?></span>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="aviso aviso--info" role="status" aria-live="polite">
                                <i class="snd__icono snd-information aviso__icon icono--24 color--azul500" aria-hidden="true"></i>
                                <div class="aviso__cont">
                                    <div class="aviso__txt">
                                        <p class="b1r color--azul500 mb--0">No hay áreas configuradas en el directorio.</p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if (!empty($oficinas)) : ?>
                <div class="dir-card mt--24">
                    <div class="dir-org__header">
                        <h2 class="dir-org__title sh0b color--neutro800 mb--0">Oficina de Representación en la SESNA</h2>
                    </div>
                    <div class="dir-org__list" role="listbox" aria-label="Oficina de Representación en la SESNA">
                        <div class="dir-org__inner">
                        <?php foreach ($oficinas as $k => $oficina) :
                            $index = count($areas) + $k;
                        ?>
                            <div class="dir-org__item"
                                 data-index="<?php echo $index; ?>"
                                 role="option"
                                 aria-selected="false"
                                 tabindex="-1">
                                <span class="dir-org__dot" aria-hidden="true"></span>
                                <span class="dir-org__item-icon" aria-hidden="true">
                                    <i class="snd__icono snd-building icono--20 color--pguinda600" aria-hidden="true"></i>
                                </span>
                                <span class="dir-org__item-text b1r mb--0"><?php echo esc_html($oficina['estructura']); ?></span>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Col derecha: Ficha del titular -->
            <div class="columna__12 columna__6--lg dir-ficha-col">
                <div class="dir-card">
                    <div class="dir-ficha" id="dir-ficha" aria-live="polite">
                        <div class="dir-ficha__foto-wrap">
                            <?php if ($first && $first['foto_titular']) : ?>
                                <img class="dir-ficha__foto" id="dir-foto"
                                     src="<?php echo esc_url($first['foto_titular']); ?>"
                                     alt="<?php echo esc_attr($first['nombre_titular']); ?>">
                                <div class="dir-ficha__foto dir-ficha__foto--placeholder muestra--ninguno" id="dir-foto-placeholder">
                                    <i class="snd__icono snd-user icono--48" aria-hidden="true"></i>
                                </div>
                            <?php else : ?>
                                <div class="dir-ficha__foto dir-ficha__foto--placeholder" id="dir-foto-placeholder">
                                    <i class="snd__icono snd-user icono--48" aria-hidden="true"></i>
                                </div>
                                <img class="dir-ficha__foto muestra--ninguno" id="dir-foto" src="" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="dir-ficha__info">
                            <div class="dir-ficha__area-badge" id="dir-area-badge">
                                <?php echo $first ? esc_html($first['estructura']) : ''; ?>
                            </div>
                            <h3 class="dir-ficha__nombre sh1b patria color--principal mb--16" id="dir-nombre">
                                <?php echo $first ? esc_html($first['nombre_titular']) : '—'; ?>
                            </h3>
                            <div class="dir-ficha__cargo-row <?php echo ($first && $first['encargado']) ? '' : 'muestra--ninguno'; ?>" id="dir-encargado-row">
                                <span class="dir-ficha__icon-circle" aria-hidden="true">
                                    <i class="snd__icono snd-user icono--20 color--pguinda600" aria-hidden="true"></i>
                                </span>
                                <span class="dir-ficha__cargo b1sb color--neutro800 mb--0" id="dir-encargado">
                                    <?php echo ($first && $first['encargado']) ? esc_html($first['encargado']) : ''; ?>
                                </span>
                            </div>
                            <hr class="dir-ficha__separator <?php echo ($first && $first['encargado']) ? '' : 'muestra--ninguno'; ?>" id="dir-encargado-sep">
                            <div class="dir-ficha__cargo-row">
                                <span class="dir-ficha__icon-circle" aria-hidden="true">
                                    <i class="snd__icono snd-user icono--20 color--pguinda600" aria-hidden="true"></i>
                                </span>
                                <span class="dir-ficha__cargo b1sb color--neutro800 mb--0" id="dir-cargo">
                                    <?php echo $first ? esc_html($first['cargo_titular']) : '—'; ?>
                                </span>
                            </div>
                            <hr class="dir-ficha__separator">
                            <div class="dir-ficha__cargo-row">
                                <span class="dir-ficha__icon-circle" aria-hidden="true">
                                    <i class="snd__icono snd-email icono--20 color--pguinda600" aria-hidden="true"></i>
                                </span>
                                <a class="dir-ficha__email b1r color--neutro700 mb--0" id="dir-email"
                                   href="<?php echo $first ? 'mailto:' . esc_attr($first['email_titular']) : '#'; ?>">
                                    <?php echo $first ? esc_html($first['email_titular']) : '—'; ?>
                                </a>
                            </div>
                            <div class="mt--20">
                                <a class="boton__primario" id="dir-email-btn"
                                   href="<?php echo $first ? 'mailto:' . esc_attr($first['email_titular']) : '#'; ?>">
                                    <i class="snd__icono snd-email icono--20" aria-hidden="true"></i>
                                    Enviar correo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Card de Redirección: Contacto institucional -->
        <div class="reticulaGrid__12 mt--32">
            <div class="columna__12">
                <div class="tx-normativa-card tx-normativa-card--cta">
                    <div>
                        <h2 class="sh1b color--neutro800 mb--4">¿Necesitas más información?</h2>
                        <p class="b1r color--neutro600 mb--0">Para consultas generales o información adicional sobre la Secretaría Ejecutiva, comunícate con nosotros.</p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/contacto/')); ?>" class="boton__fantasma">
                        Ir a Contacto <i class="snd__icono snd-chevron--right icono--20" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal móvil: ficha del titular -->
    <div class="dir-modal" id="dir-modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="dir-modal-nombre">
        <div class="dir-modal__backdrop" id="dir-modal-backdrop"></div>
        <div class="dir-modal__content">
            <button type="button" class="boton__fantasma dir-modal__close" id="dir-modal-close" aria-label="Cerrar ficha">
                <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
            </button>
            <div class="dir-modal__foto-wrap">
                <img class="dir-modal__foto" id="dir-modal-foto" src="" alt="">
                <div class="dir-modal__foto dir-modal__foto--placeholder muestra--ninguno" id="dir-modal-placeholder">
                    <i class="snd__icono snd-user icono--48" aria-hidden="true"></i>
                </div>
            </div>
            <div class="dir-modal__info">
                <div class="dir-ficha__area-badge mb--8" id="dir-modal-area-badge"></div>
                <h3 class="dir-modal__nombre sh0b patria color--principal mb--16" id="dir-modal-nombre"></h3>
                <div class="dir-modal__cargo-row muestra--ninguno" id="dir-modal-encargado-row">
                    <span class="dir-ficha__icon-circle" aria-hidden="true"><i class="snd__icono snd-user icono--20 color--pguinda600" aria-hidden="true"></i></span>
                    <span class="dir-modal__cargo b1sb color--neutro800 mb--0" id="dir-modal-encargado"></span>
                </div>
                <hr class="dir-ficha__separator muestra--ninguno" id="dir-modal-encargado-sep">
                <div class="dir-modal__cargo-row">
                    <span class="dir-ficha__icon-circle" aria-hidden="true"><i class="snd__icono snd-user icono--20 color--pguinda600" aria-hidden="true"></i></span>
                    <span class="dir-modal__cargo b1sb color--neutro800 mb--0" id="dir-modal-cargo"></span>
                </div>
                <hr class="dir-ficha__separator">
                <div class="dir-modal__cargo-row">
                    <span class="dir-ficha__icon-circle" aria-hidden="true"><i class="snd__icono snd-email icono--20 color--pguinda600" aria-hidden="true"></i></span>
                    <a class="dir-ficha__email b1r color--neutro700 mb--0" id="dir-modal-email" href="#"></a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php if (!empty($all_areas)) : ?>
<script>
    window.directorioData = <?php echo wp_json_encode($all_areas); ?>;
</script>
<?php endif; ?>

<?php get_footer(); ?>
