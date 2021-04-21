<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header bft-card-header">
                        <h4 class="pull-left mt-1">Your Food Trucks</h4>
                        <div class="pull-right">
                            <a href="<?php echo site_url('foodtruck/add'); ?>" class="btn ft-hero-btn ft-radius-btn">Add a Food Truck</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php if (count($foodtrucks)) : ?>
                            <table id="foodtrucks" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Food Truck Name</th>
                                        <th>Number of attendees</th>
                                        <th>Minimum Price per Person</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($foodtrucks as $foodtruck) : ?>
                                        <tr>
                                            <td><a href="<?php echo site_url('foodtruck/edit/' . sanitize($foodtruck['id']) . '/basic'); ?>"><?php echo sanitize($foodtruck['name']); ?></a></td>
                                            <td><?php echo sanitize($foodtruck['number_of_attendees']); ?></td>
                                            <td><?php echo sanitize($foodtruck['minimum_price_per_person']); ?></td>
                                            <td class="text-center">
                                                <button class="btn action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                                <ul class="dropdown-menu">
                                                    <?php if ($foodtruck['approved']) : ?>
                                                        <li><a class="dropdown-item" href="<?php echo site_url('home/foodtruck/' . sanitize(rawurlencode($foodtruck['slug'])) . '/' . sanitize($foodtruck['id'])); ?>"><?php echo get_phrase("view_on_frontend"); ?></a></li>
                                                    <?php endif; ?>
                                                    <li><a class="dropdown-item" href="<?php echo site_url('foodtruck/page-builder/' . sanitize($foodtruck['id'])); ?>">Page Builder</a></li>
                                                    <li><a class="dropdown-item" href="<?php echo site_url('foodtruck/edit/' . sanitize($foodtruck['id']) . '/basic'); ?>"><?php echo get_phrase("edit"); ?></a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('foodtruck/delete/' . sanitize($foodtruck['id'])); ?>')"><?php echo get_phrase("delete"); ?></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Food Truck Name</th>
                                        <th>Number of attendees</th>
                                        <th>Minimum Price per Person</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        <?php endif; ?>

                        <!-- IF LIST IS EMPTY -->
                        <?php if (!count($foodtrucks)) : ?>
                            <?php isEmpty(); ?>
                        <?php endif; ?>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
