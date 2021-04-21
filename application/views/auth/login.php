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
</head>

<body>
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <div class="text-center auth-logo-background">
                <a href="<?php echo site_url(); ?>">
                    <img src="<?php echo base_url('uploads/system/' . get_website_settings('website_logo')); ?>" class="auth-logo" alt="" ondragstart="return false;">
                </a>
            </div>
            
            <!-- BFT Notification -->
            <?php if ($this->session->flashdata('bft_notification')): ?>
                <?=$this->session->flashdata('bft_notification');?>
            <?php endif; ?>
            <!-- // BFT Notificaton -->
            
            <form action="<?php echo site_url('auth/validate'); ?>" method="POST" class="signin-validate-form mt-5">
                <?php echo $this->app_lib->generateCSRF(); ?>
                <input type="hidden" name="clientLoc" />
                <div class="wrap-input100 m-b-20">
                    <input class="form-control ft-hero-control" type="text" name="email" placeholder="Email" id="login-email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 m-b-25">
                    <input class="form-control ft-hero-control" type="password" name="password" placeholder="Password" id="login-pass">
                    <span class="focus-input100"></span>
                </div>
                <span class="txt1 d-block text-right mb-3">
                    <a href="<?php echo site_url('auth/forget_password'); ?>" class="txt2 hov1">
                        Forgot password?
                    </a>
                </span>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign In
                    </button>
                </div>
                <div class="text-left p-t-18">
                    <p class="txt1 si-footer-text">
                    By signing in, you agree to the <a href="#" class="txt2 hov1">BFT Customer Agreement</a> or other agreement for BFT services, and the <a href="#" class="txt2 hov1">Privacy Notice</a>.
                    This site uses essential cookies. See our <a href="#" class="txt2 hov1">Cookie Notice</a> for more information.
                    </p>
                </div>
                <div class="text-center p-t-20 p-b-20 mt-4 top-hr">
                    <span class="txt1 d-block">
                        Don't have an account?
                        <a href="<?php echo site_url('auth/roles'); ?>" class="txt2 hov1">
                            Sign Up
                        </a>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo base_url('assets/auth/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/auth/vendor/bootstrap/js/popper.js'); ?>"></script>
    <script src="<?php echo base_url('assets/auth/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/global/toastr/toastr.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/auth/js/main.js'); ?>"></script>
    <script src="<?php echo base_url('assets/auth/js/client.js'); ?>"></script>
    <!-- Initialize common scripts for frontend and backend here -->
    <?php include APPPATH . "views/common/script.php"; ?>
    <script>
        "use strict"
        /* Get client information */
        async function autoDetectClient() {
            var detect = await getClientLocationInfo().then((data) => data);
            var timezone = await getClientTimezone().then((data) =>  data);
            detect.push({'timezone': timezone});
            $('input[name=clientLoc]').val(JSON.stringify(detect).replace(/[{}[\]]/g, ''))
        }
        autoDetectClient();
    </script>
</body>

</html>
