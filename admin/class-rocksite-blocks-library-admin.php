<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://rocksite.pro/
 * @since      1.0.0
 *
 * @package    Rocksite_Blocks_Library
 * @subpackage Rocksite_Blocks_Library/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rocksite_Blocks_Library
 * @subpackage Rocksite_Blocks_Library/admin
 * @author     Piotr Bielecki <netbiel@gmail.com>
 */
class Rocksite_Blocks_Library_Admin {


	/**
	 * Current Theme Variable
	 */


	public $current_theme;

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
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$theme               = wp_get_theme();
		$this->current_theme = $theme->get( 'Name' );

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rocksite_Blocks_Library_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rocksite_Blocks_Library_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		if ( ! defined( 'BLOCKFOLD_ClOUD_KEY' ) ) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/rocksite-blocks-library-admin.css', array(), $this->version, 'all' );
		}


	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rocksite_Blocks_Library_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rocksite_Blocks_Library_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rocksite-blocks-library-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Redirects the user after plugin activation.
	 */

	function activation_redirect() {

		// Make sure it's the correct user
		if ( intval( get_option( 'rocksite_blocks_library_activation_redirect', false ) ) === wp_get_current_user()->ID ) {
			// Make sure we don't redirect again after this one
			delete_option( 'rocksite_blocks_library_activation_redirect' );

			if ( defined( 'BLOCKFOLD_ClOUD_KEY' ) || $this->current_theme == 'Blockfold' ) {

				wp_safe_redirect( admin_url( '/themes.php?page=one-click-demo-import' ) );

			} else {

				wp_safe_redirect( admin_url( '/themes.php?page=rocksite-kit' ) );

			}

			exit;
		}
	}








	/**
	 * Setup Child Theme Cloud Library
	 *
	 * @param array $libraries the cloud libraries.
	 *
	 * @return array
	 */
	/**
	 * Setup Child Theme Cloud Library
	 *
	 * @param array $libraries the cloud libraries.
	 *
	 * @return array
	 */
	function add_cloud_library( $libraries ) {

		if ( defined( 'BLOCKFOLD_ClOUD_KEY' ) ) {


			$libraries[] = array(
				'slug'  => 'blockfold',
				'title' => 'Rocksite Kit',
				'key'   => BLOCKFOLD_ClOUD_KEY,
				'url'   => 'https://cloud.rocksite.pro',
			);

		} else {

			$libraries[] = array(
				'slug'  => 'blockfold',
				'title' => 'Rocksite Kit',
				'key'   => 'mfbtTDCFomv4',
				'url'   => 'https://cloud.rocksite.pro',
			);
		}

		return $libraries;
	}

	/**
	 * Add Options Pages
	 *
	 */


	public function rocksite_sections_add_plugin_page() {
		add_theme_page(
			'Rocksite Kit', // page_title
			'Rocksite Kit', // menu_title
			'manage_options', // capability
			'rocksite-kit', // menu_slug
			array( $this, 'rocksite_sections_create_admin_page' ) // function
		);
	}

	public function rocksite_sections_create_admin_page() {

		if ( defined( 'KADENCE_BLOCKS_VERSION' ) ) {


			?>
            <div class="wrap">
                <div class="rocksite-page-wrapper">


                    <div style="padding:20px 0">
                        <h4 style="font-size: 30px; line-height: 1.2;margin-top:0"><?php _e( 'Thanks for choosing Rocksite Kit!', 'rocksite-sections' ) ?></h4>

                           <div class="postbox">
                        <div class="postbox-header">
                        <h2><span style="padding:10px"><?php _e( 'How to use? ', 'rocksite-sections' ) ?></span></h2>
                        </div>
                                 <div class="inside">
                                     <h4>1) Click on the Design Library button above the editor</h4>
                                     <h4>2) Click on the section of your choice</h4>
                                     <h4>3) Make the necessary changes</h4>
                        <img src="<?php echo plugin_dir_url( __DIR__ ) . 'public/img/how-to-use-library.jpg'; ?>"
                             alt="How to use plugin" style="margin: 30px auto; max-width: 100%">


                        <p><a class="button button-primary"
                              href="<?php echo admin_url( '/post-new.php?post_type=page' ) ?>"><?php echo esc_html__( 'Create New Page', 'rocksite-sections' ) ?> </a>
                        </p>
                                 </div>
                           </div>
                    </div>



                    <div class="postbox">
                        <div class="postbox-header">
                            <h2 class="hndle"><span style="padding:10px">Rocksite Kit - Settings</span></h2>
                        </div>
                   <div class="inside">
					<?php settings_errors(); ?>

                    <form method="post" class="initial-form" action="options.php">
						<?php
						settings_fields( 'rocksite_sections_option_group' );
						do_settings_sections( 'rocksite-sections-admin' );
						submit_button();
						?>
                    </form>
                   </div>
                    </div>
                </div>

            </div>
			<?php

		} else {

			?>
            <div class="wrap">
                <div class="rocksite-page-wrapper">
                    <p><?php _e( 'Rocksite Kit are based on Kadence Blocks. You have to install <strong>Kadence
                            Blocks</strong> for full Functionality', 'rocksite-sections' ) ?> </p>

                    <p><?php _e( 'To take advantage of the full functionality also install the <strong>Kadence Theme</strong>', 'rocksite-sections' ) ?></p>
                    <p><a class="button button-primary"
                          href="<?php echo admin_url( '/themes.php?page=tgmpa-install-plugins&plugin_status=activate' ) ?>"><?php echo esc_html__( 'Install Kadence Blocks', 'rocksite-sections' ) ?> </a>
                    </p>
                </div>
            </div>
			<?php
		}

	}

	public function rocksite_sections_page_init() {
		register_setting(
			'rocksite_sections_option_group', // option_group
			'rocksite_kit_css', // option_name
			array( $this, 'rocksite_sections_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'rocksite_sections_setting_section', // id
			'Settings', // title
			array( $this, 'rocksite_sections_section_info' ), // callback
			'rocksite-sections-admin' // page
		);

		add_settings_field(
			'css_code_0', // id
			'CSS Code', // title
			array( $this, 'css_code_0_callback' ), // callback
			'rocksite-sections-admin', // page
			'rocksite_sections_setting_section' // section
		);
	}



	public function rocksite_sections_section_info() {

	}

	public function css_code_0_callback() {

		$rocksite_sections_options = get_option( 'rocksite_kit_css' );
		printf(
			'<textarea class="large-text" rows="5" name="rocksite_kit_css[css_code_0]" id="css_code_0">%s</textarea>',
			isset( $rocksite_sections_options['css_code_0'] ) ? esc_attr( $rocksite_sections_options['css_code_0'] ) : ''
		);
	}


}
