<?php
/**
 * Plugin Name: Techscape Elementor Custom Widgets
 * Description: Custom Widgets For Elementor.
 * Version: 1.0
 * Author: Shams Tabraiz
 */

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

// Load Widgets
function register_custom_widget($widgets_manager)
{

    require_once __DIR__ . '/widgets/pricing_custom_widget.php';

    $widgets_manager->register(new \Elementor\Techscape_Pricing_One_Widget());
}

add_action('elementor/widgets/register', 'register_custom_widget');
