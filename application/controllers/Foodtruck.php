<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : BookingFoodTrucks
 * Date : 12 - June - 2020
 * Author : TheDevs
 * Food Truck Controller Handles All The Functionalities Regarding to Foodtruck
 */

include 'Authorization.php';

class FoodTruck extends Authorization
{
    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
        authorization(['admin', 'owner'], true);
    }

    function index()
    {
        $page_data['page_name']   = 'foodtruck/index';
        $page_data['page_title']  = get_phrase("foodtruck");
        $page_data['foodtruck_status'] = 1;
        $page_data['foodtrucks'] = $this->foodtruck_model->get_all_approved();
        $this->load->view('backend/index', $page_data);
    }

    function pending()
    {
        $page_data['page_name'] = 'foodtruck/index';
        $page_data['page_title'] = get_phrase("foodtruck");
        $page_data['foodtruck_status'] = 0;
        $page_data['foodtrucks'] = $this->foodtruck_model->get_all_pending();
        $this->load->view('backend/index', $page_data);
    }

    function create()
    {
        $page_data['page_name'] = 'foodtruck/create';
        $page_data['page_title'] = get_phrase("create_a_foodtruck");
        $page_data['cuisines'] = $this->cuisine_model->get_all();
        $this->load->view('backend/index', $page_data);
    }

    function store()
    {
        $return_id = $this->foodtruck_model->store();
        if ($return_id) {
            success(get_phrase('foodtruck_added_successfully'), site_url('foodtruck/edit/' . $return_id . '/basic'));
        }
    }


    function edit($id, $active_tab = 'basic')
    {
        /** CHECK IF THE USER HAS ACCESS TO SEE THIS **/
        if (!has_access('foodtrucks', $id)) {
            error(get_phrase('you_are_not_authorized_for_this_action'), site_url('foodtruck'));
        }
        $page_data['id'] = $id;
        $page_data['foodtruck_data'] = $this->foodtruck_model->get_by_id($id);
        $foodtruck_name = $page_data['foodtruck_data']['name'];
        $page_data['cuisines'] = $this->cuisine_model->get_all();
        $page_data['active_tab'] = $active_tab;
        $page_data['page_name'] = 'foodtruck/edit';
        $page_data['page_title'] = get_phrase("update") . ' ' . $foodtruck_name;
        $this->load->view('backend/index', $page_data);
    }

    function delete($id)
    {
        /** CHECK IF THE USER HAS ACCESS TO SEE THIS **/
        if (!has_access('foodtrucks', $id)) {
            error(get_phrase('you_are_not_authorized_for_this_action'), site_url('foodtruck'));
        }

        $response = $this->foodtruck_model->delete($id);
        if ($response) {
            success(get_phrase("foodtruck_deleted_successfully"), site_url('foodtruck'));
        } else {
            error(get_phrase("an_error_occured"), site_url('foodtruck'));
        }
    }

    function update_status($id)
    {
        authorization(['admin'], true);
        $response = $this->foodtruck_model->update_status($id);
        if ($response) {
            success(
                get_phrase("foodtruck_updated_successfully"),
                site_url('foodtruck')
            );
        } else {
            error(get_phrase("an_error_occured"), site_url('foodtruck'));
        }
    }

    function update($section)
    {
        $id = required(sanitize($this->input->post('id')));

        /** CHECK IF THE USER HAS ACCESS TO SEE THIS **/
        if (!has_access('foodtrucks', $id)) {
            error(get_phrase('you_are_not_authorized_for_this_action'), site_url('foodtruck'));
        }

        $response = $this->foodtruck_model->update($section);
        if ($response) {
            success(get_phrase("foodtruck_updated_successfully"), site_url("foodtruck/edit/$id/$section"));
        } else {
            error(get_phrase("an_error_occured"), site_url("foodtruck/edit/$id/$section"));
        }
    }
}
