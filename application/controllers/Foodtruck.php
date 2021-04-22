<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FoodTruck extends Authorization_Controller
{
    public function __construct()
    {
        parent::__construct();
        authorization(['superadmin', 'owner'], true);
    }

    function index()
    {
        $page_data['page_name']   = 'foodtruck/index';
        $page_data['foodtruck_type'] = 'approved';
        $page_data['foodtruck_status'] = 1;
        $page_data['foodtrucks'] = $this->foodtruck_model->get_all_approved();
        $this->load->view('backend/index', $page_data);
    }

    function pending()
    {
        $page_data['page_name'] = 'foodtruck/index';
        $page_data['page_title'] = get_phrase("foodtruck");
        $page_data['foodtruck_type'] = 'pending';
        $page_data['foodtruck_status'] = 0;
        $page_data['foodtrucks'] = $this->foodtruck_model->get_all_pending();
        $this->load->view('backend/index', $page_data);
    }

    function all()
    {
        $page_data['page_name']   = 'foodtruck/index';
        $page_data['foodtrucks'] = $this->foodtruck_model->get_all();
        $this->load->view('backend/index', $page_data);
    }

    function add()
    {
        $page_data['page_name'] = 'foodtruck/add';
        $page_data['page_title'] = 'Food Truck';
        $this->load->view('backend/index', $page_data);
    }

    function store()
    {
        $return_id = $this->foodtruck_model->store();
        if ($return_id) {
            success('Foodtruck has been added successfuly.', site_url('foodtruck/edit/' . $return_id . '/gallery'));
        }
    }


    function edit($id, $active_tab = 'basic')
    {
        $page_data['foodtruck_data'] = $this->foodtruck_model->get_by_id($id);
        $foodtruck_name = $page_data['foodtruck_data']->name;
        $page_data['active_tab'] = $active_tab;
        $page_data['page_name'] = 'foodtruck/edit';
        $page_data['page_title'] = 'Edit ' . $foodtruck_name;
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

    function update_schedule()
    {
        $response = $this->foodtruck_model->update_schedule();
        if ($response) {
            echo json_encode(array('status' => true));
            success_message('Schedule has been updated successfully.');
        } else {
            error_message('Something went to wrong.');
        }
    }

    function page_editor($id)
    {
        $page_data['foodtruck_data'] = $this->foodtruck_model->get_by_id($id);
        $page_data['page_styles'] = $this->foodtruck_model->get_foodtruck_page_styles($id);
        $page_data['page_name'] = 'foodtruck/page_editor';
        $page_data['page_title'] = 'Food Truck Page Editor';
        $this->load->view('backend/index', $page_data);
    }

    function page_preview($foodtruck_id)
    {
        $page_data['foodtruck_details'] = $this->foodtruck_model->get_by_id($foodtruck_id);
        $page_data['page_styles'] = $this->foodtruck_model->get_foodtruck_page_styles($foodtruck_id);
        $page_data['page_name']          = 'foodtruck/index';
        $page_data['page_title']         = 'Food Truck - ' . $page_data['foodtruck_details']->name;
        $this->load->view(frontend('index'), $page_data);
    }

    function reset_page_styles($foodtruck_id)
    {
        $response = $this->foodtruck_model->reset_page_styles($foodtruck_id);
        if ($response) {
            success(get_phrase("Page Styles Setting has been reseted successfully"), site_url("foodtruck/page-builder/$foodtruck_id"));
        } else {
            error(get_phrase("an_error_occured"), site_url("foodtruck/page-builder/$foodtruck_id"));
        }
    }

    function update_page_styles()
    {
        $foodtruck_id = $this->input->post('foodtruck_id');
        $response = $this->foodtruck_model->update_page_styles($foodtruck_id);
        if ($response) {
            success(get_phrase("Page Styles Setting has been updated successfully"), site_url("foodtruck/page-builder/$foodtruck_id"));
        } else {
            error(get_phrase("an_error_occured"), site_url("foodtruck/page-builder/$foodtruck_id"));
        }
    }
}
