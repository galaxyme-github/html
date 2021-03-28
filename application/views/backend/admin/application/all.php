<?php if (count($applications)) : ?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo get_phrase("list_of_applications", true); ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="applications" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("application_code"); ?></th>
                                <th><?php echo get_phrase("applyer"); ?></th>
                                <th><?php echo get_phrase("applyer_email"); ?></th>
                                <th><?php echo get_phrase("applyer_phone"); ?></th>
                                <th><?php echo get_phrase("company_name"); ?></th>
                                <th><?php echo get_phrase("applied_at"); ?></th>
                                <th><?php echo get_phrase("status"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($applications as $application) : ?>
                                <tr>
                                    <td><?php echo $application['code']; ?></td>
                                    <td><?php echo sanitize($application['first_name']) . " " . sanitize($application['last_name']); ?></td>
                                    <td><?php echo sanitize($application['email']); ?></td>
                                    <td><?php echo sanitize($application['phone']); ?></td>
                                    <td><?php echo sanitize($application['company_name']); ?></td>
                                    <td><?php echo get_nicetime($application['created_at']); ?></td>
                                    <td>
                                        <?php if ($application['accepted'] == 0): ?>
                                            <span class="badge badge-warning lighten-warning">Pending</span>
                                        <?php elseif ($application['accepted'] == 1): ?>
                                            <span class="badge badge-success lighten-success">Accepted</span>
                                        <?php else: ?>
                                            <span class="badge badge-dark lighten-dark">Declined</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo site_url('applications/details/all/' . sanitize($application['code'])); ?>" class="btn btn-rounded btn-outline-primary btn-sm mt-2"><?php echo get_phrase('details'); ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo get_phrase("application_code"); ?></th>
                                <th><?php echo get_phrase("applyer"); ?></th>
                                <th><?php echo get_phrase("applyer_email"); ?></th>
                                <th><?php echo get_phrase("applyer_phone"); ?></th>
                                <th><?php echo get_phrase("company_name"); ?></th>
                                <th><?php echo get_phrase("applied_at"); ?></th>
                                <th><?php echo get_phrase("status"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!count($applications)) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>
