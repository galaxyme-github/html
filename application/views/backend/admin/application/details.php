<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-spinner d-none" id="ft-spinner">
                            <img src="<?php echo base_url('assets/loader.svg'); ?>">
                        </div>
                        <h3 class="profile-username text-center"><?php echo sanitize($application_data['code']); ?></h3>
                        <div class="text-center mb-3" id="applic-status">
                            <?php if ($application_data['accepted'] == 0): ?>
                                <span class="font-italic text-primary"><i class="fas fa-check pr-2"></i>Pending</span>
                            <?php elseif ($application_data['accepted'] == 1): ?>
                                <span class="font-italic text-success"><i class="fas fa-check pr-2"></i>Accepted</span>
                            <?php else: ?>
                                <span class="font-italic text-dark"><i class="fas fa-check pr-2"></i>Declined</span>
                            <?php endif; ?>
                        </div>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b><?php echo get_phrase('company_name'); ?>: </b> <a class="float-right"><?php echo sanitize($application_data['company_name']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo get_phrase('owner_name'); ?>: </b> <a class="float-right" id="owner_name"><?php echo sanitize($application_data['first_name']) . " " . sanitize($application_data['last_name']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo get_phrase('email'); ?>: </b> <a class="float-right" id="owner_email"><?php echo sanitize($application_data['email']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo get_phrase('phone'); ?>: </b> <a class="float-right" id="owner_phone"><?php echo sanitize($application_data['phone']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo get_phrase('website_url'); ?>: </b> <a class="float-right" href="<?php echo sanitize($application_data['website_url']); ?>"><?php echo sanitize($application_data['website_url']); ?></a>
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
                                <b><?php echo get_phrase('applied_at'); ?></b>
                                <span class="float-right"><i class='far fa-calendar-alt'></i> <?php echo _d($application_data['created_at'], "d/m/Y H:i:s"); ?></span>
                            </li>
                        </ul>
                        <div class="mt-2">
                            <?php if ($application_data['accepted'] == 0): ?>
                                <div class="text-center">
                                    <a><button type="button" onclick="confirm_accept(<?=$application_data['id'];?>)" class="btn btn-primary btn-block w-25 ml-2" style="display: inline-block">Accept</button></a>
                                    <a><button type="button" onclick="confirm_decline(<?=$application_data['id'];?>)" class="btn btn-dark btn-block w-25 ml-5" style="display: inline-block">Decline</button></a>
                                </div>
                            <?php endif; ?>
                            <?php if ($password = $this->session->flashdata('default_pwd')): ?>
                                <div class="alert alert-success alert-dismissable alert-style-1">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="zmdi zmdi-check"></i>Default account has been created successfully. 
                                </div>
                                <div class="d-inline-block mr-3">
                                    <b class="text-capitalize">user email: &nbsp;</b><?=$application_data['email'];?>
                                </div>
                                <div class="d-inline-block">
                                    <b class="text-capitalize">password: &nbsp;</b><?=$password;?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('decline')): ?>
                                <div class="alert alert-warning alert-dismissable alert-style-1">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="zmdi zmdi-alert-circle-o"></i>You has declined this application.
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
