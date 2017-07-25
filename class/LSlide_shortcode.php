<?php
class Shortcode_LSlide
{
	public function __construct()
	{
		add_shortcode('category_show', array($this, 'show_html'));
	}

	public function show_html($atts)
	{

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
