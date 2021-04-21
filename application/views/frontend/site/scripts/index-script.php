<!-- INIT JS -->
<script src="<?php echo base_url('assets/frontend/js/init.js') ?>"></script>
<!-- Magnific popup JS -->
<script src="<?php echo base_url('assets/frontend/js/jquery.magnific-popup.js') ?>"></script>
<!-- Swipper Slider JS -->
<script src="<?php echo base_url('assets/frontend/js/swiper.min.js') ?>"></script>
<!-- Datepicker JS -->
<script src="<?php echo base_url('assets/frontend/js/bootstrap-datepicker.js') ?>"></script>
<!-- Leaflet JS -->
<script src="<?php echo base_url('assets/global/leaflet/leaflet.js'); ?>"></script>
<!-- INIT JS -->
<script src="<?php echo base_url('assets/frontend/js/init.js') ?>"></script>
<!-- Owl carosel -->
<script src="<?php echo base_url('assets/frontend/js/owl.carousel.min.js') ?>"></script>
<!-- Google palce API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvRwR3-fGr8AsnMdzmQVkgCdlWhqUiCG0&libraries=places"></script>
<script src="<?php echo base_url('assets/auth/js/client.js'); ?>"></script>
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
    autoplay: {
      delay: 5000,
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
            toastr.success('Added to the cart');
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

    $(window).scroll(function() {

      $("#scrollBtn").fadeOut('slow');

      clearTimeout($.data(this, 'scrollTimer'));
      $.data(this, 'scrollTimer', setTimeout(function() {
            $("#scrollBtn").fadeIn('slow');
      }, 250));
    });

    var $window = $(window),
        $document = $(document),
        button = $("#scrollBtn");
    
    $window.on('scroll', function () {
      if (($window.scrollTop() + $window.height()) == $document.height()) {
        button.removeClass('scroll-bottom').addClass('scroll-up');
      }

      if ($window.scrollTop() == 0) {
        button.removeClass('scroll-up').addClass('scroll-bottom');
      }
    });
    
    button.on("click",function(){
      if (button.hasClass('scroll-up')) {
        var percentageToScroll = 100;
        var percentage = percentageToScroll/100;
        var height = $(document).scrollTop();
        var scrollAmount = height * (1 - percentage);

        $('html,body').animate({ scrollTop: scrollAmount }, 1500);
      } else {
        var percentageToScroll = 100;
        var height = $(document).innerHeight();
        var scrollAmount = height * percentageToScroll/ 100;
        var overheight = jQuery(document).height() - jQuery(window).height();
        jQuery("html, body").animate({scrollTop: scrollAmount}, 1500);    
      }
    });

    // INITIALIZE TOOLTIPS
    initToolTip();
</script>

<script>
  var date = new Date();
  date.setDate(date.getDate());
  $(".datepicker").datepicker({
      format: 'mm/dd/yyyy',
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
    autocomplete.setTypes(
      ['(regions)']
    );
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (place.geometry) {
        let latitude = place.geometry.location.lat();
        let longitude = place.geometry.location.lng();
        console.log("=====>latitude:", latitude)
        console.log("=====>longitude:", longitude)
        console.log($(".pac-container").html())
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

<script>
  var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "ft-sb-select":*/
x = document.getElementsByClassName("ft-sb-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

<script>
  // Testimonial Slider Carousel
  if ($('.testimonial-carousel').length) {
    $('.testimonial-carousel').owlCarousel({
        dots: true,
        loop: true,
        margin: 30,
        nav: false,
        navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        autoplayHoverPause: false,
        autoplay: 6000,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            800: {
                items: 1
            },
            1024: {
                items: 1
            },
            1100: {
                items: 2
            },
            1200: {
                items: 2
            }
        }
    });
  }
</script>

<script>
  async function autoDetectClient() {
    var curLoc = await detectedUserLocation().then((data) => data);
    var golocate = await getGeolocate().then((data) => data);
    var curZipCode = await getZipCode().then((data) => data);
    var curCity = await getCity().then((data) => data);

    $("#address").val(curLoc);
    $("#search_input_zipcode").val(curZipCode);
    $("#search_latitude").val(golocate.lat);
    $("#search_longitude").val(golocate.lng);
    $("#search_input_city_name").val(curCity);
  }
  autoDetectClient();
</script>