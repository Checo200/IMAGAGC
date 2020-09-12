<?php
/**
 * IMAGAGC
 *
 * This file adds support for Gutenberg blocks.
 *
 * @package IMAGAGC
 * @author NicBeltramelli | IMAGA
 * @license GPL-2.0-or-later
 * @link  https://github.com/Checo200/IMAGAGC.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Enqueue assets */
add_action(
	'enqueue_block_editor_assets',
	function () {

		/* Access the wpackio global var */
		global $imagagc_assets;

		/* Get CSS handle */
		$assets      = $imagagc_assets->getAssets( 'theme', 'blocks', array() );
		$entry_point = array_pop( $assets['css'] );
		$css_handle  = $entry_point['handle'];

		/* Locate the config file */
		$appearance = genesis_get_config( 'appearance' );

		/* Enqueue Google Fonts */
		wp_enqueue_style(
			genesis_get_theme_handle() . '-editor-fonts',
			$appearance['fonts-url'],
			array(),
			genesis_get_theme_version()
		);

		/* Blocks styles and scripts */
		$imagagc_assets->enqueue( 'theme', 'blocks', array() );

		/* Output inline css */
		$color_link   = get_theme_mod( 'imagagc_link_color', $appearance['default-colors']['link'] );
		$color_accent = get_theme_mod( 'imagagc_accent_color', $appearance['default-colors']['accent'] );

		$css = '';

		$css .= ( $appearance['default-colors']['link'] !== $color_link ) ? sprintf(
			'
			.editor-styles-wrapper a:not(:focus):not(:hover) {
				color: %s;
			}
			',
			$color_link
		) : '';

		$css .= ( $appearance['default-colors']['accent'] !== $color_accent ) ? sprintf(
			'
			.editor-styles-wrapper .has-accent-background-color,
			.editor-styles-wrapper .has-dark-background input[type="submit"] {
				background-color: %1$s;
			}

			.editor-styles-wrapper .has-accent-color {
				color: %1$s;
			}
			',
			$color_accent,
			imagagc_color_contrast( $color_accent )
		) : '';

		if ( $css ) {
			wp_add_inline_style(
				$css_handle,
				$css
			);
		}
	}
);

/* Add support for editor styles */
add_theme_support(
	'editor-styles'
);

/* Locate the config file */
$imagagc_appearance = genesis_get_config( 'appearance' );

/* Add support for editor color palette */
add_theme_support(
	'editor-color-palette',
	$imagagc_appearance['editor-color-palette']
);

/* Disable Custom Colors */
add_theme_support(
	'disable-custom-colors'
);

/* Add support for block alignments */
add_theme_support(
	'align-wide'
);

/* Add support for Responsive Embeds */
add_theme_support(
	'responsive-embeds'
);

/* Disable custom font sizes */
add_theme_support(
	'disable-custom-font-sizes'
);
