<?php


get_header();
?>


    <?php
        get_template_part( 'template-parts/header', 'blog' );
    ?>



    <!--    LISTA DE ENTRADAS Y SIDEBAR  -->
    <div class="container" id="content">
        <div class="row">
          <div class="col-lg-9 col-sm-12 order-lg-1 order-sm-2 order-2">
            <!--  MAIN  -->
            
            <div class="blogEntriesList" data-search="<?= get_search_query() ?>">

                



              
            </div>  <!-- blog entries list  -->

            <div class="row" >
                <div class="col-12 loadMore" id="btn_load_more">
                  
                    <p>Cargar notas anteriores <i class="fas fa-redo-alt"></i></p>
                </div>
            </div>




          </div><!--  col-lg-9 col-sm-12 order-lg-1 order-sm-2   -->
          <div class="col-lg-3 col-sm-12 order-lg-2 order-sm-1 order-1">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
          </div>
        </div>
      </div>


<?php
get_footer();
