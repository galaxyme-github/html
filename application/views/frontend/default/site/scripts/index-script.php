<!-- INIT JS -->
<script src="<?php echo base_url('assets/frontend/default/js/init.js') ?>"></script>
<!-- Magnific popup JS -->
<script src="<?php echo base_url('assets/frontend/default/js/jquery.magnific-popup.js') ?>"></script>
<!-- Swipper Slider JS -->
<script src="<?php echo base_url('assets/frontend/default/js/swiper.min.js') ?>"></script>
<!-- Datepicker JS -->
<script src="<?php echo base_url('assets/frontend/default/js/bootstrap-datepicker.js') ?>"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- Leaflet JS -->
<script src="<?php echo base_url('assets/global/leaflet/leaflet.js'); ?>"></script>

<!-- INIT JS -->
<script src="<?php echo base_url('assets/frontend/default/js/init.js') ?>"></script>

<!-- Google palce API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvRwR3-fGr8AsnMdzmQVkgCdlWhqUiCG0&libraries=places"></script>

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


<script>
    "use strict";
    $(window).scroll(function() {
        // 100 = The point you would like to fade the nav in.

        if ($(window).scrollTop() > 100) {

            $('.fixed').addClass('is-sticky');

        } else {

            $('.fixed').removeClass('is-sticky');

        };
    });

    // INITIALIZE TOOLTIPS
    initToolTip();
</script>

<script>
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
</script>

<script>
  // Google autocomplete for city, state and zipcode.

  function initAutocomplete() {

    // Create the search box and link it to the UI element.
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);

    // Only this country
    autocomplete.setComponentRestrictions({
      country: ["us"],
    });
    // Set the data fields to return when the user selects a place.
    autocomplete.setFields(
      ['address_components', 'geometry', 'name']);
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (place.geometry) {
        let latitude = place.geometry.location.lat();
        let longitude = place.geometry.location.lng();
        console.log("=====>latitude:", latitude)
        console.log("=====>longitude:", longitude)
        document.getElementById('search_latitude').value = latitude;
        document.getElementById('search_longitude').value = longitude;
      }
      // Get Zip code from address
      for (let i = 0; i < place.address_components.length; i++) {
        for (let j = 0; j < place.address_components[i].types.length; j++) {
          // Get zip/postal code
          if (place.address_components[i].types[j] == "postal_code") {
            document.getElementById('search_input_zipcode').value = place.address_components[i].long_name;
            console.log("=========>zip code:", document.getElementById('search_input_zipcode').value);
          }
          // Get City Name
          if (place.address_components[i].types[j] == "locality") {
            document.getElementById('search_input_city_name').value = place.address_components[i].long_name;
            console.log("=========>city name:", document.getElementById('search_input_city_name').value);
          }
        }
      }
      if (!place.geometry) {
        console.log("Returned place contains no geometry");
        return;
      }
    });
  }
  document.addEventListener("DOMContentLoaded", function(event) {
    initAutocomplete();
  });
</script>

<script>
  var searchFrm = $("#search_frm");

  searchFrm.on("submit", function(e) {
    let query = $(this).serialize();
    localStorage.setItem('query', JSON.stringify(query));
  });
</script>