<?php
    
    if( isset( $_GET['categoria'] ) && !empty( $_GET['categoria'] ) ){
        $categoria = $_GET['categoria'] . ',';
        $categoria_array = explode( ',', $_GET['categoria'] );
    }else{
        $categoria_array = [];
        $categoria = '';
    }


    function cmp($a, $b){        
        return strcmp(eliminar_tildes($a->name), eliminar_tildes($b->name));
    }

    function eliminar_tildes($cadena){
        $cadena = str_replace(
            array('á', 'ó', 'é', 'í', 'ú'),
            array('a', 'o', 'e', 'i', 'u'),
            strtolower($cadena)
        );
        $cadena = str_replace(
            array('Á', 'Ó', 'É', 'Í', 'Ú'),
            array('a', 'o', 'e', 'i', 'u'),
            strtolower($cadena)
        );
        return $cadena;
    }

?>

<div class="blogHeaderContainer">
    <div class="d-flex justify-content-center align-items-center">
        <div class="p-2">
        <h1 class="sentence">SESNA <b>INFORMA</b></h1>
        <p><b>Documentos, estudios,</b><br>datos y noticias</p>
        </div>
    </div>
    </div>


    <!--   CONTAINER BLOG RELATED  -->
    <div class="container" id="etiquetasContainer">
        <p class="tituloEtiquetas">Visualiza las notas más recientes o selecciona la categoría de tu preferencia:</p>


        <div class="d-flex flex-wrap justify-content-center align-content-center etiquetasContainer">


            <?php 
            
            $cats = get_categories(array(
                'orderby'                  => 'slug',
                'order'                    => 'ASC',
                'hide_empty' => false,
                'number' => 0,
            )); 

            usort($cats, "cmp");

            
            ?>


            <?php for( $i = 0; $i < 8 ;$i++ ): $cat = $cats[$i]; ?>
                <?php if( in_array($cat->slug, $categoria_array) ):?>
                    <div class="p-2 blog-category"><a href="<?php bloginfo('url')?>/informacion?categoria=<?= implode(',', array_diff($categoria_array, array($cat->slug)) ) ?>" data-cat="<?= $cat->slug ?>"><span class="active"><?= $cat->name . ' ('.$cat->count.')'?></span></a></div>
                <?php else: ?>
                    <div class="p-2 blog-category"><a href="<?php bloginfo('url')?>/informacion?categoria=<?= $categoria.$cat->slug ?>" data-cat="<?= $cat->slug ?>"><span class=""><?= $cat->name . ' ('.$cat->count.')' ?></span></a></div>
                <?php endif; ?>
            <?php endfor; ?>

        

        </div>

        <div class="collapse" id="collapseExample">
            <div class="d-flex flex-wrap justify-content-center align-content-center etiquetasContainer">

                

                <?php for( $i = 8; $i < sizeof($cats);$i++ ): $cat = $cats[$i]; ?> 

                    <?php if( in_array($cat->slug, $categoria_array) ):?>
                        <div class="p-2 blog-category"><a href="<?php bloginfo('url')?>/informacion?categoria=<?= implode(',', array_diff($categoria_array, array($cat->slug)) ) ?>" data-cat="<?= $cat->slug ?>"><span class="active"><?= $cat->name . ' ('.$cat->count.')' ?></span></a></div>
                    <?php else: ?>
                        <div class="p-2 blog-category"><a href="<?php bloginfo('url')?>/informacion?categoria=<?= $categoria.$cat->slug ?>" data-cat="<?= $cat->slug ?>"><span class=""><?= $cat->name . ' ('.$cat->count.')' ?></span></a></div>
                    <?php endif; ?>

                    
                <?php endfor; ?>

            </div>
        </div>


        <hr class="divisor">
        <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <img src="<?php bloginfo('stylesheet_directory') ?>/img/blog/ojo.png"/>
        </button>
        <p class="tituloEtiquetas">VER TODAS LAS CATEGORÍAS</p>





    </div>