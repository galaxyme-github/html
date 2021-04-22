
<!-- BREADCRUMb -->
<!-- <section class="light-breadcrumb">
    <div class="container">
        <div class="text-left">
            <a id="goto_search_result_page" href="">
                <i class="fas fa-arrow-left"></i>
                <span id="breadcrumb_text"></span>
            </a>
        </div>
    </div>
</section> -->
<!-- //END BREADCRUMB -->
<!--============================= ABOUT FOOD TRUCK =============================-->
<div class="food-truck-container">
<section class="main-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 pt-5">
                <div class="styled-name">
                    <h3 class="food-truck-title"><?php echo sanitize($foodtruck_details->name); ?></h3>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <div class="styled-buttons">
                    <a href="#reservation" class="btn ft-btn font-bold pl-5 pr-5">Reservation</a>
                    <a href="#food-menu" class="btn ft-btn font-bold pl-5 pr-5">Menu</a>
                    <a href="#info" class="btn ft-btn font-bold pl-5 pr-5">Information</a>
                </div>
            </div>
            <div class="col-md-12 about-text">
                <p><?=$foodtruck_details->summary?></p>
            </div>
        </div>
        <?php
            $foodtruck_galleries = !empty($foodtruck_details->gallery) ? json_decode($foodtruck_details->gallery) : [];
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
                <h3 class="font-bold text-center food-truck-title" id="food-menu">Catering Menu</h3>
                <?php
                $categories = $this->category_model->get_categories_by_foodtruck_id($foodtruck_details->id);
                foreach ($categories as $category) : ?>
                    <h4 class="catering-menu-category-title mt-5 mb-3"><?php echo sanitize($category['name']); ?></h4>
                    <hr class="menu-category-devider"/>
                    <?php
                    $menus = $this->menu_model->get_menu_by_condition(['category_id' => sanitize($category['id']), 'foodtruck_id' => sanitize($foodtruck_details->id)]);
                    foreach ($menus as $key => $menu) : ?>
                    <div class="menu-option has-description">
                        <div class="dish-amount mr-2">
                            <input type="number" name="dish_amount[]" value="0" min="0" max="1000" />
                        </div>
                        <h4 class="font-bold food-truck-dish-name"><?php echo sanitize($menu['name']); ?></h4>
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
                        <?php endif; ?>
                        </div>
                        <p class="dish-details"><?=$menu['details']?></p>
                    </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
                <!-- Google Map -->
                <!-- <div id="map"></div> -->
                <div class="calendar calendar-first" id="calendar_first">
                    <div class="calendar_header">
                        <button class="switch-month switch-left"> <i class="far fa-arrow-alt-circle-left"></i></button>
                        <h2></h2>
                        <button class="switch-month switch-right"> <i class="far fa-arrow-alt-circle-right"></i></button>
                    </div>
                    <div class="calendar_weekdays"></div>
                    <div class="calendar_content"></div>
                </div>
                <!-- <div class="text-muted text-center">
                    <span class="mr-3"><i class="fa fa-square mr-1" style="color: #007743"></i>Available</span>
                    <span><i class="fa fa-square mr-1"></i>Unavailable</span>
                </div> -->
                <!-- Food Truck Information -->

                <!-- MODAL -->
                <?php include 'info.php'; ?>
                <!-- <a href="#invite_section" class="long-radius-btn">Make a reservation for <?=$foodtruck_details->name;?></a> -->
            </div>
        </div>
    </div>
</section>

<!--============================= INVITE FOOD TRUCK =============================-->
<!-- <div class="invite-block" id="invite_section">
    <div class="container">
        <h3 class="font-bold text-center invite-block--title"><?php echo site_phrase('reservation'); ?> <?php echo sanitize($foodtruck_details->name); ?></h3>
        <div class="row justify-content-center"> -->
            <!--========= FOOD TRUCK CATERING ==========-->
            <!-- <div class="col-md-6">
                <div class="block-content">
                    <h5 class="text-center invite-option--title"><?php echo site_phrase('on-site_catering'); ?></h5>
                    <p class="invite-option--description">The attendees eat all together at the same time, like most classic catering. You can choose your favorite dish or dishes in advance.</p>
                </div>
                <a href="<?php echo base_url('site/invite_foodtruck/' . sanitize(rawurlencode($foodtruck_details->slug)) . '/' . sanitize($foodtruck_details->id) . '/catering'); ?>" class="invite-btn">Catering</a>
            </div> -->
            <!--========= FOOD TRUCK HIRING ==========-->
            <!-- <div class="col-md-6">
                <div class="block-content">
                    <h5 class="text-center invite-option--title"><?php echo site_phrase('on-site_à_la_carte'); ?></h5>
                    <p class="invite-option--description">Your attendees get the possibility, during a certain period to orther their food they like following the menu of the Truck.</p>
                </div>
                <a href="<?php echo base_url('site/invite_foodtruck/' . sanitize(rawurlencode($foodtruck_details->slug)) . '/' . sanitize($foodtruck_details->id) . '/hiring'); ?>" class="invite-btn">A la Carte</a>
            </div>
        </div>            
    </div>
</div> -->
</div>
<!-- Reservation Form Starts -->
<div class="container-fluid">
    <div class="container mb-5 pt-5">
        <h4 class="font-bold text-center">Reservation for <?php echo sanitize($foodtruck_details->name); ?></h4>
        <div class="row justify-content-center pt-5">
            <div class="col-md-12">
                <div class="alert alert-info fixed-alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <span class="text-success pr-2">Breakfast - Brunch - Lunch - Dinner</span>
                    Later you can discuss in detail about the exact time you will expect the Food Truck.
                </div>
                <form action="<?php echo site_url('site/reserve'); ?>" id="reservation" method="post" data-toggle="validator" role="form">
                    <?php echo $this->app_lib->generateCSRF(); ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="event_date">Event Date<span class="text-success">*</span></label>
                                <input type="text" class="form-control datepicker" style="height: 37px;padding-left: 10px;" name="event_date" id="event_date" data-error="Please enter event date." required />
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="event_time">Event Time<span class="text-success">*</span></label>
                                <select class="form-control" name="event_time" id="event_time" data-error="Please enter select time." required >
                                    <option value="">Select Meal Time</option>
                                    <option value="breakfast">Breakfast</option>
                                    <option value="brunch">Brunch</option>
                                    <option value="lunch">Lunch</option>
                                    <option value="dinner">Dinner</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="event_type">Type of Event<span class="text-success">*</span></label>
                                <select class="form-control select2" name="event_type" id="event_type" data-error="Please choose event type." required >
                                    <option>Select Type of Event</option>
                                    <optgroup label="Popular">
                                        <option value="Birthday (Adult)">Birthday (Adult)</option>
                                        <option value="Birthday (Child)">Birthday (Child)</option>
                                        <option value="Birthday (Teen)">Birthday (Teen)</option>
                                        <option value="Cocktail Party">Cocktail Party</option>
                                        <option value="Corporate Event">Corporate Event</option>
                                        <option value="Dinner Party">Dinner Party</option>
                                        <option value="Festival">Festival</option>
                                        <option value="Fundraiser">Fundraiser</option>
                                        <option value="Holiday Party (Christmas)">Holiday Party (Christmas)</option>
                                        <option value="House Party">House Party</option>
                                        <option value="Nonprofit Event">Nonprofit Event</option>
                                        <option value="Personal Occasion">Personal Occasion</option>
                                        <option value="Surprise">Surprise</option>
                                        <option value="Virtual Event">Virtual Event</option>
                                        <option value="Wedding Ceremony">Wedding Ceremony</option>
                                        <option value="Wedding Reception">Wedding Reception</option>
                                    </optgroup>
                                    <optgroup label="All events">
                                        <option value="Anniversary Party">Anniversary Party</option>
                                        <option value="Baby Shower">Baby Shower</option>
                                        <option value="Bachelor Party">Bachelor Party</option>
                                        <option value="Bachelorette Party">Bachelorette Party</option>
                                        <option value="Band Member Audition">Band Member Audition</option>
                                        <option value="Bar/Bat Mitzvah Party">Bar/Bat Mitzvah Party</option>
                                        <option value="Birthday (Adult)">Birthday (Adult)</option>
                                        <option value="Birthday (Child)">Birthday (Child)</option>
                                        <option value="Birthday (Teen)">Birthday (Teen)</option>
                                        <option value="Bridal Shower">Bridal Shower</option>
                                        <option value="Camp Event">Camp Event</option>
                                        <option value="Campus Event">Campus Event</option>
                                        <option value="Casting Call">Casting Call</option>
                                        <option value="Cocktail Party">Cocktail Party</option>
                                        <option value="Concert">Concert</option>
                                        <option value="Convention/Trade Show">Convention/Trade Show</option>
                                        <option value="Corporate Event">Corporate Event</option>
                                        <option value="Cultural Event">Cultural Event</option>
                                        <option value="Dinner Party">Dinner Party</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Festival">Festival</option>
                                        <option value="Fundraiser">Fundraiser</option>
                                        <option value="Funeral/Memorial Service">Funeral/Memorial Service</option>
                                        <option value="Graduation">Graduation</option>
                                        <option value="Grand Opening">Grand Opening</option>
                                        <option value="Holiday Party (Christmas)">Holiday Party (Christmas)</option>
                                        <option value="Holiday Party (Easter)">Holiday Party (Easter)</option>
                                        <option value="Holiday Party (Halloween)">Holiday Party (Halloween)</option>
                                        <option value="Holiday Party (New Year)">Holiday Party (New Year)</option>
                                        <option value="Holiday Party (Other)">Holiday Party (Other)</option>
                                        <option value="House Concert">House Concert</option>
                                        <option value="House Party">House Party</option>
                                        <option value="Lunch Party">Lunch Party</option>
                                        <option value="Nightclub Event">Nightclub Event</option>
                                        <option value="Nonprofit Event">Nonprofit Event</option>
                                        <option value="Parade">Parade</option>
                                        <option value="Personal Occasion">Personal Occasion</option>
                                        <option value="Product Promotion">Product Promotion</option>
                                        <option value="Prom/After Prom">Prom/After Prom</option>
                                        <option value="Quinceañera">Quinceañera</option>
                                        <option value="Rehearsal Dinner">Rehearsal Dinner</option>
                                        <option value="Religious Celebration">Religious Celebration</option>
                                        <option value="Restaurant/Bar Event">Restaurant/Bar Event</option>
                                        <option value="Retrivement Community Event">Retrivement Community Event</option>
                                        <option value="Retirement Party">Retirement Party</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="School Assembly">School Assembly</option>
                                        <option value="Sporting Event">Sporting Event</option>
                                        <option value="Studio Session">Studio Session</option>
                                        <option value="Surprise">Surprise</option>
                                        <option value="Talent Competition">Talent Competition</option>
                                        <option value="Virtual Event">Virtual Event</option>
                                        <option value="Wedding Ceremony">Wedding Ceremony</option>
                                        <option value="Wedding Cocktail Hour">Wedding Cocktail Hour</option>
                                        <option value="Wedding Engagement">Wedding Engagement</option>
                                        <option value="Wedding Reception">Wedding Reception</option>
                                        <option value="Weekly/Recurring Performance">Weekly/Recurring Performance</option>
                                        <option value="Worship Service">Worship Service</option>
                                    </optgroup>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <h6 style="font-size: 18px" class="pt-3">Event Location</h6>
                    <div class="form-group">
                        <label for="event_address">Address<span class="text-success">*</span></label>
                        <input type="text" id="event_address" class="form-control" name="event_address" data-error="Please enter event address." required />
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="event_city">City<span class="text-success">*</span></label>
                                <input type="text" class="form-control" name="event_city" id="event_city" data-error="Please enter event city." required />
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="event_state">State<span class="text-success">*</span></label>
                                <input type="text" class="form-control" name="event_state" id="event_state" data-error="Please enter event state." required />
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event_attendees">For how many people is the event:<span class="text-success">*</span></label>
                        <input type="text" class="form-control" name="event_attendees" id="event_attendees" data-error="Please enter number of attendees." required />
                        <div class="help-block with-errors"></div>
                    </div>
                    <h6 style="font-size: 18px" class="pt-3">Event Organizer</h6>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="organizer_name">Organizer Name<span class="text-success">*</span></label>
                                <input type="text" class="form-control" name="organizer_name" id="organizer_name" data-error="Please enter your name." required />
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="organizer_email">Organizer Email Address<span class="text-success">*</span></label>
                                <input type="text" class="form-control" name="organizer_email" id="organizer_email" data-error="Please enter your email." required />
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="organizer_phone">Organizer Phone Number<span class="text-success">*</span></label>
                                <input type="text" class="form-control" name="organizer_phone" id="organizer_phone" data-error="Please enter your phone number." required />
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="organizer_address">Organizer Address<span class="text-success">*</span></label>
                        <input type="text" class="form-control" name="organizer_phone" id="organizer_phone" data-error="Please enter your phone number." required />
                        <div class="help-block with-errors"></div>
                    </div>
                    <p class="text-info">Note: Once you made the reservation, you can discuss with Food Truck about the details of your event.</p>
                    <button class="btn ft-btn">Make a Reservation</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bft-foodtruck-page-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="insurance-banner-wrap bft-contect-block">
                    <img src="<?php echo base_url('assets/images/brand.png'); ?>" />
                    <div class="large-text d-inline-block pl-3">
                        All stays booked on BFT receive <a href='#' class="ft-hyper-text">our BFT guarantee</a>, 24/7 support, and our reservation protection. <a href='#' class="ft-hyper-text">Learn More</a>
                    </div>
                </div>
                <div class="bft-footer-breadcrum">
                    <a href="<?php echo site_url('home'); ?>" class="ft-hyper-text">Home</a>&nbsp;&nbsp;/&nbsp;&nbsp; 
                    <a class="ft-hyper-text" href="<?php echo site_url('site/foodtrucks/filter'); ?>?<?php echo $this->input->server('QUERY_STRING'); ?>">Filtered Food Trucks</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reservation Form Ends -->