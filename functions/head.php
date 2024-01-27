<?php

// Clean WordPress head
function boilerpress_clean_head() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

    global $wp_widget_factory;
}
add_action('init', 'boilerpress_clean_head');

// Remove Emoji SVGs
add_filter('emoji_svg_url', '__return_false');
