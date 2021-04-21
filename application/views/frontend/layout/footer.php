<!-- Footer Starts -->
<?php $social_links = json_decode(get_website_settings('social_links'), true); ?>
<footer id="footer">
    <!-- Footer Area Starts -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="row footer-links-wrapper">
                    <div class="col-lg-3 col-md-6 footer-links">
                    <a class="navbar-brand" href="<?php echo site_url("site"); ?>"> <img src="<?php echo base_url('assets/images/'); ?>dark_logo.png" class="system-icon"></a>
                        <ul class="mt-4">
                            <li><i class="fa fa-envelope"></i><a href="mailto:info@bookingfoodtrucks.com">&nbsp;&nbsp;info@bookingfoodtrucks.com</a></li>
                            <li><i class="fa fa-phone"></i><a href="tel:+19193607600">&nbsp;&nbsp;+1 919 360 7600</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links mt-3">
                        <h4>Learn More</h4>
                        <ul class="footer-list">
                            <li><a href="">Read Our Blog</a></li>
                            <li><a href="">BFT Q&A Community</a></li>
                        </ul>
                        <ul class="footer-list">
                            <li><a href="<?php echo site_url('bft-guarantee'); ?>">BFT Garantee</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links mt-3">
                        <h4>About BFT</h4>
                        <ul class="footer-list">
                            <li><a href="<?php echo site_url('about-us'); ?>">About Us</a></li>
                            <li><a href="<?php echo site_url('contact-us'); ?>">Contact Us</a></li>
                        </ul>
                        <ul class="footer-list">
                            <li><a href="<?php echo site_url('terms'); ?>">Terms of Service</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links mt-3">
                        <h4>Need Help?</h4>
                        <ul class="footer-list">
                            <li><a href="<?php echo site_url('help-center'); ?>">Help Center</a></li>
                        </ul>
                        <ul class="footer-list">
                            <li><a href="<?php echo site_url('how-it-works/customer'); ?>">How it Works</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-md-flex py-4">
            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright">
                    &copy; <?php echo get_system_settings('footer_text'); ?>.
                </div>
            </div>
            <!-- Copyright Ends -->
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="<?php echo sanitize($social_links['facebook']); ?>" class="facebook bft-facebook"><span class="ti-facebook"></span></a>
                <a href="<?php echo sanitize($social_links['instagram']); ?>" class="instagram bft-instagram"><span class="ti-instagram"></span></i></a>
                <a href="<?php echo sanitize($social_links['twitter']); ?>" class="twitter bft-twitter"><span class="ti-twitter"></span></a>
                <a href="<?php echo sanitize($social_links['pinterest']); ?>" class="pinterest bft-pinterest"><span class="ti-pinterest"></span></i></a>
                <!-- <a href="<?php echo sanitize($social_links['skype']); ?>" class="google-plus"><span class="ti-skype"></span></i></a>
                <a href="<?php echo sanitize($social_links['linkedin']); ?>" class="linkedin"><span class="ti-linkedin"></span></i></a> -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer Ends -->
