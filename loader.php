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

define( 'CAIXABANK_TOOLS_OFFICIAL_VERSION', '1.0.0-Alpha'								);
define( 'CAIXABANK_TOOLS_LIVE_URL',   'https://sis.redsys.es/sis/realizarPago'			);
define( 'CAIXABANK_TOOLS_TEST_URL',   'https://sis-t.redsys.es:25443/sis/realizarPago'	);
define( 'CAIXABANK_PATH',     plugin_dir_path( __FILE__ )								);
define( 'CAIXABANK_DIR_URL',    plugin_dir_url(  __FILE__ )								);

function caixabank_tools_official_init() {
	load_plugin_textdomain('caixabank-tools-official', false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
}
add_action('init', 'caixabank_tools_official_init');


if( !class_exists( 'RedsysAPI' ) ) require_once( 'includes/redsys-api/apiRedsys.php' );
require_once( 'core/loader-core.php' );
require_once( 'includes/woocommerce/loader-woocommerce.php' );

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
register_activation_hook( __FILE__, 'caixabank_flush_rewrites' );
function caixabank_flush_rewrites() {
	// call your CPT registration function here (it should also be hooked into 'init')
	caixabank_add_endpoint();
	flush_rewrite_rules();
}


?>