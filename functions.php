<?php
/**
 * sweetchild Child Theme functions and definitions
 *
 * @package sweetchildChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();
	// Grab asset urls.
	$theme_styles  = "/css/child-theme.css";
	$theme_scripts = "/js/child-theme.js";

	wp_enqueue_style( 'child-sweetchild-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-sweetchild-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}




/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'sweetchild-child', get_stylesheet_directory() . '/languages' );
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function sweetchild_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_sweetchild_bootstrap_version', 'sweetchild_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function sweetchild_child_customize_controls_js() {
	wp_enqueue_script(
		'sweetchild_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'sweetchild_child_customize_controls_js' );
