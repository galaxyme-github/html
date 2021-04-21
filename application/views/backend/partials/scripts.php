<!-- jQuery -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/backend/'); ?>js/adminlte.js"></script>

<!-- Bootstrap Validate JS -->
<script src="<?php echo base_url('assets/vendors/bower_components/bootstrap-validator/dist/validator.min.js'); ?>"></script>
<!-- Tags-Input -->
<script src="<?php echo base_url('assets/backend/'); ?>js/tagsinput.js"></script>
<!-- Page wise script -->
<?php if (file_exists("application/views/backend/$branch/$parent_dir/scripts/$file_name-script.php")) : ?>
	<?php include APPPATH . "views/backend/$branch/$parent_dir/scripts/$file_name-script.php"; ?>
<?php endif; ?>

<!-- Toastr -->
<script src="<?php echo base_url() . 'assets/global/toastr/toastr.min.js'; ?>"></script>

<!-- Initialize common scripts for frontend and backend here -->
<?php include APPPATH . "views/common/script.php"; ?>

<!-- If user have enabled CSRF proctection this function will take care of the ajax requests and append custom header for CSRF -->
<script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>";
	var csrfData = <?php echo json_encode(csrf_jquery_token()); ?>;
	$(function($) {
		$.ajaxSetup({
			data: csrfData
		});
	});
</script>