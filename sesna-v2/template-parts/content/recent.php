
<div class="informacionRecienteContainer">
    <div class="contenedor">
        <div class="d-flex justify-content-center">
        <p class="notasRelacionadas">INFORMACIÓN <b>RECIENTE</b></p>
        </div>

        <div class="fila gap--24">


        <?php 

            

            $args=array(
                'posts_per_page'=> 3,
            );

            $cat = get_field('categoria');

            if( !empty( $cat ) ){
                $args['cat'] = $cat;
            }
    
            $my_query = new wp_query( $args );
        
        ?>
        
        <?php if( $my_query->have_posts() ): ?>
            <?php while( $my_query->have_posts() ) : $my_query->the_post(); ?>
            
                <div class="col-100 columna__4--md columna__4--lg">
                    <a href="<?php the_permalink(); ?>">
                    <div class="thumbnailContainer">

                    <img src="<?php the_thumbnail_photo('thumb-medium'); ?>" class="thumbnail">

                    </div>
                    <div class="d-flex tituloBox">

                        <div class="p-2"><img src="<?php bloginfo('stylesheet_directory') ?>/img/blog/entrada_<?= get_post_format() ?>.png" alt="lineas"></div>
                        <div class="p-2"><p class="titulo"><?php the_title(); ?></p></div>
                    </div>
                    </a>
                </div>
            <?php endwhile; wp_reset_query(); ?>
        <?php else: ?>

        <div class="col-100 text-center">
            NO HAY NOTAS RELACIONADAS
        </div>

        <?php endif; ?>

        </div>
    </div>

 <div class="contenedor btnContainer">
    <div class="fila">
        <div class="col-100 columna__6--md">
          <a href="/informacion"><img class="btn_info" src="<?php bloginfo('stylesheet_directory') ?>/img/transparencia/btn_info.png"></a>
        </div>

    </div>
    </div> 
</div>
