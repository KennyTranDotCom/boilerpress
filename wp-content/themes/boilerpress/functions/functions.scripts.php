<?php

// Enqueue Scripts
function boilerpress_enqueue_scripts() {
    wp_register_script(
        'script',
        get_template_directory_uri() . '/assets/scripts/main.min.js',
        'jquery',
        filemtime(get_stylesheet_directory() . '/assets/scripts/main.min.js'),
        true
    );

    wp_enqueue_script('script');
}
add_action('wp_enqueue_scripts', 'boilerpress_enqueue_scripts');

// Dequeue scripts
function boilerpress_dequeue_scripts() {
    wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'boilerpress_dequeue_scripts');
