<?php
/**
 * Template part para la sección de Noticias y Actividades
 */
?>
<section class="pt-5 pb-5 sna-noticias-section">
    <div class="container mt-5 mb-5 pb-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold font-patria sna-section-title sesna-section-heading">Noticias y <span class="text-burgundi">Actividades</span></h2>
        </div>
        
        <div class="row g-4 justify-content-center">
            <?php
            $args = array(
                'post_type'           => 'post',
                'posts_per_page'      => 3,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => 1,
                'category_name'       => 'comunicados-de-prensa',
            );
            $noticias_query = new WP_Query($args);

            if ($noticias_query->have_posts()) :
                while ($noticias_query->have_posts()) : $noticias_query->the_post();
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <a href="<?php the_permalink(); ?>" class="card h-100 border-0 sna-noticias-card position-relative text-decoration-none text-dark d-flex flex-column">
                            
                            <!-- Date Ribbon -->
                            <div class="sna-noticias-date-badge">
                                <span class="sna-noticias-date-day"><?php echo get_the_date('d'); ?></span>
                                <span class="sna-noticias-date-month"><?php echo get_the_date('M'); ?></span>
                            </div>

                            <!-- Imagen -->
                            <div class="sna-noticias-img-wrapper">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium_large', ['class' => 'w-100 h-100 sna-noticias-img']); ?>
                                <?php else : ?>
                                    <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted sna-noticias-img">
                                        <i class="bi bi-image fs-1"></i>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Contenido -->
                            <div class="card-body d-flex flex-column text-center px-3 pt-4 pb-2">
                                <h4 class="fw-bold mb-3 sna-noticias-title text-dark">
                                    <?php echo wp_trim_words(get_the_title(), 12, '...'); ?>
                                </h4>
                                <p class="text-muted mb-4 sna-noticias-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 35, '...'); ?>
                                </p>
                                <div class="mt-auto pb-3">
                                    <span class="text-decoration-none fw-bold fs-5 sna-noticias-link d-inline-flex align-items-center text-guinda">
                                        Leer más <i class="bi bi-arrow-right ms-2"></i>
                                    </span>
                                </div>
                            </div>

                        </a>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <div class="col-12 text-center">
                    <p class="text-muted">No hay noticias disponibles por el momento.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
