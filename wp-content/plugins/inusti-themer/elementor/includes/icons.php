<?php
   add_filter( 'elementor/icons_manager/additional_tabs', 'icons_filters_new' , 9999999, 1 );
function icons_filters_new( $tabs = array() ) {

      $newicons = [];

      $newicons[ 'gva_custom_icon' ] = [
         'name'          => 'gva_custom_icon',
         'label'         => 'Custom Icon of Theme',
         'url'           => '',
         'enqueue'       => '',
         'prefix'        => '',
         'displayPrefix' => 'fi',
         'labelIcon'     => 'fab fa-font-awesome-alt',
         'ver'           => '1.0',
         'fetchJson'     => GAVIAS_INUSTI_PLUGIN_URL . 'elementor/assets/icons.json',
      ];

      return array_merge( $tabs, $newicons );

   }

   add_action( 'wp_print_footer_scripts', 'insert_footer_css'  );
   function insert_footer_css() {
      echo '<link rel="stylesheet" type="text/css" href="' . GAVIAS_INUSTI_PLUGIN_URL . 'elementor/assets/icons/flaticon.css">';
   }
