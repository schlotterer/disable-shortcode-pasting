<?php
/**
 * Plugin Name: Disable Shortcode Pasting in Plain Text Blocks
 * Description: Prevents automatic shortcode blocks from being inserted when pasting into plain text blocks like paragraphs or headings.
 * Version: 1.0
 * Author: Your Name
 */

function dsp_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'dsp-shortcode-paste-handler',
        plugin_dir_url(__FILE__) . 'shortcode-paste-handler.js',
        array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
        filemtime(plugin_dir_path(__FILE__) . 'shortcode-paste-handler.js'),
        true
    );
}

add_action('enqueue_block_editor_assets', 'dsp_enqueue_block_editor_assets');
