<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link             https://www.chatlab.com
 * @since             1.0.0
 * @package           Chatlab_WooCommerce
 *
 * @wordpress-plugin
 * Plugin Name:       ChatLab - AI Chatbot for your website - GPT-powered Customer & Sales Assistant
 * Description:       ChatGPT-powered AI chatbot for Wordpress with WooCommerce stores support, trained on your data. It offers comprehensive customer and sales support, including lead collection, live chat, product search, and order status checking.
 * Version:           1.0.0
 * Author:            Chatlab.com
 * Author URI:        https://www.chatlab.com
 * License:           GNU General Public License v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CHATLABSETTINGS_PAGE_INTEGRATION_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-chatlab-settings-page-activator.php
 */
function chatlabsettings_page_activate_chatlab_page() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chatlab-settings-page-activator.php';
	ChatlabSettings_Page_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-chatlab-settings-page-deactivator.php
 */
function chatlabsettings_page_deactivate_chatlab_page() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chatlab-settings-page-deactivator.php';
	ChatlabSettings_Page_Deactivator::deactivate();
}
//require_once plugin_dir_path( __FILE__ ) . 'public/public-functions.php';
register_activation_hook( __FILE__, 'chatlabsettings_page_activate_chatlab_page' );
register_deactivation_hook( __FILE__, 'chatlabsettings_page_deactivate_chatlab_page' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-chatlab-settings-page.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function chatlabsettings_page_run_settings_page() {

	$plugin = new ChatlabSettings_Page();
	$plugin->run();

}
chatlabsettings_page_run_settings_page();

