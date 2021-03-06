<?php
/**
 * Echo menu fragments.
 *
 * @package Fragments\Menu
 */

beans_add_smart_action( 'beans_header', 'beans_primary_menu', 15 );

/**
 * Echo primary menu.
 *
 * @since 1.0.0
 */
function beans_primary_menu() {

	$nav_visibility = current_theme_supports( 'offcanvas-menu' ) ? 'uk-visible-large' : '';

	echo beans_open_markup( 'beans_primary_menu', 'nav', array(
		'class' => 'tm-primary-menu uk-float-right uk-navbar',
		'role' => 'navigation',
		'itemscope' => 'itemscope',
		'itemtype' => 'http://schema.org/SiteNavigationElement'
	) );

		$args = apply_filters( 'beans_primary_menu_args', array(
			'theme_location' => has_nav_menu( 'primary' ) ? 'primary' : '',
			'fallback_cb' => 'beans_no_menu_notice',
			'container' => '',
			'menu_class' => $nav_visibility,
			'echo' => false,
			'beans_type' => 'navbar'
		) );

		// Navigation.
		echo beans_output( 'beans_primary_menu', wp_nav_menu( $args ) );

	echo beans_close_markup( 'beans_primary_menu', 'nav' );

}


beans_add_smart_action( 'beans_primary_menu_append_markup', 'beans_primary_menu_offcanvas_button', 5 );

/**
 * Echo primary menu offcanvas button.
 *
 * @since 1.0.0
 */
function beans_primary_menu_offcanvas_button() {

	if ( !current_theme_supports( 'offcanvas-menu' ) )
		return;

	echo beans_open_markup( 'beans_primary_menu_offcanvas_button', 'a', array(
		'href' => '#offcanvas_menu',
		'class' => 'uk-button uk-hidden-large',
		'data-uk-offcanvas' => ''
	) );

		echo beans_open_markup( 'beans_primary_menu_offcanvas_button_icon', 'i', array(
			'class' => 'uk-icon-navicon uk-margin-small-right',
		) );

		echo beans_close_markup( 'beans_primary_menu_offcanvas_button_icon', 'i' );

		echo beans_output( 'beans_offcanvas_menu_button', __( 'Menu', 'beans' ) );

	echo beans_close_markup( 'beans_primary_menu_offcanvas_button', 'a' );

}


beans_add_smart_action( 'beans_widget_area_offcanvas_bar_offcanvas_menu_prepend_markup', 'beans_primary_offcanvas_menu' );

/**
 * Echo off-canvas primary menu.
 *
 * @since 1.0.0
 */
function beans_primary_offcanvas_menu() {

	if ( !current_theme_supports( 'offcanvas-menu' ) )
		return;

	echo beans_open_markup( 'beans_primary_offcanvas_menu', 'nav', array(
		'class' => 'tm-primary-offcanvas-menu uk-margin uk-margin-top',
		'role' => 'navigation',
	) );

		$args = apply_filters( 'beans_primary_offcanvas_menu_args', array(
			'theme_location' => has_nav_menu( 'primary' ) ? 'primary' : '',
			'fallback_cb' => 'beans_no_menu_notice',
			'container' => '',
			'echo' => false,
			'beans_type' => 'offcanvas'
		) );

		echo beans_output( 'beans_primary_offcanvas_menu', wp_nav_menu( $args ) );

	echo beans_close_markup( 'beans_primary_offcanvas_menu', 'nav' );

}


/**
 * Echo no menu notice.
 *
 * @since 1.0.0
 */
function beans_no_menu_notice() {

	echo beans_open_markup( 'beans_no_menu_notice', 'p', array( 'class' => 'uk-alert uk-alert-warning' ) );

		echo beans_output( 'beans_no_menu_notice_text', __( 'Whoops, your site does not have a menu!', 'beans' ) );

	echo beans_close_markup( 'beans_no_menu_notice', 'p' );

}