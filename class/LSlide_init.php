<?php
class Initialise_LSlide
{
    public function __construct()
    {
        add_action('admin_init', array($this, 'save_settings'));
        // add_action('admin_init', array($this, 'register_settings'));
    }

    public static function install()
    {
        global $wpdb;

        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}LSlide_Config (LSlide_id INT AUTO_INCREMENT PRIMARY KEY, LSlide_Name varchar(255) NOT NULL, LSlide_Settings varchar(255) NOT NULL);");
    }

    public static function uninstall()
    {
        global $wpdb;

        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}LSlide_Config;");
    }

    public function save_settings()
    {

	}
}
