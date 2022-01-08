<?php

if (!class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' .
            esc_url(admin_url('plugins.php#timber')) .
            '">' .
            esc_url(admin_url('plugins.php')) .
            '</a></p></div>';
    });
} else {
    // Sets the directories to find .twig files
    Timber::$dirname = [
        'views',
        'views/bases',
        'views/components',
        'views/partials',
        'views/templates',
    ];

    class BoilerPress extends Timber\Site {
        public function __construct() {
            add_action('after_setup_theme', [$this, 'boilerpress_setup']);
            add_filter('timber/context', [$this, 'boilerpress_context']);
            add_filter('timber/twig', [$this, 'boilerpress_twig']);

            parent::__construct();
        }

        public function boilerpress_setup() {
            //  Admin
            include 'functions/functions.admin.php';

            //  Editor
            include 'functions/functions.editor.php';

            //  Feeds
            include 'functions/functions.feeds.php';

            //  Head
            include 'functions/functions.head.php';

            //  HTML
            include 'functions/functions.html.php';

            //  Images
            include 'functions/functions.images.php';

            //  Menu
            include 'functions/functions.menu.php';

            //  Scripts
            include 'functions/functions.scripts.php';

            //  Styles
            include 'functions/functions.styles.php';

            //  Widgets
            include 'functions/functions.widgets.php';
        }

        public function boilerpress_context($context) {
            include 'functions/functions.context.php';

            return $context;
        }

        public function boilerpress_twig($twig) {
            include 'functions/functions.twig.php';

            return $twig;
        }
    }

    new BoilerPress();
}
