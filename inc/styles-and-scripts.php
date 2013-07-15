<?php

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
		wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js' );

		// Load JavaScripts

		// Foundation Scripts
		wp_enqueue_script( 'modernizr', get_template_directory_uri().'/js/vendor/custom.modernizr.js', null, '2.1.0');
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation/foundation.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-alerts', get_template_directory_uri() . '/js/foundation/foundation.alerts.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-clearing', get_template_directory_uri() . '/js/foundation/foundation.clearing.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-cookie', get_template_directory_uri() . '/js/foundation/foundation.cookie.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-dropdown', get_template_directory_uri() . '/js/foundation/foundation.dropdown.js', null, '4.0', true );
		wp_enqueue_script( 'foundation-forms', get_template_directory_uri() . '/js/foundation/foundation.forms.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-interchange', get_template_directory_uri() . '/js/foundation/foundation.interchange.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-joyride', get_template_directory_uri() . '/js/foundation/foundation.joyride.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-magellan', get_template_directory_uri() . '/js/foundation/foundation.magellan.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-orbit', get_template_directory_uri() . '/js/foundation/foundation.orbit.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-placeholder', get_template_directory_uri() . '/js/foundation/foundation.placeholder.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-reveal', get_template_directory_uri() . '/js/foundation/foundation.reveal.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-section', get_template_directory_uri() . '/js/foundation/foundation.section.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-tooltips', get_template_directory_uri() . '/js/foundation/foundation.tooltips.js', null, '4.0', true );
		// wp_enqueue_script( 'foundation-topbar', get_template_directory_uri() . '/js/foundation/foundation.topbar.js', null, '4.0', true );


		// _s Script
		wp_enqueue_script( 'wp_lamar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
		// wp_enqueue_script( 'wp_lamar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( is_singular() && wp_attachment_is_image() ) {
			wp_enqueue_script( 'wp_lamar-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
		}

		wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', null, '1.0', true );

		// Load Google Fonts API
		// wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300' );

	}

}

add_action( 'wp_enqueue_scripts', 'wp_lamar_scripts' );

endif;

/**
 // Initialise Foundation JS
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

// if ( ! function_exists( 'foundation_comptability' ) ) :

// function foundation_comptability () {
// 	echo "<script>";
// 	echo "document.write('<script src=' +";
// 	echo "('__proto__' in {} ? '" . get_template_directory_uri() . "/js/vendor/zepto" . "' : '" . get_template_directory_uri() . "/js/vendor/jquery" . "') +";
// 	echo "'.js><\/script>')";
// 	echo "</script>";
// }

// add_action('wp_footer', 'foundation_comptability', 10);

// endif;
