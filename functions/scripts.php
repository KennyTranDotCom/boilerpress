<?php

// Enqueue editor scripts
function boilerpress_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'boilerpress-script-editor',
        get_template_directory_uri() . '/script-editor.js',
        false,
        filemtime(
            get_template_directory() . '/script-editor.js'
        ),
        true
    );
}
add_action( 'enqueue_block_editor_assets', 'boilerpress_enqueue_block_editor_assets' );

// Enqueue scripts
function boilerpress_enqueue_scripts() {
    wp_enqueue_script(
        'boilerpress-script',
        get_template_directory_uri() . '/build/script.min.js',
        false,
        filemtime(
            get_template_directory() . '/build/script.min.js'
        ),
        true
    );
}
add_action('wp_enqueue_scripts', 'boilerpress_enqueue_scripts');