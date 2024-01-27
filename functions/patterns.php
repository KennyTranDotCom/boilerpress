<?php

// Remove core patterns
function boilerpress_remove_core_patterns() {
    remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', 'boilerpress_remove_core_patterns' );