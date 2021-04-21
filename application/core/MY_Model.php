<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * @productname : BookingFoodTrucks
 * @filename : MY_Model.php
 * @author : Zita Yevloyeva
 * @created : 9th Apr 2021
 */

class MY_Model extends CI_Model {

    protected $table = NULL;
    protected $loggedin_user_id;
    protected $loggedin_user_role;

    function __construct() {
        parent::__construct();
        $this->loggedin_user_id = get_loggedin_user_id();
        $this->loggedin_user_role = get_loggedin_user_role();
    }

    public function hash($password) {
        return hash("sha512", $password . config_item("encryption_key"));
    }

    /**
     * common delete method by id
     */
    function delete($id)
    {
        $this->db->delete($this->table, array('id' => $id));
        return true;
    }

    /**
     * common file upload method
     */
    function upload($thing, $new_file, $previous_file = NULL)
    {
        // remove the previous file first
        if (!empty($previous_file) && $previous_file != "placeholder.png") {
            if (file_exists("uploads/$thing/$previous_file")) {
                unlink("uploads/$thing/$previous_file");
            }
        }
        //upload new file
        if (!empty($new_file['tmp_name'])) {
            $file_name = random(20) . '.jpg';
            $uploaded_image = "uploads/$thing/" . $file_name;
            return move_uploaded_file($new_file['tmp_name'], $uploaded_image) ? $file_name : "placeholder.png";
        }

        return "placeholder.png";
    }

    /**
     * common pagination function
     */
    public function paginate($per_page, $page_number, $conditions = [], $order_by = "id", $order = "desc")
    {
        // The loop checks if given condition has any empty array.
        // If is is empty, will return empty array
        foreach ($conditions as $key => $value) {
            if (is_array($value)) {
                if (count($value) == 0) {
                    $conditions[$key] = "-1"; // Given value which is not available anywhere
                }
            }
        }

        foreach ($conditions as $key => $value) {
            if (!is_null($value)) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }

        $offset = $page_number > 0 ? ($page_number - 1) * $per_page : 0;
        $this->db->order_by($order_by, $order);
        return $this->db->get($this->table, $per_page, $offset);
    }

    /**
     * special sort pagination
     */
    public function special_sort_paginate($per_page, $page_number, $conditions = [], $order_by = "id", $order = "desc")
    {
        foreach ($conditions as $key => $value) {
            if (is_array($value)) {
                if (count($value) == 0) {
                    $conditions[$key] = "-1";
                }
            }
        }

        $where = " where id ";
        foreach ($conditions as $key => $value) {
            if (!is_null($value)) {
                if (is_array($value)) {
                    $search_values = implode(', ', $value);
                    $where .= "in ($search_values) order by field(id, $search_values)";
                } else {
                    $where .= "= $value";
                }
            }
        }

        $offset = $page_number > 0 ? ($page_number - 1) * $per_page : 0;
        $sql = "select * from ".$this->table.$where." limit $per_page offset $offset";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
}