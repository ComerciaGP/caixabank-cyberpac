<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>
	<div id="content" class="caixabank resent">
		<?php
			if ( ! empty( $_GET['caixabank'] ) ) {
			$post_id = $_GET['caixabank'];
			echo 'El id de la entrada es ' . $post_id; // Esto es para debug.
			echo '<h2>' . __('Redirecting','caixabank-tools-official') . '</h2>';
			echo '<h3>' . __('We are preparing all data for sent you to CaixaBank','caixabank-tools-official') . '</h3>';
			echo '<h3>' . __('Wait for a momento please','caixabank-tools-official') . '</h3>';
			//caixabank_redirect_to_tpv( $post_id );
			} else {
				echo '<h2>' . __('Nothing to see here','caixabank-tools-official') . '</h2>';
				echo '<h3>' . __('Do not access directly to this page','caixabank-tools-official') . '</h3>';
				}
		?>
	</div>
<?php get_footer(); ?>