<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item mt-1 ml-2 d-sm-inline-block">
      <a href="<?php echo site_url("home"); ?>" class="btn btn-sm btn-success bg-gradient-olive" role="button"><i class="far fa-paper-plane"></i> <?php echo get_phrase('view_website'); ?></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <?php if (in_array($loggedin_user_role, array('superadmin', 'owner', 'admin'))) : ?>
      <?php
      // $pending_orders = $this->order_model->count_total_orders('pending');
      // $pending_foodtrucks = count($this->foodtruck_model->get_all_pending());
      // $pending_drivers = count($this->driver_model->get_pending_drivers());
      // if($this->session->userdata('user_role') == 'admin'){
      //   $pending_staff = $pending_orders + $pending_foodtrucks + $pending_drivers;
      // }elseif($this->session->userdata('user_role') == 'owner'){
      //   $pending_staff = $pending_orders;
      // }
      ?>
      <li class="nav-item dropdown mr-3 md-hidden">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php //echo sanitize($pending_staff); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg hero-dropdown-menu dropdown-menu-right">
          <!-- <span class="dropdown-item dropdown-header"><?php //echo get_phrase('pending_notification') ?></span> -->
          <!-- <div class="dropdown-divider"></div> -->
          <a href="<?php echo site_url('orders/today'); ?>" class="dropdown-item hero-dropdown-item">
            <i class="fas fa-pizza-slice mr-2"></i> <?php //echo sanitize($pending_orders) . ' ' . get_phrase('pending_orders'); ?>
          </a>
          <?php if ($this->session->userdata('user_role') == 'admin') : ?>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('foodtruck/pending'); ?>" class="dropdown-item hero-dropdown-item">
              <i class="fas fa-utensils mr-2"></i> <?php //echo sanitize($pending_foodtrucks) . ' ' . get_phrase('pending_foodtrucks'); ?>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('driver?status=pending'); ?>" class="dropdown-item hero-dropdown-item">
              <i class="fa fa-file-text-o mr-2"></i> <?php //echo sanitize($pending_drivers) . ' ' . get_phrase('pending_applications'); ?>
            </a>
          <?php endif; ?>
        </div>
      </li>
    <?php endif; ?>
    <li class="nav-item md-show">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item dropdown">
      <a href="javascript:void(0)" class="btn btn-default" data-toggle="dropdown">
        <i class="fas fa-lg fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right hero-dropdown-menu">
        <a href="<?php echo site_url('settings/profile'); ?>" class="dropdown-item hero-dropdown-item">
          Your profile
        </a>
        <?php if ($this->session->userdata('user_role') == "admin") : ?>
          <a href="<?php echo site_url('settings/system'); ?>" class="dropdown-item hero-dropdown-item">
            <?php echo get_phrase('system_settings'); ?>
          </a>
          <a href="<?php echo site_url('settings/website'); ?>" class="dropdown-item hero-dropdown-item">
            <?php echo get_phrase('website_settings'); ?>
          </a>
        <?php endif; ?>
        <div class="dropdown-divider"></div>
        <a href="<?php echo site_url('logout'); ?>" class="dropdown-item">
          <i class="fas fa-sign-out-alt"></i> <?php echo get_phrase('logout'); ?>
        </a>
      </div>
    </li>
  </ul>
</nav>
