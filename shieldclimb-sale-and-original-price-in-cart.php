<?php

/**
 * Plugin Name: ShieldClimb – Show Sale and Original Price in Cart
 * Plugin URI: https://shieldclimb.com/free-woocommerce-plugins/sale-and-original-price-in-cart/
 * Description: Show Sale and Original Price in Cart for WooCommerce. Display the original price with a strikethrough, improve price clarity, and boost conversions!
 * Version: 1.0.1
 * Requires Plugins: woocommerce
 * Requires at least: 5.8
 * Tested up to: 6.8
 * WC requires at least: 5.8
 * WC tested up to: 9.8.1
 * Requires PHP: 7.2
 * Author: shieldclimb.com
 * Author URI: https://shieldclimb.com/about-us/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

add_filter( 'woocommerce_cart_item_price', 'shieldclimb_sale_regular_cart_price', 30, 3 );
  
function shieldclimb_sale_regular_cart_price( $price, $values, $cart_item_key ) {
   $slashed_price = $values['data']->get_price_html();
   $is_on_sale = $values['data']->is_on_sale();
   if ( $is_on_sale ) {
      $price = $slashed_price;
   }
   return $price;
}

?>