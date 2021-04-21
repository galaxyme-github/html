<!-- HEADER -->
<!-- BFT TOP NAVIGATION BAR -->

<!--// TOP NAV -->
<!-- SLIDER -->
<section class="slider d-flex align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center hero-header-search-wrap">
            <div class="col-md-12">
                <div class="slider-title_box">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12">
                            <!-- BFT Search Form -->
                            <form id="search_frm" action="<?=site_url('site/foodtrucks/filter');?>" class="form-wrap ft-search-frm mt-2 pr-2 pl-2" method="GET">
                                <?php echo $this->app_lib->generateCSRF(); ?>
                                <div class="row ft__fieldset">
                                    <div class="p-0">
                                        <input name="address" id="address" class="form-control ft-search-box left-border-radius" placeholder="Zip code or City" type="search"/>
                                    </div>
                                    <div class="p-0">
                                        <input name="event_date" id="event_date" class="form-control ft-search-box datepicker border-left-none" placeholder="Date of event" type="text" readonly="readonly" />
                                    </div>
                                    <div class="p-0">
                                        <div class="ft-sb-select form-control ft-search-box border-left-none bg-meal-icon">
                                            <select name="event_time" id="event_time">
                                                <option value="">Meal time</option>
                                                <option vlaue="breakfast">Breakfast</option>
                                                <option vlaue="brunch">Brunch</option>
                                                <option vlaue="lunch">Lunch</option>
                                                <option vlaue="dinner">Dinner</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="p-0">
                                        <div class="ft-sb-select form-control ft-search-box border-left-none bg-user-icon">
                                            <select name="number_people" id="number_people">
                                                <option value="">How many people?</option>
                                                <option value="40-60">40-60</option>
                                                <option value="60-100">60-100</option>
                                                <option value="100-200">100-200</option>
                                                <option value="200-300">200-300</option>
                                                <option value="300+">300+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="p-0">
                                        <button type="submit" class="form-control ft-sb-btn ft-search-box border-left-none border-right-radius" id="home-search-btn"><span class="icon-magnifier search-icon"></span>Search<i class="pe-7s-angle-right"></i></button>
                                    </div>
                                </div>
                                <input type="hidden" name="search_input_zipcode" id="search_input_zipcode" />
                                <input type="hidden" name="search_latitude" id="search_latitude" />
                                <input type="hidden" name="search_longitude" id="search_longitude" />
                                <input type="hidden" name="search_input_city_name" id="search_input_city_name" />
                            </form>
                            <!--// Search Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 180px;">
            <div class="col-md-12">
                <div class="slider-content_wrap">
                    <h1 class="home-title beauty-title-black hero-main-title">Catering Food Trucks for every occasion</h1>
                    <h5 class="beauty-title-black hero-sub-title">Weddings - anniversaries - corperate events....</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// SLIDER -->
<!--// END HEADER -->

<!-- -->
<section class="main-block how-it-works-rebranded">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="styled-heading">
                    <h3>3 Reasons why you have to book your catering Food Truck with us</h3>
                </div>
            </div>
        </div>
        <div class="row ft-progress">
            <div class="col-md-12 pl-0 pr-0">
                <div class="hr-progress passive">
                    <div class="hr-progress__step first">
                        <div class="hr-progress__step__line">
                            <span class="hr-progress__step__number">1</span>
                        </div>
                    </div>
                    <div class="hr-progress__step second">
                        <div class="hr-progress__step__line">
                            <span class="hr-progress__step__number">2</span>
                        </div>
                    </div>
                    <div class="hr-progress__step third">
                        <div class="hr-progress__step__line">
                            <span class="hr-progress__step__number">3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="descriptions justify-content-center">
            <div class="row text-center">
                <div class="col-sm-4 mt-4 col-xs-12 description">
                    <div class="icon search-icon"></div>
                    <div class="description-text">
                        <span class="title">SMART SEARCHING</span>
                        <div class="content text-muted">
                            Pick fast the right local Food Truck for your catering.
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-4 col-xs-12 description">
                    <div class="icon pay-icon"></div>
                    <div class="description-text">
                        <span class="title">BOOKING & SECURE PAYMENTS</span>
                        <div class="content text-muted">
                            Book and pay securely through the website.
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-4 col-xs-12 description">
                    <div class="icon relax-icon"></div>
                    <div class="description-text">
                        <span class="title">BOOKING GUARANTEES</span>
                        <div class="content text-muted">
                            Get the Booking Food Trucks guarantee, 7/7 support and reservation protection.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// -->

<!--  -->
<section class="main-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="styled-heading">
                    <h3>Food trucks for every occasion</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/weddings.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Wedding</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/dog.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Dog Show</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2"><i class="fa fa-birthday-cake"></i>
                            
                        </div>
                        <div class="occasion-title">
                            <p>Birthday</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/dancing_party.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Holiday Party</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/baby_shower.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Baby Shower</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/horse_show.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Horse Show</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <i class="fa fa-building"></i>
                        </div>
                        <div class="occasion-title">
                            <p>Neighborhood Party</p>
                        </div>
                    </div>
                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/cottage.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>House Warming Party</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/church_party.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Church Party</p>
                        </div>
                    </div>
                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/school_party.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>School Party</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="occasion-title">
                            <p>Family Event</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/wedding_anniversaries.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Wedding Anniversaries</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/golf_event.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Golf Event</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/pool_party.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Pool Party</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/funeral.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Funeral Reception</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/fund_accounting.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Fund Raising Party</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/tear_off_calendar.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>VIP Event</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/graduation_cap.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Graduations</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/corporate_party.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Corporate Parties</p>
                        </div>
                    </div>

                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/many_others.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p><strong>Many Others</strong></p>
                        </div>
                    </div>
                    
                    <div class="col-md-6 occasion-items">
                        <div class="occasion-icon pr-2">
                            <img src="<?=base_url('assets/icons/trade_show.png');?>">
                        </div>
                        <div class="occasion-title">
                            <p>Trade Show</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-secondary mt-3">
                    <div class="card-header custom-bg-color">
                        <h6 class="card-title text-center mt-2"><i class="fa fa-handshake success-color"></i>&nbsp;&nbsp;The Booking Food Trucks Concept</h6>
                    </div>
                    <div class="card-body">
                        <i class="fa fa-check success-color float-left"></i>
                        <p class="float-left"> Find and Book a local Food Truck for your occasion or event where you can order in advance dishes, the number of dishes, the date, time and the location the food truck is expected.</p>
                        <button class="btn ft-btn btn-block mt-5">Book a Food Truck</button>
                    </div>
                </div>				
                <p class="text-center mt-3">All Food Trucks booked on <a href="#" class="ft-hyper-text">BookingFoodTrucks.com</a> are backed by Booking Food Truck guarantee.</p>
            </div>
        </div>
    </div>
</section>
<!--// -->

<!-- Gallery Starts -->
<section class="main-block gallery-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php for ($counter = 1; $counter < 7; $counter++): ?>
                            <div class="swiper-slide">
                                <a href="<?=site_url("assets/frontend/images/section3/gallery".$counter.".webp");?>" class="grid image-link">
                                    <img src="<?=site_url("assets/frontend/images/section3/gallery".$counter.".webp");?>" class="img-fluid" alt="#">
                                </a>
                            </div>
                        <?php endfor;?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper-pagination-white"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
            </div>

            <div class="col-md-12 text-center mt-5">
                <h5>Food is the beginning of a successful event!</h5>
            </div>
        </div>
    </div>
</section>
<!-- Gallery Ends -->

<!-- Business Grow Boxes Starts -->
<!-- <div class="container-fluid px-md-0 main-container get-started-block pt-5 pb-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="styled-heading">
                <h3 class="text-white">What can you do with BFT?</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="hover-boxes row"> -->
            <!-- Box Starts -->
            <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="box hover-border-outer hover-border">
                    <div class="icon"><i class="fas fa-truck"></i></div>
                    <h4>Find a food truck for your event.</h4>
                    <p>You can find out easily a food truck for your event and book.</p>
                    <a class="ft-btn btn">Get started</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="box hover-border-outer hover-border">
                    <div class="icon"><i class="fas fa-chart-line"></i></div>
                    <h4>Start food truck business on BFT!</h4>
                    <p>Please start your great food truck business with BFT.</p>
                    <a class="ft-btn btn">Get started</a>
                </div>
            </div> -->
        <!-- </div>
    </div>
</div> -->
<!-- Business Grow Boxed Ends -->

<!-- Testmonial Starts -->
<!-- <section class="testimonial-wrapper">
    <div class="container px-md-0">
        <div class="sec-title text-center">
            <h2>What people say about us</h2>
            <span class="decor"><span class="inner"></span></span>
        </div>
        <div class="testimonial-carousel owl-carousel owl-theme">
            <div class="single-testimonial-style">
                <div class="inner-content">
                    <div class="review-box">
                        <ul>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="text-box">
                        <p>“This is a great way to find food truck outside of the usual suspects. I got better service than I expected at first. Thank you for BFT++++++++++++”</p>
                    </div>
                    <div class="client-info">
                        <div class="image">
                            <img src="<?php echo base_url('uploads/user/placeholder.png'); ?>">
                        </div>
                        <div class="title">
                            <h3>Mikle Hogan</h3>
                            <span>Chapel Hill</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-testimonial-style">
                <div class="inner-content">
                    <div class="review-box">
                        <ul>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="far fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="text-box">
                        <p>“The best platform in USA! I am very satisifed with their service. With BFT, I found out a fit food truck very easily for my event and got nice service.”</p>
                    </div>
                    <div class="client-info">
                        <div class="image">
                            <img src="<?php echo base_url('uploads/user/placeholder.png'); ?>">
                        </div>
                        <div class="title">
                            <h3>Clifton Hyde</h3>
                            <span>Newyork City</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Testmonial Ends -->

<!-- Section #4 -->
<section class="main-block">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="styled-heading">
                    <h3>Become a BFT Member</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="add-listing-wrap">
                    <p>Do you want to add your own foodtrucks and food menus?</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-4">
                <div class="featured-btn-wrap">
                    <a href="<?=site_url('become-bft-member');?>" class="btn ft-btn"><i class="fa fa-user-plus pr-2"></i>Become a BFT Member</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//END Section #4 -->

<!-- ADD LISTING -->
<section class="main-block region-links">
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-12">
                <h3 class="mb-4">Thousands of Food Trucks across the United States</h3>
            </div>
        </div>
        <div class="row mb-5">
            <?php foreach ($states as $state): ?>
                <div class="col-6 col-sm-4 col-md-2 col-lg-2"><a href="<?=site_url('us/' . $state['abbr'] . '/');?>"><b class="font-bold text-white"><?=$state['state'];?></b></a></div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<!--// ADD LISTING -->

<!-- SCROLLING BUTTON -->
<div class="scroll-btn scroll-bottom" id="scrollBtn">
    <a href="javascript:void(0)"><span></span></a>
</div>
<!-- //END SCROLLING BUTTON -->
