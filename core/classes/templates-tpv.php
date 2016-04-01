<?php
	class Caixabank_Template_Loader {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_filter( 'template_include', array( $this, 'template_loader' ) );
	}

	public function template_loader( $template ) {
		$url = $_SERVER["REQUEST_URI"];
		$isIttpv = strpos($url, 'caixabank-tpv');
		if ( $isIttpv !==false ) {

			$file 	= 'caixabank-tpv.php';
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