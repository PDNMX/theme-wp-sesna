<article id="post-<?php the_ID(); ?>" <?php post_class( 'sesna-single-article' ); ?>>

    <div class="sesna-single-wrapper">
        <div class="contenedor sesna-single-container">

            <!-- Breadcrumb -->
            <nav class="sesna-single-breadcrumb" aria-label="Ruta de navegación">
                <a href="<?= esc_url( home_url( '/' ) ) ?>">Inicio</a>
                <span aria-hidden="true">&rsaquo;</span>
                <a href="<?= esc_url( home_url( '/informacion/' ) ) ?>">Noticias</a>
                <span aria-hidden="true">&rsaquo;</span>
                <span class="current" aria-current="page"><?php echo esc_html( wp_trim_words( get_the_title(), 8, '…' ) ); ?></span>
            </nav>

            <div class="fila justify-content-center">
                <div class="columna__9--lg columna__8--xl">

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
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="me-1"><path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.41l9 9c.36.36.86.58 1.41.58s1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41s-.22-1.05-.59-1.41zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"/></svg>
                                        <?= esc_html( $cat->name ) ?>
                                    </a>
                                <?php endif; ?>
                                <span class="sesna-single-date">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="me-1"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z"/></svg>
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
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="me-2"><path d="M16.5 6v11.5c0 2.21-1.79 4-4 4s-4-1.79-4-4V5a2.5 2.5 0 0 1 5 0v10.5c0 .55-.45 1-1 1s-1-.45-1-1V6H10v9.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5V5c0-2.21-1.79-4-4-4S7 2.79 7 5v12.5c0 3.04 2.46 5.5 5.5 5.5s5.5-2.46 5.5-5.5V6h-1.5z"/></svg>Documentos adjuntos
                                    </h3>
                                    <ul class="sesna-single-files__list list-unstyled mb-0">
                                        <?php while ( have_rows( 'files' ) ) : the_row(); ?>
                                            <li class="sesna-single-files__item">
                                                <a href="<?php the_sub_field( 'file' ); ?>"
                                                   target="_blank" rel="noopener noreferrer"
                                                   class="sesna-single-files__link">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="me-2"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
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
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"/></svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=<?= urlencode( get_the_permalink() ) ?>&text=<?= urlencode( get_the_title() ) ?>"
                                   onclick="window.open(this.href,'_blank','width=600,height=300'); return false;"
                                   class="sesna-single-share__btn sesna-single-share__btn--tw"
                                   aria-label="Compartir en Twitter / X">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                <a href="https://api.whatsapp.com/send?text=<?= urlencode( get_the_title() . ' — ' . get_the_permalink() ) ?>"
                                   target="_blank" rel="noopener noreferrer"
                                   class="sesna-single-share__btn sesna-single-share__btn--wa"
                                   aria-label="Compartir por WhatsApp">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 2C6.47 2 1.969 6.501 1.969 12.062c0 1.776.465 3.511 1.348 5.044L2 22l5.056-1.326c1.488.805 3.167 1.23 4.887 1.23h.001c5.56 0 10.061-4.501 10.061-10.062C22.005 6.282 17.531 2 12.031 2zm0 18.23h-.001c-1.503 0-2.977-.404-4.269-1.168l-.306-.182-3.175.833.847-3.096-.2-.318A8.328 8.328 0 0 1 3.654 12.06c0-4.636 3.774-8.411 8.413-8.411 2.247 0 4.359.876 5.948 2.467 1.588 1.59 2.463 3.702 2.463 5.952 0 4.638-3.775 8.412-8.41 8.412h-.037zm4.618-6.302c-.253-.127-1.498-.74-1.729-.824-.23-.085-.399-.127-.568.127-.168.253-.654.824-.802.993-.148.169-.296.19-.549.063-2.12-.996-3.418-1.92-4.664-3.567-.132-.175.14-.148.428-.602l.142-.253c.063-.127.032-.238-.016-.333-.047-.095-.568-1.37-.777-1.877-.204-.493-.41-.426-.568-.434-.148-.008-.317-.008-.486-.008s-.444.063-.676.317c-.232.253-.887.866-.887 2.112s.908 2.45 1.035 2.619c.127.169 1.785 2.724 4.325 3.82 1.83.791 2.502.852 3.327.714.896-.15 1.498-.612 1.709-1.204.211-.592.211-1.098.148-1.204-.063-.106-.232-.169-.485-.296z"/></svg>
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
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="me-2"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>Volver a Noticias
                        </a>
                    </nav>

                </div>
            </div>

        </div><!-- /.container -->
    </div><!-- /.sesna-single-wrapper -->

</article>
