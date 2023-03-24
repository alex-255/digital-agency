<?php

function wb_business_files() {
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Playfair+Display:wght@400;600&display=swap');
  wp_enqueue_style('bootstrap-style', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap-script', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', NULL, '5.3.0', true);
  wp_enqueue_style('bootstrap-icons', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css');
  wp_enqueue_style('main-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . "/style.css"), "all");
  wp_enqueue_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', NULL, '1.8.1', "all");
  wp_enqueue_style('slick-theme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', NULL, '1.8.1', "all");
  wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), "1.8.1", true);
  wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', NULL, filemtime(get_template_directory() . "/assets/js/main.js"), true);
}

// Wooden Business Customizer
add_action('wp_enqueue_scripts', 'wb_business_files');

function wb_customize_register( $wp_customize ) {
  // WB Theme Options Section
  $wp_customize->add_section( 'wb_theme_options', array(
      'title' => esc_html(__( 'WB Theme Options', 'digital-agency' )),
      'description' => esc_html(__( 'Add Theme Options.', 'digital-agency' )),
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
      'default' => false,
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
    'label' => esc_html(__( 'Sidebar position', 'digital-agency' )),
    'description' => esc_html(__( 'Choose a sidebar position.', 'digital-agency' )),
    'choices' => array(
      'left' => esc_html(__( 'Left', 'digital-agency' )),
      'right' => esc_html(__( 'Right', 'digital-agency' ))
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
    'label' => esc_html(__( 'Phone number in footer', 'digital-agency' )),
    'description' => esc_html(__( 'Enter Phone number for showing in footer.', 'digital-agency' )),
    'input_attrs' => array(
      'placeholder' => esc_html(__( '000000000', 'digital-agency' )),
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
    'label' => esc_html(__( 'Email in footer', 'digital-agency' )),
    'description' => esc_html(__( 'Enter Email for showing in footer.', 'digital-agency' )),
    'input_attrs' => array(
      'placeholder' => esc_html(__( 'Your Email here...', 'digital-agency' )),
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
    'label' => esc_html(__( 'Address in footer', 'digital-agency' )),
    'description' => esc_html(__( 'Enter Address for showing in footer.', 'digital-agency' )),
    'input_attrs' => array(
      'placeholder' => esc_html(__( 'Your address here...', 'digital-agency' )),
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
    'label' => esc_html(__( 'Hide previous and next post links', 'digital-agency' ))
    ) 
  );

  // DA Welcome Screen Section
  $wp_customize->add_section( 'da_welcome_screen', array(
    'title' => esc_html(__( 'DA Welcome Screen Options', 'digital-agency' )),
    'description' => esc_html(__( 'DA Welcome Screen Options Here.', 'digital-agency' )),
    'panel' => '', // Not typically needed.
    'priority' => 310,
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
  ) );

  // Text before selected word
  $wp_customize->add_setting( 'da_title_before_selected', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
    'default' => 'Digital',
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => 'sanitize_text_field',
    'sanitize_js_callback' => '', // Basically to_json.
    ) 
  );

  $wp_customize->add_control( 'da_title_before_selected', array(
    'type' => 'text',
    'priority' => 50, // Within the section.
    'section' => 'da_welcome_screen', // Required, core or custom.
    'label' => esc_html(__( 'Title text before selected word', 'digital-agency' )),
    'description' => esc_html(__( 'Title text before selected word. Selected word will be selected with another styles.', 'digital-agency' )),
    'input_attrs' => array(
      'placeholder' => esc_html(__( 'Text here...', 'digital-agency' )),
      )
    ) 
  );

  // Text of selected word
  $wp_customize->add_setting( 'da_title_selected_word', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
    'default' => 'Agency',
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => 'sanitize_text_field',
    'sanitize_js_callback' => '', // Basically to_json.
    ) 
  );

  $wp_customize->add_control( 'da_title_selected_word', array(
    'type' => 'text',
    'priority' => 50, // Within the section.
    'section' => 'da_welcome_screen', // Required, core or custom.
    'label' => esc_html(__( 'Title text of selected word', 'digital-agency' )),
    'description' => esc_html(__( 'Title text of selected word. Selected word will be selected with another styles.', 'digital-agency' )),
    'input_attrs' => array(
      'placeholder' => esc_html(__( 'Text here...', 'digital-agency' )),
      )
    ) 
  );

  // Text after selected word
  $wp_customize->add_setting( 'da_title_after_selected', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
    'default' => 'With Solid Design',
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => 'sanitize_text_field',
    'sanitize_js_callback' => '', // Basically to_json.
    ) 
  );

  $wp_customize->add_control( 'da_title_after_selected', array(
    'type' => 'text',
    'priority' => 50, // Within the section.
    'section' => 'da_welcome_screen', // Required, core or custom.
    'label' => esc_html(__( 'Title text after selected word', 'digital-agency' )),
    'description' => esc_html(__( 'Title text after selected word. Selected word will be selected with another styles.', 'digital-agency' )),
    'input_attrs' => array(
      'placeholder' => esc_html(__( 'Text here...', 'digital-agency' )),
      )
    ) 
  );

  // Subtitle
  $wp_customize->add_setting( 'da_subtitle_welcome', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
    'default' => 'We provide various services to make your business grow and get bigger. Your satisfaction is our first priority.',
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => 'sanitize_text_field',
    'sanitize_js_callback' => '', // Basically to_json.
    ) 
  );

  $wp_customize->add_control( 'da_subtitle_welcome', array(
    'type' => 'text',
    'priority' => 50, // Within the section.
    'section' => 'da_welcome_screen', // Required, core or custom.
    'label' => esc_html(__( 'Subtitle text on welcome screen', 'digital-agency' )),
    'description' => esc_html(__( 'Subtitle text on welcome screen. ', 'digital-agency' )),
    'input_attrs' => array(
      'placeholder' => esc_html(__( 'Text here...', 'digital-agency' )),
      )
    ) 
  );

  // Curve line Image
  $wp_customize->add_setting( 'da_welcome_screen_curve', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
    'default' => false,
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => 'sanitize_url',
    'sanitize_js_callback' => '', // Basically to_json.
  ) );

  $wp_customize->add_control( 
    new WP_Customize_Image_Control( 
      $wp_customize, 
      'da_welcome_screen_curve_control', 
      array(
        'label' => 'Upload Curve Image',
        'priority' => 120,
        'section' => 'da_welcome_screen',
        'settings' => 'da_welcome_screen_curve',
        'button_labels' => 
          array(
            'select' => 'Select Curve Image',
            'remove' => 'Remove Curve Image',
            'change' => 'Change Curve Image',
          )
      )
    ) 
  );

  // Button further Image
  $wp_customize->add_setting( 'da_welcome_screen_button', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
    'default' => false,
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => 'sanitize_url',
    'sanitize_js_callback' => '', // Basically to_json.
  ) );

  $wp_customize->add_control( 
    new WP_Customize_Image_Control( 
      $wp_customize, 
      'da_welcome_screen_button_control', 
      array(
        'label' => 'Upload Button Image',
        'priority' => 120,
        'section' => 'da_welcome_screen',
        'settings' => 'da_welcome_screen_button',
        'button_labels' => 
          array(
            'select' => 'Select Button Image',
            'remove' => 'Remove Button Image',
            'change' => 'Change Button Image',
          )
      )
    ) 
  );

}
add_action( 'customize_register', 'wb_customize_register' );

function wb_features() {
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support( 'html5', array( 'search-form' ) );

  load_theme_textdomain( 'digital-agency', get_template_directory() . '/languages' );
}

add_action('after_setup_theme', 'wb_features');

// Custom Post Type(s)
function da_post_types() {
  register_post_type('carousel',
    array(
      'labels'      => array(
        'name'          => esc_html(__( 'Carousels', 'digital-agency' )),
        'singular_name' => esc_html(__( 'Carousel', 'digital-agency' )),
      ),
      'public'      => true,
      'menu_icon' => 'dashicons-media-interactive',
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );

  register_post_type('work',
    array(
      'labels'      => array(
        'name'          => esc_html(__( 'Works', 'digital-agency' )),
        'singular_name' => esc_html(__( 'Work', 'digital-agency' )),
      ),
      'public'      => true,
      'menu_icon' => 'dashicons-format-gallery',
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );

  register_post_type('testimonial',
    array(
      'labels'      => array(
        'name'          => esc_html(__( 'Testimonials', 'digital-agency' )),
        'singular_name' => esc_html(__( 'Testimonial', 'digital-agency' )),
      ),
      'public'      => true,
      'menu_icon' => 'dashicons-admin-comments',
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );
}
add_action('init', 'da_post_types');

// Menus
if ( ! function_exists( 'wb_register_nav_menu' ) ) {

	function wb_register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => esc_html(__( 'Primary Menu', 'digital-agency' )),
	    	'footer_menu_1'  => esc_html(__( 'Footer Menu One', 'digital-agency' )),
        'footer_menu_2'  => esc_html(__( 'Footer Menu Two', 'digital-agency' )),
        'footer_social_icons'  => esc_html(__( 'Footer Social Icons', 'digital-agency' ))
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
			'name'          => esc_html(__( 'Primary Sidebar', 'digital-agency' )),
			'description'   => esc_html(__( 'The sidebar can appear on the left or on the right side when appropriate template is choosen.', 'digital-agency' )),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */
}