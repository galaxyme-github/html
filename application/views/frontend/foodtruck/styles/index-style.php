<!-- Swipper Slider -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/swiper.min.css'); ?>">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/magnific-popup.css'); ?>">

<!-- LEAFLET CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/global/leaflet/leaflet.css'); ?>">

<!-- Custom Calendar -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/custom-calendar.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Boostrap Validate JS -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/bower_components/bootstrap-validator/dist/validator.css'); ?>" />

<!-- Datepicker CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap-datepicker.css'); ?>">
  <!-- select2 CSS -->
  <link href="<?php echo base_url('assets/vendors/bower_components/select2/dist/css/select2.min.css');?>" rel="stylesheet" type="text/css"/>
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

  #map {
    height: 260px;
  }
  .info-right-sidebar {
    padding: 1.6rem;
  }
  .styled-name h3 {
    text-align: center;
    font-weight: bold;
  }
  .food-truck-container {
    background: <?php if (!empty($page_styles->bg_theme)): ?> url('<?php echo base_url("uploads/frontend/images/patterns/$page_styles->bg_theme.png"); ?>') <?php else: ?> <?=$page_styles->page_bg_color;?> <?php endif; ?>;
  }
  .food-truck-container .food-truck-title {
    color: <?php echo $page_styles->ft_name_color; ?>;
  }
  .food-truck-container .food-truck-dish-name {
    color: <?php echo $page_styles->dish_name_color; ?>;;
    margin-top: 0;
    padding-right: 10px;
    margin-bottom: 8px;
    padding-top: 0;
    display: inline-block;
    font-size: 20px !important;
  }
  .food-truck-container .catering-menu-category-title {
    color: <?php echo $page_styles->menu_category_name_color; ?>;
  }
  .food-truck-container .menu-category-devider {
    background-color: <?php echo $page_styles->menu_category_name_color; ?>;
  }
  .about-text p {
    color: <?php echo $page_styles->ft_text_color; ?>;
  }
  .dish-details {
    color: <?php echo $page_styles->dish_text_color; ?>;
  }
  .dish-amount {
    width: 150px;
    display: inline-block;
  }
  .dish-amount .input-group input {
    background-color: transparent;
  }
  .dish-amount .input-group .input-group-prepend button, 
  .dish-amount .input-group .input-group-append button {
    cursor: pointer;
  }
  .dish-amount .input-group .btn-outline-secondary:hover {
    color: #fff;
    background-color: #0da166;
    border-color: #10a86c;
  }
  .select2-container--default .select2-selection--single {
    height: 38px;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 36px;
  }
</style>
