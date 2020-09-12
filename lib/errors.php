<?php
/**
 * IMAGAGC
 *
 * This file adds the functions for displaying error messages.
 *
 * @package IMAGAGC
 * @author NicBeltramelli | IMAGA
 * @license GPL-2.0-or-later
 * @link  https://github.com/Checo200/IMAGAGC.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Helper function for prettying up errors
 *
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$imagagc_error = function ( $message, $imagagc_subtitle = '', $title = '' ) {

	$docs_url = 'https://github.com/Checo200/IMAGAGC.git/';

	$title = $title ?: esc_html__( 	// phpcs:ignore
		'IMAGAGC &rsaquo; Error',
		'imagagc'
	);

	$footer = sprintf(
		'<a href="%s">%s</a>',
		esc_url( $docs_url ),
		esc_html__(
			'imagagc Documentation',
			'imagagc'
		)
	);

	$message = "<h1>{$title}<br><small>{$imagagc_subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";

	wp_die( tag_escape( $message ) ); // phpcs:ignore Standard.Category.SniffName.ErrorCode.

};

/**
 * Ensure compatible version of PHP is used
 */
if ( version_compare( '7.3', phpversion(), '>=' ) ) {

	$imagagc_error(
		esc_html__(
			'You must be using PHP 7.1 or greater.',
			'imagagc'
		),
		esc_html__(
			'Invalid PHP version',
			'imagagc'
		)
	);
}

/**
 * Ensure compatible version of WordPress is used
 */
if ( version_compare( '5.5', get_bloginfo( 'version' ), '>=' ) ) {

	$imagagc_error(
		esc_html__(
			'You must be using WordPress 5.5 or greater.',
			'imagagc'
		),
		esc_html__(
			'Invalid WordPress version',
			'imagagc'
		)
	);
}

/**
 * Ensure Genesis Framework is installed
 */
$imagagc_parent_theme = wp_get_theme( 'genesis' );

if ( ! $imagagc_parent_theme->exists() ) {

	$imagagc_error(
		esc_html__(
			'You must install Genesis Framework.',
			'imagagc'
		),
		esc_html__(
			'Missing Genesis Framework',
			'imagagc'
		)
	);
}
