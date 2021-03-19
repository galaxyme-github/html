<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : BookingFoodTrucks
 * Date : 25 - July - 2020
 * Author : TheDevs
 * Cart model handles all the database queries of Cart
 */

class Cart_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "cart";
    }

    /**
     * ADDING TO CART METHOD
     */
    function add_to_cart()
    {
        $data['customer_id'] = $this->logged_in_user_id;
        $data['menu_id'] = required(sanitize($this->input->post('menuId')));
        $data['servings'] = required(sanitize($this->input->post('servings')));
        $data['quantity'] = sanitize($this->input->post('quantity')) > 0 ? sanitize($this->input->post('quantity')) : 1;
        $price = $data['quantity'] * get_menu_price($data['menu_id'], $data['servings']);
        $data['price'] = $price;

        //CHECK MENU ID VALIDITY
        $servings_unit = $data['servings'] == "menu" ? "menu" : "plate";
        $menu_details = $this->menu_model->get_menu_by_condition(['id' => $data['menu_id'], 'servings' => $servings_unit, 'availability' => 1]);

        $data['foodtruck_id'] = $menu_details[0]['foodtruck_id'];

        $previous_data = $this->db->get_where($this->table, ['customer_id' => $data['customer_id'], 'menu_id' => $data['menu_id'], 'servings' => $data['servings']]);
        if ($previous_data->num_rows() == 0 && count($menu_details) > 0) {
            $this->db->insert($this->table, $data);
        } elseif ($previous_data->num_rows() > 0 && count($menu_details) > 0) {
            $previous_data = $previous_data->row_array();
            $this->db->where('id', $previous_data['id']);
            $this->db->update($this->table, $data);
        }
    }

    /**
     * UPDATE CART ITEM METHOD
     */
    function update_cart()
    {
        $cart_id = required(sanitize($this->input->post('cartId')));
        $data['customer_id'] = $this->logged_in_user_id;
        $data['menu_id'] = required(sanitize($this->input->post('menuId')));
        $data['servings'] = required(sanitize($this->input->post('servings')));
        $data['quantity'] = sanitize($this->input->post('quantity')) > 0 ? sanitize($this->input->post('quantity')) : 1;
        $price = $data['quantity'] * get_menu_price($data['menu_id'], $data['servings']);
        $data['price'] = $price;

        //CHECK MENU ID VALIDITY
        $servings_unit = $data['servings'] == "menu" ? "menu" : "plate";
        $menu_details = $this->menu_model->get_menu_by_condition(['id' => $data['menu_id'], 'servings' => $servings_unit, 'availability' => 1]);

        $data['foodtruck_id'] = $menu_details[0]['foodtruck_id'];

        $previous_data = $this->db->get_where($this->table, ['customer_id' => $data['customer_id'], 'menu_id' => $data['menu_id'], 'servings' => $data['servings']]);
        if (count($menu_details) > 0) {
            if ($previous_data->num_rows() == 0) {

                $this->db->where('id', $cart_id);
                $this->db->update('cart', $data);
            } else {
                $previous_data = $previous_data->row_array();
                $this->db->where('id', $previous_data['id']);
                $this->db->update($this->table, $data);

                if ($previous_data['id'] != $cart_id) {
                    $this->db->where('id', $cart_id);
                    $this->db->delete($this->table);
                }
            }
        }
    }

    /**
     * RETURN THE TOTAL NUMBER OF CART ITEMS
     */
    function total_cart_items()
    {
        $data['customer_id'] = $this->logged_in_user_id;
        return $this->db->get_where($this->table, $data)->num_rows();
    }

    /**
     * RETURN ALL THE CART ITEMS
     */
    function get_all()
    {
        $data['customer_id'] = $this->logged_in_user_id;
        $obj = $this->db->get_where($this->table, $data);
        return $this->merger($obj);
    }

    /**
     * RETURN A SINGLE CART ITEM
     */
    function get_by_id($id)
    {
        $data['id'] = $id;
        $obj = $this->db->get_where($this->table, $data);
        return $this->merger($obj, true);
    }

    /**
     * RETURN RESULT ARRAY CONDITION WISE
     */
    function get_cart_by_condition($conditions = [])
    {
        foreach ($conditions as $key => $value) {
            if (!is_null($value)) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }

        $menus = $this->db->get($this->table);
        return $this->merger($menus);
    }

    /**
     * MERGER FUNCTION IS FOR MERGING NECESSARY DATA
     */
    public function merger($query_obj, $is_single_row = false)
    {
        if (!$is_single_row) {
            $cart_items = $query_obj->result_array();
            foreach ($cart_items as $key => $cart_item) {
                $menu_data = $this->menu_model->get_by_id($cart_item['menu_id']);
                $foodtruck_data = $this->foodtruck_model->get_by_id($cart_item['foodtruck_id']);
                $cart_items[$key]['menu_name']  = $menu_data['name'];
                $cart_items[$key]['menu_thumbnail']  = $menu_data['thumbnail'];
                $cart_items[$key]['foodtruck_name']  = $foodtruck_data['name'];
                $cart_items[$key]['delivery_charge']  = delivery_charge($foodtruck_data['id']);
            }
            return $cart_items;
        } else {
            $cart_item = $query_obj->row_array();
            $menu_data = $this->menu_model->get_by_id($cart_item['menu_id']);
            $foodtruck_data = $this->foodtruck_model->get_by_id($cart_item['foodtruck_id']);
            $cart_item['menu_name']  = $menu_data['name'];
            $cart_item['menu_thumbnail']  = $menu_data['thumbnail'];
            $cart_item['foodtruck_name']  = $foodtruck_data['name'];
            $cart_item['delivery_charge']  = delivery_charge($foodtruck_data['id']);
            return $cart_item;
        }
    }

    /**
     * GET THE RESTAURANT IDS ONLY. THIS FUNCTION WILL RETURN ALL THE INDIVIDUAL RESTAURANT IDS OF THE CART ITEMS
     */
    public function get_foodtruck_ids()
    {
        $foodtruck_ids = array();
        $cart_items = $this->get_all();
        foreach ($cart_items as $cart_item) {
            if (!in_array($cart_item['foodtruck_id'], $foodtruck_ids)) {
                array_push($foodtruck_ids, $cart_item['foodtruck_id']);
            }
        }
        return $foodtruck_ids;
    }

    /**
     * GET SMALLER DATA FOR CART PAGE : TOTAL MENU PRICE
     */
    public function get_total_menu_price()
    {
        $total_price = 0;
        $cart_details = $this->get_all();
        foreach ($cart_details as $cart_detail) {
            $total_price = $total_price + $cart_detail['price'];
        }
        return $total_price;
    }

    /**
     * GET SMALLER DATA FOR CART PAGE : TOTAL DELIVERY CHARGE FOR MULTIPLE RESTAURANTS
     */
    public function get_total_delivery_charge()
    {
        $total_delivery_charge = 0;
        $foodtruck_ids = $this->get_foodtruck_ids();
        foreach ($foodtruck_ids as $foodtruck_id) {
            $delivery_charge = delivery_charge($foodtruck_id) > 0 ? delivery_charge($foodtruck_id) : 0;
            $total_delivery_charge = $total_delivery_charge + $delivery_charge;
        }
        return $total_delivery_charge;
    }

    /**
     * GET SMALLER DATA FOR CART PAGE : TOTAL SUB TOTAL
     */
    public function get_sub_total()
    {
        $sub_total = 0;
        $total_menu_price = $this->get_total_menu_price();
        $total_vat_amount = $this->get_vat_amount();
        $sub_total = $total_vat_amount + $total_menu_price;
        return $sub_total;
    }

    /**
     * GET SMALLER DATA FOR CART PAGE : VAT
     */
    public function get_vat_amount()
    {
        $total_vat = 0;
        $total_menu_price = $this->get_total_menu_price();
        $vat_percentage = get_delivery_settings('vat');
        $total_vat = ($total_menu_price * $vat_percentage) / 100;
        return ceil($total_vat);
    }

    /**
     * GET SMALLER DATA FOR CART PAGE : GRAND TOTAL
     */
    public function get_grand_total()
    {
        $grand_total = 0;
        $sub_total = $this->get_sub_total();
        $total_delivery_charge = $this->get_total_delivery_charge();
        $grand_total = $sub_total + $total_delivery_charge;
        return $grand_total;
    }

    /**
     * CLEARING A CART
     */
    public function clearing_cart()
    {
        $data['customer_id'] = $this->logged_in_user_id;
        $this->db->where($data);
        return $this->db->delete($this->table);
    }


    /**
     * DASHBOARD TILE DATA USER WISE
     */
    public function get_number_of_cart_items()
    {
        $user_role = $this->session->userdata('user_role');
        if ($user_role == "customer") {
            $this->db->where('customer_id', $this->logged_in_user_id);
        }
        return $this->db->get($this->table)->num_rows();
    }
}
