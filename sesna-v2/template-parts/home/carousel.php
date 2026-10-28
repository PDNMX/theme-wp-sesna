<!-- INICIO: Carrusel Dinámico SESNA (100% Nativo SND v1.1.0) -->
<?php
$slider_args = array(
    'post_type'      => 'slider',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
);
$slider_query = new WP_Query( $slider_args );

if ( $slider_query->have_posts() ) :
    $total_slides = $slider_query->post_count;
?>
<section class="sesna-carousel-section contenedor--fluido px--0" aria-roledescription="carousel" aria-label="Destacados y Noticias SESNA">
    <div id="homeCarousel" class="sesna-carousel-wrapper position-relative overflow-hidden" tabindex="0">

        <!-- Slides Container (Viewport + Track con efecto de barrido horizontal) -->
        <div class="sesna-carousel-viewport position-relative w-100 overflow-hidden">
            <div class="sesna-carousel-track d-flex w-100">
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
                    <div class="sesna-carousel-slide flex-shrink-0 w-100 position-relative<?php if ( $is_first ) echo ' is-active'; ?><?php if ( $has_url ) echo ' has-link'; ?>"
                         role="group"
                         aria-roledescription="slide"
                         aria-label="<?php echo esc_attr( sprintf( 'Diapositiva %d de %d: %s', $slide_index + 1, $total_slides, get_the_title() ) ); ?>"
                         data-index="<?php echo $slide_index; ?>"
                         <?php if ( ! $is_first ) echo 'aria-hidden="true"'; ?>>
                        
                        <?php if ( $has_url ) : ?>
                            <a href="<?php echo esc_url( $slider_url ); ?>"
                               class="sesna-carousel-slide-link d-block w-100 h-100 text-decoration-none"
                               <?php if ( $is_external ) echo 'target="_blank" rel="noopener noreferrer"'; ?>
                               title="<?php echo esc_attr( get_the_title() ? get_the_title() . ' - Abrir enlace' : 'Abrir enlace' ); ?>"
                               aria-label="<?php echo esc_attr( sprintf( 'Ir a %s', get_the_title() ?: $slider_url ) ); ?>"
                               tabindex="<?php echo $is_first ? '0' : '-1'; ?>">
                        <?php endif; ?>

                        <?php if ( $image_url ) : ?>
                            <img src="<?php echo esc_url( $image_url ); ?>"
                                 class="sesna-carousel-img w-100 d-block"
                                 alt="<?php echo esc_attr( get_the_title() ); ?>"
                                 loading="<?php echo $is_first ? 'eager' : 'lazy'; ?>"
                                 style="object-fit: cover; object-position: center;">
                        <?php else : ?>
                            <div class="fallback-img d-flex align-items-center justify-content-center w-100" style="height: 480px; background: #611232;">
                                <span class="color--blanco h4b patria">Secretaría Ejecutiva del Sistema Nacional Anticorrupción</span>
                            </div>
                        <?php endif; ?>

                        <?php if ( $show_text === '1' ) : ?>
                            <div class="sesna-carousel-caption position-absolute bottom-0 start-0 w-100 p-3 p-md-4 text-white">
                                <div class="contenedor">
                                    <p class="h4b patria mb-1 text-white text-shadow-sm"><?php the_title(); ?></p>
                                    <?php if ( has_excerpt() ) : ?>
                                        <p class="mb-0 text-white font-noto-sans text-shadow-sm muestra--ninguno muestra--bloque--md" style="font-size: 15px; max-width: 800px;"><?php echo get_the_excerpt(); ?></p>
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

        <!-- Indicadores Circulares -->
        <?php if ( $total_slides > 1 ) : ?>
        <div class="sesna-carousel-indicators d-flex justify-content-center align-items-center gap-2 position-absolute bottom-0 w-100 mb-3 z-3" role="tablist" aria-label="Controles de diapositivas">
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

        <!-- Botones de navegación Anterior / Siguiente -->
        <button class="sesna-carousel-btn sesna-carousel-btn--prev position-absolute top-50 start-0 translate-middle-y z-3 ms-2 ms-md-4 d-flex align-items-center justify-content-center"
                type="button"
                aria-label="Diapositiva anterior">
            <i class="snd__icono snd-chevron--left icono--24 color--blanco" aria-hidden="true"></i>
        </button>
        <button class="sesna-carousel-btn sesna-carousel-btn--next position-absolute top-50 end-0 translate-middle-y z-3 me-2 me-md-4 d-flex align-items-center justify-content-center"
                type="button"
                aria-label="Diapositiva siguiente">
            <i class="snd__icono snd-chevron--right icono--24 color--blanco" aria-hidden="true"></i>
        </button>
        <?php endif; ?>

        <!-- Tooltip flotante para slides con URL -->
        <div id="sesnaCarouselTooltip" class="sesna-carousel-floating-tooltip" aria-hidden="true">
            <svg class="sesna-carousel-tooltip-icon" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                <polyline points="15 3 21 3 21 9"></polyline>
                <line x1="10" y1="14" x2="21" y2="3"></line>
            </svg>
            <span class="sesna-carousel-tooltip-text">Abrir enlace</span>
        </div>

    </div>
</section>

<style>
/* ── Estilos nativos del Carrusel con Barrido Horizontal (SND Compatible) ──────────────── */
.sesna-carousel-wrapper {
    position: relative;
    width: 100%;
    overflow: hidden;
}
.sesna-carousel-viewport {
    position: relative;
    width: 100%;
    aspect-ratio: 2560 / 622;
    max-height: 400px;
    overflow: hidden;
}
.sesna-carousel-track {
    display: flex;
    width: 100%;
    height: 100%;
    transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    will-change: transform;
}
.sesna-carousel-slide {
    flex: 0 0 100%;
    width: 100%;
    height: 100%;
    min-width: 100%;
    max-width: 100%;
    position: relative;
    display: block;
}
.sesna-carousel-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
}
.fallback-img {
    width: 100%;
    height: 100%;
}
@media (max-width: 767.98px) {
    .sesna-carousel-btn {
        display: none !important;
    }
    .sesna-carousel-indicators {
        margin-bottom: 4px !important;
    }
    .sesna-carousel-dot {
        width: 8px !important;
        height: 8px !important;
        min-width: 8px !important;
        min-height: 8px !important;
        margin: 0 2px !important;
        border-width: 1px !important;
    }
}
.sesna-carousel-caption {
    background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.78) 100%);
    pointer-events: none;
}
.text-shadow-sm {
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
}
.sesna-carousel-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.45);
    border: 1px solid rgba(255, 255, 255, 0.4);
    cursor: pointer;
    transition: background-color 0.2s ease, transform 0.2s ease;
}
.sesna-carousel-btn:hover,
.sesna-carousel-btn:focus-visible {
    background: rgba(97, 18, 50, 0.9);
    border-color: #fff;
    transform: translateY(-50%) scale(1.08);
    outline: 2px solid #fff;
}
.sesna-carousel-dot {
    width: 14px;
    height: 14px;
    min-width: 14px;
    min-height: 14px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.65);
    border: 1.5px solid rgba(0, 0, 0, 0.35);
    margin: 0 4px;
    padding: 0;
    cursor: pointer;
    transition: background-color 0.25s ease, border-color 0.25s ease, transform 0.25s ease, opacity 0.25s ease;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
    outline: none;
    display: inline-block;
}
.sesna-carousel-dot:hover,
.sesna-carousel-dot:focus-visible {
    background-color: #ffffff;
    border-color: rgba(0, 0, 0, 0.6);
    transform: scale(1.15);
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.45);
}
.sesna-carousel-dot.is-active {
    background-color: #ffffff;
    border: 2px solid rgba(0, 0, 0, 0.55);
    box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.85), 0 2px 4px rgba(0, 0, 0, 0.35);
    transform: scale(1.2);
}
@media (prefers-reduced-motion: reduce) {
    .sesna-carousel-track {
        transition: none !important;
    }
}

/* ── Comportamiento de Enlace y Tooltip en Slides ─────────────────────── */
.sesna-carousel-slide-link {
    display: block;
    width: 100%;
    height: 100%;
    color: inherit;
    text-decoration: none;
    outline: none;
    cursor: default;
    pointer-events: none;
}
.sesna-carousel-slide.is-active .sesna-carousel-slide-link {
    cursor: pointer;
    pointer-events: auto;
}
/* Estricto: SIN EFECTOS VISUALES DE HOVER en el slide ni en las imágenes */
.sesna-carousel-slide-link:hover,
.sesna-carousel-slide-link:focus,
.sesna-carousel-slide-link:active {
    color: inherit;
    text-decoration: none;
    outline: none;
    opacity: 1;
    filter: none;
}
.sesna-carousel-slide-link:hover .sesna-carousel-img,
.sesna-carousel-slide-link:focus .sesna-carousel-img {
    transform: none;
    filter: none;
}

/* Tooltip Flotante Elegante */
.sesna-carousel-floating-tooltip {
    position: absolute;
    top: 0;
    left: 0;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    background: rgba(33, 37, 41, 0.92);
    color: #ffffff;
    font-family: var(--font-noto-sans, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif);
    font-size: 12px;
    font-weight: 600;
    line-height: 1.2;
    border-radius: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.35);
    border: 1px solid rgba(255, 255, 255, 0.22);
    pointer-events: none;
    z-index: 2;
    opacity: 0;
    visibility: hidden;
    transform: translate3d(-50%, -135%, 0);
    transition: opacity 0.15s ease, visibility 0.15s ease;
    white-space: nowrap;
}
.sesna-carousel-floating-tooltip.is-visible {
    opacity: 1;
    visibility: visible;
}
.sesna-carousel-tooltip-icon {
    flex-shrink: 0;
}
@media (hover: none) or (pointer: coarse) {
    .sesna-carousel-floating-tooltip {
        display: none !important;
    }
}
</style>

<script>
/* ── Controlador nativo Vanilla JS del Carrusel con Barrido Horizontal ─ */
document.addEventListener("DOMContentLoaded", function() {
    var wrapper = document.querySelector('#homeCarousel');
    if (!wrapper) return;

    var track = wrapper.querySelector('.sesna-carousel-track');
    var slides = Array.from(wrapper.querySelectorAll('.sesna-carousel-slide'));
    var dots = Array.from(wrapper.querySelectorAll('.sesna-carousel-dot'));
    var prevBtn = wrapper.querySelector('.sesna-carousel-btn--prev');
    var nextBtn = wrapper.querySelector('.sesna-carousel-btn--next');

    if (!track || slides.length <= 1) return;

    var currentIndex = 0;
    var timer = null;
    var INTERVAL = 5000;
    var prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function goToSlide(index) {
        if (index < 0) {
            index = slides.length - 1;
        } else if (index >= slides.length) {
            index = 0;
        }

        // Desplazamiento horizontal continuo (Efecto de Barrido / Slide suave)
        track.style.transform = 'translate3d(-' + (index * 100) + '%, 0, 0)';

        slides.forEach(function(slide, idx) {
            var isActive = (idx === index);
            slide.classList.toggle('is-active', isActive);
            var link = slide.querySelector('.sesna-carousel-slide-link');
            if (link) {
                link.setAttribute('tabindex', isActive ? '0' : '-1');
            }
            if (isActive) {
                slide.removeAttribute('aria-hidden');
            } else {
                slide.setAttribute('aria-hidden', 'true');
            }
        });

        dots.forEach(function(dot, idx) {
            var isActive = (idx === index);
            dot.classList.toggle('is-active', isActive);
            dot.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });

        currentIndex = index;
    }

    function nextSlide() {
        goToSlide(currentIndex + 1);
    }

    function prevSlide() {
        goToSlide(currentIndex - 1);
    }

    function startAutoPlay() {
        if (prefersReducedMotion) return;
        stopAutoPlay();
        timer = setInterval(nextSlide, INTERVAL);
    }

    function stopAutoPlay() {
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
    }

    // Botones de navegación
    if (nextBtn) nextBtn.addEventListener('click', function() { nextSlide(); startAutoPlay(); });
    if (prevBtn) prevBtn.addEventListener('click', function() { prevSlide(); startAutoPlay(); });

    // Indicadores (dots)
    dots.forEach(function(dot) {
        dot.addEventListener('click', function() {
            var target = parseInt(dot.getAttribute('data-target-index'), 10);
            if (!isNaN(target)) {
                goToSlide(target);
                startAutoPlay();
            }
        });
    });

    // Soporte táctil / swipe móvil
    var touchStartX = 0;
    var touchCurrentX = 0;
    var isSwiping = false;
    var hasSwiped = false;

    wrapper.addEventListener('touchstart', function(e) {
        if (e.touches.length === 1) {
            touchStartX = e.touches[0].clientX;
            touchCurrentX = touchStartX;
            isSwiping = true;
            hasSwiped = false;
            stopAutoPlay();
        }
    }, { passive: true });

    wrapper.addEventListener('touchmove', function(e) {
        if (!isSwiping || e.touches.length !== 1) return;
        touchCurrentX = e.touches[0].clientX;
        if (Math.abs(touchStartX - touchCurrentX) > 10) {
            hasSwiped = true;
        }
    }, { passive: true });

    wrapper.addEventListener('touchend', function() {
        if (!isSwiping) return;
        isSwiping = false;
        var diffX = touchStartX - touchCurrentX;
        if (Math.abs(diffX) > 40) {
            if (diffX > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
        }
        startAutoPlay();
    });

    // Cancelar apertura accidental de enlaces si el gesto fue un swipe
    wrapper.querySelectorAll('.sesna-carousel-slide-link').forEach(function(link) {
        link.addEventListener('click', function(e) {
            if (hasSwiped) {
                e.preventDefault();
                e.stopPropagation();
                hasSwiped = false;
            }
        });
    });

    // Teclado
    wrapper.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            prevSlide();
            startAutoPlay();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
            startAutoPlay();
        }
    });

    // Accesibilidad: pausar al enfocar o pasar el ratón (WCAG 2.2.2)
    wrapper.addEventListener('mouseenter', stopAutoPlay);
    wrapper.addEventListener('mouseleave', function() {
        startAutoPlay();
        if (tooltip) tooltip.classList.remove('is-visible');
    });
    wrapper.addEventListener('focusin', stopAutoPlay);
    wrapper.addEventListener('focusout', startAutoPlay);

    // Tooltip flotante interactivo para slides con URL
    var tooltip = wrapper.querySelector('#sesnaCarouselTooltip');
    var isPointerFine = window.matchMedia && window.matchMedia('(hover: hover) and (pointer: fine)').matches;

    if (tooltip && isPointerFine) {
        wrapper.addEventListener('mousemove', function(e) {
            var activeSlide = slides[currentIndex];
            var link = activeSlide ? activeSlide.querySelector('.sesna-carousel-slide-link') : null;
            var onControls = e.target.closest('.sesna-carousel-btn, .sesna-carousel-indicators');

            if (link && !onControls) {
                var rect = wrapper.getBoundingClientRect();
                var x = e.clientX - rect.left;
                var y = e.clientY - rect.top;

                // Evitar que el tooltip se salga de los límites laterales o superiores
                var clampedX = Math.max(50, Math.min(x, rect.width - 50));
                var clampedY = Math.max(30, y);

                tooltip.style.left = clampedX + 'px';
                tooltip.style.top = clampedY + 'px';
                tooltip.classList.add('is-visible');
            } else {
                tooltip.classList.remove('is-visible');
            }
        });

        wrapper.addEventListener('mouseleave', function() {
            tooltip.classList.remove('is-visible');
        });
    }

    // Pausar si la pestaña no está visible
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            stopAutoPlay();
        } else {
            startAutoPlay();
        }
    });

    // Iniciar auto-play
    startAutoPlay();
});
</script>
<?php 
    wp_reset_postdata();
endif; 
?>
<!-- FIN: Carrusel Dinámico SESNA -->
