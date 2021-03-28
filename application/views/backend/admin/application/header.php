<div class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="m-0 text-dark"><?php echo ucwords($page_title); ?></h4>
                    </div>
                    <div class="col-lg-6">
                        <?php $application_type = isset($application_type) ? $application_type : ""; ?>
                        <?php if ($page_name == 'application/details' && $application_type == "all") : ?>
                            <a href="<?php echo site_url('applications'); ?>" class="btn btn-outline-primary btn-rounded float-right" name="button"><?php echo get_phrase("back_to_application_list", true); ?></a>
                        <?php elseif ($page_name == 'application/details' && $application_type == "pending"): ?>
                            <a href="<?php echo site_url('applications/pending'); ?>" class="btn btn-outline-primary btn-rounded float-right" name="button"><?php echo get_phrase("back_to_application_list", true); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>