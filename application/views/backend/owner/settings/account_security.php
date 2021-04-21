<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-5 account-security">
                    <div class="card-header p-2">
                        <h4 class="bft-card-title">Account Security</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="bft-card-title">Login Devices</h5>
                        <?php if (count($login_devices) > 0): ?>
                            <div class="alert alert-success m-l-12 m-r-12">
                                <span class="alert-icon"></span>
                                The following are the most recent devices that have logged into your account in the last 30 days.
                                See anything suspicious? Contact us at <a href="#" class="alert-link">support@bookingfoodtrucks.com</a>
                            </div>
                            <?php foreach($login_devices as $device): ?>
                            <div class="row">
                                <div class="col-md-12 pl-5 ml-5">
                                    <strong><?=$device->os;?> (<?=$device->browser;?> <?=$device->browser_version;?>)</strong><br />
                                    <p class="mb-0"><?=$device->city;?>, <?=$device->state;?>, <?=$device->country;?></p>
                                    <p class="text-muted">Last login at <?=_d($device->created_at, 'F j, Y, g:i a');?> (<?=$device->timezone;?>)</p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                        <p class="ml-3">There are no devices to show.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
