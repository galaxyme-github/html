<!-- INIT JS -->
<script src="<?php echo base_url('assets/frontend/default/js/init.js') ?>"></script>

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
  $(".find-out-more-btn").on("click", function(e) {

    let searched_city = $("#searched_city").val();
    let searched_trucks_num = $("#searched_trucks_num").val();

    localStorage.setItem('searched_city', JSON.stringify(searched_city));
    localStorage.setItem('searched_trucks_num', JSON.stringify(searched_trucks_num));
  });
</script>