<?php
/**
 * IMAGAGC
 *
 * This file sets localization, defines constants and features.
 *
 * @package IMAGAGC
 * @author NicBeltramelli | IMAGA
 * @license GPL-2.0-or-later
 * @link  https://github.com/Checo200/IMAGAGC.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Set localization */
add_action(
	'after_setup_theme',
	function () {

		load_child_theme_textdomain( 'imagagc', get_stylesheet_directory() . '/languages' );

	}
);

/**
 * Add theme supports
 *
 * See config file at `config/theme-supports.php`.
 */
add_action(
	'after_setup_theme',
	function () {

		$theme_supports = genesis_get_config( 'theme-supports' );
		foreach ( $theme_supports as $feature => $args ) {
			add_theme_support( $feature, $args );
		}
	},
	9
);

add_action(
	'after_setup_theme',
	'imagagc_content_width',
	0
);

/**
 * Set the maximum allowed width for any embedded content
 */
function imagagc_content_width() {

	/* Locate the config file */
	$appearance = genesis_get_config( 'appearance' );

	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- See https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/924
	$GLOBALS['content_width'] = apply_filters( 'imagagc_content_width', $appearance['content-width'] );

}
