<?php

function bd_business_files() {
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
}

// bd - means Brothers Design
add_action('wp_enqueue_scripts', 'bd_business_files');