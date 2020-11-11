<?php
/**
 * IMAGAGC
 *
 * Your custom functions goes here.
 *
 * @package IMAGAGC
 * @author NicBeltramelli | IMAGA
 * @license GPL-2.0-or-later
 * @link  https://github.com/Checo200/IMAGAGC.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Disable all Google Font enqueuing
add_filter( 'stackable_enqueue_font', '__return_false' );
