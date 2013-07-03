<?php
/**
 * The base template for all main content templates.
 *
 * Learn more: http://scribu.net/wordpress/theme-wrappers.html
 *
 * @package wp_lamar
 */

get_header( lamar_template_base() ); ?>

<!-- <div class="row">
	<div class="large-12 columns">
		<?php // breadcrumb_trail_get_items(); ?>
	</div>
</div> -->

<div class="row">
	<section id="primary" class="content-area large-8 columns">
		<div id="content" class="site-content" role="main">
			<?php include lamar_template_path(); ?>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar( lamar_template_base() ); ?>

</div>

<?php get_footer( lamar_template_base() ); ?>