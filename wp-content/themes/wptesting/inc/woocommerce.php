<?php
/**
 * WooCommerce integration — hook-based customizations.
 *
 * Prefer hooks here over copying WC plugin templates into the theme.
 * Copied templates go stale on every WC update.
 *
 * @package wptesting
 */

defined( 'ABSPATH' ) || exit;

// Replace WC's default content wrappers with theme-styled ones.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action(
	'woocommerce_before_main_content',
	function () {
		echo '<main id="primary" class="site-main container woocommerce-page">';
	},
	10
);

add_action(
	'woocommerce_after_main_content',
	function () {
		echo '</main>';
	},
	10
);

// Layout tweaks.
add_filter(
	'loop_shop_columns',
	function () {
		return 3;
	}
);

add_filter(
	'loop_shop_per_page',
	function () {
		return 12;
	}
);

add_filter(
	'woocommerce_product_thumbnails_columns',
	function () {
		return 4;
	}
);

// Hide the default WC sidebar — this theme uses its own.
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Cart fragment for the mini-cart badge in the header.
add_filter(
	'woocommerce_add_to_cart_fragments',
	function ( $fragments ) {
		ob_start();
		wptesting_mini_cart_link();
		$fragments['a.wptesting-cart-link'] = ob_get_clean();
		return $fragments;
	}
);
