<?php
	class Caixabank_Template_Loader {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_filter( 'template_include', array( $this, 'template_loader' ) );
	}

	public function template_loader( $template ) {
		$file = '';
		$url = $_SERVER["REQUEST_URI"];
		$isIttpv = strpos($url, 'caixabank-tpv');
		$isIsInvoice = strpos($url, 'caixabank-createinvoice');
		if ( $isIttpv !==false ) {
			$file 	= 'caixabank-tpv.php';
			$find[] = $file;
			$find[] = CAIXABANK_DIR_TEMPLATE . $file;
		}
		if ( $isIsInvoice !==false ) {
			$file 	= 'create-invoice.php';
			$find[] = $file;
			$find[] = CAIXABANK_DIR_TEMPLATE . $file;
		}

		if ( $file ) {
			$template       = locate_template( $find );
			if ( ! $template || current_user_can( 'manage_options' ) )
				$template = CAIXABANK_DIR_TEMPLATE . $file;
		}

		return $template;
	}
}

new Caixabank_Template_Loader();
?>