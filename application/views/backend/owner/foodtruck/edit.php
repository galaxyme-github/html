<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->
<section class="content">
	<div class="container-fluid">
		<!-- Custom Tabs -->
		<div class="card">
			<div class="card-header d-flex p-0">
				<ul class="nav nav-pills p-2">
					<li class="nav-item"><a href="<?php echo site_url('foodtruck/edit/' . sanitize($id) . '/basic'); ?>" class="nav-link <?php if ($active_tab == 'basic') echo 'active' ?>"><?php echo get_phrase('basic_data') ?></a></li>
					<li class="nav-item"><a href="<?php echo site_url('foodtruck/edit/' . sanitize($id) . '/address'); ?>" class="nav-link <?php if ($active_tab == 'address') echo 'active' ?>"><?php echo get_phrase('address_and_phone') ?></a></li>
					<li class="nav-item"><a href="<?php echo site_url('foodtruck/edit/' . sanitize($id) . '/delivery'); ?>" class="nav-link <?php if ($active_tab == 'delivery') echo 'active' ?>"><?php echo get_phrase('delivery_data') ?></a></li>
					<li class="nav-item"><a href="<?php echo site_url('foodtruck/edit/' . sanitize($id) . '/schedule'); ?>" class="nav-link <?php if ($active_tab == 'schedule') echo 'active' ?>"><?php echo get_phrase('schedule') ?></a></li>
					<li class="nav-item"><a href="<?php echo site_url('foodtruck/edit/' . sanitize($id) . '/gallery'); ?>" class="nav-link <?php if ($active_tab == 'gallery') echo 'active' ?>"><?php echo get_phrase("gallery"); ?></a></li>
					<li class="nav-item"><a href="<?php echo site_url('foodtruck/edit/' . sanitize($id) . '/seo'); ?>" class="nav-link <?php if ($active_tab == 'seo') echo 'active' ?>"><?php echo "SEO"; ?></a></li>
				</ul>
			</div><!-- /.card-header -->
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane <?php if ($active_tab == 'basic') echo 'active' ?>" id="basic">
						<form action="<?php echo site_url('foodtruck/update/basic'); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo sanitize($foodtruck_data['id']); ?>">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="foodtruck_name"><?php echo get_phrase("foodtruck_name"); ?></label>
										<input type="text" class="form-control" id="foodtruck_name" name="foodtruck_name" placeholder="<?php echo get_phrase("enter_foodtruck_name"); ?>" value="<?php echo sanitize($foodtruck_data['name']); ?>" required>
									</div>
									<div class="form-group">
										<label for="foodtruck_description"><?php echo get_phrase("description"); ?></label>
										<textarea class="form-control" rows="7" id="foodtruck_description" name="foodtruck_description" placeholder="<?php echo get_phrase('provide_foodtruck_description'); ?>" required><?php echo sanitize($foodtruck_data['description']); ?></textarea>
									</div>
									<div class="form-group">
										<label for="cuisine"><?php echo get_phrase("cuisine"); ?></label> <small class="float-right"><a href="<?php echo site_url('cuisine/create'); ?>"><?php echo get_phrase("create_new_cuisine"); ?></a></small>
										<select class="form-control select2" name="cuisine[]" multiple="multiple" data-placeholder="<?php echo get_phrase("choose_cuisines"); ?>" required>
											<?php foreach ($cuisines as $cuisine) : ?>
												<option value="<?php echo sanitize($cuisine['id']); ?>" <?php if (in_array($cuisine['id'], json_decode($foodtruck_data['cuisine'], true))) echo "selected"; ?>><?php echo sanitize($cuisine['name']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<label for="foodtruck_minimum_sales"><?php echo get_phrase("minimum_sales"); ?></label>
										<input type="text" class="form-control" id="foodtruck_minimum_sales" name="foodtruck_minimum_sales" placeholder="<?php echo get_phrase("enter_minimum_sales"); ?>" value="<?php echo sanitize($foodtruck_data['minimum_sales']); ?>" required>
									</div>
									<div class="form-group">
										<label for="foodtruck_customers"><?php echo get_phrase("customers"); ?></label>
										<select class="form-control" id="foodtruck_customers" name="foodtruck_customers" required>
											<option value=""><?php echo get_phrase("select_foodtruck_customers"); ?></option>
											<option value="40-60" <?php if($foodtruck_data["customers_num"]=="40-60") echo "selected" ?>>40-60</option>
											<option value="60-100" <?php if($foodtruck_data["customers_num"]=="60-100") echo "selected" ?>>60-100</option>
											<option value="100-200" <?php if($foodtruck_data["customers_num"]=="100-200") echo "selected" ?>>100-200</option>
											<option value="200-300" <?php if($foodtruck_data["customers_num"]=="200-300") echo "selected" ?>>200-300</option>
											<option value="300+" <?php if($foodtruck_data["customers_num"]=="300+") echo "selected" ?>>300+</option>
										</select>
									</div>
									<button class="btn btn-primary"><?php echo get_phrase('update_basic_data'); ?></button>
								</div>
							</div>
						</form>
					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane <?php if ($active_tab == 'address') echo 'active' ?>" id="address">
						<form action="<?php echo site_url('foodtruck/update/address'); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo sanitize($foodtruck_data['id']); ?>">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="foodtruck_address"><?php echo get_phrase("address"); ?></label>
										<textarea class="form-control" id="foodtruck_address" name="foodtruck_address" placeholder="<?php echo get_phrase('provide_foodtruck_address'); ?>" required><?php echo sanitize($foodtruck_data['address']); ?></textarea>
									</div>
									<div class="form-group">
										<label for="foodtruck_zipcode"><?php echo get_phrase("zipcode"); ?></label>
										<input type="text" class="form-control" id="foodtruck_zipcode" name="foodtruck_zipcode" placeholder="<?php echo get_phrase('enter_foodtruck_zipcode'); ?>" value="<?php echo sanitize($foodtruck_data['zip_code']); ?>" required>
									</div>
									<!-- <div class="form-group">
										<label for="foodtruck_state"><?php echo get_phrase("state"); ?></label>
										<input type="text" class="form-control" id="foodtruck_state" name="foodtruck_state" placeholder="<?php echo get_phrase('enter_foodtruck_state'); ?>" value="<?php echo sanitize($foodtruck_data['state']); ?>" required>
									</div> -->
									<!-- <div class="form-group">
										<label for="foodtruck_latitude"><?php echo get_phrase("latitude"); ?></label> <small class="float-right"><a href="https://youtu.be/CgFiSJ11Uk8" target="_blank"><?php echo get_phrase("how_to_get_it"); ?>?</a></small>
										<input type="text" id="foodtruck_latitude" class="form-control" name="foodtruck_latitude" placeholder="<?php echo get_phrase("enter_foodtruck_latitude"); ?>" value="<?php echo sanitize($foodtruck_data['latitude']); ?>" required>
									</div>
									<div class="form-group">
										<label for="foodtruck_longitude"><?php echo get_phrase("longitude"); ?></label> <small class="float-right"><a href="https://youtu.be/CgFiSJ11Uk8" target="_blank"><?php echo get_phrase("how_to_get_it"); ?>?</a></small>
										<input type="text" class="form-control" id="foodtruck_longitude" name="foodtruck_longitude" placeholder="<?php echo get_phrase("enter_foodtruck_longitude"); ?>" value="<?php echo sanitize($foodtruck_data['longitude']); ?>" required>
									</div> -->
									<div class="form-group">
										<label for="foodtruck_serve_radius"><?php echo get_phrase("serve_radius ( miles )"); ?></label>
										<input type="number" id="foodtruck_serve_radius" class="form-control" name="foodtruck_serve_radius" placeholder="<?php echo get_phrase("enter_serve_radius"); ?>" value="<?php echo sanitize($foodtruck_data['serve_radius']); ?>" required>
									</div>
									<div class="form-group">
										<label for="foodtruck_phone"><?php echo get_phrase("phone"); ?></label>
										<input type="text" class="form-control" id="foodtruck_phone" name="foodtruck_phone" placeholder="<?php echo get_phrase("enter_foodtruck_phone"); ?>" value="<?php echo sanitize($foodtruck_data['phone']); ?>" required>
									</div>
									<div class="form-group">
										<label for="foodtruck_website_link"><?php echo get_phrase("foodtruck_website_link"); ?></label>
										<input type="text" class="form-control" id="foodtruck_website_link" name="foodtruck_website_link" placeholder="<?php echo get_phrase("enter_foodtruck_website_link"); ?>" value="<?php echo sanitize($foodtruck_data['website']); ?>" required>
									</div>
									<button class="btn btn-primary"><?php echo get_phrase('update_address_data'); ?></button>
								</div>
							</div>
						</form>
					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane <?php if ($active_tab == 'delivery') echo 'active' ?>" id="delivery">
						<form action="<?php echo site_url('foodtruck/update/delivery'); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo sanitize($foodtruck_data['id']); ?>">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="delivery_charge"><?php echo get_phrase("delivery_charge") . ' (' . currency_code_and_symbol('code') . ')'; ?></label>
										<input type="number" id="delivery_charge" class="form-control" name="delivery_charge" placeholder="<?php echo sanitize(get_delivery_settings('delivery_charge')) . ' (' . get_phrase("default") . ') '; ?>" value="<?php echo sanitize($foodtruck_data['delivery_charge']); ?>" min="0">
									</div>
									<div class="form-group clockpicker">
										<label for="maximum_time_to_deliver"><?php echo get_phrase("maximum_time_to_deliver"); ?></label>
										<input type="text" class="form-control" id="maximum_time_to_deliver" name="maximum_time_to_deliver" placeholder="<?php echo sanitize(get_delivery_settings('maximum_time_to_deliver')) . ' (' . get_phrase("default") . ') '; ?>" value="<?php echo sanitize($foodtruck_data['maximum_time_to_deliver']); ?>">
									</div>
									<button class="btn btn-primary"><?php echo get_phrase('update_delivery_data'); ?></button>
								</div>
								<div class="col-lg-6">
									<div class="alert alert-info lighten-info mt-4" role="alert">
										<h5 class="alert-heading"><i class="icon fas fa-exclamation-triangle"></i> <?php echo get_phrase('heads_up'); ?>!</h5>
										<p><?php echo get_phrase('you_can_overwrite_the_default_delivery_charge_and_maximum_time_to_deliver'); ?>.</p>
									</div>
								</div>
							</div>
						</form>
					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane <?php if ($active_tab == 'schedule') echo 'active' ?>" id="schedule">
						<form action="<?php echo site_url('foodtruck/update/schedule'); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo sanitize($foodtruck_data['id']); ?>">
							<?php
							$schedule = json_decode($foodtruck_data['schedule'], true);
							$days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
							foreach ($days as $day) : ?>
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label for="<?php echo sanitize($day); ?>_opening"><?php echo get_phrase($day . "_opening"); ?></label>
											<select class="form-control" name="<?php echo sanitize($day); ?>_opening">
												<option value="closed" <?php if (!isset($schedule[$day . "_opening"]) || $schedule[$day . "_opening"] == "closed") echo "selected"; ?>>
													<?php echo get_phrase("closed"); ?>
												</option>
												<?php for ($i = 0; $i < 24; $i++) : ?>
													<option value="<?php echo sanitize($i); ?>" <?php if (isset($schedule[$day . "_opening"]) && $schedule[$day . "_opening"] == "$i") echo "selected"; ?>>
														<?php echo date("g:i A", strtotime("$i:00:00")); ?>
													</option>
												<?php endfor; ?>
											</select>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="<?php echo sanitize($day); ?>_closing"><?php echo get_phrase($day . "_closing"); ?></label>
											<select class="form-control" name="<?php echo sanitize($day); ?>_closing">
												<option value="closed" <?php if (!isset($schedule[$day . "_closing"]) || $schedule[$day . "_closing"] == "closed") echo "selected"; ?>>
													<?php echo get_phrase("closed"); ?>
												</option>
												<?php for ($i = 0; $i < 24; $i++) : ?>
													<option value="<?php echo sanitize($i); ?>" <?php if (isset($schedule[$day . "_closing"]) && $schedule[$day . "_closing"] == "$i") echo "selected"; ?>>
														<?php echo date("g:i A", strtotime("$i:00:00")); ?>
													</option>
												<?php endfor; ?>
											</select>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
							<button class="btn btn-primary"><?php echo get_phrase('update_delivery_data'); ?></button>
						</form>
					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane <?php if ($active_tab == 'seo') echo 'active' ?>" id="seo">
						<form action="<?php echo site_url('foodtruck/update/seo'); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo sanitize($foodtruck_data['id']); ?>">
							<div class="form-group">
								<label for="tags"><?php echo "SEO " . get_phrase("tags"); ?></label>
								<input type="text" id="tags" class="tagged form-control" data-removeBtn="true" name="seo_tags" value="<?php echo sanitize($foodtruck_data['seo_tags']); ?>" placeholder="<?php echo get_phrase("enter_tags_and_press_enter"); ?>">
							</div>
							<div class="form-group">
								<label for="description"><?php echo "SEO " . get_phrase("description"); ?></label>
								<textarea class="form-control" id="description" name="seo_description" rows="5" cols="80" placeholder="<?php echo get_phrase("this_will_show_in_the_meta_description"); ?>..."><?php echo sanitize($foodtruck_data['seo_description']); ?></textarea>
							</div>
							<button type="submit" class="btn btn-primary"><?php echo get_phrase('update') . ' SEO ' . get_phrase('data'); ?></button>
						</form>
					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane <?php if ($active_tab == 'gallery') echo 'active' ?>" id="gallery">
						<form action="<?php echo site_url('foodtruck/update/gallery'); ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo sanitize($foodtruck_data['id']); ?>">

							<!-- RESTAURANT THUMBNAIL -->
							<div class="form-group">
								<label for="foodtruck_thumbnail"><?php echo get_phrase("foodtruck_thumbnail"); ?> <span class="badge badge-default">(400 X 291)</span></label>
								<div class="avatar-upload">
									<div class="avatar-edit">
										<input type='file' class="imageUploadPreview" id="foodtruck_thumbnail" name="foodtruck_thumbnail" accept=".png, .jpg, .jpeg" />
										<label for="foodtruck_thumbnail"></label>
									</div>
									<div class="avatar-preview">
										<div id="foodtruck_thumbnail_preview" thumbnail="<?php echo base_url('uploads/foodtruck/thumbnail/' . sanitize($foodtruck_data['thumbnail'])); ?>"></div>
									</div>
								</div>
							</div>

							<!-- RESTAURANT GALLERY IMAGES -->
							<div class="row">
								<?php
								$foodtruck_gallery_images = empty($foodtruck_data['gallery']) ? ['placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png', 'placeholder.png'] : json_decode($foodtruck_data['gallery']);
								for ($counter = 1; $counter <= 9; $counter++) : ?>
									<div class="col-lg-3">
										<div class="form-group">
											<label for='<?php echo "foodtruck_gallery_$counter"; ?>'><?php echo get_phrase("foodtruck_gallery") . ' ' . $counter; ?> <span class="badge badge-default">(672 X 414)</span> </label>
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' class="imageUploadPreview" id='<?php echo "foodtruck_gallery_$counter"; ?>' name='<?php echo "foodtruck_gallery_$counter"; ?>' accept=".png, .jpg, .jpeg" />
													<label for='<?php echo "foodtruck_gallery_$counter"; ?>'></label>
												</div>
												<div class="avatar-preview">
													<div id='<?php echo "foodtruck_gallery_" . $counter . "_preview"; ?>' thumbnail="<?php echo base_url('uploads/foodtruck/gallery/' . $foodtruck_gallery_images[$counter - 1]); ?>"></div>
												</div>
											</div>
										</div>
									</div>
								<?php endfor; ?>
							</div>
							<button type="submit" class="btn btn-primary"><?php echo get_phrase('update_gallery'); ?></button>
						</form>
					</div>
					<!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div><!-- /.card-body -->
		</div>
		<!-- ./card -->
	</div>
	<!--/. container-fluid -->
</section>