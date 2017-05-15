<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 *
 * @link http://metabox.io/docs/registering-meta-boxes/
 */


add_filter( 'rwmb_meta_boxes', 'cbc_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function cbc_register_meta_boxes( $meta_boxes ) {
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'cbc_';
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'slider',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Main Slider', 'cbc' ),

		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',

		// Auto save: true, false (default). Optional.
		'autosave'   => true,

		// List of meta fields
		'fields'     => array(
			// IMAGE UPLOAD
			array(
				'id'               => "{$prefix}slider_images",
				'name'             => esc_html__( 'Slider Images', 'cbc' ),
				'type'             => 'image_advanced',
				'force_delete'     => false,
				'max_file_uploads' => 10,
				'max_status'       => true,
			),
			// TEXTAREA
			array(
				'name'  => esc_html__( 'Image Captions', 'cbc' ),
				'label_description' => esc_html__( 'Should have one caption for each image', 'cbc' ),
				'desc'  => esc_html__( 'You can add basic HTML tags', 'cbc' ),
				'id'    => "{$prefix}slider_captions",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'clone' => true,
			),
			// DIVIDER
			array(
				'type' => 'divider',
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Slider Width', 'cbc' ),
				'label_description' => esc_html__( 'Default Max Width is 1600 pixels', 'cbc' ),
				'desc'  => esc_html__( 'In Pixels', 'cbc' ),
				'id'    => "{$prefix}slider_width",
				'type'  => 'text',
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Slider Ratio', 'cbc' ),
				'desc'  => esc_html__( '(Width in pixels)/(Height in pixels)', 'cbc' ),
				'id'    => "{$prefix}slider_ratio",
				'type'  => 'text',
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Slider Auto Play', 'cbc' ),
				'desc'  => esc_html__( 'Enter "false" or time in milliseconds', 'cbc' ),
				'id'    => "{$prefix}slider_autoplay",
				'type'  => 'text',
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Slider Transition Speed', 'cbc' ),
				'desc'  => esc_html__( 'Enter time in milliseconds', 'cbc' ),
				'id'    => "{$prefix}slider_transition",
				'type'  => 'text',
			),
		),
	);
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'section_main',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Main Section', 'cbc' ),

		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'post', 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',

		// Auto save: true, false (default). Optional.
		'autosave'   => true,

		// List of meta fields
		'fields'     => array(
			// HIDDEN
			array(
				'id'   => "{$prefix}section_main_type",
				'type' => 'hidden',
				// Hidden field must have predefined value
				'std'  => 'standard',
			),
			// SELECT BOX
			array(
				'name'        => esc_html__( 'Select Call To Action Type', 'cbc' ),
				'id'          => "{$prefix}section_main_cta_type",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'none' => esc_html__( 'None', 'cbc' ),
					'standard' => esc_html__( 'Standard', 'cbc' ),
					'emphesis' => esc_html__( 'Emphesis', 'cbc' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'none',
				/*'placeholder' => esc_html__( 'Select an Item', 'cbc' ),*/
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Call To Action Text', 'cbc' ),
				'id'    => "{$prefix}section_main_cta_text",
				'type'  => 'text',
			),
			// URL
			array(
				'name' => esc_html__( 'Call To Action URL', 'cbc' ),
				'id'   => "{$prefix}section_main_cta_url",
				/*'desc' => esc_html__( 'URL description', 'cbc' ),*/
				'type' => 'url',
				'std'  => 'http://classicalballetconservatory.com',
			),
			// DIVIDER
			array(
				'type' => 'divider',
			),
			// IMAGE UPLOAD
			array(
				'id'               => "{$prefix}section_main_bg",
				'name'             => esc_html__( 'Background Image', 'cbc' ),
				'type'             => 'image_advanced',

				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,

				// Maximum image uploads
				'max_file_uploads' => 1,

				// Display the "Uploaded 1/2 files" status
				'max_status'       => false,
			),
		),
	);
	

	for($i = 1; $i <= 5; $i++) {
		$meta_boxes[] = array(
			// Meta box id, UNIQUE per meta box. Optional since 4.1.5
			'id'         => 'section_'.$i,
	
			// Meta box title - Will appear at the drag and drop handle bar. Required.
			'title'      => esc_html__( 'Section '.$i, 'cbc' ),
	
			// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
			'post_types' => array( 'page' ),
	
			// Where the meta box appear: normal (default), advanced, side. Optional.
			'context'    => 'normal',
	
			// Order of meta box: high (default), low. Optional.
			'priority'   => 'high',
	
			// Auto save: true, false (default). Optional.
			'autosave'   => true,
	
			// List of meta fields
			'fields'     => array(
				// SELECT BOX
				array(
					'name'        => esc_html__( 'Select', 'cbc' ),
					'id'          => "{$prefix}section_{$i}_type",
					'type'        => 'select',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'hidden' => esc_html__( 'Hide', 'cbc' ),
						'standard' => esc_html__( 'Standard', 'cbc' ),
						'image_left' => esc_html__( 'Image Left', 'cbc' ),
						'image_right' => esc_html__( 'Image Right', 'cbc' ),
						'image_full' => esc_html__( 'Image Full', 'cbc' ),
						'emphesis' => esc_html__( 'Emphesis', 'cbc' ),
					),
					// Select multiple values, optional. Default is false.
					'multiple'    => false,
					'std'         => 'hidden',
					/*'placeholder' => esc_html__( 'Select an Item', 'cbc' ),*/
				),
				// DIVIDER
				array(
					'type' => 'divider',
				),
				// TEXT
				array(
					// Field name - Will be used as label
					'name'  => esc_html__( 'Section Heding', 'cbc' ),
					'id'    => "{$prefix}section_{$i}_title",
					'type'  => 'text',
				),
				// WYSIWYG/RICH TEXT EDITOR
				array(
					'name'    => esc_html__( 'Section Content', 'cbc' ),
					'id'      => "{$prefix}section_{$i}_content",
					'type'    => 'wysiwyg',
					// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
					'raw'     => false,
					'std'     => esc_html__( '', 'cbc' ),
	
					// Editor settings, see wp_editor() function: look4wp.com/wp_editor
					'options' => array(
						'textarea_rows' => 4,
						'teeny'         => true,
						'media_buttons' => false,
					),
				),
				// DIVIDER
				array(
					'type' => 'divider',
				),
				// SELECT BOX
				array(
					'name'        => esc_html__( 'Select Call To Action Type', 'cbc' ),
					'id'          => "{$prefix}section_{$i}_cta_type",
					'type'        => 'select',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'none' => esc_html__( 'None', 'cbc' ),
						'standard' => esc_html__( 'Standard', 'cbc' ),
						'emphesis' => esc_html__( 'Emphesis', 'cbc' ),
					),
					// Select multiple values, optional. Default is false.
					'multiple'    => false,
					'std'         => 'none',
					/*'placeholder' => esc_html__( 'Select an Item', 'cbc' ),*/
				),
				// TEXT
				array(
					// Field name - Will be used as label
					'name'  => esc_html__( 'Call To Action Text', 'cbc' ),
					'id'    => "{$prefix}section_{$i}_cta_text",
					'type'  => 'text',
				),
				// URL
				array(
					'name' => esc_html__( 'Call To Action URL', 'cbc' ),
					'id'   => "{$prefix}section_{$i}_cta_url",
					/*'desc' => esc_html__( 'URL description', 'cbc' ),*/
					'type' => 'url',
					'std'  => 'http://classicalballetconservatory.com',
				),
				// DIVIDER
				array(
					'type' => 'divider',
				),
				// IMAGE UPLOAD
				array(
					'id'               => "{$prefix}section_{$i}_bg",
					'name'             => esc_html__( 'Background Image', 'cbc' ),
					'type'             => 'image_advanced',
	
					// Delete image from Media Library when remove it from post meta?
					// Note: it might affect other posts if you use same image for multiple posts
					'force_delete'     => false,
	
					// Maximum image uploads
					'max_file_uploads' => 1,
	
					// Display the "Uploaded 1/2 files" status
					'max_status'       => false,
				),
			),
		);
	}

	return $meta_boxes;
}
?>