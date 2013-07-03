<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package wp_lamar
 */

	if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'wp_lamar' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header><!-- .page-header -->

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'search' ); ?>

		<?php endwhile; ?>

		<?php lamar_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php get_template_part( 'no-results', 'search' ); ?>

	<?php endif; ?>
