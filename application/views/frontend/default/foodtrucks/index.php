<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/dark.php'; ?>
<!--============================= DETAIL =============================-->
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 responsive-wrap">
        <div class="row detail-filter-wrap">
          <div class="col-md-12 featured-responsive">
            <div class="detail-filter-text text-center">
              <p>
                <!-- <span class="d-block"><?php echo sanitize($page_header); ?> <?php echo ($type == "filter" && isset($_GET['query']) && !empty(sanitize($_GET['query']))) ? strtolower(site_phrase("for_query")) . " '" . sanitize($_GET['query']) . "'" : ""; ?></span> -->
                <!-- <small><?php echo sanitize($total_rows); ?> <span><?php echo site_phrase('foodtrucks_found'); ?></span></small> -->
                <h4><?php echo ($city_name)?sanitize($city_name).":":""; ?> <?php echo sanitize($total_rows); ?> <?php echo site_phrase('foodtrucks_found'); ?></h4>
                <input type="hidden" id="searched_city" value="<?php echo sanitize($city_name); ?>" />
                <input type="hidden" id="searched_trucks_num" value="<?php echo sanitize($total_rows); ?>" />
              </p>
            </div>
          </div>
          <!-- <div class="col-md-8 featured-responsive">
            <div class="detail-filter">
              <p><?php echo site_phrase('filter_by'); ?></p>
              <form action="<?php echo site_url('site/foodtrucks/filter'); ?>" class="filter-dropdown" method="GET">
                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="cuisine">
                  <option value=""><?php echo ucwords(site_phrase('all_cuisine')); ?></option>
                  <?php foreach ($cuisines as $cuisine_row) : ?>
                    <option value="<?php echo sanitize($cuisine_row['id']); ?>" <?php if ($cuisine_row['id'] == $cuisine) echo "selected"; ?>><?php echo sanitize($cuisine_row['name']); ?></option>
                  <?php endforeach; ?>
                </select>

                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect1" name="category">
                  <option value=""><?php echo ucwords(site_phrase('all_category')); ?></option>
                  <?php foreach ($categories as $category_row) : ?>
                    <option value="<?php echo sanitize($category_row['id']); ?>" <?php if ($category_row['id'] == $category) echo "selected"; ?>><?php echo sanitize($category_row['name']); ?></option>
                  <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-dark"><?php echo site_phrase('filter'); ?></button>
              </form>
            </div>
          </div> -->
        </div>

        <!-- RESTAURANT LIST STARTS -->
        <?php
          if ($event_date) {
            $event_date_open_status = '"'.strtolower(date("l", strtotime($event_date))) . "_opening".'":"closed"';
            $event_date = date_format(date_create($event_date), "F j");
          }
        ?>

        <div class="row justify-content-center light-bg detail-options-wrap">
          <?php foreach ($foodtrucks as $key => $foodtruck) : ?>
            <div class="col-sm-6 col-lg-4 col-xl-4 featured-responsive">
              <div class="featured-place-wrap">
                <?php if ($event_date): ?>
                  <?php if (strpos($foodtruck['schedule'], $event_date_open_status) == false): ?>
                  <p class="text-uppercase font-bold font-italic" style="color: #00bd70">available <span class="text-capitalize"> <?=$event_date?></span></p>
                  <?php else: ?>
                    <p class="text-uppercase font-bold font-italic" style="color: #000">not available <span class="text-capitalize"> <?=$event_date?></span></p>
                  <?php endif; ?>
              <?php endif; ?>
                <div class="row">
                  <!-- <a href="<?php echo site_url('site/foodtruck/' . sanitize(rawurlencode($foodtruck['slug'])) . '/' . sanitize($foodtruck['id'])); ?>"> -->
                  <div class="col-md-5">
                    <img src="<?php echo base_url('uploads/foodtruck/thumbnail/' . sanitize($foodtruck['thumbnail'])); ?>" class="img-fluid" alt="#">
                    <div class="find-out-more">
                    <a href="<?php echo site_url('site/foodtruck/' . sanitize(rawurlencode($foodtruck['slug'])) . '/' . sanitize($foodtruck['id'])); ?>">
                      <span class="find-out-more-btn"><?php echo site_phrase('find_out_more'); ?></span>
                    </a>
                    </div>
                  </div>
                    <!-- <?php if ($foodtruck['rating'] >= 4) : ?>
                      <span class="featured-rating-green"><?php echo sanitize($foodtruck['rating']); ?></span>
                    <?php elseif ($foodtruck['rating'] > 2 && $foodtruck['rating'] < 4) : ?>
                      <span class="featured-rating-orange"><?php echo sanitize($foodtruck['rating']); ?></span>
                    <?php else : ?>
                      <span class="featured-rating"><?php echo sanitize($foodtruck['rating']); ?></span>
                    <?php endif; ?> -->
                    <div class="col-md-7">
                      <div class="featured-title-box">
                        <h6><?php echo sanitize($foodtruck['name']); ?></h6>
                        <!-- <p>
                          <?php
                            $reviews = $this->db->get_where('reviews', ['foodtruck_id' => $foodtruck['id']]);
                            echo sanitize($reviews->num_rows()) . ' ' . site_phrase('reviews');
                          ?>
                        </p> -->
                        <!-- <span> • </span>
                        <p>
                          <span>
                            <?php for ($i = 1; $i <= $foodtruck['rating']; $i++) : ?>
                              <i class="fas fa-star"></i>
                            <?php endfor; ?>
                            <?php
                            $rest_rating = 5 - sanitize($foodtruck['rating']);
                            if (is_float($rest_rating)) : ?>
                              <?php $splitted_ratings = explode(".", $rest_rating); ?>
                              <?php if (isset($splitted_ratings[1]) && $splitted_ratings[1]) : ?>
                                <i class="fas fa-star-half-alt"></i>
                              <?php endif; ?>
                              <?php for ($j = 1; $j <= $splitted_ratings[0]; $j++) : ?>
                                <i class="far fa-star"></i>
                              <?php endfor; ?>
                            <?php else : ?>
                              <?php for ($k = 1; $k <= (5 - $foodtruck['rating']); $k++) : ?>
                                <i class="far fa-star"></i>
                              <?php endfor; ?>
                            <?php endif; ?>
                          </span>
                        </p> -->
                        <ul>
                          <!-- <li><span class="icon-location-pin"></span>
                            <p><?php echo ellipsis($foodtruck['address']); ?></p>
                          </li> -->
                          <!-- <li><span class="icon-screen-smartphone"></span>
                            <p><?php echo sanitize($foodtruck['phone']); ?></p>
                          </li> -->
                          <li><span class="icofont-food-basket"></span>
                            <!-- <p><?php echo ellipsis(sanitize($foodtruck['website'])); ?></p> -->
                            <p>
                              <?php foreach (json_decode($foodtruck['cuisine']) as $key => $cuisine) : ?>
                                <?php
                                $cuisine_count = count(json_decode($foodtruck['cuisine']));
                                $cuisine = $this->cuisine_model->get_by_id($cuisine);
                                if (isset($cuisine) && count($cuisine)) : ?>
                                    <?php echo sanitize($cuisine['name']); ?>
                                <?php endif; ?>
                                <?php if ($key < ($cuisine_count-1)) echo ", "; ?>
                              <?php endforeach; ?>

                              <?php if (count(json_decode($foodtruck['cuisine'])) == 0) : ?>
                                <small><?php echo site_phrase('no_cuisine_found'); ?></small>
                              <?php endif; ?>
                            </p>
                          </li>
                          <li><span class="icon-user-following"></span>
                            <p>
                              <?php
                                $customers_num_range = explode('-', $foodtruck['customers_num']);
                                echo "From (".rtrim($customers_num_range[0], '+').")";
                                if (isset($customers_num_range[1])) echo " to maximum ".$customers_num_range[1]." attendees";
                              ?>
                            </p>
                          </li>
                          <li><span class="icofont-money"></span>
                            <p><?php echo site_phrase('minimum_sales'); ?> $<?php echo $foodtruck['minimum_sales']; ?></p>
                          </li>
                          <!-- <li><span class="icofont-truck"></span>
                            <p><?php echo site_phrase('serve_radius'); ?> <?php echo $foodtruck['serve_radius']; ?> miles</p>
                          </li> -->
                        </ul>
                        <!-- <div class="bottom-icons">
                          <?php if (is_open($foodtruck['id'])) : ?>
                            <div class="open-now"><?php echo strtoupper(site_phrase('open_now')); ?></div>
                          <?php else : ?>
                            <div class="closed-now"><?php echo strtoupper(site_phrase('close_now')); ?></div>
                          <?php endif; ?>
                        </div> -->
                      </div>
                    </div>
                  <!-- </a> -->
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <?php if (count($foodtrucks) == 0) : ?>
          <div class="row justify-content-center light-bg detail-options-wrap">
            <h3><?php echo site_phrase('no_data_found'); ?></h3>
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
