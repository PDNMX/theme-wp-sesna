<div class="fila_sesion reticulaGrid__12">
    <div class="columna__12 columna__3--lg">
        <div class="boxC">
            <p class="tituloC"><span><?php the_field('numero_sesion') ?></span>SESIÓN <?php the_field('tipo_sesion') ?> </p>
            <p class="comiteC"><?php the_session_type( ); ?></p>
            <p class="fechaC"><span> <?php the_field('fecha_limite') ?> </span> </p>
        </div>
    </div>
    <div class="columna__12 columna__9--lg">
        <div class="reticulaGrid__12 listaSesion">
            <div class="columna__12 columna__3--lg">
            <p class="roboto"> Convocatoria</p>
            <a class="boton__secundario <?= get_field( 'convocatoria' )?'':'disabled' ?>" href='<?php the_file('convocatoria') ?>' role="button">Descarga <i class="snd__icono snd-download icono--16" aria-hidden="true"></i></a>
            </div>
            <div class="columna__12 columna__3--lg">
            <p class="roboto"> Orden del Día</p>
            <a class="boton__secundario <?= get_field( 'orden_del_dia' )?'':'disabled' ?>" href='<?php the_file('orden_del_dia') ?>' role="button">Descarga <i class="snd__icono snd-download icono--16" aria-hidden="true"></i></a>
            </div>

            <div class="columna__12 columna__3--lg">
            <p class="roboto"> Acta</p>
            <a class="boton__secundario <?= get_field( 'acta_firmada' )?'':'disabled' ?>" href='<?php the_file('acta_firmada') ?>' role="button">Descarga <i class="snd__icono snd-download icono--16" aria-hidden="true"></i></a>
            </div>
            <div class="columna__12 columna__3--lg">
            <p class="roboto"> Anexos</p>
            <input type="checkbox" class="panel" id="anexos<?php the_ID(); ?>"/>
            <label for="anexos<?php the_ID(); ?>" class="btn <?= ( have_rows('anexos') )?'':'disabled' ?>"  >
                <p class="closed">Ver Lista <i class="snd__icono snd-list icono--16" aria-hidden="true"></i></p>
                <p class="open">Cerrar <i class="snd__icono snd-close icono--16" aria-hidden="true"></i></p>
            </label>
            </div>


        </div>


        <div class="reticulaGrid__12 container_acuerdo" id="container_anexos<?php the_ID(); ?>">
            <?php if( have_rows('anexos') ): ?>
                <?php while ( have_rows('anexos') ) : the_row(); ?>
                    <div class="columna__12 columna__6--lg"><p> <i class="snd__icono snd-document icono--16" aria-hidden="true"></i> <?php the_sub_field('nombre'); ?></p></div>
                    <div class="columna__12 columna__3--lg"><a class="boton__secundario" href="<?php the_file('archivo', true); ?>" role="button">Descarga <i class="snd__icono snd-download icono--16" aria-hidden="true"></i></a></div>
                <?php endwhile; ?>

                <div class="columna__12"><a class="boton__primario" href="#" role="button">Descarga todos los archivos <i class="snd__icono snd-download icono--16" aria-hidden="true"></i></a></div>
            <?php else: ?>

            <div class="columna__12">No hay documentos</div>

            <?php endif; ?>


        </div>


        <div class="reticulaGrid__12" id="media_container">
            <div class="columna__12 columna__4--lg">
            <a href="#" class="btn btn-sesion launch-modal <?= (get_field( 'sesion_archivo' )||get_field( 'sesion_youtube' ))?'':'disabled' ?>" data-modal-id="modal-video_<?php the_ID(); ?>">
                <span class="video-link-text">Archivos Multimedia <i class="snd__icono snd-play icono--16" aria-hidden="true"></i></span>
            </a>
            </div>
            <div class="columna__12 columna__3--lg">
            <a rel="noopener" href="<?php the_field('leer_sesion') ?>" target="_blank" class="btn btn-sesion  <?= (get_field( 'leer_sesion' ))?'':'disabled' ?>" >
                <span >Versión Estenográfica <i class="snd__icono snd-view icono--16" aria-hidden="true"></i></span>
            </a>
            </div>
            <div class="columna__12 columna__5--lg">
            <a href="<?php the_file_all(); ?>" class="boton__primario" >
                <span >Descarga todo el contenido <i class="snd__icono snd-download icono--16" aria-hidden="true"></i></span>
            </a>
            </div>


        </div>


        <div class="modal tx-pdf-modal snd-modal" id="modal-video_<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-video-label-<?php the_ID(); ?>">
            <div class="modal-dialog" role="document" style="max-width: 900px !important; margin: 5vh auto !important;">
                <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="modal-header bg-white border-0 py-4 px-4 position-relative d-flex align-items-center justify-content-between">
                        <h5 class="modal-title h5b patria mb-0" id="modal-video-label-<?php the_ID(); ?>" style="color: var(--color-burgundi);">SESIÓN <?php the_field('tipo_sesion') ?> <?php the_field('numero_sesion') ?></h5>
                        <button type="button" class="boton__fantasma p-2 rounded-circle" data-modal-dismiss aria-label="Cerrar modal">
                            <i class="snd__icono snd-close icono--20" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="modal-body p-0 bg-dark position-relative" style="height: 65vh; min-height: 400px;">
                        <div class="modal-video h-100">
                            <div class="embed-responsive embed-responsive-16by9 h-100">

                                <?php if( get_field('tipo_reproductor') == 'Archivo' ): ?>

                                    <video width="320" height="240" controls class="w-100 h-100">
                                        <source src="<?php the_field('sesion_archivo'); ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                <?php else: ?>

                                    <iframe class="w-100 h-100 border-0" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" type="text/html" src="https://www.youtube.com/embed/<?php the_youtube_video_ID() ?>?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0" allowfullscreen></iframe>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
