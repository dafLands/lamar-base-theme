<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 * https://github.com/devinsays/options-framework-plugin/blob/master/options-check/options.php
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	// Site specific prefix for database
	$current_site = get_current_site();
	$site_prefix = 'g2c' . $current_site->id . '_';

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $site_prefix;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
	// echo $site_prefix;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// If using image radio buttons, define a directory path
	// $imagepath =  get_template_directory_uri() . '/images/';

	global $current_user;
	get_currentuserinfo();

	$options = array();

	if ( $current_user->user_login === 'jgarner') {

		// Theme Options Section - Developer Settings
		$options[] = array(
			'name' => __('Developer Settings', 'options_check'),
			'type' => 'heading');

		// Topbar Setup Array
		$topbarsetup_array = array(
			'one' => __('Contain To Grid', 'options_check'),
			'two' => __('Fixed', 'options_check'),
		);

		// Topbar Setup Defaults
		$topbarsetup_defaults = array(
			'one' => '1'
		);

		// Topbar Options
		$options[] = array(
			'name' => __('Top Bar Setup', 'options_check'),
			'desc' => __('Configure the foundation settings for the top bar.', 'options_check'),
			'id' => 'topbar_setup',
			'std' => $topbarsetup_defaults, // These items get checked by default
			'type' => 'multicheck',
			'options' => $topbarsetup_array
		);
	}

	$options[] = array(
		'name' => __('Branding Options', 'options_check'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('Uploader Test', 'options_check'),
		'desc' => __('This creates a full size uploader that previews the image.', 'options_check'),
		'id' => 'logo_uploader',
		'type' => 'upload'
	);


	return $options;
}