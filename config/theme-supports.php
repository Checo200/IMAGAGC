<?php
/**
 * IMAGAGC
 *
 * This file adds the desired theme supports
 *
 * @package IMAGAGC
 * @author NicBeltramelli | IMAGA
 * @license GPL-2.0-or-later
 * @link  https://github.com/Checo200/IMAGAGC.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

return array(
	'html5'                           => array(
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
	),
	'genesis-accessibility'           => array(
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	),
	'custom-logo'                     => array(
		'height'      => 120,
		'width'       => 500,
		'flex-height' => true,
		'flex-width'  => true,
	),
	'genesis-after-entry-widget-area' => '',
	'genesis-footer-widgets'          => 4,
	'genesis-menus'                   => array(
		'primary'   => __( 'Header Right', 'imagagc' ),
		'secondary' => __( 'Header Left', 'imagagc' ),
		'tertiary'  => __( 'Footer', 'imagagc' ),
		'topnav'    => __( 'Top Navigation', 'imagagc' ),
	),
);
