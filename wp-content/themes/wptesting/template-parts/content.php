<?php
/**
 * Default post content partial.
 *
 * @package wptesting
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
			wptesting_posted_on();
			echo '</div>';
		}
		?>
	</header>

	<?php if ( has_post_thumbnail() && ! is_singular() ) : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail( 'medium_large' ); ?>
		</a>
	<?php elseif ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'large' ); ?>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		if ( is_singular() ) {
			the_content( sprintf( esc_html__( 'Continue reading %s', 'wptesting' ), '<span class="screen-reader-text">' . get_the_title() . '</span>' ) );
		} else {
			the_excerpt();
		}

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wptesting' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="entry-footer">
		<?php wptesting_entry_footer(); ?>
	</footer>
</article>
