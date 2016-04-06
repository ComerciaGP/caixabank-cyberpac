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
	delete_option(	'caixabank_alemania_iva_estandar'				);
	delete_option(	'caixabank_austria_iva_estandar'				);
	delete_option(	'caixabank_belgica_iva_estandar'				);
	delete_option(	'caixabank_bulgaria_iva_estandar'				);
	delete_option(	'caixabank_croacia_iva_estandar'				);
	delete_option(	'caixabank_chipre_iva_estandar'					);
	delete_option(	'caixabank_dinamarca_iva_estandar'				);
	delete_option(	'caixabank_eslovaquia_iva_estandar'				);
	delete_option(	'caixabank_eslovenia_iva_estandar'				);
	delete_option(	'caixabank_espana_iva_estandar'					);
	delete_option(	'caixabank_estonia_iva_estandar'				);
	delete_option(	'caixabank_finlandia_iva_estandar'				);
	delete_option(	'caixabank_francia_iva_estandar'				);
	delete_option(	'caixabank_grecia_iva_estandar'					);
	delete_option(	'caixabank_holanda_iva_estandar'				);
	delete_option(	'caixabank_irlanda_iva_estandar'				);
	delete_option(	'caixabank_italia_iva_estandar'					);
	delete_option(	'caixabank_letonia_iva_estandar'				);
	delete_option(	'caixabank_lituania_iva_estandar'				);
	delete_option(	'caixabank_luxemburgo_iva_estandar'				);
	delete_option(	'caixabank_malta_iva_estandar'					);
	delete_option(	'caixabank_polonia_iva_estandar'				);
	delete_option(	'caixabank_portugal_iva_estandar'				);
	delete_option(	'caixabank_uk_iva_estandar'						);
	delete_option(	'caixabank_republica_checa_iva_estandar'		);
	delete_option(	'caixabank_rumania_iva_estandar'				);
	delete_option(	'caixabank_suecia_iva_estandar'					);

	//drop a custom db table CaixaBank Tools Official
/*
	global $wpdb;
	$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}mytable" );
*/
?>