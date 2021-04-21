 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="<?php echo base_url('assets/frontend/js/jquery-3.2.1.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/frontend/js/popper.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/frontend/js/php-email-form.js') ?>"></script>
 <!-- Toastr -->
 <script src="<?php echo base_url() . 'assets/global/toastr/toastr.min.js'; ?>"></script>

 <!-- Page wise script -->
 <?php if (file_exists("application/views/frontend/$parent_dir/scripts/$file_name-script.php")) : ?>
     <?php include APPPATH . "views/frontend/$parent_dir/scripts/$file_name-script.php"; ?>
 <?php endif; ?>

 <!-- Initialize common scripts for frontend and backend here -->
 <?php include APPPATH . "views/common/script.php"; ?>

 <script>
    "use strict"
    $(window).on('load', function() {
        // preloader fadeout onload
        $(".loader-container").addClass('loader-fadeout');
    });
 </script>