<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header bft-card-header">
                        <ul class="nav nav-pills p-2">
                            <h4>Edit <span class="text-info"><?=$page_title;?></span>s</h4>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo site_url('menu/update'); ?>" method="post" enctype="multipart/form-data">
                            <?php echo $this->app_lib->generateCSRF(); ?>
                            <input type="hidden" name="id" value="<?php echo sanitize($id); ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">Dish Name <span class="text-success">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo "E.g : " . get_phrase("Chicken_Steak_Grilled_Burger"); ?>"  value="<?php echo sanitize($menu_data['name']); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label id="category_id">Menu Category <span class="text-success">*</span></label> <small class="float-right"></small>
                                        <select class="form-control select2 w-100" id="category_id" name="category_id">
                                            <?php foreach ($categories as $category) : ?>
                                                <option value="<?php echo sanitize($category['id']); ?>" <?php if ($menu_data['category_id'] == $category['id']) echo "selected"; ?>><?php echo sanitize($category['name']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="foodtruck_id"><?php echo get_phrase("foodtruck"); ?> <span class="text-success">*</span> <small>( <?php echo get_phrase("you_can_choose_multiple_foodtrucks"); ?> )</small> </label> <small class="float-right"></small>
                                        <select class="form-control select2 w-100" id="foodtruck_id" name="foodtruck_id">
                                            <?php foreach ($foodtrucks as $key => $foodtruck) : ?>
                                                <option value="<?php echo sanitize($foodtruck['id']); ?>" <?php if ($menu_data['foodtruck_id'] == $foodtruck['id']) echo "selected"; ?>><?php echo sanitize($foodtruck['name']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Dish Summary</label>
                                        <textarea name="details" class="form-control" id="details" rows="5" placeholder="E.g : <?php echo get_phrase('Consists_of_fried_rice_chicken_curry_and_coleslaw_salad'); ?>."><?php echo sanitize($menu_data['details']); ?></textarea>
                                    </div>
                                    
                                    <?php
                                    $discount_flag_decodable = json_decode($menu_data['has_discount'], true);
                                    $actual_price_decodable = json_decode($menu_data['price'], true);
                                    $discounted_price_decodable = json_decode($menu_data['discounted_price'], true);
                                    ?>
                                    <!-- PER MENU PRICE AREA -->
                                    <div id="per_menu_price_area" class="<?php if ($menu_data['servings'] == "plate") echo "hidden"; ?>">
                                        <div class="form-group">
                                            <label for="per_menu_price"><?php echo get_phrase("menu_price") . ' (' . currency_code_and_symbol('code') . ')'; ?> <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="per_menu_price" name="per_menu_price" onkeyup="calculateDiscountPercentage('per_menu')" placeholder="<?php echo get_phrase('enter_menu_price'); ?>" min="0" value="<?php echo sanitize($menu_data['servings']) == "menu" ? sanitize($actual_price_decodable['menu']) : 0;  ?>">
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="per_menu_discount_flag" id="per_menu_discount_flag" value="1" <?php echo ($menu_data['servings'] == "menu" && $discount_flag_decodable['menu']) ? "checked" : "";  ?>>
                                            <label class="custom-control-label" for="per_menu_discount_flag"><?php echo get_phrase('check_if_this_menu_has_discount'); ?></label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="per_menu_discounted_price"><?php echo get_phrase("discounted_price") . ' (' . currency_code_and_symbol('code') . ')'; ?></label>
                                            <input type="number" class="form-control" name="per_menu_discounted_price" id="per_menu_discounted_price" onkeyup="calculateDiscountPercentage('per_menu')" min="0" value="<?php echo sanitize($menu_data['servings']) == "menu" ? $discounted_price_decodable['menu'] : 0;  ?>">
                                            <small class="text-muted"><?php echo get_phrase('this_menu_has'); ?>
                                                <span id="per_menu_discounted_percentage" class="text-danger">
                                                    <?php
                                                    if ($menu_data['servings'] == "menu") {
                                                        echo sanitize(discount_percentage($actual_price_decodable['menu'], $discounted_price_decodable['menu']));
                                                    } else {
                                                        echo 0;
                                                    }
                                                    ?>%
                                                </span> <?php echo get_phrase('discount'); ?></small>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" name="availability" type="checkbox" id="availability" <?php if ($menu_data['availability']) echo "checked"; ?>>
                                        <label for="availability" class="custom-control-label"><?php echo get_phrase("it_is_available"); ?> <small>( <?php echo get_phrase('uncheck') . ', ' . get_phrase('if_it_is_out_of_stock'); ?> )</small></label>
                                    </div>
                                    <button type="submit" class="btn ft-hero-btn mt-5"><?php echo get_phrase('save'); ?></button>
                                </div>
                            </div>
                        </form>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
