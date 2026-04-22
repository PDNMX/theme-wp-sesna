<div class="row" class="fila_sesion">
    <div class="col-lg-3 col-sm-12">
        <div class="boxC">
            <p class="tituloC"><span><?php the_field('numero_sesion') ?></span>SESIÓN <?php the_field('tipo_sesion') ?> </p>
            <p class="comiteC"><?php the_session_type( ); ?></p>
            <p class="fechaC"><span> <?php the_field('fecha_limite') ?> </span> </p>
        </div>
    </div>
    <div class="col-lg-9 col-sm-12">
        <div class="row listaSesion">
            <div class="col col-lg-3 col-sm-12">
            <p class="roboto"> Convocatoria</p>
            <a class="btn btn-light <?= get_field( 'convocatoria' )?'':'disabled' ?>" href='<?php the_file('convocatoria') ?>' role="button">Descarga <i class="fas fa-download"></i></a>
            </div>
            <div class="col col-lg-3 col-sm-12">
            <p class="roboto"> Orden del Día</p>
            <a class="btn btn-light <?= get_field( 'orden_del_dia' )?'':'disabled' ?>" href='<?php the_file('orden_del_dia') ?>' role="button">Descarga <i class="fas fa-download"></i></a>
            </div>

            <div class="col col-lg-3 col-sm-12">
            <p class="roboto"> Acta</p>
            <a class="btn btn-light <?= get_field( 'acta_firmada' )?'':'disabled' ?>" href='<?php the_file('acta_firmada') ?>' role="button">Descarga <i class="fas fa-download"></i></a>
            </div>
            <div class="col col-lg-3 col-sm-12">
            <p class="roboto"> Anexos</p>
            <input type="checkbox" class="panel" id="anexos<?php the_ID(); ?>"/>
            <label for="anexos<?php the_ID(); ?>" class="btn <?= ( have_rows('anexos') )?'':'disabled' ?>"  >
                <p class="closed">Ver Lista <i class="fas fa-list"></i></p>
                <p class="open">Cerrar <i class="fas fa-times"></i></p>
            </label>
            </div>


        </div>


        <div class="row container_acuerdo" id="container_anexos<?php the_ID(); ?>">
            <?php if( have_rows('anexos') ): ?>
                <?php while ( have_rows('anexos') ) : the_row(); ?>
                    <div class="col-sm-12 col-lg-6"><p> <i class="far fa-file-alt"></i> <?php the_sub_field('nombre'); ?></p></div>
                    <div class="col-sm-12 col-lg-3"><a class="btn btn-light" href="<?php the_file('archivo', true); ?>" role="button">Descarga <i class="fas fa-download"></i></a></div>
                <?php endwhile; ?>

                <div class="col-sm-12"><a class="btn btn-success" href="#" role="button">Descarga todos los archivos <i class="fas fa-download"></i></a></div>
            <?php else: ?>

            <div class="col-sm-12">No hay documentos</div>

            <?php endif; ?>


        </div>


        <div class="row" id="media_container">
            <div class="col col-lg-4 col-sm-12">
            <a href="#" class="btn btn-sesion launch-modal <?= (get_field( 'sesion_archivo' )||get_field( 'sesion_youtube' ))?'':'disabled' ?>" data-modal-id="modal-video_<?php the_ID(); ?>">
                <span class="video-link-text">Archivos Multimedia <i class="fas fa-play"></i></span>
            </a>
            </div>
            <div class="col col-lg-3 col-sm-12">
            <a href="<?php the_field('leer_sesion') ?>" target="_blank" class="btn btn-sesion  <?= (get_field( 'leer_sesion' ))?'':'disabled' ?>" >
                <span >Versión Estenográfica <i class="fas fa-eye"></i></span>
            </a>
            </div>
            <div class="col col-lg-5 col-sm-12">
            <a href="<?php the_file_all(); ?>" class="btn btn-success" >
                <span >Descarga todo el contenido <i class="fas fa-download"></i></span>
            </a>
            </div>


        </div>


        <div class="modal fade" id="modal-video_<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-video-label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">SESIÓN <?php the_field('tipo_sesion') ?> <?php the_field('numero_sesion') ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-video">
                            <div class="embed-responsive embed-responsive-16by9">

                                <?php if( get_field('tipo_reproductor') == 'Archivo' ): ?>

                                    <video width="320" height="240" controls>
                                        <source src="<?php the_field('sesion_archivo'); ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                <?php else: ?>

                                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="640.8" height="360" type="text/html" src="https://www.youtube.com/embed/<?php the_youtube_video_ID() ?>?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0"></iframe>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
