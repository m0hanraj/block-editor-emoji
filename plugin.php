<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since 1.0.0
 * @package mp-bee-emoji
 *
 * @wordpress-plugin
 * Plugin Name:       Block Editor Emoji 😇 
 * Description:       Allows writers to add emojis to the block editor.
 * Version:           1.0.0
 * Author:            Mohan raj
 * Author URI:        https://mohanraj.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mp-bee-emoji
 */

declare( strict_types = 1 );

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * API and Plugin version constants.
 */
define( 'MP_WP_EMOJI_PLUGIN_VERSION', '0.1.0' );
define( 'MP_WP_EMOJI_PLUGIN_PATH', __FILE__ );
define( 'MP_WP_EMOJI_BASENAME', plugin_basename( __FILE__ ) );


add_action( 'enqueue_block_editor_assets', 'mopac_bee_enqueue_block_scripts' );

/**
 * Block Editor
 *
 * @return void
 */
function mopac_bee_enqueue_block_scripts(): void {
		$plugin_url = plugin_dir_url( MP_WP_EMOJI_PLUGIN_PATH );
		// Should be 'require_once' to align with WP recommendations.
		$script_asset_file = require_once plugin_dir_path( MP_WP_EMOJI_PLUGIN_PATH ) . 'build/index.asset.php'; // @phpcs:ignore

		wp_enqueue_script(
			'mp-wp-emoji',
			$plugin_url . 'build/index.js',
			$script_asset_file['dependencies'],
			$script_asset_file['version'],
			true
		);



		wp_enqueue_style(
			'mp-wp-emoji',
			$plugin_url . 'build/index.css',
			[],
			$script_asset_file['version']
		);

}

