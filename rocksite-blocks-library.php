<?php

/**
 * Plugin Name:       Rocksite Sections
 * Description:       Extends Kadence Blocks Library with new sections: Hero Sections, Features Sections, Call to Actions etc.
 * Version:           1.1.4
 * Author:            Piotr Bielecki
 * Author URI:        https://rocksite.pro/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rocksite-sections
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'ROCKSITE_BLOCKS_LIBRARY_VERSION', '1.1.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rocksite-blocks-library-activator.php
 */
function activate_rocksite_blocks_library() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rocksite-blocks-library-activator.php';
	Rocksite_Blocks_Library_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rocksite-blocks-library-deactivator.php
 */
function deactivate_rocksite_blocks_library() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rocksite-blocks-library-deactivator.php';
	Rocksite_Blocks_Library_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rocksite_blocks_library' );
register_deactivation_hook( __FILE__, 'deactivate_rocksite_blocks_library' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rocksite-blocks-library.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rocksite_blocks_library() {

	$plugin = new Rocksite_Blocks_Library();
	$plugin->run();

}
run_rocksite_blocks_library();
