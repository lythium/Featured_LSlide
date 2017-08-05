<?php
class Shortcode_LSlide
{
	public function __construct()
	{
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
                $settings_LSlide = $key->LSlide_Settings;
                ob_start();
                include_once plugin_dir_path(__FILE__).'../view/view_front_slide.php';
                return ob_get_clean();
            }
        }
	}
    public function substrwords($text, $maxchar, $end='...')
    {
        // Cut string function
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);
            $output = '';
            $i      = 0;
            while (1) {
                $length = strlen($output)+strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                } else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        } else {
            $output = $text;
        }
        return $output;
    }
}
