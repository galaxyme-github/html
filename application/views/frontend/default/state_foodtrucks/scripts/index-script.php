<!-- Datepicker JS -->
<script src="<?php echo base_url('assets/frontend/default/js/bootstrap-datepicker.js') ?>"></script>

<!-- Google palce API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvRwR3-fGr8AsnMdzmQVkgCdlWhqUiCG0&libraries=places"></script>

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
