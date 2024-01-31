<?php

// Enqueue editor scripts
function boilerpress_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'boilerpress-script-editor',
        get_template_directory_uri() . '/build/editor.min.js',
        false,
        filemtime(
            get_template_directory() . '/build/editor.min.js'
        ),
        true
    );
}
add_action( 'enqueue_block_editor_assets', 'boilerpress_enqueue_block_editor_assets' );

// Enqueue scripts
function boilerpress_enqueue_scripts() {
    wp_enqueue_script(
        'boilerpress-script',
        get_template_directory_uri() . '/build/theme.min.js',
        false,
        filemtime(
            get_template_directory() . '/build/theme.min.js'
        ),
        true
    );
}
add_action('wp_enqueue_scripts', 'boilerpress_enqueue_scripts');