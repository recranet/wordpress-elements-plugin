<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://recranet.com/
 * @since      1.0.0
 *
 * @package    Recranet
 * @subpackage Recranet/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Recranet
 * @subpackage Recranet/admin
 * @author     Recranet <info@recranet.com>
 */
class Recranet_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */
    public function add_plugin_admin_menu() {
        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */
        add_options_page( 'Recranet Elements', 'Recranet', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page') );
    }

     /**
      * Add settings action link to the plugins page.
      *
      * @since    1.0.0
      */
    public function add_action_links( $links ) {
       /*
        *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_google_api_key/plugin_action_links_(plugin_file_name)
        */
       $settings_link = array(
           '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
       );
       return array_merge( $settings_link, $links );

    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */
    public function display_plugin_setup_page() {
        include_once( 'partials/recranet-admin-display.php' );
    }

    /**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function recranet_general_cb() {
		echo '<p>Update global Recranet Booking Elements settings below.</p>';
	}

    /**
	 * Render the organization input for this plugin
	 *
	 * @since  1.0.0
	 */
	public function recranet_organization_cb() {
		echo '<input type="text" name="' . $this->plugin_name . '_organization" id="' . $this->plugin_name . '_organization" value="' . get_option( $this->plugin_name . '_organization' ) . '">';
    }
	
	/**
	 * Render the accommodation category input for this plugin
	 *
	 * @since  1.1.0
	 */
	public function recranet_accommodation_category_cb() {
	    echo '<input type="text" name="' . $this->plugin_name . '_accommodation_category" id="' . $this->plugin_name . '_accommodation_category" value="' . get_option( $this->plugin_name . '_accommodation_category' ) . '">';
	}
	
	/**
	 * Render the locality category input for this plugin
	 *
	 * @since  1.1.0
	 */
	public function recranet_locality_category_cb() {
	    echo '<input type="text" name="' . $this->plugin_name . '_locality_category" id="' . $this->plugin_name . '_locality_category" value="' . get_option( $this->plugin_name . '_locality_category' ) . '">';
	}
	
	/**
	 * Render the google api key input for this plugin
	 *
	 * @since  1.2.0
	 */
	public function recranet_google_api_key_cb() {
		echo '<input type="text" name="' . $this->plugin_name . '_google_api_key" id="' . $this->plugin_name . '_google_api_key" value="' . get_option( $this->plugin_name . '_google_api_key' ) . '">';
	}
	
    /**
     * Register settings
     *
     * @since    1.0.0
     */
    public function register_settings() {
		register_setting( $this->plugin_name, $this->plugin_name . '_organization', 'intval' );
		register_setting( $this->plugin_name, $this->plugin_name . '_accommodation_category', 'intval' );
		register_setting( $this->plugin_name, $this->plugin_name . '_locality_category', 'intval' );
		register_setting( $this->plugin_name, $this->plugin_name . '_google_api_key', 'string' );

        add_settings_section(
    		$this->plugin_name . '_general',
    		'Global settings',
    		array( $this, $this->plugin_name . '_general_cb' ),
    		$this->plugin_name
    	);
		
		add_settings_field(
		    $this->plugin_name . '_organization',
		    'Organization id',
		    array( $this, $this->plugin_name . '_organization_cb' ),
		    $this->plugin_name,
		    $this->plugin_name . '_general',
		    array( 'label_for' => $this->plugin_name . '_organization' )
		);

        add_settings_field(
            $this->plugin_name . '_accommodation_category',
            'Accommodation category id (optional)',
            array( $this, $this->plugin_name . '_accommodation_category_cb' ),
            $this->plugin_name,
            $this->plugin_name . '_general',
            array( 'label_for' => $this->plugin_name . '_accommodation_category' )
        );

        add_settings_field(
            $this->plugin_name . '_locality_category',
            'Locality category id (optional)',
            array( $this, $this->plugin_name . '_locality_category_cb' ),
            $this->plugin_name,
            $this->plugin_name . '_general',
            array( 'label_for' => $this->plugin_name . '_locality_category' )
        );

        add_settings_field(
            $this->plugin_name . '_google_api_key',
            'Google API key',
            array( $this, $this->plugin_name . '_google_api_key_cb' ),
            $this->plugin_name,
            $this->plugin_name . '_general',
            array( 'label_for' => $this->plugin_name . '_google_api_key' )
        );
    }
}
