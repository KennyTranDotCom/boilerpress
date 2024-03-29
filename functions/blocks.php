<?php

// Add blocks
function boilerpress_blocks_init() {
    foreach ( glob( get_template_directory() . '/build/blocks/*/block.json' ) as $file ) {
        register_block_type( $file );
    }
}
add_action( 'init', 'boilerpress_blocks_init' );

// Add block category
function boilerpress_block_categories( $categories, $post ) {
    return array_merge(
        array(
            array(
                'slug' => 'boilerpress',
                'title' => 'BoilerPress',
            ),
        ),
        $categories
    );
}
add_filter( 'block_categories_all', 'boilerpress_block_categories', 10, 2);