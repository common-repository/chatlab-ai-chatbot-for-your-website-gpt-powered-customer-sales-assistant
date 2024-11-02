<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.wplauncher.com
 * @since      1.0.0
 *
 * @package    Chatlab_WooCommerce
 * @subpackage Chatlab_WooCommerce/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Chatlab_WooCommerce
 * @subpackage Chatlab_WooCommerce/public
 */
class ChatlabSettings_Page_Public
{

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
     * @since    1.0.0
     * @param      string $plugin_name The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Settings_Page_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The ChatlabSettings_Page_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

//        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/chatlab-settings-page-public.css', array(), $this->version, 'all');

    }

    public function chatlab_script_attributes( $tag, $handle, $src ) {
        if ( 'chatlab-settings-page' === $handle ) {
            $apiKey = get_option('chatlab_apikey');

            if (!empty($apiKey)) {
                $escKey = esc_attr($apiKey);
                $tag = '<script id="'.$escKey.'" src="' . esc_url( $src ) . '" defer></script>';
            }
        }

        return $tag;
    }
    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in ChatlabSettings_Page_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Settings_Page_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, 'https://script.chatlab.com/aichatbot.js', array(), $this->version, false);
    }

    function wpdocs_allowed_protocols() {
        return array(
            'https' => array(),
        );
    }

    function wpdocs_allowed_html() {
        return array(
            'script' => array(
                'src'	=> array(),
                'id'	=> array(),
                'defer'	=> array(),
            )
        );
    }

    function chatlab_plugin_wp_head_callback()
    {
        $apiKey = get_option('chatlab_apikey');
        if (!empty($apiKey)) {

            echo "<script>window.aichatbotApiKey=\"", esc_attr($apiKey),"\";</script>";

        }
    }

    function chatlab_plugin_custom_params()
    {
        $current_user = wp_get_current_user();
        if ($current_user instanceof WP_User && $current_user->ID && $current_user->user_email) {
            $userID = $current_user->ID;
            $userEmail = $current_user->user_email;

            echo "<script>window.chatlabEndUserId=\"", esc_attr($userID), "\"; window.chatlabEndUserEmail=\"", esc_attr($userEmail), "\";</script>";

        }

    }


}
