<div class="info" id="info">
    <dl>
        <!-- <dt><?php echo site_phrase('our_address'); ?></dt>
        <dd><a href="javascript:void(0)"><?=$foodtruck_details['address'];?></a></dd> -->
        <dt><?php echo site_phrase('kind_of_food'); ?></dt>
        <dd>
            <?php foreach (json_decode($foodtruck_details['cuisine']) as $key => $cuisine) : ?>
            <?php $count_cuisines = count(json_decode($foodtruck_details['cuisine'])); ?>
                <?php
                $cuisine = $this->cuisine_model->get_by_id($cuisine);
                if (isset($cuisine) && count($cuisine)) : ?>
                    <a href="javascript:void(0)"><?php echo sanitize($cuisine['name']); ?><?php echo ($key < ($count_cuisines-1))?", ":""; ?></a>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if ($count_cuisines == 0) : ?>
                <small><?php echo site_phrase('no_cuisine_found'); ?></small>
            <?php endif; ?>
        </dd>
        <dt><?php echo site_phrase('needs_on_location'); ?></dt>
        <dd>
            <?php $needs = !empty($foodtruck_details['needs_on_location']) ? explode(",", $foodtruck_details['needs_on_location']) : []; ?>
            <?php $count_needs = count($needs); ?>
            <?php if ($count_needs > 0) : ?>
                <?php foreach ($needs as $key => $need) : ?>
                    <?php echo ucfirst(sanitize($need)); ?><?php echo ($key < ($count_needs-1))?", ":""; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </dd>
        <dt><?php echo site_phrase('areas_we_serve'); ?></dt>
        <dd>
            <?php $areas = !empty($foodtruck_details['serviceable_areas']) ? explode(",", $foodtruck_details['serviceable_areas']) : []; ?>
            <?php $count_areas = count($areas); ?>
            <?php if ($count_areas > 0) : ?>
                <?php foreach ($areas as $key => $area) : ?>
                    <?php echo ucfirst(sanitize($area)); ?><?php echo ($key < ($count_areas-1))?", ":""; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </dd>
        <?php  
            $customers_num_range = explode('-', $foodtruck_details['customers_num']);
        ?>
        <dt><?php echo site_phrase('minimum_attendees_we_serve'); ?></dt>
        <dd><?php echo rtrim($customers_num_range[0], '+'); ?></dd>
        <?php if (isset($customers_num_range[1])): ?>
        <dt><?php echo site_phrase('maximum_attendees_we_serve'); ?></dt>
        <dd><?=$customers_num_range[1]?></dd>
        <?php endif; ?>
        <dt><?php echo site_phrase('minimum_of_sales'); ?></dt>
        <dd>$<?php echo $foodtruck_details['minimum_sales']; ?></dd>
        <?php if (!empty($foodtruck_details['schedule'])) : ?>
        <dt><?php $time_configurations = json_decode($foodtruck_details['schedule'], true);
        $today = strtolower(date('l'));
        echo ucfirst($today); ?></dt>
        <?php if (is_open($foodtruck_details['id'])) : ?>
            <dd><?php echo strtoupper(site_phrase('open_now')); ?></dd>
        <?php else : ?>
            <dd class="closed-now"><?php echo strtoupper(site_phrase('close_now')); ?></dd>
        <?php endif; ?>
        <?php else : ?>
        <dd><?php echo site_phrase('not_found'); ?></dd>
        <?php endif; ?>
    </dl>
</div>