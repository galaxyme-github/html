<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <!-- Custom Tabs -->
        <div class="card">
            <div class="card-header d-flex p-0">
                <ul class="nav nav-pills p-2">
                    <li class="nav-item"><a href="#basic" class="nav-link active" data-toggle="tab"><?php echo get_phrase('basic_data') ?></a></li>
                    <li class="nav-item"><a href="#details" class="nav-link" data-toggle="tab"><?php echo get_phrase('details') ?></a></li>
                    <li class="nav-item"><a href="#servings-price" class="nav-link" data-toggle="tab"><?php echo get_phrase('servings_and_price', true) ?></a></li>
                    <li class="nav-item"><a href="#gallery" class="nav-link" data-toggle="tab"><?php echo get_phrase('gallery') ?></a></li>
                    <li class="nav-item"><a href="#finish" class="nav-link" data-toggle="tab"><?php echo get_phrase('finish') ?></a></li>
                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link text-white btn btn-danger ml-2" onclick="confirm_modal('<?php echo site_url('menu/delete/' . sanitize($id)); ?>')"><?php echo get_phrase('delete_this_menu') ?></a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <form action="<?php echo site_url('menu/update'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo sanitize($id); ?>">
                    <div class="tab-content">
                        <div class="tab-pane active" id="basic">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name"><?php echo get_phrase("menu_name"); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo "E.g : " . get_phrase("Chicken_Steak_Grilled_Burger"); ?>" value="<?php echo sanitize($menu_data['name']); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label id="category_id"><?php echo get_phrase("menu_category"); ?> <span class="text-danger">*</span></label> <small class="float-right"><a href="<?php echo site_url('category/create'); ?>"><?php echo get_phrase("create_new_category"); ?></a></small>
                                        <select class="form-control select2 w-100" id="category_id" name="category_id">
                                            <?php foreach ($categories as $category) : ?>
                                                <option value="<?php echo sanitize($category['id']); ?>" <?php if ($menu_data['category_id'] == $category['id']) echo "selected"; ?>><?php echo sanitize($category['name']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="foodtruck_id"><?php echo get_phrase("foodtruck"); ?> <span class="text-danger">*</span></label> <small class="float-right"><a href="<?php echo site_url('foodtruck/create'); ?>"><?php echo get_phrase("create_new_foodtruck"); ?></a></small>
                                        <select class="form-control select2 w-100" id="foodtruck_id" name="foodtruck_id">
                                            <?php foreach ($foodtrucks as $key => $foodtruck) : ?>
                                                <option value="<?php echo sanitize($foodtruck['id']); ?>" <?php if ($menu_data['foodtruck_id'] == $foodtruck['id']) echo "selected"; ?>><?php echo sanitize($foodtruck['name']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" name="availability" type="checkbox" id="availability" <?php if ($menu_data['availability']) echo "checked"; ?>>
                                        <label for="availability" class="custom-control-label"><?php echo get_phrase("it_is_available"); ?> <small>( <?php echo get_phrase('uncheck') . ', ' . get_phrase('if_it_is_out_of_stock'); ?> )</small></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="details">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="items"><?php echo get_phrase("items"); ?></label>
                                        <input type="text" data-role="tagsinput" id="items" class="form-control" data-removeBtn="true" name="items" placeholder="<?php echo get_phrase("insert_an_item_and_press_enter"); ?> ( burger, pizza, cold drinks)" value="<?php echo sanitize($menu_data['items']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="details"><?php echo get_phrase("menu_details"); ?></label>
                                        <textarea name="details" class="form-control" id="details" rows="5" placeholder="E.g : <?php echo get_phrase('Consists_of_fried_rice_chicken_curry_and_coleslaw_salad'); ?>."><?php echo sanitize($menu_data['details']); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="nutrition_face"><?php echo get_phrase("nutrition_fact"); ?></label>
                                        <table id="tabular-input" class="data-table data-table-horizontal data-table-highlight">
                                            <tbody>
                                                <?php $nutrition_facts = json_decode($menu_data['nutrition_fact'], true);
                                                foreach ($nutrition_facts as $key => $nutrition_fact) : ?>
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="nutrition_key[]" placeholder="<?php echo "E.g : " . get_phrase("protien"); ?>" value="<?php echo sanitize($key); ?>"></td>
                                                        <td><input type="text" class="form-control" name="nutrition_value[]" placeholder="13 gm" value="<?php echo sanitize($nutrition_fact); ?>"></td>
                                                        <td><a type="button" class="btn btn-default" value="Delete" onclick="deleteRow(this)"><i class="fas fa-trash"></i></a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <div class="float-right mt-3">
                                            <button type="button" class="btn btn-info btn-sm" onclick="addRow('tabular-input')"><?php echo get_phrase('add_new_row'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="servings-price">
                            <div class="row">
                                <div class="col-lg-6">

                                    <?php
                                    $discount_flag_decodable = json_decode($menu_data['has_discount'], true);
                                    $actual_price_decodable = json_decode($menu_data['price'], true);
                                    $discounted_price_decodable = json_decode($menu_data['discounted_price'], true);
                                    ?>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="menu_servings_plate" id="menu_servings_plate" value="1" onchange="toggleMenuPriceArea(this)" <?php if ($menu_data['servings'] == "plate") echo "checked"; ?>>
                                        <label class="custom-control-label" for="menu_servings_plate"><?php echo get_phrase('check_if_the_menu_servings_is') . ' ' . get_phrase("plate") . ' (' . get_phrase('example') . ': ' . get_phrase('full_plate_and_half_plate') . ')'; ?></label>
                                    </div>
                                    <br>
                                    <!-- PER MENU PRICE AREA -->
                                    <div id="per_menu_price_area" class="<?php if ($menu_data['servings'] == "plate") echo "hidden"; ?>">
                                        <div class="form-group">
                                            <label for="per_menu_price"><?php echo get_phrase("menu_price") . ' (' . currency_code_and_symbol('code') . ')'; ?> <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="per_menu_price" name="per_menu_price" placeholder="<?php echo get_phrase('enter_menu_price'); ?>" min="0" value="<?php echo sanitize($menu_data['servings']) == "menu" ? sanitize($actual_price_decodable['menu']) : 0;  ?>">
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="per_menu_discount_flag" id="per_menu_discount_flag" value="1" <?php echo ($menu_data['servings'] == "menu" && $discount_flag_decodable['menu']) ? "checked" : "";  ?>>
                                            <label class="custom-control-label" for="per_menu_discount_flag"><?php echo get_phrase('check_if_this_menu_has_discount'); ?></label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="per_menu_discounted_price"><?php echo get_phrase("discounted_price") . ' (' . currency_code_and_symbol('code') . ')'; ?></label>
                                            <input type="number" class="form-control" name="per_menu_discounted_price" id="per_menu_discounted_price" min="0" value="<?php echo sanitize($menu_data['servings']) == "menu" ? sanitize($discounted_price_decodable['menu']) : 0;  ?>">
                                            <small class="text-muted"><?php echo get_phrase('this_menu_has'); ?>
                                                <span id="per_menu_discounted_percentage" class="text-danger">
                                                    <?php
                                                    if ($menu_data['servings'] == "menu") {
                                                        echo discount_percentage($actual_price_decodable['menu'], $discounted_price_decodable['menu']);
                                                    } else {
                                                        echo 0;
                                                    }
                                                    ?>%
                                                </span> <?php echo get_phrase('discount'); ?></small>
                                        </div>
                                    </div>

                                    <!-- PER PLATE PRICE AREA -->
                                    <div id="per_plate_price_area" class="<?php if ($menu_data['servings'] == "menu") echo "hidden"; ?>">

                                        <!--  FULL PLATE PRICE AREA -->
                                        <div class="form-group">
                                            <label for="full_plate_price"><?php echo get_phrase("full_plate_price") . ' (' . currency_code_and_symbol('code') . ')'; ?> <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="full_plate_price" name="full_plate_price" onkeyup="calculateDiscountPercentage('full_plate')" placeholder="<?php echo get_phrase('enter_full_plate_price'); ?>" min="0" value="<?php echo sanitize($menu_data['servings']) == "plate" ? sanitize($actual_price_decodable['full_plate']) : 0;  ?>">
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="full_plate_discount_flag" id="full_plate_discount_flag" value="1" <?php echo ($menu_data['servings'] == "plate" && $discount_flag_decodable['full_plate']) ? "checked" : "";  ?>>
                                            <label class="custom-control-label" for="full_plate_discount_flag"><?php echo get_phrase('check_if_it_has_discount'); ?></label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="full_plate_discounted_price"><?php echo get_phrase("discounted_price") . ' (' . currency_code_and_symbol('code') . ')'; ?></label>
                                            <input type="number" class="form-control" name="full_plate_discounted_price" id="full_plate_discounted_price" onkeyup="calculateDiscountPercentage('full_plate')" min="0" value="<?php echo sanitize($menu_data['servings']) == "plate" ? sanitize($discounted_price_decodable['full_plate']) : 0;  ?>">
                                            <small class="text-muted"><?php echo get_phrase('it_has'); ?>
                                                <span id="full_plate_discounted_percentage" class="text-danger">
                                                    <?php
                                                    if ($menu_data['servings'] == "plate") {
                                                        echo discount_percentage($actual_price_decodable['full_plate'], $discounted_price_decodable['full_plate']);
                                                    } else {
                                                        echo 0;
                                                    }
                                                    ?>%
                                                </span> <?php echo get_phrase('discount'); ?>
                                            </small>
                                        </div>

                                        <!--  HALF PLATE PRICE AREA -->
                                        <div class="form-group">
                                            <label for="half_plate_price"><?php echo get_phrase("half_plate_price") . ' (' . currency_code_and_symbol('code') . ')'; ?> <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="half_plate_price" name="half_plate_price" onkeyup="calculateDiscountPercentage('half_plate')" placeholder="<?php echo get_phrase('enter_half_plate_price'); ?>" min="0" value="<?php echo sanitize($menu_data['servings']) == "plate" ? $actual_price_decodable['half_plate'] : 0;  ?>">
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="half_plate_discount_flag" id="half_plate_discount_flag" value="1" <?php echo ($menu_data['servings'] == "plate" && $discount_flag_decodable['half_plate']) ? "checked" : "";  ?>>
                                            <label class="custom-control-label" for="half_plate_discount_flag"><?php echo get_phrase('check_if_it_has_discount'); ?></label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="half_plate_discounted_price"><?php echo get_phrase("discounted_price") . ' (' . currency_code_and_symbol('code') . ')'; ?></label>
                                            <input type="number" class="form-control" name="half_plate_discounted_price" id="half_plate_discounted_price" onkeyup="calculateDiscountPercentage('half_plate')" min="0" value="<?php echo sanitize($menu_data['servings']) == "plate" ? sanitize($discounted_price_decodable['half_plate']) : 0;  ?>">
                                            <small class="text-muted"><?php echo get_phrase('it_has'); ?>
                                                <span id="half_plate_discounted_percentage" class="text-danger">
                                                    <?php
                                                    if ($menu_data['servings'] == "plate") {
                                                        echo discount_percentage($actual_price_decodable['half_plate'], $discounted_price_decodable['half_plate']);
                                                    } else {
                                                        echo 0;
                                                    }
                                                    ?>%
                                                </span> <?php echo get_phrase('discount'); ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="gallery">
                            <!-- RESTAURANT THUMBNAIL -->
                            <div class="form-group">
                                <label for="food_menu_thumbnail"><?php echo get_phrase("food_menu_thumbnail"); ?> <span class="badge badge-default">(235 X 171)</span></label>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' class="imageUploadPreview" id="food_menu_thumbnail" name="food_menu_thumbnail" accept=".png, .jpg, .jpeg" />
                                        <label for="food_menu_thumbnail"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="food_menu_thumbnail_preview" thumbnail="<?php echo base_url('uploads/menu/' . sanitize($menu_data['thumbnail'])); ?>"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="finish">
                            <div class="row justify-content-center">
                                <div class="col text-center">
                                    <h1 class="my-3 text-primary"><i class="fas fa-thumbs-up"></i></h1>
                                    <h3 class="my-3 "><?php echo get_phrase('thank_you', true); ?>!</h3>
                                    <h5 class="font-weight-light"><?php echo get_phrase('you_are_just_one_click_away'); ?>...</h5>
                                    <button type="submit" class="btn btn-primary mt-5"><?php echo get_phrase('save_menu'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
    </div>
    <!--/. container-fluid -->
</section>
