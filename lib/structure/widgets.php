<?php
/**
 * IMAGAGC
 *
 * This file adds the widgets settings.
 *
 * @package IMAGAGC
 * @author NicBeltramelli | IMAGA
 * @license GPL-2.0-or-later
 * @link  https://github.com/Checo200/IMAGAGC.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Remove header right widget area */
unregister_sidebar(
	'header-right'
);

/* Remove secondary sidebar */
unregister_sidebar(
	'sidebar-alt'
);

/* Register privacy widget area */
genesis_register_sidebar(
	array(
		'id'          => 'privacy',
		'name'        => __( 'Privacy', 'imagagc' ),
		'description' => __( 'This area is designed to display the Privacy sidebar menu.', 'imagagc' ),
	)
);
