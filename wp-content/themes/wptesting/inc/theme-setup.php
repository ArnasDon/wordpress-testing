<?php
/**
 * Theme setup — feature support, menus, image sizes.
 *
 * @package wptesting
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'after_setup_theme',
	function () {
		load_theme_textdomain( 'wptesting', WPTESTING_DIR . 'languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// WooCommerce.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'wptesting' ),
				'footer'  => __( 'Footer Menu', 'wptesting' ),
			)
		);

		add_image_size( 'wptesting-hero', 1600, 700, true );
	}
);

add_action(
	'widgets_init',
	function () {
		register_sidebar(
			array(
				'name'          => __( 'Sidebar', 'wptesting' ),
				'id'            => 'sidebar-1',
				'description'   => __( 'Default sidebar.', 'wptesting' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Footer', 'wptesting' ),
				'id'            => 'footer-1',
				'description'   => __( 'Widgets shown in the footer.', 'wptesting' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
);
