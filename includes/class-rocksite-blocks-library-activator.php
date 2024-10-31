<?php

/**
 * Fired during plugin activation
 *
 * @link       https://rocksite.pro/
 * @since      1.0.0
 *
 * @package    Rocksite_Blocks_Library
 * @subpackage Rocksite_Blocks_Library/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Rocksite_Blocks_Library
 * @subpackage Rocksite_Blocks_Library/includes
 * @author     Piotr Bielecki <netbiel@gmail.com>
 */
class Rocksite_Blocks_Library_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

	    // Redirection after actiovation - option
        if (
            ( isset( $_REQUEST['action'] ) && 'activate-selected' === $_REQUEST['action'] ) &&
            ( isset( $_POST['checked'] ) && count( $_POST['checked'] ) > 1 ) ) {
            return;
        }

        add_option( 'rocksite_blocks_library_activation_redirect', wp_get_current_user()->ID );

        if ( get_option( 'kadence_blocks_redirect_on_activation', false ) ) {

            delete_option( 'kadence_blocks_redirect_on_activation' );

        }



    }

    function activation_redirect() {
        // Make sure it's the correct user
        if ( intval( get_option( 'rocksite_blocks_library_activation_redirect', false ) ) === wp_get_current_user()->ID ) {
            // Make sure we don't redirect again after this one
            delete_option( 'rocksite_blocks_library_activation_redirect' );
            wp_safe_redirect( admin_url( '/options-general.php?page=plugin-admin-page' ) );
            exit;
        }
    }

}
