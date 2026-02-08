<?php
/**
 * Template Name: Splash Page
 *
 * Splash page template for Dazbeez website
 * Content is managed in WordPress editor and translated via TranslatePress
 *
 * @package Blueprint_Child
 */

get_header();
?>

    <main id="primary" class="site-main">
        <div class="splash-page">
            <div class="splash-container">
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
