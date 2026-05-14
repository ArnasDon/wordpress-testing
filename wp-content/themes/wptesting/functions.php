<?php
/**
 * WP Testing theme bootstrap.
 *
 * @package wptesting
 */

defined( 'ABSPATH' ) || exit;

define( 'WPTESTING_VERSION', '0.1.0' );
define( 'WPTESTING_DIR', trailingslashit( get_template_directory() ) );
define( 'WPTESTING_URI', trailingslashit( get_template_directory_uri() ) );

require WPTESTING_DIR . 'inc/theme-setup.php';
require WPTESTING_DIR . 'inc/enqueue.php';
require WPTESTING_DIR . 'inc/template-tags.php';

if ( class_exists( 'WooCommerce' ) ) {
	require WPTESTING_DIR . 'inc/woocommerce.php';
}
