<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- content-header End -->

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-info card-outline">
                    <div class="card-body box-profile">
                        <div class="text-spinner d-none" id="ft-spinner">
                            <img src="<?php echo base_url('assets/loader.svg'); ?>">
                        </div>
                        <h3 class="profile-username text-center" id="application_code"><?php echo sanitize($application_data['code']); ?></h3>
                        <div class="text-center mb-3" id="applic-status">
                            <?php if ($application_data['accepted'] == 0): ?>
                                <span class="font-italic text-primary"><i class="fas fa-check pr-2"></i>Pending</span>
                            <?php elseif ($application_data['accepted'] == 1): ?>
                                <span class="font-italic text-success"><i class="fas fa-check pr-2"></i>Accepted</span>
                            <?php else: ?>
                                <span class="font-italic text-dark"><i class="fas fa-check pr-2"></i>Declined</span>
                            <?php endif; ?>
                        </div>
                        <!-- Generated Account info -->
                        <?php if ($password = $this->session->flashdata('default_pwd')): ?>
                        <div class="mb-5">
                            <div class="alert alert-success alert-dismissable alert-style-1">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="zmdi zmdi-check"></i>Default account has been created successfully. 
                            </div>
                            <div class="d-inline-block mr-3">
                                <b>User Email: &nbsp;</b><?=$application_data['email'];?>
                            </div>
                            <div class="d-inline-block">
                                <b>Password: &nbsp;</b><?=$password;?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('decline')): ?>
                            <div class="alert alert-warning alert-dismissable alert-style-1">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="zmdi zmdi-alert-circle-o"></i>This application has been declined by you.
                            </div>
                        <?php endif; ?>
                        <!--// -->

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Company: </b> <a class="float-right" id="company"><?php echo sanitize($application_data['company_name']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Food Truck Owner Name: </b> <a class="float-right">
                                    <span id="owner_first_name"><?php echo sanitize($application_data['first_name']); ?></span>&nbsp;
                                    <span id="owner_last_name"><?php echo sanitize($application_data['last_name']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Food Truck Owner Email: </b> <a class="float-right" id="owner_email"><?php echo sanitize($application_data['email']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Food Truck Owner Phone Number: </b> <a class="float-right" id="owner_phone"><?php echo sanitize($application_data['phone']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Website URL: </b> <a class="float-right" href="<?php echo sanitize($application_data['website_url']); ?>" id="website_url"><?php echo sanitize($application_data['website_url']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Address: </b>
                                <a class="float-right" id="address_1"><?php echo sanitize($application_data['address_1']); ?></a><br />
                                <a class="float-right" id="address_2"><?php echo sanitize($application_data['address_2']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>City: </b> <a class="float-right" id="owner_city"><?php echo sanitize($application_data['city']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>State: </b> <a class="float-right" id="owner_state"><?php echo sanitize($application_data['state']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Zip Code: </b> <a class="float-right" id="owner_zip_code"><?php echo sanitize($application_data['zip_code']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo get_phrase('how_knew_about_us?'); ?>: </b>
                                <?php $heard_from = json_decode($application_data['hear_from']); ?>
                                <a class="float-right text-capitalize">
                                    <?php foreach ($heard_from as $item): ?>
                                        <i class="far fa-check-square ml-2 mr-1"></i><?=$item;?>
                                    <?php endforeach; ?>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Appied At</b>
                                <span class="float-right"><i class='far fa-calendar-alt'></i> <?php echo _d($application_data['created_at'], "d/m/Y H:i:s"); ?></span>
                            </li>
                            <?php if ($application_data['accepted'] == 1): ?>
                                <li class="list-group-item">
                                    <b>Accepted At</b>
                                    <span class="float-right"><i class='far fa-calendar-alt'></i> <?php echo _d($application_data['accepted_at'], "d/m/Y H:i:s"); ?></span>
                                </li>
                            <?php elseif ($application_data['accepted'] == 2): ?>
                                <li class="list-group-item">
                                    <b>Declined At</b>
                                    <span class="float-right"><i class='far fa-calendar-alt'></i> <?php echo _d($application_data['declined_at'], "d/m/Y H:i:s"); ?></span>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <?php if ($application_data['accepted'] == 0): ?>
                            <div class="text-center">
                                <a><button type="button" onclick="confirm_accept(<?=$application_data['id'];?>)" class="btn btn-info btn-block w-25 ml-2" style="display: inline-block">Accept</button></a>
                                <a><button type="button" onclick="confirm_decline(<?=$application_data['id'];?>)" class="btn btn-dark btn-block w-25 ml-5" style="display: inline-block">Decline</button></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Information where applyer operated [auto detected] -->
            <div class="col-md-5">
                <div class="card card-warning card-outline">
                    <div class="card-body box-profile">
                        <h6>Device and Location from owner operated (auto detected by BFT Location Detection System)</h6>
                        <hr />
                        <div class="mb-5">
                            <strong>Device</strong>
                            <div class="ml-5 mt-2">
                                OS: <span class="float-right"><?=$application_data['detected_os'];?></span><br />
                                Browser: <span class="float-right"><?=$application_data['detected_browser'];?></span><br />
                                Browser Version: <span class="float-right"><?=$application_data['detected_browser_version'];?></span><br />
                            </div>
                        </div>
                        <div class="mb-5">
                            <strong>Location</strong>
                            <div class="ml-5 mt-2">
                                City: <span class="float-right"><?=$application_data['detected_city'];?></span><br />
                                State: <span class="float-right"><?=$application_data['detected_state'];?></span><br />
                                Country: <span class="float-right"><?=$application_data['detected_country'];?></span><br />
                                Zip/Postal Code: <span class="float-right"><?=$application_data['detected_zip_code'];?></span><br />
                                Time Zone: <span class="float-right"><?=$application_data['detected_timezone'];?></span><br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Info from applyer operated End -->
        </div>
    </div>
</section>
