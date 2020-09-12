<?php
/**
 * IMAGAGC
 *
 * This file adds the responsive menus settings (Requires Genesis 3.0+).
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
	'script' => array(
		'mainMenu'         => __( 'Menu', 'imagagc' ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', 'imagagc' ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',

		'menuClasses'      => array(
			'combine' => array(
				'.nav-secondary',
				'.nav-primary',
			),
			'others'  => array(),
		),
	),
	'extras' => array(
		'media_query_width' => '900px',
	),
);
