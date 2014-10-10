<?php
/*
Plugin Name: Simple Aweber Optin Widget - Lite
Plugin URI: http://theweb-designs.com/plugins/simple-aweber-optin-widget/
Description: Custom Widget that adds an aweber optin form on site. You can add an unlimited number of forms using this widget plugin. The form design and look can be easily controlled in the widget settings. Its Responsive , very Easy to Use and comes with Powerful Features. The aweber forms created by this widget plugin are completely responsive and does not load javascripts and css from aweber server.
Author: Abu Bakar
Author URI: http://www.theweb-designs.com
Version: 1.4
License: GNU General Public License version 2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Exit if accessed directly
if (!defined('ABSPATH')) { 
	echo "Oops! No direct access please :)";
	exit; 
}

// Register Frontend styles
if( !function_exists ('twb_aweber_optin_scripts') ) :
	function twb_aweber_optin_scripts() {
		
		$twb_dir = plugin_dir_url( __FILE__ );
		
		wp_enqueue_style( 'twb_aweber_css', $twb_dir . 'css/twb_aweber_optin.css', array(), '1.2' );
		wp_register_script('jquery-validation', $twb_dir. 'js/jquery.validate.min.js', array('jquery'), '1.13.0', true );
		
		wp_enqueue_script('jquery-validation');
		
	}
add_action('wp_enqueue_scripts', 'twb_aweber_optin_scripts');
endif;

// Enqueue Farbtastic Color Picker
	function farbtastic_colorpicker_scripts() {
		wp_enqueue_script('farbtastic');
	}	
	function farbtastic_colorpicker_styles() {
		wp_enqueue_style('farbtastic');	
	}
add_action('admin_print_scripts-widgets.php', 'farbtastic_colorpicker_scripts');
add_action('admin_print_styles-widgets.php', 'farbtastic_colorpicker_styles');

// Include Optin Widget
include( plugin_dir_path( __FILE__ ) . 'inc/twb_aweber_widget.php');