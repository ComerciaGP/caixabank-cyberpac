<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function caixabank_get_parent_page(){
	$caixabank_parent = basename($_SERVER['SCRIPT_NAME']);
	return $caixabank_parent;
}

// WooCommerce functions



// CaixaBank Add DNI

$caixabank_add_dni = get_option( 'caixabank_dni_field' );
if( !empty( $caixabank_add_dni ) && $caixabank_add_dni ){
	add_filter( 'user_contactmethods',         'caixabank_modify_contact_methods'   );
	add_filter( 'woocommerce_billing_fields',       'caixabank_add_dni_nif_nie'     );
	add_action( 'woocommerce_admin_order_data_after_billing_address', 'caixabank_add_dni_nif_nie_admin', 10, 1 );
}

function caixabank_modify_contact_methods( $profile_fields ) {

	// Add new field
	$profile_fields['billing_caixabank_dni_field']  =  __('DNI / NIF / NIE', 'woocommerce');

	return $profile_fields;
}

function caixabank_add_dni_nif_nie( $fields ) {
	$caixabank_dni_field_required = get_option( 'caixabank_dni_field_required' );
	if( !empty( $caixabank_dni_field_required ) && $caixabank_dni_field_required ){ $required = true; } else { $required = false; }
	$fields['billing_caixabank_dni_field'] = array(
		'label'   => __('DNI/NIF/NIE', 'woocommerce'),
		'placeholder'   => _x('DNI/NIF/NIE', 'placeholder', 'woocommerce'),
		'required'  => $required,
		'class'   => array('form-row-wide'),
		'clear'   => false
	);
	return $fields;
}

function caixabank_add_dni_nif_nie_admin($order){
	echo '<p><strong>' . __('DNI/NIF/NIE') . ':</strong><br> ' . get_post_meta($order->id, '_billing_caixabank_dni_field', true) . '</p>';
}
add_filter( 'query_vars', 'caixabank_add_query_vars' );

// register API endpoints
add_action( 'init', 'caixabank_add_endpoint' );

// handle REST API requests
add_action( 'parse_request', 'caixabank_handle_rest_api_requests' );

function caixabank_add_query_vars( $vars ) {
	$vars[] = 'caixabank-api';
	return $vars;
}

function caixabank_add_endpoint() {
	// REST API
	add_rewrite_rule( '^caixabank-api/v1/?$', 'index.php?caixabank-api=$matches[1]', 'top' );

	// WC API for payment gateway IPNs, etc
	add_rewrite_endpoint( 'caixabank-api', EP_ALL );
}

function caixabank_handle_rest_api_requests(){
	global $wp;

	if ( ! empty( $_GET['caixabank-api'] ) ) {
		$wp->query_vars['caixabank-api'] = $_GET['caixabank-api'];
	}
	if ( isset($_GET['caixabank-api']) && $_GET['caixabank-api'] == '' ) {
		$caixabank_handle_rest_api_requests_error = caixabank_handle_rest_api_requests_error();
		echo $caixabank_handle_rest_api_requests_error->get_error_message();
		exit;
	}
	if ( ! empty( $_GET['caixabank-api'] ) ) {
		if ( $wp->query_vars['caixabank-api'] != '' ) {
			$prueba = isset($_GET['default']) ? $_GET['default']  : '';
			echo isset($wp->query_vars['caixabank-api']) ?  $wp->query_vars['caixabank-api'] . '<br />'   : '';
			echo $prueba;
			exit;
		} else {
			$caixabank_handle_rest_api_requests_error = caixabank_handle_rest_api_requests_error();
			echo $caixabank_handle_rest_api_requests_error->get_error_message();
			exit;
		}
	}
}

function caixabank_handle_rest_api_requests_error() {
	return wp_die( "CaixaBank Notification Request Failure" );
}

add_filter( 'query_vars', 'caixabank_add_query_vars_tpv' );

// register API endpoints
add_action( 'init', 'caixabank_add_endpoint_tpv' );
// handle REST API requests
add_action( 'parse_request', 'caixabank_handle_prepara_tpv_api' );

function caixabank_add_query_vars_tpv( $vars ) {
	$vars[] = 'caixabank-tpv';
	return $vars;
}

function caixabank_add_endpoint_tpv() {
	// REST API
	add_rewrite_rule( '^caixabank-tpv/v1/?$', 'index.php?caixabank-tpv=$matches[1]', 'top' );

	// WC API for payment gateway IPNs, etc
	add_rewrite_endpoint( 'caixabank-tpv', EP_ALL );
}

function caixabank_handle_prepara_tpv_api(){
	global $wp;

	if ( ! empty( $_GET['caixabank-tpv'] ) ) {
		$wp->query_vars['caixabank-tpv'] = $_GET['caixabank-tpv'];
	}
	if ( isset($_GET['caixabank-tpv']) && $_GET['caixabank-tpv'] == '' ) {
		$caixabank_handle_rest_api_requests_error = caixabank_handle_prepara_tpv_api_requests_error();
		echo $caixabank_handle_rest_api_requests_error->get_error_message();
		exit;
	}
	if ( ! empty( $_GET['caixabank-tpv'] ) ) {
		if ( $wp->query_vars['caixabank-tpv'] != '' ) {
			$prueba = isset($_GET['default']) ? $_GET['default']  : '';
			echo isset($wp->query_vars['caixabank-tpv']) ?  $wp->query_vars['caixabank-tpv'] . '<br />'   : '';
			echo $prueba;
			exit;
		} else {
			$caixabank_handle_rest_api_requests_error = caixabank_handle_prepara_tpv_api_requests_error();
			echo $caixabank_handle_rest_api_requests_error->get_error_message();
			exit;
		}
	}
}

function caixabank_handle_prepara_tpv_api_requests_error() {
	return new WP_Error( 'broke', __( 'CaixaBank incorrect data sent', 'my_textdomain' ) );
}

function caixabank_register_css_front_end() {
    wp_register_style( 'caixabankfrontend', CAIXABANK_DIR_URL . 'assets/css/caixabank-front.css' );
    wp_enqueue_style( 'caixabankfrontend' );
}
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'caixabank_register_css_front_end' );

function caixabank_check_nif_cif_nie($cif) {
	//Returns:
	// 1 = NIF ok,
	// 2 = CIF ok,
	// 3 = NIE ok,
	//-1 = NIF bad,
	//-2 = CIF bad,
	//-3 = NIE bad, 0 = ??? bad
	$cif = strtoupper($cif);

	for ($i = 0; $i < 9; $i ++){
		$num[$i] = substr($cif, $i, 1);
	}
	//si no tiene un formato valido devuelve error
	if (!preg_match('((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^
[0-9]{8}[A-Z]{1}$)', $cif)){
		return 0;
	}
	//comprobacion de NIFs estandar

	if (preg_match('(^[0-9]{8}[A-Z]{1}$)', $cif)){
		if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE',
				substr($cif, 0, 8) % 23, 1)){
			return 1;
		}else {
			return -1;
		}
	}
	//algoritmo para comprobacion de codigos tipo CIF
	$suma = $num[2] + $num[4] + $num[6];
	for ($i = 1; $i < 8; $i += 2){
		$suma += substr((2 * $num[$i]),0,1) +
			substr((2 * $num[$i]),1,1);
	}
	$n = 10 - substr($suma, strlen($suma) - 1, 1);
	//comprobacion de NIFs especiales (se calculan como CIFs)
	if (preg_match('^[KLM]{1}', $cif)){
		if ($num[8] == chr(64 + $n)){
			return 1;
		}else{
			return -1;
		}
	}
	//comprobacion de CIFs
	if (preg_match('^[ABCDEFGHJNPQRSUVW]{1}', $cif)){
		if ($num[8] == chr(64 + $n) || $num[8] ==
			substr($n, strlen($n) - 1, 1)){
			return 2;
		}else{
			return -2;
		}
	}
	//comprobacion de NIEs
	//T
	if (preg_match('^[T]{1}', $cif)){
		if ($num[8] == preg_match('^[T]{1}[A-Z0-9]{8}$', $cif)){
			return 3;
		}else{
			return -3;
		}
	}
	//XYZ
	if (preg_match('^[XYZ]{1}', $cif)){
		if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE',
				substr(str_replace(array('X','Y','Z'),
						array('0','1','2'), $cif), 0, 8) % 23, 1)){
			return 3;
		}else{
			return -3;
		}
	}
	//si todavia no se ha verificado devuelve error
	return 0;
}

?>