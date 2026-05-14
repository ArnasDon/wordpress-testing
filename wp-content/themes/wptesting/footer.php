<?php
/**
 * Site footer.
 *
 * @package wptesting
 */

defined( 'ABSPATH' ) || exit;
?>
</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<div class="container site-footer__inner">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="site-footer__widgets">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		<?php endif; ?>

		<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer', 'wptesting' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer-menu',
					'container'      => false,
					'fallback_cb'    => false,
					'depth'          => 1,
				)
			);
			?>
		</nav>

		<p class="site-info">
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>.
			<?php esc_html_e( 'All rights reserved.', 'wptesting' ); ?>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
