<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://recranet.com/
 * @since      1.0.0
 *
 * @package    Recranet
 * @subpackage Recranet/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Recranet
 * @subpackage Recranet/public
 * @author     Recranet <info@recranet.com>
 */
class Recranet_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

    /**
     * Register shortcodes
     *
     * @since    1.0.0
     */
    public function register_shortcodes() {
        add_shortcode( 'recranet_accommodations', array($this, 'recranet_accommodations') );
        add_shortcode( 'recranet_packages', array($this, 'recranet_packages') );
        add_shortcode( 'recranet_search_bar', array($this, 'recranet_search_bar') );
		add_shortcode( 'recranet_featured_accommodations', array($this, 'recranet_featured_accommodations') );
		add_shortcode( 'recranet_featured_reviews_summary', array($this, 'recranet_featured_reviews_summary') );
		add_shortcode( 'recranet_featured_reviews', array($this, 'recranet_featured_reviews') );
    }

    /**
     * Register base tag and remove redirects
     *
     * @since    1.0.3
     */
    function register_base_tag() {
        global $post;

        // Add base tag to head for html5 mode
        if ( is_a( $post, 'WP_Post' ) ) {
            echo '<base href="' . get_permalink() . '" />';
        }
    }

    /**
     * Recranet accommodations
     *
     * @since    1.0.0
     */
    function recranet_accommodations( $atts ) {
        ob_start();
        include_once( 'partials/recranet-accommodations.php' );
        return ob_get_clean();
    }

    /**
     * Recranet packages
     *
     * @since    1.0.0
     */
    function recranet_packages( $atts ) {
        ob_start();
	    include_once( 'partials/recranet-packages.php' );
        return ob_get_clean();
    }

    /**
     * Recranet search form
     *
     * @since    1.2.0
     */
    function recranet_search_bar( $atts ) {
        ob_start();
	    include_once( 'partials/recranet-search-bar.php' );
        return ob_get_clean();
    }

	/**
	 * Recranet featured accommodations
	 *
	 * @since    1.3.0
	 */
	function recranet_featured_accommodations( $atts ) {
		ob_start();
		include_once( 'partials/recranet-featured-accommodations.php' );
		return ob_get_clean();
	}

	/**
	 * Recranet reviews summary
	 *
	 * @since    1.3.0
	 */
	function recranet_featured_reviews_summary( $atts ) {
		ob_start();
		include_once( 'partials/recranet-featured-reviews-summary.php' );
		return ob_get_clean();
	}

	/**
	 * Recranet reviews
	 *
	 * @since    1.3.0
	 */
	function recranet_featured_reviews( $atts ) {
		ob_start();
		include_once( 'partials/recranet-featured-reviews.php' );
		return ob_get_clean();
	}
}
