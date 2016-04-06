<?php
	add_action('plugins_loaded', 'woocommerce_gateway_caixabank_init' );

function woocommerce_gateway_caixabank_init(){
	/**
	 * Gateway class
	 */
	class WC_Gateway_caixabank extends WC_Payment_Gateway {
		var $notify_url;
		/**
		 * Constructor for the gateway.
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
			global $woocommerce, $checkfor254;
			$this->id				= 'caixabank';
			$this->icon				= apply_filters( 'woocommerce_caixabank_icon', plugins_url( basename( plugin_dir_path(__FILE__) ), basename( __FILE__ ) ) . '/assets/images/caixabank.png' );
			$this->has_fields		= false;
			$this->liveurl			= 'https://sis.redsys.es/sis/realizarPago';
			$this->testurl			= 'https://sis-t.redsys.es:25443/sis/realizarPago';
			$this->testmode			= $this->get_option( 'testmode' );
			$this->method_title		= __( 'Servired/RedSys', 'woocommerce' );
			$this->notify_url		= add_query_arg( 'wc-api', 'WC_Gateway_caixabank', home_url( '/' ) );
			// Load the settings.
			$this->init_form_fields();
			$this->init_settings();
			// Define user set variables
			$this->title			= $this->get_option( 'title' );
			$this->description		= $this->get_option( 'description' );
			$this->customer			= $this->get_option( 'customer' );
			$this->commercename		= $this->get_option( 'commercename' );
			$this->terminal			= $this->get_option( 'terminal' );
			$this->secret			= $this->get_option( 'secret' );
			$this->secretsha256		= $this->get_option( 'secretsha256' );
			$this->debug			= $this->get_option( 'debug' );
			$this->hashtype			= $this->get_option( 'hashtype' );
			$this->caixabanklanguage	= $this->get_option( 'caixabanklanguage' );
			$this->woocaixabankurlko	= $this->get_option( 'woocaixabankurlko' );
			$this->terminal2		= $this->get_option( 'terminal2' );
			$this->useterminal2		= $this->get_option( 'useterminal2' );
			$this->toamount			= $this->get_option( 'toamount' );
			$this->log				= new WC_Logger();
			//$this->supports   = array(
			//  'products',
			//'refunds'
			//  );
			// Actions
			add_action( 'valid-caixabank-standard-ipn-request',							array( $this, 'successful_request'  ) );
			add_action( 'woocommerce_receipt_caixabank',									array( $this, 'receipt_page'   ) );
			add_action( 'woocommerce_update_options_payment_gateways_' . $this->id,		array( $this, 'process_admin_options' ) );
			// Payment listener/API hook
			add_action( 'woocommerce_api_wc_gateway_caixabank',							array( $this, 'check_ipn_response'  ) );
			if ( !$this->is_valid_for_use() ) $this->enabled = false;
		}
		public static function admin_notice_mcrypt_encrypt() {
			if( !function_exists( 'mcrypt_encrypt' ) ) {
				$class = "error";
				$message = __( 'WARNING: The PHP mcrypt_encrypt module is not installed on your server. The new API caixabank SHA-256 needs this module in order to work.  Please contact your hosting provider and ask them to install it. Otherwise, your shop will stop working.', 'caixabank-tools-official' );
				echo"<div class=\"$class\"> <p>$message</p></div>";
			} else {
				return;
			}
		}
		function checkfor254testcaixabank(){
			$usesecretsha256 = $this->secretsha256;
			if( !$usesecretsha256 ){
				$checkfor254 = true;
			} else {
				$checkfor254 = false;
			}
			return $checkfor254;
		}
		/**
		 * Check if this gateway is enabled and available in the user's country
		 *
		 * @access public
		 * @return bool
		 */
		function is_valid_for_use() {
			if ( ! in_array(get_woocommerce_currency(), array( 'EUR' , 'BRL' )) ) return false;
			return true;
		}
		/**
		 * Admin Panel Options
		 *
		 * @since 1.0.0
		 */
		public function admin_options() {
?>
			<h3><?php _e( 'Servired/caixabank Spain', 'caixabank-tools-official' ); ?></h3>
			<p><?php _e( 'Servired/RedSys works by sending the user to your bank TPV to enter their payment information.', 'caixabank-tools-official' ); ?></p>
			<?php if( class_exists( 'SitePress' )){ ?>
				<div class="updated fade"><h4><?php _e( 'Attention! WPML detected.', 'caixabank-tools-official' ); ?></h4>
				<p><?php _e( 'The Gateway will be shown in the customer language. The option "Language Gateway" is not taken into consideration', 'caixabank-tools-official' ); ?></p>
				</div>
				<?php } ?>
			<?php if ( $this->is_valid_for_use() ) : ?>
				<table class="form-table">
				<?php
				// Generate the HTML For the settings form.
				$this->generate_settings_html();
?>
				</table><!--/.form-table-->
			<?php else : ?>
           		<div class="inline error"><p><strong><?php _e( 'Gateway Disabled', 'caixabank-tools-official' ); ?></strong>: <?php _e( 'Servired/RedSys only support EUROS &euro; and BRL currency.', 'caixabank-tools-official' ); ?></p></div>
		   	<?php
			endif;
		}
		/**
		 * Initialise Gateway Settings Form Fields
		 *
		 * @access public
		 * @return void
		 */
		function init_form_fields() {
			$this->form_fields = array(
				'enabled'   => array(
					'title'			=> __( 'Enable/Disable', 'caixabank-tools-official' ),
					'type'			=> 'checkbox',
					'label'			=> __( 'Enable Servired/RedSys', 'caixabank-tools-official' ),
					'default'		=> 'no'
				),
				'title'   => array(
					'title'			=> __( 'Title', 'caixabank-tools-official' ),
					'type'			=> 'text',
					'description'	=> __( 'This controls the title which the user sees during checkout.', 'caixabank-tools-official' ),
					'default'		=> __( 'Servired/RedSys', 'caixabank-tools-official' ),
					'desc_tip'		=> true,
				),
				'description' => array(
					'title'			=> __( 'Description', 'caixabank-tools-official' ),
					'type'			=> 'textarea',
					'description'	=> __( 'This controls the description which the user sees during checkout.', 'caixabank-tools-official' ),
					'default'		=> __( 'Pay via Servired/RedSys; you can pay with your credit card.', 'caixabank-tools-official' )
				),
				'customer'  => array(
					'title'			=> __( 'Commerce number (FUC)', 'caixabank-tools-official' ),
					'type'			=> 'text',
					'description'	=> __( 'Commerce number (FUC) provided by your bank.', 'caixabank-tools-official' ),
					'desc_tip'		=> true,
				),

				'commercename' => array(
					'title'			=> __( 'Commerce Name', 'caixabank-tools-official' ),
					'type'			=> 'text',
					'description'	=> __( 'Commerce Name', 'caixabank-tools-official' ),
					'desc_tip'		=> true,
				),
				'terminal'  => array(
					'title'			=> __( 'Terminal number', 'caixabank-tools-official' ),
					'type'			=> 'text',
					'description'	=> __( 'Terminal number provided by your bank.', 'caixabank-tools-official' ),
					'desc_tip'		=> true,
				),
				'terminal2'  => array(
					'title'			=> __( 'Second Terminal', 'caixabank-tools-official' ),
					'type'			=> 'text',
					'description'	=> __( 'If you use a second Terminal number, you need to add here the second terminal provided by your bank', 'caixabank-tools-official' ),
					'desc_tip'		=> true,
				),
				'useterminal2' => array(
					'title'			=> __( 'Activate Second Terminal', 'caixabank-tools-official' ),
					'type'			=> 'checkbox',
					'label'			=> __( 'Activate Second Terminal.', 'caixabank-tools-official' ),
					'default'		=> 'no',
					'description'	=> sprintf( __( 'If you use a second terminal, you need to add it in the field above and activate it here. You will need to set when use the Second Terminal in the field below.', 'caixabank-tools-official' ) ),
				),
				'toamount'  => array(
					'title'			=> __( 'Use the Second Terminal from 0 to (Don\'t use Currency Symbol)', 'caixabank-tools-official' ),
					'type'			=> 'text',
					'description'	=> __( 'When will the Second Terminal used? from 0 to...? Add the amount. Ex. Add 100 and the Second Terminal will be used when the amount be from 0 to 100', 'caixabank-tools-official' ),
					'desc_tip'		=> true,
				),
				'secretsha256'  => array(
					'title'			=> __( 'Encryption secret passphrase SHA-256', 'caixabank-tools-official' ),
					'type'			=> 'text',
					'description'	=> __( 'Encryption secret passphrase SHA-256 provided by your bank.', 'caixabank-tools-official' ),
					'desc_tip'		=> true,
				),
				'caixabanklanguage'=> array(
					'title'			=> __( 'Language Gateway', 'caixabank-tools-official' ),
					'type'			=> 'select',
					'description'	=> __( 'Choose the language for the Gateway. Not all Banks accept all languages', 'caixabank-tools-official' ),
					'default'		=> '001',
					'options'			=> array(
						'001'				=> __( 'Spanish',		'caixabank-tools-official' ),
						'002'				=> __( 'English',		'caixabank-tools-official' ),
						'003'				=> __( 'Catalan',		'caixabank-tools-official' ),
						'004'				=> __( 'French',		'caixabank-tools-official' ),
						'005'				=> __( 'German',		'caixabank-tools-official' ),
						'006'				=> __( 'Dutch',			'caixabank-tools-official' ),
						'007'				=> __( 'Italian',		'caixabank-tools-official' ),
						'008'				=> __( 'Swedish',		'caixabank-tools-official' ),
						'009'				=> __( 'Portuguese',	'caixabank-tools-official' ),
						'010'				=> __( 'Valencian',		'caixabank-tools-official' ),
						'011'				=> __( 'Polish',		'caixabank-tools-official' ),
						'012'				=> __( 'Galician',		'caixabank-tools-official' ),
						'013'				=> __( 'Basque',		'caixabank-tools-official' ),
						'208'				=> __( 'Danish',		'caixabank-tools-official' )
					)
				),
				'woocaixabankurlko'=> array(
					'title'			=> __( 'Return URL (Redsys Error button)', 'caixabank-tools-official' ),
					'type'			=> 'select',
					'description'	=> __( 'When the user press the return button at Redsys Gateway (Ex: The user type an incorrect creadit cart), you can redirect the user to My Cart page canceling the order, or you can redirect the user to Checkput page without cancel the order.', 'caixabank-tools-official' ),
					'default'		=> 'returncancel',
					'options'		=> array(
						'returncancel'		=> __( 'Cancel the order and return to My Cart page',   'caixabank-tools-official' ),
						'returnnocancel'	=> __( 'Don\'t cancel the order and return to Checkout page', 'caixabank-tools-official' )
					)
				),
				'testmode'  => array(
					'title'			=> __( 'Running in test mode', 'caixabank-tools-official' ),
					'type'			=> 'checkbox',
					'label'			=> __( 'Running in test mode', 'caixabank-tools-official' ),
					'default'		=> 'yes',
					'description'	=> sprintf( __( 'Select this option for the initial testing required by your bank, deselect this option once you pass the required test phase and your production environment is active.', 'caixabank-tools-official' ) ),
				),
				'debug'   => array(
					'title'			=> __( 'Debug Log', 'caixabank-tools-official' ),
					'type'			=> 'checkbox',
					'label'			=> __( 'Enable logging', 'caixabank-tools-official' ),
					'default'		=> 'no',
					'description'	=> __( 'Log Servired/RedSys events, such as notifications requests, inside <code>woocommerce/logs/caixabank.txt</code>', 'caixabank-tools-official' ),
				)
			);
		}
		function get_caixabank_args( $order ) {
			global $woocommerce;
				$order_id = $order->id;
				$currency_codes = array(
					'EUR' => 978,
					'BRL' => 986
				);
				$transaction_id  = str_pad( $order_id , 12 , '0' , STR_PAD_LEFT );
				$transaction_id1 = mt_rand(1, 999); // lets to create a random number
				$transaction_id2 = substr_replace($transaction_id, $transaction_id1, 0,-9); // new order number
				$order_total  = number_format( $order->get_total() , 2 , ',' , '' );
				$order_total_sign = number_format( $order->get_total() , 2 , '' , '' );
				$transaction_type = '0';
				$secretsha256 = utf8_decode(  $this->secretsha256 );
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
				} elseif( $this->caixabanklanguage ){
					$gatewaylanguage = $this->caixabanklanguage;
				}
				else {
					$gatewaylanguage = '001';
				}
				if ( $this->woocaixabankurlko ){
					if ( $this->woocaixabankurlko == 'returncancel' ) {
						$returnfromcaixabank = $order->get_cancel_order_url();
					} else {
						$returnfromcaixabank = $woocommerce->cart->get_checkout_url();
					}
				} else {
					$returnfromcaixabank = $order->get_cancel_order_url();
				}
				if ( 'yes' ==  $this->useterminal2 ) {
					$toamount = number_format( $this->toamount , 2 , '' , '' );
					$terminal = $this->terminal;
					$terminal2 = $this->terminal2;
					if ( $order_total_sign <= $toamount ){$DSMerchantTerminal = $terminal2;}else{$DSMerchantTerminal = $terminal;}
				} else {
					$DSMerchantTerminal = $this->terminal;
				}
				// caixabank Args
				$miObj = new RedsysAPI;
				$miObj->setParameter( "DS_MERCHANT_AMOUNT",				$order_total_sign															);
				$miObj->setParameter( "DS_MERCHANT_ORDER",				$transaction_id2															);
				$miObj->setParameter( "DS_MERCHANT_MERCHANTCODE",		$this->customer																);
				$miObj->setParameter( "DS_MERCHANT_CURRENCY",			$currency_codes[ get_woocommerce_currency() ]								);
				$miObj->setParameter( "DS_MERCHANT_TRANSACTIONTYPE",	$transaction_type															);
				$miObj->setParameter( "DS_MERCHANT_TERMINAL",			$DSMerchantTerminal															);
				$miObj->setParameter( "DS_MERCHANT_MERCHANTURL",		$this->notify_url															);
				$miObj->setParameter( "DS_MERCHANT_URLOK",				add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) )		);
				$miObj->setParameter( "DS_MERCHANT_URLKO",				$returnfromcaixabank															);
				$miObj->setParameter( "DS_MERCHANT_CONSUMERLANGUAGE",	$gatewaylanguage															);
				$miObj->setParameter( "DS_MERCHANT_PRODUCTDESCRIPTION",	__( 'Order' , 'caixabank-tools-official' ) . ' ' .  $order->get_order_number()	);
				$miObj->setParameter( "DS_MERCHANT_MERCHANTNAME",		$this->commercename);


				$version="HMAC_SHA256_V1";
				// Se generan los parámetros de la petición
				$request = "";
				$params = $miObj->createMerchantParameters();
				$signature = $miObj->createMerchantSignature( $secretsha256 );
				$caixabank_args = array(
					'Ds_SignatureVersion' => $version,
					'Ds_MerchantParameters' => $params,
					'Ds_Signature'   => $signature
				);
				if ( 'yes' == $this->debug ){
					$this->log->add( 'caixabank', 'Generating payment form for order '	. $order->get_order_number() . '. Sent data: ' . print_r($caixabank_args, true)	);
					$this->log->add( 'caixabank', 'Helping to understand the encrypted code: '																			);
					$this->log->add( 'caixabank', 'DS_MERCHANT_AMOUNT: '				.  $order_total_sign															);
					$this->log->add( 'caixabank', 'DS_MERCHANT_ORDER: '				. $transaction_id2																);
					$this->log->add( 'caixabank', 'DS_MERCHANT_MERCHANTCODE: '			. $this->customer																);
					$this->log->add( 'caixabank', 'DS_MERCHANT_CURRENCY'				. $currency_codes[ get_woocommerce_currency() ]									);
					$this->log->add( 'caixabank', 'DS_MERCHANT_TRANSACTIONTYPE: '		. $transaction_type																);
					$this->log->add( 'caixabank', 'DS_MERCHANT_TERMINAL: '				. $DSMerchantTerminal															);
					$this->log->add( 'caixabank', 'DS_MERCHANT_MERCHANTURL: '			. $this->notify_url																);
					$this->log->add( 'caixabank', 'DS_MERCHANT_URLOK: '				. add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) )		);
					$this->log->add( 'caixabank', 'DS_MERCHANT_URLKO: '				. $returnfromcaixabank																);
					$this->log->add( 'caixabank', 'DS_MERCHANT_CONSUMERLANGUAGE: '		. $gatewaylanguage																);
					$this->log->add( 'caixabank', 'DS_MERCHANT_PRODUCTDESCRIPTION: '	. __( 'Order' , 'caixabank-tools-official' ) . ' ' .  $order->get_order_number()		);
					}
				$caixabank_args = apply_filters( 'woocommerce_caixabank_args', $caixabank_args );
				return $caixabank_args;
		}
		/**
		 * Generate the caixabank form
		 *
		 * @access public
		 * @param mixed $order_id
		 * @return string
		 */
		function generate_caixabank_form( $order_id ) {
			global $woocommerce;
			$usesecretsha256 = $this->secretsha256;
				$order = new WC_Order( $order_id );
				if ( $this->testmode == 'yes' ):
					$caixabank_adr = $this->testurl . '?';
				else :
					$caixabank_adr = $this->liveurl . '?';
				endif;
				$caixabank_args = $this->get_caixabank_args( $order );
				$form_inputs = array();
				foreach ($caixabank_args as $key => $value) {
					$form_inputs[] .= '<input type="hidden" name="' . $key . '" value="' . esc_attr( $value ) . '" />';
				}
				wc_enqueue_js( '
				jQuery("body").block({
					message: "<img src=\"' . esc_url( apply_filters( 'woocommerce_ajax_loader_url', $woocommerce->plugin_url() . '/assets/images/ajax-loader.gif' ) ) . '\" alt=\"Redirecting&hellip;\" style=\"float:left; margin-right: 10px;\" />'.__( 'Thank you for your order. We are now redirecting you to Servired/RedSys to make the payment.', 'caixabank-tools-official' ).'",
					overlayCSS:
					{
						background: "#fff",
						opacity: 0.6
					},
					css: {
				        padding:        20,
				        textAlign:      "center",
				        color:          "#555",
				        border:         "3px solid #aaa",
				        backgroundColor:"#fff",
				        cursor:         "wait",
				        lineHeight:		"32px"
				    }
				});
			jQuery("#submit_caixabank_payment_form").click();
			' );
				return '<form action="'.esc_url( $caixabank_adr ).'" method="post" id="caixabank_payment_form" target="_top">
				' . implode('', $form_inputs) . '
				<input type="submit" class="button-alt" id="submit_caixabank_payment_form" value="'.__( 'Pay with Credit Card via Servired/RedSys', 'caixabank-tools-official' ).'" /> <a class="button cancel" href="'.esc_url( $order->get_cancel_order_url() ).'">'.__( 'Cancel order &amp; restore cart', 'caixabank-tools-official' ).'</a>
			</form>';
		}
		/**
		 * Process the payment and return the result
		 *
		 * @access public
		 * @param int $order_id
		 * @return array
		 */
		function process_payment( $order_id ) {
			$order = new WC_Order( $order_id );
			return array(
				'result' => 'success',
				'redirect' => $order->get_checkout_payment_url( true )
			);
		}
		/**
		 * Output for the order received page.
		 *
		 * @access public
		 * @return void
		 */
		function receipt_page( $order ) {
			echo '<p>'.__( 'Thank you for your order, please click the button below to pay with Credit Card via Servired/RedSys.', 'caixabank-tools-official' ).'</p>';
			echo $this->generate_caixabank_form( $order );
		}
		/**
		 * Check caixabank IPN validity
		 **/
		function check_ipn_request_is_valid() {
			global $woocommerce;
			if ( 'yes' == $this->debug )
				$this->log->add( 'caixabank', 'HTTP Notification received: ' . print_r( $_POST, true ) );
			$usesecretsha256 = $this->secretsha256;
				$version  = $_POST["Ds_SignatureVersion"];
				$data   = $_POST["Ds_MerchantParameters"];
				$remote_sign = $_POST["Ds_Signature"];

				$miObj   = new RedsysAPI;

				$localsecret = $miObj->createMerchantSignatureNotif($usesecretsha256,$data);
				if ( $localsecret == $remote_sign) {
					if ( 'yes' == $this->debug )
						$this->log->add( 'caixabank', 'Received valid notification from Servired/RedSys' );
					if ( 'yes' == $this->debug )
						$this->log->add( 'caixabank', $data );
					return true;
				} else {
					if ($this->debug == 'yes') {
						$this->log->add( 'caixabank', 'Received INVALID notification from Servired/RedSys' );
					}
					return false;
				}
		}
		/**
		 * Check for Servired/RedSys HTTP Notification
		 *
		 * @access public
		 * @return void
		 */
		function check_ipn_response() {
			@ob_clean();
			$_POST = stripslashes_deep( $_POST );
			if ( $this->check_ipn_request_is_valid() ) {
				header( 'HTTP/1.1 200 OK' );
				do_action( "valid-caixabank-standard-ipn-request", $_POST );
			} else {
				wp_die( "CaixaBank Notification Request Failure" );
			}
		}
		/**
		 * Successful Payment!
		 *
		 * @access public
		 * @param array $posted
		 * @return void
		 */
		function successful_request( $posted ) {
			global $woocommerce;
				$version			= $_POST["Ds_SignatureVersion"];
				$data				= $_POST["Ds_MerchantParameters"];
				$remote_sign		= $_POST["Ds_Signature"];

				$miObj				= new RedsysAPI;

				$decodedata			= $miObj->decodeMerchantParameters($data);

				$localsecret		= $miObj->createMerchantSignatureNotif($usesecretsha256,$data);

				$total				= $miObj->getParameter('Ds_Amount');
				$ordermi			= $miObj->getParameter('Ds_Order');
				$dscode				= $miObj->getParameter('Ds_MerchantCode');
				$currency_code		= $miObj->getParameter('Ds_Currency');
				$response			= $miObj->getParameter('Ds_Response');
				$id_trans			= $miObj->getParameter('Ds_AuthorisationCode');

				$dsdate				= $miObj->getParameter('Ds_Date');
				$dshour				= $miObj->getParameter('Ds_Hour');
				$dstermnal			= $miObj->getParameter('Ds_Terminal');
				$dsmerchandata		= $miObj->getParameter('Ds_MerchantData');
				$dssucurepayment	= $miObj->getParameter('Ds_SecurePayment');
				$dscardcountry		= $miObj->getParameter('Ds_Card_Country');
				$dsconsumercountry	= $miObj->getParameter('Ds_ConsumerLanguage');
				$dscargtype			= $miObj->getParameter('Ds_Card_Type');
				$order1				= $ordermi;
				$order2				= substr( $order1, 3 ); //cojo los 9 digitos del final
				$order				= $this->get_caixabank_order( (int)$order2 );

				if ($this->debug == 'yes')
					$this->log->add( 'caixabank', 'Ds_Amount: ' . $total . ', Ds_Order: ' . $order1 . ',  Ds_MerchantCode: '. $dscode . ', Ds_Currency: ' . $currency_code . ', Ds_Response: ' . $response . ', Ds_AuthorisationCode: ' . $id_trans . ', $order2: ' . $order2 );
				$response = intval($response);
				if ( $response  <= 99 ) {
					//authorized
					$order_total_compare = number_format( $order->get_total() , 2 , '' , '' );
					if ( $order_total_compare != $total ) {
						//amount does not match
						if ( 'yes' == $this->debug )
							$this->log->add( 'caixabank', 'Payment error: Amounts do not match (order: '.$order_total_compare.' - received: ' . $total . ')' );
						// Put this order on-hold for manual checking
						$order->update_status( 'on-hold', sprintf( __( 'Validation error: Order vs. Notification amounts do not match (order: %s - received: %s).', 'caixabank-tools-official' ), $order_total_compare , $total ) );
						exit;
					}
					$authorisation_code = $id_trans;
					if ( ! empty( $order1 ) )
						update_post_meta( $order->id, '_payment_order_number_caixabank', $order1 );
					if ( ! empty( $dsdate ) )
						update_post_meta( $order->id, '_payment_date_caixabank',   $dsdate );
					if ( ! empty( $dshour ) )
						update_post_meta( $order->id, '_payment_hour_caixabank',   $dshour );
					if ( ! empty( $id_trans ) )
						update_post_meta( $order->id, '_authorisation_code_caixabank', $authorisation_code );
					if ( ! empty( $dscardcountry ) )
						update_post_meta( $order->id, '_card_country_caixabank',   $dscardcountry );
					if ( ! empty( $dscargtype ) )
						update_post_meta( $order->id, '_card_type_caixabank',   $dscargtype == 'C' ? 'Credit' : 'Debit' );
					// Payment completed
					$order->add_order_note( __( 'HTTP Notification received - payment completed', 'caixabank-tools-official' ) );
					$order->add_order_note( __( 'Authorisation code: ',  'caixabank-tools-official' ) . $authorisation_code );
					$order->payment_complete();
					if ($this->debug == 'yes')
						$this->log->add( 'caixabank', 'Payment complete.' );
				} elseif ( $response  == 101 ) {
					//Tarjeta caducada
					if ( 'yes' == $this->debug )
						$this->log->add( 'caixabank', 'Pedido cancelado por Redsys: Tarjeta caducada' );
					//Order cancelled
					$order->update_status( 'cancelled', __( 'Cancelled by Redsys', 'caixabank-tools-official' ) );
					$order->add_order_note( __('Pedido cancelado por Redsys: Tarjeta caducada', 'caixabank-tools-official') );
					WC()->cart->empty_cart();
				} elseif ( $response  == 102 ) {
					//Tarjeta en excepción transitoria o bajo sospecha de fraude
				} elseif ( $response  == 106 ) {
					//Intentos de PIN excedidos
				} elseif ( $response  == 125 ) {
					//Tarjeta no efectiva
				} elseif ( $response  == 129 ) {
					//Código de seguridad (CVV2/CVC2) incorrecto
				} elseif ( $response  == 180 ) {
					//Tarjeta ajena al servicio
				} elseif ( $response  == 184 ) {
					//Error en la autenticación del titular
				} elseif ( $response  == 190 ) {
					//Denegación del emisor sin especificar motivo
				} elseif ( $response  == 191 ) {
					//Fecha de caducidad errónea
				} elseif ( $response  == 202 ) {
					//Tarjeta en excepción transitoria o bajo sospecha de fraude con retirada de tarjeta
				} elseif ( $response  == 904 ) {
					//Comercio no registrado en FUC
				} elseif ( $response  == 909 ) {
					//Error de sistema
				} elseif ( $response  == 913 ) {
					//Pedido repetido
				} elseif ( $response  == 944 ) {
					//Sesión Incorrecta
				} elseif ( $response  == 950 ) {
					//Operación de devolución no permitida
				} elseif ( $response  == 9912 || $response  == 912 ) {
					//Emisor no disponible
				} elseif ( $response  == 9064 ) {
					//Número de posiciones de la tarjeta incorrecto
				} elseif ( $response  == 9078 ) {
					//Tipo de operación no permitida para esa tarjeta
				} elseif ( $response  == 9093 ) {
					//Tarjeta no existente
				} elseif ( $response  == 9094 ) {
					//Rechazo servidores internacionales
				} elseif ( $response  == 9104 ) {
					//Comercio con “titular seguro” y titular sin clave de compra segura
				} elseif ( $response  == 9218 ) {
					//El comercio no permite op. seguras por entrada /operaciones
				} elseif ( $response  == 9253 ) {
					//Tarjeta no cumple el check-digit
				} elseif ( $response  == 9256 ) {
					//El comercio no puede realizar preautorizaciones
				} elseif ( $response  == 9257 ) {
					//Esta tarjeta no permite operativa de preautorizaciones
				} elseif ( $response  == 9261 ) {
					//Operación detenida por superar el control de restricciones en la entrada al SIS
				} elseif ( $response  == 9913 ) {
					//Error en la confirmación que el comercio envía al TPV Virtual (solo aplicable en la opción de sincronización SOAP)
				} elseif ( $response  == 9914 ) {
					//Confirmación “KO” del comercio (solo aplicable en la opción de sincronización SOAP)
				} elseif ( $response  == 9915 ) {
					//A petición del usuario se ha cancelado el pago
				} elseif ( $response  == 9928 ) {
					//Anulación de autorización en diferido realizada por el SIS (proceso batch)
				} elseif ( $response  == 9929 ) {
					//Anulación de autorización en diferido realizada por el comercio
				} elseif ( $response  == 9997 ) {
					//Se está procesando otra transacción en SIS con la misma tarjeta
				} elseif ( $response  == 9998 ) {
					//Operación en proceso de solicitud de datos de tarjeta
				} elseif ( $response  == 9999 ) {
					//Operación que ha sido redirigida al emisor a autenticar
				} else {
					//error indeterminado
				}
		}
		/**
		 * get_redsys_order function.
		 *
		 * @access public
		 * @param mixed $posted
		 * @return void
		 */
		function get_caixabank_order( $order_id ) {
			$order = new WC_Order( $order_id );
			return $order;
		}
	}
	function admin_notice_caixabank_sha256() {

			$sha = new WC_Gateway_caixabank();
			if ( $sha->checkfor254testcaixabank() ) {
				$class = "error";
				$message = __( 'WARNING: You need to add Encryption secret passphrase SHA-256 to Redsys Gateway Settings.', 'caixabank-tools-official' );
				echo"<div class=\"$class\"> <p>$message $prueba</p></div>";
			} else {
				return;
			}
		}
	add_action( 'admin_notices', 'admin_notice_caixabank_sha256');

	add_action( 'admin_notices', function() {
			WC_Gateway_caixabank::admin_notice_mcrypt_encrypt();
		});
	function woocommerce_add_gateway_caixabank_gateway($methods) {
		$methods[] = 'WC_Gateway_caixabank';
		return $methods;
	}
	add_filter('woocommerce_payment_gateways', 'woocommerce_add_gateway_caixabank_gateway' );
	function add_caixabank_meta_box(){
		echo '<h4>' . __('Payment Details','caixabank-tools-official') . '</h4>';
		echo '<p><strong>' . __( 'Redsys Date', 'caixabank-tools-official' ) . ': </strong><br />' . get_post_meta( get_the_ID(), '_payment_date_caixabank', true) . '</p>';
		echo '<p><strong>' . __( 'Redsys Hour', 'caixabank-tools-official' ) . ': </strong><br />' . get_post_meta( get_the_ID(), '_payment_hour_caixabank', true) . '</p>';
		echo '<p><strong>' . __( 'Redsys Authorisation Code', 'caixabank-tools-official' ) . ': </strong><br />' . get_post_meta( get_the_ID(), '_authorisation_code_caixabank', true) . '</p>';
		//echo '<p><strong>' . __( 'Redsys Country Card', 'caixabank-tools-official' ) . ': </strong><br />' . get_post_meta( get_the_ID(), '_card_country_redsys', true) . '</p>';
		//echo '<p><strong>' . __( 'Redsys Card Type', 'caixabank-tools-official' ) . ': </strong><br />' . get_post_meta( get_the_ID(), '_card_type_redsys', true) . '</p>';
	}
	add_action( 'woocommerce_admin_order_data_after_billing_address', 'add_caixabank_meta_box' );
}
?>