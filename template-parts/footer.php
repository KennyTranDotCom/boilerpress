<footer class="c-footer has-global-padding">
    <section>
        <div class="c-footer__layout">
            <div class="is-layout-flow">
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

                <nav class="c-footer__social">
                    <ul>
                        <li><a href="https://twitter.com/kennytrandotcom" target="_blank" rel="nooppener noreferrer"
                                aria-label="Find me on X"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                </svg></a></li>

                        <li><a href="https://www.linkedin.com/in/kennytrandotcom/" target="_blank"
                                rel="nooppener noreferrer" aria-label="Find me on LinkedIn"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
                                </svg></a></li>
                    </ul>
                </nav>
            </div>
            <nav class="c-footer__nav is-layout-flow">
                <h3 class="has-large-font-size">Pages</h3>

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
        <div class="c-footer__layout c-footer__layout--newsletter">
            <div>
                <h3 class="has-x-large-font-size">Subscribe to my mailing list</h3>
                <p style="--flow-space: 0.5rem">Get proven techniques to grow your website. No spam, ever.</p>
            </div>
            <div>
                <div id="mlb2-6694167" class="ml-subscribe-form ml-subscribe-form-6694167">
                    <div class="row-form">
                        <form class="c-form" action="https://assets.mailerlite.com/jsonp/168249/forms/95225256111768799/subscribe" data-code="" method="post" target="_blank">
                            <div class="c-form__group c-form__group--inline">
                                <label class="o-hidden-visually">Email</label>
                                <input aria-label="email" aria-required="true" type="email" class="form-control"
                                    data-inputmask="" name="fields[email]" placeholder="Email*" autocomplete="email">

                                <div class="bp-block-form-mailerlite__buttons">
                                    <button disabled="disabled" style="display: none;" type="button"
                                        class="wp-element-button loading">
                                        <div class="ml-form-embedSubmitLoad"></div>
                                        <span class="sr-only">Sending...</span>
                                    </button>

                                    <button type="submit" class="wp-element-button">Subscribe</button>
                                </div>
                            </div>

                            <input type="hidden" name="ml-submit" value="1">
                            <input type="hidden" name="anticsrf" value="true">
                        </form>
                    </div>

                    <div class="ml-form-successBody row-success o-stack" style="display: none">
                        <h3>Thank you!</h3>
                        <p>You have successfully joined the newsletter list.</p>
                    </div>

                    <script>
                    function ml_webform_success_6694167() {
                        var $ = ml_jQuery || jQuery;
                        $('.ml-subscribe-form-6694167 .row-success').show();
                        $('.ml-subscribe-form-6694167 .row-form').hide();
                    }
                    </script>
                    <script src="https://groot.mailerlite.com/js/w/webforms.min.js?v1f25ee4b05f240a833e02c19975434a4"
                        type="text/javascript"></script>
                    <script>
                    fetch("https://assets.mailerlite.com/jsonp/168249/forms/95225256111768799/track-view")
                    </script>
                </div>
            </div>
        </div>
    </section>
    <section>
        <p class="c-footer__legal has-grey-color">Copyright © <?php echo date("Y"); ?> Kenny Tran Co Ltd. Company number 12716945.</p>
    </section>
</footer>