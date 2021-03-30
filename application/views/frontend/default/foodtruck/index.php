<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/light.php'; ?>

<!-- BREADCRUMb -->
<section class="light-breadcrumb">
    <div class="container">
        <div class="text-left">
            <a id="goto_search_result_page" href="">
                <i class="fa fa-angle-left"></i>
                <span id="breadcrumb_text"></span>
            </a>
        </div>
    </div>
</section>
<!-- //END BREADCRUMB -->
<!--============================= ABOUT FOOD TRUCK =============================-->
<section class="main-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="styled-name">
                    <h3><?php echo sanitize($foodtruck_details['name']); ?></h3>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <div class="styled-buttons text-uppercase">
                    <a href="#invite_section"><?php echo site_phrase('invite'); ?></a>
                    <a href="#food-menu"><?php echo site_phrase('menu'); ?></a>
                    <a href="#info"><?php echo site_phrase('information'); ?></a>
                </div>
            </div>
            <div class="col-md-12 about-text">
                <p><?=$foodtruck_details['description']?></p>
            </div>
        </div>
        <?php
            $foodtruck_galleries = !empty($foodtruck_details['gallery']) ? json_decode($foodtruck_details['gallery']) : [];
        ?>
        <div class="row justify-content-center">
            <?php for ($counter = 0; $counter < 9; $counter++): ?>
                <?php $gallery_image = isset($foodtruck_galleries[$counter]) ? $foodtruck_galleries[$counter] : "placeholder.png"; ?>
                <div class="col-md-4">
                    <div class="find-place-img_wrap">
                        <div class="grid gallery-grid">
                            <figure class="effect-ruby gallery-image-wrap">
                                <a href="<?php echo base_url('uploads/foodtruck/gallery/'.sanitize($gallery_image)); ?>" class="grid image-link">
                                    <img src="<?php echo base_url('uploads/foodtruck/gallery/'.sanitize($gallery_image)); ?>" class="img-fluid" alt="#">
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
<!--//END ABOUT FOOD TRUCK -->

<!--============================= ABOUT FOOD MENU =============================-->
<section class="main-block">
    <div class="container">
        <div class="row">
            <div class="col-md-8 food-menu">
                <h3 class="font-bold" id="food-menu"><?php echo site_phrase('menu'); ?></h3>
                <?php
                $categories = $this->category_model->get_categories_by_foodtruck_id($foodtruck_details['id']);
                foreach ($categories as $category) : ?>
                    <?php
                    $menus = $this->menu_model->get_menu_by_condition(['category_id' => sanitize($category['id']), 'foodtruck_id' => sanitize($foodtruck_details['id'])]);
                    foreach ($menus as $key => $menu) : ?>
                    <div class="menu-option has-description">
                        <?php if ($menu['thumbnail'] == 'placeholder.png'): ?>
                        <a href="javascript:void(0)" onclick="showModalWithHeader('<?php echo site_url('modal/showup/foodtruck/menu/' . $menu['id']); ?>', '<?php echo sanitize($menu['name']); ?>', '<?php echo sanitize($menu['thumbnail']); ?>')">
                            <h4 class="font-bold"><?php echo sanitize($category['name']); ?> - <?php echo sanitize($menu['name']); ?></h4>
                        </a>
                        <?php else: ?>
                        <a href="javascript:void(0)" onclick="showModalWithHeader('<?php echo site_url('modal/showup/foodtruck/thumbnail_menu/' . $menu['id']); ?>', '<?php echo sanitize($menu['name']); ?>', '<?php echo sanitize($menu['thumbnail']); ?>')">
                            <h4 class="font-bold"><?php echo sanitize($category['name']); ?> - <?php echo sanitize($menu['name']); ?></h4>
                        </a>
                        <?php endif; ?>
                        <!-- PRICE SECTION -->
                        <div class="menu-price-section">
                            <!-- IF SERVINGS IS MENU -->
                            <?php if ($menu['servings'] == "menu") : ?>
                            <span class="p-0">
                            <?php if (has_discount($menu['id'])) : ?>
                                <span class="strikethrough"><?php echo currency(sanitize(get_menu_price($menu['id'], "menu", "actual_price"))); ?></span><?php echo currency(get_menu_price($menu['id'])); ?>
                            <?php else : ?>
                                <?php echo currency(sanitize(get_menu_price($menu['id']))); ?>
                            <?php endif; ?>
                            </span>
                            <!-- IF SERVINGS IS PLATE -->
                            <?php else : ?>
                            <p><?php echo site_phrase('full_plate'); ?>:</p>
                            <span class="p-0">
                            <?php if (has_discount($menu['id'], "full_plate")) : ?>
                                <span class="strikethrough"><?php echo currency(get_menu_price($menu['id'], "full_plate", "actual_price")); ?></span><?php echo currency(sanitize(get_menu_price($menu['id'], "full_plate"))); ?>
                            <?php else : ?>
                                <?php echo currency(sanitize(get_menu_price($menu['id'], "full_plate"))); ?>
                            <?php endif; ?>
                            </span>
                            <br>
                            <p><?php echo site_phrase('half_plate'); ?>:</p>
                            <span class="p-0">
                            <?php if (has_discount($menu['id'], "half_plate")) : ?>
                                <span class="strikethrough"><?php echo currency(get_menu_price($menu['id'], "half_plate", "actual_price")); ?></span><?php echo currency(get_menu_price($menu['id'], "half_plate")); ?>
                            <?php else : ?>
                                <?php echo currency(get_menu_price($menu['id'], "half_plate")); ?>
                            <?php endif; ?>
                            </span>
                        <?php endif; ?>
                        </div>
                        <p><?=$menu['details']?></p>
                    </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
                <!-- Google Map -->
                <!-- <div id="map"></div> -->
                <div class="calendar calendar-first" id="calendar_first">
                    <div class="calendar_header">
                        <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
                        <h2></h2>
                        <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
                    </div>
                    <div class="calendar_weekdays"></div>
                    <div class="calendar_content"></div>
                </div>
                <div class="text-muted text-center">
                    <span class="mr-3"><i class="fa fa-square mr-1" style="color: #007743"></i>Available</span>
                    <span><i class="fa fa-square mr-1"></i>Unavailable</span>
                </div>
                <!-- Food Truck Information -->

                <!-- MODAL -->
                <?php include 'info.php'; ?>
                
                <a href="#invite_section" class="text-uppercase long-radius-btn"><?php echo site_phrase('reservation_for_this_truck'); ?></a>
            </div>
        </div>
    </div>
</section>

<!--============================= INVITE FOOD TRUCK =============================-->
<div class="invite-block" id="invite_section">
    <div class="container">
        <h3 class="font-bold text-center invite-block--title"><?php echo site_phrase('invite'); ?> <?php echo sanitize($foodtruck_details['name']); ?></h3>
        <div class="row justify-content-center">
            <!--========= FOOD TRUCK CATERING ==========-->
            <div class="col-md-6">
                <div class="block-content">
                    <h5 class="text-center invite-option--title"><?php echo site_phrase('on-site_catering'); ?></h5>
                    <p class="invite-option--description">The attendees eat all together at the same time, like most classic catering. You can choose your favorite dish or dishes in advance.</p>
                </div>
                <a href="<?php echo base_url('site/invite_foodtruck/' . sanitize(rawurlencode($foodtruck_details['slug'])) . '/' . sanitize($foodtruck_details['id']) . '/catering'); ?>" class="text-uppercase invite-btn"><?php echo site_phrase('reserve_now'); ?></a>
            </div>
            <!--========= FOOD TRUCK HIRING ==========-->
            <div class="col-md-6">
                <div class="block-content">
                    <h5 class="text-center invite-option--title"><?php echo site_phrase('on-site_à_la_carte'); ?></h5>
                    <p class="invite-option--description">Your attendees get the possibility, during a certain period to orther their food they like following the menu of the Truck.</p>
                </div>
                <a href="<?php echo base_url('site/invite_foodtruck/' . sanitize(rawurlencode($foodtruck_details['slug'])) . '/' . sanitize($foodtruck_details['id']) . '/hiring'); ?>" class="text-uppercase invite-btn"><?php echo site_phrase('reserve_now'); ?></a>
            </div>
        </div>            
    </div>
</div>