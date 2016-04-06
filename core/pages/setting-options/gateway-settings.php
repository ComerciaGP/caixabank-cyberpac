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
	register_setting('caixabank-gateway-section', 'caixabank_gateway_test_mode'       );
	register_setting('caixabank-gateway-section', 'caixabank_gateway_debug'       );
}
add_action('admin_init', 'display_caixabank_gateway_panel_fields');
?>