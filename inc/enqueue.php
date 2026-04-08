<?php
/**
 * Enqueue scripts and styles.
 */

function universal_base_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'universal-style', get_stylesheet_uri(), array(), UNIVERSAL_VERSION );

    // Enqueue custom modular CSS
    wp_enqueue_style( 'universal-main', UNIVERSAL_URI . '/assets/css/main.css', array(), UNIVERSAL_VERSION );

    // Enqueue main JS
    wp_enqueue_script( 'universal-script', UNIVERSAL_URI . '/assets/js/main.js', array('jquery'), UNIVERSAL_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'universal_base_scripts' );
