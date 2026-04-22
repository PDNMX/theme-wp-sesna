<?php


get_header();
?>


    <?php
        get_template_part( 'template-parts/header', 'blog' );
    ?>
<script>

$(document).ready(function(){
	$('html').animate({ scrollTop: $("#content").offset().top-20 }, "slow");	

});
</script> 
	<div class="container" id="content">
        <div class="row">
			<!--  <div class="col-lg-9 col-sm-12 order-lg-1 order-sm-2 order-2">  -->
            <div class="col-lg-9 col-sm-12">
                <!--  MAIN  -->
                <div class="blogEntriesList">

                    <?php

                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content/single', get_post_format() );


                    endwhile; // End of the loop.
                    ?>

                </div>
            </div>
			<!-- <div class="col-lg-3 col-sm-12 order-lg-2 order-sm-1 order-1"> -->
            <div class="col-lg-3 col-sm-12">

                <?php dynamic_sidebar( 'sidebar-1' ); ?>

                
            </div>
        </div>
    </div>


    <?php get_template_part( 'template-parts/content/related' ); ?>


<?php
get_footer();
