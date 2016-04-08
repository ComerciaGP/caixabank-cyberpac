<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


function caixabank_gateway_title(){ ?>
        <input type="text" name="caixabank_gateway_title" value="<?php echo get_option('caixabank_gateway_title'); ?>" size="40" />
<?php }

function caixabank_gateway_description(){ ?>
        <textarea name="caixabank_gateway_description" rows="4" cols="50"><?php echo get_option('caixabank_gateway_description'); ?></textarea>
<?php }

function caixabank_gateway_fuc(){ ?>
        <input type="text" name="caixabank_gateway_fuc" value="<?php echo get_option('caixabank_gateway_fuc'); ?>" size="40" />
<?php }

function caixabank_gateway_commerce_name(){ ?>
        <input type="text" name="caixabank_gateway_commerce_name" value="<?php echo get_option('caixabank_gateway_commerce_name'); ?>" size="40" />
<?php }

function caixabank_gateway_terminal_number(){ ?>
        <input type="text" name="caixabank_gateway_terminal_number" value="<?php echo get_option('caixabank_gateway_terminal_number'); ?>"  size="40" />
<?php }

function caixabank_gateway_activate_second_terminal(){ ?>
        <input type="checkbox" class="js-switch-secondterminal" data-tool="Activating this option, CaixaBank will use a second terminal" name="caixabank_gateway_activate_second_terminal" value="1" <?php checked(1, get_option('caixabank_gateway_activate_second_terminal'), true); ?> />
<?php }

function caixabank_gateway_second_terminal_number(){ ?>
        <input type="text" name="caixabank_gateway_second_terminal_number" value="<?php echo get_option('caixabank_gateway_second_terminal_number'); ?>"  size="40" />
<?php }

function caixabank_gateway_when_use_second_terminal(){ ?>
        <input type="text" name="caixabank_gateway_when_use_second_terminal" value="<?php echo get_option('caixabank_gateway_when_use_second_terminal'); ?>"  size="40" />
<?php }
function caixabank_gateway_passsha256(){ ?>
        <input type="text" name="caixabank_gateway_passsha256" value="<?php echo get_option('caixabank_gateway_passsha256'); ?>"  size="40" />
<?php }
function caixabank_gateway_language_gateway(){ ?>
        <input type="text" name="caixabank_gateway_language_gateway" value="<?php echo get_option('caixabank_gateway_language_gateway'); ?>"  size="40" />
<?php }
function caixabank_gateway_currency(){ ?>
		<?php $caixabank_gateway_currency = get_option('caixabank_gateway_currency'); ?>
        <select name="caixabank_gateway_currency" id="caixabank_gateway_currency">
			<option <?php if( $caixabank_gateway_currency == 'ALL') echo 'selected="selected" '; ?> value="ALL"><?php _e('LEK','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'DZD') echo 'selected="selected" '; ?> value="DZD"><?php _e('ALGERIAN DINAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'AON') echo 'selected="selected" '; ?> value="AON"><?php _e('ANGOLA KWANZA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'ARS') echo 'selected="selected" '; ?> value="ARS"><?php _e('ARGENTINE PESO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'AUD') echo 'selected="selected" '; ?> value="AUD"><?php _e('AUSTRALIAN DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BSD') echo 'selected="selected" '; ?> value="BSD"><?php _e('BAHAMIAN DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BHD') echo 'selected="selected" '; ?> value="BHD"><?php _e('BAHRAINI DINAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BDT') echo 'selected="selected" '; ?> value="BDT"><?php _e('TAKA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'AMD') echo 'selected="selected" '; ?> value="AMD"><?php _e('DRAM','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BBD') echo 'selected="selected" '; ?> value="BBD"><?php _e('BARBADOS DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BMD') echo 'selected="selected" '; ?> value="BMD"><?php _e('BERMUDAN DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BTN') echo 'selected="selected" '; ?> value="BTN"><?php _e('NGULTRUM','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BOB') echo 'selected="selected" '; ?> value="BOB"><?php _e('BOLIVIAN PESO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BAM') echo 'selected="selected" '; ?> value="BAM"><?php _e('DINAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BWP') echo 'selected="selected" '; ?> value="BWP"><?php _e('PULA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BRC') echo 'selected="selected" '; ?> value="BRC"><?php _e('CRUZEIRO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BZD') echo 'selected="selected" '; ?> value="BZD"><?php _e('BELIZE DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SBD') echo 'selected="selected" '; ?> value="SBD"><?php _e('SOLOMON ISLANDS DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BND') echo 'selected="selected" '; ?> value="BND"><?php _e('BRUNEI DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BUK') echo 'selected="selected" '; ?> value="BUK"><?php _e('KYAT','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BIF') echo 'selected="selected" '; ?> value="BIF"><?php _e('BURUNDI FRANC','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BYB') echo 'selected="selected" '; ?> value="BYB"><?php _e('BELARRUSIAN RUBLE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'KHR') echo 'selected="selected" '; ?> value="KHR"><?php _e('RIEL','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CAD') echo 'selected="selected" '; ?> value="CAD"><?php _e('CANADIAN DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CVE') echo 'selected="selected" '; ?> value="CVE"><?php _e('CAPE VERDE ESCUDO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'KYD') echo 'selected="selected" '; ?> value="KYD"><?php _e('CAYMAN ISLANDS DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'LKR') echo 'selected="selected" '; ?> value="LKR"><?php _e('SRI LANKA RUPEE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CLP') echo 'selected="selected" '; ?> value="CLP"><?php _e('CHILEAN PESO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CNY') echo 'selected="selected" '; ?> value="CNY"><?php _e('YUAN RENMINBI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CNH') echo 'selected="selected" '; ?> value="CNH"><?php _e('CHINESE RENMIMBI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CNX') echo 'selected="selected" '; ?> value="CNX"><?php _e('CHINESE RENMINBI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'COP') echo 'selected="selected" '; ?> value="COP"><?php _e('COLOMBIAN PESO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'KMF') echo 'selected="selected" '; ?> value="KMF"><?php _e('COMORO FRANC','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CRC') echo 'selected="selected" '; ?> value="CRC"><?php _e('COSTA RICAN COLON','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'HRK') echo 'selected="selected" '; ?> value="HRK"><?php _e('CROATIAN KUNA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CUP') echo 'selected="selected" '; ?> value="CUP"><?php _e('CUBAN PESO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CYP') echo 'selected="selected" '; ?> value="CYP"><?php _e('CYPRUS POUND','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CSK') echo 'selected="selected" '; ?> value="CSK"><?php _e('KORUNA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CZK') echo 'selected="selected" '; ?> value="CZK"><?php _e('CZECH KORUNA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'DKK') echo 'selected="selected" '; ?> value="DKK"><?php _e('DANISH KRONE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'DOP') echo 'selected="selected" '; ?> value="DOP"><?php _e('DOMINICAN PESO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SVC') echo 'selected="selected" '; ?> value="SVC"><?php _e('EL SALVADOR COLON','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'ETB') echo 'selected="selected" '; ?> value="ETB"><?php _e('ETHIOPIAN BIRR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'ERN') echo 'selected="selected" '; ?> value="ERN"><?php _e('ERITREAN NAKTAN','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'EEK') echo 'selected="selected" '; ?> value="EEK"><?php _e('ESTONIAN KROON','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'FKP') echo 'selected="selected" '; ?> value="FKP"><?php _e('FALKLAND ISLANDS','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'FJD') echo 'selected="selected" '; ?> value="FJD"><?php _e('FIJI DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'DJF') echo 'selected="selected" '; ?> value="DJF"><?php _e('DJIBOUTI FRANC','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'GMD') echo 'selected="selected" '; ?> value="GMD"><?php _e('DALASI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'GHC') echo 'selected="selected" '; ?> value="GHC"><?php _e('CHANA CEDI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'GIP') echo 'selected="selected" '; ?> value="GIP"><?php _e('GIBRALTAR POUND','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'GTQ') echo 'selected="selected" '; ?> value="GTQ"><?php _e('QUETZAL','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'GNF') echo 'selected="selected" '; ?> value="GNF"><?php _e('SYLI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'GYD') echo 'selected="selected" '; ?> value="GYD"><?php _e('GUYANA DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'HTG') echo 'selected="selected" '; ?> value="HTG"><?php _e('GOURDE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'HNL') echo 'selected="selected" '; ?> value="HNL"><?php _e('SEMPIRA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'HKD') echo 'selected="selected" '; ?> value="HKD"><?php _e('HONG KONG DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'HUF') echo 'selected="selected" '; ?> value="HUF"><?php _e('FORINT','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'ISK') echo 'selected="selected" '; ?> value="ISK"><?php _e('ICELAND KRONA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'INR') echo 'selected="selected" '; ?> value="INR"><?php _e('INDIAN RUPEE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'IDR') echo 'selected="selected" '; ?> value="IDR"><?php _e('RUPIAH','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'IRR') echo 'selected="selected" '; ?> value="IRR"><?php _e('IRANIAN RIAL','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'IRA') echo 'selected="selected" '; ?> value="IRA"><?php _e('IRANIAN AIRLINE RATE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'IQD') echo 'selected="selected" '; ?> value="IQD"><?php _e('IRAQI DINAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'ILS') echo 'selected="selected" '; ?> value="ILS"><?php _e('ISRAEL SHEKEL','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'JMD') echo 'selected="selected" '; ?> value="JMD"><?php _e('JAMAICAN DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'JPY') echo 'selected="selected" '; ?> value="JPY"><?php _e('YEN','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'KZT') echo 'selected="selected" '; ?> value="KZT"><?php _e('TENGE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'JOD') echo 'selected="selected" '; ?> value="JOD"><?php _e('JORDANIAN DINAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'KES') echo 'selected="selected" '; ?> value="KES"><?php _e('KENYAN SHILLING','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'KPW') echo 'selected="selected" '; ?> value="KPW"><?php _e('NORTH KOREAN WON','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'KRW') echo 'selected="selected" '; ?> value="KRW"><?php _e('KOREAN WON','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'KWD') echo 'selected="selected" '; ?> value="KWD"><?php _e('KUWAITI DINAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'KGS') echo 'selected="selected" '; ?> value="KGS"><?php _e('SOM','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'LAK') echo 'selected="selected" '; ?> value="LAK"><?php _e('KIP','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'LBP') echo 'selected="selected" '; ?> value="LBP"><?php _e('LEBANESE POUND','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'LSL') echo 'selected="selected" '; ?> value="LSL"><?php _e('LESOTHO LOTI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'LVL') echo 'selected="selected" '; ?> value="LVL"><?php _e('LATVIAN LAT','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'LRD') echo 'selected="selected" '; ?> value="LRD"><?php _e('LIBERIAN DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'LYD') echo 'selected="selected" '; ?> value="LYD"><?php _e('LIBYAN DINAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'LTL') echo 'selected="selected" '; ?> value="LTL"><?php _e('LITHUANIAN LITAS','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MOP') echo 'selected="selected" '; ?> value="MOP"><?php _e('MACAU PATACAS','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MGF') echo 'selected="selected" '; ?> value="MGF"><?php _e('MALAGASY FRANC','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MWK') echo 'selected="selected" '; ?> value="MWK"><?php _e('MALAWI KWACHA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MYR') echo 'selected="selected" '; ?> value="MYR"><?php _e('MALAYSIAN RINGGIT','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MVR') echo 'selected="selected" '; ?> value="MVR"><?php _e('MALDIVE RUPEE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MLF') echo 'selected="selected" '; ?> value="MLF"><?php _e('MALI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MTL') echo 'selected="selected" '; ?> value="MTL"><?php _e('MALTESE LIRA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MRO') echo 'selected="selected" '; ?> value="MRO"><?php _e('OUGUIYA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MUR') echo 'selected="selected" '; ?> value="MUR"><?php _e('MAURITIUS RUPEE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MXN') echo 'selected="selected" '; ?> value="MXN"><?php _e('MEXICAN PESO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MNT') echo 'selected="selected" '; ?> value="MNT"><?php _e('TUGRIK','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MDL') echo 'selected="selected" '; ?> value="MDL"><?php _e('MOLDOVAN LEU','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MAD') echo 'selected="selected" '; ?> value="MAD"><?php _e('MARROCCAN DIRHAM','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'OMR') echo 'selected="selected" '; ?> value="OMR"><?php _e('RIAL OMANI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'NAD') echo 'selected="selected" '; ?> value="NAD"><?php _e('NAMIBIAN DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'NPR') echo 'selected="selected" '; ?> value="NPR"><?php _e('NEPALESE RUPEE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'ANG') echo 'selected="selected" '; ?> value="ANG"><?php _e('NETHERLANDS ANTILLIA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'AWG') echo 'selected="selected" '; ?> value="AWG"><?php _e('ARUBAN GUILDER','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'NTZ') echo 'selected="selected" '; ?> value="NTZ"><?php _e('YUGOSLAVIAN NEW DIAN','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'VUV') echo 'selected="selected" '; ?> value="VUV"><?php _e('VATU','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'NZD') echo 'selected="selected" '; ?> value="NZD"><?php _e('NEW ZEALAND DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == '566') echo 'selected="selected" '; ?> value="566"><?php _e('NAIRA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'NIO') echo 'selected="selected" '; ?> value="NIO"><?php _e('CORDOBA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'NGN') echo 'selected="selected" '; ?> value="NGN"><?php _e('NAIRA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'NOK') echo 'selected="selected" '; ?> value="NOK"><?php _e('NORWEGIAN KRONE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'PCI') echo 'selected="selected" '; ?> value="PCI"><?php _e('PACIFIC ISLAND','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'PKR') echo 'selected="selected" '; ?> value="PKR"><?php _e('PAKISTAN RUPEE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'PAB') echo 'selected="selected" '; ?> value="PAB"><?php _e('BALBOA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'PGK') echo 'selected="selected" '; ?> value="PGK"><?php _e('KINA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'PYG') echo 'selected="selected" '; ?> value="PYG"><?php _e('GUARANI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'PEN') echo 'selected="selected" '; ?> value="PEN"><?php _e('PERU INTI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'PHP') echo 'selected="selected" '; ?> value="PHP"><?php _e('PHILIPPINE PESO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'GWP') echo 'selected="selected" '; ?> value="GWP"><?php _e('GUINEA-BISSAU PESO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'TPE') echo 'selected="selected" '; ?> value="TPE"><?php _e('TIMOR ESCUDO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'QAR') echo 'selected="selected" '; ?> value="QAR"><?php _e('QATARI RIAL','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'RUB') echo 'selected="selected" '; ?> value="RUB"><?php _e('RUSSIAN ROUBLE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'RWF') echo 'selected="selected" '; ?> value="RWF"><?php _e('RWANDA FRANC','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SHP') echo 'selected="selected" '; ?> value="SHP"><?php _e('ST. HELENA POUND','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'STD') echo 'selected="selected" '; ?> value="STD"><?php _e('DOBRA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SAR') echo 'selected="selected" '; ?> value="SAR"><?php _e('SAUDI RIYAL','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SCR') echo 'selected="selected" '; ?> value="SCR"><?php _e('SEYCHELLES RUPEE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SLL') echo 'selected="selected" '; ?> value="SLL"><?php _e('LEONE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SGD') echo 'selected="selected" '; ?> value="SGD"><?php _e('SINGAPORE DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'VND') echo 'selected="selected" '; ?> value="VND"><?php _e('DONG','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SIT') echo 'selected="selected" '; ?> value="SIT"><?php _e('SLOVENIAN TOLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SOS') echo 'selected="selected" '; ?> value="SOS"><?php _e('SOMALI SHILLING','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'ZAR') echo 'selected="selected" '; ?> value="ZAR"><?php _e('RAND','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'ZWD') echo 'selected="selected" '; ?> value="ZWD"><?php _e('ZIMBABWE DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'YDD') echo 'selected="selected" '; ?> value="YDD"><?php _e('YEMENI DINAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SDP') echo 'selected="selected" '; ?> value="SDP"><?php _e('SUDANESE POUND','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SDA') echo 'selected="selected" '; ?> value="SDA"><?php _e('SUDAN AIRLINES','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SZL') echo 'selected="selected" '; ?> value="SZL"><?php _e('LILANGENI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SEK') echo 'selected="selected" '; ?> value="SEK"><?php _e('SWEDISH KRONA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CHF') echo 'selected="selected" '; ?> value="CHF"><?php _e('SWISS FRANC','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SYP') echo 'selected="selected" '; ?> value="SYP"><?php _e('SYRIAN POUND','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'TJR') echo 'selected="selected" '; ?> value="TJR"><?php _e('TAJIK RUBLE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'THB') echo 'selected="selected" '; ?> value="THB"><?php _e('BAHT','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'TOP') echo 'selected="selected" '; ?> value="TOP"><?php _e('PA&#39;ANGA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'TTD') echo 'selected="selected" '; ?> value="TTD"><?php _e('TRINIDAD AND TOBAGO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'AED') echo 'selected="selected" '; ?> value="AED"><?php _e('UAE DIRHAM','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'TND') echo 'selected="selected" '; ?> value="TND"><?php _e('TUNISIAN DINAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'PTL') echo 'selected="selected" '; ?> value="PTL"><?php _e('TURKISH LIRA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'TMM') echo 'selected="selected" '; ?> value="TMM"><?php _e('MANAT','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'UGS') echo 'selected="selected" '; ?> value="UGS"><?php _e('UGANDA SHILLING','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'UAK') echo 'selected="selected" '; ?> value="UAK"><?php _e('KARBOVANET','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MKD') echo 'selected="selected" '; ?> value="MKD"><?php _e('MACEDONIAN DENAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'EGP') echo 'selected="selected" '; ?> value="EGP"><?php _e('EGYPTIAN POUND','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'GBP') echo 'selected="selected" '; ?> value="GBP"><?php _e('POUND STERLING','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'TZS') echo 'selected="selected" '; ?> value="TZS"><?php _e('TANZANIAN SHILLING','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'USD') echo 'selected="selected" '; ?> value="USD"><?php _e('US DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'UYU') echo 'selected="selected" '; ?> value="UYU"><?php _e('URUGUAYAN PESO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'UZS') echo 'selected="selected" '; ?> value="UZS"><?php _e('UZBEKISTAN SUM','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'WST') echo 'selected="selected" '; ?> value="WST"><?php _e('TALA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'YER') echo 'selected="selected" '; ?> value="YER"><?php _e('YEMINI RIAL','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CSD') echo 'selected="selected" '; ?> value="CSD"><?php _e('SERBIAN DINAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'ZMK') echo 'selected="selected" '; ?> value="ZMK"><?php _e('KWACHA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'TWD') echo 'selected="selected" '; ?> value="TWD"><?php _e('NEW TAIWAN DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'TMT') echo 'selected="selected" '; ?> value="TMT"><?php _e('NEW MANAT','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'GHS') echo 'selected="selected" '; ?> value="GHS"><?php _e('GHANA CEDI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'VEF') echo 'selected="selected" '; ?> value="VEF"><?php _e('BOLIVAR FUERTE','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'RSD') echo 'selected="selected" '; ?> value="RSD"><?php _e('DINAR SERBIO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MZN') echo 'selected="selected" '; ?> value="MZN"><?php _e('MOZAMBIQUE METICAL (NEW)','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'AZN') echo 'selected="selected" '; ?> value="AZN"><?php _e('AZERBAIJANIAN MANAT_(NEW)','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'RON') echo 'selected="selected" '; ?> value="RON"><?php _e('NEW LEU','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'TRY') echo 'selected="selected" '; ?> value="TRY"><?php _e('TURKISH LIRA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'XAF') echo 'selected="selected" '; ?> value="XAF"><?php _e('CFA FRANC BEAC','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'XCD') echo 'selected="selected" '; ?> value="XCD"><?php _e('EAST CARIBBEAN DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'XOF') echo 'selected="selected" '; ?> value="XOF"><?php _e('CFA FRANC BCEAO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'XPF') echo 'selected="selected" '; ?> value="XPF"><?php _e('CFP FRANC','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'XEU') echo 'selected="selected" '; ?> value="XEU"><?php _e('EUROPEAN CURRENCY UNITED','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'SRD') echo 'selected="selected" '; ?> value="SRD"><?php _e('SURINAME DOLLAR','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'MGA') echo 'selected="selected" '; ?> value="MGA"><?php _e('ARIARY','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'AFN') echo 'selected="selected" '; ?> value="AFN"><?php _e('AFGHANISTAN AFGHANI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'TJS') echo 'selected="selected" '; ?> value="TJS"><?php _e('TAJIKISTAN SOMONI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'AOA') echo 'selected="selected" '; ?> value="AOA"><?php _e('KWANZA ANGOLA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BYR') echo 'selected="selected" '; ?> value="BYR"><?php _e('BELARUSSIAN RUBLE REVALORIZADO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BGN') echo 'selected="selected" '; ?> value="BGN"><?php _e('NEW LEV','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'CDF') echo 'selected="selected" '; ?> value="CDF"><?php _e('FRANCO DEL CONGO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BAM') echo 'selected="selected" '; ?> value="BAM"><?php _e('BOSNIAN MARKA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'EUR') echo 'selected="selected" '; ?> value="EUR"><?php _e('EURO','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'UAH') echo 'selected="selected" '; ?> value="UAH"><?php _e('UKRAINIAN HRYVNIA','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'GEL') echo 'selected="selected" '; ?> value="GEL"><?php _e('LARI','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'PLN') echo 'selected="selected" '; ?> value="PLN"><?php _e('NEW POLISH SLOTY','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'BRL') echo 'selected="selected" '; ?> value="BRL"><?php _e('BRAZILIAN REAL','caixabank-tools-official'); ?></option>
			<option <?php if( $caixabank_gateway_currency == 'ESB') echo 'selected="selected" '; ?> value="ESB"><?php _e('PESETA ESPA#OLA CONVERTIBLE','caixabank-tools-official'); ?></option>
		</select>
<?php }

function caixabank_gateway_test_mode(){ ?>
        <input type="checkbox" class="js-switch-testmode" data-tool="Activating this option, CaixaBank will be in Test Mode" name="caixabank_gateway_test_mode" value="1" <?php checked(1, get_option('caixabank_gateway_test_mode'), true); ?> />
<?php }

function caixabank_gateway_debug(){ ?>
        <input type="checkbox" class="js-switch-debug" data-tool="Activate this option for debug" name="caixabank_gateway_debug" value="1" <?php checked(1, get_option('caixabank_gateway_debug'), true); ?> />
<?php }



function display_caixabank_gateway_panel_fields(){

	add_settings_section("caixabank-gateway-section", "CaixaBank Gateway Settings", null, "caixabank-gateway-options");

	add_settings_field('caixabank_gateway_title', 'Tittle <a href="#" data-tool="The title users sees during checkout" class="tooltip animate">?</a>', 'caixabank_gateway_title', 'caixabank-gateway-options', 'caixabank-gateway-section');

	add_settings_field('caixabank_gateway_description', 'Description <a href="#" data-tool="This description is for the users. It will be screened at the Checkout" class="tooltip animate">?</a>', 'caixabank_gateway_description', 'caixabank-gateway-options', 'caixabank-gateway-section');

	add_settings_field('caixabank_gateway_fuc', 'Commerce Number (FUC) <a href="#" data-tool="The FUC provided by CaixaBank" class="tooltip animate">?</a>', 'caixabank_gateway_fuc', 'caixabank-gateway-options', 'caixabank-gateway-section');
	add_settings_field('caixabank_gateway_commerce_name', 'Commerce Name <a href="#" data-tool="Commerce Name" class="tooltip animate">?</a>', 'caixabank_gateway_commerce_name', 'caixabank-gateway-options', 'caixabank-gateway-section');
	add_settings_field('caixabank_gateway_terminal_number', 'Terminal Number <a href="#" data-tool="Terminal number provided by CaixaBank without zeros" class="tooltip animate">?</a>', 'caixabank_gateway_terminal_number', 'caixabank-gateway-options', 'caixabank-gateway-section');
	add_settings_field('caixabank_gateway_activate_second_terminal', 'Activate Second Terminal <a href="#" data-tool="Activate second Terminal" class="tooltip animate">?</a>', 'caixabank_gateway_activate_second_terminal', 'caixabank-gateway-options', 'caixabank-gateway-section');

	add_settings_field('caixabank_gateway_second_terminal_number', 'Second Terminal Number <a href="#" data-tool="Second Terminal number provided by CaixaBank without zeros" class="tooltip animate">?</a>', 'caixabank_gateway_second_terminal_number', 'caixabank-gateway-options', 'caixabank-gateway-section');

	add_settings_field('caixabank_gateway_when_use_second_terminal', 'Use the Second Terminal from 0 to (Dont use Currency Symbol) <a href="#" data-tool="When will the Second Terminal used? from 0 to...? Add the amount. Ex. Add 100 and the Second Terminal will be used when the amount be from 0 to 100" class="tooltip animate">?</a>', 'caixabank_gateway_when_use_second_terminal', 'caixabank-gateway-options', 'caixabank-gateway-section');

	add_settings_field('caixabank_gateway_passsha256', 'Encryption Passphrase SHA256 <a href="#" data-tool="Encryption Passphrase SHA256 provided by CaixaBank" class="tooltip animate">?</a>', 'caixabank_gateway_passsha256', 'caixabank-gateway-options', 'caixabank-gateway-section');

	add_settings_field('caixabank_gateway_language_gateway', 'Language CaixaBank Gateway <a href="#" data-tool="CaixaBank language. This option will be automatically set if you use WPML" class="tooltip animate">?</a>', 'caixabank_gateway_language_gateway', 'caixabank-gateway-options', 'caixabank-gateway-section');

	add_settings_field('caixabank_gateway_currency', 'CaixaBank Currency <a href="#" data-tool="Select the CaixaBank currencyV" class="tooltip animate">?</a>', 'caixabank_gateway_currency', 'caixabank-gateway-options', 'caixabank-gateway-section');

	add_settings_field('caixabank_gateway_test_mode', 'Activate Test Mode <a href="#" data-tool="Use the test mode for test your website and CaixaBank TPV" class="tooltip animate">?</a>', 'caixabank_gateway_test_mode', 'caixabank-gateway-options', 'caixabank-gateway-section');


	add_settings_field('caixabank_gateway_debug', 'Activate Debug <a href="#" data-tool="Activate Debug for log all activity" class="tooltip animate">?</a>', 'caixabank_gateway_debug', 'caixabank-gateway-options', 'caixabank-gateway-section');



	register_setting('caixabank-gateway-section', 'caixabank_gateway_title'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_description'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_fuc'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_commerce_name'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_terminal_number'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_activate_second_terminal'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_second_terminal_number'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_when_use_second_terminal'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_passsha256'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_language_gateway'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_currency'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_test_mode'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_debug'       );
}
add_action('admin_init', 'display_caixabank_gateway_panel_fields');
?>