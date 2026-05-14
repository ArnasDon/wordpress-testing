<?php
/**
 * Home page — hero + featured products.
 *
 * @package wptesting
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">
	<section class="hero">
		<div class="container">
			<h1 class="hero__title"><?php esc_html_e( 'Welcome to the Store', 'wptesting' ); ?></h1>
			<p class="hero__subtitle">
				<?php esc_html_e( 'Generic placeholder copy for the hero. Replace with real content.', 'wptesting' ); ?>
			</p>
			<p class="hero__cta">
				<?php
				$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
				?>
				<a class="button button--primary" href="<?php echo esc_url( $shop_url ); ?>">
					<?php esc_html_e( 'Shop now', 'wptesting' ); ?>
				</a>
			</p>
		</div>
	</section>

	<section class="featured-products">
		<div class="container">
			<h2 class="section-title"><?php esc_html_e( 'Featured products', 'wptesting' ); ?></h2>

			<?php if ( shortcode_exists( 'products' ) ) : ?>
				<?php echo do_shortcode( '[products limit="4" columns="4" visibility="featured"]' ); ?>
			<?php else : ?>
				<p class="notice">
					<?php esc_html_e( 'Install and activate WooCommerce to display featured products here.', 'wptesting' ); ?>
				</p>
			<?php endif; ?>
		</div>
	</section>

	<section class="categories-grid">
		<div class="container">
			<h2 class="section-title"><?php esc_html_e( 'Shop by category', 'wptesting' ); ?></h2>

			<?php if ( shortcode_exists( 'product_categories' ) ) : ?>
				<?php echo do_shortcode( '[product_categories limit="6" columns="3" hide_empty="0"]' ); ?>
			<?php else : ?>
				<p class="notice">
					<?php esc_html_e( 'Install and activate WooCommerce to display product categories.', 'wptesting' ); ?>
				</p>
			<?php endif; ?>
		</div>
	</section>

	<?php if ( have_posts() && get_post()->post_content ) : ?>
		<section class="front-page-content container">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
		</section>
	<?php endif; ?>
</main>

<?php
get_footer();
