<!-- Magnific popup JS -->
<script src="<?php echo base_url('assets/frontend/js/jquery.magnific-popup.js') ?>"></script>
<!-- Swipper Slider JS -->
<script src="<?php echo base_url('assets/frontend/js/swiper.min.js') ?>"></script>

<!-- Leaflet JS -->
<script src="<?php echo base_url('assets/global/leaflet/leaflet.js'); ?>"></script>

<!-- INIT JS -->
<script src="<?php echo base_url('assets/frontend/js/init.js') ?>"></script>

<!-- Custom Calendar -->
<script src="<?php echo base_url('assets/frontend/js/custom-calendar.js') ?>"></script>
<!-- Input Number Spinner -->
<script src="<?php echo base_url('assets/frontend/js/input-spinner-custom-editors.js') ?>"></script>
<script src="<?php echo base_url('assets/frontend/js/input-spinner.js') ?>"></script>
<!-- Bootstrap Validate JS -->
<script src="<?php echo base_url('assets/vendors/bower_components/bootstrap-validator/dist/validator.min.js'); ?>"></script>
<!-- Datepicker JS -->
<script src="<?php echo base_url('assets/frontend/js/bootstrap-datepicker.js') ?>"></script>
<!-- Select2 JavaScript -->
<script src="<?php echo base_url('assets/vendors/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<script>
  "use strict";

  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  if ($('.image-link').length) {
    $('.image-link').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      }
    });
  }
  if ($('.image-link2').length) {
    $('.image-link2').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      }
    });
  }

  // INITIALIZE TOOLTIPS
  initToolTip();

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

<script>
  // MAP INITIALIZING
  // var map = L.map('map').setView([<?php //echo !empty($foodtruck_details['latitude']) ? floatval(sanitize($foodtruck_details['latitude'])) : 0; ?>, <?php //echo !empty($foodtruck_details['longitude']) ? floatval(sanitize($foodtruck_details['longitude'])) : 0; ?>], 16);
  // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

  // L.marker([<?php //echo !empty($foodtruck_details['latitude']) ? floatval(sanitize($foodtruck_details['latitude'])) : 0; ?>, <?php //echo !empty($foodtruck_details['longitude']) ? floatval(sanitize($foodtruck_details['longitude'])) : 0; ?>]).addTo(map)
  //   .bindPopup('<?php //echo sanitize($foodtruck_details['address']); ?>');
</script>

<script>
  // var query = "<?php //echo site_url('site/foodtrucks/filter'); ?>?"+$.parseJSON(localStorage.getItem('query'));
  // var searched_city = $.parseJSON(localStorage.getItem('searched_city'));
  // var searched_trucks_num = $.parseJSON(localStorage.getItem('searched_trucks_num'));

  // $("#goto_search_result_page").attr('href', query);

  // var breadcrumb_text = searched_trucks_num + " " + searched_city + " Food Trucks";
  // $("#breadcrumb_text").html(breadcrumb_text);

  $(".dish-amount input").inputSpinner();

  var date = new Date();
  date.setDate(date.getDate());
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      startDate: date,
      templates: {
        leftArrow: '<i class="far fa-arrow-alt-circle-left"></i>',
        rightArrow: '<i class="far fa-arrow-alt-circle-right"></i>'
      },
  });

  /* Select2 Init*/
  $(".select2").select2();
</script>