<?php
class Shortcode_LSlide
{
	public function __construct()
	{
        include_once plugin_dir_path(__FILE__).'LSlide_core.php';
        new Core_LSlide();

		add_shortcode('LSlide', array($this, 'show_html'));
	}

	public function show_html($atts)
	{
        global $wpdb;
        $default = $wpdb->get_results("SELECT LSlide_id FROM {$wpdb->prefix}LSlide_Config ORDER BY LSlide_id LIMIT 1");

        $atts = shortcode_atts(array('id' => $default), $atts);
        $id_shortcode = $atts["id"];
        $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}LSlide_Config WHERE LSlide_id = '$id_shortcode'");

        if ($results) {
            foreach ($results as $key) {
                $name_LSlide = $key->LSlide_Name;
                $settings_LSlide = unserialize($key->LSlide_Settings);
                $setting_number = $settings_LSlide["number"];
                $setting_speed = $settings_LSlide["speed"];
                $args = array( 	'numberposts' => $setting_number,
                'orderby' => 'post_date',
                'post_status' => 'publish',
                'order' => 'ASC' );
                $recent_posts = wp_get_recent_posts( $args );
                $count = 0;
                if ($setting_number == 4 || $setting_number == 8) {
                    $maxcount = 1;
                } elseif ($setting_number == 3 || $setting_number == 6){
                    $maxcount = 2;
                };
                $numlist = 0;

                ob_start();
                include_once plugin_dir_path(__FILE__).'../view/view_front_slide.php';
                return ob_get_clean();
            }
        }
	}
}
