<?php
/**
 * Site header.
 *
 * @package wptesting
 */

defined( 'ABSPATH' ) || exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wptesting' ); ?></a>

<header id="masthead" class="site-header">
	<div class="container site-header__inner">
		<div class="site-branding">
			<?php
			if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
				the_custom_logo();
			} else {
				if ( is_front_page() && is_home() ) {
					printf(
						'<h1 class="site-title"><a href="%1$s" rel="home">%2$s</a></h1>',
						esc_url( home_url( '/' ) ),
						esc_html( get_bloginfo( 'name' ) )
					);
				} else {
					printf(
						'<p class="site-title"><a href="%1$s" rel="home">%2$s</a></p>',
						esc_url( home_url( '/' ) ),
						esc_html( get_bloginfo( 'name' ) )
					);
				}

				$description = get_bloginfo( 'description', 'display' );
				if ( $description ) {
					printf( '<p class="site-description">%s</p>', esc_html( $description ) );
				}
			}
			?>
		</div>

		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary', 'wptesting' ); ?>">
			<button
				class="menu-toggle"
				aria-controls="primary-menu"
				aria-expanded="false"
			><?php esc_html_e( 'Menu', 'wptesting' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>

		<div class="site-header__actions">
			<?php get_search_form(); ?>
			<?php
			if ( function_exists( 'wptesting_mini_cart_link' ) ) {
				wptesting_mini_cart_link();
			}
			?>
		</div>
	</div>
</header>

<div id="content" class="site-content">
