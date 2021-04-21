<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- Header Ends -->

<!-- Main Content Starts -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="alert alert-info lighten-info" role="alert">
                    <p class="mb-0">
                        <i class="icon far fa-question-circle"></i>BFT is protected by <a href="https://www.google.com/recaptcha/admin/create" class="text-primary" target="_blank">Google Recaptcha</a>.
                    </p>
                </div>
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">ReCaptcha Settings</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post">
                            <?php echo $this->app_lib->generateCSRF(); ?>
                            <input type="hidden" name="settings_type" value="recaptcha">
                            <!-- Google ReCaptcha V2 -->
                            <h4>v2</h4>
                            <hr class="mt-0"/>
                            <div class="ml-4">
                                <div class="form-group">
                                    <label for="recaptcha_v2_sitekey">ReCaptcha Sitekey <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="recaptcha_v2_sitekey" class="form-control" name="recaptcha_v2_sitekey" value="<?php echo sanitize(get_system_settings('recaptcha_v2_sitekey')); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="recaptcha_v2_secretkey">ReCaptcha Secretkey <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="recaptcha_v2_secretkey" class="form-control" name="recaptcha_v2_secretkey" value="<?php echo sanitize(get_system_settings('recaptcha_v2_secretkey')); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Google ReCaptcha V2 End -->

                            <!-- Google ReCaptcha V3 -->
                            <h4>v3</h4>
                            <hr class="mt-0" />
                            <div class="ml-4">
                                <div class="form-group">
                                    <label for="recaptcha_v3_sitekey">ReCaptcha Sitekey <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="recaptcha_v3_sitekey" class="form-control" name="recaptcha_v3_sitekey" value="<?php echo sanitize(get_system_settings('recaptcha_v3_sitekey')); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="recaptcha_v3_secretkey">ReCaptcha Secretkey <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="recaptcha_v3_secretkey" class="form-control" name="recaptcha_v3_secretkey" value="<?php echo sanitize(get_system_settings('recaptcha_v3_secretkey')); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Google ReCaptcha V3 End -->
                            <button class="btn ft-hero-btn"><i class="fa fa-save mr-1"></i>Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Main Content Ends -->