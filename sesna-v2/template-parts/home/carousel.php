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

        <!-- Slides Container -->
        <div class="sesna-carousel-slides position-relative w-100" style="min-height: 240px; background-color: var(--color-burgundi-dark, #4a0d23);">
            <?php 
            $slide_index = 0;
            while ( $slider_query->have_posts() ) : $slider_query->the_post(); 
                $is_first = ( $slide_index === 0 );
                $image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                $show_text = get_post_meta( get_the_ID(), '_show_text_slider', true );
                if ( $show_text === '' ) $show_text = '1';
            ?>
                <div class="sesna-carousel-slide<?php if ( $is_first ) echo ' is-active'; ?>"
                     role="group"
                     aria-roledescription="slide"
                     aria-label="<?php echo esc_attr( sprintf( 'Diapositiva %d de %d: %s', $slide_index + 1, $total_slides, get_the_title() ) ); ?>"
                     data-index="<?php echo $slide_index; ?>"
                     <?php if ( ! $is_first ) echo 'aria-hidden="true"'; ?>>
                    
                    <?php if ( $image_url ) : ?>
                        <img src="<?php echo esc_url( $image_url ); ?>"
                             class="sesna-carousel-img w-100 d-block"
                             alt="<?php echo esc_attr( get_the_title() ); ?>"
                             loading="<?php echo $is_first ? 'eager' : 'lazy'; ?>">
                    <?php else : ?>
                        <div class="fallback-img d-flex align-items-center justify-content-center w-100" style="height: 380px; background: #611232;">
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

                </div>
            <?php 
                $slide_index++;
            endwhile; 
            ?>
        </div>

        <!-- Indicadores -->
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

    </div>
</section>

<style>
/* ── Estilos nativos del Carrusel SND v1.1.0 ──────────────── */
.sesna-carousel-wrapper {
    position: relative;
    width: 100%;
}
.sesna-carousel-slides {
    position: relative;
    width: 100%;
    overflow: hidden;
}
.sesna-carousel-slide {
    display: none;
    width: 100%;
    opacity: 0;
    transition: opacity 0.6s ease-in-out;
}
.sesna-carousel-slide.is-active {
    display: block;
    opacity: 1;
}
.sesna-carousel-img {
    width: 100%;
    height: auto;
    object-fit: cover;
    max-height: 520px;
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
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    border: 1px solid rgba(0, 0, 0, 0.3);
    padding: 0;
    cursor: pointer;
    transition: all 0.3s ease;
}
.sesna-carousel-dot.is-active {
    width: 32px;
    border-radius: 6px;
    background: #fff;
    box-shadow: 0 0 6px rgba(0,0,0,0.4);
}
@media (prefers-reduced-motion: reduce) {
    .sesna-carousel-slide {
        transition: none !important;
    }
}
</style>

<script>
/* ── Controlador nativo Vanilla JS del Carrusel (sin Bootstrap/jQuery) ─ */
document.addEventListener("DOMContentLoaded", function() {
    var wrapper = document.querySelector('#homeCarousel');
    if (!wrapper) return;

    var slides = Array.from(wrapper.querySelectorAll('.sesna-carousel-slide'));
    var dots = Array.from(wrapper.querySelectorAll('.sesna-carousel-dot'));
    var prevBtn = wrapper.querySelector('.sesna-carousel-btn--prev');
    var nextBtn = wrapper.querySelector('.sesna-carousel-btn--next');

    if (slides.length <= 1) return;

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

        slides.forEach(function(slide, idx) {
            var isActive = (idx === index);
            slide.classList.toggle('is-active', isActive);
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

    // Botones
    if (nextBtn) nextBtn.addEventListener('click', function() { nextSlide(); startAutoPlay(); });
    if (prevBtn) prevBtn.addEventListener('click', function() { prevSlide(); startAutoPlay(); });

    // Dots
    dots.forEach(function(dot) {
        dot.addEventListener('click', function() {
            var target = parseInt(dot.getAttribute('data-target-index'), 10);
            if (!isNaN(target)) {
                goToSlide(target);
                startAutoPlay();
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

    // Accesibilidad: pausar al enfocar o pasar el ratón
    wrapper.addEventListener('mouseenter', stopAutoPlay);
    wrapper.addEventListener('mouseleave', startAutoPlay);
    wrapper.addEventListener('focusin', stopAutoPlay);
    wrapper.addEventListener('focusout', startAutoPlay);

    // Pausar si la pestaña no está visible
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            stopAutoPlay();
        } else {
            startAutoPlay();
        }
    });

    // Iniciar
    startAutoPlay();
});
</script>
<?php 
    wp_reset_postdata();
endif; 
?>
<!-- FIN: Carrusel Dinámico SESNA -->
