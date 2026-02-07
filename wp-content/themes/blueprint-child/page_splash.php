<?php
/**
 * Template Name: Splash Page
 *
 * Splash page template for Dazbeez website
 *
 * @package Blueprint_Child
 */

get_header();
?>

    <main id="primary" class="site-main">
        <div class="splash-page">
            <div class="splash-content">
                <h1><?php the_title(); ?></h1>
                <?php
                while ( have_posts() ) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </main>

<?php
get_footer();
