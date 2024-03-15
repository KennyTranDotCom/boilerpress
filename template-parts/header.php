<header class="c-header has-global-padding">
    <div class="c-header__layout">
        <a href="/" class="c-header__logo">
            <?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

                if ( has_custom_logo() ) {
                    echo '<img class="is-svg-inline" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                } else {
                    echo get_bloginfo('name');
                }
            ?>
        </a>

        <button
            class="c-header__nav-trigger js-header-trigger"
            aria-controls="header-nav"
            aria-expanded="false"
        >
            <span>Menu</span>
            <span>Close</span>
        </button>
        <nav class="c-header__nav" id="header-nav" hidden="true">
            <?php if (has_nav_menu('menu_header')):
                wp_nav_menu([
                    'theme_location' => 'menu_header',
                    'container' => '',
                ]);
            endif; ?>
        </nav>
    </div>
</header>