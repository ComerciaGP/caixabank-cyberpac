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
	delete_option( 'caixabank_irpf_invoices_is_active_option'			);
	delete_option( 'caixabank_irpf_alava_option');
	delete_option( 'caixabank_irpf_albacete_option');
	delete_option( 'caixabank_irpf_alicante_option');
	delete_option( 'caixabank_irpf_almeria_option');
	delete_option( 'caixabank_irpf_asturias_option');
	delete_option( 'caixabank_irpf_avila_option');
	delete_option( 'caixabank_irpf_badajoz_option');
	delete_option( 'caixabank_irpf_barcelona_option');
	delete_option( 'caixabank_irpf_burgos_option');
	delete_option( 'caixabank_irpf_caceres_option');
	delete_option( 'caixabank_irpf_cadiz_option');
	delete_option( 'caixabank_irpf_cantabria_option');
	delete_option( 'caixabank_irpf_castellon_option');
	delete_option( 'caixabank_irpf_ceuta_option');
	delete_option( 'caixabank_irpf_ciudadreal_option');
	delete_option( 'caixabank_irpf_cordoba_option');
	delete_option( 'caixabank_irpf_cuenca_option');
	delete_option( 'caixabank_irpf_girona_option');
	delete_option( 'caixabank_irpf_laspalmas_option');
	delete_option( 'caixabank_irpf_granada_option');
	delete_option( 'caixabank_irpf_guadalajara_option');
	delete_option( 'caixabank_irpf_guipuzcoa_option');
	delete_option( 'caixabank_irpf_huelva_option');
	delete_option( 'caixabank_irpf_huesca_option');
	delete_option( 'caixabank_irpf_illesbalears_option');
	delete_option( 'caixabank_irpf_jaen_option');
	delete_option( 'caixabank_irpf_acoruna_option');
	delete_option( 'caixabank_irpf_larioja_option');
	delete_option( 'caixabank_irpf_leon_option');
	delete_option( 'caixabank_irpf_lleida_option');
	delete_option( 'caixabank_irpf_lugo_option');
	delete_option( 'caixabank_irpf_malaga_option');
	delete_option( 'caixabank_irpf_melilla_option');
	delete_option( 'caixabank_irpf_murcia_option');
	delete_option( 'caixabank_irpf_navarra_option');
	delete_option( 'caixabank_irpf_ourense_option');
	delete_option( 'caixabank_irpf_palencia_option');
	delete_option( 'caixabank_irpf_pontevedra_option');
	delete_option( 'caixabank_irpf_salamanca_option');
	delete_option( 'caixabank_irpf_segovia_option');
	delete_option( 'caixabank_irpf_sevilla_option');
	delete_option( 'caixabank_irpf_soria_option');
	delete_option( 'caixabank_irpf_tarragona_option');
	delete_option( 'caixabank_irpf_teruel_option');
	delete_option( 'caixabank_irpf_santacruztenerife_option');
	delete_option( 'caixabank_irpf_toledo_option');
	delete_option( 'caixabank_irpf_valencia_option');
	delete_option( 'caixabank_irpf_valladolid_option');
	delete_option( 'caixabank_irpf_vizcaya_option');
	delete_option( 'caixabank_irpf_zamora_option');
	delete_option( 'caixabank_irpf_zaragoza_option');

	//drop a custom db table CaixaBank Tools Official
/*
	global $wpdb;
	$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}mytable" );
*/
?>