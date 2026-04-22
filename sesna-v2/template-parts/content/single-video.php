<div class="blogEntriesList">
    <div class="entryContainer2">
        <div class="thumbnailContainer">
            <?php if( has_post_thumbnail() ): ?>
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" class="featured">
            <?php else: ?>
                <img class="featured" src="<?php bloginfo('stylesheet_directory') ?>/img/blog/featuredMultimedia.jpg" alt="featured"/>
            <?php endif; ?>
        </div>
        <h1 class="tituloEntry"><?php the_title(); ?></h1>
        <div class="d-flex">
            <div class="p-2"><img src="<?php bloginfo('stylesheet_directory') ?>/img/blog/entrada_multimedia.png" alt="lineas"></div>
            <div class="p-2"><p class="fecha"><?php the_date('d / m / Y') ?></p></div>
            <div class="p-2"><a class="social" href="http://www.facebook.com/sharer.php?u=<?= urldecode(get_the_permalink())?>" onclick="window.open(this.href, 'facebookwindow','left=20,top=20,width=600,height=700,toolbar=0,resizable=1'); return false;"><i class="fab fa-facebook"></i></a></div>
            <div class="p-2"><a class="social" href="http://twitter.com/intent/tweet?text=<?= urldecode(get_the_permalink())?>" onclick="window.open(this.href, 'twitterwindow','left=20,top=20,width=600,height=300,toolbar=0,resizable=1'); return false;"><i class="fab fa-twitter"></i></a></div>
        </div>
        <div class="entryContent">
            <?php the_content(); ?>
        </div><!--ENTRY CONTENT-->
        <div class="entryFiles ">
            <div class="d-flex">
                <?php if( have_rows('files') ): ?>
                    <?php while ( have_rows('files') ) : the_row(); ?>
                        <div class="p-2"><a href="<?php the_sub_field('file'); ?>" target="_blank"> <i class="far fa-file-alt"></i> <?php the_sub_field('nombre'); ?></p></div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>  <!--  entry Container -->

    <div class="etiquetasPostContainer">
        <?php get_template_part( 'template-parts/content/categories' ); ?> 
    </div>
    
    <?php get_template_part( 'template-parts/content/pagination' ); ?> 
    
</div>  <!-- blog entries list  -->