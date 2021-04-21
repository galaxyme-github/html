<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo sanitize(get_system_settings('system_title')); ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/system/' . get_website_settings('favicon')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/fonts/iconic/css/material-design-iconic-font.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/global/toastr/toastr.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/css/util.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/css/main.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/css/custom.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/global/css/font.css'); ?>">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <div class="text-center auth-logo-background">
                <a href="<?php echo site_url("site"); ?>">
                    <img src="<?php echo base_url('uploads/system/' . get_website_settings('website_logo')); ?>" class="auth-logo" alt="" ondragstart="return false;">
                </a>
            </div>
            <form action="<?php echo site_url('auth/resetpassword'); ?>" method="POST" class="validate-form">
                <span class="login100-form-title p-b-20">
                    Reset your password
                    <p>Enter your Bookingfoodtrucks.com email address so we can reset your password.</p>
                </span>

                <div class="form-group m-b-30">
                    <input type="text" class="form-control ft-hero-control" name="email" id="email" placeholder="Enter email">
                </div>
                <div class="wrap-input100 m-b-20">
                    <div class="g-recaptcha mb-2" data-sitekey="<?php echo get_system_settings('recaptcha_v2_sitekey') ?>"></div>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        <?php echo get_phrase('reset_password'); ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo base_url('assets/auth/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/auth/vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?php echo base_url('assets/auth/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/global/toastr/toastr.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/auth/js/main.js'); ?>"></script>
    <!-- Initialize common scripts for frontend and backend here -->
    <?php include APPPATH . "views/common/script.php"; ?>
</body>

</html>