<?php
/*
Plugin Name:  EU Cookie Law
Plugin URI:   https://wordpress.org/plugins/eu-cookie-law/
Description:  Cookie Law informs users that your site has cookies, with a popup for more information and ability to lock scripts before acceptance.
Version:      2.0.4
Author:       Alex Moss, Marco Milesi, Peadig, Shane Jones
Author URI:   https://wordpress.org/plugins/eu-cookie-law/
Contributors: alexmoss, Milmor, peer, ShaneJones

*/


add_action('init', 'eucookie_start');

function eucookie_start() {
    if ( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) ){
        require 'class-admin.php';
        register_activation_hook(__FILE__, 'pea_cook_defaults');
    } else {
        require 'class-frontend.php';
    }
}

function ecl_action_admin_init() {
    
    $arraya_ecl_v = get_plugin_data ( __FILE__ );
    $new_version = $arraya_ecl_v['Version'];

    update_option( 'ecl_version_number', $new_version );
} add_action('admin_init', 'ecl_action_admin_init');

// Hooks your functions into the correct filters
function my_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'my_register_mce_button' );
	}
}
add_action('admin_head', 'my_add_mce_button');

// Declare script for new button
function my_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['my_mce_button'] = plugins_url('js/shortcode.js',__FILE__);
	return $plugin_array;
}

// Register new button in the editor
function my_register_mce_button( $buttons ) {
	array_push( $buttons, 'my_mce_button' );
	return $buttons;
}
?>