<?php
/*
Plugin Name: WP Status Dashboard
Plugin URI: http://codecanyon.net/item/wordpress-status-dashboard/143800/?ref=mindcork
Description: When used in conjunction with the "WP Status Dashboard" PHP application (available on <a href="http://codecanyon.net/item/the-wordpress-status-dashboard/237577/?ref=mindcork">CodeCanyon.net</a>), this plugin keeps the dashboard informed on the status of your website. This includes indexing status, WordPress version and active plugin updates.
Version: 1.2.8
Author: MindCork
Author URI: http://codecanyon.net/user/mindcork/?ref=mindcork
License: GPL
*/

// ------------------------------------------------------------------
// -- FUNCTIONS -----------------------------------------------------
// ------------------------------------------------------------------

include_once('settings/includes/wpsd_option_functions.php');

// ------------------------------------------------------------------
// -- WP STATUS DASHBOARD GET_DATA ----------------------------------
// ------------------------------------------------------------------

// This is where the data gets checked by the dashboard.
// It checks the security key first, if needed.
if ($_GET['data'] == 'security' && isset($_GET['security_key']) && $_GET['security_key'] != ''){

	include('../../../wp-load.php');
	if ($_GET['security_key'] == wpsd_get_theme_var('securityKey')){
		echo true;
	} else {
		echo false;
	}

// Is it asking for the indexing status?
} else if ($_GET['data'] == 'status' && isset($_GET['security_key']) && $_GET['security_key'] != ''){

	include('../../../wp-load.php');
	if ($_GET['security_key'] == wpsd_get_theme_var('securityKey')){
		echo wpsd_indexable_status();
	}
	
// Is it asking for the plugin updates information?
} else if ($_GET['data'] == 'updates' && isset($_GET['security_key']) && $_GET['security_key'] != ''){

	include('../../../wp-load.php');
	if ($_GET['security_key'] == wpsd_get_theme_var('securityKey')){
		$active_plugins = get_option('active_plugins');
	
		// Which function to use?
		if (floor(get_bloginfo('version')) >= 3){
			// WP 3.0
			$update_plugins = get_site_transient('update_plugins');
		} else {
			// OLDER THAN WP 3.0
			$update_plugins = get_transient('update_plugins');
		}
		
		$updatable_plugins = array();
		$update_count = 0;
		
		$update_plugins = $update_plugins->response;
		foreach($update_plugins as $key => $data){
			$updatable_plugins[] = $key;
		}
		
		foreach($active_plugins as $plugin){
			
			if (in_array($plugin,$updatable_plugins)){
				$update_count++;
			}
		
		}
		
		echo $update_count;
	}
	
// Is it asking for the WP version number?
} else if ($_GET['data'] == 'version' && isset($_GET['security_key']) && $_GET['security_key'] != ''){
	
	include('../../../wp-load.php');
	if ($_GET['security_key'] == wpsd_get_theme_var('securityKey')){
		echo get_bloginfo('version');
	}
	
}

if (!isset($_GET['data']) && !isset($_GET['security_key'])){

	// ------------------------------------------------------------------
	// -- PLUGIN SETTINGS PANEL -----------------------------------------
	// ------------------------------------------------------------------
	
	$wpsd_shortname = 'wpsd_';
	$pluginPath = WP_PLUGIN_URL.'/wp-status-dashboard/';
	global $wpsd_shortname,$pluginPath;
	
	function wpsd_menu() {
		//add_menu_page('WP Status Dashboard', 'WP Status Dashboard', 3, 'wpsd-settings', 'wpsd_loadSettingsPage', 'settings/images/small_gear.png', 3);
		add_submenu_page('plugins.php', 'WP Status Dashboard', 'WP Status Dashboard', 3, 'wpsd-settings', 'wpsd_loadSettingsPage');
	}
	
	add_action('admin_menu','wpsd_menu');
	
	function wpsd_loadSettingsPage() {
		include_once('settings/includes/options_pages/'. $_GET['page'] .'.php');
		include_once('settings/includes/wpsd_option_functions.php');
		include_once('settings/wpsd_options.php');
	}

}

?>