<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : BookingFoodTrucks
 * Date : 27 - June - 2020
 * Author : TheDevs
 * Menu Controller controlls the Food Menu
 */

include 'Authorization.php';

class Menu extends Authorization
{
    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
        authorization(['admin', 'owner'], true);
    }

    // index function is responsible for showing the index page.
    function index()
    {
        /** CHECK IF THE USER HAS ACCESS TO SEE THIS **/
        if (isset($_GET['foodtruck_id']) && $_GET['foodtruck_id'] != "all") {
            if (!has_access('foodtrucks', $_GET['foodtruck_id'])) {
                error(get_phrase('you_are_not_authorized_for_this_action'), site_url('menu'));
            }
        }

        $page_data['foodtruck_id'] = isset($_GET['foodtruck_id']) ? sanitize($_GET['foodtruck_id']) : "all";
        $page_data['category_id']   = isset($_GET['category_id']) ? sanitize($_GET['category_id']) : "all";
        $page_data['page_name'] = 'menu/index';
        $page_data['page_title'] = get_phrase('food_menu');
        $page_data['foodtrucks'] = $this->foodtruck_model->get_all_approved();
        $page_data['categories']  = $this->category_model->get_all();

        if ($this->logged_in_user_role == "admin") {
            $conditions = array(
                'foodtruck_id' => $page_data['foodtruck_id'] == "all" ? null : $page_data['foodtruck_id'],
                'category_id' => $page_data['category_id'] == "all" ? null : $page_data['category_id']
            );
        } else {
            $approved_foodtruck_ids = $this->foodtruck_model->get_approved_foodtruck_ids_by_owner_id($this->logged_in_user_id);
            $approved_foodtruck_ids = count($approved_foodtruck_ids) > 0 ? $approved_foodtruck_ids : [null];
            $conditions = array(
                'foodtruck_id' => $page_data['foodtruck_id'] == "all" ? $approved_foodtruck_ids : $page_data['foodtruck_id'],
                'category_id' => $page_data['category_id'] == "all" ? null : $page_data['category_id']
            );
        }


        /**PAGINATION STARTS**/
        $menus = $this->menu_model->get_menu_by_condition($conditions);
        $total_rows = count($menus);
        $page_size = 12;
        $config = pagintaion($total_rows, $page_size, site_url('menu/index'));
        $current_page = sanitize($this->input->get('page', 0));
        $this->pagination->initialize($config);
        /**PAGINATION ENDS**/

        $page_data['menus'] =  $this->menu_model->merger($this->menu_model->paginate($page_size, $current_page, $conditions));
        $this->load->view('backend/index', $page_data);
    }

    // Create function is responsible for showing the menu creation page.
    function create()
    {
        $page_data['page_name'] = 'menu/create';
        $page_data['page_title'] = get_phrase('create_new_menu');
        $page_data['categories'] = $this->category_model->get_all();
        $page_data['foodtrucks'] = $this->foodtruck_model->get_all_approved();
        $this->load->view('backend/index', $page_data);
    }

    // Edit function is responsible for showing the menu edit page.
    function edit($id, $active_tab = 'basic')
    {
        $page_data['foodtrucks'] = $this->foodtruck_model->get_all_approved();
        $page_data['categories']  = $this->category_model->get_all();
        $page_data['id'] = $id;
        $page_data['menu_data'] = $this->menu_model->get_by_id($id);
        $page_data['page_name'] = 'menu/edit';
        $page_data['page_title'] = $page_data['menu_data']['name'];
        $this->load->view('backend/index', $page_data);
    }

    // store function is responsible for storing the menu data.
    function store()
    {
        $response = $this->menu_model->store();
        if ($response) {
            success(get_phrase('menu_added_successfully'), site_url('menu'));
        }
    }

    // Update function is responsible for updating the menu data.
    function update()
    {
        $response = $this->menu_model->update();
        if ($response) {
            success(get_phrase('menu_updated_successfully'), site_url('menu'));
        }
    }

    // Delete function is responsible for deleting the menu data.
    function delete($id)
    {
        $response = $this->menu_model->delete($id);
        if ($response) {
            success(get_phrase('menu_delete_successfully'), site_url('menu'));
        }
    }
}
