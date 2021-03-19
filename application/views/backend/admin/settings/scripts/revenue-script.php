<script type="text/javascript">
  "use strict";

  function calculateFoodtruckRevenue(adminRevenue) {
    if (adminRevenue >= 0 && adminRevenue <= 100) {
      var foodtruckRevenue = 100 - adminRevenue;
      $('#foodtruck_revenue').val(foodtruckRevenue);
    } else {
      $('#foodtruck_revenue').val(0);
    }
  }
</script>