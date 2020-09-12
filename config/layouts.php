<?php
/**
 * IMAGAGC
 *
 * This file overrides `genesis/config/layouts.php` to set default theme layouts.
 *
 * @package IMAGAGC
 * @author NicBeltramelli | IMAGA
 * @license GPL-2.0-or-later
 * @link  https://github.com/Checo200/IMAGAGC.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$imagagc_layouts = array();

$imagagc_layouts_config = PARENT_DIR . '/config/layouts.php';

if ( is_readable( $imagagc_layouts_config ) ) {
	$imagagc_layouts = require $imagagc_layouts_config;
	unset( $imagagc_layouts['content-sidebar-sidebar'] );
	unset( $imagagc_layouts['sidebar-sidebar-content'] );
	unset( $imagagc_layouts['sidebar-content-sidebar'] );
}

return $imagagc_layouts;
