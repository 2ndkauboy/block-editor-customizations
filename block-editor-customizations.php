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
 * Set the Block Editor translations
 */
function block_editor_customizations_set_script_translations() {
	wp_set_script_translations( 'block-editor-customizations-editor', 'block-editor-customizations', plugin_dir_path( __FILE__ ) . 'languages' );
}
add_action( 'init', 'block_editor_customizations_set_script_translations' );

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
}
add_action( 'init', 'block_editor_customizations_gutenberg_register_scripts' );

/**
 * Enqueue scripts
 */
function block_editor_customizations_gutenberg_enqueue_scripts() {
	wp_enqueue_script( 'block-editor-customizations-editor' );
}
add_action( 'enqueue_block_editor_assets', 'block_editor_customizations_gutenberg_enqueue_scripts' );
