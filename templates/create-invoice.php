<?php ob_start(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <!-- Meta Tags -->

    <head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="Otro sitio realizado con WordPress">

    <title><?php __('CaixaBank &raquo; Create Invoice', 'caixabank-tools-official'); ?> </title>
	<meta name='robots' content='noindex,nofollow' />
	<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css' media='all' />
	<link rel='stylesheet' id='caixabank-cretae-invoice' href="<?php echo CAIXABANK_DIR_URL; ?>assets/css/stylecreateinvoice.css?ver=1.0.0" rel='stylesheet' type='text/css' media='all' />
	</head>

<body>
	<div class="main">
		<div id="comercialogo">
			<img class="aligncenter" src="<?php echo CAIXABANK_DIR_URL; ?>assets/images/Comercia-Global-Payments-logo-create-invoice.png" alt="Comercia-Global-Payments-logo-create-invoice" width="300" height="101">
		</div>
		<?php if( is_user_logged_in() && current_user_can('manage_options') ) {
				$caixabankstep = sanitize_text_field( $_GET['step'] );
				if ( empty($caixabankstep)) { ?>

					<h2><?php _e('What do you want to do?','caixabank-tools-offcial'); ?></h2>

					<div class="social-icons">
						<div class="col_1_of_f span_1_of_f">
							<a href="<?php echo home_url('/caixabank-createinvoice/?step=createnewaccount') ?>">
					    		<ul class='createaccount'>
					    			<i class="fb"> </i>
					    			<?php echo $caixabankstep; ?>
									<li><?php _e('Create new account','caixabanl-tools-official'); ?></li>
									<div class='clear'> </div>
					    		</ul>
					    	</a>
						</div>
						<div class="col_1_of_f span_1_of_f">
							<a href="<?php echo home_url('/caixabank-createinvoice/?step=createnewinvoice') ?>">
					    		<ul class='createinvoice'>
									<i class="tw"> </i>
									<li><?php _e('Create new invoice','caixabanl-tools-official'); ?></li>
									<div class='clear'> </div>
					    		</ul>
					    	</a>
						</div>
						<div class="clear"> </div>
			      	</div>
			<?php }
				elseif ( $caixabankstep == 'createnewaccount') { ?>

					<h2><?php _e('Create New Account','caixabank-tools-offcial'); ?></h2>

					<form name="registeruser" id="registeruser" action="<?php echo home_url('/caixabank-createinvoice/?step=usersentforregister'); ?>" method="post" autocomplete="off">
					   <div class="lable">
					        <div class="col_1_of_2 span_1_of_2">	<input type="text" class="text" name="name" value="" placeholder="<?php _e('First name','caixabank-tools-official'); ?>" autocomplete="off"></div>
			                <div class="col_1_of_2 span_1_of_2"><input type="text" class="text" name="last_name" value="" placeholder="Last Name" autocomplete="off"></div>
			                <div class="clear"> </div>
					   </div>
					   <div class="lable-2">
					         <input type="text" class="text" name="username" value="" placeholder="username" autocomplete="off">
					        <input type="text" class="text" name="email" value="" placeholder="customer@email.com" autocomplete="off">
					        <input type="text" class="text" name="company" value="" placeholder="Company" autocomplete="off">
					        <input type="text" class="text" name="address_1" value="" placeholder="Address 1" autocomplete="off">
					        <input type="text" class="text" name="address_2" value="" placeholder="Address 2" autocomplete="off">
					        <input type="text" class="text" name="tax_status" value="" placeholder="Tax Status" autocomplete="off">
					        <input type="text" class="text" name="nif" value="" placeholder="NIF / CIF / NIE (IC)" autocomplete="off">
					        <input type="text" class="text" name="city" value="" placeholder="City" autocomplete="off">
					        <input type="text" class="text" name="postcode" value="" placeholder="Postcode" autocomplete="off">
					        <input type="text" class="text" name="country" value="" placeholder="Country" autocomplete="off">
					        <input type="text" class="text" name="state_county" value="" placeholder="State/County" autocomplete="off">
					        <input type="text" class="text" name="state_county_outsite_spain" value="" placeholder="State/County Outsite Spain" autocomplete="off">
					        <input type="text" class="text" name="telephone" value="" placeholder="Telephone" autocomplete="off">
					        <input type="text" class="text" name="mobile" value="" placeholder="Mobile" autocomplete="off">
					        <div class="clear"> </div>
					        <div class="col_1_of_2 span_1_of_2">
					        	<input type="number" class="number" name="custom_iva" value="" placeholder="Custom IVA" autocomplete="off">
					        </div>
							<div class="col_1_of_2 span_1_of_2">
								<input type="number" class="number" name="custom_irpf" value="" placeholder="Custom IRPF" autocomplete="off">
							</div>
							<div class="clear"> </div>
							<input type="hidden" name="caixabank_register_nonce" value="<?php echo wp_create_nonce('caixabank_register_nonce'); ?>"/>
					   </div>
					   <div class="submit">
						  <input type="submit" value="Create account" >
					   </div>
					   <div class="clear"> </div>
					</form>
			<?php }
				elseif ( $caixabankstep == 'createnewinvoice') { ?>

					<!-- form for invoice -->
					<h2><?php _e('Create Invoice','caixabank-tools-offcial'); ?></h2>
					<?php $caixabankgetuser = sanitize_text_field( $_GET['user_id'] );
					if( $caixabankgetuser ) {
							$all_meta_for_user = get_user_meta( $caixabankgetuser );
							//print_r( $all_meta_for_user );

							$username					= $all_meta_for_user['nickname'][0];
							$name						= $all_meta_for_user['caixabank_billing_name'][0];
							$last_name					= $all_meta_for_user['caixabank_billing_last_name'][0];
							$email						= $all_meta_for_user['caixabank_billing_email'][0];
							$company					= $all_meta_for_user['caixabank_billing_company'][0];
							$address_1					= $all_meta_for_user['caixabank_billing_address_1'][0];
							$address_2					= $all_meta_for_user['caixabank_billing_address_2'][0];
							$tax_status					= $all_meta_for_user['caixabank_billing_tax_status'][0];
							$nif						= $all_meta_for_user['caixabank_billing_nif'][0];
							$city						= $all_meta_for_user['caixabank_billing_city'][0];
							$postcode					= $all_meta_for_user['caixabank_billing_postcode'][0];
							$country					= $all_meta_for_user['caixabank_billing_country'][0];
							$state_county				= $all_meta_for_user['caixabank_billing_state'][0];
							$state_county_outsite_spain	= $all_meta_for_user['caixabank_billing_state_outsite'][0];
							$telephone					= $all_meta_for_user['caixabank_billing_telephone'][0];
							$mobile						= $all_meta_for_user['caixabank_billing_mobile'][0];
							$custom_iva					= $all_meta_for_user['caixabank_billing_custom_iva'][0];
							$custom_irpf				= $all_meta_for_user['caixabank_billing_custom_irpf'][0];




					?>

						<form name="registeruser" id="registeruser" action="<?php echo home_url('/caixabank-createinvoice/?step=usersentforregister'); ?>" method="post" autocomplete="off">
						   <div class="lable">
						        <div class="col_1_of_2 span_1_of_2">	<input type="text" class="text" name="name" value="<?php echo $name ?>" placeholder="<?php _e('First name','caixabank-tools-official'); ?>" autocomplete="off"></div>
				                <div class="col_1_of_2 span_1_of_2"><input type="text" class="text" name="last_name" value="<?php echo $last_name ?>" placeholder="Last Name" autocomplete="off"></div>
				                <div class="clear"> </div>
						   </div>
						   <div class="col_1_of_2 span_1_of_2">
							   <input type="number" class="number" name="custom_iva" value="<?php echo $custom_iva ?>" placeholder="Custom IVA" autocomplete="off">
						   </div>
						   <div class="col_1_of_2 span_1_of_2">
							   <input type="number" class="number" name="custom_irpf" value="<?php echo $custom_irpf ?>" placeholder="Custom IRPF" autocomplete="off">
							</div>
							<div class="clear"> </div>
						   <div class="lable-2">
						        <input type="number" class="numberamount" name="amount" value="" placeholder="Amount" autocomplete="off">
						        <input type="text" class="text" name="username" value="<?php echo $username ?>" placeholder="username" autocomplete="off">
						        <input type="text" class="text" name="email" value="<?php echo $email ?>" placeholder="customer@email.com" autocomplete="off">
						        <input type="text" class="text" name="company" value="<?php echo $company ?>" placeholder="Company" autocomplete="off">
						        <input type="text" class="text" name="address_1" value="<?php echo $address_1 ?>" placeholder="Address 1" autocomplete="off">
						        <input type="text" class="text" name="address_2" value="<?php echo $address_2 ?>" placeholder="Address 2" autocomplete="off">
						        <input type="text" class="text" name="tax_status" value="<?php echo $tax_status ?>" placeholder="Tax Status" autocomplete="off">
						        <input type="text" class="text" name="nif" value="<?php echo $nif ?>" placeholder="NIF / CIF / NIE (IC)" autocomplete="off">
						        <input type="text" class="text" name="city" value="<?php echo $city ?>" placeholder="City" autocomplete="off">
						        <input type="text" class="text" name="postcode" value="<?php echo $postcode ?>" placeholder="Postcode" autocomplete="off">
						        <input type="text" class="text" name="country" value="<?php echo $country ?>" placeholder="Country" autocomplete="off">
						        <input type="text" class="text" name="state_county" value="<?php echo $state_county ?>" placeholder="State/County" autocomplete="off">
						        <input type="text" class="text" name="state_county_outsite_spain" value="<?php echo $state_county_outsite_spain ?>" placeholder="State/County Outsite Spain" autocomplete="off">
						        <input type="text" class="text" name="telephone" value="<?php echo $telephone ?>" placeholder="Telephone" autocomplete="off">
						        <input type="text" class="text" name="mobile" value="<?php echo $mobile ?>" placeholder="Mobile" autocomplete="off">
						        <div class="clear"> </div>
						        <div class="lable-2">
						        <div class="clear"> </div>
								<input type="hidden" name="caixabank_register_nonce" value="<?php echo wp_create_nonce('caixabank_register_nonce'); ?>"/>
						   </div>
						   <div class="submit">
							  <input type="submit" value="<?php _e('Create Invoice','caixabank-tools-official'); ?>" >
						   </div>
						   <div class="clear"> </div>
						</form>
				<?php	}
			}
				elseif ( $caixabankstep == 'usersentforregister' && isset( $_POST["username"] ) && wp_verify_nonce( $_POST['caixabank_register_nonce'], 'caixabank_register_nonce' ) ){
					global $error;
					$error = new WP_Error();
						$name						= $_POST["name"];
						$user_name					= $_POST["username"];
						$last_name					= $_POST["last_name"];
						$email						= $_POST["email"];
						$company					= $_POST["company"];
						$address_1					= $_POST["address_1"];
						$address_2					= $_POST["address_2"];
						$tax_status					= $_POST["tax_status"];
						$nif						= $_POST["nif"];
						$city						= $_POST["city"];
						$postcode					= $_POST["postcode"];
						$country					= $_POST["country"];
						$state_county				= $_POST["state_county"];
						$state_county_outsite_spain	= $_POST["state_county_outsite_spain"];
						$telephone					= $_POST["telephone"];
						$mobile						= $_POST["mobile"];
						$custom_iva					= $_POST["custom_iva"];
						$custom_irpf				= $_POST["custom_irpf"];

						?><h2><?php _e('Create New Account','caixabank-tools-offcial'); ?></h2>
						<?php

						require_once( ABSPATH . WPINC . '/registration.php' );

						if( $name == '' ) {
							// empty username
							$error->add( 'name_empty', __( 'Please enter a name' ) );
						}
						if( $last_name == '' ) {
							// empty username
							$error->add( 'lastname_empty', __( 'Please enter a lastname' ) );
						}
						if( username_exists( $user_name ) ) {
							// Username already registered
							$error->add( 'username_unavailable', __( 'Username already taken' ) );
						}
						if( !validate_username( $user_name ) ) {
							// invalid username
							$error->add( 'username_invalid', __( 'Invalid username' ) );
						}
						if( $user_name == '' ) {
							// empty username
							$error->add( 'username_empty', __( 'Please enter a username' ) );
						}
						if(!is_email( $email ) ) {
							//invalid email
							$error->add('email_invalid', __( 'Invalid email' ) );
						}
						if(email_exists( $email ) ) {
							//Email address already registered
							$error->add('email_used', __( 'Email already registered' ) );
						}
						if( $email == '' ) {
							//Email address already registered
							$error->add('email_empty', __( 'Please enter an Email' ) );
						}
						if( $address_1 == '' ) {
							//Email address already registered
							$error->add('address_1_empty', __( 'Please enter an Address 1' ) );
						}
						if( $nif == '' ) {
							//Email address already registered
							$error->add('nif', __( 'Please enter NIF / NIE / CIF' ) );
						}
						if( $city == '' ) {
							//Email address already registered
							$error->add('city', __( 'Please enter a City' ) );
						}
						if( $postcode == '' ) {
							//Email address already registered
							$error->add('postcode', __( 'Please enter a Postcode' ) );
						}

							$errors = $error->get_error_messages();
							if ( $errors ){
								echo '<div class="caixabank_errors">';
								echo '<ul>';
								foreach( $errors as $error ){

									echo '<li>' . __('Error: ','caixabank-tools-official') . $error . '</li>';
								}
								echo '</ul>';
							    echo '</div>';
							    ?>
							    <form name="registeruser" id="registeruser" action="<?php echo home_url('/caixabank-createinvoice/?step=usersentforregister'); ?>" method="post" autocomplete="off">
								   <div class="lable">
								        <div class="col_1_of_2 span_1_of_2">
									        <input type="text" class="text" name="name" value="<?php echo $name ?>" placeholder="<?php _e('First name','caixabank-tools-official'); ?>" autocomplete="off"></div>
						                <div class="col_1_of_2 span_1_of_2">
							                <input type="text" class="text" name="last_name" value="<?php echo $last_name ?>" placeholder="Last Name" autocomplete="off"></div>
						                <div class="clear"> </div>
								   </div>
								   <div class="lable-2">
								         <input type="text" class="text" name="username" value="<?php echo $user_name ?>" placeholder="username" autocomplete="off">
								        <input type="text" class="text" name="email" value="<?php echo $email ?>" placeholder="customer@email.com" autocomplete="off">
								        <input type="text" class="text" name="company" value="<?php echo $company ?>" placeholder="Company" autocomplete="off">
								        <input type="text" class="text" name="address_1" value="<?php echo $address_1 ?>" placeholder="Address 1" autocomplete="off">
								        <input type="text" class="text" name="address_2" value="<?php echo $address_2 ?>" placeholder="Address 2" autocomplete="off">
								        <input type="text" class="text" name="tax_status" value="<?php echo $tax_status ?>" placeholder="Tax Status" autocomplete="off">
								        <input type="text" class="text" name="nif" value="<?php echo $nif ?>" placeholder="NIF / CIF / NIE (IC)" autocomplete="off">
								        <input type="text" class="text" name="city" value="<?php echo $city ?>" placeholder="City" autocomplete="off">
								        <input type="text" class="text" name="postcode" value="<?php echo $postcode ?>" placeholder="Postcode" autocomplete="off">
								        <input type="text" class="text" name="country" value="<?php echo $country ?>" placeholder="Country" autocomplete="off">
								        <input type="text" class="text" name="state_county" value="<?php echo $state_county ?>" placeholder="State/County" autocomplete="off">
								        <input type="text" class="text" name="state_county_outsite_spain" value="<?php echo $state_county_outsite_spain ?>" placeholder="State/County Outsite Spain" autocomplete="off">
								        <input type="text" class="text" name="telephone" value="<?php echo $telephone ?>" placeholder="Telephone" autocomplete="off">
								        <input type="text" class="text" name="mobile" value="<?php echo $mobile ?>" placeholder="Mobile" autocomplete="off">
								        <div class="clear"> </div>
								        <div class="col_1_of_2 span_1_of_2">
								        	<input type="number" class="number" name="custom_iva" value="<?php echo $custom_iva ?>" placeholder="Custom IVA" autocomplete="off">
								        </div>
										<div class="col_1_of_2 span_1_of_2">
											<input type="number" class="number" name="custom_irpf" value="<?php echo $custom_irpf ?>" placeholder="Custom IRPF" autocomplete="off">
										</div>
										<div class="clear"> </div>
										<input type="hidden" name="caixabank_register_nonce" value="<?php echo wp_create_nonce('caixabank_register_nonce'); ?>"/>
								   </div>
								   <div class="submit">
									  <input type="submit" value="Create account" >
								   </div>
								   <div class="clear"> </div>
								</form>
								<?php
							}
						 else {

								$user_pass = wp_generate_password();
					 			$new_user_id = wp_insert_user(array(
										'user_login'		=> $user_name,
										'user_pass'	 		=> $user_pass,
										'user_email'		=> $email,
										'first_name'		=> $name,
										'last_name'			=> $last_name,
										'user_registered'	=> date('Y-m-d H:i:s'),
										'role'				=> 'subscriber'
									)
								);
								if($new_user_id) {
									// Add user meta Billing

									add_user_meta( $new_user_id, 'caixabank_billing_name',				$name							);
									add_user_meta( $new_user_id, 'caixabank_billing_last_name',			$last_name						);
									add_user_meta( $new_user_id, 'caixabank_billing_email',				$email							);
									add_user_meta( $new_user_id, 'caixabank_billing_company',			$company						);
									add_user_meta( $new_user_id, 'caixabank_billing_address_1',			$address_1						);
									add_user_meta( $new_user_id, 'caixabank_billing_address_2',			$address_2						);
									add_user_meta( $new_user_id, 'caixabank_billing_tax_status',		$tax_status						);
									add_user_meta( $new_user_id, 'caixabank_billing_nif',				$nif							);
									add_user_meta( $new_user_id, 'caixabank_billing_city',				$city							);
									add_user_meta( $new_user_id, 'caixabank_billing_postcode',			$postcode						);
									add_user_meta( $new_user_id, 'caixabank_billing_country',			$country						);
									add_user_meta( $new_user_id, 'caixabank_billing_state',				$state_county					);
									add_user_meta( $new_user_id, 'caixabank_billing_state_outsite',		$state_county_outsite_spain		);
									add_user_meta( $new_user_id, 'caixabank_billing_telephone',			$telephone						);
									add_user_meta( $new_user_id, 'caixabank_billing_mobile',			$mobile							);
									add_user_meta( $new_user_id, 'caixabank_billing_custom_iva',		$custom_iva						);
									add_user_meta( $new_user_id, 'caixabank_billing_custom_irpf',		$custom_irpf					);

									// Add user meta Shipping

									add_user_meta( $new_user_id, 'caixabank_shipping_name',				$name							);
									add_user_meta( $new_user_id, 'caixabank_shipping_last_name',		$last_name						);
									add_user_meta( $new_user_id, 'caixabank_shipping_email',			$email							);
									add_user_meta( $new_user_id, 'caixabank_shipping_company',			$company						);
									add_user_meta( $new_user_id, 'caixabank_shipping_address_1',		$address_1						);
									add_user_meta( $new_user_id, 'caixabank_shipping_address_2',		$address_2						);
									add_user_meta( $new_user_id, 'caixabank_shipping_tax_status',		$tax_status						);
									add_user_meta( $new_user_id, 'caixabank_shipping_nif',				$nif							);
									add_user_meta( $new_user_id, 'caixabank_shipping_city',				$city							);
									add_user_meta( $new_user_id, 'caixabank_shipping_postcode',			$postcode						);
									add_user_meta( $new_user_id, 'caixabank_shipping_country',			$country						);
									add_user_meta( $new_user_id, 'caixabank_shipping_state',			$state_county					);
									add_user_meta( $new_user_id, 'caixabank_shipping_state_outsite',	$state_county_outsite_spain		);
									add_user_meta( $new_user_id, 'caixabank_shipping_telephone',		$telephone						);
									add_user_meta( $new_user_id, 'caixabank_shipping_mobile',			$mobile							);
									add_user_meta( $new_user_id, 'caixabank_shipping_custom_iva',		$custom_iva						);
									add_user_meta( $new_user_id, 'caixabank_shipping_custom_irpf',		$custom_irpf					);


									wp_new_user_notification($new_user_id);

									// log the new user in

									$url_path = '/caixabank-createinvoice/?step=createnewinvoice&user_id=' . $new_user_id;

									// send the newly created user to the home page after logging them in
									wp_redirect( home_url( $url_path ) ); exit;
								}
						}
				}
			} else { ?>


	  		<form name="loginform" id="loginform" action="<?php echo home_url('wp-login.php'); ?>" method="post">

				<p class="lable-2">
					<label for="user_login"><?php _e('Username','caixabank-tools-official'); ?></label>
					<input name="log" id="user_login" class="input" value="" size="20" type="text">
				</p>
				<p class="lable-2">
					<label for="user_pass"><?php _e('Password','caixabank-tools-official'); ?></label>
					<input name="pwd" id="user_pass" class="input" value="" size="20" type="password">
				</p>

				<p class="login-remember"><label><input name="rememberme" id="rememberme" value="forever" type="checkbox"> Recuérdame</label></p>
				<p class="submit">
					<input name="wp-submit" id="wp-submit" class="button-primary" value="<?php _e('Login','caixabank-tools-offcial'); ?>" type="submit">
					<input name="redirect_to" value="<?php echo home_url('/caixabank-createinvoice/'); ?>" type="hidden">
				</p>

			</form>


	  		<?php } ?>

	</div>

<footer id="main-footer" class="clearfix">

	<?php _e('Powered by CaixaBank','caixabank-tools-official'); ?>

</footer>

</body>

</html>
<?php ob_end_flush(); ?>