<!-- Swipper Slider -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/swiper.min.css'); ?>">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/magnific-popup.css'); ?>">
<!-- Owl Carosel -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.carousel.min.css'); ?>">
<!-- Datepicker CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap-datepicker.css'); ?>">
<!-- LEAFLET CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/global/leaflet/leaflet.css'); ?>">

<style media="screen">
  .food-item-card {
    box-shadow: 0px 3px 40px 0 rgba(206, 205, 205, 0.3);
  }
  .reserve-rating {
    margin-top: -6px;
    font-size: 18px;
  }
  .popup {
    width: 100%;
    height: 100%;
    display: none;
    position: fixed;
    top: 0px;
    left: 0px;
    background: rgba(0, 0, 0, 0.75);
    z-index: 1070;
  }
  .popup {
    text-align: center;
  }
  .popup:before {
    content: '';
    display: inline-block;
    height: 100%;
    margin-right: -4px;
    vertical-align: middle;
  }
  .popup-inner {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
    position: relative;
    max-width: 700px;
    width: 90%;
    padding: 40px;
    box-shadow: 0px 2px 6px rgba(0, 0, 0, 1);
    border-radius: 3px;
    background: #fff;
    text-align: center;
  }
  .popup-inner h1 {
    font-family: 'Roboto Slab', serif;
    font-weight: 700;
  }
  .popup-inner p {
    font-size: 24px;
    font-weight: 400;
  }
  .popup-close {
    width: 34px;
    height: 34px;
    padding-top: 4px;
    display: inline-block;
    position: absolute;
    top: 20px;
    right: 20px;
    -webkit-transform: translate(50%, -50%);
    transform: translate(50%, -50%);
    border-radius: 100%;
    background: transparent;
    border: solid 4px #808080;
  }
  .popup-close:after,
  .popup-close:before {
    content: "";
    position: absolute;
    top: 11px;
    left: 5px;
    height: 4px;
    width: 16px;
    border-radius: 30px;
    background: #808080;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
  }
  .popup-close:after {
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }
  .popup-close:hover {
    -webkit-transform: translate(50%, -50%) rotate(180deg);
    transform: translate(50%, -50%) rotate(180deg);
    background: #f00;
    text-decoration: none;
    border-color: #f00;
  }
  .popup-close:hover:after,
  .popup-close:hover:before {
    background: #fff;
  }
</style>

<style media="screen">
.btn-group1 {
    width: 73%;
}
@media (max-width: 576px) {
    .btn-group1 {
        width: 100%;
        border-radius: 3px;
        margin: 0 0 10px;
        padding: 17px;
    }
}
.slider {
    /*background: linear-gradient(0deg, rgba(33, 33, 33, 0.3), rgba(33, 33, 33, 0.4)), url(<?php echo base_url('uploads/system/' . sanitize(get_website_settings('banner_image'))); ?>) no-repeat;*/
    background: url(<?php echo base_url('uploads/system/' . sanitize(get_website_settings('banner_image'))); ?>) no-repeat;
    background-position: center bottom;
    background-size: cover;
    min-height: 980px;
}
.slider-content_wrap h5 {
    color: #fff;
}
.slider-link a {
    color: #fff;
}
.slider-link {
    color: #fff; 
}
</style>

<style>
@import url(https://fonts.googleapis.com/css?family=Muli:400, 300);
.calendar, .calendar_weekdays, .calendar_content {
  max-width: 300px;
}
.calendar {
  margin: auto;
  font-family:'Muli', sans-serif;
  font-weight: 400;
}
.calendar_content, .calendar_weekdays, .calendar_header {
  position: relative;
  overflow: hidden;
}
.calendar_weekdays div {
  display:inline-block;
  vertical-align:top;
}
.calendar_weekdays div, .calendar_content div {
  width: 14.28571%;
  overflow: hidden;
  text-align: center;
  background-color: transparent;
  color: #6f6f6f;
  font-size: 14px;
}
.calendar_content div {
  border: 1px solid transparent;
  float: left;
}
.calendar_content div:hover {
  border: 1px solid #dcdcdc;
  cursor: default;
}
.calendar_content div.blank:hover {
  cursor: default;
  border: 1px solid transparent;
}
.calendar_content div.past-date {
  color: #d5d5d5;
}
.calendar_content div.today {
  font-weight: bold;
  font-size: 14px;
  color: #87b633;
  border: 1px solid #dcdcdc;
}
.calendar_content div.selected {
  background-color: #f0f0f0;
}
.calendar_header {
  width: 100%;
  text-align: center;
}
.calendar_header h2 {
  padding: 0 10px;
  font-family:'Muli', sans-serif;
  font-weight: 300;
  font-size: 18px;
  color: #87b633;
  float:left;
  width:70%;
  margin: 0 0 10px;
}
button.switch-month {
  background-color: transparent;
  padding: 0;
  outline: none;
  border: none;
  color: #dcdcdc;
  float: left;
  width:15%;
  transition: color .2s;
}
button.switch-month:hover {
  color: #87b633;
}
.descriptions .description {
text-align: center;
}
.descriptions .description .search-icon {
background-image: url(<?php echo site_url("assets/frontend/images/search-icon.webp"); ?>);
}
.descriptions .description .pay-icon {
background-image: url(<?php echo site_url("assets/frontend/images/pay-icon.webp"); ?>);
}
.descriptions .description .relax-icon {
background-image: url(<?php echo site_url("assets/frontend/images/relax-icon.webp"); ?>);
}
.descriptions .description .icon {
width: 80px;
height: 80px;
background-size: contain;
background-repeat: no-repeat;
background-position: 50%;
margin: auto;
}
.form-control[readonly] {
cursor: default;
background-color: #fff;
}
.ft-search-frm #address {
  background-image: url(<?php echo site_url("assets/frontend/images/location-pin.png"); ?>);
}
.ft-search-frm #event_date {
  background-image: url(<?php echo site_url("assets/frontend/images/sb-calendar.png"); ?>);
}
.ft-search-frm .bg-user-icon {
  background-image: url(<?php echo site_url("assets/frontend/images/sb-user.png"); ?>);
  padding-left: 3px;
  background-repeat: no-repeat;
  background-size: 20px;
  background-position: 15px center;
  text-align: left;
}
.ft-search-frm .bg-meal-icon {
  background-image: url(<?php echo site_url("assets/frontend/images/sb-meal-time.png"); ?>);
  padding-left: 3px;
  background-repeat: no-repeat;
  background-size: 25px;
  background-position: 15px center;
  text-align: left;
}
#address, #event_date {
  padding-left: 50px;
  background-repeat: no-repeat;
  background-size: 20px;
  background-position: 16px center;
}
.datepicker-days table tr th.dow {
  color: #6b6b6b !important;
}
.datepicker {
  -webkit-box-shadow: 0 2px 16px rgb(0 0 0 / 15%);
  box-shadow: 0 2px 16px rgb(0 0 0 / 15%);
}
.ft-sb-select option:hover {
  display: none;
  background-color: red !important;
}
/*the container must be positioned relative:*/
.ft-sb-select {
    position: relative;
    width: 100%;
}
.ft-sb-select select {
    display: none; /*hide original SELECT element:*/
}
/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
    border-color: transparent transparent #fff transparent;
    top: 7px;
}
/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
    color: #545E62;
    padding: 8px 16px;
    cursor: pointer;
    user-select: none;
    text-align: left;
    padding-left: 3rem;
}
/*style items (options):*/
.select-items {
    position: absolute;
    background-color: #fff;
    top: 113%;
    left: 0;
    right: 0;
    z-index: 99;
}
/*hide the items when the select box is closed:*/
.select-hide {
    display: none;
}
.select-items div:hover, .same-as-selected {
    background-color: rgba(0, 189, 113, 0.164);
}
.ft__fieldset {
    -webkit-box-shadow: 0 2px 8px rgb(73 80 87 / 70%);
    box-shadow: 0 2px 8px rgb(73 80 87 / 70%);
}
.ft-sb-btn {
  background-color: #20a268;
  color: #fff;
}
.ft-sb-btn:hover {
  background-color: #1db370;
  color: #fff;
}
.hr-progress__step__number {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    height: 32px;
    width: 32px;
    text-align: center;
    border: 1px solid;
    border-color: #cfd7de;
    border-radius: 50%;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    font-size: 12px;
    line-height: 1;
    background-color: #fff;
    position: relative;
    z-index: 10;
}
.passive .hr-progress__step__line:after,
.passive .hr-progress__step__line:before {
    border-bottom: 1px solid #cfd7de;
}
.hr-progress__step__line {
  position: relative;
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-line-pack: center;
  align-content: center;
  width: 100%;
}
.hr-progress__step__line:before {
    left: 0;
}
.hr-progress__step__line:after {
    right: 0;
}
.hr-progress__step.second .hr-progress__step__line:after,
.hr-progress__step.second .hr-progress__step__line:before,
.hr-progress__step.third .hr-progress__step__line:before,
.hr-progress__step.first .hr-progress__step__line::after  {
    content: "";
    position: absolute;
    height: 1px;
    border-bottom: 1px solid #cfd7de;
    width: 50%;
    z-index: 0;
    top: 50%;
    -webkit-transform: translateY(-1px);
    transform: translateY(-1px);
}
.hr-progress {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  position: relative;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
}
.hr-progress__step {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  text-align: center;
  color: #1b1f23;
  position: relative;
  z-index: 1;
}
@media (min-width: 768px) {
  .how-it-works-rebranded {
    margin-top: -120px;
  }
}
@media (max-width: 768px) {
  .ft-search-box {
    margin-top: .2rem;
  }
  .slider-content_wrap h1 {
    font-size: 34px;
  }
  .ft-progress {
    display: none;
  }
  .occasion-items {
    padding-left: 3rem;
  }
  .hero-sub-title {
    font-size: 16px;
  }
}
.descriptions .description-text {
  padding-top: 2rem;
}
.descriptions .description-text .title {
  font-weight: bold;
}
.occasion-items .occasion-icon img {
  width: 30px;
}
.occasion-items .occasion-title {
  font-weight: bold;
}
.card .card-title {
  font-size: 20px;
}
.card .card-body p {
  width: calc(100% - 20px);
  padding-left: 1rem;
}
.custom-bg-color {
  background-color: #EEFBF8 !important;
}
@media (max-width: 767px) {
  .h3, h3 {
    font-size: 22px;
  }
  .h5, h5 {
    font-size: 19px;
  }
  .add-listing-wrap p {
    font-size: 19px;
  }
}
.gallery-block {
  background: rgb(246, 246, 246);
  color: #565a5c;
}
.get-started-block {
  background: url('<?php echo base_url('assets/frontend/images/foodtruck.jpg'); ?>');
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  background-attachment: fixed;
}
</style>
