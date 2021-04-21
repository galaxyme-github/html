<link rel="stylesheet" href="<?php echo base_url('assets/vendors/bower_components/bootstrap-validator/dist/validator.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/auth/fonts/iconic/css/material-design-iconic-font.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/global/css/font.css'); ?>">
<style>
.foodtruck-join-us {
    padding: 3rem 0;
}

.foodtruck-section-title {
    font-weight: bold;
    padding: 2rem 0;
}

.foodtruck-list a {
    font-size: 20px;
    text-decoration: none;
    color: #000;
    display: block;
}

.foodtruck-FAQ, .foodtruck-who-can-member, .foodtruck-why-join {
    padding-top: 5rem;
}

.foodtruck-member-application-submitted {
    /* height: 60vh; */
    /* padding: 22vh 1rem; */
    text-align: center;
}

.foodtruck-alert span {
    font-size: 20px;
    color: #646970;
}
.foodtruck-alert h3 {
    color: #646970;
}
.foodtruck-alert p {
    padding-top: 1rem;
    color: #129260;
    font-size: 15px;
}
.jumbo-header-container {
    position: relative;
    margin-top: -51px;
    min-height: 665px;
}

.service-landing-header {
    background-image: url("<?php echo base_url('uploads/frontend/banners/become.jpg'); ?>");
    background-color: #eee;
    background-repeat: no-repeat;
    background-position: top;
    background-size: cover!important;
}
.text-contrast, .text-contrast-muted {
    color: #f4f5f6!important;
}

.jumbo-centered {
    position: absolute;
    top: 50%!important;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}
.bft-header-group {
    margin-bottom: 20px;
}

.bft-header-group .bft-header-title {
    font-size: 3.5rem;
    font-weight: 600;
    margin: 0;
}
.margin-bottom-x4 {
    margin-bottom: 20px!important;
}
.text-contrast, .text-contrast-muted {
    color: #f4f5f6!important;
}
.bft-header-group .bft-header-subtitle {
    font-size: 1.7rem;
}
@media (max-width: 544px) {
    .bft-header-group .bft-header-title {
    font-size: 2rem;
    }
    .bft-header-group .bft-header-subtitle {
        font-size: 1rem;
    }
}
.bbm-header-btn-wrap {
    position: absolute;
    top: 70%!important;
    -webkit-transform: translateY(-70%);
    transform: translateY(-70%);
}
@media (max-width: 544px) {
    .primary-col h4 {
        font-size: 18px;
    }
    .primary-col p {
        font-size: 14px;
    }
    .bbm-header-btn-wrap .btn {
        font-size: 15px;
    }
}
#foodtruck-owner-information {
    background: rgb(246, 246, 246);
    padding: 4rem 0;
}

#foodtruck-owner-information input::placeholder {
    font-style: italic;
    font-size: 15px;
}
#foodtruck-owner-information label {
    color: #565a5c;
    font-size: 15px;    
}
#foodtruck-owner-information .with-errors {
    font-size: 14px;
    color: #ec8585;
}
.inline-checkbox-label {
    float: left;
    padding-left: 5px;
    width: calc(100% - 15px);
    text-align: left;
}
.inline-checkbox {
    float: left;
    margin-top: 4px;
}
@media (max-width: 420px) {
    h6 {
        font-size: 15px;
    }
}
.foodtruck-why-join h6:before {
    content: "\f00c";
    margin-right: 5px;
    float: left;
    color: #14a96d;
}
.foodtruck-who-can-member .foodtruck-list p:before {
    content: "\f058";
    margin-right: 5px;
    float: left;
    color: #14a96d;
}
.foodtruck-alert {
    max-width: 600px;
    /* background: #17a2b838; */
    margin: auto;
    padding: 3rem;
}
input[type=checkbox]:hover {
    cursor: pointer;
}
/* Modal */
/* The Modal (background) */
.bft-simple-modal {
    display: block; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  
  /* Modal Content */
  .bft-simple-modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 100%;
  }
  
  /* The Close Button */
  .bft-simple-modal-close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
  
  .bft-simple-modal-close:hover,
  .bft-simple-modal-close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }
</style>