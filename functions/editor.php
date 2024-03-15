<?php

// Add editor styles
add_theme_support('editor-styles');
add_editor_style('build/editor.min.css');

// Add block editor styles
function boilerpress_block_editor_styles() {
	wp_enqueue_style( 'boilerpress-block-editor-styles', get_theme_file_uri( '/build/block-editor.min.css' ), false );
}
add_action( 'enqueue_block_editor_assets', 'boilerpress_block_editor_styles' );
