<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 7 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// RETURN PRICE OF A MENU. CHECK THE PRICE HAS DISCOUNT OR NOT
// price_type DEFINES, IF USER WANTS TO FETCH THE ACTUAL PRICE. NO MATTER IT HAS A DISCOUNT OR NOT, IT WILL RETURN THE ACTUAL PRICE
if (!function_exists('get_menu_price')) {
  function get_menu_price($menu_id, $servings = "menu", $price_type = "")
  {
    $CI    = &get_instance();
    $CI->load->database();
    $menu_details = $CI->menu_model->get_by_id($menu_id);
    $price_decoder = json_decode($menu_details['price'], true);
    $discount_flag_decoder = json_decode($menu_details['has_discount'], true);
    $discounted_price_decoder = json_decode($menu_details['discounted_price'], true);
    return $discount_flag_decoder[$servings] ? (empty($price_type) ? $discounted_price_decoder[$servings] : $price_decoder[$servings]) : $price_decoder[$servings];
  }
}

// CHECK IF A MENU ITEM HAS DISCOUNT
if (!function_exists('has_discount')) {
  function has_discount($menu_id, $servings = "menu")
  {
    $CI    = &get_instance();
    $CI->load->database();
    $menu_details = $CI->menu_model->get_by_id($menu_id);
    $price_decoder = json_decode($menu_details['price'], true);
    $discount_flag_decoder = json_decode($menu_details['has_discount'], true);
    $discounted_price_decoder = json_decode($menu_details['discounted_price'], true);

    return $discount_flag_decoder[$servings];
  }
}


// GET THE DISCOUNT PERCETAGE
if (!function_exists('discount_percentage')) {
  function discount_percentage($actual_price, $discounted_price)
  {
    if ($actual_price > 0 && $discounted_price > 0) {
      $reducedPrice = $actual_price - $discounted_price;
      $discountedPercentage = ($reducedPrice / $actual_price) * 100;
      return number_format((float) $discountedPercentage, 2, '.', '');
    }

    return 0;
  }
}


if (!function_exists('is_open')) {
  function is_open($foodtruck_id = '')
  {
    $CI  = &get_instance();
    $CI->load->database();
    $foodtruck_details = $CI->db->get_where('foodtrucks', array('id' => $foodtruck_id))->row_array();

    if (empty($foodtruck_details['schedule'])) {
      return false;
    }

    $time_configurations = json_decode($foodtruck_details['schedule'], true);
    $today = strtolower(date('l'));
    $current_hour = strtotime(date('H:i:s'));

    if ($time_configurations[$today . '_opening'] == "closed") {
      return false;
    } else {
      if (strtotime($time_configurations[$today . '_opening'] . ':00:00') <= $current_hour && strtotime($time_configurations[$today . '_closing'] . ':00:00') >= $current_hour) {
        return true;
      } else {
        return false;
      }
    }
  }
}

// GET DELIVERY CHARGE OF A RESTAURANT
if (!function_exists('delivery_charge')) {
  function delivery_charge($foodtruck_id)
  {
    $CI  = &get_instance();
    $CI->load->database();
    $foodtruck_details = $CI->foodtruck_model->get_by_id($foodtruck_id);
    if ($foodtruck_details['delivery_charge'] > 0) {
      return $foodtruck_details['delivery_charge'];
    } else {
      return get_delivery_settings('free_delivery_charge') ? 0 :  get_delivery_settings('delivery_charge');
    }
  }
}

// GET MAXIMUM TIME TO DELIVER OF A RESTAURANT
if (!function_exists('maximum_time_to_deliver')) {
  function maximum_time_to_deliver($foodtruck_id)
  {
    $CI  = &get_instance();
    $CI->load->database();
    $foodtruck_details = $CI->foodtruck_model->get_by_id($foodtruck_id);
    if ($foodtruck_details['maximum_time_to_deliver'] > 0) {
      return $foodtruck_details['maximum_time_to_deliver'];
    } else {
      return get_delivery_settings('maximum_time_to_deliver');
    }
  }
}

// GET RATING FOR A RESTAURANT
if (!function_exists('get_foodtruck_rating')) {
  function get_foodtruck_rating($foodtruck_id)
  {
    $CI  = &get_instance();
    $CI->load->database();
    $reviews = $CI->db->get_where('reviews', ['foodtruck_id' => $foodtruck_id]);
    $total_ratings = 0;
    foreach ($reviews->result_array() as $review) {
      $total_ratings = $total_ratings + $review['rating'];
    }

    return $total_ratings > 0 ? number_format(($total_ratings / $reviews->num_rows()), 1) : 0;
  }
}

// ------------------------------------------------------------------------
/* End of file foodtruck_helper.php */
/* Location: ./system/helpers/foodtruck.php */
