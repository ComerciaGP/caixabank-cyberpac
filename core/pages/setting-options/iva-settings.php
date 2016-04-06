<?php
/**

$caixabank_alemania_iva_estandar = get_option('caixabank_iva_invoices_first_invoice_number_option');
if ( !empty( $caixabank_alemania_iva_estandar )){
	$caixabank_alemania_iva_estandar = $caixabank_alemania_iva_estandar;
	} else {
		$caixabank_alemania_iva_estandar = 19;
		}
update_option( 'caixabank_alemania_iva_estandar', '19' );
update_option( 'caixabank_austria_iva_estandar', '20' );
update_option( 'caixabank_belgica_iva_estandar', '21' );
update_option( 'caixabank_bulgaria_iva_estandar', '20' );
update_option( 'caixabank_croacia_iva_estandar', '25' );
update_option( 'caixabank_chipre_iva_estandar', '19' );
update_option( 'caixabank_dinamarca_iva_estandar', '25' );
update_option( 'caixabank_eslovaquia_iva_estandar', '20' );
update_option( 'caixabank_eslovenia_iva_estandar', '22' );
update_option( 'caixabank_espana_iva_estandar', '21' );
update_option( 'caixabank_estonia_iva_estandar', '20' );
update_option( 'caixabank_finlandia_iva_estandar', '24' );
update_option( 'caixabank_francia_iva_estandar', '20' );
update_option( 'caixabank_grecia_iva_estandar', '23' );
update_option( 'caixabank_holanda_iva_estandar', '27' );
update_option( 'caixabank_irlanda_iva_estandar', '23' );
update_option( 'caixabank_italia_iva_estandar', '22' );
update_option( 'caixabank_letonia_iva_estandar', '21' );
update_option( 'caixabank_lituania_iva_estandar', '21' );
update_option( 'caixabank_luxemburgo_iva_estandar', '15' );
update_option( 'caixabank_malta_iva_estandar', '18' );
update_option( 'caixabank_polonia_iva_estandar', '23' );
update_option( 'caixabank_portugal_iva_estandar', '23.25' );
update_option( 'caixabank_uk_iva_estandar', '20' );
update_option( 'caixabank_republica_checa_iva_estandar', '21' );
update_option( 'caixabank_rumania_iva_estandar', '24' );
update_option( 'caixabank_suecia_iva_estandar', '25' );

register_setting('caixabank-iva-section', 'caixabank_alemania_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_austria_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_belgica_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_bulgaria_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_croacia_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_chipre_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_dinamarca_iva_estandar'				);
register_setting('caixabank-iva-section', 'caixabank_eslovaquia_iva_estandar'				);
register_setting('caixabank-iva-section', 'caixabank_eslovenia_iva_estandar'				);
register_setting('caixabank-iva-section', 'caixabank_espana_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_estonia_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_finlandia_iva_estandar'				);
register_setting('caixabank-iva-section', 'caixabank_francia_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_grecia_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_holanda_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_irlanda_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_letonia_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_lituania_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_luxemburgo_iva_estandar'				);
register_setting('caixabank-iva-section', 'caixabank_malta_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_polonia_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_portugal_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_uk_iva_estandar'						);
register_setting('caixabank-iva-section', 'caixabank_republica_checa_iva_estandar'			);
register_setting('caixabank-iva-section', 'caixabank_rumania_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_suecia_iva_estandar'					);
register_setting('caixabank-iva-section', 'caixabank_iva_alemania_option'					);



add_settings_field('caixabank_austria_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_austria_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_belgica_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_belgica_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_bulgaria_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_bulgaria_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_croacia_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_croacia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_chipre_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_chipre_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_dinamarca_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_dinamarca_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_eslovaquia_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_eslovaquia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_eslovenia_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_eslovenia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_espana_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_espana_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_estonia_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_estonia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_finlandia_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_finlandia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_francia_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_francia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_grecia_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_grecia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_holanda_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_holanda_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_irlanda_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_irlanda_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_italia_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_italia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_letonia_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_letonia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_lituania_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_lituania_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_luxemburgo_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_luxemburgo_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_malta_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_malta_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_polonia_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_polonia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_portugal_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_portugal_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_uk_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_uk_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_republica_checa_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_republica_checa_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_rumania_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_rumania_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
add_settings_field('caixabank_suecia_iva_estandar', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_suecia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');

settings_fields( "caixabank-iva-section" );
do_settings_sections( "caixabank-iva-options" );
**/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function caixabank_iva_invoices_is_active_option(){ ?>
        <input type="checkbox" class="js-switch-activateiva" data-tool="Activate IVA for Invoices" name="caixabank_iva_invoices_is_active_option" value="1" <?php checked(1, get_option('caixabank_iva_invoices_is_active_option'), true); ?> />
<?php }

function caixabank_iva_alemania_option(){ ?>
        <input type="number" name="caixabank_alemania_iva_estandar" value="<?php echo get_option('caixabank_alemania_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_austria_iva_estandar(){ ?>
        <input type="number" name="caixabank_austria_iva_estandar" value="<?php echo get_option('caixabank_austria_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_belgica_iva_estandar(){ ?>
        <input type="number" name="caixabank_belgica_iva_estandar" value="<?php echo get_option('caixabank_belgica_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_bulgaria_iva_estandar(){ ?>
        <input type="number" name="caixabank_bulgaria_iva_estandar" value="<?php echo get_option('caixabank_bulgaria_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_croacia_iva_estandar(){ ?>
        <input type="number" name="caixabank_croacia_iva_estandar" value="<?php echo get_option('caixabank_croacia_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_chipre_iva_estandar(){ ?>
        <input type="number" name="caixabank_chipre_iva_estandar" value="<?php echo get_option('caixabank_chipre_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_dinamarca_iva_estandar(){ ?>
        <input type="number" name="caixabank_dinamarca_iva_estandar" value="<?php echo get_option('caixabank_dinamarca_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_eslovaquia_iva_estandar(){ ?>
        <input type="number" name="caixabank_eslovaquia_iva_estandar" value="<?php echo get_option('caixabank_eslovaquia_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_eslovenia_iva_estandar(){ ?>
        <input type="number" name="caixabank_eslovenia_iva_estandar" value="<?php echo get_option('caixabank_eslovenia_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_espana_iva_estandar(){ ?>
        <input type="number" name="caixabank_espana_iva_estandar" value="<?php echo get_option('caixabank_espana_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_estonia_iva_estandar(){ ?>
        <input type="number" name="caixabank_estonia_iva_estandar" value="<?php echo get_option('caixabank_estonia_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_finlandia_iva_estandar(){ ?>
        <input type="number" name="caixabank_finlandia_iva_estandar" value="<?php echo get_option('caixabank_finlandia_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_francia_iva_estandar(){ ?>
        <input type="number" name="caixabank_francia_iva_estandar" value="<?php echo get_option('caixabank_francia_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_grecia_iva_estandar(){ ?>
        <input type="number" name="caixabank_grecia_iva_estandar" value="<?php echo get_option('caixabank_grecia_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_holanda_iva_estandar(){ ?>
        <input type="number" name="caixabank_holanda_iva_estandar" value="<?php echo get_option('caixabank_holanda_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_irlanda_iva_estandar(){ ?>
        <input type="number" name="caixabank_irlanda_iva_estandar" value="<?php echo get_option('caixabank_irlanda_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_italia_iva_estandar(){ ?>
        <input type="number" name="caixabank_italia_iva_estandar" value="<?php echo get_option('caixabank_italia_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_letonia_iva_estandar(){ ?>
        <input type="number" name="caixabank_letonia_iva_estandar" value="<?php echo get_option('caixabank_letonia_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_lituania_iva_estandar(){ ?>
        <input type="number" name="caixabank_lituania_iva_estandar" value="<?php echo get_option('caixabank_lituania_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_luxemburgo_iva_estandar(){ ?>
        <input type="number" name="caixabank_luxemburgo_iva_estandar" value="<?php echo get_option('caixabank_luxemburgo_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_malta_iva_estandar(){ ?>
        <input type="number" name="caixabank_malta_iva_estandar" value="<?php echo get_option('caixabank_malta_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_polonia_iva_estandar(){ ?>
        <input type="number" name="caixabank_polonia_iva_estandar" value="<?php echo get_option('caixabank_polonia_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_portugal_iva_estandar(){ ?>
        <input type="number" name="caixabank_portugal_iva_estandar" value="<?php echo get_option('caixabank_portugal_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_uk_iva_estandar(){ ?>
        <input type="number" name="caixabank_uk_iva_estandar" value="<?php echo get_option('caixabank_uk_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_republica_checa_iva_estandar(){ ?>
        <input type="number" name="caixabank_republica_checa_iva_estandar" value="<?php echo get_option('caixabank_republica_checa_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_rumania_iva_estandar(){ ?>
        <input type="number" name="caixabank_rumania_iva_estandar" value="<?php echo get_option('caixabank_rumania_iva_estandar'); ?>" size="20" />
<?php }
function caixabank_suecia_iva_estandar(){ ?>
        <input type="number" name="caixabank_suecia_iva_estandar" value="<?php echo get_option('caixabank_suecia_iva_estandar'); ?>" size="20" />
<?php }







function display_caixabank_iva_panel_fields(){

	add_settings_section("caixabank-iva-section", "CaixaBank IVA Settings", null, "caixabank-iva-options");

	add_settings_field('caixabank_iva_invoices_is_active_option', 'Activate IVA for invoices <a href="#" data-tool="Activate IVA for invoices" class="tooltip animate">?</a>', 'caixabank_iva_invoices_is_active_option', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_iva_alemania_option', 'IVA Alemania <a href="#" data-tool="IVA Alemania" class="tooltip animate">?</a>', 'caixabank_iva_alemania_option', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_austria_iva_estandar', 'IVA Austria <a href="#" data-tool="IVA Austria" class="tooltip animate">?</a>', 'caixabank_austria_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_belgica_iva_estandar', 'IVA Bélgica <a href="#" data-tool="IVA Bélgica" class="tooltip animate">?</a>', 'caixabank_belgica_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_bulgaria_iva_estandar', 'IVA Bulgaria <a href="#" data-tool="IVA Bulgaria" class="tooltip animate">?</a>', 'caixabank_bulgaria_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_croacia_iva_estandar', 'IVA Croacia <a href="#" data-tool="IVA Croacia" class="tooltip animate">?</a>', 'caixabank_croacia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_chipre_iva_estandar', 'IVA Chipre <a href="#" data-tool="IVA Chipre" class="tooltip animate">?</a>', 'caixabank_chipre_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_dinamarca_iva_estandar', 'IVA Dinamarca <a href="#" data-tool="IVA Dinamarca" class="tooltip animate">?</a>', 'caixabank_dinamarca_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_eslovaquia_iva_estandar', 'IVA Eslovaquia <a href="#" data-tool="IVA Eslovaquia" class="tooltip animate">?</a>', 'caixabank_eslovaquia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_eslovenia_iva_estandar', 'IVA Eslovenia <a href="#" data-tool="IVA Eslovenia" class="tooltip animate">?</a>', 'caixabank_eslovenia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_espana_iva_estandar', 'IVA España <a href="#" data-tool="IVA España" class="tooltip animate">?</a>', 'caixabank_espana_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_estonia_iva_estandar', 'IVA Estonia <a href="#" data-tool="IVA Estonia" class="tooltip animate">?</a>', 'caixabank_estonia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_finlandia_iva_estandar', 'IVA Finalandia <a href="#" data-tool="IVA Finlandia" class="tooltip animate">?</a>', 'caixabank_finlandia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_francia_iva_estandar', 'IVA Francia <a href="#" data-tool="IVA Francia" class="tooltip animate">?</a>', 'caixabank_francia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_grecia_iva_estandar', 'IVA Grecia <a href="#" data-tool="IVA Grecia" class="tooltip animate">?</a>', 'caixabank_grecia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_holanda_iva_estandar', 'IVA Holanda <a href="#" data-tool="IVA Holanda" class="tooltip animate">?</a>', 'caixabank_holanda_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_irlanda_iva_estandar', 'IVA Irlanda <a href="#" data-tool="IVA Irlanda" class="tooltip animate">?</a>', 'caixabank_irlanda_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_italia_iva_estandar', 'IVA Italia <a href="#" data-tool="IVA Italia" class="tooltip animate">?</a>', 'caixabank_italia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_letonia_iva_estandar', 'IVA Letonia <a href="#" data-tool="IVA Letonia" class="tooltip animate">?</a>', 'caixabank_letonia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_lituania_iva_estandar', 'IVA Lituania <a href="#" data-tool="IVA Lituania" class="tooltip animate">?</a>', 'caixabank_lituania_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_luxemburgo_iva_estandar', 'IVA Luxemburgo <a href="#" data-tool="IVA Luxemburgo" class="tooltip animate">?</a>', 'caixabank_luxemburgo_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_malta_iva_estandar', 'IVA Malta <a href="#" data-tool="IVA Mailta" class="tooltip animate">?</a>', 'caixabank_malta_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_polonia_iva_estandar', 'IVA Polonia <a href="#" data-tool="IVA Polonia" class="tooltip animate">?</a>', 'caixabank_polonia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_portugal_iva_estandar', 'IVA Portugal <a href="#" data-tool="IVA Portugal" class="tooltip animate">?</a>', 'caixabank_portugal_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_uk_iva_estandar', 'IVA Reino Unido <a href="#" data-tool="IVA Reino Unido" class="tooltip animate">?</a>', 'caixabank_uk_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_republica_checa_iva_estandar', 'IVA República Checa <a href="#" data-tool="IVA República Checa" class="tooltip animate">?</a>', 'caixabank_republica_checa_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_rumania_iva_estandar', 'IVA Rumania <a href="#" data-tool="IVA Rumania" class="tooltip animate">?</a>', 'caixabank_rumania_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');
	add_settings_field('caixabank_suecia_iva_estandar', 'IVA Suecia <a href="#" data-tool="IVA Suecia" class="tooltip animate">?</a>', 'caixabank_suecia_iva_estandar', 'caixabank-iva-options', 'caixabank-iva-section');



	register_setting('caixabank-iva-section', 'caixabank_iva_invoices_is_active_option'			);
	register_setting('caixabank-iva-section', 'caixabank_alemania_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_austria_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_belgica_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_bulgaria_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_croacia_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_chipre_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_dinamarca_iva_estandar'				);
	register_setting('caixabank-iva-section', 'caixabank_eslovaquia_iva_estandar'				);
	register_setting('caixabank-iva-section', 'caixabank_eslovenia_iva_estandar'				);
	register_setting('caixabank-iva-section', 'caixabank_espana_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_estonia_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_finlandia_iva_estandar'				);
	register_setting('caixabank-iva-section', 'caixabank_francia_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_grecia_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_holanda_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_irlanda_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_letonia_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_lituania_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_luxemburgo_iva_estandar'				);
	register_setting('caixabank-iva-section', 'caixabank_malta_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_polonia_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_portugal_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_uk_iva_estandar'						);
	register_setting('caixabank-iva-section', 'caixabank_republica_checa_iva_estandar'			);
	register_setting('caixabank-iva-section', 'caixabank_rumania_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_suecia_iva_estandar'					);
	register_setting('caixabank-iva-section', 'caixabank_iva_alemania_option'					);


}

add_action('admin_init', 'display_caixabank_iva_panel_fields');