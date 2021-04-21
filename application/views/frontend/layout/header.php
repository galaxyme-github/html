<!-- Header Starts -->
<!-- Nested Container Starts -->
    <!-- Navbar Starts -->
    <div class="dark-bg sticky-top nav-box--shadow">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav id="nav" class="navbar navbar-expand-lg navbar-light">
                        <!-- Logo Starts -->
                        <a class="navbar-brand" href="<?=site_url("home");?>"> <img src="<?=base_url('uploads/system/' . get_website_settings('website_logo'));?>" class="system-icon"> <span class="d-none d-sm-inline-block"><?php //echo get_system_settings('system_name');?></span> </a>
                        <!-- Logo Ends -->
                        <!-- Collapse Button Starts -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-menu"></span>
                        </button>
                        <!-- Collapse Button Ends -->
                        <!-- Navbar Collapse Starts -->
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=site_url('become-bft-member');?>"><i class="far fa-heart"></i>&nbsp;Become a BFT Member</a>
                                </li>
                            </ul>
                            <div class="float-left">
                                <ul class="navbar-nav">
                                    <?php if (is_loggedin()): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=site_url('home');?>">Home</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?=get_account_name();?>
                                            <span class="icon-arrow-down"></span>
                                        </a>
                                        <div class="dropdown-menu bft-dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="<?=site_url('dashboard');?>">Dashboard</a>
                                            <a class="dropdown-item" href="<?=site_url('settings/profile');?>">My Account</a>
                                            <a class="dropdown-item" href="<?=site_url('logout');?>">Sign Out</a>
                                        </div>
                                    </li>
                                    <?php else: ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=site_url('auth/roles');?>">Sign Up</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=site_url('login');?>">Sign In</a>
                                    </li>
                                    <?php endif; ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=site_url('help');?>"><i class="fas fa-question-circle"></i>&nbsp;Help</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Navbar Collapse Ends -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar Ends -->
<!-- Nested Container Ends -->
<!-- Header Ends -->