<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="mt-5"><?php echo sanitize($foodtruck_status) ? 'List of registered foodtrucks' : 'List of requested foodtrucks'; ?></span>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if (count($foodtrucks)) : ?>
                    <table id="foodtrucks" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("foodtruck_name"); ?></th>
                                <th><?php echo get_phrase("owner"); ?></th>
                                <th><?php echo get_phrase("address"); ?></th>
                                <th><?php echo get_phrase("phone_number"); ?></th>
                                <th><?php echo get_phrase("attendees_amount"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($foodtrucks as $foodtruck) : ?>
                                <tr>
                                    <td><a href="<?php echo site_url('foodtruck/edit/' . sanitize($foodtruck['id']) . '/basic'); ?>"><?php echo sanitize($foodtruck['name']); ?></a></td>
                                    <td>
                                        <small class="text-muted">
                                            <?php echo get_phrase("name"); ?>
                                            <?php if ($foodtruck['owner_id'] && get_user_role('user_role', $foodtruck['owner_id']) != 'admin') : ?>
                                                <strong><a href="<?php echo site_url('owner/profile/' . sanitize($foodtruck['owner_id'])); ?>"><?php echo getter(sanitize($foodtruck['owner_name'])); ?></a></strong>
                                            <?php else : ?>
                                                <strong><?php echo getter(sanitize($foodtruck['owner_name'])); ?></strong>
                                            <?php endif; ?>
                                        </small>
                                        <br>
                                        <small class="text-muted"><?php echo get_phrase("email") . ": <strong>" . getter(sanitize($foodtruck['owner_email'])) . "</strong>"; ?></small><br>
                                        <small class="text-muted"><?php echo get_phrase("phone") . ": <strong>" . getter(sanitize($foodtruck['owner_phone'])) . "</strong>"; ?></small><br>
                                    </td>
                                    <td><small><?php echo sanitize($foodtruck['address']); ?></small></td>
                                    <td><?php echo sanitize($foodtruck['phone']); ?></td>
                                    <td><?php echo sanitize($foodtruck['attendees_amt']); ?></td>
                                    <td class="text-center">
                                        <button class="btn action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                        <ul class="dropdown-menu">
                                            <?php if ($foodtruck_status) : ?>
                                                <li><a class="dropdown-item" href="<?php echo site_url('site/foodtruck/' . sanitize(rawurlencode($foodtruck['slug'])) . '/' . sanitize($foodtruck['id'])); ?>"><?php echo get_phrase("view_on_frontend"); ?></a></li>
                                            <?php endif; ?>
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('foodtruck/update_status/' . sanitize($foodtruck['id'])); ?>')"><?php echo sanitize($foodtruck['status']) ? get_phrase("mark_as_pending") : get_phrase("mark_as_approved"); ?></a></li>
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
                                <th><?php echo get_phrase("owner"); ?></th>
                                <th><?php echo get_phrase("address"); ?></th>
                                <th><?php echo get_phrase("phone_number"); ?></th>
                                <th><?php echo get_phrase("attendees_amount"); ?></th>
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