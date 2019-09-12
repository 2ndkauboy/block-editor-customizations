<?php
/**
 * Block Editor Customizations
 *
 * @package     Block_Editor_Customizations
 * @author      Bernhard Kau
 * @license     GPLv3
 *
 * @wordpress-plugin
 * Plugin Name: Block Editor Customizations
 * Plugin URI: https://kau-boys.de
 * Description: Some customizations of core blocks
 * Version: 0.1
 * Author: Bernhard Kau
 * Author URI: https://kau-boys.de
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * Register Gutenberg scripts and styles
 *
 * @link https://www.billerickson.net/block-styles-in-gutenberg/
 */
function block_editor_customizations_gutenberg_register_scripts() {
	wp_register_script(
		'block-editor-customizations-editor',
		plugins_url( 'assets/js/editor.js', __FILE__ ),
		array( 'wp-blocks', 'wp-dom', 'wp-i18n' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/editor.js' ),
		true
	);

	wp_register_style(
		'block-editor-customizations-editor',
		plugins_url( 'assets/css/editor.css', __FILE__ ),
		array(),
		filemtime( plugin_dir_path( __FILE__ ) . 'assets/css/editor.css' )
	);

	wp_set_script_translations( 'block-editor-customizations-editor', 'block-editor-customizations', plugin_dir_path( __FILE__ ) . 'languages' );

	register_block_type(
		'core/button',
		array(
			'style'  => 'block-editor-customizations-editor',
			'script' => 'block-editor-customizations-editor',
		)
	);
}
add_action( 'enqueue_block_editor_assets', 'block_editor_customizations_gutenberg_register_scripts' );

/**
 * Enqueue frontend scripts
 */
function block_editor_customizations_wp_register_scripts() {
	wp_register_style(
		'block-editor-customizations-editor',
		plugins_url( 'assets/css/editor.css', __FILE__ ),
		array(),
		filemtime( plugin_dir_path( __FILE__ ) . 'assets/css/editor.css' )
	);
	wp_enqueue_style( 'block-editor-customizations-editor' );
}
add_action( 'wp_enqueue_scripts', 'block_editor_customizations_wp_register_scripts' );
