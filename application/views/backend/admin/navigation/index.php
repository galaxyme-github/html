<aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- BFT Brand -->
    <a href="<?php echo site_url('dashboard'); ?>" class="brand-link">
        <img src="<?php echo base_url('uploads/system/' . get_website_settings('backend_logo')); ?>" alt="" class="brand-image">
    </a>

    <!-- Sidebar Starts -->
    <div class="sidebar">
        <!-- User Photo/Name -->
        <div class="user-panel mt-4 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=base_url('uploads/user/' . sanitize($loggedin_user->photo));?>" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <a href="<?=site_url('settings/profile');?>" class="d-block"><?php echo get_account_name(); ?></a>
            </div>
        </div>
        <!-- User Photo/Name Ends -->

        <!-- Mian Navigation Starts -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?=site_url('dashboard');?>" class="nav-link <?php if ($page_name == "dashboard/index") echo 'active'; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Order Nav Starts -->
                <?php $order_type = isset($order_type) ? $order_type : ""; ?>
                <li class="nav-item has-treeview <?php if ($page_name == "orders/index" && $order_type == "all"  || $order_type == "today" || $page_name == "orders/details") echo 'menu-open'; ?>">
                    <a href="#" class="nav-link <?php if ($page_name == "orders/index" && $order_type == "all"  || $order_type == "today" || $page_name == "orders/details") echo 'active'; ?>">
                        <i class="nav-icon fas fa-hamburger"></i>
                        <p>Orders <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=site_url('orders/today');?>" class="nav-link <?php if ($order_type == "today") echo 'active'; ?>">
                                <p>Today orders
                                    <span class="badge badge-warning right">
                                        <?php
                                       // $number_of_todays_pending_orders = $this->order_model->get_number_of_todays_pending_orders();
                                        //echo sanitize($number_of_todays_pending_orders);
                                        ?>
                                    </span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url('orders');?>" class="nav-link <?php if ($order_type == "all" || $page_name == "orders/details") echo 'active'; ?>">
                                <p>All orders</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Order Nav Ends -->

                <!-- <li class="nav-item">
                    <a href="<?php echo site_url('cuisine'); ?>" class="nav-link <?php if ($page_name == "cuisine/index" || $page_name == "cuisine/create" || $page_name == "cuisine/edit") echo 'active'; ?>">
                        <i class="fas fa-pepper-hot nav-icon"></i>
                        <p>
                            <?php echo get_phrase('cuisine'); ?>
                        </p>
                    </a>
                </li> -->

                <!-- <li class="nav-item">
                    <a href="<?php echo site_url('foodtruck'); ?>" class="nav-link <?php if ($page_name == "foodtruck/index" || $page_name == "foodtruck/create" || $page_name == "foodtruck/edit") echo 'active'; ?>">
                        <i class="fas fa-truck-moving nav-icon"></i>
                        <p><?php echo get_phrase("foodtrucks"); ?><span class="badge badge-warning right"><?php //echo count($this->foodtruck_model->get_all_pending()); ?></span></p>
                    </a>
                </li> -->

                <!-- FoodTruck Nav Starts -->
                <?php $foodtruck_type = isset($foodtruck_type) ? $foodtruck_type : ""; ?>
                <li class="nav-item has-treeview <?php if ($page_name == "foodtruck/index" || $page_name == "foodtruck/create" || $page_name == "foodtruck/edit" || $foodtruck_type == "pending"  || $foodtruck_type == "approved") echo 'menu-open'; ?>">
                    <a href="#" class="nav-link <?php if ($page_name == "foodtruck/index" || $page_name == "foodtruck/create" || $page_name == "foodtruck/edit" || $foodtruck_type == "pending"  || $foodtruck_type == "approved") echo 'active'; ?>">
                        <i class="fas fa-truck-moving nav-icon"></i>
                        <p>Foodtruck<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=site_url('foodtruck');?>" class="nav-link <?php if ($foodtruck_type == "approved") echo 'active'; ?>">
                                <p>Approved</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('foodtruck/pending'); ?>" class="nav-link <?php if ($foodtruck_type == "pending") echo 'active'; ?>">
                                <p>Requested<span class="badge badge-warning right"><?php //echo count($this->foodtruck_model->get_all_pending()); ?></span></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- FoodTruck Nav Ends -->

                <!--li class="nav-item">
                    <a href="<?php echo site_url('qrmenu'); ?>" class="nav-link <?php if ($page_name == "qrmenu/index" || $page_name == "qrmenu/create") echo 'active'; ?>">
                        <i class="fas fa-qrcode nav-icon"></i>
                        <p><?php echo "QR ".get_phrase("menu_builder"); ?></p>
                    </a>
                </li-->

                <!-- Dish Menu Starts -->
                <li class="nav-item has-treeview <?php if ($page_name == "category/index" || $page_name == "category/create" || $page_name == "category/edit" || $page_name == "menu/index" || $page_name == "menu/create" || $page_name == "menu/edit") echo 'menu-open'; ?>">
                    <a href="#" class="nav-link <?php if ($page_name == "category/index" || $page_name == "category/create" || $page_name == "category/edit" || $page_name == "menu/index" || $page_name == "menu/create" || $page_name == "menu/edit") echo 'active'; ?>">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>Dish Menu<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=site_url('category'); ?>" class="nav-link <?php if ($page_name == "category/index" || $page_name == "category/create" || $page_name == "category/edit") echo 'active'; ?>">
                                <p>Menu Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url('menu');?>" class="nav-link <?php if ($page_name == "menu/index" || $page_name == "menu/create" || $page_name == "menu/edit") echo 'active'; ?>">
                                <p>Dish</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Dish Menu Ends -->

                <!-- Report Nav Starts -->
                <?php $report_type = isset($report_type) ? $report_type : ""; ?>
                <li class="nav-item has-treeview <?php if ($page_name == "report/index" && $report_type == "owner" || $report_type == "admin" || $report_type == "details") echo 'menu-open'; ?>">
                    <a href="#" class="nav-link <?php if ($page_name == "report/index" && $report_type == "owner" || $report_type == "admin" || $report_type == "details") echo 'active'; ?>">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Report<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('report/admin'); ?>" class="nav-link <?php if ($report_type == "admin") echo 'active'; ?>">
                                <p>My revenue</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('report'); ?>" class="nav-link <?php if ($report_type == "owner" || $report_type == "details") echo 'active'; ?>">
                                <p>Owner revenue</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Report Nav Ends -->

                <?php $application_type = isset($application_type) ? $application_type : ""; ?>
                <li class="nav-item has-treeview <?php if ($page_name == "member_application/index" && $application_type == "processed"  || $application_type == "pending" || $page_name == "member_application/details") echo 'menu-open'; ?>">
                    <a href="#" class="nav-link <?php if ($page_name == "member_application/index" && $application_type == "processed"  || $application_type == "pending" || $page_name == "member_application/details") echo 'active'; ?>">
                        <i class="nav-icon fa fa-file-text-o"></i>
                        <p>Member Applications<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('bft-member/pending-applications'); ?>" class="nav-link <?php if ($application_type == "pending") echo 'active'; ?>">
                                <p>New Applications
                                    <span class="badge badge-warning right">
                                    <?php
                                        $number_of_pending_applications = $this->member_model->count_pending_applications();
                                        echo $number_of_pending_applications;
                                    ?>
                                    </span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('bft-member/processed-applications'); ?>" class="nav-link <?php if ($application_type == "processed") echo 'active'; ?>">
                                <p>Processed Applications</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- User Group Nav Starts -->
                <li class="nav-header">User</li>

                <li class="nav-item">
                    <a href="<?=site_url('owner');?>" class="nav-link <?php if ($page_name == "owner/index" || $page_name == "owner/edit" || $page_name == "owner/profile") echo 'active'; ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Owners</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=site_url('customer');?>" class="nav-link <?php if ($page_name == "customer/index" || $page_name == "customer/create" || $page_name == "customer/edit" || $page_name == "customer/profile") echo 'active'; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>
                <!-- User Group Nav Ends -->

                <!-- Settings Group Nav Starts -->
                <li class="nav-header">Settings</li>

                <li class="nav-item has-treeview <?php if ($page_name == "settings/delivery" || $page_name == "settings/language" || $page_name == "settings/phrase" || $page_name == "settings/system" || $page_name == "settings/website" || $page_name == "settings/payment" || $page_name == "settings/vat" || $page_name == "settings/revenue" || $page_name == "settings/recaptcha" || $page_name == "settings/smtp" || $page_name == "backup/index") echo 'menu-open'; ?>">
                    <a href="#" class="nav-link <?php if ($page_name == "settings/delivery" || $page_name == "settings/language" || $page_name == "settings/phrase" || $page_name == "settings/system" || $page_name == "settings/website"  || $page_name == "settings/payment" || $page_name == "settings/vat" || $page_name == "settings/revenue" || $page_name == "settings/recaptcha" || $page_name == "settings/smtp" || $page_name == "backup/index") echo 'active'; ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            <?php echo get_phrase("settings"); ?>
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('settings/system'); ?>" class="nav-link <?php if ($page_name == 'settings/system') echo 'active'; ?>">
                                <i class="fas fa-sliders-h nav-icon"></i>
                                <p><?php echo get_phrase("system_settings", true); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('settings/website'); ?>" class="nav-link <?php if ($page_name == 'settings/website') echo 'active'; ?>">
                                <i class="fab fa-chrome nav-icon"></i>
                                <p><?php echo get_phrase("website_settings", true); ?></p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?php echo site_url('payment'); ?>" class="nav-link <?php if ($page_name == 'settings/payment') echo 'active'; ?>">
                                <i class="fas fa-coins nav-icon"></i>
                                <p><?php echo get_phrase("payment_settings", true); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('settings/smtp'); ?>" class="nav-link <?php if ($page_name == 'settings/smtp') echo 'active'; ?>">
                                <i class="far fa-paper-plane nav-icon"></i>
                                <p><?php echo get_phrase("smtp_settings", true); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('language'); ?>" class="nav-link <?php if ($page_name == 'settings/language' || $page_name == 'settings/phrase') echo 'active'; ?>">
                                <i class="fas fa-language nav-icon"></i>
                                <p><?php echo get_phrase("language_settings", true); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('settings/delivery'); ?>" class="nav-link <?php if ($page_name == 'settings/delivery') echo 'active'; ?>">
                                <i class="fas fa-truck-loading nav-icon"></i>
                                <p><?php echo get_phrase("delivery_settings", true); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('settings/revenue'); ?>" class="nav-link <?php if ($page_name == 'settings/revenue') echo 'active'; ?>">
                                <i class="fas fa-divide nav-icon"></i>
                                <p><?php echo get_phrase("revenue_settings", true); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('settings/vat'); ?>" class="nav-link <?php if ($page_name == 'settings/vat') echo 'active'; ?>">
                                <i class="fas fa-square-root-alt nav-icon"></i>
                                <p><?php echo "VAT " . get_phrase("settings", true); ?></p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="<?=site_url('settings/recaptcha');?>" class="nav-link <?php if ($page_name == 'settings/recaptcha') echo 'active'; ?>">
                                <i class="fas fa-robot nav-icon"></i>
                                <p><?php echo "reCaptcha " . get_phrase("settings", true); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url('backup/');?>" class="nav-link <?php if ($page_name == 'backup/index') echo 'active'; ?>">
                                <i class="fas fa-database nav-icon"></i>
                                <p>Database Backup</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Settings Group Nav Ends -->
                <li class="nav-item">
                    <a href="<?php echo site_url('settings/profile'); ?>" class="nav-link <?php if ($page_name == "settings/profile") echo 'active'; ?>">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>Profile Control</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Main Navigation Ends -->
    </div>
    <!-- Sidebar Ends -->
</aside>
