<?php

/*
Plugin Name: Advanced Custom Fields: Switcher True/False Field
Plugin URI: https://linkedin.com/in/samcohen
Description: ACF field checkbox as a true/false toggle switch.
Version: 1.0.0
Author: Sam Cohen
Author URI: https://linkedin.com/in/samcohen
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// 1. set text domain
// Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
//load_plugin_textdomain( 'acf-switcher-true-false', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );


define( 'ACFSWTF_PLUGIN_DIR', dirname( __FILE__ ) );

 

// 2. Include field type for ACF5
// $version = 5 and can be ignored until ACF6 exists
//function include_field_types_switcher_true_false_field( $version ) {
	//include_once( 'acf-code-field-v5.php' );
//}
//add_action( 'acf/include_field_types', 'include_field_types_switcher_true_false_field' );


// 3. Include field type for ACF4
function register_fields_switcher_true_false_field() {
	include_once( 'acf_switcher_true_false_v4.php' );
}
add_action( 'acf/register_fields', 'register_fields_switcher_true_false_field' );


add_action( 'admin_notices', 'ACFSWTF_acf_check' );

function ACFSWTF_acf_check() {
	if ( ! class_exists( 'acf' ) && current_user_can( 'manage_options' ) ) {
		$class   = 'notice notice-error';
		$message = sprintf( __( 'Uh-oh. ACF not installed. Please install the <a href="%s" class="thickbox">Advanced Custom Fields plugin.</a>', 'sample-text-domain' ), '/wp-admin/plugin-install.php?tab=plugin-information&plugin=advanced-custom-fields&TB_iframe=true&width=600&height=550' );
		printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
	}
}


?>