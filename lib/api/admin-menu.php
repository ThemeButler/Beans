<?php
/**
 * Beans admin page.
 *
 * @ignore
 */
class _Beans_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'admin_menu' ), 20 );
		add_action( 'admin_init', array( $this, 'register' ), 20 );

	}


	/**
	 * Add beans menu.
	 */
	public function admin_menu() {

		add_options_page( __( 'Beans', 'beans' ), __( 'Beans', 'beans' ), 'manage_options', 'beans_settings', array( $this, 'display_screen' ) );

	}


	/**
	 * Beans options page content.
	 */
	public function display_screen() {

		echo '<div class="wrap">';

			echo '<h2>' . __( 'Beans Settings', 'beans' ) . '<span style="float: right; font-size: 10px; color: #888;">' . __( 'Version ', 'beans' ) . BEANS_VERSION . '</span></h2>';

			echo beans_options( 'beans_settings' );

		echo '</div>';

	}


	/**
	 * Register options.
	 */
	public function register() {

		global $wp_meta_boxes;

		$fields = array(
			array(
				'id' => 'beans_dev_mode',
				'checkbox_label' => __( 'Enable development mode', 'beans' ),
				'type' => 'checkbox',
				'description' => 'This option should be enabled while your website is in development.'
			)
		);

		beans_register_options( $fields, 'beans_settings', 'mode_options', array(
			'title' => __( 'Mode options', 'beans' ),
			'context' => beans_get( 'beans_settings', $wp_meta_boxes ) ? 'column' : 'normal' // Check of other beans boxes.
		) );

	}

}

new _Beans_Admin();