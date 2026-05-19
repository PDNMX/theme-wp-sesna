<?php
// Provide a safe fallback when WordPress functions aren't available (e.g., running outside WP)
if ( ! function_exists( 'get_header' ) ) {
    function get_header() {
        $header_path = __DIR__ . '/header.php';
        if ( file_exists( $header_path ) ) {
            include $header_path;
        } else {
            echo "<!doctype html><html><head><meta charset=\"utf-8\"><title>Site</title></head><body>";
        }
    }
}

get_header();
?>
    <div class="container py-5">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>
<?php
get_footer();
