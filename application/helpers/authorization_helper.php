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

// CHECK IF THE ITEM HAS ACCESS FOR THE USER
if (!function_exists('has_access')) {
    function has_access($table = '', $table_id = '')
    {
        $CI    = &get_instance();
        $CI->db->where('id', $table_id);
        $data = $CI->db->get($table);

        if ($data->num_rows()) {
            if ($CI->session->userdata('loggedin_type') == 'superadmin') {
                return true;
            } elseif ($CI->session->userdata('loggedin_type') == 'owner') {
                $data = $data->row_array();
                //CHECK IF COLUMN EXISTS
                if ($CI->db->field_exists('created_by', $table)) {
                    return $data['created_by'] == $CI->session->userdata('loggedin_userid') ? true : false;
                } elseif ($CI->db->field_exists('owner_id', $table)) {
                    return $data['owner_id'] == $CI->session->userdata('loggedin_userid') ? true : false;
                }
            }
        }
        return false;
    }
}

// AUTHORIZATION
if (!function_exists('authorization')) {
    function authorization($roles = null, $doRedirect = false)
    {
        $CI    = &get_instance();
        $CI->load->database();

        if (is_array($roles)) {
            $auth = in_array($CI->session->userdata('loggedin_type'), $roles) ? true : false;
        } else {
            $auth = $CI->session->userdata('loggedin') ? true : false;
        }

        if (!$auth && $doRedirect) {
            if (isset($_SERVER['HTTP_REFERER'])) {
                error('You are not authorized!', $_SERVER['HTTP_REFERER']);
            } else {
                error('You are not authorized!', site_url('dashboard'));
            }
        } else {
            return $auth;
        }
    }
}
// ------------------------------------------------------------------------
/* End of file authorization_helper.php */
/* Location: ./system/helpers/authorization_helper.php */
