<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="mt-5"><?php echo sanitize($foodtruck_status) ? get_phrase('list_of_your_approved_foodtrucks', true) : get_phrase('list_of_your_pending_foodtrucks', true); ?></span>
                    <?php if ($foodtruck_status) : ?>
                        <a href="<?php echo site_url('foodtruck/pending'); ?>" class="btn btn-secondary btn-sm btn-rounded float-right"><?php echo get_phrase("show_requested_foodtrucks", true); ?></a>
                    <?php else : ?>
                        <a href="<?php echo site_url('foodtruck'); ?>" class="btn btn-success btn-sm btn-rounded float-right"><?php echo get_phrase("show_approved_foodtrucks", true); ?></a>
                    <?php endif; ?>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if (count($foodtrucks)) : ?>
                    <table id="foodtrucks" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("foodtruck_name"); ?></th>
                                <th><?php echo get_phrase("address"); ?></th>
                                <th><?php echo get_phrase("phone_number"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($foodtrucks as $foodtruck) : ?>
                                <tr>
                                    <td><a href="<?php echo site_url('foodtruck/edit/' . sanitize($foodtruck['id']) . '/basic'); ?>"><?php echo sanitize($foodtruck['name']); ?></a></td>
                                    <td><small><?php echo sanitize($foodtruck['address']); ?></small></td>
                                    <td><?php echo sanitize($foodtruck['phone']); ?></td>
                                    <td class="text-center">
                                        <button class="btn action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                        <ul class="dropdown-menu">
                                            <?php if ($foodtruck_status) : ?>
                                                <li><a class="dropdown-item" href="<?php echo site_url('home/foodtruck/' . sanitize(rawurlencode($foodtruck['slug'])) . '/' . sanitize($foodtruck['id'])); ?>"><?php echo get_phrase("view_on_frontend"); ?></a></li>
                                            <?php endif; ?>
                                            <li><a class="dropdown-item" href="<?php echo site_url('foodtruck/edit/' . sanitize($foodtruck['id']) . '/basic'); ?>"><?php echo get_phrase("edit"); ?></a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('foodtruck/delete/' . sanitize($foodtruck['id'])); ?>')"><?php echo get_phrase("delete"); ?></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo get_phrase("foodtruck_name"); ?></th>
                                <th><?php echo get_phrase("address"); ?></th>
                                <th><?php echo get_phrase("phone_number"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
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
