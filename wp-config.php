<?php
/**
 * The base configuration settings for WordPress
 * -> MySQL settings, Secret keys and WP_DEBUG are stored in environment specific
 *    configuration files (e.g. wp-config.{environment}.php)
 *
 *    Environments:
 *        development
 *        staging
 *        production
 */

/** Set environment URLs */
$BOILERPRESS_URL_DEVELOPMENT = 'dev.boilerpress.io';
$BOILERPRESS_URL_STAGING = 'staging.boilerpress.io';
$BOILERPRESS_URL_PRODUCTION = 'boilerpress.io';

/** Define hostname */
if(isset($_SERVER['HTTP_X_FORWARDED_HOST']) && !empty($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    $hostname = $_SERVER['HTTP_X_FORWARDED_HOST'];
} else {
    $hostname = $_SERVER['HTTP_HOST'];
}

/** Filter hostname */
$hostname = filter_var($hostname, FILTER_SANITIZE_STRING);

/** Define protocol */
if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) {
    $protocol = 'https://';
} else {
    $protocol = 'http://';
}

/** Set environment based on hostname */
switch($hostname) {
    case $BOILERPRESS_URL_DEVELOPMENT:
        define('WP_ENV', 'development');
        break;

    case $BOILERPRESS_URL_STAGING:
        define('WP_ENV', 'staging');
        break;

    case $BOILERPRESS_URL_PRODUCTION:
        default:
        define('WP_ENV', 'production');
}

/** Load config file for current environment */
include ABSPATH . 'wp-config.' . WP_ENV . '.php';

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/** Define WordPress site URLs */
if(!defined('WP_SITEURL')) {
    define('WP_SITEURL', $protocol . rtrim($hostname, '/'));
}
if(!defined('WP_HOME')) {
    define('WP_HOME', $protocol . rtrim($hostname, '/'));
}

/** Clean up */
unset($hostname, $protocol);

/** Prevent automatic WordPress updates */
define('AUTOMATIC_UPDATER_DISABLED', true);

/** Set auto save interval in seconds */
define('AUTOSAVE_INTERVAL', 60);

/** Set auto empty trash in days */
define('EMPTY_TRASH_DAYS', 7);

/** Set number of revision posts allowed */
define('WP_POST_REVISIONS', 10);

/** Define theme variables */
define('TEMPLATE_URL', WP_SITEURL . '/wp-content/themes/boilerpress');
define('ASSETS_URL', TEMPLATE_URL . '/assets');
define('STYLES_URL', ASSETS_URL . '/styles');
define('VIDEOS_URL', ASSETS_URL . '/videos');

switch(WP_ENV) {
    case 'development':
        define('IMAGES_URL', ASSETS_URL . '/images');
        break;

    case 'staging':
        define('IMAGES_URL', ASSETS_URL . '/images/compressed');
        break;

    case 'production':
        default:
        define('IMAGES_URL', ASSETS_URL . '/images/compressed');
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
