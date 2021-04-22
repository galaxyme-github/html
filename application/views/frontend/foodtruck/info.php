<div class="info-right-sidebar pt-5" id="info">
    <dl>
        <dt class>Minimum Price per Person</dt>
        <dd>
            $<?=$foodtruck_details->minimum_price_per_person;?>
        </dd>
        <?php  
            $customers_num_range = explode('-', $foodtruck_details->number_of_attendees);
        ?>
        <dt>Minimum attendees we serve</dt>
            <dd><?php echo rtrim($customers_num_range[0], '+'); ?></dd>
        <?php if (isset($customers_num_range[1])): ?>
        <dt>Maximum attendees we serve</dt>
            <dd><?=$customers_num_range[1]?></dd>
        <?php endif; ?>
        <dt>What we need on event location:</dt>
        <dd>
            <?php $needs = !empty($foodtruck_details->needed_things_on_event_location) ? explode(",", $foodtruck_details->needed_things_on_event_location) : []; ?>
            <?php $count_needs = count($needs); ?>
            <?php if ($count_needs > 0) : ?>
                <?php foreach ($needs as $key => $need) : ?>
                    <?php echo ucfirst(sanitize($need)); ?><?php echo ($key < ($count_needs-1))?", ":""; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </dd>
        <dt>Areas we serve:</dt>
        <dd>
            <?php $areas = !empty($foodtruck_details->serviceable_areas) ? explode(",", $foodtruck_details->serviceable_areas) : []; ?>
            <?php $count_areas = count($areas); ?>
            <?php if ($count_areas > 0) : ?>
                <?php foreach ($areas as $key => $area) : ?>
                    <?php echo ucfirst(sanitize($area)); ?><?php echo ($key < ($count_areas-1))?", ":""; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </dd>
        <dt>Meal times we serve:</dt>
        <dd>
            <?php $meal_times = !empty($foodtruck_details->mealtimes) ? json_decode($foodtruck_details->mealtimes) : []; ?>
            <?php $count_mealtimes = count($meal_times); ?>
            <?php if ($count_mealtimes > 0) : ?>
                <?php foreach ($meal_times as $key => $meal_time) : ?>
                    <?php echo ucfirst(sanitize($meal_time)); ?><?php echo ($key < ($count_mealtimes-1))?", ":""; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </dd>
    </dl>
</div>