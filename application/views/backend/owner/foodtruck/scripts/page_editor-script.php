<!-- Summernote -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/summernote/summernote-bs4.js"></script>
<!-- Bootstrap Colorpicker JavaScript -->
<script src="<?php echo base_url('assets/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js');?>"></script>
<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>
<!-- Custom script for init select2 -->
<script type="text/javascript">
    "use strict";

    // init summernote
    initSummernote(['summary']);

	/* Bootstrap Colorpicker Init*/
	$('.colorpicker').colorpicker();


    /* FT Background Themes */
    $("input[name=theme]").on("click", function() {
        if ($(this).prop("checked")) {
            $(".theme").removeClass('active');
            $(this).siblings('.theme').addClass('active');
        }
    });
</script>
