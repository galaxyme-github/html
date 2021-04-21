<!-- DataTables -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- Initializer -->
<script src="<?php echo base_url('assets/backend/'); ?>js/init.js"></script>

<script type="text/javascript">
    "use strict";

    // initialize datatable
    initDataTables(['favourites']);

    // CART OPERATIONS
    function addToCart(menuId, servings, quantity) {
        $.ajax({
            url: '<?php echo site_url('cart/add_to_cart'); ?>',
            type: 'POST',
            data: {
                menuId: menuId,
                quantity: quantity,
                servings: servings
            },
            success: function(response) {
                if (response === "false") {
                    toastr.warning('Please sign in first.');
                } else {
                    if (Math.floor(response) == response && $.isNumeric(response)) {
                        $('.cart-items').text(response);
                        toastr.success('Added to the cart.');
                    }
                }
            }
        });
    }
</script>