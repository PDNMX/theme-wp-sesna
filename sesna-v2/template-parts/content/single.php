<?php
/**
 * Template part para visualizar una entrada individual (single post)
 * Homologado con estándar SND v1.1.0 y página Prensa
 */
$categories    = get_the_category();
$posts_page_id = (int) get_option('page_for_posts');
$prensa_url    = $posts_page_id ? get_permalink($posts_page_id) : home_url('/prensa/');
$prensa_title  = $posts_page_id ? get_the_title($posts_page_id) : 'Noticias y actividades';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sesna-single-article' ); ?>>

    <div class="fila justify-content-center">
        <div class="columna__12 columna__10--lg columna__9--xl">

            <!-- Tarjeta del artículo (Homologada SND v1.1.0) -->
            <div class="sesna-single-card">

                <!-- Imagen destacada -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="sesna-single-card__img-wrap">
                        <?php the_post_thumbnail( 'large', [ 'class' => 'sesna-single-card__img', 'alt' => esc_attr( get_the_title() ) ] ); ?>
                    </div>
                <?php endif; ?>

                <!-- Encabezado: categoría, fecha y título -->
                <div class="sesna-single-card__header">
                    <div class="sesna-single-date-row">
                        <?php if ( $categories ) : $cat = $categories[0]; ?>
                            <a href="<?= esc_url( get_category_link( $cat->term_id ) ) ?>"
                               class="boton__primario boton--redondeado">
                                <i class="snd__icono snd-tag icono--16 mr--4" aria-hidden="true"></i>
                                <?= esc_html( $cat->name ) ?>
                            </a>
                        <?php endif; ?>
                        <span class="sesna-single-date color--neutro600 b1r">
                            <i class="snd__icono snd-calendar icono--16 mr--4" aria-hidden="true"></i>
                            <?php echo get_the_date( 'd / m / Y' ); ?>
                        </span>
                    </div>
                    <h1 class="sesna-single-title h2b patria color--pguinda600 mb--0"><?php the_title(); ?></h1>
                </div>

                <!-- Cuerpo: contenido -->
                <div class="sesna-single-card__body">

                    <div class="sesna-single-content entry-content b1r color--neutro800">
                        <?php the_content(); ?>
                    </div>

                    <!-- Archivos adjuntos (ACF) -->
                    <?php if ( function_exists( 'have_rows' ) && have_rows( 'files' ) ) : ?>
                        <div class="sesna-single-files">
                            <h3 class="sesna-single-files__title sh1b patria color--pguinda600 mb--12">
                                <i class="snd__icono snd-document--import icono--20 mr--8" aria-hidden="true"></i>Documentos adjuntos
                            </h3>
                            <ul class="sesna-single-files__list list-unstyled mb--0">
                                <?php while ( have_rows( 'files' ) ) : the_row(); ?>
                                    <li class="sesna-single-files__item mb--8">
                                        <a href="<?php the_sub_field( 'file' ); ?>"
                                           target="_blank" rel="noopener noreferrer"
                                           class="sesna-single-files__link b1r">
                                            <i class="snd__icono snd-document icono--16 mr--8" aria-hidden="true"></i>
                                            <?php the_sub_field( 'nombre' ); ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <hr class="sesna-single-divider my--32">

                    <!-- Compartir -->
                    <div class="sesna-single-share">
                        <span class="sesna-single-share__label b2sb color--neutro600">Compartir</span>
                        <a href="https://www.facebook.com/sharer.php?u=<?= urlencode( get_the_permalink() ) ?>"
                           onclick="window.open(this.href,'_blank','width=600,height=700'); return false;"
                           class="sesna-single-share__btn sesna-single-share__btn--fb"
                           aria-label="Compartir en Facebook">
                            <i class="snd__icono snd-snd-facebook icono--20" aria-hidden="true"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?= urlencode( get_the_permalink() ) ?>&text=<?= urlencode( get_the_title() ) ?>"
                           onclick="window.open(this.href,'_blank','width=600,height=300'); return false;"
                           class="sesna-single-share__btn sesna-single-share__btn--tw"
                           aria-label="Compartir en Twitter / X">
                            <i class="snd__icono snd-snd-x icono--20" aria-hidden="true"></i>
                        </a>
                        <a href="https://api.whatsapp.com/send?text=<?= urlencode( get_the_title() . ' — ' . get_the_permalink() ) ?>"
                           target="_blank" rel="noopener noreferrer"
                           class="sesna-single-share__btn sesna-single-share__btn--wa"
                           aria-label="Compartir por WhatsApp">
                            <i class="snd__icono snd-snd-whatsapp icono--20" aria-hidden="true"></i>
                        </a>
                    </div>

                    <!-- Categorías -->
                    <?php if ( $categories ) : ?>
                        <div class="sesna-single-cats">
                            <?php foreach ( $categories as $cat ) : ?>
                                <a href="<?= esc_url( get_category_link( $cat->term_id ) ) ?>"
                                   class="boton__secundario boton--redondeado">
                                    <?= esc_html( $cat->name ) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div><!-- /.sesna-single-card__body -->
            </div><!-- /.sesna-single-card -->

            <!-- Volver a noticias -->
            <nav class="sesna-single-nav mt--24" aria-label="Navegación de artículos">
                <a href="<?= esc_url( $prensa_url ) ?>"
                   class="boton__fantasma">
                    <i class="snd__icono snd-arrow--left icono--20 mr--8" aria-hidden="true"></i>Volver a <?php echo esc_html( $prensa_title ); ?>
                </a>
            </nav>

        </div>
    </div>

</article>
