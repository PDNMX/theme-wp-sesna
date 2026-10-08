<?php
/**
 * Template part para la sección de Noticias y Actividades
 */
?>
<section class="pt--48 pb--48 sna-noticias-section">
    <div class="contenedor mt--48 mb--48 pb--24">
        <div class="fila justify-content-center mb--48">
            <div class="columna__12 columna__8--md texto--centro">
                <h2 class="peso--negrita font-patria sna-section-title sesna-section-heading">Noticias y <span class="color--pguinda600">Actividades</span></h2>
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="boton__primario boton--redondeado">
                    Ver todas las noticias clasificadas
                </a>
            </div>
        </div>

        <div class="fila justify-content-center">
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
                    <div class="columna__12 columna__6--md columna__4--lg">
                        <a href="<?php the_permalink(); ?>" class="posicion--relativa ancho-minimo--0 alto--100 borde--ninguno sna-noticias-card decoracion--ninguna color--neutro800 muestra--flex flex-direction-column">
                            
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
                                    <div class="ancho--100 alto--100 fondo--neutro200 muestra--flex align-items-center justify-content-center color--neutro600 tamano--secundario sna-noticias-img">
                                        <i class="snd snd-image tamano--1" aria-hidden="true"></i>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Contenido -->
                            <div class="flex--1-auto muestra--flex flex-direction-column texto--centro px--16 pt--24 pb--8">
                                <h3 class="h4 peso--negrita mb--16 sna-noticias-title color--neutro800">
                                    <?php echo wp_trim_words(get_the_title(), 12, '...'); ?>
                                </h3>
                                <p class="color--neutro600 tamano--secundario mb--24 sna-noticias-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 35, '...'); ?>
                                </p>
                                <div class="mt--auto pb--16">
                                    <span class="decoracion--ninguna peso--negrita tamano--5 sna-noticias-link muestra--flex-linea align-items-center color--pguinda600">
                                        Leer más
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
                <div class="columna__12 texto--centro">
                    <p class="color--neutro600 tamano--secundario">No hay noticias disponibles por el momento.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
