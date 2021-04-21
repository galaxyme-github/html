<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @product name : BFT
 * @created : 13th April 2021
 * @author : Zita Yevloyeva
 */

class Site extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('recaptcha');
    }
    function index()
    {
        $page_data['page_name']        = 'site/index';
        $page_data['page_title']       = 'Find the best food truck service';
        $page_data['states'] = $this->total_model->state_get_all();
        $this->load->view(frontend('index'), $page_data);
    }

    // RESTAURANT FUNCTION IS FOODTRUCK FOR SHOWING THE RESTAURANT DETAILS PAGE
    function foodtruck($slug = "", $foodtruck_id = "")
    {
        $page_data['foodtruck_details'] = $this->foodtruck_model->get_by_id($foodtruck_id);
        $page_data['page_styles'] = $this->foodtruck_model->get_foodtruck_page_styles($foodtruck_id);
        $page_data['page_name']          = 'foodtruck/index';
        $page_data['page_title']         = 'Food Truck';
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
            $page_title = 'Filtered Food Trucks';
            $page_header = 'Filtered Food Trucks';
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

        $page_data['foodtrucks'] = $this->foodtruck_model->special_sort_paginate($page_size, $current_page, $condition, $order_by, $order);
        /**PAGINATION ENDS**/
        // $event_date   = nuller(sanitize($this->input->get('event_date')));
        // if ( $event_date ) {
        //     $page_date['event_date'] = $event_date;
        // }
        $event_time   = nuller(sanitize($this->input->get('event_time')));
        if ( $event_time ) {
            $page_date['event_time'] = $event_time;
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

    public function about()
    {
        $page_data['page_name'] = 'about/index';
        $page_data['page_title'] = 'About Us';
        $this->load->view(frontend('index'), $page_data);
    }

    public function how_it_works($user_type)
    {
        $page_data['page_name']        = 'how_it_works/' . $user_type;
        $page_data['page_title']       = 'How it Works';
        $this->load->view(frontend('index'), $page_data);
    }

    public function contact()
    {
        $page_data['page_name']        = 'contact/index';
        $page_data['page_title']       = 'Contact Us';
        $this->load->view(frontend('index'), $page_data);
    }

    public function guarantee()
    {
        $page_data['page_name']        = 'guarantee/index';
        $page_data['page_title']       = 'BFT Guarantee';
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
        $page_data['page_title']       = 'Privacy Policy';
        $this->load->view(frontend('index'), $page_data);
    }

    public function terms()
    {
        $page_data['page_name']        = 'terms/index';
        $page_data['page_title']       = 'Terms of Service';
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
        $page_data['page_title']         = 'Food Truck';
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
    public function become_bft_member()
    {
        $page_data['page_name'] = 'become_bft_member/index';
        $page_data['page_title'] = 'Become a BFT Member';

        $this->load->view(frontend('index'), $page_data);
    }

    /**
     * FOODTRUCKS IN A STATE
     */
    public function state_foodtrucks($country_abbr, $state_abbr)
    {
        $state_full_name = get_state_full_name($country_abbr, $state_abbr);

        $page_data['page_name'] = 'state_foodtrucks/index';
        $page_data['page_title'] = "Catering Foodtrucks by City in " . $state_full_name;
        $page_data['area'] = array(
            "state_full_name" => $state_full_name, 
            "state_abbr" => $state_abbr, 
            "country_abbr" => $country_abbr
        );

        $this->load->view(frontend('no_footer_index'), $page_data);
    }

    // THIS FUNCTION FOR APPLYING TO BECOME A FOOD TRUCK MEMBER
    public function join_request()
    {
        $this->member_model->join_request();
    }
}

/* End of file Site.php */
