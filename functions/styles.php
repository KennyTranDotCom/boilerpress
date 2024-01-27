<?php

// Enqueue Styles
function boilerpress_enqueue_styles() {
    wp_enqueue_style(
        'boilerpress-style',
        get_template_directory_uri() . '/build/style.min.css',
        false,
        filemtime(
            get_template_directory() . '/build/style.min.css'
        )
    );
}
add_action('wp_enqueue_scripts', 'boilerpress_enqueue_styles');
