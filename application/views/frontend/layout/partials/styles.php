<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?=base_url('assets/frontend/css/bootstrap.min.css');?>">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
<!-- Simple line Icon -->
<link rel="stylesheet" href="<?=base_url('assets/frontend/css/simple-line-icons.css');?>">
<!-- Themify Icon -->
<link rel="stylesheet" href="<?=base_url('assets/frontend/css/themify-icons.css');?>">
<!-- Fontawesome Icon -->
<link rel="stylesheet" href="<?=base_url('assets/frontend/css/font-awesome.min.css');?>">
<link href="<?=base_url("assets/icofont/icofont.min.css");?>" rel="stylesheet">
<!-- Hover Effects -->
<link rel="stylesheet" href="<?=base_url('assets/frontend/css/set1.css');?>">
<!-- Main CSS -->
<link rel="stylesheet" href="<?=base_url('assets/frontend/css/style.css');?>">
<!-- Toastr -->
<link rel="stylesheet" href="<?=base_url() . 'assets/global/toastr/toastr.css' ?>">
<!-- Page wise style -->
<?php if (file_exists("application/views/frontend/$parent_dir/styles/$file_name-style.php")): ?>
    <?php include APPPATH . "views/frontend/$parent_dir/styles/$file_name-style.php";?>
<?php endif;?>
<!-- Custom MODAL CSS -->
<link rel="stylesheet" href="<?=base_url('assets/frontend/css/modal.css');?>">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?=base_url('assets/frontend/css/custom.css');?>">