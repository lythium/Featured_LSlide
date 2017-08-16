<?php
/*
Plugin Name: Lyth Slide Featured
Plugin URI:
Description: Easy to use WordPress slide plugin for featured post with thumbnail and nice Breaking animation.
Version: 0.1
Author: Lythium
Author URI: https://www.lythium.fr
License:
*/

class LSlide_Plugin
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_admin_menu'));

        include_once plugin_dir_path(__FILE__).'class/LSlide_init.php';
        new Initialise_LSlide();

        include_once plugin_dir_path(__FILE__).'class/LSlide_shortcode.php';
        new Shortcode_LSlide();

        include_once plugin_dir_path(__FILE__).'class/LSlide_core.php';
        new Core_LSlide();

        add_action('wp_enqueue_scripts', array( __CLASS__, 'enqueue_LSlide_styles' ));
        add_action('wp_enqueue_scripts', array( __CLASS__, 'enqueue_LSlide_scripts' ));

        add_action('admin_enqueue_scripts', array( __CLASS__, 'enqueue_LSlide_styles_admin' ));
        add_action('admin_enqueue_scripts', array( __CLASS__, 'enqueue_LSlide_scripts_admin' ));

        register_activation_hook(__FILE__, array('Initialise_LSlide', 'install'));
        register_uninstall_hook(__FILE__, array('Initialise_LSlide', 'uninstall'));
    }

    public function add_admin_menu()
    {
        add_menu_page('Featured Lyth Slide Plugin', 'LSlide plugin', 'manage_options', 'LSlide', array($this, 'menu_html'));
    }

    public function menu_html()
    {
        include_once plugin_dir_path(__FILE__).'view/view_back_resume.php';
    }

    public static function enqueue_LSlide_styles()
    {
        $css_file = plugins_url('css/LSlide_style_front.min.css', __FILE__);
        wp_enqueue_style('LSlide_style_front', $css_file, false, "0.1");
    }

    public static function enqueue_LSlide_scripts()
    {
        $js_file = plugins_url('js/LSlide_slider_script.js', __FILE__);
        wp_enqueue_script('LSlide_script', $js_file, array('jquery'), false, "0.1");
    }

    public static function enqueue_LSlide_styles_admin()
    {
        $css_admin_file = plugins_url('css/LSlide_style_back.min.css', __FILE__);
        wp_enqueue_style('LSlide_style_back', $css_admin_file, false, "0.1");
    }

    public static function enqueue_LSlide_scripts_admin()
    {
        $js_admin_file = plugins_url('js/LSlide_admin_script.min.js', __FILE__);
        wp_enqueue_script('LSlide_script_admin', $js_admin_file, array('jquery'), false, "0.1");
    }
}

new LSlide_Plugin();
