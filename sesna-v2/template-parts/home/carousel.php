<!-- INICIO: Carrusel Dinámico (CPT 'slider') -->
<?php
$slider_args = array(
    'post_type'      => 'slider',
    'posts_per_page' => -1, // Cambia este número si quieres un límite (ej. 5)
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
);
$slider_query = new WP_Query( $slider_args );

if ( $slider_query->have_posts() ) :
?>
<section class="sesna-carousel-section container-fluid px-0">
    <div id="homeCarousel" class="carousel slide sesna-carousel" data-bs-ride="carousel" data-bs-interval="4000">
    <!-- Indicadores -->
    <div class="carousel-indicators">
        <?php 
        $slide_index = 0;
        while ( $slider_query->have_posts() ) : $slider_query->the_post(); 
        ?>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="<?php echo $slide_index; ?>" <?php if ( $slide_index === 0 ) echo 'class="active" aria-current="true"'; ?> aria-label="Slide <?php echo $slide_index + 1; ?>"></button>
        <?php 
            $slide_index++;
        endwhile; 
        ?>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        <?php 
        $slide_index = 0;
        // Rebobinamos para usar la misma consulta
        $slider_query->rewind_posts();
        while ( $slider_query->have_posts() ) : $slider_query->the_post(); 
            $active_class = ( $slide_index === 0 ) ? 'active' : '';
            // Obtenemos la URL de la imagen destacada
            $image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        ?>
            <div class="carousel-item <?php echo esc_attr( $active_class ); ?>" data-bs-interval="4000">
                <?php if ( $image_url ) : ?>
                    <img src="<?php echo esc_url( $image_url ); ?>" class="d-block w-100" alt="<?php echo esc_attr( get_the_title() ); ?>">
                <?php else : ?>
                    <!-- Imagen de respaldo por si no se sube imagen destacada -->
                    <div class="fallback-img">
                        <span class="text-muted">Sin imagen destacada</span>
                    </div>
                <?php endif; ?>
                
                <?php 
                $show_text = get_post_meta( get_the_ID(), '_show_text_slider', true );
                if ( $show_text === '' ) $show_text = '1'; // Default: show
                
                if ( $show_text === '1' ) : 
                ?>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php the_title(); ?></h5>
                        <?php if ( has_excerpt() ) : ?>
                            <p><?php echo get_the_excerpt(); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php 
            $slide_index++;
        endwhile; 
        ?>
    </div>

    <!-- Controles -->
    <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="bootstrap-icons text-white" aria-hidden="true" style="font-size: 2.5rem;">
            <i class="bi bi-chevron-left"></i>
        </span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="bootstrap-icons text-white" aria-hidden="true" style="font-size: 2.5rem;">
            <i class="bi bi-chevron-right"></i>
        </span>
        <span class="visually-hidden">Siguiente</span>
    </button>
    </div>
</section>
<?php 
    wp_reset_postdata(); // Es importante resetear la consulta después del loop
endif; 
?>
<!-- FIN: Carrusel Dinámico -->

<script>
document.addEventListener("DOMContentLoaded", function() {
    var carouselContainer = document.querySelector('#homeCarousel');
    if (!carouselContainer) return;

    // 1. Intentar inicializar de forma natural con Bootstrap / jQuery
    try {
        if (typeof bootstrap !== 'undefined') {
            var carousel = new bootstrap.Carousel(carouselContainer, {
                interval: 4000,
                ride: 'carousel'
            });
            carousel.cycle();
        } else if (window.jQuery) {
            jQuery('#homeCarousel').carousel({
                interval: 4000,
                ride: 'carousel'
            });
        }
    } catch(e) {}

    // 2. Fallback robusto: Forzar el auto-play simulando un clic si el framework bloquea la autoejecución
    var autoPlayInterval;
    
    function startAutoPlay() {
        autoPlayInterval = setInterval(function() {
            var nextBtn = document.querySelector('#homeCarousel .carousel-control-next');
            if (nextBtn) {
                nextBtn.click();
            }
        }, 4000);
    }

    function stopAutoPlay() {
        clearInterval(autoPlayInterval);
    }

    // Iniciar autoplay
    startAutoPlay();

    // Pausar al poner el ratón encima (comportamiento estándar de los carruseles)
    carouselContainer.addEventListener('mouseenter', stopAutoPlay);
    carouselContainer.addEventListener('mouseleave', startAutoPlay);
});
</script>
