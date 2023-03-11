<?php

function wb_business_files() {
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;500;600&display=swap');
  wp_enqueue_style('bootstrap-style', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap-script', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', NULL, '5.3.0', true);
  wp_enqueue_style('bootstrap-icons', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css');
  wp_enqueue_style('main-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . "/style.css"), "all");
  wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', NULL, filemtime(get_template_directory() . "/assets/js/main.js"), true);
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

    // Site logo
    $wp_customize->add_setting( 'wb_site_logo', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
      'default' => get_theme_file_uri('/images/site-logo.png'),
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'sanitize_url',
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

  // Sidebar position
  $wp_customize->add_setting( 'wb_sidebar_position', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'default' => 'left',
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => 'sanitize_text_field'
    ) 
  );

  $wp_customize->add_control( 'wb_sidebar_position', array(
    'type' => 'radio',
    'priority' => 25,
    'section' => 'wb_theme_options', 
    'label' => __( 'Sidebar position' ),
    'description' => __( 'Choose a sidebar position.' ),
    'choices' => array(
      'left' => __( 'Left' ),
      'right' => __( 'Right' )
      ),
    ) 
  );

  // Phone number in footer
  $wp_customize->add_setting( 'wb_phone_in_footer', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
    'default' => '',
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => 'sanitize_text_field',
    'sanitize_js_callback' => '', // Basically to_json.
    ) 
  );

  $wp_customize->add_control( 'wb_phone_in_footer', array(
    'type' => 'text',
    'priority' => 30, // Within the section.
    'section' => 'wb_theme_options', // Required, core or custom.
    'label' => __( 'Phone number in footer', 'textdomain' ),
    'description' => __( 'Enter Phone number for showing in footer.' ),
    'input_attrs' => array(
      'placeholder' => __( '000000000' ),
    )
    ) 
  );

  // Email in footer
  $wp_customize->add_setting( 'wb_email_in_footer', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
    'default' => '',
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => 'sanitize_email',
    'sanitize_js_callback' => '', // Basically to_json.
    ) 
  );

  $wp_customize->add_control( 'wb_email_in_footer', array(
    'type' => 'email',
    'priority' => 40, // Within the section.
    'section' => 'wb_theme_options', // Required, core or custom.
    'label' => __( 'Email in footer', 'textdomain' ),
    'description' => __( 'Enter Email for showing in footer.' ),
    'input_attrs' => array(
      'placeholder' => __( 'Your Email here...' ),
    )
    ) 
  );

  // Address in footer
  $wp_customize->add_setting( 'wb_address_in_footer', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
    'default' => '',
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => 'sanitize_text_field',
    'sanitize_js_callback' => '', // Basically to_json.
    ) 
  );

  $wp_customize->add_control( 'wb_address_in_footer', array(
    'type' => 'text',
    'priority' => 50, // Within the section.
    'section' => 'wb_theme_options', // Required, core or custom.
    'label' => __( 'Address in footer', 'textdomain' ),
    'description' => __( 'Enter Address for showing in footer.' ),
    'input_attrs' => array(
      'placeholder' => __( 'Your address here...' ),
    )
    ) 
  );

  // Hide previous and next post links
  $wp_customize->add_setting( 'wb_hide_prev_next_links', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'default' => '',
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => 'sanitize_text_field'
    ) 
  );

  $wp_customize->add_control( 'wb_hide_prev_next_links', array(
    'type' => 'checkbox',
    'priority' => 60,
    'section' => 'wb_theme_options', 
    'label' => __( 'Hide previous and next post links' )
    ) 
  );

}
add_action( 'customize_register', 'wb_customize_register' );

function wb_features() {
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support( 'html5', array( 'search-form' ) );
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
	    	'footer_menu_1'  => __( 'Footer Menu One', 'textdomain' ),
        'footer_menu_2'  => __( 'Footer Menu Two', 'textdomain' ),
        'footer_social_icons'  => __( 'Footer Social Icons', 'textdomain' )
		) );
	}
	add_action( 'after_setup_theme', 'wb_register_nav_menu', 0 );
}

// Sidebar(s)
add_action( 'widgets_init', 'wb_register_sidebars' );

function wb_register_sidebars() {
	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => __( 'Primary Sidebar' ),
			'description'   => __( 'The sidebar can appear on the left or on the right side when appropriate template is choosen.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */
}