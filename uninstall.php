<?php
/**
 * Uninstall CaixaBank Tools Official
 * @version     1.0.0
 */
if( !defined('WP_UNINSTALL_PLUGIN') ) exit();


	//Remove Options used by this Add_on

	delete_option(	'caixabank-option-version'	);
	delete_option(	'dni_woocommerce'			);
    delete_option(	'donation_widget'			);

	//drop a custom db table CaixaBank Tools Official
/*
	global $wpdb;
	$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}mytable" );
*/
?>