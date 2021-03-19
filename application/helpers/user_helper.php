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

// THIS HELPER METHOD RETURN THE USER ROLE
if (!function_exists('get_user_role')) {
	function get_user_role($type = "", $user_id = '')
	{
		$CI	= &get_instance();
		$CI->load->database();

		$role_id	=	$CI->db->get_where('users', array('id' => $user_id))->row()->role_id;
		$user_role	=	$CI->db->get_where('role', array('id' => $role_id))->row()->type;

		if ($type == "user_role") {
			return $user_role;
		} else {
			return $role_id;
		}
	}
}

// THIS HELPER METHOD CHECKS IF THE EMAIL IS VALID OR NOT. IT BASICALLY CHECKES THE DUPLICATION
if (!function_exists('email_duplication')) {
	function email_duplication($email = "", $user_id = "")
	{
		$CI	= &get_instance();
		$CI->load->database();

		$query = $CI->db->get_where('users', ['email' => $email]);
		if (!empty($user_id)) {
			$query_result = $query->row_array();
			if ($query->num_rows() == 0 || $query_result['id'] == $user_id) {
				return true;
			} else {
				$CI->session->set_flashdata('error_message', get_phrase('duplicate_email'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		} else {
			if ($query->num_rows() > 0) {
				$CI->session->set_flashdata('error_message', get_phrase('duplicate_email'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			} else {
				return true;
			}
		}
	}
}

// THIS HELPER METHOD CHECKS IF THE USER IS A FOODTRUCK OWNER OR NOT
if (!function_exists('is_foodtruck_owner')) {
	function is_foodtruck_owner($user_id = "")
	{
		$CI	= &get_instance();
		$CI->load->database();

		if (empty($user_id)) {
			$user_id = $CI->session->userdata('user_id');
		}
		$user_data = $CI->db->get_where('users', array('id' => $user_id))->row_array();

		$owner_role = $CI->db->get_where('role', ['type' => 'owner'])->row_array();
		if (count($user_data) > 0) {
			return ($user_data['role_id'] == $owner_role['id']) ? true : false;
		}

		return false;
	}
}

// THIS HELPER METHOD MAKE USERNAME TO DISPLAY NAVBAR AND PROFILE BAR FROM EMAIL AND FULL NAME
if (!function_exists('make_username')) {
	function make_username($user_id = "")
	{
		$CI	= &get_instance();
		$CI->load->database();

		if (empty($user_id)) {
			$user_id = $CI->session->userdata('user_id');
		}
		$user_data = $CI->db->get_where('users', array('id' => $user_id))->row_array();

		$full_name = $user_data['name'];
		$email = $user_data['email'];

		if (!empty($full_name)) {
			$username = explode(' ', $full_name)[0];
	
		} else {
			$username = '@'.explode('@', $email)[0];
		}

		return $username;
	}
}


// THIS HELPER METHOD CHECKS IF THE USER HAS ANY FOODTRUCK OWNED
if (!function_exists('has_foodtruck')) {
	function has_foodtruck($user_id = "")
	{
		$CI	= &get_instance();
		$CI->load->database();

		if (empty($user_id)) {
			$user_id = $CI->session->userdata('user_id');
		}
		$query = $CI->db->get_where('foodtrucks', array('owner_id' => $user_id))->num_rows();
		if ($query > 0) {
			return true;
		}

		return false;
	}
}

// ------------------------------------------------------------------------
/* End of file user_helper.php */
/* Location: ./system/helpers/user_helper.php */
