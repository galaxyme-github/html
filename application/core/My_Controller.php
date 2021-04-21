<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    /**
     * Product name: BookingFoodTrucks
     * Date : 8th April 2021
     * Author : Zita Yevloyeva
     */

    protected $loggedin_user_id;
    protected $loggedin_user_role;

    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->library('session');

        $this->loggedin_user_id = get_loggedin_user_id();
        $this->loggedin_user_role = get_loggedin_user_role();

        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        // Set the timezone
        date_default_timezone_set(get_system_settings('timezone'));

        // Load models
        $models = array(
            'Auth_model' => 'auth_model',
            'User_model' => 'user_model',
            'Cuisine_model' => 'cuisine_model',
            'Category_model' => 'category_model',
            'Foodtruck_model' => 'foodtruck_model',
            'Menu_model' => 'menu_model',
            'Settings_model' => 'settings_model',
            'Customer_model' => 'customer_model',
            'Member_model' => 'member_model',
            'Language_model' => 'language_model',
            'Payment_model' => 'payment_model',
            'Owner_model' => 'owner_model',
            'Cart_model' => 'cart_model',
            'Order_model' => 'order_model',
            'Review_model' => 'review_model',
            'Favourite_model' => 'favourite_model',
            'Report_model' => 'report_model',
            'Email_model' => 'email_model',
            'Checkout_model' => 'checkout_model',
            'Total_model' => 'total_model',
        );
        $this->load->model($models);
    }
}

class Authorization_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!is_loggedin()) {
            $this->session->set_userdata('redirect_url', current_url());
            redirect(site_url('auth'), 'refresh');
        }
    }
}