<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/dark.php'; ?>
<!--============================= RESERVE A SEAT =============================-->
<section class="reserve-block">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="page-title"><?php echo site_phrase('how_it_works', true) ?></h1>
			</div>
		</div>
	</div>
</section>
<!--//END RESERVE A SEAT -->
<!--============================= BOOKING DETAILS =============================-->
<section class="light-bg booking-details_wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-12 responsive-wrap">
				<div class="booking-checkbox_wrap">
					<div class="booking-checkbox">
						<!-- <p><?php echo get_website_settings('how_it_works'); ?></p> -->
						<h6 class="page-content-title">Booking Food Trucks</h6>
						<p>BookingFoodTrucks.com is a search engine and booking platform for only the best local Food Trucks. These Food Trucks will come to your location and providing you the food service you need. You can compare a Food Truck with catering, but Food Truck catering is <b class="font-bold">mostly significantly less expensive than traditional catering.</b></p>
						
						<p>The mini-kitchens on wheels tab into days trends for authenticity and experiences, as well as the age-old trend of appreciating delicious thoughtfully prepared food. In short: Food Trucks get people exited.</p>

						<p>BookingFoodTrucks offers 2 Food Truck options to get a Food Truck for your event.</p>
						<table>
							<tr>
								<td class="content-list-num">1.</td>
								<td width="95%"><p class="mb-0"><b class="font-bold">Catering:</b> You make in advance a choice of food you need on your event. In this case all the attendees will get served at ones their dish/food (no line of waiting to get served)</p></td>
							</tr>

							<tr>
								<td class="content-list-num">2.</td>
								<td width="95%"><p class="mb-0"><b class="font-bold">Hiring a Food Truck:</b> You hire one or more Food Trucks for your event (your attendees can order and pic-up their food they like during a certain period of your event)</p></td>
							</tr>
						</table>

						<h6 class="page-content-title">What does it cost?</h6>
						<p>Food Truck catering cost range from $10 to $35 per quest.The Food Truck acts as caterer, and provides an agreed-upon menu for an agreed-upon number of people. All Food Truck ask for a minimum amount of people or a minimum of sales.</p>

						<h6 class="page-content-title">Decide How many Food Trucks you'll need for your event.</h6>
						<p>At all Food Truck pages is mentioned how many attendees the specific Food Truck maximum at ones can serve.</p>

						<p>There is also mentioned the minimum amount of sales he needs to come to your event.</p>
						
						<h6 class="page-content-title">Pick Your Food Truck menu for the event</h6>
						<p>Food Trucks provide a mind-boggling array of mouthwatering choices: Burgers, Tacos, Asian food, Korean-Mexican fusion, Street Tacos, Breakfast, Sandwiches, BBQ, Indian food. The list goes on and on.</p>

						<p>Discuss the food options with your friends, so you can make the right decision for yourself.</p>
					
						<h6 class="page-content-title">Find the best Food Trucks For Your Event</h6>
						<p>Once you’ve narrowed down the cuisines use the SEARCH engine of BookingFoodTrucks.com . BFT find suitable food trucks in you area.</p>

						<h6 class="page-content-title">What about the permits and Regulations</h6>
						<p>A permit is mostly not required when the food truck operates on private property and for a one day private party and the food is not being sold to general public.</p>

						<p>Noise ordinance to consider (an issue because of loud generators used by some Food Trucks).</p>

						<p>If you doubt, please ask your town or city and/or the owner of the food truck.</p>

						<h6 class="page-content-title">Order, Payments, Fee, Guarantees and Protection by BookingFoodTrucks.com</h6>
						<p>The finalized price, timing of arrival, and service, number of event attendees, and responsibilities of the Food Truck owners should be made clear within every order.</p>

						<p>The totally price has to be paid after you placed the order. The total amount will come in an escrow account and has to be released by you directly after the service of the Food Truck.</p>

						<p>BFT charges 2% over the total order for its service.</p>

						<p>The BFT Guarantee provides protection in case of incidents of non-service by one of our Food Truck members. Refunds and reimbursements are subjected to certain conditions and limitations. For full details please read the BFT Guarantee</p>

						<p>Reed more in the <a href="<?php echo site_url('home/terms_and_conditions');?>" style="font-weight: 900;">Terms of Service</a></p>

						<h6 class="page-content-title">List of all Foods:</h6>

						<div class="row">
							<?php foreach ($cuisines as $cuisine):?>
							<div class="col-md-3"><?=$cuisine['name']?></div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>