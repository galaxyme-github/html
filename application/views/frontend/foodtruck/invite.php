<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/dark.php'; ?>

<!--============================= FOODTRUCK INVITE =============================-->
<div class="main-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- Availability -->
                <div class="schedule">
                    <div class="follow-img text-uppercase" style="color: #60928F">
                        <h6><?php echo site_phrase('availability', true); ?></h6>
                    </div>
                    <div class="foodtruck-schedule">
                        <?php $schedule = json_decode($foodtruck_details['schedule'], true);
                        $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday']; ?>
                        <table class="w-100">
                        <?php foreach ($days as $key => $day) : ?>
                            <tr class="text-center">
                                <td class="w-50 foodtruck-day-schedule"><?php echo ucfirst($day); ?></td>
                                <td class="w-50 foodtruck-time-schedule">
                                    <?php if (!isset($schedule[$day . '_opening']) || $schedule[$day . '_opening'] == "closed") : ?>
                                    <span class="text-danger"><?php echo site_phrase('closed'); ?></span>
                                    <?php else : ?>
                                    <?php echo date("g a", strtotime($schedule[$day . '_opening'] . ':00')); ?> - <?php echo date("g a", strtotime($schedule[$day . '_closing'] . ':00')); ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="foodtruck-img">
                    <img src="<?php echo base_url('uploads/foodtruck/thumbnail/' . sanitize($foodtruck_details['thumbnail'])); ?>" class="img-circle" alt="#" />
                </div>
            </div>
            <div class="col-md-4">
				<div class="text-block">
					<p>
						Preselected menu items and can be served buffet style or as a sit down dinner, lunch and breakfast. The food is prepared in the truck where your event will occur.					
					</p>						
				</div>
            </div>
        </div>
    </div>
</div>

<form action="<?php echo site_url('site/send_invitation'); ?>" method="post" id="invite_truck_frm">
    <input type="hidden" name="truck_id" value="<?=$foodtruck_details['id'];?>" />
    <?php if ($invite_type == "catering"): ?>
    <input type="hidden" name="invite_type" value="catering" />
    <div class="invite-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 food-menu">
                    <h3 class="font-bold" id="food-menu"><?php echo site_phrase('choose_your_dish'); ?></h3>
                    <h5 class="menu-title">Delicious prepared on the spot to take away. And to eat immediately!</h5>
                    <?php
                    $categories = $this->category_model->get_categories_by_foodtruck_id($foodtruck_details['id']);
                    foreach ($categories as $category) : ?>
                        <?php
                        $menus = $this->menu_model->get_menu_by_condition(['category_id' => sanitize($category['id']), 'foodtruck_id' => sanitize($foodtruck_details['id'])]);
                        foreach ($menus as $key => $menu) : ?>
                        <div class="menu-option has-description">
                            <input type="hidden" name="dish_id[]" value="<?=$menu['id'];?>" />
                            <div class="dish-amount">
                                <input type="number" name="dish_amount[]" value="0" min="0" max="1000" />
                            </div>
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
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="main-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="event_date"><?php echo site_phrase('event_date'); ?></label>
                        <input type="text" class="form-control datepicker event-time" id="event_date" name="event_date" readonly="readonly" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" style="width: calc(100% - 50px); float: left">
                        <label for="event_time"><?php echo site_phrase('time_/_time_zone'); ?></label>
                        <input type="time" class="form-control" id="event_time" name="event_time" required />
                    </div>
                    <div class="form-group" style="width: 50px;  float: left">
                        <select id="timezone" class="form-control timezone-abbr" title="Time zone" name="timezone" required>
                            <option value=""></option>
                            <option value="et">ET</option>
                            <option value="ct">CT</option>
                            <option value="mt">MT</option>
                            <option value="pt">PT</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="event_location"><?php echo site_phrase('event_location'); ?></label>
                        <input type="text" class="form-control" id="event_location" name="event_location" placeholder="City, State, Zip" required />
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="attendees_num"><?php echo site_phrase('how_many_people?'); ?></label>
                        <input type="number" class="form-control" id="attendees_num" name="attendees_num" min="0" required />
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="message"><?php echo site_phrase('message'); ?></label>
                        <textarea id="message" name="message" class="form-control" rows="8" required></textarea>
                    </div>
                </div>
                <?php if ($invite_type == "hiring"): ?>
                <div class="col-md-8">
                    <div class="hiring-info">
                        <?php
                            $customers_num_range = explode('-', $foodtruck_details['customers_num']);
                            $minimum_nums = rtrim($customers_num_range[0], '+');
                            $minimum_sales = $foodtruck_details['minimum_sales'];
                            
                            $price_per_person = $minimum_sales / $minimum_nums;
                        ?>
                        <input type="hidden" id="price_per_person" value="<?=$price_per_person;?>" />
                        <p>The Hiring price for this truck is $<?=$price_per_person;?> per person.</p>
                        <p>Minimum sales: $<?=$minimum_sales;?></p>
                        <p>Your Food Truck Hiring will cost you: <span id="hiring_total_cost">(Amount of attendees) x $<?=$price_per_person;?></span></p>
                    </div>
                </div>
                <?php endif; ?>
                <!-- SUBMIT INVITE BUTTON -->
                <div class="col-md-6">
                    <button type="submit" class="submit-invite text-uppercase"><?php echo site_phrase('send_invitation'); ?></button>
                </div>
                <!-- END SUBMIT INVITE BUTTON -->
            </div>
        </div>
    </div>
</form>
<!--//END FOODTRUCK INVITE -->