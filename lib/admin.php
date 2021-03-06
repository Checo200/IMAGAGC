<?php
/**
 * IMAGAGC
 *
 * This file adds the admin dashboard setting.
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
 * Remove output of header and front page breadcrumb settings in the Customizer
 *
 * @param array $config Original Customizer items.
 * @return array Filtered Customizer items.
 */
add_filter(
	'genesis_customizer_theme_settings_config',
	function ( $config ) {

		unset( $config['genesis']['sections']['genesis_header'] );
		unset( $config['genesis']['sections']['genesis_breadcrumbs']['controls']['breadcrumb_front_page'] );

		return $config;
	}
);
