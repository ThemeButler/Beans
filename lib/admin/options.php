<?php
/**
 * Add Beans admin options.
 *
 * @package Admin
 */

beans_add_smart_action( 'admin_init', 'beans_do_register_term_meta' );

/**
 * Add Beans term meta.
 *
 * @since 1.0.0
 */
function beans_do_register_term_meta() {

	// Get layout option without default for the count.
	$options = beans_get_layouts_for_options();

	// Stop here if there is less than two layouts options.
	if ( count( $options ) < 2 )
		return;

	$fields = array(
		array(
			'id' => 'beans_layout',
			'label' => _x( 'Layout', 'term meta', 'beans' ),
			'type' => 'radio',
			'default' => 'default_fallback',
			'options' => beans_get_layouts_for_options( true )
		)
	);

	beans_register_term_meta( $fields, array( 'category', 'post_tag' ), 'beans' );

}


beans_add_smart_action( 'admin_init', 'beans_do_register_post_meta' );

/**
 * Add Beans post meta.
 *
 * @since 1.0.0
 */
function beans_do_register_post_meta() {

	// Get layout option without default for the count.
	$options = beans_get_layouts_for_options();

	// Stop here if there is less than two layouts options.
	if ( count( $options ) < 2 )
		return;

	$fields = array(
		array(
			'id' => 'beans_layout',
			'label' => _x( 'Layout', 'post meta', 'beans' ),
			'type' => 'radio',
			'default' => 'default_fallback',
			'options' => beans_get_layouts_for_options( true )
		)
	);

	beans_register_post_meta( $fields, array( 'post', 'page' ), 'beans', array( 'title' => __( 'Post Options', 'beans' ) ) );

}