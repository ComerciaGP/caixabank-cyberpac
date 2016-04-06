<?php
/**

- Activate Sequential Invoice numbers > Activate Sequential Invoice numbers > caixabank_sort_invoices_is_active_option
- First Invoice Number > Add here the first invoice number. By Default is number 1. Save this number before activate it. Example 345 > caixabank_sort_invoices_first_invoice_number_option
- Invoice Number Length > The Invoice number length, this is not required. Example 10, the result will be 0000000345 > caixabank_sort_invoices_length_invoice_number_option
- Prefix Invoice Number > Add here a prefix invoice number, this is not required. Example WC-, the result will be WC-0000000345. Pattern are allowed ex. {Y} this will add the current year. You will find all patterns here. > caixabank_sort_invoices_prefix_invoice_number_option
- Postfix Invoice Number > Add here a postfix invoice number, this is not required. Example -2015 the result will be WC-0000000345-2015. Pattern are allowed ex. {Y} this will add the current year. You will find all patterns here. > caixabank_sort_invoices_postfix_invoice_number_option
- Pretfix Invoice Number > Add here a prefix order number, this is not required. Example 2015/ the result will be 2105/34345. Pattern are allowed ex. {Y} this will add the current year. You will find all patterns here. > caixabank_sort_invoices_prefix_order_number_option
- Postfix Order Number > Add here a postfix order number, this is not required. If you don't add a postfix, a postfix will be automatically added for security reason. Example /2015 the result will be 34345/2015. Pattern are allowed ex. {Y} this will add the current year. You will find all patterns here. > caixabank_sort_invoices_postfix_order_number_option
- Reset Invoice Number > If you enable Reset Invoice Number, every January 1st the invoice number will be reset and will start again with number 1. Is very important that if you enable this option, you use a prefix or postfix year pattern {Y}. > caixabank_sort_invoices_reset_invoice_number_option
**/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function caixabank_sort_invoices_is_active_option(){ ?>
        <input type="checkbox" class="js-switch-activatesequential" data-tool="Activate Sequential Invoice numbers" name="caixabank_sort_invoices_is_active_option" value="1" <?php checked(1, get_option('caixabank_sort_invoices_is_active_option'), true); ?> />
<?php }

function caixabank_sort_invoices_first_invoice_number_option(){ ?>
        <input type="text" name="caixabank_sort_invoices_first_invoice_number_option" value="<?php echo get_option('caixabank_sort_invoices_first_invoice_number_option'); ?>" size="40" />
<?php }

function caixabank_sort_invoices_length_invoice_number_option(){ ?>
        <input type="text" name="caixabank_sort_invoices_length_invoice_number_option" value="<?php echo get_option('caixabank_sort_invoices_length_invoice_number_option'); ?>" size="40" />
<?php }

function caixabank_sort_invoices_prefix_invoice_number_option(){ ?>
        <input type="text" name="caixabank_sort_invoices_prefix_invoice_number_option" value="<?php echo get_option('caixabank_sort_invoices_prefix_invoice_number_option'); ?>" size="40" />
<?php }

function caixabank_sort_invoices_postfix_invoice_number_option(){ ?>
        <input type="text" name="caixabank_sort_invoices_postfix_invoice_number_option" value="<?php echo get_option('caixabank_sort_invoices_postfix_invoice_number_option'); ?>" size="40" />
<?php }

function caixabank_sort_invoices_prefix_order_number_option(){ ?>
        <input type="text" name="caixabank_sort_invoices_prefix_order_number_option" value="<?php echo get_option('caixabank_sort_invoices_prefix_order_number_option'); ?>" size="40" />
<?php }

function caixabank_sort_invoices_postfix_order_number_option(){ ?>
        <input type="text" name="caixabank_sort_invoices_postfix_order_number_option" value="<?php echo get_option('caixabank_sort_invoices_postfix_order_number_option'); ?>" size="40" />
<?php }

function caixabank_sort_invoices_reset_invoice_number_option(){ ?>
        <input type="checkbox" class="js-switch-resetinvoice" data-tool="Activating this option, CaixaBank will use a second terminal" name="caixabank_sort_invoices_reset_invoice_number_option" value="1" <?php checked(1, get_option('caixabank_sort_invoices_reset_invoice_number_option'), true); ?> />
<?php }

function display_caixabank_secuential_panel_fields(){

	add_settings_section("caixabank-sequential-section", "CaixaBank Gateway Settings", null, "caixabank-sequential-options");

	add_settings_field('caixabank_sort_invoices_is_active_option', 'Activate Sequential Invoice numbers <a href="#" data-tool="Activate Sequential Invoice numbers" class="tooltip animate">?</a>', 'caixabank_sort_invoices_is_active_option', 'caixabank-sequential-options', 'caixabank-sequential-section');
	add_settings_field('caixabank_sort_invoices_first_invoice_number_option', 'First Invoice Number <a href="#" data-tool="Add here the first invoice number. By Default is number 1. Save this number before activate it. Example 345" class="tooltip animate">?</a>', 'caixabank_sort_invoices_first_invoice_number_option', 'caixabank-sequential-options', 'caixabank-sequential-section');
	add_settings_field('caixabank_sort_invoices_length_invoice_number_option', 'Invoice Number Length <a href="#" data-tool="The Invoice number length, this is not required. Example 10, the result will be 0000000345" class="tooltip animate">?</a>', 'caixabank_sort_invoices_length_invoice_number_option', 'caixabank-sequential-options', 'caixabank-sequential-section');
	add_settings_field('caixabank_sort_invoices_prefix_invoice_number_option', 'Prefix Invoice Number <a href="#" data-tool="Add here a prefix invoice number, this is not required. Example WC-, the result will be WC-0000000345. Pattern are allowed ex. {Y} this will add the current year. You will find all patterns at Help" class="tooltip animate">?</a>', 'caixabank_sort_invoices_prefix_invoice_number_option', 'caixabank-sequential-options', 'caixabank-sequential-section');
	add_settings_field('caixabank_sort_invoices_postfix_invoice_number_option', 'Postfix Invoice Number <a href="#" data-tool="Add here a postfix invoice number, this is not required. Example -2015 the result will be WC-0000000345-2015. Pattern are allowed ex. {Y} this will add the current year. You will find all patterns at Help" class="tooltip animate">?</a>', 'caixabank_sort_invoices_postfix_invoice_number_option', 'caixabank-sequential-options', 'caixabank-sequential-section');
	add_settings_field('caixabank_sort_invoices_prefix_order_number_option', 'Prefix Order Number <a href="#" data-tool="Add here a prefix order number, this is not required. Example 2015/ the result will be 2105/34345. Pattern are allowed ex. {Y} this will add the current year. You will find all patterns at Help." class="tooltip animate">?</a>', 'caixabank_sort_invoices_prefix_order_number_option', 'caixabank-sequential-options', 'caixabank-sequential-section');
	add_settings_field('caixabank_sort_invoices_postfix_order_number_option', 'Postfix Order Number <a href="#" data-tool="Add here a postfix order number, this is not required. If you dont add a postfix, a postfix will be automatically added for security reason. Example /2015 the result will be 34345/2015. Pattern are allowed ex. {Y} this will add the current year. You will find all patterns here." class="tooltip animate">?</a>', 'caixabank_sort_invoices_postfix_order_number_option', 'caixabank-sequential-options', 'caixabank-sequential-section');
	add_settings_field('caixabank_sort_invoices_reset_invoice_number_option', 'Reset Invoice Number <a href="#" data-tool="If you enable Reset Invoice Number, every January 1st the invoice number will be reset and will start again with number 1. Is very important that if you enable this option, you use a prefix or postfix year pattern {Y}" class="tooltip animate">?</a>', 'caixabank_sort_invoices_reset_invoice_number_option', 'caixabank-sequential-options', 'caixabank-sequential-section');


	register_setting('caixabank-sequential-section', 'caixabank_sort_invoices_is_active_option'					);
	register_setting('caixabank-sequential-section', 'caixabank_sort_invoices_first_invoice_number_option'		);
	register_setting('caixabank-sequential-section', 'caixabank_sort_invoices_length_invoice_number_option'		);
	register_setting('caixabank-sequential-section', 'caixabank_sort_invoices_prefix_invoice_number_option'		);
	register_setting('caixabank-sequential-section', 'caixabank_sort_invoices_postfix_invoice_number_option'	);
	register_setting('caixabank-sequential-section', 'caixabank_sort_invoices_prefix_order_number_option'		);
	register_setting('caixabank-sequential-section', 'caixabank_sort_invoices_postfix_order_number_option'		);
	register_setting('caixabank-sequential-section', 'caixabank_sort_invoices_reset_invoice_number_option'		);

}

add_action('admin_init', 'display_caixabank_secuential_panel_fields');