<!-- Main Banner Starts -->
<div class="main-banner" style="background: url(<?php echo base_url('uploads/frontend/banners/how-it-works-customer.jpg'); ?>) center top;">
    <div class="container px-md-0">
        <h2><span><?=$page_title;?></span></h2>
    </div>
</div>
<!-- Main Banner Ends -->
<!-- Breadcrumb Starts -->
<div class="breadcrumb">
    <div class="container px-md-0">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="<?php echo site_url('home') ?>">Home</a>
            </li>
            <li class="list-inline-item active">
                <?php echo $page_title; ?>
            </li>
        </ul>
    </div>
</div>
<!-- Breadcrumb Ends -->
<!-- How it Works Switcher -->
<div class="container">
    <section class="how-it-works-switcher-block p-t-4">
        <h3 class="main-heading">How to book a food truck on BFT?</h3>
        <p>BFT is the fast and easy way to browse, contact, and hire the food trucks and services for your events like birthday party, </p>
        <div class="col-center">
            <div class="row pt-3">
                <div class="col-md-12">
                    <div class="how-it-works-switcher">
                        <div class="option active">
                            Find a Food Truck
                        </div>
                        <div class="option">
                            <a href="<?php echo site_url('how-it-works/foodtruck-owner'); ?>" class="text-link">Start business as a BFT Member</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- How it Works Switcher Ends -->