<div class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="m-0 text-dark"><?php echo ucwords($page_title); ?></h4>
                    </div>
                    <div class="col-lg-6">
                        <?php if ($page_name == 'foodtruck/index') : ?>
                            <a href="<?php echo site_url('foodtruck/create'); ?>" class="btn btn-outline-primary btn-rounded float-right" name="button"><?php echo get_phrase("create_foodtruck", true); ?></a>
                        <?php elseif ($page_name == 'foodtruck/create') : ?>
                            <a href="<?php echo site_url('foodtruck'); ?>" class="btn btn-outline-primary btn-rounded float-right" name="button"><?php echo get_phrase("back_to_foodtrucks", true); ?></a>
                        <?php elseif ($page_name == 'foodtruck/edit') : ?>
                            <a href="<?php echo site_url('home/foodtruck/' . rawurlencode(sanitize($foodtruck_data['slug'])) . '/' . sanitize($foodtruck_data['id'])); ?>" class="btn btn-outline-primary btn-rounded float-right ml-1" name="button" target="_blank"><?php echo get_phrase("view_foodtruck_in_frontend", true); ?></a>
                            <a href="<?php echo site_url('foodtruck'); ?>" class="btn btn-outline-primary btn-rounded float-right" name="button"><?php echo get_phrase("back_to_foodtrucks", true); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>