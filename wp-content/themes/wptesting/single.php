<?php
/**
 * Single post template.
 *
 * @package wptesting
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main container">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', get_post_type() );

		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'wptesting' ) . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'wptesting' ) . '</span> <span class="nav-title">%title</span>',
			)
		);

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile;
	?>
</main>

<?php
get_sidebar();
get_footer();
