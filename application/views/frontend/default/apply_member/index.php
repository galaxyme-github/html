<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/light.php'; ?>

<?php if (!($this->session->flashdata('submitted_application'))): ?>
<!-- SECTION HEADER -->
<section class="align-items-center" id="apply-section-header">
    <div class="container">
        <div class="hidden-xs">
            <div class="row justify-content-center">
                <div class="col-xs-12">
                    <header class="foodtruck-page-header">
                        <h1 class="foodtruck-header-title text-center">Become a BFT member</h1>
                        <div class="large-text text-center">
                            BookingFoodTruck.com is a NEW high-end Booking platform of Food Trucks
                        </div>
                    </header>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-xs-12 col-sm-6 col-md-4 text-center text-white">
                    <a href="#foodtruck-apply-form" class="foodtruck-btn foodtruck-btn-primary btn-block text-capitalize">apply now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // END SECTION -->
<!-- MAIN SECTION -->
<section class="main-block">
    <div class="container">
        <div class="foodtruck-join-us">
            <h5>We are interested in the best Food Trucks of every State, County, City and Town.</h5>
            <p>The Food Trucks members of BFT are a very important part of our business. We offer our members a vital source of increased revenue by booking them for all kinds of events in their State or area. Looking for a route long term growth? <a href="javacript:void(0)">❤️ Join us! ❤️</a></p>
        </div>
        <div class="foodtruck-apply-form" id="foodtruck-apply-form">
            <form action="<?php echo site_url('applications/apply'); ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center"> Apply to be a BFT member</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input type="email" class="form-control" id="email_address" name="email_address" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="website_url">Website URL</label>
                            <input type="text" class="form-control" id="website_url" name="website_url" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>How did you hear about us? 😊</label>
                        <div class="mt-2">
                            <span class="mr-2">
                                Google <input type="checkbox" id="checkbox-google" name="checkbox[]" value="google" />
                            </span>
                            <span class="mr-2">
                                Mailing <input type="checkbox" id="checkbox-google" name="checkbox[]" value="mailing" />
                            </span>
                            <span class="mr-2">
                                Advert <input type="checkbox" id="checkbox-google" name="checkbox[]" value="advert" />
                            </span>
                            <span class="mr-2">
                                Social Media <input type="checkbox" id="checkbox-google" name="checkbox[]" value="social media" />
                            </span>
                            <span>
                                Other <input type="checkbox" id="checkbox-google" name="checkbox[]" value="other" />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 mt-5 text-center">
                        <input type="checkbox" required />
                        I agree to BFT it's <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>
                    </div>
                    <div class="col-md-5 mt-3 text-center">
                        <button type="submit" class="btn btn-primary text-uppercase w-75">application submit</button>
                        <p class="mt-3" style="color: #578625; font-weight: bold">Once you’ve submitted your application, we’ll take look at it and you can expect to hear from one of the BFT team within 3-5 days.</p>
                    </div>
                </div>
            </form>
        </div>
        <div class="foodtruck-why-join">
            <h4 class="foodtruck-section-title">Why join BookingFoodTruck.com</h4>
            <div class="row">
                <div class="col-md-12 foodtruck-apply-text">
                    <h5>Boost your revenue and save time</h5>
                    <p>Fill your calendar with bookings of high-quality and high value events at no cost of your business.</p>
                </div>
                <div class="col-md-12 foodtruck-apply-text pt-3">
                    <h5>Payment protection</h5>
                    <p>BFT takes full payment from the organizer of the Ceremonies, Parties and receptions upfront to confirm the booking and pay you upon completion of the event.</p>
                </div>
                <div class="col-md-12 foodtruck-apply-text pt-3">
                    <h5>Looking to boost your bookings? Fill in our short application form!</h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-6 col-md-4 text-center text-white pt-5">
                    <a href="#foodtruck-apply-form" class="foodtruck-btn foodtruck-btn-primary btn-block text-capitalize">apply now</a>
                </div>
            </div>
        </div>
        <div class="foodtruck-who-can-member">
            <h4 class="foodtruck-section-title">Who can be a BFT member?</h4>
            <h5>The things we look for are:</h5>
            <div class="foodtruck-list">
                <a href="javascript:void(0)">1. Evidence of event experience</a>
                <a href="javascript:void(0)">2. High-quality imagery</a>
                <a href="javascript:void(0)">3. A well-established business</a>
                <a href="javascript:void(0)">4. Social presence and good reviews</a>
                <a href="javascript:void(0)">5. Artisanal high quality products</a>
                <a href="javascript:void(0)">6. A great looking set-up</a>
                <a href="javascript:void(0)">7. Passion for food and business</a>
            </div>
        </div>
        <div class="foodtruck-FAQ">
            <h4 class="foodtruck-section-title">FAQs</h4>
            <div class="row">
                <div class="col-md-12 foodtruck-apply-text">
                    <h5>How long will the application process take?</h5>
                    <p>From submitting your application to having to having a profile on the platform, it should take no longer than 5 business days. You’re then ready to secure your first booking!</p>
                </div>
                <div class="col-md-12 foodtruck-apply-text pt-3">
                    <h5>How much of BFT charge to sign up and to be a member?</h5>
                    <p>It’s completely FREE to sign up with us. We don’t charge subscription and membership fees</p>
                </div>
                <div class="col-md-12 foodtruck-apply-text pt-3">
                    <h5>What kind of events can I expect to book through BFT?</h5>
                    <p>BFK is specialized in events from 40 to 300 people. The events available to you are mostly a mixture of private events and weddings as well as big corporate events.</p>
                </div>
                <div class="col-md-12 foodtruck-apply-text pt-3">
                    <h5>Are there events in my area?</h5>
                    <p>in short yes! We operate nation wide and we receive enquiries all over the USA</p>
                </div>
                <div class="col-md-12 foodtruck-apply-text pt-3">
                    <h5>What kind of documentation do I need to be a BFK member?</h5>
                    <p>We require a few documents to make sure your compliant with the relevant food safety authorities. These include SafeServe certificate, public liability insurance and you Food Truck license number.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-6 col-md-4 text-center text-white pt-5">
                    <a href="#foodtruck-apply-form" class="foodtruck-btn foodtruck-btn-primary btn-block text-capitalize">apply now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // END MAIN SECTION -->
<?php else: ?>
    <div class="foodtruck-member-application-submitted">
        <div class="foodtruck-alert">
            <h3><?php echo site_phrase('applied'); ?>!</h3>
            <img src="<?php echo base_url('assets/frontend/default/images/tick.png'); ?>" class="img-fluid success-tick" alt="<?php echo "success-logo"; ?>">
            <span class="d-block mt-2"><?php echo site_phrase('your_application_has_been_submitted_successfully'); ?>.</span>
            <p>We'll review your application as soon as possible. You can expect to hear from one of the BFT team within 3 ~ 5 days.</p>
        </div>
    </div>
<?php endif; ?>