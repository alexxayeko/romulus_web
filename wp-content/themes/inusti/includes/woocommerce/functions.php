<?php 
add_filter('add_to_cart_fragments', 'inusti_woocommerce_header_add_to_cart_fragment');
add_action( 'wp_print_scripts', 'inusti_de_script', 100 );

if(!function_exists('inusti_de_script')){
    function inusti_de_script() {
        wp_dequeue_script( 'wc-cart-fragments' );
        return true;
    }
}
  
if(!function_exists('inusti_woocommerce_header_add_to_cart_fragment')){
    function inusti_woocommerce_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;
        ob_start();
        inusti_get_cart_contents();
        $fragments['.cart'] = ob_get_clean();
        return $fragments;
    }
}    

if(!function_exists('inusti_get_cart_contents')){
    function inusti_get_cart_contents(){
        global $woocommerce;
        ?>
        <div class="cart dropdown">
            <a class="dropdown-toggle mini-cart" data-toggle="dropdown" aria-expanded="true" role="button" aria-haspopup="true" data-delay="0" href="#" title="<?php esc_html__('View your shopping cart', 'inusti'); ?>">
                <span class="title-cart"><i class="fas fa-shopping-cart"></i></span>
                <?php echo sprintf(_n(' <span class="mini-cart-items"> %d </span> <span class="mini-cart-items-title">' . esc_html__('item', 'inusti').' </span> ', ' <span class="mini-cart-items"> %d </span> <span class="mini-cart-items-title"> '. esc_html__('items', 'inusti').' | </span> ', $woocommerce->cart->cart_contents_count, 'inusti'), $woocommerce->cart->cart_contents_count); ?> <?php echo wp_kses($woocommerce->cart->get_cart_total(), true); ?>
            </a>
            <div class="minicart-content">
                <?php woocommerce_mini_cart(); ?>
            </div>
        </div>
        <?php
    }
}

