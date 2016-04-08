<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>
	<div id="content" class="caixabank resent">
		<?php

			if ( isset( $_GET['invoicing'] ) && !empty( $_GET['invoicing'] )){

				$type = '';
				$email = '';
				$amount = '';
				$dni = '';

				$type = $_GET['caixabank-invoice'];
				$email = sanitize_email ($_GET['caixabank-email']);
				$amount_untrasted = $_GET['caixabank-amount'];
				$amaunt_trusted = (int)$amount_untrasted;
				caixabank-dni
				echo 'El tipo de pago es ' . $type . '<br />'; // Esto es para debug.
				echo 'EL email del la persona que quiere hacer la donación es ' . $email . '<br />';
				echo 'La cantidad que quiere donar es ' . $amaunt_trusted . '<br />';
				echo '¿Llega todo bien?';
				//echo caixabank_create_invoice( $order_id );
				} else {
					echo '<h2>' . __('Nothing to see here','caixabank-tools-official') . '</h2>';
					echo '<h3>' . __('Do not access directly to this page','caixabank-tools-official') . '</h3>';
					}
		?>
	</div>
<?php get_footer(); ?>