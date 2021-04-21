<!-- SECTION HEADER -->
<section class="service-landing-header container-fluid jumbo-header-container text-center">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 jumbo-centered text-center text-contrast">
            <header class="bft-header-group">
                <h1 class="bft-header-title text-contrast margin-bottom-x4">Become a BFT member</h1>
                <h4 class="bft-header-subtitle text-contrast margin-bottom-x8">
                    BookingFoodTruck.com is a NEW high-end Booking platform of Food Trucks
                </h4>
            </header>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-4 col-lg-2 text-center text-white bbm-header-btn-wrap">
            <a href="#foodtruck-owner-information" class="ft-btn btn pl-5 pr-5">Apply Now</a>
        </div>
    </div>
</section>
<!-- // END SECTION -->
<!-- MAIN SECTION -->
<div class="container">
    <div class="row justify-content-center">
        <div class="primary-col foodtruck-join-us bft-single-col mb-2 pl-3 pr-3">
            <h4 class="font-bold mb-4">We are interested in the best Food Trucks of every State, County, City and Town.</h4>
            <p>The Food Trucks members of BFT are a very important part of our business. We offer our members a vital source of increased revenue by booking them for all kinds of events in their State or area. Looking for a route long term growth? Join Us!
            <div class="row justify-content-center" id="foodtruck-owner-information">
                <div class="col-lg-10 col-md-12">

                    <!-- BFT Notification Starts -->
                    <?php if ($this->session->flashdata('bft_notification')): ?>
                        <?=$this->session->flashdata('bft_notification');?>
                    <?php endif; ?>
                    <!-- // BFT Notificaton Ends -->

                    <form action="<?php echo site_url('site/join_request'); ?>" method="post" id="owner-info" data-toggle="validator" role="form">
                        <?php echo $this->app_lib->generateCSRF(); ?>
                        <input type="hidden" name="clientLoc" />
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="font-bold mb-4">Apply to be a BFT member</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="company" class="control-label">Company Name</label>
                                    <input type="text" class="form-control" id="company" name="company" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" data-error="Please enter your first name." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" data-error="Please enter your last name." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email_address">Email Address<span class="required">*</span></label>
                                    <input type="email" class="form-control" id="email_address" name="email_address" data-error="Please enter your email address." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" data-error="Please enter your phone number." placeholder="+ 1 222-333-4444" required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="website_url">Do you have a website for your food trucks?</label>
                                    <input type="text" class="form-control" id="website_url" name="website_url" placeholder="Website URL" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="address_1">Address<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="address_1" name="address_1" data-error="Please enter your address." required />
                                    <div class="help-block with-errors"></div>
                                    <input type="text" class="form-control mt-2" id="address_2" name="address_2" placeholder="Apartment, suite, unit, building, floor, etc." />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">City<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="city" name="city" data-error="Please enter your City name." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">State<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="state" name="state" data-error="Please enter your State name." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="zip_code">Zip Code<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" data-error="Please enter your Zip Code." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>How did you hear about us?</label>
                                <div class="mt-2">
                                    <span class="mr-2">
                                        <label for="checkbox-google">Google</label> <input type="checkbox" id="checkbox-google" name="checkbox[]" value="google" />
                                    </span>
                                    <span class="mr-2">
                                        <label for="checkbox-mail">Mailing</label> <input type="checkbox" id="checkbox-mail" name="checkbox[]" value="mailing" />
                                    </span>
                                    <span class="mr-2">
                                        <label for="checkbox-advert">Advert</label> <input type="checkbox" id="checkbox-advert" name="checkbox[]" value="advert" />
                                    </span>
                                    <span class="mr-2">
                                        <label for="checkbox-media">Social Media</label> <input type="checkbox" id="checkbox-media" name="checkbox[]" value="social media" />
                                    </span>
                                    <span>
                                        <label for="checkbox-other">Other</label> <input type="checkbox" id="checkbox-other" name="checkbox[]" value="other" />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div class="g-recaptcha mb-2" data-sitekey="<?php echo get_system_settings('recaptcha_v2_sitekey') ?>"></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 mt-4 text-center">
                                <div class="text-left">
                                    <input type="checkbox" class="inline-checkbox" id="agree" name="agree" />
                                    <label for="agree" class="inline-checkbox-label">I agree to BFT it's <a href="#" class="text-link">Terms & Conditions</a> and <a href="#" class="text-link">Privacy Policy</a></label>
                                    <div class="with-errors d-none"><i class="fa fa-warning"></i>You must agree to the BFT Member Agreement.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <button type="submit" class="btn ft-btn w-75">Become a Member</button>
                            </div>
                            <div class="col-md-12">
                                <p class="mt-3" style="color: #578625; font-weight: bold">Once you’ve submitted your application, we’ll take look at it and you can expect to hear from one of the BFT team within 3-5 days.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="foodtruck-why-join">
                <h4 class="foodtruck-section-title">Why join BookingFoodTruck.com</h4>
                <div class="row">
                    <div class="col-md-12 foodtruck-apply-text">
                        <h6> Boost your revenue and save time</h6>
                        <p>Fill your calendar with bookings of high-quality and high value events at no cost of your business.</p>
                    </div>
                    <div class="col-md-12 foodtruck-apply-text pt-3">
                        <h6> Payment protection</h6>
                        <p>BFT takes full payment from the organizer of the Ceremonies, Parties and receptions upfront to confirm the booking and pay you upon completion of the event.</p>
                    </div>
                    <div class="col-md-12 foodtruck-apply-text pt-3">
                        <h6> Looking to boost your bookings? Fill in our short application form!</h6>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-6 col-md-4 text-center text-white pt-5">
                        <a href="#foodtruck-owner-information" class="btn ft-btn pl-5 pr-5">Apply Now</a>
                    </div>
                </div>
            </div>
            <div class="foodtruck-who-can-member">
                <h4 class="font-bold mb-4">Who can be a BFT member?</h4>
                <h6>The things we look for are:</h6>
                <div class="foodtruck-list">
                    <p> Evidence of event experience</p>
                    <p> High-quality imagery</p>
                    <p> A well-established business</p>
                    <p> Social presence and good reviews</p>
                    <p> Artisanal high quality products</p>
                    <p> A great looking set-up</p>
                    <p> Passion for food and business</p>
                </div>
            </div>
            <div class="foodtruck-FAQ">
                <h4 class="font-bold mb-4">Frequently Asked Questions</h4>
                <div class="row">
                    <div class="col-md-12 foodtruck-apply-text">
                        <h6>How long will the application process take?</h6>
                        <p>From submitting your application to having to having a profile on the platform, it should take no longer than 5 business days. You’re then ready to secure your first booking!</p>
                    </div>
                    <div class="col-md-12 foodtruck-apply-text pt-3">
                        <h6>How much of BFT charge to sign up and to be a member?</h6>
                        <p>It’s completely FREE to sign up with us. We don’t charge subscription and membership fees</p>
                    </div>
                    <div class="col-md-12 foodtruck-apply-text pt-3">
                        <h6>What kind of events can I expect to book through BFT?</h6>
                        <p>BFK is specialized in events from 40 to 300 people. The events available to you are mostly a mixture of private events and weddings as well as big corporate events.</p>
                    </div>
                    <div class="col-md-12 foodtruck-apply-text pt-3">
                        <h6>Are there events in my area?</h6>
                        <p>in short yes! We operate nation wide and we receive enquiries all over the USA</p>
                    </div>
                    <div class="col-md-12 foodtruck-apply-text pt-3">
                        <h6>What kind of documentation do I need to be a BFK member?</h6>
                        <p>We require a few documents to make sure your compliant with the relevant food safety authorities. These include SafeServe certificate, public liability insurance and you Food Truck license number.</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-6 col-md-4 text-center text-white pt-5">
                        <a href="#foodtruck-owner-information" class="btn ft-btn pl-5 pr-5">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // END MAIN SECTION -->
<?php if ($this->session->flashdata('submitted_application')): ?>

    <!-- The Modal -->
<div id="myModal" class="bft-simple-modal">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-12 ml-1 mr-1">
            <!-- Modal content -->
            <div class="bft-simple-modal-content">
                <span class="bft-simple-modal-close">&times;</span>
                <div class="foodtruck-member-application-submitted">
                    <div class="foodtruck-alert">
                        <h3>Congratulations!</h3>
                        <img src="<?php echo base_url('assets/frontend/images/tick.png'); ?>" class="img-fluid success-tick" alt="<?php echo "success-logo"; ?>">
                        <span class="d-block mt-3">Your application has been submitted successfully.</span>
                        <p>We'll review your application as soon as possible. You can expect to hear from one of the BFT team within 3 ~ 5 days.</p>
                        <div class="foodtruck-alert-footer">
                            <a href="<?php echo site_url('home'); ?>" class="btn ft-btn">Go to Homepage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>