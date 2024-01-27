<?php

// Add featured images to post
add_theme_support('post-thumbnails', array('post'));

// Add responsive embeds
add_theme_support('responsive-embeds');

// Add custom logo
function boilerpress_custom_logo_setup() {
    $defaults = array(
        'height'               => 20,
        'width'                => 126,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' )
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'boilerpress_custom_logo_setup' );