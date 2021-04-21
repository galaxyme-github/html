<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo get_system_settings('system_title'); ?></title>
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
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo get_system_settings('recaptcha_v3_sitekey') ?>"></script>
</head>

<body>
    <div class="container-login100">
        <div class="wrap-login100 p-l-46 p-r-46 p-t-80 p-b-30">
            <div class="text-center auth-logo-background">
                <a href="<?php echo site_url(); ?>">
                    <img src="<?php echo base_url('uploads/system/' . get_website_settings('website_logo')); ?>" class="auth-logo" alt="">
                </a>
            </div>
            <!-- BFT Notification -->
            <?php if ($this->session->flashdata('bft_notification')): ?>
                <?=$this->session->flashdata('bft_notification');?>
            <?php endif; ?>
            <!-- // BFT Notificaton -->

            <?php if ($role == "customer"): ?>
                <form action="<?php echo site_url('auth/register'); ?>" method="POST" class="signup-validate-form">
                    <?php echo $this->app_lib->generateCSRF(); ?>
                    <span class="login100-form-title p-b-15 p-t-10">
                        Sign up for BFT
                    </span>
                    <input type="hidden" name="role" value="<?php echo sanitize($role); ?>">
                    <input type="hidden" name="clientLoc" />
                    <div id="signup-step-form-1">
                        <div class="wrap-input100 m-b-20">
                            <label for="email" class="mb-0">Email address</label>
                            <p>You will use this email address to sign in to your new BFT account.</p>
                            <input class="form-control ft-hero-control" type="text" id="email" name="email">
                        </div>
                        <div class="wrap-input100 m-b-25">
                            <label for="password" for="password">Password</label>
                            <input class="form-control ft-hero-control" type="password" id="password" name="password">
                            <div class="password-strength d-none">
                                <div id="password_strength_check"></div>
                                <span id="check_result"></span>
                            </div>
                        </div>
                        <div class="wrap-input100 m-b-20">
                            <label for="rePassword">Confirm Password</label>
                            <input class="form-control ft-hero-control" type="password" id="rePassword">
                            <div class="with-errors d-none">The passwords don't match.</div>
                        </div>
                        <div class="wrap-input100 m-b-20">
                            <label for="accountName" class="mb-0">BFT account name</label>
                            <p class="form-field-description">Choose a name for your account. You can change this name in your account settings after you sign up.</p>
                            <input class="form-control ft-hero-control" type="text" id="accountName" name="accountName">
                        </div>
                        <input type="hidden" name="g-recaptcha-response" value="" />
                        <div class="container-login100-form-btn">
                            <button type="button" class="login100-form-btn" id="continue_1">
                                continue
                            </button>
                        </div>
                        <div class="text-center p-t-20 p-b-20 mt-3 top-hr">
                            <span class="txt1 d-block">
                                Already have an account? 
                                <a href="<?php echo site_url('auth'); ?>" class="txt2 hov1">
                                    Sign in
                                </a>
                            </span>
                        </div>
                    </div>
                    <div id="signup-step-form-2" class="d-none">
                        <h5 class="font-bolder su-font-18">Contact Information</h5>
                        <p class="m-b-10 m-t-10">Who should we contact about this account?</p>
                        <div class="wrap-input100 m-b-20">
                            <label for="name" class="mb-0">Full Name</label>
                            <input class="form-control ft-hero-control" type="text" id="name" name="name">
                        </div>
                        <div class="wrap-input100 m-b-20">
                            <label for="phone" class="mb-0">Phone Number</label>
                            <p>Enter your country code and your phone number.</p>
                            <input class="form-control ft-hero-control placeholder-font-italic" type="text" id="phone" name="phone" placeholder="+1 222-333-4444">
                        </div>
                        <div class="wrap-input100 m-b-20">
                            <label for="address_1" class="mb-0">Address</label>
                            <input class="form-control ft-hero-control" type="text" id="address_1" name="address_1">
                            <input class="form-control ft-hero-control m-t-5" type="text" id="address_2" name="address_2" placeholder="Apartment, suite, unit, building, floor, etc.">
                        </div>
                        <div class="wrap-input100 m-b-20">
                            <label for="city" class="mb-0">City</label>
                            <input class="form-control ft-hero-control" type="text" id="city" name="city">
                        </div>
                        <div class="wrap-input100 m-b-20">
                            <label for="state" class="mb-0">State</label>
                            <input class="form-control ft-hero-control" type="text" id="state" name="state">
                        </div>
                        <div class="wrap-input100 m-b-20">
                            <label for="zipCode" class="mb-0">Zip Code</label>
                            <input class="form-control ft-hero-control" type="text" id="zipCode" name="zipCode">
                        </div>
                        <div class="wrap-input100 m-b-20">
                            <label for="company" class="mb-0">Company</label>
                            <input class="form-control ft-hero-control" type="text" id="company" name="company">
                        </div>
                        <div class="checkbox m-b-20 checkbox-green">
                            <input type="checkbox" id="checkbox" name="checkbox">
                            <label for="checkbox">
                                I have read and agree to the terms of the <a href="#" class="txt2 hov1">BFT Customer Agreement.</a>
                            </label>
                            <div class="with-errors d-none"><i class="fa fa-warning"></i>You must agree to the BFT Customer Agreement.</div>
                        </div>
                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn" id="submit">
                                join
                            </button>
                        </div>
                        <div class="text-center su-footer p-t-20 p-b-20 mt-3 top-hr">
                            <a href="#" class="txt2 hov1">Privacy Policy</a>
                            <span class="ml-1 mr-1">|</span>
                            <a href="#" class="txt2 hov1">Terms of Use</a>
                            <span class="ml-1 mr-1">|</span>
                            <a href="#" class="txt2 hov1">Cookie Preferences</a>
                        </div>
                    </div>
                </form>
            <?php else : ?>
                <span class="login100-form-title p-b-37">
                    Wait...What?
                    <img src="<?php echo base_url('assets/auth/images/confused.png'); ?>" alt="" class="confused">
                </span>
                <div class="text-center p-b-20">
                    <span class="txt1 d-block">
                        <a href="<?php echo site_url('auth/roles'); ?>" class="txt2 hov1">
                            Please choose valid role!
                        </a>
                    </span>
                </div>
            <?php endif; ?>
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

        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo get_system_settings('recaptcha_v3_sitekey') ?>', {action: 'signup'}).then(function(token) {
                $("input[name=g-recaptcha-response]").val(token);
            });
        })
    </script>
</body>

</html>