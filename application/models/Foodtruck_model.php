<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Foodtruck_model extends MY_Model
{
    function __construct()
    {

        parent::__construct();
        $this->table = "foodtrucks";
    }

    /**
     * GET ALL THE FOODTRUCKS WITHOUT ANY CONDITIONS
     *
     */
    public function get_all()
    {
        $this->db->order_by("id", "desc");
        return $this->db->get($this->table)->result_array();
    }

    /**
     * GET FOODTRUCK USING ID WITHOUT ANY CONDITIONS
     *
     */
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $foodtrucks = $this->db->get($this->table)->row();
        return $foodtrucks;
    }

    /**
     * GET FOODTRUCK USING CONDTIONS
     *
     * @param array $conditions
     */
    public function get_foodtrucks_by_condition($conditions = [])
    {
        foreach ($conditions as $key => $value) {
            if (!is_null($value)) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }
        $this->db->order_by("id", "desc");
        return $this->db->get($this->table)->result_array();
    }

    public function get_all_approved()
    {
        if ($this->loggedin_user_role == "owner") {
            $this->db->where('owner_id', $this->loggedin_user_id);
        }
        $this->db->where('status', 1);
        $this->db->order_by("id", "desc");
        $foodtrucks = $this->db->get($this->table)->result();
        return $foodtrucks;
    }

    public function get_all_pending()
    {
        if ($this->loggedin_user_role == "owner") {
            $this->db->where('owner_id', $this->loggedin_user_id);
        }
        $this->db->where('status', 0);
        $this->db->order_by("id", "desc");
        $foodtrucks = $this->db->get($this->table);
        return $this->merger($foodtrucks);
    }

    // FETCH ALL THE RELATED DATA WITH FOODTRUCK
    public function merger($query_obj, $is_single_row = false)
    {
        if (!$is_single_row) {
            $foodtrucks = $query_obj->result_array();
            foreach ($foodtrucks as $key => $foodtruck) {
                $foodtruck_owner_data = !empty($foodtruck['owner_id']) ? $this->user_model->get_user_by_id($foodtruck['owner_id']) : array();
                $foodtrucks[$key]['owner_name']  = isset($foodtruck_owner_data['name']) ? $foodtruck_owner_data['name'] : "";
                $foodtrucks[$key]['owner_email'] = isset($foodtruck_owner_data['email']) ? $foodtruck_owner_data['email'] : "";
                $foodtrucks[$key]['owner_phone'] = isset($foodtruck_owner_data['phone']) ? $foodtruck_owner_data['phone'] : "";
            }

            return $foodtrucks;
        } else {
            $foodtruck = $query_obj->row_array();
            $foodtruck_owner_data = !empty($foodtruck['owner_id']) ? $this->user_model->get_user_by_id($foodtruck['owner_id']) : array();
            $foodtruck['owner_name']  = isset($foodtruck_owner_data['name']) ? $foodtruck_owner_data['name'] : "";
            $foodtruck['owner_email'] = isset($foodtruck_owner_data['email']) ? $foodtruck_owner_data['email'] : "";
            $foodtruck['owner_phone'] = isset($foodtruck_owner_data['phone']) ? $foodtruck_owner_data['phone'] : "";
            return $foodtruck;
        }
    }

    /* add food truck */
    public function store()
    {
        $data['name'] = required(sanitize($this->input->post('ft_name')));
        $data['summary']  = $this->input->post('ft_summary');
        $data['website_url']  = $this->input->post('ft_website_url');
        $data['minimum_price_per_person']  = required(sanitize($this->input->post('minimum_price_per_person')));
        $data['number_of_attendees']  = $this->input->post('number_of_attendees');
        $data['mealtimes']  = required(json_encode($this->input->post('service_time')));
        $data['needed_things_on_event_location']  = $this->input->post('needed_things_on_event_location');
        $data['serviceable_areas']  = required($this->input->post('serving_areas'));
        $data['serve_radius'] = $this->input->post('service_radius');
        $data['city'] = required($this->input->post('ft_city'));
        $data['state']  = required($this->input->post('ft_state'));
        $data['zip_code']  = required(sanitize($this->input->post('ft_zip_code')));
        $data['email']  = required($this->input->post('ft_email'));
        $data['phone']  = required($this->input->post('ft_phone'));
        $data['slug']  = slugify($data['name']);
        $data['owner_id'] = get_loggedin_user_id();
        // Get latitude and longitude from Zip Code
        $geolocate = $this->app_lib->getGeolocateFromZipCode($data['zip_code']);
        $data['latitude'] = $geolocate['latitude'];
        $data['longitude'] = $geolocate['longitude'];

        $this->db->insert($this->table, $data);
        $foodtruck_id = $this->db->insert_id();
        $this->db->insert('foodtruck_page_styles', ['foodtruck_id' => $foodtruck_id]);
        return $foodtruck_id;
    }

    // PARENT FUNCTION FOR UPDATING A FOODTRUCK
    public function update($section)
    {
        $id = required(sanitize($this->input->post('id')));
        // AUTHORIZATION IS A HELPER METHOD WHICH IS RESPONSIBLE FOR AUTHORIZING OPERATION
        if (has_access($this->table, $id)) {
            $dynamic_function_name = "update_" . $section;
            return $this->$dynamic_function_name();
        }
        return false;
    }

    // UPDATE BASIC INFOS FOR A FOODTRUCK
    public function update_basic()
    {
        $id = required(sanitize($this->input->post('id')));
        $data['name'] = required(sanitize($this->input->post('foodtruck_name')));
        $data['summary']  = $this->input->post('foodtruck_summary');
        $data['website_url']  = $this->input->post('website_url');
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    // UPDATE SERVICE AND PHONE INFOS FOR A FOODTRUCK
    public function update_service()
    {
        $id = $this->input->post('id');
        $data['minimum_price_per_person']  = required(sanitize($this->input->post('minimum_price_per_person')));
        $data['number_of_attendees']  = $this->input->post('number_of_attendees');
        $data['mealtimes']  = required(json_encode($this->input->post('service_time')));
        $data['needed_things_on_event_location']  = $this->input->post('needed_things_on_event_location');
        $data['serviceable_areas']  = required($this->input->post('serving_areas'));
        $data['serve_radius'] = $this->input->post('service_radius');

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    // UPDATE LOCATIOIN DATA FOR A FOODTRUCK
    public function update_location()
    {
        $id = required(sanitize($this->input->post('id')));
        $data['city'] = required($this->input->post('ft_city'));
        $data['state']  = required($this->input->post('ft_state'));
        $data['zip_code']  = required(sanitize($this->input->post('ft_zip_code')));
        // Get latitude and longitude from Zip Code
        $geolocate = $this->app_lib->getGeolocateFromZipCode($data['zip_code']);
        $data['latitude'] = $geolocate['latitude'];
        $data['longitude'] = $geolocate['longitude'];
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    // UPDATE DELIVERY DATA FOR A FOODTRUCK
    public function update_contact()
    {
        $id = required(sanitize($this->input->post('id')));
        $data['email']  = required($this->input->post('ft_email'));
        $data['phone']  = required($this->input->post('ft_phone'));
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    // Update foodtruck available schedule
    public function update_schedule()
    {
        $id = required(sanitize($this->input->post('id')));
        $unavailable_dates = $this->input->post('dates');
        $this->db->where('id', $id);
        $this->db->update($this->table, ['schedule' => $unavailable_dates]);
        return true;
    }
    // UPDATE SCHEDULE DATA FOR A FOODTRUCK
    // public function update_schedule()
    // {
    //     $id = required(sanitize($this->input->post('id')));
    //     $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
    //     $schedule = array();
    //     foreach ($days as $day) {
    //         $schedule[$day . '_opening'] = sanitize($this->input->post($day . '_opening'));
    //         $schedule[$day . '_closing'] = sanitize($this->input->post($day . '_closing'));
    //     }

    //     $data['schedule'] = json_encode($schedule);
    //     $data['updated_at'] = strtotime(date('D, d-M-Y'));
    //     $this->db->where('id', $id);
    //     $this->db->update($this->table, $data);
    //     return true;
    // }

    // UPDATE SEO DATA FOR A FOODTRUCK
    public function update_seo()
    {
        $id = required(sanitize($this->input->post('id')));
        $data['seo_tags']     = sanitize($this->input->post('seo_tags'));
        $data['seo_description']     = sanitize($this->input->post('seo_description'));
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    // UPDATE GALLERY AND THUMBNAIL INFOS FOR A FOODTRUCK
    public function update_gallery()
    {
        $id = required(sanitize($this->input->post('id')));
        $previous_data = $this->get_by_id($id);

        $previous_gallery_images = empty($previous_data->gallery) ? [
                            'placeholder.png', 
                            'placeholder.png', 
                            'placeholder.png', 
                            'placeholder.png', 
                            'placeholder.png', 
                            'placeholder.png', 
                            'placeholder.png', 
                            'placeholder.png', 
                            'placeholder.png'
                        ] : json_decode($previous_data->gallery);

        if (!empty($_FILES['foodtruck_thumbnail']['name'])) {
            $data['thumbnail']  = $this->upload('foodtruck/thumbnail', $_FILES['foodtruck_thumbnail'], $previous_data->thumbnail);
        }


        for ($counter = 1; $counter <= 9; $counter++) {
            if (!empty($_FILES["foodtruck_gallery_$counter"]['name'])) {
                $previous_gallery_images[$counter - 1]  = $this->upload('foodtruck/gallery', $_FILES["foodtruck_gallery_$counter"], $previous_gallery_images[$counter - 1] ? $previous_gallery_images[$counter - 1] : NULL);
            }
        }

        $data['gallery'] = json_encode($previous_gallery_images);

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }
    
    // UPDATE OWNER INFOS FOR A FOODTRUCK
    public function update_owner()
    {
        $id = required(sanitize($this->input->post('id')));

        // OWNER CAN BE UPDATED BY ADMIN ONLY
        if ($this->loggedin_user_role != "admin") {
            error(get_phrase('you_are_not_authorized_for_this_action'), site_url('foodtruck'));
        }

        if (isset($_POST['foodtruck_owner_type']) && !empty($_POST['foodtruck_owner_type']) && $this->input->post('foodtruck_owner_type') == 'new') { // FOR NEW FOODTRUCK OWNER
            $foodtruck_owner_data['name']     = sanitize($this->input->post('foodtruck_owner_name'));
            $foodtruck_owner_data['email']    = sanitize($this->input->post('foodtruck_owner_email'));
            $foodtruck_owner_data['password'] = sha1($this->input->post('foodtruck_owner_password'));
            $foodtruck_owner_data['role_id']  = 3; // FOODTRUCK OWNER ROLE
            $foodtruck_owner_data['status']   = 1;

            if (email_duplication($foodtruck_owner_data['email'])) {
                $this->db->insert('users', $foodtruck_owner_data);
                $data['owner_id'] = $this->db->insert_id();
                $this->db->where('id', $id);
                $this->db->update($this->table, $data);
            }

            return true;
        } elseif (isset($_POST['foodtruck_owner_type']) && !empty($_POST['foodtruck_owner_type']) && $this->input->post('foodtruck_owner_type') == 'existing') { // FOR EXISTING FOODTRUCK OWNER
            $data['owner_id'] = sanitize($this->input->post('foodtruck_owner_id'));
            $this->db->where('id', $id);
            $this->db->update($this->table, $data);

            // BECOME A FOODTRUCK OWNER IF HE / SHE IS A CUSTOMER
            $this->owner_model->become_foodtruck_owner($data['owner_id']);

            return true;
        } else { // ERROR
            return false;
        }
    }

    // UPDATE RESTARAURANT STATUS
    public function update_status($id)
    {
        // AUTHORIZATION IS A HELPER METHOD WHICH IS RESPONSIBLE FOR AUTHORIZING OPERATION
        if (has_access($this->table, $id)) {
            $previous_data = $this->get_by_id($id);
            if ($previous_data['status']) {
                $data['status'] = 0;
            } else {
                $data['status'] = 1;
            }

            $this->db->where('id', $id);
            $this->db->update($this->table, $data);
            return true;
        }
        return false;
    }

    // IN WHICH FOODTRUCKS A PARTICULAR CUISINE BELONGS
    public function get_foodtrucks_by_cuisine($cuisine_id)
    {
        $foodtrucks = $this->db->get_where($this->table, ['status' => 1])->result_array();
        foreach ($foodtrucks as $key => $foodtruck) {
            $available_cuisines = json_decode($foodtruck['cuisine'], true);
            if (!in_array($cuisine_id, $available_cuisines)) {
                unset($foodtrucks[$key]);
            }
        }

        return $foodtrucks;
    }

    // GET POPULAR FOODTRUCKS. THIS BASICALLY CHECKS THE TOP FOODTRUCKS BY RATINGS
    public function get_popular_foodtrucks($limit = false)
    {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->where('status', 1);
        $this->db->order_by('rating', 'desc');
        $obj = $this->db->get($this->table);
        return $this->merger($obj);
    }

    /**
     * GET PLAIN FOODTRUCK IDS AS A NUMERIC ARRAY LIKE [1,2,3,4]
     *
     * @return array
     */
    public function get_approved_foodtruck_ids_by_owner_id($owner_id)
    {
        $foodtruck_ids = [];
        $foodtrucks = $this->db->get_where('foodtrucks', ['status' => 1, 'owner_id' => $owner_id])->result_array();
        foreach ($foodtrucks as $foodtruck) {
            if (!in_array($foodtruck['id'], $foodtruck_ids)) {
                array_push($foodtruck_ids, $foodtruck['id']);
            }
        }
        return $foodtruck_ids;
    }

    public function get_foodtruck_ids_by_owner_id($owner_id)
    {
        $foodtruck_ids = [];
        $foodtrucks = $this->db->get_where('foodtrucks', ['owner_id' => $owner_id])->result_array();
        foreach ($foodtrucks as $foodtruck) {
            if (!in_array($foodtruck['id'], $foodtruck_ids)) {
                array_push($foodtruck_ids, $foodtruck['id']);
            }
        }
        return $foodtruck_ids;
    }

    /**
     * GET PLAIN FOODTRUCK IDS AS A NUMERIC ARRAY LIKE [1,2,3,4]
     *
     * @return array
     */
    public function get_pending_foodtruck_ids_by_owner_id($owner_id)
    {
        $foodtruck_ids = [];
        $foodtrucks = $this->db->get_where('foodtrucks', ['status' => 0, 'owner_id' => $owner_id])->result_array();
        foreach ($foodtrucks as $key => $foodtruck) {
            if (!in_array($foodtruck['id'], $foodtruck_ids)) {
                array_push($foodtruck_ids, $foodtruck['id']);
            }
        }
        return $foodtruck_ids;
    }


    /**
     * FILTER FOODTRUCKS FOR FRONTEND
     */

    public function filter_foodtruck_frontend()
    {

        $search_latitude   = nuller(sanitize($this->input->get('search_latitude')));
        $search_longitude   = nuller(sanitize($this->input->get('search_longitude')));
        $event_date   = nuller(sanitize($this->input->get('event_date')));
        $event_time   = nuller(sanitize($this->input->get('event_time')));
        $number_of_attendees   = nuller(sanitize($this->input->get('number_people')));
  
        $foodtrucks_by_event_location = array();
        $foodtrucks_by_event_location_and_event_date_and_event_time = array();
        $unavailable_foodtrucks = array();
        $available_foodtrucks = array();
        $filtered_foodtrucks = array();


        $where =" where 1 ";

        if($number_of_attendees) {
            $where .= "and number_of_attendees='$number_of_attendees'";
        }
        
        $sql = "select * from " . $this->table . $where;
        $query = $this->db->query($sql);
        $result = $query->result_array(); // result by number of attendees


        // filter by event date and event time
        foreach ($result as $row) {
            if($event_date) {
                if (strpos($row['schedule'], $event_date) == false) {
                    if ($event_time) {
                        if (strpos($row['mealtimes'], $event_time)) {
                            array_push($available_foodtrucks, $row['id']);
                        } else {
                            array_push($unavailable_foodtrucks, $row['id']);
                        }
                    } else {
                        array_push($available_foodtrucks, $row['id']);
                    }
                } else {
                    array_push($unavailable_foodtrucks, $row['id']);
                }
            } else if ($event_time) {
                if (strpos($row['mealtimes'], $event_time)) {
                    array_push($available_foodtrucks, $row['id']);
                } else {
                    array_push($unavailable_foodtrucks, $row['id']);
                }
            } else {
                array_push($foodtrucks_by_event_location_and_event_date_and_event_time, $row['id']);
            }
        }
        if($event_date || $event_time) {
            $foodtrucks_by_event_location_and_event_date_and_event_time = array_merge($available_foodtrucks, $unavailable_foodtrucks);
        }
       

        // foodtrucks by event location
        if ($search_latitude && $search_longitude) {
            $lat1 = $search_latitude;
            $lng1 = $search_longitude;
            foreach ($result as $row) {
                $lat2 = $row['latitude'];
                $lng2 = $row['longitude'];

                //Calculate between given zip code and foodtruck zip code.
                $unit = 'mile';

                $theta = $lng1 - $lng2;
                $dist = sin(deg2rad((double)$lat1)) * sin(deg2rad((double)$lat2))+cos(deg2rad((double)$lat1))*cos(deg2rad((double)$lat2))*cos(deg2rad((double)$theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                // $distance = round($dist*60*1.1515*1.609344); // unit: km
                $distance = round($dist*60*1.1515); // unit: mile

                if ($distance < $row['serve_radius']) {
                    array_push($foodtrucks_by_event_location, $row['id']);
                }
            }
            // merge arrays
            $filtered_foodtrucks = array_intersect(array_unique($foodtrucks_by_event_location), $foodtrucks_by_event_location_and_event_date_and_event_time);
        } else {
            $filtered_foodtrucks = $foodtrucks_by_event_location_and_event_date_and_event_time;
        }

        return $filtered_foodtrucks;
    }

    public function get_foodtruck_page_styles($foodtruck_id)
    {
        $this->db->where('foodtruck_id', $foodtruck_id);
        return $this->db->get('foodtruck_page_styles')->row();
    }

    public function reset_page_styles($foodtruck_id)
    {
        $data = array(
            'page_bg_color' => '#fff',
            'ft_name_color' => '#333',
            'menu_category_name_color' => '#1b1f23',
            'dish_name_color' => '#333',
            'ft_text_color' => '#212529',
            'dish_text_color' => '#212529',
            'bg_theme' => null,
        );
        $this->db->where('foodtruck_id', $foodtruck_id);
        $this->db->update('foodtruck_page_styles', $data);
        return true;
    }

    public function update_page_styles($foodtruck_id)
    {
        $styles['page_bg_color'] = required($this->input->post('page_bg_color'));
        $styles['ft_name_color'] = required($this->input->post('ft_name_color'));
        $styles['menu_category_name_color'] = required($this->input->post('menu_category_name_color'));
        $styles['dish_name_color'] = required($this->input->post('dish_name_color'));
        $styles['ft_text_color'] = required($this->input->post('ft_text_color'));
        $styles['dish_text_color'] = required($this->input->post('dish_text_color'));
        $styles['bg_theme'] = $this->input->post('theme');
        $this->db->where('foodtruck_id', $foodtruck_id);
        $this->db->update('foodtruck_page_styles', $styles);
        return true;
    }
}
