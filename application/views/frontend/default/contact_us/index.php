<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/dark.php'; ?>
<!--============================= RESERVE A SEAT =============================-->
<section class="reserve-block contact-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="page-title"><?php echo site_phrase('contact_us', true) ?></h1>
			</div>
		</div>
	</div>
</section>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact light-bg booking-details_wrap">
  <div class="container">

	<div class="row justify-content-center" data-aos="fade-up">

	  <div class="col-md-10">

		<div class="info-wrap">
			<div class="row">
                <div class="col-md-4 info">
                  <i class="fa fa-map-marker"></i>
                  <h4>Location:</h4>
                  <p>New York</p>
                </div>

                <div class="col-md-4 info mt-4 mt-lg-0">
                  <i class="fa fa-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@bookingfoodtrucks.com</p>
                </div>

                <div class="col-md-4 info mt-4 mt-lg-0">
                  <i class="fa fa-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 919 360 7600</p>
                </div>
             </div>			
		</div>

	  </div>

	</div>

	<div class="row mt-5 justify-content-center" data-aos="fade-up">
	  <div class="col-md-10">
		<form action="<?php echo base_url();?>contact.php" method="post" role="form" class="php-email-form">
		  <div class="form-row">
			<div class="col-md-6 form-group">
			  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
			  <div class="validate"></div>
			</div>
			<div class="col-md-6 form-group">
			  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
			  <div class="validate"></div>
			</div>
		  </div>
		  <div class="form-group">
			<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
			<div class="validate"></div>
		  </div>
		  <div class="form-group">
			<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
			<div class="validate"></div>
		  </div>
		  <div class="mb-3">
			<div class="loading">Loading</div>
			<div class="error-message"></div>
			<div class="sent-message">Your message has been sent. Thank you!</div>
		  </div>
		  <div class="text-center"><button type="submit">Send Message</button></div>
		</form>
	  </div>

	</div>

  </div>
</section><!-- End Contact Section -->

<div class="map-section">
	<iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?q=New%20York,%20United%20State&Roadmap&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
</div>