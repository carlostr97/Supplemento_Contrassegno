<?php
/*
Plugin Name: Commissione Contrassegno Checkout
Description: Un semplice plugin che aggiunge le commissione del contrassegno in checkout
Author: Carlo Stringaro
Version: 1.0
Author URI: http://www.carlostringaro.it
*/

function woocommerce_custom_fee( ) {
global $woocommerce;
if ( ( is_admin() && ! defined( 'DOING_AJAX' ) ) || ! is_checkout() )
return;
$chosen_gateway = $woocommerce->session->chosen_payment_method;
$feecod = 3.90;
if ( $chosen_gateway == 'cod' ) { 
$woocommerce->cart->add_fee( 'Commissione Contrassegno', $feecod, false, '' );
}
}
 
add_action( 'woocommerce_cart_calculate_fees','woocommerce_custom_fee' );
?>