<?php
/*
Plugin Name: Lyth Slide Featured
Plugin URI:
Description: Un plugin d'affichage des derniers articles dans slide
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

        include_once plugin_dir_path(__FILE__).'class/LSlide_add.php';
        new Add_LSlide();

        include_once plugin_dir_path(__FILE__).'class/LSlide_shortcode.php';
        new Shortcode_LSlide();

        include_once plugin_dir_path(__FILE__).'class/LSlide_update.php';
        new Update_LSlide();

        add_action('wp_enqueue_scripts', array( __CLASS__, 'enqueue_LSlide_styles' ));
        // add_action('wp_enqueue_scripts', array( __CLASS__, 'enqueue_lSlide_scripts' ));

		add_action('admin_enqueue_scripts', array( __CLASS__, 'enqueue_LSlide_styles_admin' ));
		// add_action('admin_enqueue_scripts', array( __CLASS__, 'enqueue_lSlide_scripts_admin' ));

        register_activation_hook(__FILE__, array('Add_LSlide', 'install'));
        register_uninstall_hook(__FILE__, array('Add_LSlide', 'uninstall'));
    }

	public function add_admin_menu()
    {
        add_menu_page('Lyth Slide Plugin', 'LSlide plugin', 'manage_options', 'LSlide', array($this, 'menu_html'));
        add_submenu_page('LSlide', 'Apercu des Slides', 'Apercu des Slides', 'manage_options', 'LSlide', array($this, 'menu_html'));
    }

    public function menu_html()
    {
        include_once plugin_dir_path(__FILE__).'views/view_back_resume.php';
    }

    public static function enqueue_LSlide_styles()
    {
        $css_file = plugins_url('css/style_front.css', __FILE__);
        wp_enqueue_style('style_front', $css_file, false, "0.1");
    }

    public static function enqueue_LSlide_scripts()
    {
        $js_file = plugins_url('javascript/lcs_script.js', __FILE__);
        wp_enqueue_script('LSlide_script', $js_file, array('jquery'), false, "0.1");
    }

	public static function enqueue_LSlide_styles_admin()
	{
		$css_admin_file = plugins_url('css/style_back.css', __FILE__);
		wp_enqueue_style('style_back', $css_admin_file, false, "0.1");
	}

	public static function enqueue_LSlide_scripts_admin()
	{
		$js_admin_file = plugins_url('javascript/lcs_script_admin.js', __FILE__);
		wp_enqueue_script('LSlide_script_admin', $js_admin_file, array('jquery'), false, "0.1");
	}
}

new LSlide_Plugin();
