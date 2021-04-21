<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller for Settings
 * @author Zita Yevloyeva
 */

class Settings extends Authorization_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // delivery function responsible for showing the delivery settings page.
    function delivery()
    {
        authorization(['admin'], true);
        $page_data['page_name'] = 'settings/delivery';
        $page_data['page_title'] = get_phrase("delivery_settings");
        $this->load->view('backend/index', $page_data);
    }

    // revenue function responsible for showing the revenue settings page.
    function revenue()
    {
        authorization(['admin'], true);
        $page_data['page_name'] = 'settings/revenue';
        $page_data['page_title'] = get_phrase("revenue_settings");
        $this->load->view('backend/index', $page_data);
    }

    // vat function responsible for showing the vat settings page.
    function vat()
    {
        authorization(['admin'], true);
        $page_data['page_name'] = 'settings/vat';
        $page_data['page_title'] = "VAT " . get_phrase("settings");
        $this->load->view('backend/index', $page_data);
    }

    // system function responsible for showing the System settings page.
    function system()
    {
        authorization(['superadmin'], true);
        $page_data['page_name'] = 'settings/system';
        $page_data['page_title'] = 'System Settings Control';
        $this->load->view('backend/index', $page_data);
    }

    // Gallery function is also responsible for showing the Website settings page.
    function gallery()
    {
        authorization(['superadmin'], true);
        $page_data['page_name'] = 'settings/website';
        $page_data['page_title'] = get_phrase("website_settings");
        $this->load->view('backend/index', $page_data);
    }

    // smtp function responsible for showing the smtp settings page.
    function smtp()
    {
        authorization(['admin'], true);
        $page_data['page_name'] = 'settings/smtp';
        $page_data['page_title'] = "SMTP " . get_phrase("settings");
        $this->load->view('backend/index', $page_data);
    }

    /* Common update method for settings */
    function update()
    {
        $response = $this->settings_model->update();
        if ($response) {
            $this->session->set_flashdata('flash_message', 'Updated successfully!');
        } else {
            $this->session->set_flashdata('error_message', 'An error occurred!');
        }
        redirect(site_url('settings/' . sanitize($this->input->post('settings_type'))), 'refresh');
    }

    /* Recaptcha Settings */
    function recaptcha()
    {
        authorization(['superadmin'], true);
        $page_data['page_name'] = 'settings/recaptcha';
        $page_data['page_title'] = 'Recaptcha Settings';
        $this->load->view('backend/index', $page_data);
    }

    /* Control Profile */
    function profile()
    {
        $page_data['page_name'] = 'settings/profile';
        $page_data['page_title'] = 'Profile Control';

        $user_role = get_loggedin_user_role();
        $user_id = get_loggedin_user_id();
        $page_data['user_info'] = $this->user_model->get_user_detail($user_id, $user_role);

        $this->load->view('backend/index', $page_data);
    }

    /* Website Settings Control */
    function website()
    {
        authorization(['superadmin'], true);
        $page_data['page_name'] = 'settings/website';
        $page_data['page_title'] = 'Website Settings Control';
        $this->load->view('backend/index', $page_data);
    }

    /* Password Control page */
    function password()
    {
        $page_data['page_name'] = 'settings/password';
        $this->load->view('backend/index', $page_data);
    }

    /* Account Security */
    function account_security()
    {
        $page_data['page_name'] = 'settings/account_security';
        $page_data['login_devices'] = $this->settings_model->get_login_devices();
        $this->load->view('backend/index', $page_data);
    }

    /* Account Settings */
    public function account()
    {
        $page_data['page_name'] = 'settings/account';
        $page_data['account_info'] = $this->settings_model->get_account_info();
        $this->load->view('backend/index', $page_data);
    }
}
