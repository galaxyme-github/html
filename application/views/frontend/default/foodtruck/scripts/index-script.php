<!-- Magnific popup JS -->
<script src="<?php echo base_url('assets/frontend/default/js/jquery.magnific-popup.js') ?>"></script>
<!-- Swipper Slider JS -->
<script src="<?php echo base_url('assets/frontend/default/js/swiper.min.js') ?>"></script>

<!-- Leaflet JS -->
<script src="<?php echo base_url('assets/global/leaflet/leaflet.js'); ?>"></script>

<!-- INIT JS -->
<script src="<?php echo base_url('assets/frontend/default/js/init.js') ?>"></script>

<!-- Custom Calendar -->
<script src="<?php echo base_url('assets/frontend/default/js/custom-calendar.js') ?>"></script>
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
          toastr.warning('<?php echo site_phrase('please_login_first'); ?>');
        } else {
          if (Math.floor(response) == response && $.isNumeric(response)) {
            $('.cart-items').text(response);
            toastr.success('<?php echo site_phrase('added_to_the_cart'); ?>');
          }
        }
      }
    });
  }
</script>

<script>>
  // MAP INITIALIZING
  // var map = L.map('map').setView([<?php echo !empty($foodtruck_details['latitude']) ? floatval(sanitize($foodtruck_details['latitude'])) : 0; ?>, <?php echo !empty($foodtruck_details['longitude']) ? floatval(sanitize($foodtruck_details['longitude'])) : 0; ?>], 16);
  // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

  // L.marker([<?php echo !empty($foodtruck_details['latitude']) ? floatval(sanitize($foodtruck_details['latitude'])) : 0; ?>, <?php echo !empty($foodtruck_details['longitude']) ? floatval(sanitize($foodtruck_details['longitude'])) : 0; ?>]).addTo(map)
  //   .bindPopup('<?php echo sanitize($foodtruck_details['address']); ?>');
</script>

<script>
  var query = "<?php echo site_url('site/foodtrucks/filter'); ?>?"+$.parseJSON(localStorage.getItem('query'));
  var searched_city = $.parseJSON(localStorage.getItem('searched_city'));
  var searched_trucks_num = $.parseJSON(localStorage.getItem('searched_trucks_num'));

  $("#goto_search_result_page").attr('href', query);

  var breadcrumb_text = searched_trucks_num + " " + searched_city + " Food Trucks";
  $("#breadcrumb_text").html(breadcrumb_text);
</script>