<?php

function lamar_template_path() {
	return Lamar_Wrapping::$main_template;
}

function lamar_template_base() {
	return Lamar_Wrapping::$base;
}


class Lamar_Wrapping {

	/**
	 * Stores the full path to the main template file
	 */
	static $main_template;

	/**
	 * Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
	 */
	static $base;

	static function wrap( $template ) {
		self::$main_template = $template;

		self::$base = substr( basename( self::$main_template ), 0, -4 );

		if ( 'index' == self::$base )
			self::$base = false;

		$templates = array( 'lamar.php' );

		if ( self::$base )
			array_unshift( $templates, sprintf( 'lamar-%s.php', self::$base ) );

		return locate_template( $templates );
	}
}

add_filter( 'template_include', array( 'Lamar_Wrapping', 'wrap' ), 99 );