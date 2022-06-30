<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SweetWeb
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );