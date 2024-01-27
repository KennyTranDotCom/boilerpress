<footer class="c-footer">
    <div class="has-global-padding is-layout-constrained">
        <section>
            <div class="c-footer__layout">
                <a href="/" class="c-footer__logo">
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
                <nav class="c-header__nav" id="header-nav">
                    <?php if (has_nav_menu('menu_header')):
                        wp_nav_menu([
                            'theme_location' => 'menu_header',
                            'container' => '',
                        ]);
                    endif; ?>
                </nav>
                <nav class="c-header__nav" id="header-nav">
                    <?php if (has_nav_menu('menu_header')):
                        wp_nav_menu([
                            'theme_location' => 'menu_header',
                            'container' => '',
                        ]);
                    endif; ?>
                </nav>
            </div>
        </section>

        <section>
            <div class="c-footer__layout">
                <h2>Subscribe to my mailing list</h2>
                <nav class="c-header__nav" id="header-nav">
                    <?php if (has_nav_menu('menu_header')):
                        wp_nav_menu([
                            'theme_location' => 'menu_header',
                            'container' => '',
                        ]);
                    endif; ?>
                </nav>
                <nav class="c-header__nav" id="header-nav">
                    <?php if (has_nav_menu('menu_header')):
                        wp_nav_menu([
                            'theme_location' => 'menu_header',
                            'container' => '',
                        ]);
                    endif; ?>
                </nav>
            </div>
        </section>
    </div>
</footer>