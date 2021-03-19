<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Product name : BookingFoodTrucks
 * Date : 28 - June - 2020
 * Author : TheDevs
 * Menu model handles all the database queries of Menu
 */
class Menu_model extends Base_model
{
    // DEFAULT CONSTRUCTOR. FOR INITIALIZING THE TABLE NAME
    function __construct()
    {
        parent::__construct();
        $this->table = "food_menus";
    }

    // GET ALL THE FOOD MENUS
    public function get_all()
    {
        $this->db->order_by("id", "desc");
        $menus = $this->db->get($this->table);
        return $this->merger($menus);
    }

    // GET MENU BY ID
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $menu = $this->db->get($this->table);
        return $this->merger($menu, true);
    }

    // GET MENU BY CONDITIONS ARRAY
    public function get_menu_by_condition($conditions = [])
    {
        foreach ($conditions as $key => $value) {
            if (!is_null($value)) {
                if (is_array($value)) {
                    if (count($value)) {
                        $this->db->where_in($key, $value);
                    } else {
                        return array();
                    }
                } else {
                    $this->db->where($key, $value);
                }
            }
        }

        $menus = $this->db->get($this->table);
        return $this->merger($menus);
    }

    // MERGER FUNCTION IS FOR MERGING NECESSARY DATA
    public function merger($query_obj, $is_single_row = false)
    {
        if (!$is_single_row) {
            $menus = $query_obj->result_array();
            foreach ($menus as $key => $menu) {
                $category_data = $this->category_model->get_by_id($menu['category_id']);
                $foodtruck_data = $this->foodtruck_model->get_by_id($menu['foodtruck_id']);
                $menus[$key]['category_name']  = $category_data['name'];
                $menus[$key]['foodtruck_name']  = $foodtruck_data['name'];
            }

            return $menus;
        } else {
            $menu = $query_obj->row_array();
            $category_data = $this->category_model->get_by_id($menu['category_id']);
            $menu['category_name']  = $category_data['name'];
            $foodtruck_data = $this->foodtruck_model->get_by_id($menu['foodtruck_id']);
            $menu['foodtruck_name']  = $foodtruck_data['name'];
            return $menu;
        }
    }

    // STORE MENU DATA
    public function store()
    {
        $foodtrucks = (isset($_POST['foodtruck_id']) && !empty($_POST['foodtruck_id'])) ? sanitize_array($this->input->post('foodtruck_id')) : array();
        if (!count($foodtrucks)) {
            error(get_phrase("you_have_to_choose_at_least_one_foodtruck"), site_url("menu/create"));
        }

        // GET THUMBNAIL FOR ONE TIME. IT DOES NOT WORK INSIDE FOREACH LOOP.
        $gallery_data = $this->store_gallery_data();

        // FOREACH LOOP FOR MULTIPLE RESTAURANTS
        foreach ($foodtrucks as $foodtruck) {
            $foodtruck_data['foodtruck_id'] = required($foodtruck);
            $basic_data = $this->store_basic_data();
            $details_data = $this->store_details_data();
            $servings_and_price_data = $this->store_servings_and_price_data();
            $data = array_merge($foodtruck_data, $basic_data, $details_data, $servings_and_price_data, $gallery_data);
            $data['created_at'] = strtotime(date('D, d-M-Y'));
            $this->db->insert($this->table, $data);
        }

        return true;
    }

    // UPDATE MENU DATA
    public function update()
    {
        $menu_id = required(sanitize($this->input->post('id')));
        $previous_data = $this->get_by_id($menu_id);

        if (!empty($_FILES['food_menu_thumbnail']['name'])) {
            $gallery_data['thumbnail']  = $this->upload('menu', $_FILES['food_menu_thumbnail'], $previous_data["thumbnail"]);
        } else {
            $gallery_data['thumbnail']  = $previous_data["thumbnail"];
        }
        $foodtruck_data['foodtruck_id'] = required(sanitize($this->input->post('foodtruck_id')));
        $basic_data = $this->store_basic_data();
        $details_data = $this->store_details_data();
        $servings_and_price_data = $this->store_servings_and_price_data();
        $data = array_merge($foodtruck_data, $basic_data, $details_data, $servings_and_price_data, $gallery_data);
        $data['updated_at'] = strtotime(date('D, d-M-Y'));

        $this->db->where('id', $menu_id);
        $this->db->update($this->table, $data);
        return true;
    }

    // STORE MENU'S BASIC DATA
    public function store_basic_data()
    {
        $data['name'] = required(sanitize($this->input->post('name')));
        $data['category_id'] = required(sanitize($this->input->post('category_id')));
        $data['availability'] = isset($_POST['availability']) ? 1 : 0;
        $data['slug'] = slugify(sanitize($this->input->post('name')));
        return $data;
    }

    // STORE MENU'S DETAILS DATA LIKE ITEMS, MENU DETAILS AND NUTRITION FACTS
    public function store_details_data()
    {
        $data['items'] = sanitize($this->input->post('items'));
        $data['details'] = sanitize($this->input->post('details'));

        $nutrition_key = sanitize_array($this->input->post('nutrition_key'));
        $nutrition_value = sanitize_array($this->input->post('nutrition_value'));

        foreach ($nutrition_key as $key => $key) {
            $nutrition_fact[$nutrition_key[$key]] = $nutrition_value[$key];
        }
        $data['nutrition_fact'] = json_encode($nutrition_fact);
        return $data;
    }

    // STORE MENU'S SERVINGS AND PRICES
    public function store_servings_and_price_data()
    {
        if (isset($_POST['menu_servings_plate'])) {
            $full_plate_price = required(sanitize($this->input->post('full_plate_price')));
            $full_plate_discount_flag = isset($_POST['full_plate_discount_flag']) ? 1 : 0;
            $full_plate_discounted_price = sanitize($this->input->post('full_plate_discounted_price'));

            $half_plate_price = required(sanitize($this->input->post('half_plate_price')));
            $half_plate_discount_flag = isset($_POST['half_plate_discount_flag']) ? 1 : 0;
            $half_plate_discounted_price = sanitize($this->input->post('half_plate_discounted_price'));

            $data['servings'] = 'plate';
            $data['has_discount'] = json_encode(array('full_plate' => $full_plate_discount_flag, 'half_plate' => $half_plate_discount_flag));
            $data['price'] = json_encode(array('full_plate' => $full_plate_price, 'half_plate' => $half_plate_price));
            $data['discounted_price'] = json_encode(array('full_plate' => $full_plate_discounted_price, 'half_plate' => $half_plate_discounted_price));
        } else {
            $menu_price = required(sanitize($this->input->post('per_menu_price')));
            $menu_discount_flag = isset($_POST['per_menu_discount_flag']) ? 1 : 0;
            $menu_discounted_price = sanitize($this->input->post('per_menu_discounted_price'));

            $data['servings'] = 'menu';
            $data['has_discount'] = json_encode(array('menu' => $menu_discount_flag));
            $data['price'] = json_encode(array('menu' => $menu_price));
            $data['discounted_price'] = json_encode(array('menu' => $menu_discounted_price));
        }

        return $data;
    }

    // STORE MENU'S IMAGE DATA
    public function store_gallery_data()
    {
        $data['thumbnail']  = $this->upload('menu', $_FILES['food_menu_thumbnail']);
        return $data;
    }
}

/* End of file Menu_model.php */
