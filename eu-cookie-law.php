<?php
/*
Plugin Name:  EU Cookie Law
Plugin URI:   https://wordpress.org/plugins/eu-cookie-law/
Description:  Cookie Law informs users that your site has cookies, with a popup for more information and ability to lock scripts before acceptance.
Version:      2.2.1
Author:       Alex Moss, Marco Milesi, Peadig, Shane Jones
Author URI:   https://wordpress.org/plugins/eu-cookie-law/
Contributors: alexmoss, Milmor, peer, ShaneJones

*/


add_action('init', 'eucookie_start');

function eucookie_start() {
    if ( is_admin() ){
        require 'class-admin.php';
    } else {
        require 'class-frontend.php';
    }
}

function ecl_check_defaults() { require 'defaults.php'; }

add_action( 'plugins_loaded', 'ecl_load_textdomain' );
function ecl_load_textdomain() {
    load_plugin_textdomain( 'eu-cookie-law', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'elc-color-picker', plugins_url('js/eucookiesettings.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

function ecl_action_admin_init() {
    
    $arraya_ecl_v = get_plugin_data ( __FILE__ );
    $new_version = $arraya_ecl_v['Version'];
        
    if ( version_compare($new_version,  get_option('ecl_version_number') ) == 1 ) {
        ecl_check_defaults();
        update_option( 'ecl_version_number', $new_version );   
    }
} add_action('admin_init', 'ecl_action_admin_init');

// Hooks your functions into the correct filters
function ecl_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'ecl_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'ecl_register_mce_button' );
	}
}
add_action('admin_head', 'ecl_add_mce_button');

function ecl_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['my_mce_button'] = plugins_url('js/shortcode.js',__FILE__);
	return $plugin_array;
}

function ecl_register_mce_button( $buttons ) {
	array_push( $buttons, 'my_mce_button' );
	return $buttons;
}
?>