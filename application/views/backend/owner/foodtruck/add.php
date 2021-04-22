
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <form class="" action="<?php echo site_url('foodtruck/store') ?>" method="post" data-toggle="validator" role="form">
            <?php echo $this->app_lib->generateCSRF(); ?>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-header bft-card-header">
                            <h4 class="pt-1 text-success">Register a Food Truck</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ft_name">Food Truck Name<span class="text-success">*</span></label>
                                <input type="text" class="form-control" id="ft_name" name="ft_name" data-error="Please enter foodtruck name." required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="ft_summary">Summary</label>
                                <textarea rows="3" class="form-control" id="ft_summary" name="ft_summary"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ft_website_url">Do you have a website?</label>
                                <p class="text-muted">You can have an external link on your food truck page.</p>
                                <input type="text" class="form-control" id="ft_website_url" name="ft_website_url">
                            </div>
                            <hr class="mb-4" />
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="minimum_price_per_person">Minimum Price per Person<span class="text-success">*</span></label>
                                        <input type="number" class="form-control" id="minimum_price_per_person" name="minimum_price_per_person" data-error="Please enter minimum price per person." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="number_of_attendees">How many people?<span class="text-success">*</span></label>
                                        <div class="ft-hero-select">
                                            <select id="number_of_attendees" name="number_of_attendees" data-error="Please enter number of people food truck can serve." required>
                                                <option value="">Select number of attendees</option>
                                                <option value="40-60">40-60</option>
                                                <option value="60-100">60-100</option>
                                                <option value="100-200">100-200</option>
                                                <option value="200-300">200-300</option>
                                                <option value="300+">300+</option>
                                            </select>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="service_time">Meal times that food truck serves<span class="text-success">*</span></label>
                                <select class="form-control select2" name="service_time[]" id="service_time" multiple="multiple">
                                        <option value="breakfast">Breakfast</option>
                                        <option value="brunch">Brunch</option>
                                        <option value="lunch">Lunch</option>
                                        <option value="dinner">Dinner</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="needed_things_on_event_location">What things food truck needs on event location?</label>
                                <input type="text" class="form-control"  data-role="tagsinput" data-removeBtn="true" id="needed_things_on_event_location" name="needed_things_on_event_location" placeholder="ex: Electriciy, Water">
                            </div>
                            <hr class="mb-4"/>
                            <div class="form-group">
                                <label for="serving_areas">Serving Cities<span class="text-success">*</span></label>
                                <input type="text" class="form-control" data-role="tagsinput" data-removeBtn="true" id="serving_areas" name="serving_areas" data-error="Please enter city names serving." placeholder="ex: South Holland, North Holland, Gelderland" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="service_radius">Service Radius (mile)</label>
                                <input type="number" class="form-control" id="service_radius" name="service_radius">
                            </div>
                            <hr class="mb-4"/>
                            <h5 class="font-bold text-success">Location of Food Truck</h5>
                            <div class="form-group">
                                <label for="ft_city">City<span class="text-success">*</span></label>
                                <input type="text" class="form-control" id="ft_city" name="ft_city" data-error="Please enter City."  value="<?php echo $loggedin_user->city; ?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="ft_state">State<span class="text-success">*</span></label>
                                <input type="text" class="form-control" id="ft_state" name="ft_state" data-error="Please enter State."  value="<?php echo $loggedin_user->state; ?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="ft_zip_code">Zip Code<span class="text-success">*</span></label>
                                <input type="text" class="form-control" id="ft_zip_code" name="ft_zip_code" data-error="Please enter Zip Code."  value="<?php echo $loggedin_user->zip_code; ?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <hr class="mb-4"/>
                            <h5 class="font-bold text-success">Contact Details</h5>
                            <div class="form-group">
                                <label for="ft_email">Food Truck Email<span class="text-success">*</span></label>
                                <input type="text" class="form-control" id="ft_email" name="ft_email" data-error="Please enter foodtruck email."  value="<?php echo $loggedin_user->email; ?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="ft_phone">Food Truck Phone Number<span class="text-success">*</span></label>
                                <input type="text" class="form-control" id="ft_phone" name="ft_phone" data-error="Please enter foodtruck phone number." placeholder="+1 222-333-4444" value="<?php echo $loggedin_user->phone; ?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <button class="btn ft-hero-btn">Register</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--/. container-fluid -->
</section>
