<?php
/*
Plugin Name: Aweber Optin Widget - Responsive
Plugin URI: http://theweb-designs.com/plugin-demo/
Description: A free Widget that adds a Responsive Aweber Optin to site. Very easy to use and fully customizable. Get rid of Aweber's external Javascripts and CSS. Significantly enhance site performance and speed.
Author: Abu Bakar
Author URI: http://www.theweb-designs.com
Version: 1.1
License: GNU General Public License version 2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Exit if accessed directly
if (!defined('ABSPATH')) { exit; }

// Register Frontend styles
if( !function_exists ('twb_aweber_optin_scripts') ) :
	function twb_aweber_optin_scripts() {
		$twb_dir = plugin_dir_url( __FILE__ );
		
		wp_enqueue_style( 'twb_aweber_css', $twb_dir . 'css/twb_aweber_optin.css', array(), 1.1 );
	}
add_action('wp_enqueue_scripts', 'twb_aweber_optin_scripts');

// Load colorpicker Farbtastic
	function farbtastic_colorpicker_scripts() {
		wp_enqueue_script('farbtastic');
	}
	
	function farbtastic_colorpicker_styles() {
		wp_enqueue_style('farbtastic');	
	}
add_action('admin_print_scripts-widgets.php', 'farbtastic_colorpicker_scripts');
add_action('admin_print_styles-widgets.php', 'farbtastic_colorpicker_styles');

endif;

// Include Optin Widget
include_once("inc/twb_aweber_widget.php");