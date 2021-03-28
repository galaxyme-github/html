<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/dark.php'; ?>
<!-- SLIDER -->
<section class="slider d-flex align-items-center">
	<div class="container" style="margin-top: 213px;">
		<div class="row d-flex justify-content-center">
			<div class="col-md-12">
				<div class="slider-title_box">
					<div class="row d-flex justify-content-center">
						<div class="col-md-12">
							<form id="search_frm" action="<?php echo site_url('site/foodtrucks/filter'); ?>" class="form-wrap mt-2 pr-2 pl-2" method="GET">
								<div class="row">
									<div class="col-md-4 p-0 mt-1">
										<input name="address" id="address" class="form-control search-box-border" placeholder="Zip code or City" type="search"/>
										<input type="hidden" name="search_input_zipcode" id="search_input_zipcode" />
										<input type="hidden" name="search_latitude" id="search_latitude" />
										<input type="hidden" name="search_longitude" id="search_longitude" />
										<input type="hidden" name="search_input_city_name" id="search_input_city_name" />
									</div>
									<div class="col-md-3 p-0 mt-1">
										<input name="event_date" id="event_date" class="form-control search-box-border datepicker" placeholder="Date of event" type="text" readonly="readonly" />
									</div>
									<div class="col-md-3 p-0 mt-1">
										<select name="number_people" id="number_people" class="form-control search-box-border" style="height: 52px;">
											<option value="">How many people?</option>
											<option value="40-60">40-60</option>
											<option value="60-100">60-100</option>
											<option value="100-200">100-200</option>
											<option value="200-300">200-300</option>
											<option value="300+">300+</option>
										</select>
									</div>
									<div class="col-md-2 p-0 mt-1">
										<button type="submit" class="form-control btn-success search-box-border" id="home-search-btn"><span class="icon-magnifier search-icon"></span><?php echo strtoupper(site_phrase('search')); ?><i class="pe-7s-angle-right"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 180px;">
			<div class="col-md-12">
				<div class="slider-content_wrap">
					<h1 class="home-title beauty-title-black"><?php echo sanitize(get_website_settings('title')); ?></h1>
					<h5 class="beauty-title-black"><?php echo sanitize(get_website_settings('sub_title')); ?></h5>
				</div>
			</div>
		</div>
	</div>
</section>
<!--// SLIDER -->
<!--//END HEADER -->
<section class="main-block" style="margin-top: -120px;">
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="styled-heading">
					<h3>The reasons why you have to book your catering Food Truck by us</h3>
				</div>
			</div>
		</div>
		<div class="descriptions justify-content-center">
			<div class="row text-center">
				<div class="col-sm-4 col-xs-12 description">
					<div class="icon search-icon"></div>
					<div class="description-text">
						<span class="title">SMART SEARCHING</span>
						<div class="content text-muted">
							Pick fast the right local Food Truck for your catering.
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12 description">
					<div class="icon pay-icon"></div>
					<div class="description-text">
						<span class="title">BOOKING & SECURE PAYMENTS</span>
						<div class="content text-muted">
							Book and pay securely through the website.
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12 description">
					<div class="icon relax-icon"></div>
					<div class="description-text">
						<span class="title">BOOKING GUARANTEES</span>
						<div class="content text-muted">
							Get the Booking Food Trucks guarantee, 7/7 support and reservation protection.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--============================= Food Trucks for every occasion =============================-->
<section class="main-block">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="styled-heading">
					<h3><?php echo site_phrase('food_trucks_for_every_occasion', true); ?></h3>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/weddings.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Wedding</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/dog.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Dog Show</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2"><i class="fa fa-birthday-cake"></i>
							
						</div>
						<div class="occasion-title">
							<p>Birthday</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/dancing_party.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Holiday Party</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/baby_shower.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Baby Shower</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/horse_show.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Horse Show</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<i class="fa fa-building"></i>
						</div>
						<div class="occasion-title">
							<p>Neighborhood Party</p>
						</div>
					</div>
					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/cottage.png'); ?>" width="30px">
							<!-- <i class="fa fa-home"></i> -->
						</div>
						<div class="occasion-title">
							<p>House Warming Party</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/church_party.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Church Party</p>
						</div>
					</div>
					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/school_party.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>School Party</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<i class="fa fa-users"></i>
						</div>
						<div class="occasion-title">
							<p>Family Event</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/wedding_anniversaries.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Wedding Anniversaries</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/golf_event.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Golf Event</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/pool_party.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Pool Party</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/funeral.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Funeral Reception</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/fund_accounting.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Fund Raising Party</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/tear_off_calendar.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>VIP Event</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/graduation_cap.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Graduations</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/corporate_party.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Corporate Parties</p>
						</div>
					</div>

					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/many_others.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p><strong>Many Others</strong></p>
						</div>
					</div>
					
					<div class="col-md-6 occasion-items">
						<div class="occasion-icon pr-2">
							<img src="<?php echo base_url('assets/icons/trade_show.png'); ?>" width="30px">
						</div>
						<div class="occasion-title">
							<p>Trade Show</p>
						</div>
					</div>



				</div>
				
			</div>
			<div class="col-md-6">
				<div class="card card-secondary">
					<div class="card-header">
						<h6 class="card-title text-center mt-2"><i class="fa fa-handshake success-color"></i>&nbsp;&nbsp;The Booking Food Trucks Concept</h6>
					</div>
					<div class="card-body">
						<p><i class="fa fa-check success-color"></i> Find and Book a local Food Truck for your occasion or event where you can order in advance dishes, the number of dishes, the date, time and the location the food truck is expected.</p>
						<button class="btn btn-success btn-block">Book a Food Truck</button>
					</div>
				</div>				
				<p class="text-center mt-3">All Food Trucks booked on BookingFoodTrucks.com are backed by Booking Food Truck guarantee.</p>
			</div>
		</div>
	</div>
</section>
<!--//END FEATURED CUISINES -->

<!--============================= Section #3 =============================-->
<section class="main-block light-bg">
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-12 text-center">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php for ($counter = 1; $counter < 7; $counter++): ?>
							<div class="swiper-slide">
								<a href="<?php echo site_url("assets/frontend/default/images/section3/gallery".$counter.".jpg"); ?>" class="grid image-link">
									<img src="<?php echo site_url("assets/frontend/default/images/section3/gallery".$counter.".jpg"); ?>" class="img-fluid" alt="#">
								</a>
							</div>
						<?php endfor; ?>
					</div>
					<!-- Add Pagination -->
					<div class="swiper-pagination swiper-pagination-white"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next swiper-button-white"></div>
					<div class="swiper-button-prev swiper-button-white"></div>
				</div>
			</div>

			<div class="col-md-12 text-center mt-5">
				<h5>Food is the beginning of a successful event!</h5>
			</div>
		</div>
	</div>
</section>
<!--//END Section #3 -->
<!--============================= Section #4 =============================-->
<section class="main-block">
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="styled-heading">
					<h3><?php echo site_phrase('become_a_bft_member', true); ?></h3>
				</div>
			</div>
			<div class="col-md-12">
				<div class="add-listing-wrap">
					<p><?php echo site_phrase('do_you_want_to_add_your_own_foodtrucks_and_food_menus'); ?>?</p>
				</div>
			</div>
		</div>
		<div class="row justify-content-center mb-5">
			<div class="col-md-4">
				<div class="featured-btn-wrap">
					<a href="<?php echo site_url('auth/registration/owner'); ?>" class="btn btn-success"><i class="fa fa-user-plus"></i> <?php echo strtoupper(site_phrase('become_a_bft_member')); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--//END Section #4 -->
<!--============================= ADD LISTING =============================-->
<section class="main-block region-links">
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-12">
				<div class="styled-heading">
					<h3>Thousands of Food Trucks across the United States</h3>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<?php foreach ($states as $state): ?>
				<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2"><a href=""><b class="font-bold text-white"><?php echo $state['state'];?></b></a></div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!--//END ADD LISTING -->
<!-- SCROLLING BUTTON -->
<div class="scroll-btn scroll-bottom" id="scrollBtn">
	<a href="javascript:void(0)"><span></span></a>
</div>
<!-- //END SCROLLING BUTTON -->
