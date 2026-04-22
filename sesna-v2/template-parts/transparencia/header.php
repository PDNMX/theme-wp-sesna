<div class="transparenciaHeader">
    <div class="container">
      <p class="titulo">RENDICIÓN DE CUENTAS</p>
      <p class="dependencia"><?php the_title_transparencia(); ?></p>
      <p class="subtitulo"><?php the_field('subtitulo'); ?></p>


      <div class="row">
        
      <?php

        $items = wp_get_nav_menu_items('transparencia');

        foreach( $items as $item ):

        ?>

            <div class="col <?= (get_the_ID() == $item->object_id)?'active':'' ?>" style="padding-left:0px; padding-right: 0px">
                <a href="<?= $item->url ?>" target="<?= $item->target ?>">
                <div class="circleContainer">
                    <div class="d-flex align-self-center justify-content-center iconContainer">
                        <div class="p-2">
                        
                            <?php the_field('icono', $item) ?>
                        </div>
                    </div><!--    ICON CONTAINER-->
                </div><!--    circle container  -->
                <p class="tituloTransparencia"><?= $item->title ?></p>
                </a>
            </div> <!--   COL-2 -->

        <?php
        endforeach;
        ?>
        
      </div>

    </div>
</div>


