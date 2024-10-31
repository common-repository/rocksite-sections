<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://rocksite.pro/
 * @since      1.0.0
 *
 * @package    Rocksite_Blocks_Library
 * @subpackage Rocksite_Blocks_Library/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Rocksite_Blocks_Library
 * @subpackage Rocksite_Blocks_Library/public
 * @author     Piotr Bielecki <netbiel@gmail.com>
 */
class Rocksite_Blocks_Library_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {


		$ouput_css = get_option( 'rocksite_kit_css' );


		if ( is_array( $ouput_css ) && isset( $ouput_css['css_code_0'] ) && strlen( $ouput_css['css_code_0'] ) > 0 ) {

			$header_css = '.rs-body-wrapper, ' . $ouput_css['css_code_0'];

			// pass style name whoch is upper than main style

			wp_add_inline_style( 'wp-block-library', $header_css );

		}


	}

	/**
	 * Add specific CSS class by filter.
	 * @param $classes
	 *
	 * @return array
	 */


	public function add_body_class( $classes ) {

		return array_merge( $classes, array( 'rs-body-wrapper' ) );

	}


}
