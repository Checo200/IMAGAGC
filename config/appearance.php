<?php
/**
 * IMAGAGC
 *
 * This file adds the appearance settings.
 *
 * @package IMAGAGC
 * @author NicBeltramelli | IMAGA
 * @license GPL-2.0-or-later
 * @link  https://github.com/Checo200/IMAGAGC.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$imagagc_default_colors = array(
	'link'   => '#72b8d0',
	'accent' => '#74ade8',
);

$imagagc_link_color = get_theme_mod(
	'imagagc_link_color',
	$imagagc_default_colors['link']
);

$imagagc_accent_color = get_theme_mod(
	'imagagc_accent_color',
	$imagagc_default_colors['accent']
);

return array(
	'fonts-url'            => 'https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,400;0,700;1,400&family=Roboto+Slab:wght@400;500;700&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap',
	'ionicons'             => 'https://unpkg.com/ionicons@5.0.0/dist/ionicons.js',
	'content-width'        => 1800,
	'link-color'           => $imagagc_link_color,
	'default-colors'       => $imagagc_default_colors,
	'editor-color-palette' => array(
		array(
			'name'  => __( 'Accent', 'imagagc' ),
			'slug'  => 'accent',
			'color' => $imagagc_accent_color,
		),
		array(
			'name'  => __( 'White', 'imagagc' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => __( 'Light', 'imagagc' ),
			'slug'  => 'light',
			'color' => '#f4f4f4',
		),
		array(
			'name'  => __( 'Grey', 'imagagc' ),
			'slug'  => 'grey',
			'color' => '#cecece',
		),
		array(
			'name'  => __( 'Dark', 'imagagc' ),
			'slug'  => 'dark',
			'color' => '#28353D',
		),
		array(
			'name'  => __( 'Black', 'imagagc' ),
			'slug'  => 'black',
			'color' => '#1b1b1b',
		),
		array(
			'name'  => __( 'Info', 'imagagc' ),
			'slug'  => 'info',
			'color' => '#0073e5',
		),
		array(
			'name'  => __( 'Danger', 'imagagc' ),
			'slug'  => 'danger',
			'color' => '#ed254e',
		),
		array(
			'name'  => __( 'Success', 'imagagc' ),
			'slug'  => 'success',
			'color' => '#00a37f',
		),
		array(
			'name'  => __( 'Warning', 'imagagc' ),
			'slug'  => 'warning',
			'color' => '#7c6249',
		),
		array(
			'name'  => __( 'Star', 'imagagc' ),
			'slug'  => 'star',
			'color' => '#f2ff49',
		),
		// Brand colors.
		array(
			'name'  => __( 'Brand Color Green', 'imagagc' ),
			'slug'  => 'brand-color-green',
			'color' => ' #9fc760',
		),
		array(
			'name'  => __( 'Brand Color Red', 'imagagc' ),
			'slug'  => 'brand-color-red',
			'color' => '#ef5160',
		),
		array(
			'name'  => __( 'Brand Color Orange', 'imagagc' ),
			'slug'  => 'brand-color-orange',
			'color' => '#f79158',
		),
		array(
			'name'  => __( 'Brand Color Blue', 'imagagc' ),
			'slug'  => 'brand-color-blue',
			'color' => '#72b8d0',
		),

	),
);
