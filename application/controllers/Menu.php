<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Menu extends Authorization_Controller
{
    public function __construct()
    {
        parent::__construct();
        authorization(['superadmin', 'owner'], true);
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
        $page_data['page_name'] = 'menu/catering_menu';
        $page_data['page_title'] = 'Catering Menu';
        $page_data['foodtrucks'] = $this->foodtruck_model->get_all();
        $page_data['categories']  = $this->category_model->get_all();

        if ($this->loggedin_user_role == "admin") {
            $conditions = array(
                'foodtruck_id' => $page_data['foodtruck_id'] == "all" ? null : $page_data['foodtruck_id'],
                'category_id' => $page_data['category_id'] == "all" ? null : $page_data['category_id']
            );
        } else {
            $foodtruck_ids = $this->foodtruck_model->get_foodtruck_ids_by_owner_id($this->loggedin_user_id);
            $foodtruck_ids = count($foodtruck_ids) > 0 ? $foodtruck_ids : [null];
            $conditions = array(
                'foodtruck_id' => $page_data['foodtruck_id'] == "all" ? $foodtruck_ids : $page_data['foodtruck_id'],
                'category_id' => $page_data['category_id'] == "all" ? null : $page_data['category_id']
            );
        }


        /**PAGINATION STARTS**/
        $menus = $this->menu_model->get_menu_by_condition($conditions);
        $total_rows = count($menus);
        $page_size = 12;
        $config = pagintaion($total_rows, $page_size, site_url('catering-menu'));
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
        $page_data['foodtrucks'] = $this->foodtruck_model->get_all();
        $this->load->view('backend/index', $page_data);
    }

    // Edit function is responsible for showing the menu edit page.
    function edit($id)
    {
        $page_data['foodtrucks'] = $this->foodtruck_model->get_all();
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
            success(get_phrase('dish_added_successfully'), site_url('catering-menu'));
        }
    }

    // Update function is responsible for updating the menu data.
    function update()
    {
        $menu_id = required(sanitize($this->input->post('id')));
        $response = $this->menu_model->update();
        if ($response) {
            success(get_phrase('menu_updated_successfully'), site_url('menu/edit/'.$menu_id));
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
