<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">My Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post" enctype="multipart/form-data">
                            <?php echo $this->app_lib->generateCSRF(); ?>
                            <input type="hidden" name="settings_type" value="profile">
                            <div class="form-group">
                                <label for="user_image">Profile picture</label>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' class="imageUploadPreview" id="user_image" name="user_image" accept=".png, .jpg, .jpeg" />
                                        <label for="user_image"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="user_image_preview" thumbnail="<?php echo base_url('uploads/user/' . sanitize($user_info->photo)); ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Full Name<span class="text-danger">*</span></label>
                                <input type="text" id="name" class="form-control" name="name" value="<?=sanitize($user_info->name); ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label><span class="text-danger">*</span></label>
                                <input type="email" id="email" class="form-control" name="email" value="<?=sanitize($user_info->email); ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number<span class="text-danger">*</span></label>
                                <input type="text" id="phone" class="form-control" name="phone" value="<?=sanitize($user_info->phone); ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="address_1">Address<span class="text-danger">*</span></label>
                                <input type="text" id="address_1" class="form-control" name="address_1" value="<?=sanitize($user_info->address_1); ?>" required />
                                <input type="text" id="address_2" class="form-control mt-2" name="address_2" value="<?=sanitize($user_info->address_2); ?>" />
                            </div>
                            <div class="form-group">
                                <label for="city">City<span class="text-danger">*</span></label>
                                <input type="text" id="city" class="form-control" name="city" value="<?=sanitize($user_info->city); ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="state">State<span class="text-danger">*</span></label>
                                <input type="text" id="state" class="form-control" name="state" value="<?=sanitize($user_info->state); ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="zip_code">Zip Code<span class="text-danger">*</span></label>
                                <input type="text" id="zip_code" class="form-control" name="zip_code" value="<?=sanitize($user_info->zip_code); ?>" required />
                            </div>
                            <button class="btn ft-hero-btn">Update profile</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Password Change -->
            <div class="col-lg-5">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Change password</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post">
                            <?php echo $this->app_lib->generateCSRF(); ?>
                            <input type="hidden" name="settings_type" value="password">
                            <div class="form-group">
                                <label for="current_password"><?php echo get_phrase("current_password"); ?><span class="text-danger">*</span></label>
                                <input type="password" id="current_password" class="form-control" name="current_password" placeholder="<?php echo get_phrase("enter_your_current_password"); ?>" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password"><?php echo get_phrase("new_password"); ?><span class="text-danger">*</span></label>
                                <input type="password" id="new_password" class="form-control" name="new_password" placeholder="<?php echo get_phrase("enter_your_new_password"); ?>" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password"><?php echo get_phrase("confirm_password"); ?><span class="text-danger">*</span></label>
                                <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="<?php echo get_phrase("confirm_password"); ?>" value="" required>
                            </div>
                            <button class="btn ft-hero-btn">Change password</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Password Change End -->
        </div>
    </div>
    <!--/. container-fluid -->
</section>