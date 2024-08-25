# Disable Automatic Shortcode Blocks on Paste
Prevent the block editor from automatically inserting shortcode blocks when pasting shortcodes into plain text blocks like paragraphs, headings, and quotes.

## Plugin Overview
**Contributors:** guerilladesigns  
**Tags:** shortcode, paste, block editor, gutenberg, content  
**Requires at least:** 6.5  
**Tested up to:** 6.6.1  
**Stable tag:** 1.0  
**Requires PHP:** 8.0  
**License:** GPLv2 or later  
**License URI:** [https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html)

## Description
This plugin stops the block editor from automatically turning pasted shortcodes into dedicated shortcode blocks. Instead, when pasting shortcodes into plain text blocks like paragraphs, headings, or quotes, the shortcode remains inline with the text. This is especially useful when you want shortcodes to blend seamlessly with other content.

### How It Works
The plugin targets specific blocks known for handling plain text:
```javascript
const allowedPlainTextBlocks = [
  'core/paragraph',
  'core/heading',
  'core/quote',
  'core/list',
  'core/preformatted'
];
```
When a shortcode is pasted into one of these blocks, it remains inline as text, preventing the editor from wrapping it in a new shortcode block.

## Installation
1. Upload the plugin files to the `/wp-content/plugins/disable-shortcode-pasting` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. That’s it! The plugin runs automatically in the background.

## Frequently Asked Questions

### Will this affect the functionality of my shortcodes?
No. Shortcodes will still work as expected on the front end. The plugin only changes how shortcodes behave when pasted in the block editor.

### Is this compatible with all blocks?
This plugin specifically targets plain text blocks such as paragraphs, headings, and quotes. In other block types, shortcodes may still be converted into shortcode blocks.

## Changelog
### 1.0
* Initial release.

## Upgrade Notice
### 1.0
First release.

## License
This plugin is licensed under the GPLv2 or later. For more details, visit the [License URI](https://www.gnu.org/licenses/gpl-2.0.html).
