<?php

// Setup
function boilerpress_admin_setup() {
    // Customise footer text in admin
    function boilerpress_admin_footer_text () {
        echo 'Created by <a href="https://kennytran.com">Kenny Tran</a>. Powered by <a href="http://WordPress.org">WordPress</a>.';
    }
    add_filter('admin_footer_text', 'boilerpress_admin_footer_text');
}
add_action('after_setup_theme', 'boilerpress_admin_setup');

// Make theme available for translation.
load_theme_textdomain('boilerpress', get_template_directory() . '/languages');

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
