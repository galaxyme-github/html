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
        $data['schedule']  = required(json_encode($this->input->post('service_time')));
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
        $data['schedule']  = required(json_encode($this->input->post('service_time')));
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
        // $cuisine    = nuller(sanitize($this->input->get('cuisine')));
        // $category   = nuller(sanitize($this->input->get('category')));
        $search_string   = nuller(sanitize($this->input->get('query')));

        // $address    = nuller(sanitize($this->input->get('address')));
        // $search_input_zipcode = nuller(sanitize($this->input->get('search_input_zipcode')));
        $search_latitude   = nuller(sanitize($this->input->get('search_latitude')));
        $search_longitude   = nuller(sanitize($this->input->get('search_longitude')));
        $event_date   = nuller(sanitize($this->input->get('event_date')));
        $event_time   = nuller(sanitize($this->input->get('event_time')));
        $number_people   = nuller(sanitize($this->input->get('number_people')));
        // $event_week_name = strtolower(date("l", strtotime($event_date))) . "_opening";

        $filtered_foodtruck_ids_nearby_location = array();
        $foodtruck_ids_have_amount_of_persons_and_event_week_name = array();
        $not_available_foodtruck_ids = array();
        $available_foodtruck_ids = array();
        $filtered_foodtruck_ids = array();
        $foodtruck_ids_have_cuisine = array();
        $foodtruck_ids_have_category = array();
        $foodtruck_ids_have_search_string = array();
        
        $foodtruck_ids_have_city_zip = array();
        $foodtruck_ids_have_event_week_name = array();
        $foodtruck_ids_have_amount_of_persons = array();


        // if ($category) {
        //     $this->db->distinct();
        //     $this->db->select('foodtruck_id');
        //     $query = $this->db->get_where('food_menus', ['category_id' => $category])->result_array();
        //     foreach ($query as $row) {
        //         if (!in_array($row['foodtruck_id'], $foodtruck_ids_have_category)) {
        //             array_push($foodtruck_ids_have_category, $row['foodtruck_id']);
        //         }
        //     }
        // }

        // if ($cuisine) {
        //     $query = $this->db->get_where($this->table, ['status' => 1])->result_array();
        //     foreach ($query as $row) {
        //         $cuisines = json_decode($row['cuisine']);
        //         if (in_array($cuisine, $cuisines)) {
        //             if (!in_array($row['id'], $foodtruck_ids_have_cuisine)) {
        //                 array_push($foodtruck_ids_have_cuisine, $row['id']);
        //             }
        //         }
        //     }
        // }

        // if ($category && $cuisine && !$search_string) {
        //     if (count($foodtruck_ids_have_category) && count($foodtruck_ids_have_cuisine)) {
        //         $filtered_foodtruck_ids = array_intersect($foodtruck_ids_have_cuisine, $foodtruck_ids_have_category);
        //     }
        // } elseif (!$category && !$cuisine && !$search_string) {
        //     $query = $this->db->get_where($this->table, ['status' => 1])->result_array();
        //     foreach ($query as $row) {
        //         if (!in_array($row['id'], $filtered_foodtruck_ids)) {
        //             array_push($filtered_foodtruck_ids, $row['id']);
        //         }
        //     }
        // } elseif ($category && !$cuisine && !$search_string) {
        //     $filtered_foodtruck_ids = $foodtruck_ids_have_category;
        // } elseif (!$category && $cuisine && !$search_string) {
        //     $filtered_foodtruck_ids = $foodtruck_ids_have_cuisine;
        // } elseif ($search_string) {
        //     $this->db->select('id');
        //     $this->db->like('name', $search_string, 'both');
        //     $query = $this->db->get($this->table)->result_array();
        //     foreach ($query as $row) {
        //         if (!in_array($row['id'], $filtered_foodtruck_ids)) {
        //             array_push($filtered_foodtruck_ids, $row['id']);
        //         }
        //     }
        // }

        $where =" where 1 ";
        // $zip_code = "";
        // if($address){
        //     if (is_numeric(($address))) {
        //         $zip_code = $address;
        //     } else {
        //         $where .= "and city='$address' or state='$address'";
        //     }
        // }


        if($number_people) {
            $where .= "and attendees_amt='$number_people'";
        }
        
        $sql = "select * from ".$this->table.$where;
        $query = $this->db->query($sql);
        $result = $query->result_array();

        // $event_date_open_status = '"'.$event_week_name.'":"closed"';

        // foreach ($result as $row) {
        //     if($event_date) {
        //         if (strpos($row['schedule'], $event_date_open_status) == false) {
        //             array_push($available_foodtruck_ids, $row['id']);
        //         } else {
        //             array_push($not_available_foodtruck_ids, $row['id']);
        //         }
        //     } else {
        //         array_push($foodtruck_ids_have_amount_of_persons_and_event_week_name, $row['id']);
        //     }
        // }
        foreach ($result as $row) {
            if($event_time) {
                if (strpos($row['schedule'], $event_time) == false) {
                    array_push($available_foodtruck_ids, $row['id']);
                } else {
                    array_push($not_available_foodtruck_ids, $row['id']);
                }
            } else {
                array_push($foodtruck_ids_have_amount_of_persons_and_event_week_name, $row['id']);
            }
        }
        // print_r($available_foodtruck_ids);exit;
        if($event_date) {
            $foodtruck_ids_have_amount_of_persons_and_event_week_name = array_merge($available_foodtruck_ids, $not_available_foodtruck_ids);
        }
        // if ($search_input_zipcode) {
        //     // Get longitude and latitude from given zip code
        //     $url = "https://maps.googleapis.com/maps/api/geocode/json?address='".$search_input_zipcode."'&sensor=false&key=AIzaSyCvRwR3-fGr8AsnMdzmQVkgCdlWhqUiCG0";
            
        //     $curl = curl_init($url);

        //     curl_setopt($curl, CURLOPT_POST, true);
        //     curl_setopt($curl, CURLOPT_POSTFIELDS, '');
        //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($curl, CURLOPT_HEADER, false);
        //     curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        //     $json = curl_exec($curl);

        //     $decode = json_decode($json, true);

        //     $result1[]=$decode['results'][0];
        //     $result2[]=$result1[0]['geometry'];
        //     $result3[]=$result2[0]['location'];

        //     $lat1 = $result3[0]['lat'];
        //     $lon1 = $result3[0]['lng'];
            
        //     // Get array of zip codes from database.
        //     $sq_result = $this->db->get($this->table)->result_array();
        //     $mh = curl_multi_init();
        //     $handles = array();
        //     foreach ($sq_result as $row) {
        //         $zip_code = $row['zip_code'];

        //         $ch = curl_init();
        //         $handles[] = $ch;
        //         // Get longitude and latitude from zip codes foodtrucks
        //         $url = "https://maps.googleapis.com/maps/api/geocode/json?address='".$zip_code."'&sensor=false&key=AIzaSyCvRwR3-fGr8AsnMdzmQVkgCdlWhqUiCG0";
        

        //         curl_setopt($ch, CURLOPT_URL, $url);
        //         curl_setopt($ch, CURLOPT_POST, true);
        //         curl_setopt($ch, CURLOPT_POSTFIELDS, '');
        //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //         curl_setopt($ch, CURLOPT_HEADER, false);
        //         // curl_setopt($curl2, CURLOPT_TIMEOUT, 30);
        //         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //         curl_multi_add_handle($mh,$ch);
        //     }

        //     $running = null;
        //     do {
        //         curl_multi_exec($mh, $running);
        //     } while ($running);

        //     foreach($handles as $ch){
        //         $result = curl_multi_getcontent($ch);

        //         $decode = json_decode($result,true);

        //         foreach($decode['results'] as $result){       
        //             // array_push($final_data,$result3[0]);
        //             $lat2 = $result['geometry']['location']['lat'];
        //             $lon2 = $result['geometry']['location']['lng'];

        //             //Calculate between given zip code and foodtruck zip code.
        //             $unit = 'mile';

        //             $theta = $lon1 - $lon2;
        //             $dist = sin(deg2rad((double)$lat1)) * sin(deg2rad((double)$lat2))+cos(deg2rad((double)$lat1))*cos(deg2rad((double)$lat2))*cos(deg2rad((double)$theta));
        //             $dist = acos($dist);
        //             $dist = rad2deg($dist);
        //             // $distance = round($dist*60*1.1515*1.609344); // unit: km
        //             $distance = round($dist*60*1.1515); // unit: mile

        //             foreach ($sq_result as $row) {
        //                 if ($result['address_components'][0]['long_name'] == $row['zip_code']) {
        //                     if ($distance < $row['serve_radius']) {
        //                         array_push($filtered_foodtruck_ids_by_serve_radius, $row['id']);
        //                     }
        //                 }
        //             }

        //         }   

        //         curl_multi_remove_handle($mh, $ch);
        //         curl_close($ch);
        //     }
        //     $filtered_foodtruck_ids = array_intersect(array_unique($filtered_foodtruck_ids_by_serve_radius),$foodtruck_ids_have_amount_of_persons_and_event_week_name);
        // } else {
        //     $filtered_foodtruck_ids = $foodtruck_ids_have_amount_of_persons_and_event_week_name;
        // }

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
                    array_push($filtered_foodtruck_ids_nearby_location, $row['id']);
                }
            }
            $filtered_foodtruck_ids = array_intersect(array_unique($filtered_foodtruck_ids_nearby_location),$foodtruck_ids_have_amount_of_persons_and_event_week_name);
        } else {
            $filtered_foodtruck_ids = $foodtruck_ids_have_amount_of_persons_and_event_week_name;
        }

        return $filtered_foodtruck_ids;
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
