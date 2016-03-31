<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action( 'show_user_profile',  'caixabank_show_extra_profile_fields' );
add_action( 'edit_user_profile',  'caixabank_show_extra_profile_fields' );
add_action( 'personal_options_update', 'caixabank_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'caixabank_save_extra_profile_fields' );

function caixabank_show_extra_profile_fields( $user ) {
	$country   = get_the_author_meta( 'caixabank_billing_country',  $user->ID );
	$countryshipping = get_the_author_meta( 'caixabank_shipping_country', $user->ID );
	$taxstatusshipping = get_the_author_meta( 'caixabank_shipping_tax_status', $user->ID );
	$taxstatusbilling = get_the_author_meta( 'caixabank_billing_tax_status', $user->ID );
	$stateshipping  = get_the_author_meta( 'caixabank_billing_state',  $user->ID );
	$statebilling  = get_the_author_meta( 'caixabank_billing_state',  $user->ID );
?>

	<h3><?php _e( 'CaixaBank Billing Address', 'caixabank_tools_official' ); ?></h3>

	<table class="form-table">

		<tr>
			<th><label for="caixabank_billing_name"><?php _e('First name','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_name" id="caixabank_billing_name" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_name', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your First name.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_last_name"><?php _e('Last name','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_last_name" id="caixabank_billing_last_name" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_last_name', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Last name.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_company"><?php _e('Company','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_company" id="caixabank_billing_company" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_company', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Company name.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_address_1"><?php _e('Address 1','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_address_1" id="caixabank_billing_address_1" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_address_1', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Address 1.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_address_2"><?php _e('Address 2','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_address_2" id="caixabank_billing_address_2" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_address_2', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Address 2.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_tax_status"><?php _e('Tax Status','caixabank_tools_official'); ?></label></th>

			<td>
				<select name="caixabank_billing_tax_status" id="caixabank_billing_tax_status">
					<option <?php if( $taxstatusbilling == 'IND') echo 'selected="selected" '; ?>value="IND"><?php _e('Individual', 'caixabank_tools_official'); ?></option>
					<option <?php if( $taxstatusbilling == 'COM') echo 'selected="selected" '; ?>value="COM"><?php _e('Company', 'caixabank_tools_official'); ?></option>
					<option <?php if( $taxstatusbilling == 'FRE') echo 'selected="selected" '; ?>value="FRE"><?php _e('Freelance', 'caixabank_tools_official'); ?></option>
					<option <?php if( $taxstatusbilling == 'NPO') echo 'selected="selected" '; ?>value="NPO"><?php _e('Non-profit organization', 'caixabank_tools_official'); ?></option>
					<option <?php if( $taxstatusbilling == 'EIR') echo 'selected="selected" '; ?>value="EIR"><?php _e('Educational institutions regulated', 'caixabank_tools_official'); ?></option>
					<option <?php if( $taxstatusbilling == 'SCU') echo 'selected="selected" '; ?>value="SCU"><?php _e('Schools unregulated', 'caixabank_tools_official'); ?></option>
					<option <?php if( $taxstatusbilling == 'GOV') echo 'selected="selected" '; ?>value="GOV"><?php _e('Government organization', 'caixabank_tools_official'); ?></option>
				</select><br />
				<span class="description"><?php _e('Please select your tax status.','caixabank_tools_official'); ?></span>
			</td>
		</tr>


		<tr>
			<th><label for="caixabank_billing_nif"><?php _e('NIF / CIF / NIE (IC)','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_nif" id="caixabank_billing_nif" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_nif', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your NIF / CIF / NIE (IC).','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_city"><?php _e('City','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_city" id="caixabank_billing_city" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_city', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your City.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_postcode"><?php _e('Postcode','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_postcode" id="caixabank_billing_postcode" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_postcode', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Postcode.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_country"><?php _e('Country','caixabank_tools_official'); ?></label></th>

			<td>
				<select name="caixabank_billing_country" id="caixabank_billing_country">
					<option <?php if( $country == 'AF') echo 'selected="selected" '; ?>value="AF"><?php _e('Afghanistan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AX') echo 'selected="selected" '; ?>value="AX"><?php _e('&Aring;land Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AL') echo 'selected="selected" '; ?>value="AL"><?php _e('Albania', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'DZ') echo 'selected="selected" '; ?>value="DZ"><?php _e('Algeria', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AS') echo 'selected="selected" '; ?>value="AS"><?php _e('American Samoa', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AD') echo 'selected="selected" '; ?>value="AD"><?php _e('Andorra', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AO') echo 'selected="selected" '; ?>value="AO"><?php _e('Angola', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AI') echo 'selected="selected" '; ?>value="AI"><?php _e('Anguilla', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AQ') echo 'selected="selected" '; ?>value="AQ"><?php _e('Antarctica', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AG') echo 'selected="selected" '; ?>value="AG"><?php _e('Antigua and Barbuda', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AR') echo 'selected="selected" '; ?>value="AR"><?php _e('Argentina', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AM') echo 'selected="selected" '; ?>value="AM"><?php _e('Armenia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AW') echo 'selected="selected" '; ?>value="AW"><?php _e('Aruba', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AU') echo 'selected="selected" '; ?>value="AU"><?php _e('Australia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AT') echo 'selected="selected" '; ?>value="AT"><?php _e('Austria', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AZ') echo 'selected="selected" '; ?>value="AZ"><?php _e('Azerbaijan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BS') echo 'selected="selected" '; ?>value="BS"><?php _e('Bahamas', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BH') echo 'selected="selected" '; ?>value="BH"><?php _e('Bahrain', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BD') echo 'selected="selected" '; ?>value="BD"><?php _e('Bangladesh', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BB') echo 'selected="selected" '; ?>value="BB"><?php _e('Barbados', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BY') echo 'selected="selected" '; ?>value="BY"><?php _e('Belarus', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BE') echo 'selected="selected" '; ?>value="BE"><?php _e('Belgium', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BZ') echo 'selected="selected" '; ?>value="BZ"><?php _e('Belize', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BJ') echo 'selected="selected" '; ?>value="BJ"><?php _e('Benin', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BM') echo 'selected="selected" '; ?>value="BM"><?php _e('Bermuda', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BT') echo 'selected="selected" '; ?>value="BT"><?php _e('Bhutan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BO') echo 'selected="selected" '; ?>value="BO"><?php _e('Bolivia, Plurinational State of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BQ') echo 'selected="selected" '; ?>value="BQ"><?php _e('Bonaire, Sint Eustatius and Saba', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BA') echo 'selected="selected" '; ?>value="BA"><?php _e('Bosnia and Herzegovina', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BW') echo 'selected="selected" '; ?>value="BW"><?php _e('Botswana', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BV') echo 'selected="selected" '; ?>value="BV"><?php _e('Bouvet Island', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BR') echo 'selected="selected" '; ?>value="BR"><?php _e('Brazil', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'IO') echo 'selected="selected" '; ?>value="IO"><?php _e('British Indian Ocean Territory', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BN') echo 'selected="selected" '; ?>value="BN"><?php _e('Brunei Darussalam', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BG') echo 'selected="selected" '; ?>value="BG"><?php _e('Bulgaria', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BF') echo 'selected="selected" '; ?>value="BF"><?php _e('Burkina Faso', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BI') echo 'selected="selected" '; ?>value="BI"><?php _e('Burundi', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'KH') echo 'selected="selected" '; ?>value="KH"><?php _e('Cambodia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CM') echo 'selected="selected" '; ?>value="CM"><?php _e('Cameroon', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CA') echo 'selected="selected" '; ?>value="CA"><?php _e('Canada', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CV') echo 'selected="selected" '; ?>value="CV"><?php _e('Cape Verde', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'KY') echo 'selected="selected" '; ?>value="KY"><?php _e('Cayman Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CF') echo 'selected="selected" '; ?>value="CF"><?php _e('Central African Republic', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TD') echo 'selected="selected" '; ?>value="TD"><?php _e('Chad', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CL') echo 'selected="selected" '; ?>value="CL"><?php _e('Chile', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CN') echo 'selected="selected" '; ?>value="CN"><?php _e('China', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CX') echo 'selected="selected" '; ?>value="CX"><?php _e('Christmas Island', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CC') echo 'selected="selected" '; ?>value="CC"><?php _e('Cocos (Keeling) Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CO') echo 'selected="selected" '; ?>value="CO"><?php _e('Colombia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'KM') echo 'selected="selected" '; ?>value="KM"><?php _e('Comoros', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CG') echo 'selected="selected" '; ?>value="CG"><?php _e('Congo', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CD') echo 'selected="selected" '; ?>value="CD"><?php _e('Congo, the Democratic Republic of the', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CK') echo 'selected="selected" '; ?>value="CK"><?php _e('Cook Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CR') echo 'selected="selected" '; ?>value="CR"><?php _e('Costa Rica', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CI') echo 'selected="selected" '; ?>value="CI"><?php _e('C&ocirc;te d&quot;Ivoire', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'HR') echo 'selected="selected" '; ?>value="HR"><?php _e('Croatia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CU') echo 'selected="selected" '; ?>value="CU"><?php _e('Cuba', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CW') echo 'selected="selected" '; ?>value="CW"><?php _e('Cura&ccedil;ao', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CY') echo 'selected="selected" '; ?>value="CY"><?php _e('Cyprus', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CZ') echo 'selected="selected" '; ?>value="CZ"><?php _e('Czech Republic', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'DK') echo 'selected="selected" '; ?>value="DK"><?php _e('Denmark', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'DJ') echo 'selected="selected" '; ?>value="DJ"><?php _e('Djibouti', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'DM') echo 'selected="selected" '; ?>value="DM"><?php _e('Dominica', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'DO') echo 'selected="selected" '; ?>value="DO"><?php _e('Dominican Republic', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'EC') echo 'selected="selected" '; ?>value="EC"><?php _e('Ecuador', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'EG') echo 'selected="selected" '; ?>value="EG"><?php _e('Egypt', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SV') echo 'selected="selected" '; ?>value="SV"><?php _e('El Salvador', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GQ') echo 'selected="selected" '; ?>value="GQ"><?php _e('Equatorial Guinea', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'ER') echo 'selected="selected" '; ?>value="ER"><?php _e('Eritrea', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'EE') echo 'selected="selected" '; ?>value="EE"><?php _e('Estonia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'ET') echo 'selected="selected" '; ?>value="ET"><?php _e('Ethiopia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'FK') echo 'selected="selected" '; ?>value="FK"><?php _e('Falkland Islands (Malvinas)', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'FO') echo 'selected="selected" '; ?>value="FO"><?php _e('Faroe Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'FJ') echo 'selected="selected" '; ?>value="FJ"><?php _e('Fiji', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'FI') echo 'selected="selected" '; ?>value="FI"><?php _e('Finland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'FR') echo 'selected="selected" '; ?>value="FR"><?php _e('France', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GF') echo 'selected="selected" '; ?>value="GF"><?php _e('French Guiana', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PF') echo 'selected="selected" '; ?>value="PF"><?php _e('French Polynesia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TF') echo 'selected="selected" '; ?>value="TF"><?php _e('French Southern Territories', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GA') echo 'selected="selected" '; ?>value="GA"><?php _e('Gabon', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GM') echo 'selected="selected" '; ?>value="GM"><?php _e('Gambia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GE') echo 'selected="selected" '; ?>value="GE"><?php _e('Georgia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'DE') echo 'selected="selected" '; ?>value="DE"><?php _e('Germany', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GH') echo 'selected="selected" '; ?>value="GH"><?php _e('Ghana', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GI') echo 'selected="selected" '; ?>value="GI"><?php _e('Gibraltar', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GR') echo 'selected="selected" '; ?>value="GR"><?php _e('Greece', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GL') echo 'selected="selected" '; ?>value="GL"><?php _e('Greenland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GD') echo 'selected="selected" '; ?>value="GD"><?php _e('Grenada', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GP') echo 'selected="selected" '; ?>value="GP"><?php _e('Guadeloupe', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GU') echo 'selected="selected" '; ?>value="GU"><?php _e('Guam', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GT') echo 'selected="selected" '; ?>value="GT"><?php _e('Guatemala', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GG') echo 'selected="selected" '; ?>value="GG"><?php _e('Guernsey', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GN') echo 'selected="selected" '; ?>value="GN"><?php _e('Guinea', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GW') echo 'selected="selected" '; ?>value="GW"><?php _e('Guinea-Bissau', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GY') echo 'selected="selected" '; ?>value="GY"><?php _e('Guyana', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'HT') echo 'selected="selected" '; ?>value="HT"><?php _e('Haiti', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'HM') echo 'selected="selected" '; ?>value="HM"><?php _e('Heard Island and McDonald Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'VA') echo 'selected="selected" '; ?>value="VA"><?php _e('Holy See (Vatican City State)', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'HN') echo 'selected="selected" '; ?>value="HN"><?php _e('Honduras', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'HK') echo 'selected="selected" '; ?>value="HK"><?php _e('Hong Kong', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'HU') echo 'selected="selected" '; ?>value="HU"><?php _e('Hungary', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'IS') echo 'selected="selected" '; ?>value="IS"><?php _e('Iceland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'IN') echo 'selected="selected" '; ?>value="IN"><?php _e('India', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'ID') echo 'selected="selected" '; ?>value="ID"><?php _e('Indonesia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'IR') echo 'selected="selected" '; ?>value="IR"><?php _e('Iran, Islamic Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'IQ') echo 'selected="selected" '; ?>value="IQ"><?php _e('Iraq', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'IE') echo 'selected="selected" '; ?>value="IE"><?php _e('Ireland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'IM') echo 'selected="selected" '; ?>value="IM"><?php _e('Isle of Man', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'IL') echo 'selected="selected" '; ?>value="IL"><?php _e('Israel', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'IT') echo 'selected="selected" '; ?>value="IT"><?php _e('Italy', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'JM') echo 'selected="selected" '; ?>value="JM"><?php _e('Jamaica', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'JP') echo 'selected="selected" '; ?>value="JP"><?php _e('Japan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'JE') echo 'selected="selected" '; ?>value="JE"><?php _e('Jersey', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'JO') echo 'selected="selected" '; ?>value="JO"><?php _e('Jordan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'KZ') echo 'selected="selected" '; ?>value="KZ"><?php _e('Kazakhstan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'KE') echo 'selected="selected" '; ?>value="KE"><?php _e('Kenya', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'KI') echo 'selected="selected" '; ?>value="KI"><?php _e('Kiribati', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'KP') echo 'selected="selected" '; ?>value="KP"><?php _e('Korea, Democratic People&quot;s Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'KR') echo 'selected="selected" '; ?>value="KR"><?php _e('Korea, Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'KW') echo 'selected="selected" '; ?>value="KW"><?php _e('Kuwait', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'KG') echo 'selected="selected" '; ?>value="KG"><?php _e('Kyrgyzstan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'LA') echo 'selected="selected" '; ?>value="LA"><?php _e('Lao People&quot;s Democratic Republic', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'LV') echo 'selected="selected" '; ?>value="LV"><?php _e('Latvia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'LB') echo 'selected="selected" '; ?>value="LB"><?php _e('Lebanon', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'LS') echo 'selected="selected" '; ?>value="LS"><?php _e('Lesotho', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'LR') echo 'selected="selected" '; ?>value="LR"><?php _e('Liberia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'LY') echo 'selected="selected" '; ?>value="LY"><?php _e('Libya', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'LI') echo 'selected="selected" '; ?>value="LI"><?php _e('Liechtenstein', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'LT') echo 'selected="selected" '; ?>value="LT"><?php _e('Lithuania', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'LU') echo 'selected="selected" '; ?>value="LU"><?php _e('Luxembourg', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MO') echo 'selected="selected" '; ?>value="MO"><?php _e('Macao', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MK') echo 'selected="selected" '; ?>value="MK"><?php _e('Macedonia, the former Yugoslav Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MG') echo 'selected="selected" '; ?>value="MG"><?php _e('Madagascar', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MW') echo 'selected="selected" '; ?>value="MW"><?php _e('Malawi', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MY') echo 'selected="selected" '; ?>value="MY"><?php _e('Malaysia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MV') echo 'selected="selected" '; ?>value="MV"><?php _e('Maldives', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'ML') echo 'selected="selected" '; ?>value="ML"><?php _e('Mali', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MT') echo 'selected="selected" '; ?>value="MT"><?php _e('Malta', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MH') echo 'selected="selected" '; ?>value="MH"><?php _e('Marshall Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MQ') echo 'selected="selected" '; ?>value="MQ"><?php _e('Martinique', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MR') echo 'selected="selected" '; ?>value="MR"><?php _e('Mauritania', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MU') echo 'selected="selected" '; ?>value="MU"><?php _e('Mauritius', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'YT') echo 'selected="selected" '; ?>value="YT"><?php _e('Mayotte', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MX') echo 'selected="selected" '; ?>value="MX"><?php _e('Mexico', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'FM') echo 'selected="selected" '; ?>value="FM"><?php _e('Micronesia, Federated States of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MD') echo 'selected="selected" '; ?>value="MD"><?php _e('Moldova, Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MC') echo 'selected="selected" '; ?>value="MC"><?php _e('Monaco', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MN') echo 'selected="selected" '; ?>value="MN"><?php _e('Mongolia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'ME') echo 'selected="selected" '; ?>value="ME"><?php _e('Montenegro', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MS') echo 'selected="selected" '; ?>value="MS"><?php _e('Montserrat', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MA') echo 'selected="selected" '; ?>value="MA"><?php _e('Morocco', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MZ') echo 'selected="selected" '; ?>value="MZ"><?php _e('Mozambique', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MM') echo 'selected="selected" '; ?>value="MM"><?php _e('Myanmar', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'NA') echo 'selected="selected" '; ?>value="NA"><?php _e('Namibia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'NR') echo 'selected="selected" '; ?>value="NR"><?php _e('Nauru', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'NP') echo 'selected="selected" '; ?>value="NP"><?php _e('Nepal', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'NL') echo 'selected="selected" '; ?>value="NL"><?php _e('Netherlands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'NC') echo 'selected="selected" '; ?>value="NC"><?php _e('New Caledonia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'NZ') echo 'selected="selected" '; ?>value="NZ"><?php _e('New Zealand', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'NI') echo 'selected="selected" '; ?>value="NI"><?php _e('Nicaragua', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'NE') echo 'selected="selected" '; ?>value="NE"><?php _e('Niger', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'NG') echo 'selected="selected" '; ?>value="NG"><?php _e('Nigeria', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'NU') echo 'selected="selected" '; ?>value="NU"><?php _e('Niue', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'NF') echo 'selected="selected" '; ?>value="NF"><?php _e('Norfolk Island', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MP') echo 'selected="selected" '; ?>value="MP"><?php _e('Northern Mariana Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'NO') echo 'selected="selected" '; ?>value="NO"><?php _e('Norway', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'OM') echo 'selected="selected" '; ?>value="OM"><?php _e('Oman', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PK') echo 'selected="selected" '; ?>value="PK"><?php _e('Pakistan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PW') echo 'selected="selected" '; ?>value="PW"><?php _e('Palau', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PS') echo 'selected="selected" '; ?>value="PS"><?php _e('Palestinian Territory, Occupied', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PA') echo 'selected="selected" '; ?>value="PA"><?php _e('Panama', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PG') echo 'selected="selected" '; ?>value="PG"><?php _e('Papua New Guinea', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PY') echo 'selected="selected" '; ?>value="PY"><?php _e('Paraguay', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PE') echo 'selected="selected" '; ?>value="PE"><?php _e('Peru', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PH') echo 'selected="selected" '; ?>value="PH"><?php _e('Philippines', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PN') echo 'selected="selected" '; ?>value="PN"><?php _e('Pitcairn', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PL') echo 'selected="selected" '; ?>value="PL"><?php _e('Poland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PT') echo 'selected="selected" '; ?>value="PT"><?php _e('Portugal', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PR') echo 'selected="selected" '; ?>value="PR"><?php _e('Puerto Rico', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'QA') echo 'selected="selected" '; ?>value="QA"><?php _e('Qatar', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'RE') echo 'selected="selected" '; ?>value="RE"><?php _e('R&eacute;union', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'RO') echo 'selected="selected" '; ?>value="RO"><?php _e('Romania', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'RU') echo 'selected="selected" '; ?>value="RU"><?php _e('Russian Federation', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'RW') echo 'selected="selected" '; ?>value="RW"><?php _e('Rwanda', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'BL') echo 'selected="selected" '; ?>value="BL"><?php _e('Saint Barth&eacute;lemy', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SH') echo 'selected="selected" '; ?>value="SH"><?php _e('Saint Helena, Ascension and Tristan da Cunha', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'KN') echo 'selected="selected" '; ?>value="KN"><?php _e('Saint Kitts and Nevis', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'LC') echo 'selected="selected" '; ?>value="LC"><?php _e('Saint Lucia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'MF') echo 'selected="selected" '; ?>value="MF"><?php _e('Saint Martin (French part)', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'PM') echo 'selected="selected" '; ?>value="PM"><?php _e('Saint Pierre and Miquelon', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'VC') echo 'selected="selected" '; ?>value="VC"><?php _e('Saint Vincent and the Grenadines', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'WS') echo 'selected="selected" '; ?>value="WS"><?php _e('Samoa', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SM') echo 'selected="selected" '; ?>value="SM"><?php _e('San Marino', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'ST') echo 'selected="selected" '; ?>value="ST"><?php _e('Sao Tome and Principe', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SA') echo 'selected="selected" '; ?>value="SA"><?php _e('Saudi Arabia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SN') echo 'selected="selected" '; ?>value="SN"><?php _e('Senegal', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'RS') echo 'selected="selected" '; ?>value="RS"><?php _e('Serbia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SC') echo 'selected="selected" '; ?>value="SC"><?php _e('Seychelles', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SL') echo 'selected="selected" '; ?>value="SL"><?php _e('Sierra Leone', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SG') echo 'selected="selected" '; ?>value="SG"><?php _e('Singapore', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SX') echo 'selected="selected" '; ?>value="SX"><?php _e('Sint Maarten (Dutch part)', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SK') echo 'selected="selected" '; ?>value="SK"><?php _e('Slovakia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SI') echo 'selected="selected" '; ?>value="SI"><?php _e('Slovenia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SB') echo 'selected="selected" '; ?>value="SB"><?php _e('Solomon Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SO') echo 'selected="selected" '; ?>value="SO"><?php _e('Somalia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'ZA') echo 'selected="selected" '; ?>value="ZA"><?php _e('South Africa', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GS') echo 'selected="selected" '; ?>value="GS"><?php _e('South Georgia and the South Sandwich Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SS') echo 'selected="selected" '; ?>value="SS"><?php _e('South Sudan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'ES') echo 'selected="selected" '; ?>value="ES"><?php _e('Spain', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'LK') echo 'selected="selected" '; ?>value="LK"><?php _e('Sri Lanka', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SD') echo 'selected="selected" '; ?>value="SD"><?php _e('Sudan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SR') echo 'selected="selected" '; ?>value="SR"><?php _e('Suriname', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SJ') echo 'selected="selected" '; ?>value="SJ"><?php _e('Svalbard and Jan Mayen', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SZ') echo 'selected="selected" '; ?>value="SZ"><?php _e('Swaziland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SE') echo 'selected="selected" '; ?>value="SE"><?php _e('Sweden', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'CH') echo 'selected="selected" '; ?>value="CH"><?php _e('Switzerland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'SY') echo 'selected="selected" '; ?>value="SY"><?php _e('Syrian Arab Republic', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TW') echo 'selected="selected" '; ?>value="TW"><?php _e('Taiwan, Province of China', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TJ') echo 'selected="selected" '; ?>value="TJ"><?php _e('Tajikistan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TZ') echo 'selected="selected" '; ?>value="TZ"><?php _e('Tanzania, United Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TH') echo 'selected="selected" '; ?>value="TH"><?php _e('Thailand', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TL') echo 'selected="selected" '; ?>value="TL"><?php _e('Timor-Leste', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TG') echo 'selected="selected" '; ?>value="TG"><?php _e('Togo', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TK') echo 'selected="selected" '; ?>value="TK"><?php _e('Tokelau', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TO') echo 'selected="selected" '; ?>value="TO"><?php _e('Tonga', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TT') echo 'selected="selected" '; ?>value="TT"><?php _e('Trinidad and Tobago', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TN') echo 'selected="selected" '; ?>value="TN"><?php _e('Tunisia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TR') echo 'selected="selected" '; ?>value="TR"><?php _e('Turkey', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TM') echo 'selected="selected" '; ?>value="TM"><?php _e('Turkmenistan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TC') echo 'selected="selected" '; ?>value="TC"><?php _e('Turks and Caicos Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'TV') echo 'selected="selected" '; ?>value="TV"><?php _e('Tuvalu', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'UG') echo 'selected="selected" '; ?>value="UG"><?php _e('Uganda', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'UA') echo 'selected="selected" '; ?>value="UA"><?php _e('Ukraine', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'AE') echo 'selected="selected" '; ?>value="AE"><?php _e('United Arab Emirates', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'GB') echo 'selected="selected" '; ?>value="GB"><?php _e('United Kingdom', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'US') echo 'selected="selected" '; ?>value="US"><?php _e('United States', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'UM') echo 'selected="selected" '; ?>value="UM"><?php _e('United States Minor Outlying Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'UY') echo 'selected="selected" '; ?>value="UY"><?php _e('Uruguay', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'UZ') echo 'selected="selected" '; ?>value="UZ"><?php _e('Uzbekistan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'VU') echo 'selected="selected" '; ?>value="VU"><?php _e('Vanuatu', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'VE') echo 'selected="selected" '; ?>value="VE"><?php _e('Venezuela, Bolivarian Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'VN') echo 'selected="selected" '; ?>value="VN"><?php _e('Viet Nam', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'VG') echo 'selected="selected" '; ?>value="VG"><?php _e('Virgin Islands, British', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'VI') echo 'selected="selected" '; ?>value="VI"><?php _e('Virgin Islands, U.S.', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'WF') echo 'selected="selected" '; ?>value="WF"><?php _e('Wallis and Futuna', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'EH') echo 'selected="selected" '; ?>value="EH"><?php _e('Western Sahara', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'YE') echo 'selected="selected" '; ?>value="YE"><?php _e('Yemen', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'ZM') echo 'selected="selected" '; ?>value="ZM"><?php _e('Zambia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $country == 'ZW') echo 'selected="selected" '; ?>value="ZW"><?php _e('Zimbabwe', 'caixabank_tools_official'); ?></option>
				</select><br />
				<span class="description"><?php _e('Please select your Country.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_state"><?php _e('State/County','caixabank_tools_official'); ?></label></th>

				<td>
					<select name="caixabank_billing_state" id="caixabank_billing_state">
						 <option <?php if( $stateshipping == 'fueraespana')   echo 'selected="selected" '; ?> value='fueraespana'><?php _e('Outsite Spain','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'alava')    echo 'selected="selected" '; ?> value='alava'><?php _e('&Aacute;lava','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'albacete')   echo 'selected="selected" '; ?> value='albacete'><?php _e('Albacete','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'alicante')   echo 'selected="selected" '; ?> value='alicante'><?php _e('Alicante/Alacant','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'almeria')    echo 'selected="selected" '; ?> value='almeria'><?php _e('Almer&iacute;a','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'asturias')   echo 'selected="selected" '; ?> value='asturias'><?php _e('Asturias','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'avila')    echo 'selected="selected" '; ?> value='avila'><?php _e('&Aacute;vila','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'badajoz')    echo 'selected="selected" '; ?> value='badajoz'><?php _e('Badajoz','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'barcelona')   echo 'selected="selected" '; ?> value='barcelona'><?php _e('Barcelona','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'burgos')    echo 'selected="selected" '; ?> value='burgos'><?php _e('Burgos','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'caceres')    echo 'selected="selected" '; ?> value='caceres'><?php _e('C&Aacute;ceres','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'cadiz')    echo 'selected="selected" '; ?> value='cadiz'><?php _e('C&Aacute;diz','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'cantabria')   echo 'selected="selected" '; ?> value='cantabria'><?php _e('Cantabria','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'castellon')   echo 'selected="selected" '; ?> value='castellon'><?php _e('Castell&oacute;n/Castell&oacute;','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'ceuta')    echo 'selected="selected" '; ?> value='ceuta'><?php _e('Ceuta','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'ciudadreal')   echo 'selected="selected" '; ?> value='ciudadreal'><?php _e('Ciudad Real','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'cordoba')    echo 'selected="selected" '; ?> value='cordoba'><?php _e('C&oacute;rdoba','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'cuenca')    echo 'selected="selected" '; ?> value='cuenca'><?php _e('Cuenca','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'girona')    echo 'selected="selected" '; ?> value='girona'><?php _e('Girona','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'laspalmas')   echo 'selected="selected" '; ?> value='laspalmas'><?php _e('Las Palmas','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'granada')    echo 'selected="selected" '; ?> value='granada'><?php _e('Granada','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'guadalajara')   echo 'selected="selected" '; ?> value='guadalajara'><?php _e('Guadalajara','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'guipuzcoa')   echo 'selected="selected" '; ?> value='guipuzcoa'><?php _e('Guip&uacute;zcoa','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'huelva')    echo 'selected="selected" '; ?> value='huelva'><?php _e('Huelva','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'huesca')    echo 'selected="selected" '; ?> value='huesca'><?php _e('Huesca','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'illesbalears')  echo 'selected="selected" '; ?> value='illesbalears'><?php _e('Illes Balears','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'jaen')    echo 'selected="selected" '; ?> value='jaen'><?php _e('Ja&eacute;n','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'acoruna')    echo 'selected="selected" '; ?> value='acoruna'><?php _e('A Coru&ntilde;a','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'larioja')    echo 'selected="selected" '; ?> value='larioja'><?php _e('La Rioja','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'leon')    echo 'selected="selected" '; ?> value='leon'><?php _e('Le&oacute;n','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'lleida')    echo 'selected="selected" '; ?> value='lleida'><?php _e('Lleida','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'lugo')    echo 'selected="selected" '; ?> value='lugo'><?php _e('Lugo','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'madrid')    echo 'selected="selected" '; ?> value='madrid'><?php _e('Madrid','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'malaga')    echo 'selected="selected" '; ?> value='malaga'><?php _e('M&Aacute;laga','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'melilla')    echo 'selected="selected" '; ?> value='melilla'><?php _e('Melilla','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'murcia')    echo 'selected="selected" '; ?> value='murcia'><?php _e('Murcia','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'navarra')    echo 'selected="selected" '; ?> value='navarra'><?php _e('Navarra','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'ourense')    echo 'selected="selected" '; ?> value='ourense'><?php _e('Ourense','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'palencia')   echo 'selected="selected" '; ?> value='palencia'><?php _e('Palencia','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'pontevedra')   echo 'selected="selected" '; ?> value='pontevedra'><?php _e('Pontevedra','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'salamanca')   echo 'selected="selected" '; ?> value='salamanca'><?php _e('Salamanca','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'segovia')    echo 'selected="selected" '; ?> value='segovia'><?php _e('Segovia','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'sevilla')    echo 'selected="selected" '; ?> value='sevilla'><?php _e('Sevilla','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'soria')    echo 'selected="selected" '; ?> value='soria'><?php _e('Soria','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'tarragona')   echo 'selected="selected" '; ?> value='tarragona'><?php _e('Tarragona','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'santacruztenerife') echo 'selected="selected" '; ?> value='santacruztenerife'><?php _e('Santa Cruz de Tenerife','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'teruel')    echo 'selected="selected" '; ?> value='teruel'><?php _e('Teruel','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'toledo')    echo 'selected="selected" '; ?> value='toledo'><?php _e('Toledo','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'valencia')   echo 'selected="selected" '; ?> value='valencia'><?php _e('Valencia/Val&eacute;ncia','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'valladolid')   echo 'selected="selected" '; ?> value='valladolid'><?php _e('Valladolid','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'vizcaya')    echo 'selected="selected" '; ?> value='vizcaya'><?php _e('Vizcaya','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'zamora')    echo 'selected="selected" '; ?> value='zamora'><?php _e('Zamora','caixabank-tools-official'); ?></option>
						 <option <?php if( $stateshipping == 'zaragoza')   echo 'selected="selected" '; ?> value='zaragoza'><?php _e('Zaragoza','caixabank-tools-official'); ?></option>
					</select><br />
					<span class="description"><?php _e('Please select your State/County.','caixabank_tools_official'); ?></span>
				</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_state_outsite"><?php _e('State/County Outsite Spain','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_state_outsite" id="caixabank_billing_state_outsite" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_state_outsite', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your State/County if you are from outsite Spain.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_telephone"><?php _e('Telephone','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_telephone" id="caixabank_billing_telephone" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_telephone', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Telephone.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_mobile"><?php _e('Mobile','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_mobile" id="caixabank_billing_mobile" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_mobile', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Mobile.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_email"><?php _e('Email','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_email" id="caixabank_billing_email" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_email', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your email.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<?php if( current_user_can('manage_options')){ ?>

		<tr>
			<th><label for="caixabank_billing_custom_iva"><?php _e('Custom IVA','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_custom_iva" id="caixabank_billing_custom_iva" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_custom_iva', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter a custom IVA for this user.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_custom_irpf"><?php _e('Custom IRPF','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_custom_irpf" id="caixabank_billing_custom_irpf" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_custom_irpf', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter a custom IRPF for this user.','caixabank_tools_official'); ?></span>
			</td>
		</tr>
		<?php } else { ?>

				<tr>
			<th><label for="caixabank_billing_custom_iva"><?php _e('Custom IVA','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_custom_iva" id="caixabank_billing_custom_iva" disabled="disabled" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_custom_iva', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('If you need to modify IVA Tax, you need to contact with the site administrator.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_billing_custom_irpf"><?php _e('Custom IRPF','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_billing_custom_irpf" id="caixabank_billing_custom_irpf" disabled="disabled" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_billing_custom_irpf', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('If you need to modify IRPF, you need to contact with the site administrator..','caixabank_tools_official'); ?></span>
			</td>
		</tr>
			<?php }
		?>

	</table>

	<h3><?php _e( 'CaixaBank Shipping Address', 'caixabank_tools_official' ); ?></h3>

	<table class="form-table">

		<tr>
			<th><label for="caixabank_shipping_name"><?php _e('First name','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_shipping_name" id="caixabank_shipping_name" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_shipping_name', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your First name.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_last_name"><?php _e('Last name','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_shipping_last_name" id="caixabank_shipping_last_name" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_shipping_last_name', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Last name.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_company"><?php _e('Company','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_shipping_company" id="caixabank_shipping_company" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_shipping_company', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Company name.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_address_1"><?php _e('Address 1','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_shipping_address_1" id="caixabank_shipping_address_1" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_shipping_address_1', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Address 1.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_address_2"><?php _e('Address 2','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_shipping_address_2" id="caixabank_shipping_address_2" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_shipping_address_2', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Address 2.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_tax_status"><?php _e('Tax Status','caixabank_tools_official'); ?></label></th>

			<td>
				<select name="caixabank_shipping_tax_status" id="caixabank_shipping_tax_status">
					<option <?php if( $taxstatusshipping == 'IND') echo 'selected="selected" '; ?>value="IND"><?php _e('Individual', 'caixabank_tools_official'); ?></option>
					<option <?php if( $taxstatusshipping == 'COM') echo 'selected="selected" '; ?>value="COM"><?php _e('Company', 'caixabank_tools_official'); ?></option>
					<option <?php if( $taxstatusshipping == 'FRE') echo 'selected="selected" '; ?>value="FRE"><?php _e('Freelance', 'caixabank_tools_official'); ?></option>
					<option <?php if( $taxstatusshipping == 'NPO') echo 'selected="selected" '; ?>value="NPO"><?php _e('Non-profit organization', 'caixabank_tools_official'); ?></option>
					<option <?php if( $taxstatusshipping == 'EIR') echo 'selected="selected" '; ?>value="EIR"><?php _e('Educational institutions regulated', 'caixabank_tools_official'); ?></option>
					<option <?php if( $taxstatusshipping == 'SCU') echo 'selected="selected" '; ?>value="SCU"><?php _e('Schools unregulated', 'caixabank_tools_official'); ?></option>
					<option <?php if( $taxstatusshipping == 'GOV') echo 'selected="selected" '; ?>value="GOV"><?php _e('Government organization', 'caixabank_tools_official'); ?></option>
				</select><br />
				<span class="description"><?php _e('Please select your tax status.','caixabank_tools_official'); ?></span>
			</td>
		</tr>


		<tr>
			<th><label for="caixabank_shipping_nif"><?php _e('NIF / CIF / NIE (IC)','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_shipping_nif" id="caixabank_shipping_nif" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_shipping_nif', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your NIF / CIF / NIE (IC).','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_city"><?php _e('City','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_shipping_city" id="caixabank_shipping_city" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_shipping_city', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your City.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_postcode"><?php _e('Postcode','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_shipping_postcode" id="caixabank_shipping_postcode" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_shipping_postcode', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Postcode.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_country"><?php _e('Country','caixabank_tools_official'); ?></label></th>

			<td>
				<select name="caixabank_shipping_country" id="caixabank_shipping_country">
					<option <?php if( $countryshipping == 'AF') echo 'selected="selected" '; ?>value="AF"><?php _e('Afghanistan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AX') echo 'selected="selected" '; ?>value="AX"><?php _e('&Aring;land Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AL') echo 'selected="selected" '; ?>value="AL"><?php _e('Albania', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'DZ') echo 'selected="selected" '; ?>value="DZ"><?php _e('Algeria', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AS') echo 'selected="selected" '; ?>value="AS"><?php _e('American Samoa', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AD') echo 'selected="selected" '; ?>value="AD"><?php _e('Andorra', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AO') echo 'selected="selected" '; ?>value="AO"><?php _e('Angola', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AI') echo 'selected="selected" '; ?>value="AI"><?php _e('Anguilla', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AQ') echo 'selected="selected" '; ?>value="AQ"><?php _e('Antarctica', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AG') echo 'selected="selected" '; ?>value="AG"><?php _e('Antigua and Barbuda', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AR') echo 'selected="selected" '; ?>value="AR"><?php _e('Argentina', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AM') echo 'selected="selected" '; ?>value="AM"><?php _e('Armenia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AW') echo 'selected="selected" '; ?>value="AW"><?php _e('Aruba', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AU') echo 'selected="selected" '; ?>value="AU"><?php _e('Australia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AT') echo 'selected="selected" '; ?>value="AT"><?php _e('Austria', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AZ') echo 'selected="selected" '; ?>value="AZ"><?php _e('Azerbaijan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BS') echo 'selected="selected" '; ?>value="BS"><?php _e('Bahamas', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BH') echo 'selected="selected" '; ?>value="BH"><?php _e('Bahrain', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BD') echo 'selected="selected" '; ?>value="BD"><?php _e('Bangladesh', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BB') echo 'selected="selected" '; ?>value="BB"><?php _e('Barbados', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BY') echo 'selected="selected" '; ?>value="BY"><?php _e('Belarus', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BE') echo 'selected="selected" '; ?>value="BE"><?php _e('Belgium', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BZ') echo 'selected="selected" '; ?>value="BZ"><?php _e('Belize', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BJ') echo 'selected="selected" '; ?>value="BJ"><?php _e('Benin', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BM') echo 'selected="selected" '; ?>value="BM"><?php _e('Bermuda', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BT') echo 'selected="selected" '; ?>value="BT"><?php _e('Bhutan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BO') echo 'selected="selected" '; ?>value="BO"><?php _e('Bolivia, Plurinational State of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BQ') echo 'selected="selected" '; ?>value="BQ"><?php _e('Bonaire, Sint Eustatius and Saba', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BA') echo 'selected="selected" '; ?>value="BA"><?php _e('Bosnia and Herzegovina', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BW') echo 'selected="selected" '; ?>value="BW"><?php _e('Botswana', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BV') echo 'selected="selected" '; ?>value="BV"><?php _e('Bouvet Island', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BR') echo 'selected="selected" '; ?>value="BR"><?php _e('Brazil', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'IO') echo 'selected="selected" '; ?>value="IO"><?php _e('British Indian Ocean Territory', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BN') echo 'selected="selected" '; ?>value="BN"><?php _e('Brunei Darussalam', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BG') echo 'selected="selected" '; ?>value="BG"><?php _e('Bulgaria', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BF') echo 'selected="selected" '; ?>value="BF"><?php _e('Burkina Faso', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BI') echo 'selected="selected" '; ?>value="BI"><?php _e('Burundi', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'KH') echo 'selected="selected" '; ?>value="KH"><?php _e('Cambodia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CM') echo 'selected="selected" '; ?>value="CM"><?php _e('Cameroon', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CA') echo 'selected="selected" '; ?>value="CA"><?php _e('Canada', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CV') echo 'selected="selected" '; ?>value="CV"><?php _e('Cape Verde', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'KY') echo 'selected="selected" '; ?>value="KY"><?php _e('Cayman Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CF') echo 'selected="selected" '; ?>value="CF"><?php _e('Central African Republic', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TD') echo 'selected="selected" '; ?>value="TD"><?php _e('Chad', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CL') echo 'selected="selected" '; ?>value="CL"><?php _e('Chile', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CN') echo 'selected="selected" '; ?>value="CN"><?php _e('China', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CX') echo 'selected="selected" '; ?>value="CX"><?php _e('Christmas Island', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CC') echo 'selected="selected" '; ?>value="CC"><?php _e('Cocos (Keeling) Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CO') echo 'selected="selected" '; ?>value="CO"><?php _e('Colombia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'KM') echo 'selected="selected" '; ?>value="KM"><?php _e('Comoros', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CG') echo 'selected="selected" '; ?>value="CG"><?php _e('Congo', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CD') echo 'selected="selected" '; ?>value="CD"><?php _e('Congo, the Democratic Republic of the', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CK') echo 'selected="selected" '; ?>value="CK"><?php _e('Cook Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CR') echo 'selected="selected" '; ?>value="CR"><?php _e('Costa Rica', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CI') echo 'selected="selected" '; ?>value="CI"><?php _e('C&ocirc;te d&quot;Ivoire', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'HR') echo 'selected="selected" '; ?>value="HR"><?php _e('Croatia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CU') echo 'selected="selected" '; ?>value="CU"><?php _e('Cuba', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CW') echo 'selected="selected" '; ?>value="CW"><?php _e('Cura&ccedil;ao', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CY') echo 'selected="selected" '; ?>value="CY"><?php _e('Cyprus', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CZ') echo 'selected="selected" '; ?>value="CZ"><?php _e('Czech Republic', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'DK') echo 'selected="selected" '; ?>value="DK"><?php _e('Denmark', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'DJ') echo 'selected="selected" '; ?>value="DJ"><?php _e('Djibouti', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'DM') echo 'selected="selected" '; ?>value="DM"><?php _e('Dominica', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'DO') echo 'selected="selected" '; ?>value="DO"><?php _e('Dominican Republic', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'EC') echo 'selected="selected" '; ?>value="EC"><?php _e('Ecuador', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'EG') echo 'selected="selected" '; ?>value="EG"><?php _e('Egypt', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SV') echo 'selected="selected" '; ?>value="SV"><?php _e('El Salvador', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GQ') echo 'selected="selected" '; ?>value="GQ"><?php _e('Equatorial Guinea', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'ER') echo 'selected="selected" '; ?>value="ER"><?php _e('Eritrea', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'EE') echo 'selected="selected" '; ?>value="EE"><?php _e('Estonia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'ET') echo 'selected="selected" '; ?>value="ET"><?php _e('Ethiopia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'FK') echo 'selected="selected" '; ?>value="FK"><?php _e('Falkland Islands (Malvinas)', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'FO') echo 'selected="selected" '; ?>value="FO"><?php _e('Faroe Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'FJ') echo 'selected="selected" '; ?>value="FJ"><?php _e('Fiji', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'FI') echo 'selected="selected" '; ?>value="FI"><?php _e('Finland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'FR') echo 'selected="selected" '; ?>value="FR"><?php _e('France', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GF') echo 'selected="selected" '; ?>value="GF"><?php _e('French Guiana', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PF') echo 'selected="selected" '; ?>value="PF"><?php _e('French Polynesia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TF') echo 'selected="selected" '; ?>value="TF"><?php _e('French Southern Territories', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GA') echo 'selected="selected" '; ?>value="GA"><?php _e('Gabon', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GM') echo 'selected="selected" '; ?>value="GM"><?php _e('Gambia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GE') echo 'selected="selected" '; ?>value="GE"><?php _e('Georgia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'DE') echo 'selected="selected" '; ?>value="DE"><?php _e('Germany', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GH') echo 'selected="selected" '; ?>value="GH"><?php _e('Ghana', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GI') echo 'selected="selected" '; ?>value="GI"><?php _e('Gibraltar', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GR') echo 'selected="selected" '; ?>value="GR"><?php _e('Greece', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GL') echo 'selected="selected" '; ?>value="GL"><?php _e('Greenland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GD') echo 'selected="selected" '; ?>value="GD"><?php _e('Grenada', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GP') echo 'selected="selected" '; ?>value="GP"><?php _e('Guadeloupe', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GU') echo 'selected="selected" '; ?>value="GU"><?php _e('Guam', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GT') echo 'selected="selected" '; ?>value="GT"><?php _e('Guatemala', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GG') echo 'selected="selected" '; ?>value="GG"><?php _e('Guernsey', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GN') echo 'selected="selected" '; ?>value="GN"><?php _e('Guinea', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GW') echo 'selected="selected" '; ?>value="GW"><?php _e('Guinea-Bissau', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GY') echo 'selected="selected" '; ?>value="GY"><?php _e('Guyana', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'HT') echo 'selected="selected" '; ?>value="HT"><?php _e('Haiti', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'HM') echo 'selected="selected" '; ?>value="HM"><?php _e('Heard Island and McDonald Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'VA') echo 'selected="selected" '; ?>value="VA"><?php _e('Holy See (Vatican City State)', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'HN') echo 'selected="selected" '; ?>value="HN"><?php _e('Honduras', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'HK') echo 'selected="selected" '; ?>value="HK"><?php _e('Hong Kong', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'HU') echo 'selected="selected" '; ?>value="HU"><?php _e('Hungary', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'IS') echo 'selected="selected" '; ?>value="IS"><?php _e('Iceland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'IN') echo 'selected="selected" '; ?>value="IN"><?php _e('India', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'ID') echo 'selected="selected" '; ?>value="ID"><?php _e('Indonesia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'IR') echo 'selected="selected" '; ?>value="IR"><?php _e('Iran, Islamic Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'IQ') echo 'selected="selected" '; ?>value="IQ"><?php _e('Iraq', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'IE') echo 'selected="selected" '; ?>value="IE"><?php _e('Ireland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'IM') echo 'selected="selected" '; ?>value="IM"><?php _e('Isle of Man', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'IL') echo 'selected="selected" '; ?>value="IL"><?php _e('Israel', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'IT') echo 'selected="selected" '; ?>value="IT"><?php _e('Italy', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'JM') echo 'selected="selected" '; ?>value="JM"><?php _e('Jamaica', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'JP') echo 'selected="selected" '; ?>value="JP"><?php _e('Japan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'JE') echo 'selected="selected" '; ?>value="JE"><?php _e('Jersey', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'JO') echo 'selected="selected" '; ?>value="JO"><?php _e('Jordan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'KZ') echo 'selected="selected" '; ?>value="KZ"><?php _e('Kazakhstan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'KE') echo 'selected="selected" '; ?>value="KE"><?php _e('Kenya', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'KI') echo 'selected="selected" '; ?>value="KI"><?php _e('Kiribati', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'KP') echo 'selected="selected" '; ?>value="KP"><?php _e('Korea, Democratic People&quot;s Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'KR') echo 'selected="selected" '; ?>value="KR"><?php _e('Korea, Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'KW') echo 'selected="selected" '; ?>value="KW"><?php _e('Kuwait', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'KG') echo 'selected="selected" '; ?>value="KG"><?php _e('Kyrgyzstan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'LA') echo 'selected="selected" '; ?>value="LA"><?php _e('Lao People&quot;s Democratic Republic', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'LV') echo 'selected="selected" '; ?>value="LV"><?php _e('Latvia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'LB') echo 'selected="selected" '; ?>value="LB"><?php _e('Lebanon', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'LS') echo 'selected="selected" '; ?>value="LS"><?php _e('Lesotho', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'LR') echo 'selected="selected" '; ?>value="LR"><?php _e('Liberia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'LY') echo 'selected="selected" '; ?>value="LY"><?php _e('Libya', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'LI') echo 'selected="selected" '; ?>value="LI"><?php _e('Liechtenstein', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'LT') echo 'selected="selected" '; ?>value="LT"><?php _e('Lithuania', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'LU') echo 'selected="selected" '; ?>value="LU"><?php _e('Luxembourg', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MO') echo 'selected="selected" '; ?>value="MO"><?php _e('Macao', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MK') echo 'selected="selected" '; ?>value="MK"><?php _e('Macedonia, the former Yugoslav Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MG') echo 'selected="selected" '; ?>value="MG"><?php _e('Madagascar', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MW') echo 'selected="selected" '; ?>value="MW"><?php _e('Malawi', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MY') echo 'selected="selected" '; ?>value="MY"><?php _e('Malaysia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MV') echo 'selected="selected" '; ?>value="MV"><?php _e('Maldives', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'ML') echo 'selected="selected" '; ?>value="ML"><?php _e('Mali', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MT') echo 'selected="selected" '; ?>value="MT"><?php _e('Malta', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MH') echo 'selected="selected" '; ?>value="MH"><?php _e('Marshall Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MQ') echo 'selected="selected" '; ?>value="MQ"><?php _e('Martinique', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MR') echo 'selected="selected" '; ?>value="MR"><?php _e('Mauritania', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MU') echo 'selected="selected" '; ?>value="MU"><?php _e('Mauritius', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'YT') echo 'selected="selected" '; ?>value="YT"><?php _e('Mayotte', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MX') echo 'selected="selected" '; ?>value="MX"><?php _e('Mexico', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'FM') echo 'selected="selected" '; ?>value="FM"><?php _e('Micronesia, Federated States of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MD') echo 'selected="selected" '; ?>value="MD"><?php _e('Moldova, Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MC') echo 'selected="selected" '; ?>value="MC"><?php _e('Monaco', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MN') echo 'selected="selected" '; ?>value="MN"><?php _e('Mongolia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'ME') echo 'selected="selected" '; ?>value="ME"><?php _e('Montenegro', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MS') echo 'selected="selected" '; ?>value="MS"><?php _e('Montserrat', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MA') echo 'selected="selected" '; ?>value="MA"><?php _e('Morocco', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MZ') echo 'selected="selected" '; ?>value="MZ"><?php _e('Mozambique', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MM') echo 'selected="selected" '; ?>value="MM"><?php _e('Myanmar', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'NA') echo 'selected="selected" '; ?>value="NA"><?php _e('Namibia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'NR') echo 'selected="selected" '; ?>value="NR"><?php _e('Nauru', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'NP') echo 'selected="selected" '; ?>value="NP"><?php _e('Nepal', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'NL') echo 'selected="selected" '; ?>value="NL"><?php _e('Netherlands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'NC') echo 'selected="selected" '; ?>value="NC"><?php _e('New Caledonia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'NZ') echo 'selected="selected" '; ?>value="NZ"><?php _e('New Zealand', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'NI') echo 'selected="selected" '; ?>value="NI"><?php _e('Nicaragua', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'NE') echo 'selected="selected" '; ?>value="NE"><?php _e('Niger', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'NG') echo 'selected="selected" '; ?>value="NG"><?php _e('Nigeria', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'NU') echo 'selected="selected" '; ?>value="NU"><?php _e('Niue', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'NF') echo 'selected="selected" '; ?>value="NF"><?php _e('Norfolk Island', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MP') echo 'selected="selected" '; ?>value="MP"><?php _e('Northern Mariana Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'NO') echo 'selected="selected" '; ?>value="NO"><?php _e('Norway', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'OM') echo 'selected="selected" '; ?>value="OM"><?php _e('Oman', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PK') echo 'selected="selected" '; ?>value="PK"><?php _e('Pakistan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PW') echo 'selected="selected" '; ?>value="PW"><?php _e('Palau', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PS') echo 'selected="selected" '; ?>value="PS"><?php _e('Palestinian Territory, Occupied', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PA') echo 'selected="selected" '; ?>value="PA"><?php _e('Panama', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PG') echo 'selected="selected" '; ?>value="PG"><?php _e('Papua New Guinea', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PY') echo 'selected="selected" '; ?>value="PY"><?php _e('Paraguay', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PE') echo 'selected="selected" '; ?>value="PE"><?php _e('Peru', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PH') echo 'selected="selected" '; ?>value="PH"><?php _e('Philippines', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PN') echo 'selected="selected" '; ?>value="PN"><?php _e('Pitcairn', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PL') echo 'selected="selected" '; ?>value="PL"><?php _e('Poland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PT') echo 'selected="selected" '; ?>value="PT"><?php _e('Portugal', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PR') echo 'selected="selected" '; ?>value="PR"><?php _e('Puerto Rico', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'QA') echo 'selected="selected" '; ?>value="QA"><?php _e('Qatar', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'RE') echo 'selected="selected" '; ?>value="RE"><?php _e('R&eacute;union', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'RO') echo 'selected="selected" '; ?>value="RO"><?php _e('Romania', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'RU') echo 'selected="selected" '; ?>value="RU"><?php _e('Russian Federation', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'RW') echo 'selected="selected" '; ?>value="RW"><?php _e('Rwanda', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'BL') echo 'selected="selected" '; ?>value="BL"><?php _e('Saint Barth&eacute;lemy', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SH') echo 'selected="selected" '; ?>value="SH"><?php _e('Saint Helena, Ascension and Tristan da Cunha', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'KN') echo 'selected="selected" '; ?>value="KN"><?php _e('Saint Kitts and Nevis', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'LC') echo 'selected="selected" '; ?>value="LC"><?php _e('Saint Lucia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'MF') echo 'selected="selected" '; ?>value="MF"><?php _e('Saint Martin (French part)', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'PM') echo 'selected="selected" '; ?>value="PM"><?php _e('Saint Pierre and Miquelon', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'VC') echo 'selected="selected" '; ?>value="VC"><?php _e('Saint Vincent and the Grenadines', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'WS') echo 'selected="selected" '; ?>value="WS"><?php _e('Samoa', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SM') echo 'selected="selected" '; ?>value="SM"><?php _e('San Marino', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'ST') echo 'selected="selected" '; ?>value="ST"><?php _e('Sao Tome and Principe', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SA') echo 'selected="selected" '; ?>value="SA"><?php _e('Saudi Arabia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SN') echo 'selected="selected" '; ?>value="SN"><?php _e('Senegal', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'RS') echo 'selected="selected" '; ?>value="RS"><?php _e('Serbia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SC') echo 'selected="selected" '; ?>value="SC"><?php _e('Seychelles', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SL') echo 'selected="selected" '; ?>value="SL"><?php _e('Sierra Leone', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SG') echo 'selected="selected" '; ?>value="SG"><?php _e('Singapore', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SX') echo 'selected="selected" '; ?>value="SX"><?php _e('Sint Maarten (Dutch part)', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SK') echo 'selected="selected" '; ?>value="SK"><?php _e('Slovakia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SI') echo 'selected="selected" '; ?>value="SI"><?php _e('Slovenia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SB') echo 'selected="selected" '; ?>value="SB"><?php _e('Solomon Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SO') echo 'selected="selected" '; ?>value="SO"><?php _e('Somalia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'ZA') echo 'selected="selected" '; ?>value="ZA"><?php _e('South Africa', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GS') echo 'selected="selected" '; ?>value="GS"><?php _e('South Georgia and the South Sandwich Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SS') echo 'selected="selected" '; ?>value="SS"><?php _e('South Sudan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'ES') echo 'selected="selected" '; ?>value="ES"><?php _e('Spain', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'LK') echo 'selected="selected" '; ?>value="LK"><?php _e('Sri Lanka', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SD') echo 'selected="selected" '; ?>value="SD"><?php _e('Sudan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SR') echo 'selected="selected" '; ?>value="SR"><?php _e('Suriname', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SJ') echo 'selected="selected" '; ?>value="SJ"><?php _e('Svalbard and Jan Mayen', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SZ') echo 'selected="selected" '; ?>value="SZ"><?php _e('Swaziland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SE') echo 'selected="selected" '; ?>value="SE"><?php _e('Sweden', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'CH') echo 'selected="selected" '; ?>value="CH"><?php _e('Switzerland', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'SY') echo 'selected="selected" '; ?>value="SY"><?php _e('Syrian Arab Republic', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TW') echo 'selected="selected" '; ?>value="TW"><?php _e('Taiwan, Province of China', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TJ') echo 'selected="selected" '; ?>value="TJ"><?php _e('Tajikistan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TZ') echo 'selected="selected" '; ?>value="TZ"><?php _e('Tanzania, United Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TH') echo 'selected="selected" '; ?>value="TH"><?php _e('Thailand', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TL') echo 'selected="selected" '; ?>value="TL"><?php _e('Timor-Leste', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TG') echo 'selected="selected" '; ?>value="TG"><?php _e('Togo', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TK') echo 'selected="selected" '; ?>value="TK"><?php _e('Tokelau', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TO') echo 'selected="selected" '; ?>value="TO"><?php _e('Tonga', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TT') echo 'selected="selected" '; ?>value="TT"><?php _e('Trinidad and Tobago', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TN') echo 'selected="selected" '; ?>value="TN"><?php _e('Tunisia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TR') echo 'selected="selected" '; ?>value="TR"><?php _e('Turkey', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TM') echo 'selected="selected" '; ?>value="TM"><?php _e('Turkmenistan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TC') echo 'selected="selected" '; ?>value="TC"><?php _e('Turks and Caicos Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'TV') echo 'selected="selected" '; ?>value="TV"><?php _e('Tuvalu', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'UG') echo 'selected="selected" '; ?>value="UG"><?php _e('Uganda', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'UA') echo 'selected="selected" '; ?>value="UA"><?php _e('Ukraine', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'AE') echo 'selected="selected" '; ?>value="AE"><?php _e('United Arab Emirates', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'GB') echo 'selected="selected" '; ?>value="GB"><?php _e('United Kingdom', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'US') echo 'selected="selected" '; ?>value="US"><?php _e('United States', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'UM') echo 'selected="selected" '; ?>value="UM"><?php _e('United States Minor Outlying Islands', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'UY') echo 'selected="selected" '; ?>value="UY"><?php _e('Uruguay', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'UZ') echo 'selected="selected" '; ?>value="UZ"><?php _e('Uzbekistan', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'VU') echo 'selected="selected" '; ?>value="VU"><?php _e('Vanuatu', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'VE') echo 'selected="selected" '; ?>value="VE"><?php _e('Venezuela, Bolivarian Republic of', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'VN') echo 'selected="selected" '; ?>value="VN"><?php _e('Viet Nam', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'VG') echo 'selected="selected" '; ?>value="VG"><?php _e('Virgin Islands, British', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'VI') echo 'selected="selected" '; ?>value="VI"><?php _e('Virgin Islands, U.S.', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'WF') echo 'selected="selected" '; ?>value="WF"><?php _e('Wallis and Futuna', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'EH') echo 'selected="selected" '; ?>value="EH"><?php _e('Western Sahara', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'YE') echo 'selected="selected" '; ?>value="YE"><?php _e('Yemen', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'ZM') echo 'selected="selected" '; ?>value="ZM"><?php _e('Zambia', 'caixabank_tools_official'); ?></option>
					<option <?php if( $countryshipping == 'ZW') echo 'selected="selected" '; ?>value="ZW"><?php _e('Zimbabwe', 'caixabank_tools_official'); ?></option>
				</select><br />
				<span class="description"><?php _e('Please select your Country.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_state"><?php _e('State/County','caixabank_tools_official'); ?></label></th>

				<td>
					<select name="caixabank_shipping_state" id="caixabank_shipping_state">
						 <option <?php if( $statebilling == 'fueraespana')   echo 'selected="selected" '; ?> value='fueraespana'><?php _e('Outsite Spain','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'alava')    echo 'selected="selected" '; ?> value='alava'><?php _e('&Aacute;lava','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'albacete')    echo 'selected="selected" '; ?> value='albacete'><?php _e('Albacete','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'alicante')    echo 'selected="selected" '; ?> value='alicante'><?php _e('Alicante/Alacant','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'almeria')    echo 'selected="selected" '; ?> value='almeria'><?php _e('Almer&iacute;a','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'asturias')    echo 'selected="selected" '; ?> value='asturias'><?php _e('Asturias','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'avila')    echo 'selected="selected" '; ?> value='avila'><?php _e('&Aacute;vila','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'badajoz')    echo 'selected="selected" '; ?> value='badajoz'><?php _e('Badajoz','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'barcelona')   echo 'selected="selected" '; ?> value='barcelona'><?php _e('Barcelona','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'burgos')    echo 'selected="selected" '; ?> value='burgos'><?php _e('Burgos','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'caceres')    echo 'selected="selected" '; ?> value='caceres'><?php _e('C&Aacute;ceres','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'cadiz')    echo 'selected="selected" '; ?> value='cadiz'><?php _e('C&Aacute;diz','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'cantabria')   echo 'selected="selected" '; ?> value='cantabria'><?php _e('Cantabria','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'castellon')   echo 'selected="selected" '; ?> value='castellon'><?php _e('Castell&oacute;n/Castell&oacute;','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'ceuta')    echo 'selected="selected" '; ?> value='ceuta'><?php _e('Ceuta','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'ciudadreal')   echo 'selected="selected" '; ?> value='ciudadreal'><?php _e('Ciudad Real','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'cordoba')    echo 'selected="selected" '; ?> value='cordoba'><?php _e('C&oacute;rdoba','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'cuenca')    echo 'selected="selected" '; ?> value='cuenca'><?php _e('Cuenca','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'girona')    echo 'selected="selected" '; ?> value='girona'><?php _e('Girona','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'laspalmas')   echo 'selected="selected" '; ?> value='laspalmas'><?php _e('Las Palmas','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'granada')    echo 'selected="selected" '; ?> value='granada'><?php _e('Granada','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'guadalajara')   echo 'selected="selected" '; ?> value='guadalajara'><?php _e('Guadalajara','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'guipuzcoa')   echo 'selected="selected" '; ?> value='guipuzcoa'><?php _e('Guip&uacute;zcoa','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'huelva')    echo 'selected="selected" '; ?> value='huelva'><?php _e('Huelva','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'huesca')    echo 'selected="selected" '; ?> value='huesca'><?php _e('Huesca','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'illesbalears')   echo 'selected="selected" '; ?> value='illesbalears'><?php _e('Illes Balears','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'jaen')     echo 'selected="selected" '; ?> value='jaen'><?php _e('Ja&eacute;n','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'acoruna')    echo 'selected="selected" '; ?> value='acoruna'><?php _e('A Coru&ntilde;a','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'larioja')    echo 'selected="selected" '; ?> value='larioja'><?php _e('La Rioja','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'leon')     echo 'selected="selected" '; ?> value='leon'><?php _e('Le&oacute;n','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'lleida')    echo 'selected="selected" '; ?> value='lleida'><?php _e('Lleida','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'lugo')     echo 'selected="selected" '; ?> value='lugo'><?php _e('Lugo','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'madrid')    echo 'selected="selected" '; ?> value='madrid'><?php _e('Madrid','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'malaga')    echo 'selected="selected" '; ?> value='malaga'><?php _e('M&Aacute;laga','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'melilla')    echo 'selected="selected" '; ?> value='melilla'><?php _e('Melilla','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'murcia')    echo 'selected="selected" '; ?> value='murcia'><?php _e('Murcia','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'navarra')    echo 'selected="selected" '; ?> value='navarra'><?php _e('Navarra','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'ourense')    echo 'selected="selected" '; ?> value='ourense'><?php _e('Ourense','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'palencia')    echo 'selected="selected" '; ?> value='palencia'><?php _e('Palencia','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'pontevedra')   echo 'selected="selected" '; ?> value='pontevedra'><?php _e('Pontevedra','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'salamanca')   echo 'selected="selected" '; ?> value='salamanca'><?php _e('Salamanca','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'segovia')    echo 'selected="selected" '; ?> value='segovia'><?php _e('Segovia','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'sevilla')    echo 'selected="selected" '; ?> value='sevilla'><?php _e('Sevilla','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'soria')    echo 'selected="selected" '; ?> value='soria'><?php _e('Soria','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'tarragona')   echo 'selected="selected" '; ?> value='tarragona'><?php _e('Tarragona','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'santacruztenerife') echo 'selected="selected" '; ?> value='santacruztenerife'><?php _e('Santa Cruz de Tenerife','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'teruel')    echo 'selected="selected" '; ?> value='teruel'><?php _e('Teruel','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'toledo')    echo 'selected="selected" '; ?> value='toledo'><?php _e('Toledo','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'valencia')    echo 'selected="selected" '; ?> value='valencia'><?php _e('Valencia/Val&eacute;ncia','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'valladolid')   echo 'selected="selected" '; ?> value='valladolid'><?php _e('Valladolid','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'vizcaya')    echo 'selected="selected" '; ?> value='vizcaya'><?php _e('Vizcaya','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'zamora')    echo 'selected="selected" '; ?> value='zamora'><?php _e('Zamora','caixabank-tools-official'); ?></option>
						 <option <?php if( $statebilling == 'zaragoza')    echo 'selected="selected" '; ?> value='zaragoza'><?php _e('Zaragoza','caixabank-tools-official'); ?></option>
					</select><br />
				<span class="description"><?php _e('Please select your State/County.','caixabank_tools_official'); ?></span>
				</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_state_outsite"><?php _e('State/County','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_shipping_state_outsite" id="caixabank_shipping_state_outsite" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_shipping_state_outsite', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your State/County if you are from outsite Spain.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_telephone"><?php _e('Telephone','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_shipping_telephone" id="caixabank_shipping_telephone" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_shipping_telephone', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Telephone.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_mobile"><?php _e('Mobile','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_shipping_mobile" id="caixabank_shipping_mobile" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_shipping_mobile', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your Mobile.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

		<tr>
			<th><label for="caixabank_shipping_email"><?php _e('Email','caixabank_tools_official'); ?></label></th>

			<td>
				<input type="text" name="caixabank_shipping_email" id="caixabank_shipping_email" value="<?php echo esc_attr( get_the_author_meta( 'caixabank_shipping_email', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e('Please enter your email.','caixabank_tools_official'); ?></span>
			</td>
		</tr>

	</table>


<?php }

function caixabank_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	// Save billing data
	update_user_meta( $user_id, 'caixabank_billing_name',   $_POST['caixabank_billing_name']  );
	update_user_meta( $user_id, 'caixabank_billing_last_name',  $_POST['caixabank_billing_last_name'] );
	update_user_meta( $user_id, 'caixabank_billing_company',  $_POST['caixabank_billing_company']  );
	update_user_meta( $user_id, 'caixabank_billing_address_1',  $_POST['caixabank_billing_address_1'] );
	update_user_meta( $user_id, 'caixabank_billing_address_2',  $_POST['caixabank_billing_address_2'] );
	update_user_meta( $user_id, 'caixabank_billing_city',   $_POST['caixabank_billing_city']  );
	update_user_meta( $user_id, 'caixabank_billing_postcode',  $_POST['caixabank_billing_postcode'] );
	update_user_meta( $user_id, 'caixabank_billing_country',  $_POST['caixabank_billing_country']  );
	update_user_meta( $user_id, 'caixabank_billing_state',   $_POST['caixabank_billing_state']  );
	update_user_meta( $user_id, 'caixabank_billing_state_outsite', $_POST['caixabank_billing_state_outsite']);
	update_user_meta( $user_id, 'caixabank_billing_telephone',  $_POST['caixabank_billing_telephone'] );
	update_user_meta( $user_id, 'caixabank_billing_mobile',   $_POST['caixabank_billing_mobile']  );
	update_user_meta( $user_id, 'caixabank_billing_email',   $_POST['caixabank_billing_email']  );
	update_user_meta( $user_id, 'caixabank_billing_tax_status',  $_POST['caixabank_billing_tax_status'] );
	update_user_meta( $user_id, 'caixabank_billing_nif',   $_POST['caixabank_billing_nif']   );
	if( current_user_can('manage_options')){
		update_user_meta( $user_id, 'caixabank_billing_custom_iva',   $_POST['caixabank_billing_custom_iva']   );
		update_user_meta( $user_id, 'caixabank_billing_custom_irpf',   $_POST['caixabank_billing_custom_irpf']   );
		}

	// Save shipping data
	update_user_meta( $user_id, 'caixabank_shipping_name',   $_POST['caixabank_shipping_name']  );
	update_user_meta( $user_id, 'caixabank_shipping_last_name',  $_POST['caixabank_shipping_last_name'] );
	update_user_meta( $user_id, 'caixabank_shipping_company',  $_POST['caixabank_shipping_company'] );
	update_user_meta( $user_id, 'caixabank_shipping_address_1',  $_POST['caixabank_shipping_address_1'] );
	update_user_meta( $user_id, 'caixabank_shipping_address_2',  $_POST['caixabank_shipping_address_2'] );
	update_user_meta( $user_id, 'caixabank_shipping_city',   $_POST['caixabank_shipping_city']  );
	update_user_meta( $user_id, 'caixabank_shipping_postcode',  $_POST['caixabank_shipping_postcode'] );
	update_user_meta( $user_id, 'caixabank_shipping_country',  $_POST['caixabank_shipping_country'] );
	update_user_meta( $user_id, 'caixabank_shipping_state',   $_POST['caixabank_shipping_state']  );
	update_user_meta( $user_id, 'caixabank_shipping_state_outsite', $_POST['caixabank_shipping_state_outsite']);
	update_user_meta( $user_id, 'caixabank_shipping_telephone',  $_POST['caixabank_shipping_telephone'] );
	update_user_meta( $user_id, 'caixabank_shipping_mobile',  $_POST['caixabank_shipping_mobile']  );
	update_user_meta( $user_id, 'caixabank_shipping_email',   $_POST['caixabank_shipping_email']  );
	update_user_meta( $user_id, 'caixabank_shipping_tax_status', $_POST['caixabank_shipping_tax_status'] );
	update_user_meta( $user_id, 'caixabank_shipping_nif',   $_POST['caixabank_shipping_nif']  );
}
?>