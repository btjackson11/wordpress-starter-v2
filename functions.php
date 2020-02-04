<?php
	
	
/**
 * Add Featured Image to Custom Post Type
 */	
function custom_theme_setup() {
    add_theme_support( 'post-thumbnails', array('post', 'page', 'projects') );
}

add_action( 'after_setup_theme', 'custom_theme_setup');

/**
 * Add Pagename Variable for Body Class paramter
 */
if (!function_exists('flask_page_name')) {
	function flask_page_name() {
		if( is_page( basename( get_permalink() ) ) ){
			$page_slug = "pagename-" . basename( get_permalink() );
		}else { $page_slug = ''; }
		return $page_slug;
	}
}

/**
 * Add custom navigation to theme and adds Primary Navigation menu
 */
function flask_menus_init() {
	$header_menu = 'Primary Header Menu';
	$footer_menu = 'Primary Footer Menu';

	register_nav_menus(array(
		'primary-header-menu' => __( $header_menu ),
		'primary-footer-menu' => __( $footer_menu )
	));
}
add_action( 'init', 'flask_menus_init' );

/**
 * Prepare menus for first use
 */
function flask_menus_to_locations() {
	$header_menu = 'Primary Header Menu';
	$footer_menu = 'Primary Footer Menu';
	$header_menu_location = 'primary-header-menu-location';
	$footer_menu_location = 'primary-footer-menu-location';

	if( !has_nav_menu( $header_menu_location ) ){
		// Does the menu exist already?
		$header_menu_exists = wp_get_nav_menu_object( $header_menu );
		$footer_menu_exists = wp_get_nav_menu_object( $footer_menu );

		// If it doesn't exist, let's create it.
		if( !$header_menu_exists ){
			$new_header_menu_id = wp_create_nav_menu( $header_menu );
		}
		if( !$footer_menu_exists ){
			$new_footer_menu_id = wp_create_nav_menu( $footer_menu );
		}

		// Grab all theme locations and assign our newly-created menu
		// to it's related menu location
		$locations = get_theme_mod('nav_menu_locations');
		$locations[$header_menu_location] = $header_menu_exists ? $header_menu_exists->term_id : $new_header_menu_id;
		$locations[$footer_menu_location] = $footer_menu_exists ? $footer_menu_exists->term_id : $new_footer_menu_id;

		set_theme_mod( 'nav_menu_locations', $locations );
	}
}

/**
 * Setup to run once upon theme activation
 */
function flask_run_options_once() {
	$check = get_option('flask_activation_check');
	if ( $check != "set" ) {

		// initial menu location assignment
		flask_menus_to_locations();

		// set permalinks
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
		$wp_rewrite->flush_rules();

		// Add marker so it doesn't run in future
		add_option('flask_activation_check', "set");
	}
}
add_action('init', 'flask_run_options_once');