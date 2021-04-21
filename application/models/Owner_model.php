<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "owners";
    }

    // GET ALL OWNERS, WHICH IS ROLE ID 3
    public function get_all()
    {
        $this->db->where('role_id', 3);
        return $this->owner_merger($this->db->get($this->table));
    }

    // GET ONLY APPROVED OWNERS, WHICH IS ROLE ID 3
    public function get_approved_owners()
    {
        $this->db->where('status', 1);
        $this->db->where('role_id', 3);
        return $this->owner_merger($this->db->get($this->table));
    }

    // GET ONLY PENDING OWNERS, WHICH IS ROLE ID 3
    public function get_pending_owners()
    {
        $this->db->where('role_id', 3);
        $this->db->where('status', 0);
        return $this->owner_merger($this->db->get($this->table));
    }


    // GET OWNER BY ID
    public function get_owner_by_id($id)
    {
        $owner = $this->db->get_where($this->table, array('id' => $id))->row();
        return $owner;
    }

    // owner MERGER
    public function owner_merger($query_obj, $is_single_row = false)
    {
        if (!$is_single_row) {
            $owners = $query_obj->result_array();
            foreach ($owners as $key => $owner) {
                $owner_data = $this->db->get_where('customers', array('user_id' => $owner['id']))->row_array();
                $owners[$key]['address_1']  = $owner_data['address_1'];
                $owners[$key]['address_2']  = $owner_data['address_2'];
                $owners[$key]['address_3']  = $owner_data['address_3'];
                $owners[$key]['coordinate_1']    = $owner_data['coordinate_1'] ? json_decode($owner_data['coordinate_1'], true) : ['latitude' => '', 'longitude' => ''];
                $owners[$key]['coordinate_2']    = $owner_data['coordinate_2'] ? json_decode($owner_data['coordinate_2'], true) : ['latitude' => '', 'longitude' => ''];
                $owners[$key]['coordinate_3']    = $owner_data['coordinate_3'] ? json_decode($owner_data['coordinate_3'], true) : ['latitude' => '', 'longitude' => ''];

                $approved_foodtrucks = $this->foodtruck_model->get_foodtrucks_by_condition(['owner_id' => $owner['id'], 'status' => 1]);
                $pending_foodtrucks  = $this->foodtruck_model->get_foodtrucks_by_condition(['owner_id' => $owner['id'], 'status' => 0]);

                $owners[$key]['number_of_approved_foodtrucks'] = count($approved_foodtrucks) ? count($approved_foodtrucks) : 0;
                $owners[$key]['number_of_pending_foodtrucks']  = count($pending_foodtrucks) ? count($pending_foodtrucks) : 0;
            }
            return $owners;
        } else {
            $owner = $query_obj->row_array();
            $owner_data = $this->db->get_where('customers', array('user_id' => $owner['id']))->row_array();
            $owner['address_1']  = $owner_data['address_1'];
            $owner['address_2']  = $owner_data['address_2'];
            $owner['address_3']  = $owner_data['address_3'];
            $owner['coordinate_1']    = $owner_data['coordinate_1'] ? json_decode($owner_data['coordinate_1'], true) : ['latitude' => '', 'longitude' => ''];
            $owner['coordinate_2']    = $owner_data['coordinate_2'] ? json_decode($owner_data['coordinate_2'], true) : ['latitude' => '', 'longitude' => ''];
            $owner['coordinate_3']    = $owner_data['coordinate_3'] ? json_decode($owner_data['coordinate_3'], true) : ['latitude' => '', 'longitude' => ''];

            $approved_foodtrucks = $this->foodtruck_model->get_foodtrucks_by_condition(['owner_id' => $owner['id'], 'status' => 1]);
            $pending_foodtrucks  = $this->foodtruck_model->get_foodtrucks_by_condition(['owner_id' => $owner['id'], 'status' => 0]);

            $owner['number_of_approved_foodtrucks'] = count($approved_foodtrucks) ? count($approved_foodtrucks) : 0;
            $owner['number_of_pending_foodtrucks']  = count($pending_foodtrucks) ? count($pending_foodtrucks) : 0;
            return $owner;
        }
    }


    //UPDATE owner DATA
    public function update_owner()
    {
        $owner_id = get_loggedin_user_id();
        $credential_id = get_loggedin_id();
        $previous_data = $this->get_owner_by_id($owner_id);
        
        $email = required(sanitize($this->input->post('email')));

        if ($this->unique_email($email)) {
            $owner_data['first_name'] = required(sanitize($this->input->post('first_name')));
            $owner_data['last_name'] = required(sanitize($this->input->post('last_name')));
            $owner_data['email'] = $email;
            $owner_data['phone'] = required(sanitize($this->input->post('phone')));
            $owner_data['address_1'] = required(sanitize($this->input->post('address_1')));
            $owner_data['address_2'] = sanitize($this->input->post('address_2'));
            $owner_data['city'] = required(sanitize($this->input->post('city')));
            $owner_data['state'] = required(sanitize($this->input->post('state')));
            $owner_data['zip_code'] = required(sanitize($this->input->post('zip_code')));
            $owner_data['company'] = sanitize($this->input->post('company'));
            $owner_data['headline'] = sanitize($this->input->post('headline'));
            $owner_data['summary'] = sanitize($this->input->post('summary'));

            // Upload Profile Image
            if (!empty($_FILES['image']['name'])) {
                $owner_data['photo']  = $this->upload('user', $_FILES['image'], $previous_data["photo"]);
            }

            $this->db->trans_start();
            $this->db->where('id', $owner_id);
            $this->db->update($this->table, $owner_data);

            $this->db->where('id', $credential_id);
            $this->db->update('login_credential', array('email' => $email));
            $this->db->trans_complete();
            return true;
        }
    }

    // UPDATE owner'S ADDRESS
    public function update_owner_address()
    {
        $latitude_1 = required(sanitize($this->input->post('latitude_1')));
        $longitude_1 = required(sanitize($this->input->post('longitude_1')));
        $coordinate_1 = array('latitude' => $latitude_1, 'longitude' => $longitude_1);
        $address_data['address_1'] = required(sanitize($this->input->post('address_1')));
        $address_data['coordinate_1'] = json_encode($coordinate_1);

        $latitude_2 = sanitize($this->input->post('latitude_2'));
        $longitude_2 = sanitize($this->input->post('longitude_2'));
        $coordinate_2 = array('latitude' => $latitude_2, 'longitude' => $longitude_2);
        $address_data['address_2'] = sanitize($this->input->post('address_2'));
        $address_data['coordinate_2'] = json_encode($coordinate_2);

        $latitude_3 = sanitize($this->input->post('latitude_3'));
        $longitude_3 = sanitize($this->input->post('longitude_3'));
        $coordinate_3 = array('latitude' => $latitude_3, 'longitude' => $longitude_3);
        $address_data['address_3'] = sanitize($this->input->post('address_3'));
        $address_data['coordinate_3'] = json_encode($coordinate_3);

        return $address_data;
    }


    //UPDATE owner DATA STATUS
    public function update_owner_status($id)
    {
        $previous_data = $this->get_owner_by_id($id);
        if ($previous_data['status']) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

        return true;
    }

    // DELETE owner DATA
    public function delete_owner($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);

        $this->db->where('user_id', $id);
        $this->db->delete('customers');

        return true;
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
