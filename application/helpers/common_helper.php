<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 7 or newer
 *
 * @author	Zita Yevloyeva
 * @filesource
 */

if (!function_exists('get_system_settings')) {
    function get_system_settings($key = '')
    {
        $CI    = &get_instance();

        $CI->db->where('key', $key);
        $result = $CI->db->get('system_settings')->row('value');
        return $result;
    }
}

if (!function_exists('get_website_settings')) {
    function get_website_settings($key = '')
    {
        $CI    = &get_instance();

        $CI->db->where('key', $key);
        $result = $CI->db->get('website_settings')->row()->value;
        return $result;
    }
}

if (!function_exists('get_delivery_settings')) {
    function get_delivery_settings($key = '')
    {
        $CI    = &get_instance();

        $CI->db->where('key', $key);
        $result = $CI->db->get('delivery_settings')->row('value');
        return $result;
    }
}

if (!function_exists('get_smtp_settings')) {
    function get_smtp_settings($key = '')
    {
        $CI    = &get_instance();

        $CI->db->where('key', $key);
        $result = $CI->db->get('smtp_settings')->row('value');
        return $result;
    }
}

if (!function_exists('get_payment_settings')) {
    function get_payment_settings($key = '')
    {
        $CI    = &get_instance();
        $CI->db->where('key', $key);
        $result = $CI->db->get('payment_settings')->row()->value;
        return $result;
    }
}

if (!function_exists('currency')) {
    function currency($price = "")
    {
        $CI    = &get_instance();

        $CI->db->where('key', 'system_currency');
        $currency_code = $CI->db->get('system_settings')->row()->value;

        $CI->db->where('code', $currency_code);
        $symbol = $CI->db->get('currencies')->row()->symbol;

        $CI->db->where('key', 'currency_position');
        $position = $CI->db->get('system_settings')->row()->value;

        if ($position == 'right') {
            return $price . $symbol;
        } elseif ($position == 'right-space') {
            return $price . ' ' . $symbol;
        } elseif ($position == 'left') {
            return $symbol . $price;
        } elseif ($position == 'left-space') {
            return $symbol . ' ' . $price;
        }
    }
}

if (!function_exists('currency_code_and_symbol')) {
    function currency_code_and_symbol($type = "")
    {
        $CI    = &get_instance();

        $CI->db->where('key', 'system_currency');
        $currency_code = $CI->db->get('system_settings')->row()->value;

        $CI->db->where('code', $currency_code);
        $symbol = $CI->db->get('currencies')->row()->symbol;
        if ($type == "") {
            return $symbol;
        } else {
            return $currency_code;
        }
    }
}

if (!function_exists('ellipsis')) {
    function ellipsis($long_string, $max_character = 30)
    {
        $short_string = strlen($long_string) > $max_character ? substr($long_string, 0, $max_character) . "..." : $long_string;
        return $short_string;
    }
}

if (!function_exists('trimmer')) {
    function trimmer($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text))
            return 'n-a';
        return $text;
    }
}

// RANDOM NUMBER GENERATOR FOR ELSEWHERE
if (!function_exists('random')) {
    function random($length_of_string)
    {
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shufle the $str_result and returns substring
        // of specified length
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }
}

// RETURN AN EMPTY GRAPHICS IF DATA IS EMPTY
if (!function_exists('isEmpty')) {
    function isEmpty()
    {
        return include './application/views/backend/partials/empty.php';
    }
}

// FRONTEND VIEW LOADER WITH THEME
if (!function_exists('frontend')) {
    function frontend($view)
    {
        if ($view) {
            $view_path = "frontend/$view";
            return $view_path;
        }
    }
}
// ------------------------------------------------------------------------
/* End of file common_helper.php */
/* Location: ./system/helpers/common.php */
