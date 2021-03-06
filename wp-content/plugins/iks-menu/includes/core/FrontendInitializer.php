<?php
/**
 * IksStudio Core
 *
 *
 * @package   IksStudio Core
 * @author    IksStudio
 * @license   GPL-3.0
 * @link      https://iks-studio.com
 * @copyright 2019 IksStudio
 */

namespace IksStudio\IKSM_CORE;

use IksStudio\IKSM_CORE\utils\Utils;

/**
 * @subpackage FrontendInitializer
 */
class FrontendInitializer {
	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;
	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @param $callback callable
	 *
	 * @since     1.0.0
	 */
	protected function __construct() {
		$this->do_hooks();
	}

	/**
	 * Handle WP actions and filters.
	 *
	 * @since    1.0.0
	 */
	private function do_hooks() {
		add_action( 'wp_head', array( $this, 'print_dynamic_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_scripts' ) );
	}

	/**
	 * Prints empty styles block
	 *
	 * @return    null
	 * @since     1.0.0
	 *
	 */
	public function print_dynamic_styles() {
		echo '<style type="text/css" id="' . Plugin::$slug . '-dynamic-style'  . '"></style>';
	}

	/**
	 * Enqueue public-specific style sheet.
	 *
	 * @return    null    Return early if no settings page is registered.
	 * @since     1.0.0
	 *
	 */
	public function enqueue_public_styles() {
		Utils::enqueue_style( "public" );
	}

	/**
	 * Register public-specific scripts
	 *
	 * @since     1.0.0
	 */
	public function enqueue_public_scripts() {
		Utils::enqueue_script( "public" );
		Utils::enqueue_project_public_scripts();
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return    object    A single instance of this class.
	 * @since     1.0.0
	 *
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
}
