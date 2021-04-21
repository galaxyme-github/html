<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <ul class="bft-vertical-nav mt-5">
                    <li class="v-nav-item <?php if ($active_tab == 'basic') echo 'active' ?>"><a href="<?php echo site_url('foodtruck/edit/' . $foodtruck_data->id . '/basic'); ?>" class="v-nav-link">Basic Data</a></li>
                    <li class="v-nav-item <?php if ($active_tab == 'service') echo 'active' ?>"><a href="<?php echo site_url('foodtruck/edit/' . $foodtruck_data->id . '/service'); ?>" class="v-nav-link">Service Data</a></li>
                    <li class="v-nav-item <?php if ($active_tab == 'location') echo 'active' ?>"><a href="<?php echo site_url('foodtruck/edit/' . $foodtruck_data->id . '/location'); ?>" class="v-nav-link">Food Truck Location Information</a></li>
                    <li class="v-nav-item <?php if ($active_tab == 'contact') echo 'active' ?>"><a href="<?php echo site_url('foodtruck/edit/' . $foodtruck_data->id . '/contact'); ?>" class="v-nav-link">Contact Details</a></li>
                    <li class="v-nav-item <?php if ($active_tab == 'gallery') echo 'active' ?>"><a href="<?php echo site_url('foodtruck/edit/' . $foodtruck_data->id . '/gallery'); ?>" class="v-nav-link">Gallery</a></li>
                    <li class="v-nav-item <?php if ($active_tab == 'seo') echo 'active' ?>"><a href="<?php echo site_url('foodtruck/edit/' . $foodtruck_data->id . '/seo'); ?>" class="v-nav-link">Food Truck Page SEO</a></li>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="card mt-5">
                        <div class="card-header bft-card-header pt-3">
                        <h4>Edit <?=$foodtruck_data->name;?></h4>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane <?php if ($active_tab == 'basic') echo 'active' ?>" id="basic">
                                <form action="<?php echo site_url('foodtruck/update/basic'); ?>" method="post"  data-toggle="validator" role="form">
                                    <?php echo $this->app_lib->generateCSRF(); ?>
                                    <input type="hidden" name="id" value="<?php echo sanitize($foodtruck_data->id); ?>">
                                    <div class="form-group">
                                        <label for="foodtruck_name">Food Truck Name<span class="text-success">*</span></label>
                                        <input type="text" class="form-control" id="foodtruck_name" name="foodtruck_name" value="<?php echo sanitize($foodtruck_data->name); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="foodtruck_summary">Summary</label>
                                        <textarea class="form-control" rows="3" id="foodtruck_summary" name="foodtruck_summary"><?php echo sanitize($foodtruck_data->summary); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="website_url">Website URL</label>
                                        <input type="text" class="form-control" id="website_url" name="website_url" value="<?php echo sanitize($foodtruck_data->website_url); ?>">
                                    </div>
                                    <button class="btn ft-hero-btn">Update Basic Data</button>
                                </form>
                            </div>
                            <div class="tab-pane <?php if ($active_tab == 'service') echo 'active' ?>" id="service">
                                <form action="<?php echo site_url('foodtruck/update/service'); ?>" method="post">
                                    <?php echo $this->app_lib->generateCSRF(); ?>
                                    <input type="hidden" name="id" value="<?php echo sanitize($foodtruck_data->id); ?>">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="minimum_price_per_person">Minimum Price per Person<span class="text-success">*</span></label>
                                                <input type="text" class="form-control" id="minimum_price_per_person" name="minimum_price_per_person" value="<?php echo sanitize($foodtruck_data->minimum_price_per_person); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="number_of_attendees">How many people?<span class="text-success">*</span></label>
                                                <div class="ft-hero-select">
                                                    <select id="number_of_attendees" name="number_of_attendees" required>
                                                        <option value="">Select number of attendees</option>
                                                        <option value="40-60" <?php if ($foodtruck_data->number_of_attendees=="40-60") echo "selected" ?>>40-60</option>
                                                        <option value="60-100" <?php if ($foodtruck_data->number_of_attendees=="60-100") echo "selected" ?>>60-100</option>
                                                        <option value="100-200" <?php if ($foodtruck_data->number_of_attendees=="100-200") echo "selected" ?>>100-200</option>
                                                        <option value="200-300" <?php if ($foodtruck_data->number_of_attendees=="200-300") echo "selected" ?>>200-300</option>
                                                        <option value="300+" <?php if ($foodtruck_data->number_of_attendees=="300+") echo "selected" ?>>300+</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_time">Serving Meal Times<span class="text-success">*</span></label>
                                        <select class="form-control select2" name="service_time[]" id="service_time" multiple="multiple">
                                                <option value="breakfast" <?php if (in_array('breakfast', json_decode($foodtruck_data->schedule, true))) echo "selected"; ?>>Breakfast</option>
                                                <option value="brunch" <?php if (in_array('brunch', json_decode($foodtruck_data->schedule, true))) echo "selected"; ?>>Brunch</option>
                                                <option value="lunch" <?php if (in_array('lunch', json_decode($foodtruck_data->schedule, true))) echo "selected"; ?>>Lunch</option>
                                                <option value="dinner" <?php if (in_array('dinner', json_decode($foodtruck_data->schedule, true))) echo "selected"; ?>>Dinner</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="needed_things_on_event_location">Required things on event location</label>
                                        <input type="text" class="form-control"  data-role="tagsinput" data-removeBtn="true" id="needed_things_on_event_location" name="needed_things_on_event_location" value="<?php echo $foodtruck_data->needed_things_on_event_location; ?>" placeholder="ex: Electriciy, Water">
                                    </div>
                                    <div class="form-group">
                                        <label for="serving_areas">Serving Cities<span class="text-success">*</span></label>
                                        <input type="text" class="form-control" data-role="tagsinput" data-removeBtn="true" id="serving_areas" name="serving_areas" data-error="Please enter city names serving." value="<?php echo $foodtruck_data->serviceable_areas; ?>" placeholder="ex: South Holland, North Holland, Gelderland" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_radius">Service Radius (mile)</label>
                                        <input type="number" class="form-control" id="service_radius" name="service_radius" value="<?php echo $foodtruck_data->serve_radius; ?>">
                                    </div>
                                    <button class="btn ft-hero-btn">Update Service Data</button>
                                </form>
                            </div>
                            <div class="tab-pane <?php if ($active_tab == 'location') echo 'active' ?>" id="location">
                                <form action="<?php echo site_url('foodtruck/update/location'); ?>" method="post">
                                    <?php echo $this->app_lib->generateCSRF(); ?>
                                    <input type="hidden" name="id" value="<?php echo sanitize($foodtruck_data->id); ?>">
                                    <div class="form-group">
                                        <label for="ft_city">City<span class="text-success">*</span></label>
                                        <input type="text" class="form-control" id="ft_city" name="ft_city" data-error="Please enter City."  value="<?php echo $foodtruck_data->city; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ft_state">State<span class="text-success">*</span></label>
                                        <input type="text" class="form-control" id="ft_state" name="ft_state" data-error="Please enter State."  value="<?php echo $foodtruck_data->state; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ft_zip_code">Zip Code<span class="text-success">*</span></label>
                                        <input type="text" class="form-control" id="ft_zip_code" name="ft_zip_code" data-error="Please enter Zip Code."  value="<?php echo $foodtruck_data->zip_code; ?>" required>
                                    </div>
                                    <button class="btn ft-hero-btn">Update Location Information</button>
                                </form>
                            </div>
                            <div class="tab-pane <?php if ($active_tab == 'contact') echo 'active' ?>" id="contact">
                                <form action="<?php echo site_url('foodtruck/update/contact'); ?>" method="post">
                                    <?php echo $this->app_lib->generateCSRF(); ?>
                                    <input type="hidden" name="id" value="<?php echo sanitize($foodtruck_data->id); ?>">
                                    <div class="form-group">
                                        <label for="ft_email">Food Truck Email<span class="text-success">*</span></label>
                                        <input type="text" class="form-control" id="ft_email" name="ft_email" value="<?php echo $foodtruck_data->email; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ft_phone">Food Truck Phone Number<span class="text-success">*</span></label>
                                        <input type="text" class="form-control" id="ft_phone" name="ft_phone" placeholder="+1 222-333-4444" value="<?php echo $foodtruck_data->phone; ?>" required>
                                    </div>
                                    <button class="btn ft-hero-btn">Update Contact Details</button>
                                </form>
                            </div>
                            <div class="tab-pane <?php if ($active_tab == 'gallery') echo 'active' ?>" id="gallery">
                                <form action="<?php echo site_url('foodtruck/update/gallery'); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo $this->app_lib->generateCSRF(); ?>
                                    <input type="hidden" name="id" value="<?php echo sanitize($foodtruck_data->id); ?>">

                                    <!-- RESTAURANT THUMBNAIL -->
                                    <div class="form-group">
                                        <label for="foodtruck_thumbnail"><?php echo get_phrase("foodtruck_thumbnail"); ?> <span class="badge badge-default">(400 X 291)</span></label>
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' class="imageUploadPreview" id="foodtruck_thumbnail" name="foodtruck_thumbnail" accept=".png, .jpg, .jpeg" />
                                                <label for="foodtruck_thumbnail"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="foodtruck_thumbnail_preview" thumbnail="<?php echo base_url('uploads/foodtruck/thumbnail/' . sanitize($foodtruck_data->thumbnail)); ?>"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- RESTAURANT GALLERY IMAGES -->
                                    <div class="row">
                                        <?php
                                        $foodtruck_gallery_images = empty($foodtruck_data->gallery) ? ['placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png'] : json_decode($foodtruck_data->gallery);
                                        for ($counter = 1; $counter <= 9; $counter++) : ?>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for='<?php echo "foodtruck_gallery_$counter"; ?>'><?php echo get_phrase("foodtruck_gallery") . ' ' . $counter; ?> <span class="badge badge-default">(672 X 414)</span> </label>
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' class="imageUploadPreview" id='<?php echo "foodtruck_gallery_$counter"; ?>' name='<?php echo "foodtruck_gallery_$counter"; ?>' accept=".png, .jpg, .jpeg" />
                                                            <label for='<?php echo "foodtruck_gallery_$counter"; ?>'></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id='<?php echo "foodtruck_gallery_" . $counter . "_preview"; ?>' thumbnail="<?php echo base_url('uploads/foodtruck/gallery/' . $foodtruck_gallery_images[$counter - 1]); ?>"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                    <button type="submit" class="btn ft-hero-btn">Update Gallery</button>
                                </form>
                            </div>
                            <div class="tab-pane <?php if ($active_tab == 'seo') echo 'active' ?>" id="seo">
                                <form action="<?php echo site_url('foodtruck/update/seo'); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo sanitize($foodtruck_data->id); ?>">
                                    <?php echo $this->app_lib->generateCSRF(); ?>
                                    <div class="form-group">
                                        <label for="tags"><?php echo "SEO " . get_phrase("tags"); ?></label>
                                        <input type="text" id="tags" class="tagged form-control" data-removeBtn="true" name="seo_tags" value="<?php echo sanitize($foodtruck_data->seo_tags); ?>" placeholder="<?php echo get_phrase("enter_tags_and_press_enter"); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="description"><?php echo "SEO " . get_phrase("description"); ?></label>
                                        <textarea class="form-control" id="description" name="seo_description" rows="5" cols="80" placeholder="<?php echo get_phrase("this_will_show_in_the_meta_description"); ?>..."><?php echo sanitize($foodtruck_data->seo_description); ?></textarea>
                                    </div>
                                    <button type="submit" class="btn ft-hero-btn">Update SEO Data</button>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                </div>
            </div>
    </div>
</section>