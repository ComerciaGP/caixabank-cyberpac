<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>
	<div id="content" class="caixabank resent">
		<?php

			if ( isset( $_GET['caixabank'] ) && !empty( $_GET['caixabank'] )){

				$precio = '';
				$order_id = '';

				$order_id = $_GET['caixabank'];
				echo 'El id del pedido es ' . $order_id; // Esto es para debug.
				echo '<h2>' . __('Redirecting','caixabank-tools-official') . '</h2>';
				echo '<h3>' . __('We are preparing all data for redirect you to CaixaBank','caixabank-tools-official') . '</h3>';
				echo '<h3>' . __('Wait for a moment please','caixabank-tools-official') . '</h3>';
				echo caixabank_redirect_to_tpv( $order_id );
				$precio = get_post_meta( $order_id, 'caixabank_order_metabox__caixabank_price', true );
				echo 'Precio: ' . $precio;
				} else {
					echo '<h2>' . __('Nothing to see here','caixabank-tools-official') . '</h2>';
					echo '<h3>' . __('Do not access directly to this page','caixabank-tools-official') . '</h3>';
					}
		?>
	</div>
<?php get_footer(); ?>