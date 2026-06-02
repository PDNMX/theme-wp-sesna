<article id="post-<?php the_ID(); ?>" <?php post_class( 'sesna-single-article' ); ?>>

    <div class="sesna-single-wrapper">
        <div class="container sesna-single-container">

            <!-- Breadcrumb -->
            <nav class="sesna-single-breadcrumb" aria-label="Ruta de navegación">
                <a href="<?= esc_url( home_url( '/' ) ) ?>">Inicio</a>
                <span aria-hidden="true">&rsaquo;</span>
                <a href="<?= esc_url( home_url( '/informacion/' ) ) ?>">Noticias</a>
                <span aria-hidden="true">&rsaquo;</span>
                <span class="current" aria-current="page"><?php echo esc_html( wp_trim_words( get_the_title(), 8, '…' ) ); ?></span>
            </nav>

            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-8">

                    <!-- Tarjeta del artículo -->
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
                                <?php
                                $categories = get_the_category();
                                if ( $categories ) :
                                    $cat = $categories[0];
                                ?>
                                    <a href="<?= esc_url( get_category_link( $cat->term_id ) ) ?>"
                                       class="sesna-single-cat">
                                        <i class="bi bi-tag-fill me-1" aria-hidden="true"></i>
                                        <?= esc_html( $cat->name ) ?>
                                    </a>
                                <?php endif; ?>
                                <span class="sesna-single-date">
                                    <i class="bi bi-calendar3 me-1" aria-hidden="true"></i>
                                    <?php echo get_the_date( 'd / m / Y' ); ?>
                                </span>
                            </div>
                            <h1 class="sesna-single-title"><?php the_title(); ?></h1>
                        </div>

                        <!-- Cuerpo: contenido -->
                        <div class="sesna-single-card__body">

                            <div class="sesna-single-content entry-content">
                                <?php the_content(); ?>
                            </div>

                            <!-- Archivos adjuntos (ACF) -->
                            <?php if ( function_exists( 'have_rows' ) && have_rows( 'files' ) ) : ?>
                                <div class="sesna-single-files">
                                    <h3 class="sesna-single-files__title">
                                        <i class="bi bi-paperclip me-2" aria-hidden="true"></i>Documentos adjuntos
                                    </h3>
                                    <ul class="sesna-single-files__list list-unstyled mb-0">
                                        <?php while ( have_rows( 'files' ) ) : the_row(); ?>
                                            <li class="sesna-single-files__item">
                                                <a href="<?php the_sub_field( 'file' ); ?>"
                                                   target="_blank" rel="noopener noreferrer"
                                                   class="sesna-single-files__link">
                                                    <i class="bi bi-file-earmark-text me-2" aria-hidden="true"></i>
                                                    <?php the_sub_field( 'nombre' ); ?>
                                                </a>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <hr class="sesna-single-divider">

                            <!-- Compartir -->
                            <div class="sesna-single-share">
                                <span class="sesna-single-share__label">Compartir</span>
                                <a href="https://www.facebook.com/sharer.php?u=<?= urlencode( get_the_permalink() ) ?>"
                                   onclick="window.open(this.href,'_blank','width=600,height=700'); return false;"
                                   class="sesna-single-share__btn sesna-single-share__btn--fb"
                                   aria-label="Compartir en Facebook">
                                    <i class="bi bi-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=<?= urlencode( get_the_permalink() ) ?>&text=<?= urlencode( get_the_title() ) ?>"
                                   onclick="window.open(this.href,'_blank','width=600,height=300'); return false;"
                                   class="sesna-single-share__btn sesna-single-share__btn--tw"
                                   aria-label="Compartir en Twitter / X">
                                    <i class="bi bi-twitter-x" aria-hidden="true"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?text=<?= urlencode( get_the_title() . ' — ' . get_the_permalink() ) ?>"
                                   target="_blank" rel="noopener noreferrer"
                                   class="sesna-single-share__btn sesna-single-share__btn--wa"
                                   aria-label="Compartir por WhatsApp">
                                    <i class="bi bi-whatsapp" aria-hidden="true"></i>
                                </a>
                            </div>

                            <!-- Categorías -->
                            <?php if ( $categories ) : ?>
                                <div class="sesna-single-cats">
                                    <?php foreach ( $categories as $cat ) : ?>
                                        <a href="<?= esc_url( get_category_link( $cat->term_id ) ) ?>"
                                           class="sesna-single-cats__tag">
                                            <?= esc_html( $cat->name ) ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                        </div><!-- /.sesna-single-card__body -->
                    </div><!-- /.sesna-single-card -->

                    <!-- Volver a noticias -->
                    <nav class="sesna-single-nav" aria-label="Navegación de artículos">
                        <a href="<?= esc_url( home_url( '/informacion/' ) ) ?>"
                           class="sesna-single-nav__back">
                            <i class="bi bi-arrow-left me-2" aria-hidden="true"></i>Volver a Noticias
                        </a>
                    </nav>

                </div>
            </div>

        </div><!-- /.container -->
    </div><!-- /.sesna-single-wrapper -->

</article>
