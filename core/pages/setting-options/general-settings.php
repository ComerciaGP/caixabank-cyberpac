<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


function caixabank_dni_field(){ ?>
        <input type="checkbox" class="js-switch-dni" data-tool="Add DNI field to profile user" name="caixabank_dni_field" value="1" <?php checked(1, get_option('caixabank_dni_field'), true); ?> />
<?php }

function caixabank_dni_field_required(){ ?>
        <input type="checkbox" class="js-switch-dnimandatory" data-tool="Activating this option, the DNI will be required" name="caixabank_dni_field_required" value="1" <?php checked(1, get_option('caixabank_dni_field_required'), true); ?> />
<?php }
function caixabank_dni_field_required_deactivated(){ ?>
        <input type="checkbox" class="js-switch-dnimandatorydisabled" data-tool="Activating this option, the DNI will be required" name="caixabank_dni_field_required" value="1" <?php checked(1, get_option('caixabank_dni_field_required'), true); ?> />
<?php }

function caixabank_irfp_field_activated(){ ?>
		<input type="checkbox" class="js-switch-irpf" data-tool="Activating this option, a IRFP field will be added" name="caixabank_irfp_activated" value="1" <?php checked(1, get_option('caixabank_irfp_activated'), true); ?> />
<?php }

function caixabank_display_donation_widget(){ ?>
        <input type="checkbox" class="js-switch-widget" data-tool="Activate donation Widget" name="caixabank_donation_widget" value="1" <?php checked(1, get_option('caixabank_donation_widget'), true); ?> />
<?php }
function display_caixabank_panel_fields(){
	$caixabank_add_dni = get_option( 'caixabank_dni_field' );
    add_settings_section("caixabank-general-section", "All Settings", null, "caixabank-general-options");
    add_settings_field('caixabank_dni_field', 'Activate the DNI at Checkout <a href="#" data-tool="When you activate this option, a DNI field will be shown at checkout (WooCommerce compatible)" class="tooltip animate">?</a>', 'caixabank_dni_field', 'caixabank-general-options', 'caixabank-general-section');
    if( $caixabank_add_dni ) add_settings_field('caixabank_dni_field_required', 'The DNI is required <a href="#" data-tool="Activating this option, the DNI will be required" class="tooltip animate">?</a>', 'caixabank_dni_field_required', 'caixabank-general-options', 'caixabank-general-section');
    if( !$caixabank_add_dni ) add_settings_field('caixabank_dni_field_required_deactivated', 'The DNI is required <a href="#" data-tool="Please, first activate the DNI field. Activating this option, the DNI will be required (WooCommerce compatible)" class="tooltip animate">?</a>', 'caixabank_dni_field_required_deactivated', 'caixabank-general-options', 'caixabank-general-section');


    add_settings_field('caixabank_irfp_activated', 'Do you want to add IRFF to your invoices? (can be deactivated by user)', 'caixabank_irfp_field_activated', 'caixabank-general-options', 'caixabank-general-section');
    add_settings_field('caixabank_donation_widget', 'Do you want activate the donation widget?', 'caixabank_display_donation_widget', 'caixabank-general-options', 'caixabank-general-section');



    register_setting('caixabank-general-section', 'caixabank_dni_field'							);
    register_setting('caixabank-general-section', 'caixabank_dni_field_required'				);
    register_setting('caixabank-general-section', 'caixabank_dni_field_required_deactivated'	);
    register_setting('caixabank-general-section', 'caixabank_donation_widget'					);
    register_setting('caixabank-general-section', 'caixabank_irfp_activated'					);
}
add_action('admin_init', 'display_caixabank_panel_fields');
?>