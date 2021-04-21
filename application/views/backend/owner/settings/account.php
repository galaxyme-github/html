<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header p-2">
                        <h4 class="bft-card-title">Account</h4>
                    </div>
                    <div class="card-body pl-4">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post" data-toggle="validator" role="form">
                            <?php echo $this->app_lib->generateCSRF(); ?>
                            <input type="hidden" name="settings_type" value="account">
                            <h6 class="font-bold">Account Type</h6>
                            <p>I'm working as: <b>BFT Member</b> (Food Truck Owner)</p>
                            <div class="form-group">
                                <h6 class="font-bold">Account Email</h6>
                                <input type="text" id="account_email" class="form-control" name="account_email" value="<?=$account_info->email;?>" disabled>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <h6 class="font-bold">Account Name</h6>
                                <input type="text" id="account_name" class="form-control" name="account_name" maxlength="10" data-error="Please enter account name. Account name must be maximum 10 characters." value="<?=$account_info->account_name;?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <hr />
                            <h6 class="font-bold">Close Account</h6>
                            <a href="#" class="btn btn-default mb-3">Close My Account</a>
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
