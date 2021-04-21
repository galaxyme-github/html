<script src="<?php echo base_url('assets/vendors/bower_components/bootstrap-validator/dist/validator.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/auth/js/client.js'); ?>"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    "use strict"
    /* Get client information */
    async function autoDetectClient() {
        var detect = await getClientLocationInfo().then((data) => data);
        var timezone = await getClientTimezone().then((data) =>  data);
        detect.push({'timezone': timezone});
        $('input[name=clientLoc]').val(JSON.stringify(detect).replace(/[{}[\]]/g, ''))
    }
    autoDetectClient();

    /* check if owner agreed BFT terms or not */
    var $frm = $("#owner-info");
    var $checkbox = $("#agree");
    $frm.on('submit', function (e) {
        if (!($checkbox.prop('checked'))) {
            $checkbox.siblings(".with-errors").removeClass('d-none')
            e.preventDefault();
        } else {
            return true;
        }
    });

    $checkbox.on("click", function() {
        if($checkbox.prop("checked")) {
            $checkbox.siblings(".with-errors").addClass('d-none')
        } else {
            $checkbox.siblings(".with-errors").removeClass('d-none')
        }
    });

    // Get the modal
    var modal = document.getElementById("myModal");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("bft-simple-modal-close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
