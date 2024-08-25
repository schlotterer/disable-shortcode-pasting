<?php
/**
 * Plugin Name: Disable Shortcode Block Creation when Pasting in Plain Text Blocks
 * Description: Prevents new shortcode blocks from being inserted when pasting shortcodes into plain text blocks like paragraphs or headings.
 * Version: 1.0
 * Author: Joel Schlotterer
 * Author URI: https://yourwebsite.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 6.5
 * Tested up to: 6.6.1
 * Requires PHP: 8.0
 * Tags: shortcode, paste, block editor, gutenberg, content
 * Text Domain: disable-shortcode-pasting
 * Domain Path: /languages
 */

namespace Flexline\DisableShortcodePasting;

// Enqueue the block editor script
function enqueue_block_editor_assets() {
    // Dependencies explained:
    // - 'wp-blocks': Provides essential functions for registering and working with blocks.
    // - 'wp-dom-ready': Ensures that the script is executed when the DOM is fully loaded.
    // - 'wp-edit-post': Provides editor-level functionalities and controls used for block management.

    wp_enqueue_script(
        'dsp-shortcode-paste-handler',
        plugin_dir_url(__FILE__) . 'shortcode-paste-handler.js',
        array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'), // Specify dependencies
        filemtime(plugin_dir_path(__FILE__) . 'shortcode-paste-handler.js'), // Cache busting based on file modification time
        true // Load in the footer for better performance
    );
}

add_action('enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_block_editor_assets');
