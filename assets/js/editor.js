const { __ } = wp.i18n;

wp.domReady( () => {

	// Unregister default button styles
	wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );

	// Register custom button styles
	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'default',
		label: __('Default', 'block-editor-customizations'),
		isDefault: true,
	});
	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'full-width',
		label: __('Full Width', 'block-editor-customizations'),
	} );

} );
