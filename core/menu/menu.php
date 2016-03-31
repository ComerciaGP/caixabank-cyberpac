<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
require_once( CAIXABANK_PATH . 'core/pages/caixabank-settings.php' );
require_once( CAIXABANK_PATH . 'core/pages/caixabank-about.php' );

function caixabank_load_custom_icon_styles() {
	wp_register_style( 'caixabank_dashicons', CAIXABANK_DIR_URL . '/assets/css/menu.css', false, CAIXABANK_TOOLS_OFFICIAL_VERSION );
	wp_enqueue_style( 'caixabank_dashicons' );
	}
add_action( 'admin_enqueue_scripts', 'caixabank_load_custom_icon_styles' );

	// Adding custom menu for WordPress

function caixabank_menu() {
	global $caixabankconfig, $caixabankabout;
	$page_title			=	__( 'CaixaBank', 'caixabank-tools-official');
	$menu_title			=	'CaixaBank';
	$capability			=	'manage_options';
	$menu_slug			=	'caixabank';
	$function			=	'caixabank_settings';
	$icon_url			=	NULL;
	$position			=	NULL;
	add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	$caixabankconfig	= add_submenu_page( $menu_slug, __( 'Settings', 'caixabank-tools-official'), __( 'Settings', 'caixabank-tools-official' ), 'manage_options', $menu_slug );
	add_action("admin_print_scripts-$caixabankconfig", 'caixabank_settings_load_js');
	$caixabankabout		= add_submenu_page( $menu_slug, __( 'About', 'caixabank-tools-official'), __( 'About', 'caixabank-tools-official' ), 'manage_options', 'caixabank_about', 'caixabank_about' );
	}
add_action('admin_menu', 'caixabank_menu');
?>