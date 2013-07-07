<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package wp_lamar
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<?php
		/**
		* http://foundation.zurb.com/docs/components/top-bar.html
		*
		* Configure the top bar in the theme options.
		*/
		$classes = 'top-bar-container';
		if ( function_exists( 'of_get_option' ) ) {
			$topbar_setup = of_get_option('topbar_setup', 'none');
			if ( $topbar_setup['one'] == 1 )
				$classes .= ' contain-to-grid';
			if ( $topbar_setup['two'] == 1 )
				$classes .= ' fixed';

			// Get the Logo upload src
			$logo_src = of_get_option( 'logo_uploader' );
		}
		 ?>
		<div class="<?php echo $classes; ?>">
			<nav id="site-navigation" class="top-bar navigation-main" role="navigation">
				<ul class="title-area site-branding">
				<?php
					if ( $logo_src != null ) : ?>
					<li class="name logo">
						<img src="<?php echo $logo_src; ?>" alt="">
					<?php else: ?>
					<li class="name">
				<?php endif; ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</li>
					<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
				</ul>
				<section class="top-bar-section">
					<h1 class="menu-toggle"><?php _e( 'Menu', 'wp_lamar' ); ?></h1>
					<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'wp_lamar' ); ?>"><?php _e( 'Skip to content', 'wp_lamar' ); ?></a></div>

					<?php
					if ( has_nav_menu( 'primary' ) ) {
						$args = array(
							'theme_location' => 'primary',
							'container' => '',
							'items_wrap' => '<ul class="right"><li>%3$s</li></ul>',
							'echo' => true,
							'walker' => new top_bar_walker
							);
						wp_nav_menu( $args );
					} else {
						wp_nav_menu();
					}
					?>
				</section>
			</nav><!-- #site-navigation -->
		</div><!-- .top-bar-container -->
	</header><!-- #masthead -->

	<div id="main" class="site-main">
