<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : BookingFoodTrucks
 * Date : 14 - July - 2020
 * Author : TheDevs
 * Site Controller controlls the The Frontend Stuffs
 */

include 'Base.php';
class Site extends Base
{

    // INDEX FUNCTION IS FOODTRUCK FOR SHOWING INDEX PAGE
    function index()
    {
        $page_data['page_name']        = 'site/index';
        $page_data['page_title']       = site_phrase("site", true);
        $page_data['featured_cuisines'] = $this->cuisine_model->get_featured_cuisine();
        $page_data['popular_foodtrucks'] = $this->foodtruck_model->get_popular_foodtrucks(9);
        $page_data['categories'] = $this->category_model->get_featured_categories();
        $page_data['states'] = $this->total_model->state_get_all();
        $this->load->view(frontend('index'), $page_data);
    }

    // RESTAURANT FUNCTION IS FOODTRUCK FOR SHOWING THE RESTAURANT DETAILS PAGE
    function foodtruck($slug = "", $foodtruck_id = "")
    {
        $page_data['foodtruck_details'] = $this->foodtruck_model->get_by_id($foodtruck_id);
        $page_data['page_name']          = 'foodtruck/index';
        $page_data['page_title']         = site_phrase("foodtruck", true);
        $this->load->view(frontend('index'), $page_data);
    }

    // THIS FUNCTION IS FOODTRUCK FOR SHOWING POPULAR RESTAURANT LIST
    function foodtrucks($type = "")
    {
        $page_data['cuisine']    = isset($_GET['cuisine']) ? sanitize($_GET['cuisine']) : "all";
        $page_data['category']   = isset($_GET['category']) ? sanitize($_GET['category']) : "all";
        $page_data['city_zip']    = isset($_GET['city_zip']) ? sanitize($_GET['city_zip']) : "all";
        $page_data['event_date']    = isset($_GET['event_date']) ? sanitize($_GET['event_date']) : "all";
        $page_data['number_people']   = isset($_GET['number_people']) ? sanitize($_GET['number_people']) : "all";

        if (empty($type) || $type == "popular") {
            $page_title = empty($type) ? site_phrase('foodtrucks', true) : site_phrase('popular_foodtrucks', true);
            $page_header = site_phrase('popular_foodtrucks');
            $order_by = 'rating';
            $condition['status'] = 1;
            $foodtrucks = $this->foodtruck_model->get_popular_foodtrucks();
        } elseif ($type == "recent") {
            $page_title = site_phrase('recently_added_foodtrucks', true);
            $page_header = site_phrase('recently_added_foodtrucks');
            $order_by = 'id';
            $condition['status'] = 1;
            $foodtrucks = $this->foodtruck_model->get_all_approved();
        } elseif ($type == "filter") {
            $page_title = site_phrase('filtered_foodtrucks', true);
            $page_header = site_phrase('filtered_foodtrucks');
            // $order_by = 'rating';
            $order_by = 'serve_radius';
            $order = 'asc';
            $foodtrucks = $this->foodtruck_model->filter_foodtruck_frontend(); // IT RETURNS ALL THE FILTERED FOODTRUCK'S IDS
            $condition['id'] = $foodtrucks;
        }
        /**PAGINATION STARTS**/
        $total_rows = count($foodtrucks);
        $page_size = 12;
        $pagination_url = empty($type) ? site_url('site/foodtrucks') : site_url('site/foodtrucks/' . $type);
        $config = pagintaion($total_rows, $page_size, $pagination_url);
        $current_page = sanitize($this->input->get('page', 0));
        $this->pagination->initialize($config);

        $page_data['foodtrucks'] = $this->foodtruck_model->filter_special_paginate($page_size, $current_page, $condition, $order_by, $order);
        /**PAGINATION ENDS**/
        $event_date   = nuller(sanitize($this->input->get('event_date')));
        if ( $event_date ) {
            $page_date['event_date'] = $event_date;
        }
        // get filter city name and return to search result page
        $page_data['city_name'] = $this->input->get("search_input_city_name");
        $page_data['total_rows']  = $total_rows;
        $page_data['cuisines']    = $this->cuisine_model->get_all();
        $page_data['categories']  = $this->category_model->get_all();
        $page_data['page_name']   = 'foodtrucks/index';
        $page_data['page_header'] = $page_header;
        $page_data['page_title']  = $page_title;
        $page_data['type']        = $type;
        $this->load->view(frontend('index'), $page_data);
    }

    /**
     * THIS FUNCTION IS FOODTRUCK FOR SHOWING THE ABOUT US PAGE
     *
     * @return void
     */
    public function about_us()
    {
        $page_data['page_name']        = 'about_us/index';
        $page_data['page_title']       = site_phrase("about_us", true);
        $this->load->view(frontend('index'), $page_data);
    }

    public function how_it_works()
    {
        $page_data['page_name']        = 'how_it_works/index';
        $page_data['page_title']       = site_phrase("how_it_works", true);
        $page_data['cuisines'] = $this->cuisine_model->get_all();
        $this->load->view(frontend('index'), $page_data);
    }

    public function contact_us()
    {
        $page_data['page_name']        = 'contact_us/index';
        $page_data['page_title']       = site_phrase("contact_us", true);
        $this->load->view(frontend('index'), $page_data);
    }

    public function bft_garantee()
    {
        $page_data['page_name']        = 'bft_garantee/index';
        $page_data['page_title']       = site_phrase("bft_garantee", true);
        $this->load->view(frontend('index'), $page_data);
    }

    /**
     * THIS FUNCTION IS FOODTRUCK FOR SHOWING THE PRIVACY POLICY PAGE
     *
     * @return void
     */
    public function privacy_policy()
    {
        $page_data['page_name']        = 'privacy_policy/index';
        $page_data['page_title']       = site_phrase("privacy_policy", true);
        $this->load->view(frontend('index'), $page_data);
    }

    /**
     * THIS FUNCTION IS FOODTRUCK FOR SHOWING THE TERMS AND CONDITIONS PAGE
     *
     * @return void
     */
    public function terms_and_conditions()
    {
        $page_data['page_name']        = 'terms_and_conditions/index';
        $page_data['page_title']       = site_phrase("terms_and_conditions", true);
        $this->load->view(frontend('index'), $page_data);
    }

    /**
     * THIS FUNCTION IS FOODTRUCK FOR SWITCHING LANGUAGE FROM FRONTEND
     *
     * @return void
     */
    public function site_language()
    {
        $selected_language = sanitize($this->input->post('language'));
        $this->session->set_userdata('language', $selected_language);
        echo true;
    }

    /**
     * THIS FUNCTION IS FOODTRUCK FOR SHOWING INVITE PAGE
     * 
     * @return void
     */
    public function invite_foodtruck($slug = '', $foodtruck_id = null, $type = "")
    {
        $page_data['foodtruck_details'] = $this->foodtruck_model->get_by_id($foodtruck_id);
        $page_data['page_name']          = 'foodtruck/invite';
        $page_data['page_title']         = site_phrase("foodtruck", true);
        $page_data['invite_type']        = $type;
        
        $this->load->view(frontend('index'), $page_data);
    }

    /**
     * THIS FUNCTION IS FOR SENDING INVITATION FOODTRUCK
     */
    public function send_invitation()
    {
        $invite_type = $this->input->post('invite_type');
        $truck_id = $this->input->post('truck_id');
        $dish_ids = $this->input->post('dish_id');
        $dish_amount_array = $this->input->post('dish_amount');
        $message = sanitize($this->input->post('message'));
        $event_date = sanitize($this->input->post('event_date'));
        $event_time = sanitize($this->input->post('event_time'));
        $timezone = sanitize($this->input->post('timezone'));
        $event_location = sanitize($this->input->post('event_location'));
        $attendees_num = sanitize($this->input->post('attendees_num'));

        print_r($_POST);exit;
    }

    /**
     * THIS FUNCTION IS FOR APPLY TO BECOME A FOODTRUCK MEMBER
     */
    public function become_a_member()
    {
        $page_data['page_name'] = 'apply_to_become_a_member/index';
        $page_data['page_title'] = site_phrase("become_a_foodtruck_member", true);

        $this->load->view(frontend('index'), $page_data);
    }
}

/* End of file Site.php */
