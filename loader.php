<?php
/*
Plugin Name: CaixaBank Tools Official
Plugin URI: http://www.caixabank.es/
Description: CaixaBank Tools Official extend payment functionalities to WordPress.
Version: 1.0.0-Alpha
Author: caixabank, j.conti
Author URI: http://www.caixabank.es/
Domain Path: /languages
Text Domain: caixabank-tools-official
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

define( 'CAIXABANK_TOOLS_OFFICIAL_VERSION',		'1.0.0-Alpha'										);
define( 'CAIXABANK_TOOLS_LIVE_URL',				'https://sis.redsys.es/sis/realizarPago'			);
define( 'CAIXABANK_TOOLS_TEST_URL',				'https://sis-t.redsys.es:25443/sis/realizarPago'	);
define( 'CAIXABANK_SITE_CANCEL_ORDER_URL',		home_url() . '/caixabank-cancel/v1/'				);
define( 'CAIXABANK_SITE_CHECKOUT_URL',			home_url() . '/caixabank-checkout/v1/'				);
define( 'CAIXABANK_RETURN OK',					home_url() . '/caixabank-pedido-ok/v1/'				);
define( 'CAIXABANK_NOTIFY_URL',					home_url() . '/caixabank-api/v1/'					);
define( 'CAIXABANK_SITE_TO_TPV',				home_url() . '/caixabank-tpv/v1/'					);
define( 'CAIXABANK_PATH',						plugin_dir_path( __FILE__ )							);
define( 'CAIXABANK_DIR_URL',					plugin_dir_url(  __FILE__ )							);
define( 'CAIXABANK_DIR_TEMPLATE',				CAIXABANK_PATH . '/templates/');

function caixabank_tools_official_init() {
	load_plugin_textdomain('caixabank-tools-official', false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
}
add_action('init', 'caixabank_tools_official_init');


if( !class_exists( 'RedsysAPI' ) ) require_once( 'includes/redsys-api/apiRedsys.php' );
require_once( 'core/loader-core.php' );
require_once( 'includes/woocommerce/loader-woocommerce.php' );
require_once( 'includes/tgm/tgm-loader.php' );

function caixabank_welcome_splash(){
	$caixabank_parent = caixabank_get_parent_page();

	if ( get_option( 'caixabank-option-version' ) == CAIXABANK_TOOLS_OFFICIAL_VERSION ) {
		return;
	}
	elseif ( $caixabank_parent == 'update.php' ) {
		return;
	}
	elseif ( $caixabank_parent == 'update-core.php' ) {
		return;
	}
	else {
		update_option('caixabank-option-version', CAIXABANK_TOOLS_OFFICIAL_VERSION );
		$caixabankredirect = esc_url( admin_url( add_query_arg( array( 'page' => 'caixabank_about' ), 'admin.php' ) ) );
		wp_redirect( $caixabankredirect ); exit;
	}
}
add_action( 'admin_init', 'caixabank_welcome_splash', 1 );
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'caixabank_activation_hook' );
function caixabank_activation_hook() {
	// call your CPT registration function here (it should also be hooked into 'init')
	caixabank_add_endpoint();
	caixabank_add_endpoint_tpv();
	flush_rewrite_rules();
	update_option( 'caixabank_alemania_iva_estandar',		19 );
	update_option( 'caixabank_austria_iva_estandar',		20 );
	update_option( 'caixabank_belgica_iva_estandar',		21 );
	update_option( 'caixabank_bulgaria_iva_estandar',		20 );
	update_option( 'caixabank_croacia_iva_estandar',		25 );
	update_option( 'caixabank_chipre_iva_estandar',			19 );
	update_option( 'caixabank_dinamarca_iva_estandar',		25 );
	update_option( 'caixabank_eslovaquia_iva_estandar',		20 );
	update_option( 'caixabank_eslovenia_iva_estandar',		22 );
	update_option( 'caixabank_espana_iva_estandar',			21 );
	update_option( 'caixabank_estonia_iva_estandar',		20 );
	update_option( 'caixabank_finlandia_iva_estandar',		24 );
	update_option( 'caixabank_francia_iva_estandar',		20 );
	update_option( 'caixabank_grecia_iva_estandar',			23 );
	update_option( 'caixabank_holanda_iva_estandar',		27 );
	update_option( 'caixabank_irlanda_iva_estandar',		23 );
	update_option( 'caixabank_italia_iva_estandar',			22 );
	update_option( 'caixabank_letonia_iva_estandar',		21 );
	update_option( 'caixabank_lituania_iva_estandar',		21 );
	update_option( 'caixabank_luxemburgo_iva_estandar',		15 );
	update_option( 'caixabank_malta_iva_estandar',			18 );
	update_option( 'caixabank_polonia_iva_estandar',		23 );
	update_option( 'caixabank_portugal_iva_estandar',		23.25 );
	update_option( 'caixabank_uk_iva_estandar',				20 );
	update_option( 'caixabank_republica_checa_iva_estandar',21 );
	update_option( 'caixabank_rumania_iva_estandar',		24 );
	update_option( 'caixabank_suecia_iva_estandar',			25 );

}


?>