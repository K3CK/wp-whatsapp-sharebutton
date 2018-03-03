<?php

/**
 * WhatsApp Share Button for Developers
 *
 * Adds a configurable share button for WhatsApp via shortcode.
 *
 * @link              https://github.com/K3CK/wp-whatsapp-sharebutton
 * @since             1.0.0
 * @package           Whatsapp_Sharebutton
 *
 * @wordpress-plugin
 * Plugin Name:       WhatsApp Share Button
 * Plugin URI:        https://github.com/K3CK/wp-whatsapp-sharebutton
 * Description:       Adds a simple WhatsApp share button via shortcode.
 * Version:           1.0.0
 * Author:            Martin Keck
 * Author URI:        https://www.martinkeck.com
 * License:           GPLv3
 * Text Domain:       whatsapp-sharebutton
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * WP-Sweep version
 *
 * @since 1.0.0
 */
define( 'WHATSAPP_SHAREBUTTON_VERSION', '1.0.0' );

/**
 * WP-Sweep class
 *
 * @since 1.0.0
 */
class Whatsapp_Sharebutton {

	/**
	 * Static instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @var $instance
	 */
	private static $instance;

	/**
	 * Constructor method
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		// Add Plugin Hooks
		add_action( 'plugins_loaded', array( $this, 'add_hooks' ) );

		// Add Shortcodes
		add_action( 'plugins_loaded', array( $this, 'add_shortcodes') );

		// Load Translation
		load_plugin_textdomain( 'whatsapp-sharebutton' );

		// Plugin Activation/Deactivation
		register_activation_hook( __FILE__, array( $this, 'plugin_activation' ) );
		register_deactivation_hook( __FILE__, array( $this, 'plugin_deactivation' ) );
	}

	/**
	 * Initializes the plugin object and returns its instance
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @return object The plugin object instance
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Adds all the plugin hooks
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @return void
	 */
	public function add_hooks() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
	}

	/**
	 * Adds all the plugin shortcodes
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @return void
	 */
	public function add_shortcodes() {
		add_shortcode( 'whatsapp-sharebutton', array( $this, 'whatsapp_sharebutton' ) );
	}

	/**
	 * Add share button
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @return string
	 */
	public function whatsapp_sharebutton( $atts ) {
		$atts = shortcode_atts(
			array(
				'button_label' => '',
				'target_url' => get_permalink(),
				'message_text' => get_the_title(),
				'message_link_separator' => ': ',
				'wrapper_class' => 'whatsapp_sharebutton_wrap',
				'button_class' => 'whatsapp_sharebutton',
			),
			$atts
		);
		$button = '<div class="' . $atts['wrapper_class'] . '">';
		$button .= '<a href="whatsapp://send?text='.$atts['message_text'] . $atts['message_link_separator'] . $atts['target_url'].'" class="' . $atts['button_class'] . '" title="' . $atts['button_label'] . '">' . $atts['button_label'] . '</a>';
		$button .= '</div>';
		return $button;
	}

	/**
	 * Enqueue CSS files
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @return void
	 */
	public function enqueue_styles( ) {
		wp_enqueue_style( 'whatsapp_sharebutton_style', plugin_dir_url( __FILE__ ) . 'styles.css', array(), WHATSAPP_SHAREBUTTON_VERSION, 'all' );
	}

	/**
	 * Admin menu
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @return void
	 */
	public function admin_menu() {
//		add_management_page( __( 'Sweep', 'wp-sweep' ), __( 'Sweep', 'wp-sweep' ), 'manage_options', 'wp-sweep/admin.php' );
	}



	/**
	 * What to do when the plugin is being deactivated
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @return void
	 */
	public function plugin_activation() {

	}


	/**
	 * What to do when the plugin is being activated
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @return void
	 */
	public function plugin_deactivation() {

	}
}

/**
 * Init Whatsapp_Sharebutton
 */
Whatsapp_Sharebutton::get_instance();