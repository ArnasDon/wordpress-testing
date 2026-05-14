<?php
/**
 * Front-end asset enqueues.
 *
 * @package wptesting
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style(
			'wptesting-style',
			get_stylesheet_uri(),
			array(),
			WPTESTING_VERSION
		);

		wp_enqueue_style(
			'wptesting-main',
			WPTESTING_URI . 'assets/css/main.css',
			array( 'wptesting-style' ),
			WPTESTING_VERSION
		);

		wp_enqueue_script(
			'wptesting-main',
			WPTESTING_URI . 'assets/js/main.js',
			array(),
			WPTESTING_VERSION,
			true
		);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
);
