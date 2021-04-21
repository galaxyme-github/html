<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    // checking login credential
    public function login_credential($email, $password)
    {
        $this->db->select('*');
        $this->db->from('login_credential');
        $this->db->where('email', $email);
        $this->db->limit(1);
        $query = $this->db->get();
        // username[email] is okey lets check the password now
        if ($query->num_rows() == 1) {
            $verify_password = $this->app_lib->verify_password($password, $query->row()->password);
            if ($verify_password) {
                return $query->row();
            }
        }
        return false;
    }

    // register
    public function register()
    {
        $role_type = required(sanitize($this->input->post('role')));
        if ($role_type == "customer") {
            $credential_data['email'] = required(sanitize($this->input->post('email')));
            $credential_data['password'] = $this->app_lib->password_encrypt(required($this->input->post('password')));
            $credential_data['account_name'] = required(sanitize($this->input->post('accountName')));

            $user_data['name'] = required(sanitize($this->input->post('name')));
            $user_data['phone'] = required(sanitize($this->input->post('phone')));
            $user_data['email'] = required(sanitize($this->input->post('email')));
            $user_data['address_1'] = required(sanitize($this->input->post('address_1')));
            $user_data['address_2'] = sanitize($this->input->post('address_2'));
            $user_data['city'] = required(sanitize($this->input->post('city')));
            $user_data['state'] = required(sanitize($this->input->post('state')));
            $user_data['zip_code'] = required(sanitize($this->input->post('zipCode')));
            $user_data['company'] = sanitize($this->input->post('company'));

            if ($this->unique_email($credential_data['email'])) {
                /*===== Transaction Start =====*/
                $this->db->trans_start();
            
                $this->db->insert('customers', $user_data);                            // Insert customer data to customer table
                $user_id = $this->db->insert_id();

                $credential_data['user'] = $user_id;                                   // Insert user crendetial info to login_cerendetial table
                
                $role_id = $this->user_model->get_role_id_by_type($role_type);  // Get role id by role type [customer]
                $credential_data['role'] = $role_id;
                $this->db->insert('login_credential', $credential_data);
                $credential_id = $this->db->insert_id();

                $this->db->trans_complete();
                /*===== End Transation =======*/
            } else {
                bft_notification(
                    'The email address has been already in use.', 
                    'danger', 
                    'shield-check', 
                    site_url('auth/registration/'.$role_type)
                );
            }
            $this->auto_login($role_type, $credential_id);                          // logining automatically after registering
        } else {
            bft_notification(
                'You tried with invalid user role.', 
                'warning', 
                'alert-circle-o', 
                site_url('auth/roles')
            );
        }
    }

    /**
     * This function helps logining after regestration has done.
     * @param {String} role_type
     * @param {Integer} credential_id
     */
    public function auto_login($role_type, $credential_id)
    {
        $credential_detail = $this->user_model->get_credential_detail_by_id($credential_id);

        $sessionData = array(
            'loggedin_id' => $credential_detail->id,
            'loggedin_userid' => $credential_detail->user,
            'loggedin_role_id' => $credential_detail->role,
            'loggedin_type' => $role_type,
            'loggedin' => true,
        );
        $this->session->set_userdata($sessionData);
        if ($credential_detail && $credential_detail->active == 1) {
            redirect(site_url('dashboard'));
        } else {
            redirect(site_url('auth'), 'refresh');
        }
    }

    /**
     * THIS FUNCTION IS RESPONSIBLE FOR RESETTING THE PASSWORD
     * IT WILL SEND AN EMAIL
     */
    public function reset_password()
    {
        $email = required(sanitize($this->input->post('email')));
        $this->db->where('email', $email);
        $user_data = $this->db->get('users')->row_array();
        if (count($user_data) > 0) {
            //resetting user password here
            $new_password = substr(sha1(rand(100000000, 20000000000)), 0, 7);
            $response = $this->email_model->password_reset($email, $new_password);
            if ($response) {
                $updater['password'] = sha1($new_password);
                $this->db->where('email', $email);
                $this->db->update('users', $updater);
                
                success(get_phrase('please_check_your_mail'), site_url('auth'));
            } else {
                error(get_phrase('error_occurred_during_sending_mail'), site_url('auth'));
            }
        } else {
            error(get_phrase('invalid_email'), site_url('auth/forget_password'));
        }
    }

    // unique valid email verification is done here
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

    // store into BFT database info detected from login location
    function detect_login_action($credential_id)
    {
        if (empty($credential_id)) {
            return;
        }
        $clientLocationInfo = $this->input->post('clientLoc');
        $jsonData = "{" . $clientLocationInfo . "}";
        $obj = json_decode($jsonData);

        $data['browser'] = $this->agent->browser();
        $data['browser_version'] = $this->agent->version();
        $data['os'] = $this->agent->platform();
        $data['ip_address'] = $this->input->ip_address();
        $data['city'] = $obj->city;
        $data['state'] = $obj->state;
        $data['country'] = $obj->country;
        $data['zip_code'] = $obj->postal_code;
        $data['timezone'] = $obj->timezone;
        $data['credential_id'] = $credential_id;
        
        $this->db->insert('login_history', $data);
    } 
}
