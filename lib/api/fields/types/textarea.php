<?php
/**
 * @package API\Fields\Types
 */

beans_add_smart_action( 'beans_field_textarea', 'beans_field_textarea' );

/**
 * Echo textarea field type.
 *
 * @since 1.0.0
 *
 * @param array $field {
 *      For best practices, pass the array of data obtained using {@see beans_get_fields()}.
 *
 *      @type mixed  $value      The field value.
 *      @type string $name       The field name value.
 *      @type array  $attributes An array of attributes to add to the field. The array key defines the
 *            					 attribute name and the array value defines the attribute value. Default array.
 *      @type mixed  $default    The default value. Default false.
 * }
 */
function beans_field_textarea( $field ) {

	echo '<textarea name="' . $field['name'] . '" ' . beans_sanatize_attributes( $field['attributes'] ) . '>' . esc_attr( $field['value'] ) . '</textarea>';

}