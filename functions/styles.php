<?php

// Enqueue Styles
function boilerpress_enqueue_styles() {
    wp_enqueue_style(
        'boilerpress-style',
        get_template_directory_uri() . '/build/theme.min.css',
        false,
        filemtime(
            get_template_directory() . '/build/theme.min.css'
        )
    );
}
add_action('wp_enqueue_scripts', 'boilerpress_enqueue_styles');
