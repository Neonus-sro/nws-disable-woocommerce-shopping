<?php
/**
 * Disable WooCommerce Shopping
 *
 * @package     NWS_Disable_WC_Shopping
 * @author      Your Name
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Disable WooCommerce Shopping
 * Plugin URI:  https://www.neonus.sk/
 * Description: This is a plugin to disable the shopping feature in WooCommerce.
 * Version:     1.0.0
 * Author:      NEONUS, s.r.o.
 * Author URI:  https://www.neonus.sk/
 * Text Domain: nws-disable-wc-shopping
 * License:     GPL2
 */

// Disable "Add to Cart" buttons.
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'template_redirect', 'disable_woocommerce_shopping_redirect_cart' );

/**
 * Redirect to homepage when attempting to open the cart.
 */
function disable_woocommerce_shopping_redirect_cart() {
	if ( is_cart() || is_checkout() || is_checkout_pay_page() ) {
		wp_safe_redirect( home_url() );
		exit;
	}
}
