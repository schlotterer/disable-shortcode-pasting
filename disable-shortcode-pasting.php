<?php
/**
 * Plugin Name: Disable Shortcode Pasting in Plain Text Blocks
 * Description: Prevents automatic shortcode blocks from being inserted when pasting shortcodes into plain text blocks like paragraphs or headings.
 * Version: 1.0
 * Author: Joel Schlotterer
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Flexline\DisableShortcodePasting;

// Enqueue the block editor script
function enqueue_block_editor_assets() {
    wp_enqueue_script(
        'dsp-shortcode-paste-handler',
        plugin_dir_url(__FILE__) . 'shortcode-paste-handler.js',
        array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
        filemtime(plugin_dir_path(__FILE__) . 'shortcode-paste-handler.js'),
        true
    );
}

add_action('enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_block_editor_assets');
