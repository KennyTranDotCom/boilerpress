<?php

// Enqueue Styles
function boilerpress_enqueue_styles() {
    wp_enqueue_style(
        'main',
        get_template_directory_uri() . '/assets/styles/main.min.css',
        false,
        filemtime(get_stylesheet_directory() . '/assets/styles/main.min.css')
    );
}
add_action('wp_enqueue_scripts', 'boilerpress_enqueue_styles');
