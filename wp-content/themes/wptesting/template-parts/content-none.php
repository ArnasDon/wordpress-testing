<?php
/**
 * Partial shown when no posts match the query.
 *
 * @package wptesting
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing found', 'wptesting' ); ?></h1>
	</header>

	<div class="page-content">
		<?php if ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, nothing matched your search. Try a different keyword.', 'wptesting' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'It looks like nothing was found here. Maybe try a search?', 'wptesting' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
</section>
