<?php
/**
 * Uninstall CaixaBank Tools Official
 * @version     1.0.0
 */
if( !defined('WP_UNINSTALL_PLUGIN') ) exit();


	//Remove Options used by this Add_on

	delete_option(	'caixabank-option-version'						);
	delete_option(	'caixabank_dni_field'							);
    delete_option(	'caixabank_donation_widget'						);
	delete_option(	'caixabank_language'							);
	delete_option(	'caixabankurlko'								);
	delete_option(	'caixabanktoamount'								);
	delete_option(	'caixabankcurrencycide'							);
	delete_option(	'caixabank_gateway_title'						);
	delete_option(	'caixabank_gateway_description'					);
	delete_option(	'caixabank_gateway_fuc'							);
	delete_option(	'caixabank_gateway_commerce_name'				);
	delete_option(	'caixabank_gateway_terminal_number'				);
	delete_option(	'caixabank_gateway_activate_second_terminal'	);
	delete_option(	'caixabank_gateway_second_terminal_number'		);
	delete_option(	'caixabank_gateway_when_use_second_terminal'	);
	delete_option(	'caixabank_gateway_passsha256'					);
	delete_option(	'caixabank_gateway_language_gateway'			);
	delete_option(	'caixabank_gateway_test_mode'					);
	delete_option(	'caixabank_gateway_debug'						);

	//drop a custom db table CaixaBank Tools Official
/*
	global $wpdb;
	$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}mytable" );
*/
?>