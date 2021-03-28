<!-- Swipper Slider -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/swiper.min.css'); ?>">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/magnific-popup.css'); ?>">
<!-- Datepicker CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default/css/bootstrap-datepicker.css'); ?>">

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
    background-image: url(<?php echo site_url("assets/frontend/default/images/1.webp"); ?>);
  }
  .descriptions .description .pay-icon {
    background-image: url(<?php echo site_url("assets/frontend/default/images/3.webp"); ?>);
  }
  .descriptions .description .relax-icon {
    background-image: url(<?php echo site_url("assets/frontend/default/images/2.webp"); ?>);
  }
  .descriptions .description .icon {
    width: 80px;
    height: 80px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: 50%;
    margin: auto;
  }
</style>
