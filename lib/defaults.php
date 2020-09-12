<?php
/**
 * IMAGAGC
 *
 * This file configures the default theme settings.
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
 * Set Simple Social Icon defaults
 *
 * @param array $defaults Social style defaults.
 * @return array Modified social style defaults.
 */
add_filter(
	'simple_social_default_styles',
	function ( $defaults ) {

		$args = genesis_get_config( 'simple-social-icons-settings' );

		return wp_parse_args( $args, $defaults );
	}
);
