<?php
/**
 * Blueprint Child Theme Functions
 *
 * @package Blueprint_Child
 */

/**
 * Enqueue child theme styles and scripts
 */
function blueprint_child_enqueue_assets() {
    // Parent theme style
    wp_enqueue_style( 'blueprint-parent-style', get_template_directory_uri() . '/style.css' );

    // Child theme style
    wp_enqueue_style( 'blueprint-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'blueprint-parent-style' ), '1.0.0' );

    // Splash page assets (loaded only on splash page template)
    if ( is_page_template( 'page_splash.php' ) ) {
        wp_enqueue_style( 'blueprint-child-splash-css', get_stylesheet_directory_uri() . '/assets/splash.css', array(), '1.0.0' );
        wp_enqueue_script( 'blueprint-child-splash-js', get_stylesheet_directory_uri() . '/assets/splash.js', array(), '1.0.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'blueprint_child_enqueue_assets' );
