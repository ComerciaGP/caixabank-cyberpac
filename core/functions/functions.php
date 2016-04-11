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

// API sent to TPV

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
	add_rewrite_rule( '^caixabank-tpv/v1/?$', 'index.php?caixabank-tpv=$matches[1]', 'top' );
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


// API create invoice

add_filter( 'query_vars', 'caixabank_add_query_vars_create_invoice' );
add_action( 'init', 'caixabank_add_endpoint_create_invoice' );
add_action( 'parse_request', 'caixabank_handle_prepara_create_invoice_api' );

function caixabank_add_query_vars_create_invoice( $vars ) {
	$vars[] = 'caixabank-invoice';
	return $vars;
}

function caixabank_add_endpoint_create_invoice() {
	add_rewrite_rule( '^caixabank-invoice/v1/?$', 'index.php?caixabank-invoice=$matches[1]', 'top' );
	add_rewrite_endpoint( 'caixabank-tpv', EP_ALL );
}

function caixabank_handle_prepara_create_invoice_api(){
	global $wp;

	if ( ! empty( $_GET['caixabank-invoice'] ) ) {
		$wp->query_vars['caixabank-invoice'] = $_GET['caixabank-invoice'];
	}
	if ( isset($_GET['caixabank-invoice']) && $_GET['caixabank-invoice'] == '' ) {
		$caixabank_handle_rest_api_requests_error = caixabank_handle_prepara_create_invoice_api_requests_error();
		echo $caixabank_handle_rest_api_requests_error->get_error_message();
		exit;
	}
	if ( ! empty( $_POST['caixabank-invoice'] ) ) {
		if ( $wp->query_vars['caixabank-invoice'] != '' ) {
			$prueba = isset($_GET['default']) ? $_GET['default']  : '';
			echo isset($wp->query_vars['caixabank-invoice']) ?  $wp->query_vars['caixabank-invoice'] . '<br />'   : '';

			$type = '';
			$email = '';
			$amount = '';
			$dni = '';
			$name = '';
			$type = $_POST['caixabank-invoice'];
			$email = sanitize_email ($_POST['caixabank-email']);
			$amount_untrasted = $_POST['caixabank-amount'];
			$amaunt_trusted = (int)$amount_untrasted;
			$dni = $_POST['caixabank-dni'];
			$name = $_POST['caixabank-name'];

			if( $type == 'donacion'){
				$postarr = array(
					'post_title'	=> 'donation',
					'post_content'  => '',
					'post_status'	=> 'publish',
					'post_type'		=> 'caixabank_orders'
				);
				$post_id = wp_insert_post( $postarr, $wp_error );
			}
				echo 'El tipo de pago es ' . $type . '<br />'; // Esto es para debug.
				echo 'EL email del la persona que quiere hacer la donación es ' . $email . '<br />';
				echo 'La cantidad que quiere donar es ' . $amaunt_trusted . '<br />';
				echo 'Su nombre es ' . $name . '<br />';
				echo 'El ID de la factura creada es ' . $post_id . '<br />';
				echo '¿Llega todo bien?';


			echo $prueba;
			exit;
		} else {
			$caixabank_handle_rest_api_requests_error = caixabank_handle_prepara_create_invoice_api_requests_error();
			echo $caixabank_handle_rest_api_requests_error->get_error_message();
			exit;
		}
	}
}

function caixabank_handle_prepara_create_invoice_api_requests_error() {
	return wp_die( "CaixaBank Notification Request Failure" );
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
	$siteusetax = get_option('caixabank_iva_invoices_is_active_option');
	$orderusetax = get_post_meta( $order_id, 'caixabank_order_metabox__caixabank_use_tax', true );
	if( ( $siteusetax == '1' ) && ( $orderusetax == '1' ) ) { return true; } else { return false; }
	return true;
}

function caixabank_order_use_irpf( $order_id ){
	$siteuseirpf = get_option('caixabank_irfp_activated');
	$orderuseirpf = get_post_meta( $order_id, 'caixabank_order_metabox__caixabank_use_irpf', true );
	if( ( $siteuseirpf == '1' ) && ( $orderuseirpf == '1' ) ) { return true; } else { return false; }
}

function caixabank_get_total( $order_id ){
	$caixabank_get_price = get_post_meta( $order_id, 'caixabank_order_metabox__caixabank_price', true );
	$caixabank_price_int = (int)$caixabank_get_price;
	$caixabank_use_tax  = caixabank_order_use_iva( $order_id );
	$caixabank_use_irpf  = caixabank_order_use_irpf( $order_id );
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
	$caixabanktransaction_id = str_pad( $order_id , 12 , '0' , STR_PAD_LEFT );
	$caixabanktransaction_id1 = mt_rand( 1, 999 ); // lets to create a random number
	$caixabanktransaction_id2 = substr_replace( $caixabanktransaction_id, $caixabanktransaction_id1, 0,-9 ); // new order number
	$caixabankorder_total  = number_format( caixabank_get_total( $order_id ) , 2 , ',' , '' );
	$caixabankorder_total_sign = number_format( caixabank_get_total( $order_id ) , 2 , '' , '' );
	$caixabanktransaction_type = '0';
	$caixabanklanguage   = get_option('caixabank_language');

	if( defined( 'CAIXABANK_TOOLS_LIVE_URL' ) ) $caixabankliveurl  = CAIXABANK_TOOLS_LIVE_URL;
	if( defined( 'CAIXABANK_TOOLS_TEST_URL' ) ) $caixabanktesturl  = CAIXABANK_TOOLS_TEST_URL;
	if( defined( 'CAIXABANK_SITE_CANCEL_ORDER_URL' ) ) $caixabankurlko = CAIXABANK_SITE_CANCEL_ORDER_URL;
	if( defined( 'CAIXABANK_RETURN_OK' ) ) $caixabankok     = CAIXABANK_RETURN_OK;
	$caixabanktestmode   = get_option( 'caixabank_gateway_test_mode' );
	$caixabankmethod_title  = __( 'Servired/RedSys', 'woocommerce' );
	if( defined( 'CAIXABANK_NOTIFY_URL' ) ) $caixabanknotify_url  = CAIXABANK_NOTIFY_URL;

	// Define user set variables
	$caixabanktitle			= get_option( 'caixabank_gateway_title' );
	$caixabankdescription	= get_option( 'caixabank_gateway_description' );
	$caixabankcustomer		= get_option( 'caixabank_gateway_fuc' );
	$caixabankcommercename	= get_option( 'caixabank_gateway_commerce_name' );
	$caixabankterminal		= get_option( 'caixabank_gateway_terminal_number' );
	$caixabanksecretsha256	= utf8_decode(  get_option('caixabank_gateway_passsha256') );
	$caixabankdebug			= get_option( 'caixabank_gateway_debug' );
	$caixabanklanguage		= get_option( 'caixabank_gateway_language_gateway');
	$caixabankurlko			= get_option( 'caixabankurlko' );
	$caixabankterminal2		= get_option( 'caixabank_gateway_second_terminal_number' );
	$caixabankuseterminal2	= get_option( 'caixabank_gateway_activate_second_terminal' );
	$caixabanktoamount		= get_option( 'caixabank_gateway_when_use_second_terminal' );
	$caixabankcurrencycode	= get_option( 'caixabankcurrencycide' );

	//para debug
	$caixabankdebug    = false;

	$caixabankcurrencycode  = '978';


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

	/**
		Todos los campos posibles de CaixaBank:

		Ds_Merchant_MerchantCode		> Obligatorio. Código FUC asignado al comercio.
		Ds_Merchant_Terminal			> Obligatorio. Número de terminal que le asignará su banco. Tres se considera su longitud máxima
		Ds_Merchant_TransactionType 	> Obligatorio. para el comercio para indicar qué tipo de transacción es. Los posibles valores son:
											> 0 – Autorización
											> 1 – Preautorización
											> 2 – Confirmación de preautorización
											> 3 – Devolución Automática
											> 5 – Transacción Recurrente
											> 6 – Transacción Sucesiva
											> 7 – Pre-autenticación
											> 8 – Confirmación de pre-autenticación
											> 9 – Anulación de Preautorización
											> O – Autorización en diferido
											> P– Confirmación de autorización en diferido
											> Q - Anulación de autorización en diferido
											> R – Cuota inicial diferido
											> S – Cuota sucesiva diferido

		Ds_Merchant_Amount				> Obligatorio. Para Euros las dos últimas posiciones se consideran decimales.
		Ds_Merchant_Currency			> Obligatorio. Se debe enviar el código numérico de la moneda según el ISO-4217, por ejemplo:
		Ds_Merchant_Order				> Obligatorio. Los 4 primeros dígitos deben ser numéricos, para los dígitos restantes solo utilizar los siguientes caracteres ASCII
		Ds_Merchant_MerchantURL			> Obligatorio si el comercio tiene notificación “on-line”. URL del comercio que recibirá un post con los datos de la transacción.
		Ds_Merchant_ProductDescription	> Opcional. 125 se considera su longitud máxima. Este campo se mostrará al titular en la pantalla de confirmación de la compra.
		Ds_Merchant_Titular				> Opcional. Su longitud máxima es de 60 caracteres. Este campo se mostrará al titular en la pantalla de confirmación de la compra.
		Ds_Merchant_UrlOK				> Opcional: si se envía será utilizado como URLOK ignorando el configurado en el módulo de administración en caso de tenerlo.
		Ds_Merchant_UrlKO				> Opcional: si se envía será utilizado como URLKO ignorando el configurado en el módulo de administración en caso de tenerlo
		Ds_Merchant_MerchantName		> Opcional: será el nombre del comercio que aparecerá en el ticket del cliente (opcional).
		Ds_Merchant_ConsumerLanguage	> Opcional: el Valor 0, indicará que no se ha determinado el idioma del cliente (opcional). Otros valores posibles son:
											> Castellano-001
											> Inglés-002
											> Catalán-003
											> Francés-004
											> Alemán-005
											> Holandés-006
											> Italiano-007
											> Sueco-008
											> Portugués-009
											> Valenciano-010
											> Polaco-011
											> Gallego-012
											> Euskera-013.

		Ds_Merchant_SumTotal			> Obligatorio. Representa la suma total de los importes de las cuotas. Las dos últimas posiciones se consideran decimales.
		Ds_Merchant_MerchantData		> Opcional para el comercio para ser incluidos en los datos enviados por la respuesta “on-line” al comercio si se ha elegido esta opción.
		Ds_Merchant_DateFrecuency		> Frecuencia en días para las transacciones recurrentes y recurrentes diferidas (obligatorio para recurrentes)
		Ds_Merchant_ChargeExpiryDate	> Formato yyyy-MM-dd fecha límite para las transacciones Recurrentes (Obligatorio para recurrentes y recurrentes diferidas )
		Ds_Merchant_AuthorisationCode	> Opcional. Representa el código de autorización necesario para identificar una transacción recurrente sucesiva en las devoluciones de operaciones recurrentes sucesivas. Obligatorio en devoluciones de operaciones recurrentes.
		Ds_Merchant_TransactionDate		> Opcional. Formato yyyy-mm-dd. Representa la fecha de la cuota sucesiva, necesaria para identificar la transacción en las devoluciones. Obligatorio en las devoluciones de cuotas sucesivas y de cuotas sucesivas diferidas.

**/
	// redsys Args
	$miObj = new RedsysAPI;
	$miObj->setParameter( "DS_MERCHANT_AMOUNT",				$caixabankorder_total_sign          );
	$miObj->setParameter( "DS_MERCHANT_ORDER",				$caixabanktransaction_id2          );
	$miObj->setParameter( "DS_MERCHANT_MERCHANTCODE",		$caixabankcustomer            );
	$miObj->setParameter( "DS_MERCHANT_CURRENCY",			$caixabankcurrencycode           );
	$miObj->setParameter( "DS_MERCHANT_TRANSACTIONTYPE",	$caixabanktransaction_type          );
	$miObj->setParameter( "DS_MERCHANT_TERMINAL",			$DSMerchantTerminal            );
	$miObj->setParameter( "DS_MERCHANT_MERCHANTURL",		$caixabanknotify_url           );
	$miObj->setParameter( "DS_MERCHANT_URLOK",				$caixabankok             );
	$miObj->setParameter( "DS_MERCHANT_URLKO",				$caixabankurlko             );
	$miObj->setParameter( "DS_MERCHANT_CONSUMERLANGUAGE",	$gatewaylanguage            );
	$miObj->setParameter( "DS_MERCHANT_PRODUCTDESCRIPTION",	__( 'Order' , 'caixabank-tools-official' ) . ' ' .  $order_id );
	$miObj->setParameter( "DS_MERCHANT_MERCHANTNAME",		$caixabankcommercename           );


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

// Squential invoice number

if ( get_option( 'caixabank_sort_invoices_is_active_option') == 'yes' ){
	add_filter( 'manage_edit-shop_order_columns',   'caixabank_add_invoice_number'        );
	add_action( 'manage_shop_order_posts_custom_column', 'caixabank_add_invoice_number_value',    2  );
	add_filter( 'manage_edit-shop_order_sortable_columns', 'caixabank_add_invoice_number_sortable_colum'    );
	//add_action( 'woocommerce_email_before_order_table',  'caixabank_add_invoice_number_to_customer_email'   );
	add_action( 'woocommerce_payment_complete',    'caixabank_sort_invoice_orders'       );
	add_action( 'woocommerce_order_status_processing',  'caixabank_sort_invoice_orders_admin'      );
	add_action( 'woocommerce_order_status_completed',  'caixabank_sort_invoice_orders_admin'      );
	if ( !is_admin() )  {
		add_filter( 'woocommerce_order_number', 'caixabank_show_invoice_number', 10, 2 );
	}
}

function caixabank_add_invoice_number( $columns ){

	$new_column = (is_array($columns)) ? $columns : array();
	unset( $new_column['order_actions'] );

	//edit this for you column(s)
	//all of your columns will be added before the actions colums
	$new_column['invoice_number'] = __('Invoice Number','caixabank-tools-official');

	//stop editing
	$new_column['order_actions'] = $columns['order_actions'];
	return $new_column;
}

// render the values
function caixabank_add_invoice_number_value( $column ){
	global $post;
	$invoice_number = get_post_meta( $post->ID, '_invoice_order_caixabank', true );
	if ( $column == 'invoice_number' ) {
		echo (  ! empty( $invoice_number ) ? $invoice_number : __('No invoice n&#176;', 'caixabank-tools-official' ) );
	}
}

// sort invoice order colum
function caixabank_add_invoice_number_sortable_colum( $columns ) {
	$custom = array(
		'invoice_number' => '_invoice_order_caixabank',
	);
	return wp_parse_args( $custom, $columns );
}

function caixabank_sort_invoice_orders( $order_id ){

	$reset_invoice_number = get_option( 'caixabank_sort_invoices_reset_invoice_number_option' );
	if( $reset_invoice_number == 'yes' ){ caixabank_check_current_year(); }

	$last_invoice_number   =  get_option( 'caixabank_sort_invoices_last_invoice_number_option'  );
	$before_prefix_invoice_number = get_option( 'caixabank_sort_invoices_prefix_invoice_number_option' );
	$before_postfix_invoice_number = get_option( 'caixabank_sort_invoices_postfix_invoice_number_option' );
	$length_invoice_number   = get_option( 'caixabank_sort_invoices_length_invoice_number_option' );
	$prefix_invoice_number   =  caixabank_use_patterns( $before_prefix_invoice_number       );
	$postfix_invoice_number   = caixabank_use_patterns( $before_postfix_invoice_number       );
	$get_invoice_if_exist   = get_post_meta( $order_id, '_invoice_order_caixabank', true     );

	if ( empty( $get_invoice_if_exist ) ){
		if ( !empty( $last_invoice_number ) ) settype( $last_invoice_number, 'integer' );
		if ( empty( $last_invoice_number ) ){
			// Check if there is a option with the first invoice number
			$first_invoice_number = get_option( 'caixabank_sort_invoices_first_invoice_number_option' );
			if ( empty( $first_invoice_number ) ) {
				$invoice_number = 1;
				update_option( 'caixabank_sort_invoices_last_invoice_number_option', $invoice_number );
			} else {
				settype( $first_invoice_number, 'integer' );
				$invoice_number = $first_invoice_number;
				update_option( 'caixabank_sort_invoices_last_invoice_number_option', $invoice_number );
			}
		} else {
			$invoice_number = ++$last_invoice_number;
			update_option( 'caixabank_sort_invoices_last_invoice_number_option', $invoice_number );
		}
		if( !empty( $length_invoice_number ) && ( strlen( $invoice_number ) < $length_invoice_number ) ){
			$invoice_number_long = str_pad($invoice_number, $length_invoice_number, '0', STR_PAD_LEFT);
		} else {
			$invoice_number_long = $invoice_number;
		}
		$final_invoice_number = $prefix_invoice_number . $invoice_number_long . $postfix_invoice_number;
		update_post_meta( $order_id, '_invoice_order_caixabank', $final_invoice_number );
	}
}
function caixabank_sort_invoice_orders_admin( $order_id ){

	$reset_invoice_number = get_option( 'caixabank_sort_invoices_reset_invoice_number_option' );
	if( $reset_invoice_number == 'yes' ){ caixabank_check_current_year(); }

	$last_invoice_number   =  get_option( 'caixabank_sort_invoices_last_invoice_number_option'  );
	$before_prefix_invoice_number = get_option( 'caixabank_sort_invoices_prefix_invoice_number_option' );
	$before_postfix_invoice_number = get_option( 'caixabank_sort_invoices_postfix_invoice_number_option' );
	$length_invoice_number   = get_option( 'caixabank_sort_invoices_length_invoice_number_option' );
	$prefix_invoice_number   =  caixabank_use_patterns( $before_prefix_invoice_number       );
	$postfix_invoice_number   = caixabank_use_patterns( $before_postfix_invoice_number       );
	$get_invoice_if_exist   = get_post_meta( $order_id, '_invoice_order_caixabank', true      );

	if ( empty( $get_invoice_if_exist ) ){
		if ( !empty( $last_invoice_number ) ) settype( $last_invoice_number, 'integer' );
		if ( empty( $last_invoice_number ) ){
			// Check if there is a option with the first invoice number
			$first_invoice_number = get_option( 'caixabank_sort_invoices_first_invoice_number_option' );
			if ( empty( $first_invoice_number ) ) {
				$invoice_number = 1;
				update_option( 'caixabank_sort_invoices_last_invoice_number_option', $invoice_number );
			} else {
				settype( $first_invoice_number, 'integer' );
				$invoice_number = $first_invoice_number;
				update_option( 'caixabank_sort_invoices_last_invoice_number_option', $invoice_number );
			}
		} else {
			$invoice_number = ++$last_invoice_number;
			update_option( 'caixabank_sort_invoices_last_invoice_number_option', $invoice_number );
		}
		if( !empty( $length_invoice_number ) && ( strlen( $invoice_number ) < $length_invoice_number ) ){
			$invoice_number_long = str_pad($invoice_number, $length_invoice_number, '0', STR_PAD_LEFT);
		} else {
			$invoice_number_long = $invoice_number;
		}
		$final_invoice_number = $prefix_invoice_number . $invoice_number_long . $postfix_invoice_number;
		update_post_meta( $order_id, '_invoice_order_caixabank', $final_invoice_number );
	}
}
// We hook to WooCommerce payment function

function caixabank_add_invoice_number_to_customer_email ( $order ){

	$invoice_number = caixabank_check_add_invoice_number( $order );
	if ( empty( $invoice_number ) ){
		printf( __( 'Order Number: %s', 'caixabank-tools-official' ), $order ); }
	else {
		echo '<h2>';
		printf( __( 'Invoice Number: %s', 'caixabank-tools-official' ), $invoice_number );
		echo '</h2>';
	}
}

function caixabank_check_add_invoice_number( $order ){
	global $woocommerce, $post;

	$reset_invoice_number			= get_option( 'caixabank_sort_invoices_reset_invoice_number_option'		);
	if( $reset_invoice_number == 'yes' ){ caixabank_check_current_year(); }
	$get_invoice_if_exist			= get_post_meta( $order, '_invoice_order_caixabank', true      );
	$last_invoice_number			= get_option( 'caixabank_sort_invoices_last_invoice_number_option'		);

	$last_invoice_number			= get_option( 'caixabank_sort_invoices_last_invoice_number_option'		);
	$before_prefix_invoice_number	= get_option( 'caixabank_sort_invoices_prefix_invoice_number_option'	);
	$before_postfix_invoice_number	= get_option( 'caixabank_sort_invoices_postfix_invoice_number_option'	);
	$length_invoice_number			= get_option( 'caixabank_sort_invoices_length_invoice_number_option'	);
	$prefix_invoice_number			= caixabank_use_patterns( $before_prefix_invoice_number );
	$postfix_invoice_number			= caixabank_use_patterns( $before_postfix_invoice_number );

	if ( !empty( $last_invoice_number ) ) settype( $last_invoice_number, 'integer' );


	if ( empty( $last_invoice_number ) ){
		// Check if there is a option with the first invoice number
		$first_invoice_number = get_option( 'caixabank_sort_invoices_first_invoice_number_option' );
		if ( empty( $first_invoice_number ) ) {
			$invoice_number = 1;
		} else {
			settype( $first_invoice_number, 'integer' );
			$invoice_number = $first_invoice_number;
		}
	} else {
		$invoice_number = $last_invoice_number;
	}
	if( !empty( $length_invoice_number ) && ( strlen( $invoice_number ) < $length_invoice_number ) ){
		$invoice_number_long = str_pad($invoice_number, $length_invoice_number, '0', STR_PAD_LEFT);
	} else {
		$invoice_number_long = $invoice_number;
	}
	$final_invoice_number = $prefix_invoice_number . $invoice_number_long . $postfix_invoice_number;

	return $final_invoice_number;
}

function caixabank_show_invoice_number( $oldnumber, $order ){
	$preorderprefix = get_option( 'caixabank_sort_invoices_prefix_order_number_option' );
	$preordersufix = get_option( 'caixabank_sort_invoices_postfix_order_number_option' );
	$orderprefix = caixabank_use_patterns( $preorderprefix );
	$ordersufix  = caixabank_use_patterns( $preordersufix );

	if( empty( $ordersufix ) && empty( $orderprefix ) ){
		$ordersufix = __( '-ORDER', 'caixabank-tools-official' );
	}
	$order = get_post_meta( $oldnumber, '_invoice_order_caixabank', true );
	if ( empty( $order ) ){ $order = $orderprefix . $oldnumber . $ordersufix; }
	if ( is_checkout() ) { $order = $oldnumber; }
	return $order;
}
function caixabank_use_patterns( $string ){
	$Numericzero					= preg_replace('/(\{d\})/', date_i18n('d'), $string);
	$Numeric						= preg_replace('/(\{j\})/', date_i18n('j'), $Numericzero);
	$English_suffix					= preg_replace('/(\{S\})/', date_i18n('S'), $Numeric);
	$Full_name						= preg_replace('/(\{l\})/', date_i18n('l'), $English_suffix);
	$Three_letter					= preg_replace('/(\{D\})/', date_i18n('D'), $Full_name);
	$Month_Numericzero				= preg_replace('/(\{m\})/', date_i18n('m'), $Three_letter);
	$Month_Numeric					= preg_replace('/(\{n\})/', date_i18n('n'), $Month_Numericzero);
	$Textual_full					= preg_replace('/(\{F\})/', date_i18n('F'), $Month_Numeric);
	$Textual_three					= preg_replace('/(\{M\})/', date_i18n('M'), $Textual_full);
	$Year_Numeric_four				= preg_replace('/(\{Y\})/', date_i18n('Y'), $Textual_three);
	$Year_Numeric_two				= preg_replace('/(\{y\})/', date_i18n('y'), $Year_Numeric_four);
	$Time_Lowercase					= preg_replace('/(\{a\})/', date_i18n('a'), $Year_Numeric_two);
	$Time_Uppercase					= preg_replace('/(\{A\})/', date_i18n('A'), $Time_Lowercase);
	$Hour_twelve_without_zero		= preg_replace('/(\{g\})/', date_i18n('g'), $Time_Uppercase);
	$Hour_twelve_zero				= preg_replace('/(\{h\})/', date_i18n('h'), $Hour_twelve_without_zero);
	$Hour_twenty_four_without_zero	= preg_replace('/(\{G\})/', date_i18n('G'), $Hour_twelve_zero);
	$Hour_twenty_four_zero			= preg_replace('/(\{H\})/', date_i18n('H'), $Hour_twenty_four_without_zero);
	$Minutes						= preg_replace('/(\{i\})/', date_i18n('i'), $Hour_twenty_four_zero);
	$final							= preg_replace('/(\{s\})/', date_i18n('s'), $Minutes);

	return $final;

}
function caixabank_check_current_year(){
	$current_year = date_i18n( 'Y' );
	$saved_year  = get_option( 'caixabank_saved_year' );
	settype( $saved_year, 'integer' );

	if( empty( $saved_year ) ){
		add_option( 'caixabank_saved_year', $current_year );
	} else {
		if( $current_year > $saved_year ){
			update_option( 'caixabank_saved_year', $current_year );
			update_option( 'caixabank_sort_invoices_first_invoice_number_option', '0' );
			update_option( 'caixabank_sort_invoices_last_invoice_number_option', '0' );
		}
	}
}
?>