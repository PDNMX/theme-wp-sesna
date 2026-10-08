<?php
/**
 * Template part para la sección de Noticias y Actividades
 */
?>
<section class="pt--56 pb--56 sna-noticias-section">
    <div class="contenedor mt--48 mb--48 pb--32">
        <div class="fila justify-content-center mb--48">
            <div class="columna__8--md text-center">
                <h2 class="h2b patria sna-section-title sesna-section-heading">Noticias y <span class="color--pguinda600">Actividades</span></h2>
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="b1sb color--pguinda600 sna-entradas-archive-link">
                    Ver todas las noticias clasificadas <svg class="ms-1" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
                </a>
            </div>
        </div>
        
        <div class="fila gap--24 justify-content-center">
            <?php
            $args = array(
                'post_type'           => 'post',
                'posts_per_page'      => 3,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => 1,
            );
            $noticias_query = new WP_Query($args);

            if ($noticias_query->have_posts()) :
                while ($noticias_query->have_posts()) : $noticias_query->the_post();
                    ?>
                    <div class="columna__4--lg columna__6--md">
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
                                        <svg class="fs-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
  <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/></svg>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Contenido -->
                            <div class="card-body d-flex flex-column text-center px-3 pt-4 pb-2">
                                <h3 class="sh0b mb-3 sna-noticias-title color--neutro800">
                                    <?php echo wp_trim_words(get_the_title(), 12, '...'); ?>
                                </h3>
                                <p class="b1r color--neutro600 mb-4 sna-noticias-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 35, '...'); ?>
                                </p>
                                <div class="mt-auto pb-3">
                                    <span class="sh1b color--pguinda600 text-decoration-none sna-noticias-link d-inline-flex align-items-center">
                                        Leer más <svg class="ms-2" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
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
                <div class="col-100 text-center">
                    <p class="b1r color--neutro600">No hay noticias disponibles por el momento.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
