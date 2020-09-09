<?php
/**
 * Zen
 *
 * This file adds the appearance settings.
 *
 * @package IMAGAGC
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$zen_default_colors = [
	'link'   => '#72b8d0',
	'accent' => '#74ade8',
];

$zen_link_color = get_theme_mod(
	'zen_link_color',
	$zen_default_colors['link']
);

$zen_accent_color = get_theme_mod(
	'zen_accent_color',
	$zen_default_colors['accent']
);

return [
	'fonts-url'            => 'https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,400;0,700;1,400&family=Roboto+Slab:wght@400;500;700&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap',
	'ionicons'             => 'https://unpkg.com/ionicons@5.0.0/dist/ionicons.js',
	'content-width'        => 1800,
	'link-color'           => $zen_link_color,
	'default-colors'       => $zen_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Accent', 'zen' ),
			'slug'  => 'accent',
			'color' => $zen_accent_color,
		],
		[
			'name'  => __( 'White', 'zen' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		],
		[
			'name'  => __( 'Light', 'zen' ),
			'slug'  => 'light',
			'color' => '#f4f4f4',
		],
		[
			'name'  => __( 'Grey', 'zen' ),
			'slug'  => 'grey',
			'color' => '#cecece',
		],
		[
			'name'  => __( 'Dark', 'zen' ),
			'slug'  => 'dark',
			'color' => '#28353D',
		],
		[
			'name'  => __( 'Black', 'zen' ),
			'slug'  => 'black',
			'color' => '#1b1b1b',
		],
		[
			'name'  => __( 'Info', 'zen' ),
			'slug'  => 'info',
			'color' => '#0073e5',
		],
		[
			'name'  => __( 'Danger', 'zen' ),
			'slug'  => 'danger',
			'color' => '#ed254e',
		],
		[
			'name'  => __( 'Success', 'zen' ),
			'slug'  => 'success',
			'color' => '#00a37f',
		],
		[
			'name'  => __( 'Warning', 'zen' ),
			'slug'  => 'warning',
			'color' => '#7c6249',
		],
		[
			'name'  => __( 'Star', 'zen' ),
			'slug'  => 'star',
			'color' => '#f2ff49',
		],
		// Brand colors
		[
			'name'  => __( 'Brand Color Green', 'zen' ),
			'slug'  => 'brand-color-green',
			'color' => ' #9fc760',
		],
		[
			'name'  => __( 'Brand Color Red', 'zen' ),
			'slug'  => 'brand-color-red',
			'color' => '#ef5160',
		],
		[
			'name'  => __( 'Brand Color Orange', 'zen' ),
			'slug'  => 'brand-color-orange',
			'color' => '#f79158',
		],
		[
			'name'  => __( 'Brand Color Blue', 'zen' ),
			'slug'  => 'brand-color-blue',
			'color' => '#72b8d0',
		],

	],
];
