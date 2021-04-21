<div class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="m-0 text-dark"><?php echo $page_title; ?></h4>
                    </div>
                    <div class="col-lg-6">
                        <?php if ($page_name == 'foodtruck/index') : ?>
                            <a href="<?php echo site_url('foodtruck/create'); ?>" class="btn btn-outline-success float-right" name="button">Create a foodtruck</a>
                        <?php elseif ($page_name == 'foodtruck/create') : ?>
                            <a href="<?php echo site_url('foodtruck'); ?>" class="btn btn-outline-success float-right" name="button">Back to foodtrucks</a>
                        <?php elseif ($page_name == 'foodtruck/edit') : ?>
                            <a href="<?php echo site_url('site/foodtruck/' . rawurlencode(sanitize($foodtruck_data['slug'])) . '/' . sanitize($foodtruck_data['id'])); ?>" class="btn btn-outline-success float-right ml-1" name="button" target="_blank">View foodtruck page</a>
                            <a href="<?php echo site_url('foodtruck'); ?>" class="btn btn-outline-success float-right" name="button">Back to foodtrucks</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>