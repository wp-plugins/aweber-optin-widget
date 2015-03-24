<?php
/*
Plugin Name: Aweber Optin Widget
Plugin URI: http://www.theweb-designs.com
Description: A free wordpress plugin for marketers
Author: Abu Bakar
Author URI: http://www.theweb-designs.com
Version: 1.0
License: GNU General Public License version 2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if( !function_exists ('twb_aweber_optin_styles') ) :
	function twb_aweber_optin_styles() {

		$styles_dir = plugin_dir_url( __FILE__ );
		
		wp_register_style( 'twb_aweber_css', $styles_dir . 'css/twb_aweber_optin.css', array(), 1.0 );
		wp_enqueue_style( 'twb_aweber_css');
	}
	add_action('wp_enqueue_scripts', 'twb_aweber_optin_styles');
endif;

// Include Custom Widgets
include_once("inc/twb_aweber_widget.php");