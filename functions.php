<?php
/**
 * wp_lamar functions and definitions
 *
 * @package wp_lamar
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 940; /* pixels */

if ( ! function_exists( 'wp_lamar_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function wp_lamar_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on wp_lamar, use a find and replace
	 * to change 'wp_lamar' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wp_lamar', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wp_lamar' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'wp_lamar_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // wp_lamar_setup
add_action( 'after_setup_theme', 'wp_lamar_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function wp_lamar_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wp_lamar' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'wp_lamar_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function wp_lamar_styles() {
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.css' );
	wp_enqueue_style( 'wp_lamar-style', get_stylesheet_uri() );

	// wp_enqueue_script( '', get_template_directory_uri() . '/js/', array(), '20130703', true );





}
add_action( 'wp_enqueue_scripts', 'wp_lamar_styles' );

if ( ! function_exists( 'wp_lamar_scripts' ) ) :

function wp_lamar_scripts() {

	if (!is_admin()) {

		/**
		 * Deregister jQuery in favour of ZeptoJS
		 * jQuery will be used as a fallback if ZeptoJS is not compatible
		 * @see foundation_compatibility & http://foundation.zurb.com/docs/javascript.html
		 */
		wp_deregister_script('jquery');

		// Load JavaScripts

		// Foundation Scripts
		wp_enqueue_script( 'modernizr', get_template_directory_uri().'/js/vendor/custom.modernizr.js', null, '2.1.0');
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation/foundation.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-alerts', get_template_directory_uri() . '/js/foundation/foundation.alerts.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-clearing', get_template_directory_uri() . '/js/foundation/foundation.clearing.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-cookie', get_template_directory_uri() . '/js/foundation/foundation.cookie.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-dropdown', get_template_directory_uri() . '/js/foundation/foundation.dropdown.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-forms', get_template_directory_uri() . '/js/foundation/foundation.forms.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-interchange', get_template_directory_uri() . '/js/foundation/foundation.interchange.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-joyride', get_template_directory_uri() . '/js/foundation/foundation.joyride.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-magellan', get_template_directory_uri() . '/js/foundation/foundation.magellan.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-orbit', get_template_directory_uri() . '/js/foundation/foundation.orbit.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-placeholder', get_template_directory_uri() . '/js/foundation/foundation.placeholder.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-reveal', get_template_directory_uri() . '/js/foundation/foundation.reveal.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-section', get_template_directory_uri() . '/js/foundation/foundation.section.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-tooltips', get_template_directory_uri() . '/js/foundation/foundation.tooltips.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-topbar', get_template_directory_uri() . '/js/foundation/foundation.topbar.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-index', get_template_directory_uri() . '/js/foundation/index.js', null, '4.0', true );


		// _s Script
		wp_enqueue_script( 'wp_lamar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
		// wp_enqueue_script( 'wp_lamar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( is_singular() && wp_attachment_is_image() ) {
			wp_enqueue_script( 'wp_lamar-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
		}


		// Load Google Fonts API
		// wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300' );

	}

}

add_action( 'wp_enqueue_scripts', 'wp_lamar_scripts' );

endif;

/**
 * Initialise Foundation JS
 * @see: http://foundation.zurb.com/docs/javascript.html
 */

if ( ! function_exists( 'foundation_js_init' ) ) :

function foundation_js_init () {
    echo '<script>$(document).foundation();</script>';
}

add_action('wp_footer', 'foundation_js_init', 50);

endif;

/**
 * ZeptoJS and jQuery Fallback
 * @see: http://foundation.zurb.com/docs/javascript.html
 */

if ( ! function_exists( 'foundation_comptability' ) ) :

function foundation_comptability () {

echo "<script>";
echo "document.write('<script src=' +";
echo "('__proto__' in {} ? '" . get_template_directory_uri() . "/js/vendor/zepto" . "' : '" . get_template_directory_uri() . "/js/vendor/jquery" . "') +";
echo "'.js><\/script>')";
echo "</script>";

}

add_action('wp_footer', 'foundation_comptability', 10);

endif;

/**
 * Remove Class from Sticky Post
 */

if ( ! function_exists( 'foundation_remove_sticky' ) ) :

function foundation_remove_sticky($classes) {
  $classes = array_diff($classes, array("sticky"));
  return $classes;
}

add_filter('post_class','foundation_remove_sticky');

endif;


// Includes

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * WordPress.com-specific functions and definitions.
 */
//require get_template_directory() . '/inc/wpcom.php';

/**
 * Lamar - Theme wrapper functions
 */
require get_template_directory() . '/inc/lamar-wrapper.php';

/**
 * Lamar - Custom menu setup
 */
// require get_template_directory() . '/inc/lamar-menus.php';

/**
 * Lamar - Custom menu setup for foundation
 * https://gist.github.com/awshout/3943026
 */
require get_template_directory() . '/inc/lamar-top-bar-walker.php';

/**
 * Lamar - Breadcrumbs
 */
require get_template_directory() . '/inc/lamar-breadcrumb-trail.php';

/**
 * Lamar - Custom Menu Widget
 */
// require get_template_directory() . '/inc/lamar-widget-nav-menu.php';