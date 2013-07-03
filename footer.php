<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package wp_lamar
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer row" role="contentinfo">
		<div class="site-info large-6 columns">
			<?php do_action( 'wp_lamar_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'wp_lamar' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'wp_lamar' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'wp_lamar' ), 'WP Lamar', '<a href="http://www.jasonmgarner.com/" rel="designer">JMG</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>