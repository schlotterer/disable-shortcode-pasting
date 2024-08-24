wp.domReady(() => {
	// Define the blocks that should be treated as plain text blocks.
	const allowedPlainTextBlocks = [
		'core/paragraph',
		'core/heading',
		'core/quote',
		'core/list',
		'core/preformatted',
	];

	// Subscribe to the WordPress editor data store to monitor changes.
	wp.data.subscribe(() => {
		const { isTyping, getSelectedBlock } = wp.data.select('core/block-editor');

		// Only proceed if the user is not currently typing.
		if (!isTyping()) {
			const block = getSelectedBlock();
			// Check if the currently selected block is one of the allowed plain text blocks.
			if (block && allowedPlainTextBlocks.includes(block.name)) {
				const blockElement = document.querySelector(`[data-block="${block.clientId}"]`);

				if (blockElement) {
					// Remove any existing paste listener first to prevent duplication.
					blockElement.removeEventListener('paste', handlePaste);

					// Add a new paste event listener to handle the shortcode paste logic.
					blockElement.addEventListener('paste', handlePaste, { once: true });
				}
			}
		}
	});

	/**
	 * Handle the paste event and prevent shortcode blocks from being automatically inserted.
	 *
	 * @param {ClipboardEvent} event The paste event triggered by the user.
	 */
	function handlePaste(event) {
		// Get the pasted content from the clipboard as plain text.
		const clipboardData = event.clipboardData.getData('text');

		// Check if the pasted content contains a shortcode (e.g., [shortcode]).
		if (/\[[^\]]+\]/.test(clipboardData)) {
			event.preventDefault(); // Stop the default paste behavior.

			// Get the current text selection range.
			const selection = window.getSelection();
			if (selection.rangeCount > 0) {
				const range = selection.getRangeAt(0); // Get the first range.
				range.deleteContents(); // Remove any selected content.
				range.insertNode(document.createTextNode(clipboardData)); // Insert the pasted content as plain text.

				// Update the block's content in the Gutenberg editor.
				const blockId = event.target.closest('[data-block]').dataset.block;
				const blockElement = document.querySelector(`[data-block="${blockId}"]`);

				// Dispatch an update to refresh the block's content.
				wp.data.dispatch('core/block-editor').updateBlockAttributes(blockId, {
					content: blockElement.innerText,
				});
			}
		}
	}
});
