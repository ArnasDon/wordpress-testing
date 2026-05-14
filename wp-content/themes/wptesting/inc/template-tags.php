<?php
/**
 * Reusable template helpers.
 *
 * @package wptesting
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'wptesting_posted_on' ) ) {
	/**
	 * Print the published date for the current post.
	 */
	function wptesting_posted_on() {
		$time_string = sprintf(
			'<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		printf(
			'<span class="posted-on">%s %s</span>',
			esc_html__( 'Posted on', 'wptesting' ),
			$time_string // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped above.
		);
	}
}

if ( ! function_exists( 'wptesting_entry_footer' ) ) {
	/**
	 * Print entry meta in the footer area of a post.
	 */
	function wptesting_entry_footer() {
		if ( 'post' !== get_post_type() ) {
			return;
		}

		$categories_list = get_the_category_list( esc_html__( ', ', 'wptesting' ) );
		if ( $categories_list ) {
			printf(
				'<span class="cat-links">%1$s %2$s</span>',
				esc_html__( 'Posted in', 'wptesting' ),
				$categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WP-escaped list.
			);
		}
	}
}

if ( ! function_exists( 'wptesting_mini_cart_link' ) ) {
	/**
	 * Output a small cart link with item count. Safe to call without WooCommerce.
	 */
	function wptesting_mini_cart_link() {
		if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
			return;
		}

		$count = WC()->cart->get_cart_contents_count();
		$url   = wc_get_cart_url();

		printf(
			'<a class="wptesting-cart-link" href="%1$s"><span class="wptesting-cart-label">%2$s</span> <span class="wptesting-cart-count">(%3$d)</span></a>',
			esc_url( $url ),
			esc_html__( 'Cart', 'wptesting' ),
			(int) $count
		);
	}
}
