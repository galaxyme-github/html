<!--============================= FOOTER =============================-->
<?php $social_links = json_decode(get_website_settings('social_links'), true); ?>

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-links">
                    <a class="navbar-brand" href="<?php echo site_url("site"); ?>"> <img src="<?php echo base_url('assets/images/'); ?>dark_logo.png" class="system-icon"></a>
                        <ul class="mt-4">

                            <li>
                                <i class="fa fa-envelope"></i>
                                <a>&nbsp;&nbsp;info@bookingfoodtrucks.com</a>
                            </li>

                            <li>
                                <i class="fa fa-phone"></i>
                                <a>&nbsp;&nbsp;+1 919 360 7600</a>
                            </li>

                            <li style="display: none;">
                                <div class="select mt-3">
                                    <select name="slct" id="slct" onchange="switch_language(this.value)" class="language-selector">
                                        <option disabled><?php echo site_phrase('choose_language'); ?></option>
                                        <?php $languages = $this->language_model->get_all();
                                        foreach ($languages as $key => $language) : ?>
                                            <option value="<?php echo sanitize($language['code']); ?>" <?php if ($this->session->userdata('language') == sanitize($language['code'])) echo "selected"; ?>><?php echo sanitize($language['name']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links mt-3">
                        <h4>Learn More</h4>
                        <ul>
                            <li>
                                <a href="">Read our Blog</a>
                            </li>
                            <li>
                                <a href="">Q & A Community</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('site/bft_garantee'); ?>"><?php echo site_phrase('bft_garantee'); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links mt-3">
                        <h4>About BFT</h4>
                        <ul>
                            <li>
                                <a href="<?php echo site_url('site/about_us'); ?>"><?php echo site_phrase('about_us'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('site/contact_us'); ?>"><?php echo site_phrase('contact_us'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('site/terms_and_conditions'); ?>"><?php echo site_phrase('terms_and_conditions'); ?></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links mt-3">
                        <h4>Need Help</h4>
                        <ul>
                            <li>
                                <a href="<?php echo site_url('site/help'); ?>">Help Center</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('site/how_it_works'); ?>"><?php echo site_phrase('how_it_works'); ?></a>
                            </li>
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
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="<?php echo sanitize($social_links['facebook']); ?>" class="facebook bft-facebook"><span class="ti-facebook"></span></a>
                <a href="<?php echo sanitize($social_links['instagram']); ?>" class="instagram bft-instagram"><span class="ti-instagram"></span></i></a>
                <a href="<?php echo sanitize($social_links['twitter']); ?>" class="twitter bft-twitter"><span class="ti-twitter"></span></a>
                <a href="<?php echo sanitize($social_links['pinterest']); ?>" class="pinterest bft-pinterest"><span class="ti-pinterest"></span></i></a>

                <!-- <a href="<?php echo sanitize($social_links['skype']); ?>" class="google-plus"><span class="ti-skype"></span></i></a>
                <a href="<?php echo sanitize($social_links['linkedin']); ?>" class="linkedin"><span class="ti-linkedin"></span></i></a> -->

                
            </div>
        </div>
    </footer>
<!--============================= FOOTER =============================-->
