<?php
/**
 * Theme setup
 */

if ( ! function_exists( 'universal_base_setup' ) ) {
    function universal_base_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // Register default menus
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'universal-base' ),
            'footer'  => esc_html__( 'Footer Menu', 'universal-base' ),
        ) );

        // Switch default core markup to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add support for core custom logo.
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
}
add_action( 'after_setup_theme', 'universal_base_setup' );
