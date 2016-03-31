<?php
	if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
	class WC_Settings_Tab_Redsys_Sort_Invoices {

    /**
     * Bootstraps the class and hooks required actions & filters.
     *
     */
    public static function init() {
        add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
        add_action( 'woocommerce_settings_tabs_settings_tab_redsys_invoices', __CLASS__ . '::settings_tab' );
        add_action( 'woocommerce_update_options_settings_tab_redsys_invoices', __CLASS__ . '::update_settings' );
    }


    /**
     * Add a new settings tab to the WooCommerce settings tabs array.
     *
     * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
     * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
     */
    public static function add_settings_tab( $settings_tabs ) {
        $settings_tabs['settings_tab_redsys_invoices'] = __( 'Sequential Invoice Numbers', 'caixabank-tools-official' );
        return $settings_tabs;
    }


    /**
     * Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
     *
     * @uses woocommerce_admin_fields()
     * @uses self::get_settings()
     */
    public static function settings_tab() {
        woocommerce_admin_fields( self::get_settings() );
    }


    /**
     * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
     *
     * @uses woocommerce_update_options()
     * @uses self::get_settings()
     */
    public static function update_settings() {
        woocommerce_update_options( self::get_settings() );
    }


    /**
     * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
    public static function get_settings() {

        $settings = array(
             'title' => array(
                'name'     => __( 'Sequential Invoice Numbers', 'caixabank-tools-official' ),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'wc_settings_tab_redsys_sort_invoices_title'
            ),
            'invoices_is_active'=> array(
				'title'			=> __( 'Activate Sequential Invoice numbers', 'caixabank-tools-official' ),
				'type'			=> 'checkbox',
				'label'			=> __( 'Activate Sequential Invoice numbers.', 'caixabank-tools-official' ),
				'default'		=> 'no',
				'desc'			=> sprintf( __( 'Activate Sequential Invoice numbers', 'caixabank-tools-official' ) ),
				'id'			=> 'wc_settings_tab_redsys_sort_invoices_is_active'
									),
            'first_invoice_number' => array(
                'name' => __( 'First Invoice Number', 'caixabank-tools-official' ),
                'type' => 'text',
                'desc' => __( 'Add here the first invoice number. By Default is number 1. Save this number before activate it. Example 345 ', 'caixabank-tools-official' ),
                'id'   => 'wc_settings_tab_redsys_sort_invoices_first_invoice_number'
            						),
            'length_invoice_number' => array(
                'name' => __( 'Invoice Number Length', 'caixabank-tools-official' ),
                'type' => 'text',
                'desc' => __( 'The Invoice number length, this is not required. Example 10, the result will be 0000000345', 'caixabank-tools-official' ),
                'id'   => 'wc_settings_tab_redsys_sort_invoices_length_invoice_number'
            						),
            'prefix_invoice_number' => array(
                'name' => __( 'Prefix Invoice Number', 'caixabank-tools-official' ),
                'type' => 'text',
                'desc' => sprintf( __( 'Add here a prefix invoice number, this is not required. Example WC-, the result will be WC-0000000345. Pattern are allowed ex. {Y} this will add the current year. You will find all patterns %shere%s.', 'caixabank-tools-official' ), '<a href="http://docs.woothemes.com/document/redsys-servired-sermepa-gateway/" target="_blank">', '</a>'),
                'id'   => 'wc_settings_tab_redsys_sort_invoices_prefix_invoice_number'
									),
            'postfix_invoice_number' => array(
                'name' => __( 'Postfix Invoice Number', 'caixabank-tools-official' ),
                'type' => 'text',
                'desc' => sprintf( __( 'Add here a postfix invoice number, this is not required. Example -2015 the result will be WC-0000000345-2015. Pattern are allowed ex. {Y} this will add the current year. You will find all patterns %shere%s.', 'caixabank-tools-official' ), '<a href="http://docs.woothemes.com/document/redsys-servired-sermepa-gateway/" target="_blank">', '</a>' ),
                'id'   => 'wc_settings_tab_redsys_sort_invoices_postfix_invoice_number'
									),
			'prefix_order_number' => array(
                'name' => __( 'Pretfix Invoice Number', 'caixabank-tools-official' ),
                'type' => 'text',
                'desc' => sprintf( __( 'Add here a prefix order number, this is not required. Example 2015/ the result will be 2105/34345. Pattern are allowed ex. {Y} this will add the current year. You will find all patterns %shere%s.', 'caixabank-tools-official' ), '<a href="http://docs.woothemes.com/document/redsys-servired-sermepa-gateway/" target="_blank">', '</a>' ),
                'id'   => 'wc_settings_tab_redsys_sort_invoices_prefix_order_number'
									),
			'postfix_order_number' => array(
                'name' => __( 'Postfix Order Number', 'caixabank-tools-official' ),
                'type' => 'text',
                'desc' => sprintf( __( 'Add here a postfix order number, this is not required. If you don\'t add a postfix, a postfix will be automatically added for security reason. Example /2015 the result will be 34345/2015. Pattern are allowed ex. {Y} this will add the current year. You will find all patterns %shere%s.', 'caixabank-tools-official' ), '<a href="http://docs.woothemes.com/document/redsys-servired-sermepa-gateway/" target="_blank">', '</a>' ),
                'id'   => 'wc_settings_tab_redsys_sort_invoices_postfix_order_number'
									),
            'reset_invoice_number' => array(
                'title'			=> __( 'Reset Invoice Number', 'caixabank-tools-official' ),
				'type'			=> 'checkbox',
				'label'			=> __( 'Reset Invoice Number.', 'caixabank-tools-official' ),
				'default'		=> 'no',
				'desc'			=> __( 'If you enable Reset Invoice Number, every January 1st the invoice number will be reset and will start again with number 1. Is very important that if you enable this option, you use a prefix or postfix year pattern {Y}.', 'caixabank-tools-official' ),
				'id'			=> 'wc_settings_tab_redsys_sort_invoices_reset_invoice_number'
									),
            'redsys_section_end' => array(
                 'type' => 'sectionend',
                 'id' => 'wc_settings_tab_redsys_sort_invoices_section_end'
				 					)
        );

        return apply_filters( 'wc_settings_tab_redsys_sort_invoices_settings', $settings );
    }

}

	WC_Settings_Tab_Redsys_Sort_Invoices::init();

	if ( get_option( 'wc_settings_tab_redsys_sort_invoices_is_active') == 'yes' ){
			add_filter( 'manage_edit-shop_order_columns',			'redsys_add_invoice_number'								);
			add_action(	'manage_shop_order_posts_custom_column',	'redsys_add_invoice_number_value',				2		);
			add_filter(	'manage_edit-shop_order_sortable_columns',	'redsys_add_invoice_number_sortable_colum'				);
			//add_action(	'woocommerce_email_before_order_table',		'redsys_add_invoice_number_to_customer_email'			);
			add_action(	'woocommerce_payment_complete',				'redsys_sort_invoice_orders'							);
			add_action( 'woocommerce_order_status_processing',		'redsys_sort_invoice_orders_admin'						);
			add_action( 'woocommerce_order_status_completed',		'redsys_sort_invoice_orders_admin'						);
			if ( !is_admin() )  {
				add_filter( 'woocommerce_order_number', 'redsys_show_invoice_number', 10, 2 );
				}
		}

	function redsys_add_invoice_number( $columns ){

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
	function redsys_add_invoice_number_value( $column ){
    	global $post;
		$invoice_number = get_post_meta( $post->ID, '_invoice_order_redsys', true );
		if ( $column == 'invoice_number' ) {
        	echo (  ! empty( $invoice_number ) ? $invoice_number : __('No invoice n&#176;', 'caixabank-tools-official' ) );
    	}
	}

	// sort invoice order colum
	function redsys_add_invoice_number_sortable_colum( $columns ) {
    	$custom = array(
    		'invoice_number' => '_invoice_order_redsys',
    		);
		return wp_parse_args( $custom, $columns );
	}

	function redsys_sort_invoice_orders( $order_id ){

		$reset_invoice_number = get_option( 'wc_settings_tab_redsys_sort_invoices_reset_invoice_number' );
		if( $reset_invoice_number == 'yes' ){ redsys_check_current_year(); }

		$last_invoice_number			= 	get_option( 'wc_settings_tab_redsys_sort_invoices_last_invoice_number'		);
		$before_prefix_invoice_number	=	get_option( 'wc_settings_tab_redsys_sort_invoices_prefix_invoice_number'	);
		$before_postfix_invoice_number	=	get_option( 'wc_settings_tab_redsys_sort_invoices_postfix_invoice_number'	);
		$length_invoice_number			=	get_option( 'wc_settings_tab_redsys_sort_invoices_length_invoice_number'	);
		$prefix_invoice_number			= 	redsys_use_patterns( $before_prefix_invoice_number							);
		$postfix_invoice_number			=	redsys_use_patterns( $before_postfix_invoice_number							);
		$get_invoice_if_exist			=	get_post_meta( $order_id, '_invoice_order_redsys', true					);

		if ( empty( $get_invoice_if_exist ) ){
			if ( !empty( $last_invoice_number ) ) settype( $last_invoice_number, 'integer' );
			if ( empty( $last_invoice_number ) ){
				// Check if there is a option with the first invoice number
				$first_invoice_number = get_option( 'wc_settings_tab_redsys_sort_invoices_first_invoice_number' );
				if ( empty( $first_invoice_number ) ) {
					$invoice_number = 1;
					update_option( 'wc_settings_tab_redsys_sort_invoices_last_invoice_number', $invoice_number );
				} else {
					settype( $first_invoice_number, 'integer' );
					$invoice_number = $first_invoice_number;
					update_option( 'wc_settings_tab_redsys_sort_invoices_last_invoice_number', $invoice_number );
				}
			} else {
				$invoice_number = ++$last_invoice_number;
				update_option( 'wc_settings_tab_redsys_sort_invoices_last_invoice_number', $invoice_number );
			}
			if( !empty( $length_invoice_number ) && ( strlen( $invoice_number ) < $length_invoice_number ) ){
				$invoice_number_long = str_pad($invoice_number, $length_invoice_number, '0', STR_PAD_LEFT);
			} else {
				$invoice_number_long = $invoice_number;
			}
			$final_invoice_number = $prefix_invoice_number . $invoice_number_long . $postfix_invoice_number;
			update_post_meta( $order_id, '_invoice_order_redsys', $final_invoice_number );
		}
	}
	function redsys_sort_invoice_orders_admin( $order_id ){

		$reset_invoice_number = get_option( 'wc_settings_tab_redsys_sort_invoices_reset_invoice_number' );
		if( $reset_invoice_number == 'yes' ){ redsys_check_current_year(); }

		$last_invoice_number			= 	get_option( 'wc_settings_tab_redsys_sort_invoices_last_invoice_number'		);
		$before_prefix_invoice_number	=	get_option( 'wc_settings_tab_redsys_sort_invoices_prefix_invoice_number'	);
		$before_postfix_invoice_number	=	get_option( 'wc_settings_tab_redsys_sort_invoices_postfix_invoice_number'	);
		$length_invoice_number			=	get_option( 'wc_settings_tab_redsys_sort_invoices_length_invoice_number'	);
		$prefix_invoice_number			= 	redsys_use_patterns( $before_prefix_invoice_number							);
		$postfix_invoice_number			=	redsys_use_patterns( $before_postfix_invoice_number							);
		$get_invoice_if_exist			=	get_post_meta( $order_id, '_invoice_order_redsys', true						);

		if ( empty( $get_invoice_if_exist ) ){
			if ( !empty( $last_invoice_number ) ) settype( $last_invoice_number, 'integer' );
			if ( empty( $last_invoice_number ) ){
				// Check if there is a option with the first invoice number
				$first_invoice_number = get_option( 'wc_settings_tab_redsys_sort_invoices_first_invoice_number' );
				if ( empty( $first_invoice_number ) ) {
					$invoice_number = 1;
					update_option( 'wc_settings_tab_redsys_sort_invoices_last_invoice_number', $invoice_number );
				} else {
					settype( $first_invoice_number, 'integer' );
					$invoice_number = $first_invoice_number;
					update_option( 'wc_settings_tab_redsys_sort_invoices_last_invoice_number', $invoice_number );
				}
			} else {
				$invoice_number = ++$last_invoice_number;
				update_option( 'wc_settings_tab_redsys_sort_invoices_last_invoice_number', $invoice_number );
			}
			if( !empty( $length_invoice_number ) && ( strlen( $invoice_number ) < $length_invoice_number ) ){
				$invoice_number_long = str_pad($invoice_number, $length_invoice_number, '0', STR_PAD_LEFT);
			} else {
				$invoice_number_long = $invoice_number;
			}
			$final_invoice_number = $prefix_invoice_number . $invoice_number_long . $postfix_invoice_number;
			update_post_meta( $order_id, '_invoice_order_redsys', $final_invoice_number );
		}
	}
	// We hook to WooCommerce payment function

	function redsys_add_invoice_number_to_customer_email ( $order ){

		$invoice_number = redsys_check_add_invoice_number( $order );
		if ( empty( $invoice_number ) ){
			printf( __( 'Order Number: %s', 'caixabank-tools-official' ), $order ); }
		else {
		echo '<h2>';
		printf( __( 'Invoice Number: %s', 'caixabank-tools-official' ), $invoice_number );
		echo '</h2>';
		}
	}

	function redsys_check_add_invoice_number( $order ){
		global $woocommerce, $post;

		$reset_invoice_number = get_option( 'wc_settings_tab_redsys_sort_invoices_reset_invoice_number' );
		if( $reset_invoice_number == 'yes' ){ redsys_check_current_year(); }
		$get_invoice_if_exist			=	get_post_meta( $order, '_invoice_order_redsys', true						);
		$last_invoice_number			= 	get_option( 'wc_settings_tab_redsys_sort_invoices_last_invoice_number'		);

		$last_invoice_number			= 	get_option( 'wc_settings_tab_redsys_sort_invoices_last_invoice_number'		);
		$before_prefix_invoice_number	=	get_option( 'wc_settings_tab_redsys_sort_invoices_prefix_invoice_number'	);
		$before_postfix_invoice_number	=	get_option( 'wc_settings_tab_redsys_sort_invoices_postfix_invoice_number'	);
		$length_invoice_number			=	get_option( 'wc_settings_tab_redsys_sort_invoices_length_invoice_number'	);
		$prefix_invoice_number			= 	redsys_use_patterns( $before_prefix_invoice_number );
		$postfix_invoice_number			=	redsys_use_patterns( $before_postfix_invoice_number );

		if ( !empty( $last_invoice_number ) ) settype( $last_invoice_number, 'integer' );


		if ( empty( $last_invoice_number ) ){
			// Check if there is a option with the first invoice number
			$first_invoice_number = get_option( 'wc_settings_tab_redsys_sort_invoices_first_invoice_number' );
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
		//return $get_invoice_if_exist;
	}

	function redsys_show_invoice_number( $oldnumber, $order ){
		$preorderprefix	= get_option( 'wc_settings_tab_redsys_sort_invoices_prefix_order_number'	);
		$preordersufix	= get_option( 'wc_settings_tab_redsys_sort_invoices_postfix_order_number'	);
		$orderprefix	= redsys_use_patterns( $preorderprefix );
		$ordersufix		= redsys_use_patterns( $preordersufix );

		if( empty( $ordersufix ) && empty( $orderprefix ) ){
			$ordersufix = __( '-ORDER', 'caixabank-tools-official' );
		}
		$order = get_post_meta( $oldnumber, '_invoice_order_redsys', true );
		if ( empty( $order ) ){ $order = $orderprefix . $oldnumber . $ordersufix; }
		if ( is_checkout() ) { $order = $oldnumber; }
		return $order;
	}
	function redsys_use_patterns( $string ){
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
	function redsys_check_current_year(){
		$current_year	= date_i18n( 'Y' );
		$saved_year		= get_option( 'redsys_saved_year' );
		settype( $saved_year, 'integer' );

		if( empty( $saved_year ) ){
			add_option( 'redsys_saved_year', $current_year );
		} else {
			if( $current_year > $saved_year ){
				update_option( 'redsys_saved_year', $current_year );
				update_option( 'wc_settings_tab_redsys_sort_invoices_first_invoice_number',	'0' );
				update_option( 'wc_settings_tab_redsys_sort_invoices_last_invoice_number',	'0' );
			}
		}
	}
?>
