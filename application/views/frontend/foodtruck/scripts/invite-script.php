<!-- Input Number Spinner -->
<script src="<?php echo base_url('assets/frontend/js/input-spinner-custom-editors.js') ?>"></script>
<script src="<?php echo base_url('assets/frontend/js/input-spinner.js') ?>"></script>
<!-- Datepicker JS -->
<script src="<?php echo base_url('assets/frontend/js/bootstrap-datepicker.js') ?>"></script>

<script>
        $(".dish-amount input").inputSpinner();
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
  $("#attendees_num").on("input", function() {
    var attendees_num = $(this).val();
    var pricePerPerson = $("#price_per_person").val();
    var totalCost = attendees_num * pricePerPerson;
    var outputHtml = "";

    if (attendees_num != 0) {
      outputHtml = attendees_num + " x $" + pricePerPerson + " = $" + totalCost;
    } else {
      outputHtml = "(Amount of attendees) x $" + pricePerPerson;
    }

    $("#hiring_total_cost").html(outputHtml);
  });
</script>