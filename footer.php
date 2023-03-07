    <div class="container-xxl footer">
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-4">
                <div class="footer-logo-area">
                    <img src="<?php echo get_theme_mod( 'wb_site_logo' ); ?>">
                    <div class="social-icons">
                        <?php wp_nav_menu( array(
                            'menu' => 'footer_social_icons',
                            'theme_location' => 'footer_social_icons'
                        ) ); ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xl-2">
                <div class="footer-menu footer-menu-one">
                    <?php wp_nav_menu( array(
                                'menu' => 'footer_menu_1',
                                'theme_location' => 'footer_menu_1'
                            ) ); ?>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xl-2">
                <div class="footer-menu footer-menu-two">
                    <?php wp_nav_menu( array(
                                'menu' => 'footer_menu_2',
                                'theme_location' => 'footer_menu_2'
                            ) ); ?>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xl-4">
                <div class="footer-info">
                    <h4>Phone</h4>
                    <p><?php echo get_theme_mod( 'wb_phone_in_footer' ); ?></p>
                    <h4>Email</h4>
                    <p><a href="mailto:<?php echo get_theme_mod( 'wb_email_in_footer' ); ?>"><?php echo get_theme_mod( 'wb_email_in_footer' ); ?></a></p>
                    <h4>Address</h4>
                    <p><?php echo get_theme_mod( 'wb_address_in_footer' ); ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
    </body>
</html>