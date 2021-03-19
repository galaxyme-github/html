<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><?php echo get_phrase('filter_orders'); ?></div>
            <div class="card-body">
                <form action="<?php echo site_url('report/index'); ?>" method="GET">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><?php echo get_phrase('foodtruck'); ?></label>
                                <select class="form-control select2 w-100" name="foodtruck_id" id="foodtruck_id">
                                    <option value="all" <?php if ($foodtruck_id == "all") echo "selected"; ?>><?php echo get_phrase('all'); ?></option>
                                    <?php foreach ($foodtrucks as $key => $foodtruck) : ?>
                                        <option value="<?php echo sanitize($foodtruck['id']); ?>" <?php if ($foodtruck_id == $foodtruck['id']) echo "selected"; ?>><?php echo sanitize($foodtruck['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label class="text-white"><?php echo get_phrase('submit'); ?></label>

                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> <?php echo get_phrase('filter'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if (count($commissions)) : ?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo get_phrase("commission_list_of_foodtruck_owners", true); ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="commissions" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("foodtruck_name"); ?></th>
                                <th><?php echo get_phrase("foodtruck_owner"); ?></th>
                                <th><?php echo get_phrase("total_payable_commission"); ?></th>
                                <th><?php echo get_phrase("total_paid_commission"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($commissions as $key => $commission) :
                                $foodtruck_detail = $this->foodtruck_model->get_by_id(sanitize($commission['foodtruck_id']));
                                $owner_details = $this->user_model->get_user_by_id(sanitize($foodtruck_detail['owner_id']));
                                if ($owner_details['role_id'] == 1) continue; ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo site_url('home/foodtruck/' . rawurlencode(sanitize($foodtruck_detail['slug'])) . '/' . sanitize($foodtruck_detail['id'])); ?>" target="_blank"><?php echo sanitize($foodtruck_detail['name']); ?></a>
                                    </td>
                                    <td>
                                        <?php if (get_user_role('user_role', $owner_details['id']) != "admin") : ?>
                                            <a href="<?php echo site_url('owner/profile/' . sanitize($owner_details['id'])) ?>"><?php echo sanitize($owner_details['name']); ?></a>
                                        <?php else : ?>
                                            <?php echo sanitize($owner_details['name']); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo currency(sanitize($this->report_model->get_total_payable_commission(sanitize($commission['foodtruck_id'])))); ?>
                                    </td>
                                    <td>
                                        <?php echo sanitize($commission['paid_amount']) ? currency(sanitize($commission['paid_amount'])) : currency(0); ?>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo site_url('report/details/' . sanitize($commission['foodtruck_id'])); ?>"><?php echo get_phrase("details"); ?></a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/report/pay/' . sanitize($commission['foodtruck_id'])); ?>', '<?php echo get_phrase('pay_to_foodtruck_owner', true) ?>')"><?php echo get_phrase("pay"); ?></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo get_phrase("foodtruck_name"); ?></th>
                                <th><?php echo get_phrase("foodtruck_owner"); ?></th>
                                <th><?php echo get_phrase("total_payable_commission"); ?></th>
                                <th><?php echo get_phrase("total_paid_commission"); ?></th>
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

<?php if (!count($commissions)) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>
