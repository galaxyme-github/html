<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends Authorization_Controller
{
    public function __construct()
    {
        parent::__construct();
        authorization(['superadmin'], true);
    }

    function index()
    {
        $page_data['page_name']   = 'member/index';
        $page_data['application_type'] = "all";
        $page_data['page_title']  = 'BFT Member Application Control';
        $page_data['applications'] = $this->member_model->get_all_application_list();
        $this->load->view('backend/index', $page_data);
    }

    function processed_applications() {
        $page_data['page_name']   = 'member_application/index';
        $page_data['application_type'] = "processed";
        $page_data['page_title']  = 'BFT Member Application Control (Processed)';
        $page_data['applications'] = $this->member_model->get_processed_applications();
        $this->load->view('backend/index', $page_data);
    }

    function pending_applications()
    {
        $page_data['page_name'] = 'member_application/index';
        $page_data['page_title'] = 'BFT Member Application Control (Pending)';
        $page_data['application_type'] = "pending";
        $page_data['applications'] = $this->member_model->get_pending_applications();
        $this->load->view('backend/index', $page_data);
    }

    // GET DETAILS OF AN APPLICATION
    public function application_details($status, $application_code)
    {
        $page_data['application_type'] = $status;
        $parent_page = $status;
        if (!$this->member_model->is_valid_code($application_code)) {
            error('The Application Code is not invalid.', site_url('bft-member/' . $status . '-applications'));
        }

        $page_data['page_name'] = 'member_application/details';
        $page_data['page_title'] ='BFT Member Application Control';
        $page_data['application_code'] = $application_code;
        $page_data['application_data'] = $this->member_model->get_by_code($application_code);
        $this->load->view('backend/index', $page_data);
    }

    // ACCEPT APPLICATION AFTER REVIEW
    function accept()
    {
        $this->member_model->accept();
        $response = $this->member_model->register_bft_memeber();
        if ($response) {
            $this->session->set_flashdata('default_pwd', $response);
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    // DECLINE APPLICATION
    function decline()
    {
        $this->member_model->decline();
        $this->session->set_flashdata("decline", true);
        echo json_encode(array("status" => true));
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
