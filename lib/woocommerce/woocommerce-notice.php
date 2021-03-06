<?php
/**
 * IMAGAGC
 *
 * This file adds the "Genesis Connect for WooCommerce" notice.
 *
 * @package IMAGAGC
 * @author NicBeltramelli | IMAGA
 * @license GPL-2.0-or-later
 * @link  https://github.com/Checo200/IMAGAGC.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Remove the default WooCommerce Notice */
add_action(
	'admin_print_styles',
	function () {

		// If below version WooCommerce 2.3.0, exit early.
		if ( ! class_exists( 'WC_Admin_Notices' ) ) {
			return;
		}

		WC_Admin_Notices::remove_notice( 'theme_support' );

	}
);

/**
 * Add a prompt to activate Genesis Connect for WooCommerce
 * if WooCommerce is active but Genesis Connect is not
 */
add_action(
	'admin_notices',
	function () {

		// If WooCommerce isn't installed or Genesis Connect is installed, exit early.
		if ( ! class_exists( 'WooCommerce' ) ||
			function_exists( 'gencwooc_setup' ) ) {

			return;
		}

		// If user doesn't have access, exit early.
		if ( ! current_user_can( 'manage_woocommerce' ) ) {

			return;
		}

		// If message dismissed, exit early.
		if ( get_user_option( 'imagagc_woocommerce_message_dismissed', get_current_user_id() ) ) {

			return;
		}

		$notice_html = sprintf( __( 'Please install and activate <a href="https://wordpress.org/plugins/genesis-connect-woocommerce/" target="_blank">Genesis Connect for WooCommerce</a> to <strong>enable WooCommerce support</strong>.', 'imagagc' ) );

		if ( current_user_can( 'install_plugins' ) ) {

			$plugin_slug  = 'genesis-connect-woocommerce';
			$admin_url    = network_admin_url( 'update.php' );
			$install_link = sprintf(
				'<a href="%s">%s</a>',
				wp_nonce_url(
					add_query_arg(
						array(
							'action' => 'install-plugin',
							'plugin' => $plugin_slug,
						),
						$admin_url
					),
					'install-plugin_' . $plugin_slug
				),
				__(
					'install and activate Genesis Connect for WooCommerce',
					'imagagc'
				)
			);

			// phpcs:disable WordPress.WP.I18n.MissingTranslatorsComment
			$notice_html = sprintf( __( 'Please %1$s to <strong>enable WooCommerce support.</strong>.', 'imagagc' ), $install_link );
		}

		echo '<div class="notice notice-info is-dismissible imagagc-woocommerce-notice"><p>' . wp_kses_post( $notice_html ) . '</p></div>';

	}
);

add_action(
	'wp_ajax_imagagc_dismiss_woocommerce_notice',
	'imagagc_dismiss_woocommerce_notice'
);

/**
 * Add option to dismiss Genesis Connect for WooCommerce plugin install prompt
 */
function imagagc_dismiss_woocommerce_notice() {
	update_user_option( get_current_user_id(), 'imagagc_woocommerce_message_dismissed', 1 );
}

/* Enqueue script to clear the Genesis Connect for WooCommerce plugin install prompt on dismissal */
add_action(
	'admin_enqueue_scripts',
	function () {

		/* Access the wpackio global var */
		global $imagagc_assets;

		/* Main styles */
		$imagagc_assets->enqueue( 'woocommerce', 'notice', array() );

	}
);

add_action(
	'switch_theme',
	'imagagc_reset_woocommerce_notice',
	10,
	2
);

/**
 * Clear the Genesis Connect for WooCommerce plugin install prompt on theme change
 */
function imagagc_reset_woocommerce_notice() {

	global $wpdb;

	$args =
	array(
		'meta_key'   => $wpdb->prefix . 'imagagc_woocommerce_message_dismissed', //phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
		'meta_value' => 1, //phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
	);

	$users = get_users( $args );

	foreach ( $users as $user ) {
		delete_user_option( $user->ID, 'imagagc_woocommerce_message_dismissed' );
	}

}

/**
 * Clear the Genesis Connect for WooCommerce plugin prompt on deactivation
 *
 * @param string $plugin The plugin slug.
 * @param bool   $network_deactivating Whether the plugin is deactivated for all sites in the network. or just the current site.
 */
add_action(
	'deactivated_plugin',
	function ( $plugin, $network_deactivating ) {

		// Conditional check to see if we're deactivating WooCommerce or Genesis Connect for WooCommerce.
		if ( 'woocommerce/woocommerce.php' !== $plugin && 'genesis-connect-woocommerce/genesis-connect-woocommerce.php' !== $plugin ) {
			return;
		}

		imagagc_reset_woocommerce_notice();

	},
	10,
	2
);
