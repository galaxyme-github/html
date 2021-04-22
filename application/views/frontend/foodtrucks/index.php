<section>
<div class="container">
    <div class="row">
    <div class="col-md-12 responsive-wrap">
        <div class="row detail-filter-wrap">
        <div class="col-md-12 featured-responsive">
            <div class="detail-filter-text text-center">
            <p>
                <h4><?php echo ($city_name)?sanitize($city_name).":":""; ?> <?php echo sanitize($total_rows); ?> Food Trucks Found</h4>
                <input type="hidden" id="searched_city" value="<?php echo sanitize($city_name); ?>" />
                <input type="hidden" id="searched_trucks_num" value="<?php echo sanitize($total_rows); ?>" />
            </p>
            </div>
        </div>
        </div>

        <!-- RESTAURANT LIST STARTS -->

        <div class="row justify-content-center light-bg detail-options-wrap">
        <?php foreach ($foodtrucks as $key => $foodtruck) : ?>
            <div class="col-sm-6 col-lg-6 col-xl-6 featured-responsive">
            <div class="featured-place-wrap">
                <?php if ($event_date): ?>
                <?php if (strpos($foodtruck['schedule'], $event_date) == false): ?>
                <p class="text-uppercase font-bold font-italic" style="color: #00bd70">available <span class="text-capitalize"> <?=date_format(date_create($event_date), "F j")?></span></p>
                <?php else: ?>
                    <p class="text-uppercase font-bold font-italic" style="color: #000">not available <span class="text-capitalize"> <?=date_format(date_create($event_date), "F j")?></span></p>
                <?php endif; ?>
            <?php endif; ?>
                <div class="row">
                <div class="col-md-5">
                    <div class="preview-truck">
                    <img src="<?php echo base_url('uploads/foodtruck/thumbnail/' . sanitize($foodtruck['thumbnail'])); ?>" class="img-fluid" alt="#" ondragstart="return false;">
                    <span class="fa fa-heart-o wishlist-heart"></span>
                    <span class="fa fa-heart wishlist-fulfill-heart d-none"></span>
                    </div>
                    <div class="find-out-more">
                    <a href="<?php echo site_url('site/foodtruck/' . sanitize(rawurlencode($foodtruck['slug'])) . '/' . sanitize($foodtruck['id'])); ?>?<?php echo $this->input->server('QUERY_STRING'); ?>">
                    <span class="find-out-more-btn">Show more information</span>
                    </a>
                    </div>
                </div>
                    <div class="col-md-7">
                    <div class="featured-title-box">
                        <h6><?php echo sanitize($foodtruck['name']); ?></h6>
                        <ul>
                        <li>
                            <div class='foodtruck-stars'>
                                <span title='4.94 of 5.00' class='stars-bg pr-0'>
                                    <span class='stars-fill' style='width: 98.8%;'></span>
                                </span>
                                <p class="stars-caption"><span class="count-reviews">(5)</span></p>
                            </div>
                        </li>
                        <li><span class="fas fa-users"></span>
                            <?php
                            $customers_num_range = explode('-', $foodtruck['number_of_attendees']);
                            ?>
                            <p>
                            Minimum amount of attendees: <?=rtrim($customers_num_range[0], '+');?>
                            </p>
                        </li>
                        <li><span class="fa fa-money"></span>
                            <p>Minimum price per person: $<?=$foodtruck['minimum_price_per_person'];?></p>
                        </li>
                        <li><span class="fas fa-utensils mr-1"></span>
                            <p>Catering Menu Available</p>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
        </div>
        <?php if (count($foodtrucks) == 0) : ?>
        <div class="row justify-content-center light-bg detail-options-wrap">
            <div class="not-found-foodtrucks">
                <img src="<?php echo base_url('assets/images/search-foodtruck.png'); ?>" />
                <h3 class="not-found-text">No foodtruck found</h3>
            </div>
        </div>
        <?php endif; ?>
        <div class="row justify-content-center light-bg detail-options-wrap">
        <?php echo $this->pagination->create_links(); ?>
        </div>
        <!-- RESTAURANT LIST ENDS -->
    </div>
    </div>
</div>
</section>
<!--//END DETAIL -->
