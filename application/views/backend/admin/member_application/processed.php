<?php if (count($applications)) : ?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Processed Applications</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="applications" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Application Code</th>
                                <th>Owner Name</th>
                                <th>Owner Email</th>
                                <th>Owner Phone</th>
                                <th>Company</th>
                                <th>Applied At</th>
                                <th>Status</th>
                                <th>Action</th>
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
                                        <a href="<?php echo site_url('bft-member/application-details/processed/' . sanitize($application['code'])); ?>" class="btn btn-rounded btn-outline-primary btn-sm mt-2"><?php echo get_phrase('details'); ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Application Code</th>
                                <th>Owner Name</th>
                                <th>Owner Email</th>
                                <th>Owner Phone</th>
                                <th>Company</th>
                                <th>Applied At</th>
                                <th>Status</th>
                                <th>Action</th>
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
