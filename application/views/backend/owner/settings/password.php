<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header p-2">
                        <h4 class="bft-card-title">Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post" data-toggle="validator" role="form">
                            <?php echo $this->app_lib->generateCSRF(); ?>
                            <input type="hidden" name="settings_type" value="password">
                            <div class="form-group">
                                <label for="current_password">Current Password<span class="text-success">*</span></label>
                                <input type="password" id="current_password" class="form-control" name="current_password" data-error="Please enter current password." required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password<span class="text-success">*</span></label>
                                <input type="password" id="new_password" class="form-control" name="new_password" minlength="6" data-error="Please enter new password." required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password<span class="text-success">*</span></label>
                                <input type="password" id="confirm_password" class="form-control" name="confirm_password" data-error="Please re-enter new password." required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <button class="btn ft-hero-btn">Save Settings</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
