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

function caixabank_redirect_to_tpv( $order_id ){
	$caixabankform = caixabank_get_arg( $order_id );

	return $caixabankform;
}

function caixabank_order_use_iva( $order_id ){
	$siteusetax = get_option('caixabank_use_tax');
	$orderusetax = get_post_meta( $order_id, 'caixabank_order_metabox__caixabank_use_tax', true );
	// DESACTIVADO POR DEBUG if( ( $siteusetax == '1' ) && ( $orderusetax == '1' ) ) { return true; } else { return false; }
	return true;
}

function caixabank_order_use_irpf( $order_id ){
	$siteuseirpf = get_option('caixabank_irfp_activated');
	$orderuseirpf = get_post_meta( $order_id, 'caixabank_order_metabox__caixabank_use_irpf', true );
	if( ( $siteuseirpf == '1' ) && ( $orderuseirpf == '1' ) ) { return true; } else { return false; }
}

function caixabank_get_total( $order_id ){
	$caixabank_get_price	= get_post_meta( $order_id, 'caixabank_order_metabox__caixabank_price', true );
	$caixabank_price_int	= (int)$caixabank_get_price;
	$caixabank_use_tax		= true; //DESACTIVADO PARA DEBUG caixabank_order_use_iva( $order_id );
	$caixabank_use_irpf		= caixabank_order_use_irpf( $order_id );
	if ( $caixabank_use_tax ) {
		$caixabank_tax_int = (int)get_post_meta( $order_id, 'caixabank_order_metabox__caixabank_tax', true ); //$caixabank_tax;
	} else {
		$caixabank_tax_int = 0;
	}
	if ( caixabank_order_use_irpf( $order_id ) ) {
		$caixabank_irpf_int = (int)get_post_meta( $order_id, 'caixabank_order_metabox__caixabank_irpf', true ); //$caixabank_irpf;
	} else {
		$caixabank_irpf_int = 0;
	}
	$caixabank_price = (int)( $caixabank_price_int + $caixabank_tax_int - $caixabank_irpf_int );
	$caixabank_price_rounded = round( $caixabank_price, 2 );
	return $caixabank_price_rounded;
}

function caixabank_get_arg( $order_id ){
	$caixabanktransaction_id	= str_pad( $order_id , 12 , '0' , STR_PAD_LEFT );
	$caixabanktransaction_id1	= mt_rand( 1, 999 ); // lets to create a random number
	$caixabanktransaction_id2	= substr_replace( $caixabanktransaction_id, $caixabanktransaction_id1, 0,-9 ); // new order number
	$caixabankorder_total		= number_format( caixabank_get_total( $order_id ) , 2 , ',' , '' );
	$caixabankorder_total_sign	= number_format( caixabank_get_total( $order_id ) , 2 , '' , '' );
	$caixabanktransaction_type	= '0';
	$caixabanklanguage			= get_option('caixabank_language');

	if( defined( 'CAIXABANK_TOOLS_LIVE_URL' ) ) $caixabankliveurl		= CAIXABANK_TOOLS_LIVE_URL;
	if( defined( 'CAIXABANK_TOOLS_TEST_URL' ) ) $caixabanktesturl		= CAIXABANK_TOOLS_TEST_URL;
	if( defined( 'CAIXABANK_SITE_CANCEL_ORDER_URL' ) ) $caixabankurlko	= CAIXABANK_SITE_CANCEL_ORDER_URL;
	if( defined( 'CAIXABANK_RETURN_OK' ) ) $caixabankok					= CAIXABANK_RETURN_OK;
	$caixabanktestmode			= get_option( 'caixabank_gateway_test_mode' );
	$caixabankmethod_title		= __( 'Servired/RedSys', 'woocommerce' );
	if( defined( 'CAIXABANK_NOTIFY_URL' ) ) $caixabanknotify_url		= CAIXABANK_NOTIFY_URL;

	// Define user set variables
	$caixabanktitle				= get_option( 'caixabank_gateway_title' );
	$caixabankdescription		= get_option( 'caixabank_gateway_description' );
	$caixabankcustomer			= get_option( 'caixabank_gateway_fuc' );
	$caixabankcommercename		= get_option( 'caixabank_gateway_commerce_name' );
	$caixabankterminal			= get_option( 'caixabank_gateway_terminal_number' );
	$caixabanksecretsha256		= utf8_decode(  get_option('caixabank_gateway_passsha256') );
	$caixabankdebug				= get_option( 'caixabank_gateway_debug' );
	$caixabanklanguage			= get_option( 'caixabank_gateway_language_gateway');
	$caixabankurlko				= get_option( 'caixabankurlko' );
	$caixabankterminal2			= get_option( 'caixabank_gateway_second_terminal_number' );
	$caixabankuseterminal2		= get_option( 'caixabank_gateway_activate_second_terminal' );
	$caixabanktoamount			= get_option( 'caixabank_gateway_when_use_second_terminal' );
	$caixabankcurrencycode		= get_option( 'caixabankcurrencycide' );

	//para debug
	$caixabankdebug				= false;

	$caixabankcurrencycode		= '978';
	//$caixabankorder_total_sign	= '1000';



	if( class_exists( 'SitePress' )){
		if (ICL_LANGUAGE_CODE == 'es') { $gatewaylanguage = '001'; }
		elseif (ICL_LANGUAGE_CODE == 'en') { $gatewaylanguage = '002'; }
		elseif (ICL_LANGUAGE_CODE == 'ca') { $gatewaylanguage = '003'; }
		elseif (ICL_LANGUAGE_CODE == 'fr') { $gatewaylanguage = '004'; }
		elseif (ICL_LANGUAGE_CODE == 'ge') { $gatewaylanguage = '005'; }
		elseif (ICL_LANGUAGE_CODE == 'nl') { $gatewaylanguage = '006'; }
		elseif (ICL_LANGUAGE_CODE == 'it') { $gatewaylanguage = '007'; }
		elseif (ICL_LANGUAGE_CODE == 'sv') { $gatewaylanguage = '008'; }
		elseif (ICL_LANGUAGE_CODE == 'pt') { $gatewaylanguage = '009'; }
		elseif (ICL_LANGUAGE_CODE == 'pl') { $gatewaylanguage = '011'; }
		elseif (ICL_LANGUAGE_CODE == 'gl') { $gatewaylanguage = '012'; }
		elseif (ICL_LANGUAGE_CODE == 'eu') { $gatewaylanguage = '013'; }
		elseif (ICL_LANGUAGE_CODE == 'da') { $gatewaylanguage = '108'; }
		else {
			$gatewaylanguage = '002';
		}
	} elseif( $caixabanklanguage ){
		$gatewaylanguage = $caixabanklanguage;
	}
	else {
		$gatewaylanguage = '001';
	}
	if ( $caixabankurlko ){
		if ( $caixabankurlko == 'returncancel' ) {
			if( defined( 'CAIXABANK_SITE_CANCEL_ORDER_URL' ) ) $returnfromcaixabank = CAIXABANK_SITE_CANCEL_ORDER_URL;
		} else {
			if( defined( 'CAIXABANK_SITE_CHECKOUT_URL' ) ) $returnfromcaixabank = CAIXABANK_SITE_CHECKOUT_URL;
		}
	} else {
		if( defined( 'CAIXABANK_SITE_CHECKOUT_URL' ) ) $returnfromcaixabank = CAIXABANK_SITE_CHECKOUT_URL;
	}
	if ( '1' ==  $caixabankuseterminal2 ) {
		$caixabanktoamount = number_format( $caixabanktoamount , 2 , '' , '' );
		$terminal = $caixabankterminal;
		$terminal2 = $caixabankterminal2;
		if ( $caixabankorder_total_sign <= $toamount ){$DSMerchantTerminal = $terminal2;}else{$DSMerchantTerminal = $terminal;}
	} else {
		$DSMerchantTerminal = $caixabankterminal;
	}
	// redsys Args
	$miObj = new RedsysAPI;
	$miObj->setParameter( "DS_MERCHANT_AMOUNT",					$caixabankorder_total_sign										);
	$miObj->setParameter( "DS_MERCHANT_ORDER",					$caixabanktransaction_id2										);
	$miObj->setParameter( "DS_MERCHANT_MERCHANTCODE",			$caixabankcustomer												);
	$miObj->setParameter( "DS_MERCHANT_CURRENCY",				$caixabankcurrencycode											);
	$miObj->setParameter( "DS_MERCHANT_TRANSACTIONTYPE",		$caixabanktransaction_type										);
	$miObj->setParameter( "DS_MERCHANT_TERMINAL",				$DSMerchantTerminal												);
	$miObj->setParameter( "DS_MERCHANT_MERCHANTURL",			$caixabanknotify_url											);
	$miObj->setParameter( "DS_MERCHANT_URLOK",					$caixabankok													);
	$miObj->setParameter( "DS_MERCHANT_URLKO",					$caixabankurlko													);
	$miObj->setParameter( "DS_MERCHANT_CONSUMERLANGUAGE",		$gatewaylanguage												);
	$miObj->setParameter( "DS_MERCHANT_PRODUCTDESCRIPTION",		__( 'Order' , 'caixabank-tools-official' ) . ' ' .  $order_id	);
	$miObj->setParameter( "DS_MERCHANT_MERCHANTNAME",			$caixabankcommercename											);


	$version="HMAC_SHA256_V1";
	// Se generan los parámetros de la petición
	$request = "";
	$params = $miObj->createMerchantParameters();
	$signature = $miObj->createMerchantSignature( $caixabanksecretsha256 );
	$caixabank_args = array(
		'Ds_SignatureVersion' => $version,
		'Ds_MerchantParameters' => $params,
		'Ds_Signature'   => $signature
	);
	/*if ( 'yes' == $this->debug ){
		$this->log->add( 'redsys', 'Generating payment form for order ' . $order_id . '. Sent data: ' . print_r($redsys_args, true) );
		$this->log->add( 'redsys', 'Helping to understand the encrypted code: '                   );
		$this->log->add( 'redsys', 'DS_MERCHANT_AMOUNT: '    .  $order_total_sign               );
		$this->log->add( 'redsys', 'DS_MERCHANT_ORDER: '    . $transaction_id2                );
		$this->log->add( 'redsys', 'DS_MERCHANT_MERCHANTCODE: '   . $this->customer                );
		$this->log->add( 'redsys', 'DS_MERCHANT_CURRENCY'    . $currency_codes[ get_woocommerce_currency() ]         );
		$this->log->add( 'redsys', 'DS_MERCHANT_TRANSACTIONTYPE: '  . $transaction_type                );
		$this->log->add( 'redsys', 'DS_MERCHANT_TERMINAL: '    . $DSMerchantTerminal               );
		$this->log->add( 'redsys', 'DS_MERCHANT_MERCHANTURL: '   . $this->notify_url                );
		$this->log->add( 'redsys', 'DS_MERCHANT_URLOK: '    . add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) )  );
		$this->log->add( 'redsys', 'DS_MERCHANT_URLKO: '    . $returnfromredsys                );
		$this->log->add( 'redsys', 'DS_MERCHANT_CONSUMERLANGUAGE: '  . $gatewaylanguage                );
		$this->log->add( 'redsys', 'DS_MERCHANT_PRODUCTDESCRIPTION: ' . __( 'Order' , 'woocommerce-redsys' ) . ' ' .  $order->get_order_number()  );
	}
	$redsys_args = apply_filters( 'woocommerce_redsys_args', $redsys_args ); */

	$caixabankform = '
		<form name="frm" action="' . $caixabanktesturl . '" method="POST" target="_blank">
			<input type="hidden" name="Ds_SignatureVersion" value="' . $version . '"/>
			<input type="hidden" name="Ds_MerchantParameters" value="' . $params . '"/>
			<input type="hidden" name="Ds_Signature" value="' . $signature . '"/>
			<input type="submit" value="Enviar" >
		</form>';

	return $caixabankform;
}

?>