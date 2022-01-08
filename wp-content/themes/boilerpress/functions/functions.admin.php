<?php

// Make theme available for translation.
load_theme_textdomain('boilerpress', get_template_directory() . '/languages');

// Remove admin bar for logged in users
add_filter('show_admin_bar', '__return_false');

// Enqueue custom CSS file for login page
function boilerpress_login_css() {
    wp_enqueue_style(
        'login_css',
        get_template_directory_uri() . '/style-login.css'
    );
}
add_action('login_enqueue_scripts', 'boilerpress_login_css');

// Customise logo link on login page
function boilerpress_login_headerurl() {
    return home_url();
}
add_filter('login_headerurl', 'boilerpress_login_headerurl');

// Customise logo title
function boilerpress_login_logo_title() {
    return get_option('blogname');
}
add_filter('login_headertext', 'boilerpress_login_logo_title');
