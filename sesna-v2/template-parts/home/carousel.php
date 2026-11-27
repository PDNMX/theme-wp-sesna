<!-- INICIO: Carrusel Dinámico SESNA (100% Nativo SND v1.0.0) -->
<?php
$slider_args = array(
    'post_type'              => 'slider',
    'posts_per_page'         => -1,
    'post_status'            => 'publish',
    'orderby'                => 'date',
    'order'                  => 'DESC',
    'no_found_rows'          => true,
    'update_post_term_cache' => false,
);
$slider_query = new WP_Query( $slider_args );

if ( $slider_query->have_posts() ) :
    $total_slides = $slider_query->post_count;
?>
<section class="sesna-carousel-section pt--48 pb--48" aria-roledescription="carousel" aria-labelledby="sesna-carousel-heading">
    <div class="contenedor">
        <div class="fila justify-content-center mb--48">
            <div class="columna__12 columna__8--md texto--centro">
                <h2 class="h2b patria color--pguinda600 mb--8" id="sesna-carousel-heading">Destacados</h2>
                <p class="sh1r color--neutro600 mb--0">Conoce las campañas, eventos e iniciativas prioritarias.</p>
            </div>
        </div>
    </div>

    <div id="homeCarousel" class="sesna-carousel-wrapper posicion--relativa desborde--oculto" tabindex="0">

        <!-- Slides Container (Viewport + Track con efecto de barrido horizontal) -->
        <div class="sesna-carousel-viewport posicion--relativa ancho--100 desborde--oculto">
            <div class="sesna-carousel-track muestra--flex ancho--100">
                <?php
                $slide_index = 0;
                while ( $slider_query->have_posts() ) : $slider_query->the_post();
                    $is_first    = ( $slide_index === 0 );
                    $image_url   = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    $show_text   = get_post_meta( get_the_ID(), '_show_text_slider', true );
                    if ( $show_text === '' ) $show_text = '1';
                    $slider_url  = get_post_meta( get_the_ID(), '_slider_url', true );
                    $has_url     = ! empty( $slider_url );
                    $is_external = $has_url && ( preg_match( '#^https?://#i', $slider_url ) && strpos( $slider_url, home_url() ) !== 0 );
                ?>
                    <div class="sesna-carousel-slide posicion--relativa<?php if ( $is_first ) echo ' is-active'; ?><?php if ( $has_url ) echo ' has-link'; ?>"
                         role="group"
                         aria-roledescription="slide"
                         aria-label="<?php echo esc_attr( sprintf( 'Diapositiva %d de %d: %s', $slide_index + 1, $total_slides, get_the_title() ) ); ?>"
                         data-index="<?php echo $slide_index; ?>"
                         <?php if ( ! $is_first ) echo 'aria-hidden="true"'; ?>>

                        <?php if ( $has_url ) : ?>
                            <a href="<?php echo esc_url( $slider_url ); ?>"
                               class="sesna-carousel-slide-link"
                               <?php if ( $is_external ) echo 'target="_blank" rel="noopener noreferrer"'; ?>
                               aria-label="<?php echo esc_attr( sprintf( 'Ir a %s', get_the_title() ?: $slider_url ) ); ?>"
                               tabindex="<?php echo $is_first ? '0' : '-1'; ?>">
                        <?php endif; ?>

                        <?php if ( $image_url ) : ?>
                            <img src="<?php echo esc_url( $image_url ); ?>"
                                 class="sesna-carousel-img"
                                 alt="<?php echo esc_attr( get_the_title() ); ?>"
                                 loading="<?php echo $is_first ? 'eager' : 'lazy'; ?>">
                        <?php else : ?>
                            <div class="fallback-img muestra--flex align-items-center justify-content-center ancho--100 fondo--pguinda900">
                                <span class="color--blanco h4b patria">Secretaría Ejecutiva del Sistema Nacional Anticorrupción</span>
                            </div>
                        <?php endif; ?>

                        <?php if ( $show_text === '1' ) : ?>
                            <div class="sesna-carousel-caption">
                                <div class="contenedor">
                                    <p class="h4b patria mb--4 color--blanco text-shadow-sm"><?php the_title(); ?></p>
                                    <?php if ( has_excerpt() ) : ?>
                                        <p class="b1r mb--0 color--blanco text-shadow-sm muestra--ninguno muestra--bloque--md sesna-carousel-excerpt"><?php echo get_the_excerpt(); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $has_url ) : ?>
                            </a>
                        <?php endif; ?>

                    </div>
                <?php
                    $slide_index++;
                endwhile;
                ?>
            </div>
        </div>

        <!-- Barra inferior de controles: Indicadores Circulares + Botón de Pausa/Reproducción (WCAG 2.2.2) -->
        <?php if ( $total_slides > 1 ) : ?>
        <div class="sesna-carousel-controls">
            <div class="sesna-carousel-indicators" role="tablist" aria-label="Controles de diapositivas">
                <?php for ( $i = 0; $i < $total_slides; $i++ ) : ?>
                    <button type="button"
                            class="sesna-carousel-dot<?php if ( $i === 0 ) echo ' is-active'; ?>"
                            role="tab"
                            aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                            aria-label="<?php echo esc_attr( sprintf( 'Ir a diapositiva %d de %d', $i + 1, $total_slides ) ); ?>"
                            data-target-index="<?php echo $i; ?>">
                    </button>
                <?php endfor; ?>
            </div>

            <button type="button"
                    class="sesna-carousel-pause-btn"
                    id="sesnaCarouselPauseBtn"
                    aria-pressed="false"
                    aria-label="Pausar animación del carrusel">
                <span class="sesna-carousel-pause-icon" aria-hidden="true">
                    <?= sesna_render_snd_svg_icon('snd-pause', 'icono--16 color--blanco') ?>
                </span>
                <span class="sesna-carousel-play-icon muestra--ninguno" aria-hidden="true">
                    <?= sesna_render_snd_svg_icon('snd-play', 'icono--16 color--blanco') ?>
                </span>
            </button>
        </div>

        <!-- Botones de navegación Anterior / Siguiente -->
        <button class="sesna-carousel-btn sesna-carousel-btn--prev"
                type="button"
                aria-label="Diapositiva anterior">
            <?= sesna_render_snd_svg_icon('snd-chevron--left', 'icono--24 color--blanco') ?>
        </button>
        <button class="sesna-carousel-btn sesna-carousel-btn--next"
                type="button"
                aria-label="Diapositiva siguiente">
            <?= sesna_render_snd_svg_icon('snd-chevron--right', 'icono--24 color--blanco') ?>
        </button>
        <?php endif; ?>

        <!-- Tooltip flotante para slides con URL -->
        <div id="sesnaCarouselTooltip" class="sesna-carousel-floating-tooltip" aria-hidden="true">
            <?= sesna_render_snd_svg_icon('snd-launch', 'icono--16 sesna-carousel-tooltip-icon') ?>
            <span class="sesna-carousel-tooltip-text">Abrir enlace</span>
        </div>

    </div>
</section>
<?php
    wp_reset_postdata();
endif;
?>
<!-- FIN: Carrusel Dinámico SESNA -->
