<?php

// Add classes to body
function boilerpress_body_class($wp_classes, $custom_classes) {
    global $post;

    $whitelist = [];
    $wp_classes = array_intersect($wp_classes, $whitelist);

    if (isset($post)) {
        $custom_classes[] = $post->post_type . '--' . $post->post_name;
    }

    return array_merge($wp_classes, (array) $custom_classes);
}
add_filter('body_class', 'boilerpress_body_class', 10, 2);

// Add class to post
function boilerpress_post_class($wp_classes, $custom_classes) {
    global $post;

    $whitelist = [];
    $wp_classes = array_intersect($wp_classes, $whitelist);

    return array_merge($wp_classes, (array) $custom_classes);
}
add_filter('post_class', 'boilerpress_post_class', 10, 2);

// Change excerpt length
function boilerpress_excerpt_length() {
    return 50;
}
add_filter('excerpt_length', 'boilerpress_excerpt_length');

// Change excerpt suffix
function boilerpress_excerpt_more() {
    return '...';
}
add_filter('excerpt_more', 'boilerpress_excerpt_more');
