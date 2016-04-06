<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
function caixabank_settings(){ ?>
    <div class="wrap">
        <h1><?php echo __( 'CaixaBank Tools Official Settings', 'caixabank-tools-official' ) ?></h1>

        <?php
    if( isset( $_GET[ 'tab' ] ) ) {
        $active_tab = $_GET[ 'tab' ];
    } else {
        $active_tab = 'general_options';
    }
?>

        <h2 class="nav-tab-wrapper">
			<a href="?page=caixabank&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'General Settings', 'caixabank-tools-official' ); ?></a>
            <a href="?page=caixabank&tab=gateway_options" class="nav-tab <?php echo $active_tab == 'gateway_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'CaixaBank Gateway Settings', 'caixabank-tools-official' ); ?></a>
            <a href="?page=caixabank&tab=sequential_invoice_options" class="nav-tab <?php echo $active_tab == 'sequential_invoice_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Sequential Invoice Numbers', 'caixabank-tools-official' ); ?></a>
            <a href="?page=caixabank&tab=iva_invoice_options" class="nav-tab <?php echo $active_tab == 'iva_invoice_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'IVA Settings', 'caixabank-tools-official' ); ?></a>
            <a href="?page=caixabank&tab=irpf_invoice_options" class="nav-tab <?php echo $active_tab == 'irpf_invoice_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'IRPF Settings', 'caixabank-tools-official' ); ?></a>



		</h2>

        <form method="post" action="options.php">
            <?php
    if( $active_tab == 'general_options' ) {
        settings_fields( "caixabank-general-section" );
        do_settings_sections( "caixabank-general-options" );
    }
    elseif ( $active_tab == 'gateway_options' ) {
        settings_fields( "caixabank-gateway-section" );
        do_settings_sections( "caixabank-gateway-options" );
    }
    elseif ( $active_tab == 'sequential_invoice_options' ) {
        settings_fields( "caixabank-sequential-section" );
        do_settings_sections( "caixabank-sequential-options" );
    }
    elseif ( $active_tab == 'iva_invoice_options' ) {
        settings_fields( "caixabank-iva-section" );
        do_settings_sections( "caixabank-iva-options" );
    }
    elseif ( $active_tab == 'irpf_invoice_options' ) {
        settings_fields( "caixabank-irpf-section" );
        do_settings_sections( "caixabank-irpf-options" );
    }



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
      var irpf = document.querySelector('.js-switch-irpf');
      if ( irpf ) {
          var switchery = new Switchery(irpf, { size: 'small' });
      }
	  var secondterminal = document.querySelector('.js-switch-secondterminal');
      if ( secondterminal ) {
          var switchery = new Switchery(secondterminal, { size: 'small' });
      }
     var testmode = document.querySelector('.js-switch-testmode');
      if ( testmode ) {
          var switchery = new Switchery(testmode, { size: 'small' });
      }
	 var debug = document.querySelector('.js-switch-debug');
      if ( debug ) {
          var switchery = new Switchery(debug, { size: 'small' });
      }
      var activatesequential = document.querySelector('.js-switch-activatesequential');
      if ( activatesequential ) {
          var switchery = new Switchery(activatesequential, { size: 'small' });
      }
      var resetinvoice = document.querySelector('.js-switch-resetinvoice');
      if ( resetinvoice ) {
          var switchery = new Switchery(resetinvoice, { size: 'small' });
      }
      var activateiva = document.querySelector('.js-switch-activateiva');
      if ( activateiva ) {
          var switchery = new Switchery(activateiva, { size: 'small' });
      }
      var activateirpf = document.querySelector('.js-switch-activateirpf');
      if ( activateirpf ) {
          var switchery = new Switchery(activateirpf, { size: 'small' });
      }
    </script>
<?php }

function caixabank_settings_load_js(){
    wp_enqueue_script(  'caixabank_switchery',  CAIXABANK_DIR_URL . '/assets/js/switchery.min.js',  CAIXABANK_TOOLS_OFFICIAL_VERSION );
    //wp_enqueue_script(    'caixabank_check',      CAIXABANK_DIR_URL . '/assets/js/check.js',      CAIXABANK_TOOLS_OFFICIAL_VERSION );
}
function caixabank_settings_load_css($hook){
    global $caixabankconfig;
    if( $caixabankconfig != $hook ) {
        return;
    } else {
        wp_register_style(  'caixabank_switchery_css', CAIXABANK_DIR_URL . '/assets/css/switchery.css', array(),CAIXABANK_TOOLS_OFFICIAL_VERSION  );
        wp_register_style(  'caixabank_ownstylesettings_css', CAIXABANK_DIR_URL . '/assets/css/rowstylesettings.css', array(),CAIXABANK_TOOLS_OFFICIAL_VERSION  );
        wp_enqueue_style(   'caixabank_switchery_css');
        wp_enqueue_style(   'caixabank_ownstylesettings_css');
    }
}
add_action( 'admin_enqueue_scripts', 'caixabank_settings_load_css' );



//Include all options

include_once('setting-options/general-settings.php');
include_once('setting-options/gateway-settings.php');
include_once('setting-options/sort-invoices.php');
include_once('setting-options/iva-settings.php');
include_once('setting-options/irpf-settings.php');
?>