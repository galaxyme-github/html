<!-- Main Banner Starts -->
<div class="main-banner" style="background: url(<?php echo base_url('uploads/frontend/banners/contact-us.jpg');?>) center center / cover;;">
    <div class="container px-md-0">
        <h2><span>Contact Us</span></h2>
    </div>
</div>
<!-- Banner Ends -->
<!-- <div class="breadcrumb">
    <div class="container px-md-0">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li class="list-inline-item active">Contact Us</li>
        </ul>
    </div>
</div> -->
<div class="container px-md-0 main-container">
	<!-- Contact Info Section Starts -->
	<div class="contact-info-box">
        <!-- Nested Row Starts -->
        <div class="row">
            <div class="col-md-5 col-sm-12 d-none d-md-block">
                <div class="box-img">
                    <img src="<?php echo base_url('uploads/frontend/contact/contact-user.png'); ?>" alt="Image" />
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="info-box">
                    <h3>We'd love to hear from you</h3>
                    <h5 class="pl-1 pr-1">
						Do you have any question for our service now? We'd love to help you.
						Please feel free to get in touch us. We will answer in 24 hours.
					</h5>
                </div>
            </div>
            <div class="col-md-1 col-sm-12 d-none d-md-block"></div>
        </div>
        <!-- Nested Row Ends -->
    </div>
	<div class="contact-content">
		<!-- Nested Row Starts -->
		<div class="row">
			<!-- Contact Form Starts -->
			<div class="col-md-8 col-sm-12">
				<h3>Get in touch by filling the form below</h3>
				<form class="form-horizontal contact-form">
					<div class="row">
						<!-- Name Field Starts -->
						<div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Your email" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="phoneno" id="phoneno"  placeholder="Your phone" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"  placeholder="Subject" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea class="form-control" rows="8" name="message" id="message"  placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
								<div class="g-recaptcha mb-2" data-sitekey="<?php echo get_system_settings('recaptcha_v2_sitekey') ?>"></div>
                            </div>
                        </div>
						<!-- Message Field Ends -->
						<div class="col-sm-12">
                            <button type="submit" name="new_patient" value="1" class="btn btn-black">Send</button>
                        </div>
					</div>
				</form>
			</div>
			<div class="w-100 d-block d-md-none">
                <p>&nbsp;</p>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="cblock-1">
                <a href="https://www.google.com/maps/place/New+York,+NY/@40.6976637,-74.119764,11z/data=!3m1!4b1!4m5!3m4!1s0x89c24fa5d33f083b:0xc80b8f06e177fe62!8m2!3d40.7127753!4d-74.0059728" target="_blank">
                    <span class="icon-wrap"><i class="fas fa-map-marker-alt"></i></span>
                </a>
                   <h4>Address</h4>
                    <p>New York</p>
                </div>

                <div class="cblock-1">
                    <a href="tel:+19193607600"><span class="icon-wrap"><i class="fas fa-phone"></i></span></a>
                    <h4>Phone</h4>
                    <p>+1 919 360 7600</p>
                </div>
                <div class="cblock-1">
                    <a href="mailto:info@bookingfoodtrucks.com"><span class="icon-wrap"><i class="far fa-envelope"></i></span></a>
                    <h4>Email</h4>
                    <p>info@bookingfoodtrucks.com</p>
                </div>
            </div>
		</div>
	</div>
</div>
<!-- Map Starts -->
<div class="container px-md-0 pt-5">
	<div class="map-section">
		<iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?q=New%20York,%20United%20State&Roadmap&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
	</div>
</div>
<!-- Map Ends -->