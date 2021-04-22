<!-- Select2 -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/select2/js/select2.full.min.js"></script>

<!-- Tags-Input -->
<script src="<?php echo base_url('assets/backend/'); ?>js/tags-input.js"></script>

<!-- IMAGE UPLOAD WITH PREVIEW -->
<script src="<?php echo base_url('assets/backend/'); ?>js/file-upload-preview.js"></script>

<!-- TIME PICKER -->
<script src="<?php echo base_url('assets/backend/'); ?>js/bootstrap-clockpicker.min.js"></script>

<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets/plugins/'); ?>multi-select-calendar/jquery-ui.multidatespicker.js"></script>

<!-- Custom script for init select2 -->
<script type="text/javascript">
    "use strict";

    // toggle user view while clicking on radio btn
    function toggleUserArea(elem) {

        if (elem.value === "existing") {
            $("#existing_user_area").show();
            $("#new_user_area").hide();
        } else if (elem.value === "new") {
            $("#new_user_area").show();
            $("#existing_user_area").hide();
        }
    }

    // initializing select2
    initSelect2();

    // initializing clockpicker
    initClockPicker();

    // FOR LOADING THE RESTAURANT THUMBNAIL. I'VE DONE THIS FOR AVOIDING INLINE CSS
    initPreviewer(['foodtruck_thumbnail_preview']);

    // FOR LOADING THE RESTAURANT GALLERY IMAGE. I'VE DONE THIS FOR AVOIDING INLINE CSS
    for (let i = 1; i <= 9; i++) {
        initPreviewer(['foodtruck_gallery_' + i + '_preview']);
    }

    /* Schdule Calendar */
    var date = new Date();
    $('#event_schedule').multiDatesPicker({
        minDate: 0,
    });

    // initialize schedule calendar
    initializeScheduleCalendar('<?=$foodtruck_data->schedule;?>');

    function initializeScheduleCalendar(unavailableDates) {
        if (!unavailableDates) {
            unavailableDates = '1/1/1111';
        }
        $('#event_schedule').multiDatesPicker('addDates', unavailableDates.split(','));
    } 

    function updateSchedule(foodtruckId) {
        var dates = $('#event_schedule').multiDatesPicker('value');
        var params = {
            id: foodtruckId,
            dates: dates.replace( /\s/g, ''),
        }
        $.ajax({
            url: '<?php echo site_url('foodtruck/update_schedule'); ?>',
            type: 'POST',
            data: params,
            dataType: 'json',
            beforeSend: function () {
                console.log('saving...')
            },
            success: function(response) {
                location.href=`<?php echo site_url('foodtruck/edit/'); ?>${foodtruckId}/schedule`;
            },
            error: function () {

            }
        });
    }
</script>