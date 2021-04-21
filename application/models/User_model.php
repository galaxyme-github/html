<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->loggedin_user_id = get_loggedin_user_id();
        $this->loggedin_user_role = get_loggedin_user_role();
    }

    // GET USER BY ID
    public function get_user_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    // GET ADMIN DETAILS
    public function get_admin_details()
    {
        return $this->db->get_where($this->table, ['role_id' => 1])->row_array();
    }

    // GET ONLY APPROVED USERS, EXCEPT FOR ROLE 4 WHICH IS DRIVER ROLE
    public function get_approved_users()
    {
        $this->db->where('status', 1);
        $this->db->where('role_id !=', 4);
        return $this->db->get($this->table)->result_array();
    }

    public function get_approved_owners()
    {
        $this->db->where('status', 1);
        $this->db->where('role_id', 3);
        return $this->db->get($this->table)->result_array();
    }

    // GET ONLY PENDING USERS, EXCEPT FOR ROLE 4 WHICH IS DRIVER ROLE
    public function get_pending_users()
    {
        $this->db->where('role_id !=', 4);
        $this->db->where('status', 0);
        return $this->db->get($this->table)->result_array();
    }

    /* Update user profile */
    public function update_profile()
    {
        $user_role = $this->loggedin_user_role;
        if ($user_role == 'superadmin' || $user_role == 'admin') {
            return $this->update_admin_profile();
        } elseif ($user_role == 'customer') {
            return $this->update_customer_profile();
        } else {
            return $this->update_owner_profile();
        }
    }

    /* Update admin profile */
    public function update_admin_profile()
    {
        $loggedin_user_id = $this->loggedin_user_id;
        $previous_data = $this->get_user_detail($loggedin_user_id, $this->loggedin_user_role);
        $email = required(sanitize($this->input->post('email')));
        if ($this->unique_email($email)) {
            $profile['email'] = $email;
            $profile['name'] = required(sanitize($this->input->post('name')));
            $profile['phone'] = required(sanitize($this->input->post('phone')));
            $profile['address_2'] = required(sanitize($this->input->post('address_2')));
            $profile['address_1'] = required(sanitize($this->input->post('address_1')));
            $profile['city'] = required(sanitize($this->input->post('city')));
            $profile['state'] = required(sanitize($this->input->post('state')));
            $profile['zip_code'] = required(sanitize($this->input->post('zip_code')));
            // Upload user photo
            if (!empty($_FILES['user_image']['name'])) {
                $profile['photo']  = $this->upload('user', $_FILES['user_image'], $previous_data->photo);
            }
            $this->db->trans_start();
            $this->db->where('id', $loggedin_user_id);
            $this->db->update('staff', $profile);

            $this->db->where('id', get_loggedin_id());
            $this->db->update('login_credential', array('email' =>  $email));
            $this->db->trans_complete();
            return true;
        }
    }

    /* update customer profile */
    public function update_customer_profile()
    {
        return $this->customer_model->update_customer();
    }

    /* update owner profile */
    public function update_owner_profile()
    {
        return $this->owner_model->update_owner();
    }

    // when user change his password
    public function update_password()
    {
        $user_role = get_loggedin_user_role();
        if ($user_role == 'superadmin' || $user_role == 'admin') {
            return $this->update_admin_password();
        } else {
            return $this->update_user_password();
        }
    }

    /* admin password change */
    public function update_admin_password()
    {
        $loggedin_user_id = $this->loggedin_user_id;
        $previous_data = $this->get_user_detail($loggedin_user_id, $this->loggedin_user_role);

        $current_password = required($this->input->post('current_password'));

        if ($this->check_validate_password($current_password)) {
            $new_password = required($this->input->post('new_password'));
            $confirm_password = required($this->input->post('confirm_password'));

            if ($new_password == $confirm_password) {
                $this->db->where('id', get_loggedin_id());
                $this->db->update('login_credential', array('password' => $this->app_lib->password_encrypt($new_password)));
                success('Password has been changed successfully!', site_url('settings/profile'));
            } else {
                error('New password is not matched.', site_url('settings/profile'));
            }
        } else {
            error('Current password is invalid.', site_url('settings/profile'));
        }
    }

    /* user password change */
    public function update_user_password()
    {
        $loggedin_user_id = $this->loggedin_user_id;
        $previous_data = $this->get_user_detail($loggedin_user_id, $this->loggedin_user_role);

        $current_password = required($this->input->post('current_password'));

        if ($this->check_validate_password($current_password)) {
            $new_password = required($this->input->post('new_password'));
            $confirm_password = required($this->input->post('confirm_password'));

            if ($new_password == $confirm_password) {
                $this->db->where('id', get_loggedin_id());
                $this->db->update('login_credential', array('password' => $this->app_lib->password_encrypt($new_password)));
                success('Password has been changed successfully!', site_url('settings/password'));
            } else {
                error('New password is not matched.', site_url('settings/password'));
            }
        } else {
            error('Current password is invalid.', site_url('settings/password'));
        }
    }

    // current password verification is done here
    public function check_validate_password($password)
    {
        if ($password) {
            $getPassword = $this->db->select('password')
                ->where('id', get_loggedin_id())
                ->get('login_credential')->row()->password;
            $getVerify = $this->app_lib->verify_password($password, $getPassword);
            if ($getVerify) {
                return true;
            } else {
                return false;
            }
        }
    }

    // get role id from role type
    function get_role_id_by_type($role_type)
    {
        return $this->db->select('id')->where('type', $role_type)->get('roles')->row()->id;
    }

    // get credential detail by id
    function get_credential_detail_by_id($credential_id)
    {
        return $this->db->get_where('login_credential', ['id' => $credential_id])->row();
    }

    /* get role type by roleId */
    function get_role_type_by_role_id($role_id)
    {
        return $this->db->select('type')->where('id', $role_id)->get('roles')->row()->type;
    }

    /* get user detail by user_id and user_role */
    function get_user_detail($user_id, $user_role)
    {   
        $table = '';
        if ($user_role == 'superadmin' || $user_role == 'admin') {
            $table = 'staff';
        } else if ($user_role == 'customer') {
            $table = 'customers';
        } else if ($user_role == 'owner') {
            $table = 'owners';
        }
        return $this->db->get_where($table, ['id' => $user_id])->row();
    }

    /* unique valid email verification is done here */
    function unique_email($email)
    {
        if (empty($email)) {
            return true;
        }
        $this->db->where_not_in('id', get_loggedin_id());
        $this->db->where('email', $email);
        $query = $this->db->get('login_credential');

        if ($query->num_rows() > 0) {
            error('Email is duplicated.', site_url('settings/profile'));
            return false;
        } else {
            return true;
        }
    }
}