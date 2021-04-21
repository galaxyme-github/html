<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Authorization_Controller
{
    function index()
    {
        $page_data['page_name'] = 'dashboard/index';
        $page_data['page_title'] = "BFT " . ucfirst(loggedin_role_name()) . " Dashboard";
        $this->load->view('backend/index', $page_data);
    }
}
