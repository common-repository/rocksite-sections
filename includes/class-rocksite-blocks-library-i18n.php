<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://rocksite.pro/
 * @since      1.0.0
 *
 * @package    Rocksite_Blocks_Library
 * @subpackage Rocksite_Blocks_Library/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Rocksite_Blocks_Library
 * @subpackage Rocksite_Blocks_Library/includes
 * @author     Piotr Bielecki <netbiel@gmail.com>
 */
class Rocksite_Blocks_Library_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		
		load_plugin_textdomain(
			'rocksite-sections',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
			
		);

	}



}
