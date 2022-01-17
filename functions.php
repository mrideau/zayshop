<?php

function zayshop_setup() {
    // Add document title tag <head>
    add_theme_support( 'title-tag' );

    // Add support for custom logo
    add_theme_support( 'custom-logo' );

    // Register menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu' )
    ) );
}
add_action( 'after_setup_theme', 'zayshop_setup' );

function zayshop_scripts() {
    wp_enqueue_style( 'zayshop-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'zayshop_scripts' );

function zayshop_widgets_init() {
    register_sidebar( array(
        'name' => 'top'
    ) );
}
add_action( 'widgets_init', 'zayshop_widgets_init' );