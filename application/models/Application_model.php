<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : BookingFoodTrucks
 * Date : 21 - Mar - 2021
 * Author : Zita Yevloyeva
 * Applicaton model handles all the database queries of Foodtruck Owners' applications
 */

class Application_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "applications";
    }

    /**
     * GET ALL THE APPLICATIONS
     */
    public function get_all()
    {
        $this->db->order_by("created_at", "desc");
        $obj = $this->db->get($this->table);
        return $obj->result_array();
    }

    /**
     * GET ALL THE APPLICATIONS PENDING
     */
    public function get_all_pending()
    {
        $this->db->where('accepted', 0);
        $this->db->order_by("created_at", "desc");
        $obj = $this->db->get($this->table);
        return $obj->result_array();
    }

    /**
     * THIS FUNCTION IS RESPONSIVE FOR APPLYING TO BECOME A FOODTRUCK MEMEBER
     */
    public function apply()
    {
        $application['code'] = "FT-" . strtotime(date('D, d-M-Y H:i:s')) . "-" . random(5);
        $application['company_name'] = sanitize($this->input->post('company_name'));
        $application['first_name'] = sanitize($this->input->post('first_name'));
        $application['last_name'] = sanitize($this->input->post('last_name'));
        $application['email'] = sanitize($this->input->post('email_address'));
        $application['phone'] = sanitize($this->input->post('phone_number'));
        $application['website_url'] = sanitize($this->input->post('website_url'));
        $application['hear_from'] = json_encode($this->input->post('checkbox'));

        $this->db->where('email', $application['email']);
        if ($this->db->get('applications')->num_rows() > 0) {
            return false;
        }

        $this->db->insert('applications', $application);
        return true;
    }

    // CHECK IF THIS APPLICATION EXIST
    public function is_valid($application_code)
    {
        $this->db->where('code', $application_code);
        $application_rows = $this->db->get('applications')->num_rows();

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
        $this->db->update($this->table, array('accepted' => 1));

        return true;
    }

    /**
     * REGISTER OWNER AS FOODTRUCK MEMEBER
     */
    public function register_foodtruck_memeber()
    {
        $role = "owner";
        $password = random(8);

        $user_data['name'] = required(sanitize($this->input->post('name')));
        $user_data['email'] = required(sanitize($this->input->post('email')));
        $user_data['phone'] = required(sanitize($this->input->post('phone')));
        $user_data['password'] = sha1($password);

        // GET THE ROLE DETAILS
        $role_details = $this->db->get_where('role', ['type' => $role])->row_array();
        $user_data['role_id'] = $role_details['id'];
        $user_data['created_at'] = strtotime(date('D, d-M-Y'));

        if (email_duplication($user_data['email'])) {
            $user_data['status'] = 1;
            $this->db->insert('users', $user_data);
            $user_id = $this->db->insert_id();
            $customer_data['user_id'] = $user_id;
            $this->db->insert('customers', $customer_data);
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
        $this->db->update($this->table, array('accepted' => 2));

        return true;
    }

    // GET NUMBER OF PENDING APPLICATIONS
    public function get_number_of_pending_applications()
    {
        $this->db->where('accepted', 0);
        return $this->db->get($this->table)->num_rows();
    }
}
