<!-- SweetAlert -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/sweetalert/sweetalert.min.js"></script>

<script>
    "use strict";
    // accept application
    var confirm_accept = function(applicationId) {

        var param = {
            role: 'owner',
            name: $("#owner_name").text(),
            email: $("#owner_email").text(),
            phone: $("#owner_phone").text(),
            applicationId: applicationId
        }

        swal({   
            title: "Are you sure?",
            showCancelButton: true,   
            confirmButtonColor: "#e6b034",   
            confirmButtonText: "Yes, accept it!",   
            closeOnConfirm: true 
        }, function() {   
            $.ajax({
                url: '<?php echo site_url('applications/accept'); ?>',
                type: 'POST',
                data: param,
                dataType: "json",
                beforeSend: function () {
                    openSpinner();
	            },
                success: function(response) {
                    location.href="<?php echo site_url($this->uri->uri_string()); ?>";
                },
                error: function () {

                }
            });
        });
    }

    function confirm_decline(applicationId) {
        openSpinner();
        swal({   
            title: "Are you sure?", 
            showCancelButton: true,   
            confirmButtonColor: "#343A40",   
            confirmButtonText: "Yes, decline it!",   
            closeOnConfirm: true, 
        }, function() {   
            $.ajax({
                url: '<?php echo site_url('applications/decline'); ?>',
                type: 'POST',
                data: {applicationId: applicationId},
                dataType: "json",
                beforeSend: function () {
                    openSpinner();
	            },
                success: function(response) {
                    location.href="<?php echo site_url($this->uri->uri_string()); ?>";
                },
                error: function () {

                }
            });
        });
    }

    function openSpinner() {
        $(".text-spinner").removeClass("d-none");
        $("#applic-status").html("<i class='fa fa-circle-o-notch fa-spin'></i> <span class='font-italic'>Processing...</span>");
    }

    function makePassword(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }
</script>