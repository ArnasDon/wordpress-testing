<?php
/**
 * Search results template.
 *
 * @package wptesting
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main container">
	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search results for: %s', 'wptesting' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header>

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'search' );
		endwhile;

		the_posts_pagination();
		?>

	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</main>

<?php
get_sidebar();
get_footer();
