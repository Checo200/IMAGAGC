<?php
/**
 * IMAGAGC
 *
 * This file adds the Customizer additions.
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
 * Register settings and controls with the Customizer
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
add_action(
	'customize_register',
	function ( $wp_customize ) {

		/* Locate the config file */
		$appearance = genesis_get_config( 'appearance' );

		/* Link color addition */
		$wp_customize->add_setting(
			'imagagc_link_color',
			array(
				'default'           => $appearance['default-colors']['link'],
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'imagagc_link_color',
				array(
					'description' => __( 'Change the default color of post info links, the hover color of linked titles and menu items, and more.', 'imagagc' ),
					'label'       => __( 'Link Color', 'imagagc' ),
					'section'     => 'colors',
					'settings'    => 'imagagc_link_color',
				)
			)
		);

		/* Accent color addition */
		$wp_customize->add_setting(
			'imagagc_accent_color',
			array(
				'default'           => $appearance['default-colors']['accent'],
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'imagagc_accent_color',
				array(
					'description' => __( 'Change the default hovers color for buttons.', 'imagagc' ),
					'label'       => __( 'Accent Color', 'imagagc' ),
					'section'     => 'colors',
					'settings'    => 'imagagc_accent_color',
				)
			)
		);

		/* Logo width addition */
		$wp_customize->add_setting(
			'imagagc_logo_width',
			array(
				'default'           => 250,
				'sanitize_callback' => 'absint',
				'validate_callback' => 'imagagc_validate_logo_width',
			)
		);

		$wp_customize->add_control(
			'imagagc_logo_width',
			array(
				'label'       => __( 'Logo Width', 'imagagc' ),
				'description' => __( 'The maximum width of the logo in pixels.', 'imagagc' ),
				'priority'    => 9,
				'section'     => 'title_tagline',
				'settings'    => 'imagagc_logo_width',
				'type'        => 'number',
				'input_attrs' =>
				array(
					'min' => 100,
				),

			)
		);

		/* Header options addition */
		$wp_customize->add_setting(
			'imagagc_header_options',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'normal',
				'transport'  => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'imagagc_header_options',
				array(

					'label'    => __( 'Header Options', 'imagagc' ),
					'settings' => 'imagagc_header_options',
					'section'  => 'genesis_layout',
					'type'     => 'radio',
					'choices'  =>
					array(
						'normal'          => __( 'Normal', 'imagagc' ),
						'fixed-header'    => __( 'Fixed', 'imagagc' ),
						'floating-header' => __( 'Floating (active from tablet)', 'imagagc' ),
					),
				)
			)
		);
	}
);

/**
 * Display a message if the entered width is not numeric or greater than 100
 *
 * @param object $validity The validity status.
 * @param int    $width The width entered by the user.
 * @return int The new width.
 */
function imagagc_validate_logo_width( $validity, $width ) {

	if ( empty( $width ) || ! is_numeric( $width ) ) {
		$validity->add( 'required', __( 'You must supply a valid number.', 'imagagc' ) );
	} elseif ( $width < 100 ) {
		$validity->add( 'logo_too_small', __( 'The logo width cannot be less than 100.', 'imagagc' ) );
	}

	return $validity;
}
