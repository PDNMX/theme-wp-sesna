<article id="post-<?php the_ID(); ?>" <?php post_class( 'sesna-single-article' ); ?>>

    <div class="sesna-single-wrapper">
        <div class="contenedor sesna-single-container">

            <!-- Breadcrumb -->
            <nav class="cp-breadcrumb" aria-label="Ruta de navegación">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="<?= esc_url( home_url( '/' ) ) ?>"><i class="snd__icono snd-home icono--16" aria-hidden="true"></i> Inicio</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= esc_url( home_url( '/noticias-y-actividades/' ) ) ?>">Noticias</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo esc_html( wp_trim_words( get_the_title(), 8, '…' ) ); ?></li>
                </ol>
            </nav>

            <div class="fila justify-content-center">
                <div class="columna__12 columna__9--lg columna__8--xl">

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
                                       class="boton__primario boton--redondeado">
                                        <i class="snd__icono snd-tag icono--16 me-1" aria-hidden="true"></i>
                                        <?= esc_html( $cat->name ) ?>
                                    </a>
                                <?php endif; ?>
                                <span class="sesna-single-date">
                                    <i class="snd__icono snd-calendar icono--16 me-1" aria-hidden="true"></i>
                                    <?php echo get_the_date( 'd / m / Y' ); ?>
                                </span>
                            </div>
                            <h1 class="sesna-single-title h1b patria"><?php the_title(); ?></h1>
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
                                        <i class="snd__icono snd-document--import icono--20 me-2" aria-hidden="true"></i>Documentos adjuntos
                                    </h3>
                                    <ul class="sesna-single-files__list list-unstyled mb-0">
                                        <?php while ( have_rows( 'files' ) ) : the_row(); ?>
                                            <li class="sesna-single-files__item">
                                                <a href="<?php the_sub_field( 'file' ); ?>"
                                                   target="_blank" rel="noopener noreferrer"
                                                   class="sesna-single-files__link">
                                                    <i class="snd__icono snd-document icono--16 me-2" aria-hidden="true"></i>
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
                    <nav class="sesna-single-nav" aria-label="Navegación de artículos">
                        <a href="<?= esc_url( home_url( '/noticias-y-actividades/' ) ) ?>"
                           class="sesna-single-nav__back">
                            <i class="snd__icono snd-arrow--left icono--16 me-2" aria-hidden="true"></i>Volver a Noticias
                        </a>
                    </nav>

                </div>
            </div>

        </div><!-- /.container -->
    </div><!-- /.sesna-single-wrapper -->

</article>
