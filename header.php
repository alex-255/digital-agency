<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body>
    <header>
        <div class="menu-bar container-xxl">
            <div class="menu-bar-hamburger"></div>
            <div class="row">
                <div class="col-12 col-lg-3 logo-area">
                    <img src="<?php echo get_theme_mod( 'wb_site_logo' ); ?>">
                </div>
                <div class="col-12 col-lg-9 menu-area">
                  <?php wp_nav_menu( array(
                    'menu' => 'primary_menu',
                    'theme_location' => 'primary_menu'
                  ) ); ?>
                </div>
            </div>
        </div>

    </header>

