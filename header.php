<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="navigation-bar" class="container-xxl px-5">
        <div id="navigation-bar-hamburger">
        </div>
        <div class="row">
          <div class="col-12 col-lg-3 logo-area">
              <a href="<?php echo site_url(); ?>"><img src="<?php echo esc_url(get_theme_mod( 'wb_site_logo' )); ?>" alt="website logo" ></a>
          </div>
          <div class="col-12 col-lg-9 menu-area">
            <?php wp_nav_menu( array(
              'menu' => 'primary_menu',
              'theme_location' => 'primary_menu'
            ) ); ?>
            <div class="search-form-wrapper">
              <?php get_search_form(
                array(
                  'aria_label' => 'navigation-search'
                )
              ); ?>
              <i class="bi bi-search" id="bi-search"></i>
              <i class="bi bi-plus-lg" id="bi-plus-lg" ></i>
            </div>
            
          </div>
        </div>
    </div>


