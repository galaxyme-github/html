<!-- Leaflet JS -->
<script src="<?php echo base_url('assets/global/leaflet/leaflet.js'); ?>"></script>

<script>
    "use strict";
    // CART OPERATIONS
    function updateCart(cartId, menuId, servings, quantity) {
        $.ajax({
            url: '<?php echo site_url('cart/update_cart'); ?>',
            type: 'POST',
            data: {
                cartId: cartId,
                menuId: menuId,
                quantity: quantity,
                servings: servings
            },
            success: function(response) {
                if (response === "false") {
                    toastr.warning('Please sign in first');
                } else {
                    if (Math.floor(response) == response && $.isNumeric(response)) {
                        $('.cart-items').text(response);
                        toastr.success('Added to the cart.');
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    }
                }
                $("#cart-modal").modal('toggle');
            }
        });
    }


    // MAP 1 INITIALIZING
    var map = L.map('mapid1').setView([<?php echo !empty($customer_details['coordinate_1']['latitude']) ? floatval(sanitize($customer_details['coordinate_1']['latitude'])) : 0; ?>, <?php echo !empty($customer_details['coordinate_1']['longitude']) ? floatval(sanitize($customer_details['coordinate_1']['longitude'])) : 0; ?>], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    L.marker([<?php echo !empty($customer_details['coordinate_1']['latitude']) ? floatval(sanitize($customer_details['coordinate_1']['latitude'])) : 0; ?>, <?php echo !empty($customer_details['coordinate_1']['longitude']) ? floatval(sanitize($customer_details['coordinate_1']['longitude'])) : 0; ?>]).addTo(map)
        .bindPopup('<?php echo sanitize($customer_details['address_1']); ?>');


    // MAP 2 INITIALIZING
    var map = L.map('mapid2').setView([<?php echo !empty($customer_details['coordinate_2']['latitude']) ? floatval(sanitize($customer_details['coordinate_2']['latitude'])) : 0; ?>, <?php echo !empty($customer_details['coordinate_2']['longitude']) ? floatval(sanitize($customer_details['coordinate_2']['longitude'])) : 0; ?>], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    L.marker([<?php echo !empty($customer_details['coordinate_2']['latitude']) ? floatval(sanitize($customer_details['coordinate_2']['latitude'])) : 0; ?>, <?php echo !empty($customer_details['coordinate_2']['longitude']) ? floatval(sanitize($customer_details['coordinate_2']['longitude'])) : 0; ?>]).addTo(map)
        .bindPopup('<?php echo sanitize($customer_details['address_2']); ?>');

    // MAP 3 INITIALIZING
    var map = L.map('mapid3').setView([<?php echo !empty($customer_details['coordinate_3']['latitude']) ? floatval(sanitize($customer_details['coordinate_3']['latitude'])) : 0; ?>, <?php echo !empty($customer_details['coordinate_3']['longitude']) ? floatval(sanitize($customer_details['coordinate_3']['longitude'])) : 0; ?>], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    L.marker([<?php echo !empty($customer_details['coordinate_3']['latitude']) ? floatval(sanitize($customer_details['coordinate_3']['latitude'])) : 0; ?>, <?php echo !empty($customer_details['coordinate_3']['longitude']) ? floatval(sanitize($customer_details['coordinate_3']['longitude'])) : 0; ?>]).addTo(map)
        .bindPopup('<?php echo sanitize($customer_details['address_3']); ?>');


    function toggleMap(addressNumber) {
        $(".address-map").hide();
        $("#mapid" + addressNumber).show();
        $("#address-number").val(addressNumber);
    }
    $(document).ready(() => {
        $("#mapid2").hide();
        $("#mapid3").hide();
        $("#address-number").val(1);
    });
</script>
