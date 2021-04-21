<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "member_applications";
    }

    /**
     * GET ALL THE APPLICATIONS
     */
    public function get_processed_applications()
    {
        $this->db->where_in('accepted', [1, 2]);
        $this->db->order_by("created_at", "desc");
        $obj = $this->db->get($this->table);
        return $obj->result_array();
    }

    /**
     * GET ALL THE APPLICATIONS PENDING
     */
    public function get_pending_applications()
    {
        $this->db->where('accepted', 0);
        $this->db->order_by("created_at", "desc");
        $obj = $this->db->get($this->table);
        return $obj->result_array();
    }

    // CHECK IF THIS APPLICATION EXIST
    public function is_valid_code($application_code)
    {
        $this->db->where('code', $application_code);
        $application_rows = $this->db->get($this->table)->num_rows();

        return $application_rows > 0 ? true : false;
    }

    /**
     * GET ORDER BY ID
     */
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $obj = $this->db->get($this->table);
        return $this->order_merger($obj, true);
    }

    /**
     * GETTING APPLICATION BY CODE
     */
    public function get_by_code($code)
    {
        $this->db->where('code', $code);
        $obj = $this->db->get($this->table);
        return $obj->row_array();
    }

    /**
     * ACCEPT APPLICATION, INIT DEFAULT INFO FOR NEW MEMBER
     */
    public function accept()
    {
        $application_id = $this->input->post('applicationId');
        $this->db->where('id', $application_id);
        $this->db->update($this->table, array('accepted' => 1, 'accepted_at' =>  date('Y-m-d H:i:s')));
        
        return true;
    }

    /**
     * REGISTER OWNER AS FOODTRUCK MEMEBER
     */
    public function register_bft_memeber()
    {
        $role = "owner";
        $role_id = $this->db->select('id')->where('type', 'owner')->get('roles')->row()->id;

        $user_data['first_name'] = required($this->input->post('firstName'));
        $user_data['last_name'] = required($this->input->post('lastName'));
        $user_data['email'] = required($this->input->post('email'));
        $user_data['phone'] = required($this->input->post('phone'));
        $user_data['company'] = $this->input->post('company');
        $user_data['address_1'] = required($this->input->post('address_1'));
        $user_data['address_2'] = $this->input->post('address_2');
        $user_data['city'] = required($this->input->post('city'));
        $user_data['state'] = required($this->input->post('state'));
        $user_data['zip_code'] = required($this->input->post('zipCode'));

        if ($this->unique_email($user_data['email'])) {
            $this->db->trans_start();
            $this->db->insert('owners', $user_data);
            $user_id = $this->db->insert_id();
    
            $credential_data['email'] = $user_data['email'];
            $credential_data['role'] =  $role_id;
            $credential_data['user'] = $user_id;
            $password = random(8);
            $credential_data['password'] = $this->app_lib->password_encrypt($password);
            $this->db->insert('login_credential', $credential_data);
            $this->db->trans_complete();
        } else {
            return false;
        }

        return $password;
    }

    /**
     * HANDLE APPLICATION DECLINE
     */
    public function decline()
    {
        $application_id = $this->input->post('applicationId');

        $this->db->where('id', $application_id);
        $this->db->update($this->table, array('accepted' => 2, 'declined_at' =>  date('Y-m-d H:i:s')));

        return true;
    }

    // GET NUMBER OF PENDING APPLICATIONS
    public function count_pending_applications()
    {
        $this->db->where('accepted', 0);
        return $this->db->get($this->table)->num_rows();
    }

    // Receive BFT Member application
    public function join_request()
    {
        $application['code'] = "BFT-" . strtotime(date('D, d-M-Y H:i:s')) . "-" . random(5);
        $application['company_name'] = sanitize($this->input->post('company'));
        $application['first_name'] = sanitize($this->input->post('first_name'));
        $application['last_name'] = sanitize($this->input->post('last_name'));
        $application['email'] = sanitize($this->input->post('email_address'));
        $application['phone'] = sanitize($this->input->post('phone_number'));
        $application['website_url'] = sanitize($this->input->post('website_url'));
        $application['hear_from'] = json_encode($this->input->post('checkbox'));
        $application['address_1'] = sanitize($this->input->post('address_1'));
        $application['address_2'] = sanitize($this->input->post('address_2'));
        $application['city'] = sanitize($this->input->post('city'));
        $application['state'] = sanitize($this->input->post('state'));
        $application['zip_code'] = sanitize($this->input->post('zip_code'));
        $application['city'] = sanitize($this->input->post('city'));

        /* Info from where owner operated */
        $clientLocationInfo = $this->input->post('clientLoc');
        $jsonData = "{" . $clientLocationInfo . "}";
        $obj = json_decode($jsonData);

        $application['detected_browser'] = $this->agent->browser();
        $application['detected_browser_version'] = $this->agent->version();
        $application['detected_os'] = $this->agent->platform();
        $application['detected_ip_address'] = $this->input->ip_address();
        $application['detected_city'] = $obj->city;
        $application['detected_state'] = $obj->state;
        $application['detected_country'] = $obj->country;
        $application['detected_zip_code'] = $obj->postal_code;
        $application['detected_timezone'] = $obj->timezone;

        $validate_recaptcha = $this->recaptcha->validate_recaptcha_v2();
        if ($validate_recaptcha) {
            // check if owner already applied before
            $this->db->where('email', $application['email']);
            if ($this->db->get('member_applications')->num_rows() > 0) {
                $requested_at = $this->db->get('member_applications')->row()->created_at;
                error('You already applied.');
                bft_notification(
                    'You already had been applied to join in BFT at ' . get_nicetime($requested_at) . '. Please contact to <a href="" target="_blank" class="text-link">BFT support team.</a>', 
                    'warning', 
                    'alert-circle-o', 
                    site_url('become-bft-member')
                );
            }
            $this->db->insert('member_applications', $application);
            $this->session->set_flashdata('submitted_application', true);
            success('Application has been submitted successfully', site_url('become-bft-member'));
        } else {
            bft_notification(
                'reCaptcha validation failed! BFT is protected by Google reCaptcha.', 
                'danger', 
                'alert-circle-o', 
                site_url('become-bft-member')
            );
        }
    }

    /* unique valid email verification is done here */
    function unique_email($email)
    {
        if (empty($email)) {
            return true;
        }

        $this->db->where('email', $email);
        $query = $this->db->get('login_credential');

        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }
}
