<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
    }
function caixabank_settings(){ ?>
    <div class="wrap">
        <h1><?php echo __( 'CaixaBank Tools Official Settings', 'caixabank-tools-official' ) ?></h1>
        <form method="post" action="options.php">
            <?php
                settings_fields("caixabank-settings-section");
                do_settings_sections("caixabank-settings-options");
                submit_button();
            ?>
        </form>
        </div>
        <script type="text/javascript">
      // Default
      // if-else statement used only for fixing <IE9 issues
      if (Array.prototype.forEach) {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
          var switchery = new Switchery(html);
        });
      } else {
        var elems = document.querySelectorAll('.js-switch');
        for (var i = 0; i < elems.length; i++) {
          var switchery = new Switchery(elems[i]);
        }
      }

      /* var elements
	   *** disabled
	   *** dni
	   *** dni mandatory
	   *** dnimandatorydisabled
	   *** widget
	   ***
	   */
      // Disabled switch
      var disabled = document.querySelector('.js-switch-disabled');
      if ( disabled ) {
          var switchery = new Switchery(disabled, { size: 'small', disabled: true });
      }
      var dni = document.querySelector('.js-switch-dni');
      if ( dni ) {
          var switchery = new Switchery(dni, { size: 'small' });
      }
      var dnimandatory = document.querySelector('.js-switch-dnimandatory');
      if ( dnimandatory ) {
          var switchery = new Switchery(dnimandatory, { size: 'small' });
      }
      var dnimandatorydisabled = document.querySelector('.js-switch-dnimandatorydisabled');
      if ( dnimandatorydisabled ) {
          var switchery = new Switchery(dnimandatorydisabled, { size: 'small', disabled: true });
      }








      var widget = document.querySelector('.js-switch-widget');
      if ( widget ) {
          var switchery = new Switchery(widget, { size: 'small' });
      }
      var disabledOpacity = document.querySelector('.js-switch-disabled-opacity');
      if ( disabledOpacity ) {
          var switchery = new Switchery(disabledOpacity, { disabled: true, disabledOpacity: 0.75 });
      }
      // Colored switches
      var blue = document.querySelector('.js-switch-blue');
      if ( blue ) {
          var switchery = new Switchery(blue, { color: '#7c8bc7', jackColor: '#9decff' });
      }
      // Switch sizes
      var small = document.querySelector('.js-switch-small');
      if ( small ) {
          var switchery = new Switchery(small, { size: 'small' });
      }
      var large = document.querySelector('.js-switch-large');
      if ( large ) {
          var switchery = new Switchery(large, { size: 'large' });
      }
      // Dynamic enable/disable
      var dynamicDisable = document.querySelector('.js-dynamic-state');
      if ( dynamicDisable ) {
          var dynamicStateCheckbox = new Switchery(dynamicDisable);
      }
      var dynamicDisable = document.querySelector('.js-dynamic-disable');
      if ( dynamicDisable ) {
        dynamicDisable.addEventListener('click', function() {
            dynamicStateCheckbox.disable();
        });
      }
      var dynamicEnable = document.querySelector('.js-dynamic-enable');
      if ( dynamicEnable ) {
        dynamicEnable.addEventListener('click', function() {
            dynamicStateCheckbox.enable();
        });
      }
      // Getting checkbox state
      // On click
      var clickCheckbox = document.querySelector('.js-check-click')
        , clickButton = document.querySelector('.js-check-click-button');
      if (window.addEventListener && clickButton) {
        clickButton.addEventListener('click', function() {
          alert(clickCheckbox.checked);
        });
      } else if ( ! window.addEventListener && clickButton) {
        clickButton.attachEvent('onclick', function() {
          alert(clickCheckbox.checked);
        });
      }
      // On change
      var changeCheckbox = document.querySelector('.js-check-change')
        , changeField = document.querySelector('.js-check-change-field');
      if ( changeCheckbox ) {
          changeCheckbox.onchange = function() {
              changeField.innerHTML = changeCheckbox.checked;
          };
      }
      // CSS3 Pie for <IE9
      if (window.PIE) {
        var wrapper = document.querySelectorAll('.switchery')
          , handle = document.querySelectorAll('.switchery > small');
        if (wrapper.length == handle.length) {
          for (var i = 0; i < wrapper.length; i++) {
            PIE.attach(wrapper[i]);
            PIE.attach(handle[i]);
          }
        }
      }
    </script>
<?php }
function caixabank_dni_field(){ ?>
        <input type="checkbox" class="js-switch-dni" data-tool="Add DNI field to profile user" name="caixabank_dni_field" value="1" <?php checked(1, get_option('caixabank_dni_field'), true); ?> />
<?php }

function caixabank_dni_field_required(){ ?>
        <input type="checkbox" class="js-switch-dnimandatory" data-tool="Activating this option, the DNI will be required" name="caixabank_dni_field_required" value="1" <?php checked(1, get_option('caixabank_dni_field_required'), true); ?> />
<?php }
function caixabank_dni_field_required_deactivated(){ ?>
        <input type="checkbox" class="js-switch-dnimandatorydisabled" data-tool="Activating this option, the DNI will be required" name="caixabank_dni_field_required" value="1" <?php checked(1, get_option('caixabank_dni_field_required'), true); ?> />
<?php }





function caixabank_display_donation_widget(){ ?>
        <input type="checkbox" class="js-switch-widget" data-tool="Activate donation Widget" name="caixabank_donation_widget" value="1" <?php checked(1, get_option('caixabank_donation_widget'), true); ?> />
<?php }
function display_caixabank_panel_fields(){
	$caixabank_add_dni = get_option( 'caixabank_dni_field' );
    add_settings_section("caixabank-settings-section", "All Settings", null, "caixabank-settings-options");
    add_settings_field('caixabank_dni_field', 'Activate the DNI at Checkout <a href="#" data-tool="When you activate this option, a DNI field will be shown at checkout" class="tooltip animate">?</a>', 'caixabank_dni_field', 'caixabank-settings-options', 'caixabank-settings-section');
    if( $caixabank_add_dni ) add_settings_field('caixabank_dni_field_required', 'The DNI is required <a href="#" data-tool="Activating this option, the DNI will be required" class="tooltip animate">?</a>', 'caixabank_dni_field_required', 'caixabank-settings-options', 'caixabank-settings-section');
    if( !$caixabank_add_dni ) add_settings_field('caixabank_dni_field_required_deactivated', 'The DNI is required <a href="#" data-tool="Please, first activate the DNI field. Activating this option, the DNI will be required" class="tooltip animate">?</a>', 'caixabank_dni_field_required_deactivated', 'caixabank-settings-options', 'caixabank-settings-section');

    add_settings_field('caixabank_donation_widget', 'Do you want activate the donation widget?', 'caixabank_display_donation_widget', 'caixabank-settings-options', 'caixabank-settings-section');


    register_setting('caixabank-settings-section', 'caixabank_dni_field');
    register_setting('caixabank-settings-section', 'caixabank_dni_field_required');
    register_setting('caixabank-settings-section', 'caixabank_dni_field_required_deactivated');
    register_setting('caixabank-settings-section', 'caixabank_donation_widget');
}
add_action('admin_init', 'display_caixabank_panel_fields');
function caixabank_settings_load_js(){
    wp_enqueue_script(  'caixabank_switchery',  CAIXABANK_DIR_URL . '/assets/js/switchery.min.js',  CAIXABANK_TOOLS_OFFICIAL_VERSION );
    //wp_enqueue_script(    'caixabank_check',      CAIXABANK_DIR_URL . '/assets/js/check.js',      CAIXABANK_TOOLS_OFFICIAL_VERSION );
    }
function caixabank_settings_load_css($hook){
    global $caixabankconfig;
    if( $caixabankconfig != $hook ) {
        return;
        } else {
        wp_register_style(	'caixabank_switchery_css', CAIXABANK_DIR_URL . '/assets/css/switchery.css', array(),CAIXABANK_TOOLS_OFFICIAL_VERSION  );
        wp_register_style(	'caixabank_ownstylesettings_css', CAIXABANK_DIR_URL . '/assets/css/rowstylesettings.css', array(),CAIXABANK_TOOLS_OFFICIAL_VERSION  );
        wp_enqueue_style(	'caixabank_switchery_css');
        wp_enqueue_style(	'caixabank_ownstylesettings_css');
    }
}
add_action( 'admin_enqueue_scripts', 'caixabank_settings_load_css' );
?>