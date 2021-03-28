<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : BookingFoodTrucks
 * Date : 12 - June - 2020
 * Author : TheDevs
 * Food Truck Controller Handles All The Functionalities Regarding to Foodtruck Owners' applications
 */

include 'Authorization.php';

class Applications extends Authorization
{
    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
        authorization(['admin'], true);
    }

    function index()
    {
        $page_data['page_name']   = 'application/index';
        $page_data['application_type'] = "all";
        $page_data['page_title']  = get_phrase("bookingfoodtruck_member_applicatoin");
        $page_data['applications'] = $this->application_model->get_all();
        $this->load->view('backend/index', $page_data);
    }

    function pending()
    {
        $page_data['page_name'] = 'application/index';
        $page_data['page_title'] = get_phrase("BFT_member_applicatoin");
        $page_data['application_type'] = "pending";
        $page_data['applications'] = $this->application_model->get_all_pending();
        $this->load->view('backend/index', $page_data);
    }

    // GET DETAILS OF AN APPLICATION
    public function details($parent_page, $application_code)
    {
        $page_data['application_type'] = $parent_page;
        $parent_page = ($parent_page == "all") ? "index" : $parent_page;
        if (!$this->application_model->is_valid($application_code)) {
            error(get_phrase('not_exist'), site_url('applications/' . $parent_page));
        }

        $page_data['page_name'] = 'application/details';
        $page_data['page_title'] = get_phrase("application_details");
        $page_data['application_code'] = $application_code;
        $page_data['application_data'] = $this->application_model->get_by_code($application_code);
        $this->load->view('backend/index', $page_data);
    }

    // THIS FUNCTION FOR APPLYING TO BECOME A FOOD TRUCK MEMBER
	public function apply()
	{
		$response = $this->application_model->apply();
		if($response){
			$this->session->set_flashdata('submitted_application', true);
			success(site_phrase('application_submitted_successfully'), site_url('site/become_a_member'));
		} else {
			error(site_phrase('you_already_applied'), site_url('site/become_a_member'));
		}
	}

    // ACCEPT APPLICATION AFTER REVIEW
    function accept()
    {
        $this->application_model->accept();
        $default_pwd = $this->application_model->register_foodtruck_memeber();

        $this->session->set_flashdata('default_pwd', $default_pwd);

        echo json_encode(array("status" => "ok"));
    }

    // DECLINE APPLICATION
    function decline()
    {
        $this->application_model->decline();
        $this->session->set_flashdata("decline", true);
        echo json_encode(array("status" => "ok"));
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
