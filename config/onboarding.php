<?php
/**
 * IMAGAGC
 *
 * Onboarding config to load plugins and sample contents on theme activation.
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
	'dependencies' => array(
		'plugins' => array(
			array(
				'name'       => __( 'Genesis Connect for WooCommerce', 'imagagc' ),
				'slug'       => 'genesis-connect-woocommerce/genesis-connect-woocommerce.php',
				'public_url' => 'https://wordpress.org/plugins/genesis-connect-woocommerce/',
			),
			array(
				'name'       => __( 'Simple Social Icons', 'imagagc' ),
				'slug'       => 'simple-social-icons/simple-social-icons.php',
				'public_url' => 'https://wordpress.org/plugins/simple-social-icons/',
			),
			array(
				'name'       => __( 'WooCommerce', 'imagagc' ),
				'slug'       => 'woocommerce/woocommerce.php',
				'public_url' => 'https://wordpress.org/plugins/woocommerce/',
			),
		),
	),
	'content'      => array(
		'homepage' => array(
			'post_title'     => 'imagagc',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/imagagc.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'page-templates/page-landing.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array(
				'_genesis_hide_title'       => true,
				'_genesis_hide_breadcrumbs' => true,
			),
		),
	),
	'widgets'      => array(
		'footer-1' => array(
			array(
				'type' => 'text',
				'args' => array(
					'title'  => 'Footer 1',
					'text'   => '<p>Maecenas convallis ultrices ex ut bibendum. Nam placerat mi ac purus maximus, nec tincidunt elit posuere. Donec facilisis urna id egestas hendrerit. Etiam in leo ullamcorper, efficitur libero et, egestas quam.</p>',
					'filter' => 1,
					'visual' => 1,
				),
			),
		),
		'footer-2' => array(
			array(
				'type' => 'text',
				'args' => array(
					'title'  => 'Footer 2',
					'text'   => '<p>Maecenas convallis ultrices ex ut bibendum. Nam placerat mi ac purus maximus, nec tincidunt elit posuere. Donec facilisis urna id egestas hendrerit. Etiam in leo ullamcorper, efficitur libero et, egestas quam.</p>',
					'filter' => 1,
					'visual' => 1,
				),
			),
		),
		'footer-3' => array(
			array(
				'type' => 'text',
				'args' => array(
					'title'  => 'Footer 3',
					'text'   => '<p>Maecenas convallis ultrices ex ut bibendum. Nam placerat mi ac purus maximus, nec tincidunt elit posuere. Donec facilisis urna id egestas hendrerit. Etiam in leo ullamcorper, efficitur libero et, egestas quam.</p>',
					'filter' => 1,
					'visual' => 1,
				),
			),
		),
	),
);
