<?php

function wb_business_files() {
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;500&display=swap');
  wp_enqueue_style('bootstrap-style', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap-script', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', NULL, '5.3.0', true);
  wp_enqueue_style('main-style', get_stylesheet_uri());
}

// Wooden Business Customizer
add_action('wp_enqueue_scripts', 'wb_business_files');

function wb_customize_register( $wp_customize ) {
  $wp_customize->add_section( 'wb_theme_options', array(
      'title' => __( 'WB Theme Options' ),
      'description' => __( 'Add Theme Options.' ),
      'panel' => '', // Not typically needed.
      'priority' => 300,
      'capability' => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
    ) );


    $wp_customize->add_setting( 'wb_site_logo', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
      'default' => get_theme_file_uri('/images/site-logo.png'),
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'esc_url_raw',
      'sanitize_js_callback' => '', // Basically to_json.
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wb_site_logo_control', array(
      'label' => 'Upload Logo',
      'priority' => 20,
      'section' => 'wb_theme_options',
      'settings' => 'wb_site_logo',
      'button_labels' => array(// All These labels are optional
                  'select' => 'Select Site Logo',
                  'remove' => 'Remove Site Logo',
                  'change' => 'Change Site Logo',
                  )
  )) );

}
add_action( 'customize_register', 'wb_customize_register' );

function wb_features() {
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'wb_features');

// Custom Post Type(s)
function wb_carousel() {
  register_post_type('carousel',
    array(
      'labels'      => array(
        'name'          => __( 'Carousels', 'textdomain' ),
        'singular_name' => __( 'Carousel', 'textdomain' ),
      ),
      'public'      => true,
      'menu_icon' => 'dashicons-media-interactive',
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );
}
add_action('init', 'wb_carousel');

// Menus
if ( ! function_exists( 'wb_register_nav_menu' ) ) {

	function wb_register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => __( 'Primary Menu', 'textdomain' ),
	    	'footer_menu'  => __( 'Footer Menu', 'textdomain' ),
		) );
	}
	add_action( 'after_setup_theme', 'wb_register_nav_menu', 0 );
}