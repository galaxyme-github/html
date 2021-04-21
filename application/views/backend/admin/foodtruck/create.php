<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <form class="" action="<?php echo site_url('foodtruck/store') ?>" method="post" data-toggle="validator" role="form">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card card-secondary">
                        <!-- <div class="card-header">
                            <h3 class="card-title"><?php echo get_phrase('basic_information'); ?></h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="foodtruck_name">Food Truck name<span class="text-success">*</span></label>
                                <input type="text" class="form-control" id="foodtruck_name" name="foodtruck_name" required>
                            </div>
                            <div class="form-group">
                                <label for="foodtruck_phone">Phone<span class="text-success">*</span></label>
                                <input type="text" class="form-control" id="foodtruck_phone" name="foodtruck_phone" required>
                            </div>
                            <div class="form-group">
                                <label for="foodtruck_email">Email<span class="text-success">*</span></label>
                                <input type="email" class="form-control" id="foodtruck_email" name="foodtruck_email" required>
                            </div>
                            <div class="form-group">
                                <label for="foodtruck_address">Address<span class="text-success">*</span></label>
                                <textarea class="form-control" rows="2" id="foodtruck_address" name="foodtruck_address" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foodtruck_city">City<span class="text-success">*</span></label>
                                <input type="text" class="form-control" id="foodtruck_city" name="foodtruck_city" required>
                            </div>
                            <div class="form-group">
                                <label for="foodtruck_state">State<span class="text-success">*</span></label>
                                <input type="text" class="form-control" id="foodtruck_state" name="foodtruck_state" required>
                            </div>
                            <div class="form-group">
                                <label for="foodtruck_zipcode">Zip Code<span class="text-success">*</span></label>
                                <input type="text" class="form-control" id="foodtruck_zipcode" name="foodtruck_zipcode" required>
                            </div>
                            <div class="form-group">
                                <label for="foodtruck_website_url">Food Truck Website URL</label>
                                <input type="text" class="form-control" id="foodtruck_website_url" name="foodtruck_website_url" required>
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label mb-10">Service Type</label>
                                <div class="radio-list">
                                    <div class="radio-inline pl-0">
                                        <span class="radio radio-info">
                                            <input type="radio" name="service_type" id="radio_1" value="0" checked>
                                            <label for="radio_1">Catering and A la Cart</label>
                                        </span>
                                    </div>
                                    <div class="radio-inline ml-3">
                                        <span class="radio radio-info">
                                            <input type="radio" name="service_type" id="radio_2" value="1">
                                            <label for="radio_2">Only Catering </label>
                                        </span>
                                    </div>
                                    <div class="radio-inline ml-3">
                                        <span class="radio radio-info">
                                            <input type="radio" name="service_type" id="radio_3" value="2">
                                            <label for="radio_3">Only A la Carte </label>
                                        </span>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="form-group">
                                <label><?php echo get_phrase("cuisine"); ?></label> <small class="float-right"><a href="<?php echo site_url('cuisine/create'); ?>"><?php echo get_phrase("create_new_cuisine"); ?></a></small>
                                <select class="form-control select2" name="cuisine[]" multiple="multiple" data-placeholder="<?php echo get_phrase("choose_cuisines"); ?>" required>
                                    <?php foreach ($cuisines as $cuisine) : ?>
                                        <option value="<?php echo sanitize($cuisine['id']); ?>"><?php echo sanitize($cuisine['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div> -->
                            <button class="btn ft-hero-btn"><?php echo get_phrase('save'); ?></button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--/. container-fluid -->
</section>
