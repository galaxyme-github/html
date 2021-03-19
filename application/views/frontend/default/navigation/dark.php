<div class="dark-bg sticky-top">
	<!-- <div class="container-fluid"> -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light">
					<a class="navbar-brand" href="<?php echo site_url("site"); ?>"> <img src="<?php echo base_url('uploads/system/' . get_website_settings('website_logo')); ?>" class="system-icon"> <span class="d-none d-sm-inline-block"><?php //echo get_system_settings('system_name'); ?></span> </a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-menu"></span>
					</button>

					<div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
						<ul class="navbar-nav">
							<!--li class="nav-item">
								<a class="nav-link" href=""><i class="fas fa-search"></i>&nbsp;<?php echo site_phrase('search_food_trucks'); ?></a>
							</li-->
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('site/become_a_member'); ?>"><i class="far fa-heart"></i>&nbsp;<?php echo site_phrase('become_a_bft_member'); ?></a>
							</li>
						</ul>
						<div class="float-right">
							<ul class="navbar-nav">

								<?php if ($this->session->userdata('is_logged_in')) { ?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo site_url(); ?>"><?php echo site_phrase('home'); ?></a>
								</li>
								<!--li class="nav-item dropdown">
									<a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?php echo site_phrase('foodtrucks'); ?>
										<span class="icon-arrow-down"></span>
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										<a class="dropdown-item" href="<?php echo site_url('home/foodtrucks/popular'); ?>"><?php echo site_phrase('popular'); ?></a>
										<a class="dropdown-item" href="<?php echo site_url('home/foodtrucks/recent'); ?>"><?php echo site_phrase('recently_added'); ?></a>
									</div>
								</li-->
								<!-- <li class="nav-item">
									<a class="nav-link" href="<?php echo site_url('home/about_us'); ?>"><?php echo sanitize(site_phrase('about_us')); ?></a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="<?php echo site_url('login'); ?>"><?php echo sanitize(site_phrase('manage_profile', true)); ?></a>
								</li> -->

								<!-- <li>
									<a href="<?php echo site_url('cart'); ?>" class="btn btn-outline-light cart-btn"><span class="cart-items" id="#cart-items"><?php echo sanitize($this->cart_model->total_cart_items()); ?></span><span class="ti-shopping-cart"></span></a>
								</li> -->
								<li class="nav-item dropdown">
									<a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?php echo make_username(); ?>
										<span class="icon-arrow-down"></span>
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										<a class="dropdown-item" href="<?php echo site_url('dashboard'); ?>"><?php echo site_phrase('dashboard'); ?></a>
										<a class="dropdown-item" href="<?php echo site_url('settings/profile'); ?>"><?php echo site_phrase('profile'); ?></a>
										<a class="dropdown-item" href="<?php echo site_url('logout'); ?>"><?php echo site_phrase('log_out'); ?></a>
									</div>
								</li>
								<?php }else { ?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo site_url('auth/roles'); ?>"><?php echo site_phrase('sign_up'); ?></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo site_url('login'); ?>"><?php echo sanitize(site_phrase('sign_in')); ?></a>
								</li>
								<?php } ?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo site_url('help'); ?>"><i class="fas fa-question-circle"></i>&nbsp;<?php echo sanitize(site_phrase('help')); ?></a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
