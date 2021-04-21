<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/fontawesome-free/css/all.min.css">

<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

<!-- Page wise style -->
<?php if (file_exists("application/views/backend/$branch/$parent_dir/styles/$file_name-style.php")) : ?>
    <?php include APPPATH . "views/backend/$branch/$parent_dir/styles/$file_name-style.php"; ?>
<?php endif; ?>
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>css/adminlte.min.css">

<!-- Toastr -->
<link rel="stylesheet" href="<?php echo base_url() . 'assets/global/toastr/toastr.css' ?>">

<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>css/custom.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Boostrap Validate JS -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/bower_components/bootstrap-validator/dist/validator.css'); ?>" />

<!-- Bootstrap Taginputs -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>css/tagsinput.css">