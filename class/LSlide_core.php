<?php
class Core_LSlide
{
    function __construct()
    {
        add_action('wp_enqueue_scripts', array( __CLASS__, 'enqueue_jquery' ));
    }
    public static function enqueue_jquery()
    {
        $jquery_file = 'https://code.jquery.com/jquery-3.2.1.min.js';
        wp_enqueue_script('jquery', $jquery_file, array('jquery'), false, "0.1");
    }
    public static function substrwords($text, $maxchar, $end='...')
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
