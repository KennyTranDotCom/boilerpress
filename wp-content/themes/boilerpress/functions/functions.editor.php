<?php

// Disable Gutenberg editor
add_filter('use_block_editor_for_post', '__return_false', 10);

// Remove default editor
function boilerpress_remove_editor() {
    remove_post_type_support('page', 'editor');
    remove_post_type_support('post', 'editor');
}
add_action('admin_init', 'boilerpress_remove_editor');
