<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.wplauncher.com
 * @since      1.0.0
 *
 * @package    Chatlab_WooCommerce
 * @subpackage Chatlab_WooCommerce/admin/partials
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$apiKey = get_option('chatlab_apikey');

if (!empty($apiKey)) {
    $escKey = esc_attr($apiKey);


    $allowed_html = array(
        'iframe' => array(
            'id' => array(),
            'src' => array(),
            'width' => array(),
            'height' => array(),
        )
    );

    echo '<p>This is the preview of your chatbot. You can configure the chatbot settings in the ChatLab administration panel <a href="https://app.chatlab.com" target="_blank">here</a>. If the chatbot is not displayed, please verify that the correct API key has been provided for the chatbot created on the ChatLab.com service.</p>';
    $iframeUrl = "https://api.chatlab.com/aichat/iframe?apiKey=$escKey&aichatbotProviderId=f9e9c5e4-6d1a-4b8c-8d3f-3f9e9c5e46d1&adminMode=true&iFrameMode=true";

    $str = "                     <iframe
                            id=\"raChatTesterIFrame\"
                            src=\"$iframeUrl\" width=\"50%\" height=\"400px\"></iframe>";
    echo wp_kses($str, $allowed_html);

}
?>
