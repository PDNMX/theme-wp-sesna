<?php
    
    
    
    $cat_ids = array();

    $cats = get_the_category();
    if ($cats){
        foreach($cats as $individual_cat){
            $cat_ids[] = $individual_cat->term_id;
        }
    }
    $args=array(
        //'cat__in' => $cat_ids,
        'post__not_in' => array(get_the_ID()),
        'posts_per_page'=> 3, // Número de entradas relacionadas a mostrar.
        //'caller_get_posts'=>1
    );
    
    $my_query = new wp_query( $args );

?>

<div class="relatedNotes">
    <div class="container">
        <div class="d-flex justify-content-center">
            <p class="notasRelacionadas">NOTAS <b>RELACIONADAS</b></p>
        </div>

        <div class="row">


        <?php while( $my_query->have_posts() ) : $my_query->the_post(); ?>
        
            <div class="col-12 col-lg-4 col-md-4">
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
        


            

        </div>
    </div>
</div>