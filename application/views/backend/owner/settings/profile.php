<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header p-2">
                        <h4 class="bft-card-title">Profile Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post" data-toggle="validator" role="form" enctype="multipart/form-data">
                            <?php echo $this->app_lib->generateCSRF(); ?>
                            <input type="hidden" name="settings_type" value="profile">
                            <div class="form-group row">
                                <label for="image" class="col-lg-3 col-form-label">Profile Image</label>
                                <div class="col-lg-9">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' class="imageUploadPreview" id="image" name="image" accept=".png, .jpg, .jpeg" />
                                            <label for="image"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="image_preview" thumbnail="<?php echo base_url('uploads/user/' . sanitize($user_info->photo)); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="headline"  class="col-lg-3 col-form-label">BFT Member Headline</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="headline" id="headline" value="<?php echo sanitize($user_info->headline); ?>" maxlength="150" data-error="Please enter maximum 150 characters."/>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="summary"  class="col-lg-3 col-form-label">Summary</label>
                                <div class="col-lg-9">
                                    <textarea rows="3" class="form-control" name="summary" id="summary"><?php echo sanitize($user_info->summary); ?></textarea>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label for="first_name" class="col-lg-3 col-form-label">First Name<span class='text-success'>*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo sanitize($user_info->first_name); ?>" data-error="Please enter first name." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-lg-3 col-form-label">Last Name<span class='text-success'>*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo sanitize($user_info->last_name); ?>" data-error="Please enter last name." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label for="email" class="col-lg-3 col-form-label">Email Address<span class='text-success'>*</span></label>
                                <div class="col-lg-9">
                                    <input type="email" name="email" class="form-control" id="email" value="<?php echo sanitize($user_info->email); ?>" data-error="Please enter email address." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-lg-3 col-form-label">Phone Number<span class="text-success">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="+1 222-333-4444" value="<?php echo sanitize($user_info->phone); ?>" data-error="Please enter phone number." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label for="address_1" class="col-lg-3 col-form-label">Address<span class="text-success">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="address_1" name="address_1" value="<?php echo sanitize($user_info->address_1); ?>"  data-error="Please enter address." required>
                                    <div class="help-block with-errors"></div>
                                    <input type="text" class="form-control mt-2" id="address_2" name="address_2" placeholder="Apartment, suite, unit, building, floor, etc." value="<?php echo sanitize($user_info->address_2); ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-lg-3 col-form-label">City<span class="text-success">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="city" name="city" value="<?php echo sanitize($user_info->city); ?>"  data-error="Please enter city." required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="state" class="col-lg-3 col-form-label">State<span class="text-success">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="state" name="state" value="<?php echo sanitize($user_info->state); ?>"  data-error="Please enter state." required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zip_code" class="col-lg-3 col-form-label">Zip Code<span class="text-success">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" value="<?php echo sanitize($user_info->zip_code); ?>"  data-error="Please enter zip code." required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label for="company" class="col-lg-3 col-form-label">Company</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="company" name="company" value="<?php echo sanitize($user_info->company); ?>" />
                                </div>
                            </div>
                            <div class="card-body-footer">
                                <button type="submit" class="btn ft-hero-btn">Save Settings</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
