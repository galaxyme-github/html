<!-- SweetAlert -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/sweetalert/sweetalert.min.js"></script>

<script>
    "use strict";
    // accept application
    var confirm_accept = function(applicationId) {

        var params = {
            applicationId: applicationId,
            firstName: $("#owner_first_name").text(),
            lastName: $("#owner_last_name").text(),
            email: $("#owner_email").text(),
            phone: $("#owner_phone").text(),
            company: $("#company").text(),
            websiteUrl: $("#website_url").text(),
            address_1: $("#address_1").text(),
            address_2: $("#address_2").text(),
            city: $("#owner_city").text(),
            state: $("#owner_state").text(),
            zipCode: $("#owner_zip_code").text()
        }

        swal({   
            title: "Are you sure?",
            showCancelButton: true,   
            confirmButtonColor: "#e6b034",   
            confirmButtonText: "Yes, accept it!",   
            closeOnConfirm: true 
        }, function() {   
            $.ajax({
                url: '<?php echo site_url('member/accept'); ?>',
                type: 'POST',
                data: params,
                dataType: "json",
                beforeSend: function () {
                    openSpinner();
	            },
                success: function(response) {
                    let applicationCode = $("#application_code").text();
                    location.href=`<?php echo site_url('bft-member/application-details/processed/'); ?>${applicationCode}`;
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
                url: '<?php echo site_url('member/decline'); ?>',
                type: 'POST',
                data: {applicationId: applicationId},
                dataType: "json",
                beforeSend: function () {
                    openSpinner();
	            },
                success: function(response) {
                    let applicationCode = $("#application_code").text();
                    location.href=`<?php echo site_url('bft-member/application-details/processed/'); ?>${applicationCode}`;
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